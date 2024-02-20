<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $q = '';
        if ($request->has('q') && ($q = $request->get('q'))) {
            $articles = Article::where('name', 'LIKE', "%{$q}%")->paginate(10);
        } else {
            $articles = Article::paginate(10);
        }
        return view('article.index', compact('articles', 'q'));
    }

    public function show($id){
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }
}
