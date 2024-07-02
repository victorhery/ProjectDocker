<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste eleve</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
@include('navbar')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <center><h1>Saisir les notes de : {{ $etudiants->Nom_elev }} {{ $etudiants->Prenom_eleve }}</h1></center>
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
                
                <form action="/ajouter_note/traitement" method="POST">
                    @csrf
                    <table class="table table-borderless">
                        <tr>
                            <div class="mb-3">
                                <td>
                                    <label for="Coef" class="form-label">MATIERES</label>
                                    <select name="matiere" id="">
                                        @foreach ($matiere_cegs as $id=>$matieres)
                                        <option value="{{ $matieres }}">{{ $matieres }}</option>
                                        @endforeach      
                                    </select>
                                </td>
                                <td>
                                    <label for="Num_bulletin" class="form-label">N° de Bulletin</label>
                                    <select name="Num_bulletin" id="">
                                        <option value="1">1<sup>ere</sup>Bulletin</option>
                                        <option value="2">2<sup>eme</sup>Bulletin</option>
                                        <option value="3">3<sup>eme</sup>Bulletin</option>
                                        <option value="4">4<sup>eme</sup>Bulletin</option>
                                        <option value="5">5<sup>eme</sup>Bulletin</option>
                                        <option value="6">6<sup>eme</sup>Bulletin</option>
                                    </select>
                                    </td> 
                                    <td>
                                </td>  
                            </div>   
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <div class="mb-3">
                                <td><label for="Note" class="form-label">Note obtenue :   </label></td>
                                <td><input type="text" class="form-control" id="" placeholder="Saisir note" name="Note"></td>
                            </div>
                        </tr>
                    </table>
                
                    
                    <hr>
                    <p><h2><center><i>Information de {{ $etudiants->Nom_elev }} {{ $etudiants->Prenom_eleve }}</i></center></h2></p>
                    <input type="text"  value="{{ $etudiants->id }}" name="id" style="display:none;">
                    <div class="mb-3">
                        <label for="id" class="form-label">ID:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter id" value="{{ $etudiants->id }}" name="id_elev">
                    </div>
                    <div class="mb-3">
                        <label for="Coef" class="form-label">IM:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter IM" value="{{ $etudiants->IM }}" name="IM">
                    </div>
                    <div class="mb-3">
                        <label for="matieres" class="form-label">Nom:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Nom_elev" value="{{ $etudiants->Nom_elev }}" name="Nom_elev">
                    </div>
                    <div class="mb-3">
                        <label for="Code_matiere" class="form-label">Prenom:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Prenom_eleve" value="{{ $etudiants->Prenom_eleve }}" name="Prenom_eleve">
                    </div>
                    <div class="mb-3">
                        <label for="Code_matiere" class="form-label">Annee scolaire:</label>
                        <input type="text" class="form-control" id="" placeholder="Annee scolaire" value="{{ $etudiants->Annee_scolaire }}" name="Annee_scolaire">
                    </div>
                    <div class="mb-3">
                        <label for="Coef" class="form-label">Cycle:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Cycle" value="{{ $etudiants->Cycle }}" name="Cycle">
                    </div>
                    
                    <table  class="table table-borderless">
                        <tr>
                            <td><button type="submit" class="btn btn-primary">AJOUT NOTES</button></td>
                            <td><a href=" URL::previous()" class="btn btn-primary">Revenir a la liste des matieres</a></td>
                        </tr>
                    </table>
                </form>
                <br>
            </div>
        </div>
    </div>
</body>
</html>