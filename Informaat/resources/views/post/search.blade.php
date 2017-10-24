@extends('layouts.landing')

@section('content')
<div class="container">
    <form role="search" class="app-search" action="/posts/search" method="POST">
        {{ csrf_field() }}

            @include ('layouts.errors')
            <input type="text" name="keyword" id="keyword" placeholder="Zoeken" class="form-control" style="width:100%"> <a href=""><i class="fa fa-search"></i></a>
    </form>
    <hr>
    @if (!empty($searchPost))

        @isset($searchPost)
        @empty($searchPost[0])
            <h1>Geen resultaten gevonden!</h1>
        @endempty
        @endisset

        @foreach($searchPost as $post)
        
        <div class="card horizontal z-depth-2 hoverable">
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