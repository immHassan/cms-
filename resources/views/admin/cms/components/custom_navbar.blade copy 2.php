
@php
/*
  $navbar  = get_navbar();
  $navbarRaw = '';
  foreach($navbar as $result){
    if($result->parent_id == "0"){
        $navbarRaw .= get_nav_child_li($result,$navbar);
    }
  }

  function get_nav_child_li($element,$navbar){

    $childs = get_nav_child(element.navbar_detail_id,$navbar);
    if(count($childs) > 0){
      $childNavRaw .= '<li id="nav-'+$element->navbar_detail_id+'" class="nav-item dropdown mt-1">  <a class="dropdown-item dropdown-toggle" href="'+$element->slug+'" role="button" data-bs-toggle="dropdown">'+$element->name+'
      </a> <ul class="dropdown-menu animate__animated animate__fadeIn" id="navbar-ul-'+$element->navbar_detail_id+'" >';

      foreach($childs as $childElement){

        if(count(get_nav_child($childElement->navbar_detail_id,$navbar)) > 0){
          get_nav_child_li($childElement,$navbar);        
        }else{
          $childNavRaw .=  '<li> <a class="dropdown-item" href="/'+$childElement->slug+'" >'+$childElement->name+'</a></li>';
        };
       }
      $childNavRaw +=  '</ul> </li>';
    }else{
      $childNavRaw +=  `<li id="nav-`+$element->navbar_detail_id+`" class="nav-item"><a class="nav-link active" aria-current="page" href="{{url('/')}}/`+$element->slug+`" >`+$element->name+`</a></li>`;
    }
    return $childNavRaw;
  }



  function get_nav_child($element_id,$navbar){
    $nav_child = [];
    
    foreach($navbar as $nav){
      if($nav->parent_id == $element_id){
        $nav_child[] = $nav; 
      }
    }

    return $nav_child;
  }

  */
@endphp


  <section id="navbar">
  <div id="sidebar-main" class="position-absolute">
    <div id="page-content-wrapper">
      <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
        <span class="hamb-top"></span>
        <span class="hamb-middle"></span>
        <span class="hamb-bottom"></span>
      </button>

    </div>

    <div class="overlay"></div>

    <nav class="navbar navbar-inverse fixed-top m-3 wa-font-family wa-font-normal" id="sidebar-wrapper"
      role="navigation">
      <ul class="nav sidebar-nav">

        <li><a href="#"> <img src="/front/assets/img/home/home-nav.svg" alt="" width="18px"> الرئيسية</a></li>
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">عن القوة <span class="caret"></span></a>
          <ul class="dropdown-menu animated fadeInRight" role="menu">

            <li><a href="#">رؤية قوة الصواريخ الاستراتيجية</a></li>
            <li><a href="#">نبذة عن القادة</a></li>
            <li><a href="#">الهيئات</a></li>
            <li><a href="#">القواعد</a></li>
            <li><a href="#">الادارات</a></li>
            <li><a href="#">سياية امن المعلومات</a></li>
            <li><a href="#">فريق عمل القائد لبرنامج تطوير وزارة الدفاع</a></li>

          </ul>
        </li>
        <li><a href="#">الخدمات الالكترونية</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">الأنظمة والتطبيقات <span class="caret"></span></a>
          <ul class="dropdown-menu animated fadeInRight" role="menu">

            <li><a href="#">رابط للصفحة 1</a></li>
            <li><a href="#">رابط للصفحة 2</a></li>

          </ul>
        </li>
        <li><a href="#">دليل النماذج المستخدمة</a></li>

        <li><a href="#">أمن الاتصالات و المعلومات</a></li>
        <li><a href="#"><img src="/front/assets/img/home/contact-us.svg" alt="" width="30px"> اتصل بنا</a></li>

      </ul>
    </nav>

  </div>
</section>






<script>
    
  function get_nav_child(element_id){
    var nav_child = [];
    navbar.forEach(element => {
      if(element.parent_id == element_id){
        nav_child.push(element);
      }
    });
    return nav_child;
  }
  var childNavRaw = '';
  function get_nav_child_li(element){
    let childs = get_nav_child(element.navbar_detail_id);
    if(childs.length > 0){
      childNavRaw += '<li id="nav-'+element.navbar_detail_id+'" class="nav-item dropdown mt-1">  <a class="dropdown-item dropdown-toggle" href="'+element.slug+'" role="button" data-bs-toggle="dropdown">'+element.name+'
      </a> <ul class="dropdown-menu animate__animated animate__fadeIn" id="navbar-ul-'+element.navbar_detail_id+'" >';

      childs.forEach(childElement => {
        if(get_nav_child(childElement.navbar_detail_id).length > 0){
          get_nav_child_li(childElement);        
        }else{
          childNavRaw +=  '<li> <a class="dropdown-item" href="/'+childElement.slug+'" >'+childElement.name+'</a></li>';
        };
      });
      childNavRaw +=  '</ul> </li>';
    }else{
      childNavRaw +=  `<li id="nav-`+element.navbar_detail_id+`" class="nav-item"><a class="nav-link active" aria-current="page" href="{{url('/')}}/`+element.slug+`" >`+element.name+`</a></li>`;
    }
    return childNavRaw;
  }



  function append_navbar(){
        get_navbar().then((response)=>{
          let navbarRaw = '';
          let data = navbar;
          data.forEach(element => {
            if(element.parent_id == "0"){
              navbarRaw = get_nav_child_li(element);
            }             
          });
          $(".sidebar-nav").append(navbarRaw);
        });
  }


  var navbar = [];
  async function get_navbar() {
    return new Promise((resolve, reject) => {
          var settings = {          
            "url": "{{route('navbar.get_navbar')}}",
            "method": "POST",
            "timeout": 0,
            "headers": {
              "Content-Type": "application/json",
              "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
          };
        $.ajax(settings).done(function(response) {
          navbar = response.data;
          resolve(navbar);
        });
      });
  }

  $( document ).ready(function() {   
    append_navbar(0);
    setTimeout(function(){
      new bootnavbar();
      }, 1000);
  });

</script>
 -->
