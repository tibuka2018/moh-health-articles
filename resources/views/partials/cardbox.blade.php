<div class="card">
<div class="panel panel-default">
   <div class="panel-body">

      {{-- Image --}}
      @if($article->images->count() > 0)
         {{-- There is image --}}
         @foreach($article->images as $image)
            @if($image !== null)
               {{-- Display the first image --}}
               {{-- {{ $image->url }} --}}
               <?php break; ?>
            @endif
         @endforeach
      @else
         {{-- No image --}}
         {{-- Display callback image --}}
      @endif

      {{-- Article title --}}
      <h3><a href="{{ url('articles/' . $article->slug) }}" title="{{ $article->title }}">{{ str_limit($article->title, 50) }}</a></h3>

      {{-- Author --}}
      <p>
         <small>By {{ $article->user->name }}</small>
      </p>

   </div>
   <div class="panel-footer">
      <div class="row">
         <div class="col-sm-6 text-left">
            {{ $article->created_at->diffForHumans() }}
         </div>
         <div class="col-sm-6 text-right">
            {{ $article->views }} Views
         </div>
      </div>
   </div>
</div>   
</div>