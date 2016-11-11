<?php

	include "inc/conn.php";

?>

<?php

	$nombre 	= $_GET['nombre'];
	$apellido  	= $_GET['apellido'];
	$email  	= $_GET['email'];
	$telefono 	= $_GET['telefono'];
	$sexo  		= $_GET['sexo'];


	$sql = "INSERT INTO ent_correos_fotos (txt_nombre, txt_apellido, txt_correo,txt_telefono, txt_sexo)VALUES('" . $nombre . "','" . $apellido . "','" . $email . "','" . $telefono . "','" . $sexo . "')";

	echo $sql;

	$conn->query($sql);

	$id = mysqli_insert_id($conn);

	echo "<br> id " . $id;


	$uploaddir = 'web/uploads/';
	$newFileName = uniqid("King2-") . '.jpg';
	$uploadfile = $uploaddir . $newFileName;

	echo '<pre>';
	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
	    echo "File is valid, and was successfully uploaded.\n";
	} else {
	    echo "Possible file upload attack!\n";
	}

	echo 'Here is some more debugging info:';
	print_r($_FILES);

	print "</pre>";

	$sql = "UPDATE ent_correos_fotos SET txt_nombre_imagen='" . $newFileName . "' WHERE id_correo_foto=" . $id;

	$conn->query($sql);

	//$img = "http://" . $_SERVER['SERVER_NAME'] . "/test/wwwReyLeonS/uploads/" . $newFileName;
	$img = "http://" . $_SERVER['SERVER_NAME'] . "/rleon/uploads/" . $newFileName;

    $message = "Puedes descargar tu imagen del Rey Leon aqui " . $img ;

    echo $message;

	//$url = 'http://sms-tecnomovil.com/SvtSendSms?username=PIXERED&password=CARLOS&message=' . urlencode ($message) .'&numbers=' . $telefono;
	$url = 'http://sms-tecnomovil.com/SvtSendSms?username=PIXERED&password=Pakabululu01&message=' . urlencode ($message) .'&numbers=' . $telefono;
    		
            $sms = file_get_contents($url);

    echo $sms;        

?>