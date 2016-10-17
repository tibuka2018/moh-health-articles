<div class="card hovercard">
   @if($article->images->count() > 0)
      @foreach($article->images as $image)
         @if($image !== null)
            <div class="card-image" style="background-image: url('{{ $image->url }}')">
            </div>
            <?php break; ?>
         @endif
      @endforeach
   @else
      {{--
         TODO: Place a proper image
       --}}
      <div class="card-image" style="background-image: url('http://lorempixel.com/800/600/nature/?53379')">
      </div>
   @endif
   <div class="info">
      <div class="title">
         <a href="{{ url('articles/' . $article->slug) }}">{{ $article->title }}</a>
      </div>
   </div>
   <div class="card-bottom">
   	<span class="pull-left">
   		{{ $article->created_at->diffForHumans() }}
   	</span>
   	<span class="pull-right">
   		{{ $article->views }} Views
   	</span>
   </div>
</div>