<?php

namespace App\Helpers;

use App\Models\Guest;
use App\Models\Question;
use App\Traits\PollWriterResults;
use App\Traits\PollWriterVoting;
use Auth;

class PollWriter
{
    use PollWriterResults,
        PollWriterVoting;

    /**
     * Draw a Question
     *
     * @param Question $question
     * @return string
     */
    public function draw($question)
    {
        if(is_int($question)){
            $question = Question::findOrFail($question);
        }
        
        if(!$question instanceof Question){
            throw new \InvalidArgumentException("The argument must be an integer or an instance of question");
        }
        
        if ($question->isComingSoon()) {
            return 'To start soon';
        }
        if(!Auth::check()){
            if($question->canGuestVote()){
                $voter = new Guest(request());
            }else{
                return 'Vistor cannot vote';
            }
        }
        else{
            $voter = auth(config('poll_config.admin_guard'))->user();
        }
        
 
        if (is_null($voter) || $voter->hasVoted($question->id) || $question->isLocked() || $question->hasEnded()) {
            if (!$question->showResultsEnabled()) {
                return 'Thanks for voting';
            }
            return $this->drawResult($question);
        }
        if ($question->isRadio()) {
            return $this->drawRadio($question);
        }
        return $this->drawCheckbox($question);
    }
}
