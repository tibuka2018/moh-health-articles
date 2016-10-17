@extends('layouts.app')

@section('title', $article->title)

@section('content')

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container main">
    	<div class="row">
    		<div class="col-xs-12 col-sm-9">

    			<article class="article-single">
					{{-- image --}}
					@if($article->images->count() > 0)
						@foreach($article->images as $image)
							<div class="article-img" style="background-image: url('{{ $image->url }}')">
							</div>
							<?php break; ?>
						@endforeach
					@else
						{{--
							TODO: provide a callback image
						--}}
						<div class="article-img" style="background-image: url('http://lorempixel.com/800/600/nature/?25199')">
						</div>						
					@endif

    				{{-- Content --}}
    				<div class="content">
    					<header class="article-header">
    						{{-- Title --}}
    						<h1>{{ $article->title }}</h1>

    						{{-- byline --}}
    						<div class="byline">
    							Writen by {{ $article->user->name }}
    						</div>
    					</header>

						<div class="table-of-contents">
							@if($article->sections->count() > 0)
								<h3>Contents</h3>
								<ul>
									@foreach($article->sections as $section)
										<li><a href="#{{ $section->slug }}">{{ $section->title }}</a></li>
									@endforeach
								</ul>
							@else
								<p class="lead">This article has no content yet.</p>	
							@endif
						</div>

						@if($article->sections->count() > 0)
							@foreach($article->sections as $section)
								<section id="{{ $section->slug }}">
									<h2>{{ $section->title }}</h2>
									<p>
										{{ $section->content }} 
									</p>
								</section>
							@endforeach
						@endif

    				</div>
    			</article>

    		</div>
    		<div class="col-xs-12 col-sm-3">
    			@include('partials.sidebar')
    		</div>
    	</div>
    </div>

@endsection
