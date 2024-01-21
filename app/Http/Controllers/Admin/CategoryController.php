<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use DB;

class CategoryController extends Controller
{
    function __construct()
    {
          $this->middleware('permission:categories-read', ['only' => ['index']]);
    }
    function index(Request $request)
    {
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


        $allCategories = Categories::orderBy('id','desc')->pluck('title','id');

              
        return view('admin.category.index', compact('json','allCategories'));
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
   
    function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255'
            ]
            ,[ 
                'title.required' => 'The Name is required.'
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
                ]);
        } else {
                $input = $request->all();
                $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
                $input['created_by'] = Auth::user()->id;
                Categories::create($input);
                
                return response()
                ->json(['data' => 1, 'status' => true, 'message' => 'Category has created Successfully']);
        }
    }
            
    function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {
            
            $data = [
                'title' => $request->title,
                'is_visible' => $request->is_visible,
                'parent_id' => $request->parent_id,
            ];
            $updated = Categories::where("id", $request->cat_id)->update($data);
        }

        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => 'Category has updated Successfully']);
    }
    function delete($id){
        if(!auth()->user()->can('categories-delete')){
            abort(403);
        }
        $parent = Categories::findOrFail($id);
        
        $array_of_ids = $this->getChildren($parent);
        
        array_push($array_of_ids, $id);
        
       $data = Categories::destroy($array_of_ids);

        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Category has been deleted Successfully']);
    
    }
    
    private function getChildren($category){
        $ids = [];
        foreach ($category->subcategories as $cat) {
            $ids[] = $cat->id;
            $ids = array_merge($ids, $this->getChildren($cat));
        }
        return $ids;
    }

}
