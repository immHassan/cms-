<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Custom_block;
use App\Models\Banner;
use App\Models\News;
use App\Models\Navbar;
use App\Models\Meta_tags;
use App\Models\Page as pageModel;
use App\Models\Page_contents;
use App\Models\Page_templates;
use App\Models\Hit_Record;

use Illuminate\Http\Request;
use Validator;
use DataTables;
use File;

class PagesController extends Controller
{

    /**
     * Show the profile for a given user.
     */
    function __construct()
    {
          $this->middleware('permission:cms-read', ['only' => ['index']]);
    }




    function publish(Request $request, $id)
    {

        $rec = pageModel::where("id", $request->id)->first();
        if($rec->is_published == 0){
            $pub = 1;
            $msg = 'Page has been published successfully';
        }
        else{
            $pub = 0;
            $msg = 'Page has been unpublished';            
        }
        $data = [
            'is_published' => $pub,
        ];
        $updated = pageModel::where("id", $request->id)->update($data);
        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => $msg]);
    }


    function validate_slug(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'slug' => 'required|string|max:255|unique:pages,slug',
        ]);
        if ($validator->fails()) {
            return response()
            ->json(['data' => [], 'status' => false, 'message' => 'Slug already exist']);
        } else {
            return response()
                ->json(['data' => [], 'status' => true, 'message' => 'Slug does not exist']);
        }
    }





    function create_version(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'version_name' => 'required|string|max:255',
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false,
                'message' => 'Validation errors',
            ]);
        } else {
            $version_name = $request->version_name;
            $page_id = $request->id;

            $page_data = Page_contents::where('page_id', $page_id)->where('is_selected', 1)->first();

            $updated = Page_contents::where("page_id", $page_id)->update(array('is_selected' => 0));

            $new_version = array(
                'page_id' => $page_id,
                'version' => $version_name,
                'is_selected' => '1',
                'page_data' => $page_data->page_data,
                'custom_css' => $page_data->custom_css,
                'custom_js' => $page_data->custom_js,
                'custom_cdn' => $page_data->custom_cdn
            );


            $pages_content = Page_contents::insert($new_version);

        }

        return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Your page version has been created Successfully']);
    }



    function update_version(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false,
                'message' => 'Validation errors',
            ]);
        } else {

            $page_id = $request->id;

            $page_content = Page_contents::where('id', $page_id)->first();

            $unselected = Page_contents::where("page_id", $page_content->page_id)->update(array('is_selected' => 0));

            $selected = Page_contents::where("id", $page_id)->update(array('is_selected' => 1));

        }

        return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Your page version has been updated Successfully']);
    }







    function index(Request $request)
    {
        if ($request->ajax()) {
            $data = pageModel::latest();

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
                ->addColumn('version', function ($row) {
                    return ' <div class="client-group">
                <input type="checkbox" class="multidelete" id="' . $row->id . '" value="' . $row->id . '" >
                <label for="' . $row->id . '">' . $row->id . ' </span>
                </label></div>';
                })


                ->addColumn('version', function ($row) {

                    $versions = Page_contents::where('page_id', $row->id)->get();
                    $content = '';

                    // <span class="badge badge-secondary">Update Version   <i class="fa fa-arrow-down"></i></span>
    
                    $content .= '
                <div class="sales">
                <select id="page_version" class="form-control" >';

                    foreach ($versions as $version) {
                        if ($version->is_selected == 1) {

                            if ($version->is_published == 1) {

                                $content .= '<option class="published" data-status="true" selected value="' . $version->id . '"> ' . $version->version . '</option>';
                            } else {

                                $content .= '<option selected value="' . $version->id . '"> ' . $version->version . '</option>';
                            }

                        } else {
                            $content .= '<option value="' . $version->id . '"> ' . $version->version . '</option>';
                        }
                    }
                    $content .= '</select> </div>';

                    return $content;
                })





                ->addColumn('edit_design', function ($row) {

                    return '<a class="btn btn-info btn-sm" href="' . url('/') . '/cms/edit/' . $row->slug . '">
                    <i class="fa fa-edit"></i>
                  </a> ';
                })
                ->addColumn('action', function ($row) {
                    $content = '';
                    $content .=


                        '<div class="item-action dropdown">
                                                        <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(14px, 19px, 0px);">
                                            <a href="javascript:void(0)"   id="add-new-version" data-id="' . $row->id . '"  class="dropdown-item"><i class="dropdown-icon fa fa-plus"></i> New Version </a>
                                            <div class="dropdown-divider"></div>';
                                          
                                            if(auth()->user()->can('cms-read')){
                                                $content .= ' <a href="' . url('/') . '/page/' . $row->slug . '" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Page </a>';
                                            }
                                          

                                            if(auth()->user()->can('cms-update')){
                                            $content .= '  <a href="javascript:void(0)" onclick="Edit(' . $row->id . ')" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Edit</a> ';
                                            }

                                            
                                            if(auth()->user()->can('cms-delete')){
                                            $content .= '  <a href="javascript:void(0)" onclick="Delete(' . $row->id . ')" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>';
                                            }

                                            $content .= '</div>
                                                    </div>';
                    return $content;
                })
                
                ->addColumn('publish', function ($row) {
                    $publish = $row->is_published == 1?"Published":"Not Published";
                    $bgcolor = $row->is_published == 1?"btn-info":"btn-danger";
                    return '<a class="btn btn-sm '.$bgcolor.'" onclick="publish(this,' . $row->id . ')" href="#">'.$publish.'</a> ';
                })

                ->rawColumns(['id', 'image', 'version', 'edit_design', 'action','publish'])
                ->make(true);

            return $datatable;
        }
                
        $page_templates = Page_templates::all();
        return view('admin.cms.index',array('page_templates' => $page_templates));
    }



    function delete($id, Request $request)
    {

        
        if(!auth()->user()->can('cms-delete')){
            abort(403);
        }

        if (isset($request->ids)) {
            $ids = $request->ids;
            if (count($ids) > 0) {
                pageModel::whereIn('id', $ids)->delete();
            }
        } else {
            pageModel::findOrFail($id)->delete();
        }
        return response()
            ->json(['data' => [], 'status' => true, 'message' => 'Page has been deleted Successfully']);
    }




    function update(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false,
                'message' => 'Validation errors',
            ]);
        } else {
            $date = $request->custom_date;
            $date = explode(' - ', $date);
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'is_visible' => $request->is_visible == 'on' ? 1 : 0
                // 'start_date' => $date[0],
                // 'end_date' => $date[1],
            ];
            $updated = pageModel::where("id", $request->id)->update($data);


            $meta_tag_record = [];
            if (isset($request->meta_tag_name)) {
                if ($request->meta_tag_name > 0) {

                    for ($i = 0; $i < count($request->meta_tag_name); $i++) {
                        $meta_tag_record[] = array('meta_tag_name' => $request->meta_tag_name[$i], 'meta_tag_content' => $request->meta_tag_content[$i], 'entity_id' => $request->id, 'entity_name' => 'page');
                    }

                }
            }

            Meta_tags::where('entity_id', $request->id)->delete();
            Meta_tags::insert($meta_tag_record);

        }

        return response()
            ->json(['data' => $updated, 'status' => true, 'message' => 'Page has been updated Successfully']);
    }




    function by_id(Request $request, $id)
    {
        $data = pageModel::findOrFail($id);
        $meta_tags = Meta_tags::where('entity_id', $id)->get();

        return response()
            ->json(['data' => $data, 'meta_tags' => $meta_tags, 'status' => true, 'message' => 'Data fetched successfully']);
    }




    public function all_pages()
    {
        $all_pages = pageModel::all();
        return view('cms.all_pages', array('all_pages' => $all_pages));
    }

    public function create(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false,
                'message' => 'Validation errors',
            ]);
        }

        if ($_POST) {
            $date = $request->custom_date;
            $date = explode(' - ', $date);
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'is_visible' => $request->is_visible == 'on' ? 1 : 0
                // 'start_date' => $date[0],
                // 'end_date' => $date[1],
            ];


            $page = pageModel::create($data);



            $template = Page_templates::where('slug', $request->template_name)->first();



            $page_content = array('page_id' => $page->id, 'version' => '0.1', 'is_selected' => '1', 'page_data' => (isset($template->page_data)) ? $template->page_data : '', 'custom_css' => (isset($template->custom_css)) ? $template->custom_css : '', 'custom_js' => (isset($template->custom_js)) ? $template->custom_js : '', 'custom_cdn' => (isset($template->custom_cdn)) ? $template->custom_cdn : '');

            $pages_content = Page_contents::insert($page_content);

            $service_links_record = [];
            if (isset($request->meta_tag_name)) {
                if ($request->meta_tag_name > 0) {
                    for ($i = 0; $i < count($request->meta_tag_name); $i++) {
                        $service_links_record[] = array('meta_tag_name' => $request->meta_tag_name[$i], 'meta_tag_content' => $request->meta_tag_content[$i], 'entity_id' => $page->id, 'entity_name' => 'page');
                    }
                }
            }

            Meta_tags::insert($service_links_record);

            return redirect()->route('cms.edit', ['slug' => $page->slug]);
        } else {
            return back()->withInput();
        }
    }

    public function edit($slug)
    {
        
        if(!auth()->user()->can('cms-update')){
            abort(403);
        }

        $page = pageModel::where('slug', $slug)->first();
        $page_data = Page_contents::where('page_id', $page->id)->where('is_selected', 1)->first();
        $custom_blocks = Custom_block::get();

        if ($page_data) {
            return view('admin.cms.edit', array('page_data' => $page_data, 'page_slug' => $slug, 'custom_blocks' => $custom_blocks));
        } else {
            echo "<h2>Page Not Found </h2>";
        }
    }

    public function view($slug)
    {
        $page_data = pageModel::where('slug', $slug)->first();

        if ($page_data) {
            return view('cms.view', $page_data);
        } else {
            echo "<h2>Page Not Found </h2>";
        }
    }

    public function publish_page(Request $request)
    {

        $page = pageModel::where('slug', $request->slug)->first();
        $result = Page_contents::where('page_id', $page->id)->where('is_selected', 1)->first();

        if ($result->page_data == null) {
            return response()->json(
                array(
                    'success' => false,
                    'data' => [],
                    'message' => 'Please save your content first.'
                )
            );
        }

        $all_un_published = Page_contents::where('page_id', $page->id)->update(['is_published' => 0]);

        $published_new_one = Page_contents::find($result->id)->update(['is_published' => 1]);



        $cssFileName = $page->id . '.css';
        $cssFileStorePath = base_path('public\pages\css\\' . $cssFileName);
        File::delete($cssFileStorePath);
        $res = File::put($cssFileStorePath, $result->custom_css);


        $jsFileName = $page->id . '.js';
        $jsFileStorePath = base_path('public\pages\js\\' . $jsFileName);
        File::delete($jsFileStorePath);
        $res = File::put($jsFileStorePath, $result->custom_js);

        $meta_tags = Meta_tags::where('entity_id', $page->id)->get();

        $page_content = view('admin.cms.page_template', array('page_data' => $result, 'meta_tags' => $meta_tags, 'page' => $page));

        $fileName = $page->id . '.blade.php';
        $fileStorePath = base_path('resources\views\pages\\' . $fileName);

        File::delete($fileStorePath);
        $res = File::put($fileStorePath, $page_content);


        if (isset($res)) {
            return response()->json(
                array(
                    'success' => true,
                    'data' => [],
                    'message' => 'Your page has been published successfully'
                )
            );
        } else {
            return response()->json(
                array(
                    'success' => false,
                    'data' => [],
                    'message' => 'Unable to publish your page'
                )
            );
        }
    }






    public function create_block(Request $request)
    {

        $res = Custom_block::insert(array('block_data' => json_encode($request->custom_html), 'name' => $request->component_name));

        if ($res) {
            return response()->json(
                array(
                    'success' => true,
                    'data' => [],
                    'message' => 'Your component has been created successfully'
                )
            );
        } else {
            return response()->json(
                array(
                    'success' => false,
                    'data' => [],
                    'message' => 'Unable to save your component'
                )
            );
        }
    }



    public function save(Request $request)
    {

        if ($request->type == "basic") {


            $page_data = $request->all();
            $page = pageModel::where('slug', $request->slug)->first();

            $result = Page_contents::where('page_id', $page->id)->where('is_selected', 1)->update(['page_data' => $page_data]);

            return response()->json(
                array(
                    'success' => true,
                    'data' => [],
                    'message' => 'Updated successfully'
                )
            );

        } else {

            $page = pageModel::where('slug', $request->slug)->first();
            $res = Page_contents::where('page_id', $page->id)->where('is_selected', 1)->update(['custom_css' => replace_text($request->custom_css), 'custom_js' => replace_text($request->custom_js), 'custom_cdn' => replace_text($request->custom_cdn)]);

        }

        if (isset($res)) {
            return response()->json(
                array(
                    'success' => true,
                    'data' => [],
                    'message' => 'Updated successfully'
                )
            );
        } else {
            return response()->json(
                array(
                    'success' => false,
                    'data' => [],
                    'message' => 'Unable to update page data'
                )
            );
        }
    }



    public function get_component(Request $request)
    {
        $component_name = $request->component_name;
        if ($component_name == "banner_slider") {
            $banners = Banner::all();
            return view('admin.cms.components.' . $component_name, array('banners' => $banners));
        } else if ($component_name == "news_slider") {
            $news = News::all();
            return view('admin.cms.components.' . $component_name, array('news' => $news));
        } else if ($component_name == "custom_navbar") {
            $navbar = Navbar::where('is_selected', 1)->first();
            return view('admin.cms.components.' . $component_name, array('navbar' => $navbar));
        } else {
            return view('admin.cms.components.' . $component_name);
        }
    }





    public function page_view($slug)
    {

        $page = pageModel::where('slug', $slug)->first();
       
        $page_data = Page_contents::where('page_id', $page->id)->where('is_selected', 1)->first();
        
        $meta_tags = Meta_tags::where('entity_id', $page->id)->get();
        
        if ($page_data) {
            try {
                if($page->is_published == 1){
                    $user_id =auth()->check()?auth()->user()->id:request()->ip();
                    $data = [
                        'user_id' => $user_id,
                        'entity_id' => $page->id,
                        'entity_name' => 'Page'
                    ];
                    
                    $hit_record = Hit_Record::insert($data);
                    return view('pages.' . $page->id, array('page_data' => $page_data, 'meta_tags' => $meta_tags, 'page' => $page));
                }else{
                    return redirect(route('cms.list'))->with('errors','Page is not Published');
                }
            } catch (\Throwable $th) {
                echo "<h2 style='padding-top:5%; text-align:center;'> The page has not published. </h2>";
            }

        } else {
            echo "<h2>Page Not Found </h2>";
        }
    }


}