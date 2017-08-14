<div class="row" id="rowDet">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Horizontal Form --> 
        <div id= "divAltaAgencias" class="box box-primary"> <!-- collapsed-box-->
            <div class="box-header with-border" data-widget="collapse">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Crear / modificar</h3>
            </div>
            <div class="box-body" id="altaAgencias">
                <input type="text" id="iAgenciaID" style="display: none">
                <input type="text" id="cargoImg" style="display: none"  value="0">
                <form id="altaAgencia" data-toogle="validator" role="form" novalidate="true">
                    <div class=" form-group col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="agencia" class="col-form-label">Agencia:</label>
                            <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="agencia" placeholder="Agencia"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="razon" class="col-form-label">Raz&oacute;n social:</label>
                            <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="razon" placeholder="Raz&oacute;n social"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="rfc" class="col-form-label">RFC:</label>
                            <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="rfc" placeholder="RFC"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="calle" class="col-form-label">Calle:</label>
                            <input type="text" class="form-control" id="calle" placeholder="Calle"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <label for="noInt" class="col-form-label">Numero interior:</label>
                            <input type="text" class="form-control" id="noInt" placeholder="Numero interior"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <label for="noExt" class="col-form-label">Numero exterior:</label>
                            <input type="text" class="form-control" id="noExt" placeholder="Numero exterior"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="colonia" class="col-form-label">Colonia:</label>
                            <input type="text" class="form-control" id="colonia" placeholder="Colonia"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="localidad" class="col-form-label">Localidad:</label>
                            <input type="text" class="form-control" id="localidad" placeholder="Localidad"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <label for="cp" class="col-form-label">Codigo postal:</label>
                            <input type="text" class="form-control" id="cp" placeholder="Codigo postal" maxlength="5"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="estado" class="col-form-label">Estado:</label>
                            <input type="text" class="form-control" id="estado" placeholder="Estado"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="pais" class="col-form-label">Pa&iacute;s:</label>
                            <input type="text" class="form-control" id="pais" placeholder="Pa&iacute;s"> 
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="referencia">Referencia</label>
                            <textarea class="form-control" rows="2" id="referencia" name="referencia" maxlength="255"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="descripcion">Descripci&oacute;n</label>
                            <textarea class="form-control" rows="2" id="descripcion" name="descripcion" maxlength="255"></textarea>
                        </div>
                    </div>
                    <div class=" form-group col-lg-5 col-md-5 col-sm-12 col-xs-12">   
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="banco" class="col-form-label">Banco:</label>
                            <input type="text" class="form-control" id="banco" placeholder="Banco"> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="sucursal" class="col-form-label">Sucursal:</label>
                            <input type="text" class="form-control" id="sucursal" placeholder="Sucursal"> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="cuentaBan" class="col-form-label">Cuenta bancaria:</label>
                            <input type="text" class="form-control" id="cuentaBan" placeholder="Cuenta bancaria"> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="clabe" class="col-form-label">Clabe:</label>
                            <input type="text" class="form-control" id="clabe" placeholder="Clabe"> 
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                            <label for="domicilio" class="col-form-label">Domicilio:</label>
                            <input type="text" class="form-control" id="domicilio" placeholder="Domicilio"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <label for="ciudad" class="col-form-label">Ciudad:</label>
                            <input type="text" class="form-control" id="ciudad" placeholder="Ciudad"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="cpD" class="col-form-label">Codigo postal:</label>
                            <input type="text" class="form-control" id="cpD" placeholder="Codigo postal" maxlength="5"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <label for="tel1" class="col-form-label">Telefono 1:</label>
                            <input type="text" class="form-control" id="tel1" placeholder="Telefono 1"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <label for="tel2" class="col-form-label">Telefono 2:</label>
                            <input type="text" class="form-control" id="tel2" placeholder="Telefono 2"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <label for="tel3" class="col-form-label">Telefono 3:</label>
                            <input type="text" class="form-control" id="tel3" placeholder="Telefono 3"> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="correoRespaldos" class="col-form-label">Correo respaldos:</label>
                            <input type="text" class="form-control validate[required,custom[email]]" id="correoRespaldos" placeholder="Correo respaldos"> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <label for="correoElectronico" class="col-form-label">Correo electr&oacute;nico:</label>
                            <input type="text" class="form-control validate[required,custom[email]]" id="correoElectronico" placeholder="Correo electr&oacute;nico"> 
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <img src="img/agencias/default.jpg" style="width: 150px;" class="img-thumbnail" id="vista_previa">
                            <div class="form-group" id="botonera">
                                <label class="col-lg-6 col-md-6 col-sm-6 col-xs-6 control-label" for="imagen">Selecciona un logo:</label>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 imagen">
                                    <input type="file" id="imagen_nueva" accept="image/*" onchange="show_image()" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div style="margin-top: 25px;">
                                <input class="pull-right" data-onstyle="success" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Activo" data-off="Inactivo " id="chkEstatus">
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
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Horizontal Form -->
        <div class="box box-primary" style="overflow-x: scroll;">
            <div class="box-header with-border">
                <h3 class="box-title">Agencias <label id="lblAgencias"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblAgencias')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblAgencias" class="table table-bordered table-striped">
                    <thead style="background: #075076; color:white;">
                        <tr>
                            <th>iAgenciaID</th>
                            <th>Agencia</th>
                            <th>Raz&oacute; social</th>
                            <th>RFC</th>
                            <th>Domicilio</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>