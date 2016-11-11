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
?>


<?php

	include "inc/conn.php";

?>
<head>
	<title>Reporte Montejo</title>
	<meta charset='utf-8'>
</head>
<body>


<style>

@import url(https://fonts.googleapis.com/css?family=Lato:400,100,300,100italic,300italic,400italic,700,700italic,900,900italic);


body{

	width: 1024px;
	margin: 0 auto;
}

.header {
    background-color: #5992C3;
    padding: 5px;
    color: white;

}

p.company {
    display: inline-block;
    font-size: 1.5em;
    padding-left: 20px;
}

p.product {
    display: inline-block;
    font-size: 1.5em;
    padding-left: 150px;
    text-align: right;
}

footer{
	font-family: lato;
	border-top: 1px solid rgba(255, 255, 255, 0.2);
    color: #FFF;
    height: 80px;
    line-height: 28px;
    padding-top: 12px;
    text-align: center;
    background-color: #5992C3;
    margin-top: 20px;
}

footer span{
	color: rgba(255, 255, 255, 0.6);
    display: inline-block;
    vertical-align: middle;
}

footer img{
	height: 25px;
    opacity: .6;
    -ms-transition: opacity 0.3s ease-in;
    -moz-transition: opacity 0.3s ease-in;
    -webkit-transition: opacity 0.3s ease-in;
    transition: opacity 0.3s ease-in;
}

footer p{
    padding: 0;
    margin: 0;
}

</style>

<div class="contenido">

<div class="header">
	<p class="company">Publicidad Green</p>
	<p class="product">Montejo</p>
</div>



<h1>Reporte fotográfico</h1>

<table width="100%" cellspacing="3" cellpadding="3" border="1" align="center">
	<tr>
		<th>id</th>
        <th>Camará</th>
		<th>Nombre</th>
		<th>Fecha</th>
		<th>Preview</th>
		
	</tr>	



<?php

	//$sql = "SELECT * FROM wrk_fotos WHERE fch_recepcion > DATE_SUB(NOW(), INTERVAL 10 MINUTE)";
	$sql = "SELECT * FROM wrk_fotos";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>" . $row["id"]. " </td><td>" . $row["num_camara"]. " </td><td> " . $row["txt_url"]. " </td><td> " . $row["fch_recepcion"].  "</td>";
            echo "<td> <a href='web/uploads/" . $row["txt_url"] . "' target='_blank'><img src='web/uploads/" . $row["txt_url"] . "' width='100px'></a></tr>";
	    }
	} else {
	    echo "0 results";
	}
	$conn->close();
	
?>

</table>

<footer>
	<p>
              <span>Powered by </span>
              <a class="footer-copyright-author" href="http://2gom.com.mx/" target="_blank"><span>2GoM</span><br><img src="images/2gom.png" alt="2GoM"></a>
            </p>
</footer>

</div>

</body>
