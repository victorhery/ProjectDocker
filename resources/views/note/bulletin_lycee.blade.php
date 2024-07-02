<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BULLETIN DES NOTES de {{ $etudiants->Nom_elev }} {{ $etudiants->Prenom_eleve }}</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
    <style>
        input[type=text], select {
        width: 100PX;
        /* padding: 12px 20px;
        margin: 8px 0;
        display: inline-block; */
        height: 25px;
        /* border: 0px solid #ccc; */
        border: 3px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }
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
                width: 100%;
            }
        }
        #table {
        float: left;
        }
        #right {
        float: right;
        }
        th{
            height: 44px;
        }
       td{
        
        height: 30px;
       }
       /* tr{
        height: 5px;
       } */
       /* div.col-xl{
        width: 33.3%;
       } */
    </style>
</head>
<body>
@include('navbar_lycee')
<form action="/Ajout_notes_lycee/traitement"  method="POST">
    @csrf 
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
    <div class="print-container">
        <p>
            <div id="right">
                <table>
                    <tr>
                        <th>MOYENNE DE CLASSE 1<sup>ere</sup>TRIMESTRE : </th>
                        <th>{{ $MOYENNE_CLASSE1; }} / 20</th>
                    </tr>
                    <tr>
                        <th>MOYENNE DE CLASSE 2<sup>eme</sup>TRIMESTRE : </th>
                        <th>{{ $MOYENNE_CLASSE2; }} / 20</th>
                    </tr>
                    <tr>
                        <th>MOYENNE DE CLASSE 3<sup>eme</sup>TRIMESTRE : </th>
                        <th>{{ $MOYENNE_CLASSE3; }} / 20</th>
                    </tr>
                </table>
                <table>
                    <tr>
                        <tr>
                            <th>MOYENNE GENERAL : </th>
                            <th>{{ $MOYENNE_GENERALE; }} / 20</th>
                        </tr>
                    </tr>
                </table>
            </div>
            <table id="table">
                    <tr>
                        <input type="text"  value="{{ $etudiants->id }}" name="id" style="display:none;">
                        <td><label for="" class="form-label">Année scolaire : </label></td>
                        <td>{{ $etudiants->Annee_scolaire }}</td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Mlle : </label></td>
                        <td>{{ $etudiants->IM }}</td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Classe : </label></td>
                        <td>{{ $etudiants->Cycle }}</td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Nom et Prénon : </label></td>
                        <td>{{ $etudiants->Nom_elev }} {{ $etudiants->Prenom_eleve }}</td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Né le : </label></td>
                        <td>{{ $etudiants->Date_naissance }} à {{ $etudiants->Lieu_naissances }}</td>
                    </tr>
                    
                    <tr>
                        <th colspan="2"><center><b><i><label for="" class="form-label">Adresse Parents ou Tuteurs</label></i></b></center></th>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Fils (ou fille) de : </label></td>
                        <td colspan="2">{{ $etudiants->Nom_parents }} et de {{ $etudiants->Nom_mere }}</td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Adresse de parents  : </label></td>
                        <td colspan="2"> {{ $etudiants->Adresse_parents }}</td>
                    </tr>
                    <tr>
                        <td><label for="" class="form-label">Tuteurs  : </label></td>
                        <td colspan="2"> {{ $etudiants->Nom_tuteur }}</td>
                    </tr>
                </table>
                <center><h1>BULLETIN DES NOTES</h1></center>
            </table>
        </p>
        <br><br><br><br><br><br><br><br><br><br><br>
        <div class="row">
            <div class="col-xl">
                <center><h3><u>1<sup>ère</sup>TRIMESTRE</u></h3></center>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <table>
                                <tr><th>Matiere</th></tr>
                                @foreach ($matier_lycee as $row)
                                <tr>
                                    <td>{{ $row->matieres }}</td>
                                </tr>
                                @endforeach
                                <tr><td>TOTAL</td></tr>
                                <tr><td>Moyenne</td></tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr><th>Coeficient</th></tr>
                                    @foreach ($matier_lycee as $row)
                                        @if ($row->Coef==0)
                                            <tr><td></td></tr>
                                        @else
                                            <tr>
                                                <td>{{ $row->Coef }}</td>
                                            </tr> 
                                        @endif
                                    @endforeach
                                    <tr><td>{{ $som_coef }}</td></tr>
                                    <tr><td></td></tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <th>M.journal
                                        (MJ)</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mal_MJ1" value="{{ round($etudiants->Mal_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Frs_MJ1" value="{{ round($etudiants->Frs_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Ang_MJ1" value="{{ round($etudiants->Ang_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Philo_MJ1" value="{{ round($etudiants->Philo_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="HG_MJ1" value="{{ round($etudiants->HG_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EC_MJ1" value="{{ round($etudiants->EC_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                
                                <tr>
                                    <td><input type="text" name="LEV_MJ1" value="{{ round($etudiants->LEV_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mths_MJ1" value="{{ round($etudiants->Mths_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="PC_MJ1" value="{{ round($etudiants->PC_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="TICE_MJ1" value="{{ round($etudiants->TICE_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="SVT_MJ1" value="{{ round($etudiants->SVT_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EPS_MJ1" value="{{ round($etudiants->EPS_MJ1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    @if ($TOTAL1==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL1 }}</td>
                                        </tr> 
                                    @endif 
                                    
                                </tr>
                                <tr>
                                    @if ($Moyenne1==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $Moyenne1 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <th>Examin</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mal_EX1" value="{{ round($etudiants->Mal_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Frs_EX1" value="{{ round($etudiants->Frs_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Ang_EX1" value="{{ round($etudiants->Ang_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Philo_EX1" value="{{ round($etudiants->Philo_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="HG_EX1" value="{{ round($etudiants->HG_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EC_EX1" value="{{ round($etudiants->EC_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                
                                <tr>
                                    <td><input type="text" name="LEV_EX1" value="{{ round($etudiants->LEV_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mths_EX1" value="{{ round($etudiants->Mths_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="PC_EX1" value="{{ round($etudiants->PC_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="TICE_EX1" value="{{ round($etudiants->TICE_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="SVT_EX1" value="{{ round($etudiants->SVT_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EPS_EX1" value="{{ round($etudiants->EPS_EX1,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    @if ($TOTAL2==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL2 }}</td>
                                        </tr> 
                                    @endif 
                                    
                                </tr>
                                <tr>
                                    @if ($Moyenne_Ex1==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $Moyenne_Ex1 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <th>Moy General</th>
                                </tr>
                                <tr>
                                    @if ($MG11==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG11 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG12==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG12 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG13==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG13 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG14==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG14 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG15==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG15 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG16==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG16 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG18==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG18 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG19==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG19 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG11A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG11A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG12A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG12A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG13A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG13A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG14A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG14A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($TOTAL_MG1==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL_MG1 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG1M==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG1M }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-xl">
                <center><h3><u>2<sup>ème</sup>TRIMESTRE</u></h3></center>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <th>M.journal
                                        (MJ)</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mal_MJ2" value="{{ round($etudiants->Mal_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Frs_MJ2" value="{{ round($etudiants->Frs_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Ang_MJ2" value="{{ round($etudiants->Ang_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Philo_MJ2" value="{{ round($etudiants->Philo_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="HG_MJ2" value="{{ round($etudiants->HG_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EC_MJ2" value="{{ round($etudiants->EC_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                
                                <tr>
                                    <td><input type="text" name="LEV_MJ2" value="{{ round($etudiants->LEV_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mths_MJ2" value="{{ round($etudiants->Mths_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="PC_MJ2" value="{{ round($etudiants->PC_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="TICE_MJ2" value="{{ round($etudiants->TICE_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="SVT_MJ2" value="{{ round($etudiants->SVT_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EPS_MJ2" value="{{ round($etudiants->EPS_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    @if ($TOTAL3==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL3 }}</td>
                                        </tr> 
                                    @endif 
                                    
                                </tr>
                                <tr>
                                    @if ($Moyenne3==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $Moyenne3 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <th>Examin</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mal_EX2" value="{{ round($etudiants->Mal_EX2,2) }} " maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Frs_EX2" value="{{ round($etudiants->Frs_EX2,2) }} " maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Ang_EX2" value="{{ round($etudiants->Ang_EX2,2) }} " maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Philo_EX2" value="{{ round($etudiants->Philo_EX2,2) }} " maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="HG_EX2" value="{{ round($etudiants->HG_EX2,2) }} " maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EC_EX2" value="{{ round($etudiants->EC_EX2,2) }} " maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                
                                <tr>
                                    <td><input type="text" name="LEV_EX2" value="{{ round($etudiants->LEV_EX2,2) }} " maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mths_EX2" value="{{ round($etudiants->Mths_EX2,2) }} " maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="PC_EX2" value="{{ round($etudiants->PC_EX2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="TICE_EX2" value="{{ round($etudiants->TICE_EX2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="SVT_EX2" value="{{ round($etudiants->SVT_EX2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EPS_EX2" value="{{ round($etudiants->EPS_EX2,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr> 
                                <tr>
                                    @if ($TOTAL4==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL4 }}</td>
                                        </tr> 
                                    @endif 
                                    
                                </tr>
                                <tr>
                                    @if ($Moyenne_Ex2==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $Moyenne_Ex2 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr><th>Moy General</th></tr>
                                <tr>
                                    @if ($MG21==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG21 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG22==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG22 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG23==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG23 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG24==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG24 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG25==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG25 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG26==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG26 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG28==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG28 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG29==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG29 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG21A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG21A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG22A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG22A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG23A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG23A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG24A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG24A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($TOTAL_MG2==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL_MG2 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG2M==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG2M }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-xl">
                <center><h3><u>3<sup>ème</sup>TRIMESTRE</u></h3></center>
                <table class="table table-bordered">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <th>M.journal
                                        (MJ)</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mal_MJ3" value="{{ round($etudiants->Mal_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Frs_MJ3" value="{{ round($etudiants->Frs_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Ang_MJ3" value="{{ round($etudiants->Ang_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Philo_MJ3" value="{{ round($etudiants->Philo_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="HG_MJ3" value="{{ round($etudiants->HG_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EC_MJ3" value="{{ round($etudiants->EC_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                
                                <tr>
                                    <td><input type="text" name="LEV_MJ3" value="{{ round($etudiants->LEV_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mths_MJ3" value="{{ round($etudiants->Mths_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="PC_MJ3" value="{{ round($etudiants->PC_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="TICE_MJ3" value="{{ round($etudiants->TICE_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="SVT_MJ3" value="{{ round($etudiants->SVT_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EPS_MJ3" value="{{ round($etudiants->EPS_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    @if ($TOTAL5==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL5 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($Moyenne5==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $Moyenne5 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <th>Examin</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mal_EX3" value="{{ round($etudiants->Mal_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Frs_EX3" value="{{ round($etudiants->Frs_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Ang_EX3" value="{{ round($etudiants->Ang_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Philo_EX3" value="{{ round($etudiants->Philo_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="HG_EX3" value="{{ round($etudiants->HG_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EC_EX3" value="{{ round($etudiants->EC_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                
                                <tr>
                                    <td><input type="text" name="LEV_EX3" value="{{ round($etudiants->LEV_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mths_EX3" value="{{ round($etudiants->Mths_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="PC_EX3" value="{{ round($etudiants->PC_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="TICE_EX3" value="{{ round($etudiants->TICE_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="SVT_EX3" value="{{ round($etudiants->SVT_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="EPS_EX3" value="{{ round($etudiants->EPS_EX3,2) }}" maxlength="5" onBlur="controlenumero(this)"></td>
                                </tr>
                                <tr>
                                    @if ($TOTAL6==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL6 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($Moyenne_Ex3==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $Moyenne_Ex3 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table>
                                <tr><th>Moy General</th></tr>
                                <tr>
                                    @if ($MG31==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG31 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG32==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG32 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG33==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG33 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG34==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG34 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG35==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG35 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG36==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG36 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG38==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG38 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG39==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG39 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG31A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG31A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG32A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG32A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG33A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG33A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG34A==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG34A }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($TOTAL_MG3==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $TOTAL_MG3 }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                                <tr>
                                    @if ($MG3M==0)
                                       <tr><td></td></tr>
                                    @else
                                        <tr>
                                            <td>{{ $MG3M }}</td>
                                        </tr> 
                                    @endif 
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div> 
    </div> 
      <p>
        <center>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <button id='impresson' name='impression' onclick='imprimer_page()' class="btn btn-secondary" title="Imprimer">Exporter en pdf</button>
        </center>
      </p>
</form>

<script>
    function imprimer_page(){
        window.print(document.getElementById='impri');
    }
    function controlenumero(inputElement) {
        var numnum = inputElement.value;
        if (isNaN(numnum)) {
            alert("Le note doit être en chiffre");
            inputElement.value = ''; // Efface la valeur non numérique
            inputElement.focus();    // Remet le focus sur le champ
        }
    }
</script>
</body>
</html>