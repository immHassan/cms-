<section id="slider_" class="mt-5 mb-5">
  <div class="main">
    <h2 class="text-center"> LATEST NEWS </h2>
    <div class="slider container">

    
    @php
      $news = get_news()
    @endphp

    @if($news)
    @php $i = 0; @endphp
    @foreach($news as $record)




    
      <div class="container m-2">  
        <img class="" style="height:200px; width:300px;" src="{{url('').'/uploads/news/'.$record->image}}" >
        <p class="text-center"> <b>{{$record->title}} </b></p>
      </div>

      <div class="container m-2">  
        <img class="" style="height:200px; width:300px;" src="{{url('').'/uploads/news/'.$record->image}}" >
        <p class="text-center"> <b>{{$record->content}} </b></p>
      </div>
        @php $i = 1; @endphp
    @endforeach
    @endif

    </div>
  </div>
</section>


<script>
      $( document ).ready(function() {      
              $('.slider').slick({
              infinite: true,
              slidesToShow: 3,
              slidesToScroll: 3
            });
      });
</script>