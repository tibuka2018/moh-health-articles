@extends('layouts.app')

@section('title', 'Users')

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
    			<h1>Manage {{ $user->name }}</h1>
    			<div class="panel panel-primary">
    				<div class="panel-heading">
    					<h3 class="panel-title">#</h3>
    				</div>
    				<div class="panel-body">
    					<form action="{{ url('users/' . $user->id) }}" method="POST" class="form-horizontal" role="form">
    							{!! method_field('patch') !!}
    							{!! csrf_field() !!}

								@include('users._form')

    							<div class="form-group">
    								<div class="col-sm-10 col-sm-offset-2">
    									<button type="submit" class="btn btn-primary">Update</button>
    								</div>
    							</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    @include('partials.footer')	

@endsection
