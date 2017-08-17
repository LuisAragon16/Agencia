<?php

header('Content-Type: text/html; charset=ISO-8859-1');
require_once('utils.php');

if (isset($_POST['action'])) {
    $ac = $_POST['action'];

    if (function_exists($ac)) {
        // La funcion sera el nombre de la accion, para no un switch para cada cosa
        $ac($_POST);
    } else {
        exception(404, 'Operacion no encontrada');
    }
}

function validaSp($sp) {
    $qty = 0;

    $qty += strpos($sp, '--');
    $qty += strpos($sp, '/*');
    $qty += strpos($sp, '*/');
    $qty += strpos($sp, ';');
    $qty += strpos($sp, '(');
    $qty += strpos($sp, ')');

    if ($qty > 0) {
        return false;
    } else {
        return true;
    }
}

function ejecutaQ($p) {
    try {
        require('db.php');

        $sp = $p['sp'];
        $param = $p['param'];
        $varSession = $p['varSession'];
        $params = "";
        $stringIn = "";
        $paramsSession = "";
        $stringInSession = "";
        $query = "";
        $params = array();
        if ($varSession == "") {
            $paramsSession = "";
            $stringInSession = "";
        } else {
            session_start();
            $arrParamSession = explode("|", $varSession);
            $cantSession = count($arrParamSession);

            $stringInSession = "";

            for ($i = 0; $i < $cantSession; $i++) {
                $stringInSession .= "?,";

                $arrSession = array($_SESSION[$arrParamSession[$i]], SQLSRV_PARAM_IN);
                array_push($params, $arrSession);
            }
        }
        if ($param == "") {
            $params = "";
            $stringIn = "";
        } else {

            $arrParam = explode("|", $param);
            $cant = count($arrParam);

            $stringIn = $stringInSession;


            for ($i = 0; $i < $cant; $i++) {
                if ($i + 1 == $cant) {
                    $stringIn .= "?";
                } else {
                    $stringIn .= "?,";
                }
                $arr = array($arrParam[$i], SQLSRV_PARAM_IN);
                array_push($params, $arr);
            }
        }
        if (validaSp($sp)) {
            $query = "EXEC " . $sp . " " . $stringIn;
        }

        $datos = ejecutaQuery($query, $params);

        toJSON($datos);
    } catch (Exception $e) {
        print_r($e->getMessage(), true);
    }
}

?>