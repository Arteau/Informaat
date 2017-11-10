@extends('layouts.landing')

@section('content')

<div class="container container-margin">


<div class="card">
    <div class="card-content">
      <h5 class="text-center">{{$user->name}} / @if(!empty($user->jeugdhuis->name)){{$user->jeugdhuis->name}}@endif </h5>
    </div>
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab"><a class="active" href="#favorieten">Favorieten</a></li>
        <li class="tab"><a href="#mijn_posts">Mijn posts</a></li>
        <li class="tab"><a href="#mijn_comments">Mijn reacties</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
        <div id="favorieten">

      
      @if(count($favorite_posts) > 0) 
        @foreach($favorite_posts as $favorite)


        <a href="/posts/{{$favorite->post->id}}">
        <div class="row z-depth-2 hoverable post-main-wrapper">
          <div class="col s12 m1 hide-on-small-only	post-votes-wrapper">
            <div class="votes post-votes-number">{{ $favorite->post->votes }}</div>
                <div class="votes_caret post-votes-number">
                    @if(!$user->hasVoted($favorite->post))
                    <object><a href="/posts/{{$favorite->post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a></object>
                    <object><a href="/posts/{{$favorite->post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a></object>
                    @else
                        @if($user->hasUpVoted($favorite->post))
                            <object><a href="/posts/{{$favorite->post->id}}/cancelvote" class="upvote cancelvote"><i class="fa fa-caret-up" aria-hidden="true" ></i></a></object>
                            <object><a href="/posts/{{$favorite->post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a></object>
                        @endif
                        @if($user->hasDownVoted($favorite->post))
                            <object><a href="/posts/{{$favorite->post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a></object>
                            <object><a href="/posts/{{$favorite->post->id}}/cancelvote" class="downvote  cancelvote"><i class="fa fa-caret-down" aria-hidden="true" ></i></a></object>
                        @endif
                    @endif
                </div>
          </div>
          <div class="col s12 m2 hide-on-small-only	post-img-wrapper">
          @if($favorite->post->topic == "techniek")
            <img src="{{asset('img/icon_techniek.svg')}}" alt="" >  
          @elseif($favorite->post->topic == "sociaal")
            <img src="{{asset('img/icon_social.svg')}}" alt="">  
          @else
            <img src="{{asset('img/icon_sound.svg')}}" alt="">  
          @endif
          </div>
          <div class="col s10 m8">
            <div>            
                    <h5>{{$favorite->post->title}}</h5>
                    <i class="truncate">{{$favorite->post->body}}</i>                  
                    @if(!empty($favorite->post->tag1 | $favorite->post->tag2 | $favorite->post->tag3))
                    <small><b>Tags: </b>{{$favorite->post->tag1}} | {{$favorite->post->tag2}} | {{$favorite->post->tag3}}</small>
                    @else
                    <small><br></small>
                    @endif
                    <p><small><b>Geplaatst door:</b> {{$favorite->post->user->name}} van {{$favorite->post->user->jeugdhuis->name}}  </small></p>
                    @if(count($favorite->post->comments) === 1)
                    <p><small><b>{{count($favorite->post->comments)}} reactie </b> </small></p>
                    @else
                    <p><small><b>{{count($favorite->post->comments)}} reacties </b> </small></p>
                    @endif
            </div>
            <div class="col s12 m12">        
            </div>
          </div>
          <div class="col s2 m1" >
            <div class="relative-pos">
            @if( count($favorite->post->favorites->where('user_id', auth()->id())) )
                      <form action="/posts/{{ $favorite->post->id }}/unfavorite" method="POST" class="favorite">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}     
                        <button type="submit" class="star">
                          <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                        </button>
                      </form>
                    @else
                      <form action="/posts/{{ $favorite->post->id }}/favorite" method="POST" class="favorite">
                        {{ csrf_field() }}
                        <button type="submit" class="star"><i class="fa fa-star-o fa-2x" aria-hidden="true"></i></button>
                      </form>
            @endif
            </div>
          </div>
        </div>
        </a>
    @endforeach
    @else
    
      <p>Je hebt nog geen favorieten.</p> 
    
    @endif
        </div>
        <div id="mijn_posts">
        @if(count($user_posts) > 0)
        @foreach($user_posts as $post)
        <a href="/posts/{{$post->id}}">
        <div class="row z-depth-2 hoverable post-main-wrapper">
          <div class="col s12 m1 hide-on-small-only	post-votes-wrapper">
            <div class="votes post-votes-number">{{ $post->votes }}</div>
                <div class="votes_caret post-votes-number">
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
          <div class="col s12 m2 hide-on-small-only	post-img-wrapper">
          @if($post->topic == "techniek")
            <img src="{{asset('img/icon_techniek.svg')}}" alt="" >  
          @elseif($post->topic == "sociaal")
            <img src="{{asset('img/icon_social.svg')}}" alt="">  
          @else
            <img src="{{asset('img/icon_sound.svg')}}" alt="">  
          @endif
          </div>
          <div class="col s10 m8">
            <div>            
                    <h5>{{$post->title}}</h5>
                    <i class="truncate">{{$post->body}}</i>                  
                    @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                    <small><b>Tags: </b>{{$post->tag1}} | {{$post->tag2}} | {{$post->tag3}}</small>
                    @else
                    <small><br></small>
                    @endif
                    <p><small><b>Geplaatst door:</b> {{$post->user->name}} van {{$post->user->jeugdhuis->name}}  </small></p>
                    @if(count($post->comments) === 1)
                    <p><small><b>{{count($post->comments)}} reactie </b> </small></p>
                    @else
                    <p><small><b>{{count($post->comments)}} reacties </b> </small></p>
                    @endif
            </div>
            <div class="col s12 m12">        
            </div>
          </div>
          <div class="col s2 m1" >
            <div class="relative-pos">
            @if( count($post->favorites->where('user_id', auth()->id())) )
                      <form action="/posts/{{ $post->id }}/unfavorite" method="POST" class="favorite">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}     
                        <button type="submit" class="star">
                          <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                        </button>
                      </form>
                    @else
                      <form action="/posts/{{ $post->id }}/favorite" method="POST" class="favorite">
                        {{ csrf_field() }}
                        <button type="submit" class="star"><i class="fa fa-star-o fa-2x" aria-hidden="true"></i></button>
                      </form>
            @endif
            </div>
          </div>
        </div>
        </a>
    @endforeach

    @else

    <p>Je hebt nog geen posts.</p>

    @endif
    



        </div>
        <div id="mijn_comments">
            


  
        @if(count($comments) != 0)
        @foreach($comments as $comment)
        <a href="/posts/{{$comment->post->id}}#comments" id="comment-a">
        <div class="card horizontal z-depth-2 hoverable">
        <div class="card-image card-image-comment">
            <div class="comment-wrapper">
              <p class="text-center">{{ $comment->votes }}</p>
              @if(!$user->hasVoted($comment))
              <object><a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote" class="upvote comment-upvote" ><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a></object>
              <object><a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote" class="downvote comment-downvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a></object>
              @else
                  @if($user->hasUpVoted($comment))
                      <object><a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote" class="upvote comment-upvote cancelvote"><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a></object>
                      <object><a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote" class="downvote comment-downvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a></object>
                  @endif
                  @if($user->hasDownVoted($comment))
                      <object><a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote" class="upvote comment-upvote" ><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a></object>
                      <object><a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote" class="downvote cancelvote comment-downvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a></object>
                  @endif
              @endif
              </div>
        </div>
        <div class="card-stacked">
          <div class="card-content card-content-comment">
              <h4 class="card-title flow-text"><b>{{$comment->title}}</b></h4>
                  <i>{{$comment->body}}</i>
          </div>
          @if($comment->user_id == Auth::user()->id || Auth::user()->isAdmin || (Auth::user()->moderator && Auth::user()->jeugdhuis == $comment->user->jeugdhuis))
          <div class="card-action card-action-comment">
              <p><small> <b>Geplaatst door:</b> {{$comment->user->name}} van {{$comment->user->jeugdhuis->name}}</small></p>
              <div class="info-post">
              {{$comment->created_at->diffForHumans()}} <i class="material-icons tiny info-time">schedule</i> 
              </div>
            <object><a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit" class="btn-floating waves-effect waves-light  blue lighten-3 right edit-comment" >
                  <i class="material-icons right tiny">edit</i>
              </a></object>
           
          </div>
          @endif
        </div>
      </div>
</a>
        @endforeach
        <hr>
        @else
        <small>Je hebt nog geen reacties geplaatst</small>
        <br>
        @endif
        
        </div>
    </div>
  </div>

   

</div>



@endsection