@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit post!</h4> 
        </div>
    </div>

    <form method="POST" action="/posts/{{$post->id}}/update">

     {{ csrf_field() }}
     {{ method_field('PATCH') }}
     @include ('layouts.errors')
   
    <div class="form-horizontal form-material">
        <label for="title">Titel</label>
        <input name="title" id="title" value="{{$post->title}}" class="form-control">
    </div>

    <div class="form-group">
        <label for="body">Vraag of opmerking</label>
        <input type="text" name="body" id="body" value="{{ $post->body }}" class="form-control">
    </div>

    <div class="form-group{{ $errors->has('topic') ? ' has-error' : '' }}">
        <label for="topic">Onderwerp</label>
        <select class="form-control" id="topic" name="topic">
            <option @if($post->topic == "Onderwerp 1") selected @endif >
            Onderwerp 1</option>
            <option @if($post->topic == "Onderwerp 2") selected @endif>
            Onderwerp 2</option>
            <option @if($post->topic == "Onderwerp 3") selected @endif>
            Onderwerp 3</option>
            <option @if($post->topic == "Onderwerp 4") selected @endif>
            Onderwerp 4</option>
        </select>
                @if ($errors->has('titel'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titel') }}</strong>
                    </span>
                @endif
    </div>

    <div class="form-group">
        <label for="tag1">Tag 1</label>
        <input type="text" name="tag1" id="tag1" value="{{ $post->tag1 }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="tag2">Tag 2</label>
        <input type="text" name="tag2" id="tag2" value="{{ $post->tag2 }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="tag3">Tag 3</label>
        <input type="text" name="tag3" id="tag3" value="{{ $post->tag3 }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Edit post</button>
    <a href="/posts"><div class="btn btn-danger">Back</div></a>
    </form>
    <form action="/posts/{{ $post->id }}/delete" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>

</div>
@endsection