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

<section id="i8ab49" class="custom_component"><div class="custom_component_ph"><section id="navbar"><!-- =======Main Side Bar ======= --><div id="sidebar-main" class="position-absolute"><!-- Page Content --><div id="page-content-wrapper"><button type="button" data-toggle="offcanvas" class="hamburger animated fadeInLeft is-closed"><span class="hamb-top"></span><span class="hamb-middle"></span><span class="hamb-bottom"></span></button></div><!-- /#page-content-wrapper --><div class="overlay"></div><!-- Sidebar --><nav id="sidebar-wrapper" role="navigation" class="navbar navbar-inverse fixed-top m-3 wa-font-family wa-font-normal"><ul class="nav sidebar-nav"><li><a href="#"> <img src="/front/assets/img/home/home-nav.svg" alt="" width="18px"/> الرئيسية</a></li><li><a href="#" data-toggle="dropdown" class="dropdown-toggle">عن القوة <span class="caret"></span></a><ul role="menu" class="dropdown-menu animated fadeInRight"><li><a href="#">رؤية قوة الصواريخ الاستراتيجية</a></li><li><a href="#">نبذة عن القادة</a></li><li><a href="#">الهيئات</a></li><li><a href="#">القواعد</a></li><li><a href="#">الادارات</a></li><li><a href="#">سياية امن المعلومات</a></li><li><a href="#">فريق عمل القائد لبرنامج تطوير وزارة الدفاع</a></li></ul></li><li><a href="#">الخدمات الالكترونية</a></li><li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">الأنظمة والتطبيقات <span class="caret"></span></a><ul role="menu" class="dropdown-menu animated fadeInRight"><li><a href="#">رابط للصفحة 1</a></li><li><a href="#">رابط للصفحة 2</a></li></ul></li><li><a href="#">دليل النماذج المستخدمة</a></li><li><a href="#">أمن الاتصالات و المعلومات</a></li><li><a href="#"><img src="/front/assets/img/home/contact-us.svg" alt="" width="30px"/> اتصل بنا</a></li></ul></nav><!-- /#sidebar-wrapper --></div><!-- End Side Bar --></section></div><div id="izsq32" class="custom_component_content">
              @include("admin.cms.components.custom_navbar")
            </div></section><section id="topbar" data-aos-="fade-down" class="topbar d-flex align-items-center bg-dark"><div class="container-fluid m-1"><div class="row"><div class="col-md-1 col-3 mt-1"><a href="#"><img src="/front/assets/img/logo.svg" alt="Wathiq Logo" width="70"/></a></div><div class="col-md-2 wa-component-hide"><input type="text" class="form-control"/></div><div class="col-md-6 wa-component-hide"><div class="ticker-container"><div class="ticker-wrapper"><div class="ticker-transition wa-font-family wa-font-regular"><div class="ticker-item">يوم العلم هو مناسبة وطنية تحتفل بها المملك</div><div class="ticker-item"> وطنية تحتفل بها المملكة العربية السعودية بالعلم السعودي</div><div class="ticker-item"> وطنية تحتفل بها المملكة العربية السعودية بالعلم السعودي وطنية تحتفل بها
                  المملكة العربية السعودية بالعلم السعودي</div></div></div></div></div><div class="col-md-3 wa-top-icons col-9"><div class="float-start wa-top-noti"><ul><li><a href="#"><img src="/front/assets/img/home/envelop.svg"/></a><span class="wa-email wa-font-family wa-font-medium">12</span></li><li><a href="#"><img src="/front/assets/img/home/notification.svg"/></a><span class="wa-notifications wa-font-family wa-font-regular">2</span></li><li><a href="#"><img src="/front/assets/img/home/user.svg"/></a></li><li> <a href="#"><img src="/front/assets/img/home/logout.svg"/></a></li></ul></div></div></div></div><!-- <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center m-1">
        <div><img src="/front/assets/img/logo.png" alt="Wathiq Logo"></div>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div> --></section><section id="i93iv" class="custom_component"><div class="custom_component_ph"><!-- 
<style>
  .carousel-item img {
    height: 90vh;
  }
</style>


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
                    <div class="carousel-item  active ">
                     <img class="d-block w-100" src="/uploads/banners/1683454057main-2.jpg" alt="Second slide">
        </div>
                    <div class="carousel-item ">
                     <img class="d-block w-100" src="/uploads/banners/1683454033main.jpg" alt="Second slide">
        </div>
                  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

 ............... --><section class="e-services"><div id="demo" data-bs-ride="carousel" data-aos-="fade-down" class="carousel slide"><div class="carousel-inner"><div class="carousel-item active"><img src="/uploads/banners/1683454057main-2.jpg" alt="Slider1" id="i4cyk" class="d-block"/><div class="row"><div class="col-md-6"><div class="carousel-caption rounded col-md-6"><h3 class="wa-slider-h">سعوديون بحزمِنا .. ماضون بعزمِنا</h3><p class="wa-slider-txt text-end">تُعتبر الصواريخ البالستية من الأسلحة الهامة والاستراتيجية التي تسعى كل
                  دول العالم الى امتلاكها منذ الحرب
                  العالمية الثانية حيث أصبح هذا السلاح محط أنظار العالم خصوصاً خلال مراحل سباق التسلح العسكري بين الشرق
                  والغرب ، وفي ضوء التهديدات المحتملة وانطلاقاً من رؤية ثاقبة ومن حكمة ولاة الأمر المعروفة بالإتزان فقد
                  سارعت المملكة العربية السعودية</p><span class="d-flex justify-content-start"> <button type="button" class="btn wa-btn-green wa-font-family wa-font-regular text-white">اقرا المزيد</button></span></div></div></div></div><div class="carousel-item"><img src="/uploads/banners/1683454033main.jpg" alt="Slider1" id="imqah" class="d-block"/><div class="row"><div class="col-md-6"><div class="carousel-caption rounded col-md-6"><h3 class="wa-slider-h">سعوديون بحزمِنا .. ماضون بعزمِنا</h3><p class="wa-slider-txt text-end">asasتُعتبر الصواريخ البالستية من الأسلحة الهامة والاستراتيجية التي تسعى كل
                  دول العالم الى امتلاكها منذ الحرب
                  العالمية الثانية حيث أصبح هذا السلاح محط أنظار العالم خصوصاً خلال مراحل سباق التسلح العسكري بين الشرق
                  والغرب ، وفي ضوء التهديدات المحتملة وانطلاقاً من رؤية ثاقبة ومن حكمة ولاة الأمر المعروفة بالإتزان فقد
                  سارعت المملكة العربية السعودية</p><span class="d-flex justify-content-start"> <button type="button" class="btn wa-btn-green wa-font-family wa-font-regular text-white">اقرا المزيد</button></span></div></div></div></div></div><!-- Left and right controls/icons --><button type="button" data-bs-target="#demo" data-bs-slide="prev" class="carousel-control-prev"><span class="carousel-control-prev-icon"></span></button><button type="button" data-bs-target="#demo" data-bs-slide="next" class="carousel-control-next"><span class="carousel-control-next-icon"></span></button></div></section><!-- 
<div class="carousel-item">
          <img src="assets/img/home/main-2.jpg" alt="Slider2" class="d-block" style="width:100%">
          <div class="row">
            <div class="col-md-6">
              <div class="carousel-caption rounded col-md-6 ">
                <h3 class="wa-slider-h">سعوديون بحزمِنا .. ماضون بعزمِنا</h3>
                <p class="wa-slider-txt text-end">تُعتبر الصواريخ البالستية من الأسلحة الهامة والاستراتيجية التي تسعى كل
                  دول العالم الى امتلاكها منذ الحرب
                  العالمية الثانية حيث أصبح هذا السلاح محط أنظار العالم خصوصاً خلال مراحل سباق التسلح العسكري بين الشرق
                  والغرب ، وفي ضوء التهديدات المحتملة وانطلاقاً من رؤية ثاقبة ومن حكمة ولاة الأمر المعروفة بالإتزان فقد
                  سارعت المملكة العربية السعودية</p>
                <span class="d-flex justify-content-start "> <button type="button"
                    class="btn wa-btn-green wa-font-family wa-font-regular text-white">اقرا المزيد</button></span>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/home/main.jpg" alt="Slider3" class="d-block" style="width:100%">
          <div class="row">
            <div class="col-md-6">
              <div class="carousel-caption rounded col-md-6 ">
                <h3 class="wa-slider-h text-end">سعوديون بحزمِنا .. ماضون بعزمِنا</h3>
                <p class="wa-slider-txt">تُعتبر الصواريخ البالستية من الأسلحة الهامة والاستراتيجية التي تسعى كل دول
                  العالم الى امتلاكها منذ الحرب
                  العالمية الثانية حيث أصبح هذا السلاح محط أنظار العالم خصوصاً خلال مراحل سباق التسلح العسكري بين الشرق
                  والغرب ، وفي ضوء التهديدات المحتملة وانطلاقاً من رؤية ثاقبة ومن حكمة ولاة الأمر المعروفة بالإتزان فقد
                  سارعت المملكة العربية السعودية</p>
                <span class="d-flex justify-content-start "> <button type="button"
                    class="btn wa-btn-green wa-font-family wa-font-regular text-white">اقرا المزيد</button></span>
              </div>
            </div>
          </div>
        </div>
         --></div><div id="i3ec6" class="custom_component_content">
              @include("admin.cms.components.banner_slider")
            </div></section><section id="iwzgi" class="custom_component"><div class="custom_component_ph"><!-- Start services slider Start--><section id="i2as9" class="e-services"><div class="mb-2"><div class="container"><div id="ip92g" class="row"><h3 data-aos-="fade-up" class="text-center text-white wa-font-regular">خدماتنا الاكترونية</h3><div class="large-12 columns"><div class="icon-section owl-carousel owl-theme owl-rtl owl-loaded owl-drag"><!-- /............. --><div class="item"><div data-aos-="fade-up" data-aos--delay="100" class="wa-grow"><div class="p-4"><div class="icon m-2 wa-icon d-flex justify-content-center"><img src="/uploads/services/1683456847folder.svg"/></div><h6 class="title wa-t-icon"> نظام الارشفة <br/><i aria-hidden="true" class="fa fa-angle-down"></i></h6></div><div class="wa-slider-menu wa-font-family wa-font-normal"><ul><li><a href="#">الصادرات</a></li><li><a href="#">البريد المرسل</a></li><li><a href="#">&gt;سلة المهملات</a></li>
                                                            $service-&gt;service_links
                  </ul></div></div></div><!-- ................ --><!-- /............. --><div class="item"><div data-aos-="fade-up" data-aos--delay="100" class="wa-grow"><div class="p-4"><div class="icon m-2 wa-icon d-flex justify-content-center"><img src="/uploads/services/1683456895email.svg"/></div><h6 class="title wa-t-icon"> البريد الالكتروني الداخلي <br/><i aria-hidden="true" class="fa fa-angle-down"></i></h6></div><div class="wa-slider-menu wa-font-family wa-font-normal"><ul><li><a href="#">الصادرات</a></li><li><a href="#">البريد المرسل</a></li><li><a href="#">سلة المهملات</a></li>
                                                            $service-&gt;service_links
                  </ul></div></div></div><!-- ................ --><!-- /............. --><div class="item"><div data-aos-="fade-up" data-aos--delay="100" class="wa-grow"><div class="p-4"><div class="icon m-2 wa-icon d-flex justify-content-center"><img src="/uploads/services/1683456959gym.svg"/></div><h6 class="title wa-t-icon"> اختبار اللياقة البدنية <br/><i aria-hidden="true" class="fa fa-angle-down"></i></h6></div><div class="wa-slider-menu wa-font-family wa-font-normal"><ul><li><a href="#">الصادرات</a></li><li><a href="#">البريد المرسل</a></li><li><a href="#">سلة المهملات</a></li>
                                                            $service-&gt;service_links
                  </ul></div></div></div><!-- ................ --><!-- /............. --><div class="item"><div data-aos-="fade-up" data-aos--delay="100" class="wa-grow"><div class="p-4"><div class="icon m-2 wa-icon d-flex justify-content-center"><img src="/uploads/services/1683457036setting.svg"/></div><h6 class="title wa-t-icon"> متابعة المعاملات <br/><i aria-hidden="true" class="fa fa-angle-down"></i></h6></div><div class="wa-slider-menu wa-font-family wa-font-normal"><ul><li><a href="#">الصادرات</a></li><li><a href="#">البريد المرسل</a></li><li><a href="#">سلة المهملات</a></li>
                                                            $service-&gt;service_links
                  </ul></div></div></div><!-- ................ --></div></div></div></div></div></section></div></section><!-- End services slider End--><div id="iix17j" class="custom_component_content">
              @include("admin.cms.components.services_slider")
            </div><section data-aos-="fade-down" id="iz79tp" class="vision wa-vision-index"><div class="fluid-container"><div class="wa-vision section-bg-green wa-rounded p-4"><div class="wa-padding"><h3 class="text-white">الرؤية</h3><p class="text-white wa-font-family">مؤسسة حديثة تمتلك قوات عسكرية محترفة ومشتركة تحمي أمن الـــوطن ومصالحه
            من التهديد الخارجي وتقـــود التحالفات وتشارك بها بجدارة واقتــــدار، وترتكز رؤية الوزارة</p></div></div><section data-aos-="fade-down" class="training section-bg-dark wa-margin-top p-5"><div class="fluid-container"><div class="container"><div class="wa-content-padding m-3"><div class="news-section owl-carousel owl-theme owl-rtl owl-loaded owl-drag"><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front wa-img-news"><div class="flip-card-front-img1"><div class="wa-font-family wa-font-medium text-white">المركز الاعلامي <br/><i aria-hidden="true" class="fa fa-arrow-circle-o-down"></i></div></div></div><div class="flip-card-back"><div class="text-center"><h3 class="wa-text-light-gray">الدورات التدريبية</h3><p class="text-dark p-3">الدورات العسكرية في السعودية هي عبارة تدريبات عسكرية تتم عن طريق أفراد من
                        الجيش في الكليات والمعاهد العسكرية، تشمل جزء عملي، كالتدريب علي حمل السلاح، وأداء تمرينات
                        اللياقة البدنية، وجزء نظري، يتكون من عدة مراحل</p><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front wa-img-news"><div class="flip-card-front-img2"><div class="wa-font-family wa-font-medium text-white">الدورات التدريبية<br/><i aria-hidden="true" class="fa fa-arrow-circle-o-down"></i></div></div></div><div class="flip-card-back"><div class="text-center"><h3 class="wa-text-light-gray">الدورات التدريبية</h3><p class="text-dark p-3">الدورات العسكرية في السعودية هي عبارة تدريبات عسكرية تتم عن طريق أفراد من
                        الجيش في الكليات والمعاهد العسكرية، تشمل جزء عملي، كالتدريب علي حمل السلاح، وأداء تمرينات
                        اللياقة البدنية، وجزء نظري، يتكون من عدة مراحل</p><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front wa-img-news"><div class="flip-card-front-img1"><div class="wa-font-family wa-font-medium text-white">المركز الاعلامي <br/><i aria-hidden="true" class="fa fa-arrow-circle-o-down"></i></div></div></div><div class="flip-card-back"><div class="text-center"><h3 class="wa-text-light-gray">الدورات التدريبية</h3><p class="text-dark p-3">الدورات العسكرية في السعودية هي عبارة تدريبات عسكرية تتم عن طريق أفراد من
                        الجيش في الكليات والمعاهد العسكرية، تشمل جزء عملي، كالتدريب علي حمل السلاح، وأداء تمرينات
                        اللياقة البدنية، وجزء نظري، يتكون من عدة مراحل</p><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div></div></div></div></div></section><section data-aos-="fade-up" class="vision wa-vision-index wa-icon-section"><div class="container"><div class="row p-3"><div class="col-md-1"></div><div class="col-lg-2 col-md-4 mb-3"><div data-aos-="fade-up" data-aos--delay="500" class="wa-bg-white rounded p-3"><div class="text-center"><div><img src="/front/assets/img/home/certificate.svg" alt="certificate" height="64px"/></div><p class="text-secondary">الشهادات</p><h3 data-purecounter-start="0" data-purecounter-end="240" data-purecounter-duration="5" class="purecounter text-secondary"></h3></div></div></div><div class="col-lg-2 col-md-4 mb-3"><div data-aos-="fade-up" data-aos--delay="400" class="wa-bg-white rounded p-3"><div class="text-center"><div><img src="/front/assets/img/home/badges.svg" alt="certificate" height="64px"/></div><p class="text-secondary">الجوائز</p><h3 data-purecounter-start="0" data-purecounter-end="680" data-purecounter-duration="5" class="purecounter text-secondary"></h3></div></div></div><div class="col-lg-2 col-md-4 mb-3"><div data-aos-="fade-up" data-aos--delay="300" class="wa-bg-white rounded p-3"><div class="text-center"><div><img src="/front/assets/img/home/train.svg" alt="certificate" height="64px"/></div><p class="text-secondary">الدورات التدريبية</p><h3 data-purecounter-start="0" data-purecounter-end="63" data-purecounter-duration="5" class="purecounter text-secondary"></h3></div></div></div><div class="col-lg-2 col-md-4 mb-3"><div data-aos-="fade-up" data-aos--delay="200" class="wa-bg-white rounded p-3"><div class="text-center"><div><img src="/front/assets/img/home/libortary.svg" alt="certificate" height="64px"/></div><p class="text-secondary">المنجزات</p><h3 data-purecounter-start="0" data-purecounter-end="320" data-purecounter-duration="5" class="purecounter text-secondary"></h3></div></div></div><div class="col-lg-2 col-md-4 mb-3"><div data-aos-="fade-up" data-aos--delay="100" class="wa-bg-white rounded p-3"><div class="text-center"><div><img src="/front/assets/img/home/employees.svg" alt="certificate" height="64px"/></div><p class="text-secondary">الموظفون</p><h3 data-purecounter-start="0" data-purecounter-end="3210" data-purecounter-duration="5" class="purecounter text-secondary"></h3></div></div></div><div class="col-md-1"></div></div></div></section></div></section><section data-aos-="fade-down" id="isxnab" class="aos-init aos-animate"><div class="container-fluid g-0"><div class="wa-projects"><div class="wa-dark-card p-3"><div class="row p-3"><div class="col-md-4"><img src="/front/assets/img/color-logo.svg" alt="Wathiq Logo" width="100%"/></div><div class="col-md-6 wa-padding text-center"><h3 class="text-white text-end">مشروع واثق</h3><p class="text-white text-end wa-font-family">قوة الصواريخ الاستراتيجية الملكية السعودية
              هي فرع خدمة الدفاع الصاروخي والجناح العسكري
            </p><span class="d-flex justify-content-end"><button type="button" class="btn bg-white wa-font-family wa-font-regular text-dark">اعرف المزيد <i aria-hidden="true" class="fa fa-chevron-left"></i><i aria-hidden="true" class="fa fa-chevron-left"></i></button></span></div></div></div><section id="ivwxxk" class="custom_component"><div class="custom_component_ph"><!-- ======= احدث الاخبار ======= --><section class="section-bg-gray"><div data-aos-="fade-up" class="container"><h2 class="text-center m-4 text-white wa-font-regular">احدث الاخبار</h2><div class="row"><div class="col-lg-12 col-12"><div class="news-section owl-carousel owl-theme owl-rtl owl-loaded owl-drag"><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front wa-img-news"><div><img src="/uploads/news/1683211721news-1.jpg" width="100%"/></div><h6 class="text-dark p-4 wa-font-normal wa-training-padding"> سمو وزير                             الدفاع يلتقي وزير الدفاع                             البريطاني
                    </h6></div><div class="flip-card-back"><div class="text-center p-5"><span class="text-dark wa-font-family wa-font-medium"> سمو وزير                             الدفاع يلتقي وزير الدفاع                             البريطاني</span><div class="text-dark">
                         >التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في

                            الرياض، اليوم، معالي

                            وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين

                            الصديقين،

                            وبحث التعاون الثنائي في المجال العسكري والدفاعي.
                        </div><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front wa-img-news"><div><img src="/uploads/news/1683465965news-2.jpg" width="100%"/></div><h6 class="text-dark p-4 wa-font-normal wa-training-padding"> سمو وزير الدفاع يلتقي وزير الدفاع                         البريطاني
                    </h6></div><div class="flip-card-back"><div class="text-center p-5"><span class="text-dark wa-font-family wa-font-medium"> سمو وزير الدفاع يلتقي وزير الدفاع                         البريطاني</span><div class="text-dark">
                         التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في
                        الرياض، اليوم، معالي
                        وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين الصديقين،
                        وبحث التعاون الثنائي في المجال العسكري والدفاعي.
                        </div><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front wa-img-news"><div><img src="/uploads/news/1683465955news-2.jpg" width="100%"/></div><h6 class="text-dark p-4 wa-font-normal wa-training-padding"> سمو وزير الدفاع يلتقي وزير الدفاع                         البريطاني
                    </h6></div><div class="flip-card-back"><div class="text-center p-5"><span class="text-dark wa-font-family wa-font-medium"> سمو وزير الدفاع يلتقي وزير الدفاع                         البريطاني</span><div class="text-dark">
                         التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في
                        الرياض، اليوم، معالي
                        وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين الصديقين،
                        وبحث التعاون الثنائي في المجال العسكري والدفاعي.
                        </div><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><!-- 
            <div class="item">
              <div class="flip-card-news" tabIndex="0">
                <div class="flip-card-inner-news">
                  <div class="flip-card-front wa-img-news">
                    <div><img src="/front/assets/img/home/news-1.jpg" width="100%"></div>
                    <h6 class="text-dark p-4 wa-font-normal wa-training-padding">القوات المسلحة تحتفل بذكرى
                      يوم التأسيس
                    </h6>

                  </div>
                  <div class="flip-card-back ">
                    <div class="text-center p-5">
                      <span class="text-dark wa-font-family wa-font-medium">سمو وزير الدفاع يلتقي وزير الدفاع
                        البريطاني </span>
                      <p class="text-dark">التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في
                        الرياض، اليوم، معالي
                        وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين الصديقين،
                        وبحث التعاون الثنائي في المجال العسكري والدفاعي.</p>
                      <button type="button"
                        class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> --></div></div></div></div></section><!-- End Training Section --></div><div id="ifxnur" class="custom_component_content">
              @include("admin.cms.components.news_slider")
            </div></section><section id="Guide" class="wa-guide wa-training"><div data-aos-="fade-up" class="container p-5"><div><h2 class="text-center m-4 text-white wa-font-regular">عن القوه و منسوبيها </h2></div><div class="row"><div class="large-12 columns"><div class="power-employee owl-carousel owl-theme owl-rtl owl-loaded owl-drag"><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front"><div class="position-relative"><p class="position-absolute text-white wa-pronects-text">القواعد</p></div><div class="wa-power-employee"><img src="/front/assets/img/home/power-1.jpg" alt="power" width="408"/></div></div><div class="flip-card-back"><div class="text-center p-5"><span class="text-dark wa-font-family wa-font-medium">سمو وزير الدفاع يلتقي وزير الدفاع
                      البريطاني </span><p class="text-dark">التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في
                      الرياض، اليوم، معالي
                      وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين الصديقين،
                      وبحث التعاون الثنائي في المجال العسكري والدفاعي.</p><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><div class="item mt-5"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front"><div class="position-relative"><p class="position-absolute text-white wa-pronects-text">إنجازاتنا</p></div><div class="wa-power-employee"><img src="/front/assets/img/home/power-2.jpg" alt="power" width="408"/></div></div><div class="flip-card-back"><div class="text-center p-5"><span class="text-dark wa-font-family wa-font-medium">سمو وزير الدفاع يلتقي وزير الدفاع
                      البريطاني </span><p class="text-dark">التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في
                      الرياض، اليوم، معالي
                      وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين الصديقين،
                      وبحث التعاون الثنائي في المجال العسكري والدفاعي.</p><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front"><div class="position-relative"><p class="position-absolute text-white wa-pronects-text">رؤية المملكة</p></div><div class="wa-power-employee"><img src="/front/assets/img/home/power-3.jpg" alt="power" width="408"/></div></div><div class="flip-card-back"><div class="text-center p-5"><span class="text-dark wa-font-family wa-font-medium">سمو وزير الدفاع يلتقي وزير الدفاع
                      البريطاني </span><p class="text-dark">التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في
                      الرياض، اليوم، معالي
                      وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين الصديقين،
                      وبحث التعاون الثنائي في المجال العسكري والدفاعي.</p><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><div class="item mt-5"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front"><div class="position-relative"><p class="position-absolute text-white wa-pronects-text">القواعد</p></div><div class="wa-power-employee"><img src="/front/assets/img/home/power-2.jpg" alt="power" width="408"/></div></div><div class="flip-card-back"><div class="text-center p-5"><span class="text-dark wa-font-family wa-font-medium">سمو وزير الدفاع يلتقي وزير الدفاع
                      البريطاني </span><p class="text-dark">التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في
                      الرياض، اليوم، معالي
                      وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين الصديقين،
                      وبحث التعاون الثنائي في المجال العسكري والدفاعي.</p><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div><div class="item"><div tabindex="0" class="flip-card-news"><div class="flip-card-inner-news"><div class="flip-card-front"><div class="position-relative"><p class="position-absolute text-white wa-pronects-text">القواعد</p></div><div class="wa-power-employee"><img src="/front/assets/img/home/power-3.jpg" alt="power" width="408"/></div></div><div class="flip-card-back"><div class="text-center p-5"><span class="text-dark wa-font-family wa-font-medium">سمو وزير الدفاع يلتقي وزير الدفاع
                      البريطاني </span><p class="text-dark">التقى صاحب السمو الملكي الأمير خالد بن سلمان بن عبدالعزيز وزير الدفاع، في
                      الرياض، اليوم، معالي
                      وزير الدفاع البريطاني بين جرى خلال اللقاء، استعراض العلاقات الإستراتيجية بين البلدين الصديقين،
                      وبحث التعاون الثنائي في المجال العسكري والدفاعي.</p><button type="button" class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button></div></div></div></div></div></div></div></div></div></section></div></div></section><section data-aos-="fade-down" class="vision wa-vision-index mt-3 mb-3"><div class="fluid-container"><div class="section-bg-dark wa-card-black wa-rounded p-3"><div class="row"><div class="col-md-2 col-4"><span class="d-flex justify-content-center"><img src="/front/assets/img/home/card-icon.svg" alt="" width="208" class="img-fluid"/></span></div><div class="col-md-5 col-5"><h3 class="text-white">دليلي</h3><p class="text-white wa-font-family">يمكنك التواصل مع عناصر القوة من خلال البحث في الدليل
              اضغط الرابط للانتقال الى صفحة البحث</p><span class="d-flex justify-content-end"><button type="button" class="btn bg-white wa-font-family wa-font-regular text-dark">ابحث في الدليل <i aria-hidden="true" class="fa fa-search"></i></button></span></div></div></div></div></section><section data-aos-="fade-down" class="vision wa-vision-index"><div class="fluid-container section-bg-light-gray"><div class="container"><div class="p-3"><h2 class="text-center m-4 text-dark wa-font-regular"> أمن المعلومات السيبراني </h2></div><div class="row"><div data-aos-="fade-down" data-aos--delay="100" class="col-md-4"><img src="/front/assets/img/home/circle-sprial.svg" alt=""/></div><div data-aos-="fade-up" data-aos--delay="200" class="col-md-4 align-self-center"><!-- <h2 class="text-center m-4 text-dark wa-font-regular">   أمن المعلومات السيبراني   </h2> --><span class="d-flex justify-content-center mb-3"><img src="/front/assets/img/home/success-shield.svg" alt="" width="20%"/></span><div><span class="d-flex justify-content-center"> <button type="button" class="btn wa-btn-green wa-font-family wa-font-regular text-white">المزيد</button></span></div></div><div data-aos-="fade-down" data-aos--delay="300" class="col-md-4"><img src="/front/assets/img/home/spiral-1.svg" alt=""/></div></div></div></div></section><section id="Guide-2" class="wa-guide section-bg-m-gray"><div data-aos-="fade-up" class="container p-5"><div><h2 class="text-center m-4 text-white wa-font-regular"> المنصات الخارجية </h2></div><div class="row gy-4 mb-5"><div data-aos-="fade-up" data-aos--delay="100" class="col-xl-3 col-md-6 col-6"><div class="bg-white rounded-3 p-4"><div class="row wa-task"><div class="col-md-12"><span class="d-flex justify-content-center"><img src="/front/assets/img/home/logo-4.svg" alt="Logos" class="img-fluid"/></span><p class="mt-3 text-center">قيادة القوات المشتركة
                </p><span class="d-flex justify-content-center wa-position-top-40"> <button type="button" class="btn wa-btn-green wa-font-family wa-font-regular text-white">المزيد</button></span></div></div></div></div><!-- End Guide Item --><div data-aos-="fade-up" data-aos--delay="200" class="col-xl-3 col-md-6 col-6"><div class="bg-white rounded-3 p-4"><div class="row wa-task"><div class="col-md-12"><span class="d-flex justify-content-center"><img src="/front/assets/img/home/logo-1.svg" alt="Logos" class="img-fluid"/></span><p class="mt-3 text-center">القوات البحرية الملكية السعودية
                </p><span class="d-flex justify-content-center wa-position-top-40"> <button type="button" class="btn wa-btn-green wa-font-family wa-font-regular text-white">المزيد</button></span></div></div></div></div><!-- End Guide Item --><div data-aos-="fade-up" data-aos--delay="300" class="col-xl-3 col-md-6 col-6"><div class="bg-white rounded-3 p-4"><div class="row wa-task"><div class="col-md-12"><span class="d-flex justify-content-center"> <img src="/front/assets/img/home/logo-2.svg" alt="Logos" class="img-fluid"/></span><p class="mt-3 text-center">القوات الجوية الملكية السعودية
                </p><span class="d-flex justify-content-center wa-position-top-40"> <button type="button" class="btn wa-btn-green wa-font-family wa-font-regular text-white">المزيد</button></span></div></div></div></div><!-- End Guide Item --><div data-aos-="fade-up" data-aos--delay="400" class="col-xl-3 col-md-6 col-6"><div class="bg-white rounded-3 p-4"><div class="row wa-task"><div class="col-md-12"><span class="d-flex justify-content-center"><img src="/front/assets/img/home/logo-3.svg" alt="Logos" class="img-fluid"/></span><p class="mt-3 text-center">القوات البحرية الملكية السعودية
                </p><span class="d-flex justify-content-center wa-position-top-40"> <button type="button" class="btn wa-btn-green wa-font-family wa-font-regular text-white">المزيد</button></span></div></div></div></div><!-- End Guide Item --></div></div></section><section id="Guide-3" class="wa-guide section-bg-dark"><div data-aos-="fade-up" class="container"><div><h2 class="text-center m-4 text-white wa-font-regular"> التعازي </h2></div><div class="row"><div class="col-md-12 text-center text-white"><div class="row"><div class="large-12 columns"><div class="death-section owl-carousel owl-theme owl-rtl owl-loaded owl-drag"><div class="item"><div class="row"><div class="col-md-6 g-0"><div class="wa-death-section-2"><div class="p-3"><span class="d-flex justify-content-center wa-death"><img src="/front/assets/img/home/sarrow-words.png" alt="" width="128"/></span></div></div></div><div class="col-md-6 g-0"><div class="wa-death-section-l"><div class="p-5 text-dark"><h6 class="text-secondary wa-font-regular wa-border-right text-end">2 April 2023</h6><h3 class="text-end">انتقل الى رحمة الله القائد محمد بن إبراهيم بن عليان</h3><p class="text-end">إنتقل الى رحمة الله تعالى القائد الشيخ محمد بن ابراهيم بن عليان صباح يوم
                            الجمعة 18 ربيع الأول 1440 للهجرة في الرياض عن عمر ناهز 56 عام وسوف تكون الصلاة عليه عصر هذا
                            اليوم في جامع الملك خالد بأم الحمام و الدفن في محافظة الدرعية</p></div></div></div></div></div><div class="item"><div class="row"><div class="col-md-6 g-0"><div class="wa-death-section-2"><div class="p-3"><span class="d-flex justify-content-center wa-death"><img src="/front/assets/img/home/sarrow-words.png" alt="" width="128"/></span></div></div></div><div class="col-md-6 g-0"><div class="wa-death-section-l"><div class="p-5 text-dark"><h6 class="text-secondary wa-font-regular wa-border-right text-end">2 April 2023</h6><h3 class="text-end">انتقل الى رحمة الله القائد محمد بن إبراهيم بن عليان</h3><p class="text-end">إنتقل الى رحمة الله تعالى القائد الشيخ محمد بن ابراهيم بن عليان صباح يوم
                            الجمعة 18 ربيع الأول 1440 للهجرة في الرياض عن عمر ناهز 56 عام وسوف تكون الصلاة عليه عصر هذا
                            اليوم في جامع الملك خالد بأم الحمام و الدفن في محافظة الدرعية</p></div></div></div></div></div><div class="item"><div class="row"><div class="col-md-6 g-0"><div class="wa-death-section-2"><div class="p-3"><span class="d-flex justify-content-center wa-death"><img src="/front/assets/img/home/sarrow-words.png" alt="" width="128"/></span></div></div></div><div class="col-md-6 g-0"><div class="wa-death-section-l"><div class="p-5 text-dark"><h6 class="text-secondary wa-font-regular wa-border-right text-end">2 April 2023</h6><h3 class="text-end">انتقل الى رحمة الله القائد محمد بن إبراهيم بن عليان</h3><p class="text-end">إنتقل الى رحمة الله تعالى القائد الشيخ محمد بن ابراهيم بن عليان صباح يوم
                            الجمعة 18 ربيع الأول 1440 للهجرة في الرياض عن عمر ناهز 56 عام وسوف تكون الصلاة عليه عصر هذا
                            اليوم في جامع الملك خالد بأم الحمام و الدفن في محافظة الدرعية</p></div></div></div></div></div></div></div></div></div></div></div></section><section id="tasks" class="section-bg-light-gray"><div data-aos-="fade-up" class="container"><div><h2 class="text-center m-4 text-dark wa-font-regular">مهامي </h2></div><div class="row m-3"><div class="col-lg-12 col-12"><span class="d-flex justify-content-center"><button type="button" class="btn btn-lg wa-btn-green wa-font-family wa-font-regular text-white p-3 m-1">اضف
              مهام <i aria-hidden="true" class="fa fa-plus"></i></button><button type="button" class="btn btn-lg wa-btn-green wa-font-family wa-font-regular text-white p-3 m-1">جميع المهام </button></span></div></div><div class="row gy-4 mb-5"><div class="col-xl-3 col-md-3 col-12"><div class="wa-task-border p-4"><div class="row wa-task"><div class="col-md-12"><h6 class="wa-task-time"><span>2 April 2023</span><br/>صباحا 12:00</h6><p>تستضيف القوات البرية الملكية السعودية، دورة الألعاب الرياضية الثامنة عشرة للقوات المسلحة الأسبوع
                  المقبل ...4</p></div></div></div></div><!-- End Guide Item --><div class="col-xl-3 col-md-3 col-12"><div class="wa-task-border p-4"><div class="row wa-task"><div class="col-md-12"><h6 class="wa-task-time"><span>2 April 2023</span><br/>صباحا 12:00</h6><p>تستضيف القوات البرية الملكية السعودية، دورة الألعاب الرياضية الثامنة عشرة للقوات المسلحة الأسبوع
                  المقبل ...4</p></div></div></div></div><!-- End Guide Item --><div class="col-xl-3 col-md-3 col-12"><div class="wa-task-border p-4"><div class="row wa-task"><div class="col-md-12"><h6 class="wa-task-time"><span>2 April 2023</span><br/>صباحا 12:00</h6><p>تستضيف القوات البرية الملكية السعودية، دورة الألعاب الرياضية الثامنة عشرة للقوات المسلحة الأسبوع
                  المقبل ...4</p></div></div></div></div><!-- End Guide Item --><div class="col-xl-3 col-md-3 col-12"><div class="wa-task-border p-4"><div class="row wa-task"><div class="col-md-12"><h6 class="wa-task-time"><span>2 April 2023</span><br/>صباحا 12:00</h6><p>تستضيف القوات البرية الملكية السعودية، دورة الألعاب الرياضية الثامنة عشرة للقوات المسلحة الأسبوع
                  المقبل ...4</p></div></div></div></div><!-- End Guide Item --></div><!-- End Gudie Container --></div></section><section data-aos-="fade-down" id="ibe877" class="mb-3 mt-3"><div class="container"><h4 class="text-center wa-font-regular">الاجازات الرسمية والاعياد</h4><div class="row p-4"><div class="col-md-4">
          Calendar
        </div><div class="col-md-4"><div tabindex="0"><div class="wa-holidays"><div class="wa-img-news"><div><img src="/front/assets/img/home/holiday-2.jpg" width="100%"/></div><p class="p-2">يوم التأسيس السعودي هو ذكرى تأسيس الدولة السعودية، ويوافق 22 فبراير من كل عام</p></div></div></div></div><div class="col-md-4"><div tabindex="0"><div class="wa-holidays"><div class="wa-img-news"><div><img src="/front/assets/img/home/holiday-1.jpg" width="100%"/></div><p class="p-2">
                  اليوم الوطني 93 تحتفي المملكة قيادة وشعبا يوم غد الجمعة الموافق 23 سبتمبر 2023م باليوم الوطني الثاني
                  والتسعين للمملكة العربية السعودية.تحتفي المملكة قيادة وشعبا يومز
                </p></div></div></div></div></div></div></section><section id="tasks-2" class="section-bg-logo-scroller"><div data-aos-="fade-up" class="container"><div><h2 class="text-center m-4 text-dark wa-font-regular">جديد الأنظمة </h2></div><div class="row"><div class="large-12 columns"><div class="wa-spark"></div><div class="new-system owl-carousel owl-theme owl-rtl owl-loaded owl-drag"><div class="item"><div class="m-3"><span class="wa-system-label text-white rounded p-2 wa-system-label-pos wa-font-family wa-font-normal">جديد</span><img src="/front/assets/img/home/system-1.svg" alt=""/><p class="d-flex justify-content-center wa-death">اسم النظام الجديد</p></div></div><div class="item"><div class="m-3"><span class="wa-system-label text-white rounded p-2 wa-system-label-pos wa-font-family wa-font-normal">جديد</span><img src="/front/assets/img/home/system-1.svg" alt=""/><p class="d-flex justify-content-center wa-death">اسم النظام الجديد</p></div></div><div class="item"><div class="m-3"><span class="wa-system-label text-white rounded p-2 wa-system-label-pos wa-font-family wa-font-normal">جديد</span><img src="/front/assets/img/home/system-1.svg" alt=""/><p class="d-flex justify-content-center wa-death">اسم النظام الجديد</p></div></div><div class="item"><div class="m-3"><span class="wa-system-label text-white rounded p-2 wa-system-label-pos wa-font-family wa-font-normal">جديد</span><img src="/front/assets/img/home/system-1.svg" alt=""/><p class="d-flex justify-content-center wa-death">اسم النظام الجديد</p></div></div><div class="item"><div class="m-3"><span class="wa-system-label text-white rounded p-2 wa-system-label-pos wa-font-family wa-font-normal">جديد</span><img src="/front/assets/img/home/system-1.svg" alt=""/><p class="d-flex justify-content-center wa-death">اسم النظام الجديد</p></div></div><div class="item"><div class="m-3"><span class="wa-system-label text-white rounded p-2 wa-system-label-pos wa-font-family wa-font-normal">جديد</span><img src="/front/assets/img/home/system-1.svg" alt=""/><p class="d-flex justify-content-center wa-death">اسم النظام الجديد</p></div></div><div class="item"><div class="m-3"><span class="wa-system-label text-white rounded p-2 wa-system-label-pos wa-font-family wa-font-normal">جديد</span><img src="/front/assets/img/home/system-1.svg" alt=""/><p class="d-flex justify-content-center wa-death">اسم النظام الجديد</p></div></div></div></div></div></div></section><section id="tasks-3" class="wa-guide section-bg-light-gray mb-4"><div data-aos-="fade-up" class="container"><div><h2 class="text-center m-4 text-dark wa-font-regular">النماذج </h2></div><div data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order" data-aos-="fade-up" data-aos--delay="100" class="portfolio-isotope m-5"><div><ul class="portfolio-flters wa-font-family wa-font-regular"><li data-filter="*" class="filter-active">الأحدث</li><li data-filter=".filter-1" id="ij8oo">كل المبادرات</li><li data-filter=".filter-2">فئة المبادرات 1</li><li data-filter=".filter-3">فئة المبادرات 2</li><!-- <li data-filter=".filter-books">Books</li> --></ul><!-- End Gudie Filters --></div><div class="row gy-4 mb-4 portfolio-container"><div class="col-xl-3 col-md-6 col-6 portfolio-item filter-1"><div class="wa-task-border p-4"><div class="row wa-task"><div class="col-md-12 d-flex justify-content-center"><span><img src="/front/assets/img/home/pdf-downlaod.svg" alt="" class="img-fluid"/></span></div><p class="d-flex justify-content-center mt-4">اسم النموذج 1</p></div></div></div><div class="col-xl-3 col-md-6 col-6 portfolio-item filter-2"><div class="wa-task-border p-4"><div class="row wa-task"><div class="col-md-12 d-flex justify-content-center"><span><img src="/front/assets/img/home/pdf-downlaod.svg" alt="" class="img-fluid"/></span></div><p class="d-flex justify-content-center mt-4">اسم النموذج 1</p></div></div></div><div class="col-xl-3 col-md-6 col-6 portfolio-item filter-2"><div class="wa-task-border p-4"><div class="row wa-task"><div class="col-md-12 d-flex justify-content-center"><span><img src="/front/assets/img/home/pdf-downlaod.svg" alt="" class="img-fluid"/></span></div><p class="d-flex justify-content-center mt-4">اسم النموذج 1</p></div></div></div><div class="col-xl-3 col-md-6 col-6 portfolio-item filter-3"><div class="wa-task-border p-4"><div class="row wa-task"><div class="col-md-12 d-flex justify-content-center"><span><img src="/front/assets/img/home/pdf-downlaod.svg" alt="" class="img-fluid"/></span></div><p class="d-flex justify-content-center mt-4">اسم النموذج 1</p></div></div></div></div><!-- End Gudie Container --></div></div></section><section data-aos-="zoom-out" class="vision wa-vision-index aos-init aos-animate" id="i58jw2d"><div class="fluid-container"><div class="section-bg-gray wa-vision wa-rounded p-3 mb-5"><div class="wa-padding"><h3 class="text-dark">الاستبيانات</h3><p class="text-white wa-font-family">مارأيك بالنظام الجديد المضاف من ناحية الكفاءة العملية؟</p><div class="wa-font-family wa-bottom-card"><ul><li> <input type="radio" name="first" id="first-2"/> مؤيد</li><li> <input type="radio" name="first" id="first-2-2"/> مؤيد بشدة</li><li> <input type="radio" name="first" id="first-3"/> محايد</li><li> <input type="radio" name="first" id="first-4"/> رافض</li><li> <input type="radio" name="first" id="first-5"/> رافض بشدة</li></ul></div><div class="clearfix"></div><div class="d-flex justify-content-end wa-position-top-40"><button type="button" class="btn bg-success wa-font-family wa-font-regular text-white"> أرسل <img src="/front/assets/img/home/help.svg" alt=""/></button></div></div></div></div></section><footer id="footer" class="section-footer-left mt-3 wa-font-regular wa-font-family text-white"><div class="container-fluid"><div class="row gy-4"><div class="col-lg-5 col-md-12 footer-info section-footer-right g-0"><div class="wa-padding-top text-white"><a href="index.html" class="logo d-flex align-items-center"><span><img src="/front/assets/img/color-logo.svg" alt="footer logo"/></span></a><h3 class="text-white fw-normal">استطلاع الرأي</h3><p class="wa-font-regular wa-border-righ text-white">كيف ترى التصميم الجديد للواجهة؟</p><div><input type="radio" name="first" id="first"/> <label for="first">مؤيد </label></div><div> <input type="radio" name="first" id="second"/> <label for="second">مؤيد بشدة</label></div><div><input type="radio" name="first" id="third"/> <label for="third">محايد </label></div><div> <input type="radio" name="first" id="forth"/> <label for="fourth">رافض</label></div><div><input type="radio" name="first" id="fifth"/> <label for="fifth">رافض بشدة</label></div><div class="m-3"><textarea id="exampleFormControlTextarea1" rows="3" placeholder="رايك يهمنا" class="form-control"></textarea></div><button type="button" class="btn wa-btn-green wa-font-family wa-font-regular text-white">إرسال </button></div></div><div class="col-lg-3 col-12 footer-links"><h4 class="text-white mb-5">روابط سريعة </h4><ul><li><a href="#">الرئيسية</a></li><li><a href="#">المركز الاعلامي</a></li><li><a href="#">عن القوة</a></li><li><a href="#">الانظمة والتطبيقات</a></li><li><a href="#">اتصل بنا </a></li><li><a href="#">دليل النماذج المستخدمة </a></li></ul><div class="clearfix"></div><div class="mt-5"><br/><div class="wa-font-family wa-font-regular mt-5">البريد الالكتروني <br/><span class="wa-font-family wa-font-regular"><a href="maito:support@smt.gov.sa" class="wa-font-family wa-font-regular text-white">support@smt.gov.sa</a></span></div></div></div><div class="col-lg-4 col-12 footer-contacts"><h4 class="text-white mb-5"> تواصل معنا </h4><div>مركز هندسة وتطوير النظم ---------</div><span>0966 5322334</span><div>مركز الأمن والمراقبة السيبرانية ---------</div><span>0966 5322334</span><div>مركز الإتصالات والشبكات ---------</div><span>0966 5322334</span><div>مركز المساندة الفنية ---------</div><span>0966 5322334</span><div>قسم التخطيط والمشاريع ---------</div><span>0966 5322334</span><div>قسم الإتصالات الإدارية ---------</div><span>0966 5322334</span><div>قسم التموين ---------------</div><span>0966 5322334</span></div></div></div></footer><section id="site-map" class="section-site-map"><p class="text-center p-3"><a href="" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="text-white wa-font-family wa-font-normal"><span class="float-start"><i aria-hidden="true" class="fa fa-caret-down"></i></span> خريطة الموقع</a></p><div id="collapseExample" class="collapse"><div id="inhi" class="card card-body section-site-map"><div class="row" id="iq3wxf"><div class="col-md-2"><ul class="footer-nav wa-font-family wa-font-regular text-white"><li><a href="#"> الرئيسية</a></li></ul></div><div class="col-md-4"><ul class="footer-nav wa-font-family wa-font-regular text-white"><li><a href="#" data-toggle="dropdown">عن القوة </a><ul class="dropdown-nav wa-font-family wa-font-regular text-white"><li><a href="#">رؤية قوة الصواريخ الاستراتيجية</a></li><li><a href="#">نبذة عن القادة</a></li><li><a href="#">الهيئات</a></li><li><a href="#">القواعد</a></li><li><a href="#">الادارات</a></li><li><a href="#">سياية امن المعلومات</a></li><li><a href="#">فريق عمل القائد لبرنامج تطوير وزارة الدفاع</a></li></ul></li></ul></div><div class="col-md-3"><ul class="footer-nav wa-font-family wa-font-regular text-white"><li><a href="#">الخدمات الالكترونية</a></li><li class="dropdown"><a href="#">الأنظمة والتطبيقات </a><ul class="dropdown-nav wa-font-family wa-font-regular text-white"><li><a href="#">رابط للصفحة 1</a></li><li><a href="#">رابط للصفحة 2</a></li></ul></li><li><a href="#">دليل النماذج المستخدمة</a></li><li><a href="#">أمن الاتصالات و المعلومات</a></li><li><a href="#"> اتصل بنا</a></li></ul></div></div><div class="clearfix"></div></div></div></section><section id="copyright" data-aos-="fade-up" class="mt-3 mb-1"><div class="fluid-container"><div class="container"><div class="row"><div class="col-md-12 col-12 text-dark"><p>جميع الحقوق محفوظه لإدارة الإتصالات وتقنية المعلومات 2023</p></div></div></div></div></section><style>* { box-sizing: border-box; } body {margin: 0;}#i93iv{border:4px dashed #7d7d7d;padding:1px;}#i4cyk{width:100%;}#imqah{width:100%;}#i3ec6{display:none;}#iwzgi{border:4px dashed #7d7d7d;padding:1px;}#ip92g{margin-top:-60px;}#iix17j{display:none;}#ivwxxk{border:4px dashed #7d7d7d;padding:1px;}#ifxnur{display:none;}#i8ab49{border:4px dashed #7d7d7d;padding:1px;}#izsq32{display:none;}#collapseExample{display:none;}</style> 

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

