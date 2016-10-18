<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title (Optional)</label>
    <div class="col-sm-10">
        <input type="text" name="title" id="title" value="{{ isset($video->title) ? $video->title : old('title')  }}" class="form-control" placeholder="Video title">
    </div>
</div>
<div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
    <label for="category" class="col-sm-2 control-label">Category</label>
    <div class="col-sm-5">
        <select name="category" id="category" class="form-control" aria-labelledby="categoryErrorStatus">
            @if($categories->count() > 0)
                <option value="">-Select-</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if(isset($video))  @if($category->id == $video->category->id) selected="selected" @endif  @endif>{{ $category->name }}</option>
                @endforeach
            @else
                <option value="">Empty</option>
            @endif
        </select>
        @if($errors->has('category'))
            <span id="categoryErrorStatus" class="sr-only">(error)</span>
            <span class="help-block">
				<strong>{{ $errors->first('category') }}</strong>
			</span>
        @endif
    </div>
    <div class="col-sm-5">
        <a href="{{ url('categories/create') }}" class="btn btn-link">New</a>
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Description (Optional)</label>
    <div class="col-sm-10">
        <textarea name="description" id="description" rows="5" class="form-control">{{ isset($video->description) ? $video->description : old('description') }}</textarea>
    </div>
</div>
<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }} has-feedback">
    <label for="url" class="col-sm-2 control-label">URL</label>
    <div class="col-sm-10">
        <input type="text" name="url" id="url" value="{{ isset($video->url) ? $video->url : old('url')  }}" class="form-control" placeholder="YouTube Video url" aria-labelledby="urlErrorStatus">
        @if($errors->has('url'))
            <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
            <span id="urlErrorStatus" class="sr-only">(error)</span>
            <span class="help-block">
				<strong>{{ $errors->first('url') }}</strong>
			</span>
        @endif
    </div>
</div>
