@extends('layouts.app')

@section('title', 'Articles')

@section('content')

	{{-- banner --}}
	<div class="container">
		@include('partials.banner')
	</div>

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container main">
    	<div class="row">
    		<div class="col-xs-12 col-sm-12">
			
				@if($articles->count() > 0)
					@foreach($articles->chunk(4) as $articlesSet)
						<div class="row">
							@foreach($articlesSet as $article)
								<div class="col-xs-12 col-sm-3">

									<div class="card-box">
										@include('partials.cardbox', ['article' => $article])
									</div>

								</div>
							@endforeach
						</div>
					@endforeach

					<div class="text-center">
						{{ $articles->links() }}
					</div>

				@else
					<div class="jumbotron text-center jumbotron-message">
						<h1>No Articles</h1>
					</div>
				@endif

    		</div>
    	</div>
    </div>

    @include('partials.footer')	

@endsection
