<?php
require_once("../../config/conexion.php");
if(isset($_SESSION["id_usuario"])){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once("../Head/head.php"); ?>
    </head>
    <body>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <header id="topnav">
                <?php require_once("../Header/header.php"); ?>
            </header>
            <!-- End Navigation Bar-->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">
                <?php require_once("../Nav/nav.php"); ?>
                <!-- Sidebar -left -->
            </div>
            <!-- Left Sidebar End -->


            <!-- Page Content Start -->
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page title box -->
                        <div class="page-title-box">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Citas</a></li>
                                <li class="breadcrumb-item active">Listado</li>
                            </ol>
                            <h4 class="page-title">Listado Citas</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
        
                                    <div class="table-rep-plugin" style>
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="cita_table" class="table  table-striped">
                                                <thead>
                                                <tr>
                                                    <th data-priority="1" >ID</th>
                                                    <th data-priority="1">Doctor</th>
                                                    <th data-priority="1">Paciente</th>
                                                    <th data-priority="1">Fecha Cita</th>
                                                    <th data-priority="1">Hora Cita</th>
                                                    
                                                    <th data-priority="1">Diágnostico</th>
                                                    <th data-priority="1">Pago</th>
                                                    <th data-priority="1">Fecha Creación</th>
                                                    <th data-priority="1">Estado</th>
                                                    <th data-priority="1"></th>
                                                    <th data-priority="1"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->
        
                                    </div> <!-- table-rep-plugin-->
        
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end container-fluid-->
                </div> <!-- end contant-->
            </div>
            <!-- End Page Content-->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="titulo_crud"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form role="form"  action="" method="POST" id="menu_form" name="menu_form">
                                <input type="hidden" id="id_cita" name="id_cita">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Fecha Cita<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" id="fecha_cita" name="fecha_cita">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Hora Cita<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="time" class="form-control" id="hora_cita" name="hora_cita">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Footer -->
            <footer class="footer">
                <?php require_once("../Footer/footer.php"); ?>
            </footer>
            <!-- End Footer -->
        </div>
        <!-- End #wrapper -->

        <!-- jQuery  -->
        <?php require_once("../Js/js.php"); ?>
        <script type="text/javascript" src="lista.js"></script>

    </body>
</html>
<?php
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>