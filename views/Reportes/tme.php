<?php
require_once("../../config/conexion.php");
if(isset($_SESSION["id_usuario"])){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once("../Head/head.php"); ?>
        <!-- endbuild -->
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Navigation Bar-->
            <header id="topnav">
                <?php require_once("../Header/header.php"); ?>
                <!-- end navbar-custom -->
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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Reportes</a></li>
                                <li class="breadcrumb-item active">Tiempo Medio De Espera</li>
                            </ol>
                            <h4 class="page-title">Tiempo Medio De Espera</h4>
                        </div>
                        <!-- End page title box -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Desde</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="desde" id="desde">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Hasta</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" name="hasta" id="hasta">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-8 offset-4">
                                <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="getReportTme()">
                                    Consultar
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="table-rep-plugin">
                                        <div class="table-responsive" data-pattern="priority-columns">
                                            <table id="tme_table" class="table  table-striped">
                                                <thead>
                                                <tr>
                                                    <th data-priority="3">Fecha Cita</th>
                                                    <th data-priority="1">Minutos Espera</th>
                                                    <th data-priority="3">Clientes Atendidos</th>
                                                    <th data-priority="1">TME</th>
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
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div> <!-- end container-fluid-->
                </div> <!-- end contant-->
            </div>
            <!-- End Page Content-->


            <!-- Footer -->
            <footer class="footer">
                <?php require_once("../Footer/footer.php"); ?>
            </footer>
            <!-- End Footer -->

        </div>
        <!-- End #wrapper -->

        <!-- jQuery  -->
        <?php require_once("../Js/js.php"); ?>
        <script type="text/javascript" src="reporteTme.js"></script>

    </body>
</html>
<?php
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>