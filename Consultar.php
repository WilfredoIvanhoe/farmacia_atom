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
					<table class="stripped">
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
								<th>Ingredientes Activos</th>
							</tr>
						</thead>
						<tbody>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "farmacia"; 
$id = '';


// FORM INPUTS
$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$ingrediente = $_POST['ingrediente'];

//Main query
$sql = <<< EOD
		SELECT 
			producto.idProducto AS ID, CodigoDeBarras, producto.Nombre AS Nombre,PrecioPublico, PrecioProveedor,
			Cantidad, producto.Concentracion as Concentracion, Lote, Caducidad, dosis.Nombre AS nombreDosis,
			presentacion.Nombre AS nombrePres, viadeadmin.Nombre AS nombreVia, consumidor.Nombre AS nombreCons
		FROM
			producto
		LEFT JOIN 
			(producto_inventario, presentacion, dosis, consumidor, viadeadmin)
		ON
			(producto.idPresentacion = presentacion.idPresentacion AND producto.idDosis = dosis.idDosis 
			AND producto.idConsumidor = consumidor.idConsumidor AND producto.idViaDeAdmin = viadeadmin.idViaDeAdmin 
			AND producto.idProducto = producto_inventario.idProducto) 
EOD;

//CHECK IF AT LEAST ONE IS NOT EMPTY
if(isset($codigo) && !trim($codigo) == ''){
	$where = "WHERE producto.CodigoDeBarras ='".$codigo."'";
	$sql = $sql.$where; 
}
elseif(isset($nombre) && !trim($nombre) == ''){
	$where = "WHERE producto.Nombre ='".$nombre."'";
	$sql = $sql.$where; 
}elseif(isset($ingrediente) && !trim($ingrediente) == ''){
	$where = "WHERE ingactivo.Nombre ='".$ingrediente."'";
	//IN THIS CASE THE QUERY IS DIFFERENT
	$sql = <<< EOD
		SELECT 
			producto.idProducto AS ID, CodigoDeBarras, producto.Nombre AS Nombre,PrecioPublico, PrecioProveedor,
			Cantidad, CONCAT(producto.Concentracion,' ',producto.medida) AS Concentracion, Lote, Caducidad,
			CAST(CONVERT(dosis.Nombre USING utf8) AS binary) AS nombreDosis, presentacion.Nombre AS nombrePres, viadeadmin.Nombre AS nombreVia,
			consumidor.Nombre AS nombreCons
		FROM
			ingactivo
		LEFT JOIN 
			(producto, producto_inventario, presentacion, dosis, consumidor, viadeadmin)
		ON
			(producto.idPresentacion = presentacion.idPresentacion AND producto.idDosis = dosis.idDosis 
			AND producto.idConsumidor = consumidor.idConsumidor AND producto.idViaDeAdmin = viadeadmin.idViaDeAdmin 
			AND ingactivo.idProducto = producto_inventario.idProducto AND ingactivo.idProducto = producto.idProducto)
		$where;
EOD;

}else{
	echo '<p> FAVOR DE LLENAR AL MENOS UN DATO</p>';
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
		
$result = $conn->query($sql);
//echo '<p>'.$sql.'</p>';


/** PRINTING THE TABLE BODY **/
if ( $result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		//echo "<p>".var_dump($row)."</p>";
		$id = $row['ID'];
		$sql2 = "select CONCAT(Nombre,' ',Concentracion,Medida) AS ingrediente from ingactivo WHERE idProducto='".$id."'";
		$result2 = $conn->query($sql2);
		//PRINTING A ROW
		echo <<<EOT
		<tr>
			<td>
				{$row['CodigoDeBarras']}
			</td>
			<td>	
				{$row['Nombre']}
			</td>
			<td>	
				{$row['Caducidad']}
			</td>
			<td>	
				{$row['Lote']}
			</td>
			<td>	
				$ {$row['PrecioPublico']}
			</td>
			<td>	
				$ {$row['PrecioProveedor']}
			</td>
			<td>	
				{$row['Cantidad']}
			</td>
			<td>	
				{$row['Concentracion']}
			</td>
			<td>	
				{$row['nombreDosis']}
			</td>
			<td>	
				{$row['nombrePres']}
			</td>
			<td>	
				{$row['nombreVia']}
			</td>
			<td>	
				{$row['nombreCons']}
			</td>
			<td>
			<a href="http://localhost/Actualizar.php/?id"> Editar </a>
			
EOT;
		if ( $result2->num_rows > 0) 
			while($row2 = $result2->fetch_assoc()) 
				echo '<p>'.$row2['ingrediente'].'</p>';
		else 
			echo mysql_error();
		echo " </td> </tr>";
	}
}else {
    echo "Error: No se encontró ningun registro. <br>" . $conn->error;
}

$conn->close();
?>						
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
