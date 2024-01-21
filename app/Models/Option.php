<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Votable;

class Option extends Model
{
    use Votable;

    protected $guarded = [];

    protected $table = 'question_options';
    /**
     * An option belongs to one question
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Check if the option is Closed
     *
     * @return bool
     */
    public function isPollClosed()
    {
        return $this->question->isLocked();
    }
}
