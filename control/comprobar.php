<?php
	include("connection.php");
	session_start();
	if(isset($_SESSION['usuario'])&&!empty($_SESSION['tipo'])){
		switch(){
			case 1://alumno
				
			break;
			case 2://administrador

			break;
			case 3://tutor

			break;
			case 4://profesor

			break;
		}
	}
	else{
		header("../index.php");
	}
	
?>