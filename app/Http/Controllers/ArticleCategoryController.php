<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $article_categories = ArticleCategory::paginate(10);
        return view('article_category.index', compact('article_categories'));
    }

    public function show($id)
    {
        $article_cat = ArticleCategory::findOrFail($id);
        return view('article_category.show', compact('article_cat'));
    }

    public function create()
    {
        $category = new ArticleCategory();
        return view('article_category.create', compact('category'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|unique:article_categories|max:100',
            'description' => 'required|min:20',
            'state' => [
                Rule::in(['draft', 'published']),
            ]
        ]);

        $category = new ArticleCategory();
        $category->fill($request->all());
        $category->save();

        return redirect()->route('article_categories.index');
    }
}
