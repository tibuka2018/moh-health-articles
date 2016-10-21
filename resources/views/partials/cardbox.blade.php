<div class="panel panel-info">
   <div class="panel-body">
     {{-- Sections --}}
      @if($article->sections->count() > 0)
               <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-success">
                     <div class="panel-heading" role="tab" id="section">
                        <h4 class="panel-title"><a title="{{ $article->title }}" href="#collapse{{ $article->id }}" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">{{ str_limit($article->title, 15) }}</a></h4>
                     </div>
                     <div id="collapse{{ $article->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                           Sections
                           <ul>
                              @foreach($article->sections as $section)
                                 <li><a href="{{ url('articles/' . $article->slug) }}#{{ $section->slug }}">{{ $section->title }}</a></li>
                              @endforeach
                           </ul> 
                           <a href="{{ url('articles/' . $article->slug) }}">Read all</a>                             
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-6 text-left">
                     <small>{{ $article->created_at->diffForHumans() }}</small>
                  </div>
                  <div class="col-sm-6 text-left">
                     <small>{{ $article->category->name }}</small>
                  </div>
               </div>        
      @endif
   </div>
</div>