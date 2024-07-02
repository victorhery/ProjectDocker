<!DOCTYPE html>

<html lang="en">

    <head>
        <title>navbar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}"> --}}
        <!-- <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>  -->
        <script src="{{asset('bootstrap/js//popper.min.js')}}"></script>
        <script src="{{asset('bootstrap/js//bootstrap.min.js')}}"></script>
        <style>
            
            #logo{
                padding-left: 20px;
            }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" title='Acceuil' href="/home_lycee"><img src="{{ asset('icon/acceuil.ico') }}" alt=""></a>
          
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/inscription"> Inscription </a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="/liste_lycee"> Notes </a>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="/deliberation_lycee"> Deliberation </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Resultats_lycee"> Résultat </a>
                    </li>
                </ul>
              
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <img src="{{ asset('icon/plus.GIF') }}" alt=""> --}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class='dropdown-item' href="/matiere_lycee">Ajouter matières</a> -->
                        <a class="dropdown-item" href="/liste_matiere_lycee">Listes matieres </a>
                        <a class="dropdown-item" href="#"><img src="../icon/parametre1.png" alt=""> Parametre</a>
                      <!-- <a class="dropdown-item" href="#">Another action</a> -->
                      <div class="dropdown-divider"></div>
                      <!-- <a class="" href="#">Something else here</a> -->
                      <form action="{{route('logout')}}" method="POST" class="d-flex" id="d-flex" role="search">
                        @csrf
                        @method('DELETE')
                        <button class='btn btn-primary dropdown-item' type='submit'>Déconnexion</button>
                    </form>
                    </div>
                </div>
                <canvas id="myCanvas" width="60" height="5" style="border:0px solid #000000;"></canvas>
                <span id="logo"><img src="../images/5.jpg" style="width:60px;"/></span>
            </div>
        </nav>
        <br>
    </body>
</html>

​

