<?php
$servername = "localhost";
$username = "farmacia";
$password = "farmacia";
$dbname = "farmacia"; 
$idVia = 0;
$idMedida = 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Nombre,CodigoDeBarras,idPresentacion,idViaDeAdmin,idDosis,PrecioProveedor,PrecioPublico,Concentracion,Cantidad,Medida,idConsumidor,FechaCad,Lote
        FROM producto WHERE CodigoDeBarras ='".$_POST['codigo']."'";      
$result = $conn->query($sql);

if ( $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<p>".var_dump($row)."</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT Nombre,CodigoDeBarras,idPresentacion,idViaDeAdmin,idDosis,PrecioProveedor,PrecioPublico,Concentracion,Cantidad,Medida,idConsumidor,FechaCad,Lote
        FROM producto WHERE CodigoDeBarras ='".$_POST['codigo']."'";      
$result = $conn->query($sql);

$conn->close();


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Consultar</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen">
	</head>
	<body>
		<div class="container">
			<!-- LOGO --> 
			<div class="row">
				<div class="col s12 m4 push-m4">
					<img src="Logo.png" width="350" height="180" alt="Logo">
				</div>
			</div>

			<!-- TABLE -->
			<div class="row">
				<div class="col s12 m12">
					<table class="bordered">
						<thead>
							<tr>
								<th></th>
								<th>Información del producto</th>
							</tr>
						</thead>
						<tr>
							<td>	
								<b>Código de Barras</b>
							</td>
							<td>	
								<?php echo $row['CodigoDeBarras']?>
							</td>
						</tr>
						<tr>
							<td>	
								<b>Nombre</b>
							</td>
							<td>	
								<?php echo $row['Nombre']?>
							</td>
						</tr>
						<tr>
							<td valign="top">	
								<b>Ingrediente Activo</b>
							</td>
							<td>	
								
							</td>
						</tr>
						<tr>
							<td>	
								<b>Fecha de caducidad</b>
							</td>
							<td>	
								<?php echo $row['FechaCad']?>
							</td>
						</tr>
						<tr>
							<td>	
								<b>Lote</b>
							</td>
							<td>	
								<?php echo $row['Lote']?>
							</td>
						</tr>
						<tr>
							<td>	
								<b>Precio al público</b>
							</td>
							<td>	
								<?php echo $row['PrecioPublico']?>
							</td>
						</tr>
						<tr>
							<td>	
								<b>Precio unitario</b>
							</td>
							<td>	
								<?php echo $row['PrecioProveedor']?>
							</td>
						</tr>
						<tr>
							<td>	
								<b>Cantidad</b>
							</td>
							<td>	
								<?php echo $row['Cantidad']?>
							</td>
						</tr>
						<tr>
							<td>	
								<b>Concentración</b>
							</td>
							<td>	
								<?php echo $row['Concentracion']?>
							</td>
						</tr>
						<tr>
							<td>	
								<b>Vía de administración</b>
							</td>
							<td>	
								<?php echo $row['idViaDeAdmin']?>
							</td>
						</tr>
						<tr>
							<td>	
								<b>Medicamento para</b>
							</td>
							<td>	
								<?php echo $row['idConsumidor']?>
							</td>
						</tr>
					</table>	
				</div>
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
	</body>
</html>