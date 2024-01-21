<?php
namespace App\Traits;

use Illuminate\Support\Facades\Session;
use App\Models\Question;

trait PollWriterVoting
{
    /**
     * Drawing the question for checkbox case
     *
     * @param Question $question
     */
    public function drawCheckbox(Question $question)
    {
        $options = $question->options->pluck('name', 'id');

        echo view(config('poll_config.checkbox') ? config('poll_config.checkbox') :  'admin.poll.vote.checkbox', [
            'question' => $question,
            'options' => $options
        ]);
    }

    /**
     * Drawing the question for the radio case
     *
     * @param Question $question
     */
    public function drawRadio(Question $question)
    {
        $options = $question->options->pluck('name', 'id');

        echo view(config('poll_config.radio') ? config('poll_config.radio') :'admin.poll.vote.radio', [
            'question' => $question,
            'options' => $options
        ]);
    }
}
