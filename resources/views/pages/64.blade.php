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
                          </span></a></li><li><a href="javascript:;" class="chat"><i class="fas fa-comment"></i><span>Live Chat</span></a></li></ul></div><ul data-aos-="fade-up-left" data-aos--duration="1500" class="navbar"><li class="nav-item active"><a href="/page/home" class="nav-link">Home</a></li><li class="nav-item"><a href="/page/about" class="nav-link">About Us</a></li><li class="nav-item"><a href="/page/vida-page" class="nav-link">VIDA</a></li><li class="nav-item"><a href="/page/contact-us" class="nav-link">Contact</a></li></ul></div></nav></div></div></div></div><section class="inner_banner_"><div class="circle-two"><span class="circ-1"></span><span class="circ-2"></span><span class="circ-3"></span><span class="circ-4"></span></div><div class="container pt-5 pb-5"><div id="i51n" class="row"><div class="col-lg-6"><div class="inner_banner_content"><h4 data-aos--delay="300" data-aos-="fade-right" data-aos--duration="1500">Effective brand strategy
					</h4><h2 data-aos--delay="600" data-aos-="fade-right" data-aos--duration="1500" id="idhu8">Identity &amp;
						Marketing<br/><strong><span>for the right</span><br/>Audience</strong></h2><p data-aos--delay="900" data-aos-="fade-right" data-aos--duration="1500">520 Employees | 52 Digital
						Hospitals | 25 Partnerships</p><a data-aos--delay="1200" data-aos-="fade-right" data-aos--duration="1500" href="javascript:;" class="default_btn inner_default_btn popup-open hvr-sweep-to-right">Start your project<img src="images/arrow-icn.html" alt=""/></a></div></div></div></div></section><section class="second-header"><div class="container mt-5"><div class="why-us-heading text-center mb-5"><h1>WHY US ?</h1></div><div class="row"><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos--duration="1500" data-aos-="fade-down" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos-="fade-up" data-aos--duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2> <i class="fa-solid fa-building"></i> </h2></div><div data-aos-="fade-down" data-aos--duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>25 </h2><p> Branches </p></div></div></div></div><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos--duration="1500" data-aos-="fade-down" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos-="fade-up" data-aos--duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2> <i class="fa-solid fa-user-md"></i> </h2></div><div data-aos-="fade-down" data-aos--duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>520 </h2><p> Employees </p></div></div></div></div><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos--duration="1500" data-aos-="fade-down" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos-="fade-up" data-aos--duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2> <i class="fa-sharp fa-solid fa-hospital"></i> </h2></div><div data-aos-="fade-down" data-aos--duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>52 </h2><p> Digital Hospitals </p></div></div></div></div><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos--duration="1500" data-aos-="fade-up" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos-="fade-up" data-aos--duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2> <i class="fa-solid fa-smog"></i> </h2></div><div data-aos-="fade-down" data-aos--duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>12 </h2><p> Products </p></div></div></div></div><div class="col-md-4 col-sm-6 col-12 mt-2"><div data-aos--duration="1500" data-aos-="fade-up" class="text-center section-header-box aos-init aos-animate"><div class="row"><div data-aos-="fade-up" data-aos--duration="1500" class="col-md-5 col-sm-5 col-12 aos-init aos-animate"><h2> <i class="fa-solid fa-handshake-simple"></i> </h2></div><div data-aos-="fade-down" data-aos--duration="1500" class="col-md-7 col-sm-7 col-12 aos-init aos-animate"><h2>25 </h2><p> Partnerships </p></div></div></div></div></div></div></section><section class="new_section pt-5 pb-5"><div class="new_section_inner">
	</div><div class="row"><div data-aos--delay="100" data-aos-="fade-down" data-aos--duration="1500" class="text-center our-products fade-up aos-init aos-animate col-12"><div><h1>OUR</h1></div><h2>PRODUCTS</h2></div><div class="col-lg-4 col-sm-4 col-12"><img src="/templates/template_2/images/inner_banner/banner_right/mobile_right.html" alt="" id="itfoh" class="bounce-2 product-slider-img2"/></div><div class="col-lg-8 col-sm-8 col-12"><div id="injiz" class="second-slider-nav d-flex"><div onclick="changeProductNew(this,2)" class="new_section_box new_section_box_selected"><img src="/templates/template_2/images/products/vida.png" alt=""/></div><div onclick="changeProductNew(this,2)" class="new_section_box"><img src="/templates/template_2/images/products/mohemm.png" alt=""/></div><div onclick="changeProductNew(this,2)" class="new_section_box"><img src="/templates/template_2/images/products/mohemm.png" alt=""/></div><div onclick="changeProductNew(this,2)" class="new_section_box"><img src="/templates/template_2/images/products/mohemm.png" alt=""/></div></div><div class="service_title_sec"><h2 data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="ml-5"><span class="drk_txt">Patient Care</span> VIDA
					</h2><p data-aos--delay="500" data-aos-="fade-right" data-aos--duration="1500" class="ml-5 mt-2">VIDA
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
					histories of patients.</p><div id="it2qi" class="btn-slider"><button id="igvi5" class="btn-slider-primary left-slider-triggered"><i class="text-dark fa fa-long-arrow-left"></i></button><button id="ipsjf" class="btn-slider-primary right-slider-triggered"><i class="fa text-dark fa-long-arrow-right"></i></button></div><div data-aos--delay="900" data-aos-="fade-right" data-aos--duration="1500" class="sec_btn ml-5"><a href="javascript:;" class="default_btn inner_default_btn popup-open hvr-sweep-to-right blue_txt m-0">View
						More<img src="/templates/template_2/images/arrow-icn.html" alt=""/></a><a href="javascript:;" class="chat chat_icon"><h5>Chat With Us <i class="fas fa-comment"></i></h5><h4>Live Chat</h4></a></div></div></div></div></section></div><section id="im6s" class="latest_news"><div data-aos--delay="100" data-aos-="fade-down" data-aos--duration="1500" class="text-center our-products fade-up mb-5"><div><h1 id="iniicp">LATEST</h1></div><h2 class="bg-black">NEWS</h2></div><div class="container"><div class="row"><div data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16</h6><h5> January</h5></div> <img src="/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos--delay="100" data-aos-="fade-left" data-aos--duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company</h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
							More</a></div></div></div><div data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16</h6><h5> January</h5></div> <img src="/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos--delay="100" data-aos-="fade-left" data-aos--duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company</h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
							More</a></div></div></div><div data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16</h6><h5> January</h5></div> <img src="/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos--delay="100" data-aos-="fade-left" data-aos--duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company</h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
							More</a></div></div></div><div data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16</h6><h5> January</h5></div> <img src="/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos--delay="100" data-aos-="fade-left" data-aos--duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company</h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
							More</a></div></div></div><div data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16</h6><h5> January</h5></div> <img src="/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos--delay="100" data-aos-="fade-left" data-aos--duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company</h5><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
							More</a></div></div></div><div data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="col-md-4 col-sm-6 col-12 aos-init aos-animate"><div class="index-fifth-wrap-box"><div class="index-fifth-box-top"><h6>16</h6><h5> January</h5></div> <img src="/templates/template_2/images/news/news1.jpg" alt="" class="img-fluid"/><div data-aos--delay="100" data-aos-="fade-left" data-aos--duration="1500" class="index-fifth-box-text"><h5>A joint cooperation agreement between Cloud Solutions and the Omani Osos Company</h5><!-- <p>The LA Rams have won Super Bowl LVI, bringing home the Trophy and the first win in their home SoFi Stadium in Inglewood, California. A final quarter turnaround gave them the win, beating Cincinnati Bengals 23 to 20.</p> --><a href="https://testdevlink.com/inglewoods_dev/inglewood-cheer-dance-palace-clothing-drive">Read
							More</a></div></div></div></div></div></section><section class="our_partners_section"><div data-aos--delay="100" data-aos-="fade-down" data-aos--duration="1500" class="text-center our-products fade-up mb-5"><div><h1>OUR</h1></div><h2>PARTNERS</h2></div><div class="container"><div data-aos--delay="100" data-aos-="fade-down" data-aos--duration="1500" class="row mb-2 fade-up mb-5"><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_1.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_2.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_3.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_4.png"/></div></div><!-- </div> --><!-- <div class="row mt-2 mb-2 fade-up mb-5" data-aos--delay="100" data-aos-="fade-down" data-aos--duration="1500"> --><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_5.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_6.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_7.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_8.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_1.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_2.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_3.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_4.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_5.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_6.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_7.png"/></div></div><div class="col-md-4 col-sm-6 col-6 mt-2"><div class="partner-outer-div"><img src="/templates/template_2/images/partners/partner_8.png"/></div></div></div><div>

</div></div><footer id="ird3"><article><div class="container pt50 pb50 f1"><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 with-text-footer col-foot col-foot1"><div data-aos--delay="100" data-aos-="fade-down" data-aos--duration="1500" class="footer-logo fade-up mb-5"><img src="/templates/template_2/images/cloudsolutions-logo.png"/></div><div data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="footer-text fade-up mb-5"><p>
                Adhering to our principles and services, we intend to curate a riveting experience and
                an
                enchanting story for your brand to stand tall and narrate.
              </p></div></div></div><hr/><div class="row v-centered-f"><div class="col-md-4 col-sm-6 col-6 col-foot col-foot2"><div class="right-con-f"><h3 data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="ftr-head mt-xs-20">Quick
                Links</h3><ul data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="list-unstyled footer-txt"><li><a href="index.php">Home</a></li><li><a href="about.php">About Us</a></li><li><a href="#">Our Solutions</a></li><li><a href="#">Media Centre</a></li><li><a href="#">Contact</a></li></ul></div></div><div class="col-md-4 col-sm-6 col-6 col-foot col-foot3"><h3 data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="ftr-head mt-sm-20 mt-xs-20">
              Solutions</h3><ul data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="list-unstyled footer-txt"><li><a href="vida.php">Vida </a></li><li><a href="mohemm.php">Mohemm</a></li><li><a href="#">Vida Mobile</a></li><li><a href="#">Cyclus</a></li></ul></div><div class="col-md-4 col-sm-12 col-12 col-foot col-foot4"><h3 data-aos--delay="100" data-aos-="fade-up" data-aos--duration="1500" class="ftr-head mt-sm-20">
              Contact Us</h3><ul data-aos--delay="100" data-aos-="fade-right" data-aos--duration="1500" class="list-unstyled footer-txt"><li class="with-ico"><a href="tel:+966 554 087661"><i class="fa fa-phone"></i><span>+966 554 087661</span></a></li><li class="with-ico"><a href="mailto:info@cloudsolutions.com.sa"><i class="fa fa-envelope"></i><span>info@cloudsolutions.com</span></a></li></ul><ul data-aos--delay="100" data-aos-="fade-left" data-aos--duration="1500" class="list-inline footer-txt"><li><a title="<span>k" target="_blank" href="javascript::void()" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a></li><li><a title="Twitter" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a></li><li><a title="Linkedin" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a></li><li><a title="instagram" target="_blank" href="#" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a></li></ul></div></div><hr/></div><div class="container-fluid ptb15 f2"><div class="container"><div class="row"><div class="col-md-12 col-sm-12 col-xs-12 text-center"><p class="mb0">Copyright © 2023 <strong>Cloudsolutions</strong></p><ul class="list-inline footer-txt"><p></p></ul></div></div></div></div></article></footer></section><style>* { box-sizing: border-box; } body {margin: 0;}</style> 

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

