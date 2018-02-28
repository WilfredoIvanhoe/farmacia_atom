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
    
    $sql = "DELETE FROM producto WHERE CodigoDeBarras = '".$_POST['codigo']."'";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
?>