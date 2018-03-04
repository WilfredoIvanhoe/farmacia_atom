<?php ini_set('display_errors','on');

$servername = "localhost";
$username = "root";
$password = "";
$database = "farmacia";

// RESCATANDO ALL VALUES

	foreach($_POST as $nombre_campo => $valor){ 
		$asignacion = "\$".$nombre_campo."='".trim($valor)."';"; 
		eval($asignacion); 
    }
	/*$x = $_POST["id"];*/

// CREATE AND CHECK CONNECTION
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn){ die("Connection failed: " . mysqli_connect_error()); }
	mysqli_query($conn, "SET NAMES 'utf8'");

//STARTS PROGRAM

	if($contrasena==$validacion){
		$sql = "UPDATE producto SET Nombre='$nombre',CodigodeBarras='$codigodebarras',idPresentacion='$presentacion',idViaDeAdmin='$viadeadmin',idDosis='$iddosis',PrecioProveedor='$precioproveedor',PrecioPublico='$preciopublico',Cantidad='$cantidad',Concentracion='$concentracion',Medida='$medida',idConsumidor='$idconsumidor',laboratorio='$laboratorio'
		WHERE ;
    $resultado = mysqli_query($conn, $sql);
	}
	echo mysqli_affected_rows($conn);
exit; 
?>
