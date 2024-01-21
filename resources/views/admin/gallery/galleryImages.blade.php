@extends('admin.layouts.app')
@section('pageCss')
<link href="{{asset('dist/imageuploadify.min.css')}}" rel="stylesheet"> 
<style>
 
.imageuploadify-details:hover{
  opacity:1;
}
.imagecheck-figure:before {
    color: #18BADD !important;
    font-size: 25px !important;
    margin-left: 85% !important;
}
.dragimg:hover{
    background: rgb(58, 160, 255) !important; color: white !important;
}
</style>
@endsection
@section('mainContent')
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row row-cards">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="page-subtitle ml-0"><b class="countimages">({{count($data->medias)}}) Photos</b></div>
                        <a class="btn btn-primary ml-3" href="javascript:void(0)"><i class="fa fa-trash text-white" style="font-size:18px" onclick="DeleteAll(1)" aria-hidden="true"></i></a>

                        <div class="page-options d-flex">
                            <div class="input-icon ml-2">
                                <span class="input-icon-addon">
                                    <i class="fe fe-search"></i>
                                </span>
                                <input type="text" class="form-control" id="search" placeholder="Search photo">
                            </div>
                            <button onclick="viewEventMedia()" class="btn btn-primary ml-2"><i class="fa fa-upload"></i> Upload from PC</button>
                            <button class="btn btn-primary ml-2" id="button-image-gallery1"><i class="fa fa-image"></i> Upload from Gallery</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cards image_section" style="overflow-y:scroll;height:382px">
            @if(isset($data->medias) && count($data->medias) > 0)
          
            @foreach($data->medias as $media)
                <?php $name = explode('/',$media->image);
                    $last = end($name);
                    // dd($last);
                $src = $media->image_selection == 0 ? '/uploads/media/'.$media->image : $media->image; ?>
            <div class="col-sm-3">
                
                
                <div class="hero" id="{{$media->image}}">
                    <div class="card p-3">
                        <label class="imagecheck mb-3">
                            <input name="imagecheck" type="checkbox"class="multidelete imagecheck-input" id="{{$media->id}}" value="{{$media->id}}" />
                            <figure class="imagecheck-figure">
                                <img src="{{$src}}" alt="{{$media->image}}" class="rounded imagecheck-image" style="height:150px">
                              
                            </figure>
                        </label>
                        
                        <div class="d-flex align-items-center px-2">
                            <div>
                                <div class="w-50">{{$last}}</div>
                                <small class="d-block text-muted">{{ $media->created_at->diffForHumans() }}</small>
                            </div>     
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-md-12 hidethis">
            <div class="card-body text-center py-5">
                <img src="/assets/images/search.svg" class="width360 mb-3">
                <h4>No image has been found. Try to add one <a onclick="viewEventMedia()" href="#">Now</a>
                </h4>
            </div>
            </div>
            @endif
            
        </div>
    </div>
</div>
<!-- View images Modal -->
<div class="modal custom-modal  modal-custom-1 fade" id="eventmedia" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width:1200px">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="eventmediaTitle">{{$data->title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
        
      </div>
      <div class="modal-body">  
            
              <button type="button" style="background: white; color: rgb(58, 160, 255);" class="ml-4 btn btn-default dragimg">Drag and drop a images here or click to select</button>

          <div class="col-12">
            <form id="reloadform1" action="{{route('gallery.upload')}}" method="post" enctype="multipart/form-data">
               @csrf
               <button type="submit" class="btn btn-primary" style="display:none;float:left" id="formsubmit">Add</button>
              <input type="file" class="multipleimg" name="images[]" accept="image/*,video/*" multiple>
              <input type="hidden" value="{{$data->id}}" name="eventid">
            </form>
          </div> 
      </div>
  </div>
</div>
</div>
@endsection
@section('pageJs')
<script type="text/javascript" src="{{asset('dist/imageuploadify.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('.multipleimg').imageuploadify();
    })
    $('.dragimg').click(function() {   
       $('.selectimg').click();
    });
    </script>
 
 <script type="text/javascript"> 
  var baseUrl = "{{url('/')}}"; 
  function viewEventMedia(){    
      $('#eventmedia').modal('show');
      $('#mceu_34').hide()
    }
    
    $(document).ready(function () {
        $("#search").keyup(function(){
      var filter = $(this).val();
      $(".hero").each(function(){
        if ($(this).attr('id').search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
        } else {
        $(this).show();
        }
      });
    });
  });
  

  document.addEventListener("DOMContentLoaded", function() {
      document.getElementById('button-image-gallery1').addEventListener('click', (event) => {
        event.preventDefault();
        window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
        });
    });
 
    function fmSetLink(url) {

       var eventid = $("input[name=eventid]").val() 
          var settings = {
          "url": "{{route('gallery.addmedia')}}",
          "method": "POST",
          "timeout": 0,
          "headers": {
            "Content-Type": "application/json",
            "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
          },
          "data": JSON.stringify({
            "image": url,
            'eventid': eventid
          }),
        };
        $.ajax(settings).done(function(response) {
          if (response.status == false) {
            for (let key of Object.entries(response.data)) {
              $(`#${key[0]}_err`).html(key[1]);
            }
          } else {

            var media = response.data             
              var filename =''; 
              if(media.image_selection == 1){
                  var src = media.image;
                  var arr =  src.split('/');
                  if(arr.length > 3){
                    filename = arr[arr.length - 1]
                  }
                  else{
                    filename =arr[2]
                  }
                }else{
                  var src = '/uploads/media/'+media.image;
                      filename = media.image;
                }
                $('.image_section').prepend(` <div class="col-sm-3"><div class="hero" id="${filename}">
                    <div class="card p-3">
                    <label class="imagecheck mb-3">
                        <input name="imagecheck" type="checkbox"class="multidelete imagecheck-input" id="${media.id}" value="${media.id}" />
                        <figure class="imagecheck-figure">
                            <img src="${src}" alt="${filename}" class="rounded imagecheck-image" style="height:150px">
                            
                        </figure>
                        </label>

  
                        <div class="d-flex align-items-center px-2">
                            <div class="w-50">
                                <div>${filename}</div>
                                <small class="d-block text-muted">${moment(media.created_at).fromNow()}</small>
                            </div>     
                        </div>
                    </div>
                </div></div>`);

                $('.countimages').html('('+response.count+') Photos');
                $('.hidethis').hide();

            }     
          
        });                  
        
    }

  function DeleteAll() {

    var ids = [];

    var checkboxes = document.querySelectorAll('.multidelete:checked')

    for (var i = 0; i < checkboxes.length; i++) {
    ids.push(checkboxes[i].value)
    }
    if (!ids.length > 0) {
    swal("No Image selected", "Click image to select", "error");
    return false;
    }
    swal({
    title: "Are you sure?",
    text: "You will not be able to recover these records!",
    icon: "warning",
    buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
    ],
    dangerMode: true,
    }).then(function(isConfirm) {
    if (isConfirm) {
        var viewSettings = {
        "url": `${baseUrl}/gallery/media/1`,
        "method": "DELETE",
        "data": JSON.stringify({
            "ids": ids
        }),
        "timeout": 0,
        "headers": {
            "Content-Type": "application/json",
            "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
        };
        $.ajax(viewSettings).done(function(response) {
        
        if (response.status == true) {
            swal({
            title: 'Records Deleted!',
            text: 'Deleted Successfully!',
            icon: 'success'
            });
            // $('.image_section').load(document.URL + ' .image_section');
            setInterval(function () {
                location.reload(true);      
            },2000);


        } else {
            swal("Cancelled", "Something went wrong :)", "error");
        }
        });

    } else {
        swal("Cancelled", "Your records are safe :)", "error");
    }
    });
}
 </script>

@endsection 