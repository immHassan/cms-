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

  <?= replace_text($page_data->custom_cdn); ?>


  
</head>
<body>

<?php if(isset($page_data->page_data)){
  $dt = json_decode($page_data->page_data);  
    if($dt){
      foreach($dt as $key => $value){
        if($key ==  "gjs-css"){
         echo '<style>'.$value.'</style>';
        }
        if($key ==  "gjs-html"){
        echo replace_text($value); 
        }
      }
    }
  }
  ?> 

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

