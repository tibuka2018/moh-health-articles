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
	$articles = Article::with(['user', 'images', 'sections'])->orderBy('created_at', 'desc')->paginate(9);
	// TODO View composers
	$latest_articles = Article::with('user')->orderBy('created_at', 'desc')->take(5)->get();
    return view('welcome', compact('articles', 'latest_articles'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('articles', 'ArticleController');

Route::get('articles/{articleId}/sections/new', 'SectionController@newSection');

Route::post('sections', 'SectionController@store');

Route::resource('categories', 'CategoryController');

Route::get('articles/{articleId}/sections/{sectionId}/edit', 'SectionController@editSection');

Route::patch('sections/{id}', 'SectionController@update');

// TODO show a writer's profile

Route::get('images/{filename}', function ($filename)
{
    $slash = "\\";
    $path = storage_path() . $slash . $filename;

    return $path;

    if(!File::exists($path)) abort(404);

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::resource('videos', 'VideoController');

Route::resource('users', 'UserController');