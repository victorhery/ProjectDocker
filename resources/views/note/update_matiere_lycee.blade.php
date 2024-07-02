<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste eleve</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('login.css')}}">
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
<body>
    @include('navbar_lycee')
    <div class="container"  id="corps2">
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
                
                <form action="/update/matiere_lycee" method="POST">
                @csrf
                <input type="text"  value="{{ $matiere_lycee->id }}" name="id" style="display:none;">
                    <div class="mb-3">
                        <label for="matieres" class="form-label">Matiere:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter matieres" value="{{ $matiere_lycee->matieres }}" name="matieres">
                    </div>
                    <div class="mb-3">
                        <label for="Code_matiere" class="form-label">Code matiere:</label>
                        <input type="text" class="form-control" id="" placeholder="Enter Code matiere" value="{{ $matiere_lycee->Code_matiere }}" name="Code_matiere">
                    </div>
                    <div class="mb-3">
                        <label for="Coef" class="form-label">Coef:</label>
                        <input type="number" class="form-control" id="" placeholder="Enter Coeficient" value="{{ $matiere_lycee->Coef }}" name="Coef">
                    </div>
                    <div class="mb-3">
                        <label for="Classe" class="form-label">Classe:</label>
                        <select name="Cycle" class="form-control" id="">
                            <option value="{{ $matiere_lycee->Cycle }}"><span>{{ $matiere_lycee->Cycle }}</span></option>
                            <option value="2nde"><span>2<sup>nde</sup></span></option>
                            <option value="1ére"><span>1<sup>ére</sup></span></option>
                            <option value="T.S"><span>T.S</span></option>
                            <option value="T.L"><span>T.L</span></option>
                        </select>
                    </div>
                    <table  class="table table-borderless">
                        <tr>
                            <td><center><button type="submit" class="btn btn-primary">MODIFIER</button></center></td>
                        </tr>
                    </table>
                    
                    
                </form>
                <br>
                
            </div>
        </div>
    </div>
</body>
</html>