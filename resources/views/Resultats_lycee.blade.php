<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>deliberation</title>
    <link rel="stylesheet" type="text/css" href="{{asset('login.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
</head>
<body>
    @include('navbar_lycee')
    @if (isset($message))
        <div class='alert alert-danger'>
        <center> {{$message}}</center>
        </div>
    @endif
    <center><B><h1>RESULTATS AU @foreach ($valeure as $valeure){{ $valeure->Nom_ecol }}@endforeach</h1></B></center><br>
    <form action="/resultat_action_lyee" method="POST">
        @csrf
        <div class="row" id="corps2">
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Année scolaire</label>
                    </div>
                    <select class="custom-select form-select" id="" name="Annee_scolaire">
                        @foreach ($Annee_scolaire as $Annee_scolaire)
                            <option value="{{ $Annee_scolaire->Annee_scolaire }}">{{ $Annee_scolaire->Annee_scolaire }}</option>
                        @endforeach  
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Class</label>
                    </div>
                    <select class="custom-select form-select" id="" name="Cycle">
                        @foreach ($Cycle as $Cycle)
                            <option value="{{ $Cycle->Cycle }}">{{ $Cycle->Cycle }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <center><button type="submit" class="btn btn-info">Afficher</button></center>
        </div>
        </div>
    </form>
    <script>
        function controlenumero(inputElement) {
            var numnum = inputElement.value;
            if (isNaN(numnum)) {
                alert("Le note doit être en chiffre");
                inputElement.value = ''; // Efface la valeur non numérique
                inputElement.focus();    // Remet le focus sur le champ
            }
            // ControlleChampVide(numnum);
        }
    </script>
</body>
</html>