<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Actualizar</title>
		<!--Import Google Icon Font-->
		<link href="css/icons.css" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen">
	</head>

	<!-- BODY -->
	<?php
	$id='';
	$mysqli = new mysqli('localhost','farmacia','farmacia','farmacia');
	if(isset($POST['Actualizar'])){
		$kd = $_POST['id'];
		$nombre = $_POST['nombre'];
		$fecha = $_POST['fecha'];
		$lote = $_POST['lote'];
		$preciop = $_POST['preciop'];
		$preciou = $_POST['preciou'];
	}
	?>
	<body class=" light-blue lighten-3">
		<div class="container  light-blue lighten-3">	
			<!-- LOGO --> 
			<div class="row">
				<div class="col s12 m4 push-m4">
					<img src="Logo.png" width="350" height="180" alt="Logo">
				</div>
			</div>
			
			<!-- FORM -->
			<div class="row light-blue lighten-3">
				<form class="col s12" action="AgregarDatos.php" method="POST">
					<div class="row light-blue lighten-4">
						<div class="s12 m12 center">
							<h3>Registro de producto</h3>
						</div>
					</div>
					<div class="row light-blue lighten-5">
						<div class="input-field col s6 m6">
							<input placeholder="Ej. 1010101010101" id="codigo" name="codigo" type="text" class="validate">
							<label for="codigo">Código de barras</label>
						</div>
						<div class="input-field col s6 m6">
							<input id="name" name="name" type="text" class="validate">
							<label for="name">Nombre</label>
						</div>
					</div>
					<div id="ingredientes_wrapper" class="row light-blue lighten-5">
						<div  class="input-field col s4 m5">
							<input id="ingrediente_0" class="ingrediente" name="ingrediente_0" data-num="0" type="text">
							<label for="ingrediente_0">Ingrediente Activo 1</label>
						</div>
						<div  class="input-field col s4 m5">
							<input id="concent_0" class="concent" name="concent_0" data-num="0" type="text">
							<label for="concent_0">Concentración 1</label>
						</div>
						<div  class="input-field col s4 m2">
							<select id="med_0" name="med_1">
								<option value="1">mg</option>
								<option value="2">unidades</option>
								<option value="3">ml</option>
								<option value="4">gotas</option>
								<option value="5">grano</option>
								<option value="6">lt</option>
							</select>
							<label for="med_0">Medida 1</label>
						</div>
					</div>
					<div class="row">	
						<div class="input-field col s12 m12">
							<a id="agregar_ingredientes" class="waves-effect waves-light btn">Agregar Ingrediente</a>
						</div>
					</div>
				

					<div class="row light-blue lighten-5">
						<div class="input-field col s6 m6">
							<input id="fecha" name="fecha" type="text" class="datepicker">
							<label for="fecha">Fecha de caducidad</label>
						</div>
						<div class="input-field col s6 m6">
							<input id="lote" name="lote" type="text" class="validate">
							<label for="lote">Lote</label>
						</div>
					</div>

					<div class="row light-blue lighten-5">
						<div class="input-field col s6 m6">
							<input id="precio_pub" name="precio_pub" type="text" class="validate">
							<label for="precio_pub">Precio al público</label>
						</div>
						<div class="input-field col s6 m6">
							<input id="precio_un" name="precio_un" type="text" class="validate">
							<label for="precio_un">Precio unitario</label>
						</div>
					</div>
					<div class="row light-blue lighten-5">
		  				<div class="input-field col s4 m6">
							<input id="cantidad" name="cantidad" type="text" class="validate">
							<label for="cantidad">Cantidad</label>
						</div>
						<div class="input-field col s4 m3">
							<select id="presentacion" name="presentacion" >
								<option value="1">Tabletas</option>
								<option value="2">Perlas</option>
								<option value="3">Cápsulas</option>
								<option value="4">Polvos</option>
								<option value="5">Pastillas</option>
								<option value="6">Supositorios</option>
								<option value="7">Pastillas</option>
								<option value="8">Óvulos</option>
								<option value="9">Inyecciones</option>
							</select>
							<label>Presentación</label>
						</div>
						<div class="input-field col s4 m3">
							<select id="via" name="via">
								<option value="1">Oral</option>
								<option value="2">Rectal</option>
								<option value="3">Sublingual</option>
								<option value="4">Respiratoria</option>
							</select>
							<label>Vía de administración</label>
						</div>
					</div>
					<div class="row light-blue lighten-5">
						<div class="input-field col s12 m12">
							<select name>
								<option value="1">Adultos</option>
								<option value="2">Infantes</option>
								<option value="3">Pediatricos</option>
							</select>
							<label>Medicamento para</label>
						</div>
					</div>
					<input id="num_ing" type="hidden" name="num_ing" value="1">
					<div class="row light-blue lighten-5">
						<div class="input-field col s12 m12">
							<button class="btn waves-effect waves-light" type="submit" name="action">
								Agregar <i class="material-icons right">send</i>
							</button>
						</div>
					</div>
				</form>
			</div>
			<div class="row light-blue lighten-2">		
				<div class="input-field col s12 m6">	
					<a class="waves-effect waves-light btn" href='Principal.html'>
						Regresar <i class="material-icons right">arrow_back	</i>
					</a>
				</div>
				<div class="input-field col s12 m6 right-align">
					<a class="waves-effect waves-light btn" href='Login.html'>
						Salir <i class="material-icons right">close</i>
					</a>
				</div>	
			</div>
		</div>

		<!--Import jQuery before materialize.js-->
		<script src="js/jquery-3.3.1.min.js"></script>
		<!-- Compiled and minified JavaScript -->
 		<script src="js/materialize.min.js"></script>
		<script src="js/agregar.js"></script>
	</body>
</html>
