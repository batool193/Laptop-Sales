<?php

namespace App\Http\Controllers;

use App\Models\Fquestion;
use Illuminate\Http\Request;

class FquestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Fquestion::paginate(10);
        return view('question.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check())
        {
        return view('question.create');}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->check())
        {
        $question = Fquestion::create([
            'question' => $request->question,
            'answer' => $request->answer,
            ]);
            return redirect('/question')->with('status','Question Created Successfully');}
    }

    /**
     * Display the specified resource.
     */
    public function show(Fquestion $question)
    {
        return view('question.show',['question'=>$question]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fquestion $question)
    {
        if (auth()->check())
        {
        return view('question.edit',['question'=>$question]);}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fquestion $question)
    {
        if (auth()->check())
        {
        $data=[
            'question' => $request->question,
            'answer' => $request->answer,
            ];
            $question->update($data);

        return redirect('/question')->with('status','Question Updated Successfully');}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fquestion $question)
    {
        if (auth()->check())
        {
        $question->delete();
        return redirect('/question')->with('status','Question Deleted Successfully');}
    }
    }

