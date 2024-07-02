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
                <center><h1>Modifier matiere</h1></center>
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
                
                <form action="/update/matiere_ceg" method="POST">
                @csrf
                <input type="text"  value="{{ $matiere_ceg->id }}" name="id" style="display:none;">
                    <div class="mb-3">
                        <label for="matieres" class="form-label">Matiere:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter matieres" value="{{ $matiere_ceg->matieres }}" name="matieres">
                    </div>
                    <div class="mb-3">
                        <label for="Code_matiere" class="form-label">Code matiere:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Code matiere" value="{{ $matiere_ceg->Code_matiere }}" name="Code_matiere">
                    </div>
                    <div class="mb-3">
                        <label for="Coef" class="form-label">Coef:</label>
                        <input type="number" class="form-control" id="" placeholder="Enter Coeficient" value="{{ $matiere_ceg->Coef }}" name="Coef">
                    </div>
                    <table  class="table table-borderless">
                        <tr>
                            <td><button type="submit" class="btn btn-primary">MODIFIER UN MATIERE</button></td>
                            <td><a href="liste_matiere_ceg" class="btn btn-danger">Revenir a la liste des matieres</a></td>
                        </tr>
                    </table>
                    
                    
                </form>
                <br>
                
            </div>
        </div>
    </div>
</body>
</html>