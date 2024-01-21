@extends('admin.layouts.app')
@section('pageCss')
@endsection
@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Roles List</h3>
            
            
            
            @if(auth()->user()->can('user-delete'))   
            <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>            

            @endif

         
            
            <div class="card-options">
              <div class="input-group">

              
              @if(auth()->user()->can('user-create'))
              <a href="{{ route('roles.new') }}">
                <button type="button" class="btn btn-primary" ><i class="fe fe-plus mr-2"></i>Add New</button>
                </a>
              @endif   
  
            </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="listTable" class="table table-hover table-striped table-vcenter text-nowrap mb-0 data-table">
                <thead>
                <tr>
                  <th>
                    <span>Id</span>
                  </th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Action</th>
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
        <div class="modal-content" style="width:150%">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                <div class="">
                  
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  
                      <a id="saveBtn" class="btn btn-success" href="javascript:void(0)"></a>
                    
                </div>
            </div>
            <div class="modal-body">  
              <div class="row clearfix m-2">
                <div class="col-12 col-sm-12">
                  <div class="client-details-pop">
                      <div class="row ">
                         
                          
                          <form id="reloadform">
                            
                              <div class="row">
                                  

                              <div class="col-12 col-sm-12">
                      <div class="pop-field-input">
                        <label> Role Name </label>
                        <input class="form-control"type="text" name="name" placeholder="Role Name">
                        <span id="name_err" class="text-danger laravel_validation"> </span>
                      </div>
                    </div>

                    <div class="col-12 col-sm-2">
                      <label> Modules </label>
                    </div>
                    <div class="col-12 col-sm-2">
                      List
                    </div>

                    <div class="col-12 col-sm-2">
                      Create
                    </div>

                    <div class="col-12 col-sm-2">
                      Update
                    </div>

                    <div class="col-12 col-sm-2">
                      Delete
                    </div>


                    <div class="col-12 col-sm-2">
                      Assign
                    </div>
                  
                    <input class="form-control"type="hidden" name="id">

                  </div>


            <! -- CMS -->
                  <div class="row">
                    <div class="col-12 col-sm-2">
                      <label>CMS</label>
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="1" name="p-brand-list">
                    </div>


                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="2" name="p-brand-create">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="3" name="p-brand-edit">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="4" name="p-brand-delete">
                    </div>

                    <div class="col-12 col-sm-2">
                      -
                    </div>
                  </div>



            <! -- Roles -->
                  <div class="row">
                    <div class="col-12 col-sm-2">
                      <label>Roles</label>
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="5" name="p-roles-list">
                    </div>


                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="6" name="p-roles-create">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="7" name="p-roles-edit">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="8" name="p-roles-delete">
                    </div>

                    <div class="col-12 col-sm-2">
                      -
                    </div>
                  </div>


            <! -- Users -->
                  <div class="row">
                    <div class="col-12 col-sm-2">
                      <label>Users</label>
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="9" name="p-user-list">
                    </div>


                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="10" name="p-user-create">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="11" name="p-user-edit">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="12" name="p-user-delete">
                    </div>

                    <div class="col-12 col-sm-2">
                      -
                    </div>
                  </div>

            
            <! -- Clients -->
                  <!-- <div class="row">
                    <div class="col-12 col-sm-2">
                      <label>Clients</label>
                    </div>

                    <div class="col-12 col-sm-2">
                       <div> 
                         <input class="form-control"type="checkbox" class="permission" value="13" name="p-client-list">  All 
                       </div>

                       <div class="ml-3">
                         <input class="form-control"type="checkbox" class="permission" value="33" name="p-client-list-assigned"> Only assigned 
                       </div>
                    </div>


                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="14" name="p-client-create">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="15" name="p-client-edit">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="16" name="p-client-delete">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="34" name="p-client-assign">  
                    </div>
                  </div> -->



            <! -- Invoices -->
                  <!-- <div class="row">
                    <div class="col-12 col-sm-2">
                      <label>Invoices</label>
                    </div>


                    <div class="col-12 col-sm-2">
                       <div> 
                         <input class="form-control"type="checkbox" class="permission" value="17" name="p-invoice-list">  All 
                       </div>

                       <div class="ml-3">
                         <input class="form-control"type="checkbox" class="permission" value="35" name="p-invoice-my"> My invoices 
                       </div>
                    </div>





                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="18" name="p-invoice-create">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="19" name="p-invoice-edit">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="23" name="p-invoice-delete">
                    </div>

                      <div class="col-12 col-sm-2">-
                    </div>
                  </div>

 -->



            <! -- Services -->
                  <div class="row">
                    <div class="col-12 col-sm-2">
                      <label>Services</label>
                    </div>


                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="24" name="p-payment-methods-list">
                    </div>


                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="25" name="p-payment-methods-create">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="26" name="p-payment-methods-edit">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="27" name="p-payment-methods-delete">
                    </div>

                    <div class="col-12 col-sm-2">
                      -
                    </div>
                  </div>





            <! -- Blogs -->
                  <div class="row">
                    <div class="col-12 col-sm-2">
                      <label>Blogs</label>
                    </div>


                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="28" name="p-payment-list">
                    </div>


                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="29" name="p-payment-create">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="30" name="p-payment-edit">
                    </div>

                    <div class="col-12 col-sm-2">
                      <input class="form-control"type="checkbox" class="permission" value="31" name="p-payment-delete">
                    </div>

                    <div class="col-12 col-sm-2">
                      -
                    </div>
                  </div>

                              </div>
                          </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
    </div>
</div>

  @endsection


  @section('pageJs')



<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<script type="text/javascript">
  Dropzone.options.uploaderForm = {
    maxFilesize: 1,
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.svg",
    init: function() {
      this.on("addedfile", function() {

        if (this.files[1] != null) {
          this.removeFile(this.files[0]);
        }
      });
    },
    success: function(file, response) {
      if (response.success) {
        $("input[name=logo]").val(response.image_name)
      }
    },

  };
</script>



<script type="text/javascript">
  
  var baseUrl = "{{url('/')}}";

  var permission = [];

  var table = $('.data-table').DataTable({
    processing: true,
    paging: true,
    serverSide: true,
    searching: true,
    ajax: {
      url: "{{ route('roles.list') }}"
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
        name: 'name',  
        render: function(data, type, row) {
          return `<b> ${data} </b>`
        }
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

  $('#status').change(function() {
    table.draw();
  });




  function Create() {




    var checkboxes = document.querySelectorAll('.permission:checked')
    for (var i = 0; i < checkboxes.length; i++) {
      permission.push(checkboxes[i].value)
    }


    $(`.laravel_validation`).html('');
    var settings = {
      "url": "{{route('roles.create')}}",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "name": $("input[name=name]").val(),
        "permission": permission
      }),
    };

    $.ajax(settings).done(function(response) {
      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {
        $("input[name=name]").val('');
        $(".permission").val('');
        $('#createModal').modal('hide');
        swal("Created Successfully!", response.message, "success");
        $('#listTable').DataTable().ajax.reload();
      }

    });

  }













  function View(id) {
    var columns = ['created_at', 'id', 'name'];


    $('#modalViewTitle').html('Please wait..');
    $('#modalViewBody').html('');
    $('#ModalView').modal('show');
    var viewSettings = {
      "url": `${baseUrl}/roles/${id}`,
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


        var perm = response.data.permission;
        for (var i = 0; i < perm.length; i++) {
          if (response.data.rolePermissions[perm[i].id] == perm[i].id) {
            $('input[name="p-v-' + perm[i].name + '"]').prop('checked', true);
          }
        }

        $('#modalViewBody').modal('hide');
        $("input[name=id]").val(response.data.role.id);
        $("input[name=name]").val(response.data.role.name);
      }

    });



  }







  function Edit(id) {



    $(".permission").prop('checked', false);
    $('#saveBtn').html('Update');
    $('#modalViewTitle').html('Please wait..');
    $('#modalViewBody').html('');
    $(`.laravel_validation`).html('');
    $('.modal-title').html($('.modal-title').html().replace("New", "Edit"));


    $('#createModal').modal('show');
    var viewSettings = {
      "url": `${baseUrl}/roles/${id}`,
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


        var perm = response.data.permission;
        for (var i = 0; i < perm.length; i++) {
          if (response.data.rolePermissions[perm[i].id] == perm[i].id) {
            $('input[name="p-' + perm[i].name + '"]').prop('checked', true);
          }
        }

        $('#createModal').modal('hide');
        $("input[name=id]").val(response.data.role.id);
        $("input[name=name]").val(response.data.role.name);
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
          "url": `${baseUrl}/roles/${id}`,
          "method": "DELETE",
          "timeout": 0,
          "headers": {
            "Content-Type": "application/json",
            "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          }
        };
        $.ajax(viewSettings).done(function(response) {
          console.log(response.status);
          if (response.status == true) {
            swal({
              title: 'Deleted!',
              text: 'Deleted Successfully!',
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
          "url": `${baseUrl}/roles/1`,
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
          console.log(response.status);
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



  $('.create_modal').click(function() {

    document.getElementById("reloadform"). reset();
   
    
    //button value
    $('#saveBtn').html('Save');
    ///validations
    $(`.laravel_validation`).html('');
    ///image preview
    $('.image-preview').html('');

    $('.modal-title').html($('.modal-title').html().replace("Edit","New"));

    



    ////fields
    $("input[name=first_name]").val("");
    $("input[name=last_name]").val("");
    $("input[name=company]").val("");
    $("input[name=email]").val("");
    $("input[name=package_name]").val("");
    $("input[name=package_price]").val("");
    $("input[name=phone]").val("");
    $("input[name=mobile]").val("");
    $("input[name=business_phone]").val("");
    $("input[name=city]").val("");
    $("input[name=postal]").val("");
    $("input[name=country]").val("");
    $('#createModal').modal('hide');
    $("input[name=id]").val("");



    ///show
    $('#createModal').modal('show');
  });


  $('#saveBtn').click(function() {
    if ($('#saveBtn').html() == "Update") {
      Update();
    } else {
      Create();
    }
  });




  function Update() {



    var checkboxes = document.querySelectorAll('.permission:checked')
    for (var i = 0; i < checkboxes.length; i++) {
      permission.push(checkboxes[i].value)
    }

    $(`.laravel_validation`).html('');
    var settings = {
      "url": `${baseUrl}/roles`,
      "method": "PUT",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "name": $("input[name=name]").val(),
        "permission": permission,
        "id": $("input[name=id]").val(),
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
        $("input[name=email]").val('');
        $("input[name=phone]").val('');
        $("input[name=address]").val('');
        $("input[name=country]").val('');
        $("input[name=package_name]").val('');
        $("input[name=package_price]").val('');
        $("input[name=link]").val('');
        $("input[name=logo]").val('');
        $("input[name=id]").val('');
        $('#createModal').modal('hide');

        swal("Updated Successfully!", response.message, "success");

        $('#listTable').DataTable().ajax.reload();
      }

    });

  }
</script>


@endsection