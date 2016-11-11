<?php
/*
$realm = 'Restricted area';

//user => password
$users = array('admin' => 'rleon2016');


if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Text to send if user hits Cancel button';
    exit;
} else {
    echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";

    if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])){
    	echo "Error de credenciales";
    	exit();
    }else if({}
}
 
*/


 header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="Reporte.csv";');

?><?php

	include "inc/conn.php";

?>
id,Nombre,Apellidos,Correo,Telefono,Sexo,Fecha,Foto
<?php


   


	$sql = "SELECT * FROM ent_correos_fotos";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "" . $row["id_correo_foto"]. " , " . $row["txt_nombre"]. " , " . $row["txt_apellido"].  " , " . $row["txt_correo"]. " , " . $row["txt_telefono"] . " , " . $row["txt_sexo"]. " , " . $row["fch_foto"] . " , " . $row["txt_nombre_imagen"]. "\n\r";
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
	
?>
