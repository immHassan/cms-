<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Like;
   
class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
   
        return back();
    }
    
    public function like_unlike(Request $request)
    {
        $userid = auth()->user()->id;
        $comment_id = $request->comment_id;
        $type = $request->type;
        
        $count = Like::where([
            ['user_id', '=', $userid],
            ['comment_id', '=', $comment_id]
            ])->count();
            
            $input = $request->all();
            $input['user_id'] = $userid;
        
            if($count == 0){
                Like::create($input);
            }else {
                Like::where([
                    ['user_id', '=', $userid],
                    ['comment_id', '=', $comment_id]
                ])->update(['type' => $type]);
               
            }
            
            
            $totalLikes= Like::where([
                ['comment_id', '=', $comment_id],
                ['type', '=', 1]
                    ])->count();
            $totalUnlikes= Like::where([
                ['comment_id', '=', $comment_id],
                ['type', '=', 0]
                    ])->count();

            $return_arr = array("likes"=>$totalLikes,"unlikes"=>$totalUnlikes);

                return json_encode($return_arr);
   
    }
	
}
