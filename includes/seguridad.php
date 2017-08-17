<?php
session_start();
include_once('utils.php');

if($_GET['op'] != 'login')
{
	if(!isset($_SESSION['id_usuario'])){
		//exception(403,'Acceso denegado');
		//header("Location: //$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]index.php?op=login");
		die("Acceso Denegado");
	}
}

?>