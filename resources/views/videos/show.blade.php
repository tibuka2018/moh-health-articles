@extends('layouts.app')

@section('title', $video->title)

@section('content')

    {{-- banner --}}
    <div class="container">
        @include('partials.banner')
    </div>

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body text-center">
                        <iframe width="630" height="315"
                                src="{{ $video->url . '?controls=0' }}">
                        </iframe>
                    </div>
                    <div class="panel-footer">
                        <h5><a href="{{ url('videos/' . $video->slug) }}">{{ str_limit($video->title, 50) }}</a></h5>
                        <p>
                            <span style="background-color: {{ $video->category->color }}">&nbsp;</span> {{ $video->category->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12">
            	<div class="panel panel-default">
            		<div class="panel-heading">
            			<h3 class="panel-title">Description</h3>
            		</div>
            		<div class="panel-body">
            			<p>
            				{{ $video->description }}
            			</p>
            		</div>
            	</div>
            </div>
        </div>
    </div>

    @include('partials.footer')

@endsection