<div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
        <input type="text" name="title" id="title" class="form-control" placeholder="Video title">
    </div>
</div>
<div class="form-group">
    <label for="category" class="col-sm-2 control-label">Category</label>
    <div class="col-sm-5">
        <select name="category" id="category" class="form-control">
            @if($categories->count() > 0)
                <option value="">-Select-</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                            @if(isset($article))  @if($category->id == $article->category->id) selected="selected" @endif  @endif>{{ $category->name }}</option>
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
    <label for="description" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
        <textarea name="description" id="description" rows="5" class="form-control"></textarea>
    </div>
</div>
<div class="form-group">
    <label for="url" class="col-sm-2 control-label">URL</label>
    <div class="col-sm-10">
        <input type="text" name="url" id="url" class="form-control" placeholder="YouTube Video url">
    </div>
</div>
