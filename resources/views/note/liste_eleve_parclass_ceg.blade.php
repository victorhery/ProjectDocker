<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste eleve</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/jquery.dataTables.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/moment.min.js')}}"></script>
</head>
<body>
@include('navbar')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <center><h1>LISTES DES ELEVES EN CLASSE DE </h1></center>
                
                @if (session('status'))
                    <div class="alert alert-success">
                        <center>
                            {{ session('status') }}
                        </center>
                    </div>
                @endif
                <div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-goup-prepend">
                                <label for="Annee_scolaire" class="input-group-text">ANNEE SCOLLAIRE : </label>
                            </div>
                                <select name="Annee_scolaire" class="custm-select form-select" id="select_res">
                                    @foreach ($annee_scolaire as $Annee)
                                        <option value="{{ $Annee }}">{{ $Annee }}</option>
                                    @endforeach  
                                </select>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="filer" class="btn btn-sm btn-outline-success">Filtrer</button>
                    <button id="reset_std" class="btn btn-sm btn-outline-success">reset standard</button>
                    <button id="reset_res" class="btn btn-sm btn-outline-success">rest resultat</button>
                    <button id="reset" class="btn btn-sm btn-outline-success">Reset</button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table" id="record_table">
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
                                @foreach($Etudiants as $Etudiants)
                                    <tr>
                                        <td> {{ $Etudiants->id }} </td>
                                        <td>{{ $Etudiants->IM }}</td>
                                        <td>{{ $Etudiants->Nom_elev }}</td>
                                        <td>{{ $Etudiants->Prenom_eleve }}</td>
                                        <td>{{ $Etudiants->Annee_scolaire }}</td>
                                        <td>{{ $Etudiants->Cycle }}</td>
                                        <td>
                                            <a href="/ajout_note_ceg/{{ $Etudiants->id }}" class="btn btn-info">Ajout notes</a>
                                            <a href="/bulletin_ceg/{{ $Etudiants->id }}" class="btn btn-info">Bulletin de notes</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    {{-- <script>
// Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var std = $("#select_std").val();
            var res = $("#select_res").val();
            if (std !== "" && res !== "") {
                $('#record_table').DataTable().destroy();
                fetch(std, res);
            } else if (std !== "" && res == "") {
                $('#record_table').DataTable().destroy();
                fetch(std, '');
            } else if (std == "" && res !== "") {
                $('#record_table').DataTable().destroy();
                fetch('', res);
            } else {
                $('#record_table').DataTable().destroy();
                fetch();
            }
        });

        //fetch record
        function fetch(std, res){
            $.ajax({
                url: "{{route('/students/records')}}",
                type: "GET",
                data: {
                    std: std,
                    res: res
                },
                dataType: "json",
                success: function(data){
                    var i=1;
                    $('#record_table'.DataTable({
                        'data':data.Etudiants,
                        "responsive":true,
                        'columns':[{
                                    "data":"id",
                                    "render":function(data, type, row, meta){
                                        return i++;
                                    }
                                },
                                {
                                    "data":"Nom_elev"
                                }
                                {
                                    "data":"Cycle",
                                    "render":function(data, type, row, meta){
                                        return `${row.Cycle}th Standard`;
                                    }
                                },
                                {
                                    "data":"Annee_scolaire",
                                    "render":function(data, type, row, meta){
                                        return `${row.Annee_scolaire}`;
                                    }
                                },
                            ]   
                    }));
                }
            });
            
        }
        fetch();
    </script> --}}
</body>
</html>