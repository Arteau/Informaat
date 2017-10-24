@extends('layouts.landing')

@section('content')
<br>
<div class="container">
@if(!Auth::user()->isAdmin)

    @foreach($users as $user)
    <ul>

    <li>{{$user->name}}</li>

    </ul>
    @endforeach
@endif
</div>

@endsection