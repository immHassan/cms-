@extends('admin.layouts.app')
@section('pageCss')
<link href="{{ url('/') }}/admin/css/dropzone.min.css" rel="stylesheet">
@endsection
@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{__('languages.users_list')}}</h3>
            
            @if(auth()->user()->can('user-delete'))
            <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>
            @endif
            
            <div class="card-options">
              <div class="input-group">
                
                
                @if(auth()->user()->can('user-create'))
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
                <table id="listTable" class="table table-hover table-striped table-vcenter text-nowrap mb-0 data-table">
                <thead>
                <tr>
                  <th><span>{{__('languages.id')}}</span></th>
                  <th>{{__('languages.name')}}</th>
                  <th>{{__('languages.role')}}</th>
                  @if(auth()->user()->can('user-publish'))
                  <th>Publish</th>
                  @endif 

                  <th>{{__('languages.date')}}</th>
                  <th>{{__('languages.action')}}</th>


                  
                  
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
        <div class="modal-content" style="width:105%">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('languages.users')}} </h5>
                <div class="">
                  
                      <a type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                  
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
                                  <div class="col-12 img-thumbs2 selectedimgdiv" style="display:none">
                                      <div class="col-12 wrapper-thumb2 mt-3 mb-3">
                                          <img src="" class="selectedImg img-preview-thumb2" alt="">
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for=""> {{__('languages.name')}}</label>
                                          <input type="text" name="name" class="form-control" placeholder="{{__('languages.name')}}">
                                          <span id="name_err" class="text-red laravel_validation"> </span>
                                      </div>
                                  </div>


                                  
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for=""> {{__('languages.email')}}</label>
                                          <input type="text" name="email" class="form-control" placeholder="{{__('languages.email')}}">
                                          <span id="email_err" class="text-red laravel_validation"> </span>
                                      </div>
                                  </div>



                                  <div class="col-md-12">
                                      <div class="form-group">
                                          <label for=""> {{__('languages.role')}}</label>
                                          <select class="form-control" name="role">
                                            <option value=""> {{__('languages.select_role')}} </option>

                                            @if($roles)
                                            @foreach($roles as $record)
                                            <option value="{{$record->id}}"> {{$record->name}} </option>
                                            @endforeach
                                            @endif
                                          </select>
                                          <span id="role_err" class="text-red laravel_validation"> </span>
                                      </div>
                                  </div>
                                  
                                  <div class="col-12 col-sm-12 ">

                                <div class="passwordDiv">
                                  <hr>
                                </div>

                                <div class="pop-field-input">

                                  <label> {{__('languages.password')}} </label>
                                  <input type="password"  class="form-control" name="password" value="" placeholder="{{__('languages.password')}}">
                                  <span id="password_err" class="text-red laravel_validation"> </span>
                                </div>
                                </div>

                                <div class="col-12 col-sm-12 ">
                                <div class="pop-field-input">
                                  <label> {{__('languages.confirm_password')}} </label>
                                  <input type="password" class="form-control" name="confirm_password" placeholder="{{__('languages.confirm_password')}}">
                                  <span id="confirm_password_err" class="text-red laravel_validation"> </span>
                                </div>
                                </div>

                                <div class="col-12 col-sm-12 passwordDiv">
                                <div class="d-flex flex-row-reverse">
                                  <button class="btn btn-primary" type="button" onclick="UpdatePassword()"> Update Password</button>
                                </div>
                                </div>

                                              
                                  <input type="hidden" name="created_by" value="{{Auth::user()->id }}">

                                    <input type="hidden" name="id">


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


<script src="{{ url('/') }}/admin/js/dropzone.min.js"></script> 

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
        $("input[name=logo]").val(response.image_name);
      }
    },

  };
</script>



<script type="text/javascript">
  var baseUrl = "{{url('/')}}";
  var dateRange = '';


  var table = $('.data-table').DataTable({
    processing: true,
    paging: true,
    serverSide: true,
    searching: true,
    ajax: {
      url: "{{ route('users.list') }}",
      data: function(d) {
        d.search_id = $('input[name="search_id"]').val();
        d.search_name = $('input[name="search_name"]').val();
        d.search_email = $('input[name="search_email"]').val();
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
        data: 'role',
        name: 'role',
        render: function(data, type, row) {
          return `<b> ${data} </b>`
        }
      },


      
      @if(auth()->user()->can('user-publish'))
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
    ]
  });

  $('#status').change(function() {
    table.draw();
  });




  function Create() {

    $(`.laravel_validation`).html('');
    var settings = {
      "url": "{{route('users.create')}}",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "name": $("input[name=name]").val(),
        "email": $("input[name=email]").val(),
        "password": $("input[name=password]").val(),
        "confirm_password": $("input[name=confirm_password]").val(),
        "role": $("select[name=role]").val(),
      }),
    };

    $.ajax(settings).done(function(response) {
      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {

        $("input[name=name]").val('');
        $("input[name=email]").val('');
        $("input[name=password]").val('');
        $("input[name=confirm_password]").val('');
        $("select[name=role]").val('');
        $('#createModal').modal('hide');
        swal("{{__('languages.created_successfully')}}", response.message, "success");

        $('#listTable').DataTable().ajax.reload();
      }

    });

  }

  function Edit(id) {

    $('.passwordDiv').css('display', 'block')
    $('#saveBtn').html("{{__('languages.update')}}");
    $('#modalViewTitle').html('Please wait..');
    $('#modalViewBody').html('');
    $(`.laravel_validation`).html('');

    $('.modal-title').html($('.modal-title').html().replace("New", "Edit"));


    $('#createModal').modal('show');
    var viewSettings = {
      "url": `${baseUrl}/users/${id}`,
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

        $('.image-preview').html(`<div class="view-img text-center mb-5">
                        <img src="${baseUrl}/public/uploads/users/${response.data.logo}" alt="">
                      </div>`);

        $("input[name=name]").val(response.data.name);
        $("input[name=email]").val(response.data.email);
        $("select[name=role]").val(response.data.roles[0]?.id);
        $("input[name=id]").val(response.data.id);
     //   $('#createModal').modal('hide');

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
          "url": `${baseUrl}/users/${id}`,
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
          "url": `${baseUrl}/users/1`,
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



  $('.create_modal').click(function() {


    $('.passwordDiv').css('display', 'none')

    //button value
    $('#saveBtn').html("{{__('languages.save')}}");

    ///validations
    $(`.laravel_validation`).html('');
    ///image preview
    $('.image-preview').html('');



    $('.modal-title').html($('.modal-title').html().replace("Edit", "New"));




    ////fields
    $("input[name=name]").val("");
    $("input[name=email]").val("");
    $("select[name=role]").val("");
    $('#createModal').modal('hide');
    $("input[name=id]").val("");



    ///show
    $('#createModal').modal('show');
  });


  $('#saveBtn').click(function() {
    if ($('#saveBtn').html() == "Update" || "تحديث") {
      Update();
    } else {
      Create();
    }
  });




  function Update() {
    $(`.laravel_validation`).html('');
    var settings = {
      "url": `${baseUrl}/users`,
      "method": "PUT",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "name": $("input[name=name]").val(),
        "email": $("input[name=email]").val(),
        "role": $("select[name=role]").val(),
        "id": $("input[name=id]").val(),
      })
    };

    $.ajax(settings).done(function(response) {
      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {

        $("input[name=name]").val('');
        $("input[name=email]").val('');
        $("input[name=role]").val('');
        $("input[name=id]").val('');
        $('#createModal').modal('hide');
        swal("{{__('languages.updated_successfully')}}", response.message, "success");
        $('#listTable').DataTable().ajax.reload();
      }

    });

  }

  function UpdatePassword() {
    $(`.laravel_validation`).html('');
    var settings = {
      "url": `${baseUrl}/users/update-password`,
      "method": "PUT",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "password": $("input[name=password]").val(),
        "confirm_password": $("input[name=confirm_password]").val(),
        "id": $("input[name=id]").val(),
      })
    };

    $.ajax(settings).done(function(response) {
      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {
        $("input[name=password]").val('');
        $("input[name=confirm_password]").val('');
        $("input[name=id]").val('');
        $('#createModal').modal('hide');
        swal("{{__('languages.password_updated')}}", response.message, "success");

        $('#listTable').DataTable().ajax.reload();
      }

    });

  }

  $('#searchBtn').click(() => {
    dateRange = $('#reportrange span').html();
    table.draw();
  });

  $(function() {
    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#reportrange').daterangepicker({
      startDate: start,
      endDate: end,
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      }
    }, cb);


  });



  
  function publish(obj,id) { 
    var viewSettings = {
      "url": `${baseUrl}/user-publish/${id}`,
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