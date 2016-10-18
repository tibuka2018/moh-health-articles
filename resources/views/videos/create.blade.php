@extends('layouts.app')

@section('title', 'Add a video')

@section('content')

    {{-- banner --}}
    <div class="container">
        @include('partials.banner')
    </div>

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add a new video</h3>
                    </div>
                    <div class="panel-body">

                        <form action="{{ url('videos') }}" method="POST" class="form-horizontal" role="form">

                            {!! csrf_field() !!}

                            @include('videos._form')

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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