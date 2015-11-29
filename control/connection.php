<?php
	global $mysqli;
	$mysqli=new mysqli("localhost","root","","sii");
	if($mysqli->errno){
		echo "<h1>Fallo la conexión con la base de datos";
	}
	$mysqli->set_charset("utf8");
	global $mysqli;
?>