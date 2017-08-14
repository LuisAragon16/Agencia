<div class="row" id="rowDet">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <!-- Horizontal Form --> 
        <div id= "divAltaDestinos" class="box box-primary"> <!-- collapsed-box-->
            <div class="box-header with-border" data-widget="collapse">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Crear / modificar</h3>
            </div>
            <div class="box-body" id="altaDestinos">
                <input type="text" id="iDestinoID" style="display: none">
                <form id="altaDestino" data-toogle="validator" role="form" novalidate="true">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="descripcion" class="col-form-label">Descripci&oacute;n:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="descripcion" placeholder="Descripci&oacute;n:"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="tipo" class="col-form-label">Tipo destino:</label>
                        <select  id="tipo" class="form-control validate[required]">
                            <option></option>
                            <option value="Nacional">Nacional</option>
                            <option value="Internacional">Internacional</option>
                        </select>
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
                <h3 class="box-title">Destinos <label id="lblDestinos"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblDestinos')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblDestinos" class="table table-bordered table-striped">
                    <thead style="background: #075076; color:white;">
                        <tr>
                            <th>iDestinoID</th>
                            <th>Destino</th>
                            <th>Observaciones</th>
                            <th>Tipo</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>