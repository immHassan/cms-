




<!-- Start services slider Start-->



<section class="e-services">
  <div class="mb-2 ">
    <div class="container">

      <div class="row" style="margin-top: -60px;">
        <h3 class="text-center text-white wa-font-regular" data-aos-="fade-up">خدماتنا الاكترونية</h3>
        <div class="large-12 columns">

          <div class="icon-section owl-carousel owl-theme  owl-rtl owl-loaded owl-drag">

          @php
      $services = get_services();
    @endphp

    @if($services)
    @foreach($services as $service)
          @php 
          if($service->image_selection == 1)
            $image =$service->image;
            else
            $image ='/uploads/services/'.$service->image;
          @endphp
  

          <!-- /............. -->
            <div class="item">
              <div class=" wa-grow" data-aos-="fade-up" data-aos--delay="100">
                <div class="p-4">
                  <div class="icon m-2 wa-icon d-flex justify-content-center"><img src="{{$image}}">
                  </div>
                  <h6 class="title wa-t-icon"> {{$service->title}} <br><i class="fa fa-angle-down" aria-hidden="true"></i>
                  </h6>
                </div>
                <div class="wa-slider-menu wa-font-family wa-font-normal">
                  <ul>
                    @if($service->service_links)
                    @foreach($service->service_links as $link)
                    <li><a href="{{$link->url}}">{{$link->title}}</a></li>
                    @endforeach
                    @endif
                  </ul>
                </div>
              </div>
            </div>

            <!-- ................ -->
          @endforeach
          @endif
          
          

         

          </div>
        </div>
      </div>

    </div>
  </div>

  </div>
</section>

<!-- End services slider End-->
