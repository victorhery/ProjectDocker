<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier élève CEG</title>
    <!-- <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}"> -->
    
    <link rel="stylesheet" type="text/css" href="{{asset('login.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('js/controle_champ.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
</head>
<body>
@include('navbar')
    <div class="container" id="corps2">
        <div class="row">
            <div class="col s12">
                <center><h1>Modifier l'information de : {{ $etudiants->Nom_elev }} {{ $etudiants->Prenom_eleve }}</h1></center>
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
                
                <form action="/etudiant_ceg_update/traitement" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="code_Nom_ecol" class="form-label">Nom école:</label>
                    <select name="code_Nom_ecol" class="form-control" id="">
                        @foreach ($valeure as $valeure)
                            <option value="{{ $valeure->code_Nom_ecol }}">{{ $valeure->Nom_ecol }}</option>
                        @endforeach
                    </select>
                    <!-- <select name="code_Nom_ecol" id="" class="form-control">
                        <option value="{{ $etudiants->code_Nom_ecol }}">@foreach ($nom_ecoles_ceg as $nom_ecoles_ceg){{ $nom_ecoles_ceg->Nom_ecol}} @endforeach</option>
                        @foreach ($code_ecoles_ceg as $ecoles_ceg)
                            <option value="{{ $ecoles_ceg->code_Nom_ecol }}">{{ $ecoles_ceg->Nom_ecol }}</option>
                        @endforeach
                    </select> -->
                </div>
                <input type="text"  value="{{ $etudiants->id }}" name="id" style="display:none;">
                    <div class="mb-3">
                        <label for="IM" class="form-label">IM:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter numero matricol" value="{{ $etudiants->IM }}" name="IM">
                    </div>
                    <div class="mb-3">
                        <label for="Nom" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter nom" value="{{ $etudiants->Nom_elev }}" name="Nom_elev">
                    </div>
                    <div class="mb-3">
                        <label for="Prenom" class="form-label">Prenom:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter prenom" value="{{ $etudiants->Prenom_eleve }}" name="Prenom_eleve">
                    </div>
                    <div class="mb-3">
                        <label for="Annee_scolaire" class="form-label">ANNEE SCOLLAIRE : </label>
                        <select name="Annee_scolaire" class="form-control" id="">
                            <option value="{{ $etudiants->Annee_scolaire }}">{{ $etudiants->Annee_scolaire }}</option>
                            @foreach ($annee_scolaire as $Annee)
                            <option value="{{ $Annee }}">{{ $Annee }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Classe" class="form-label">Classe:</label>
                        <select name="Cycle" class="form-control" id="">
                            <option value="{{ $etudiants->Cycle }}"><span>{{ $etudiants->Cycle }}</span></option>
                            <option value="6eme"><span>6<sup>eme</sup></span></option>
                            <option value="5eme"><span>5<sup>eme</sup></span></option>
                            <option value="4eme"><span>4<sup>eme</sup></span></option>
                            <option value="3eme"><span>3<sup>eme</sup></span></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Date_naissance" class="form-label">Date de naissance:</label>
                        <input type="date" class="form-control" id="" placeholder="Enterer date de naissance" name="Date_naissance" value="{{ $etudiants->Date_naissance }}">
                    </div>
                    <div class="mb-3">
                        <label for="Lieu_naissances" class="form-label">Lieu de naissance:</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer lieu de naissance" name="Lieu_naissances" value="{{ $etudiants->Lieu_naissances }}" onkeyup="controlnom(this)">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom du Père :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom du Père" name="Nom_parents" value="{{ $etudiants->Nom_parents }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession du Père :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profession du Père" name="profession_parents" value="{{ $etudiants->profession_parents }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom du mère :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom du mère" name="Nom_mere" value="{{ $etudiants->Nom_mere }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession du mère :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profission du mère" name="profession_mere" value="{{ $etudiants->profession_mere }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom de tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom tuteurs" name="Nom_tuteur" value="{{ $etudiants->Nom_tuteur }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession de tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profession de tuteurs" name="profession_tuteurs" value="{{ $etudiants->profession_tuteurs }}">
                    </div>
                    <div class="mb-3">
                        <label for="Adresse_parents" class="form-label">Adresse des parents ou tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer lieu de naissance" name="Adresse_parents"  value="{{ $etudiants->Adresse_parents }}">
                    </div>
                    <center><button type="submit" class="btn btn-primary">MODIFIER</button></center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>