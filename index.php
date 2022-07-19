<?php

	require_once ("config/conexion.php");
	if(isset($_POST["ingresar"]) and $_POST["ingresar"]=="si"){
		require_once("models/Usuario.php");
		$usuario = new Usuario();
		$usuario->login();
	}
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DentiBella</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/logoDenti.jpeg">

        <!-- Icons css -->
        <link href="assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/dripicons/webfont/webfont.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <!-- build:css -->
        <link href="assets/css/app.css" rel="stylesheet" type="text/css" />
        <!-- endbuild -->

        <style>
            #particles-js{
                height:100vh;
                width:100%;
                position: fixed;
                z-index: -1;
            }
        </style>

    </head>

    <body class="bg-account-pages">
        <div id=particles-js></div>
        <!-- Login -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="wrapper-page">
                            <div class="account-pages">
                                <div class="account-box">

                                    <!-- Logo box-->
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <span><img src="assets/images/logoDenti.jpg" alt="" height="100"></span>
                                        </h2>
                                        <b id="lbltitulo">Acceso Administrador</b>
                                    </div>
                                    <?php
                                        if (isset($_GET["m"])){
                                            switch($_GET["m"]){
                                                case "1";
                                                    ?>
                                                        <div class="alert alert-danger fade show">
                                                        <span class="close" data-dismiss="alert">×</span>
                                                        <strong>El Usuario y/o Contraseña son incorrectos.</strong>
                                                        </div>
                                                    <?php
                                                break;

                                                case "2";
                                                    ?>
                                                        <div class="alert alert-danger fade show">
                                                        <span class="close" data-dismiss="alert">×</span>
                                                        <strong>Los campos están vacíos.</strong>
                                                        </div>
                                                    <?php
                                                break;
                                            }
                                        }
                                    ?>
                                    <div class="account-content">
                                        <form action="" method="POST" id="login_form">
                                            <input type="hidden" id="rol" name="rol" value="1">
                                            <div class="form-group mb-3">
                                                <label for="emailaddress" class="font-weight-medium">Usuario</label>
                                                <input class="form-control" type="text" id="usuario" name="usuario" required="" autocomplete="off" placeholder="Ingrese su Usuario">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="password" class="font-weight-medium">Password</label>
                                                <input class="form-control" type="password" id="clave" name="clave" required="" autocomplete="off" placeholder="Ingrese su Contraseña">
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12">
                                                    <a href="#" id="btnasistente">Acceso Asistente</a>
                                                </div>
                                            </div>
                                            <input type="hidden" name="ingresar" class="form-control form-control-lg" value="si">
                                            <div class="form-group row text-center">
                                                <div class="col-12">
                                                    <button class="btn btn-block btn-success waves-effect waves-light" type="submit">Sign In</button>
                                                </div>
                                            </div>
                                        </form> <!-- end form -->
                                        <!-- end row-->
                                    </div> <!-- end account-content -->

                                </div> <!-- end account-box -->
                            </div>
                            <!-- end account-page-->
                        </div>
                        <!-- end wrapper-page -->

                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <!-- END HOME -->    


        <!-- jQuery  -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script type="text/javascript" src="app.js"></script>
        
        <script type="text/javascript" src="index.js"></script>

    </body>
</html>
