<?php


	$servername = "localhost";
	$username 	= "particip_GeekDev";
	$password 	= "c0d1ngG33k";
	$dbname 	= "particip_yucatan";
	

/*
	$servername = "localhost";
	$username 	= "unahisto__leonre";
	$password 	= "bMgebuuZs123$";
	$dbname 	= "unahisto__2gom_rey_leon";
*/

	// Create connection
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	//echo "Connected successfully";

?>