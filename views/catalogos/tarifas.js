var iTarifaID;
var descripcion;
var comentarios;
var iTipoHabitacionID;
var iTipoTarifaID;
var iProveedorID;
var persona1;
var persona2;
var persona3;
var persona4;
var persona5;
var persona6;
var extra;
var menor;
var edadMenor;
var junior;
var edadJunior;
var tasa;
var ocupacion;
var estatus;
var parametros;
var mensaje;
var respuesta;
var data;
var tabla;
var data;
var button = "btn btn-warning btnEditar|btnEditar|editarTarifa|E>iTarifaID|glyphicon glyphicon-pencil|Editar";
var tablaP;
var dataP;
var buttonP = "btn btn-danger btnEditar|btnInactivoP|estatusPeriodo|F>0#E>iPeriodoTarifaID|glyphicon glyphicon-remove|Inactivo@btn btn-success btnEditar|btnActivarPeriodo|estatusPeriodo|F>1#E>iPeriodoTarifaID|glyphicon glyphicon-ok|Activar";
$(document).ready(function () {
    $('#fechaInicio').datepicker();
    $('#fechaFin').datepicker();
    $('#btnActualizar').hide();
    $('#btnAgregarPeriodo').hide();
    $('#btnVerPeriodos').hide();
    $('#btnDias').hide();
    $('#btnPublica').hide();
    $('#btnCalcular').hide();
    $("#altaTarifa").validationEngine();
    $("#btnGuardar").click(function () {
        validarTarifa();
    });
    $("#btnCancelar").click(function () {
        limpiarCamposTarifas();
    });
    $("#btnActualizar").click(function () {
        actualizarTarifa();
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    $("#btnCalcular").click(function () {
        $("#mdlCalculo").modal();
    });
    $("#btnDias").click(function () {
        verDias();
    });
    $("#btnVerPeriodos").click(function () {
        verPeriodos();
    });
    $("#btnAgregarPeriodo").click(function () {
        $("#mdlPeriodos").modal();
    });
    $("#btnPublica").click(function () {
        verPublica();
    });
    cargarTablaTarifas();
    cargarCombosTarifas();
});
function cargarCombosTarifas() {
    fillSelect('iTipoTarifaID', 'Sp_CargaCombos', 8, 'ID');
    fillSelect('iTipoHabitacionID', 'Sp_CargaCombos', 7, 'ID');
    fillSelect('iProveedorID', 'Sp_CargaCombos', 9, 'ID');
}
function cargarTablaTarifas() {
    destroyDataTable('tblTarifas', tabla);
    fillTable('tblTarifas', 'Sp_Tarifas', '0|0|1', button);
    tabla = createDataTable('tblTarifas', tabla, true, true, true, true, true, true, '0');
}
function limpiarCamposTarifas() {
    $("#iTarifaID").val("");
    $("#descripcion").val("");
    $("#comentarios").val("");
    $("#iTipoHabitacionID").val(1);
    $("#iTipoTarifaID").val(1);
    $("#iProveedorID").val(1);
    $("#persona1").val(0.00);
    $("#persona2").val(0.00);
    $("#persona3").val(0.00);
    $("#persona4").val(0.00);
    $("#persona5").val(0.00);
    $("#persona6").val(0.00);
    $("#extra").val(0.00);
    $("#menor").val(0.00);
    $("#edadMenor").val("");
    $("#junior").val(0.00);
    $("#edadJunior").val("");
    $("#tasa").val(0.80);
    $("#ocupacion").val(1);
    $('#btnActualizar').hide();
    $('#btnPeriodos').hide();
    $('#btnDias').hide();
    $('#btnPublica').hide();
    $('#btnCalcular').hide();
    $('#btnAgregarPeriodo').hide();
    $('#btnVerPeriodos').hide();
    $('#btnGuardar').show();
    $('#chkLunes').prop('checked', true).change();
    $('#chkMartes').prop('checked', true).change();
    $('#chkMiercoles').prop('checked', true).change();
    $('#chkJueves').prop('checked', true).change();
    $('#chkViernes').prop('checked', true).change();
    $('#chkSabado').prop('checked', true).change();
    $('#chkDomingo').prop('checked', true).change();
}
function cargarDatosTarifas() {
    iTarifaID = $("#iTarifaID").val();
    descripcion = $("#descripcion").val();
    comentarios = $("#comentarios").val();
    iTipoHabitacionID = $("#iTipoHabitacionID").val();
    iTipoTarifaID = $("#iTipoTarifaID").val();
    iProveedorID = $("#iProveedorID").val();
    persona1 = $("#persona1").val();
    persona2 = $("#persona2").val();
    persona3 = $("#persona3").val();
    persona4 = $("#persona4").val();
    persona5 = $("#persona5").val();
    persona6 = $("#persona6").val();
    extra = $("#extra").val();
    menor = $("#menor").val();
    edadMenor = $("#edadMenor").val();
    junior = $("#junior").val();
    edadJunior = $("#edadJunior").val();
    tasa = $("#tasa").val();
    ocupacion = $("#ocupacion").val();
    estatus = $('input:checked').length;
}
function respuestaTarifa(respuesta) {
    if (respuesta == 1) {
        bootbox.alert({
            message: mensaje
        });
    } else {
        bootbox.alert({
            message: mensaje,
            size: 'small',
            callback: function () {
            }
        });
    }
}
function validarTarifa() {
    if (!$("#altaTarifa").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaTarifa").validationEngine();
        return;
    } else {
        var dialog = confirm("small", "Desea agregar esta tarifa?", guardarTarifa);
    }
}
function guardarTarifa() {
    cargarDatosTarifas();
    parametros = '0|2|0||||' + descripcion + '|' + comentarios + '|' + iTipoHabitacionID + '|' + iTipoTarifaID + '|' + iProveedorID + '|' + persona1 + '|'
            + persona2 + '|' + persona3 + '|' + persona4 + '|' + persona5 + '|' + persona6 + '|0|0' + '|' + extra + '|' + menor + '|' + junior + '|'
            + edadMenor + '|' + edadJunior + '|' + tasa + '|' + ocupacion + '|1';
    data = ejecutaQuery('Sp_Tarifas', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    limpiarCamposTarifas();
    respuestaTarifa(respuesta);
    cargarTablaTarifas();
}
function editarTarifa(iTarifaID) {
    if (!$('#altaTarifas').is(':visible'))
        $("[data-widget='collapse']").click();
    ``
    setTimeout(5000);
    ajxLoader();
    parametros = '0|' + iTarifaID + '|3';
    data = ejecutaQuery('Sp_Tarifas', parametros, null);
    data.forEach(function (el) {
        $("#iTarifaID").val(el.iTarifaID);
        $("#descripcion").val(el.descripcion);
        $("#comentarios").val(el.comentarios);
        $("#iTipoHabitacionID").val(el.iTipoHabitacionID);
        $("#iTipoTarifaID").val(el.iTipoTarifaID);
        $("#iProveedorID").val(el.iProveedorID);
        $("#persona1").val(el.persona1);
        $("#persona2").val(el.persona2);
        $("#persona3").val(el.persona3);
        $("#persona4").val(el.persona4);
        $("#persona5").val(el.persona5);
        $("#persona6").val(el.persona6);
        $("#extra").val(el.extra);
        $("#menor").val(el.menor);
        $("#edadMenor").val(el.edadMenor);
        $("#junior").val(el.junior);
        $("#edadJunior").val(el.edadJunior);
        $("#tasa").val(el.tasaTarifaPublica);
        $("#ocupacion").val(el.ocupacionMaxima);
        if (el.activo == 0) {
            $('#chkEstatus').prop('checked', false).change();
        } else {
            $('#chkEstatus').prop('checked', true).change();
        }
    });
    $('#btnGuardar').hide();
    $('#btnActualizar').show();
    $('#btnPeriodos').show();
    $('#btnDias').show();
    $('#btnPublica').show();
    $('#btnCalcular').show();
    $('#btnAgregarPeriodo').show();
    $('#btnVerPeriodos').show();
}
function actualizarTarifa() {
    if (!$("#altaTarifa").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaTarifa").validationEngine();
        return;
    }
    cargarDatosTarifas();
    parametros = iTarifaID + '|4|0||||' + descripcion + '|' + comentarios + '|' + iTipoHabitacionID + '|' + iTipoTarifaID + '|' + iProveedorID + '|' + persona1 + '|'
            + persona2 + '|' + persona3 + '|' + persona4 + '|' + persona5 + '|' + persona6 + '|0|0' + '|' + extra + '|' + menor + '|' + junior + '|'
            + edadMenor + '|' + edadJunior + '|' + tasa + '|' + ocupacion + '|' + estatus;
    data = ejecutaQuery('Sp_Tarifas', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    respuestaTarifa(respuesta);
    cargarTablaTarifas();
    if ($('#altaTarifas').is(':visible'))
        $("[data-widget='collapse']").click();
}
function calcularTarifas() {
    cargarDatosTarifas();
    var calculo = $("#calculo").val();
    if (!$("#altaTarifa").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaTarifa").validationEngine();
        return;
    }
    if (persona1 == '') {
        bootbox.alert({
            message: 'Por favor capture el costo de la ocupaci&oacute;n sencilla'
        });
        return;
    }
    if (ocupacion == '') {
        bootbox.alert({
            message: 'Por favor capture la ocupaci&oacute;n maxima'
        });
        return;
    }
    var contador = 1;
    var monto = 0.00;
    var contadorP = 0;
    var calculoExtra = 0.00;
    /*     * ************EUROPEO CON IMPUESTOS EXTRA *************** */
    if (calculo == 1) {
        contadorP = 2;
        while (contadorP <= ocupacion) {
            if (contadorP == 2) {
                monto = (persona1 / 2.00);
                monto = Math.round(monto);
                $('#persona2').val(monto);
            } else if (contadorP == 3) {
                monto = parseFloat(parseFloat(persona1) + parseFloat(extra)) / 3;
                monto = Math.round(monto);
                $('#persona3').val(monto);
                contador++;
            } else {
                calculoExtra = extra * contador;
                monto = parseFloat(parseFloat(persona1) + parseFloat(calculoExtra)) / contadorP;
                monto = Math.round(monto);
                $('#persona' + contadorP).val(monto);
                contador++;
            }
            calculoExtra = 0.00;
            contadorP++;
        }
    }
    /*     * ************ EUROPEO SIN IMPUESTOS EXTRA *************** */
    if (calculo == 2 && ocupacion > 0) {
        contadorP = 1;
        while (contadorP <= ocupacion) {
            if (contadorP == 1) {
                monto = (parseFloat(persona1) * 1.19);
                monto = monto.toFixed(2);
                $('#persona1').val(monto);
            } else if (contadorP == 2) {
                monto = ((parseFloat(persona1) * 1.19) / 2);
                monto = monto.toFixed(2);
                $('#persona2').val(monto);
            } else if (contadorP == 3) {
                monto = (parseFloat(parseFloat(persona1) + parseFloat(extra)) * 1.19) / 3;
                monto = monto.toFixed(2);
                $('#persona3').val(monto);
                contador++;
            } else {
                calculoExtra = extra * contador;
                monto = ((parseFloat(persona1) + parseFloat(calculoExtra)) * 1.19) / contadorP;
                monto = monto.toFixed(2);
                $('#persona' + contadorP).val(monto);
                contador++;
            }
            contadorP++;
        }
    }
    /*     * ************ EUROPEO CON IMPUESTOS ********************* */
    if (calculo == 3 && ocupacion > 0) {
        contadorP = 2;
        while (contadorP <= ocupacion) {
            if (contadorP == 2) {
                monto = (persona2 / contadorP);
                monto = monto.toFixed(2);
                $('#persona2').val(monto);
                contadorP++;
            } else if (contadorP == 3) {
                monto = (persona3 / contadorP);
                monto = monto.toFixed(2);
                $('#persona3').val(monto);
                contadorP++;
            } else if (contadorP == 4) {
                monto = (persona4 / contadorP);
                monto = monto.toFixed(2);
                $('#persona4').val(monto);
                contadorP++;
            } else if (contadorP == 5) {
                monto = (persona5 / contadorP);
                monto = monto.toFixed(2);
                $('#persona5').val(monto);
                contadorP++;
            } else if (contadorP == 6) {
                monto = (persona6 / contadorP);
                monto = monto.toFixed(2);
                $('#persona6').val(monto);
                contadorP++;
            } else {
                contadorP++;
            }
        }
    }
    /*     * ************ TODO INCLUIDO CON IMPUESTOS PERSONA EXTRA RIU  ********************* */
    if (calculo == 4) {
        /*         * ************ CALCULO PARA HABITACION ESTANDAR  ********************* */
        if (iTipoHabitacionID == 1) {
            monto = ((persona2 * 2) + parseFloat(extra)) / 3;
            monto = monto.toFixed(2);
            $("#persona3").val(0.00);
            $("#persona4").val(0.00);
            $("#persona5").val(0.00);
            $("#persona6").val(0.00);
            $('#persona3').val(monto);
        } /*         * ************ CALCULO PARA HABITACION FAMILIAR  ********************* */
        else if (iTipoHabitacionID == 2) {
            $("#persona1").val(0.00);
            $("#persona3").val(0.00);
            $("#persona4").val(0.00);
            $("#persona5").val(0.00);
            $("#persona6").val(0.00);
            monto = ((persona2 * 2) + parseFloat(extra)) / 3;
            $('#persona3').val(monto);
            monto = ((persona2 * 2) + (parseFloat(extra) * 2)) / 4;
            $('#persona4').val(monto);
        } /*         * ************ CALCULO PARA HABITACION DUPLEX  ********************* */
        else if (iTipoHabitacionID == 3) {
            $("#persona1").val(0.00);
            $("#persona2").val(0.00);
            $("#persona4").val(0.00);
            $("#persona5").val(0.00);
            $("#persona6").val(0.00);
            monto = ((persona3 * 3) + parseFloat(extra)) / 4;
            $('#persona4').val(monto);
            monto = ((persona3 * 3) + (parseFloat(extra) * 2)) / 5;
            $('#persona5').val(monto);
        }
    }
}
function verDias() {
    var diasCadena = '';
    var diasArray;
    cargarDatosTarifas();
    parametros = iTarifaID + '|7|0|||';
    console.log(parametros)
    data = ejecutaQuery('Sp_Tarifas', parametros, 'id_usuario');
    data.forEach(function (el) {
        diasCadena = el.dias;
        console.log(el.dias);
    });
    $('#chkLunes').prop('checked', false).change();
    $('#chkMartes').prop('checked', false).change();
    $('#chkMiercoles').prop('checked', false).change();
    $('#chkJueves').prop('checked', false).change();
    $('#chkViernes').prop('checked', false).change();
    $('#chkSabado').prop('checked', false).change();
    $('#chkDomingo').prop('checked', false).change();
    if (diasCadena == '') {
        $("#mdlDias").modal();
        return;
    }
    diasArray = diasCadena.split('*');
    for (var k = 0; k < diasArray.length; k++) {
        if (diasArray[k] == 'L') {
            $('#chkLunes').prop('checked', true).change();
        }
        if (diasArray[k] == 'M') {
            $('#chkMartes').prop('checked', true).change();
        }
        if (diasArray[k] == 'X') {
            $('#chkMiercoles').prop('checked', true).change();
        }
        if (diasArray[k] == 'J') {
            $('#chkJueves').prop('checked', true).change();
        }
        if (diasArray[k] == 'V') {
            $('#chkViernes').prop('checked', true).change();
        }
        if (diasArray[k] == 'S') {
            $('#chkSabado').prop('checked', true).change();
        }
        if (diasArray[k] == 'D') {
            $('#chkDomingo').prop('checked', true).change();
        }
    }
    $("#mdlDias").modal();
}
function guardarDias() {
    cargarDatosTarifas();
    var dias = '';
    if ($('#chkLunes').prop("checked")) {
        dias = 'L*';
    }
    if ($('#chkMartes').prop("checked")) {
        dias = dias + 'M*';
    }
    if ($('#chkMiercoles').prop("checked")) {
        dias = dias + 'X*';
    }
    if ($('#chkJueves').prop("checked")) {
        dias = dias + 'J*';
    }
    if ($('#chkViernes').prop("checked")) {
        dias = dias + 'V*';
    }
    if ($('#chkSabado').prop("checked")) {
        dias = dias + 'S*';
    }
    if ($('#chkDomingo').prop("checked")) {
        dias = dias + 'D*';
    }
    dias = dias.slice(0, -1);
    console.log(dias)

    if (dias != '') {
        parametros = iTarifaID + '|5|0|' + dias + '||';
        console.log(parametros)
        data = ejecutaQuery('Sp_Tarifas', parametros, 'id_usuario');
        data.forEach(function (el) {
            mensaje = el.Mensaje;
            respuesta = el.Respuesta;
        });
        respuestaTarifa(respuesta);
    }

}
function verPublica() {
    cargarDatosTarifas();
    parametros = iTarifaID + '|6|0|||';
    data = ejecutaQuery('Sp_Tarifas', parametros, 'id_usuario');
    data.forEach(function (el) {
        $('#pSencilla').val(el.Sencilla);
        $('#pDoble').val(el.Doble);
        $('#pTriple').val(el.Triple);
        $('#pCuadruple').val(el.Cuadruple);
        $('#pQuintuple').val(el.Quintuple);
        $('#pSextuple').val(el.Sextuple);
        $('#pMenor').val(el.Menor);
        $('#pJunior').val(el.Junior);
    });
    $("#mdlPublica").modal();
}
function gaurdarPeriodo() {
    cargarDatosTarifas();
    var fechaInicio = $('#fechaInicio').val();
    var fechaFin = $('#fechaFin').val();
    parametros = iTarifaID + '|9|0||' + fechaInicio + '|' + fechaFin;
    console.log(parametros)
    data = ejecutaQuery('Sp_Tarifas', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    respuestaAjax(respuesta, mensaje);
}
function verPeriodos() {
    cargarDatosTarifas();
    destroyDataTable('tblTarifasPeriodos', tablaP);
    fillTableBootBox('tblTarifasPeriodos', 'Sp_Tarifas', '0|' + iTarifaID + '|8', buttonP, 'iPeriodoID|Inicio|Fin|Estatus|Acci&oacute;n', 'large', 'Periodos de la tarifa');
    tabla = createDataTable('tblTarifasPeriodos', tablaP, true, true, true, true, true, true, '0');
}
function estatusPeriodo(valor, iPeriodoTarifaID) {
    $('.modal').modal('hide');
    cargarDatosTarifas();
    parametros = iTarifaID + '|10|0||||' + descripcion + '|' + comentarios + '|' + iTipoHabitacionID + '|' + iTipoTarifaID + '|' + iProveedorID + '|' + persona1 + '|'
            + persona2 + '|' + persona3 + '|' + persona4 + '|' + persona5 + '|' + persona6 + '|0|0' + '|' + extra + '|' + menor + '|' + junior + '|'
            + edadMenor + '|' + edadJunior + '|' + tasa + '|' + ocupacion + '|' + valor + '|' + iPeriodoTarifaID;
    console.log(parametros);
    data = ejecutaQuery('Sp_Tarifas', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    respuestaAjax(respuesta, mensaje);
}