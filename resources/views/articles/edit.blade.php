@extends('layouts.app')

@section('title', 'Edit ' . $article->title)

@section('content') 

{{-- Navbar --}}
	@include('partials.navbar')

<div class="container">
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
			<h2>{{ $article->title }}</h2>
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
					@if($article->sections->count() > 0)
					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<thead>
								<tr>
									<th>SN</th>
									<th>Title</th>
									<th>Created</th>
									<th>Updated</th>
									<th colspan="2" class="text-center"><i class="fa fa-cog"></i></th>
								</tr>
							</thead>
							<tbody>	
								<?php $i = 1; ?>
								@foreach($article->sections as $section)
									<tr>
										<td>{{ $i++ }}.</td>
										<td>{{ $section->title }}</td>
										<td>{{ $section->created_at->diffForHumans() }}</td>
										<td>{{ $section->updated_at->diffForHumans() }}</td>
										<td><a href="{{ url('articles/' . $article->id . '/sections/' . $section->id . '/edit') }}"><i class="fa fa-edit"></i> Edit</a></td>
										<td><a href="#"><i class="fa fa-trash"></i> Delete</a></td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					@else
						<div class="jumbotron text-center jumbotron-message">
							<h1>This article has no any section.</h1>
						</div>
					@endif
				</div>
				<div class="panel-footer">
					<a href="{{ url('articles/' . $article->id . '/sections/new') }}" class="btn btn-primary btn-sm">Add Section</a>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection
