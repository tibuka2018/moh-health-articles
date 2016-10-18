<div class="form-group">
	<label for="title" class="col-sm-2 control-label">Title</label>
	<div class="col-sm-10">
		<input type="text" name="title" value="{{ isset($article->title) ? $article->title : '' }}" id="title" class="form-control" placeholder="Title">
	</div>
</div>
<div class="form-group">
<label for="category" class="col-sm-2 control-label">Category</label>
<div class="col-sm-5">
	<select name="category" id="category" class="form-control">
		<option value="0">Uncategorised</option>
		@foreach($categories as $category)
			<option value="{{ $category->id }}" @if(isset($article))  @if($category->id == $article->category->id) selected="selected" @endif  @endif>{{ $category->name }}</option>
		@endforeach
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