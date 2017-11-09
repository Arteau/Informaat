@extends('layouts.landing')

@section('content')
<div class="container" style="margin-top:50px">

    <h5>Gebruiker aanpassen</h5>

    <form method="POST" action="/user/{{$user->id}}/update">

     {{ csrf_field() }}
     {{ method_field('PATCH') }}
   
     <div class="input-field">
     <label for="name">Name</label> 
     <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
 </div>

 <div class="input-field">
    
     
         <select id="jeugdhuis_id" type="text" class="input-field" name="jeugdhuis_id">
             @foreach($jeugdhuizen as $jeugdhuis) 
                 <option value="{{$jeugdhuis->id}}">{{$jeugdhuis->name}}</option>
             @endforeach
         </select>

     
 </div>

 <div class="input-field">
     <label for="email" >E-Mail Address</label>

    
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



    <button type="submit" class="btn btn-primary">Edit user</button>
    <a href="/jeugdhuizen/"><div class="btn btn-danger">Back</div></a>
    <a class="waves-effect waves-light btn modal-trigger" href="#modal_delete_jeugdhuis">Delete</a>
    </form>

    <div id="modal_delete_jeugdhuis" class="modal">
        <div class="modal-content">
            <h4>Delete</h4>
            <p>Ben je zeker dat je deze gebruiker wil verwijderen</p>
            
            <ul>
            <li><small>Hieronder vallen ook:</small></li>
            <li>Alle posts van deze gebruiker</li>
            <li>Alle comments van deze gebruiker</li>
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