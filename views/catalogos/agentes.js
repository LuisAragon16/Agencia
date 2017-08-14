var iAgenteID;
var nombre;
var amaterno;
var apaterno;
var cumpleanos;
var domicilio;
var estadoCivil;
var sucursal;
var telefono;
var celular;
var correoAgencia;
var correoPersonal;
var iAgenciaID;
var rol;
var iProveedorID;
var observaciones;
var estatus;
var tabla;
var mensaje;
var respuesta;

var button = "btn btn-warning btnEditar|btnEditar|editarAgente|E>iAgenteID|glyphicon glyphicon-pencil|Editar";
$(document).ready(function () {
    $('#btnActualizar').hide();
    $("#altaAgencia").validationEngine();
    $("#btnGuardar").click(function () {
        validarAgente();
    });
    $("#btnCancelar").click(function () {
        limpiarCamposAgente();
    });
    $("#btnActualizar").click(function () {
        actualizarAgente();
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    $('#cumpleanos').datepicker();
    cargarTablaAgentes();
    cargarCombosAgentes();
});
function cargarTablaAgentes() {
    destroyDataTable('tblAgentes', tabla);
    fillTable('tblAgentes', 'Sp_Agentes', '0|0|1', button);
    tabla = createDataTable('tblAgentes', tabla, true, true, true, true, true, true, '0');
}
function cargarCombosAgentes() {
    fillSelect('iRolID', 'Sp_CargaCombos', 2, 'ID');
    fillSelect('iAgenciaID', 'Sp_CargaCombos', 3, 'ID');
    fillSelect('iProveedorID', 'Sp_CargaCombos', 4, 'ID');
}
function limpiarCamposAgente() {
    $('#nombre').val('');
    $('#amaterno').val('');
    $('#apaterno').val('');
    $('#cumpleanos').val('');
    $('#domicilio').val('');
    $('#estadoCivil').val('Soltero');
    $('#sucursal').val('');
    $('#telefono').val('');
    $('#celular').val('');
    $('#correoAgencia').val('');
    $('#correoPersonal').val('');
    $('#iAgenciaID').val();
    $('#iRolID').val(1);
    $('#iProveedorID').val();
    $('#observaciones').val('');
}
function cargarDatosAgente() {
    iAgenteID = $('#iAgenteID').val();
    nombre = $('#nombre').val();
    amaterno = $('#amaterno').val();
    apaterno = $('#apaterno').val();
    cumpleanos = $('#cumpleanos').val();
    domicilio = $('#domicilio').val();
    estadoCivil = $('#estadoCivil').val();
    sucursal = $('#sucursal').val();
    telefono = $('#telefono').val();
    celular = $('#celular').val();
    correoAgencia = $('#correoAgencia').val();
    correoPersonal = $('#correoPersonal').val();
    iAgenciaID = $('#iAgenciaID').val();
    rol = $('#iRolID').val();
    iProveedorID = $('#iProveedorID').val();
    observaciones = $('#observaciones').val();
    estatus = $('input:checked').length;
}
function respuestaAgente(respuesta) {
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
function validarAgente() {
    if (!$("#altaAgente").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaAgente").validationEngine();
        return;
    } else {

        var dialog = confirm("small", "Desea agregar este agente?", guardarAgente);
    }
}
function guardarAgente() {
    cargarDatosAgente();
    parametros = '0|2|' + nombre + '|' + amaterno + '|' + apaterno + '|' + sucursal + '|' + estadoCivil + '|' + telefono +
            '|' + celular + '|' + correoAgencia + '|' + correoPersonal + '|' + domicilio + '|' + cumpleanos + '|' + iAgenciaID + '|' + rol
            + '|' + iProveedorID + '|' + observaciones;
    data = ejecutaQuery('Sp_Agentes', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    limpiarCamposAgente();
    respuestaAgente(respuesta);
    cargarTablaAgentes();
}
function editarAgente(iAgenteID) {
    if (!$('#altaAgentes').is(':visible'))
        $("[data-widget='collapse']").click();
    setTimeout(5000);
    ajxLoader();
    parametros = '0|' + iAgenteID + '|3';
    data = ejecutaQuery('Sp_Agentes', parametros, null);
    data.forEach(function (el) {
        $('#iAgenteID').val(el.iAgenteID);
        $('#nombre').val(el.nombre);
        $('#amaterno').val(el.amaterno);
        $('#apaterno').val(el.apaterno);
        $('#sucursal').val(el.sucursal);
        $('#estadoCivil').val(el.estadoCivil);
        $('#telefono').val(el.telefono);
        $('#celular').val(el.celular);
        $('#correoAgencia').val(el.correo);
        $('#correoPersonal').val(el.correoPersonal);
        $('#domicilio').val(el.domicilio);
        $('#cumpleanos').val(el.fechaCumpleanosC);
        $('#iAgeniaID').val(el.iAgeniaID);
        $('#iRolID').val(el.iRolID);
        $('#iProveedoresID').val(el.iProveedoresID);
        $('#observaciones').val(el.observaciones);
        if (el.activo == 0) {
            $('#chkEstatus').prop('checked', false).change();
        } else {
            $('#chkEstatus').prop('checked', true).change();
        }
    });
    $('#btnGuardar').hide();
    $('#btnActualizar').show();
}
function actualizarAgente() {
    if (!$("#altaAgente").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaAgente").validationEngine();
        return;
    }
    cargarDatosAgente();
    parametros = iAgenteID + '|4|' + nombre + '|' + amaterno + '|' + apaterno + '|' + sucursal + '|' + estadoCivil + '|' + telefono +
            '|' + celular + '|' + correoAgencia + '|' + correoPersonal + '|' + domicilio + '|' + cumpleanos + '|' + iAgenciaID + '|' + rol
            + '|' + iProveedorID + '|' + observaciones + '|' + estatus;
    data = ejecutaQuery('Sp_Agentes', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    limpiarCamposAgente();
    respuestaAgente(respuesta);
    cargarTablaAgentes();
    if ($('#altaAgentes').is(':visible'))
        $("[data-widget='collapse']").click();
}