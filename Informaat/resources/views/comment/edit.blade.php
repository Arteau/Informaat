@extends('layouts.landing')

@if($comment->user_id == Auth::user()->id)

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
   
    <div class="input-field">
        <label for="title">Titel</label>
        <input name="title" id="title" value="{{$comment->title}}" type="text">
    </div>

    <div class="input-field">
        <label for="body">Commentaar</label>
        <input type="text" name="body" id="body" value="{{ $comment->body }}" >
    </div>


    <button type="submit" class="btn btn-primary">Edit post</button>
    <a href="/posts/{{$post->id}}"><div class="btn btn-danger">Back</div></a>
    <a class="waves-effect waves-light btn modal-trigger" href="#modal_delete_comment">Delete</a>
    </form>

    <div id="modal_delete_comment" class="modal">
        <div class="modal-content">
            <h4>Delete</h4>
            <p>Are you sure?</p>
            
        </div>
        <div class="modal-footer">
            
        <form action="/posts/{{ $post->id }}/comment/{{ $comment->id }}/delete" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
            <button type="submit" class="modal-action waves-effect waves-green btn-flat" >Ja</button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Nee</a>

        </form>
        
        </div>
    </div>

</div>
@endsection

@else 
@section('content')
<h1>Geen toegang</h1>
@endsection

@endif