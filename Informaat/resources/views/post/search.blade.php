@extends('layouts.app')

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
        
         <!-- Blog Post -->
         <div class="blog_post md-4 alert alert-info">
            <div class="card ">
                <div class="card-body">
                
                {{ $post->votes }}
                <!-- @if(!$user->hasVoted($post))
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
                @endif -->
                <!-- return back geeft geen posts meer mee in compatct!!!!!!!!!! -->

                <h2 class="card-title">{{$post->title}}</h2>
                <i>{{$post->body}}</i>
                <hr>
                <a href="/posts/{{$post->id}}" class="btn btn-primary">Read More &rarr;</a>
                <a href="/posts/{{$post->id}}/edit"><button class="btn btn-default">edit post</button></a>
                </div>
            </div>
          </div>

        @endforeach

    @endif
</div>
@endsection