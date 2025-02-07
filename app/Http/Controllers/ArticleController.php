<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->check())
        {
        return view('article.create');}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->check())
        {
        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content,
            ]);
            return redirect('/article')->with('status','Article Created Successfully');}
        }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show',['article'=>$article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (auth()->check())
        {
        return view('article.edit',['article'=>$article]);}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {  if (auth()->check())
        {
        $data=[
            'title' => $request->title,
            'content' => $request->content,
            ];
            $article->update($data);

        return redirect('/article')->with('status','Article Updated Successfully');}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (auth()->check())
        {
        $article->delete();
        return redirect('/article')->with('status','Article Deleted Successfully');}
    }
}
