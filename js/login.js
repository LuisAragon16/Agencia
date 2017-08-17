$(document).ready(function () {

    $(document).on('keypress', '#password', function (ev) {
        if ((ev.keyCode ? ev.keyCode : ev.which) == '13') {
            var usr = $('#usuario').val();
            var pass = $('#password').val();
            validaUsr(usr, pass);
        }
    });

    $("#btnEntrar").click(
            function () {
                var usr = $('#usuario').val();
                var pass = $('#password').val();
                validaUsr(usr, pass);
            }
    );

    function validaUsr(usuario, password) {
        ajxLoader();
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'opLogin.php',
            contentType: 'application/json; charset=utf-8',
            data: {"action": "validaUsr", "usuario": usuario, "password": password},
            success: function (data) {
                data.forEach(function (el) {
                    window.location = 'index.php';
                });

            },
            error: function (data) {
                bootbox.alert("Error : " + data.responseText.replace("[]", ""));
            },
            complete: function () {
                ajxLoader();
            }
        });
    }



});