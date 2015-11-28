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
			$mysqli->close();
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
			$mysqli->close();
		break;
		case 9://alta de tipo de documento
			if(isset($_POST['titulo'])&&!empty($_POST['titulo'])){
				$titulo=seguridad($_POST['titulo']);
				if($mysqli->query("INSERT INTO tipo_documento VALUES(DEFAULT,'{$titulo}',1)")){
					echo "success";
				}
				else{
					echo "error_1";
				}
			}else{
				echo "error_2";
			}
			$mysqli->close();
		break;
		case 10://buscar alumno
			if(isset($_POST['busqueda'])&&!empty($_POST['busqueda'])){
				$busqueda=seguridad($_POST['busqueda']);
				$resultado=$mysqli->query("SELECT * FROM alumno WHERE Nombres LIKE '%{$busqueda}%' || Apellido_P LIKE '%{$busqueda}%' || Apellido_M LIKE '%{$busqueda}%' || Curp LIKE '%{$busqueda}%'")or die("Error en: ".$mysqli->error);
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Nombres']}</td>
							<td>{$row['Apellido_P']}</td>
							<td>{$row['Apellido_M']}</td>
							<td><button class=\"btn btn-success btn-xs\" onclick=\"ver({$row['Id_Alumno']})\">Elegir</button></td>
						</tr>
					";
				}
			}
			else{
				echo "<tr><td>Alumno no encontrado</td></tr>";
			}
			$mysqli->close();
		break;
		case 11://listar tutores de alumno
			if(isset($_POST['id'])&&!empty($_POST['id'])){
				$id=seguridad($_POST['id']);
				$resultado=$mysqli->query("SELECT Id_Tutor_Alumno, t.Id_Tutor, t.Nombres, t.Apellido_P, t.Apellido_M FROM tutor_alumno ta INNER JOIN tutor t ON t.Id_Tutor=ta.Id_Tutor WHERE ta.Estado='1' AND ta.Id_Alumno={$id}")or die("Error en: ".$mysli->error);
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Nombres']}</td>
							<td>{$row['Apellido_P']}</td>
							<td>{$row['Apellido_M']}</td>
							<td><button class=\"btn btn-success btn-xs\" onclick=\"eliminar({$row['Id_Tutor_Alumno']})\">Eliminar</button></td>
						</tr>
					"; 
				}
			}
			else{
				echo "<tr><td>No existen tutores relacionados con este alumno</td></tr>";
			}
			$mysqli->close();
		break;
		case 12://asignar tutor
			if(isset($_POST['alumno'])&&isset($_POST['tutor'])&&!empty($_POST['alumno'])&&!empty($_POST['tutor'])){
				$alumno=seguridad($_POST['alumno']);
				$tutor=seguridad($_POST['tutor']);
				$resultado=$mysqli->query("SELECT * FROM tutor_alumno WHERE Id_Tutor={$tutor}")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					if($mysqli->query("INSERT INTO tutor_alumno VALUES(DEFAULT,{$alumno},{$tutor},'1')")){
						echo $alumno;
					}
					else{
						echo "-1";
					}
				}
				else{
					echo "-2";
				}
			}
			else{
				echo "0";
			}
			$mysqli->close();
		break;
		case 13://dar de baja tutor
			if(isset($_POST['tutor'])&&!empty($_POST['tutor'])){
				$tutor=seguridad($_POST['tutor']);
				if($mysqli->query("UPDATE tutor_alumno SET Estado='0' WHERE Id_Tutor_Alumno={$tutor}")){
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
	}
?>