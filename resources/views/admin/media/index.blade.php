@extends('admin.layouts.app')
@section('pageCss')
<link href="{{ asset('css/fonts/fontaws.css') }}" rel="stylesheet">
@endsection
@section('mainContent')
<style>
.btn-close {
    box-sizing: content-box;
    width: 1em;
    height: 1em;
    padding: 0.25em 0.25em;
    color: #000;
    background: transparent url(css/fonts/download.svg) center/1em auto no-repeat;
    border: 0;
    border-radius: 0.25rem;
    opacity: .5;
}
 
</style>
<div class="section-body">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{__('languages.media')}}</h3>
        </div>
        <div class="card-body">
          <div class="" id="fm-main-block">
            <div id="fm"></div>
          </div>
        </div>
    </div>
  </div>
</div>
 
@endsection
@section('pageJs')
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script>
$(document).ready(function () {
  var node = document.querySelector('[title="Grid"]');
    node.click();    
});
</script>
@endsection