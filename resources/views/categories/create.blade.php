@extends('layouts.app')

@section('title', 'Create a new category')

@section('content')

{{-- Navbar --}}
	@include('partials.navbar')

<div class="container">
	<div class="row">

		<div class="col-md-9">
			<h2>Create a new category</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					<form action="{{ url('categories') }}" method="POST" class="form-horizontal" role="form">
							
							{{ csrf_field() }}

							<div class="form-group">
								<label for="name" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
									<input type="text" name="name" id="name" class="form-control" placeholder="Category Name"> 
								</div>
							</div>

							<div class="form-group">
								<label for="color" class="col-sm-2 control-label">Color</label>
								<div class="col-sm-2">
									<input type="color" name="color" id="color" value="#2955D9" class="form-control" placeholder="Category Name"> 
								</div>
							</div>							
					
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<h2>Categories</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Total = </strong>{{ $categories->count() }}</h3>
				</div>
				<div class="panel-body">
					@if($categories->count() > 0)
						<ol>
							@foreach($categories as $category)
								<li><a href="{{ url('category/' . $category->slug) }}">{{ $category->name }}</a></li>
							@endforeach
						</ol>
					@else
						No category
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
