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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Usuario</a></li>
                                <li class="breadcrumb-item active">Registro</li>
                            </ol>
                            <h4 class="page-title">Registro Usuario</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Registro Usuario</h4>
        
                                    <form role="form"  action="" method="POST" id="usuario_form" name="usuario_form">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Nombre<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Apellidos<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" required class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Usuario<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" required class="form-control" id="usuario" name="usuario" placeholder="Usuario" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hori-pass1" class="col-sm-4 col-form-label">Password<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="password" placeholder="Password" id="clave" name="clave" required class="form-control" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Rol<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <select id="id_rol" name="id_rol" class="form-control" required>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Asistente</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-8 offset-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Registrar
                                                </button>
                                                <button type="reset"
                                                        class="btn btn-light waves-effect m-l-5">
                                                    Cancelar
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- end card-box -->
        
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->      

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
        <script type="text/javascript" src="registro.js"></script>

    </body>
</html>
<?php
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>