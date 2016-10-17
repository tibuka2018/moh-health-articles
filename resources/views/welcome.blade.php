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
						   <img src="http://lorempixel.com/300/200/nature/1" alt=""/>
						   <div class="avatar">
						      <img src="http://lorempixel.com/80/80/nature/1" alt="" />
						   </div>
						   <div class="info">
						      <div class="title">
						         The Title
						      </div>
						      <div class="desc">Lorem ipsum</div>
						   </div>
						   <div class="bottom">
						      <button class="btn btn-default">Button</button>
						   </div>
						</div>						
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="card hovercard">
						   <img src="http://lorempixel.com/300/200/nature/1" alt=""/>
						   <div class="avatar">
						      <img src="http://lorempixel.com/80/80/nature/1" alt="" />
						   </div>
						   <div class="info">
						      <div class="title">
						         The Title
						      </div>
						      <div class="desc">Lorem ipsum</div>
						   </div>
						   <div class="bottom">
						      <button class="btn btn-default">Button</button>
						   </div>
						</div>						
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="card hovercard">
						   <img src="http://lorempixel.com/300/200/nature/1" alt=""/>
						   <div class="avatar">
						      <img src="http://lorempixel.com/80/80/nature/1" alt="" />
						   </div>
						   <div class="info">
						      <div class="title">
						         The Title
						      </div>
						      <div class="desc">Lorem ipsum</div>
						   </div>
						   <div class="bottom">
						      <button class="btn btn-default">Button</button>
						   </div>
						</div>						
					</div>										
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="card hovercard">
						   <img src="http://lorempixel.com/300/200/nature/1" alt=""/>
						   <div class="avatar">
						      <img src="http://lorempixel.com/80/80/nature/1" alt="" />
						   </div>
						   <div class="info">
						      <div class="title">
						         The Title
						      </div>
						      <div class="desc">Lorem ipsum</div>
						   </div>
						   <div class="bottom">
						      <button class="btn btn-default">Button</button>
						   </div>
						</div>						
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="card hovercard">
						   <img src="http://lorempixel.com/300/200/nature/1" alt=""/>
						   <div class="avatar">
						      <img src="http://lorempixel.com/80/80/nature/1" alt="" />
						   </div>
						   <div class="info">
						      <div class="title">
						         The Title
						      </div>
						      <div class="desc">Lorem ipsum</div>
						   </div>
						   <div class="bottom">
						      <button class="btn btn-default">Button</button>
						   </div>
						</div>						
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="card hovercard">
						   <img src="http://lorempixel.com/300/200/nature/1" alt=""/>
						   <div class="avatar">
						      <img src="http://lorempixel.com/80/80/nature/1" alt="" />
						   </div>
						   <div class="info">
						      <div class="title">
						         The Title
						      </div>
						      <div class="desc">Lorem ipsum</div>
						   </div>
						   <div class="bottom">
						      <button class="btn btn-default">Button</button>
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
