
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modifier élève LYCEE</title>
	<link rel="stylesheet" type="text/css" href="{{asset('login.css')}}">
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('js/controle_champ.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
</head>
<body>
@include('navbar_lycee')
    <div class="container" id="corps2">
        <div class="row">
            <div class="col s12">
                <center><h1>Modifier l'information de : {{ $eleves->Nom_elev }} {{ $eleves->Prenom_eleve }}</h1></center>
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
                
                <form action="/etudiant_Lycee_update/traitement" method="POST">
                @csrf
                <input type="text"  value="{{ $eleves->id }}" name="id" style="display:none;">
                    <div class="mb-3">
                    <label for="code_Nom_ecol" class="form-label">Nom école:</label>
                    <select name="code_Nom_ecol" class="form-control" id="">
                        @foreach ($valeure as $valeure)
                            <option value="{{ $valeure->code_Nom_ecol }}">{{ $valeure->Nom_ecol }}</option>
                        @endforeach
                    </select>
                    <!-- <select name="code_Nom_ecol" id="" class="form-control">
                        <option value="{{ $eleves->code_Nom_ecol }}">@foreach ($nom_ecoles_Lycee as $nom_ecoles_Lycee){{ $nom_ecoles_Lycee->Nom_ecol}} @endforeach</option>
                        @foreach ($code_ecoles_Lycee as $code_ecoles_Lycee)
                            <option value="{{ $code_ecoles_Lycee->code_Nom_ecol }}">{{ $code_ecoles_Lycee->Nom_ecol }}</option>
                        @endforeach
                    </select> -->
                </div>
                    <div class="mb-3">
                        <label for="IM" class="form-label">N° Matricule:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter numero matricol" value="{{ $eleves->IM }}" name="IM" maxlength="4">
                    </div>
                    <div class="mb-3">
                        <label for="Nom" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter nom" value="{{ $eleves->Nom_elev }}" name="Nom_elev"  onkeyup="controlnom(this)">
                    </div>
                    <div class="mb-3">
                        <label for="Prenom" class="form-label">Prenom:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter prenom"value="{{ $eleves->Prenom_eleve }}" name="Prenom_eleve">
                    </div>
                    <div class="mb-3">
                        <label for="Annee_scolaire" class="form-label">ANNEE SCOLLAIRE : </label>
                        <select name="Annee_scolaire" class="form-control" id="">
                            <option value="{{ $eleves->Annee_scolaire}}">{{ $eleves->Annee_scolaire }}</option>
                        @foreach ($annee_scolaire as $Annee)
                            <option value="{{ $Annee }}">{{ $Annee }}</option>
                        @endforeach  
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Classe" class="form-label">Classe:</label>
                        <select name="Cycle" class="form-control" id="">
                            <option value="{{ $eleves->Cycle}}">{{ $eleves->Cycle }}</option>
                            <option value="2nde"><span>2<sup>nde</sup></span></option>
                            <option value="1ére"><span>1<sup>ére</sup></span></option>
                            <option value="T.S"><span>T.S</span></option>
                            <option value="T.L"><span>T.L</span></option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Date_naissance" class="form-label">Date de naissance:</label>
                        <input type="date" class="form-control" id="" placeholder="Enterez date de naissance" value="{{ $eleves->Date_naissance}}" name="Date_naissance">
                    </div>
                    <div class="mb-3">
                        <label for="Lieu_naissances" class="form-label">Lieu de naissance:</label>
                        <input type="text" class="form-control" id="" placeholder="Enterez lieu de naissance" value="{{ $eleves->Lieu_naissances}}" name="Lieu_naissances" onkeyup="controlnom(this)">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom Parents Ou tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterez lieu de naissance" value="{{ $eleves->Nom_parents}}" name="Nom_parents">
                    </div> -->
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom du Père :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom du Père" name="Nom_parents" value="{{ $eleves->Nom_parents }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession du Père :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profession du Père" name="profession_parents" value="{{ $eleves->profession_parents }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom du mère :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom du mère" name="Nom_mere" value="{{ $eleves->Nom_mere }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession du mère :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profission du mère" name="profession_mere" value="{{ $eleves->profession_mere }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Nom de tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer nom tuteurs" name="Nom_tuteur" value="{{ $eleves->Nom_tuteur }}">
                    </div>
                    <div class="mb-3">
                        <label for="Nom_parents" class="form-label">Profession de tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterer profession de tuteurs" name="profession_tuteurs" value="{{ $eleves->profession_tuteurs }}">
                    </div>
                    <div class="mb-3">
                        <label for="Adresse_parents" class="form-label">Adresse des parents ou tuteurs :</label>
                        <input type="text" class="form-control" id="" placeholder="Enterez lieu de naissance" value="{{ $eleves->Adresse_parents}}" name="Adresse_parents">
                    </div>
                    <center><button type="submit" class="btn btn-primary">MODIFIER</button></center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
