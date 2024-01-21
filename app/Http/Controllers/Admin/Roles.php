<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Clients as ModelsClients;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class Roles extends Controller
{


    function __construct()
    {
          $this->middleware('permission:role-read', ['only' => ['index']]);
    }


    function new(Request $request)
    {
        return view('admin.roles.create');
    }


    function edit(Request $request, $id)
    {

        $data['role'] = Role::find($id);
        $data['permission'] = Permission::get();
        $data['rolePermissions'] = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit',array('data'=>$data));
    }
    function index(Request $request)
    {

        // $permissions = Permission::get();

        // echo "<pre>";
        // print_r($permissions);
        // exit;

        if ($request->ajax()) {

            $data =  Role::latest();
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



                    $content  ='';

                    
                    if(auth()->user()->can('role-update')){
                        $content  .='  <a href="'.route('roles.edit',[$row->id]).'" >
                     <button type="button" class="btn btn-info btn-sm"  title="Edit"><i class="fa fa-edit"></i></button>
                    </a>';
                    }

                    if(auth()->user()->can('role-delete')){
                        $content  .=' <button type="button" class="btn btn-primary btn-sm" onclick="Delete(' . $row->id . ')" title="Delete"><i class="fa fa-trash-o text-white"></i></button>';                    
                    }

                    return $content;
                })
                ->rawColumns(['id', 'action'])
                ->make(true);

            return $datatable;
        }


        $permissions = Permission::get();
        return view('admin.roles.index', array('permissions' => $permissions));
    }




    function by_id(Request $request, $id)
    {


        $data['role'] = Role::find($id);
        $data['permission'] = Permission::get();
        $data['rolePermissions'] = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();



        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Fetched Successfully',]);
    }




    function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permission);
        }
        return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Your role has created successfully',]);
    }



    function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name,'.$request->id
        ]);


        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {
            
            $role = Role::find($request->id);
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($request->permission);
        }

        return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Updated Successfully',]);
    }


    function delete($id, Request $request)
    {

        
        if(!auth()->user()->can('role-delete')){
            abort(403);
        }



        if (isset($request->ids)) {
            $ids = $request->ids;
            if (count($ids) > 0) {
                $data = Role::whereIn('id', $ids)->delete();
            }
        } else {

            $data = Role::findOrFail($id)->delete();
        }

        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Deleted Successfully',]);
    }
}
