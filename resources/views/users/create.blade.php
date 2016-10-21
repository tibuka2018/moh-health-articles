@extends('layouts.app')

@section('title', 'Create a User')

@section('content')

	{{-- banner --}}
	<div class="container">
		@include('partials.banner')
	</div>

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container main">
    	<div class="row">
    		<div class="col-sm-12">
    			<h1>Add a new user</h1>
    			<div class="panel panel-primary">
    				<div class="panel-heading">
    					<h3 class="panel-title">#</h3>
    				</div>
    				<div class="panel-body">

                        @include('errors.list')

    					<form action="{{ url('users') }}" method="POST" class="form-horizontal" role="form">
    							{!! csrf_field() !!}

								@include('users._form')

    							<div class="form-group">
    								<div class="col-sm-10 col-sm-offset-2">
    									<button type="submit" class="btn btn-primary">Submit</button>
    								</div>
    							</div>
    					</form>
    				</div>
                    <div class="panel-footer"><a href="{{ url('users') }}" class="btn btn-primary">See all</a></div>
    			</div>
    		</div>
    	</div>
    </div>

    @include('partials.footer')	

@endsection
