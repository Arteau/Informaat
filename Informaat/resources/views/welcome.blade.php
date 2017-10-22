@extends('layouts.app')

@section('content')



    <div class="parallax-container">
        <div class="parallax container" style="z-index:2">
            
            <div class="row valign-wrapper" style="margin-top:10%">
                
                <img src="{{asset('img/logo.png')}}" class="paralax-normalize center-align" alt="" style="height:100px; left:0; margin:0 auto">

            </div>
            <div class="row valign-wrapper">
                <div class="col s12 m8 offset-m2">
                    <form role="search" class="app-search" action="/posts/search" method="POST">
                        <span style="position:relative">
                            {{ csrf_field() }}

                            @include ('layouts.errors')
                            <input type="text" name="keyword" id="keyword" placeholder="Zoek hier u onderwerp" class="z-depth-3" style="width:100%; background-color:white; border-radius:10px; padding:10px 30px;box-shadow: 2px 2px 11px rgba(0, 0, 0, 0.5)">
                            <a href=""><i class="fa fa-search" style="position: absolute;top: 0;left: 5px"></i></a>

                        </span>
                    </form>
                </div>
            </div>

            <div class="row valign-wrapper">
            
                <h5 class="center-align" style="margin:0 auto;color:white;">Informaat</h5>

            </div>
            
        </div>
        <div class="parallax" style="background-color:white;opacity:0.4; z-index:1"></div>
        <div class="parallax"><img src="{{asset('img/paralax.jpg')}}"></div>

    </div>
    <div class="container">
        <div class="row" style="height:2000px">
             <h2 class="header">Informaat</h2>
             <p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
        </div>
    </div>
  

    
  


 


@endsection