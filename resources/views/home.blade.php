@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- Navbar --}}
    @include('partials.navbar')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url('articles/create') }}" class="btn btn-primary">New</a>
                </div>
                <div class="panel-body">
                    @if($articles->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Sections</th>
                                        <th>Created</th>
                                        <th>Last Updated</th>
                                        <th>Views</th>
                                        <th colspan="2" class="text-center"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td><a href="{{ url('articles/' . $article->slug) }}">{{ $article->title }}</a></td>
                                            <td><span style="background-color: {{ $article->category->color }}">&nbsp;</span> {{ $article->category->name }}</td>
                                            <td>{{ $article->sections->count() }}</td>
                                            <td>{{ $article->created_at->diffForHumans() }}</td>
                                            <td>{{ $article->updated_at->diffForHumans() }}</td>
                                            <td>{{ $article->views }}</td>
                                            <td><a href="{{ url('articles/' . $article->slug . '/edit') }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a></td>
                                            <td>
                                                <form action="{{ url('articles/'.$article->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-btn fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="jumbotron text-center jumbotron-message">
                            <h2>No article</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Statistics</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Articles</th>
                                <td>{{ $articles->count() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection
