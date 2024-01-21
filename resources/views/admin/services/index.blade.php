@php $table = "Service"; @endphp
@extends('admin.layouts.app')
@section('pageCss')
@endsection
@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$table}}s List</h3>
            
            @if(auth()->user()->can('service-delete'))
            <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>

            @endif

              
  
            <div class="card-options">
              <div class="input-group">

              @if(auth()->user()->can('service-write'))
              <button type="button" class="btn btn-primary create_modal" data-toggle="modal" data-target="#createModal"><i class="fe fe-plus mr-2"></i>Add</button>
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
                <h6>Advanced Search</h6>
              </div>
            </div>
        </div>
        <div class="search-details">
          <div class="row">
            <div class="col-md-6">
              <div class="pop-field-input">
                <label> ID </label>
                <input type="text" class="form-control" name="search_id" placeholder="ID">
              </div>
            </div>
            <div class="col-md-6">
              <div class="pop-field-input">
                <label> Title </label>
                <input type="text" class="form-control" name="search_title" placeholder="Title">
              </div>
            </div>
            <div class="col-md-12 mt-2">

              <div class="pop-field-input">
                <label for=""> Date </label>
                <div id="reportrange" class="form-control" style="background: #fff; cursor: pointer;">
                  <i class="fa fa-calendar"></i>&nbsp;
                  <span></span> <i class="fa fa-caret-down"></i>
                </div>
              </div>
            </div>

            <div class="col-md-12 mr-3 mt-3">
              <div class="float-right">
                <button class="btn btn-primary" id="searchBtn">Search</button>
              </div>
            </div>

          </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="listTable" class="table table-hover table-striped table-vcenter text-nowrap mb-0 data-table">
                <thead>
                <tr>
                  <th> <span>Id</span> </th>
                  <th> <span>Image</span> </th>
                  <th> <span>Title</span> </th>

                     
                  @if(auth()->user()->can('service-publish'))
                  <th> <span>Publish</span>  </th>                  
                  @endif 

                  <th> <span>is featured</span> </th>
                  <th> <span>Created Date </span></th>
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

<div class="modal fade" id="createModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:120%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$table}}</h5>
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
                <li class="nav-item"><a class="nav-link" id="Project-tab" data-toggle="tab" href="#Meta-Tag-Tab">Service Links</a></li>
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
                        <label for=""> Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="slug" class="form-control" placeholder="Slug">
                      </div>
                    </div>
                    <div class="col-12 col-sm-12">
                      <div class="pop-field-input">
                        <label for="">Service Content</label> 
                        <textarea id="content" name="content" placeholder=""></textarea>
                      </div>
                    </div>                                                
                    <div class="col-md-6 mt-3">
                      <label class="custom-switch container-toggle">
                        <label for=""> Is Featured</label>
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
                  <div class="col-12 col-sm-12 mt-3">
                    <div class="pop-field-input">
                      <label for=""> Service Links</label>
                      <table  class="table">
                        <tr> 
                          <th>Link Title </th>
                          <th> Link URL</th> 
                          <th> Action</th> 
                        </tr>  
                        <tbody id="service_links_table">
                        <tr>
                          <td> <input type="text" class="form-control" name="service_link_title[]" placeholder="Please enter link Title" /> </td>
                          <td>  <input type="url" class="form-control" name="service_link_url[]" placeholder="Please enter link Url" /> </td>
                          <td>  <i class="fa fa-trash removeLink" onclick="removeLink(this)" aria-hidden="true"></i> </td>
                      
                        </tr>
                        </tbody>
                      </table>
                      <button type="button" class="btn btn-success float-right service_links"> Add more </button> 
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

  var table = $('.data-table').DataTable({
    processing: true,
    paging: true,
    serverSide: true,
    searching: true,
    ajax: {
      url: "{{ route('services.list') }}",
      data: function(d) {
        d.search_id = $('input[name="search_id"]').val();
        d.search_title = $('input[name="search_title"]').val();
        d.custom_date = dateRange;
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
        data: 'title',
        name: 'title'
      },

      
      @if(auth()->user()->can('service-publish'))
        {
          data: 'publish',
          name: 'publish'
        },
      @endif 

      {
        data: 'is_featured',
        name: 'is_featured'
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
      var is_featured = document.getElementById('is_featured');
      if(is_featured.checked == true){
        is_featured = 1;
      }else{
        is_featured = 0;
      }
      
      var form = $('#reloadform')[0];
      var formData = new FormData(form);
      formData.append('is_featured',is_featured);
      formData.append('content',CKEDITOR.instances.content.getData());
      $.ajax({
          url: "{{route('services.ajax')}}",
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
    
    $('#saveBtn').html("{{__('languages.update')}}");
    $('.action').val('update'); 
    $('#modalViewBody').html('');
    $(`.laravel_validation`).html('');

    $('#createModal').modal('show');
    var viewSettings = {
      "url": `${baseUrl}/services/${id}`,
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


        let serviceLinks = response.data.service_links;
     
        $('#service_links_table').html('');
        for(let i=0; i<serviceLinks.length; i++ ){
          $('#service_links_table').append(`<tr> 
          <td> <input type="text" class="form-control" name="service_link_title[]" value="${serviceLinks[i].title}" placeholder="Please enter link Title">
           </td> 
           <td> <input type="text" class="form-control" name="service_link_url[]" value="${serviceLinks[i].url}" placeholder="Please enter link Url">
           </td> 
           <td> <i class="fa fa-trash removeLink" onclick="removeLink(this)"  aria-hidden="true"></i>
           </td> 
           </tr>`);
        }

        if(response.data.image_selection == 1){
          var src = response.data.image;
          $(".file_media").val(src); 
        }else{
          var src = 'uploads/services/'+response.data.image;
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
        
        CKEDITOR.instances.content.setData(response.data.content);
         
      $("input[name=image_selection]").val(response.data.image_selection);
        $("input[name=id]").val(response.data.id);
      }

    });

  }

  function Delete(id) {
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this record!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        var viewSettings = {
          "url": `${baseUrl}/services/${id}`,
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
              title: 'Deleted Successfully!',
              text: response.message,
              icon: 'success'
            });

            $('#listTable').DataTable().ajax.reload();

          } else {
            swal("Cancelled", "Something went wrong :)", "error");
          }
        });

      } else {
        swal("Cancelled", "Your record is safe :)", "error");
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
      swal("No Records selected", "You need to select records first.", "error");
      return false;
    }


    swal({
      title: "Are you sure?",
      text: "You will not be able to recover these records!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        var viewSettings = {
          "url": `${baseUrl}/services/1`,
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
              title: 'Records Deleted!',
              text: 'Deleted Successfully!',
              icon: 'success'
            });

            $('#listTable').DataTable().ajax.reload();

          } else {
            swal("Cancelled", "Something went wrong :)", "error");
          }
        });

      } else {
        swal("Cancelled", "Your records are safe :)", "error");
      }
    });
  }
 

  document.querySelector('.service_links').onclick = function(){

    $('#service_links_table').append(`<tr> 
      <td> <input type="text" class="form-control" name="service_link_title[]" placeholder="Please enter link Title">
      </td> 
      <td><input type="text" class="form-control" name="service_link_url[]" placeholder="Please enter link Url">
      </td> 
      <td> <i class="fa fa-trash removeLink" onclick="removeLink(this)"  aria-hidden="true"></i>
      </td> 
      </tr>`);
    };

  function removeLink(el){
    el.parentNode.parentNode.remove();
  }


  
  
  function publish(obj,id) { 
    var viewSettings = {
      "url": `${baseUrl}/service-publish/${id}`,
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