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
        input[type=text], [type=number], select {
        width: 100PX;
        height: 30px;
        border: 0px solid #ccc;
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
            }
        }
        #table {
        float: left;
        }
        #right {
        float: right;
        }
        th{
            height: 45px;
        }
       td{
        
        height: 45px;
       }
       #impresson{
        float: right;
       }
    </style>
</head>
<body>
<center>
@include('navbar')
<button id='impresson' name='impression' onclick='imprimer_page()' class="btn btn-secondary" title="Imprimer">Exporter en pdf</button>
<form action="/Ajout_notes_ceg/traitement"  method="POST">
    @csrf
    <div class=''>
    <div class="print-container">
        <div class="row">
            <div class="col s12">
                <ul>
                    <!-- message d'eureur -->
                    @foreach ($errors->all() as $error)
                        <li class="alert alert-danger"> {{ $error }} </li>
                    @endforeach
                </ul>
                <center>
                <img src="../images/repoblika.jpg" alt="" width="150px">
                    <h1>BULLETIN DES NOTES</h1>
                    MINISTERE DE L'EDUCATION NATIONALE <br>
                    <u>SECRETAIRE REGIONAL</u><br>
                    DIRECTION REGIONALE DE L'EDUCATION NATIONALE <br>
                    <u>HAUTE MATSIATRA</u><br>
                    CIRCONSCRIPTION SCOLAIRE <u>VOHIBATO</u><br>
                    ZAP : @foreach ($valeure as $valeur){{ $valeur->Zap }}@endforeach <br>
                    Ecole : @foreach ($valeure as $valeure){{ $valeure->Nom_ecol }}@endforeach <br>
                   
                </center>

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
                                <td><label for="" class="form-label">N° Matricul : </label></td>
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
                                <td><label for="" class="form-label">Adresse de parents : </label></td>
                                <td colspan="2">{{ $etudiants->Adresse_parents }}</td>
                            </tr>
                            <tr>
                                <td><label for="" class="form-label">Tuteurs : </label></td>
                                <td colspan="2">{{ $etudiants->Nom_tuteur }}</td>
                            </tr>
                    </table>
                        
                </p>
                <table width='95%'>
                    <tr>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="5"><center><h3><u>1<sup>ere</sup>TRIMESTRE</u></h3></center></td>
                                </tr>
                                <tr>
                                    <th>Matieres</th>
                                    <th>Coeficient</th>
                                    <th>Moyenne journal<br>(MJ)</th>
                                    <th>Comp<br>(Examin)</th>
                                    <th>Moy.<br>General</th>
                                </tr>
                                <tr>
                                    <td>Malagasy</td>
                                    <td>3</td>
                                    <td><input type="text" name="Mal_MJ1" value="{{round($etudiants->Mal_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Mal_EX1" value="{{round($etudiants->Mal_EX1,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG11==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG11; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Français</td>
                                    <td>2</td>
                                    <td><input type="text" name="Frs_MJ1" value="{{round($etudiants->Frs_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Frs_EX1" value="{{round($etudiants->Frs_EX1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG12==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG12; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Anglais</td>
                                    <td>2</td>
                                    <td><input type="text" name="Ang_MJ1" value="{{round($etudiants->Ang_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Ang_EX1" value="{{round($etudiants->Ang_EX1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG13==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG13; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Histo-Geo</td>
                                    <td>3</td>
                                    <td><input type="text" name="HG_MJ1" value="{{round($etudiants->HG_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="HG_EX1" value="{{round($etudiants->HG_EX1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG14==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG14; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Education/Civ</td>
                                    <td>1</td>
                                    <td><input type="text" name="EC_MJ1" value="{{round($etudiants->EC_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="EC_EX1" value="{{round($etudiants->EC_EX1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG15==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG15; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Maths</td>
                                    <td>3</td>
                                    <td><input type="text" name="Mths_MJ1" value="{{round($etudiants->Mths_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Mths_EX1" value="{{round($etudiants->Mths_EX1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG16==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG16; }}</td>
                                    @endif
                                <tr>
                                    <td>P.C</td>
                                    <td>2</td>
                                    <td><input type="text" name="PC_MJ1" value="{{round($etudiants->PC_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="PC_EX1" value="{{round($etudiants->PC_EX1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG17==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG17; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>SVT</td>
                                    <td>3</td>
                                    <td><input type="text" name="SVT_MJ1" value="{{round($etudiants->SVT_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="SVT_EX1" value="{{round($etudiants->SVT_EX1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG18==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG18; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>EPS</td>
                                    <td>1</td>
                                    <td><input type="text" name="EPS_MJ1" value="{{round($etudiants->EPS_MJ1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="EPS_EX1" value="{{round($etudiants->EPS_EX1,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG19==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG19; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>TOTAL</td>
                                    <td>20</td>
                                    @if ($TOTAL1==0)
                                    <td></td>
                                    @else
                                        <td>{{ $TOTAL1 }}</td>
                                    @endif 
                                    @if ($TOTAL2==0)
                                        <td></td>
                                    @else
                                        <td>{{ $TOTAL2 }}</td>
                                    @endif 
                                    @if ($TOTALMG1==0)
                                        <td></td>
                                    @else
                                        <td>{{ $TOTALMG1 }}</td>
                                    @endif 
                                </tr>
                                <tr>
                                    <td>Moyenne</td>
                                    <td>20</td>
                                    @if ($Moyenne1==0)
                                        <td></td>
                                    @else
                                        <td>{{$Moyenne1;}}</td>
                                    @endif 

                                    @if ($Moyenne_Ex1==0)
                                        <td></td>
                                    @else
                                        <td>{{$Moyenne_Ex1;}}</td>
                                    @endif 
                                    @if ($MG1M==0)
                                        <td></td>
                                    @else
                                        <td>{{ $MG1M }}</td>
                                    @endif 
                                </tr>
                            </table>
                        </td>

                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="5"><center><h3><u>2<sup>ème</sup>TRIMESTRE</u></h3></center></td>
                                </tr>
                                <tr>
                                    <th>Moyenne journal<br>(MJ)</th>
                                    <th>Comp<br>(Examin)</th>
                                    <th>Moy.<br>General</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mal_MJ2" value="{{round($etudiants->Mal_MJ2,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Mal_EX2" value="{{round($etudiants->Mal_EX2,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG21==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG21; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="Frs_MJ2" value="{{round($etudiants->Frs_MJ2,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Frs_EX2" value="{{round($etudiants->Frs_EX2,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG22==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG22; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="Ang_MJ2" value="{{round($etudiants->Ang_MJ2,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Ang_EX2" value="{{round($etudiants->Ang_EX2,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG23==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG23; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="HG_MJ2" value="{{round($etudiants->HG_MJ2,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="HG_EX2" value="{{round($etudiants->HG_EX2,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG24==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG24; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="EC_MJ2" value="{{round($etudiants->EC_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="EC_EX2" value="{{round($etudiants->EC_EX2,2) }}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG25==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG25; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mths_MJ2" value="{{round($etudiants->Mths_MJ2,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Mths_EX2" value="{{round($etudiants->Mths_EX2,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG26==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG26; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="PC_MJ2" value="{{round($etudiants->PC_MJ2,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="PC_EX2" value="{{round($etudiants->PC_EX2,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG27==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG27; }}</td>
                                    @endif
                                    
                                </tr>
                                <tr>
                                    <td><input type="text" name="SVT_MJ2" value="{{round($etudiants->SVT_MJ2,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="SVT_EX2" value="{{round($etudiants->SVT_EX2,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG28==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG28; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="EPS_MJ2" value="{{round($etudiants->EPS_MJ2,2) }}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="EPS_EX2" value="{{round($etudiants->EPS_EX2,2) }}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG29==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG29; }}</td>
                                    @endif
                                    
                                </tr>
                                <tr>
                                    @if ($TOTAL3==0)
                                    <td></td>
                                    @else
                                        <td>{{$TOTAL3;}}</td>
                                    @endif
                                    @if ($TOTAL4==0)
                                    <td></td>
                                    @else
                                        <td>{{$TOTAL4;}}</td>
                                    @endif
                                    @if ($TOTALMG2==0)
                                    <td></td>
                                    @else
                                        <td>{{ $TOTALMG2; }}</td>
                                    @endif
                                    
                                </tr>
                                <tr>
                                    @if ($Moyenne3==0)
                                    <td></td>
                                    @else
                                        <td>{{ $Moyenne3; }}</td>
                                    @endif
                                    @if ($Moyenne_Ex2==0)
                                    <td></td>
                                    @else
                                        <td>{{ $Moyenne_Ex2; }}</td>
                                    @endif
                                    @if ($MG2M==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG2M; }}</td>
                                    @endif
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="3"><center><h3><u>3<sup>ème</sup>TRIMESTRE</u></h3></center></td>
                                </tr>
                                <tr>
                                    <th>Moyenne journal<br>(MJ)</th>
                                    <th>Comp<br>(Examin)</th>
                                    <th>Moy.<br>General</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mal_MJ3" value="{{round($etudiants->Mal_MJ3,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Mal_EX3" value="{{round($etudiants->Mal_EX3,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG31==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG31; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="Frs_MJ3" value="{{round($etudiants->Frs_MJ3,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Frs_EX3" value="{{round($etudiants->Frs_EX3,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG32==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG32; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="Ang_MJ3" value="{{round($etudiants->Ang_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Ang_EX3" value="{{round($etudiants->Ang_EX3,2) }}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG33==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG33; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="HG_MJ3" value="{{round($etudiants->HG_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="HG_EX3" value="{{round($etudiants->HG_EX3,2) }}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG34==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG34; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="EC_MJ3" value="{{round($etudiants->EC_MJ3,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="EC_EX3" value="{{round($etudiants->EC_EX3,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG35==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG35; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="Mths_MJ3" value="{{round($etudiants->Mths_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="Mths_EX3" value="{{round($etudiants->Mths_EX3,2) }}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG36==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG36; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="PC_MJ3" value="{{round($etudiants->PC_MJ3,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="PC_EX3" value="{{round($etudiants->PC_EX3,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG37==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG37; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="SVT_MJ3" value="{{round($etudiants->SVT_MJ3,2)}}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="SVT_EX3" value="{{round($etudiants->SVT_EX3,2)}}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG38==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG38; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td><input type="text" name="EPS_MJ3" value="{{round($etudiants->EPS_MJ3,2) }}" maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    <td><input type="text" name="EPS_EX3" value="{{round($etudiants->EPS_EX3,2) }}"  maxlength="5" onBlur="controlenumero(this)" id=""></td>
                                    @if ($MG39==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG39; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if ($TOTAL5==0)
                                    <td></td>
                                    @else
                                        <td>{{ $TOTAL5; }}</td>
                                    @endif
                                    @if ($TOTAL6==0)
                                    <td></td>
                                    @else
                                        <td>{{ $TOTAL6; }}</td>
                                    @endif
                                    @if ($TOTALMG3==0)
                                    <td></td>
                                    @else
                                        <td>{{ $TOTALMG3; }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if ($Moyenne5==0)
                                    <td></td>
                                    @else
                                        <td>{{ $Moyenne5; }}</td>
                                    @endif
                                    @if ($Moyenne_Ex3==0)
                                    <td></td>
                                    @else
                                        <td>{{ $Moyenne_Ex3; }}</td>
                                    @endif
                                    @if ($MG3M==0)
                                    <td></td>
                                    @else
                                        <td>{{ $MG3M; }}</td>
                                    @endif
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </center>
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
</center>
</body>
</html>