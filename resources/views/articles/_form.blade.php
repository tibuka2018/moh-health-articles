<div class="form-group{{ $errors->has('title') ? ' has-error ' : '' }} has-feedback">
	<label for="title" class="col-sm-2 control-label">Title</label>
	<div class="col-sm-10">
		<input type="text" name="title" value="{{ isset($article->title) ? $article->title : '' }}" id="title" class="form-control" placeholder="Title" aria-describedby="titleErrorStatus">
		@if($errors->has('title'))
		    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		    <span id="titleErrorStatus" class="sr-only">(error)</span>
			<span class="help-block">
				<strong>{{ $errors->first('title') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group">
<label for="category" class="col-sm-2 control-label">Category</label>
<div class="col-sm-5">
	<select name="category" id="category" class="form-control">
		@if($categories->count() > 0)
			@foreach($categories as $category)
				<option value="{{ $category->id }}" @if(isset($article))  @if($category->id == $article->category->id) selected="selected" @endif  @endif>{{ $category->name }}</option>
			@endforeach
		@else
			<option value="">Empty</option>
		@endif
	</select>
</div>
<div class="col-sm-5">
	<a href="{{ url('categories/create') }}" class="btn btn-link">New</a>
</div>
</div>

<div class="form-group">
<label for="image" class="col-sm-2 control-label">Image (Optional)</label>
<div class="col-sm-10">
	<input type="file" name="image">
</div>
</div>