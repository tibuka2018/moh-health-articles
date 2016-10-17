@extends('layouts.app')

@section('content')
	{{-- banner --}}
	<div class="container">
		@include('partials.banner')
	</div>
	{{-- Navbar --}}
		@include('partials.navbar')
	{{-- Corousel --}}
		<div class="container">
			@include('partials.carousel')
		</div>
	{{-- Main --}}
		<div class="container main">
			<div class="row">
				{{-- Articles --}}
				<div class="col-xs-12 col-sm-9">
					
				@if($articles->count() > 0)
					@foreach($articles->chunk(3) as $articlesSet)
						<div class="row">
							@foreach($articlesSet as $article)
								<div class="col-xs-12 col-sm-4">

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
					<div class="jumbotron text-center">
						<h1>Empty</h1>
					</div>
				@endif			

				</div>
				{{-- Sidebar --}}
				<div class="col-xs-12 col-sm-3">
					@include('partials.sidebar')
				</div>
			</div>
		</div>
	

@endsection
