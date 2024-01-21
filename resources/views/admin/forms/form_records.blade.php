@php $table = "Form"; @endphp
@extends('admin.layouts.app')
@section('pageCss')


@endsection
@section('mainContent')
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Records</h3>
            <div class="card-options">
              <div class="input-group">
            </div>  
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="listTable" class="table table-hover table-striped table-vcenter text-nowrap mb-0 data-table">
                <thead>
                <thead>
                <tr>
                  <th> <span>Id</span> </th>
                  <th> <span>Form Records</span> </th>
                  <th> <span>Submission Date </span></th>
                </tr>
              </thead>
              </thead>
                    
              
                            @foreach($form_records as $record )
                          <tr>
                          <td> {{$record->id}}</td>

                          <td> 


                          @foreach(json_decode($record->form_data) as $key => $val )

                          @if(gettype($val) == 'array' )

                          <h5>{{ $key }} :
                          @foreach($val as $key_child => $val_child )
                          {{$val_child}},
                          @endforeach<h5> 

                          @else

                          <h5>{{ $key }} : {{ $val }}<h5> 
                          @endif

                          @endforeach
                          </td>
                          <td> {{$record->created_at}}</td>
                          </tr>

                          @endforeach
                          </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>




  @endsection

