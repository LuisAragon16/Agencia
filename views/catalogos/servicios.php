<div class="row" id="rowDet">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Horizontal Form --> 
        <div id= "divAltaServicios" class="box box-primary"> <!-- collapsed-box-->
            <div class="box-header with-border" data-widget="collapse">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Crear / modificar</h3>
            </div>
            <div class="box-body" id="altaServicios">
                <input type="text" id="iServicioID"style="display: none">
                <form id="altaServicio" data-toogle="validator" role="form" novalidate="true">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <label for="proveedor" class="col-form-label">Proveedor:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="proveedor" placeholder="Proveedor"> 
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <label for="razon" class="col-form-label">Raz&oacute;n social:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="razon" placeholder="Raz&oacute;n social"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="rfc" class="col-form-label">RFC:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="rfc" placeholder="RFC"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="destino" class="col-form-label">Destino:</label>
                        <select  id="destino" class="form-control">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="tipoServicio" class="col-form-label">Tipo servicio:</label>
                        <select  id="tipoServicio" class="form-control">
                            <option></option>
                        </select>
                    </div>
                    <div class=" form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="domicilio" class="col-form-label">Domicilio:</label>
                            <input type="telVentas" class="form-control" id="domicilio" placeholder="Domicilio"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <label for="ciudad" class="col-form-label">Ciudad:</label>
                            <input type="ciudad" class="form-control" id="ciudad" placeholder="Ciudad"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="cp" class="col-form-label">Codigo postal:</label>
                            <input type="cp" class="form-control" id="cp" placeholder="Codigo postal" maxlength="5"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="telVentas" class="col-form-label">Telefonos ventas/grupos:</label>
                            <input type="telVentas" class="form-control" id="telVentas" placeholder="Telefonos ventas/grupos"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="telPagos" class="col-form-label">Telefono pagos:</label>
                            <input type="text" class="form-control" id="telPagos" placeholder="Telefono pagos"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="telDirecto" class="col-form-label">Telefono directo:</label>
                            <input type="text" class="form-control" id="telDirecto" placeholder="Telefono directo"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="telReservaciones" class="col-form-label">Telefono reservaciones:</label>
                            <input type="text" class="form-control" id="telReservaciones" placeholder="Telefono reservaciones"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="tel800" class="col-form-label">Lada 800:</label>
                            <input type="text" class="form-control" id="tel800" placeholder="Lada 800"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="correoPagos" class="col-form-label">Correo de pagos:</label>
                            <input type="text" class="form-control" id="correoPagos" placeholder="Correo de pagos"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="correoFacturacion" class="col-form-label">Correo facturaci&oacute;n:</label>
                            <input type="text" class="form-control validate[required,custom[email]]" id="correoFacturacion" placeholder="Correo facturaci&oacute;n"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="correoReservaciones" class="col-form-label">Correo reservaciones:</label>
                            <input type="text" class="form-control validate[required,custom[email]]" id="correoReservaciones" placeholder="Correo reservaciones"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="correoGerencia" class="col-form-label">Correo gerencia:</label>
                            <input type="text" class="form-control validate[required,custom[email]]" id="correoGerencia" placeholder="Correo gerencia"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="url" class="col-form-label">URL:</label>
                            <input type="text" class="form-control" id="url" placeholder="URL"> 
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <label for="ocupacion" class="col-form-label">Ocupaci&oacute;n m&aacute;xima:</label>
                            <select  id="ocupacion" class="form-control">
                                <option value="0">Seleccionar...</option>
                                <option value="2">Ocupaci&oacute;n doble</option>
                                <option value="3">Ocupaci&oacute;n triple</option>
                                <option value="4">Ocupaci&oacute;n cuadruple</option>
                                <option value="5">Ocupaci&oacute;n quintuple</option>
                                <option value="6">Ocupaci&oacute;n sextuple</option>
                            </select>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="informacion">Informaci&oacute;n</label>
                            <textarea class="form-control" rows="2" id="informacion" name="informacion" maxlength="255"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="descripcion">Descripci&oacute;n</label>
                            <textarea class="form-control" rows="2" id="descripcion" name="descripcion" maxlength="255"></textarea>
                        </div>
                    </div>
                    <div class=" form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="banco" class="col-form-label">Banco:</label>
                                <input type="text" class="form-control" id="banco" placeholder="Banco"> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="cuentaDepo" class="col-form-label">Cuenta depositos:</label>
                                <input type="text" class="form-control" id="cuentaDepo" placeholder="Cuenta depositos"> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="sucursal" class="col-form-label">Sucursal:</label>
                                <input type="text" class="form-control" id="sucursal" placeholder="Sucursal"> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="refBancaria" class="col-form-label">Rerefencia bancaria:</label>
                                <input type="text" class="form-control" id="refBancaria" placeholder="Rerefencia bancaria"> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="clabe" class="col-form-label">Clabe:</label>
                                <input type="text" class="form-control" id="clabe" placeholder="Clabe"> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="banco1" class="col-form-label">Banco (opcional):</label>
                                <input type="text" class="form-control" id="banco1" placeholder="Banco"> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="cuentaDepo1" class="col-form-label">Cuenta depositos (opcional):</label>
                                <input type="text" class="form-control" id="cuentaDepo1" placeholder="Cuenta depositos"> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="sucursal1" class="col-form-label">Sucursal (opcional):</label>
                                <input type="text" class="form-control" id="sucursal1" placeholder="Sucursal"> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="refBancaria1" class="col-form-label">Rerefencia bancaria:</label>
                                <input type="text" class="form-control" id="refBancaria1" placeholder="Rerefencia bancaria"> 
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <label for="clabe1" class="col-form-label">Clabe (opcional):</label>
                                <input type="text" class="form-control" id="clabe1" placeholder="Clabe"> 
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                <div style="margin-top: 25px;">
                                    <input class="pull-right" data-onstyle="success" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Activo" data-off="Inactivo " id="chkEstatus">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="pac-input" placeholder="Buscar domicilio" style="width: 300px">
                            <b>Arrastra el marcador para indicar la ubicaci&oacute;n</b>
                            <div id="map_canvas" style="width:100%;height:250px"></div>
                            <input type="text" id="coordenadas" value="28.6140806, -106.0910354" style="display:none">
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
                <h3 class="box-title">Servicios <label id="lblServicios"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblServicios')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblServicios" class="table table-bordered table-striped">
                    <thead style="background: #075076; color:white;">
                        <tr>
                            <th>iServicioID</th>
                            <th>Proveedor</th>
                            <th>Raz&oacute; social</th>
                            <th>RFC</th>
                            <th>Tipo servicio</th>
                            <th>Destino</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>