<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/about', function () {
    $tags = ['обучение', 'программирование', 'php', 'oop'];
    return view('about', ['tags' => $tags]);
});

Route::get('/articles', function () {
    $article = new App\Models\Article();
    return view('articles', ['articles' => $article->all()]);
});
