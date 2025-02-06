<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateQuestionRequest;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::where('user_id', Auth::user()->id)->paginate();

        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('question.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateQuestionRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->questions()->create($request->all());

        return redirect()->route('questions.index')->with('success', 'Pergunta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question) // Model Binding
    {
        return view('question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        $categories = Category::all();

        return view('question.edit', compact('question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $data = $request->validate([
            'subject' => 'required|string|max:255',
            'text' => 'required|string',
        ]);

        $question->update($data);

        return redirect()->route('questions.index')->with('success', 'Pergunta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Pergunta deletada com sucesso!');
    }
}
