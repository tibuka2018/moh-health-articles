@extends('layouts.app')

@section('title', $article->title)

@section('content')
{{-- banner --}}
	<div class="container">
		@include('partials.banner')
	</div>
    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container main">
    	<div class="row">
    		<div class="col-xs-12 col-sm-9">

    			<article class="article-single">

    				<div class="content">
    					<section>
					{{-- image --}}
					@if($article->images->count() > 0)
						@foreach($article->images as $image)
							<h2>{{ $article->title }}</h2>
							<a href="{{ url('images/' . $image->url) }}">
								<img src="{{ url('images/' . $image->url) }}" class="img-responsive" alt="{{ $article->title }}">
							</a>
							<?php break; ?>
						@endforeach
					@else
						{{--
							TODO: provide a callback image
						--}}
{{-- 						<div class="article-img" style="background-image: url('http://lorempixel.com/800/600/nature/?25199')">
						</div>	 --}}					
					@endif    						
    					</section>
    				</div>

    				{{-- Content --}}
    				<div class="content">
						
						<section>
    					<header class="article-header">
    						{{-- Title --}}
    						<h3>{{ $article->title }}</h3>

    						{{-- byline --}}
    						<div class="byline">
    							Writen by {{ $article->user->name }}
    						</div>
    					</header>							
						</section>

						<section>
						<div class="table-of-contents">
							@if($article->sections->count() > 0)
								<h5>Contents</h5>
								<ul>
									@foreach($article->sections as $section)
										<li><a href="#{{ $section->slug }}">{!! $section->title !!}</a></li>
									@endforeach
								</ul>
							@else
								<p class="lead">This article has no content yet.</p>	
							@endif
						</div>							
						</section>

						@if($article->sections->count() > 0)
							@foreach($article->sections as $section)
								<section id="{{ $section->slug }}">
									<h5>{!! $section->title !!}</h5>
									<p>
										{!! $section->content !!} 
									</p>									
									@if($section->images->count() > 0)
										@foreach($section->images as $image)
											<a href="{{ url('images/' . $image->url) }}">
												<img src="{{ url('images/' . $image->url) }}" class="img-responsive" alt="{{ $section->title }}">
											</a>
										@endforeach
									@endif
								</section>
							@endforeach
						@endif

    				</div>
    			</article>

    		</div>
			{{-- Sidebar --}}
			<div class="col-xs-12 col-sm-3">
				@if($latest_articles->count() > 0)
					<div class="side-bar">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Latest Articles</h5>
							</div>
							<div class="panel-body">
								@each('partials.sidebar', $latest_articles, 'latest_articles')
							</div>
							<div class="panel-footer">
								<a href="{{ url('articles') }}">View All</a>
							</div>
						</div>	
					</div>					
				@endif
			</div>
    	</div>
    </div>

@endsection
