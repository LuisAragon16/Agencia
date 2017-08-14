<div class="row" id="rowDet">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <!-- Horizontal Form --> 
        <div id= "divAltaSalidas" class="box box-primary"> <!-- collapsed-box-->
            <div class="box-header with-border" data-widget="collapse">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Crear / modificar</h3>
            </div>
            <div class="box-body" id="altaSalidas">
                <input type="text" id="iSalidaID" style="display: none">
                <form id="altaSalida" data-toogle="validator" role="form" novalidate="true">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="nombre" placeholder="nombre:"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="calle" class="col-form-label">Calle:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="calle" placeholder="Calle"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="noInt" class="col-form-label">Numero interior:</label>
                        <input type="text" class="form-control" id="noInt" placeholder="Numero interior"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="noExt" class="col-form-label">Numero exterior:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="noExt" placeholder="Numero exterior"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="colonia" class="col-form-label">Colonia:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="colonia" placeholder="Colonia"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="cp" class="col-form-label">Codigo postal:</label>
                        <input type="text" class="form-control validate[required]" id="cp" placeholder="Codigo postal" maxlength="5"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <div style="margin-top: 25px;">
                            <input class="pull-right" data-onstyle="success" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Activo" data-off="Inactivo " id="chkEstatus">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="descripcion">Observaciones</label>
                        <textarea class="form-control" rows="2" id="observaciones" name="observaciones" maxlength="255"></textarea>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="pac-input" placeholder="Buscar domicilio" style="width: 300px">
                        <b>Arrastra el marcador para indicar la ubicaci&oacute;n</b>
                        <div id="map_canvas" style="width:100%;height:250px"></div>
                        <input type="text" id="coordenadas" value="28.6140806, -106.0910354" style="display:none">
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
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <!-- Horizontal Form -->
        <div class="box box-primary" style="overflow-x: scroll;">
            <div class="box-header with-border">
                <h3 class="box-title">Salidas <label id="lblSalidas"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblSalidas')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblSalidas" class="table table-bordered table-striped">
                    <thead style="background: #075076; color:white;">
                        <tr>
                            <th>iSalidaID</th>
                            <th>Salida</th>
                            <th>Direcci&oacute;n</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>