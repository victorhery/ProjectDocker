<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout eleve CEG</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('js/controle_champ.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
    <style>
        #capitalize {
        text-transform: capitalize;
        }
    </style>
</head>
<body>
@include('navbar')
    <div class="container" id="corps2">
        <div class="row">
            <div class="col s12">
                <center><h1>Ajouter un élève au @foreach ($valeure as $valeur) {{ $valeur->Nom_ecol }} @endforeach</h1></center>
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
                <form action="/ajouter/traitement" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="code_Nom_ecol" class="form-label">Nom école:</label>
                        <select name="code_Nom_ecol" class="form-control" id="">
                            @foreach ($valeure as $valeure)
                                <option value="{{ $valeure->code_Nom_ecol }}">{{ $valeure->Nom_ecol }}</option>
                            @endforeach
                        </select>
                        <!-- <select name="" id="" class="form-control">
                            @foreach ($option as $value=>$label)
                                @foreach ($option1 as $value1=>$label1)
                                    <option value="{{ $value }}">{{ $value1 }}</option>
                                @endforeach
                            @endforeach
                            @foreach ($code_ecoles_ceg as $ecoles_ceg)
                                <option value="{{ $ecoles_ceg->code_Nom_ecol }}">{{ $ecoles_ceg->Nom_ecol }}</option>
                            @endforeach
                        </select> -->
                    </div>
                    <div class="mb-3">
                        <label for="IM" class="form-label">N° Matricule:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter numero matricul" name="IM" value="{{ $IM}}" maxlength="4">
                    </div>
                    <div class="mb-3">
                        <label for="Nom" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter nom" name="Nom_elev" value="{{ old('Nom_elev') }}" onkeyup="controlnom(this)">
                    </div>
                    <div class="mb-3">
                        <label for="Prenom" class="form-label">Prénom:</label>
                        <input type="text" class="form-control" id="capitalize" placeholder="Enter prenom" name="Prenom_eleve" value="{{ old('Prenom_eleve') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Annee_scolaire" class="form-label">ANNEE SCOLLAIRE : </label>
                        <select name="Annee_scolaire" class="form-control" id="">
                        @foreach ($annee_scolaire as $Annee)
                            <option value="{{ $Annee }}">{{ $Annee }}</option>
                        @endforeach  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Classe" class="form-label">Classe:</label>
                        <select name="Cycle" class="form-control" id="">
                            <option value="6eme"><span>6<sup>eme</sup></span></option>
                            <option value="5eme"><span>5<sup>eme</sup></span></option>
                            <option value="4eme"><span>4<sup>eme</sup></span></option>
                            <option value="3eme"><span>3<sup>eme</sup></span></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Date_naissance" class="form-label">Date de naissance:</label>
                        <input type="date" class="form-control" id="" placeholder="Enterer date de naissance" name="Date_naissance"  value="{{ old('Date_naissance') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Lieu_naissances" class="form-label">Lieu de naissance:</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer lieu de naissance" name="Lieu_naissances"  value="{{ old('Lieu_naissances') }}" onkeyup="controlnom(this)">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom du Père :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom du Père" name="Nom_parents"  value="{{ old('Nom_parents') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession du Père :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profession du Père" name="profession_parents"  value="{{ old('profession_parents') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom du mère :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom du mère" name="Nom_mere"  value="{{ old('Nom_mere') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession du mère :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profission du mère" name="profession_mere"  value="{{ old('profession_mere') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom de tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom tuteurs" name="Nom_tuteur"  value="{{ old('Nom_tuteur') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession de tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profession de tuteurs" name="profession_tuteurs"  value="{{ old('profession_tuteurs') }}">
                    </div>
                    <div class="mb-3">
                        <label for="Adresse_parents" class="form-label">Adresse des parents ou tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer lieu de naissance" name="Adresse_parents"  value="{{ old('Adresse_parents') }}">
                    </div>
                    <center><button type="submit" class="btn btn-primary">AJOUTER</button></center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>