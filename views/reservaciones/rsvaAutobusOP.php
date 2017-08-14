<?php

$lugares = $_POST['lugares'];
$iAutobusID = $_POST['id_autobus'];
$especial = $_POST['especial'];
$asientos = array();
if ($especial == 'PE') {
    $texto = ' puerta en medio.';
} else {
    $texto = '.';
}
//if ($nivelUsuario == 1) {
//    $botonLiberar = '<a class="waves-effect waves-light btn red darken-3" id="btn_libera_asiento" onclick="modalConfirmarLiberaAsiento()" style="margin-top : 3px;"><i class="material-icons right">replay</i>Liberar asientos</a>';
//} else {
//    $botonLiberar = '';
//}


$contenidoReserva = ' <br>
	<div class="row">
	 <div class="col s12">
		<div class="input-field col s12">
			<blockquote style="border-left: 5px solid #1DBECD;padding-left: 0.5rem;    margin: 5px 0;">
        Información del cliente
			</blockquote>
			<div class="input-field col s4">
				<input type="text" id="pasajero" >
				<label for="pasajero" style="margin-top: -20px;"> <i class=" material-icons tiny">perm_identity</i> Pasajero</label>
			</div>
			<div class="input-field col s4">
				<input type="text" id="agencia" >
				<label for="agencia" style="margin-top: -20px;"> <i class="material-icons tiny">assignment</i> Agencia</label>
			</div>
		    <div class="input-field col s4">
		        <input type="text" id="agente" >
				<label for="agente" style="margin-top: -20px;"> <i class="material-icons tiny">perm_identity</i> Agente</label>
			 </div>
             <div class="input-field col s4" >
				<input type="text" id="hotel" >
				<label for="hotel" style="margin-top: -20px;"> <i class="material-icons tiny">location_on</i> Hotel</label>
			 </div> 
             <div class="input-field col s4">
				<input type="text" id="vista" >
				<label for="vista" style="margin-top: -20px;"> <i class="material-icons tiny">toll</i> Vista</label>
			 </div>
			 <div class="input-field col s4">
				<input type="text" id="ocupacion" >
				<label for="ocupacion" style="margin-top: -20px;"> <i class="material-icons tiny">view_quilt</i> Ocupación</label>
			 </div>
			 <div class="input-field col s2">
			 <select id="estatus" style="width:100%">
			    <option value="2">Apartado\disponible</option>
			    <option value="3">Pagado</option>
			 </select>
			 <label for="estatus" style="margin-top: -26px; font-size: 12px;"> Estatus<i class="material-icons tiny">mode_edit</i> 
			 </div>
			  <input type="text" value="' . $camion . '" id="idCamion" style="display:none;">
			  <input type="text" value="' . $especial . '" id="camionEspecial" style="display:none;">
			  <input type="text" value="' . $lugares . '" id="camionLugares" style="display:none;">
         <div class="input-field col s10" style="margin-top:25px;text-align:right;"> 
         <a class="waves-effect waves-light btn blue darken-3" id="btn_autobus" onclick="abrirBusquedaFolio()"><i class="material-icons right">pageview</i>Folio</a>
			<a class="waves-effect waves-light btn green darken-3" id="btn_autobus" onclick="validarReservacion()"><i class="material-icons right">fast_forward</i>Guardar</a>		
			
							<div id="loader_autobus" style="display:none" >
						    		  <div class="preloader-wrapper small active">
											<div class="spinner-layer spinner-green-only" style="border-color: #2AB5C3;">
													 <div class="circle-clipper right">
															  <div class="circle"></div>
													 </div>
											</div>                                  
								  </div>
									&nbsp;&nbsp;<b style="font-size: 20px; color:#2A96A0"> Guardando autobús</b>
						  </div>
						  	' . $botonLiberar . '
		    </div>
	        </div>	    
		  </div>
		  </div>';


$CONTENIDO_CAMION = '<div class="center" style="border-style: groove; border-width: 4px;"><br><h4>Autobús de ' . $lugares . ' asientos' . $texto . '</h4></h1>';
//********************************CREAMOS LA IMPRESION DEL AUTOBUS*******************************************/
if ($lugares == 51) {
//***********************************************************************************************************/
//********************************CAMION DE 51 LUGARES*******************************************/
//***********************************************************************************************************/
/////////////////////////se saca camion
    $a = 1;
    $b = 2;
    $c = 4;
    $d = 3;
    $num_places = 51;

////////////// Fila de Asientos  Pasillo Derecha ventana
    $ventanaDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(4,8,12,16,20,24,28,32,36,40,44,48) AND a.camion = $camion ORDER BY a.asiento");
    if (!$ventanaDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($ventanaDerR = mysqli_fetch_array($ventanaDer)) {
        $asiento = $ventanaDerR['asiento'];
        $pasajero = $ventanaDerR['pasajero'];
        $estatus = $ventanaDerR['estatus'];
        $agencia = $ventanaDerR['agencia'];
        $agente = $ventanaDerR['agente'];
        $vista = $ventanaDerR['vista'];
        $hotel = $ventanaDerR['hotel'];
        $ocupacion = $ventanaDerR['ocupacion'];
        $idreservacion_asientos = $ventanaDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }

        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<input  style="width:60px; height:100px;  position: absolute;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF; " title="W.C." value = "W.C." readonly></input> &nbsp;';

    $CONTENIDO_CAMION .= '<br>';

/////////////// Fila de Asientos  Pasillo  Derecha
    $pasilloDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(3,7,11,15,19,23,27,31,35,39,43,47,51) AND a.camion = $camion ORDER BY a.asiento");
    if (!$pasilloDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($pasilloDerR = mysqli_fetch_array($pasilloDer)) {
        $asiento = $pasilloDerR['asiento'];
        $pasajero = $pasilloDerR['pasajero'];
        $estatus = $pasilloDerR['estatus'];
        $agencia = $pasilloDerR['agencia'];
        $agente = $pasilloDerR['agente'];
        $vista = $pasilloDerR['vista'];
        $hotel = $pasilloDerR['hotel'];
        $ocupacion = $pasilloDerR['ocupacion'];
        $idreservacion_asientos = $pasilloDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $asiento51 = '';
        if ($asiento == 51) {
            $asiento51 = '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
        } else {
            $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
        }
    }

    $CONTENIDO_CAMION .= '<input style="width:900px; height:37px;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0;" value="PASILLO"></input> &nbsp;';
    $CONTENIDO_CAMION .= $asiento51 . '<br>';

    /////////////////// Fila de Asientos  Pasillo Izquierda
    $pasilloIzq = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(2,6,10,14,18,22,26,30,34,38,42,46,50) AND a.camion = $camion ORDER BY a.asiento");
    if (!$pasilloDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($pasilloIzqR = mysqli_fetch_array($pasilloIzq)) {
        $asiento = $pasilloIzqR['asiento'];
        $pasajero = $pasilloIzqR['pasajero'];
        $estatus = $pasilloIzqR['estatus'];
        $agencia = $pasilloIzqR['agencia'];
        $agente = $pasilloIzqR['agente'];
        $vista = $pasilloIzqR['vista'];
        $hotel = $pasilloIzqR['hotel'];
        $ocupacion = $pasilloIzqR['ocupacion'];
        $idreservacion_asientos = $pasilloIzqR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<br>';


    // Fila de Asientos  Ventana Izquierda
    $ventanaIzq = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(1,5,9,13,17,21,25,29,33,37,41,45,49) AND a.camion = $camion ORDER BY a.asiento");

    if (!$ventanaIzq) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($ventanaIzqR = mysqli_fetch_array($ventanaIzq)) {
        $asiento = $ventanaIzqR['asiento'];
        $pasajero = $ventanaIzqR['pasajero'];
        $estatus = $ventanaIzqR['estatus'];
        $agencia = $ventanaIzqR['agencia'];
        $agente = $ventanaIzqR['agente'];
        $vista = $ventanaIzqR['vista'];
        $hotel = $ventanaIzqR['hotel'];
        $ocupacion = $ventanaIzqR['ocupacion'];
        $idreservacion_asientos = $ventanaIzqR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
        //$a = $a + 4;
    }
    $CONTENIDO_CAMION .= '<br>';
}
//***********************************************************************************************************/
//********************************FIN CAMION DE 51 LUGARES*******************************************/
//***********************************************************************************************************/

if ($lugares == 42) {
//***********************************************************************************************************/
//********************************CAMION DE 42 LUGARES*******************************************/
//***********************************************************************************************************/
    $a = 1;
    $b = 2;
    $c = 4;
    $d = 3;
    ////////////// Fila de Asientos  Pasillo Derecha ventana
    $ventanaDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(4,8,12,16,20,24,28,32,36,40) AND a.camion = $camion ORDER BY a.asiento");
    if (!$ventanaDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($ventanaDerR = mysqli_fetch_array($ventanaDer)) {
        $asiento = $ventanaDerR['asiento'];
        $pasajero = $ventanaDerR['pasajero'];
        $estatus = $ventanaDerR['estatus'];
        $agencia = $ventanaDerR['agencia'];
        $agente = $ventanaDerR['agente'];
        $vista = $ventanaDerR['vista'];
        $hotel = $ventanaDerR['hotel'];
        $ocupacion = $ventanaDerR['ocupacion'];
        $idreservacion_asientos = $ventanaDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<input  style="width:60px; height:100px;text-align: center;  position: absolute;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF; " title="W.C." value = "W.C." readonly></input> &nbsp;';
    $CONTENIDO_CAMION .= '<br>';
    $CONTENIDO_CAMION .= '<br>';
    /////////////// Fila de Asientos  Pasillo  Derecha
    $pasilloDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(3,7,11,15,19,23,27,31,35,39) AND a.camion = $camion ORDER BY a.asiento");
    if (!$pasilloDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($pasilloDerR = mysqli_fetch_array($pasilloDer)) {
        $asiento = $pasilloDerR['asiento'];
        $pasajero = $pasilloDerR['pasajero'];
        $estatus = $pasilloDerR['estatus'];
        $agencia = $pasilloDerR['agencia'];
        $agente = $pasilloDerR['agente'];
        $vista = $pasilloDerR['vista'];
        $hotel = $pasilloDerR['hotel'];
        $ocupacion = $pasilloDerR['ocupacion'];
        $idreservacion_asientos = $pasilloDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }

    $CONTENIDO_CAMION .= '<input style="width:818px; height:37px;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0;" value="PASILLO"></input> &nbsp;';
    $CONTENIDO_CAMION .= '<br>';
    /////////////////// Fila de Asientos  Pasillo Izquierda
    $pasilloDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(2,6,10,14,18,22,26,30,34,38,42) AND a.camion = $camion ORDER BY a.asiento");
    if (!$pasilloDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($pasilloDerR = mysqli_fetch_array($pasilloDer)) {
        $asiento = $pasilloDerR['asiento'];
        $pasajero = $pasilloDerR['pasajero'];
        $estatus = $pasilloDerR['estatus'];
        $agencia = $pasilloDerR['agencia'];
        $agente = $pasilloDerR['agente'];
        $vista = $pasilloDerR['vista'];
        $hotel = $pasilloDerR['hotel'];
        $ocupacion = $pasilloDerR['ocupacion'];
        $idreservacion_asientos = $pasilloDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }

        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<br>';
    // Fila de Asientos  Ventana Izquierda
    $ventanaIzq = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(1,5,9,13,17,21,25,29,33,37,41) AND a.camion = $camion ORDER BY a.asiento");
    if (!$ventanaIzq) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($ventanaIzqR = mysqli_fetch_array($ventanaIzq)) {
        $asiento = $ventanaIzqR['asiento'];
        $pasajero = $ventanaIzqR['pasajero'];
        $estatus = $ventanaIzqR['estatus'];
        $agencia = $ventanaIzqR['agencia'];
        $agente = $ventanaIzqR['agente'];
        $vista = $ventanaIzqR['vista'];
        $hotel = $ventanaIzqR['hotel'];
        $ocupacion = $ventanaIzqR['ocupacion'];
        $idreservacion_asientos = $ventanaIzqR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
        //$a = $a + 4;
    }
    $CONTENIDO_CAMION .= '<br>';
}
//***********************************************************************************************************/
//********************************FIN CAMION DE 42 LUGARES*******************************************/
//***********************************************************************************************************/

if ($lugares == 47 && $especial == 'NO') {
//***********************************************************************************************************/
//********************************CAMION DE 47 LUGARES*******************************************/
//***********************************************************************************************************/
    /////////////////////////se saca camion
    $a = 1;
    $b = 2;
    $c = 4;
    $d = 3;
    $num_places = 47;
    ////////////// Fila de Asientos  Pasillo Derecha ventana
    $ventanaDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(4,8,12,16,20,24,28,32,36,40,44) AND a.camion = $camion ORDER BY a.asiento");
    if (!$ventanaDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($ventanaDerR = mysqli_fetch_array($ventanaDer)) {
        $asiento = $ventanaDerR['asiento'];
        $pasajero = $ventanaDerR['pasajero'];
        $estatus = $ventanaDerR['estatus'];
        $agencia = $ventanaDerR['agencia'];
        $agente = $ventanaDerR['agente'];
        $vista = $ventanaDerR['vista'];
        $hotel = $ventanaDerR['hotel'];
        $ocupacion = $ventanaDerR['ocupacion'];
        $idreservacion_asientos = $ventanaDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<input  style="width:60px; height:100px;text-align: center;  position: absolute;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF; " title="W.C." value = "W.C." readonly></input> &nbsp;';
    $CONTENIDO_CAMION .= '<br>';

    /////////////// Fila de Asientos  Pasillo  Derecha
    $pasilloDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(3,7,11,15,19,23,27,31,35,39,43,47) AND a.camion = $camion ORDER BY a.asiento");
    if (!$pasilloDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($pasilloDerR = mysqli_fetch_array($pasilloDer)) {
        $asiento = $pasilloDerR['asiento'];
        $pasajero = $pasilloDerR['pasajero'];
        $estatus = $pasilloDerR['estatus'];
        $agencia = $pasilloDerR['agencia'];
        $agente = $pasilloDerR['agente'];
        $vista = $pasilloDerR['vista'];
        $hotel = $pasilloDerR['hotel'];
        $ocupacion = $pasilloDerR['ocupacion'];
        $idreservacion_asientos = $pasilloDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $asiento51 = '';
        if ($asiento == 47) {
            $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

            $asiento47 = '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
        } else {
            $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

            $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
        }
    }

    $CONTENIDO_CAMION .= '<input style="width:832px; height:37px; text-align: center; border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0;" value="PASILLO"></input> &nbsp;';
    $CONTENIDO_CAMION .= $asiento47 . '<br>';

    /////////////////// Fila de Asientos  Pasillo Izquierda
    $pasilloDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(2,6,10,14,18,22,26,30,34,38,42,46) AND a.camion = $camion ORDER BY a.asiento");
    if (!$pasilloDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($pasilloDerR = mysqli_fetch_array($pasilloDer)) {
        $asiento = $pasilloDerR['asiento'];
        $pasajero = $pasilloDerR['pasajero'];
        $estatus = $pasilloDerR['estatus'];
        $agencia = $pasilloDerR['agencia'];
        $agente = $pasilloDerR['agente'];
        $vista = $pasilloDerR['vista'];
        $hotel = $pasilloDerR['hotel'];
        $ocupacion = $pasilloDerR['ocupacion'];
        $idreservacion_asientos = $pasilloDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }

        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<br>';
// Fila de Asientos  Ventana Izquierda
    $ventanaIzq = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(1,5,9,13,17,21,25,29,33,37,41,45) AND a.camion = $camion ORDER BY a.asiento");
    if (!$ventanaIzq) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($ventanaIzqR = mysqli_fetch_array($ventanaIzq)) {
        $asiento = $ventanaIzqR['asiento'];
        $pasajero = $ventanaIzqR['pasajero'];
        $estatus = $ventanaIzqR['estatus'];
        $agencia = $ventanaIzqR['agencia'];
        $agente = $ventanaIzqR['agente'];
        $vista = $ventanaIzqR['vista'];
        $hotel = $ventanaIzqR['hotel'];
        $ocupacion = $ventanaIzqR['ocupacion'];
        $idreservacion_asientos = $ventanaIzqR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<br>';
}
//***********************************************************************************************************/
//********************************FIN CAMION DE 47 LUGARES*******************************************/
//***********************************************************************************************************/

if ($lugares == 47 && $especial == 'PE') {
//***********************************************************************************************************/
//********************************CAMION DE 47 LUGARES PUERTA EN MEDIO*******************************************/
//***********************************************************************************************************/
/////////////////////////se saca camion
    $a = 1;
    $b = 2;
    $c = 4;
    $d = 3;
    $num_places = 51;

    ////////////// Fila de Asientos  Pasillo Derecha ventana
    $ventanaDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(4,8,12,16,20,26,30,34,38,42,46) AND a.camion = $camion ORDER BY a.asiento");
    if (!$ventanaDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($ventanaDerR = mysqli_fetch_array($ventanaDer)) {
        $asiento = $ventanaDerR['asiento'];
        $pasajero = $ventanaDerR['pasajero'];
        $estatus = $ventanaDerR['estatus'];
        $agencia = $ventanaDerR['agencia'];
        $agente = $ventanaDerR['agente'];
        $vista = $ventanaDerR['vista'];
        $hotel = $ventanaDerR['hotel'];
        $ocupacion = $ventanaDerR['ocupacion'];
        $idreservacion_asientos = $ventanaDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        if ($asiento == 20) {
            $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
            if ($estatus == 'Disponible') {
                $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
            } else if ($estatus == 'Apartado\disponible') {
                $colorAsiento = 'color: #000000; background-color:#d7e410;';
            } else if ($estatus == 'Coordinador') {
                $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
            } else {
                $colorAsiento = 'color: #000000; background-color:#20c127;';
            }
            $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

            $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
            $CONTENIDO_CAMION .= '<input  style="width:30px; height:37px;text-align: center;  position: inherit;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF; " title="W" value = "W" readonly></input> &nbsp;';
            $CONTENIDO_CAMION .= '<input  style="width:30px; height:37px;text-align: center;  position: inherit;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0; " readonly></input> &nbsp;';
        } else {
            $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
            if ($estatus == 'Disponible') {
                $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
            } else if ($estatus == 'Apartado\disponible') {
                $colorAsiento = 'color: #000000; background-color:#d7e410;';
            } else if ($estatus == 'Coordinador') {
                $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
            } else {
                $colorAsiento = 'color: #000000; background-color:#20c127;';
            }
            $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

            $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
        }
    }
    $CONTENIDO_CAMION .= '<br>';

    /////////////// Fila de Asientos  Pasillo  Derecha
    $pasilloDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(3,7,11,15,19,25,29,33,37,41,45,47) AND a.camion = $camion ORDER BY a.asiento");
    if (!$pasilloDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($pasilloDerR = mysqli_fetch_array($pasilloDer)) {
        $asiento = $pasilloDerR['asiento'];
        $pasajero = $pasilloDerR['pasajero'];
        $estatus = $pasilloDerR['estatus'];
        $agencia = $pasilloDerR['agencia'];
        $agente = $pasilloDerR['agente'];
        $vista = $pasilloDerR['vista'];
        $hotel = $pasilloDerR['hotel'];
        $ocupacion = $pasilloDerR['ocupacion'];
        $idreservacion_asientos = $pasilloDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        if ($asiento == 19) {
            $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
            if ($estatus == 'Disponible') {
                $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
            } else if ($estatus == 'Apartado\disponible') {
                $colorAsiento = 'color: #000000; background-color:#d7e410;';
            } else if ($estatus == 'Coordinador') {
                $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
            } else {
                $colorAsiento = 'color: #000000; background-color:#20c127;';
            }
            $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

            $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';

            $CONTENIDO_CAMION .= '<input  style="width:30px; height:37px;text-align: center;  position: inherit;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF; " title="C" value = "C" readonly></input> &nbsp;';
            $CONTENIDO_CAMION .= '<input  style="width:30px; height:37px;text-align: center;  position: inherit;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0; " readonly></input> &nbsp;';
        } else {
            $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
            if ($estatus == 'Disponible') {
                $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
            } else if ($estatus == 'Apartado\disponible') {
                $colorAsiento = 'color: #000000; background-color:#d7e410;';
            } else if ($estatus == 'Coordinador') {
                $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
            } else {
                $colorAsiento = 'color: #000000; background-color:#20c127;';
            }
            $asiento47 = '';
            if ($asiento == 47) {

                $asiento47 .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
            } else {
                $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

                $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
            }
        }
    }
    $CONTENIDO_CAMION .= '<br>';
    $CONTENIDO_CAMION .= '<input style="width:831px; height:37px;border-radius: 15px 15px 15px 15px; text-align: center; color: #000000; background-color:#C0C0C0;" value="PASILLO"></input> &nbsp;';
    $CONTENIDO_CAMION .= $asiento47 . '<br>';

    /////////////////// Fila de Asientos  Pasillo Izquierda
    $pasilloDer = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(2,6,10,14,18,22,24,28,32,36,40,44) AND a.camion = $camion ORDER BY a.asiento");
    if (!$pasilloDer) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($pasilloDerR = mysqli_fetch_array($pasilloDer)) {
        $asiento = $pasilloDerR['asiento'];
        $pasajero = $pasilloDerR['pasajero'];
        $estatus = $pasilloDerR['estatus'];
        $agencia = $pasilloDerR['agencia'];
        $agente = $pasilloDerR['agente'];
        $vista = $pasilloDerR['vista'];
        $hotel = $pasilloDerR['hotel'];
        $ocupacion = $pasilloDerR['ocupacion'];
        $idreservacion_asientos = $pasilloDerR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }

        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<br>';

// Fila de Asientos  Ventana Izquierda
    $ventanaIzq = mysqli_query($conexionBD, "SELECT a.asiento,a.pasajero,es.estatus,a.agencia,a.agente,a.vista,a.hotel,a.ocupacion,idreservacion_asientos
                        FROM asientos a INNER JOIN estatus_asiento es ON es.idestatus = a.estatus
 WHERE asiento  IN(1,5,9,13,17,21,23,27,31,35,39,43) AND a.camion = $camion ORDER BY a.asiento");
    if (!$ventanaIzq) {
        die(var_dump(mysqli_error($conexionBD)));
        echo 'Error al obtener los asientos.';
    }
    while ($ventanaIzqR = mysqli_fetch_array($ventanaIzq)) {
        $asiento = $ventanaIzqR['asiento'];
        $pasajero = $ventanaIzqR['pasajero'];
        $estatus = $ventanaIzqR['estatus'];
        $agencia = $ventanaIzqR['agencia'];
        $agente = $ventanaIzqR['agente'];
        $vista = $ventanaIzqR['vista'];
        $hotel = $ventanaIzqR['hotel'];
        $ocupacion = $ventanaIzqR['ocupacion'];
        $idreservacion_asientos = $ventanaIzqR['idreservacion_asientos'];
        if ($idreservacion_asientos == '') {
            $idreservacion_asientos = 0;
        }
        $tittle = $pasajero . " \n" . $agencia . " \n" . $agente . " \n" . $hotel . " \n" . $vista . "\n" . $ocupacion;
        if ($estatus == 'Disponible') {
            $colorAsiento = 'color: #000000; background-color:#d6d6d6;';
        } else if ($estatus == 'Apartado\disponible') {
            $colorAsiento = 'color: #000000; background-color:#d7e410;';
        } else if ($estatus == 'Coordinador') {
            $colorAsiento = 'color: #000000; background-color:#A0A0A0;';
        } else {
            $colorAsiento = 'color: #000000; background-color:#20c127;';
        }
        $pasajeroCamion = "'$pasajero'," . $camion . ',' . $idreservacion_asientos;

        $CONTENIDO_CAMION .= '<span><input onclick="info_reservacion(' . $pasajeroCamion . ')" style="width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; ' . $colorAsiento . '  " title="' . $tittle . '" value = "' . $asiento . '" readonly></input><input type="checkbox" id="' . $asiento . '" class="filled-in ck_asiento"/>
                              <label for="' . $asiento . '" style="margin-left:-30px; position:absolute;"> </label></span> &nbsp;';
    }
    $CONTENIDO_CAMION .= '<br>';
}
//***********************************************************************************************************/
//********************************FIN CAMION DE 47 LUGARES PUERTA EN MEDIO*******************************************/
//***
echo $contenidoReserva . $CONTENIDO_CAMION . '<img class="materialboxed" width="120" height="48" src="images/autobuses/' . $camion . '.jpg"></div>';
