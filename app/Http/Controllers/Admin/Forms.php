<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services as ServiceModel;
use App\Models\Forms as FormsModel;
use App\Models\Form_data as FormDataModel;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class Forms extends Controller
{



    function __construct()
    {
          $this->middleware('permission:form-read', ['only' => ['index']]);
    }


    function publish(Request $request, $id)
    {

        $rec = FormsModel::where("id", $request->id)->first();
        if($rec->is_published == 0){
            $pub = 1;
            $msg = 'Form has been published successfully';
        }
        else{
            $pub = 0;
            $msg = 'Form has been unpublished';            
        }
        $data = [
            'is_published' => $pub,
        ];
        $updated = FormsModel::where("id", $request->id)->update($data);
        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => $msg]);
    }


    function get_component(Request $request)
    {

        $form_data = FormsModel::where('slug', $slug)->first();
        if ($form_data) {
            $form_records = FormDataModel::where('form_id', $form_data->id)->get();
        } else {
            echo "invalid url";
            exit;
        }

        return view('admin.forms.form_records', array('form_records' => $form_records));
    }


    function design_form(Request $request)
    {

        
        $services = ServiceModel::all();

        return view('admin.forms.design_form', array('service_list' => $services));

    }



    


    function record_list(Request $request)
    {
        if ($request->ajax()) {
            $data = FormDataModel::latest();
            if (request()->has('id')) {

                if (request()->get('id')) {
                    $data->where('id', 'LIKE', "%" . request()->get('id') . "%");
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


            $count = Model::where('status','=','1')->count();


            $datatable = DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('id', function ($row) {
                    return ' <div class="client-group">
                      <input type="checkbox" class="multidelete" id="' . $row->id . '" value="' . $row->id . '" >
                      <label for="' . $row->id . '">' . $row->id . ' </span>
                      </label></div>';
                })

                ->addColumn('view_record', function ($row) {
                    return '
                    <a class="btn btn-primary btn-sm" onclick="view_record('.$row->id.')">
                    View ('.FormDataModel::where('form_id', $row->id)->count().')
                    </a>';
                })

                ->addColumn('action', function ($row) {
                    $content = '';
                    $content .= ' <div class="d-flex align-items-center justify-content-end">
                        <div class="input-group-prepend">
                          <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                            Action
                          </button>
                          <ul class="dropdown-menu">
                            <li class="dropdown-item">
  
                              <a class="btn btn-primary btn-sm" href="' . url('/') . '/form/view/' . $row->slug . '">
                                <i class="fas fa-folder"></i>
                                View
                              </a>';


                    // if (Auth::user()->can('Service-edit')) {
    
                    $content .= '<a class="btn btn-info btn-sm" href="' . url('/') . '/form/edit/' . $row->slug . '">
                                    <i class="fas fa-pencil-alt"></i> Edit</a> ';
                    // }
    

                    // if (Auth::user()->can('Service-delete')) {
    
                    $content .= '<a class="btn btn-danger btn-sm" onclick="Delete(' . $row->id . ')" href="#">
                                    <i class="fas fa-trash"></i> Delete</a>';
                    // }
    
                    $content .= '</li>
                                            </ul>
                                            </div>
                                        </div>';

                    return $content;
                })

                ->rawColumns(['id', 'action','view_record'])
                ->make(true);

            return $datatable;
        }

    }




    function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FormsModel::latest();
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

                    $from = date('Y-m-d H:i:s', strtotime(explode("-", request()->get('search_date'))[0]));
                    $to = date('Y-m-d H:i:s', strtotime(explode("-", request()->get('search_date'))[1]));
                    if ($from == $to) {
                        $data->whereDate('created_at', $from);
                    } else {
                        $data->whereBetween('created_at', [$from, $to]);
                    }
                }
            }


            $datatable = DataTables::of($data)
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

                ->addColumn('form_records', function ($row) {

                    $form_records_count = FormDataModel::where('form_id', $row->id)->count();
                    return '
                    <a href="' . url('/') . '/form/records/' . $row->slug . '">
                    <span   style="cursor:pointer" class="tag tag-success">('.$form_records_count.') Records</span>
                    </a>';
                })

                

                ->addColumn('content', function ($row) {
                    return strip_tags($row->content);
                })
                ->addColumn('action', function ($row) {
                    
                    
                    $content  ='';
                    if(auth()->user()->can('form-read')){
                        $content  .='<a type="button" class="btn btn-info btn-sm" href="' . url('/') . '/form/view/' . $row->slug . '" title="View"><i class="fa fa-external-link"></i></a>';
                    }
                    
                    if(auth()->user()->can('form-update')){
                        $content  .=' <a type="button" class="btn btn-info btn-sm" href="' . url('/') . '/form/edit/' . $row->slug . '" title="Edit"><i class="fa fa-edit"></i></a>';
                    }

                    if(auth()->user()->can('form-delete')){
                        $content  .= '<a href="javascript:void()" type="button" class="btn btn-primary btn-sm" onclick="Delete(' . $row->id . ')"   title="Delete"><i class="fa fa-trash text-white"></i></a>';
                    }

                    return $content;

                })

                
                ->addColumn('publish', function ($row) {
                    $publish = $row->is_published == 1?"Published":"Not Published";
                    $bgcolor = $row->is_published == 1?"btn-info":"btn-danger";
                    return '<a class="btn btn-sm '.$bgcolor.'" onclick="publish(this,' . $row->id . ')" href="#">'.$publish.'</a> ';
                })


                ->rawColumns(['id', 'action','form_records','publish'])
                ->make(true);

            return $datatable;
        }

        $servicelist = ServiceModel::all();

        return view('admin.forms.index', array('servicelist' => $servicelist));
    }

    // function upload(Request $request)
    // {
    //     $image = $request->file('file');
    //     $imageName = time() . '.' . $image->extension();
    //     $image->move(public_path('uploads/services'), $imageName);
    //     return response()->json(['success' => true, 'image_name' => $imageName]);
    // }


    
    
    

  function form_records(Request $request, $slug)
    {

        $form_data = FormsModel::where('slug', $slug)->first();
        if ($form_data) {
            $form_records = FormDataModel::where('form_id', $form_data->id)->get();
        } else {
            echo "invalid url";
            exit;
        }

        return view('admin.forms.form_records', array('form_records' => $form_records));
    }


    function submit_form(Request $request, $slug)  
    {

        $form_data = FormsModel::where('slug', $slug)->first();
        if ($form_data) {
            $form = array('form_id' => $form_data->id, 'form_data' => json_encode($request->all()));
            $inserted = FormDataModel::create($form);
            if ($inserted) {
                return response()->json(['data' => $inserted, 'status' => true, 'message' => 'Form has been submitted successfully',]);
            } else {
                return response()->json(['data' => $inserted, 'status' => false, 'message' => 'Unable to submit your form.',]);
            }
        } else {
            return response()->json(['data' => [], 'status' => false, 'message' => 'Unable to submit your form.',]);
        }

    }


    function create(Request $request)
    {



        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'form_html' => 'required|string|max:9000',
            'service_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false,
                'message' => 'Validation errors',
            ]);
        } else {
            $date = $request->service_date;
            $date = explode(' - ', $date);
            $data = [
                'title' => $request->title,
                'slug' => $request->slug,
                'form_html' => $request->form_html,
                'form_html_editable' => $request->form_html_editable,
                'key_values'=> json_encode($request->key_values),
                'service_id' => $request->service_id,
                'created_by' => Auth::user()->id,
            ];

            $inserted = FormsModel::create($data);
        }


        return response()
            ->json(['data' => $inserted, 'status' => true, 'message' => 'Form has been created Successfully',]);
    }


    function update(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'form_html' => 'required|string|max:9000',
            'service_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false,
                'message' => 'Validation errors',
            ]);
        } else {

            $data = [
                'title' => $request->title,
                'slug' => $request->slug,
                'form_html' => $request->form_html,
                'form_html_editable' => $request->form_html_editable,
                'key_values'=> json_encode($request->key_values),
                'service_id' => $request->service_id,
            ];
            $updated = FormsModel::where("id", $request->id)->update($data);

        }

        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => 'Your form has updated Successfully',]);
    }


    function form_view(Request $request, $slug)
    {
        $form_data = FormsModel::where('slug', $slug)->first();
        if ($form_data) {
            return view('admin.forms.form_view', array('data' => $form_data));
        } else {
            return "<h2> Invalid Url</h2>";
        }
    }






    function edit(Request $request, $slug)
    {

        
        
        $services = ServiceModel::all();

        $form_data = FormsModel::where('slug', $slug)->first();
        if ($form_data) {
            return view('admin.forms.edit_form', array('data' => $form_data, 'service_list'=>$services ));
        } else {
            return "<h2> Invalid Url</h2>";
        }
    }

    function delete($id, Request $request)
    {

        
        if(!auth()->user()->can('form-delete')){
            abort(403);
        }



        if (isset($request->ids)) {
            $ids = $request->ids;
            if (count($ids) > 0) {
                $data = FormsModel::whereIn('id', $ids)->delete();
            }
        } else {
            $data = FormsModel::findOrFail($id)->delete();
        }

        return response()
            ->json(['data' => $data, 'status' => true, 'message' => 'Form has deleted Successfully']);
    }

}