<div class="row" id="rowDet">
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <!-- Horizontal Form --> 
        <div id= "divAltaAgentess" class="box box-primary"> <!-- collapsed-box-->
            <div class="box-header with-border" data-widget="collapse">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Crear / modificar</h3>
            </div>
            <div class="box-body" id="altaAgentes">
                <input type="text" id="iAgenteID" style="display: none">
                <form id="altaAgente" data-toogle="validator" role="form" novalidate="true">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="nombre" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="nombre" placeholder="Nombre"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="apaterno" class="col-form-label">Apellido paterno:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="apaterno" placeholder="Apellido paterno"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="amaterno" class="col-form-label">Apellido materno:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="amaterno" placeholder="Apellido materno"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="cumpleanos" class="col-form-label">Cumplea&ntilde;os:</label>
                        <input type="text" class="form-control  validate[required]" id="cumpleanos" placeholder="Cumplea&ntilde;os"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="domicilio" class="col-form-label">Domicilio:</label>
                        <input type="text" class="form-control" id="domicilio" placeholder="Domicilio"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="estadoCivil" class="col-form-label">Estado civil:</label>
                        <select  id="estadoCivil" class="form-control validate[required]">
                            <option></option>
                            <option value="Soltero">Soltero(a)</option>
                            <option value="Casado">Casado</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="sucursal" class="col-form-label">Sucursal:</label>
                        <input type="text" class="form-control" id="sucursal" placeholder="Sucursal"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="telefono" class="col-form-label">Telefono:</label>
                        <input type="text" class="form-control" id="telefono" placeholder="Telefono"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="celular" class="col-form-label">Celular:</label>
                        <input type="text" class="form-control" id="celular" placeholder="Celular"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="correoAgencia" class="col-form-label">Correo agencia:</label>
                        <input type="text" class="form-control  validate[required,custom[email]]" id="correoAgencia" placeholder="Correo agencia"> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="correoPersonal" class="col-form-label">Correo personal:</label>
                        <input type="text" class="form-control  validate[required,custom[email]]" id="correoPersonal" placeholder="Correo personal"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <label for="iRolID" class="col-form-label">Rol:</label>
                        <select  id="iRolID" class="form-control validate[required]">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                        <div style="margin-top: 25px;">
                            <input class="pull-right" data-onstyle="success" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Activo" data-off="Inactivo " id="chkEstatus">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="iAgenciaID" class="col-form-label">Agencia:</label>
                        <select  id="iAgenciaID" class="form-control">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <label for="iProveedorID" class="col-form-label">Oficina:</label>
                        <select  id="iProveedorID" class="form-control">
                            <option></option>
                        </select>
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
    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <!-- Horizontal Form -->
        <div class="box box-primary" style="overflow-x: scroll;">
            <div class="box-header with-border">
                <h3 class="box-title">Agentes <label id="lblAgentes"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblAgentes')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblAgentes" class="table table-bordered table-striped">
                    <thead style="background: #075076; color:white;">
                        <tr>
                            <th>iAgenteID</th>
                            <th>Nombre</th>
                            <th>Agencia</th>
                            <th>Proveedor</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>