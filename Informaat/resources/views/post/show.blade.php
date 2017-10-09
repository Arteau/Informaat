@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card alert alert-info ">
        <div class="card-body">
        <h2 class="card-title">{{$post->title}}</h2>
        <p class="card-text">{{$post->body}}</p>
        </div>
        <div class="card-footer text-muted">
        Gepost: {{$post->created_at->diffForHumans()}} by
        {{$post->user->name}}
        </div>
    </div>
    
    
    <ul class="list-group">
        @foreach($post->comments as $comment)
        <li class="list-group-item">
        {{$comment->title}} <br>
        <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit">Edit</a>
        </li>
        @endforeach
    </ul>
    
</div>

@endsection