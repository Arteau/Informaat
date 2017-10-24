@extends('layouts.landing')

@section('content')
<div class="container" style="margin-top:50px">

    <form role="search" class="app-search" action="/posts/search" method="POST">
        {{ csrf_field() }}

            <input type="text" name="keyword" id="keyword" placeholder="Zoeken" class="form-control" style="width:100%">
    </form>
    
    @if (!empty($searchPost))

        @isset($searchPost)
        @empty($searchPost[0])
            <br>
            <h3 class="text-center">Whooops, geen resultaten gevonden!</h3>
        @endempty
        @endisset

        @foreach($searchPost as $post)
        
        <div class="card horizontal z-depth-2 hoverable">
        <div class="card-image" style="width:150px">
        <div style="position:absolute">
             <img src="{{asset('img/icon_sound.svg')}}" alt="" style="width:100%">
          </div>
          
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

    @endif
</div>
@endsection