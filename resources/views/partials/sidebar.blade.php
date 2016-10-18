<div class="media">
	<a class="pull-left" href="#">
		<img class="media-object" src="http://placehold.it/50x50" alt="Image">
	</a>
	<div class="media-body">
		<h4 class="media-heading">{{ $latest_articles->title }}</h4>
		<p><small>{{ $latest_articles->created_at->diffForHumans() }}</small></p>
		<p>by <strong>{{ $latest_articles->user->name }}</strong></p>
		<p><a href="{{ url('articles/' . $latest_articles->slug) }}">Read &raquo;</a></p>
	</div>
</div>	
