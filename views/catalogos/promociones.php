<div class="row" id="rowDet">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <!-- Horizontal Form --> 
        <div id= "divAltaPromociones" class="box box-primary"> <!-- collapsed-box-->
            <div class="box-header with-border" data-widget="collapse">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Crear / modificar</h3>
            </div>
            <div class="box-body" id="altaPromociones">
                <form id="altaFormPromociones" data-toogle="validator" role="form" novalidate="true">
                    <h4 class="box-title">Puede seleccionar una tarifa en espec&iacute;fico para aplicar la promoci&oacute;n o seleccionar un proveedor para aplicarle 
                        la promoci&oacute;n a todas las tarifas activas capturadas a este proveedor.</h4>
                    <input type="text" id="iPromocionID" style="display: none">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="iTarifaID" class="col-form-label">Tarifa:</label>
                        <select  id="iTarifaID" class="form-control">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <label for="iServicioID" class="col-form-label">Proveedor:</label>
                        <select  id="iServicioID" class="form-control">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="comentarios" class="col-form-label">Comentarios:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="comentarios"placeholder="Comentarios:">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <label for="fechaInicioVenta" class="col-form-label">Fecha inicio venta:</label>
                        <input type="text" class="form-control validate[required]" id="fechaInicioVenta"placeholder="Fecha inicio venta:">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <label for="fechaFinVenta" class="col-form-label">Fecha fin venta:</label>
                        <input type="text" class="form-control validate[required]" id="fechaFinVenta"placeholder="Fecha fin venta:">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <label for="fechaInicioDisponible" class="col-form-label">Fecha inicio disponible:</label>
                        <input type="text" class="form-control validate[required]" id="fechaInicioDisponible"placeholder="Fecha inicio disponible:">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <label for="fechaFinDisponible" class="col-form-label">Fecha fin disponible:</label>
                        <input type="text" class="form-control validate[required]" id="fechaFinDisponible"placeholder="Fecha fin disponible:">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="llevaTasa" class="col-form-label">Lleva tasa?:</label>
                        <select  id="llevaTasa" class="form-control">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="tasa" class="col-form-label">Tasa:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="tasa"placeholder="Tasa:" value="0.00">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="iTipoTarifaID" class="col-form-label">Tipo tarifa:</label>
                        <select  id="iTipoTarifaID" class="form-control">
                            <option value="1">Publica</option>
                            <option value="0">Neta</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="tarifaNetaPublica" class="col-form-label">Tarifa:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="tarifaNetaPublica"placeholder="Tarifa:" value="0.00">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="descuento" class="col-form-label">Descuento:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="descuento"placeholder="Descuento:" value="0.00">
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <label for="tipoMenorGratis" class="col-form-label">Tipo menor gratis:</label>
                        <select  id="tipoMenorGratis" class="form-control">
                            <option value="1">Habitaci&oacute;n</option>
                            <option value="0">Por adulto</option>
                        </select>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                        <label for="menoresGratis" class="col-form-label">Cantidad menores gratis:</label>
                        <input type="text" class="form-control validate[custom[onlyLetNumSpace]]" id="menoresGratis"placeholder="Cantidad menores gratis:">
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <div style="margin-top: 25px;">
                            <input class="pull-right" data-onstyle="primary" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Menor 2x1" data-off="Menor 2x1 " id="menores2x1">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <div style="margin-top: 25px;">
                            <input class="pull-right" data-onstyle="primary" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Junior 2x1" data-off="Junior 2x1 " id="junior2x1">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <div style="margin-top: 25px;">
                            <input class="pull-right" data-onstyle="success" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Activo" data-off="Inactivo " id="activo">
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <button type="button" id="btnCancelar" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i> CANCELAR</button>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <button type="button" id="btnGuardar" class="btn btn-success pull-right"> <i class="glyphicon glyphicon-save"></i> GUARDAR</button>  
                    <button type="button" id="btnActualizar" class="btn btn-info pull-right"><i class="glyphicon glyphicon-refresh"></i> ACTUALIZAR</button>
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
                <h3 class="box-title">Promociones<label id="lblPromociones"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblPromociones')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblPromociones" class="table table-bordered table-striped">
                    <thead style="background: #3c728e; color:white;">
                        <tr>
                            <th>iPromocionID</th>
                            <th>Descripci&oacute;n</th>
                            <th>Fecha venta</th>
                            <th>Fecha disponible</th>
                            <th>Lleva tasa</th>
                            <th>Tipo tarifa</th>
                            <th>Tarifa</th>
                            <th>Descuento</th>
                            <th>Menor gratis</th>
                            <th>Menor 2x1</th>
                            <th>Tipo</th>
                            <th>Junior 2x1</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>