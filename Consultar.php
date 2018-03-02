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

$aliases= "CodigoDeBarras, producto.Nombre AS Nombre, FechaCad, Lote, PrecioPublico, PrecioProveedor, Cantidad, Concentracion,
		   dosis.Nombre AS nombreDosis, presentacion.Nombre AS nombrePres, viadeadmin.Nombre AS nombreVia, 
		   consumidor.Nombre AS nombreCons";

$sql = "SELECT ".$aliases." FROM producto 
		LEFT JOIN (presentacion, dosis, consumidor, viadeadmin) 
		ON (producto.idPresentacion = presentacion.idPresentacion AND producto.idDosis = dosis.idDosis AND producto.idConsumidor = consumidor.idConsumidor AND producto.idViaDeAdmin = viadeadmin.idViaDeAdmin) 
		WHERE producto.CodigoDeBarras ='".$_POST['codigo']."'";     
$result = $conn->query($sql);

if ( $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<p>".var_dump($row)."</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

/**$sql = "SELECT Nombre,CodigoDeBarras,idPresentacion,idViaDeAdmin,idDosis,PrecioProveedor,PrecioPublico,Concentracion,Cantidad,Medida,idConsumidor,FechaCad,Lote
        FROM producto WHERE CodigoDeBarras ='".$_POST['codigo']."'";      
$result = $conn->query($sql);
**/
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
		</div>
		<div>
			<!-- TABLE -->
			<div class="row">
				<div class="col s12 m12 l12">
					<table class="bordered">
						<thead>
							<tr>
								<th>Código de Barras</th>
								<th>Nombre</th>
								<th>Fecha de caducidad</th>
								<th>Lote</th>
								<th>Precio al público</th>
								<th>Precio unitario</th>
								<th>Cantidad</th>
								<th>Concentración</th>
								<th>Dosis</th>
								<th>Presentación</th>
								<th>Vía de Administración</th>
								<th>Medicamento para</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>	
									<?php echo $row['CodigoDeBarras']?>
								</td>
								<td>	
									<?php echo $row['Nombre']?>
								</td>
								<td>	
									<?php echo $row['FechaCad']?>
								</td>
								<td>	
									<?php echo $row['Lote']?>
								</td>
								<td>	
									<?php echo $row['PrecioPublico']?>
								</td>
								<td>	
									<?php echo $row['PrecioProveedor']?>
								</td>
								<td>	
									<?php echo $row['Cantidad']?>
								</td>
								<td>	
									<?php echo $row['Concentracion']?>
								</td>
								<td>	
									<?php echo $row['nombreDosis']?>
								</td>
								<td>	
									<?php echo $row['nombrePres']?>
								</td>
								<td>	
									<?php echo $row['nombreVia']?>
								</td>
								<td>	
									<?php echo $row['nombreCons']?>
								</td>
							</tr>
						</tbody>
					</table>	
				</div>
			</div>	
			<div class="container">
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
		</div>
	</body>
</html>