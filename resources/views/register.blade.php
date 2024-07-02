
<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
	@include('navbar_auth')
	<div id="corps2">
		<h1><center>Ajout d'authentification des écoles dans la Cisco VOHIBATO</center></h1>
        @if(Session::has('succes'))
        <center><div class="alert alert-success" role="alert">{{ Session::get('succes')}}</div></center>
        @endif
		<ul>
            <!-- message d'eureur -->
            @foreach ($errors->all() as $error)
                <li class="alert alert-danger"> {{ $error }} </li>
            @endforeach
        </ul>
		<form action="{{route('register')}}" method="POST">
		@csrf
			<table class="table table-borderless">
			<tr>
					<td>DRN : </td>
					<td>
						<select name="DRN" class="form-control" id="">
							<option value="HAUTE MATSIATRA">HAUTE MATSIATRA</option>
						</select>
						<!-- <input type="text" name="" placeholder="DRN"   required>  -->
					</td>
				</tr>

				<tr>
					<td>CODE DRN : </td>
					<td>
						<select name="code_DRN" class="form-control" id="">
							<option value="15">15</option>
						</select>
						<!-- <input type="text" name="" placeholder="Code DRN" class="form-control"  required>  -->
					</td>
				</tr>
				<tr>
					<td>CISCO : </td>
					<td>
						<select name="Cisco" class="form-control" id="">
							<option value="VOHIBATO">VOHIBATO</option>
						</select>
						<!-- <input type="text" name="" placeholder="Cisco" class="form-control"  required>  -->
					</td>
				</tr>
				<tr>
					<td>CODE CISCO : </td>
					<td>
						<select name="code_Cisco" class="form-control" id="">
							<option value="326">326</option>
						</select>
						<!-- <input type="text" name="" placeholder="Code Cisco" class="form-control"  required>  -->
					</td>
				</tr>
				<tr>
					<td>COMUNE : </td>
					<td>
						<input type="text" name="commune" placeholder="COMUNE" class="form-control"  required> 
					</td>
				</tr>
				<tr>
					<td>CODE COMUNE : </td>
					<td>
						<input type="text" name="code_commune" placeholder="Code Comune" class="form-control"  required> 
					</td>
				</tr>
				<tr>
					<td>ZAP : </td>
					<td>
						<select name="Zap" class="form-control" id="">
							<Option>VINANITELO</Option>
							<Option>VOHIBATO-OUEST</Option>
							<Option>TALATA-AMPANO</Option>
							<Option>SOAINDRANA</Option>
							<Option>MANEVA</Option>
							<Option>MAHASOABE</Option>
							<Option>MAHADITRA</Option>
							<Option>IHAZOARA</Option>
							<Option>ANKAROMALAZA-MIFANASOA</Option>
							<Option>ANDRANOVORIVATO</Option>
							<Option>ANDRANOMIDITRA</Option>
							<Option>ALAKAMISY-ITENINA</Option>
							<Option>VOHIMARINA</Option>
							<Option>VOHITRAFENO</Option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>FOKOTANY : </td>
					<td>
						<input type="text" name="fokontany" placeholder="fokontany" class="form-control"  required> 
					</td>
				</tr>
				<tr>
					<td>CODE FOKOTANY : </td>
					<td>
						<input type="text" name="code_fokontany" placeholder="Code Fokotany" class="form-control"  required> 
					</td>
				</tr>
				<tr>
					<td>Quartier : </td>
					<td>
						<input type="text" name="quartier" placeholder="quartier" class="form-control"  required> 
					</td>
				</tr>
				<tr>
					<td>Niveau : </td>
					<td>
						<center>
							<div id="radio" name="divisins">
								<input type="radio" id="ceg" name="divisins" value="ceg" @checked(true)><label for="CEG">CEG </label>
								<input type="radio" id="lyc" name="divisins" value="lycee"><label for="LYCEE">LYCEE   </label>
							</div>
						</center>
					</td>
				</tr>
				<tr>
					<td>ECOLE : </td>
					<td>
						<input type="text" name="Nom_ecol" placeholder="Nom Ecol" class="form-control"  required> 
					</td>
				</tr>
				<tr>
					<td>CODE ECOLE : </td>
					<td>
						<input type="text" name="code_Nom_ecol" placeholder="Code Ecol" class="form-control"  required> 
					</td>
				</tr>
				<tr>
					<td>Utilisateur :</td>
					<td><input type="text" name="name" placeholder=" nom" class="form-control"  required autocomplete='off'></td>
				</tr>
				<tr>
					<td>Mot de passe : </td>
					<td><input type="password" name="password" placeholder="mot de passe" class="form-control" required></td>
				</tr>
			</table>
			<table  class="table table-borderless">
                <tr>
                    {{-- <td><a href="login" class="btn btn-primary">S'AUTHENTIFIER</a></td> --}}
                    <td><center><input type="submit" name="submit1" value="S'inscrir" class="btn btn-info"></center></td>
                </tr>
            </table>
			
		</form>
	</div>
</body>
</html>
