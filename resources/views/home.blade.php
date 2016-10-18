@extends('layouts.app')

@section('content')

{{-- Navbar --}}
    @include('partials.navbar')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            bs3-pan
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
