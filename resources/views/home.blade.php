@extends('layouts.app')

@section('title', 'Home')

@section('content')

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="row col-sm-6">
                            <div class="text-center">
                                <h2>{{ $articles->count() }}</h2>
                                <p>Articles</p>
                            </div>
                        </div>
                        <div class="row col-sm-6">
                            <div class="text-center">
                                <h2>{{ $videos->count() }}</h2>
                                <p>Videos</p>
                            </div>
                        </div>
                    </div>
                </div>

                <h1>Articles</h1>

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
                                            <td>
                                                <a href="{{ url('articles/' . $article->slug) }}">{{ $article->title }}</a>
                                            </td>
                                            <td>
                                                <span style="background-color: {{ $article->category->color }}">&nbsp;</span> {{ $article->category->name }}
                                            </td>
                                            <td>{{ $article->sections->count() }}</td>
                                            <td>{{ $article->created_at->diffForHumans() }}</td>
                                            <td>{{ $article->updated_at->diffForHumans() }}</td>
                                            <td>{{ $article->views }}</td>
                                            <td><a href="{{ url('articles/' . $article->slug . '/edit') }}"
                                                   class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a></td>
                                            <td>

                                                <a class="btn btn-danger" data-toggle="modal"
                                                   href='#{{ $article->id }}'><i class="fa fa-trash"></i></a>
                                                <div class="modal fade" id="{{ $article->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">
                                                                    Deleting {{ $article->title }}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3>Are you sure that you want to
                                                                    delete {{ $article->title }} ?</h3>
                                                                <p>
                                                                    This article and its sections will be lost forever.
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ url('articles/'.$article->id) }}"
                                                                      method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}

                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Cancel
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                        <i class="fa fa-btn fa-trash"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="jumbotron text-center jumbotron-message">
                                <h2>No articles</h2>
                            </div>
                        @endif
                    </div>
                    <div class="panel-footer text-center">
                        {{ $articles->links() }}
                    </div>
                </div>

                <h1>Videos</h1>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ url('videos/create') }}" class="btn btn-primary">New</a>
                    </div>
                    <div class="panel-body">
                        @if($videos->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Added</th>
                                        <th>Updated</th>
                                        <th colspan="2" class="text-center"><i class="fa fa-cog"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $video)
                                        <tr>
                                            <td>SN</td>
                                            <td><a href="{{ url('videos/' . $video->slug) }}">{{ $video->title }}</a>
                                            </td>
                                            <td>
                                                <span style="background-color: {{ $video->category->color  }}"></span> {{ $video->category->name }}
                                            </td>
                                            <td>{{ $video->created_at }}</td>
                                            <td>{{ $video->updated_at  }}</td>
                                            <td><a href="{{ url('videos/' . $video->slug . '/edit') }}"><i
                                                            class="fa fa-edit"></i></a></td>
                                            <td>

                                                <a class="btn btn-danger" data-toggle="modal"
                                                   href='#{{ $video->id }}'><i class="fa fa-trash"></i></a>
                                                <div class="modal fade" id="{{ $video->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title">
                                                                    Deleting {{ $video->title }}</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3>Are you sure that you want to
                                                                    delete {{ $video->title }} ?</h3>
                                                                <p>
                                                                    This video will be lost forever.
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ url('videos/'.$video->id) }}"
                                                                      method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}

                                                                    <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Cancel
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                        <i class="fa fa-btn fa-trash"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="jumbotron text-center jumbotron-message">
                                <h2>No video</h2>
                            </div>
                        @endif
                    </div>
                    <div class="panel-footer text-center">
                        {{ $videos->links() }}
                    </div>
                </div>

                @if(Auth::user()->is_admin)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Users</h3>
                        </div>
                        <div class="panel-body">
                            <a href="{{ url('users') }}" class="btn btn-success btn-lg">Manage Users</a>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    @include('partials.footer')

@endsection
