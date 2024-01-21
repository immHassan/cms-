<?php

namespace App\Helpers;

use Exception;
use App\Exceptions\CheckedOptionsException;
use App\Exceptions\OptionsInvalidNumberProvidedException;
use App\Exceptions\OptionsNotProvidedException;
use App\Exceptions\RemoveVotedOptionException;
use App\Models\Option;
use App\Models\Question;
use InvalidArgumentException;

class PollHandler
{

    /**
     * Create a Question from Request
     *
     * @param $request
     * @return Question
     * @throws CheckedOptionsException
     * @throws OptionsInvalidNumberProvidedException
     * @throws OptionsNotProvidedException
     */
    public static function createFromRequest($request)
    {

        $question = new Question([
            'question' => $request['question'],
            'canVisitorsVote' => $request['canVisitorsVote'],
            'canVoterSeeResult' => $request['canVoterSeeResult'],
            'poll_id' => $request['poll_id']
        ]);

        $question->addOptions($request['options']);

        if (array_key_exists('maxCheck', $request)) {
            $question->maxSelection($request['maxCheck']);
        }

        $question->startsAt($request['starts_at']);

        if(isset($request['ends_at'])){
            $question->endsAt($request['ends_at']);
        }

        $question->generate();

        return $question;
    }

    /**
     * Modify The question
     *
     * @param Question $question
     * @param $data
     */
    public static function modify(Question $question, $data)
    {
        if($question->canChangeOptions()){
            $question->options()->delete();

            collect($data['options'])->each(function ($option) use($question){
                Option::create([
                    'name' => $option,
                    'question_id' => $question->id,
                    'votes' => 0
                ]);
            });
        }

        if (isset($data['count_check'])) {
            if ($data['count_check'] < $question->options()->count()) {
                $question->canSelect($data['count_check']);
            }
        }

        // change the ability to vote by the guests
        if (isset($data['canVisitorsVote'])) {
            $question->canVisitorsVote = $data['canVisitorsVote'];
        }

        // change see result value
        if (isset($data['canVoterSeeResult'])) {
            $question->canVoterSeeResult = $data['canVoterSeeResult'];
        }

        $question->question = $data['question'];

        if(isset($data['ends_at'])){
            $question->endsAt($data['ends_at']);
        }

        $question->startsAt($data['starts_at'])
            ->save();
    }

    /**
     * Get Messages
     *
     * @param Exception $e
     * @return string
     */
    public static function getMessage(Exception $e)
    {
        if ($e instanceof OptionsInvalidNumberProvidedException || $e instanceof OptionsNotProvidedException)
            return 'A question should have two options at least';
        if ($e instanceof RemoveVotedOptionException)
            return 'You can not remove an option that has a vote';
        if ($e instanceof CheckedOptionsException)
            return 'You should edit the number of checkable options first.';

        if ($e instanceof  InvalidArgumentException) {
            return $e->getMessage();
        }
    }
}
