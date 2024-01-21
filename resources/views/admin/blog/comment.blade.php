@extends('layouts.comment.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>
                    {!! $blog->content !!}
                    </div> 
                    @if($blog->is_commentable == 1)
                        <br/>                      
                        <div class="col-md-9">
                            <div class="card">
                                <div class="p-3">
                                
                                    <h3>Comments ({{count($blog->comments) }})</h3>
                                </div>
                                <div class="mt-3 align-items-center p-3 form-color">
                                    <form method="post" action="{{ url('/comment/store'   ) }}">
                                        @csrf
                                            <textarea class="form-control" name="body" required placeholder="Enter your comment..."></textarea>
                                            <input type="hidden" name="blog_id" value="{{ $blog->id }}" />
                                            <button type="submit" class="btn btn-success float-right mt-3 mr-2"> Add Comment</button>
                                    </form>
                                    </div>  
                                    <div class="mt-2">
                                        @include('admin.blog.commentsDisplay', ['comments' => $blog->comments, 'blog_id' => $blog->id])

                                    </div>
                                
                                </div>  
                            </div>
                        </div>
                    @endif
                    
                    <div class="col-md-9">
                        <div class="card">
                        <form action="{{ route('blog.rating') }}" method="POST">
                            {{ csrf_field() }}
                                <div class="container-fliud">
                                    <div class="wrapper row">
                                        
                                        <div class="details col-md-6 ml-5 mb-5">
                                            <h3 class="product-title">Rating </h3>
                                            <div class="rating">
                                                <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $blog->userAverageRating }}" data-size="xs">
                                                <input type="hidden" name="id" required="" value="{{ $blog->id }}">
                                                <br/>
                                                <button class="btn btn-success">Submit Review</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
@endsection
 
