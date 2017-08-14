<?php
session_start();

if (!isset($_SESSION['id_usuario']))
    header('location: login.php');

require('views/verificaSeccion.php');
require_once('includes/utils.php');
require_once('includes/db.php');

function valPer($idRol, $url, $iUsuarioID) {
    $query = "EXEC Sp_Validacion_ValidaPantalla ?,?,?";

    $params = array(
        array($idRol, SQLSRV_PARAM_IN),
        array($url, SQLSRV_PARAM_IN),
        array($iUsuarioID, SQLSRV_PARAM_IN)
    );

    $datos = ejecutaQuery($query, $params);
    return $datos;
}

if ($op != "") {
    $datos = valPer($_SESSION['id_rol'], "?op=" . $op, $_SESSION['id_usuario']);

    foreach ($datos as $key) {
        if ($key['CONTEO'] == 0) {
            $tit = "";
            $app = "pages/examples/404.html";
            $js = "";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HTN</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fa/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">

        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        <link rel="stylesheet" href="plugins/iCheck/all.css">

        <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
        <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
        <link href="plugins/select2/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="plugins/jQuery-Validation/css/validationEngine.jquery.css" type="text/css"/>

        <link rel="stylesheet" href="css/custom.css">
        <link href="plugins/bootstrap-toggle/bootstrap-toggle.min.css" rel="stylesheet">
        <script type="text/javascript" src="lib/modernizr.2.5.3.min.js"></script>
        <script type="text/javascript" src="lib/hash.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php
        /* Just for your server-side code */
        header('Content-Type: text/html; charset=ISO-8859-1');
        ?>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index.php" class="logo">
                    <img src="img/logoL.png" class="imageLogo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <!-- logo for regular state and mobile devices -->
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Notifications: style can be found in dropdown.less -->
                            <!--  <li class="dropdown notifications-menu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                      <i class="fa fa-bell-o"></i>
                                      <span class="label label-warning">2</span>
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li class="header">Usted tiene 2 notificaciones</li>
                                      <li>
                                          <ul class="menu">
                                              <li>
                                                  <a href="#">
                                                      <i class="fa fa-user text-red"></i> Plan anual de capacitaci&oacute;n
                                                  </a>
                                              </li>
                                              <li>
                                                  <a href="#">
                                                      <i class="fa fa-user text-red"></i> Junta departamental RH
                                                  </a>
                                              </li>
                                          </ul>
                                      </li>
                                      <li class="footer"><a href="#">Ver todos</a></li>
                                  </ul>
                              </li>-->    
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="img/user.png" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $_SESSION['nombre']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="img/user.png" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $_SESSION['nombre']; ?>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <h3> 
                                                <a href="views/logout.php" class="btn btn-default btn-flat">Cerrar sesi&oacute;n</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                    </div>
                    <!-- search form -->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php include_once('views/menu.php') ?>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $tit; ?>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <?php include_once($app) ?>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
            </footer>

            <!-- Control Sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>

        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js"></script>
        <!-- daterangepicker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
        <!-- Slimscroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="plugins/chartjs/Chart.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.min.js"></script>
        <!-- Input mask -->
        <script src="plugins/input-mask/jquery.inputmask.js"></script>
        <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>

        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.11/api/fnReloadAjax.js"></script>

        <script src="js/utils.js"></script>
        <script src="js/bb.js"></script>

        <script src="plugins/iCheck/icheck.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="plugins/fullcalendar/fullcalendar.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
        <script src="plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script>
        <script src="plugins/select2/select2.min.js"></script>
        <script src="plugins/select2/es.js"></script>

        <script type="text/javascript" src="plugins/jQuery-Validation/js/languages/jquery.validationEngine-es.js"></script>
        <script type="text/javascript" src="plugins/jQuery-Validation/js/contrib/other-validations.js"></script>
        <script type="text/javascript" src="plugins/jQuery-Validation/js/jquery.validationEngine.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAa2qYiOu9IDTs__qScBiw7052oCiIp9Tc&libraries=places"></script>

        <script type="text/javascript" src="<?php echo $js; ?>"></script>
        <script type="text/javascript">
            $("#txtFechaNac").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            $("#txtTel").inputmask("9999999999", {"placeholder": "__________"});
            $("#txtCP").inputmask("99999", {"placeholder": "_____"});
            $("#txtTelEmergencia").inputmask("9999999999", {"placeholder": "__________"});
            $("#txtFechaAlta").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            $("#txtFechaIniDesc").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            $("#txtFechaInicio").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            $("#txtFechaFin").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            $('.datepicker').hide();
            $.fn.datepicker.dates['en'] = {
                days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
                daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "ju", "Vi", "Sa"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                today: "Hoy",
                clear: "Limpiar",
                format: "yyyy-mm-dd",
                titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                weekStart: 0
            };
            function validaTipoPermisosMenu() {
                var permisos = ejecutaQuery('Sp_Con_TraerMenuPermisos', '4|0', 'id_usuario|op');
                $('#btnCancelar').hide();
                $('#btnActualizar').hide();
                $('#btnGuardar').hide();
                $('#btnEditar').hide();
                $(".btnEditar").each(function (index) {
                    $(this).hide();
                });
                permisos.forEach(function (el) {
                    console.log(permisos);
                    if (el.iTipoPermisoID == 2) {
                        $('#btnGuardar').show();
                    } else if (el.iTipoPermisoID == 3) {
                        $(".btnEditar").each(function (index) {
                            $(this).show()
                        });
                    }
                });
            }
        </script>

        <!-- Morris.js charts -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="plugins/morris/morris.min.js"></script>-->
    </body>
</html>
