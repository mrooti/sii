<?php
	$opcion=seguidad($_POST['option']);//se la mandamos del boton salir
	$sesion = new Sesion();
	if($sesion->salir($opcion)){
		header('Location: ../index.php');
	}else{
		header('Location: ../index.php');
	}
?>