<?php

	$usuario = md5("emelendez@tacglobalsolutions.com");
	$password = md5("Ezequiel2015");

	require('db.php');

	$query = "EXEC Sp_Login_ValidaLogin ?,?";

	$params = array( 
		array($usuario, SQLSRV_PARAM_IN),
		array($password, SQLSRV_PARAM_IN)
	);

	$datos = ejecutaQuery($query,$params);

	if(count($datos) == 1)
	{
		session_start();
		foreach ($datos[0] as $key => $value) {
			$_SESSION[$key] = $value;
		}
	}
	else
	{
		str_replace("[]","",exception(500, 'Usuario y/o contraseña incorrectos'));
	}


	header("Content-Type: application/json", true);
	echo json_encode(ejecutaQuery($query,$params));


function exception($code = 500, $msg){
	switch($code){
 		case 403: $text = 'Forbidden'; break;
        case 404: $text = 'Not Found'; break;
        case 500: $text = 'Internal Server Error'; break;
	}

 	$protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');

    header($protocol . ' ' . $code . ' ' . $text);
	echo $msg;
}

?>