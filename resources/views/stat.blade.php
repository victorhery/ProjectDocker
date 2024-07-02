<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('bootstrap/js/Chart.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
<style>
   #echel{
    width: 25Spx;
    height: 13px;
   }
</style>
<body>
@include('navbar')
<div class="container" id="corps2">
    <form action="/stat_par_class_get" method="GET">
        @csrf
        <div class="row">
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
        </div><br>
        <center><input type="submit"  class="btn btn-info" value="Afficher"></center>
    </form>
</div>
</body>
