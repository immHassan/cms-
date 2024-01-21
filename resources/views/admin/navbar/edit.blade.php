@php $table = "navbar"; @endphp
@extends('admin.layouts.app')
@section('pageCss')
<link href="{{ url('/') }}/admin/menu/menu.css" rel="stylesheet">

@endsection


<style>
  input.form-check-input {
      position: inherit !important;
  }
</style>

@section('mainContent')















<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h1 class="m-0">Edit Navbar</h1>
            <div class="card-options">
              <div class="input-group">              
              <button type="button" class="btn btn-success" onclick="update_form()" >Update Navbar</button>
            </div>  
            </div>
        </div>
        <div class="card-body">
       
        
        <div class="container">
          <div class="form_builder" style="margin-top: 25px">

          

            <input type="text" hidden value="{{$navbar->id}}" name="navbar_id"> 
            

            <div class="container"> 
              <label> Navbar Title</label> 
              <input type="text" value="{{$navbar->title}}" class="form-control" name="title">  
              <span id="title_err" class="text-danger laravel_validation"> </span>
            </div>
            
            <div class="container"> 
              <label> Navbar Slug</label> 
              <input type="text" class="form-control" name="slug">
              <span id="slug_err" class="text-danger laravel_validation"> </span>  
            </div>
  
            <hr>
            <div class="row">
              <div class="col-md-4">
                <form class="" id="menu-add">
                  
                  <div class="container">
                      <h4 class="text-center">Add New Link </h4>
                  </div>
                  <div class="container"> 
                    <label for="addInputName" class="float-left" > Name</label> 
                    <input type="text" class="form-control" id="addInputName" placeholder="Item name" required >
                  </div>
                  <div class="container"> 
                    <label for="addInputSlug" class="float-left"> Slug</label> 
                    <input type="text" class="form-control"  id="addInputSlug" placeholder="Item slug" required >
                  </div>
                  <div class="container mr-3 mt-1"> 
                      <button class="btn btn-primary float-right"  id="addButton"> Add</button>
                  </div>
                </form>

                <form class="" id="menu-editor" style="display: none;">
                  
                  <div class="container">
                      <h4 class="text-center" >Editing <span id="currentEditName"></span></h4>
                  </div>
                  <div class="container">
                    <label for="addInputName">Name</label>
                    <input type="text" class="form-control" id="editInputName" placeholder="Item name" required>
                  </div>
                  <div class="container">
                    <label for="addInputSlug">Slug</label>
                    <input type="text" value="{{$navbar->slug}}" class="form-control" id="editInputSlug" placeholder="item-slug">
                  </div>
                  
                  <div class="container mr-3 mt-1"> 
                    <button class="btn btn-info float-right" id="editButton">Update</button>
                  </div>
                </form>
              </div>
              <div class="col-md-8">

                <h4 class="text-center">Menu</h4>
                <div class="dd nestable" id="nestable">
                  {!! $navbar->navbar_html !!} 
                </div>
             </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
</div>















@endsection

@section('pageJs')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="{{ url('/') }}/admin/menu/menu.js"></script>






<script>

var menu_links = [];
function get_links(){
    menu_links = [];
    let links =  document.getElementsByClassName('dd-item');

    for (let index = 0; index < links.length; index++) {
        if(links[index].parentElement.parentElement.dataset.id){
            
            menu_links.push({'id':links[index].dataset.id,'name':links[index].dataset.name,'slug':links[index].dataset.slug,'parent_id':links[index].parentElement.parentElement.dataset.id });
       
        }else{
            menu_links.push({'id':links[index].dataset.id,'name':links[index].dataset.name,'slug':links[index].dataset.slug,'parent_id':'0'});
        }
    }

    return menu_links;
} 


</script>

<script>
function update_form() {
    get_links();
    console.log("menu_links",menu_links);
    $(`.laravel_validation`).html('');
    
     $('*[data-action="expand"]').remove()
     $('*[data-action="collapse"]').remove()
    
    var settings = {
      "url": "{{route('navbar.update')}}",
      "method": "PUT",
      "timeout": 0,
      "headers": {
        "Content-Type": "application/json",
        "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
      },
      "data": JSON.stringify({
        "title": $("input[name=title]").val(),
        "slug": $("input[name=slug]").val(),
        "menu_links":menu_links,
        "navbar_id":$("input[name=navbar_id]").val(),
        "navbar_html":document.getElementById('nestable').innerHTML
      }),
    };
    $.ajax(settings).done(function(response) {

      console.log("response",response);

      if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {

        

        
      setTimeout(function(){ 
        window.location.href = "{{route('navbar.list')}}" 
      },1500);

    
        swal("Created Successfully!", response.message, "success");
      }
    });
  }

  function convertToSlug(Text) {
return Text.toLowerCase()
           .replace(/[^\w ]+/g, '')
           .replace(/ +/g, '-');
}


  $($("input[name=title]")).on('keyup',function(){
    var slug = convertToSlug($(this).val());
    $("input[name=slug]").val(slug);
  });

  </script>

@endsection
