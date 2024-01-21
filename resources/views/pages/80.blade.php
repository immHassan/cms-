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

  <link rel="stylesheet" href="/bootstrap5/bootstrap.css"/>
  <link rel="stylesheet" href="/css/bootnavbar.css" />  
  <link rel="stylesheet" href="/pages/css/{{$page->id}}.css"/>
  

  <script src="/admin/plugins/jquery/jquery.min.js"></script>
  <script src="/pages/js/{{$page->id}}.js"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Owl Stylesheets -->
  <link rel="stylesheet" href="/front/assets/owlcarousel/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="/front/assets/owlcarousel/assets/owl.theme.default.min.css">


  <link href="/front/assets/css/bootstrap5.min.css" rel="stylesheet">
  


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/front/assets/vendor/aos/aos.css" rel="stylesheet">
  <!-- <link href="/front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> -->
  <link href="/front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <!-- <link rel="stylesheet" href="/front/assets/css/docs.theme.min.css"> -->
  <link href="/front/assets/css/main.css" rel="stylesheet">

  <!--Menu CSS File -->
  <link rel='stylesheet' href='/front/assets/css/animate.min.css'>

  <link rel='stylesheet' href='/front/assets/css/tether.min.css'>
  <link href="/front/assets/css/menu.css" rel="stylesheet">
  <!-- Yeah i know js should not be in header. Its required for demos.-->
  <!-- javascript -->




  <script src="/admin/plugins/jquery/jquery.min.js"></script>

<script src="/front/assets/js/main.js"></script>

<script src="/front/assets/vendors/highlight.js"></script>
<script src="/front/assets/js/app.js"></script>


<script src="/front/assets/vendor/aos/aos.js"></script>
<script src="/front/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/front/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="/front/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="/front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>



  <script src="/front/assets/js/bootstrap.bundle.min.js"></script>
 
  <script src="/front/assets/vendors/jquery.min.js"></script>
  <script src="/front/assets/owlcarousel/owl.carousel.js"></script>

  <script src="/front/assets/js/script.js"></script>


  <script src='/front/assets/js/bootstrap4.min.js'></script>
  <script src='/front/assets/js/tether.min.js'></script>

<script src='/front/assets/js/popper.min.js'></script>

  
</head>
<body>

<section class="custom_component" id="ivqd"><div class="custom_component_ph"><div id="carouselExampleControls" data-bs-ride="carousel" class="carousel slide"><div class="carousel-inner"><div class="carousel-item active"><img src="/storage/contact_2.jpg" alt="Second slide" class="d-block w-100"/></div><div class="carousel-item"><img src="/uploads/banners/1682621268a.jpg" alt="Second slide" class="d-block w-100"/></div></div><button type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" class="carousel-control-prev"><span aria-hidden="true" class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></button><button type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" class="carousel-control-next"><span aria-hidden="true" class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></button></div></div><div class="custom_component_content" id="ig3vu">
              @include("admin.cms.components.banner_slider")
            </div></section><style>* { box-sizing: border-box; } body {margin: 0;}.carousel-item img{height:90vh;}#ivqd{border:4px dashed #7d7d7d;padding:10px;}#ig3vu{display:none;}</style> 

<script>
  $('.custom_component_ph').remove();
  $('.custom_component_content').css('display','block');
  $('.custom_component').css('border','none');
  $('.custom_component').css('padding','0px');
</script>




<script src="/bootstrap5/bootstrap.bundle.min.js"></script>
<script src="/js/bootnavbar.js"></script>

</body>
</html>

