<?php
namespace App\Traits;


use App\Models\Question;

trait PollWriterResults
{
    /**
     * Draw the results of voting
     *
     * @param Question $question
     */
    public function drawResult(Question $question)
    {
        $total = $question->votes->count();
        $results = $question->results()->grab();
        $options = collect($results)->map(function ($result) use ($total){
            return (object) [
                'votes' => $result['votes'],
                'percent' => $total === 0 ? 0 : ($result['votes'] / $total) * 100,
                'name' => $result['option']->name
            ];
        });
        $question = $question->question;
        echo view(config('poll_config.results') ? config('poll_config.results') : 'admin.poll.vote.results', compact('options', 'question'));
    }
}
