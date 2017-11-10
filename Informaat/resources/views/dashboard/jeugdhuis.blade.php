@extends('layouts.landing')

@section('content')
<br>

<div class="container container-margin">
<blockquote>Overzicht {{$jeugdhuis->name}}</blockquote>
<br>
@if(count($jeugdhuis->users) === 1)
  <i>{{count($jeugdhuis->users)}} Gebruiker voor {{$jeugdhuis->name}}</i>
@else
  <i>{{count($jeugdhuis->users)}} Gebruikers voor {{$jeugdhuis->name}}</i>
@endif
<table class="striped">
        <thead>
          <tr>
              <th>Naam</th>
              <th>Email</th>
              <th>posts</th>
              <th>Reacties</th>
              <th>Moderator</th>
              
          </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{count($user->posts)}}</td>
            <td>{{count($user->comments)}}</td>
            <td>
            @if($user->moderator)
            <i class="material-icons">check</i>
            @else
            <i class="material-icons">clear</i>
            @endif
            
            </td>
            
          </tr>
        @endforeach
        
        </tbody>
      </table>

    

</div>

@endsection