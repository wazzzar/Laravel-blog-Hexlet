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

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = [];
        foreach (ArticleCategory::all() as $category){
            $categories[$category->id] = $category->name;
        }
        return view('article.edit', compact('article', 'categories'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $article = new Article();
        $this->_validate($request);
        $article->fill($request->all());
        $article->save();
        return redirect()->route('articles.index');
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $article = Article::findOrFail($id);
        $this->_validate($request, $article);
        $article->fill($request->all());
        $article->save();
        return redirect()->route('articles.index');
    }

    /**
     * @throws ValidationException
     */
    private function _validate(Request $request, Article $article = null): void
    {
        $this->validate($request, [
            'name' => 'required|unique:articles' . ($article ? ',name,' . $article->id : ''),
            'body' => 'required|min:100',
            'category_id' => 'required'
        ]);
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
        }
        return redirect()->route('articles.index');
    }
}
