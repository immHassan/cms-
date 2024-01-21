@foreach($comments as $comment)
    <div class="d-flex flex-row p-3">
    <img src="https://img.freepik.com/free-icon/user_318-563642.jpg" width="40" height="40" class="rounded-circle mr-3">
        <div class="w-100">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex flex-row align-items-center">
                    <span class="mr-2"><strong>{{ $comment->user->name }}</strong></span>
                </div>
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </div>

            <p class="text-justify p-3 mb-0">{{ $comment->body }} </p>
           
            <div class="user-feed">
                   
               

                <span id="like_{{$comment->id}}" onclick="like_unlike(this)" class="like"
                   @if($comment->like !=null)
                @if($comment->like->type == 1 && $comment->like->user_id == auth()->user()->id) style="color:#35b69f;" @endif
                @endif
                >

                    <i class="fa fa-thumbs-up mr-2"></i>

                    <span id="likes_{{$comment->id}}">({{DB::table('likes')->where('type',1)->where('comment_id',$comment->id)->count(); }})</span>
                    </span>
                <span id="unlike_{{$comment->id}}" onclick="like_unlike(this)" class="unlike"
                @if($comment->like !=null)
                
                @if($comment->like->type == 0 && $comment->like->user_id == auth()->user()->id) style="color:#35b69f;" @endif
                @endif
                >

                <i class="fa fa-thumbs-down mr-2"></i>

                    <span id="unlikes_{{$comment->id}}">({{DB::table('likes')->where('type',0)->where('comment_id',$comment->id)->count(); }})</span>
                    </span>

                <span class="ml-3" id="reply{{$comment->id}}" onclick="myfunc(this)"><i class="fa fa-comments-o mr-2"></i>Reply</span>&nbsp;({{count($comment->replies)}})
                <form method="post" action="{{ url('/comment/store') }}" class="reply{{$comment->id}}" style="margin-top:15px;display:none">
                    @csrf
                    <div class="form-group replyflex">
                        <input type="text" placeholder="Enter your reply" required name="body" class="form-control" />
                        <input type="hidden" name="blog_id" value="{{ $blog_id }}" />
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                        <button type="submit" class="btn btn-primary mt-3">Reply </button>
                    </div>
                </form>   
                
            </div>    
            
        <div class="reply{{$comment->id}}" style="display:none">
            @include('admin.blog.commentsDisplay', ['comments' => $comment->replies])
        </div>
        </div>
    </div>

   <script type="text/javascript">
    function myfunc (comment) { 
        $('.'+comment.id).toggle()
    }
    </script>

@endforeach
<script  type="text/javascript">
    function like_unlike(like) {
        var id = like.id;   
        var split_id = id.split("_");

        var text = split_id[0];
        var comment_id = split_id[1];  

        // Finding click type
        var type = 0;
        if(text == "like"){
            type = 1;
        }else{
            type = 0;
        }  

            var settings = {
                "url": "{{route('comment.like_unlike')}}",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json",
                    "Cookie": "laravel_session=eyJpdiI6IlZObS8zTi91SUlrSVlVUjR2Q0doWGc9PSIsInZhbHVlIjoiNTg5VW14NmhZMkJ1TGp5bHA4YWgvcVpYMXpTeTBNeXJLbXc1TWxUcEcvcnlqUDliUkpZV0xKMC90ZVBtYTJaWWRvQ21uRjBXM0ozaWRaZVpDT0s3ZkRGemZ2RVVzVnd0Y2h2a2EzMFd0blQ5MU5RSHM5N0Y5ejBlOXNzTlFFTzMiLCJtYWMiOiJlM2Y1YzYxNjE5ZjAyYWI5M2M3ZjYxMDJjODYyMWZjZmYzYTIyYTRlNDc3M2FjZDAwOTIzZDJlMDgxYjc3ODE1IiwidGFnIjoiIn0%3D",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                "data": JSON.stringify({
                    "comment_id": comment_id,
                    "type" :type
                }),
            };

            $.ajax(settings).done(function(response) {
            var result = JSON.parse(response)
            var likes = result.likes;
            var unlikes = result.unlikes;
            
            document.getElementById("likes_"+comment_id).innerHTML = likes;
            document.getElementById("unlikes_"+comment_id).innerHTML = unlikes;
            
            if(type == 1){
                $("#like_"+comment_id).css("color","#35b69f");
                $("#unlike_"+comment_id).css("color","black");
            }

            if(type == 0){
                $("#unlike_"+comment_id).css("color","#35b69f");
                $("#like_"+comment_id).css("color","black");
            }
        });

    }
</script>
