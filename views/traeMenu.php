<meta charset="utf-8">
<?php
header('Content-Type: text/html; charset=ISO-8859-1');

function traeMenu($idRol, $idUsuario) {
    $query = "EXEC Sp_Menu_CargaMenu ?,?";

    $params = array(
        array($idRol, SQLSRV_PARAM_IN),
        array($idUsuario, SQLSRV_PARAM_IN)
    );

    $datos = ejecutaQuery($query, $params);

    return $datos;
}
?>
