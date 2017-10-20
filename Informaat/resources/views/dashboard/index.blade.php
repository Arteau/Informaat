@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-xs-12" style="border-bottom:2px solid #808080">
            <p class="">{{$user->name}} / Jeugdhuis Zoezel </p>
        </div>
    </div>

    <br>
    
    <div class="row">
        <a href="#">
            <div class="col-xs-6" style="background-color:rgb(173, 173, 173); border:1px solid black">
                <p class="text-center" style="color:white; margin:14px;">Posts</p>
            </div>
        </a>
        <a href="#">
            <div class="col-xs-6" style="background-color:#c3c3c5; border:1px solid black">
                <p class="text-center" style="color:white; margin:14px;">Comments</p>
            </div>
        </a>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12" style="border-bottom:2px solid #808080">
            <p class="">Favoriete posts </p>
        </div>
    </div>
   

    @foreach($favorite_posts as $favorite)

    <div class="row" style="margin-bottom:5px;">
        <div class="col-xs-1" style="border:1px solid black">
            <p class="">{{$favorite->post->votes}} </p>
        </div>
        <div class="col-xs-2" style="border:1px solid black">
        <p>{{$favorite->post->title}}</p>
        </div>
        <div class="col-xs-7" style="border:1px solid black">
            <p>{{$favorite->post->body}}</p>
            
        </div>
        <div class="col-xs-2" style="border:1px solid black">
            <p>Gepost door: {{$favorite->post->user->name}}</p>
        </div>
    </div>

   
    @endforeach
    
    <br>

    <div class="row">
        <div class="col-xs-12" style="border-bottom:2px solid #808080">
            <p class="">Posts van 10/10/2017 </p>
        </div>
    </div>
    <br>
    @foreach($user_posts as $post)

    <div class="row" style="margin-bottom:5px;">
        <div class="col-xs-1" style="border:1px solid black">
            <p class="">{{$post->votes}} </p>
        </div>
        <div class="col-xs-2" style="border:1px solid black">
            <p>{{$post->title}}</p>
        </div>
        <div class="col-xs-7" style="border:1px solid black">
            <p>{{$post->body}}</p>
            
        </div>
        <div class="col-xs-2" style="border:1px solid black">
            <p>Gepost door: {{$post->user->name}}</p>
        </div>
    </div>
    @endforeach
    

    <br>



</div>



@endsection