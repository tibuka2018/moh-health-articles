<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Article;

use App\Section;

use Auth;

use App\Http\Requests\CreateANewSectionRequest;

use App\Image;

class SectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newSection($articleId)
    {
    	$article = Article::with('sections')->findOrFail($articleId);
    	return view('sections.new', compact('article'));
    }

    public function store(CreateANewSectionRequest $request)
    {
    	// check which button has been clicked
    	if(isset($_POST['btn_finish'])) {
    		// check if an image is submitted
    		if ($request->hasFile('image')) {
    			// upload that image

	            $path = $request->image->store('images');

	            $image = new Image();
	            $image->user_id = Auth::user()->id;
	            $image->url = $path;
	            $image->save();

	            // insert that section
	            $section = new Section();
	            $section->user_id = Auth::user()->id;
	            $section->article_id = $request->input('article_id');
	            $section->title = $request->input('title');
	            $section->slug  =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
	            $section->content = $request->input('content');
	            $section->image_id = $image->id;
	            $section->save();

	            // connect that image and section
	            $image = Image::find($image->id);
	            $image->section_id = $section->id;
	            $image->save();	            

	            return redirect('home');

    		} else {
	            // insert that section
	            $section = new Section();
	            $section->user_id = Auth::user()->id;
	            $section->article_id = $request->input('article_id');
	            $section->title = $request->input('title');
	            $section->slug  =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
	            $section->content = $request->input('content');
	            $section->save();

	            return redirect('home');
    		}

    	} else {
			// check if an image is submitted
    		if ($request->hasFile('image')) {
    			// upload that image

	            $path = $request->image->store('images');

	            $image = new Image();
	            $image->user_id = Auth::user()->id;
	            $image->url = $path;
	            $image->save();

	            // insert that section
	            $section = new Section();
	            $section->user_id = Auth::user()->id;
	            $section->article_id = $request->input('article_id');
	            $section->title = $request->input('title');
	            $section->slug  =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
	            $section->content = $request->input('content');
	            $section->image_id = $image->id;
	            $section->save();

	            // connect that image and section
	            $image = Image::find($image->id);
	            $image->section_id = $section->id;
	            $image->save();	            

	            return redirect('articles/' . $request->input('article_id') . '/sections/new');

    		} else {
	            // insert that section
	            $section = new Section();
	            $section->user_id = Auth::user()->id;
	            $section->article_id = $request->input('article_id');
	            $section->title = $request->input('title');
	            $section->slug  =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
	            $section->content = $request->input('content');
	            $section->save();

	            return redirect('articles/' . $request->input('article_id') . '/sections/new');
    		}
    	}
    }

    public function editSection($articleId, $sectionId)
    {
    	$section = Section::whereId($sectionId)->whereArticleId($articleId)->first();
    	// TODO Exlude the selected row
    	$article = Article::with('sections')->whereId($articleId)->first();
    	return view('sections.edit', compact('section', 'article'));
    }

    public function update(Request $request, $id)
    {
    		$article = Article::whereId($request->input('article_id'))->first();
    		$section = Section::whereId($id)->first();
    		// check if an image is submitted
    		if ($request->hasFile('image')) {
    			// upload that image

	            $path = $request->image->store('images');

	            $image = new Image();
	            $image->user_id = Auth::user()->id;
	            $image->url = $path;
	            $image->save();

	            // insert that section
	            $section->user_id = Auth::user()->id;
	            $section->article_id = $request->input('article_id');
	            $section->title = $request->input('title');
	            $section->slug  =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
	            $section->content = $request->input('content');
	            $section->image_id = $image->id;
	            $section->save();

	            // connect that image and section
	            $image = Image::find($image->id);
	            $image->section_id = $section->id;
	            $image->save();	            

	            return redirect('articles/' . $article->slug . '/edit');

    		} else {
	            // insert that section
	            $section->user_id = Auth::user()->id;
	            $section->article_id = $request->input('article_id');
	            $section->title = $request->input('title');
	            $section->slug  =  str_slug($request->input('title') . ' ' . Auth::user()->id, '-');
	            $section->content = $request->input('content');
	            $section->save();

	            return redirect('articles/' . $article->slug . '/edit');
    		}
    }
}
