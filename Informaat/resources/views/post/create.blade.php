@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Maak post!</h4> 
        </div>
    </div>

    <form method="POST" action="/posts" id="post_form">

     {{ csrf_field() }}
     @include ('layouts.errors')
   
    <div class="input-field">
        <label for="title">Titel*</label>
        <input name="title" id="title" type="text" value="{{ old('title') }}" class="form-control">
    </div>

    <div class="input-field">
        <label for="body">Vraag of opmerking*</label>
        <input type="text" name="body" id="body" value="{{ old('body') }}" class="form-control">
    </div>


    <div class="input-field">
        <select id="topic" name="topic">
            <option disabled selected>Onderwerp*</option>
            <option>Onderwerp 1</option>
            <option>Onderwerp 2</option>
            <option>Onderwerp 3</option>
            <option>Onderwerp 4</option>
        </select>
    </div>

    <div class="input-field">
        <label for="tag1">Tag 1</label>
        <input type="text" name="tag1" id="tag1" value="{{ old('tag1') }}" class="form-control">
    </div>
    <div class="input-field">
        <label for="tag2">Tag 2</label>
        <input type="text" name="tag2" id="tag2" value="{{ old('tag2') }}" class="form-control">
    </div>
    <div class="input-field">
        <label for="tag3">Tag 3</label>
        <input type="text" name="tag3" id="tag3" value="{{ old('tag3') }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary" id="post_button_submit">Publish post</button>
    <a href="/posts"><div class="btn btn-danger">Back</div></a>
    </form>

</div>
@endsection