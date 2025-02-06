<?php

namespace App\Http\Controllers;

use App\Events\QuestionReplied;
use App\Http\Requests\StoreReplyQuestion;
use App\Mail\QuestionRepliedMail;
use App\Models\Question;
use App\Models\ReplyQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ForumController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->paginate(1);

        return view('forum.index', compact('questions'));
    }

    public function show(string $id)
    {
        if (! $question = Question::with(['user', 'replies'])->find($id)) {
            abort(404);
        }

        return view('forum.show', compact('question'));
    }

    public function reply(StoreReplyQuestion $request)
    {
        if (! $question = Question::find($request->question_id)) {
            abort(404);
        }

        $createdReply = ReplyQuestion::create([
            'user_id' => Auth::id(),
            ...$request->validated(),
        ]);

        QuestionReplied::dispatch($question->user, $createdReply);

        // Mail::to($question->user)->send(new QuestionRepliedMail);

        return redirect()->back()->with('success', 'Pergunta respondida com sucesso!');
    }
}
