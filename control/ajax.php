<?php
	include("connection.php");
	include("security.php");
	switch(seguridad($_GET['option'])){
		case 1:
			if(isset($_POST['estado'])){
				if(seguridad($_POST['estado'])!=""){
					$estado=seguridad($_POST['estado']);
					$resultado=$mysqli->query("SELECT Id_Municipio,Municipio FROM municipio m INNER JOIN estado e ON e.Id_Estado=m.Id_Estado WHERE e.Id_Estado={$estado}")or die("Error en :".$mysqli->error);
					while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
						echo "<option value=\"{$row['Id_Municipio']}\">{$row['Municipio']}</option>";
					}
				}
			}
			$mysqli->close();
		break;
		case 2:
			if(isset($_POST['municipio'])){
				if(seguridad($_POST['municipio'])!=""){
					$municipio=$_POST['municipio'];
					$resultado=$mysqli->query("SELECT Id_Localidad, Localidad FROM localidad l INNER JOIN municipio m ON m.Id_Municipio=l.Id_Municipio WHERE m.Id_Municipio={$municipio}")or die("Error en: ".$mysqli->error);
					while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
						echo "<option value={$row['Id_Localidad']}>{$row['Localidad']}</option>";
					}
				}
			}
			$mysqli->close();
		break;
		case 3://Alta de Alumnos
			if(isset($_POST['nombre'])&&isset($_POST['apellido_p'])&&isset($_POST['apellido_m'])){
				$nombre=seguridad($_POST['nombre']);
				$apellido_p=seguridad($_POST['apellido_p']);
				$apellido_m=seguridad($_POST['apellido_m']);
				$sexo=seguridad($_POST['sexo']);
				$direccion=seguridad($_POST['direccion']);
				$localidad=seguridad($_POST['localidad']);
				$codigo=seguridad($_POST['codigo']);
				$fecha=seguridad($_POST['fecha']);
				$curp=seguridad($_POST['curp']);
				$contrasena=seguridad($_POST['contrasena']);
				$contrasena=hash('sha256', md5($contrasena));//encriptando contrasena
				$ruta="Img/alumno/";//ruta para imagenes
				if($mysqli->query("INSERT INTO alumno (Id_Alumno, Nombres, Apellido_P, Apellido_M, Sexo, Direccion, Id_Localidad, CP, Fecha_Nacimiento, Curp, Img, Password, Estado) VALUES(DEFAULT,'{$nombre}','{$apellido_p}','{$apellido_m}','{$sexo}','{$direccion}','{$localidad}','{$codigo}','{$fecha}','{$curp}','..','{$contrasena}','1')")){
					echo "success";
				}
				else{
					echo "error_1";
				}
			}
			else{
				echo "error_2";
			}
			$mysqli->close();
		break;
		case 4://Alta de administrador
			if(isset($_POST['nombre'])&&isset($_POST['apellido_p'])&&isset($_POST['apellido_m'])){
				$nombre=seguridad($_POST['nombre']);
				$apellido_p=seguridad($_POST['apellido_p']);
				$apellido_m=seguridad($_POST['apellido_m']);
				$sexo=seguridad($_POST['sexo']);
				$direccion=seguridad($_POST['direccion']);
				$localidad=seguridad($_POST['localidad']);
				$codigo=seguridad($_POST['codigo']);
				$fecha=seguridad($_POST['fecha']);
				$curp=seguridad($_POST['curp']);
				$contrasena=seguridad($_POST['contrasena']);
				$contrasena=hash('sha256', md5($contrasena));//encriptando contrasena
				$ruta="Img/alumno/";//ruta para imagenes
				$telefono=seguridad($_POST['telefono']);
				$mail=seguridad($_POST['mail']);
				if($mysqli->query("INSERT INTO administrador (Id_Administrador, Nombres, Apellido_P, Apellido_M, Sexo, Direccion, Id_Localidad, CP, Fecha_Nacimiento, Curp, Email, Telefono, Img, Password, Estado) VALUES(DEFAULT,'{$nombre}','{$apellido_p}','{$apellido_m}','{$sexo}','{$direccion}','{$localidad}','{$codigo}','{$fecha}','{$curp}','{$mail}','{$telefono}','..','{$contrasena}','1')")){
					echo "success";
				}
				else{
					echo "error_1";
				}
			}
			else{
				echo "error_2";
			}
			$mysqli->close();
		break;
		case 5://Alta de profesor
			if(isset($_POST['nombre'])&&isset($_POST['apellido_p'])&&isset($_POST['apellido_m'])){
				$nombre=seguridad($_POST['nombre']);
				$apellido_p=seguridad($_POST['apellido_p']);
				$apellido_m=seguridad($_POST['apellido_m']);
				$sexo=seguridad($_POST['sexo']);
				$direccion=seguridad($_POST['direccion']);
				$localidad=seguridad($_POST['localidad']);
				$codigo=seguridad($_POST['codigo']);
				$fecha=seguridad($_POST['fecha']);
				$curp=seguridad($_POST['curp']);
				$contrasena=seguridad($_POST['contrasena']);
				$contrasena=hash('sha256', md5($contrasena));//encriptando contrasena
				$ruta="Img/alumno/";//ruta para imagenes
				$telefono=seguridad($_POST['telefono']);
				$mail=seguridad($_POST['mail']);
				$cedula=seguridad($_POST['cedula']);
				if($mysqli->query("INSERT INTO profesor (Id_Profesor, Nombres, Apellido_P, Apellido_M, Sexo, Direccion, Id_Localidad, CP, Fecha_Nacimiento, Curp, Email, Telefono, Cedula, Img, Password, Estado) VALUES(DEFAULT,'{$nombre}','{$apellido_p}','{$apellido_m}','{$sexo}','{$direccion}','{$localidad}','{$codigo}','{$fecha}','{$curp}','{$mail}','{$telefono}','{$cedula}','..','{$contrasena}','1')")){
					echo "success";
				}
				else{
					echo "error_1";
				}
			}
			else{
				echo "error_2";
			}
			$mysqli->close();
		break;
		case 6://alta de tutor
			if(isset($_POST['nombre'])&&isset($_POST['apellido_p'])&&isset($_POST['apellido_m'])){
				$nombre=seguridad($_POST['nombre']);
				$apellido_p=seguridad($_POST['apellido_p']);
				$apellido_m=seguridad($_POST['apellido_m']);
				$sexo=seguridad($_POST['sexo']);
				$direccion=seguridad($_POST['direccion']);
				$localidad=seguridad($_POST['localidad']);
				$codigo=seguridad($_POST['codigo']);
				$fecha=seguridad($_POST['fecha']);
				$curp=seguridad($_POST['curp']);
				$contrasena=seguridad($_POST['contrasena']);
				$contrasena=hash('sha256', md5($contrasena));//encriptando contrasena
				$ruta="Img/alumno/";//ruta para imagenes
				$telefono=seguridad($_POST['telefono']);
				$mail=seguridad($_POST['mail']);
				if($mysqli->query("INSERT INTO tutor (Id_Tutor, Nombres, Apellido_P, Apellido_M, Sexo, Direccion, Id_Localidad, CP, Fecha_Nacimiento, Curp, Email, Telefono, Img, Password, Estado) VALUES(DEFAULT,'{$nombre}','{$apellido_p}','{$apellido_m}','{$sexo}','{$direccion}','{$localidad}','{$codigo}','{$fecha}','{$curp}','{$mail}','{$telefono}','..','{$contrasena}','1')")){
					echo "success";
				}
				else{
					echo "error_1";
				}
			}
			else{
				echo "error_2";
			}
			$mysqli->close();
		break;
		case 7://alta de materia
			if(isset($_POST['titulo'])&&isset($_POST['creditos'])&&isset($_POST['codigo'])){
				$titulo=seguridad($_POST['titulo']);
				$creditos=seguridad($_POST['creditos']);
				$codigo=seguridad($_POST['codigo']);
				if($mysqli->query("INSERT INTO materia (Id_Materia,Titulo,Creditos,Codigo,Estado) VALUES(DEFAULT,'{$titulo}','{$creditos}','{$codigo}','1')")){
					echo "success";
				}
				else{
					echo "error_1";
				}
			}
			else{
				echo "error_2";
			}
		break;
		case 8://alta de periodo
			if(isset($_POST['inicio'])&&isset($_POST['fin'])){
				$inicio=seguridad($_POST['inicio']);
				$fin=seguridad($_POST['fin']);
				if($mysqli->query("INSERT INTO periodo (Id_Periodo,Fecha_Inicio,Fecha_Fin,Estado) VALUES (DEFAULT,'{$inicio}','{$fin}',1)")){
					echo "success";
				}
				else{
					echo "error_1";
				}
			}
			else{
				echo "error_2";
			}
		break;
	}
?>