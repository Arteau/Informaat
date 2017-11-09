@extends('layouts.landing')

@if($post->user_id == Auth::user()->id || Auth::user()->isAdmin || (Auth::user()->moderator && Auth::user()->jeugdhuis == $post->user->jeugdhuis))

@section('content')
<div class="container" style="margin-top:50px; margin-bottom:50px;">

    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit post!</h4> 
        </div>
    </div>

    <form method="POST" action="/posts/{{$post->id}}/update">

     {{ csrf_field() }}
     {{ method_field('PATCH') }}
   
    <div class="input-field">
        <label for="title">Titel</label>
        <input name="title" id="title" type="text" value="{{$post->title}}" >
    </div>

    <div class="input-field">
        <label for="body">Vraag of opmerking</label>
        <input type="text" name="body" id="body" value="{{ $post->body }}" >
    </div>

    <div class="input-field">
        <select id="topic" name="topic">
            <option disabled selected>Onderwerp</option>

            <option value="sociaal" @if($post->topic == "sociaal") selected @endif >
            Sociaal</option>
            <option value="techniek" @if($post->topic == "techniek") selected @endif>
             Techniek</option>
            <option value="muziek" @if($post->topic == "muziek") selected @endif>
            Muziek</option>
            
        </select>
                @if ($errors->has('titel'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titel') }}</strong>
                    </span>
                @endif
    </div>

    <div class="input-field">
        <label for="tag1">Tag 1</label>
        <input type="text" name="tag1" id="tag1" value="{{ $post->tag1 }}">
    </div>
    <div class="input-field">
        <label for="tag2">Tag 2</label>
        <input type="text" name="tag2" id="tag2" value="{{ $post->tag2 }}">
    </div>
    <div class="input-field">
        <label for="tag3">Tag 3</label>
        <input type="text" name="tag3" id="tag3" value="{{ $post->tag3 }}">
    </div>

    <button type="submit" class="btn btn-primary">Aanpassen</button>
    <a href="/posts"><div class="btn btn-danger">Terug</div></a>
    <a class="waves-effect waves-light btn modal-trigger" href="#modal_delete">Verwijderen</a>
    </form>

    

    <div id="modal_delete" class="modal">
        <div class="modal-content">
            <h4>Verwijderen</h4>
            <p>Ben je zeker dat je deze post wil verwijderen</p>
            
            <ul>
            <li><small>Hieronder vallen ook:</small></li>
            <li>Alle reacties op deze post.</li>
            <li>...</li>
            </ul>
        </div>
        <div class="modal-footer">
            
            <form action="/posts/{{ $post->id }}/delete" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <button type="submit" class="modal-action waves-effect waves-green btn-flat">Yes</button>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
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