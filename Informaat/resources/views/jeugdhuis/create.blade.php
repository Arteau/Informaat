@extends('layouts.landing')

@section('content')
<div class="container">

<form action="/jeugdhuizen" method="POST">
            {{ csrf_field() }}
            @include ('layouts.errors')
            
        <div class="input-field">
            <label for="name">Naam</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
        </div>

        <div class="input-field">
            <label for="village">Stad</label>
            <input type="text" name="village" id="village" value="{{ old('village') }}" class="form-control">
        </div>

        <div class="input-field">
            <label for="zipcode">Postcode</label>
            <input type="number" name="zipcode" id="zipcode" value="{{ old('zipcode') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Publish comment</button>
        <a href="/jeugdhuizen"><div class="btn btn-danger">Back</div></a>

    </form>

</div>


@endsection