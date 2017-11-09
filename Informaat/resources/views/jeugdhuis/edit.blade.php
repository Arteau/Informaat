@extends('layouts.landing')

@section('content')
<div class="container" style="margin-top:50px">

    <h5>Jeugdhuis toevoegen</h5>

    <form method="POST" action="/jeugdhuizen/{{$jeugdhuis->id}}/update">

     {{ csrf_field() }}
     {{ method_field('PATCH') }}
   
    <div class="input-field">
        <label for="name">Naam</label>
        <input name="name" id="name" value="{{$jeugdhuis->name}}" type="text">
    </div>

    <div class="input-field">
        <label for="village">Stad</label>
        <input type="text" name="village" id="village" value="{{ $jeugdhuis->village }}" >
    </div>

    <div class="input-field">
        <label for="zipcode">Postcode</label>
        <input type="text" name="zipcode" id="zipcode" value="{{ $jeugdhuis->zipcode }}" >
    </div>


    <button type="submit" class="btn btn-primary">Edit jeugdhuis</button>
    <a href="/jeugdhuizen/"><div class="btn btn-danger">Back</div></a>
    <a class="waves-effect waves-light btn modal-trigger" href="#modal_delete_jeugdhuis">Delete</a>
    </form>

    <div id="modal_delete_jeugdhuis" class="modal">
        <div class="modal-content">
            <h4>Verwijderen</h4>
            <p>Ben je zeker dat je dit jeugdhuis wil verwijderen</p>
            
            <ul>
            <li><small>Hieronder vallen ook:</small></li>
            <li>Alle gebruikers van het jeugdhuis</li>
            <li>Alle posts van alle gebruikers van het jeugdhuis</li>
            <li>Alle comments van alle gebruikers van het jeugdhuis</li>
            <li>...</li>
            </ul>

        </div>
        <div class="modal-footer">
            
        <form action="/jeugdhuizen/{{ $jeugdhuis->id }}/delete" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
            <button type="submit" class="modal-action waves-effect waves-green btn-flat" >Ja</button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Nee</a>

        </form>
        
        </div>
    </div>

</div>
@endsection