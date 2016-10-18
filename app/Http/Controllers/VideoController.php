<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CreateVideoRequest;
use App\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::with('category')->paginate(12);
        return view('videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('videos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateVideoRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVideoRequest $request)
    {
        $video = new Video();
        $video->user_id = Auth::user()->id;
        $video->title = $request->input('title');
        $video->slug = str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
        $video->description = $request->input('description');
        $video->url = $request->input('url');
        $video->category_id = $request->input('category');
        $video->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $video = Video::with('category')->whereSlug($slug)->first();
        return view('videos.show', compact('video'));
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
