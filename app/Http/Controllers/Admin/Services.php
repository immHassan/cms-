<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services as ServiceModel;
use App\Models\Service_links as ServiceLinksModel;
use App\Models\Image AS ImageModel;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class Services extends Controller
{
    function __construct()
    {
          $this->middleware('permission:service-read', ['only' => ['index']]);
    }

    function publish(Request $request, $id)
    {

        $rec = ServiceModel::where("id", $request->id)->first();
        if($rec->is_published == 0){
            $pub = 1;
            $msg = 'Service has been published successfully';
        }
        else{
            $pub = 0;
            $msg = 'Service has been unpublished';            
        }
        $data = [
            'is_published' => $pub,
        ];
        $updated = ServiceModel::where("id", $request->id)->update($data);
        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => $msg]);
    }

    function index(Request $request)
    {

        if ($request->ajax()) {
            $data =  ServiceModel::latest();
            if (request()->has('id')) {
                
                if (request()->get('id')) {
                    $data->where('id', 'LIKE', "%" . request()->get('id') . "%");
                }
            }
            
            if (request()->has('title')) {
                
                if (request()->get('title')) {
                    $data->where('title', 'LIKE', "%" . request()->get('title') . "%");
                }
            }
            
            
            
            if (request()->has('search_date')) {
                if (request()->get('search_date')) {
                    
                    $from  = date('Y-m-d H:i:s', strtotime(explode("-", request()->get('search_date'))[0]));
                    $to  = date('Y-m-d H:i:s', strtotime(explode("-", request()->get('search_date'))[1]));
                    if ($from == $to) {
                        $data->whereDate('created_at', $from);
                    } else {
                        $data->whereBetween('created_at', [$from, $to]);
                    }
                }
            }
            
           
            $datatable =  DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('id', function ($row) {
                    return ' 
                    <label for="' . $row->id . '" class="custom-control custom-checkbox">
                    <input type="checkbox" class="multidelete custom-control-input" id="' . $row->id . '" value="' . $row->id . '">
                    <span class="custom-control-label">&nbsp;
                    ' . $row->id . '
                    </span>
                    </label>
                    ';
                })
                ->addColumn('is_featured', function ($row) {
                    return $row->is_featured?'Yes':'No';
                })
                ->addColumn('action', function ($row) {


                    $content  ='';
                    
                    if(auth()->user()->can('service-update')){
                        $content  .='<button type="button" class="btn btn-info btn-sm" onclick="Edit(' . $row->id . ')" title="Edit"><i class="fa fa-edit"></i></button>';
                    }

                    if(auth()->user()->can('service-delete')){
                        $content  .= '<button type="button" class="btn btn-danger btn-sm ml-2" onclick="Delete(' . $row->id . ')" title="Delete"><i class="fa fa-trash-o text-white"></i></button>';
                    }

                    return $content;


                })
                ->addColumn('image', function ($row) {
                    if($row->image_selection == 1) {
                        return ' <div class="client-group">
                        <img src="' . url($row->image) . '" alt="">
                      </div>';
                    }else{
                        return ' <div class="client-group">
                            <img src="' . url('uploads/services/' . $row->image) . '" alt="">
                          </div>';
                    }
                })
                ->addColumn('publish', function ($row) {
                    $publish = $row->is_published == 1?"Published":"Not Published";
                    $bgcolor = $row->is_published == 1?"btn-info":"btn-danger";
                    return '<a class="btn btn-sm '.$bgcolor.'" onclick="publish(this,' . $row->id . ')" href="#">'.$publish.'</a> ';
                })

                ->rawColumns(['id','image', 'action','publish'])
                ->make(true);

            return $datatable;
        }
        $images =  ImageModel::all();
        $servicelist =  ServiceModel::all();
        
        return view('admin.services.index', array('servicelist' => $servicelist, 'images' => $images));
    }
    
    function ajax(Request $request)
    {
        switch ($request->action) {
            case 'add':  
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'data' => $validator->errors(),
                    'status' => false, 'message' => 'Validation errors',
                    ]);
                } else {
                    if($request->hasFile('image')){
                        $image = $request->file('image');
                        $originalname = $image->getClientOriginalName();
                        $imageName = time() . explode('.', $originalname)[0] . '.' . $image->extension();
                        $image->move(public_path('uploads/services'), $imageName);

                    }else{
                        $imageName = $request->file;
                    }

                    if($imageName == null){
                        return response()->json([
                            'data' => ['image'=>'Image is required'],
                            'status' => false, 'message' => 'Validation errors',
                            ]);
                    }
                    $data = [
                        'title' => $request->title,
                        'slug' => $request->slug,
                        'content' => $request->content,
                        'is_featured' => $request->is_featured, 
                        'image' => $imageName,
                        'image_selection' => $request->image_selection,
                        'created_by' => Auth::user()->id,
                    ];
                   
            $inserted = ServiceModel::create($data);

            
            $service_links_record = [];
            if(isset($request->service_link_title)){        
                if($request->service_link_title > 0){
                    for($i=0;  $i< count($request->service_link_title); $i++){
                        $service_links_record[] =  array('title'=> $request->service_link_title[$i] , 'url'=> $request->service_link_url[$i], 'service_id' => $inserted->id); 
                    }
                }   
            }
            ServiceLinksModel::insert($service_links_record);
        }

        return response()
            ->json(['data' => $inserted, 'status' => true, 'message' => 'Service has created Successfully']);
            break;
            case 'update':
        
                $validator = Validator::make($request->all(), [
                    'title' => 'required|string|max:255',
                    'slug' => 'required|string|max:255',
                    'content' => 'required',
                ]);
        
        
                if ($validator->fails()) {
                    return response()->json([
                        'data' => $validator->errors(),
                        'status' => false, 'message' => 'Validation errors',
                    ]);
                } else {
                    if($request->default_image){
                        $imageName = $request->default_image;
                    }else{
                        if($request->hasFile('image')){
                            $image = $request->file('image');
                            $originalname = $image->getClientOriginalName();
                            $imageName = time() . explode('.', $originalname)[0] . '.' . $image->extension();
                            $image->move(public_path('uploads/services'), $imageName);
                        }else{
                            $imageName = $request->file;
                        }
                    }
                    if($imageName == null){
                        return response()->json([
                            'data' => ['image'=>'Image is required'],
                            'status' => false, 'message' => 'Validation errors',
                            ]);
                    }
                    $data = [
                        'title' => $request->title,
                        'slug' => $request->slug,
                        'content' => $request->content,
                        'is_featured' => $request->is_featured, 
                        'image' => $imageName,
                        'image_selection' => $request->image_selection,
                    ];
                    $updated = ServiceModel::where("id", $request->id)->update($data);
        
        
                    ServiceLinksModel::where('service_id', $request->id)->delete();
                    $service_links_record = [];
                    if(isset($request->service_link_title)){        
                        if($request->service_link_title > 0){
                            for($i=0;  $i< count($request->service_link_title); $i++){
                                $service_links_record[] =  array('title'=> $request->service_link_title[$i] , 'url'=> $request->service_link_url[$i], 'service_id' => $request->id); 
                            }
                        }   
                    }
            
                    ServiceLinksModel::insert($service_links_record);
        
        
                }
        
                return response()
                    ->json(['data' => $updated, 'status' => true, 'message' => 'Your Service has updated Successfully']);
                    break;
                    default:
                    break;
                }
        }

    
    function by_id(Request $request, $id)
    {
        $data = ServiceModel::findOrFail($id);
        $data["service_links"] =  ServiceLinksModel::where('service_id',$id)->get();
    
        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Data fetched successfully']);
    }

    function delete($id, Request $request)
    {

        
        if(!auth()->user()->can('service-delete')){
            abort(403);
        }



        if (isset($request->ids)) {
            $ids = $request->ids;
            if (count($ids) > 0) {

                $data = ServiceModel::whereIn('id', $ids)->delete();

                ServiceLinksModel::where('id',$ids)->delete();

            }
        } else {
            $data = ServiceModel::findOrFail($id)->delete();
            
            ServiceLinksModel::where('id',$id)->delete();

        }

        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Service has deleted Successfully']);
    }

}
