<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\{ArticleController, ArticleCategoryController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/about', [PageController::class, 'about']);

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/article_categories', [ArticleCategoryController::class, 'index'])->name('article_categories.index');
Route::get('/article_categories/create', [ArticleCategoryController::class, 'create'])->name('article_categories.create');
Route::post('/article_categories', [ArticleCategoryController::class, 'store'])->name('article_categories.store');
Route::get('/article_categories/{id}', [ArticleCategoryController::class, 'show'])->name('article_categories.show');

Route::get('/rating', [RatingController::class, 'index']);
