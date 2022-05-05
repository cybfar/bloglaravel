<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        $articles = $articles->map(function ($article) {
            $article->category_id = $article->category->name;
            return $article;
        });
        return response()->json($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category;
        $article->save();

        return response()->json("Article créé avec succès");
    }

    public function getcategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function sortcategories($id)
    {
        if ($id == 0) {
            $articles = Article::all()->sortByDesc('created_at');
            $articles = $articles->map(function ($article) {
                $article->category_id = $article->category->name;
                return $article;
            });
            return response()->json($articles);
        }
        else {
            $articles = Article::where('category_id', $id)->get();
        $articles = $articles->map(function ($article) {
            $article->category_id = $article->category->name;
            return $article;
        });
        return response()->json($articles);
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        $article->category_id = $article->category->name;
        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return response()->json($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category;
        $article->save();

        return response()->json("Article modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return response()->json("Article supprimé avec succès");
    }
}
