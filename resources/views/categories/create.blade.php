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

							<div class="form-group{{ $errors->has('name') ? ' has-error ' : '' }} has-feedback">
								<label for="name" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
									<input type="text" name="name" id="name" class="form-control" placeholder="Category Name" aria-describedby="nameErrorStatus"> 
									@if($errors->has('name'))
									    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
									    <span id="nameErrorStatus" class="sr-only">(error)</span>		
										<span class="help-block">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif									
								</div>
							</div>

							<div class="form-group">
								<label for="color" class="col-sm-2 control-label">Color</label>
								<div class="col-sm-1">
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
						<ul class="list-unstyled">
							@foreach($categories as $category)
								<li><span style="background-color: {{ $category->color }}">&nbsp;</span> <a href="{{ url('categories/' . $category->slug) }}">{{ $category->name }}</a></li>
							@endforeach
						</ul>	
					@else
						No category
					@endif
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
