<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\PollCreator;
use App\Traits\PollAccessor;
use App\Traits\PollManipulator;
use App\Traits\PollQueries;
use App\Traits\GlobalSearchable;


class Question extends Model
{
    use PollCreator, PollAccessor, PollManipulator, PollQueries, GlobalSearchable;

    protected $fillable = [
        'question',
        'poll_id',
        'canVisitorsVote',
        'canVoterSeeResult'
    ];

    protected $table = 'poll_questions';

    protected $guarded = [''];

    /**
     * A poll has many options related to
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * Boot Method
     *
     */
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($question) {
            $question->options->each(function ($option) {
                Vote::where('option_id', $option->id)->delete();
            });
            $question->options()->delete();
        });
    }

    /**
     * Get all of the votes for the question.
     */
    public function votes()
    {
        return $this->hasManyThrough(Vote::class, Option::class);
    }

    /**
     * Check if the Guest has the right to vote
     *
     * @return bool
     */
    public function canGuestVote()
    {
        return $this->canVisitorsVote === 1;
    }

    /**
     * Check if the user can change options
     *
     * @return bool
     */
    public function canChangeOptions()
    {
        return $this->votes()->count() === 0;
    }


    protected  $search = [
        'question',
    ];

     /**
     * The columns that should be displayed.
     *
     * @var array
     */
    protected $only = [
        'question','poll_id'
    ];

 

    /**
     * The columns that should be ordered.
     *
     * @var array
     */
    protected  $order = [
        'question'=> 'desc'
    ];


    /**
     * @var string
     */
    protected $searchIndex = 'Manage Questions';
}
