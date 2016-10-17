@extends('layouts.app')

@section('content')
	{{-- banner --}}
	<div class="banner">
		<div class="container">
			@include('partials.banner')
		</div>
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
					Articles
				</div>
				{{-- Sidebar --}}
				<div class="col-xs-12 col-sm-3">
					@include('partials.sidebar')
				</div>
			</div>
		</div>
	

@endsection
