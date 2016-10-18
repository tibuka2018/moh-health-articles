<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use App\Section;

use App\Category;

use App\Http\Requests\CreateANewArticleRequest;

use Auth;

use App\Image;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(['user', 'images', 'sections'])->paginate(6);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateANewArticleRequest $request)
    {
        // check if a user has submited a file
        if($request->hasFile('image')) {
            // upload that image

            $path = $request->image->store('images');

            $image = new Image();
            $image->user_id = Auth::user()->id;
            $image->url = $path;
            $image->save();

            // insert that article
            $article = new Article();
            $article->user_id   =  Auth::user()->id;
            $article->title     =  $request->input('title');
            $article->slug      =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
            $article->image_id  = $image->id;
            $article->category_id = $request->input('category');
            $article->save();

            return redirect('articles/' . $article->id . '/sections/new');
        } else {
            $article = new Article();
            $article->user_id   =  Auth::user()->id;
            $article->title     =  $request->input('title');
            $article->slug      =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
            $article->category_id = $request->input('category');
            $article->save();
            return redirect('articles/' . $article->id . '/sections/new');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::whereSlug($slug)->with(['user', 'category', 'images', 'sections'])->firstOrFail();
        return view('articles.show', compact('article', 'section_images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $article = Article::with(['category', 'sections', 'images'])->whereSlug($slug)->whereUserId(Auth::user()->id)->firstOrFail();
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        // check if a user has submited a file
        if($request->hasFile('image')) {
            // upload that image

            $path = $request->image->store('images');

            $image = new Image();
            $image->user_id = Auth::user()->id;
            $image->url = $path;
            $image->save();

            // insert that article
            $article->user_id   =  Auth::user()->id;
            $article->title     =  $request->input('title');
            $article->slug      =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
            $article->image_id  = $image->id;
            $article->category_id = $request->input('category');
            $article->save();

            return redirect('home');
        } else {
            $article->user_id   =  Auth::user()->id;
            $article->title     =  $request->input('title');
            $article->slug      =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
            $article->category_id = $request->input('category');
            $article->save();
            return redirect('home');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
