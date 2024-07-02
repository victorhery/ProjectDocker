<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lyste CEG</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" /> --}}
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/jquery.dataTables.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/moment.min.js')}}"></script>
</head>
</head>
<body>
    @include('navbar')
    <!-- <div class="container"> -->
        <div class="row">
            <h1 class="text-center">GESTION DES ELEVES AU @foreach ($valeure as $valeure){{ $valeure->Nom_ecol }}@endforeach</h1>
            <hr>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Année scolaire</label>
                            </div>
                            <select class="custom-select form-select" id="select_std">
                                <option value="">Sélectionner l'année scolaire</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="inputGroupSelect01">Class</label>
                            </div>
                            <select class="custom-select form-select" id="select_res">
                                <option value="">Sélectionner la classe</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="filter" class="btn btn-sm btn-outline-success">Filtre</button>
                    <button id="reset_std" class="btn btn-sm btn-outline-success">Restaurer Année scolaire</button>
                    <button id="reset_res" class="btn btn-sm btn-outline-success">Restaurer la classe</button>
                    <button id="reset" class="btn btn-sm btn-outline-warning">Restaurer</button>
                </div>
            </div>
        </div><br>
        @if (Session::has('success'))
            <div class="alert alert-success">
                <center>
                    {{ Session::get('success') }}
                </center>
            </div>
        @endif
        @if (Session::has('échoué'))
            <div class="alert alert-danger">
                <center>
                    {{ Session::get('échoué') }}
                </center>
            </div>
        @endif
        <!-- MODIFICATION SUCESS -->
        @if (session('status'))
            <div class="alert alert-success">
                <center>
                    {{ session('status') }}
                </center>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="display" id="record_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>N°Mille</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Etat</th>
                                <th>Année scolaire</th>
                                <th>Classe</th>
                                <th><center>Actions</center></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
<!-- </div> -->
<script>
        function fetch_std() {
            $.ajax({
                url: "{{ route('standards') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var stdBody = "";
                    for (var key in data) {
                        //option @ annescolaire
                        stdBody +=
                            `<option value="${data[key]['Annee_scolaire']}">${data[key]['Annee_scolaire']}</option>`;
                    }
                    $("#select_std").append(stdBody);
                }
            });
        }
        fetch_std();
        // Fetch Result
        function fetch_res() {
            $.ajax({
                url: "{{ route('results') }}",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var resBody = "";
                    for (var key in data) {
                        //option @ Cycle
                        resBody += `<option value="${data[key]['Cycle']}">${data[key]['Cycle']}</option>`;
                    }
                    $("#select_res").append(resBody);
                }
            });
        }
        fetch_res();
        // Fetch Records
        function fetch(std, res) {
            $.ajax({
                url: "{{ route('students/records') }}",
                type: "GEt",
                data: {
                    std: std,
                    res: res
                },
                dataType: "json",
                success: function(data) {
                    var i = 1;
                    $('#record_table').DataTable({
                        "data": data.students,
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "IM"
                            },
                            {
                                "data": "Nom_elev",
                                "render": function(data, type, row, meta) {
                                    return `${row.Nom_elev}`;
                                }
                            },
                            {
                                "data": "Prenom_eleve",
                                "render": function(data, type, row, meta) {
                                    return `${row.	Prenom_eleve}`;
                                }
                            },
                            {
                                "data": "Etat_actuel",
                                "render": function(data, type, row, meta) {
                                    return `${row.	Etat_actuel}`;
                                }
                            },
                            {
                                "data": "Annee_scolaire"
                            },
                            {
                                "data": "Cycle",
                                "render": function(data, type, row, meta) {
                                    return `${row.	Cycle}`;
                                    // return moment(row.created_at).format('DD-MM-YYYY');
                                }
                            },
                            {
                                "render": function(data, type, row, meta) {
                                    return `<a href="/bulletin_ceg/${row.id }" class="btn btn-sm btn-outline-success">Bulletin de notes</a>
                                    <a href="/update_etudiant/${row.id }" class="" title='Modifier'><img src="{{ asset('icon/b_edit.png') }}" alt=""></a>
                                    <a href="/delete_etudiant_ceg/${row.id }" class="" onclick="return confirm('Voulez vous vraiment suprimer les information de ${row.Nom_elev } ${row.Prenom_eleve } en classe de ${row.Cycle }. Sur Année scolaire ${row.Annee_scolaire }');" title='Suprimer'><img src="{{ asset('icon/suprimer.png') }}" alt=""></a>`;
                                }
                            }
                        ]
                    });
                }
            });
        }
        fetch();
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
        // Restaurer l'ennescolaire
        $(document).on("click", "#reset_std", function(e) {
            e.preventDefault();
            $("#select_std").html(`<option value="">Sélectionner l'année scolaire</option>`);
            var res = $("#select_res").val();
            if (res == "") {
                $('#record_table').DataTable().destroy();
                fetch();
                fetch_std();
            } else {
                $('#record_table').DataTable().destroy();
                fetch('', res);
                fetch_std();
            }
        });
        // Restaurer la classe
        $(document).on("click", "#reset_res", function(e) {
            e.preventDefault();
            $("#select_res").html(`<option value="">Sélectionner la classe</option>`);
            var std = $("#select_std").val();
            if (std == "") {
                $('#record_table').DataTable().destroy();
                fetch();
                fetch_res();
            } else {
                $('#record_table').DataTable().destroy();
                fetch(std, '');
                fetch_res();
            }
        });
        // Restaurer
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#select_std").html(`<option value="">Sélectionner l'année scolaire</option>`);
            $("#select_res").html(`<option value="">Sélectionner la classe</option>`);
            $('#record_table').DataTable().destroy();
            fetch();
            fetch_std();
            fetch_res();
        });
    </script>
</body>
</html>
