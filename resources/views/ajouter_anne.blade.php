<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un annéescolaire</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('js/controle_champ.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
</head>
<body>
    @include('navbar_auth')
    <div class="container" id="corps2">
        <div class="row">
            <div class="col s12">
                <center><h1>Ajouter un année scolaire</h1></center>
                <hr>
                <!-- afficher la message de succes -->
                @if (session('status'))
                    <div class="alert alert-success">
                        <center>
                            {{ session('status') }}
                        </center>
                    </div>
                @endif

                <ul>
                    <!-- message d'eureur -->
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger"> {{ $error }} </li>
                    @endforeach
                </ul>
                
                <form action="/ajouter_anne/traitement" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="IM" class="form-label">Année scolaire</label>
                        <input type="text" class="form-control" id="" placeholder="Saisir l'annéescolaire" name="Annee">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="Nom" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter nom" name="Nom_elev"  onkeyup="controlnom(this)">
                    </div> --}}
                    
                    <center><button type="submit" class="btn btn-primary">AJOUTER</button></center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>