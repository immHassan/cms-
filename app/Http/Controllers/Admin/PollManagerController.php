<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\PollHandler;
use App\Helpers\PollWriter;
use App\Http\Request\PollCreationRequest;
use App\Models\Question;
use App\Traits\PollWriterResults;
use DataTables;

use App\Exceptions\DuplicatedOptionsException;

class PollManagerController extends Controller
{
    use PollWriterResults;
    /**
     * Show all the Questions in the database
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id, Request $request)
    {
        $questions = Question::withCount('options', 'votes')->where('poll_id', $id)->get()->map(function ($question){
            $question->isComingSoon = $question->isComingSoon();
            $question->isLocked = $question->isLocked();
            $question->isRunning = $question->isRunning();
            $question->hasEnded = $question->hasEnded();
            $question->result_link = route('question.result', $question->id);
            $question->edit_link = route('question.edit', $question->id);
            $question->delete_link = route('question.remove', $question->id);
            $question->lock_link = route('question.lock', $question->id);
            $question->unlock_link = route('question.unlock', $question->id);
            return $question;
        })->toArray();
        

        return view('admin.poll.questions.index', compact('questions','id'));
    }

    /**
     * Store the Request
     *
     * @param PollCreationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\CheckedOptionsException
     * @throws \App\Exceptions\OptionsInvalidNumberProvidedException
     * @throws \App\Exceptions\OptionsNotProvidedException
     */
    public function store(PollCreationRequest $request)
    { 
        try {
            PollHandler::createFromRequest($request->all());
        } catch (DuplicatedOptionsException $exception) {
            return redirect(route('question.create',$request->poll_id))
                ->withInput($request->all())
                ->with('danger', $exception->getMessage());
        }

        return response(__('langusages.question_created'), 201);
    }

    /**
     * Show the question to be prepared to edit
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Question $question)
    {
        $id = $question->poll_id;
        $options = $question->options->map(function ($option) {
            return [
                'id' => $option->id,
                'value' => $option->name,
            ];
        })->toArray();

        $canChangeOptions = $question->votes()->count() === 0;

        return view('admin.poll.questions.edit', compact('id','question', 'options', 'canChangeOptions'));
    }

    /**
     * Show the question to be prepared to edit
     *
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function result(Question $question)
    {       
        $result = $this->drawResult($question);
        return $result;

    }

    /**
     * Update the Question
     *
     * @param Question $question
     * @param PollCreationRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Question $question, PollCreationRequest $request)
    {
        PollHandler::modify($question, $request->all());
        
        return response(__('languages.question_updated'), 200);
    }

    /**
     * Delete a Poll
     *
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Question $question)
    {
        $question->remove();
        return response('', 200);
    }
    public function create($id)
    {
        return view('admin.poll.questions.create',compact('id'));
    }

    /**
     * Lock a Question
     *
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function lock(Question $question)
    {
        $question->lock();

        $question->isComingSoon = $question->isComingSoon();
        $question->isLocked = $question->isLocked();
        $question->isRunning = $question->isRunning();
        $question->hasEnded = $question->hasEnded();
        $question->edit_link = route('question.edit', $question->id);
        $question->delete_link = route('question.remove', $question->id);

        return response()->json([
            'question' => $question
        ], 200);
    }

    /**
     * Unlock a Question
     *
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unlock(Question $question)
    {
        $question->unLock();

        $question->isComingSoon = $question->isComingSoon();
        $question->isLocked = $question->isLocked();
        $question->isRunning = $question->isRunning();
        $question->edit_link = route('question.edit', $question->id);
        $question->delete_link = route('question.remove', $question->id);

        return response()->json([
            'question' => $question
        ], 200);
    }

    function voteform($id,Question $question){
       $question = Question::find($id);
       if($question){
           return view('welcome',compact('id'));
       }
       else{
           return "No Question Found";
       }
    }
}
