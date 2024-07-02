<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
  <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script> -->
    <title>Document</title>
</head>
<body>
@include('navbar')
    <div class="container">
        <center><h1>GESTION DES MATIERES ET DES NOTES DES ELEVES DANS CISCO VOHIBATO</h1></center>
        <hr><form action="{{route('logout')}}" method="POST" class="d-flex" role="search">
            @csrf
            @method('DELETE')
        </form>
        <div class="card-columns">
            <table class="table table-borderless">
                <tr>
                    <td>
                        <div class="card" style="width:400px">
                            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> -->
                            <div class="card-body bg-info">
                            <h4 class="card-title">MATIERES CEG</h4>
                            <p class="card-text">Listes des matieres des eleves au CEG.<br>
                            Pour ajouter la matiere et son coeficient. Clicquer la bouton CEG.</p>
                            <a href="liste_matiere_ceg" class="btn btn-primary">CEG</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="card" style="width:400px">
                            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> -->
                            <div class="card-body bg-info">
                            <h4 class="card-title">MATIERES LYCEE</h4>
                            <p class="card-text">Listes des matieres des eleves au LYCEE.<br>
                            Pour ajouter la matiere et son coeficient. Clicquer la bouton LYCEE.</p>
                            <a href="/liste_matiere_lycee" class="btn btn-primary">Lycee</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="card" style="width:400px">
                            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> -->
                            <div class="card-body bg-info">
                            <h4 class="card-title">Notes CEG</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="/examin" class="btn btn-primary">Notes</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="card" style="width:400px">
                            <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%"> -->
                            <div class="card-body bg-info">
                            <h4 class="card-title">Notes LYCEE</h4>
                            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                            <a href="/examin_lycee" class="btn btn-primary">Notes</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>