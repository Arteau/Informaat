@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Comment!</h4> 
        </div>
    </div>

    <form method="POST" action="/posts/{{$post->id}}/comment/{{$comment->id}}/update">

     {{ csrf_field() }}
     {{ method_field('PATCH') }}
     @include ('layouts.errors')
   
    <div class="form-horizontal form-material">
        <label for="title">Titel</label>
        <input name="title" id="title" value="{{$comment->title}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="body">Commentaar</label>
        <input type="text" name="body" id="body" value="{{ $comment->body }}" class="form-control">
    </div>


    <button type="submit" class="btn btn-primary">Edit post</button>
    <a href="/posts/{{$post->id}}"><div class="btn btn-danger">Back</div></a>
    </form>

    <form action="/posts/{{ $post->id }}/comment/{{ $comment->id }}/delete" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    

</div>
@endsection