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
            <nav class="nav_landing" style="">
                <div class="nav-wrapper">
                <a href="#" data-activates="mobile-demo" class="button-collapse" style="display:block"><i class="material-icons" style="color:black">menu</i></a>
               
                <ul class="side-nav" id="mobile-demo">
                <li style="height:55px"> <a href="/" class="brand-logo"><img src="{{asset('img/logo.png')}}" style="height:45px" alt=""></a></li>
                        @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        
                    @elseif (Auth::user()->isAdmin)
                        <li><a href="/jeugdhuizen">Jeugdhuizen</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="/posts">Posts</a></li>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>

                    @else
                        
                        <li><a href="/posts">Posts</a></li>
                        <li><a href="/dashboard">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
                </div>
            </nav>
            <div class="body-wrapper">
        @yield('content')
            </div>      
        <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">INFORMAAT</h5>
                <p class="grey-text text-lighten-4">Informaat is een online platform van Formaat vzw.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Nuttige links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Formaat website</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Wetgeving vzw</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Belangrijke data</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Nieuwsbrief</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Formaat
            <a class="grey-text text-lighten-4 right" href="#!"></a>
            </div>
          </div>
        </footer>
    </div>

    <!-- Scripts -->
   

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


    <script src="{{ asset('js/index.js') }}"></script>

    


</body>
</html>



