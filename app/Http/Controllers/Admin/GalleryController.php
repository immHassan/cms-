<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use File;
use App\Models\Gallery;
use App\Models\GalleryMedia;

class GalleryController extends Controller
{  
    function __construct()
    {
          $this->middleware('permission:gallery-read', ['only' => ['index']]);
    }



    function publish(Request $request, $id)
    {

        $rec = Gallery::where("id", $request->id)->first();
        if($rec->is_published == 0){
            $pub = 1;
            $msg = 'Gallery has been published successfully';
        }
        else{
            $pub = 0;
            $msg = 'Gallery has been unpublished';            
        }
        $data = [
            'is_published' => $pub,
        ];
        $updated = Gallery::where("id", $request->id)->update($data);
        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => $msg]);
    }




    function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  Gallery::latest();
            
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
            
            $datatable =  DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('id', function ($row) {
                    return ' 
                    <label for="' . $row->id . '" class="custom-control custom-checkbox">
                    <input type="checkbox" class="multidelete custom-control-input" id="' . $row->id . '" value="' . $row->id . '">
                    <span class="custom-control-label">&nbsp;
                    ' . $row->id . '
                    </span>
                    </label>';
                })
                ->addColumn('is_published', function ($row) {

                    return $row->is_visible? __("languages.yes"): __("languages.no");
                })
                ->addColumn('action', function ($row) {
                    return ' 
                    <button type="button" class="btn btn-info btn-sm" onclick="Edit(' . $row->id . ')" title="Edit"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="Delete(' . $row->id . ')" title="Delete"><i class="fa fa-trash-o"></i></button>
                    ';                })
                ->addColumn('image', function ($row) {
                        return ' <a class="btn btn-info btn-sm" href="gallery/images/'.$row->id.'">
                        <i class="fa fa-eye"></i> ' . __("languages.view_gallery").'</a>';
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
        
        $gallerylist =  Gallery::all();
        
        
        return view('admin.gallery.index', 
            array(
                'gallerylist' => $gallerylist    
            ));
    }

    function upload(Request $request)
    {   
        $update = Gallery::where("id", $request->eventid)->first();
        $data=[];
        $galleryMedia = [];
       if($request->hasFile('images')){
        foreach($request->file('images') as $image){
                $originalname = $image->getClientOriginalName();
                $imageName = rand() . explode('.', $originalname)[0] . '.' . $image->extension();

                // $imageName = rand() . $image->extension();            
                $image->move(public_path('uploads/media'), $imageName);
                $galleryMedia[] = [
                    'image' => $imageName,
                    'image_selection' => 0
                ];
            
            }
            $data = $update->medias()->createMany($galleryMedia);
        }
            $count = GalleryMedia::where('gallery_id',$request->eventid)->count();
        
            return response()->json(['success' => true, 'count'=>$count, 'data' => $data]);
    }

    function gallery_images($id) {
        $data = Gallery::findOrFail($id);
       
        return view('admin.gallery.galleryImages',compact('data'));
    }
    
    function addmedia(Request $request){
        
        $update = Gallery::where("id", $request->eventid)->first();
        
        $data = $update->medias()->create([
            'image' => $request->image,
            'image_selection' => 1
        ]);
        $count = GalleryMedia::where('gallery_id',$request->eventid)->count();
        return response()
        ->json(['data' => $data , 'count'=>$count, 'status' => true, 'message' => 'Images added Successfully']);

    }

    function create(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'gallery_content' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date'
            ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
                ]);
            } else {
                $data = [
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'content' => $request->gallery_content,
                    'is_visible' => $request->is_visible,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'created_by' => Auth::user()->id,
                ];    
            $inserted = Gallery::create($data);               
        }
        return response()
            ->json(['data' => $inserted, 'status' => true, 'message' => 'Gallery has created Successfully']);
    }
    function update(Request $request, Gallery $gallery)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'gallery_content' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {
            
            $data = [
                'title' => $request->title,
                'slug' => $request->slug,
                'content' => $request->gallery_content,
                'is_visible' => $request->is_visible,                 
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ];
            $update = Gallery::where("id", $request->id)->first();
            $update->update($data);
        }

        return response()
            ->json(['data' => 1, 'status' => true, 'message' => 'Gallery has updated Successfully']);
    }
    
    function by_id(Request $request, $id)
    {
        $data = Gallery::findOrFail($id);
        $media = $data->medias;
        return response()
            ->json(['data' => $data, 'media'=> $media, 'status' => true, 'message' => 'Data fetched successfully']);
    }

    function delete($id, Request $request)
    {

        
        if(!auth()->user()->can('gallery-delete')){
            abort(403);
        }

        if (isset($request->ids)) {
            $ids = $request->ids;
            if (count($ids) > 0) {
                $data = Gallery::whereIn('id', $ids)->get();
                foreach($data as $del) {
                    $image_path = public_path('uploads/gallery/'.$del->image);
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                Gallery::whereIn('id', $ids)->delete();
            }
        } else {
            $data = Gallery::findOrFail($id)->first();
            $image_path = public_path('uploads/gallery/'.$data->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            Gallery::findOrFail($id)->delete();
        }

        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Gallery image has deleted Successfully']);
    }





    function deletemultiimages(Request $request){
        if (isset($request->ids)) {
             
            $ids = $request->ids;
            if (count($ids) > 0) {

                $data = GalleryMedia::whereIn('id', $ids)->get();
                foreach($data as $del) {
                    if($del->image_selection == 0){
                        $image_path = public_path('uploads/media/'.$del->image);
                        if(File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                }
                GalleryMedia::whereIn('id', $ids)->delete();
            }
        }
        return response()
        ->json(['data' => $data, 'status' => true, 'message' => 'Gallery image has deleted Successfully']);
    }


    function deletemedia($id)
    {
        $data = GalleryMedia::findOrFail($id);
        // dd($data->image);
        if($data->image_selection == 0){
            $image_path = public_path('uploads/media/'.$data->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        GalleryMedia::findOrFail($id)->delete();
        return response()
        ->json(['data' => $data, 'status' => true, 'message' => 'Event image has deleted Successfully']);
    }
    
}
