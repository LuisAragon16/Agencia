<div class="row" id="rowDet">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <!-- Horizontal Form --> 
        <div id= "divAltaAutobuses" class="box box-primary"> <!-- collapsed-box-->
            <div class="box-header with-border" data-widget="collapse">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Crear / modificar</h3>
            </div>
            <div class="box-body" id="altaAutobuses">
                <input type="text" id="iAutobusID" style="display: none">
                <input type="text" id="cargoImg" style="display: none"  value="0">
                <form id="altaAutobus" data-toogle="validator" role="form" novalidate="true">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <label for="unidad" class="col-form-label">Unidad:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="unidad" placeholder="Unidad"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <label for="empresa" class="col-form-label">Empresa:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="empresa" placeholder="Empresa"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <label for="iDestinoID" class="col-form-label">Destino:</label>
                        <select  id="iDestinoID" class="form-control validate[required]">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <label for="iSalidaID" class="col-form-label">Salida:</label>
                        <select  id="iSalidaID" class="form-control validate[required]">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="iTipoAutobusID" class="col-form-label">Tipo de autob&uacute;s:</label>
                        <select  id="iTipoAutobusID" class="form-control validate[required]">
                            <option></option>
                            <option value="51">51 Lugares</option>
                            <option value="42">42 Lugares</option>
                            <option value="47">47 Lugares</option>
                            <option value="47E">47E Lugares puerta enmedio</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="fechaSalida" class="col-form-label">Fecha de salida:</label>
                        <input type="text" class="form-control validate[required]" id="fechaSalida" placeholder="Fecha de salida"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="fechaRegreso" class="col-form-label">Fecha de regreso:</label>
                        <input type="text" class="form-control validate[required]" id="fechaRegreso" placeholder="Fecha de regreso"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <div style="margin-top: 25px;">
                            <input class="pull-right" data-onstyle="success" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Activo" data-off="Inactivo " id="chkEstatus">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="img/autobuses/default.jpg" style="width: 150px;" class="img-thumbnail" id="vista_previa">
                        <div class="form-group" id="botonera">
                            <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label" for="imagen">Selecciona una fotografia:</label>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 imagen">
                                <input type="file" id="imagen_nueva" accept="image/*" onchange="show_image()" required="required">
                            </div>
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
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <!-- Horizontal Form -->
        <div class="box box-primary" style="overflow-x: scroll;">
            <div class="box-header with-border">
                <h3 class="box-title">Autobuses <label id="lblAutobuses"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblAutobuses')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblAutobuses" class="table table-bordered table-striped">
                    <thead style="background: #075076; color:white;">
                        <tr>
                            <th>iAutobusID</th>
                            <th>Empresa</th>
                            <th>Unidad</th>
                            <th>Salida</th>
                            <th>Destino</th>
                            <th>Fecha salida</th>
                            <th>Fecha regreso</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>