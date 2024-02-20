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
Route::get('article_categories', [ArticleCategoryController::class, 'index'])->name('article_categories.index');

Route::get('/rating', [RatingController::class, 'index']);
