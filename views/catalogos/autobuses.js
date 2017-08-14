var iAutobusID;
var unidad;
var empresa;
var iDestinoID;
var iSalidaID;
var iTipoAutobusID;
var fechaSalida;
var fechaRegreso;
var imagen;
var estatus;
var cargoImg;

var tabla;
var data;
var button = "btn btn-warning btnEditar|btnEditar|editarAutobus|E>iAutobusID|glyphicon glyphicon-pencil|Editar";
$(document).ready(function () {
    $('#btnActualizar').hide();
    $("#altaAgencia").validationEngine();
    $("#btnGuardar").click(function () {
        validarAutobus();
    });
    $("#btnCancelar").click(function () {
        limpiarCamposAutobus();
    });
    $("#btnActualizar").click(function () {
        actualizarAutobus();
    });
    $(function () {
        $("[data-widget='collapse']").click();
    })
    $('#fechaSalida').datepicker();
    $('#fechaRegreso').datepicker();
    cargarTablaAutobuses();
    cargarCombosAutobuses()
});
function cargarCombosAutobuses() {
    fillSelect('iDestinoID', 'Sp_CargaCombos', 5, 'ID');
    fillSelect('iSalidaID', 'Sp_CargaCombos', 6, 'ID');
}
function cargarTablaAutobuses() {
    destroyDataTable('tblAutobuses', tabla);
    fillTable('tblAutobuses', 'Sp_Autobuses', '0|0|1', button);
    tabla = createDataTable('tblAutobuses', tabla, true, true, true, true, true, true, '0');
}
function limpiarCamposAutobus() {
    $('#iAutobusID').val(0);
    $('#unidad').val('');
    $('#empresa').val('');
    $('#iDestinoID').val(0);
    $('#iSalidaID').val(0);
    $('#iTipoAutobusID').val('');
    $('#fechaSalida').val('');
    $('#fechaRegreso').val('');
    $("#cargoImg").val(0);
}
function cargarDatosAutobus() {
    iAutobusID = $('#iAutobusID').val();
    unidad = $('#unidad').val();
    empresa = $('#empresa').val();
    iDestinoID = $('#iDestinoID').val();
    iSalidaID = $('#iSalidaID').val();
    iTipoAutobusID = $('#iTipoAutobusID').val();
    fechaSalida = $('#fechaSalida').val();
    fechaRegreso = $('#fechaRegreso').val();
    estatus = $('input:checked').length;
    imagen = $("#vista_previa").attr('src');
    cargoImg = $("#cargoImg").val();
}
function respuestaAutobus(respuesta, mensajeR) {
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
function validarAutobus() {
    if (!$("#altaAutobus").validationEngine('validate')) {
        bootbox.alert({
            message: 'Por favor revisa los campos faltantes'
        });
        $("#altaAutobus").validationEngine();
        return;
    } else {

        var dialog = confirm("small", "Desea agregar este autobus?", guardarAutobus);
    }
}
function guardarAutobus() {
    cargarDatosAutobus();
    parametros = '0|2|' + unidad + '|' + empresa + '|' + iDestinoID + '|' + iSalidaID + '|' + iTipoAutobusID + '|' + fechaSalida + '|' + fechaRegreso;
    console.log(parametros);
    data = ejecutaQuery('Sp_Autobuses', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
        iAutobusID = el.iAutobusIDN;
    });
    if (iAutobusID != 0 && imagen != 'img/autobuses/default.jpg') {
        $.ajax({
            url: "views/catalogos/autobusesOP.php",
            type: "POST",
            data: {
                imagen: imagen
                , accion: 1
                , iAutobusID: iAutobusID
            },
            success: (function (html) {
                console.log(html);
                console.log(respuesta);
                respuestaAutobus(html, mensaje + '. ' + html);
            })
        });
    } else {
        respuestaAutobus(respuesta, mensaje);
    }
    limpiarCamposAutobus();
    cargarTablaAutobuses();
    if ($('#altaAutobus').is(':visible'))
        $("[data-widget='collapse']").click();
}
function editarAutobus(iAutobusID) {
    $('#iAutobusID').val(iAutobusID);
    document.getElementById('vista_previa').src = 'img/autobuses/' + iAutobusID + '.jpg';
    if (!$('#altaAutobus').is(':visible'))
        $("[data-widget='collapse']").click();
    setTimeout(5000);
    ajxLoader();
    parametros = '0|' + iAutobusID + '|3';
    data = ejecutaQuery('Sp_Autobuses', parametros, null);
    data.forEach(function (el) {
        $('#iAutobusID').val(el.iAutobusID);
        $('#unidad').val(el.unidad);
        $('#empresa').val(el.empresa);
        $('#iDestinoID').val(el.iDestinoID);
        $('#iSalidaID').val(el.iSalidaID);
        console.log(el.especial);
        if (el.especial == 'PE') {
            $('#iTipoAutobusID').val('47E');
        } else {
            $('#iTipoAutobusID').val(el.lugares);
        }
        $('#fechaSalida').val(el.fechaSalidaC);
        $('#fechaRegreso').val(el.fechaRegresoC);
        if (el.activo == 0) {
            $('#chkEstatus').prop('checked', false).change();
        } else {
            $('#chkEstatus').prop('checked', true).change();
        }
        $('#btnGuardar').hide();
        $('#btnActualizar').show();
    });
}
function actualizarAutobus() {
    cargarDatosAutobus();
    parametros = iAutobusID + '|4|' + unidad + '|' + empresa + '|' + iDestinoID + '|' + iSalidaID + '|' + iTipoAutobusID + '|' + fechaSalida + '|' + fechaRegreso + '|' + estatus;
    console.log(parametros);
    data = ejecutaQuery('Sp_Autobuses', parametros, 'id_usuario');
    data.forEach(function (el) {
        mensaje = el.Mensaje;
        respuesta = el.Respuesta;
        iAutobusID = el.iAutobusIDN;
    });
    if (cargoImg == "1") {
        $.ajax({
            url: "views/catalogos/autobusesOP.php",
            type: "POST",
            data: {
                imagen: imagen
                , accion: 1
                , iAutobusID: iAutobusID
            },
            success: (function (html) {
                respuestaAutobus(html, mensaje + '.' + html);
            })
        });
    } else {
        respuestaAutobus(1, mensaje);
    }
    limpiarCamposAutobus();
    cargarTablaAutobuses();
    if ($('#altaAutobus').is(':visible')) {
        $("[data-widget='collapse']").click();
    }
}