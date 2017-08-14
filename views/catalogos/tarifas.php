<div class="row" id="rowDet">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- Horizontal Form --> 
        <div id= "divAltaTarifas" class="box box-primary"> <!-- collapsed-box-->
            <div class="box-header with-border" data-widget="collapse">
                <i class="fa fa-plus"></i>
                <h3 class="box-title">Crear / modificar</h3>
            </div>
            <div class="box-body" id="altaTarifas">
                <input type="text" id="iTarifaID" style="display: none">
                <form id="altaTarifa" data-toogle="validator" role="form" novalidate="true">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <label for="descripcion" class="col-form-label">Descripci&oacute;n:</label>
                        <input type="text" class="form-control validate[required,custom[onlyLetNumSpace]]" id="descripcion" placeholder="Descripci&oacute;n"> 
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <label for="comentarios" class="col-form-label">Comentarios:</label>
                        <input type="text" class="form-control" id="comentarios" placeholder="Comentarios"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="iTipoHabitacionID" class="col-form-label">Habitaci&oacute;n:</label>
                        <select  id="iTipoHabitacionID" class="form-control">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="iTipoTarifaID" class="col-form-label">Tipo de tarifa:</label>
                        <select  id="iTipoTarifaID" class="form-control validate[required]">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="iProveedorID" class="col-form-label">Proveedor:</label>
                        <select  id="iProveedorID" class="form-control validate[required]">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="persona1" class="col-form-label">Sencilla:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="persona1" placeholder="Sencilla" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="persona2" class="col-form-label">Doble:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="persona2" placeholder="Doble" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="persona3" class="col-form-label">Triple:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="persona3" placeholder="Triple" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="persona4" class="col-form-label">Cuadruple:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="persona4" placeholder="Cuadruple" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="persona5" class="col-form-label">Quintuple:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="persona5" placeholder="Quintuple" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="persona6" class="col-form-label">Sextuple:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="persona6" placeholder="Sextuple" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="extra" class="col-form-label">Extra:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="extra" placeholder="Extra" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="menor" class="col-form-label">Menor:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="menor" placeholder="Menor" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="edadMenor" class="col-form-label">Edad menor:</label>
                        <input type="text" class="form-control validate[custom[onlyLetNumSpace]]" id="edadMenor" placeholder="Edad menor"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="junior" class="col-form-label">Junior:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="junior" placeholder="Junior" value="0.00"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="edadJunior" class="col-form-label">Edad junior:</label>
                        <input type="text" class="form-control validate[custom[onlyLetNumSpace]]" id="edadJunior" placeholder="Edad junior"> 
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-6 col-xs-6">
                        <label for="tasa" class="col-form-label">Tasa:</label>
                        <input type="text" class="form-control validate[custom[number]]" id="tasa" placeholder="Tasa"  value="0.80"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <label for="ocupacion" class="col-form-label">Ocupaci&oacute;n m&aacute;xima:</label>
                        <input type="text" class="form-control validate[custom[onlyNumberSp],maxSize[8]]" id="ocupacion" placeholder="Ocupaci&oacute;n m&aacute;xima"> 
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6">
                        <div style="margin-top: 25px;">
                            <input class="pull-right" data-onstyle="success" style="width: 90%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Activo" data-off="Inactivo " id="chkEstatus">
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <button type="button" id="btnCancelar" class="btn btn-danger"><i class="glyphicon glyphicon-ban-circle"></i> CANCELAR</button>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <button type="button" id="btnGuardar" class="btn btn-success pull-right aBotones"> <i class="glyphicon glyphicon-save"></i> GUARDAR</button>  
                    <button type="button" id="btnActualizar" class="btn btn-info pull-right aBotones"><i class="glyphicon glyphicon-refresh"></i> ACTUALIZAR</button>
                    <button type="button" id="btnVerPeriodos" class="btn btn-primary pull-right aBotones"> <i class="fa fa-calendar"></i> VER PERIODOS</button>
                    <button type="button" id="btnAgregarPeriodo" class="btn btn-primary pull-right aBotones"> <i class="fa fa-plus"></i> AGREGRA PERIODO</button>
                    <button type="button" id="btnDias" class="btn btn-info pull-right aBotones"> <i class="fa fa-calendar-check-o"></i> DIAS</button>
                    <button type="button" id="btnPublica" class="btn btn-warning pull-right aBotones"> <i class="fa fa-usd"></i> TARIFA PUBLICA</button>
                    <button type="button" id="btnCalcular" class="btn btn-default pull-right aBotones"> <i class="fa fa-calculator"></i> CALCULAR</button>  
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" id="rowDet">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-2">
        <!-- Horizontal Form -->
        <div class="box box-primary" style="overflow-x: scroll;">
            <div class="box-header with-border">
                <h3 class="box-title">Tarifas <label id="lblTarifas"></label></h3>
                <button type="button" id="btnExportar" class="btn btn-success pull-right" onclick="fnExcelReport('tblTarifas')"><i class="glyphicon glyphicon-save-file"></i> EXCEL</button>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <table id="tblTarifas" class="table table-bordered table-striped">
                    <thead style="background: #075076; color:white;">
                        <tr>
                            <th>iTarifasID</th>
                            <th>Descripci&oacute;n</th>
                            <th>Modificado</th>
                            <th>Habitaci&oacute;n</th>
                            <th>Tipo</th>
                            <th>Proveedor</th>
                            <th>Sencillo</th>
                            <th>Doble</th>
                            <th>Triple</th>
                            <th>Cuadruple</th>
                            <th>Quintuple</th>
                            <th>Sextuple</th>
                            <th>Menor</th>
                            <th>Junior</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdlCalculo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Seleccione una tipo de calculo para aplicarlo</h4>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="formEvento">
                        <div class = "modal-body">
                            <div class="form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <select  id="calculo" class="form-control validate[required]">
                                        <option value="1">Euro con impuestos extra</option>
                                        <option value="2">Euro sin impuestos extra</option>
                                        <option value="3">Euro con impuestos</option>
                                        <option value="4">T/I con impuestos extra-RIU</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="calcularTarifas()" data-dismiss="modal">Calcular</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdlDias">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Seleccione los dias disponibles</h4>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="formEvento">
                        <div class = "modal-body">
                            <div class="form-group">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div style="margin-top: 15px;">
                                            <input class="pull-right" data-onstyle="success" style="width: 98%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Lunes" data-off="Lunes" id="chkLunes" data-width="100">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div style="margin-top: 15px;">
                                            <input class="pull-right" data-onstyle="success" style="width: 98%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Martes" data-off="Martes" id="chkMartes" data-width="100">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div style="margin-top: 15px;">
                                            <input class="pull-right" data-onstyle="success" style="width: 98%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Miercoles" data-off="Miercoles" id="chkMiercoles"data-width="100">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div style="margin-top: 15px;">
                                            <input class="pull-right" data-onstyle="success" style="width: 98%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Jueves" data-off="Jueves" id="chkJueves" data-width="100">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div style="margin-top: 15px;">
                                            <input class="pull-right" data-onstyle="success" style="width: 98%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Viernes" data-off="Viernes" id="chkViernes"data-width="100">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div style="margin-top: 15px;">
                                            <input class="pull-right" data-onstyle="success" style="width: 98%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Sabado" data-off="Sabado" id="chkSabado" data-width="100">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                        <div style="margin-top: 15px;">
                                            <input class="pull-right" data-onstyle="success" style="width: 98%; height: 34px;" type="checkbox" checked data-toggle="toggle"  data-on="Domingo" data-off="Domingo" id="chkDomingo"data-width="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="guardarDias()" data-dismiss="modal">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdlPublica">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Se muestran las tarifas p&uacute;blicas</h4>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="formEvento">
                        <div class = "modal-body">
                            <div class="form-group">
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <label for="pSencilla" class="col-form-label">Sencilla:</label>
                                    <input type="text" class="form-control" id="pSencilla" value="0.00"> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <label for="pDoble" class="col-form-label">Doble:</label>
                                    <input type="text" class="form-control" id="pDoble" value="0.00"> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <label for="pTriple" class="col-form-label">Triple:</label>
                                    <input type="text" class="form-control" id="pTriple" value="0.00"> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <label for="pCuadruple" class="col-form-label">Cuadruple:</label>
                                    <input type="text" class="form-control" id="pCuadruple" value="0.00"> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <label for="pQuintuple" class="col-form-label">Quintuple:</label>
                                    <input type="text" class="form-control" id="pQuintuple" value="0.00"> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <label for="pSextuple" class="col-form-label">Sextuple:</label>
                                    <input type="text" class="form-control" id="pSextuple" value="0.00"> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <label for="pMenor" class="col-form-label">Menor:</label>
                                    <input type="text" class="form-control" id="pMenor" value="0.00"> 
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                    <label for="pJunior" class="col-form-label">Junior:</label>
                                    <input type="text" class="form-control" id="pJunior" value="0.00"> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="mdlPeriodos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Periodos para esta tarifa</h4>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form id="formFechasPeriodos">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="fechaInicio" class="col-form-label">Inicio:</label>
                            <input type="text" class="form-control  validate[required]" id="fechaInicio" placeholder="Inicio:"> 
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                            <label for="fechaFin" class="col-form-label">Termino:</label>
                            <input type="text" class="form-control  validate[required]" id="fechaFin" placeholder="Termino:"> 
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="validarFormulario('formFechasPeriodos','Desea agregar este periodo?',gaurdarPeriodo)" data-dismiss="modal">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>