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

  <link rel="stylesheet" type="text/css" href="/templates/template_2/css/plugin.css">
  <link rel="stylesheet" type="text/css" href="/templates/template_2/css/custom.css">
  <link rel="stylesheet" type="text/css" href="/templates/template_2/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="/templates/template_2/css/my.css">

<link rel="stylesheet" href="/templates/template_2/fa/css/all.css">  
 
  
  <script src="/templates/template_2/js/plugin.js"></script>
  <script src="/templates/template_2/js/my.js"></script>

  
</head>
<body>

<style>* { box-sizing: border-box; } body {margin: 0;}</style> 

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

