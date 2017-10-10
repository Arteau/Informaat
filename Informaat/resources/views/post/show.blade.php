@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
    <div class="card alert alert-info ">
        <div class="card-body">

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
        <p class="card-text">{{$post->body}}</p>
        </div>
        <div class="card-footer text-muted">
        Gepost: {{$post->created_at->diffForHumans()}} by
        {{$post->user->name}}
        <a href="/posts/{{$post->id}}/edit"><button class="btn btn-default">edit post</button></a>

        </div>
    </div>
    
    
    <ul class="list-group">
        @foreach($post->comments as $comment)
        <li class="list-group-item">
            {{ ($comment->countUpVoters()) - ($comment->countDownVoters()) }}
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
            <b>{{$comment->title}}</b> <br>
            <i>{{$comment->body}} </i><hr>
            <small> Gepost: {{$comment->created_at->diffForHumans()}} by
            {{$comment->user->name}}</small>
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit">Edit</a>
        </li>
        @endforeach
    </ul>
    <hr>
    <h4>Commentaar toevoegen</h4>
    <form action="/posts/{{ $post->id }}/comment/store" method="POST">
            {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="body">Commentaar</label>
            <input type="text" name="body" id="body" value="{{ old('body') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Publish comment</button>
        <a href="/posts"><div class="btn btn-danger">Back</div></a>
   
    </form>
    
</div>

@endsection