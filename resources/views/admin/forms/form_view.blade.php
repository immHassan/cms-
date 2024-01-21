
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Cloud Solution</title>
 
<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{asset('/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ url('/') }}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">


<style>

body{
  background:linear-gradient(
    90deg,
    hsla(328, 75%, 45%, 1) 0%,
    hsla(269, 85%, 41%, 1) 100%
  )
}

.btn {
  width: 100%;
  /* padding: 0.75em 1em; */
  margin: 1em 0 0 0;
  border: 0;
  outline: 0;
  font-size: 1.6rem;
  font-weight: 600;
  letter-spacing: 1px;
  border-radius: 30px;
  background: linear-gradient(
    90deg,
    hsla(328, 75%, 45%, 1) 0%,
    hsla(269, 85%, 41%, 1) 100%
  );
  color: hsl(0, 0%, 100%);
  cursor: pointer;
  transition: all 250ms ease-in-out;
}

.X{
  max-width: 400px;
  margin: 2% auto;
  background: #fff;
  padding: 2%;
  box-shadow: 0 0 20px rgba(46, 59, 125, 0.23);
  border-radius: 5px;
}
label, input, textarea{
  font-size: 20px;
  box-sizing: border-box;
}
input, textarea{
  margin: 0 0 20px 0;
  padding: 15px;
  width: 100%;
  border: none;
  font-weight: 300;
  letter-spacing: 2px;
  box-shadow: 0 2px 2px 0 rgba(0,0,0,0.16),0 0 0 1px rgba(0,0,0,0.08);
  font-family: 'Roboto', sans-serif;
  display: flex;
}

  </style>

@yield('pageCss')
</head>
<body>

    
<div class="X">

<h1 class="text-center">{{$data->title}}</h1>
    <div class="container">    
        <div class="form mb-5">
          <form id="submit_form">
          {!! $data->form_html !!}
          <div class="text-center">
              <button type="button" onclick="submit_form()" class="btn btn-success "> Submit</button> 
          </div>
        </form>
    </div>
</div>
</div>


<script>

function submit_form() {
    $(`.laravel_validation`).html('');
   let form_data = new FormData(document.getElementById('submit_form'));
    var settings = {
      "url": "{{url('/')}}/form/submit/{{$data->slug}}",
      "method": "POST",
      "timeout": 0,      
      "processData": false,
      "contentType": false,
      "headers": {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data":form_data,
    };
    $.ajax(settings).done(function(response) {


      console.log("response",response);


      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {
        swal("Congractulations!", response.message, "success");

        setTimeout(function(){ 
          location.reload();
        },1500);

      }
    });
  }

  </script>


<script src="{{ url('/') }}/admin/plugins/jquery/jquery.min.js"></script>
<script src="{{ url('/') }}/admin/js/sweetalert.min.js"></script>
    

</body>
</html>

