@php $table = "form"; @endphp
@extends('admin.layouts.app')
@section('pageCss')

<link href="{{ url('/') }}/admin/draggable_form/tether.min.css" rel="stylesheet">
<link href="{{ url('/') }}/admin/draggable_form/form_builder.css" rel="stylesheet">

@endsection

<style>
  input.form-check-input {
      position: inherit !important;
  }

  .form_builder_area{
    position:relative !important;
  }
</style>



@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Design Form</h3>
            <div class="card-options">
              <div class="input-group">
              <a  href="javascript:void()" onclick="save_form()" class="btn btn-primary" >
              Save Form</button>
              </a>
            </div>  
            </div>
        </div>
        <div class="card-body">
           

        
          <div class="container">
            <div class="form_builder" style="margin-top: 25px">

            <div class="container"> 
              <label> Form Title</label> 
              <input type="text" class="form-control" name="form_title">  
              <span id="title_err" class="text-danger laravel_validation"> </span>

            </div>
            
            <div class="container"> 
              <label> Form Slug</label> 
              <input type="text" class="form-control" name="form_slug">
              <span id="slug_err" class="text-danger laravel_validation"> </span>  
            </div>


            <div class="container"> 
              <label> Service Name</label>
              <select name="service_id" class="form-control">

              @foreach($service_list as $record)
                <option value="{{$record->id}}"> {{$record->title}} </option>
              @endforeach
              </select>
              <span id="service_id_err" class="text-danger laravel_validation"> </span>  
            </div>



                <hr>

                <div class="row">
                    <div class="col-sm-3">      
                    <h4 class="ml-2"> Form Design</h4> 
                        <nav class="nav-sidebar">
                            <ul class="nav">
                                <li class="form_bal_textfield">
                                    <a href="javascript:;">Text Field <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_textarea">
                                    <a href="javascript:;">Text Area <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_select">
                                    <a href="javascript:;">Select <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_radio">
                                    <a href="javascript:;">Radio Button <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_checkbox">
                                    <a href="javascript:;">Checkbox <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_email">
                                    <a href="javascript:;">Email <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_number">
                                    <a href="javascript:;">Number <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_password">
                                    <a href="javascript:;">Password <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_date">
                                    <a href="javascript:;">Date <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <!-- <li class="form_bal_button">
                                    <a href="javascript:;">Button <i class="fa fa-plus-circle pull-right"></i></a>
                                </li> -->
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-3 bal_builder">
                        <div class="form_builder_area"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="container">
                          <h4> Design Preview</h4>   
                            <form class="form-horizontal">
                                <div class="preview"></div>
                                <div style="display: none" class="form-group plain_html"><textarea rows="50" class="form-control"></textarea></div>
                            </form>
                            <span id="form_html_err" class="text-danger laravel_validation"> </span>  
                        </div>
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
<script src="{{ url('/') }}/admin/draggable_form/form_builder.js"></script>
<script src="{{ url('/') }}/admin/draggable_form/jquery-ui.min.js"></script>
<script src="{{ url('/') }}/admin/draggable_form/tether.min.js"></script>

<script>



function save_form() {
    $(`.laravel_validation`).html('');
   
    let keyValues = {};
    for(i = 0; i < document.querySelectorAll('.form_builder_area input').length;  i++){
      if(document.querySelectorAll('.form_builder_area input')[i].name){
      keyValues[document.querySelectorAll('.form_builder_area input')[i].name] = document.querySelectorAll('.form_builder_area input')[i].value;
          
      }else{
        document.querySelectorAll('.form_builder_area input')[i].name = `value-${i}`;
        keyValues[document.querySelectorAll('.form_builder_area input')[i].name] = document.querySelectorAll('.form_builder_area input')[i].value;
      }
    }
console.log(keyValues);

  let form = document.querySelector('.plain_html textarea').value
    var settings = {
      "url": "{{route('forms.create')}}",
      "method": "POST",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "title": $("input[name=form_title]").val(),
        "slug": $("input[name=form_slug]").val(),
        "form_html": $('.preview').html(),
        "form_html_editable": $('.form_builder_area').html(),
        "key_values":keyValues,
        "service_id":$("select[name=service_id]").val()
      }),
    };
    $.ajax(settings).done(function(response) {


      console.log("response",response);


      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {


        swal("Created Successfully!", response.message, "success");
        
      setTimeout(function(){ 
        window.location.href = "{{route('forms.list')}}" 
      },1500);

    
      }
    });
  }


  function convertToSlug(Text) {
return Text.toLowerCase()
           .replace(/[^\w ]+/g, '')
           .replace(/ +/g, '-');
}



  $($("input[name=form_title]")).on('keyup',function(){
    var slug = convertToSlug($(this).val());
    $("input[name=form_slug]").val(slug);
  });


  </script>

@endsection
