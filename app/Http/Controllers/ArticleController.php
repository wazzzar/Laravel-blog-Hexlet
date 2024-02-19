<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    function index() {
        $articles = Article::paginate();
        return view('article.index', compact('articles'));
    }
}
