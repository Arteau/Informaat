@extends('layouts.landing')

@section('content')
<br>
<div class="container" style="margin-top:50px">

<b>{{count($jeugdhuis->users)}} gebruikers voor {{$jeugdhuis->name}}</b>
<table class="striped">
        <thead>
          <tr>
              <th>Naam</th>
              <th>Email</th>
              <th>Aantal posts</th>
              <th>Aantal comments</th>
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
        <tr> <td></td></tr>
        
        </tbody>
      </table>

    

</div>

@endsection