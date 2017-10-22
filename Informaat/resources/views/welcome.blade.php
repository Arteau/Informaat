@extends('layouts.landing')

@section('content')



    <div class="parallax-container" style="min-height:100vh; z-index:0">
        <div class="parallax container" style="z-index:2">
            
            <div class="row valign-wrapper" style="margin-top:10%">
                
                <img src="{{asset('img/logo.png')}}" class="paralax-normalize center-align" alt="" style="height:100px; left:0; margin:0 auto">

            </div>
            <div class="row valign-wrapper">
                <div class="col s10 offset-s1 m8 offset-m2">
                    <form role="search" class="app-search" action="/posts/search" method="POST">
                        <span style="position:relative">
                            {{ csrf_field() }}

                            @include ('layouts.errors')
                            <input type="text" name="keyword" id="keyword" placeholder="Zoek hier u onderwerp" class="z-depth-3" style="width:100%; background-color:rgba(255, 255, 255, 0.8); border-radius:10px;margin: -5px -30px; padding:5px 30px;box-shadow: 2px 2px 11px rgba(0, 0, 0, 0.5)">
                            <a href=""><i class="fa fa-search" style="position: absolute;top: 0;left: -20px"></i></a>

                        </span>
                    </form>
                </div>
            </div>

            <div class="row valign-wrapper">
            
                <h5 class="center-align" style="margin:0 auto;color:white;">Informaat</h5>

            </div>
            <div class="row valign-wrapper" style="position: absolute; bottom: 0px; left: -25px; margin: 0px auto; width: 100%;">

                <a href="#landing_wrapper"><img class="paralax-normalize" style="height:50px; position:absolute !important" src="{{asset('img/arrowdown.gif')}}" alt=""></a>

            </div>
            
        </div>
        <div class="parallax" style="background-color:white;opacity:0.4; z-index:1"></div>
        <div class="parallax"><img src="{{asset('img/paralax.jpg')}}"></div>

    </div>
    <div class="container scrollspy" id="landing_wrapper">
        <div class="row" style="height:2000px">

            <br>


            <div class="col s4">
                <!-- Promo Content 1 goes here -->
                <p class="center-align">deeeeel</p>
            </div>
            <div class="col s4">
                <!-- Promo Content 2 goes here -->
                <p class="center-align">deeeeel</p>
            </div>
            <div class="col s4">
                <!-- Promo Content 3 goes here -->
                <p class="center-align">deeeeel</p>
            </div>


        </div>
    </div>
  

    
  


 


@endsection