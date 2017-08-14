var respuesta;
var proveedor
var razon;
var rfc;
var destino;
var tipoServicio;
var domicilio;
var ciudad;
var cp;
var telVentas;
var telPagos;
var telDirecto;
var telReservaciones;
var tel800;
var correoPagos;
var correoFacturacion;
var correoReservaciones
var correoGerencia;
var url;
var ocupacion;
var informacion;
var descripcion;
var banco;
var cuentaDepo
var sucursal;
var refBancaria;
var clabe;
var banco1;
var cuentaDepo1;
var sucursal1;
var refBancaria1;
var clabe1
var coordenadas;
var tabla;
var parametros;
var data;
var estatus;
var iServicioID;
var button = "btn btn-warning btnEditar|btnEditar|editarServicio|E>iServicioID|glyphicon glyphicon-pencil|Editar";
$(document).ready(function () {
    $('#btnActualizar').hide();
    cargarCombosServicio();
    mostrarMapa();
    $("#altaServicio").validationEngine();
    $("#btnGuardar").click(function () {
        validarServicio();
    });
    $("#btnCancelar").click(function () {
        limpiarCamposServicio();
    });
    $("#btnActualizar").click(function () {
        actualizarServicio();
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    cargarTablaServicios();
});
function cargarTablaServicios() {
    destroyDataTable('tblServicios', tabla);
    fillTable('tblServicios', 'Sp_Servicios', '0|0|1', button);
    tabla = createDataTable('tblServicios', tabla, true, true, true, true, true, true, '0');
}
function cargarCombosServicio() {
    fillSelect('tipoServicio', 'Sp_CargaCombos', 1, 'ID');
}
function limpiarCamposServicio() {
    cargarCombosServicio();
    $('#proveedor').val('');
    $('#razon').val('');
    $('#rfc').val('');
    $('#destino').val(0);
    $('#tipoServicio').val(0);
    $('#domicilio').val('');
    $('#ciudad').val('');
    $('#cp').val('');
    $('#telVentas').val('');
    $('#telPagos').val('');
    $('#telDirecto').val('');
    $('#telReservaciones').val('');
    $('#tel800').val('');
    $('#correoPagos').val('');
    $('#correoFacturacion').val('');
    $('#correoReservaciones').val('');
    $('#correoGerencia').val('');
    $('#url').val('');
    $('#ocupacion').val('');
    $('#informacion').val('');
    $('#descripcion').val('');
    $('#banco').val('');
    $('#cuentaDepo').val('');
    $('#sucursal').val('');
    $('#refBancaria').val('');
    $('#clabe').val('');
    $('#banco1').val('');
    $('#cuentaDepo1').val('');
    $('#sucursal1').val('');
    $('#refBancaria1').val('');
    $('#clabe1').val('');
    $('#coordenadas').val('28.6140806, -106.0910354');
}
function cargarDatosServicio() {
    proveedor = $('#proveedor').val();
    razon = $('#razon').val();
    rfc = $('#rfc').val();
    destino = $('#destino').val();
    tipoServicio = $('#tipoServicio').val();
    domicilio = $('#domicilio').val();
    ciudad = $('#ciudad').val();
    cp = $('#cp').val();
    telVentas = $('#telVentas').val();
    telPagos = $('#telPagos').val();
    telDirecto = $('#telDirecto').val();
    telReservaciones = $('#telReservaciones').val();
    tel800 = $('#tel800').val();
    correoPagos = $('#correoPagos').val();
    correoFacturacion = $('#correoFacturacion').val();
    correoReservaciones = $('#correoReservaciones').val();
    correoGerencia = $('#correoGerencia').val();
    url = $('#url').val();
    ocupacion = $('#ocupacion').val();
    informacion = $('#informacion').val();
    descripcion = $('#descripcion').val();
    banco = $('#banco').val();
    cuentaDepo = $('#cuentaDepo').val();
    sucursal = $('#sucursal').val();
    refBancaria = $('#refBancaria').val();
    clabe = $('#clabe').val();
    banco1 = $('#banco1').val();
    cuentaDepo1 = $('#cuentaDepo1').val();
    sucursal1 = $('#sucursal1').val();
    refBancaria1 = $('#refBancaria1').val();
    clabe1 = $('#clabe1').val();
    coordenadas = $('#coordenadas').val();
    estatus = $('input:checked').length;
    iServicioID = $('#iServicioID').val();
}
function respuestaServicio(respuesta) {
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
function validarServicio() {
    if (!$("#altaServicio").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaServicio").validationEngine();
        return;
    } else {

        var dialog = confirm("small", "Desea agregar el servicio?", guardarServicio);
    }
}
function guardarServicio() {
    cargarDatosServicio();
    parametros = '0|2|' + proveedor + '|' + razon + '|' + rfc + '|' + destino + '|' + tipoServicio + '|' + domicilio + '|' + ciudad + '|' + cp + '|' +
            telVentas + '|' + telPagos + '|' + telDirecto + '|' + telReservaciones + '|' + tel800 + '|' + correoPagos + '|' + correoFacturacion + '|' + correoReservaciones + '|' + correoGerencia + '|' +
            url + '|' + ocupacion + '|' + informacion + '|' + descripcion + '|' + banco + '|' + cuentaDepo + '|' + sucursal + '|' + refBancaria + '|' + clabe + '|' +
            banco1 + '|' + cuentaDepo1 + '|' + sucursal1 + '|' + refBancaria1 + '|' + clabe1 + '|' + coordenadas;
    data = ejecutaQuery('Sp_Servicios', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    limpiarCamposServicio();
    respuestaServicio(respuesta);
    cargarTablaServicios();
}
function editarServicio(iServicioID) {

    $('#btnGuardar').hide();
    $('#btnActualizar').show();
    if (!$('#altaServicios').is(':visible'))
        $("[data-widget='collapse']").click();
    setTimeout(5000);
    ajxLoader();
    parametros = '0|' + iServicioID + '|3';
    data = ejecutaQuery('Sp_Servicios', parametros, null);
    data.forEach(function (el) {
        $('#iServicioID').val(el.iServicioID);
        $('#proveedor').val(el.proveedor);
        $('#razon').val(el.razonSocial);
        $('#rfc').val(el.rfc);
        $('#destino').val(el.iDetinoID);
        $('#tipoServicio').val(el.iTipoServicioID);
        $('#domicilio').val(el.domicilio);
        $('#ciudad').val(el.ciudad);
        $('#cp').val(el.cp);
        $('#telVentas').val(el.telVentas);
        $('#telPagos').val(el.telPagos);
        $('#telDirecto').val(el.telDirecto);
        $('#telReservaciones').val(el.telReservaciones);
        $('#tel800').val(el.tel800);
        $('#correoPagos').val(el.correoPagos);
        $('#correoFacturacion').val(el.correoFac);
        $('#correoReservaciones').val(el.correoReser);
        $('#correoGerencia').val(el.correoGerencia);
        $('#url').val(el.url);
        $('#ocupacion').val(el.ocupacion);
        $('#informacion').val(el.informacion);
        $('#descripcion').val(el.descripcion);
        $('#banco').val(el.banco);
        $('#cuentaDepo').val(el.cuentaDepo);
        $('#sucursal').val(el.sucursal);
        $('#refBancaria').val(el.refBancaria);
        $('#clabe').val(el.clabe);
        $('#banco1').val(el.bancoOp);
        $('#cuentaDepo1').val(el.cuentaDepoOp);
        $('#sucursal1').val(el.sucursalOp);
        $('#refBancaria1').val(el.refBancariaOp);
        $('#clabe1').val(el.clabeOp);
        $('#coordenadas').val(el.coordenadas);
        mostrarMapaBase(el.coordenadas);
        if (el.activo == 0) {
            $('#chkEstatus').prop('checked', false).change();
        } else {
            $('#chkEstatus').prop('checked', true).change();
        }
    });

}
function actualizarServicio() {
    cargarDatosServicio();
    parametros = iServicioID + '|4|' + proveedor + '|' + razon + '|' + rfc + '|' + destino + '|' + tipoServicio + '|' + domicilio + '|' + ciudad + '|' + cp + '|' +
            telVentas + '|' + telPagos + '|' + telDirecto + '|' + telReservaciones + '|' + tel800 + '|' + correoPagos + '|' + correoFacturacion + '|' + correoReservaciones + '|' + correoGerencia + '|' +
            url + '|' + ocupacion + '|' + informacion + '|' + descripcion + '|' + banco + '|' + cuentaDepo + '|' + sucursal + '|' + refBancaria + '|' + clabe + '|' +
            banco1 + '|' + cuentaDepo1 + '|' + sucursal1 + '|' + refBancaria1 + '|' + clabe1 + '|' + coordenadas + '|' + estatus;
    console.log(parametros)
    data = ejecutaQuery('Sp_Servicios', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
    });
    $('#btnGuardar').show();
    $('#btnActualizar').hide();
    limpiarCamposServicio();
    respuestaServicio(respuesta);
    cargarTablaServicios();
    if (!$('#altaServicios').is(':visible'))
        $("[data-widget='collapse']").click();
}