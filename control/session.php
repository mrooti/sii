<?php
	function crear($u,$p,$o){
		$mysqli=new mysqli("localhost","root","","sii");
		if($mysqli->errno){
			echo "<h1>Fallo la conexión con la base de datos";
		}
		$mysqli->set_charset("utf8");
		global $mysqli;
		//u-usuario,p-contraseña,-o-opcion
		$p=hash('sha256', md5($p));
		switch($o){
			case 1://alumno
				$resultado=$mysqli->query("SELECT * FROM alumno WHERE Curp='{$u}' AND Password='{$p}'")or die("Error en: ".$mysqli->error);
				if($resultado->num_rows>0){
					$row=$resultado->fetch_array(MYSQLI_ASSOC);
					$id=$row['Id_Alumno'];
					
					$codigo=generarString(64);
					$ip=obtenerIP();
					$fecha=date("Y-m-d H:i:s");
					if($mysqli->query("INSERT INTO sesion_alumno VALUES (DEFAULT,{$id},'{$ip}','{$codigo}','{$fecha}','1')")){
						session_start();
						$_SESSION["usuario"]=$id;
						$_SESSION["tipo"]=$o;
						$_SESSION["codigo"]=$codigo;
						return true;
					}
					else{
						return false;
					}
				}
				else{
					return false;
				}
			break;
			case 2://administrador
				$resultado=$mysqli->query("SELECT * FROM administrador WHERE Curp='{$u}' AND Password='{$p}'")or die("Error en: ".$mysqli->error);
				if($resultado->num_rows>0){
					$row=$resultado->fetch_array(MYSQLI_ASSOC);
					$id=$row['Id_Administrador'];
					
					$codigo=generarString(64);
					$ip=obtenerIP();
					$fecha=date("Y-m-d H:i:s");
					if($mysqli->query("INSERT INTO sesion_administrador(Id_Administrador,Ip,Codigo,Fecha,Estado) VALUES ({$id},'{$ip}','{$codigo}','{$fecha}','1')")){
						session_start();
						$_SESSION["usuario"]=$id;
						$_SESSION["tipo"]=$o;
						$_SESSION["codigo"]=$codigo;
						return true;
					}
					else{
						return false;;
					}
				}
				else{
					return false;
				}
			break;
			case 3://tutor
				$resultado=$mysqli->query("SELECT * FROM tutor WHERE Curp='{$u}' AND Password='{$p}'")or die("Error en: ".$mysqli->error);
				if($resultado->num_rows>0){
					$row=$resultado->fetch_array(MYSQLI_ASSOC);
					$id=$row['Id_Tutor'];
					
					$codigo=generarString(64);
					$ip=obtenerIP();
					$fecha=date("Y-m-d H:i:s");
					if($mysqli->query("INSERT INTO sesion_tutor VALUES (DEFAULT,{$id},'{$ip}','{$codigo}','{$fecha}','1')")){
						session_start();
						$_SESSION["usuario"]=$id;
						$_SESSION["tipo"]=$o;
						$_SESSION["codigo"]=$codigo;
						return true;
					}
					else{
						return false;
					}
				}
				else{
					return false;
				}
			break;
			case 4://profesor
				$resultado=$mysqli->query("SELECT * FROM profesor WHERE Curp='{$u}' AND Password='{$p}'")or die("Error en: ".$mysqli->error);
				if($resultado->num_rows>0){
					$row=$resultado->fetch_array(MYSQLI_ASSOC);
					$id=$row['Id_Profesor'];
					$codigo=generarString(64);
					$ip=obtenerIP();
					$fecha=date("Y-m-d H:i:s");
					if($mysqli->query("INSERT INTO sesion_profesor VALUES (DEFAULT,{$id},'{$ip}','{$codigo}','{$fecha}','1')")){
						session_start();
						$_SESSION["usuario"]=$id;
						$_SESSION["tipo"]=$o;
						$_SESSION["codigo"]=$codigo;
						return true;
					}
					else{
						return false;
					}
				}
				else{
					return false;
				}
			break;
		}
	}
	/*switch($o){
			case 1://alumno

			break;
			case 2://administrador

			break;
			case 3://tutor

			break;
			case 4://profesor

			break;
		}
		*/
	function generarString($cant, $type = "alnum"){
		switch ($type)
		{
			case 'basic':
				return mt_rand();
			case 'alnum':
			case 'numeric':
			case 'nozero':
			case 'alpha':
				switch ($type)
				{
					case 'alpha':
						$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum':
						$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric':
						$pool = '0123456789';
						break;
					case 'nozero':
						$pool = '123456789';
						break;
				}
				return substr(str_shuffle(str_repeat($pool, ceil($cant / strlen($pool)))), 0, $cant);
			case 'unique':
			case 'md5':
				return md5(uniqid(mt_rand()));
			case 'encrypt': 
			case 'sha1':
				return sha1(uniqid(mt_rand(), TRUE));
		}
	}
	function obtenerIP() {
		$ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
		foreach ($ip_keys as $key) {
			if (array_key_exists($key, $_SERVER) === true) {
				foreach (explode(',', $_SERVER[$key]) as $ip) {
					$ip = trim($ip);
					if (validarIP($ip)) {
						return $ip;
					}
				}
			}
		}
		return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
	}

	function validarIP($ip)
	{
		if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
			return false;
		}
		return true;
	}
?>