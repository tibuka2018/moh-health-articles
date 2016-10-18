<?php

use App\Article;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	$articles = Article::with(['user', 'images', 'sections'])->paginate(6);
    return view('welcome', compact('articles'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('articles', 'ArticleController');

Route::get('articles/{articleId}/sections/new', 'SectionController@newSection');

Route::post('sections', 'SectionController@store');

Route::resource('categories', 'CategoryController');