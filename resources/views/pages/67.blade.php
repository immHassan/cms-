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
  <link rel="stylesheet" href="{{asset('pages/css/').'/'.$page->id}}.css"/>
  

  <script src="<?=url('/')?>/admin/plugins/jquery/jquery.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="{{asset('pages/js/').'/'.$page->id}}.js"></script>

  <link rel="stylesheet" type="text/css" href="/templates/template_2/css/plugin.css">
  <link rel="stylesheet" type="text/css" href="/templates/template_2/css/custom.css">
  <link rel="stylesheet" type="text/css" href="/templates/template_2/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="/templates/template_2/css/my.css">

<link rel="stylesheet" href="/templates/template_2/fa/css/all.css">  
 
  
  <script src="/templates/template_2/js/plugin.js"></script>
  <script src="/templates/template_2/js/my.js"></script>

  
</head>
<body>

<div class="container-fluid"><div class="main-header-wrap"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12"><div class="menu-wrap"><nav class="navbar navbar-expand-lg navbar-light"><a href="index.php" data-aos-="fade-right" data-aos--duration="1500" class="navbar-brand"><img src="/templates/template_2/images/cloudsolutions-logo.png" alt="" class="img-fluid"/></a><button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span><i class="fa-solid fa-bars"></i></button><div id="navbarSupportedContent" class="collapse navbar-collapse"><div data-aos-="fade-down-left" data-aos--duration="1500" class="menuInfo"><ul><li><a href="javascript:;" class="popup-open"><i class="fas fa-comment"></i><span>Request a Quote</span></a></li><li><a href="tel:+000"><i class="fas fa-phone-volume"></i><span>
                            000
                          </span></a></li><li><a href="javascript:;" class="chat"><i class="fas fa-comment"></i><span>Live Chat</span></a></li></ul></div><ul data-aos-="fade-up-left" data-aos--duration="1500" class="navbar"><li class="nav-item active"><a href="/page/home" class="nav-link">Home</a></li><li class="nav-item"><a href="/page/about" class="nav-link">About Us</a></li><li class="nav-item"><a href="#" class="nav-link">MOHEMM</a></li><li class="nav-item"><a href="/page/contact-us" class="nav-link">Contact</a></li></ul></div></nav></div></div></div></div></div><section class="inner_banner_"><div class="circle-two"><span class="circ-1"></span><span class="circ-2"></span><span class="circ-3"></span><span class="circ-4"></span></div><div class="container pt-5 pb-5"><div id="i51n" class="row"><div class="col-lg-6"><div class="inner_banner_content"><h4 data-aos--delay="300" data-aos-="fade-right" data-aos--duration="1500">Effective brand strategy
					</h4><h2 data-aos--delay="600" data-aos-="fade-right" data-aos--duration="1500" id="idhu8">Identity &amp;
						Marketing<br/><strong><span>for the right</span><br/>Audience</strong></h2><p data-aos--delay="900" data-aos-="fade-right" data-aos--duration="1500">520 Employees | 52 Digital
						Hospitals | 25 Partnerships</p><a data-aos--delay="1200" data-aos-="fade-right" data-aos--duration="1500" href="javascript:;" class="default_btn inner_default_btn popup-open hvr-sweep-to-right">Start your project<img src="images/arrow-icn.html" alt=""/></a></div></div></div></div></section><section class="video_section"><div class="container"><div class="row steps-vdo pbt-120"><div data-aos--delay="300" data-aos-="fade-right" data-aos--duration="1500" class="col-lg-3 col-md-5 col-sm-12 col-12 float-left"><h1>Who We Are ?</h1><p>Cloud Solutions is a leading IT services provider with more than 15 years of experience in Saudi
					Arabia to serve the market needs in the public and private sectors.</p></div><div class="col-lg-9 col-md-7 col-sm-12 col-12 float-left"><div class="frame"><div class="inner-frame"><video allowfullscreen="allowfullscreen" autoplay id="video1" controls="controls" muted preload="auto" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3R5bGU9ImZpbGw6IHJnYmEoMCwwLDAsMC4xNSk7IHRyYW5zZm9ybTogc2NhbGUoMC43NSkiPgogICAgICAgIDxwYXRoIGQ9Ik04LjUgMTMuNWwyLjUgMyAzLjUtNC41IDQuNSA2SDVtMTYgMVY1YTIgMiAwIDAgMC0yLTJINWMtMS4xIDAtMiAuOS0yIDJ2MTRjMCAxLjEuOSAyIDIgMmgxNGMxLjEgMCAyLS45IDItMnoiPjwvcGF0aD4KICAgICAgPC9zdmc+" class="wh-100 frame-frame"><source src="https://www.cloudsolutions.com.sa/video/cs.mp4"/></video></div></div></div></div></div></section><div id="i7xk"><section class="about-mission-vission"><div class="alternative-sections even"><div class="container mt-5"><div class="row"><div class="col-md-6 col-sm-6 col-12"><div class="box-1"><h2>Our Vision
            </h2><p>Our vision is to expand and scale our client base and products in order to become the
              first choice for digital solution provider to deliver enterprise services to our
              clients.
            </p></div></div><div class="col-md-6 col-sm-6 col-12"><div class="box-2"><img src="/templates/template_2/images/about/about_1.jpg" alt=""/></div></div></div></div></div><div class="alternative-sections odd"><div class="container"><div class="row"><div class="col-md-6 col-sm-6 col-12"><div class="box-2 float-left"><img src="/templates/template_2/images/about/about_2.jpg" alt=""/></div></div><div class="col-md-6 col-sm-6 col-12"><div class="box-1 float-right"><h2>Our Mission
            </h2><p>Cloud Solutions’ mission is to provide best-in class, cost effective global solutions to
              healthcare organizations in the Gulf and Middle Eastern Countries.
            </p></div></div></div></div></div><div class="alternative-sections even"><div class="container"><div class="row"><div class="col-md-6 col-sm-6 col-12"><div class="box-1"><h2>Our Goal
            </h2><p>We in Cloud Solutions are working to stay ahead as a truly meaningful and purposeful
              healthcare IT company. We offer a variety of solutions and digital services in several
              categories. We are also leading the digital transformation both nationally and regionally.
            </p></div></div><div class="col-md-6 col-sm-6 col-12"><div class="box-2"><img src="/templates/template_2/images/about/about_3.jpg" alt=""/></div></div></div></div></div></section></div><footer id="ird3"><article><div class="container pt50 pb50 f1"><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 with-text-footer col-foot col-foot1"><div data-aos--delay="100" data-aos-="fade-down" data-aos--duration="1500" class="footer-logo fade-up mb-5"><img src="/templates/template_2/images/cloudsolutions-logo.png"/></div><div data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="footer-text fade-up mb-5"><p>
                Adhering to our principles and services, we intend to curate a riveting experience and
                an
                enchanting story for your brand to stand tall and narrate.
              </p></div></div></div><hr/><div class="row v-centered-f"><div class="col-md-4 col-sm-6 col-6 col-foot col-foot2"><div class="right-con-f"><h3 data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="ftr-head mt-xs-20">Quick
                Links</h3><ul data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="list-unstyled footer-txt"><li><a href="index.php">Home</a></li><li><a href="about.php">About Us</a></li><li><a href="#">Our Solutions</a></li><li><a href="#">Media Centre</a></li><li><a href="#">Contact</a></li></ul></div></div><div class="col-md-4 col-sm-6 col-6 col-foot col-foot3"><h3 data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="ftr-head mt-sm-20 mt-xs-20">
              Solutions</h3><ul data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="list-unstyled footer-txt"><li><a href="vida.php">Vida </a></li><li><a href="mohemm.php">Mohemm</a></li><li><a href="#">Vida Mobile</a></li><li><a href="#">Cyclus</a></li></ul></div><div class="col-md-4 col-sm-12 col-12 col-foot col-foot4"><h3 data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="ftr-head mt-sm-20">
              Contact Us</h3><ul data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="list-unstyled footer-txt"><li class="with-ico"><a href="tel:+966 554 087661"><i class="fa fa-phone"></i><span>+966 554 087661</span></a></li><li class="with-ico"><a href="mailto:info@cloudsolutions.com.sa"><i class="fa fa-envelope"></i><span>info@cloudsolutions.com</span></a></li></ul><ul data-aos--delay="100" data-aos-="fade-left" data-aos--duration="1500" class="list-inline footer-txt"><li><a title="<span>k" target="_blank" href="javascript::void()" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li><li><a title="Twitter" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a></li><li><a title="Linkedin" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a></li><li><a title="instagram" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a></li></ul></div></div><hr/></div><div class="container-fluid ptb15 f2"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 text-center"><p class="mb0">Copyright © 2023 <strong>Cloudsolutions</strong></p><ul class="list-inline footer-txt"><p></p></ul></div></div></div></div></article></footer><style>* { box-sizing: border-box; } body {margin: 0;}</style> 

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

