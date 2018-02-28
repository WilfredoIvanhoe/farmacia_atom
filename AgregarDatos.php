<?php 
$servername = "localhost";
$username = "farmacia";
$password = "farmacia";
$dbname = "farmacia"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Obtenemos las variables
$num = $_POST['num_ing'];
$codigo = $_POST['codigo'];
$name = $_POST['name'];
$fecha = $_POST['fecha'];
$lote = $_POST['lote'];
$precio_pub = $_POST['precio_pub'];
$precio_un = $_POST['precio_un'];
$cantidad = $_POST['cantidad'];
$concentracion = $_POST['concentracion'];
$medidas = $_POST['medidas'];
$presentacion = $_POST['presentacion'];
$via = $_POST['via'];

$sql = "INSERT INTO producto(Nombre,CodigoDeBarras,idPresentacion,idViaDeAdmin,idDosis,PrecioProveedor,PrecioPublico,Cantidad,Medida,idConsumidor,fechaCad)
        VALUES ('".$name."','".$codigo."','".$presentacion."','".$via."','1','".$precio_un."','".$precio_pub."','".$cantidad."','".$medidas."','1','".$fecha."')";

//echo "<p>" . $sql . "</p>";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
<html>
<hEAD>
 <title>Agregar Productos</title>
</head>
<body>
    <?php //print_r($_POST); ?>
</body>
</html>