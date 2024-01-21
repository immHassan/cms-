
  <!-- ======= احدث الاخبار ======= -->

  <section class="section-bg-gray">
    <div class="container" data-aos-="fade-up">
      <h2 class="text-center m-4 text-white wa-font-regular">احدث الاخبار</h2>

      <div class="row">
        <div class="col-lg-12 col-12">
          <div class="news-section owl-carousel owl-theme owl-rtl owl-loaded owl-drag">

             
            @php
              $news = get_news()
            @endphp

            @if($news)
            @php $i = 0; @endphp
            @foreach($news as $record)


            @php 
          if($record->image_selection == 1)
            $image =$record->image;
            else
            $image ='/uploads/news/'.$record->image;
          @endphp
  




            <div class="item">
              <div class="flip-card-news" tabIndex="0">
                <div class="flip-card-inner-news">
                  <div class="flip-card-front wa-img-news">
                    <div><img src="{{$image}}" width="100%"></div>
                    <h6 class="text-dark p-4 wa-font-normal wa-training-padding"> {{$record->title}}
                    </h6>
                  </div>
                  <div class="flip-card-back ">
                    <div class="text-center p-5">
                      <span class="text-dark wa-font-family wa-font-medium"> {{$record->title}}</span>
                      <div class="text-dark">
                         {{ 
                          strip_tags(str_replace('&nbsp;',' ',$record->content))}}
                        </div>
                      <button type="button"
                        class="btn wa-btn-green text-white wa-font-family wa-font-normal">المزيد</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            @endforeach
            @endif

<!-- 
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
            </div> -->


          </div>

        </div>
      </div>




    </div>
  </section><!-- End Training Section -->