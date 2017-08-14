var iAutobusID;
var especial;
var lugares;
var asiento;
var pasajero;
var estatus;
var cerrado;
var iAgenciaID;
var iAgenteID;
var iProveedorID;
var iVistaID;
var asientos;
var iOcupacionID;
var agencia;
var agente;
var proveedor;
var vista;
var ocupacion;
var color;
var ID;
var tabla;
var data;
var mensaje;
var respuesta;
var button = "btn btn-success btnReservar|btnReservar|abrirAutobus|E>iAutobusID#SE>especial#E>lugares|glyphicon glyphicon-check|Reservar";
$(document).ready(function () {
    $('#fechaInicioVenta').datepicker();
    $('#fechaFinVenta').datepicker();
    $('#fechaInicioDisponible').datepicker();
    $('#fechaFinDisponible').datepicker();
    $("#altaRsvaAutobus").validationEngine();
    $("#btnGuardar").click(function () {
        validarFormulario('altaFormRsvaAutobus', 'Desea agregar esta promoci&oacute;n?', guardarRsvaAutobus);
    });
    $("#btnCancelar").click(function () {
        limpiarCamposRsvaAutobus();
    });
    $("#btnActualizar").click(function () {
        validarFormulario('altaFormRsvaAutobus', 'Desea actualizar esta promoci&oacute;n?', actualizarRsvaAutobus);
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    cargarCombosRsvaAutobus();
    cargarTablaRsvaAutobus();
});
function cargarTablaRsvaAutobus() {
    destroyDataTable('tblRsvaAutobus', tabla);
    fillTable('tblRsvaAutobus', 'Sp_RsvaAutobus', '0|0|1', button);
    tabla = createDataTable('tblRsvaAutobus', tabla, true, true, true, true, true, true, '0|1|2');
}
function cargarCombosRsvaAutobus() {
    fillSelect('iAgenciaID', 'Sp_CargaCombos', 3, 'ID');
    fillSelect('iAgenteID', 'Sp_CargaCombos', 11, 'ID');
    fillSelect('iServicioID', 'Sp_CargaCombos', 4, 'ID');
    fillSelect('iVistaID', 'Sp_CargaCombos', 12, 'ID');
    fillSelect('iOcupacionID', 'Sp_CargaCombos', 13, 'ID');
}
function cargarDatosRsvaAutobus(accion, ID, especial, lugares, asientos) {
    asiento = $("#asiento").val();
    iAutobusID = $("#iAutobusID").val();
    pasajero = $("#pasajero").val();
    estatus = $("#estatus").val();
    cerrado = $("#cerrado").val();
    iAgenciaID = $("#iAgenciaID").val();
    iAgenteID = $("#iAgenteID").val();
    iProveedorID = $("#iServicioID").val();
    iVistaID = $("#iVistaID").val();
    iOcupacionID = $("#iOcupacionID").val();
    parametros = ID + '|' + accion + '|' + pasajero + '|' + iAgenciaID + '|' + iAgenteID + '|' + iProveedorID + '|' + iVistaID + '|' + iOcupacionID + '|' + estatus + '|' + asientos + '|' + especial + '|' + lugares;
    return parametros;
}
function infoReservacion(asiento, autobus) {
    alert(asiento+' '+autobus)
}
function abrirAutobus(iAutobusID, especial, lugares) {
    var mostrarAsientos;
    var contador = 1;
    var asientosHTML = '';
    if (lugares == 51) {
        while (contador <= 4) {
            if (contador == 1) {
                asientos = '4,8,12,16,20,24,28,32,36,40,44,48';
            } else if (contador == 2) {
                asientos = '3,7,11,15,19,23,27,31,35,39,43,47,51';
            } else if (contador == 3) {
                asientos = '2,6,10,14,18,22,26,30,34,38,42,46,50';
            } else if (contador == 4) {
                asientos = '1,5,9,13,17,21,25,29,33,37,41,45,49';
            }
            parametros = cargarDatosRsvaAutobus(2, iAutobusID, especial, lugares, asientos);
            console.log(parametros);
            data = ejecutaQuery('Sp_RsvaAutobus', parametros, 'id_usuario');
            data.forEach(function (el) {
                asiento = el.asiento;
//                pasajero = el.pasajero;
//                estatus = el.estatus;
//                agencia = el.agencia;
//                agente = el.agente;
//                proveedor = el.proveedor;
//                vista = el.vista;
//                ocupacion = el.ocupacion;
                estatus = el.estatus;
                color = el.color
                if (contador == 1) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 48) {
                        asientosHTML += '<input  style="margin-bottom: 10px; width:60px; height:100px;  position: absolute;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF;"\n\
                     title="W.C." value = "W.C." readonly></input> &nbsp; <br>';
                    }
                } else if (contador == 2) {
                    if (asiento == 51) {
                        var asiento51 = '<span><input onclick="info_reservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px;\n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" style="margin-left:-20px;" id="' + asiento + '" class="filled-in ck_asiento"/>'
                        '<label for="' + asiento + '" style="margin-left:-30px; position:absolute;"> </label> < /span> &nbsp;';
                        asientosHTML += '<input style="margin-bottom: 10px; width:900px; height:37px;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0;" value="PASILLO"></input> &nbsp;';
                        asientosHTML += asiento51 + '<br>';
                    } else {
                        asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" > </label></span>&nbsp; ';
                    }
                } else if (contador == 3) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 50) {
                        asientosHTML += '<br>';
                    }
                } else if (contador == 4) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 49) {
                        asientosHTML += '<br>';
                    }
                }

            });


            contador++;
        }
        $('#asientosCamion').html(asientosHTML);
    } else if (lugares == 42) {
        while (contador <= 4) {
            if (contador == 1) {
                asientos = '4,8,12,16,20,24,28,32,36,40';
            } else if (contador == 2) {
                asientos = '3,7,11,15,19,23,27,31,35,39';
            } else if (contador == 3) {
                asientos = '2,6,10,14,18,22,26,30,34,38,42';
            } else if (contador == 4) {
                asientos = '1,5,9,13,17,21,25,29,33,37,41';
            }
            parametros = cargarDatosRsvaAutobus(2, iAutobusID, especial, lugares, asientos);
            console.log(parametros);
            data = ejecutaQuery('Sp_RsvaAutobus', parametros, 'id_usuario');
            data.forEach(function (el) {
                asiento = el.asiento;
//                pasajero = el.pasajero;
//                estatus = el.estatus;
//                agencia = el.agencia;
//                agente = el.agente;
//                proveedor = el.proveedor;
//                vista = el.vista;
//                ocupacion = el.ocupacion;
                estatus = el.estatus;
                color = el.color
                if (contador == 1) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: -15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 40) {
                        asientosHTML += '<input  style="margin-bottom: 10px; width:60px; height:100px;  position: absolute;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF;"\n\
                     title="W.C." value = "W.C." readonly></input> &nbsp; <br><br>';
                    }
                } else if (contador == 2) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 39) {
                        asientosHTML += '<input style="margin-bottom: 10px; width:838px; height:37px;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0;" value="PASILLO"><br>';
                    }
                } else if (contador == 3) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 42) {
                        asientosHTML += '<br>';
                    }
                } else if (contador == 4) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 41) {
                        asientosHTML += '<br>';
                    }
                }

            });


            contador++;
        }
        $('#asientosCamion').html(asientosHTML);
    } else if (lugares == 47 && especial == 'NO') {
        while (contador <= 4) {
            if (contador == 1) {
                asientos = '4,8,12,16,20,24,28,32,36,40,44';
            } else if (contador == 2) {
                asientos = '3,7,11,15,19,23,27,31,35,39,43,47';
            } else if (contador == 3) {
                asientos = '2,6,10,14,18,22,26,30,34,38,42,46';
            } else if (contador == 4) {
                asientos = '1,5,9,13,17,21,25,29,33,37,41,45';
            }
            parametros = cargarDatosRsvaAutobus(2, iAutobusID, especial, lugares, asientos);
            console.log(parametros);
            data = ejecutaQuery('Sp_RsvaAutobus', parametros, 'id_usuario');
            data.forEach(function (el) {
                asiento = el.asiento;
//                pasajero = el.pasajero;
//                estatus = el.estatus;
//                agencia = el.agencia;
//                agente = el.agente;
//                proveedor = el.proveedor;
//                vista = el.vista;
//                ocupacion = el.ocupacion;
                estatus = el.estatus;
                color = el.color
                if (contador == 1) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 44) {
                        asientosHTML += '<input  style="margin-bottom: 10px; width:60px; height:100px;  position: absolute;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF;"\n\
                     title="W.C." value = "W.C." readonly></input> &nbsp; <br>';
                    }
                } else if (contador == 2) {
                    if (asiento == 47) {
                        var asiento51 = '<span><input onclick="info_reservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px;\n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" style="margin-left:-20px;" id="' + asiento + '" class="filled-in ck_asiento"/>'
                        '<label for="' + asiento + '" style="margin-left:-30px; position:absolute;"> </label> < /span> &nbsp;';
                        asientosHTML += '<input style="margin-bottom: 10px; width:835px; height:37px;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0;" value="PASILLO"></input> &nbsp;';
                        asientosHTML += asiento51 + '<br>';
                    } else {
                        asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" > </label></span>&nbsp; ';
                    }
                } else if (contador == 3) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 46) {
                        asientosHTML += '<br>';
                    }
                } else if (contador == 4) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 45) {
                        asientosHTML += '<br>';
                    }
                }
            });
            contador++;
        }
        $('#asientosCamion').html(asientosHTML);
    } else if (lugares == 47 && especial == 'PE') {
        while (contador <= 4) {
            if (contador == 1) {
                asientos = '4,8,12,16,20,26,30,34,38,42,46';
            } else if (contador == 2) {
                asientos = '3,7,11,15,19,23,27,31,35,39,43,47';
            } else if (contador == 3) {
                asientos = '2,6,10,14,18,22,24,28,32,36,40,44';
            } else if (contador == 4) {
                asientos = '1,5,9,13,17,21,25,29,33,37,41,45';
            }
            parametros = cargarDatosRsvaAutobus(2, iAutobusID, especial, lugares, asientos);
            console.log(parametros);
            data = ejecutaQuery('Sp_RsvaAutobus', parametros, 'id_usuario');
            data.forEach(function (el) {
                asiento = el.asiento;
//                pasajero = el.pasajero;
//                estatus = el.estatus;
//                agencia = el.agencia;
//                agente = el.agente;
//                proveedor = el.proveedor;
//                vista = el.vista;
//                ocupacion = el.ocupacion;
                estatus = el.estatus;
                color = el.color
                if (contador == 1) {
                    if (asiento == 20) {
                        asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp;\n\
                    <input  style="width:30px; height:37px;text-align: center;  position: inherit;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF; " title="W" value = "W" readonly></input> &nbsp;\n\
                    <input  style="width:30px; height:37px;text-align: center;  position: inherit;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0; "value = "|" readonly></input> &nbsp;';
                    } else {
                        asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    }
                    if (asiento == 46) {
                        asientosHTML += '<br>';
                    }
                } else if (contador == 2) {
                    if (asiento == 47) {
                        var asiento51 = '<span><input onclick="info_reservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px;\n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" style="margin-left:-20px;" id="' + asiento + '" class="filled-in ck_asiento"/>'
                        '<label for="' + asiento + '" style="margin-left:-30px; position:absolute;"> </label> < /span> &nbsp;';
                        asientosHTML += '<input style="margin-bottom: 10px; width:835px; height:37px;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0;" value="PASILLO"></input> &nbsp;';
                        asientosHTML += asiento51 + '<br>';
                    } else if (asiento == 19) {
                        asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp;\n\
                    <input  style="width:30px; height:37px;text-align: center;  position: inherit;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#CCFFFF; " title="C" value = "C" readonly></input> &nbsp;\n\
                    <input  style="width:30px; height:37px;text-align: center;  position: inherit;text-align: center;border-radius: 15px 15px 15px 15px; color: #000000; background-color:#C0C0C0; " value = "|" readonly></input> &nbsp;';
                    } else {
                        asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    }
                    if (asiento == 46) {
                        asientosHTML += '<br>';
                    }
                } else if (contador == 3) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 44) {
                        asientosHTML += '<br>';
                    }
                } else if (contador == 4) {
                    asientosHTML += '<span><input onclick="infoReservacion(' + asiento + "," + iAutobusID + ')" style="margin-bottom: 15px; width:75px; text-align: center; height:37px; border-radius: 15px 15px 15px 15px; \n\
                    color: #000000; background-color:' + color + ';" value="' + asiento + '" readonly ></input><input type="checkbox" id="' + asiento + '" style="margin-left:-20px;" class="ck_asiento"/>\n\
                    <label for="' + asiento + '" style="margin-left:-30px; position:absolute;" ></label></span>&nbsp; ';
                    if (asiento == 45) {
                        asientosHTML += '<br>';
                    }
                }
            });
            contador++;
        }
        $('#asientosCamion').html(asientosHTML);
    }
}
function guardarRsvaAutobus() {
    parametros = cargarDatosRsvaAutobus(2, 0);
    data = ejecutaQuery('Sp_RsvaAutobus', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    respuestaAjax(respuesta, mensaje);
    cargarTablaRsvaAutobus();
}
function editarRsvaAutobus(ID) {
    if (!$('#altaRsvaAutobus').is(':visible'))
        $("[data-widget='collapse']").click();
    parametros = cargarDatosRsvaAutobus(3, ID);
    data = ejecutaQuery('Sp_RsvaAutobus', parametros, 'id_usuario');
    data.forEach(function (el) {
        $("#iTarifaID").val(el.iTarifaID);
        $("#iServicioID").val(el.iServicioID);
        $("#comentarios").val(el.comentarios);
        $("#fechaInicioVenta").val(el.fechaInicioVenta1);
        $("#fechaFinVenta").val(el.fechaFinVenta1);
        $("#fechaInicioDisponible").val(el.fechaInicioDisponible1);
        $("#fechaFinDisponible").val(el.fechaFinDisponible1);
        $("#llevaTasa").val(el.llevaTasa);
        $("#tasa").val(el.tasa);
        $("#iTipoTarifaID").val(el.iTipoTarifaID);
        $("#tarifaNetaPublica").val(el.tarifaNetaPublica);
        $("#descuento").val(el.descuento);
        $("#menoresGratis").val(el.menoresGratis);
        $("#tipoMenorGratis").val(el.tipoMenorGratis);
        $("#iUsuarioIDCreo").val(el.iUsuarioIDCreo);
        $("#fechaCreacion").val(el.fechaCreacion);
        $("#iUsuarioIDModificacion").val(el.iUsuarioIDModificacion);
        $("#fechaModificacion").val(el.fechaModificacion);
        if (el.activo == 0) {
            $('#chkEstatus').prop('checked', false).change();
        } else {
            $('#chkEstatus').prop('checked', true).change();
        }
        if (el.menores2x1 == 0) {
            $('#menores2x1').prop('checked', false).change();
        } else {
            $('#menores2x1').prop('checked', true).change();
        }
        if (el.junior2x1 == 0) {
            $('#junior2x1').prop('checked', false).change();
        } else {
            $('#junior2x1').prop('checked', true).change();
        }
    });
    $("#iPromocionID").val(ID);
    $('#btnGuardar').hide();
    $('#btnActualizar').show();
}
function actualizarRsvaAutobus() {
    ID = $("#iPromocionID").val();
    parametros = cargarDatosRsvaAutobus(4, ID);
    console.log(parametros);
    data = ejecutaQuery('Sp_RsvaAutobus', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    respuestaAjax(respuesta, mensaje);
    cargarTablaRsvaAutobus();
    if ($('#altaRsvaAutobus').is(':visible'))
        $("[data-widget='collapse']").click();
}