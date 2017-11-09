@extends('layouts.landing')

@section('content')

<div class="container" style="margin-top:50px">
  <div class="row">
  <blockquote>Overzicht jeugdhuizen</blockquote>
  
    <ul class="collapsible popout" data-collapsible="accordion" style="margin-top:50px">
    @foreach($jeugdhuizen as $jeugdhuis)
        <li>
          <div class="collapsible-header"><i class="material-icons">home</i>{{$jeugdhuis->name }}</div>
          <div class="collapsible-body"><span>{{$jeugdhuis->zipcode}} {{$jeugdhuis->village}}  </span>
          <hr>
          <small><b>Leden van jeugdhuis:</b></small>
          <div class="row">
            <div class="col s5">
            <b>Naam:</b>
            </div>
            <div class="col s4">
            <b>Email:</b> 
            </div>
            <div class="col s3"> 
            <b>Moderator:</b>
            </div>
            
          </div>
          @foreach($jeugdhuis->users as $user)
          
          <div class="row">
            <div class="col s5">              
              <span class="truncate">{{$user->name}}</span>          
            </div>
            <div class="col s5">              
              <span class="truncate">{{$user->email}}</span>          
            </div>
            <div class="col s1"> 
            @if($user->moderator)
            <i class="material-icons">check</i>
            @else
            <i class="material-icons">clear</i>
            @endif
            </div>
            <div class="col s1">              
            <a href="/user/{{$user->id}}/edit">
              <i class="material-icons">edit</i>
            </a>     
            </div>
            
            
          </div>
         
          @endforeach

          <a href="/jeugdhuizen/{{$jeugdhuis->id}}/edit"><div class="btn btn-primary btn-block">Jeugdhuis aanpassen</div></a>


          </div>
         
        </li>
    @endforeach
    </ul>
    <a href="/jeugdhuizen/create"><span class="btn-block btn btn-primary"> Jeugdhuis Toevoegen</span></a>
 

  </div>
</div>



@endsection