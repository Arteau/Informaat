@extends('layouts.landing')

@section('content')
<div class="container container-margin">

    <h5>Gebruiker aanpassen</h5>

    <form method="POST" action="/user/{{$user->id}}/update">

     {{ csrf_field() }}
     {{ method_field('PATCH') }}
   
     <div class="input-field">
     <label for="name">Naam</label> 
     <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
 </div>

 <div class="input-field">
    
        

         <select id="jeugdhuis_id" type="text" class="input-field" name="jeugdhuis_id">
         @if($user->jeugdhuis_id)
         <option value="{{$user->jeugdhuis->id}}">{{$user->jeugdhuis->name}}</option>
            @foreach($jeugdhuizen as $jeugdhuis) 
                 <option value="{{$jeugdhuis->id}}">{{$jeugdhuis->name}}</option>
             @endforeach
         @else
             @foreach($jeugdhuizen as $jeugdhuis) 
                 <option value="{{$jeugdhuis->id}}">{{$jeugdhuis->name}}</option>
             @endforeach
        @endif
         </select>

     
 </div>

 <div class="input-field">
     <label for="email" >E-Mail Adres</label>

    
         <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

         
     
 </div>

 
 <!-- <label for="moderator">Moderator</label> -->

    @if($user->moderator)
    <p>
      <input type="checkbox" id="moderator" name="moderator" checked value="1" />
      <label for="moderator">Moderator</label>

    </p>
    @else

    <p>
      <input type="checkbox" id="moderator" name="moderator" value="0" />
      <label for="moderator">Moderator</label>

    </p>

    @endif



    <button type="submit" class="btn btn-primary">Aanpassen</button>
    <a href="/jeugdhuizen/"><div class="btn btn-danger">Terug</div></a>
    <a class="waves-effect waves-light btn modal-trigger" href="#modal_delete_jeugdhuis">Verwijderen</a>
    </form>

    <div id="modal_delete_jeugdhuis" class="modal">
        <div class="modal-content">
            <h4>Verwijderen</h4>
            <p>Ben je zeker dat je deze gebruiker wil verwijderen</p>
            
            <ul>
            <li><small>Hieronder vallen ook:</small></li>
            <li>Alle posts van deze gebruiker</li>
            <li>Alle reacties van deze gebruiker</li>
            <li>...</li>
            </ul>

        </div>
        <div class="modal-footer">
            
        <form action="/user/{{ $user->id }}/delete" method="POST">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
            <button type="submit" class="modal-action waves-effect waves-green btn-flat" >Ja</button>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Nee</a>

        </form>
        
        </div>
    </div>

</div>
@endsection