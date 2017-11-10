<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Informaat</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

</head>
<body>
    <div id="app" >
        <div class="parallax-container" style="min-height:100vh; z-index:0">
                <div class="parallax container" style="z-index:2">
                    
                    <div class="row valign-wrapper" style="margin-top:10%">
                        
                        <img src="{{asset('img/logo.png')}}" class="paralax-normalize center-align" alt="" style="height:100px; left:-25px; margin:0 auto">
                    
                    </div>
                    <div class="row valign-wrapper">

                    <h1 class="center-align"style="margin:0 auto">Oeps, pagina niet gevonden. </h1>
                    

                    </div>

                </div>
                <div class="parallax" style="background-color:white;opacity:0.4; z-index:1"></div>
                <div class="parallax"><img src="{{asset('img/paralax.jpg')}}"></div>

        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


    <script src="{{ asset('js/index.js') }}"></script>

    
    
  

</body>
</html>
