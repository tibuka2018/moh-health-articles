@extends('layouts.app')

@section('title', 'Edit ' . $article->title)

@section('content') 

{{-- Navbar --}}
	@include('partials.navbar')

<div class="container">
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
			<h2>Write a new article</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Article</h3>
				</div>
				<div class="panel-body">
					
                   <form action="{{ url('articles/' . $article->id) }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
	
							{!! method_field('patch') !!}

							{!! csrf_field() !!}

							@include('articles._form')														

                      		<div class="form-group">
                      			<div class="col-sm-10 col-sm-offset-2">
                      				<button type="submit" class="btn btn-primary">Update</button>
                      			</div>
                      		</div>

                      </form>   

				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Sections</h3>
				</div>
				<div class="panel-body">
{{-- 					@if($article->sections->count() > 0)

					@else
						<div class="jumbotron text-center jumbotron-message">
							<h1>This article has no any section.</h1>
						</div>
					@endif --}}
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
