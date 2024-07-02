<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste matiere</title>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('js/controle_champ.js')}}"></script>
    <style>
        #recherch_fl{
            float: right;
        }
    </style>
</head>
<body>
    @include('navbar_lycee')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div id="recherch_fl">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text">Recherche</label>
                        </div>
                        <input class="form-control" id="myInput" type="search" placeholder="Recherche..">
                    </div>
                </div>
                <center><h1>Gestion matiere LYCEE</h1></center>
                <hr>
                    
                    {{-- <a href="/matiere_lycee" class='btn btn-primary'>Ajouter</a>
                <hr> --}}
                                <!-- afficher la message de succes -->
                                @if (session('status'))
                    <div class="alert alert-success">
                        <center>
                            {{ session('status') }}
                        </center>
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>MATIERES</th>
                            <th>COEFICIENT</th>
                            <th>CODE MATOERES</th>
                            <th>Classe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody  id="myTable">
                        @foreach($matiere_lycee as $matiere_lycee)
                        <tr>
                            <td>{{ $matiere_lycee->id }}</td>
                            <td>{{ $matiere_lycee->matieres }}</td>
                            <td>{{ $matiere_lycee->Coef }}</td>
                            <td>{{ $matiere_lycee->Code_matiere }}</td>
                            <td>{{ $matiere_lycee->Cycle }}</td>
                            <td>
                                <a href="/update_matiere_lycee/{{ $matiere_lycee->id }}" class="btn btn-info">Modifier</a>
                                {{-- <a href="/delete_matiere_lycee/{{ $matiere_lycee->id }}" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment suprimer');">Suprimer</a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>