<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Validation\ValidationException;

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

    public function create()
    {
        $article = new Article();
        $categories = [];
        foreach (ArticleCategory::all() as $category){
            $categories[$category->id] = $category->name;
        }
        return view('article.create', compact('article', 'categories'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->validate($request, [
            'name' => 'required|unique:articles',
            'body' => 'required|min:10',
            'category_id' => 'required'
        ]);

        $article = new Article();
        $article->fill($data);
        $article->save();

        return redirect()->route('articles.index');
    }
}
