<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use App\Section;

use App\category;

use App\Http\Requests\CreateANewArticleRequest;

use Auth;

use App\Image;

class ArticleController extends Controller
{
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
            Article::create([
                'user_id'   =>  Auth::user()->id,
                'title'     =>  $request->input('title'),
                'slug'      =>  str_slug($request->input('title') . ' ' . Auth::user()->id, '-'),
                'image_id'  => $image->id,
                'category_id' => $request->input('category')
            ]);
            return redirect('articles/create');
        } else {
            Article::create([
                'user_id'   =>  Auth::user()->id,
                'title'     =>  $request->input('title'),
                'slug'      =>  str_slug($request->input('title') . ' ' . Auth::user()->id, '-'),
                'category_id' => $request->input('category')
            ]);
            return redirect('articles/create');
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
    public function edit($id)
    {
        //
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
        //
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
