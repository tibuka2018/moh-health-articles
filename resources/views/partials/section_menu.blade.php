      {{-- Sections --}}
         @if($article->sections->count() > 0)
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="section">
                           <h4 class="panel-title"><a href="#collapse{{ $article->id }}" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">Sections</a></h4>
                        </div>
                        <div id="collapse{{ $article->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                           <div class="panel-body">
                              <ul>
                                 @foreach($article->sections as $section)
                                    <li><a href="#{{ $section->slug }}">{{ $section->title }}</a></li>
                                 @endforeach
                              </ul>                              
                           </div>
                        </div>
                     </div>
                  </div>         
         @endif 