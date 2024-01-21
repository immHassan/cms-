@php $table = "Category"; @endphp
@extends('admin.layouts.app')
 @section('pageCss')
<style>
 .badge {
    padding: 3px 7px; 
    background-color: #777;
    border-radius: 10px;
}
.glyphicon-plus:before {
  content: "\2b";
  color:#138496
}
.list-group-item > .badge {
  float: right;
}
.glyphicon-minus:before {
  content: "\2212";
}
.glyphicon {
  position: relative;
    top: 5px;
    display: inline-block;
    line-height: 0;
    -moz-osx-font-smoothing: grayscale;
    font-size: 30px;
    font-weight: bold;
}
</style>

@endsection
@section('mainContent')

          
<div class="section-body">
  <div class="container-fluid">
    <div class="row clearfix row-deck">
      <div class="col-xl-8">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Categories</h3>
            <div class="card-options">
              <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
              <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
            </div>
          </div>
          <div class=" ml-3 row">

          <div class="col-md-7"> 
            <div class="form-group">
              <label for="input-search">Search Category:</label>
              <input type="input" class="form-control" id="input-search" placeholder="Type to search..." value="">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" class="checkbox" id="chk-ignore-case" value="false">
                Ignore Case
              </label>
            
              <label class="ml-3">
                <input type="checkbox" class="checkbox" id="chk-exact-match" value="false">
                Exact Match
              </label>
              <button type="button" class="btn btn-default float-right" id="btn-clear-search">Clear</button>
            </div>
          </div>
          <div class="col-md-5 text-center">
            <h6>Results</h6>
            <div id="search-output" style="height: 150px;overflow-y: scroll;"></div>

          </div>
          </div>
          
          <div class="card-body">
            <div class="row">
            <div class="col-md-12">
              <div id="treeview-searchable" class=""></div>
            </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card">
          <div class="card-header">
            <div class="card-options">
              <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
            </div>
          </div>
          <div class="card-body">
            <div id="showaddform" class="col-md-12" style="">          
              {!! Form::open(['id'=> 'reloadform']) !!}
              <h3 class="card-title">Add New Category</h3>
              <div class="form-group">
                  {!! Form::label('Name') !!}
                  {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                  <span id="title_err" class="text-red laravel_validation"> </span>                
                </div>
                <div class="form-group">
                {!! Form::label('Select Parent Category') !!}
                
                  {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'selectcategories form-control','placeholder'=>'Select Category']) !!}
                
                <span id="parent_category_err" class="text-red laravel_validation"> </span>
                 
              </div>
              <div class="col-md-6 mt-3">
                <label class="custom-switch">
                  <label for=""> Is Visible</label>
                  <input id="is_visible" class="toggle-check custom-switch-input" checked name="is_visible" onclick="onOff(this)" type="checkbox">
                  <span class="custom-switch-indicator toggle ml-5 mb-1"></span>
                  <div class="on ml-3">Yes</div>
                </label>
              </div>
              <div class="form-group float-right">
                <button class="btn btn-info">Add</button>
              </div>
              {!! Form::close() !!}  
            </div>
            <div id="showeditform" class="col-md-12" style="display:none">
              {!! Form::open(['id'=> 'editform']) !!}
              <h3 class="card-title">Edit Category</h3>
              <div class="form-group">
                  {!! Form::label('Name') !!} 
                  {!! Form::text('title', old('title'), ['class'=>'edittitle form-control', 'placeholder'=>'Enter Name']) !!}
                  <span id="title_err" class="text-red laravel_validation"> </span>                
                </div>
                <input type="text" name="cat_id" class="cat_id" value="" style="visibility:hidden">
                <div class="form-group">
                {!! Form::label('Select Parent Category') !!}
                <div class="form-group multiselect_div">
                  {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'selectcategories form-control','placeholder'=>'Select Category']) !!}
                </div>
                  <span id="parent_category_err" class="text-red laravel_validation"> </span>
              </div>
              <div class="col-md-6 mt-3">
                <label class="custom-switch">
                  <label for="check_is_visible"> Is Visible</label>
                  <input id="check_is_visible" class="toggle-check custom-switch-input" onclick="onOff(this)" type="checkbox">
                  <span class="custom-switch-indicator toggle ml-5 mb-1"></span>
                  <div class="on ml-3">Yes</div>
                </label>
              </div>
              <div class="form-group float-right">
                <a href="#" class="btn btn-primary deletecat">Delete</a>
              </div>
              <div class="form-group float-left">
                <button class="btn btn-info">Update</button>
              </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>                
      </div>

    </div>       
  </div>
</div>

@endsection
@section('pageJs')
 
<script src="{{asset('js/bootstrap-treeview.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script type="text/javascript">

  $(function() {
   var $searchableTree = $('#treeview-searchable').treeview({
      enableLinks: true,
      levels: 1,
      showTags: true,    
      data: <?php echo $json ?>,
    });

    var search = function(e) {
      var pattern = $('#input-search').val();
      var options = {
        ignoreCase: $('#chk-ignore-case').is(':checked'),
        exactMatch: $('#chk-exact-match').is(':checked'),
      };
      var results = $searchableTree.treeview('search', [ pattern, options ]);

      var output = '<p>' + results.length + ' matches found</p>';
        $.each(results, function (index, result) {
          output += '<p>- ' + result.text + '</p>';
        });
        $('#search-output').html(output);
    }
    $('#input-search').on('keyup', search);
    $('#btn-clear-search').on('click', function (e) {
      $searchableTree.treeview('clearSearch');
      $('#input-search').val('');
      $('#search-output').html('');
    });
  });


  $("#reloadform").submit(function(e) {
    e.preventDefault(); 
    var form = $(this);
      var is_visible = document.getElementById('is_visible');
    
    if(is_visible.checked == true){
      is_visible = 1;
    }else{
      is_visible = 0;
    }
    form = form.serializeArray();
    form = form.concat([
        {name: "is_visible", value:is_visible}
    ]);
    var actionUrl = "{{route('category.create')}}";
        
    $.ajax({
        type: "POST",
        url: actionUrl,
        data: form,
        success: function(response)
        {
          if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {
          
        // swal("Category Created Successfully!", response.message, "success");
        $('#reloadform')[0].reset();
        location.reload(true);      
      }
        }
    });
  });
  $("#editform").submit(function(e) {
    e.preventDefault(); 
    var form = $(this);
    var is_visible = document.getElementById('check_is_visible');
    
    if(is_visible.checked == true){
      is_visible = 1;
    }else{
      is_visible = 0;
    }
    form = form.serializeArray();
    form = form.concat([
      {name: "is_visible", value:is_visible}
    ]);
    console.log(form)
    var actionUrl = "{{route('category.update')}}";
        
    $.ajax({
        type: "PUT",
        url: actionUrl,
        data: form,
        success: function(response)
        {
          if (response.status == false) {
        for (let key of Object.entries(response.data)) {
          $(`#${key[0]}_err`).html(key[1]);
        }
      } else {
          
        // swal("Category Created Successfully!", response.message, "success");
        $('#editform')[0].reset();
        location.reload(true);      
      }
        }
    });
  });

  function Delete(id) {
    var cat = id;
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this record!",
      icon: "warning",
      buttons: [
        'No, cancel it!',
        'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        var baseUrl = "{{url('/')}}";

        var viewSettings = {
          "url": `${baseUrl}/category/delete/${cat}`,
          "method": "DELETE",
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
              title: 'Deleted Successfully!',
              text: response.message,
              icon: 'success'
            });
            location.reload(true);      

          } else {
            swal("Cancelled", "Something went wrong :)", "error");
          }
        });

      } else {
        swal("Cancelled", "Your record is safe :)", "error");
      }
    });
  }

  function onOff(th){
    var z = document.getElementById('check');
    var on = th.parentElement.parentElement.querySelectorAll('.on')[0]; //document.getElementsByClassName('on');
    var off = th.parentElement.parentElement.querySelectorAll('.off')[0]; //document.getElementsByClassName('off');
    
    if (th.checked == false) {
      on.innerHTML="No";
      on.style.color="#253b52";
    } else {
      on.style.color="green";
      on.innerHTML="Yes";   
    
    }
  }

</script>

@endsection