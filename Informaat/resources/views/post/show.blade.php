@extends('layouts.landing')

@section('content')
<div class="container" style="margin-top:50px;">

<!-- begin new layout -->

    <div class="row z-depth-2 show-wrapper" >
        
        <div class="col m2 s10 icon-column">
        <div class="valign-wrapper icon-wrapper" >
            <img src="http://web-project.local/img/icon_sound.svg" alt="" style="width: 100%;"></div>
        </div>
        <div class="col s2 hide-on-med-and-up center-align">
            <a class="btn-floating waves-effect waves-light amber">
                <i class="material-icons right">star</i>
            </a>
        </div>
        <div class="col m10 s12">
        
            <div class="col  m10 s12 ">
            <h4 class="card-title flow-text"><b>Hoe verbeter ik mijn vergaderingen?</b></h4>
            <hr>
            </div>
            <div class="col m2 hide-on-small-only ">
                <a class="btn-floating waves-effect waves-light amber">
                    <i class="material-icons right">star</i>
                </a>
            </div>
            <div class="col  s12 " style="min-height:130px">
                <i class="card-body"> Wij hadden de vraag hoe we onze vergaderingen effficienter konden laten verlopen enzo voort enzo verder. klmqsdjfmqkjsf mqjdfsmlkjq smfjqskljfdlqsjf dsqjflkjqsdlfdjql mfjqmsdfjlk qsjflmqsjdfk qjdfkljsdf kjqsfdlkjqskl fjqslkdfjqsiofji jdflkqsj</i>
                <p><small><b>Geplaatst door: </b> Dieter Vercammen van Jeugdhuis Zoezel</small></p>
            </div>
            <div class="col s3 center-align">
            <i class="material-icons tiny">control_point</i>45
            <i class="material-icons tiny">message</i>12

            </div>
            <div class="col s3 center-align">
                <small>3 min geleden</small>
            </div>
            <div class="col s3 center-align">
                <i class="fa fa-caret-up" aria-hidden="true"></i>
                <i class="fa fa-caret-down" aria-hidden="true"></i>
            </div>
            <div class="col s3 center-align">
                <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            
        </div>

    </div>

    <!-- new layout -->

    <div class="col row z-depth-2" style="min-height:230px">
      <div class="col m2" >
          <div class="valign-wrapper" style="position:relative">
          <div style="position: absolute;top: 3rem;left: 2%;">
             <img src="{{asset('img/icon_sound.svg')}}" alt="" style="width:100%">
          </div>
        </div>
          
      </div>
      <div class="col m10">
        <div class="row">
            <div style="position:relative">

            @if( count($post->favorites->where('user_id', auth()->id())) )
                
                    <form action="/posts/{{ $post->id }}/unfavorite" method="POST" style="position:absolute; right:0">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      
                      <button type="submit" class="star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </button>
                    </form>
                  
                  @else
                
                    <form action="/posts/{{ $post->id }}/favorite" method="POST" style="position:absolute; right:0">
                      {{ csrf_field() }}
                      
                      <button type="submit" class="star"><i class="fa fa-star-o" aria-hidden="true"></i></button>
                    </form>

                  @endif
            
            </div>
            
            <div class="col m12">
                <h4 class="card-title"><b>{{$post->title}}</b></h4>
                <i>{{$post->body}}</i>
                <hr>
            </div>
                <div class="col m10">
                    <br>
                    @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                    <small><b>Tags: </b>{{$post->tag1}} | {{$post->tag2}} | {{$post->tag3}}</small>
                    @endif
                    <p><small><b>Geplaatst door:</b> {{$post->user->name}}  van {{$post->user->jeugdhuis->name}}</small></p>
                    @if(count($post->comments) === 1)
                    <p><small><b>{{count($post->comments)}} reactie </b> </small></p>
                    @else
                    <p><small><b>{{count($post->comments)}} reacties </b> </small></p>
                    @endif
                </div>

                <div class="col m2">
                <div style="position:absolute" class="votes">{{ $post->votes }}</div>
                <div style="position:absolute" class="votes_caret">
                    @if(!$user->hasVoted($post))
                    <object><a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a></object>
                    <object><a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a></object>
                    @else
                        @if($user->hasUpVoted($post))
                            <object><a href="/posts/{{$post->id}}/cancelvote" class="upvote cancelvote"><i class="fa fa-caret-up" aria-hidden="true" ></i></a></object>
                            <object><a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a></object>
                        @endif
                        @if($user->hasDownVoted($post))
                            <object><a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a></object>
                            <object><a href="/posts/{{$post->id}}/cancelvote" class="downvote  cancelvote"><i class="fa fa-caret-down" aria-hidden="true" ></i></a></object>
                        @endif
                    @endif
                </div>


                

                  </div>
        </div>
        @if($post->user_id == Auth::user()->id || Auth::user()->isAdmin || (Auth::user()->moderator && Auth::user()->jeugdhuis == $post->user->jeugdhuis))
        <div class="card-action">
          <a href="/posts/{{$post->id}}/edit">Post aanpassen</a>
        </div>
        @endif
      </div>
    </div>
    <hr>
    <div id="comments">
    @if(count($comments) != 0)
    @foreach($comments as $comment)
    <div class="card horizontal z-depth-2">
      <div class="card-image">
       <!-- image here -->
      </div>
      <div class="card-stacked">
        <div class="card-content">
        {{ $comment->votes }}
            @if(!$user->hasVoted($comment))
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
            @else
                @if($user->hasUpVoted($comment))
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote" class="upvote cancelvote"><i class="fa fa-caret-up" aria-hidden="true" style="color:black"></i></a>
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                @endif
                @if($user->hasDownVoted($comment))
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote" class="downvote cancelvote"><i class="fa fa-caret-down" aria-hidden="true" style="color:black"></i></a>
                @endif
            @endif
            

                <h2 class="card-title">{{$comment->title}}</h2>
                <i>{{$comment->body}}</i>
                <hr>
                <small> Geplaatst: {{$comment->created_at->diffForHumans()}} door
                {{$comment->user->name}} van {{$comment->user->jeugdhuis->name}}</small>
        </div>
        @if($comment->user_id == Auth::user()->id || Auth::user()->isAdmin || (Auth::user()->moderator && Auth::user()->jeugdhuis == $comment->user->jeugdhuis))
        <div class="card-action">
          <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit">Reactie aanpassen</a>
        </div>
        @endif
      </div>
    </div>
    @endforeach
    <hr>
    @else
    <small>Nog geen reactie's, wees de eerste om te reageren!</small>
    <br>
    @endif
    </div>
    {{ $comments->links() }}

    
   


    

    <ul class="collapsible hoverable " data-collapsible="accordion">
        <li>
            <div class="collapsible-header btn" style="height:50px; border-radius:5px;">
                <i class="material-icons"></i>Reactie plaatsen
            </div>
            <div class="collapsible-body">
                <form action="/posts/{{ $post->id }}/comment/store" method="POST">
                        {{ csrf_field() }}
                        
                    <div class="input-field">
                        <label for="title">Titel</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                    </div>

                    <div class="input-field">
                        <label for="body">Commentaar</label>
                        <input type="text" name="body" id="body" value="{{ old('body') }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Publish comment</button>
                    <a href="/posts"><div class="btn btn-danger">Back</div></a>
            
                </form>
            </div>
        </li>
    </ul>
    
</div>

@endsection