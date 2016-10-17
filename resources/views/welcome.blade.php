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
					
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="card hovercard">
						   <a href="{{ url('articles/1') }}">
						   	<img src="http://lorempixel.com/300/200/nature/1" alt=""/>
						   </a>
						   <div class="avatar">
						      <img src="http://lorempixel.com/80/80/nature/1" alt="" />
						   </div>
						   <div class="info">
						      <div class="title">
						         <a href="{{ url('articles/1') }}">Dissident numinous face forwards paranoid human.</a>
						      </div>
						      <div class="desc">
						      	3D-printed courier nano-geodesic euro-pop claymore mine paranoid into...
						      </div>
						      <div class="bottom">
						      	<span class="pull-left">
						      		{{ date('Y-m-d') }}
						      	</span>
						      	<span class="pull-right">35 Views</span>
						      </div>
						   </div>
						</div>						
					</div>										
				</div>				

				</div>
				{{-- Sidebar --}}
				<div class="col-xs-12 col-sm-3">
					@include('partials.sidebar')
				</div>
			</div>
		</div>
	

@endsection
