@extends('layouts.landing')

@section('content')
<br>
<div class="container" style="margin-top:50px">


<table class="striped">
        <thead>
          <tr>
              <th>Alle gebruikers voor {{$jeugdhuis->name}}</th>
          </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            
          </tr>
        @endforeach
        </tbody>
      </table>

    

</div>

@endsection