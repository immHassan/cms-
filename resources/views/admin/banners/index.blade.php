@php $table = __('languages.banner'); @endphp
@extends('admin.layouts.app')
@section('pageCSS') 


@endsection
<style>
.custom-checkbox .selectall:before{
    height:30px !important;
    width:30px !important;
  }
  .custom-checkbox .selectall:after{
    height:30px !important;
    width:30px !important;
  }
</style>
@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{__('languages.banners_list')}}</h3>
            <label for="selectAll" class="custom-control custom-checkbox ml-2">
              <input type="checkbox" class="custom-control-input" id="selectAll">
                <span class="custom-control-label selectall"></span>
            </label>
            
            @if(auth()->user()->can('banner-delete') )
            <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>            
            @endif
            
              <div class="card-options">
              <div class="input-group">

            
                @if(auth()->user()->can('banner-write') )
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
            <div class="table-responsive">
                <table id="listTable" class="table table-hover table-vcenter text-nowrap mb-0 data-table">
                <thead>
                <tr>  
                  <th> <span> {{__('languages.id')}}</span> </th>
                  <th> <span>{{__('languages.image')}}</span> </th>
                  <th> <span>{{__('languages.title')}}</span> </th>
    
                  @if(auth()->user()->can('banner-publish'))
                    <th> <span>Publish</span></th>
                  @endif

                  <th> <span>{{__('languages.createddate')}} </span></th>
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
              <h5 class="modal-title" id="exampleModalLabel"> {{$table}}</h5>
              <div class="">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                            <div class="col-md-6 mt-3">
                              <label class="custom-switch">
                                <label for=""> {{__('languages.is_featured')}}</label>
                                <input id="is_featured" class="toggle-check custom-switch-input" name="is_featured" onclick="onOff(this)" type="checkbox">
                                <span class="custom-switch-indicator toggle ml-2 mb-1"></span>
                                <div class="on ml-1"></div>
                              </label>
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

<script type="text/javascript">
  var tableName = "{{$table}}";
  var baseUrl = "{{url('/')}}";
  var dateRange = '';
  
  $(document).ready(function () {

    var table = $('.data-table').DataTable({
      stateSave: true,
      processing: true,
      paging: true,
      serverSide: true,
      searching: true,
      ajax: {
        url: "{{ route('banners.list') }}",
        data: function(d) {
          d.search_id = $('input[name="search_id"]').val();
          d.search_title = $('input[name="search_title"]').val();
          d.search_date = dateRange;
        }
      },
      columns: [
       {
        data: 'id',
        name: 'id'
        },
        {
          data: 'image',
          name: 'image'
        },
        {
          data: 'title',
          name: 'title'
        },
        @if(auth()->user()->can('banner-publish'))
        {
          data: 'publish',
          name: 'publish'
        },
        @endif
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
        {
          data: 'action',
          name: 'action'
        },
      ],
      language: {
          "url": "/datatable_languages/{{str_replace('_', '-', app()->getLocale())}}/datatable.json"
        }
    });
       
    $('body').on('click', '#selectAll', function () {
      var cells = table.column(0).nodes(), // Cells from 1st column
        state = this.checked;
        if ($(this).hasClass('allChecked')) {
            $('input[type="checkbox"]', cells).prop('checked', false);
        } else {
            $('input[type="checkbox"]', cells).prop('checked', true);
        }
        $(this).toggleClass('allChecked');
    })
  });
   
  $(document).ready(function (e) {
      $("#reloadform").on('submit',(function(e) {
        e.preventDefault(); 
      $(`.laravel_validation`).html('');
      var is_featured = document.getElementById('is_featured');
      if(is_featured.checked == true){
        is_featured = 1;
      }else{
        is_featured = 0;
      }
        
      var form = $('#reloadform')[0];
      var formData = new FormData(form);
      formData.append('is_featured',is_featured);
          $.ajax({
              url: "{{route('banners.ajax')}}",
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
    $('#saveBtn').html('{{__("languages.update")}}');
    $('.action').val('update'); 
    $('#modalViewBody').html('');
    $(`.laravel_validation`).html('');
    $('#createModal').modal('show');

    var viewSettings = {
      "url": `${baseUrl}/banners/${id}`,
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
        swal("Error!", "Something went wrong", "error");
      } else {

        if(response.data.image_selection == 1){
          var src = response.data.image;
          $(".file_media").val(src); 
        }else{
          var src = 'uploads/banners/'+response.data.image;
          $(".default_image").val(response.data.image);           
        }
    
        $(".dropify-wrapper").addClass("has-preview");
        $('.dropify-loader').css("display","none");
        $('.dropify-preview').css("display","block");
        $('.dropify-render').html('<img src="'+src+'">');
        $('.dropify-filename-inner').html(response.data.image);

        var is_featured = document.getElementById('is_featured');
        var is_featured1 = is_featured.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('off');
        
        
        if(response.data.is_featured == 0){
          $('#is_featured').prop('checked', false); // Unchecks it
          is_featured1.innerHTML="No";
          is_featured1.style.color="#253b52";
        }else{
          $('#is_featured').prop('checked', true); // Checks it
          is_featured1.style.color="green";
          is_featured1.innerHTML="Yes";   
        }
       
        $("input[name=title]").val(response.data.title);
        $("input[name=slug]").val(response.data.slug);
        $("input[name=start_date]").val(response.data.start_date);
        $("input[name=end_date]").val(response.data.end_date);
        $("input[name=image_selection]").val(response.data.image_selection);
        $("input[name=id]").val(response.data.id);
        let metaTags = response.meta_tags;

          $('#meta_tags_table').html('');
          for(let i=0; i<metaTags.length; i++ ){
            $('#meta_tags_table').append(`
            <tr> 
                <td> <input type="text" class="form-control" name="meta_tag_name[]" value="${metaTags[i].meta_tag_name}" placeholder="{{__('languages.enter_tag_name')}}">
                </td> 
                <td><input type="text" class="form-control" name="meta_tag_content[]" value="${metaTags[i].meta_tag_content}" placeholder="{{__('languages.enter_tag_content')}}">
                </td> 
                <td> <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)"  aria-hidden="true"></i>
                </td> 
            </tr>
          `);
          }
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
          "url": `${baseUrl}/banners/${id}`,
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
          "url": `${baseUrl}/banners/1`,
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
  function publish(obj,id) { 
    var viewSettings = {
      "url": `${baseUrl}/banner-publish/${id}`,
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
        swal("Error!", "Something went wrong", "error");
      } else {
        swal("Done", response.message, "success"); 
        $(obj).toggleClass('btn-info').toggleClass('btn-danger');
        var text = $(obj).text();
        $(obj).text(text == "Published" ? "Not Published" : "Published");
        
      }
  
    });
  
  }
</script>
<script src="{{asset('js/custom.js')}}"></script>

@endsection