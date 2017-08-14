var iSalidaID;
var nombre;
var calle;
var noInt;
var noExt;
var colonia;
var cp;
var observaciones;
var coordenadas;
var estatus;
var tabla;
var mensaje;
var respuesta;
var data;


var button = "btn btn-warning btnEditar|btnEditar|editarSalida|E>iSalidaID|glyphicon glyphicon-pencil|Editar";
$(document).ready(function () {
    mostrarMapa();
    $('#btnActualizar').hide();
    $("#altaAgencia").validationEngine();
    $("#btnGuardar").click(function () {
        validarSalida();
    });
    $("#btnCancelar").click(function () {
        limpiarCamposSalida();
    });
    $("#btnActualizar").click(function () {
        actualizarSalida();
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    cargarTablaSalidas();
});
function cargarTablaSalidas() {
    destroyDataTable('tblSalidas', tabla);
    fillTable('tblSalidas', 'Sp_Salidas', '0|0|1', button);
    tabla = createDataTable('tblSalidas', tabla, true, true, true, true, true, true, '0');
}
function limpiarCamposSalida() {
    $('#nombre').val('');
    $('#calle').val('');
    $('#noInt').val('');
    $('#noExt').val('');
    $('#colonia').val('');
    $('#cp').val('');
    $('#observaciones').val('');
    $('#coordenadas').val('28.6140806, -106.0910354');
}
function cargarDatosSalida() {
    iSalidaID = $('#iSalidaID').val();
    nombre = $('#nombre').val();
    calle = $('#calle').val();
    noInt = $('#noInt').val();
    noExt = $('#noExt').val();
    colonia = $('#colonia').val();
    cp = $('#cp').val();
    observaciones = $('#observaciones').val();
    coordenadas = $('#coordenadas').val();
    estatus = $('input:checked').length;
}
function respuestaSalida(respuesta) {
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
function validarSalida() {
    if (!$("#altaSalida").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaSalida").validationEngine();
        return;
    } else {

        var dialog = confirm("small", "Desea agregar esta salida?", guardarSalida);
    }
}
function guardarSalida() {
    cargarDatosSalida();
    parametros = '0|2|' + nombre + '|' + calle + '|' + noInt + '|' + noExt + '|' + colonia + '|' + cp + '|' + observaciones + '|' + coordenadas;
    data = ejecutaQuery('Sp_Salidas', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    limpiarCamposSalida();
    respuestaSalida(respuesta);
    cargarTablaSalidas();
}
function editarSalida(iSalidaID) {
    $('#btnGuardar').hide();
    $('#btnActualizar').show();
    if (!$('#altaSalidas').is(':visible'))
        $("[data-widget='collapse']").click();
    setTimeout(5000);
    ajxLoader();
    parametros = '0|' + iSalidaID + '|3';
    data = ejecutaQuery('Sp_Salidas', parametros, null);
    data.forEach(function (el) {
        $('#iSalidaID').val(el.iSalidaID);
        $('#nombre').val(el.nombre);
        $('#calle').val(el.calle);
        $('#noInt').val(el.noInt);
        $('#noExt').val(el.noExt);
        $('#colonia').val(el.colonia);
        $('#cp').val(el.cp);
        $('#observaciones').val(el.observaciones);
        $('#coordenadas').val(el.coordenadas);
        if (el.activo == 0) {
            $('#chkEstatus').prop('checked', false).change();
        } else {
            $('#chkEstatus').prop('checked', true).change();
        }
        mostrarMapaBase(el.coordenadas);
    });
}
function actualizarSalida() {
    cargarDatosSalida();
    parametros = iSalidaID + '|4|' + nombre + '|' + calle + '|' + noInt + '|' + noExt + '|' + colonia + '|' + cp + '|' + observaciones + '|' + coordenadas + '|' + estatus;
    console.log(parametros);
    data = ejecutaQuery('Sp_Salidas', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    limpiarCamposSalida();
    respuestaSalida(respuesta);
    cargarTablaSalidas();
    if ($('#altaSalidas').is(':visible'))
        $("[data-widget='collapse']").click();
}
