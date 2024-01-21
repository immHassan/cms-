@extends('admin.layouts.poll.app')
@section('title')
Vote
@endsection
@section('style')
     <style>
     [type="radio"]:checked, [type="radio"]:not(:checked){
        position:inherit
     }
     .panel-primary {
    border-color: #337ab7;
}
.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-radius: 3px;
}
.panel-primary>.panel-heading {
    color: #fff;
    background-color: #337ab7;
    border-color: #337ab7;
}
.panel-title {
    margin-top: 0;
    margin-bottom: 0;
    font-size: 16px;
    color: inherit;
}
     </style>
     
@endsection
@section('content') 
<div class="content-wrapper"> 
  <div class="content-header">
    <div class="container">
       
    </div> 
  </div>
  <section class="content">
    <div class="col-12 col-sm-12">
        <div class="invoices-h">
        
        </div>  
        
    {{PollWriter::draw((int)$id)}}
       
    </div> 
  </section> 
</div>

@endsection
