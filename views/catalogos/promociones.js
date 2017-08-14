var iTarifaID;
var iServicioID;
var comentarios;
var fechaInicioVenta;
var fechaFinVenta;
var fechaInicioDisponible;
var fechaFinDisponible;
var llevaTasa;
var tasa;
var iTipoTarifaID;
var tarifaNetaPublica;
var descuento;
var menoresGratis;
var menores2x1;
var tipoMenorGratis;
var junior2x1;
var iUsuarioIDCreo;
var fechaCreacion;
var iUsuarioIDModificacion;
var fechaModificacion;
var activo;

var ID;
var tabla;
var data;
var mensaje;
var respuesta;
var button = "btn btn-warning btnEditar|btnEditar|editarPromociones|E>iPromocionID|glyphicon glyphicon-pencil|Edit";
$(document).ready(function () {
    $('#btnActualizar').hide();
    $('#fechaInicioVenta').datepicker();
    $('#fechaFinVenta').datepicker();
    $('#fechaInicioDisponible').datepicker();
    $('#fechaFinDisponible').datepicker();
    $("#altaPromociones").validationEngine();
    $("#btnGuardar").click(function () {
        validarFormulario('altaFormPromociones', 'Desea agregar esta promoci&oacute;n?', guardarPromociones);
    });
    $("#btnCancelar").click(function () {
        limpiarCamposPromociones();
    });
    $("#btnActualizar").click(function () {
        validarFormulario('altaFormPromociones', 'Desea actualizar esta promoci&oacute;n?', actualizarPromociones);
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    cargarCombosPromociones();
    cargarTablaPromociones();
});
function limpiarCamposPromociones() {
    $("#iTarifaID").val(1);
    $("#iServicioID").val(1);
    $("#comentarios").val('');
    $("#fechaInicioVenta").val('');
    $("#fechaFinVenta").val('');
    $("#fechaInicioDisponible").val('');
    $("#fechaFinDisponible").val('');
    $("#llevaTasa").val(1);
    $("#tasa").val(0.00);
    $("#iTipoTarifaID").val(1);
    $("#tarifaNetaPublica").val(0.00);
    $("#descuento").val(0.00);
    $("#menoresGratis").val(0);
    $("#tipoMenorGratis").val(1);
}
function cargarTablaPromociones() {
    destroyDataTable('tblPromociones', tabla);
    fillTable('tblPromociones', 'Sp_Promociones', '0|0|1', button);
    tabla = createDataTable('tblPromociones', tabla, true, true, true, true, true, true, '0');
}
function cargarCombosPromociones() {
    fillSelect('iTarifaID', 'Sp_CargaCombos', 10, 'ID');
    fillSelect('iServicioID', 'Sp_CargaCombos', 4, 'ID');
}
function cargarDatosPromociones(accion, ID) {
    iTarifaID = $("#iTarifaID").val();
    iServicioID = $("#iServicioID").val();
    comentarios = $("#comentarios").val();
    fechaInicioVenta = $("#fechaInicioVenta").val();
    fechaFinVenta = $("#fechaFinVenta").val();
    fechaInicioDisponible = $("#fechaInicioDisponible").val();
    fechaFinDisponible = $("#fechaFinDisponible").val();
    llevaTasa = $("#llevaTasa").val();
    tasa = $("#tasa").val();
    iTipoTarifaID = $("#iTipoTarifaID").val();
    tarifaNetaPublica = $("#tarifaNetaPublica").val();
    descuento = $("#descuento").val();
    menoresGratis = $("#menoresGratis").val();
    menores2x1 = $('#menores2x1:checked').length;
    tipoMenorGratis = $("#tipoMenorGratis").val();
    junior2x1 = $('#junior2x1:checked').length;
    activo = $('#activo:checked').length;
    parametros = ID + '|' + accion + '|' + iServicioID + '|' + iTarifaID + '|' + comentarios + '|' + fechaInicioVenta + '|' + fechaFinVenta + '|' + fechaInicioDisponible + '|' +
            fechaFinDisponible + '|' + llevaTasa + '|' + tasa + '|' + iTipoTarifaID + '|' + tarifaNetaPublica + '|' + descuento + '|' + menoresGratis + '|' + menores2x1 +
            '|' + tipoMenorGratis + '|' + junior2x1 + '|' + activo;
    console.log(parametros)
    return parametros;
}
function guardarPromociones() {
    parametros = cargarDatosPromociones(2, 0);
    data = ejecutaQuery('Sp_Promociones', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    respuestaAjax(respuesta, mensaje);
    cargarTablaPromociones();
}
function editarPromociones(ID) {
    if (!$('#altaPromociones').is(':visible'))
        $("[data-widget='collapse']").click();
    parametros = cargarDatosPromociones(3, ID);
    data = ejecutaQuery('Sp_Promociones', parametros, 'id_usuario');
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
function actualizarPromociones() {
    ID = $("#iPromocionID").val();
    parametros = cargarDatosPromociones(4, ID);
    console.log(parametros);
    data = ejecutaQuery('Sp_Promociones', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    respuestaAjax(respuesta, mensaje);
    cargarTablaPromociones();
    if ($('#altaPromociones').is(':visible'))
        $("[data-widget='collapse']").click();
}