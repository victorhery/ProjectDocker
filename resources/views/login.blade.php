
<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('js/controle_champ.js')}}"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	@include('navbar_auth')
	<div id="corps2">
		<h1><center>Authentification des CEG dans la Cisco VOHIBATO</center></h1>
        @if(Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error')}}
        </div>
        @endif
		<form action="{{route('login')}}" method="POST">
		@csrf
			<table class="table table-borderless">
				<tr>
					<td>ZAP : </td>
					<td>
						<select name="Zap" class="form-control" id="">
							@foreach ($zap as $nom_zap)
								<option value="{{ $nom_zap->Zap }}">{{ $nom_zap->Zap }}</option>
							@endforeach  
							
						</select>
					</td>
				</tr>
				
				<tr>
					<td>ECOLE : </td>
					<td>
						<select name="Nom_ecol" class="form-control" id="">
							@foreach ($ecoles_ceg as $Nom_ecol)
								<option value="{{ $Nom_ecol }}">{{ $Nom_ecol }}</option>
							@endforeach  
                        </select>
					</td>
				</tr>
				<tr>
					<td>Utilisateur :</td>
					<td><input type="text" name="name" placeholder=" nom" class="form-control"  required autocomplete='off'></td>
				</tr>
				<tr>
					<td>Mot de passe : </td>
					<td>
						<div class="input-group mb-3">
							<input type="password" name="password" id="mdpconfirm" placeholder="mot de passe" class="form-control" required>
							<div class="input-group-append">
								<button type="button" class="input-group-text" onclick="togglePwd('mdpconfirm')">
									Afficher
								</button>
							</div>
						</div>
					</td>
				</tr>
			</table>
			<br><table  class="table table-borderless">
                <tr>
					{{-- <td><a href="register" class="btn btn-info">S'inscrir</a></td> --}}
                    <td colspan="2"><center><input type="submit" name="submit1" value="Se connecter" class="btn btn-info"></center></td>
                </tr>
            </table>
		</form>
	</div>
	{{-- <script>
        "use strict";
        function togglePwd(id) {
            var x=document.getElementById(id);
            x.type=(x.type ==="password")? "text" : "password";
            
        }
        if (x.type ==="password") {
                x.type="text";
            }
            else{
                x.type="password";
            }
    </script> --}}
</body>
</html>
