var iDestinoID;
var descripcion;
var tipo;
var observaciones;
var estatus;
var tabla;
var mensaje;
var respuesta;
var data;

var button = "btn btn-warning btnEditar|btnEditar|editarDestino|E>iDestinoID|glyphicon glyphicon-pencil|Editar";
$(document).ready(function () {
    $('#btnActualizar').hide();
    $("#altaAgencia").validationEngine();
    $("#btnGuardar").click(function () {
        validarDestino();
    });
    $("#btnCancelar").click(function () {
        limpiarCamposDestino();
    });
    $("#btnActualizar").click(function () {
        actualizarDestino();
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    cargarTablaDestinos();
});
function cargarTablaDestinos() {
    destroyDataTable('tblDestinos', tabla);
    fillTable('tblDestinos', 'Sp_Destinos', '0|0|1', button);
    tabla = createDataTable('tblDestinos', tabla, true, true, true, true, true, true, '0');
}
function limpiarCamposDestino() {
    $('#descripcion').val('');
    $('#tipo').val(0);
    $('#observaciones').val('');
}
function cargarDatosDestino() {
    iDestinoID = $('#iDestinoID').val();
    descripcion = $('#descripcion').val();
    tipo = $('#tipo').val();
    rfc = $('#rfc').val();
    observaciones = $('#observaciones').val();
    estatus = $('input:checked').length;
}
function respuestaDestino(respuesta) {
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
function validarDestino() {
    if (!$("#altaDestino").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaDestino").validationEngine();
        return;
    } else {

        var dialog = confirm("small", "Desea agregar este destino?", guardarDestino);
    }
}
function guardarDestino() {
    cargarDatosDestino();
    parametros = '0|2|' + descripcion + '|' + observaciones + '|' + tipo;
    data = ejecutaQuery('Sp_Destinos', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    limpiarCamposDestino();
    respuestaDestino(respuesta);
    cargarTablaDestinos();
}
function editarDestino(iDestinoID) {
    if (!$('#altaDestinos').is(':visible'))
        $("[data-widget='collapse']").click();
    setTimeout(5000);
    ajxLoader();
    parametros = '0|' + iDestinoID + '|3';
    data = ejecutaQuery('Sp_Destinos', parametros, null);
    data.forEach(function (el) {
        $('#iDestinoID').val(el.iDestinoID);
        $('#descripcion').val(el.descripcion);
        $('#observaciones').val(el.observaciones);
        $('#tipo').val(el.destino);
        if (el.activo == 0) {
            $('#chkEstatus').prop('checked', false).change();
        } else {
            $('#chkEstatus').prop('checked', true).change();
        }
    });
    $('#btnGuardar').hide();
    $('#btnActualizar').show();
}
function actualizarDestino() {
    cargarDatosDestino();
    parametros = iDestinoID + '|4|' + descripcion + '|' + observaciones + '|' + tipo + '|' + estatus;
    data = ejecutaQuery('Sp_Destinos', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    limpiarCamposDestino();
    respuestaDestino(respuesta);
    cargarTablaDestinos();
    if ($('#altaDestinos').is(':visible'))
        $("[data-widget='collapse']").click();
}