<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner as bannerModel;
use App\Models\User;
use App\Models\Image AS ImageModel;
use Illuminate\Http\Request;
use Validator;
use App\Models\Meta_tags;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use File;

class Banners extends Controller
{
    function __construct()
    {
          $this->middleware('permission:banner-read', ['only' => ['index']]);
    }

    function publish(Request $request, $id)
    {

        $rec = bannerModel::where("id", $request->id)->first();
        if($rec->is_published == 0){
            $pub = 1;
            $msg = 'Banner has been published successfully';
        }
        else{
            $pub = 0;
            $msg = 'Banner has been unpublished';            
        }
        $data = [
            'is_published' => $pub,
        ];
        $updated = bannerModel::where("id", $request->id)->update($data);
        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => $msg]);
    }

    function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  bannerModel::latest();
            if (request()->has('search_id')) {
                if (request()->get('search_id')) {
                    $data->where('id', 'LIKE', "%" . request()->get('search_id') . "%");
                }
            }
            
            if (request()->has('search_title')) {
                
                if (request()->get('search_title')) {
                    $data->where('title', 'LIKE', "%" . request()->get('search_title') . "%");
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
            // dd($data);
           
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
                ->addColumn('action', function ($row) {

                    $content = '';
                              
                    if(auth()->user()->can('banner-update')){
                        $content .= '<button type="button" class="btn btn-info btn-sm" onclick="Edit(' . $row->id . ')" title="Edit"><i class="fa fa-edit"></i></button>';
                    }


                    if(auth()->user()->can('banner-delete')){
                        $content .= '<button type="button" class="btn btn-primary btn-sm ml-2" onclick="Delete(' . $row->id . ')" title="Delete"><i class="fa fa-trash-o"></i></button>';
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
                        <img src="' . url('uploads/banners/' . $row->image) . '" alt="">
                      </div>';
                }
            })
            
            ->addColumn('publish', function ($row) {
                $publish = $row->is_published == 1?"Published":"Not Published";
                $bgcolor = $row->is_published == 1?"btn-info":"btn-danger";
                return '<a class="btn btn-sm '.$bgcolor.'" onclick="publish(this,' . $row->id . ')" href="#">'.$publish.'</a> ';
            })



                ->rawColumns(['id','image','publish', 'action','publish'])
                ->make(true);

            return $datatable;
        }
        $images =  ImageModel::all();
        $bannerlist =  bannerModel::all();
        
        return view('admin.banners.index', array('bannerlist' => $bannerlist,'images' => $images));
    }
   
    function ajax(Request $request)
    {
        switch ($request->action) {
            case 'add': 
                $validator = Validator::make($request->all(), [
                    'title' => 'required|string|max:255',
                    'slug' => 'required|string|max:255',
                    'start_date' => 'required|date',
                    'end_date' => 'nullable|date|after:start_date'
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
                            $image->move(public_path('uploads/banners'), $imageName);

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
                            'is_featured' => $request->is_featured,
                            'image' => $imageName,
                            'image_selection' => $request->image_selection,
                            'start_date' => $request->start_date,
                            'end_date' => $request->end_date,
                            'created_by' => Auth::user()->id,
                        ];
                    
                $inserted = bannerModel::create($data);
                $service_links_record = [];
                if(isset($request->meta_tag_name)){        
                    if($request->meta_tag_name > 0){
                        for($i=0;  $i< count($request->meta_tag_name); $i++){
                            $service_links_record[] =  array('meta_tag_name'=> $request->meta_tag_name[$i] , 'meta_tag_content'=> $request->meta_tag_content[$i], 'entity_id' => $inserted->id,'entity_name' => 'banners'); 
                        }
                    }   
                }
        
                Meta_tags::insert($service_links_record);
            }

            return response()
                ->json(['data' => $inserted, 'status' => true, 'message' => 'Banner has created Successfully']);
            
            break;
            case 'update':
           
            if(!auth()->user()->can('banner-update')){
                abort(403);
            }
     
            $validator = Validator::make($request->all(), [
                 
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'start_date' => 'required|date',
                'end_date' => 'nullable|date|after:start_date'
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
                        $image->move(public_path('uploads/banners'), $imageName);
    
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
                    'is_featured' => $request->is_featured,
                    'image' => $imageName,
                    'image_selection' => $request->image_selection,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                ];
            
                $updated = bannerModel::where("id", $request->id)->update($data);
                $meta_tag_record = [];
                if(isset($request->meta_tag_name)){        
                    if($request->meta_tag_name > 0){
    
                        for($i=0;  $i< count($request->meta_tag_name); $i++){
                            $meta_tag_record[] =  array('meta_tag_name'=> $request->meta_tag_name[$i] , 'meta_tag_content'=> $request->meta_tag_content[$i], 'entity_id' => $request->id, 'entity_name' => 'banners'); 
                        }
    
                    }   
                }
    
                Meta_tags::where('entity_id', $request->id)->delete();
                Meta_tags::insert($meta_tag_record);
            }
    
            return response()
                ->json(['data' => $updated, 'status' => true, 'message' => 'Banner has been updated Successfully']);

            break;
            default:
            break;
        }
    }
    
    function by_id(Request $request, $id)
    {
        $data = bannerModel::findOrFail($id);
        $meta_tags = Meta_tags::where('entity_id', $id)->get();
        
        return response()
            ->json(['data' => $data, 'meta_tags' => $meta_tags, 'status' => true, 'message' => 'Data fetched successfully']);
    
    }

    function delete($id, Request $request)
    {
        
        if(!auth()->user()->can('banner-delete')){
            abort(403);
        }



        if (isset($request->ids)) {
            $ids = $request->ids;
            if (count($ids) > 0) {
                $data = bannerModel::whereIn('id', $ids)->get();
                foreach($data as $del) {
                    $image_path = public_path('uploads/banners/'.$del->image);
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                bannerModel::whereIn('id', $ids)->delete();
            }
        } else {
            $data = bannerModel::findOrFail($id);
            $image_path = public_path('uploads/banners/'.$data->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            bannerModel::findOrFail($id)->delete();   
        }
        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Banner has been deleted Successfully']);
    }

}
