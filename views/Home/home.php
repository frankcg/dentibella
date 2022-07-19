<?php
require_once("../../config/conexion.php");
if(isset($_SESSION["id_usuario"])){
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once("../Head/head.php"); ?>
        <!-- endbuild -->
        <style>
            .btn-flotante {
                font-size: 16px; /* Cambiar el tamaño de la tipografia */
                text-transform: uppercase; /* Texto en mayusculas */
                font-weight: bold; /* Fuente en negrita o bold */
                color: #ffffff; /* Color del texto */
                border-radius: 5px; /* Borde del boton */
                letter-spacing: 2px; /* Espacio entre letras */
                background-color: #878894; /* Color de fondo */
                padding: 18px 30px; /* Relleno del boton */
                position: fixed;
                bottom: 40px;
                right: 40px;
                transition: all 300ms ease 0ms;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                z-index: 99;
                
                }
            .btn-flotante:hover {
                background-color: #2c2fa5; /* Color de fondo al pasar el cursor */
                box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.3);
                transform: translateY(-7px);
                }
            @media only screen and (max-width: 600px) {
                .btn-flotante {
                font-size: 14px;
                padding: 12px 20px;
                bottom: 20px;
                right: 20px;
                }
            }
        </style>
        <link rel="stylesheet" href="estilos.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                            <h4 class="page-title">Resumen</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-dark">Usuarios</div>
                                    <p class="m-b-0" id="usuarios"> </p>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
        
                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-primary">Pacientes</div>
                                    <p class="m-b-0" id="pacientes"></p>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
        
                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-success">Citas Atendidas</div>
                                    <p class="m-b-0" id="citas"></p>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-info">Citas Ausentes</div>
                                    <p class="m-b-0" id="ausentes"></p>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
        
                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-warning">Historias</div>
                                    <p class="m-b-0" id="historias"></p>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->

                            <div class="col-lg-4">
                                <div class="card-box ribbon-box">
                                    <div class="ribbon ribbon-danger">Doctores</div>
                                    <p class="m-b-0" id="doctores"></p>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                    </div> <!-- end container-fluid-->
                </div> <!-- end contant-->
                <!--ELIMINAR ICONO DEL CHATBOX
                    <button class="btn-flotante" data-toggle="modal" data-target="#exampleModal">
                    <img src="../../assets/images/chatbot.jpg" style="width:50px">
                </button>
                -->
            </div>
            <!-- End Page Content-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="wrapper">
                                <div class="title">Chat En Línea</div>
                                <div class="form">
                                    <div class="bot-inbox inbox">
                                        <div class="icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="msg-header">
                                            <p>Bienvenido <?php echo $_SESSION["nombres"] ?> a DentiBella!
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-lime" style="float: right;" id="send" value="Hola!!!">Hola!</button>
                                <button type="button" class="btn btn-lime" style="float: right;" id="envio" value="Como Estás?">Como Estás?</button>
                                <button type="button" class="btn btn-lime" style="float: right;" id="enviar" value="Todo bien!!">Todo bien!</button>
                                <div class="typing-field">
                                    <div class="input-data">
                                        <input type="text" id="data" required>
                                        <button id="send-btn">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="footer">
                <?php require_once("../Footer/footer.php"); ?>
            </footer>
            <!-- End Footer -->

        </div>
        <!-- End #wrapper -->
        <!-- jQuery  -->
        <?php require_once("../Js/js.php"); ?>
        <script type="text/javascript" src="home.js"></script>
        <script type="text/javascript" src="chatBot.js"></script>

    </body>
</html>
<?php
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>