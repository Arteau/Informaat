@extends('layouts.landing')

@section('content')

<div class="container" style="margin-top:50px">
  <div class="row">
  <h5>Overzicht jeugdhuizen</h5>
  
    <ul class="collapsible popout" data-collapsible="accordion" style="margin-top:50px">
    @foreach($jeugdhuizen as $jeugdhuis)
        <li>
          <div class="collapsible-header"><i class="material-icons">home</i>{{$jeugdhuis->name }}</div>
          <div class="collapsible-body"><span>{{$jeugdhuis->zipcode}} {{$jeugdhuis->village}}  </span>
          <ul>
            @foreach($jeugdhuis->users as $user)
            <li>{{$user->name}}</li>
            @endforeach
            
          </ul>
            <a href="/jeugdhuizen/{{$jeugdhuis->id}}/edit"><i class="material-icons">create</i></a>
          </div>
         
        </li>
    @endforeach
    </ul>
    <a href="/jeugdhuizen/create"><span class="btn-block btn btn-primary"> Jeugdhuis Toevoegen</span></a>
 

  </div>
</div>



@endsection