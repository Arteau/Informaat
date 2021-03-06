@extends('layouts.landing')


@section('content')
<div class="container container-margin">
    <div class="row bg-title">
        <div class="col-xs-12">
            <blockquote>Reactie aanpassen</blockquote> 
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


    <button type="submit" class="btn btn-primary">Reactie aanpassen</button>
    <a href="/posts/{{$post->id}}"><div class="btn btn-danger">Terug</div></a>
    <a class="waves-effect waves-light btn modal-trigger" href="#modal_delete_comment">Verwijderen</a>
    </form>

    <div id="modal_delete_comment" class="modal">
        <div class="modal-content">
            <h4>Verwijderen</h4>
            <p>Ben je zeker?</p>
            
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

