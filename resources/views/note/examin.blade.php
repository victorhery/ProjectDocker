<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste eleve</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <style>
        td{
            height:60px;
            text-align: left;
        }
    </style>
</head>
<body>
@include('navbar')
    <div class="container" id="corps2">
        <div class="row">
            <div class="col s12">
            <center>
            <h1>CONTROLE</h1>
                <hr>
                <ul>
                    <!-- message d'eureur -->
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger"> {{ $error }} </li>
                    @endforeach
                </ul>
               <form action="/examin_action" method="GET">
                    @csrf
                    <table>
                        <tr>
                            <td><label for="matieres" class="form-label">Cycle:</label></td>
                            <td>
                                <select name="Cycle" class="form-control" id="">
                                    @foreach ($classe_cegs as $id=>$Cycle)
                                    <option value="{{ $Cycle }}">{{ $Cycle }}</option>
                                    @endforeach      
                                </select>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td><label for="Annee_scolaire" class="form-label">ANNEE SCOLLAIRE : </label></td>
                            <td>
                                <select name="Annee_scolaire" class="form-control" id="">
                                    @foreach ($annee_scolaire as $Annee)
                                        <option value="{{ $Annee }}">{{ $Annee }}</option>
                                    @endforeach  
                                </select>
                            </td>
                        </tr> --}}
                    </table>
                    <br>
                    <button class="btn btn-info" type="submit">AFFICHER</button>
               </form>
            </center>
            </div>
        </div>
    </div>
</body>
</html>