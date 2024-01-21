@extends('admin.layouts.app')
@section('pageCss')
@endsection
@section('mainContent')
<div class="section-body mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                                         
                                <p class="mb-0">Search Result For "{{isset($keyword)? $keyword : ''}}"</p>
                                <strong class="font-12"> About {{isset($total_count)?$total_count:''}} result ( {{isset($response_time)? $response_time . ' seconds':''}} )</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <div class="section-body">
            <div class="container-fluid">
            <div class="table-responsive">
                    <table class="table table-hover js-basic-example dataTable table_custom">
                        <thead class="d-none">
                            <tr><th></th><th></th></tr>
                        </thead>
                        <tbody>

                        @if(isset($result) && count($result) != null)
                                @foreach($result as $key => $record)
                                    @foreach($record as $final)
                                        <?php
                                         $route = route('index');
                                         if($key == 'Manage Questions'){
                                            $route = route('question.index',$final['poll_id']);
                                        }
                                        else{
                                            $route =isset($final['url'])?url('/').$final['url']:'';
                                        }
                                        ?>
                                    <tr onclick="location.href = '{{$route}}' " style="cursor:pointer">
                                    <td>
                                        <h5><a href="#">{{isset($final['title'])?$final['title']:''}}{{isset($final['name'])?$final['name']:''}}{{isset($final['question'])?short_string($final['question']):''}}</a></h5>
                                        <span class="text-green font-13"><a href="{{$route}}">{{$route}}</a></span>
                                        <p class="mt-10 mb-0 text-muted">{{isset($final['content'])?short_string($final['content']):''}}</p>
                                    </td>
                                    <td>
                                        <h6><span class="badge badge-success float-right"><i class="fa fa-eye"></i> {{$key}}</span></h6>
                                    </td>
                                </tr>
                                    @endforeach
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




@endsection
@section('pageJs')   
<script src="/assets/js/table/datatable.js"></script>
@endsection
