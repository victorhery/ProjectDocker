<!DOCTYPE html>

<html lang="en">

    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
        <script src="{{asset('bootstrap/js//popper.min.js')}}"></script>
        <script src="{{asset('bootstrap/js//bootstrap.min.js')}}"></script>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" title='Acceuil' href="/Acceuil"><img src="{{ asset('icon/acceuil.ico') }}" alt=""></a>
          
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">CEG</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login_lycee">LYCEE</a>
                    </li>
                        
                </ul>
              
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <img src="{{ asset('icon/plus.GIF') }}" alt=""> --}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/register">S'inscrir</a>
                        <a class="dropdown-item" href="/annescolaire">Annescolaire</a>
                      <div class="dropdown-divider"></div>
                      <form action="{{route('exporter_BD')}}" method="GET">
                        @csrf
                        <input type="submit" value="Exporter" class="dropdown-item">
                      </form>
                      
                    </div>
                </div>
                <canvas id="myCanvas" width="60" height="5" style="border:0px solid #000000;"></canvas>
                <span id="logo"><img src="images/5.jpg" style="width:60px;"/></span>
            </div>
        </nav>
        <br>
    </body>
</html>

