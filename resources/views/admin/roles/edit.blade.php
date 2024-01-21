@php $table = "Roles"; @endphp
@extends('admin.layouts.app')
@section('pageCss')

@endsection

@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Role</h3>
            <div class="card-options">
              <div class="input-group">
              <a  href="javascript:void()" onclick="update_role()" class="btn btn-primary" >
              Update Role</button>
              </a>
            </div>  
            </div>
        </div>
        <div class="card-body">


          <div class="container">
            <div class="form_builder" style="margin-top: 25px">

            <div class="container"> 
              <label> Role Name</label> 
              <input type="text" value="{{$data['role']->name}}" class="form-control" name="name">  
              <span id="name_err" class="text-danger laravel_validation"> </span>
            </div>
            <input type="text" name="role_id" value="{{$data['role']->id}}" hidden >

            <hr>

            <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>Module Permission</th>
                        <th>Read</th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>Export</th>
                        <th>Publish</th>
                    </tr>
                </thead>
                <tbody>
   
                    <tr>
                        <td>CMS </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="1" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="2" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="3" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="4"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="5"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="78"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Banners</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="6" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="7" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="8" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="9"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="10"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="79"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Navbar</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="11" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="12" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="13" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="14"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                         -
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="80"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>



                    
                    <tr>
                        <td>Categories</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="15" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="16" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="17" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="18"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="19"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="81"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>


                    
                    <tr>
                        <td>Blogs</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="23" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="24" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="25" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="26"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="27"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="82"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>



                    
                    <tr>
                        <td>News</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="28" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="29" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="30" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="31"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="32"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="83"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>



                    <tr>
                        <td>Services</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="33" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="34" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="35" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="43"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="44"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>

                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="84"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>

                    </tr>




                   
                    <tr>
                        <td>Forms</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="45" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="46" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="47" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="48"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="49"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>

                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="85"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>

                    </tr>




                    
                    <tr>
                        <td>Events</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="50" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="51" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="52" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="53"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="54" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>

                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="86"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>



                    
                    <tr>
                        <td>Poll</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="55" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="56" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="57" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="58"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="59" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>

                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="87"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Gallery</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="60" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="61" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="62" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="63"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            -
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="89"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>


                   
                    <tr>
                        <td>File Manager</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="64" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="65" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="66" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="67"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            -
                        </td>
                    
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="90"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>





                    
                  
                   
                    <tr>
                        <td>Users</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="68" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="69" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="70" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="71"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="72"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="91"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Roles</td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="73" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="74" class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="75" class="custom-control-input" >
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="76"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox"  name="77"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" name="92"class="custom-control-input">
                                <span class="custom-control-label">&nbsp;</span>
                            </label>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>




            </div>
         </div>



        </div>
    </div>
  </div>
</div>



  @endsection



  @section('pageJs')



  
<script>




function update_role(){

    var permissions = [];

    var chPermissions = [];
    permissions = document.querySelectorAll('input[type="checkbox"]:checked');
    permissions.forEach(element => {
        if(element.value == 'on'){
            chPermissions.push(element.name);
        }    
    });



    $(`.laravel_validation`).html('');
        var settings = {
        "url": `{{route('roles.update')}}`,
        "method": "PUT",
        "timeout": 0,
        "headers": {
            "Content-Type": "application/json",
            "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        },
        "data": JSON.stringify({
            "name": $("input[name=name]").val(),
            "permission": chPermissions,
            "id": $("input[name=role_id]").val(),
        })
        };

        $.ajax(settings).done(function(response) {
        if (response.status == false) {
            for (let key of Object.entries(response.data)) {
            $(`#${key[0]}_err`).html(key[1]);
            }
        } else {

            swal("Congratulations!", "Your role has been updated successfully", "success");
        }

        });

}



     $( document ).ready(function() {
        @php
            echo 'var perm = '.json_encode($data['rolePermissions']).'';
        @endphp

        for (const [key, value] of Object.entries(perm)) {
        $(`input[name=${value}]`).prop('checked', true);
        }
     });


</script>
@endsection
