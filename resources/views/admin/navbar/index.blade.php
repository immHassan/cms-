@php $table = "Navbar"; @endphp
@extends('admin.layouts.app')
@section('pageCss')
 
@endsection
@section('mainContent')

<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$table}}s List</h3>
          
            
            @if(auth()->user()->can('navbar-delete'))
            <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>
            @endif          
            <div class="card-options">
              <div class="input-group">


              
              @if(auth()->user()->can('navbar-write') )
                <a href="{{route('navbar.create')}}" class="btn btn-primary" >
                <i class="fe fe-plus mr-2"></i>Add</button>
                </a>
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
                  <th> <span>Title</span> </th>
                  <th> <span>Slug</span> </th>
                  <th> <span>Status</span> </th>

                  
                  @if(auth()->user()->can('navbar-publish'))
                  <th> <span>Publish</span></th>
                  @endif
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
  @endsection

  @section('pageJs')

 <script type="text/javascript">

  $(document).ready(function() {
    $('textarea').each(function(){
        $(this).on('change',function(){
            $(this).height( $(this)[0].scrollHeight );
        });
    });

  });

 
</script>
<script type="text/javascript">
  var tableName = "{{$table}}";
  var baseUrl = "{{url('/')}}";
  var resources = $(".multi-resources");
  var dateRange = '';

  var table = $('.data-table').DataTable({
    processing: true,
    paging: true,
    serverSide: true,
    searching: true,
    ajax: {
      url: "{{ route('navbar.list') }}",
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
        data: 'title',
        name: 'title'
      },
      {
        data: 'slug',
        name: 'slug'
      },

      
      @if(auth()->user()->can('navbar-publish'))
      {
        data: 'publish',
        name: 'publish'
      },
      @endif

      {
        data: 'status',
        name: 'status'
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
          "url": `${baseUrl}/navbar/${id}`,
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
          "url": `${baseUrl}/navbar/1`,
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
  
  $("body").on("change", "#publish_status", function(){

var settings = {
    "url": "{{ route('navbar.update_status') }}",
    "method": "PUT",
    "timeout": 0,
    "headers": {
      "Content-Type": "application/json",
      "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    },
    "data": JSON.stringify({
      "status": $(this).val(),
      "id":  $(this).data( "id" ),
    })
  };
  
  $.ajax(settings).done(function(response) {
    
    if (response.status == false) {
      swal("Error!", response.message, "error");
    } else {
      swal("Congractulations!", response.message, "success");
      $('#listTable').DataTable().ajax.reload();
    }
    
  });

});



function publish(obj,id) { 
    var viewSettings = {
      "url": `${baseUrl}/navbar-publish/${id}`,
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