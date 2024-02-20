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

    public function edit($id)
    {
        $category = ArticleCategory::findOrFail($id);
        return view('article_category.edit', compact('category'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $category = new ArticleCategory();
        $this->_validate($request);
        $category->fill($request->all());
        $category->save();
        return redirect()->route('article_categories.index');
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $category = ArticleCategory::findOrFail($id);
        $this->_validate($request, $category);
        $category->fill($request->all());
        $category->save();
        return redirect()->route('article_categories.index');
    }

    /**
     * @throws ValidationException
     */
    private function _validate(Request $request, ArticleCategory $category = null): void
    {
        $this->validate($request, [
            'name' => 'required|max:100|unique:article_categories' . ($category ? ',name,' . $category->id : ''),
            'description' => 'required|min:20',
            'state' => [
                'required',
                Rule::in(['draft', 'published'])
            ]
        ]);
    }
}
