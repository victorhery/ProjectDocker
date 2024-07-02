<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste eleve</title>
    <link rel="stylesheet" type="text/css" href="{{asset('login.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('js/controle_champ.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
</head>
<body>
    @include('navbar_auth')
    <div class="container" id="corps2">
        <div class="row">
            <div class="col s12">
                <center><h1>Modifier année scolaire</h1></center>
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
                
                <form action="/etudiant_anne_update/traitement" method="POST">
                @csrf
                <input type="text"  value="{{ $Annee_scolaire->id }}" name="id" style="display:none;">
                    <div class="mb-3">
                        <label for="IM" class="form-label">Annéscolaire</label>
                        <input type="text" class="form-control" value="{{ $Annee_scolaire->Annee }}" placeholder="Saisir l'annéescolaire" name="Annee">
                    </div>
                    <center><button type="submit" class="btn btn-primary">MODIFIER</button></center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>