<meta charset="utf-8">
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
$tit = 'Bienvenido ';

$app = "";
$js = "";
$op = "";

function traeMenuOp($idRol, $url) {

    require('includes/db.php');
    $query = "EXEC Sp_Menu_CargaMenuDet ?,?";

    $params = array(
        array($idRol, SQLSRV_PARAM_IN),
        array($url, SQLSRV_PARAM_IN)
    );

    $datos = ejecutaQuery($query, $params);

    return $datos;
}

if (isset($_GET['op'])) {
    $op = $_GET['op'];
    $_SESSION['op'] = $op;

    $datos = traeMenuOp($_SESSION['id_rol'], '?op=' . $op);

    foreach ($datos as $key) {
        $tit = $key['titulo_hijo'];
        $app = "views/" . $key['nombre_corto'] . "/" . $op . ".php";
        $js = "views/" . $key['nombre_corto'] . "/" . $op . ".js";
    }
}
?>