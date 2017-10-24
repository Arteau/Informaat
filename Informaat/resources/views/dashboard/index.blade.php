@extends('layouts.landing')

@section('content')

<div class="container">


<div class="card">
    <div class="card-content">
      <p class="text-center">{{$user->name}} / {{$user->jeugdhuis->name}} </p>
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
        <div class="card horizontal z-depth-2">
      <div class="card-image">
        <img src="https://maxcdn.icons8.com/Share/icon/color/Gaming//pokecoin1600.png" style="width:60%">
      </div>
      <div class="card-stacked">
        <div class="card-content">
              {{ $favorite->post->votes }}
                @if(!$user->hasVoted($favorite->post))
                <a href="/posts/{{$favorite->post->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                <a href="/posts/{{$favorite->post->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                @else
                    @if($user->hasUpVoted($favorite->post))
                        <a href="/posts/{{$favorite->post->id}}/cancelvote"><i class="fa fa-caret-up" aria-hidden="true" style="color:black"></i></a>
                        <a href="/posts/{{$favorite->post->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    @endif
                    @if($user->hasDownVoted($favorite->post))
                        <a href="/posts/{{$favorite->post->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                        <a href="/posts/{{$favorite->post->id}}/cancelvote"><i class="fa fa-caret-down" aria-hidden="true" style="color:black"></i></a>
                    @endif
                @endif

                @if( count($favorite->post->favorites->where('user_id', auth()->id())) )

                    <form action="/posts/{{ $favorite->post->id }}/unfavorite" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      
                      <button type="submit" class="star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </button>
                    </form>
                  
                  @else
                
                    <form action="/posts/{{ $favorite->post->id }}/favorite" method="POST">
                      {{ csrf_field() }}
                      
                      <button type="submit" class="star"><i class="fa fa-star-o" aria-hidden="true"></i></button>
                    </form>

                  @endif

                <h2 class="card-title">{{$favorite->post->title}}</h2>
                <i>{{$favorite->post->body}}</i>
                <hr>
                
                <p>Onderwerp: {{$favorite->post->topic}}</p> 
                @if(!empty($favorite->post->tag1 | $favorite->post->tag2 | $favorite->post->tag3))
                <small>{{$favorite->post->tag1}} // {{$favorite->post->tag2}} // {{$favorite->post->tag3}}</small>
                @endif
        </div>
        <div class="card-action">
            <a href="/posts/{{$favorite->post->id}}">Lees meer</a>
        </div>
      </div>
    </div>
    @endforeach





            
        </div>
        <div id="mijn_posts">
            

        @foreach($user_posts as $post)
        <div class="card horizontal z-depth-2">
      <div class="card-image">
        <img src="https://maxcdn.icons8.com/Share/icon/color/Gaming//pokecoin1600.png" style="width:60%">
      </div>
      <div class="card-stacked">
        <div class="card-content">
              {{ $post->votes }}
                @if(!$user->hasVoted($post))
                <a href="/posts/{{$post->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                <a href="/posts/{{$post->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                @else
                    @if($user->hasUpVoted($post))
                        <a href="/posts/{{$post->id}}/cancelvote"><i class="fa fa-caret-up" aria-hidden="true" style="color:black"></i></a>
                        <a href="/posts/{{$post->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    @endif
                    @if($user->hasDownVoted($post))
                        <a href="/posts/{{$post->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                        <a href="/posts/{{$post->id}}/cancelvote"><i class="fa fa-caret-down" aria-hidden="true" style="color:black"></i></a>
                    @endif
                @endif
                @if( count($post->favorites->where('user_id', auth()->id())) )

                    <form action="/posts/{{ $post->id }}/unfavorite" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      
                      <button type="submit" class="star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </button>
                    </form>
                  
                  @else
                
                    <form action="/posts/{{ $post->id }}/favorite" method="POST">
                      {{ csrf_field() }}
                      
                      <button type="submit" class="star"><i class="fa fa-star-o" aria-hidden="true"></i></button>
                    </form>

                  @endif

                <h2 class="card-title">{{$post->title}}</h2>
                <i>{{$post->body}}</i>
                <hr>
                
                <p>Onderwerp: {{$post->topic}}</p> 
                @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                <small>{{$post->tag1}} // {{$post->tag2}} // {{$post->tag3}}</small>
                @endif
        </div>
        <div class="card-action">
            <a href="/posts/{{$post->id}}">Lees meer</a>
        </div>
      </div>
    </div>
    @endforeach



        </div>
        <div id="mijn_comments">
            




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
                <small> Gepost: {{$comment->created_at->diffForHumans()}} by
                {{$comment->user->name}}</small>
        </div>
        <div class="card-action">
          <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit">Edit comment </a>
        </div>
      </div>
    </div>
    @endforeach
    










        </div>
    </div>
  </div>

   

</div>



@endsection