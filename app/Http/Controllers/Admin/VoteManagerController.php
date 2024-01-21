<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Question;
use App\Models\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class VoteManagerController extends Controller
{
    /**
     * Make a Vote
     *
     * @param Question $poll
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function vote(Question $poll, Request $request)
    {
        
        try{
            $vote = $this->resolveVoter($request, $poll)
                ->poll($poll)
                ->vote($request->get('options'));

            if($vote){
                return back()->with('success', 'Vote Done');
            }
        }catch (Exception $e){
            return back()->with('errors', $e->getMessage());
        }
    }

    /**
     * Get the instance of the voter
     *
     * @param Request $request
     * @param Question $poll
     * @return Guest|mixed
     */
    protected function resolveVoter(Request $request, Question $question)
    {
        if(!Auth::check()){
            if($question->canGuestVote()){
                return new Guest($request);
            }
        }
        else{
            return $request->user(config('poll_config.admin_guard'));
        }
       
    }
}
