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

  <link rel="icon" href="http://localhost/ministry/public/templates/template_2/images/fav.png" type="image/png">
<link rel="stylesheet" type="text/css" href="http://localhost/ministry/public/templates/template_2/css/plugin.css">
<link rel="stylesheet" type="text/css" href="http://localhost/ministry/public/templates/template_2/css/custom.css">
<link rel="stylesheet" type="text/css" href="http://localhost/ministry/public/templates/template_2/css/responsive.css">
<link rel="stylesheet" type="text/css" href="http://localhost/ministry/public/templates/template_2/css/my.css">
<link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet">

<script src="http://localhost/ministry/public/templates/template_2/js/plugin.js"></script>

  
</head>
<body>

<div class="progress-bar-parent">
</div><header class="main-header"><div class="container-fluid"><div class="container-fluid"><section class="custom_component" id="idml1w"><div class="custom_component_ph"><img src="http://localhost/ministry/public//admin/custom_navbar.png" id="iwc249"/></div><div class="custom_component_content" id="i9xzij">
              @include("admin.cms.components.custom_navbar")
            </div></section><div class="main-header-wrap"><div class="row"><div class="col-lg-12 col-md-12 col-sm-12"><div class="menu-wrap"><nav class="navbar navbar-expand-lg navbar-light"><a href="index.php" data-aos="fade-right" data-aos-duration="1500" class="navbar-brand"><img src="http://localhost/ministry/public/templates/template_2/images/cloudsolutions-logo.png" alt="" class="img-fluid"/></a><button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span><i class="fa-solid fa-bars"></i></button><div id="navbarSupportedContent-2" class="collapse navbar-collapse"><div data-aos="fade-down-left" data-aos-duration="1500" class="menuInfo"><ul><li><a href="javascript:;" class="popup-open"><i class="fas fa-comment"></i><span>Request a Quote</span></a></li><li><a href="tel:+22222"><i class="fas fa-phone-volume"></i><span>
                           2222222
                          </span></a></li><li><a href="javascript:;" class="chat"><i class="fas fa-comment"></i><span>Live Chat</span></a></li></ul></div><ul data-aos="fade-up-left" data-aos-duration="1500" class="navbar"><li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li><li class="nav-item"><a href="about.php" class="nav-link">About Us</a></li><li class="nav-item"><div class="dropdown"><button type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-secondary dropdown-toggle">
                          Our Solutions
                        </button><div aria-labelledby="dropdownMenuButton" class="dropdown-menu"><a href="vida.php" class="dropdown-item">Vida</a><a href="mohemm.php" class="dropdown-item">Mohemm</a></div></div></li><li class="nav-item"><a href="#" class="nav-link">Media Center</a></li><li class="nav-item"><a href="contact-us.php" class="nav-link">Contact</a></li></ul></div></nav></div></div></div></div></div></div></header><section id="ij76i" class="inner_banner"><div class="circle-two"><span class="circ-1"></span><span class="circ-2"></span><span class="circ-3"></span><span class="circ-4"></span></div><div class="container"><div class="row"><div id="banner-left" class="col-lg-6"><div class="inner_banner_content"><h4 data-aos-delay="300" data-aos="fade-right" data-aos-duration="1500">EVOKE EMOTIONS 
          </h4><h2 data-aos-delay="600" data-aos="fade-right" data-aos-duration="1500">Driving Healthcare
            <br/><strong><span>Healthcare</span><br/>Innovation</strong></h2><p data-aos-delay="900" data-aos="fade-right" data-aos-duration="1500">520 Employees | 52 Digital
            Hospitals | 25 Partnerships
          </p><a data-aos-delay="1200" data-aos="fade-right" data-aos-duration="1500" href="javascript:;" class="default_btn inner_default_btn popup-open hvr-sweep-to-right text-white">Start
            your
            project<img src="http://localhost/ministry/public/templates/template_2/images/arrow-icn.html" alt=""/></a></div></div></div></div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#fff" fill-opacity="1" d="M0,256L30,245.3C60,235,120,213,180,186.7C240,160,300,128,360,138.7C420,149,480,203,540,197.3C600,192,660,128,720,117.3C780,107,840,149,900,149.3C960,149,1020,107,1080,112C1140,117,1200,171,1260,170.7C1320,171,1380,117,1410,90.7L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
    </path></svg></section><section class="second-header"><div class="container"><section class="custom_component" id="isxley"><div class="custom_component_ph"><img src="http://localhost/ministry/public//admin/news_slider.png" id="i8q54f"/></div><div class="custom_component_content" id="i9wqbf">
              @include("admin.cms.components.news_slider")
            </div></section><div class="why-us-heading text-center mb-5"><h1>WHY US ?
      </h1></div><div class="row"><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos-duration="1500" data-aos="fade-down" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos="fade-up" data-aos-duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2><i class="fa-solid fa-building">
                </i></h2></div><div data-aos="fade-down" data-aos-duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>25 
              </h2><p> Branches 
              </p></div></div></div></div><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos-duration="1500" data-aos="fade-down" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos="fade-up" data-aos-duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2><i class="fa-solid fa-user-doctor-hair">
                </i></h2></div><div data-aos="fade-down" data-aos-duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>520 
              </h2><p> Employees 
              </p></div></div></div></div><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos-duration="1500" data-aos="fade-down" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos="fade-up" data-aos-duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2><i class="fa-sharp fa-solid fa-hospital">
                </i></h2></div><div data-aos="fade-down" data-aos-duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>52 
              </h2><p> Digital Hospitals 
              </p></div></div></div></div><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos-duration="1500" data-aos="fade-up" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos="fade-up" data-aos-duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2><i class="fa-solid fa-smog">
                </i></h2></div><div data-aos="fade-down" data-aos-duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>12 
              </h2><p> Products 
              </p></div></div></div></div><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos-duration="1500" data-aos="fade-up" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos="fade-up" data-aos-duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2><i class="fa-solid fa-handshake-simple">
                </i></h2></div><div data-aos="fade-down" data-aos-duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>25 
              </h2><p> Partnerships 
              </p></div></div></div></div></div></div></section><section class="experties d-none"><div class="experties-slider owl-carousel owl-theme"><div class="item"><div id="ikhtzp" class="experties_box"><div data-aos="zoom-in" data-aos-duration="1500" class="experties_overlay"><h3>Branding Solutions 
            <br/>That Connect
          </h3><a href="logo-design.html" class="experties_btn hvr-sweep-to-right">Logo Design</a></div></div></div><div class="item"><div id="i3df52" class="experties_box"><div class="experties_overlay"><h3 data-aos="zoom-in" data-aos-duration="1500">Online Presences 
            <br/>That Engage
          </h3><a href="web-design.php" class="experties_btn hvr-sweep-to-right">Website</a></div></div></div><div class="item"><div id="isnoqg" class="experties_box"><div class="experties_overlay"><h3 data-aos="zoom-in" data-aos-duration="1500">Motions That 
            <br/>Capture Emotions 
          </h3><a href="animation.php" class="experties_btn hvr-sweep-to-right">Video Animation</a></div></div></div><div class="item"><div id="ip9x7v" class="experties_box"><div class="experties_overlay"><h3 data-aos="zoom-in" data-aos-duration="1500">Presences That 
            <br/>Stay Top
          </h3><a href="seo.php" class="experties_btn hvr-sweep-to-right">SEO</a></div></div></div><div class="item"><div id="iwr0kj" class="experties_box"><div class="experties_overlay"><h3 data-aos="zoom-in" data-aos-duration="1500">Engagements That 
            <br/>Are Meaningful
          </h3><a href="social-media.php" class="experties_btn hvr-sweep-to-right">Social Media</a></div></div></div><div class="item"><div id="iuuo38" class="experties_box"><div class="experties_overlay"><h3 data-aos="zoom-in" data-aos-duration="1500">Ideas That 
            <br/>Create Hype
          </h3><a href="mobile.php" class="experties_btn hvr-sweep-to-right">Mobile Apps</a></div></div></div></div></section><section class="new_section pt-5 pb-5"><div class="new_section_inner"><!-- <img src="http://localhost/ministry/public/templates/template_2/images/side_section.webp"> --></div><div class="row"><div data-aos-delay="100" data-aos="fade-down" data-aos-duration="1500" class="text-center our-products fade-up aos-init aos-animate col-12"><div><h1>OUR
        </h1></div><h2>PRODUCTS
      </h2></div><div class="col-lg-4 col-sm-4 col-12"><img src="http://localhost/ministry/public/templates/template_2/images/inner_banner/banner_right/mobile_right.html" alt="" id="iaxmxt" class="bounce-2 product-slider-img2"/></div><div class="col-lg-8 col-sm-8 col-12"><div id="ih0pnj" class="second-slider-nav"><div onclick="changeProductNew(this,2)" class="new_section_box new_section_box_selected"><img src="http://localhost/ministry/public/templates/template_2/images/products/vida.png" alt=""/></div><div onclick="changeProductNew(this,2)" class="new_section_box"><img src="http://localhost/ministry/public/templates/template_2/images/products/mohemm.png" alt=""/></div><div onclick="changeProductNew(this,2)" class="new_section_box"><img src="http://localhost/ministry/public/templates/template_2/images/products/mohemm.png" alt=""/></div><div onclick="changeProductNew(this,2)" class="new_section_box"><img src="http://localhost/ministry/public/templates/template_2/images/products/mohemm.png" alt=""/></div></div><div class="service_title_sec"><!-- <h2 class="ml-5" data-aos-delay="100" data-aos="fade-right" data-aos-duration="1500">
<span class="drk_txt">Patient Care</span> VIDA
</h2> --><h2 data-aos-delay="100" data-aos="fade-right" data-aos-duration="1500" class="ml-5"><span class="drk_txt">Patient Care</span> VIDA
        </h2><p data-aos-delay="500" data-aos="fade-right" data-aos-duration="1500" class="ml-5 mt-2">VIDA
          system
          is a
          complete paperless electronic health record (EHR) system that allows
          clinical
          professionals to easily document and retrieve clinical information of
          patients,
          creating a digital record that they update with each new encounter. VIDA
          EHR
          is
          a
          real-time, patient-centered record that makes information available
          instantly
          and
          securely to authorized users, While an EHR does contain the medical and
          treatment
          histories of patients.
        </p><div id="imubex" class="btn-slider"><button id="i8k0uh" class="btn-slider-primary left-slider-triggered"><i class="text-dark fa fa-long-arrow-left">
            </i></button><button id="i1soyc" class="btn-slider-primary right-slider-triggered"><i class="fa text-dark fa-long-arrow-right">
            </i></button></div><div data-aos-delay="900" data-aos="fade-right" data-aos-duration="1500" class="sec_btn ml-5"><a href="javascript:;" class="default_btn inner_default_btn popup-open hvr-sweep-to-right blue_txt m-0">View
            More<img src="http://localhost/ministry/public/templates/template_2/images/arrow-icn.html" alt=""/></a><a href="javascript:;" class="chat chat_icon"><h5>Chat With Us 
            <i class="fas fa-comment">
            </i></h5><h4>Live Chat
            </h4></a></div></div></div></div></section><section class="our_partners_section"><div data-aos-delay="100" data-aos="fade-down" data-aos-duration="1500" class="text-center our-products fade-up mb-5"><div><h1>OUR
      </h1></div><h2>PARTNERS
    </h2></div><div class="container"><div data-aos-delay="100" data-aos="fade-down" data-aos-duration="1500" class="row mb-2 fade-up mb-5"><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_1.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_2.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_3.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_4.png"/></div></div><!-- </div> --><!-- <div class="row mt-2 mb-2 fade-up mb-5" data-aos-delay="100" data-aos="fade-down" data-aos-duration="1500"> --><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_5.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_6.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_7.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_8.png"/></div></div><!-- </div> --><!-- <div class="row mt-2 mb-2 fade-up mb-5" data-aos-delay="100" data-aos="fade-down" data-aos-duration="1500"> --><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_1.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_2.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_3.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_4.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_5.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_6.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_7.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="http://localhost/ministry/public/templates/template_2/images/partners/partner_8.png"/></div></div></div><div>
    </div></div></section><section id="ipszqc" class="latest_news"><div data-aos-delay="100" data-aos="fade-down" data-aos-duration="1500" class="text-center our-products fade-up mb-5"><div><h1 id="iyjfgb">LATEST
      </h1></div><h2 id="ihxyxg">NEWS
    </h2></div><div class="container"><div class="row"><div data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16
            </h6><h5> January
            </h5></div><img src="http://localhost/ministry/public/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos-delay="100" data-aos="fade-left" data-aos-duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company
            </h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
              More</a></div></div></div><div data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16
            </h6><h5> January
            </h5></div><img src="http://localhost/ministry/public/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos-delay="100" data-aos="fade-left" data-aos-duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company
            </h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
              More</a></div></div></div><div data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16
            </h6><h5> January
            </h5></div><img src="http://localhost/ministry/public/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos-delay="100" data-aos="fade-left" data-aos-duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company
            </h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
              More</a></div></div></div><div data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16
            </h6><h5> January
            </h5></div><img src="http://localhost/ministry/public/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos-delay="100" data-aos="fade-left" data-aos-duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company
            </h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
              More</a></div></div></div><div data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16
            </h6><h5> January
            </h5></div><img src="http://localhost/ministry/public/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos-delay="100" data-aos="fade-left" data-aos-duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company
            </h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
              More</a></div></div></div><div data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16
            </h6><h5> January
            </h5></div><img src="http://localhost/ministry/public/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos-delay="100" data-aos="fade-left" data-aos-duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company
            </h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
              More</a></div></div></div></div></div></section><div id="iyw8tj" class="for-home"><footer id="ij9tt8"><article><div class="container pt50 pb50 f1"><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 with-text-footer col-foot col-foot1"><div data-aos-delay="100" data-aos="fade-down" data-aos-duration="1500" class="footer-logo fade-up mb-5"><img src="http://localhost/ministry/public/templates/template_2/images/cloudsolutions-logo.png"/></div><div data-aos-delay="100" data-aos="fade-right" data-aos-duration="1500" class="footer-text fade-up mb-5"><p>
                Adhering to our principles and services, we intend to curate a riveting experience and
                an
                enchanting story for your brand to stand tall and narrate.
              </p></div></div></div><hr/><div class="row v-centered-f"><div class="col-md-4 col-sm-6 col-6 col-foot col-foot2"><div class="right-con-f"><h3 data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="ftr-head mt-xs-20">Quick
                Links
              </h3><ul data-aos-delay="100" data-aos="fade-right" data-aos-duration="1500" class="list-unstyled footer-txt"><li><a href="index.php">Home</a></li><li><a href="about.php">About Us</a></li><li><a href="#">Our Solutions</a></li><li><a href="#">Media Centre</a></li><li><a href="contact-us.php">Contact</a></li></ul></div></div><div class="col-md-4 col-sm-6 col-6 col-foot col-foot3"><h3 data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="ftr-head mt-sm-20 mt-xs-20">
              Solutions
            </h3><ul data-aos-delay="100" data-aos="fade-right" data-aos-duration="1500" class="list-unstyled footer-txt"><li><a href="vida.php">Vida </a></li><li><a href="mohemm.php">Mohemm</a></li><li><a href="#">Vida Mobile</a></li><li><a href="#">Cyclus</a></li></ul></div><div class="col-md-4 col-sm-12 col-12 col-foot col-foot4"><h3 data-aos-delay="100" data-aos="fade-up" data-aos-duration="1500" class="ftr-head mt-sm-20">
              Contact Us
            </h3><ul data-aos-delay="100" data-aos="fade-right" data-aos-duration="1500" class="list-unstyled footer-txt"><li class="with-ico"><a href="tel:+966 554 087661"><i class="fa fa-phone">
                  </i><span>+966 554 087661</span></a></li><li class="with-ico"><a href="mailto:info@cloudsolutions.com.sa"><i class="fa fa-envelope">
                  </i><span>info@cloudsolutions.com</span></a></li><!--<li class="with-ico">--><!--    <a href="javascript:void(0)">--><!--        <i class="fa fa-map-marker"></i>--><!--        <span>309 Fellowship Road, East Gate Center, Suite 200, Mt Laurel Township, NJ 08054</span>--><!--    </a>--><!--</li>--></ul><!-- <h3 class="ftr-head mt-sm-20 repeated-heading-f">Connect with us</h3> --><ul data-aos-delay="100" data-aos="fade-left" data-aos-duration="1500" class="list-inline footer-txt"><li><a title="<span>k" target="_blank" href="javascript::void()" rel="noopener noreferrer"><i class="fab fa-facebook-f">
                  </i><!-- <image src="content/dam/web/en/global-resource/background-image/facebook.png" width="16" height="16" /> --></a></li><li><a title="Twitter" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-twitter">
                  </i><!-- <image src="content/dam/web/en/global-resource/background-image/twitter.png" width="16" height="16" /> --></a></li><li><a title="Linkedin" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-linkedin-in">
                  </i><!-- <image src="content/dam/web/en/global-resource/background-image/instagram.png" width="16" height="16" /> --></a></li><li><a title="instagram" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-instagram">
                  </i><!-- <image src="content/dam/web/en/global-resource/background-image/instagram.png" width="16" height="16" /> --></a></li></ul></div></div><hr/></div><div class="container-fluid ptb15 f2"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 text-center"><p class="mb0">Copyright © 2023 
                <strong>Cloudsolutions</strong></p><ul class="list-inline footer-txt"><p>
                </p></ul></div></div></div></div></article></footer></div><!-- The Modal --><div id="popup_form" class="modal"><div class="modal-dialog"><div class="modal-content"><!-- Modal Header --><div class="modal-header"><div class="container text-center"><img src="http://localhost/ministry/public/templates/template_2/images/cloudsolutions-logo.png" alt="" id="ihkcdk" class="img-fluid"/></div><button type="button" data-dismiss="modal" class="close">×</button></div><!-- Modal body --><div class="modal-body"><div class="row"><div class="col-lg-6"><div class="form-group"><input type="text" name="quote[name]" placeholder="Your Name*" data-validation="required" class="form-control"/></div></div><div class="col-lg-6"><div class="form-group"><input type="text" placeholder="quote[Email]*" name="email" data-validation="required" class="form-control"/></div></div><div class="col-lg-6"><div class="form-group"><input type="text" placeholder="Phone*" name="phone" maxlength="10" data-validation="required" class="form-control"/></div></div><div class="col-lg-6"><div class="form-group"><input type="text" name="customers_meta[website]" placeholder="Company Name*" class="form-control"/></div></div><div class="col-lg-12"><div class="form-group"><label for="">Topic</label><select name="45" type="text" required="Select Topic" class="form-control"><option hidden value=""></option><option value="General Inquiry">General Inquiry</option><option value="RFI/RFP">RFI/RFP</option><option value="Sales Inquiry">Sales Inquiry</option><option value="Partnership Inquiry">Partnership Inquiry</option><option value="Other">Other</option></select></div></div><div class="col-lg-12"><div class="form-group"><textarea placeholder="Message*" name="quote[message]" id="exampleFormControlTextarea1" rows="3" cols="8" class="form-control w-100"></textarea></div></div><div id="formResult">
          </div><div class="clearfix">
          </div></div></div><!-- Modal footer --><div class="modal-footer"><button type="submit" id="signupBtn" class="get-started bg-choose-btn">Submit</button></div></div></div></div><style>* { box-sizing: border-box; } body {margin: 0;}*{box-sizing:border-box;}body{margin-top:0px;margin-right:0px;margin-bottom:0px;margin-left:0px;}.inner_banner{background-image:url("http://localhost/ministry/public/templates/template_2/images/banner_img.jpg") !important;background-position-x:initial !important;background-position-y:initial !important;background-size:initial !important;background-repeat-x:initial !important;background-repeat-y:initial !important;background-attachment:initial !important;background-origin:initial !important;background-clip:initial !important;background-color:initial !important;}.for-home::before{content:"";position:absolute;top:60px;background-image:url("images/foot.png");background-position-x:initial;background-position-y:initial;background-attachment:initial;background-origin:initial;background-clip:initial;background-color:initial;width:20%;height:100%;background-repeat-x:no-repeat;background-repeat-y:no-repeat;z-index:1;background-size:contain;right:0px;}#idml1w{border:4px dashed #7d7d7d;padding:10px;}#iwc249{height:auto;width:100%;}#i9xzij{display:none;}#isxley{border:4px dashed #7d7d7d;padding:10px;}#i8q54f{height:auto;width:100%;}#i9wqbf{display:none;}</style> 

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

