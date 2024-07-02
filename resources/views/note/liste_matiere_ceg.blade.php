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
                <center><h1>Gestion matiere CEG</h1></center>
                <hr>
                    <a href="/matiere_ceg" class='btn btn-primary'>Ajouter</a>
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
                            <th>MATIERES</th>
                            <th>CODE MATOERES</th>
                            <th>COEFICIENT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matiere_ceg as $matiere_ceg)
                        <tr>
                            <td>{{ $matiere_ceg->id }}</td>
                            <td>{{ $matiere_ceg->matieres }}</td>
                            <td>{{ $matiere_ceg->Code_matiere }}</td>
                            <td>{{ $matiere_ceg->Coef }}</td>
                            <td>
                                <a href="/update_matiere_ceg/{{ $matiere_ceg->id }}" class="btn btn-info">Modifier</a>
                                <a href="/delete_matiere_ceg/{{ $matiere_ceg->id }}" class="btn btn-danger" onclick="return confirm('Voulez vous vraiment suprimer');">Suprimer</a>
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