<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste eleve</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
</head>
<body>
    @include('navbar_auth')
    <div class="container"  id="corps2">
        <div class="row">
            <div class="col s12">
                <h2><center><i>Liste des année scolaires</i></center></h2>
                <hr>
                    <a href="/ajouter_anne" class='btn btn-primary'>Ajouter</a>
                <hr>
                @if (session('status'))
                    <div class="alert alert-success">
                        <center>
                            {{ session('status') }}
                        </center>
                    </div>
                @endif
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ANNEE SCOLAIRE</th>
                            <th>ACTIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($annee_scolaire as $annee_scolaire)
                        <tr>
                            <td>{{ $annee_scolaire->id }}</td>
                            <td>{{ $annee_scolaire->Annee }}</td>
                            
                            <td>
                                <a href="/update_anne/{{ $annee_scolaire->id }}" class="btn btn-info">Modifier</a>
                                <a href="/delete_annee/{{ $annee_scolaire->id }}" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment suprimer');">Suprimer</a>
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