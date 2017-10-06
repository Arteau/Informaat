@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card ">
        <div class="card-body">
        <h2 class="card-title">{{$post->title}}</h2>
        <p class="card-text">{{$post->body}}</p>
        </div>
        <div class="card-footer text-muted">
        Gepost: {{$post->created_at->diffForHumans()}} by
        {{$post->user->name}}
        </div>
    </div>

    @foreach($post->comments as $comment)
    <p>{{$comment->title}}</p>
    @endforeach
</div>

@endsection