var agencia;
var razonSocial;
var rfc;
var calle;
var numInterior;
var numExterior;
var colonia;
var localidad;
var cp;
var estado;
var pais;
var referencia;
var descripcion;
var banco;
var sucursal;
var cuentaBancaria;
var clabe;
var domicilio;
var ciudad;
var cpD;
var tel1;
var tel2;
var tel3;
var correoRes;
var correoElec;
var estatus;
var tabla;
var data;
var iAgenciaID;
var iAgenciaIDN;
var imagen;
var cargoImg;
var button = "btn btn-warning btnEditar|btnEditar|editarAgencia|E>iAgenciaID|glyphicon glyphicon-pencil|Editar";
$(document).ready(function () {
    $('#btnActualizar').hide();
    $("#altaAgencia").validationEngine();
    $("#btnGuardar").click(function () {
        validarAgencia();
    });
    $("#btnCancelar").click(function () {
        limpiarCamposAgencia();
    });
    $("#btnActualizar").click(function () {
        actualizarAgencia();
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    cargarTablaAgencias();
});
function cargarTablaAgencias() {
    destroyDataTable('tblAgencias', tabla);
    fillTable('tblAgencias', 'Sp_Agencias', '0|0|1', button);
    tabla = createDataTable('tblAgencias', tabla, true, true, true, true, true, true, '0');
}
function limpiarCamposAgencia() {
    $('#iAgenciaID').val(0);
    $('#agencia').val('');
    $('#razon').val('');
    $('#rfc').val('');
    $('#calle').val('');
    $('#noInt').val('');
    $('#noExt').val('');
    $('#colonia').val('');
    $('#localidad').val('');
    $('#cp').val('');
    $('#estado').val('');
    $('#pais').val('');
    $('#referencia').val('');
    $('#descripcion').val('');
    $('#banco').val('');
    $('#sucursal').val('');
    $('#cuentaBan').val('');
    $('#clabe').val('');
    $('#domicilio').val('');
    $('#ciudad').val('');
    $('#cpD').val('');
    $('#tel1').val('');
    $('#tel2').val('');
    $('#tel3').val('');
    $('#correoRespaldos').val('');
    $('#correoElectronico').val('');
}
function cargarDatosAgencia() {
    iAgenciaID = $('#iAgenciaID').val();
    agencia = $('#agencia').val();
    razonSocial = $('#razon').val();
    rfc = $('#rfc').val();
    calle = $('#calle').val();
    numInterior = $('#noInt').val();
    numExterior = $('#noExt').val();
    colonia = $('#colonia').val();
    localidad = $('#localidad').val();
    cp = $('#cp').val();
    estado = $('#estado').val();
    pais = $('#pais').val();
    referencia = $('#referencia').val();
    descripcion = $('#descripcion').val();
    banco = $('#banco').val();
    sucursal = $('#sucursal').val();
    cuentaBancaria = $('#cuentaBan').val();
    clabe = $('#clabe').val();
    domicilio = $('#domicilio').val();
    ciudad = $('#ciudad').val();
    cpD = $('#cpD').val();
    tel1 = $('#tel1').val();
    tel2 = $('#tel2').val();
    tel3 = $('#tel3').val();
    correoRes = $('#correoRespaldos').val();
    correoElec = $('#correoElectronico').val();
    estatus = $('input:checked').length;
    imagen = $("#vista_previa").attr('src');
    cargoImg = $("#cargoImg").val();

}
function respuestaAgencia(respuesta, mensajeR) {
    if (respuesta == 1) {
        bootbox.alert({
            message: mensajeR
        });
    } else {
        bootbox.alert({
            message: mensajeR,
            size: 'small',
            callback: function () {
            }
        });
    }
}
function validarAgencia() {
    if (!$("#altaAgencia").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaAgencia").validationEngine();
        return;
    } else {

        var dialog = confirm("small", "Desea agregar esta agencia?", guardarAgencia);
    }
}
function guardarAgencia() {
    cargarDatosAgencia();
    parametros = '0|2|' + agencia + '|' + razonSocial + '|' + rfc + '|' + calle + '|' + numInterior + '|' + numExterior + '|' + colonia + '|' + localidad + '|' +
            cp + '|' + estado + '|' + pais + '|' + referencia + '|' + descripcion + '|' + banco + '|' + sucursal + '|' + cuentaBancaria + '|' + clabe + '|' +
            domicilio + '|' + ciudad + '|' + cpD + '|' + tel1 + '|' + tel2 + '|' + tel3 + '|' + correoRes + '|' + correoElec;
    data = ejecutaQuery('Sp_Agencias', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
        iAgenciaIDN = el.iAgenciaIDN;
    });
    if (iAgenciaIDN != 0 && imagen != 'img/agencias/default.jpg') {
        $.ajax({
            url: "views/catalogos/agenciasOP.php",
            type: "POST",
            data: {
                imagen: imagen
                , accion: 1
                , iAgenciaIDN: iAgenciaIDN
            },
            success: (function (html) {
                respuestaAgencia(html, mensaje + '. ' + html);
            })
        });
    } else {
        respuestaAgencia(respuesta, mensaje);
    }
    limpiarCamposAgencia();
    cargarTablaAgencias();
    if ($('#altaAgencias').is(':visible'))
        $("[data-widget='collapse']").click();
}
function editarAgencia(iAgenciaID) {
    document.getElementById('vista_previa').src = 'img/agencias/' + iAgenciaID + '.jpg';
    if (!$('#altaAgencias').is(':visible'))
        $("[data-widget='collapse']").click();
    setTimeout(5000);
    ajxLoader();
    parametros = '0|' + iAgenciaID + '|3';
    data = ejecutaQuery('Sp_Agencias', parametros, null);
    data.forEach(function (el) {
        $('#iAgenciaID').val(el.iAgenciaID);
        $('#agencia').val(el.agencia);
        $('#razon').val(el.razonSocial);
        $('#rfc').val(el.rfc);
        $('#calle').val(el.calle);
        $('#noInt').val(el.numInterior);
        $('#noExt').val(el.numExterior);
        $('#colonia').val(el.colonia);
        $('#localidad').val(el.localidad);
        $('#cp').val(el.cp);
        $('#estado').val(el.estado);
        $('#pais').val(el.pais);
        $('#referencia').val(el.referencia);
        $('#descripcion').val(el.descripcion);
        $('#banco').val(el.banco);
        $('#sucursal').val(el.sucursal);
        $('#cuentaBan').val(el.cuentaBancaria);
        $('#clabe').val(el.clabe);
        $('#domicilio').val(el.domicilio);
        $('#ciudad').val(el.ciudad);
        $('#cpD').val(el.cpD);
        $('#tel1').val(el.tel1);
        $('#tel2').val(el.tel2);
        $('#tel3').val(el.tel3);
        $('#correoRespaldos').val(el.correoResp);
        $('#correoElectronico').val(el.correoElec);
        if (el.activo == 0) {
            $('#chkEstatus').prop('checked', false).change();
        } else {
            $('#chkEstatus').prop('checked', true).change();
        }
        $('#btnGuardar').hide();
        $('#btnActualizar').show();
    });
}
function actualizarAgencia() {
    cargarDatosAgencia();
    if (iAgenciaID != 0) {
        parametros = iAgenciaID + '|4|' + agencia + '|' + razonSocial + '|' + rfc + '|' + calle + '|' + numInterior + '|' + numExterior + '|' + colonia + '|' + localidad + '|' +
                cp + '|' + estado + '|' + pais + '|' + referencia + '|' + descripcion + '|' + banco + '|' + sucursal + '|' + cuentaBancaria + '|' + clabe + '|' +
                domicilio + '|' + ciudad + '|' + cpD + '|' + tel1 + '|' + tel2 + '|' + tel3 + '|' + correoRes + '|' + correoElec + '|' + estatus;
        data = ejecutaQuery('Sp_Agencias', parametros, 'id_usuario');
        data.forEach(function (el) {
            mensaje = el.Mensaje;
            respuesta = el.Respuesta;
            iAgenciaID = el.iAgenciaID;
        });
        if (cargoImg == "1") {
            $.ajax({
                url: "views/catalogos/agenciasOP.php",
                type: "POST",
                data: {
                    imagen: imagen
                    , accion: 1
                    , iAgenciaIDN: iAgenciaID
                },
                success: (function (html) {
                    respuestaAgencia(html, mensaje + '.' + html);
                })
            });
        } else {
            respuestaAgencia(1, mensaje);
        }
        limpiarCamposAgencia();
        cargarTablaAgencias();
        if ($('#altaAgencias').is(':visible'))
            $("[data-widget='collapse']").click();
    }
}