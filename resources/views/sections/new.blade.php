@extends('layouts.app')

@section('title', 'Create a new section')

@section('content')

{{-- Navbar --}}
	@include('partials.navbar')

<div class="container">
	<div class="row">

		<div class="col-md-10 col-md-offset-1">
			<h2>{{ $article->title }}</h2>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Section</h3>
				</div>
				<div class="panel-body">
					
                   <form action="{{ url('sections') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">

							{{ csrf_field() }}

							<input type="hidden" name="article_id" value="{{ $article->id }}">

							<div class="form-group">
								<label for="title" class="col-sm-2 control-label">Section Title</label>
								<div class="col-sm-10">
									<input type="text" name="title" id="title" class="form-control" placeholder="Title">
								</div>
							</div>

							<div class="form-group">
								<label for="content" class="col-sm-2 control-label">Section Content</label>
								<div class="col-sm-10">
									<textarea name="content" id="content" rows="10" class="form-control"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="image" class="col-sm-2 control-label">Image</label>
								<div class="col-sm-10">
									<input type="file" name="image">
								</div>
							</div>														

                      		<div class="form-group">
                      			<div class="col-sm-1 col-sm-offset-2">
                      				<button type="submit" name="btn_finish" class="btn btn-primary">Finish</button>
                      			</div>
                      			<div class="col-sm-2">
                      				<button type="submit" name="btn_new" class="btn btn-primary">New Section</button>
                      			</div>
                      		</div>

                      </form>   

				</div>
			</div>
		</div>
	</div>
</div>

@endsection
