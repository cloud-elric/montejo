
<?php

	include "inc/conn.php";

?>
<?php
	$uploaddir = 'web/uploads/';
	$newFileName = uniqid("montejo-") . '.jpg';
	$uploadfile = $uploaddir . $newFileName;

	echo '<pre>';
	if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
	    echo "File is valid, and was successfully uploaded.\n";

	    $idCamara = $_GET['idc'];
	    $sql = "INSERT INTO wrk_fotos (txt_url,num_camara)VALUES('" . $newFileName . "'," . $idCamara . ")";

		echo $sql;
		$conn->query($sql);


	} else {
	    echo "Possible file upload attack!\n";
	}

	echo 'Here is some more debugging info:';
	print_r($_FILES);

	print "</pre>";
?>