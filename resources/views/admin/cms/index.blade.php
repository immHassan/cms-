@php $table = __('languages.pages'); @endphp
@extends('admin.layouts.app')
@section('pageCss')
 
@endsection
@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$table}} {{__('languages.list')}}</h3>
          
            @if(auth()->user()->can('cms-delete'))
            <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>
            @endif 
            <div class="card-options">
              <div class="input-group">

              
              @if(auth()->user()->can('cms-write'))
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
                <input type="text" class="form-control" name="search_name" placeholder="{{__('languages.title')}}">
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
                  <a type="button" class="close" data-dismiss="alert" aria-label="Close"></a>
                  <strong>
                      {{ session('errors') }}
                  </strong>
              </div>
          @endif
          @if (session()->has('success'))
              <div class="alert alert-dismissable alert-success">
                  <a type="button" class="close" data-dismiss="alert" aria-label="Close"></a>
                  <strong>
                      {{ session('success') }}
                  </strong>
              </div>
          @endif
            <div class="table-responsive">
                <table id="listTable" class="table table-hover table-striped table-vcenter text-nowrap mb-0 data-table">
                <thead>
                <tr>
                  <th> <span>{{__('languages.id')}}</span> </th>
                  <th> <span>{{__('languages.name')}}</span> </th>
                  <th> <span>{{__('languages.slug')}}</span> </th>
                  <th> <span>{{__('languages.version')}}</span> </th>
                  @if(auth()->user()->can('cms-publish'))
                    <th> <span>Publish</span></th>
                  @endif 
                  <th> <span>{{__('languages.createddate')}}</span></th>
                  <th> <span>{{__('languages.design')}} </span></th>
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

<!-- CREATE MODAL START -->

<div class="modal fade" id="createModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:120%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('languages.new')}} {{$table}}</h5>
        <div class="">
          <a type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
          <a id="saveButton" class="btn btn-success" href="javascript:void(0)"></a> 
        </div>
      </div>
      <div class="modal-body">  
        <div class="section-body">
          <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center">
              <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link" id="Project-tab" data-toggle="tab" href="#Detail-Tab">Detail</a></li>
                <li class="nav-item"><a class="nav-link" id="Project-tab" data-toggle="tab" href="#Meta-Tag-Tab">Meta Tags</a></li>
              </ul>
            </div>
          </div>
        </div>
        <form id="reloadform" action="{{URL('/').'/cms/new'}}" method="post">
          @csrf
          <div class="tab-content">
            <div class="laravel_validation mt-3 ml-3"></div>
            <div class="tab-pane fade active show" id="Detail-Tab" role="tabpanel">
              <div class="card">
                <div class="card-body">
                  <div class="row">             
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> {{__('languages.name')}}</label>
                            <input type="text" name="name" class="form-control" placeholder="{{__('languages.name')}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""> {{__('languages.slug')}}</label>
                            <input type="text" name="slug" class="form-control" placeholder="{{__('languages.slug')}}">
                        </div>
                    </div>
                    <div class="col-md-12" id="starting_template_div">
                        <div class="form-group">
                            <label for=""> {{__('languages.starting_templete')}}</label>
                              <select name="template_name" class="form-control nice-select wide">
                                  <option value="">
                                    {{__('languages.which_template')}}
                                  </option>
                                  <option value="template-0">
                                  New Template
                                  </option>
                                  @if($page_templates)
                                  @foreach($page_templates as $template)
                                  <option value="{{$template->slug}}"> {{$template->name}} </option>
                                  @endforeach
                                  @endif  
                              </select>
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
                      <label for=""> Meta Tags</label>
                      <table  class="table">
                          <tr> 
                          <th>Meta Name </th>
                          <th> Meta Content</th> 
                          <th> Action</th> 
                          </tr>  
                          <tbody id="meta_tags_table">
                          <tr>
                          <td> <input type="text" class="form-control" name="meta_tag_name[]" value="Description" placeholder="Please enter meta tag name" /> </td>
                          <td>  <input type="text" class="form-control" name="meta_tag_content[]" value="Web" placeholder="Please enter meta tag content" /> </td>
                          <td>  <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)" aria-hidden="true"></i> </td>
                          </tr>

                          <tr>
                          <td> <input type="text" class="form-control" name="meta_tag_name[]" value="Keywords" placeholder="Please enter meta tag name" /> </td>
                          <td>  <input type="text" class="form-control" name="meta_tag_content[]" value="key1, key2, key3" placeholder="Please enter meta tag content" /> </td>
                          <td>  <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)" aria-hidden="true"></i> </td>
                          </tr>
                          
                          <tr>
                          <td> <input type="text" class="form-control" name="meta_tag_name[]" value="Author" placeholder="Please enter meta tag name" /> </td>
                          <td>  <input type="text" class="form-control" name="meta_tag_content[]" value="Cloud Solutions" placeholder="Please enter meta tag content" /> </td>
                          <td>  <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)" aria-hidden="true"></i> </td>
                          </tr>

                          </tbody>
                      </table>
                      <button type="button" class="btn btn-success float-right meta_tags"> Add more </button> 
                    </div>
                  </div>                    
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="id">
        </form>      
      </div>
    </div>
  </div>
</div>
    

<!-- CREATE MODAL END -->





<!-- .......... VERSION START ............. -->



<!-- Button to Open the Modal -->

<!-- The Modal -->
<div class="modal" id="versionModal">
  <div class="modal-dialog">
    <div style="height:40vh" class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">New Version</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">



      <div class="col-md-12">
        <div class="form-group">
            <label for="">Please add your version below</label>
              <input required type="number" class="form-control" name="version_name" placeholder="Name">
              <span id="version_name_err" class="text-danger laravel_validation"> </span>
        </div>

        <button type="button" id="generate-version" class="btn btn-success float-right" >Generate</button>


    </div>

      </div>


    </div>
  </div>
</div>

<!-- .......... VERSION END ............. -->


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
      url: "{{ route('cms.list') }}",
      data: function(d) {
        d.search_id = $('input[name="search_id"]').val();
        d.search_name = $('input[name="search_name"]').val();
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
      data: 'name',
      name: 'name'
    },
    {
      data: 'slug',
      name: 'slug'
    },
    {
      data: 'version',
      name: 'version'
    },
    @if(auth()->user()->can('cms-publish'))
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
      data: 'edit_design',
      name: 'edit_design'
    },
    {
      data: 'action',
      name: 'action'
    },
  ]
});
$('.create_modal').click(()=>{
  $('#saveButton').html('Save');
  $('#starting_template_div').css('display','block');

  $('#createModal').modal('show');
})

function Edit(id) {
  $('#saveButton').html('Update');
  $('#saveButton').removeAttr("type").attr("type", "button");

  $('#modalViewTitle').html('Please wait..');
  $('#starting_template_div').css('display','none');

  $('.modal-title').html('Edit {{$table}}');

  $('#modalViewBody').html('');
  $(`.laravel_validation`).html('');
  
  $('#createModal').modal('show');
  var viewSettings = {
    "url": `${baseUrl}/cms/${id}`,
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
      }else{
        var src = 'uploads/pages/'+response.data.image;
      }
      $('.image-preview').html(`<div class="view-img text-center mb-5">
                      <img src="`+src+`" alt="">
      </div>`);
      
 
      $("input[name=name]").val(response.data.name);
      $("input[name=slug]").val(response.data.slug);
      // $("input[name=custom_date]").val(response.data.start_date+' - '+response.data.end_date);
      $("input[name=id]").val(response.data.id);




      
      let metaTags = response.meta_tags;
     
     $('#meta_tags_table').html('');
     for(let i=0; i<metaTags.length; i++ ){
       $('#meta_tags_table').append(`
        <tr> 
            <td> <input type="text" class="form-control" name="meta_tag_name[]" value="${metaTags[i].meta_tag_name}" placeholder="Please enter meta tag name">
            </td> 
            <td><input type="text" class="form-control" name="meta_tag_content[]" value="${metaTags[i].meta_tag_content}" placeholder="Please enter meta tag content">
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
        "url": `${baseUrl}/cms/${id}`,
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
        "url": `${baseUrl}/cms/1`,
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
function Update() {
  $(`.laravel_validation`).html('');
 
  let meta_tag_content = $("input[name='meta_tag_content[]']").map(function(){return $(this).val();}).get();
  let meta_tag_name = $("input[name='meta_tag_name[]']").map(function(){return $(this).val();}).get();

  
  

  var settings = {
    "url": "{{ route('cms.update') }}",
    "method": "PUT",
    "timeout": 0,
    "headers": {
      "Content-Type": "application/json",
      "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    },
    "data": JSON.stringify({
      "name": $("input[name=name]").val(),
      "slug": $("input[name=slug]").val(),
      // "custom_date": $("input[name=custom_date]").val(),
      "id": $("input[name=id]").val(),
      "meta_tag_content": meta_tag_content,
      "meta_tag_name": meta_tag_name,
      "template_name": $("select[name=template_name]").val()
    })
  };
  
  $.ajax(settings).done(function(response) {
    
    if (response.status == false) {
      for (let key of Object.entries(response.data)) {
        $(`#${key[0]}_err`).html(key[1]);
      }
    } else {
      
      $('.image-preview').html('');
      $("input[name=name]").val('');
      $("input[name=slug]").val('');
      $('.on').html('');
      $("input[name=id]").val('');
      $('#createModal').modal('hide');
      swal("Updated Successfully!", response.message, "success");
      $('#listTable').DataTable().ajax.reload();
    }
    
  });
  
}
</script>
<script src="{{asset('js/custom.js')}}"></script>


<script>
document.querySelector('.meta_tags').onclick = function(){

$('#meta_tags_table').append(`<tr> 
  <td> <input type="text" class="form-control" name="meta_tag_name[]" placeholder="Please enter meta tag name">
  </td> 
  <td><input type="text" class="form-control" name="meta_tag_content[]" placeholder="Please enter meta tag content">
  </td> 
  <td> <i class="fa fa-trash removeMetaTag" onclick="removeMetaTag(this)" aria-hidden="true"></i>
  </td> 
  </tr>`);
};

function removeMetaTag(el){
el.parentNode.parentNode.remove();
}

  var selectedVersionId = null; 

  $("body").on("click", "#add-new-version", function(){
    selectedVersionId = this.dataset.id;
    $('#versionModal').modal('show'); 
  });


  $("body").on("click", "#generate-version", function(){

      var settings = {
        "url": "{{ route('cms.create_version') }}",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/json",
          "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        "data": JSON.stringify({
          "id": selectedVersionId,
          "version_name": $("input[name=version_name]").val(),
        })
      };
      
      $.ajax(settings).done(function(response) {
        
        if (response.status == false) {
          for (let key of Object.entries(response.data)) {
            $(`#${key[0]}_err`).html(key[1]);
          }
        } else {
          
          $("input[name=version_name]").val('');
          $('#versionModal').modal('hide');
          swal("Updated Successfully!", response.message, "success");
          $('#listTable').DataTable().ajax.reload();
        }
        
      });

  });





  


  
  $("body").on("change", "#page_version", function(){

    var settings = {
        "url": "{{ route('cms.update_version') }}",
        "method": "PUT",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/json",
          "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        "data": JSON.stringify({
          "id": $("#page_version").val(),
        })
      };
      
      $.ajax(settings).done(function(response) {
        
        if (response.status == false) {
          for (let key of Object.entries(response.data)) {
            $(`#${key[0]}_err`).html(key[1]);
          }
        } else {
          
          $("input[name=version_name]").val('');
          $('#versionModal').modal('hide');
          swal("Updated Successfully!", response.message, "success");
          $('#listTable').DataTable().ajax.reload();
        }
        
      });

  });

  

  
  function convertToSlug(Text) {
   return Text.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
  }

  $($("input[name=name]")).on('keyup',function(){
    var slug = convertToSlug($(this).val());
    $("input[name=slug]").val(slug);
  });




  $("#saveButton").click(function () {
    if ($("#saveButton").html() == "Update") {
        Update();
    } else {
      $(`.laravel_validation`).html('');
      if($("input[name=name]").val() == ''){
        
        $('.laravel_validation').append(`<span id="name_err" class="text-red ">Name field is required</span><br>`);
         
      }else if($("input[name=slug]").val() == ''){
        $('.laravel_validation').append(`<span id="slug_err" class="text-red ">Slug field is required</span><br>`);
         
      }else if($("select[name=template_name]").val() == ''){
        $('.laravel_validation').append(`<span id="template_name_err" class="text-red ">Template field is required</span><br>`);
        
      }else{
        verify_slug_and_submit($("input[name=slug]").val());
      }
    }
  });




  function verify_slug_and_submit(slug){
    let result = false;
    var settings = {
        "url": "{{ route('cms.validate_slug') }}",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Content-Type": "application/json",
          "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        "data": JSON.stringify({
          "slug":slug
        })
      };

      $.ajax(settings).done(function(response) {
        console.log("response",response);

        if (response.status == false) {
          $('#slug_err').html(response.message);
          result = false;
        } else {
          $('#slug_err').html('');
          result =  true;
          $('#reloadform').submit()
        }
        
      });

  }






  function publish(obj,id) { 
    var viewSettings = {
      "url": `${baseUrl}/cms-publish/${id}`,
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

@endsection