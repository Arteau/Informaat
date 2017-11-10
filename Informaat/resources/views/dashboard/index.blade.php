@extends('layouts.landing')

@section('content')

<div class="container" style="margin-top:50px">


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
        <div class="row z-depth-2 hoverable" style="color:#636b6f; min-height:118px;">
          <div class="col s12 m1 hide-on-small-only	" style="position:relative">
            <div style="position:absolute" class="votes">{{ $favorite->post->votes }}</div>
                <div style="position:absolute" class="votes_caret">
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
          <div class="col s12 m2 hide-on-small-only	" style="position:relative">
          @if($favorite->post->topic == "techniek")
            <img src="{{asset('img/icon_techniek.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  
          @elseif($favorite->post->topic == "sociaal")
          <img src="{{asset('img/icon_social.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  
  
          @else
          <img src="{{asset('img/icon_sound.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  
  
          @endif
          </div>
          <div class="col s10 m8">
            <div class="">
                    
                    <h5 class="">{{$favorite->post->title}}</h5>
                    <i class="truncate">{{$favorite->post->body}}</i>
                    
                    
                   
                    @if(!empty($favorite->post->tag1 | $favorite->post->tag2 | $favorite->post->tag3))
                    <small><b>Tags: </b>{{$favorite->post->tag1}} | {{$favorite->post->tag2}} | {{$favorite->post->tag3}}</small>
                    @else
                    <small><br></small>
                    @endif
                    
                    <p><small><b>Geplaatst door:</b> {{$favorite->post->user->name}} van  {{$favorite->post->user->jeugdhuis->name}}</small></p>
                    <object><a href="/posts/{{$favorite->post->id}}"><p><small><b>{{count($favorite->post->comments)}} comments </b> </small></p></a></object>
            </div>
            <div class="col s12 m12">
            
            </div>
          </div>
          <div class="col s2 m1" >
            <!-- -->
            <div style="position:relative">
              
            
            @if( count($favorite->post->favorites->where('user_id', auth()->id())) )
  
                      <form action="/posts/{{ $favorite->post->id }}/unfavorite" method="POST" class="favorite">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        
                        <button type="submit" class="star">
                          <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                      </form>
                    @else
                  
                      <form action="/posts/{{ $favorite->post->id }}/favorite" method="POST" class="favorite">
                        {{ csrf_field() }}
                        
                        <button type="submit" class="star"><i class="fa fa-star-o" aria-hidden="true"></i></button>
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
        <div class="row z-depth-2 hoverable" style="color:#636b6f; min-height:118px;">
          <div class="col s12 m1 hide-on-small-only	" style="position:relative">
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
          <div class="col s12 m2 hide-on-small-only	" style="position:relative">
          @if($post->topic == "techniek")
            <img src="{{asset('img/icon_techniek.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  
          @elseif($post->topic == "sociaal")
          <img src="{{asset('img/icon_social.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  
  
          @else
          <img src="{{asset('img/icon_sound.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  
  
          @endif
          </div>
          <div class="col s10 m8">
            <div class="">
                    
                    <h5 class="">{{$post->title}}</h5>
                    <i class="truncate">{{$post->body}}</i>
                    @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                    <small><b>Tags: </b>{{$post->tag1}} | {{$post->tag2}} | {{$post->tag3}}</small>
                    @else
                    <small><br></small>
                    @endif
                    <p><small><b>Geplaatst door:</b> {{$post->user->name}}  van {{$post->user->jeugdhuis->name}}</small></p>
                    
                    <object><a href="/posts/{{$post->id}}"><p><small><b>{{count($post->comments)}} comments </b> </small></p></a></object>
            </div>
            <div class="col s12 m12">
            
            </div>
          </div>
          <div class="col s2 m1" >
            <!-- -->
            <div style="position:relative">
              
            
            @if( count($post->favorites->where('user_id', auth()->id())) )
  
                      <form action="/posts/{{ $post->id }}/unfavorite" method="POST" class="favorite">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        
                        <button type="submit" class="star">
                          <i class="fa fa-star" aria-hidden="true"></i>
                        </button>
                      </form>
                    @else
                  
                      <form action="/posts/{{ $post->id }}/favorite" method="POST" class="favorite">
                        {{ csrf_field() }}
                        
                        <button type="submit" class="star"><i class="fa fa-star-o" aria-hidden="true"></i></button>
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
        <div class="card horizontal z-depth-2">
          <div class="card-image" style="width:23px; margin:3%">
              <div class="comment-wrapper" style="position:relative;transform:translateY(-50%);top:50%">
                <p class="text-center">{{ $comment->votes }}</p>
                @if(!$user->hasVoted($comment))
                <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote" class="upvote" style="position:absolute; bottom:10px"><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a>
                <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote" class="downvote" style="position:absolute; top:10px"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a>
                @else
                    @if($user->hasUpVoted($comment))
                        <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote" class="upvote cancelvote" style="position:absolute; bottom:10px"><i class="fa fa-caret-up fa-3x" aria-hidden="true" style="color:black"></i></a>
                        <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote" class="downvote" style="position:absolute; top:10px"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a>
                    @endif
                    @if($user->hasDownVoted($comment))
                        <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote" class="upvote" style="position:absolute; bottom:10px"><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a>
                        <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote" class="downvote cancelvote" style="position:absolute; top:10px"><i class="fa fa-caret-down fa-3x" aria-hidden="true" style="color:black"></i></a>
                    @endif
                @endif
                </div>
          </div>
          <div class="card-stacked">
            <div class="card-content" style="padding:0px 24px; min-height:105px">
            
                
    
                <h4 class="card-title flow-text"><b>{{$comment->title}}</b></h4>
                    <i>{{$comment->body}}</i>
                    
                    
            </div>
            @if($comment->user_id == Auth::user()->id || Auth::user()->isAdmin || (Auth::user()->moderator && Auth::user()->jeugdhuis == $comment->user->jeugdhuis))
            <div class="card-action" style="padding:0px 24px">
                <p><small> <b>Geplaatst door:</b> {{$comment->user->name}} van {{$comment->user->jeugdhuis->name}}</small></p>
                <div style="display:inline-block; margin:3px; float:left; border:1px solid #cecece; border-radius:3px; padding:2px; color: #adadad">
                {{$comment->created_at->diffForHumans()}} <i class="material-icons tiny" style="transform:translateY(17%)">schedule</i> 
                </div>
                <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit" class="btn-floating waves-effect waves-light  blue lighten-3 right" style="margin-top:-5px; margin-bottom:5px">
                    <i class="material-icons right tiny">edit</i>
                </a>
             
            </div>
            @endif
          </div>
        </div>
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