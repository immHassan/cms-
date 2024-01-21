
<nav class="navbar navbar-expand-lg navbar-light" id="main_navbar">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          
          </ul>
       
        </div>
      </div>
    </nav>

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
      childNavRaw += `<li id="nav-`+element.navbar_detail_id+`" class="nav-item dropdown mt-1">  <a class="dropdown-item dropdown-toggle"
        href="{{url('/')}}/`+element.slug+`"
        role="button"
        data-bs-toggle="dropdown"
      >
        `+element.name+`
      </a> <ul class="dropdown-menu animate__animated animate__fadeIn" id="navbar-ul-`+element.navbar_detail_id+`" >`;

      childs.forEach(childElement => {
        if(get_nav_child(childElement.navbar_detail_id).length > 0){
      
          get_nav_child_li(childElement);        
        }else{
          childNavRaw +=  ` <li>
          <a class="dropdown-item" href="{{url('/')}}/`+childElement.slug+`" >${childElement.name}</a>
          </li> `;
        };
      });
      childNavRaw +=  `</ul> </li>`;
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
          $(".navbar-nav").append(navbarRaw);
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

