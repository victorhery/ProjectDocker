<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stat</title>
    <link rel="stylesheet" type="text/css" href="Styl_Stat.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('bootstrap/js/Chart.js')}}"></script>
    <script src="{{asset('bootstrap/js/jquery.min.js')}}"></script>
</head>
<body>
@include('navbar')
<div id="corps2">
  <center><h1><b>Moyenne de class des élèves en {{ $classe }}, pendant l'année scolaire {{ $annee_scolaire }} </b></h1></center>
  <div width="40%" height='40%'>
      <canvas id="myChart"></canvas>
  </div>
    <script>
      const ctx = document.getElementById('myChart');
    
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['1ére Trimestre', '3ére Trimestre', '3ére Trimestre'],
          datasets: [{
            label: "Moyenne de classe",
            data: [{{ $MOYENNE_CLASSE1 }}, {{ $MOYENNE_CLASSE2 }}, {{ $MOYENNE_CLASSE3 }}],
          }],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
</div>
</body>
</html>