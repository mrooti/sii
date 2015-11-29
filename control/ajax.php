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
				$grado=seguridad($_POST['grado']);
				if($grado>0){
					if($mysqli->query("INSERT INTO materia (Id_Materia,Titulo,Grado,Creditos,Codigo,Estado) VALUES(DEFAULT,'{$titulo}','{$grado}','{$creditos}','{$codigo}','1')")){
						echo "success";
					}
					else{
						echo "error_1";
					}
				}
				else{
					echo "error_2";
				}
				
			}
			else{
				echo "error_3";
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
				$resultado=$mysqli->query("SELECT * FROM alumno WHERE Estado='1' AND Nombres LIKE '%{$busqueda}%' || Apellido_P LIKE '%{$busqueda}%' || Apellido_M LIKE '%{$busqueda}%' || Curp LIKE '%{$busqueda}%'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>Alumno no encontrado</td></tr>";
				}
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
		case 14://buscar profesor
			if(isset($_POST['busqueda'])&&!empty($_POST['busqueda'])){
				$busqueda=seguridad($_POST['busqueda']);
				$resultado=$mysqli->query("SELECT * FROM profesor WHERE Estado='1' AND Nombres LIKE '%{$busqueda}%' || Apellido_P LIKE '%{$busqueda}%' || Apellido_M LIKE '%{$busqueda}%' || Curp LIKE '%{$busqueda}%'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>Profesor no encontrado</td></tr>";
				}
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Nombres']}</td>
							<td>{$row['Apellido_P']}</td>
							<td>{$row['Apellido_M']}</td>
							<td><button class=\"btn btn-success btn-xs\" onclick=\"elegir(1,{$row['Id_Profesor']});\">Elegir</button></td>
						</tr>
					";
				}
			}
			else{
				echo "<tr><td>Profesor no encontrado</td></tr>";
			}
			$mysqli->close();
		break;
		case 15://listar grupos de un profesor
			if(isset($_POST['profesor'])&&!empty($_POST['profesor'])){
				$profesor=seguridad($_POST['profesor']);
				$resultado=$mysqli->query("SELECT DISTINCT Id_Cursa_Materia, m.Titulo, m.Grado, Grupo FROM cursa_materia cm INNER JOIN materia m ON m.Id_Materia=cm.Id_Materia WHERE Id_Profesor={$profesor} AND cm.Estado='1'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>No hay grupos asignados a este profesor</td></tr>";
				}
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Titulo']}</td>
							<td>{$row['Grado']}</td>
							<td>{$row['Grupo']}</td>
							<td><button class=\"btn btn-success btn-xs\" onclick=\"elegir(2,{$row['Id_Cursa_Materia']});\">Eliminar</button></td>
						</tr>
					";//opcion 2 para eliminar grupo 
				}
			}else{
				echo "<tr><td>No hay grupos asignados a este profesor</td></tr>";
			}
			$mysqli->close();
		break;
		case 16://eliminar grupos de un profesor
			if(isset($_POST['registro'])&&empty($_POST['registro'])){
				$registro=seguridad($_POST['registro']);
				$resultado=$mysqli->query("SELECT * FROM cursa_materia WHERE Estado='1' AND Id_Cursa_Materia={$registro}")or die("Error en: ".$mysqli->error);
				if($resultado->fetch_array(MYSQLI_ASSOC)){
					$materia=$row['Id_Materia'];
					$periodo=$row['Id_Periodo'];
					$profesor=$row['Id_Profesor'];
					$grupo=$row['Grupo'];
					if($resultado->query("UPDATE cursa_materia SET Estado='0' WHERE Id_Materia={$materia} AND Id_Periodo={$periodo} AND Id_Profesor={$profesor} AND Grupo='{$grupo}'")){
						echo "success";
					}
					else{
						echo "error_1";
					}
				}else{
					echo "error_2";
				}
			}else{
				echo "error_3";
			}
			$mysqli->close();
		break;
		case 17://buscar alumnos de nuevo
			if(isset($_POST['busqueda'])&&!empty($_POST['busqueda'])){
				$busqueda=seguridad($_POST['busqueda']);
				$resultado=$mysqli->query("SELECT * FROM alumno WHERE Estado='1' AND Nombres LIKE '%{$busqueda}%' || Apellido_P LIKE '%{$busqueda}%' || Apellido_M LIKE '%{$busqueda}%' || Curp LIKE '%{$busqueda}%'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>Alumno no encontrado</td></tr>";
				}
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Nombres']}</td>
							<td>{$row['Apellido_P']}</td>
							<td>{$row['Apellido_M']}</td>
							<td><button class=\"btn btn-success btn-xs\" onclick=\"elegir(3,{$row['Id_Alumno']})\">Elegir</button></td>
						</tr>
					";
				}
			}
			else{
				echo "<tr><td>Alumno no encontrado</td></tr>";
			}
			$mysqli->close();
		break;
		case 18://listar alumnos de un grupo
			if(isset($_POST['periodo'])&&isset($_POST['grupo'])&&isset($_POST['profesor'])&&!empty($_POST['periodo'])&&!empty($_POST['grupo'])&&!empty($_POST['profesor'])){
				$periodo=seguridad($_POST['periodo']);
				$grupo=seguridad($_POST['grupo']);
				$profesor=seguridad($_POST['profesor']);
				$resultado=$mysqli->query("SELECT Id_Cursa_Materia, a.Nombres, a.Apellido_P, a.Apellido_M FROM cursa_materia cm INNER JOIN alumno a ON a.Id_Alumno=cm.Id_Alumno WHERE Id_Profesor={$profesor} AND Id_Periodo={$periodo} AND Grupo='{$grupo}' AND cm.Estado='1'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>No hay alumnos registrados</td></tr>";
				}
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Nombres']}</td>
							<td>{$row['Apellido_P']}</td>
							<td>{$row['Apellido_M']}</td>
							<td><button class=\"btn btn-success btn-xs\" onclick=\"elegir(4,{$row['Id_Cursa_Materia']})\">Eliminar</button></td>
						</tr>
					";
				}
			}
			else{
				echo "<tr><td>No hay alumnos registrados</td></tr>";
			}
			$mysqli->close();
		break;
		case 19://alta de alumnos en un grupo
			if(isset($_POST['materia'])&&!empty($_POST['materia'])&&isset($_POST['periodo'])&&isset($_POST['grupo'])&&isset($_POST['profesor'])&&!empty($_POST['periodo'])&&!empty($_POST['grupo'])&&!empty($_POST['profesor'])&&isset($_POST['alumno'])&&!empty($_POST['alumno'])){
				$periodo=seguridad($_POST['periodo']);
				$grupo=seguridad($_POST['grupo']);
				$profesor=seguridad($_POST['profesor']);
				$alumno=seguridad($_POST['alumno']);
				$materia=seguridad($_POST['materia']);
				//hay que limpiar que si el alumno existe pero esta con estado cero, hay que solo cambiarle el estado y no dar ptra alta
				$resultado=$mysqli->query("SELECT * FROM cursa_materia WHERE Id_Periodo={$periodo} AND Grupo='{$grupo}' AND Id_Profesor={$profesor} AND Id_Alumno={$alumno} AND Id_Materia={$materia}")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					if($mysqli->query("INSERT INTO cursa_materia VALUES(DEFAULT,'{$materia}','{$periodo}','{$profesor}','{$alumno}','{$grupo}','1')" )){
						echo "success";
					}
					else{
						echo "error_1";
					}
				}
				else{
					$row=$resultado->fetch_array(MYSQLI_ASSOC);
					if($row['Estado']=="0"){
						if($mysqli->query("UPDATE cursa_materia SET Estado='1' WHERE Id_Periodo={$periodo} AND Grupo='{$grupo}' AND Id_Profesor={$profesor} AND Id_Alumno={$alumno} AND Id_Materia={$materia} AND Estado='0'")){
							echo "success";
						}
						else{
							echo "error_2";
						}
					}else{
						echo "El alumno ya se encuentra registrado en este grupo";
					}
				}
				
			}
			else{
				echo "error_3";
			}
			$mysqli->close();
		break;
		case 20://baja de alumno de grupo
			if(isset($_POST['cursa_materia'])&&!empty($_POST['cursa_materia'])){
				$cursa_materia=seguridad($_POST['cursa_materia']);
				if($mysqli->query("UPDATE cursa_materia SET Estado='0' WHERE Id_Cursa_Materia={$cursa_materia}")){
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
		case 21://obtener profesor para captura de calificaciones
			if(isset($_POST['profesor'])&&!empty($_POST['profesor'])){
				$profesor=seguridad($_POST['profesor']);
				$resultado=$mysqli->query("SELECT DISTINCT Id_Cursa_Materia, m.Titulo, m.Grado, Grupo FROM cursa_materia cm INNER JOIN materia m ON m.Id_Materia=cm.Id_Materia WHERE Id_Profesor={$profesor} AND cm.Estado='1'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>No hay grupos asignados a este profesor</td></tr>";
				}
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Titulo']}</td>
							<td>{$row['Grado']}</td>
							<td>{$row['Grupo']}</td>
							<td><button class=\"btn btn-success btn-xs\" onclick=\"elegir(2,{$row['Id_Cursa_Materia']});\">Ver Calificaciones</button><button class=\"btn btn-primary btn-xs\" onclick=\"elegir(3,{$row['Id_Cursa_Materia']});\">Capturar</button></td>
						</tr>
					";//opcion 2 para eliminar grupo 
				}
			}else{
				echo "<tr><td>No hay grupos asignados a este profesor</td></tr>";
			}
			$mysqli->close();
		break;
		case 22://mostrar todas las calificaciones registradas
			if(isset($_POST['cursa_materia'])&&!empty($_POST['cursa_materia'])){
				$cursa=seguridad($_POST['cursa_materia']);
				$resultado=$mysqli->query("SELECT * FROM cursa_materia WHERE Id_Cursa_Materia={$cursa}")or die("Error en: ".$mysqli->error);
				$row=$resultado->fetch_array(MYSQLI_ASSOC);
				$profesor=$row['Id_Profesor'];
				$resultado=$mysqli->query("SELECT Id_Calificacion_Curso, a.Nombres, a.Apellido_P, a.Apellido_M, Unidad, Calificacion FROM calificacion_curso cc INNER JOIN cursa_materia cm ON cm.Id_Cursa_Materia=cc.Id_Cursa_Materia INNER JOIN alumno a ON a.Id_Alumno=cm.Id_Alumno WHERE Id_Profesor={$profesor} AND cc.Estado='1'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>No calificaciones registradas</td></tr>";
				}
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Nombres']}</td>
							<td>{$row['Apellido_P']}</td>
							<td>{$row['Apellido_M']}</td>
							<td>{$row['Unidad']}</td>
							<td>{$row['Calificacion']}
							<button class=\"btn btn-success btn-xs\" onclick=\"elegir(4,{$row['Id_Calificacion_Curso']});\">Editar</button></td>
						</tr>
					";
				}
			}
			else{
				echo "<tr><td>No calificaciones registradas</td></tr>";
			}
			$mysqli->close();
		break;
		case 23://listar todos los alumnos de un grupo para cargar calificaciones
			if(isset($_POST['cursa_materia'])&&!empty($_POST['cursa_materia'])){
				$cursa=seguridad($_POST['cursa_materia']);
				$resultado=$mysqli->query("SELECT * FROM cursa_materia WHERE Id_Cursa_Materia={$cursa}")or die("Error en: ".$mysqli->error);
				$row=$resultado->fetch_array(MYSQLI_ASSOC);
				$profesor=$row['Id_Profesor'];
				$materia=$row['Id_Materia'];
				$periodo=$row['Id_Periodo'];
				$grupo=$row['Grupo'];
				$resultado=$mysqli->query("SELECT cm.Id_Cursa_Materia, a.Nombres, a.Apellido_P, a.Apellido_M FROM cursa_materia cm INNER JOIN alumno a ON a.Id_Alumno=cm.Id_Alumno WHERE Id_Profesor={$profesor} AND Id_Materia={$materia} AND Id_Periodo={$periodo} AND Grupo='{$grupo}' AND cm.Estado='1'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>No hay alumnos registrados en el grupo</td></tr>";
				}
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo "
						<tr>
							<td>{$row['Id_Cursa_Materia']}</td>
							<td>{$row['Nombres']}</td>
							<td>{$row['Apellido_P']}</td>
							<td>{$row['Apellido_M']}</td>
							<td><input type=\"text\" name=\"x{$row['Id_Cursa_Materia']}\" id=\"x{$row['Id_Cursa_Materia']}\" </td>
						</tr>
					";
				}
			}
			else{
				echo "<tr><td>No hay alumnos regustrados en el grupo</td></tr>";
			}
			$mysqli->close();
		break;
		case 24://medidas desesperadas
			if(isset($_POST['cursa_materia'])&&!empty($_POST['cursa_materia'])){
				$cursa=seguridad($_POST['cursa_materia']);
				$resultado=$mysqli->query("SELECT * FROM cursa_materia WHERE Id_Cursa_Materia={$cursa}")or die("Error en: ".$mysqli->error);
				$row=$resultado->fetch_array(MYSQLI_ASSOC);
				$profesor=$row['Id_Profesor'];
				$materia=$row['Id_Materia'];
				$periodo=$row['Id_Periodo'];
				$grupo=$row['Grupo'];
				$resultado=$mysqli->query("SELECT cm.Id_Cursa_Materia, a.Nombres, a.Apellido_P, a.Apellido_M FROM cursa_materia cm INNER JOIN alumno a ON a.Id_Alumno=cm.Id_Alumno WHERE Id_Profesor={$profesor} AND Id_Materia={$materia} AND Id_Periodo={$periodo} AND Grupo='{$grupo}' AND cm.Estado='1'")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					echo "<tr><td>No hay alumnos registrados en el grupo</td></tr>";
				}
				while($row=$resultado->fetch_array(MYSQLI_ASSOC)){
					echo ",x".$row['Id_Cursa_Materia'];
				}
			}
			else{
				echo "<tr><td>No hay alumnos regustrados en el grupo</td></tr>";
			}
			$mysqli->close();
		break;
		case 25://alta calificacion
			if(isset($_POST['unidad'])&&!empty($_POST['unidad'])){
				$cali=seguridad($_POST['cali']);
				$unidad=seguridad($_POST['unidad']);
				$id=str_replace("x", "", $_POST['id']);
				$resultado=$mysqli->query("SELECT * FROM calificacion_curso WHERE Id_Calificacion_Curso={$id}")or die("Error en: ".$mysqli->error);
				if(!$resultado->num_rows>0){
					if($mysqli->query("INSERT INTO calificacion_curso VALUES(DEFAULT,{$id},'{$unidad}','{$cali}','1')")){
						echo "success";
					}
					else{
						echo "error_1";
					}
				}
				else{
					if($mysqli->query("UPDATE calificacion_curso SET Calificacion='{$cali}' WHERE Id_Calificacion_Curso={$id}")){
						echo "success";
					}
					else{
						echo "error_2";
					}
				}
				
			}
			else{
				echo "error_3";
			}
			$mysqli->close();
		break;
		case 26:
			if(isset($_POST['id'])&&!empty($_POST['id'])&&isset($_POST['cali'])&&!empty($_POST['cali'])){
				$id=seguridad($_POST['id']);
				$cali=seguridad($_POST['cali']);
				if($mysqli->query("UPDATE calificacion_curso SET Calificacion='{$cali}' WHERE Id_Calificacion_Curso={$id}")){
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