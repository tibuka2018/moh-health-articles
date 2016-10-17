<div class="card hovercard">
   <div class="card-image" style="background-image: url('{{ $image_url }}')">
   </div>
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