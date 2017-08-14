<?php

require_once('includes/utils.php');

if (isset($_GET['action'])) {
    $ac = $_GET['action'];

    if (function_exists($ac)) {
        // La funcion sera el nombre de la accion, para no un switch para cada cosa
        $ac($_GET);
    } else {
        exception(404, 'Operacion no encontrada');
    }
}

function validaUsr($g) {
    try {
        $usuario = $g['usuario'];
        $password = md5($g['password']);

        //echo "usuario : " . $usuario . ", pass : " . $password;

        require('includes/db.php');

        $query = "EXEC Sp_Login_ValidaLogin ?,?";

        $params = array(
            array($usuario, SQLSRV_PARAM_IN),
            array($password, SQLSRV_PARAM_IN)
        );

        $datos = ejecutaQuery($query, $params);
        if (count($datos) == 1) {
            session_start();
            foreach ($datos[0] as $key => $value) {
                $_SESSION[$key] = $value;
            }
        } else {
            exception(500, 'Usuario y/o contraseña incorrectos');
        }

        toJSON($datos);
    } catch (Exception $e) {
        print_r($e->getMessage(), true);
    }
}

?>