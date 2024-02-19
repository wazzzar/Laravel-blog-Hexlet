<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class RatingController extends Controller
{
    function index() {
        $articles = Article::all();
        $filtered = $articles->filter(function ($value, $key) {
            return $value->isPublished();
        });
        $sorted = $filtered->sortBy('likes_count');
        return view('rating.index', ['articles' => $sorted]);
    }
}
