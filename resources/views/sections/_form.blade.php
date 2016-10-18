<div class="form-group">
	<label for="title" class="col-sm-2 control-label">Section Title</label>
	<div class="col-sm-10">
		<input type="text" name="title" value="{{ isset($section->title) ? $section->title : '' }}" id="title" class="form-control" placeholder="Title">
	</div>
</div>

<div class="form-group">
	<label for="content" class="col-sm-2 control-label">Section Content</label>
	<div class="col-sm-10">
		<textarea name="content" id="content" rows="10" class="form-control">
			{{ isset($section->content) ? $section->content : '' }}
		</textarea>
	</div>
</div>

<div class="form-group">
	<label for="image" class="col-sm-2 control-label">Image (Optional)</label>
	<div class="col-sm-10">
		<input type="file" name="image">
	</div>
</div>