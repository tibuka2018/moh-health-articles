@extends('layouts.app')

@section('title', 'Edit ' . $section->title)

@section('content')

{{-- Navbar --}}
	@include('partials.navbar')

<div class="container">
	<div class="row">

		<div class="col-md-9">
			<h2>{{ $article->title }}</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Edit {{ $section->title }}</h3>
				</div>
				<div class="panel-body">
					
                   <form action="{{ url('sections/' . $section->id) }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

							
							{!! method_field('patch') !!}

							{!! csrf_field() !!}

							<input type="hidden" name="article_id" value="{{ $article->id }}">

							@include('sections._form')														

                      		<div class="form-group">
                      			<div class="col-sm-1 col-sm-offset-2">
                      				<button type="submit" class="btn btn-primary">Update</button>
                      			</div>
                      		</div>

                      </form>   

				</div>
			</div>
		</div>

		<div class="col-md-3">
			<h2>Sections</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Existing Sections</h3>
				</div>
				<div class="panel-body">
					@if($article->sections->count() > 0)
						<ol>
							@foreach($article->sections as $section)
								<li>{{ $section->title }}</li>
							@endforeach
						</ol>
					@else
						<p>
							No section
						</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
