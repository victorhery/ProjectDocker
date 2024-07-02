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
    @include('navbar_lycee')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <center><h1>Gestion eleves aux LYCEE</h1></center>
                <hr>
                    <a href="/inscription" class='btn btn-primary'>Ajouter</a>
                <hr>
                                <!-- afficher la message de succes -->
                                @if (session('status'))
                    <div class="alert alert-danger">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eleves as $eleve)
                        <tr>
                            <td>{{ $eleve->id }}</td>
                            <td>{{ $eleve->IM }}</td>
                            <td>{{ $eleve->Nom_elev }}</td>
                            <td>{{ $eleve->Prenom_eleve }}</td>
                            <td>{{ $eleve->Cycle }}</td>
                            <td> 
                                <a href="/update_etudiant_lycee/{{ $eleve->id }}" class="btn btn-info">Modifier</a>
                                <a href="/delete_etudiant_lycee/{{ $eleve->id }}" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment suprimer');">Suprimer</a>
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