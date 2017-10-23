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
    <br>
    <div class="container scrollspy" id="landing_wrapper" style="height:1000px">
        <div class="row">
            <div class="col s4 z-depth-2" style="background-color:white;">
                <div class="center promo promo-example">
                    <i class="material-icons" style="margin: 40px 0;color: #ee6e73;font-size: 7rem;display: block;">flash_on</i>
                    <p class="promo-caption" style="font-size: 1.7rem;font-weight: 500;margin-top: 5px;margin-bottom: 0;">Versnelt ontwikkeling</p>
                    <p class="light center">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components.</p>
                </div>
            </div>
            <div class="col s4 z-depth-2" style="background-color:white;">
                <div class="center promo promo-example">
                    <i class="material-icons" style="margin: 40px 0;color: #ee6e73;font-size: 7rem;display: block;">group</i>
                    <p class="promo-caption" style="font-size: 1.7rem;font-weight: 500;margin-top: 5px;margin-bottom: 0;">Gericht op de gebruikerservaring</p>
                    <p class="light center">By utilizing elements and principles of Material Design, we were able to create a framework that focuses on User Experience.</p>
                </div>
            </div>
            <div class="col s4 z-depth-2" style="background-color:white;">
                <div class="center promo promo-example">
                    <i class="material-icons" style="margin: 40px 0;color: #ee6e73;font-size: 7rem;display: block;">settings</i>
                    <p class="promo-caption" style="font-size: 1.7rem;font-weight: 500;margin-top: 5px;margin-bottom: 0;">Makkelijk om mee te werken</p>
                    <p class="light center">We have provided detailed documentation as well as specific code examples to help new users get started.</p>
                </div>
            </div>
        </div>
    </div>
  

    
  


 


@endsection