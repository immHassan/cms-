<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Clients as ModelsClients;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class Users extends Controller
{


    function __construct()
    {
          $this->middleware('permission:user-read', ['only' => ['index']]);
    }

    // function __construct()
    // {
    //      $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:product-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    // }






    function publish(Request $request, $id)
    {

        $rec = User::where("id", $request->id)->first();
        if($rec->is_published == 0){
            $pub = 1;
            $msg = 'User has been published successfully';
        }
        else{
            $pub = 0;
            $msg = 'User has been unpublished';            
        }
        $data = [
            'is_published' => $pub,
        ];
        $updated = User::where("id", $request->id)->update($data);
        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => $msg]);
    }

    function index(Request $request)
    {





        $user = User::find(Auth::user()->id);

        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();


        if ($request->ajax()) {

            $data =  User::latest();





            if (request()->has('search_id')) {

                if (request()->get('search_id')) {
                    $data->where('id', 'LIKE', "%" . request()->get('search_id') . "%");
                }
            }

            if (request()->has('search_name')) {

                if (request()->get('search_name')) {
                    $data->where('name', 'LIKE', "%" . request()->get('search_name') . "%");
                }
            }



            if (request()->has('search_email')) {
                if (request()->get('search_email')) {
                    $data->where('email', 'LIKE', "%" . request()->get('search_email') . "%");
                }
            }



            if (request()->has('search_date')) {
                if (request()->get('search_date')) {

                    $from  = date('Y-m-d H:i:s', strtotime(explode("-", request()->get('search_date'))[0]));
                    $to  = date('Y-m-d H:i:s', strtotime(explode("-", request()->get('search_date'))[1]));
                    if($from == $to){
                           $data->whereDate('created_at', $from);
                    }else{
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

                ->addColumn('role', function ($row) {
                    return json_decode($row->roles->pluck('name'));
                })


                ->addColumn('name', function ($row) {
                    return '<div> ' . $row->name . ' </div>  <div> <span class="badge badge-info">' . $row->email . '</span> </div>';
                })

                
                ->addColumn('publish', function ($row) {
                    $publish = $row->is_published == 1?"Published":"Not Published";
                    $bgcolor = $row->is_published == 1?"btn-info":"btn-danger";
                    return '<a class="btn btn-sm '.$bgcolor.'" onclick="publish(this,' . $row->id . ')" href="#">'.$publish.'</a> ';
                })


                ->addColumn('action', function ($row) {

                    $content  ='';
                    if(auth()->user()->can('user-update')){
                        $content  .=' <button type="button" class="btn btn-info btn-sm" onclick="Edit(' . $row->id . ')" title="Edit"><i class="fa fa-edit"></i></button>';
                    }

                    if(auth()->user()->can('user-delete')){
                        $content  .='<button type="button" class="btn btn-danger btn-sm" onclick="Delete(' . $row->id . ')" title="Delete"><i class="fa fa-trash-o text-white"></i></button>';
                    }
                    return $content;
                })
                ->rawColumns(['id', 'action', 'name', 'role','publish'])
                ->make(true);

            return $datatable;
        }


        $roles = Role::all();
        return view('admin.users.index', array('roles' => $roles));
    }




    function by_id(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->roles->pluck('id', 'name');

        return response()
            ->json(['data' => $user, 'status' => true, 'message' => 'Fetched Successfully',]);
    }




    function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
            $user = User::create($data);

            $role = Role::find($request->role);

            $user->assignRole($role);
        }

        return response()
            ->json(['data' => [], 'status' => true, 'message' => 'User has created successfully',]);
    }



    function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|unique:clients,email,' . $request->id,
            'role' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            $user = User::where("id", $request->id)->update($data);
            DB::table('model_has_roles')->where('model_id', $request->id)->delete();

            $role = Role::find($request->role);
            $user = User::findOrFail($request->id);
            $user->assignRole($role);
        }

        return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Updated Successfully',]);
    }




    function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false, 'message' => 'Validation errors',
            ]);
        } else {
            $data = [
                'password' => Hash::make($request->password),
            ];
            User::where("id", $request->id)->update($data);
        }

        return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Updated Successfully',]);
    }



    function delete($id, Request $request)
    {

        
        if(!auth()->user()->can('user-delete')){
            abort(403);
        }

        if (isset($request->ids)) {
            $ids = $request->ids;
            if (count($ids) > 0) {
                $data = User::whereIn('id', $ids)->delete();
            }
        } else {

            $data = User::findOrFail($id)->delete();
        }

        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Deleted Successfully',]);
    }





    function assign_resource(Request $request)
    {
      echo 1;
      exit;
        // ModelsInvoices::where('slug', $slug)->update(array('email_view' => 1));
        // return true;
    }






}
