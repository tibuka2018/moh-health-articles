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
		<div class="container">
			<div class="row">
				{{-- Articles --}}
				<div class="col-xs-12 col-sm-10">
					Articles
				</div>
				{{-- Sidebar --}}
				<div class="col-xs-12 col-sm-2">
					Sidebar
				</div>
			</div>
		</div>
	

@endsection
