<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Navbar as NavbarModel;
use App\Models\Navbar_detail as NavbarDetailModel;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class Navbar extends Controller
{


    function __construct()
    {
          $this->middleware('permission:navbar-read', ['only' => ['index']]);
    }

    function index(Request $request)
    {


        if ($request->ajax()) {

            $data =  NavbarModel::latest();
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

                    $from = date('Y-m-d H:i:s', strtotime(explode("-", request()->get('search_date'))[0]));
                    $to = date('Y-m-d H:i:s', strtotime(explode("-", request()->get('search_date'))[1]));
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



                ->addColumn('status', function ($row) {
                    $content ='
                        <div class="sales">
                        <select id="publish_status" data-id="'.$row->id.'" class="form-control" >';

                        if($row->is_selected == 1){
                            $content .='<option selected value="1">Active</option>';
                            $content .='<option value="0">Inactive</option>';
                        }else{
                            $content .='<option  selected value="0">Inactive</option>';
                            $content .='<option value="1">Active</option>';
                        }
                            $content .='</select> </div>';
                            return $content;
                        })






                ->addColumn('action', function ($row) {

                    $content = '';                   
                    if(auth()->user()->can('navbar-update')){
                        $content .= '<a type="button" class="btn btn-info btn-sm" href="'.route('navbar.by_id',array('slug'=>$row->slug)).'" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if(auth()->user()->can('navbar-delete')){
                        $content .= '<a href="javascript:void()" type="button" class="btn btn-primary btn-sm ml-2" onclick="Delete(' . $row->id . ')"  title="Delete"><i class="fa fa-trash text-white"></i></a>';
                    }

                    return $content;
                })
                
                ->addColumn('publish', function ($row) {
                    $publish = $row->is_published == 1?"Published":"Not Published";
                    $bgcolor = $row->is_published == 1?"btn-info":"btn-danger";
                    return '<a class="btn btn-sm '.$bgcolor.'" onclick="publish(this,' . $row->id . ')" href="#">'.$publish.'</a> ';
                })

                ->rawColumns(['id', 'action','status','publish'])
                ->make(true);

            return $datatable;
        }

        return view('admin.navbar.index');
    }




    function publish(Request $request, $id)
    {

        $rec = NavbarModel::where("id", $request->id)->first();
        if($rec->is_published == 0){
            $pub = 1;
            $msg = 'Navbar has been published successfully';
        }
        else{
            $pub = 0;
            $msg = 'Navbar has been unpublished';            
        }
        $data = [
            'is_published' => $pub,
        ];
        $updated = NavbarModel::where("id", $request->id)->update($data);
        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => $msg]);
    }


    function by_id(Request $request, $slug)
    {
        $navbar =  NavbarModel::where('slug', $slug)->first();       
        return view('admin.navbar.edit',array('navbar'=>$navbar));        
    }




    function save(Request $request)
    {

        $menu_links = $request->menu_links;

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:navbar,title',
            'slug' => 'required|unique:navbar,slug'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {
            $navbar = NavbarModel::create(['title' => $request->title, 'slug' => $request->slug, "navbar_html"=> $request->navbar_html]);
            
            foreach ($menu_links as $key => $value) {
                $data = ['name'=>$value['name'], 'slug'=> $value['slug'], 'navbar_detail_id' => $value['id'], 'parent_id' => $value['parent_id'],'navbar_id'=> $navbar->id];        
                $menu_links = NavbarDetailModel::create($data);               
            }

        }

        if($menu_links){
            return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Your menu has been created successfully',]);
        }
    }

    function create(Request $request)
    {
        return view('admin.navbar.create', array('data' => []));
    }


    
    function get_navbar(Request $request)
    {
        $navbar = NavbarModel::where('is_selected',1)->first();
        $nav_detail = NavbarDetailModel::where('navbar_id', $navbar->id)->get();
        
        return response()->json(['data' => $nav_detail, 'status' => true, 'message' => 'Data fetched successfully']);
    }



    

    
    function update_status(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'id' => 'required'
        ]);


        if ($validator->fails()) {
            return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Sorry, we are unable to update your menu status.']);
        } else {

            if($request->status == 1){
                $updated =  NavbarModel::where("is_selected", 1)->update(['is_selected' => 0]);
                $updated =  NavbarModel::where("id", $request->id)->update(['is_selected' => 1]);
            }else{
                $updated =  NavbarModel::where("id", $request->id)->update(['is_selected' => 0]);    
            }
        
        }

        if($updated){
            return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Your menu status has been updated successfully.',]);
        }else{
            return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Sorry, we are unable to update your menu status.',]);    
        }
    }



    function update(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {

            NavbarModel::where("id", $request->navbar_id)->update(['title' => $request->title, 'slug' => $request->slug, "navbar_html"=> $request->navbar_html]);
            $data = NavbarDetailModel::where("navbar_id", $request->navbar_id)->delete();
            
            $menu_links = $request->menu_links;
            foreach ($menu_links as $key => $value) {
                $data = ['name'=>$value['name'], 'slug'=> $value['slug'], 'navbar_detail_id' => $value['id'], 'parent_id' => $value['parent_id'],'navbar_id'=> $request->navbar_id];        
                $menu_links = NavbarDetailModel::create($data);               
            }
        }

        if($menu_links){
            return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Your menu has been updated successfully',]);
        }
    }


    function delete($id, Request $request)
    {

        
        if(!auth()->user()->can('navbar-delete')){
            abort(403);
        }


        if (isset($request->ids)) {
            $ids = $request->ids;
            if (count($ids) > 0) {
                $data =  NavbarModel::whereIn('id', $ids)->delete();
            }
        } else {

            $data = NavbarModel::findOrFail($id)->delete();
        }

        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Deleted Successfully',]);
    }
}
