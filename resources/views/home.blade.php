<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.easing-sooper.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/js/jquery.sooperfish.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/js/jquery.kwicks-1.5.1.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />
    <title>Home</title>
    <style>
        /* #d-flex {
          float: right;
        } */
        /* #logo {
        float: left;
        } */
        #serif-font{
          font-family:serif;
          /* color:red; */
          font-weight:bold;
          font-size: 50px;
          text-shadow: 2px 2px #3333ff;
        }
    </style>
</head>
<body>
@include('navbar')
@if (Session::has('alert'))
  <div class="alert alert-info">
    <center>{{ Session::get('alert') }}</center>
  </div>
@endif
    <center>
      <h1 id="serif-font">BIENVENUE DANS LE GESTION DES NOTES DES ELEVES DE @foreach ($valeure as $valeure)
        {{ $valeure->Nom_ecol }}
        @endforeach
      </h1>
      <div id="main">
          
          <div id="site_content">
            <ul id="images">
              <li><img src="images/1.jpg" width="500" height="300" alt="gallery_buildings_one" /></li>
              <li><img src="images/2.jpg" width="500" height="300" alt="gallery_buildings_two" /></li>
              <li><img src="images/3.jpg" width="500" height="300" alt="gallery_buildings_three" /></li>
              <li><img src="images/4.jpg" width="500" height="300" alt="gallery_buildings_four" /></li>
              <li><img src="images/5.jpg" width="500" height="300" alt="gallery_buildings_five" /></li>
              <li><img src="images/6.jpg" width="500" height="300" alt="gallery_buildings_six" /></li>
            </ul>
        </div>
      </center>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#images').kwicks({
            max : 600,
            spacing : 2
          });
          $('ul.sf-menu').sooperfish();
        });
      </script>
     <br>
      <script type="text/javascript">
        $(document).ready(function() {
          $('#images').kwicks({
            max : 600,
            spacing : 2
          });
          $('ul.sf-menu').sooperfish();
        });
      </script>
</body>
</html>