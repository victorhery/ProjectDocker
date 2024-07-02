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
                <center><h1>CONTROLE</h1></center>
                <hr>
                <ul>
                    <!-- message d'eureur -->
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger"> {{ $error }} </li>
                    @endforeach
                </ul>
               <form action="/examin_action_lycee" method="GET">
               @csrf
                <div class="mb-3">
                    <label for="matieres" class="form-label">Cycle:</label>
                    <select name="Cycle" id="">
                    @foreach ($classe_lycees as $id=>$Cycle)
                    <option value="{{ $Cycle }}">{{ $Cycle }}</option>
                    @endforeach      
                    </select>
                </div>
                
                    <button class="btn btn-info" type="submit">AFFICHER</button>
                   
               </form>
               <br>
            </div>
        </div>
    </div>
</body>
</html>