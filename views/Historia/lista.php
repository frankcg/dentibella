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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Historia</a></li>
                                <li class="breadcrumb-item active">Listado</li>
                            </ol>
                            <h4 class="page-title">Listado Historias</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
        
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="his_table" class="table  table-striped">
                                                <thead>
                                                <tr>
                                                    <th data-priority="1"></th>
                                                    <th data-priority="1">Cita</th>
                                                    <th data-priority="1">Doctor</th>
                                                    <th data-priority="1">Paciente</th>
                                                    <th data-priority="1">Comentario</th>
                                                    <th data-priority="1">Diente</th>
                                                    <th data-priority="1">Archivo</th>
                                                    <th data-priority="1">Fecha Creación</th>
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
                            <h4 class="modal-title">Leyenda Diente</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-box">
            
                                        <div class="table-rep-plugin">
                                            <div class="table-responsive" data-pattern="priority-columns">
                                                <table id="odo_table" class="table  table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
                                                        <th data-priority="1"></th>
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
                            </div><!-- end row -->
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