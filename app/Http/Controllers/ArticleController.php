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

            $imageName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $imageName);

            $image = new Image();
            $image->user_id = Auth::user()->id;
            $image->url = $imageName;
            $image->save();

            // insert that article
            $article = new Article();
            $article->user_id   =  Auth::user()->id;
            $article->title     =  $request->input('title');
            $article->slug      =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
            $article->image_id  = $image->id;
            $article->category_id = $request->input('category');
            $article->save();

            // connect that image and article
            $image = Image::find($image->id);
            $image->article_id = $article->id;
            $image->save();

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
        $article = Article::with(['user', 'category', 'images', 'sections'])->whereSlug($slug)->firstOrFail();
        // TODO View composers
        $latest_articles = Article::with('user')->orderBy('created_at', 'desc')->take(5)->get();
        return view('articles.show', compact('article', 'latest_articles'));
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
    public function update(CreateANewArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        // check if a user has submited a file
        if($request->hasFile('image')) {
            // upload that image

            $imageName = time().'.'.$request->image->getClientOriginalExtension();

            $request->image->move(public_path('images'), $imageName);

            $image = new Image();
            $image->user_id = Auth::user()->id;
            $image->url = $imageName;
            $image->save();

            // insert that article
            $article->user_id   =  Auth::user()->id;
            $article->title     =  $request->input('title');
            $article->slug      =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
            $article->image_id  = $image->id;
            $article->category_id = $request->input('category');
            $article->save();

            // connect that image and article
            $image = Image::find($image->id);
            $image->article_id = $article->id;
            $image->save();            

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
    public function destroy(Request $request, Article $article)
    {
        $this->authorize('destroy', $article);

        $article->delete();

        return redirect('/home');
    }
}
