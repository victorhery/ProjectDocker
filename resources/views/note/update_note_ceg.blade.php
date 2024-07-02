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
                <center><h1>Modifier les notes de : {{ $Note->Nom_elev }} {{ $Note->Prenom_eleve }}</h1></center>
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
                
                <form action="/update_note_ceg/traitement" method="POST">
                    @csrf
                    <input type="text"  value="{{ $Note->id }}" name="id" style="display:none;">
                    <table class="table table-borderless">
                        <tr>
                            <div class="mb-3">
                                <td>
                                    <label for="Coef" class="form-label">MATIERES</label>
                                    <select name="matiere" id="">
                                        <option value="{{ $Note->matiere }}">{{ $Note->matiere }}</option>
                                        @foreach ($matiere_cegs as $id=>$matieres)
                                        <option value="{{ $matieres }}">{{ $matieres }}</option>
                                        @endforeach      
                                    </select>
                                </td>
                                <td>
                                    <label for="Num_bulletin" class="form-label">N° de Bulletin</label>
                                    <select name="Num_bulletin" id="">
                                        <option  value="{{ $Note->Num_bulletin }}">{{ $Note->Num_bulletin }}<sup>ere</sup>Bulletin</option>
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
                                <td><input type="text" class="form-control" id="" placeholder="Saisir note" name="Note"  value="{{ $Note->Note }}"></td>
                            </div>
                        </tr>
                    </table>
                
                    
                    <hr>
                    <p><h2><center><i>Information de {{ $Note->Nom_elev }} {{ $Note->Prenom_eleve }}</i></center></h2></p>
                    <table class="table table-bordered table-sm ">
                        <tr>
                            <th>IM</th>
                            <th>NOM et PRENOM</th>
                            <th>Annee scolaire</th>
                            <th>Cycle</th>
                        </tr>
                        <tr>
                            <td>{{ $Note->IM }}</td>
                            <td>{{ $Note->Nom_elev }} {{ $Note->Prenom_eleve }}</td>
                            <td>{{ $Note->Annee_scolaire }}</td>
                            <td>{{ $Note->Cycle }}</td>
                        </tr>
                    </table>
                    
                    <table  class="table table-borderless">
                        <tr>
                            <td><button type="submit" class="btn btn-primary">MODIFIER NOTES</button></td>
                        </tr>
                    </table>
                </form>
                <br>
            </div>
        </div>
    </div>
</body>
</html>