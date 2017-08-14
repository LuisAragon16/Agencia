<div class="row" id="rowDet">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- Horizontal Form --> 
            <div id= "divAltaRsvaAutobus" class="box box-primary"> <!-- collapsed-box-->
                <div class="box-header with-border">
                    <h3 class="box-title">Reservar</h3>
                </div>
                <div class="box-body" id="altaRsvaAutobus">
                    <input type="text" id="iAutobusID">
                    <form id="altaFormRsvaAutobus" data-toogle="validator" role="form" novalidate="true">
                        <input type="text" id="iAutobusID" style="display: none">
                        <input type="text" id="especial" style="display: none">
                        <input type="text" id="lugares" style="display: none">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="pasajero" class="col-form-label">Pasajero:</label>
                            <input type="text" class="form-control validate[required]" id="pasajero"placeholder="Pasajero:">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="iAgenciaID" class="col-form-label">Agencia:</label>
                            <select  id="iAgenciaID" class="form-control validate[required]">
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="iAgenteID" class="col-form-label">Agente:</label>
                            <select  id="iAgenteID" class="form-control validate[required]">
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="iServicioID" class="col-form-label">Hotel:</label>
                            <select  id="iServicioID" class="form-control validate[required]">
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="iVistaID" class="col-form-label">Vista:</label>
                            <select  id="iVistaID" class="form-control validate[required]">
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="iOcupacionID" class="col-form-label">Ocupaci&oacute;n:</label>
                            <select  id="iOcupacionID" class="form-control validate[required]">
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="estatus" class="col-form-label">Estatus:</label>
                            <select  id="estatus" class="form-control validate[required]">
                                <option value="2">Apartado\disponible</option>
                                <option value="3">Pagado</option>
                            </select>
                        </div>

                    </form>
                </div>
                <div class="box-footer">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button type="button" id="btnCancelar" class="btn btn-danger aBotones"><i class="glyphicon glyphicon-ban-circle"></i> CANCELAR</button>
                        <button type="button" id="btnGuardar" class="btn btn-success pull-right aBotones" onclick="validarFormulario('altaFormRsvaAutobus','Guardar esta reservación?',guardarReservacion)"> <i class="glyphicon glyphicon-save"></i> GUARDAR</button>  
                        <button type="button" id="btnLiberar" class="btn btn-warning pull-right aBotones"> <i class="glyphicon glyphicon-share-alt"></i> LIBERAR ASIENTOS</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <div class="row" id="rowDet">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!-- Horizontal Form --> 
                <div id= "divAltaRsvaAutobus" class="box box-primary"> <!-- collapsed-box-->
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="asientosCamion">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="rowDet">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Horizontal Form -->
        <div class="box box-primary" style="overflow-x: scroll;">
            <div class="box-header with-border">
                <h3 class="box-title">Autobuses disponibles<label id="lblRsvaAutobus"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblRsvaAutobus')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblRsvaAutobus" class="table table-bordered table-striped">
                    <thead style="background: #3c728e; color:white;">
                        <tr>
                            <th>iAutobusID</th>
                            <th>especial</th>     
                            <th>lugares</th>
                            <th>Empresa</th>
                            <th>Unidad</th>
                            <th>Salida</th>
                            <th>Destino</th>
                            <th>Fecha salida</th>
                            <th>Fecha regreso</th>
                            <th>Disponibles</th>
                            <th>Apartados</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>