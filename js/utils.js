function getNombreMes(num, modo) {
    modo = modo || 1;
    //Variable sacada de bootstrap date picker
    fechas = $.fn.datepicker.dates['es'];
    return modo == 1 ? fechas['months'][num - 1] : fechas['monthsShort'][num - 1];
}

function getQS() {
    return location.search.substring(1)
}
function getQSParam(sParam) {
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) {
            return sParameterName[1] || false;
        }
    }
}

function ajxLoader(msj) {
    if (!($('#ajxLoader').length > 0)) {
        $('body').append('<div id="ajxLoader"><div><span></span></div></div>');
    }

    if ($('#ajxLoader').css('display') == 'none' || msj != null) {
        $('#ajxLoader div span').html(msj);
        $('#ajxLoader').fadeIn();
    } else {
        $('#ajxLoader span').empty();
        $('#ajxLoader').fadeOut();
    }
}

function serializeJSON(form) {
    var unindexed_array = $(form).serializeArray();
    var indexed_array = {};
    $.map(unindexed_array, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });
    return indexed_array;
}

function createDataTable(tableID, tableVar, paging, lengthChange, searching, ordering, info, autoWidth, hideColumns, pageLength = 10) {
    if ($.fn.DataTable.isDataTable('#' + tableID)) {
        destroyDataTable(tableID, tableVar);
    }
    var lengthMenu = "Mostrando <select>";
    for (x = 1; x <= 5; x++) {
        lengthMenu = lengthMenu + '<option value="' + (pageLength * x) + '">' + (pageLength * x) + '</option>';
    }
    lengthMenu = lengthMenu + '<option value="-1">Todos</option></select> registros';
    tableVar = $('#' + tableID).DataTable({
        "pageLength": pageLength,
        language: {
            search: "Buscar:",
            info: "Mostrando _PAGE_ de _PAGES_",
            "lengthMenu": lengthMenu,
            infoFiltered: "(filtrado de  un total de _MAX_ registro(s))",
            infoEmpty: "No se encontro informaci&oacute;n",
            emptyTable: "No se encontro informaci&oacute;n",
            zeroRecords: "No se encontro informaci&oacute;n",
            paginate: {
                previous: "Anterior",
                next: "Siguiente"
            }
        },
        "paging": paging,
        "lengthChange": lengthChange,
        "searching": searching,
        "ordering": ordering,
        "info": info,
        "autoWidth": autoWidth
    });
    var arrayColumnas = hideColumns.split('|');
    for (var x = 0; x < arrayColumnas.length; x++) {
        if (arrayColumnas[x] != '') {
            tableVar.column(arrayColumnas[x]).visible(false);
            //console.log(1);
        }
    }
    return tableVar;
}

function destroyDataTable(tableID, tableVar) {
    $("#" + tableID + " > tbody").empty();
    if ($.fn.DataTable.isDataTable('#' + tableID)) {
        tableVar.destroy();
    }
}

function ejecutaQuery(sp, param, varSession = "") {
    var array = "";
    ajxLoader();
    $.ajax({
        async: false,
        url: 'includes/opUtils.php',
        type: 'POST',
        data: {"action": "ejecutaQ", "sp": sp, "param": param, "varSession": varSession},
        dataType: 'json',
        success: function (data) {
            //bootbox.alert(data['ordenid']);
            array = data;
        },
        error: function (data) {
            bootbox.alert('Error: ' + data.responseText);
        },
        complete: function () {
            ajxLoader();
        }
    });
    return array;
}

function pruebaQuery() {
    var jsonVal = [];
    jsonVal = ejecutaQuery('TEST', '');
    console.log(jsonVal);
    /*$.each(jsonVal, function (index, value) {
     console.log(value.descripcion);
     });*/
    //bootbox.alert(jsonVal[0][1]);
    //return jsonVal;
}

function fillTable(tableId, sp, param, actions) {
    var tr = '';
    $('#' + tableId + ' > tbody').empty();
    try {
        var jsonVal = [];
        jsonVal = ejecutaQuery(sp, param);
        var i = 0;
        var totalColumns = 0;
        var lastCol = "";
        var agregaBoton = "";
        jsonVal.forEach(function (el) {
            totalColumns = Object.keys(el).length;
            for (var name in el) {
                if (i == 0) {
                    tr += "<tr>";
                }
                if (i == totalColumns - 1) {
                    if (actions != "") {
                        //  para cada boton separar por @
                        //  class|idButton|onclickFun|onclickVal|icono|titulo
                        //  valores dentro function:
                        //      F = Fijo
                        //      E = el.algo (elemento del query)
                        //      EA = el.algo (elemento del query concatenado por |)
                        //      I = ID de algun objeto (textbox)
                        //      SF = string fijo
                        //      SE = string el.algo
                        //      SI = string ID de algun objeto (textbox)
                        //      PE = F>1#E>txtSomeTextbox#SE>nombre_completo
                        var dentroFunct = "";
                        var variablesConcatenadas = "";
                        if (actions.includes("@")) { // valida si hay mas de un boton
                            var buttons = actions.split('@');
                            //console.log('buttons : ' + buttons.length);
                            for (var k = 0; k < buttons.length; k++) {
                                var arrayAct = buttons[k].split('|');
                                if (arrayAct[3] != "") {
                                    var arrayFunct = arrayAct[3].split('#')
                                    for (var j = 0; j < arrayFunct.length; j++) {
                                        var newElem = arrayFunct[j].split('>');
                                        switch (newElem[0]) {
                                            case "F":
                                                dentroFunct += newElem[1] + ",";
                                                break;
                                            case "E" :
                                                dentroFunct += el[newElem[1]] + ",";
                                                break;
                                            case "EA" :
                                                variablesConcatenadas += el[newElem[1]] + "|";
                                                break;
                                            case "I" :
                                                dentroFunct += $('#' + newElem[1]) + ",";
                                                break;
                                            case "SF" :
                                                dentroFunct += "'" + newElem[1] + "',";
                                                break;
                                            case "SE" :
                                                dentroFunct += "'" + el[newElem[1]] + "',";
                                                break;
                                            case "SI" :
                                                dentroFunct += "'" + $('#' + newElem[1]) + "',";
                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                    if (variablesConcatenadas != "") {
                                        dentroFunct = dentroFunct.replace(/,\s*$/, "");
                                    } else {
                                        variablesConcatenadas = variablesConcatenadas.slice(0, -1);
                                    }
                                    agregaBoton += "<a href='#' class='" + arrayAct[0] + "' id='" + arrayAct[1] + "' onclick=\"" + arrayAct[2] + "(" + dentroFunct + variablesConcatenadas + ")\" data-toggle='tooltip' title='" + arrayAct[5] + "'><i class='" + arrayAct[4] + "'></i></a>&nbsp;";
                                    dentroFunct = "";
                                }
                            }

                        } else {
                            var arrayAct = actions.split('|');
                            if (arrayAct[3] != "") {
                                var arrayFunct = arrayAct[3].split('#');
                                //console.log('arrayFunct : ' + arrayFunct.length);
                                for (var j = 0; j < arrayFunct.length; j++) {
                                    //console.log('elem : ' + elem);
                                    var newElem = arrayFunct[j].split('>');
                                    //console.log('newElem : ' + newElem);
                                    switch (newElem[0]) {
                                        case "F":
                                            dentroFunct += newElem[1] + ",";
                                            break;
                                        case "E" :
                                            dentroFunct += el[newElem[1]] + ",";
                                            break;
                                        case "EA" :
                                            variablesConcatenadas += el[newElem[1]] + "|";
                                            break;
                                        case "I" :
                                            dentroFunct += $('#' + newElem[1]) + ",";
                                            break;
                                        case "SF" :
                                            dentroFunct += "'" + newElem[1] + "',";
                                            break;
                                        case "SE" :
                                            dentroFunct += "'" + el[newElem[1]] + "',";
                                            break;
                                        case "SI" :
                                            dentroFunct += "'" + $('#' + newElem[1]) + "',";
                                            break;
                                        default:
                                            break;
                                    }
                                }
                            }
                            if (variablesConcatenadas != "") {
                                dentroFunct = dentroFunct.replace(/,\s*$/, "");
                            } else {
                                variablesConcatenadas = variablesConcatenadas.slice(0, -1);
                            }
                            dentroFunct = dentroFunct.replace(/,\s*$/, "");
                            agregaBoton += "<a href='#' class='" + arrayAct[0] + "' id='" + arrayAct[1] + "' onclick=\"" + arrayAct[2] + "(" + dentroFunct + variablesConcatenadas + ")\" data-toggle='tooltip' title='" + arrayAct[5] + "'><i class='" + arrayAct[4] + "'></i></a>";
                        }



                        lastCol += "<td>";
                        //console.log("class : '" + arrayAct[1] + "'");

                        lastCol += agregaBoton;
                        lastCol += "</td>";
                    }//fin actions

                }
                if (i == totalColumns) {
                    tr += lastCol;
                    tr += "</tr>";
                    tr += "<tr>";
                    i = 0;
                    lastCol = "";
                    agregaBoton = "";
                }
                tr += '<td>' + el[name] + '</td>';
                i += 1;
            }
            tr += lastCol;
            tr += "</tr>";
            i = 0;
            lastCol = "";
            agregaBoton = "";
        });
    } catch (err) {

    }

    $('#' + tableId).append(tr);
}
function fillTableBootBox(tableId, sp, param, actions, thead, bbSize, bbtitulo, button) {
    var tr = '';
    $('#' + tableId + ' > tbody').empty();
    try {
        var jsonVal = [];
        jsonVal = ejecutaQuery(sp, param);
        var i = 0;
        var totalColumns = 0;
        var lastCol = "";
        var agregaBoton = "";
        jsonVal.forEach(function (el) {
            totalColumns = Object.keys(el).length;
            for (var name in el) {
                if (i == 0) {
                    tr += "<tr>";
                }
                if (i == totalColumns - 1) {
                    if (actions != "") {
                        //  para cada boton separar por @
                        //  class|idButton|onclickFun|onclickVal|icono|titulo
                        //  valores dentro function:
                        //      F = Fijo
                        //      E = el.algo (elemento del query)
                        //      EA = el.algo (elemento del query concatenado por |)
                        //      I = ID de algun objeto (textbox)
                        //      SF = string fijo
                        //      SE = string el.algo
                        //      SI = string ID de algun objeto (textbox)
                        //      PE = F>1#E>txtSomeTextbox#SE>nombre_completo
                        var dentroFunct = "";
                        var variablesConcatenadas = "";
                        if (actions.includes("@")) { // valida si hay mas de un boton
                            var buttons = actions.split('@');
                            //console.log('buttons : ' + buttons.length);
                            for (var k = 0; k < buttons.length; k++) {
                                var arrayAct = buttons[k].split('|');
                                if (arrayAct[3] != "") {
                                    var arrayFunct = arrayAct[3].split('#')
                                    for (var j = 0; j < arrayFunct.length; j++) {
                                        var newElem = arrayFunct[j].split('>');
                                        switch (newElem[0]) {
                                            case "F":
                                                dentroFunct += newElem[1] + ",";
                                                break;
                                            case "E" :
                                                dentroFunct += el[newElem[1]] + ",";
                                                break;
                                            case "EA" :
                                                variablesConcatenadas += el[newElem[1]] + "|";
                                                break;
                                            case "I" :
                                                dentroFunct += $('#' + newElem[1]) + ",";
                                                break;
                                            case "SF" :
                                                dentroFunct += "'" + newElem[1] + "',";
                                                break;
                                            case "SE" :
                                                dentroFunct += "'" + el[newElem[1]] + "',";
                                                break;
                                            case "SI" :
                                                dentroFunct += "'" + $('#' + newElem[1]) + "',";
                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                    dentroFunct = dentroFunct.replace(/,\s*$/, "");
                                    if (variablesConcatenadas != "") {
                                        variablesConcatenadas = variablesConcatenadas.slice(0, -1);
                                        variablesConcatenadas = ",'" + variablesConcatenadas + "'";
                                        if (dentroFunct == "") {
                                            variablesConcatenadas = variablesConcatenadas.substring(1);
                                        }
                                    }
                                    agregaBoton += "<a href='#' class='" + arrayAct[0] + "' id='" + arrayAct[1] + "' onclick=\"" + arrayAct[2] + "(" + dentroFunct + variablesConcatenadas + ")\" data-toggle='tooltip' title='" + arrayAct[5] + "'><i class='" + arrayAct[4] + "'></i></a>&nbsp;";
                                    dentroFunct = '';
                                }
                            }

                        } else {
                            var arrayAct = actions.split('|');
                            if (arrayAct[3] != "") {
                                var arrayFunct = arrayAct[3].split('#');
                                //console.log('arrayFunct : ' + arrayFunct.length);
                                for (var j = 0; j < arrayFunct.length; j++) {
                                    //console.log('elem : ' + elem);
                                    var newElem = arrayFunct[j].split('>');
                                    //console.log('newElem : ' + newElem);
                                    switch (newElem[0]) {
                                        case "F":
                                            dentroFunct += newElem[1] + ",";
                                            break;
                                        case "E" :
                                            dentroFunct += el[newElem[1]] + ",";
                                            break;
                                        case "EA" :
                                            variablesConcatenadas += el[newElem[1]] + "|";
                                            break;
                                        case "I" :
                                            dentroFunct += $('#' + newElem[1]) + ",";
                                            break;
                                        case "SF" :
                                            dentroFunct += "'" + newElem[1] + "',";
                                            break;
                                        case "SE" :
                                            dentroFunct += "'" + el[newElem[1]] + "',";
                                            break;
                                        case "SI" :
                                            dentroFunct += "'" + $('#' + newElem[1]) + "',";
                                            break;
                                        default:
                                            break;
                                    }
                                }
                            }
                            dentroFunct = dentroFunct.replace(/,\s*$/, "");
                            if (variablesConcatenadas != "") {
                                variablesConcatenadas = variablesConcatenadas.slice(0, -1);
                                variablesConcatenadas = ",'" + variablesConcatenadas + "'";
                                if (dentroFunct == "") {
                                    variablesConcatenadas = variablesConcatenadas.substring(1);
                                }
                            }


                            agregaBoton += "<a href='#' class='" + arrayAct[0] + "' id='" + arrayAct[1] + "' onclick=\"" + arrayAct[2] + "(" + dentroFunct + variablesConcatenadas + ")\" data-toggle='tooltip' title='" + arrayAct[5] + "'><i class='" + arrayAct[4] + "'></i></a>";
                        }



                        lastCol += "<td>";
                        //console.log("class : '" + arrayAct[1] + "'");

                        lastCol += agregaBoton;
                        lastCol += "</td>";
                    }//fin actions

                }
                if (i == totalColumns) {
                    tr += lastCol;
                    tr += "</tr>";
                    tr += "<tr>";
                    i = 0;
                    lastCol = "";
                    agregaBoton = "";
                }
                tr += '<td>' + el[name] + '</td>';
                i += 1;
            }
            tr += lastCol;
            tr += "</tr>";
            i = 0;
            lastCol = "";
            agregaBoton = "";
        });
    } catch (err) {

    }

    var html = '';
    html += '<table id="' + tableId + '" class="table table-bordered table-striped">';
    html += '<thead>';
    html += '<tr style="background-color: lightgray;">';
    var arrayTHEAD = thead.split('|');
    for (var x = 0; x < arrayTHEAD.length; x++) {
        html += '<th>' + arrayTHEAD[x] + '</th>';
    }
    html += '</tr>';
    html += '</thead>';
    html += '<tbody>';
    html += tr;
    html += '</tbody>';
    html += '</table>';
    box = bootbox.dialog(
            {
                size: bbSize,
                title: bbtitulo,
                message: '<div class="row">  ' +
                        '<div class="col-md-12"> ' +
                        html +
                        '</div>' +
                        '</div>'
            }
    );
}

function confirm(sizeBox, messageBox, funct, val) {
    bootbox.confirm({
        async: false,
        size: sizeBox,
        message: messageBox,
        callback: function (result) {
            if (result == true) {
                if (val != "") {
                    funct(val);
                } else {
                    funct();
                }
            } else {

            }
        }
    });
}


function fillSelect(idSelect, sp, param, value) {
    try {
        $('#' + idSelect).empty();
        var jsonVal = [];
        jsonVal = ejecutaQuery(sp, param);
        var options = '';
        jsonVal.forEach(function (el) {
            for (var name in el) {
                if (el[value] != el[name]) {
                    options += '<option value="' + el[value] + '">' + el[name] + '</option>';
                } else {
                    //  console.log('else');
                }

            }
        });
    } catch (err) {
        console.log(err);
    }

    $('#' + idSelect).append(options);
}

function number_format(amount, decimals) {

    amount += ''; // por si pasan un numero en vez de un string
    amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

    decimals = decimals || 0; // por si la variable no fue fue pasada

    // si no es un numero o es igual a cero retorno el mismo cero
    if (isNaN(amount) || amount === 0)
        return parseFloat(0).toFixed(decimals);
    // si es mayor o menor que cero retorno el valor formateado como numero
    amount = '' + amount.toFixed(decimals);
    var amount_parts = amount.split('.'),
            regexp = /(\d+)(\d{3})/;
    while (regexp.test(amount_parts[0]))
        amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
    return amount_parts.join('.');
}

function fnExcelReport(idTable) {
    var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange;
    var j = 0;
    tab = document.getElementById(idTable); // id of table


    for (j = 0; j < tab.rows.length; j++)
    {
        tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text = tab_text + "</table>";
    tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
    tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");
    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html", "replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus();
        sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
    } else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
    return (sa);
}

function validateNumbers(e) {
// Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right, down, up
                            (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        }

        function deleteRowTable(idTable, varTable) {
            $('#' + idTable + ' tbody').on('click', '#btnQuitar', function () {
                varTable.row($(this).parents('tr')).remove().draw();
            });
        }

        function addRowTable(idTable, varTable, params, editable) {
            var values = [];
            var arrayValues = params.split('|');
            for (var i = 0; i < arrayValues.length; i++) {
                values.push(arrayValues[i]);
            }
            if (editable != "") {// valida si se tienen elementos que agregar ala tabla
                if (editable.includes("|")) { // valida si hay mas de un elemento a agregar a la tabla
                    var arrayEditable = editable.split('|');
                    for (var x = 0; x < arrayEditable.length; x++) {
                        switch (arrayEditable[x]) {
                            case "INPUT":
                                values.push('<input class="form-control validate[required,custom[onlyLetterSp]]" type="text">');
                                break;
                            case "DECIMAL":
                                values.push('<input class="form-control validate[required,custom[onlyNumPoint]]" type="text">');
                                break;
                            case "COMBO":
                                values.push('<select class="form-control validate[required]"  data-live-search="true" id="combo"></select>');
                                break;
                        }
                    }
                } else {
                    switch (editable) {
                        case "INPUT":
                            values.push('<input class="form-control validate[required,custom[onlyLetterSp]]" type="text">');
                            break;
                        case "DECIMAL":
                            values.push('<input class="form-control validate[required,custom[onlyNumPoint]]" type="text">');
                            break;
                        case "COMBO":
                            values.push('<select class="form-control validate[required]"  data-live-search="true" id="combo"></select>');
                            break;
                    }
                }
            } else {

            }
            values.push('<a href="#" id="btnQuitar" class="btn btn-danger pull-left"><i class="glyphicon glyphicon-remove"></i></a>');
            //agregamos los valores ala tabla e incluimos un boton para eliminar
            varTable.row.add(values).draw();
            deleteRowTable(idTable, varTable);
        }
        function mostrarMapa() {
            //Comienza codigo de mapa
            var coordenadas = '28.6140806, -106.0910354'
            var coord = coordenadas.split(",");

            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                center: {lat: parseFloat(coord[0]), lng: parseFloat(coord[1])},
                zoom: 13,
                mapTypeControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var myLatlng = new google.maps.LatLng(coord[0], coord[1]);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: '¡Arrastrame!',
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function () {
                var markerLatLng = marker.getPosition();
                $("#coordenadas").val(markerLatLng.lat() + "," + markerLatLng.lng());
            });
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];
                marker.setMap(null);

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {

                    marker.setMap(null);

                    marker = new google.maps.Marker({
                        position: place.geometry.location,
                        map: map,
                        title: '¡Arrastrame!',
                        draggable: true
                    });


                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }

                    $("#coordenadas").val(place.geometry.location);

                    google.maps.event.addListener(marker, 'dragend', function () {
                        var markerLatLng = marker.getPosition();
                        $("#coordenadas").val(markerLatLng.lat() + "," + markerLatLng.lng());
                    });

                });
                map.fitBounds(bounds);
            });
            //Termina codigo de mapa
        }
        function mostrarMapaBase(coordendas) {
            var coord = coordendas.split(",");
//Comienza codigo de mapa
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                center: {lat: parseFloat(coord[0]), lng: parseFloat(coord[1])},
                zoom: 15,
                mapTypeControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var myLatlng = new google.maps.LatLng(coord[0], coord[1]);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: '¡Arrastrame!',
                draggable: true
            });


            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];
                marker.setMap(null);

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {

                    marker.setMap(null);

                    marker = new google.maps.Marker({
                        position: place.geometry.location,
                        map: map,
                        title: '¡Arrastrame!',
                        draggable: true
                    });


                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }

                    $("#coordenadas").val(place.geometry.location);

                    google.maps.event.addListener(marker, 'dragend', function () {
                        var markerLatLng = marker.getPosition();
                        $("#coordenadas").val(markerLatLng.lat() + "," + markerLatLng.lng());
                    });

                });
                map.fitBounds(bounds);
            });
            //Termina codigo de mapa
        }
        function show_image() {
            window.mostrarVistaPrevia = function mostrarVistaPrevia() {

                var Archivos, Lector;
                var origen, tipo;
                var imgs = [];
                Archivos = jQuery('#imagen_nueva')[0].files;

                Lector = new FileReader();
                Lector.onloadend = function (e) {
                    origen = e.target; //objeto FileReader

                    jQuery('#vista_previa').attr('src', origen.result);

                    window.obtenerMedidas();
                }

                Lector.readAsDataURL(Archivos[0]);
            };

            window.obtenerMedidas = function obtenerMedidas() {
                jQuery('<img/>').bind('load', function (e) {
                    //alert(this.width + "x" + this.height);
                    if (this.width > 1048 && this.height > 1048) {
                        bootbox.alert({
                            message: "La imagen debe tener un tamano maximo de 1048x1048px",
                            size: 'small',
                            callback: function () {
                            }
                        });
                        tamano_imagen = false;
                        return;
                    } else {
                        tamano_imagen = true;
                    }
                }).attr('src', jQuery('#vista_previa').attr('src'));
                $("#cargoImg").val(1);
            }

            jQuery(document).ready(function () {
                jQuery('#botonera').on('change', '#imagen_nueva', function (e) {
                    window.mostrarVistaPrevia();
                });
            });
        }
        function respuestaAjax(respuesta, mensaje) {
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
        function validarFormulario(formulario, mensaje, funcion) {
            if (!$("#" + formulario).validationEngine('validate')) {
                bootbox.alert({
                    message: 'Por favor revisa los campos faltantes'
                });
                $("#" + formulario).validationEngine();
                return;
            } else {
                var dialog = confirm("small", mensaje, funcion);
            }
        }