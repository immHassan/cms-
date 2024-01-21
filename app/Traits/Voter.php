<?php


namespace App\Traits;


use Illuminate\Support\Facades\DB;
use App\Exceptions\PollNotSelectedToVoteException;
use App\Exceptions\VoteInClosedPollException;
use App\Models\Guest;
use App\Models\Option;
use App\Models\Question;
use App\Models\Vote;
use InvalidArgumentException;
Use Auth;

trait Voter
{
    protected $poll;

    /**
     * Select poll
     *
     * @param Question $poll
     * @return $this
     */
    public function poll(Question $poll)
    {
        $this->poll = $poll;

        return $this;
    }

    /**
     * Vote for an option
     *
     * @param $options
     * @return bool
     * @throws PollNotSelectedToVoteException
     * @throws VoteInClosedPollException
     * @throws \Exception
     */
    public function vote($options)
    {
        $options = is_array($options) ? $options : func_get_args();
        // if poll not selected
        if (is_null($this->poll))
            throw new PollNotSelectedToVoteException();

        if ($this->poll->isLocked() || $this->poll->hasEnded())
            throw new VoteInClosedPollException();

        if ($this->hasVoted($this->poll->id))
            throw new \Exception("User can not vote again!");

        // if is Radio and voted for many options
        $countVotes = count($options);

        if ($this->poll->isRadio() && $countVotes > 1)
            throw new InvalidArgumentException("The poll can not accept many votes option");

        if ($this->poll->isCheckable() &&  $countVotes > $this->poll->maxCheck)
            throw new InvalidArgumentException("selected more options {$countVotes} than the limited {$this->poll->maxCheck}");

        array_walk($options, function (&$val) {
            if (!is_numeric($val))
                throw new InvalidArgumentException("Only id are accepted");
        });
        if ($this instanceof Guest) {
            collect($options)->each(function ($option) {
                Vote::create([
                    'user_id' => $this->user_id,
                    'option_id' => $option
                ]);
            });

            return true;
        }
        return !is_null($this->options()->sync($options, false)['attached']);
    }

    /**
     * Check if he can vote
     *
     * @param $poll_id
     * @return bool
     */
    public function hasVoted($poll_id)
    {
        $poll = Question::findOrFail($poll_id);
        if(!Auth::check()) {
            if ($poll->canGuestVote()) {
                $result = DB::table('poll_questions')
                    ->selectRaw('count(*) As total')
                    ->join('question_options', 'poll_questions.id', '=', 'question_options.question_id')
                    ->join('poll_votes', 'poll_votes.option_id', '=', 'question_options.id')
                    ->where('poll_votes.user_id', request()->ip())
                    ->where('question_options.question_id', $poll_id)->count();
                return $result !== 0;
            }

        } else{

            return $this->options()->where('question_id', $poll->id)->count() !== 0;
        }

    }

    /**
     * The options he voted to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function options()
    {
        return $this->belongsToMany(Option::class, 'poll_votes')->withTimestamps();
    }
}
