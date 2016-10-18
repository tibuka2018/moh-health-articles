<div class="form-group{{ $errors->has('title') ? ' has-error ' : '' }} has-feedback"> 
	<label for="title" class="col-sm-2 control-label">Section Title</label>
	<div class="col-sm-10">
		<input type="text" name="title" value="{{ isset($section->title) ? $section->title : '' }}" id="title" class="form-control" placeholder="Title" aria-describedby="titleErrorStatus">
		@if($errors->has('title'))
		    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		    <span id="titleErrorStatus" class="sr-only">(error)</span>		
			<span class="help-block">
				<strong>{{ $errors->first('title') }}</strong>
			</span>
		@endif			
	</div>
</div>

<div class="form-group{{ $errors->has('content') ? ' has-error ' : '' }} has-feedback">
	<label for="content" class="col-sm-2 control-label">Section Content</label>
	<div class="col-sm-10">
		<textarea name="content" id="content" rows="10" class="form-control" aria-describedby="contentErrorStatus">
			{{ isset($section->content) ? $section->content : '' }}
		</textarea>
		@if($errors->has('content'))
		    <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
		    <span id="contentErrorStatus" class="sr-only">(error)</span>		
			<span class="help-block">
				<strong>{{ $errors->first('content') }}</strong>
			</span>
		@endif		
	</div>
</div>

<div class="form-group">
	<label for="image" class="col-sm-2 control-label">Image (Optional)</label>
	<div class="col-sm-10">
		<input type="file" name="image">
	</div>
</div>