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
        <li class="tab"><a href="#mijn_comments">Mijn comments</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
        <div id="favorieten">


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
                    <p><small><b>Gepost door:</b> {{$favorite->post->user->name}}  </small></p>
                    <p><small><b>{{count($favorite->post->comments)}} comments </b> </small></p>
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





            
        </div>
        <div id="mijn_posts">
            
        
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
                    <p><small><b>Gepost door:</b> {{$post->user->name}}  </small></p>
                    <p><small><b>{{count($post->comments)}} comments </b> </small></p>
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
    



        </div>
        <div id="mijn_comments">
            



      @if(!empty($post))
        @foreach($comments as $comment)
    <div class="card horizontal z-depth-2">
      <div class="card-image">
       <!-- image here -->
      </div>
      <div class="card-stacked">
        <div class="card-content">
        {{ $comment->votes }}
            @if(!$user->hasVoted($comment))
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
            @else
                @if($user->hasUpVoted($comment))
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote"><i class="fa fa-caret-up" aria-hidden="true" style="color:black"></i></a>
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                @endif
                @if($user->hasDownVoted($comment))
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote"><i class="fa fa-caret-down" aria-hidden="true" style="color:black"></i></a>
                @endif
            @endif

                <h2 class="card-title">{{$comment->title}}</h2>
                <i>{{$comment->body}}</i>
                <br>
                <small> Gepost: {{$comment->created_at->diffForHumans()}} door
                {{$comment->user->name}}</small>
        </div>
        <div class="card-action">
          <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit">Edit comment </a>
        </div>
      </div>
    </div>
    @endforeach
    @endif
    










        </div>
    </div>
  </div>

   

</div>



@endsection