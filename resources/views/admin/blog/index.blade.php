@extends('admin.layouts.app')
@section('pageCss') 
<style>
  .badge {
    padding: 3px 7px; 
    background-color: #777;
    border-radius: 10px;
}
.glyphicon-plus:before {
  content: "\2b";
  color:#138496
}
.list-group-item > .badge {
  float: right;
}
.glyphicon-minus:before {
  content: "\2212";
}
.glyphicon {
  position: relative;
    top: 5px;
    display: inline-block;
    line-height: 0;
    -moz-osx-font-smoothing: grayscale;
    font-size: 30px;
    font-weight: bold;
}
</style>
@endsection

@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{__('languages.blogs_list')}}</h3>
           
            @if(auth()->user()->can('blogs-delete'))
            <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>
            @endif
            
           
            <div class="card-options">
              <div class="input-group">
                
                
                @if(auth()->user()->can('blogs-write'))
                <button type="button" class="btn btn-primary create_modal" data-toggle="modal" data-target="#createModal"><i class="fe fe-plus mr-2"></i>{{__('languages.add')}}</button>
                
                @endif
             
            </div>
        </div>
        </div>
        <div class="float-right">
            <div class="invoices-search float-right">
              <div class="feild-s advanced-search-toggle">
                <div class="feild-i">
                  <i class="fa fa-cog" aria-hidden="true"></i>
                </div>
                <h6>{{__('languages.advancedsearch')}}</h6>
              </div>
            </div>
        </div>
        <div class="search-details">
          <div class="row">
            <div class="col-md-6">
              <div class="pop-field-input">
                <label> {{__('languages.id')}} </label>
                <input type="text" class="form-control" name="search_id" placeholder="{{__('languages.id')}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="pop-field-input">
                <label> {{__('languages.title')}} </label>
                <input type="text" class="form-control" name="search_title" placeholder="{{__('languages.title')}}">
              </div>
            </div>
            <div class="col-md-12 mt-2">

              <div class="pop-field-input">
                <label for=""> {{__('languages.date')}} </label>
                <div id="reportrange" class="form-control" style="background: #fff; cursor: pointer;">
                  <i class="fa fa-calendar"></i>&nbsp;
                  <span></span> <i class="fa fa-caret-down"></i>
                </div>
              </div>
            </div>

            <div class="col-md-12 mr-3 mt-3">
              <div class="float-right">
                <button class="btn btn-primary" id="searchBtn">{{__('languages.search')}}</button>
              </div>
            </div>

          </div>
      </div>
        <div class="card-body">
          @if (session()->has('errors'))
              <div class="alert alert-dismissable alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      
                  </button>
                  <strong>
                      {{ session('errors') }}
                  </strong>
              </div>
          @endif
          @if (session()->has('success'))
              <div class="alert alert-dismissable alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      
                  </button>
                  <strong>
                      {{ session('success') }}
                  </strong>
              </div>
          @endif
          <div class="table-responsive">
              <table id="listTable" class="table table-hover table-vcenter text-nowrap mb-0 data-table">
              <thead>
              <tr>
              <th> <span>{{__('languages.id')}}</span> </th>
              <th> <span>{{__('languages.image')}}</span> </th>
              <th> <span>{{__('languages.author')}}</span> </th>
              <th> <span>{{__('languages.title')}}</span> </th>
              <th> <span>{{__('languages.category')}}</span> </th>
              <th> <span>{{__('languages.createddate')}} </span></th>
              @if(auth()->user()->can('blogs-publish'))
              <th> <span>{{__('languages.publish_blog')}}</span></th>
              @endif 
                             
                
              <th> <i class="icon-settings"></i></th>
              </tr>
            </thead>
                  <tbody>
                      
                  </tbody>
              </table>
          </div>
        </div>
    </div>
  </div>
</div>
                         
<!-- add update modal -->
<div class="modal fade" id="createModal"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:120%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{__('languages.blog')}}</h5>
        <div class="">
          <a type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
          <a id="saveBtn" class="btn btn-success" href="javascript:void(0)"></a>
        </div>
      </div>
      <div class="modal-body">  
        <div class="section-body">
          <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
              <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" id="Project-tab" data-toggle="tab" href="#Image-Tab">Image</a></li>
                <li class="nav-item"><a class="nav-link" id="Project-tab" data-toggle="tab" href="#Detail-Tab">Detail</a></li>
                <li class="nav-item"><a class="nav-link" id="Project-tab" data-toggle="tab" href="#Meta-Tag-Tab">Meta Tags</a></li>
              </ul>
            </div>
          </div>
        </div>
        <form id="reloadform" enctype="multipart/form-data">
          @csrf
          <div class="tab-content">
            <div class="laravel_validation mt-3 ml-3"></div>
            <div class="tab-pane fade show active" id="Image-Tab" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  @include('admin.custom_image')
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="Detail-Tab" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <div class="row">                             
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""> {{__('languages.select_category')}}</label>
                        <select name="blog_category" class="form-control selectcategories">                 
                          <option class="d-none" value="">Select Category</option>
                          @foreach($categorylist as $key => $category)
                          <option class="{{$category}}" value="{{$key}}">{{$category}}</option>
                          @endforeach
                        </select>                                
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""> {{__('languages.author')}}</label>
                        <input type="text" name="author" class="form-control" placeholder="{{__('languages.author')}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for=""> {{__('languages.title')}}</label>
                          <input type="text" name="title" class="form-control" placeholder="{{__('languages.title')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for=""> {{__('languages.slug')}}</label>
                          <input type="text" name="slug" class="form-control" placeholder="{{__('languages.slug')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">{{__('languages.availability_start_date')}}</label>
                        <input type="text" class="form-control" name="start_date">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">{{__('languages.availability_end_date')}}</label>
                        <div class="input-group">
                          <input type="text" readonly name="end_date" class="form-control" aria-describedby="inputGroupPrepend">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend" style="cursor:pointer;border-right: 1px solid #e9ecef;border-radius: 3px;" onclick="cleartext()">Clear</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 mt-3">
                      <label class="custom-switch">
                          <label for=""> {{__('languages.is_featured')}}</label>
                      <input id="is_featured" class="toggle-check custom-switch-input" name="is_featured" onclick="onOff(this)" type="checkbox">
                      <span class="custom-switch-indicator ml-2 mb-1"></span>
                      <div class="on ml-1"></div>
                    </label>
                    </div>
                    <div class="col-md-4 mt-3">
                      <label class="custom-switch">
                        <label for=""> {{__('languages.is_published')}}</label>
                        <input id="is_published" class="toggle-check custom-switch-input" name="is_published" onclick="onOff(this)" type="checkbox">
                        <span class="custom-switch-indicator ml-2 mb-1"></span>
                        <div class="on ml-1"></div>
                      </label>
                    </div>
                    <div class="col-md-4 mt-3">
                      <label class="custom-switch">
                        <label for=""> {{__('languages.is_commentable')}}</label>
                        <input id="is_commentable" class="toggle-check custom-switch-input" name="is_commentable" onclick="onOff(this)" type="checkbox">
                        <span class="custom-switch-indicator ml-2 mb-1"></span>
                        <div class="on ml-1"></div>
                      </label>
                    </div>
                    <div class="col-12 col-sm-12">
                      <div class="form-group">

                        <label for=""> {{__('languages.content')}}</label> 
                        <textarea id="content" name="content" placeholder="">
                        </textarea>
                      </div>
                    </div>
                     
                  </div>  
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="Meta-Tag-Tab" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <div class="col-12 col-sm-12">
                    <div class="form-group">
                      <label for=""> {{__('languages.meta_tags')}}</label>
                      <table  class="table">
                          <tr> 
                          <th>{{__('languages.meta_name')}} </th>
                          <th>{{__('languages.meta_content')}}</th> 
                          <th>{{__('languages.action')}}</th> 
                          </tr>  
                          <tbody id="meta_tags_table">
                          <tr>
                          <td> <input type="text" class="form-control" name="meta_tag_name[]" value="Description" placeholder="{{__('languages.enter_tag_name')}}" /> </td>
                          <td>  <input type="text" class="form-control" name="meta_tag_content[]" value="Web" placeholder="{{__('languages.enter_tag_content')}}" /> </td>
                          <td>  <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)" aria-hidden="true"></i> </td>
                          </tr>

                          <tr>
                          <td> <input type="text" class="form-control" name="meta_tag_name[]" value="Keywords" placeholder="{{__('languages.enter_tag_name')}}" /> </td>
                          <td>  <input type="text" class="form-control" name="meta_tag_content[]" value="key1, key2, key3" placeholder="{{__('languages.enter_tag_content')}}" /> </td>
                          <td>  <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)" aria-hidden="true"></i> </td>
                          </tr>
                          
                          <tr>
                          <td> <input type="text" class="form-control" name="meta_tag_name[]" value="Author" placeholder="{{__('languages.enter_tag_name')}}" /> </td>
                          <td>  <input type="text" class="form-control" name="meta_tag_content[]" value="Cloud Solutions" placeholder="{{__('languages.enter_tag_content')}}" /> </td>
                          <td>  <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)" aria-hidden="true"></i> </td>
                          </tr>

                          </tbody>
                      </table>
                      <button type="button" class="btn btn-success float-right meta_tags"> {{__('languages.add_more')}} </button> 
                    </div>
                  </div>                  
                </div>
              </div>
            </div>
          </div>  
          <input type="hidden" value="" class="default_image" name="default_image">
          <input type="hidden" value="0" name="image_selection">
          <input type="hidden" class="file_media" name="file">
          <input type="hidden" name="id">
          <input type="hidden" class="action" name="action" value="add">
        </form>      
      </div>
    </div>
  </div>
</div>

@endsection
@section('pageJs')
 
<script src="/assets/bundles/selectize.bundle.js"></script>
<script src="/assets/js/vendors/selectize.js"></script>
<script src="{{asset('js/bootstrap-treeview.js')}}"></script>

<script type="text/javascript">
    $(function() {
    var $searchableTree = $('#treeview-searchable').treeview({
        enableLinks: true,
        levels: 1,
        showTags: true,    
        data: <?php echo $json ?>,
      });

      var search = function(e) {
        var pattern = $('#input-search').val();
        var options = {
          ignoreCase: $('#chk-ignore-case').is(':checked'),
          exactMatch: $('#chk-exact-match').is(':checked'),
        };
        var results = $searchableTree.treeview('search', [ pattern, options ]);

        var output = '<p>' + results.length + ' matches found</p>';
          $.each(results, function (index, result) {
            output += '<p>- ' + result.text + '</p>';
          });
          $('#search-output').html(output);
      }
      $('#input-search').on('keyup', search);
      $('#btn-clear-search').on('click', function (e) {
        $searchableTree.treeview('clearSearch');
        $('#input-search').val('');
        $('#search-output').html('');
      });
    });
    var baseUrl = "{{url('/')}}"; 
    var dateRange = '';

    var table = $('.data-table').DataTable({
      processing: true,
      paging: true,
      serverSide: true,
      searching: true,
      ajax: {
        url: "{{ route('blog.list') }}",
        data: function(d) {
          d.search_id = $('input[name="search_id"]').val();
          d.search_title = $('input[name="search_title"]').val();
          d.search_date = dateRange;
        }
      },
      language: {
          
          "url": "/datatable_languages/{{str_replace('_', '-', app()->getLocale())}}/datatable.json"
      },
      columns: [{
          data: 'id',
          name: 'id'
        },
        {
          data: 'image',
          name: 'image'
        },
        {
          data: 'author',
          name: 'author'
        },
        {
          data: 'title',
          name: 'title'
        },
        {
          data: 'category',
          name: 'category'
        },
        {
          data: 'created_at',
          name: 'created_at',
          render: function(data, type, row) {
            return `<div>  ${moment(data).format('Do MMMM YYYY')} </div>   
            <div>  ${moment(data).format('h:mm:ss a')} </div>
            <div><span class="badge badge-secondary">${moment(data).fromNow()}</span></div>
            `
          }
        },


        @if(auth()->user()->can('blogs-publish'))
        {
          data: 'publish',
          name: 'publish'
        },
        @endif 


        {
          data: 'action',
          name: 'action'
        },
      ]
    });

    $(document).ready(function (e) {
      $("#reloadform").on('submit',(function(e) {
          e.preventDefault(); 
        $(`.laravel_validation`).html('');
        var is_published = document.getElementById('is_published');
        var is_featured = document.getElementById('is_featured');
        var is_commentable = document.getElementById('is_commentable');
        if(is_featured.checked == true){
          is_featured = 1;
        }else{
          is_featured = 0;
        }
        if(is_published.checked == true){
          is_published = 1;
        }else{
          is_published = 0;
        }
        if(is_commentable.checked == true){
          is_commentable = 1;
        }else{
          is_commentable = 0;
        }
        
        var form = $('#reloadform')[0];
        var formData = new FormData(form);
        formData.append('category_name', $("select[name=blog_category] :selected").attr('class'));
        formData.append('is_featured',is_featured);
        formData.append('is_published',is_published);
        formData.append('is_commentable',is_commentable);
        formData.append('content',CKEDITOR.instances.content.getData());
        $.ajax({
            url: "{{route('blog.ajax')}}",
            type: "POST",
            data:  formData,
            contentType: false,
                    cache: false,
            processData:false,
        
            success: function(response)
                {
                  if (response.status == false) {
                  for (let key of Object.entries(response.data)) {
                    $('.laravel_validation').append(`<span id="${key[0]}_err" class="text-red ">`+key[1]+` </span><br>`);
                  }
                }
                  else{
                    $("#reloadform")[0].reset(); 
                    $('#is_featured').prop('checked', false);
                    $('#is_published').prop('checked', false);
                    $('#is_commentable').prop('checked', false);      
                    $('.on').html(''); 
                    $(".dropify-clear").trigger("click");
                    $("input[name=image_selection]").val(0);        
                    $("input[name=id]").val('');
                    $('#createModal').modal('hide');
                    swal("Successfully!", response.message, "success");
                    $('#listTable').DataTable().ajax.reload();
                  } 
                },
                error: function(e) 
                {
                
                }          
        });
      }));
    });
        
    function Edit(id) { 
      $('#saveBtn').html("{{__('languages.update')}}");
      $('.action').val('update'); 
      $('#modalViewBody').html('');
      $(`.laravel_validation`).html('');

      $('#createModal').modal('show');
      var viewSettings = {
        "url": `${baseUrl}/blog/${id}`,
        "method": "GET",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/json",
          "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
      };
      $.ajax(viewSettings).done(function(response) {
        if (response.status == false) {
          swal("Error!", "{{__('languages.went_wrong')}}", "error");
        } else {
          if(response.data.image_selection == 1){
            var src = response.data.image;
            $(".file_media").val(src); 
          }else{
            var src = 'uploads/blog/'+response.data.image;
            $(".default_image").val(response.data.image);           
          }
      
          $(".dropify-wrapper").addClass("has-preview");
          $('.dropify-loader').css("display","none");
          $('.dropify-preview').css("display","block");
          $('.dropify-render').html('<img src="'+src+'">');
          $('.dropify-filename-inner').html(response.data.image);
          var is_published = document.getElementById('is_published');
          var is_featured = document.getElementById('is_featured');
          var is_commentable = document.getElementById('is_commentable');
          
          var is_published1 = is_published.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('on');
          var is_featured1 = is_featured.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('off');
          var is_commentable1 = is_commentable.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('off');
    
                      
                if(response.data.is_featured == 0){
                  $('#is_featured').prop('checked', false); // Unchecks it
                          is_featured1.innerHTML="No";
                          is_featured1.style.color="#253b52";
                }else{
                  $('#is_featured').prop('checked', true); // Checks it
                          is_featured1.style.color="green";
                          is_featured1.innerHTML="Yes";   
                }

                if(response.data.is_commentable == 0){
                  $('#is_commentable').prop('checked', false); // Unchecks it
                          is_commentable1.innerHTML="No";
                          is_commentable1.style.color="#253b52";
                }else{
                  $('#is_commentable').prop('checked', true); // Checks it
                          is_commentable1.style.color="green";
                          is_commentable1.innerHTML="Yes";   
                }
                if(response.data.is_published == 0){
                  $('#is_published').prop('checked', false); // unChecks it  
                          is_published1.innerHTML="No";
                          is_published1.style.color="#253b52";              
                }else{
                  $('#is_published').prop('checked', true); // Checks it 
                          is_published1.style.color="green";
                          is_published1.innerHTML="Yes";                
                }
                $(".selectcategories option").each(function()
                  {
                    if($(this).val() == response.data.blog_category){
                      $('select[name^="blog_category"] option[value="'+$(this).val()+'"]').attr("selected","selected");
          
                    }
                  });
                  
          $("input[name=author]").val(response.data.author);
          $("input[name=title]").val(response.data.title);
          $("input[name=slug]").val(response.data.slug);
          $("input[name=start_date]").val(response.data.start_date);
          $("input[name=end_date]").val(response.data.end_date); 
          CKEDITOR.instances.content.setData(response.data.content);
      
          $("input[name=id]").val(response.data.id);
          $("input[name=image_selection]").val(response.data.image_selection);
          let metaTags = response.meta_tags;

          $('#meta_tags_table').html('');
          for(let i=0; i<metaTags.length; i++ ){
            $('#meta_tags_table').append(`
            <tr> 
                <td> <input type="text" id="input-tags" class="form-control" name="meta_tag_name[]" value="${metaTags[i].meta_tag_name}" placeholder="{{__('languages.enter_tag_name')}}">
                </td> 
                <td><input type="text" name="meta_tag_content[]" class="form-control" value="${metaTags[i].meta_tag_content}" placeholder="{{__('languages.enter_tag_content')}}">
                </td> 
                <td> <i class="fa fa-trash removeMetaTag" class="form-control" onclick="removeMetaTag(this)"  aria-hidden="true"></i>
                </td> 
            </tr>
          `);
          }
        }

      });

    }

    function publish(obj,id) { 
      var viewSettings = {
        "url": `${baseUrl}/blog-publish/${id}`,
        "method": "PUT",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/json",
          "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
      };
      $.ajax(viewSettings).done(function(response) {
        if (response.status == false) {
          swal("Error!", "{{__('languages.went_wrong')}}", "error");
        } else {
          swal("Done", response.message, "success"); 
          $(obj).toggleClass('btn-info').toggleClass('btn-danger');
          var text = $(obj).text();
          $(obj).text(text == "Published" ? "{{__('languages.not_published')}}" : "{{__('languages.published')}}");
          
        }

      });

    }
  
    function Delete(id) {
      swal({
        title: "{{__('languages.are_you_sure')}}",
        text: "{{__('languages.not_to_recover')}}",
        icon: "warning",
        buttons: [
          "{{__('languages.no_cancel_it')}}",
          "{{__('languages.yes_i_am_sure')}}"
        ],
        dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
          var viewSettings = {
            "url": `${baseUrl}/blog/${id}`,
            "method": "DELETE",
            "timeout": 0,
            "headers": {
              "Content-Type": "application/json",
              "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
          };
          $.ajax(viewSettings).done(function(response) {
          
            if (response.status == true) {
              swal({
                title: "{{__('languages.deleted_success')}}",
                text: response.message,
                icon: 'success'
              });

              $('#listTable').DataTable().ajax.reload();

            } else {
              swal("{{__('languages.cancelled')}}", "{{__('languages.went_wrong')}}", "error");
            }
          });
          
        } else {
          swal("{{__('languages.cancelled')}}", "{{__('languages.data_is_safe')}}", "error");
        }
      });
    }

    function DeleteAll() {

      var ids = [];

      var checkboxes = document.querySelectorAll('.multidelete:checked')

      for (var i = 0; i < checkboxes.length; i++) {
        ids.push(checkboxes[i].value)
      }
      if (!ids.length > 0) {
        swal("{{__('languages.no_row_selected')}}", "{{__('languages.need_to_select')}}", "error");
  
        return false;
      }


      swal({
        title: "{{__('languages.are_you_sure')}}",
        text: "{{__('languages.not_to_recover')}}",
        icon: "warning",
        buttons: [
          "{{__('languages.no_cancel_it')}}",
          "{{__('languages.yes_i_am_sure')}}"
        ],
        dangerMode: true,
      }).then(function(isConfirm) {
        if (isConfirm) {
          var viewSettings = {
            "url": `${baseUrl}/blog/1`,
            "method": "DELETE",
            "data": JSON.stringify({
              "ids": ids
            }),
            "timeout": 0,
            "headers": {
              "Content-Type": "application/json",
              "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
          };
          $.ajax(viewSettings).done(function(response) {
            
            if (response.status == true) {
              swal({
                title: "{{__('languages.deleted')}}",
                text: "{{__('languages.deleted_success')}}",
                icon: 'success'
              });

              $('#listTable').DataTable().ajax.reload();

            } else {
              swal("{{__('languages.cancelled')}}", "{{__('languages.went_wrong')}}", "error");
            }
          });
          
        } else {
          swal("{{__('languages.cancelled')}}", "{{__('languages.data_is_safe')}}", "error");
        }
      });
    }
 </script>
 
<script src="{{asset('js/custom.js')}}"></script>

@endsection