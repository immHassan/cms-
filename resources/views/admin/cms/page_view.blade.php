<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$page_data->name}}</title>
  

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if($meta_tags)    
      @foreach($meta_tags as $tag)  
    <meta name="{{$tag->meta_tag_name}}" content="{{$tag->meta_tag_content}}">
      @endforeach
    @endif


  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="{{asset('js/bootnavbar.js')}}"></script> -->
  new bootnavbar();


    <!-- Latest compiled JavaScript -->
    
  
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    />
   
    
  <script src="<?=url('/')?>/admin/plugins/jquery/jquery.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


  <script src="  https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



  <!--
  <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}" />  
  <script src="{{asset('js/bootnavbar.js')}}"></script> -->
    

    

  </head>
  <body>

  
  @if(isset($page_data->page_data))
  @php $dt = json_decode($page_data->page_data);   @endphp
    @if($dt)
      @foreach($dt as $key => $value)
        @if($key ==  "gjs-css")
          <style>{!! $value !!} </style>
        @endif
        @if($key ==  "gjs-html")
        {!! $value !!}
        @endif
      @endforeach
    @endif
    @endif 



    
<!-- /////////////////////// COMPONENTS AND NAVBAR START -->



    <script>

      function append_components() {
        var components = document.getElementsByClassName('custom_component');

        for (let index = 0; index < components.length; index++) {
          let component_name = components[index].firstElementChild.className;
          if(component_name){
              var settings = {
                "url": "{{route('cms.get_component')}}",
                "method": "POST",
                "timeout": 0,
                "headers": {
                  "Content-Type": "application/json",
                  "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
                  "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                "data": JSON.stringify({
                  "component_name": component_name
                }),
              };
            $.ajax(settings).done(function(response) {
              components[index].innerHTML = response;
              components[index].style.padding = '0px';
              components[index].style.background = '#fff';

              
              if(component_name == "custom_navbar"){
                append_navbar(0);
              }


            });
          }
        }
      }

      append_components();


      $( document ).ready(function() {    
        
        setTimeout(()=>{
            // new bootnavbar();

              $('.slider').slick({
              infinite: true,
              slidesToShow: 3,
              slidesToScroll: 3
            });
        }, 1000);

      });
    </script>


<!-- /////////////////////// COMPONENTS AND NAVBAR END -->



  </body>
</html>
