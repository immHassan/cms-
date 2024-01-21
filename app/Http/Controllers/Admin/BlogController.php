<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\User;
use App\Models\Image AS ImageModel;
use App\Models\Meta_tags;
use App\Models\Rating;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use File;
use App\Traits\Rateable;
use App\Models\Hit_Record;


class BlogController extends Controller
{
    function __construct()
    {
          $this->middleware('permission:blogs-read', ['only' => ['index']]);
    }

    function index(Request $request)
    {
        if ($request->ajax()) {
            $data =  Blog::latest();
           
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
                
                    return ' <label for="' . $row->id . '" class="custom-control custom-checkbox">
                    <input type="checkbox" class="multidelete custom-control-input" id="' . $row->id . '" value="' . $row->id . '">
                    <span class="custom-control-label">&nbsp;
                    ' . $row->id . '
                    </span>
                    </label>';
                })
                ->addColumn('title', function ($row) {
                    $title = $row->title;
                    if (strlen($title) >= 20) {
                        return substr($title, 0, 10). " ... " . substr($title, -5);
                    }
                    else {
                        return $title;
                    }
                })
                ->addColumn('category', function ($row) {
                    return $row->category_name;
                })
                ->addColumn('author', function ($row) {
                    return $row->author;                    
                }) 
                ->addColumn('publish', function ($row) {
                    $publish = $row->is_published == 1?"Published":"Not Published";
                    $bgcolor = $row->is_published == 1?"btn-info":"btn-danger";
                    return '<a class="btn btn-sm '.$bgcolor.'" onclick="publish(this,' . $row->id . ')" href="#">'.$publish.'</a> ';
                })
               
                ->addColumn('action', function ($row) {
                    $route = route('blog.view',[$row->id,$row->slug]);
                 

                    if(auth()->user()->can('blog-delete')){
                        abort(403);
                    }

                    
                    
                $content = ' <div class="card-options">
                    <div class="item-action dropdown ml-5">
                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                        <div class="dropdown-menu dropdown-menu-right"> ';

                        if(auth()->user()->can('blogs-read')){
                            $content .= '<a href="'.$route.'" target="_blank" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Blog</a>';
                        }

                        if(auth()->user()->can('blogs-update')){
                            $content .= '<a href="javascript:void(0)" class="dropdown-item" onclick="Edit(' . $row->id . ')"><i class="dropdown-icon fa fa-edit"></i> Edit</a>';
                        }
                        
                        if(auth()->user()->can('blogs-delete')){
                            $content .= '<a href="javascript:void(0)" class="dropdown-item" onclick="Delete(' . $row->id . ')"><i class="dropdown-icon fa fa-trash"></i> Delete</a>';
                        }
                            
                        $content .= '</div>
                            </div>
                        </div>';
 
                return $content;
                })
                ->addColumn('image', function ($row) {
                    if($row->image_selection == 1) {
                        return ' <div class="client-group">
                        <img src="' . url($row->image) . '" alt="">
                      </div>';
                    }else{
                        return ' <div class="client-group">
                            <img src="' . url('uploads/blog/' . $row->image) . '" alt="">
                          </div>';
                    }
                })
                ->rawColumns(['id','title', 'category','image','publish', 'action'])
                ->make(true);

            return $datatable;
        }
        $categories = Categories::orderBy('id','desc')->get();
        $raw_data = $this->buildTree($categories);
        $json = '';
        $json .='[';
        foreach($raw_data as $cat){
            $json .='{';
            $json .='"text":"'.$cat->title.'",';
            $json .='"href":"#'.$cat->title.'",';
            $json .='"id":"'.$cat->id.'",';
            $json .='"class":"'.$cat->id.'",';
            $json .='"visible":"'.$cat->is_visible.'",';
            
            if(isset($cat->nodes) && count($cat->nodes)){
                $json .='"tags":['.count($cat->nodes).'],';
                $json .= '"nodes":[';
                $childcategory = $cat->nodes;
                    $json .= $this->childCat($childcategory);
                    $json .='],';
                }
                else {
                $json .='"tags":[0],'; 
                }
            $json .='},';
        }
        $json .=']';
        
        $categorylist = Categories::pluck('title','id')->all();
        $bloglist =  Blog::all();
        
        return view('admin.blog.index', 
            array(
                'bloglist' => $bloglist,
                'json' => $json,
                'categorylist' => $categorylist

            ));
    }
    function buildTree($elements, $parentId = 0) {    
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['nodes'] = $children;
                }
                $branch[] = $element;
            }
        }
    
        return $branch;
    }
    function childCat($childcategory){
        $data='';
        foreach($childcategory as $child){
            $data .='{';
            $data .='"text":"'.$child->title.'",';
            $data .='"href":"#'.$child->title.'",';
            $data .='"id":"'.$child->id.'",';
            $data .='"class":"'.$child->id.'",';
            $data .='"visible":"'.$child->is_visible.'",';
            
            if(isset($child->nodes) && count($child->nodes)){
                $data .='"tags":['.count($child->nodes).'],';
                $data .= '"nodes":[';
                $childcategory = $child->nodes;
                $data .= $this->childCat($childcategory);
                $data .= ']';
            }
            else {
                $data .='"tags":[0],'; 
                }
            $data .='},';
        }
        return $data;
    }

    function ajax(Request $request)
    {
        switch ($request->action) {
            case 'add': 
          
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'blog_category' =>'required'
        ]
        );
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
                        $image->move(public_path('uploads/blog'), $imageName);

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
                        'author' => $request->author,                        
                        'blog_category' => $request->blog_category,
                        'category_name' => $request->category_name,
                        'slug' => $request->slug,
                        'content' => $request->content,
                        'is_featured' => $request->is_featured,
                        'is_commentable' => $request->is_commentable,
                        'is_published' => $request->is_published,
                        'image' => $imageName,
                        'image_selection' => $request->image_selection,
                        'start_date' => $request->start_date,
                        'end_date' => $request->end_date,
                        'created_by' => Auth::user()->id,
                    ];
            
            $inserted = Blog::create($data);
            $service_links_record = [];
            if(isset($request->meta_tag_name)){        
                if($request->meta_tag_name > 0){
                    for($i=0;  $i< count($request->meta_tag_name); $i++){
                        $service_links_record[] =  array('meta_tag_name'=> $request->meta_tag_name[$i] , 'meta_tag_content'=> $request->meta_tag_content[$i], 'entity_id' => $inserted->id,'entity_name' => 'blog'); 
                    }
                }   
            }
    
            Meta_tags::insert($service_links_record);
        }

        return response()
            ->json(['data' => $inserted, 'status' => true, 'message' => 'Blog has created Successfully']);
    
            break;
            case 'update':
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'content' => 'required',
                'start_date' => 'required|date',
                'end_date' => 'nullable|date|after:start_date',
                'blog_category' =>'required'
            ]
            );
        
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
                        $image->move(public_path('uploads/blog'), $imageName);
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
                'author' => $request->author,
                'blog_category' => $request->blog_category,
                'category_name' => $request->category_name,
                'slug' => $request->slug,
                'content' => $request->content,
                'is_featured' => $request->is_featured,
                'is_published' => $request->is_published,
                'is_commentable' => $request->is_commentable,                
                'image' => $imageName,
                'image_selection' => $request->image_selection,                
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ];
                $updated = Blog::where("id", $request->id)->update($data);
                $meta_tag_record = [];
                if(isset($request->meta_tag_name)){        
                    if($request->meta_tag_name > 0){
    
                        for($i=0;  $i< count($request->meta_tag_name); $i++){
                            $meta_tag_record[] =  array('meta_tag_name'=> $request->meta_tag_name[$i] , 'meta_tag_content'=> $request->meta_tag_content[$i], 'entity_id' => $request->id, 'entity_name' => 'blog'); 
                        }
    
                    }   
                }
    
                Meta_tags::where('entity_id', $request->id)->delete();
                Meta_tags::insert($meta_tag_record);
            }
    
            return response()
                ->json(['data' => $updated, 'status' => true, 'message' => 'Blog has updated Successfully']);
                break;
                default:
                break;
            }
    }

    function publish(Request $request, $id)
    {
        $rec = Blog::where("id", $request->id)->first();
        if($rec->is_published == 0){
            $pub = 1;
            $msg = 'Blog has been published successfully';
        }
        else{
            $pub = 0;
            $msg = 'Blog has been unpublished';            
        }
        $data = [
            'is_published' => $pub,
        ];
        $updated = Blog::where("id", $request->id)->update($data);
        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => $msg]);
    }
    
    function by_id(Request $request, $id)
    {
        $data = Blog::findOrFail($id);
        $meta_tags = Meta_tags::where('entity_id', $id)->get();
        
        return response()
            ->json(['data' => $data, 'meta_tags' => $meta_tags, 'status' => true, 'message' => 'Data fetched successfully']);
    
    }
    function view($id, $slug)
    {
        $user_id =auth()->check()?auth()->user()->id:request()->ip();
        $data = [
            'user_id' => $user_id,
            'entity_id' => $id,
            'entity_name' => 'Blog'
        ];
        
        $blog = Blog::findOrFail($id);
        if($blog->is_published == 1){
            $hit_record = Hit_Record::insert($data);
            return view('admin.blog.comment',compact('blog'));
         }else{
             return redirect(route('blog.list'))->with('errors','Blog is not Published');
         }
    }
    public function blogRating(Request $request)
    {
        request()->validate(['rate' => 'required']);

        $blog = Blog::findOrFail($request->id);
        $rating = new Rating;

        $checkrating = Rating::query()
            ->where('rateable_id', '=', $request->id)
            ->where('user_id', '=', Auth::id())
            ->first();

        if ($checkrating) { 
            $checkrating->update([
                'rating'=>$request->rate
            ]);
        } else {
            $rating->rating = $request->rate;
            $rating->user_id = auth()->user()->id;
            $blog->ratings()->save($rating);
        }
        
        return redirect()->back();
    }

    function delete($id, Request $request)
    {

        if(!auth()->user()->can('blogs-delete')){
            abort(403);
        }
    
        if (isset($request->ids)) {
            
            $ids = $request->ids;
            if (count($ids) > 0) {
                $data = Blog::whereIn('id', $ids)->get();
                foreach($data as $del) {
                    $image_path = public_path('uploads/blog/'.$del->image);
                    if(File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
                Blog::whereIn('id', $ids)->delete();
            }
        } else {
            $data = Blog::findOrFail($id);
            
            $image_path = public_path('uploads/blog/'.$data->image);
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            Blog::findOrFail($id)->delete();
        }

        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Blog has deleted Successfully']);
    }
}
