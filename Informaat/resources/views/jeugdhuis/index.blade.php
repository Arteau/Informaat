@extends('layouts.landing')

@section('content')

<div class="container">
  <div class="row">
  
    <ul class="collapsible popout" data-collapsible="accordion" style="margin-top:50px">
    @foreach($jeugdhuizen as $jeugdhuis)
        <li>
          <div class="collapsible-header"><i class="material-icons">home</i>{{$jeugdhuis->name }}</div>
          <div class="collapsible-body"><span>{{$jeugdhuis->zipcode}} {{$jeugdhuis->village}}  </span>
            <a href="/jeugdhuizen/{{$jeugdhuis->id}}/edit"><i class="material-icons">create</i></a>
          </div>
         
        </li>
    @endforeach
    </ul>
 

  </div>
</div>



@endsection