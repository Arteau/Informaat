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
        <b>{{$comment->title}}</b> <br>
        <i>{{$comment->body}} </i><hr>
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

        <button type="submit" class="btn btn-primary">Publish post</button>
        <a href="/posts"><div class="btn btn-danger">Back</div></a>
   
    </form>
    
</div>

@endsection