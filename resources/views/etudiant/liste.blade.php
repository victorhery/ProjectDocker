<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste eleve</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
</head>
<body>
@include('navbar')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <center><h1>Gestion eleves Collegien</h1></center>
                <hr>
                    <a href="/ajouter" class='btn btn-primary'>Ajouter</a>
                <hr>
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
                            <th>IM</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Annee scolaire</th>
                            <th>Classe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($etudiants as $etudiant)
                        <tr>
                            <td>{{ $etudiant->id }}</td>
                            <td>{{ $etudiant->IM }}</td>
                            <td>{{ $etudiant->Nom_elev }}</td>
                            <td>{{ $etudiant->Prenom_eleve }}</td>
                            <td>{{ $etudiant->Annee_scolaire }}</td>
                            <td>{{ $etudiant->Cycle }}</td>
                            <td>
                                <a href="/update_etudiant/{{ $etudiant->id }}" class="btn btn-info">Modifier</a>
                                <a href="/delete_etudiant_ceg/{{ $etudiant->id }}" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment suprimer');">Suprimer</a>
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