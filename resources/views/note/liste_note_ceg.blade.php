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
                <center><h1><i>Listes des notes</i></h1></center>
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
                            <th>Classe</th>
                            <th>Annee scolaire</th>
                            <th>Numero de bulletin</th>
                            <th>Matieres</th>
                            <th>Coeficient</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Note as $Note)
                        <tr>
                            <td>{{ $Note->id }}</td>
                            <td>{{ $Note->IM }}</td>
                            <td>{{ $Note->Nom_elev }}</td>
                            <td>{{ $Note->Prenom_eleve }}</td>
                            <td>{{ $Note->Cycle }}</td>
                            <td>{{ $Note->Annee_scolaire }}</td>
                            <td>{{ $Note->Num_bulletin }}</td>
                            <td>{{ $Note->matiere }}</td>
                            <td>{{ $Note->Coef }}</td>
                            <td>{{ $Note->Note }}</td>
                            <td>
                            <a href="/update_note_ceg/{{ $Note->id }}" class="btn btn-info">Modifier</a>
                            <a href="/delete_note_ceg/{{ $Note->id }}" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment suprimer');">Suprimer</a>
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