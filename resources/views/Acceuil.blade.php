<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil</title>
    <style>
        @charset "UTF-8";
        /*CCS Document */

	 section{
            width: 100%;
            height: 100%;
            text-align: middle;
            padding-top: 15%;
            padding-bottom: 15%;
        }
        section span{
			font: bold 25px Arial;
            font-size: 190px;
            
            font-family:serif;
          font-weight:bold;
          /* font-size: 100px; */
          text-shadow: 2px 2px #3333ff;
        }   
        body{ 
        background-image: url("images/1.jpg"); 
        background-repeat: no-repeat;
        background-size: cover;
     }
    </style>
</head>
<body>
    @include('navbar_auth')
    <section align="middle">
        <span style="color: #292939;">B</span>
        <span style="color: #292939;">I</span>
        <span style="color: #292939;">E</span>
        <span style="color: #6666ff;">N</span>
        <span style="color: #6666ff;">V</span>
        <span style="color: #6666ff;">E</span>
        <span style="color: #793f5c;">N</span>
        <span style="color: #793f5c;">U</span>
        <span style="color: #793f5c;">E</span>
    </section>
</body>
</html>