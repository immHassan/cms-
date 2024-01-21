@extends('admin.layouts.app')
@section('pageCss') 
 @endsection
@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">{{__('languages.gallery_list')}}</h3>
          @if(auth()->user()->can('gallery-delete'))
          <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>
          @endif
          <div class="card-options">
            <div class="input-group">
              @if(auth()->user()->can('gallery-write'))
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
              <th> <span>{{__('languages.blogs_list')}}</span> </th>
              <th> <span>{{__('languages.image')}}</span> </th>
              <th> <span>{{__('languages.title')}}</span> </th> 
              @if(auth()->user()->can('gallery-publish'))
              <th> <span>{{__('languages.is_published')}}</span> </th> 
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
<div class="modal fade" id="createModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width:120%">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{__('languages.gallery')}}</h5>
        <div class="">
          <a type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>
          <a id="saveBtn" class="btn btn-success" href="javascript:void(0)"></a>  
        </div>
      </div>
      <div class="modal-body">  
        <div class="row clearfix m-2">
          <div class="col-12 col-sm-12">
            <div class="client-details-pop">
              <form id="reloadform">
                <div class="row ">                          
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for=""> {{__('languages.title')}}</label>
                      <input type="text" name="title" class="form-control" placeholder="{{__('languages.title')}}">
                      <span id="title_err" class="text-red laravel_validation"> </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for=""> {{__('languages.slug')}}</label>
                      <input type="text" name="slug" class="form-control" placeholder="{{__('languages.slug')}}">
                      <span id="slug_err" class="text-red laravel_validation"> </span>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">{{__('languages.availability_start_date')}}</label>
                      <input type="text" class="form-control" name="start_date">
                      <span id="start_date_err" class="text-red laravel_validation"> </span>
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
                          <span id="end_date_err" class="text-red laravel_validation"> </span>
                        </div>
                      </div>            
                      <div class="col-md-6 mt-3">
                        <label class="custom-switch">
                          <label for=""> {{__('languages.is_published')}}</label>
                          <input id="is_visible" class="toggle-check custom-switch-input" name="is_visible" onclick="onOff(this)" type="checkbox">
                          <span class="custom-switch-indicator toggle ml-2 mb-1"></span>
                          <div class="on ml-1"></div>
                        </label>
                      </div>          
                      <div class="col-12 col-sm-12">
                        <div class="pop-field-input">
                          <label for=""> {{__('languages.content')}}</label> 
                          <textarea id="content" name="content" placeholder="">
                          </textarea>
                          <span id="gallery_content_err" class="text-red laravel_validation"> </span>
                        </div>
                      </div>
                      <input type="hidden" name="id">
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
 
 <script type="text/javascript">
  function cleartext(){
    $("input[name=end_date]").val('')
  }
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
      url: "{{ route('gallery.list') }}",
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
        data: 'title',
        name: 'title'
      },

      @if(auth()->user()->can('gallery-publish'))
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

  function Create() {
    var is_visible = document.getElementById('is_visible');
   
    if(is_visible.checked == true){
      is_visible = 1;
    }else{
      is_visible = 0;
    }
    var settings = {
      "url": "{{route('gallery.create')}}",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "title": $("input[name=title]").val(),
        "slug": $("input[name=slug]").val(), 
        "start_date": $("input[name=start_date]").val(),
        "end_date": $("input[name=end_date]").val(),
        "gallery_content":CKEDITOR.instances.content.getData(),
        "is_visible": is_visible,
         
      }),
    };
    $.ajax(settings).done(function(response) {
      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {
        $("input[name=title]").val('');
        $("input[name=content]").val('');
        $('#is_visible').prop('checked', false);
        $('.on').html('');   
        $("input[name=id]").val('');
        $('#createModal').modal('hide');
        swal("{{__('languages.created_successfully')}}", response.message, "success");
        $('#listTable').DataTable().ajax.reload();
      }
    });
  }

  function Edit(id) { 
    $('#saveBtn').html("{{__('languages.update')}}"); 
    $('.modal-title').html($('.modal-title').html().replace("New", "Edit"));
    $('#modalViewBody').html('');
    $(`.laravel_validation`).html('');
    $('#createModal').modal('show');
    var viewSettings = {
      "url": `${baseUrl}/gallery/${id}`,
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
          var is_visible = document.getElementById('is_visible');
          var is_visible1 = is_visible.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('on');
        
              if(response.data.is_visible == 0){
                $('#is_visible').prop('checked', false); // unChecks it  
                        is_visible1.innerHTML="No";
                        is_visible1.style.color="#253b52";              
              }else{
                $('#is_visible').prop('checked', true); // Checks it 
                        is_visible1.style.color="green";
                        is_visible1.innerHTML="Yes";                
              }
        $("input[name=title]").val(response.data.title);
        $("input[name=slug]").val(response.data.slug);
        $("input[name=start_date]").val(response.data.start_date);
        $("input[name=end_date]").val(response.data.end_date);
        CKEDITOR.instances.content.setData(response.data.content);
        $("input[name=id]").val(response.data.id);
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
          "url": `${baseUrl}/gallery/${id}`,
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
          "url": `${baseUrl}/gallery/1`,
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
  function Update() {

    $(`.laravel_validation`).html('');
    var is_visible = document.getElementById('is_visible');
    if(is_visible.checked == true){
      is_visible = 1;
    }else{
      is_visible = 0;
    }
    var settings = {
      "url": `${baseUrl}/gallery`,
      "method": "PUT",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "title": $("input[name=title]").val(),
        "slug": $("input[name=slug]").val(),
        "start_date": $("input[name=start_date]").val(),
        "end_date": $("input[name=end_date]").val(),
        "gallery_content":CKEDITOR.instances.content.getData(),        
        "is_visible": is_visible,        
        "id": $("input[name=id]").val(),
      })
    };

    $.ajax(settings).done(function(response) {

      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {
        $("input[name=title]").val('');
        $("input[name=content]").val(''); 
        $('#is_visible').prop('checked', false);
        $('.on').html('');
        $("input[name=id]").val('');
        $('#createModal').modal('hide');
        swal("{{__('languages.updated_successfully')}}", response.message, "success");
        $('#listTable').DataTable().ajax.reload();
      }

    });

  }
  
  $('.create_modal').click(function() {
    $('#saveBtn').html('{{__("languages.save")}}');
    CKEDITOR.instances.content.setData('')
    $(`.laravel_validation`).html('');
    $('.modal-title').html($('.modal-title').html().replace("Edit", "New"));
    document.getElementById("reloadform"). reset();
    $('#createModal').modal('show');
  });
  
  
  function onOff(th){
    var z = document.getElementById('check');
    var on = th.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('on');
    var off = th.parentElement.parentElement.querySelectorAll('.off')[0]; //document.getElementsByClassName('off');
    
    if (th.checked == false) {
      on.innerHTML='{{__("languages.no")}}';
      on.style.color="#253b52";
    } else {
      on.style.color="green";
      on.innerHTML='{{__("languages.yes")}}';   
    
    }
  }
  $('#saveBtn').click(function() {
    if ($('#saveBtn').html() == "Update" || "تحديث") {
      Update();
    } else {
      Create();
    }
  });
  function convertToSlug(Text) {
    return Text.toLowerCase()
      .replace(/[^\w ]+/g, '')
      .replace(/ +/g, '-');
  }
  $($("input[name=title]")).on('keyup',function(){
    var slug = convertToSlug($(this).val());
    $("input[name=slug]").val(slug);
  });
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

    // cb(start, end);

  });
  $(function() {
    var dateToday = new Date();
    $('input[name="start_date"]').daterangepicker({
      timePicker: true,
      singleDatePicker: true,      
      drops:'up',
      changeMonth: true,
      showDropdowns:true,
      numberOfMonths: 3,
      minDate: dateToday,
      onSelect: function(selected) {
          var option = this.id == "from" ? "minDate" : "maxDate",
              instance = $(this).data("datepicker"),
              date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selected, instance.settings);
          dates.not(this).datepicker("option", option, date);
          
      },
      locale: {
        format: 'YYYY-MM-DD hh:mm:ss'
      }
    });
    $('input[name="end_date"]').daterangepicker({
      timePicker: true,
      singleDatePicker: true,      
      drops:'up',
      changeMonth: true,
      showDropdowns:true,
      numberOfMonths: 3,
      minDate: dateToday,
      onSelect: function(selected) {
          var option = this.id == "from" ? "minDate" : "maxDate",
              instance = $(this).data("datepicker"),
              date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selected, instance.settings);
          dates.not(this).datepicker("option", option, date);
      },
      locale: {
        format: 'YYYY-MM-DD hh:mm:ss'
      }
    });
  });


  
  function publish(obj,id) { 
    var viewSettings = {
      "url": `${baseUrl}/gallery-publish/${id}`,
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