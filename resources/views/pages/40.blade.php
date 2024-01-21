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

  asasas

  
</head>
<body>

<section id="icpu" class="custom_component"><div class="custom_component_ph"><img src="http://localhost/ministry/public//admin/banner_slider.png" id="ikqt"/></div><div id="i3mh" class="custom_component_content">
              @include("admin.cms.components.banner_slider")
            </div></section><section id="iv6g" class="custom_component"><div class="custom_component_ph"><img src="http://localhost/ministry/public//admin/news_slider.png" id="iz21"/></div><div id="ikj9" class="custom_component_content">
              @include("admin.cms.components.news_slider")
            </div></section><style>* { box-sizing: border-box; } body {margin: 0;}#icpu{border:4px dashed #7d7d7d;padding:10px;}#ikqt{height:auto;width:100%;}#i3mh{display:none;}#iv6g{border:4px dashed #7d7d7d;padding:10px;}#iz21{height:auto;width:100%;}#ikj9{display:none;}</style> 

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

