<!-- 
<style>
  .carousel-item img {
    height: 90vh;
  }
</style>


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @php
      $banners = get_banners();
    @endphp

    @if($banners)
    @php $i = 0; @endphp
    @foreach($banners as $banner)
        <div class="carousel-item @if($i ==0) active @endif">
          @php 
          if($banner->image_selection == 1)
            $image =$banner->image;
            else
            $image ='/uploads/banners/'.$banner->image;
            
          
          @endphp
           <img class="d-block w-100" src="{{$image}}" alt="Second slide">
        </div>
        @php $i = 1; @endphp
    @endforeach
    @endif
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

 ............... -->





  <section class="e-services">
    <div id="demo" class="carousel slide" data-bs-ride="carousel" data-aos-="fade-down">

      <div class="carousel-inner"> 

      @php
      $banners = get_banners();
    @endphp

    @if($banners)
    @php $i = 0; @endphp
    @foreach($banners as $banner)
          @php 
          if($banner->image_selection == 1)
            $image =$banner->image;
            else
            $image ='/uploads/banners/'.$banner->image;
          @endphp
        <div class="carousel-item @if($i == 0) active @endif">
          <img src="{{$image}}" alt="Slider1" class="d-block" style="width:100%">
          <div class="row">
            <div class="col-md-6">
              <div class="carousel-caption rounded col-md-6 ">
                <h3 class="wa-slider-h">{{$banner->title}}</h3>
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
        @php $i = 1; @endphp
    @endforeach
    @endif
      </div>

      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

</section>


<!-- 
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
         -->