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

//投稿画面を表示する
Route::get('/', "ArticleController@index")->name('index');//定義付け


Route::resource('articles', 'articleController')->only([
    'index',
    'store',
]);

Route::resource('comments', 'CommentController')->only([
    'store',
    'destroy',
    'show',
]);




