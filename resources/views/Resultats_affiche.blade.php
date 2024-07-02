<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rsultat GEG de classe {{ $Cycle }}</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <style>
        @media print{
            body *{
                visibility: hidden;
            }
            .print-container, .print-container *{
                visibility: visible;
            }
            .print-container{
                position: absolute;
                left: 0;
                top: 0;
            }
        }
        #impresson {
        float: right;
        }
        #ministere{
            float: left;
        }
        #right{
            float: right;
        }
    </style>
</head>
<body>
    @include('navbar')
    <div class="container">
        <div class="">
            <button id='impresson' name='impression' onclick='imprimer_page()' class="btn btn-secondary" title="Imprimer">Exporter en pdf</button>
            <div class="print-container">
            <div>
                    <center><img src="images/repoblika.jpg" alt="" width="150px"></center>
                    <table id="ministere" width= "100%">
                        <tr>
                            <td>
                                <center>
                                MINISTERE DE L'EDUCATION NATIONALE <br>
                                <u>SECRETAIRE REGIONAL</u><br>
                                DIRECTION REGIONALE DE L'EDUCATION NATIONALE <br>
                                <u>HAUTE MATSIATRA</u><br>
                                CIRCONSCRIPTION SCOLAIRE <u>VOHIBATO</u><br>
                                ZAP : @foreach ($valeure as $valeur){{ $valeur->Zap }}@endforeach <br>

                                Ecole : @foreach ($valeure as $valeure){{ $valeure->Nom_ecol }}@endforeach <br>
                                ANNEE SCOLAIRE <u>{{ $Annee_scolaire }}</u>
                                </center>
                            </td>
                            <td>
                                <center>VOHIBATO le .......... <br>
                                    LE CHEF DE LA CIRCONSCRIPTION SCOLAIRE DE <br>
                                    <u>VOHIBATO.</u> <br>
                                    à <br>
                                    Monsieur le DIRECTEUR REGIONAL DE L'EDUCATION NATIONAL <br>
                                    <u> HAUTE MATSIATRA</u>
                                </center>
                            </td>
                        </tr>
                    </table>
            </div><br><br><br><br><br><br><br><br>
                <center><h1>Resultat de {{ $Cycle }}</h1></center>
                <hr>
                <h2><i><center>Listes des admis</center></i></h2>
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
                            <th>Rang</th>
                            <th>IM</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($students_admis->isEmpty())
                        <tr>
                            <td colspan="4"><center>Néant</center></td>
                        </tr>
                        @else
                        @php
                            $counter =1;
                        @endphp
                        @foreach ($students_admis as $studentse)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $studentse->IM }}</td>
                            <td>{{ $studentse->Nom_elev }}</td>
                            <td>{{ $studentse->Prenom_eleve }}</td>
                            <!-- <td></td> -->
                        </tr>
                        @php
                            $counter++;
                        @endphp
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <br><br><br>
                <h2><i><center>Listes des rédoublants</center></i></h2>
                                
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Rang</th>
                            <th>IM</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($students_redouble->isEmpty())
                        <tr>
                            <td colspan="4"><center>Néant</center></td>
                        </tr>
                        @else
                        @php
                            $counter =1;
                        @endphp
                        @foreach ($students_redouble as $studentse)
                        <tr>
                            <td>{{ $counter }}</td>
                            <td>{{ $studentse->IM }}</td>
                            <td>{{ $studentse->Nom_elev }}</td>
                            <td>{{ $studentse->Prenom_eleve }}</td>
                            <!-- <td></td> -->
                        </tr>
                        @php
                            $counter++;
                        @endphp
                        @endforeach
                        @endif
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
    <script>
        function imprimer_page(){
            window.print(document.getElementById='impri');
        }
    </script>
</body>
</html>