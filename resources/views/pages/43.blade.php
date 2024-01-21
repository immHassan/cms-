<!DOCTYPE html>
<html>
<head>
    
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{$page->title}}</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  @if($meta_tags)    
    @foreach($meta_tags as $tag)  
  <meta name="{{$tag->meta_tag_name}}" content="{{$tag->meta_tag_content}}">
    @endforeach
  @endif


  
  


  <link rel="stylesheet" href="<?= asset('/bootstrap5/bootstrap.css')?>" />
  
  
  <link rel="stylesheet" href="{{asset('css/bootnavbar.css')}}" />  
  <link rel="stylesheet" href="{{asset('pages/css/').'/'.$page_data->id}}.css"/>
  

  <script src="<?=url('/')?>/admin/plugins/jquery/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="{{asset('pages/js/').'/'.$page_data->id}}.js"></script>

  <!-- Favicons -->
  <link href="http://localhost/ministry/public/template1/assets/img/favicon.png" rel="icon">
  <link href="http://localhost/ministry/public/template1/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="http://localhost/ministry/public/template1/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="http://localhost/ministry/public/template1/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://localhost/ministry/public/template1/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="http://localhost/ministry/public/template1/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="http://localhost/ministry/public/template1/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="http://localhost/ministry/public/template1/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="http://localhost/ministry/public/template1/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="http://localhost/ministry/public/template1/assets/css/style.css" rel="stylesheet">

  
</head>
<body>

<nav class="navbar navbar-default"><div class="container"><div class="navbar-header"><button type="button" data-toggle="collapse" data-target="#myNavbar" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand">Me</a></div><div id="myNavbar" class="collapse navbar-collapse"><ul class="nav navbar-nav navbar-right"><li><a href="#">WHO</a></li><li><a href="#">WHAT</a></li><li><a href="#">WHERE</a></li></ul></div></div></nav><div class="container-fluid bg-1 text-center"><h3>Who Am I?</h3><img src="https://www.w3schools.com/bootstrap/bird.jpg" alt="Bird" width="350" height="350" id="i7mcq" class="img-responsive img-circle"/><h3>I"m an adventurer</h3></div><div class="container-fluid bg-2 text-center"><h3>What Am I?</h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p><a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-search"></span> Search
  </a></div><div class="container-fluid bg-3 text-center"><h3>Where To Find Me?</h3><br/><div class="row"><div class="col-sm-4"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><img src="https://www.w3schools.com/bootstrap/birds1.jpg" alt="Image" id="i5ve4" class="img-responsive"/></div><div class="col-sm-4"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><img src="https://www.w3schools.com/bootstrap/birds1.jpg" alt="Image" id="int4c" class="img-responsive"/></div><div class="col-sm-4"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><img src="https://www.w3schools.com/bootstrap/birds1.jpg" alt="Image" id="iuje9" class="img-responsive"/></div></div></div><footer class="container-fluid bg-4 text-center"><p>Bootstrap Theme Made By <a href="https://www.w3schools.com">www.w3schools.com</a></p></footer><style>* { box-sizing: border-box; } body {margin: 0;}#i7mcq{display:inline;}#i5ve4{width:100%;}#int4c{width:100%;}#iuje9{width:100%;}</style> 

<script>
  $('.custom_component_ph').remove();
  $('.custom_component_content').css('display','block');
  $('.custom_component').css('border','none');
  $('.custom_component').css('padding','0px');
</script>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('js/bootnavbar.js')}}"></script>

</body>
</html>

