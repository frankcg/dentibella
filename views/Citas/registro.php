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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Citas</a></li>
                                <li class="breadcrumb-item active">Registro</li>
                            </ol>
                            <h4 class="page-title">Registro Citas</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Registro Citas</h4>
        
                                    <!--<form role="form"  action="" method="POST" id="cita_form" name="cita_form" onchange='cambioOpciones();'>-->
                                    <form role="form"  action="" method="POST" id="cita_form" name="cita_form">
                                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Paciente<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <select class="form-control select2" id="id_paciente" name="id_paciente">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Doctor<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <select class="form-control select2" id="id_doctor" name="id_doctor">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Fecha Cita<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="date" required class="form-control" id="fecha_cita" name="fecha_cita">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Hora Cita<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="time" required class="form-control" id="hora_cita" name="hora_cita">
                                            </div>
                                            <button type="button" class="btn btn-icon btn-warning">
                                            <a href="#custom-modal" class="waves-effect" data-animation="sign" data-plugin="custommodal"
                                                data-overlaySpeed="100" data-overlayColor="#36404a"><i class="mdi mdi-calendar"></i></a>
                                            </button>
                                        </div>

                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Tipo de Persona<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" required class="form-control" id="persona" name="persona">
                                            </div>
                                        </div>                                        
                                        
                                        <div class="form-group row">
                                            <label for="hori-pass1" class="col-sm-4 col-form-label">Diágnostico<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" id="diagnostico" name="diagnostico" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="hori-pass1" class="col-sm-4 col-form-label">Tiempo Estimado<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="text" id="tiempo" name="tiempo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-8 offset-4">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Registrar
                                                </button>
                                                <button type="reset"
                                                        class="btn btn-light waves-effect m-l-5">
                                                    Limpiar
                                                </button>
                                                <button type="button" class="btn btn-light waves-effect m-l-5 hide">
                                                <a href="#modal-sintomas" class="waves-effect" data-animation="sign" data-plugin="custommodal"
                                                    data-overlaySpeed="100" data-overlayColor="#36404a">Sintomas</a>
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
            <div id="custom-modal" class="modal-demo">
                <button type="button" class="close" onclick="Custombox.modal.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="custom-modal-title">Lista de Citas</h4>
                <div class="custom-modal-text">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <table class="table mb-0" id="agendas_table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Paciente</th>
                                        <th>Doctor</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Estimado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                </table>
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>

            <div id="modal-sintomas" class="modal-demo">
                <button type="button" class="close" id="modal-sintoma-close" onclick="Custombox.modal.close();">
                    <span>&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="custom-modal-title">Sintomas</h4>
                <div class="custom-modal-text">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s1">
                                            <label for="inputEmail3" class="col-form-label">placa y calculo dental</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s2">
                                            <label for="inputEmail3" class="col-form-label">retraccion gingivil</label>
                                        </div>
                                        
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s3">
                                            <label for="inputEmail3" class="col-form-label">perdida de hueso</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">    
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s4">
                                            <label for="inputEmail3" class="col-form-label">sangrado</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s5">
                                            <label for="inputEmail3" class="col-form-label">movilidad dental</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s6">
                                            <label for="inputEmail3" class="col-form-label">mal aliento</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s7">
                                            <label for="inputEmail3" class="col-form-label">sangrado de la encía</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s8">
                                            <label for="inputEmail3" class="col-form-label">inflamacion de encias</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s9">
                                            <label for="inputEmail3" class="col-form-label">encía rojas</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s10">
                                            <label for="inputEmail3" class="col-form-label">destruccion coronaris</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s11">
                                            <label for="inputEmail3" class="col-form-label">dolor espontaneo</label>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="checkbox" name="sintomacheck[]" value="s12">
                                            <label for="inputEmail3" class="col-form-label">movilidad permanente</label>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-12">
                                <button type="button" id="btn-diagnosticar" class="btn btn-primary waves-effect waves-light">
                                    Diagnosticar
                                </button>
                            </div>
                        </div>
                    </div>
            <!-- Footer 
            <footer class="footer">
                <?php require_once("../Footer/footer.php"); ?>
            </footer>
             End Footer -->

        </div>
        <!-- End #wrapper -->
        

        <!-- jQuery  -->
        <?php require_once("../Js/js.php"); ?>
        <script type="text/javascript" src="registro.js"></script>
        <script>
            function seleccion(value){
                var select=document.getElementById("sintoma_dos");

                var op=select.getElementsByTagName("option");

                select.options[0].selected=true;

                for (var i = 1; i < op.length; i++) {
        
                    if(op[i].value == value)
                    {
                        op[i].style.display="none";
                    }else{
                        op[i].style.display="block";
                    }
                }
            }
        </script>
        <script>
            function cambioOpciones(){
                /*if (document.getElementById('sintoma_uno').value == 1 && document.getElementById('sintoma_dos').value == 2) {   
                document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 2 && document.getElementById('sintoma_dos').value == 1) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 1 && document.getElementById('sintoma_dos').value == 3) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 3 && document.getElementById('sintoma_dos').value == 1) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 1 && document.getElementById('sintoma_dos').value == 4) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 4 && document.getElementById('sintoma_dos').value == 1) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 1 && document.getElementById('sintoma_dos').value == 5) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 5 && document.getElementById('sintoma_dos').value == 1) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 1 && document.getElementById('sintoma_dos').value == 6) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 6 && document.getElementById('sintoma_dos').value == 1) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 2 && document.getElementById('sintoma_dos').value == 3) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 3 && document.getElementById('sintoma_dos').value == 2) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 2 && document.getElementById('sintoma_dos').value == 4) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 4 && document.getElementById('sintoma_dos').value == 2) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 2 && document.getElementById('sintoma_dos').value == 5) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 5 && document.getElementById('sintoma_dos').value == 2) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 2 && document.getElementById('sintoma_dos').value == 6) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 6 && document.getElementById('sintoma_dos').value == 2) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 3 && document.getElementById('sintoma_dos').value == 4) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 4 && document.getElementById('sintoma_dos').value == 3) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 3 && document.getElementById('sintoma_dos').value == 5) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 5 && document.getElementById('sintoma_dos').value == 3) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 3 && document.getElementById('sintoma_dos').value == 6) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 6 && document.getElementById('sintoma_dos').value == 3) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 4 && document.getElementById('sintoma_dos').value == 5) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 5 && document.getElementById('sintoma_dos').value == 4) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 4 && document.getElementById('sintoma_dos').value == 6) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 6 && document.getElementById('sintoma_dos').value == 4) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 5 && document.getElementById('sintoma_dos').value == 6) {   
                    document.getElementById('diagnostico').value = 'periodontitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 6 && document.getElementById('sintoma_dos').value == 5) {   
                        document.getElementById('diagnostico').value = 'periodontitis';
                    }
                }


                if (document.getElementById('sintoma_uno').value == 6 && document.getElementById('sintoma_dos').value == 7) {   
                    document.getElementById('diagnostico').value = 'gingivitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 7 && document.getElementById('sintoma_dos').value == 6) {   
                        document.getElementById('diagnostico').value = 'gingivitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 6 && document.getElementById('sintoma_dos').value == 8) {   
                    document.getElementById('diagnostico').value = 'gingivitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 8 && document.getElementById('sintoma_dos').value == 6) {   
                        document.getElementById('diagnostico').value = 'gingivitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 6 && document.getElementById('sintoma_dos').value == 9) {   
                    document.getElementById('diagnostico').value = 'gingivitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 9 && document.getElementById('sintoma_dos').value == 6) {   
                        document.getElementById('diagnostico').value = 'gingivitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 7 && document.getElementById('sintoma_dos').value == 8) {   
                    document.getElementById('diagnostico').value = 'gingivitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 8 && document.getElementById('sintoma_dos').value == 7) {   
                        document.getElementById('diagnostico').value = 'gingivitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 7 && document.getElementById('sintoma_dos').value == 9) {   
                    document.getElementById('diagnostico').value = 'gingivitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 9 && document.getElementById('sintoma_dos').value == 7) {   
                        document.getElementById('diagnostico').value = 'gingivitis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 8 && document.getElementById('sintoma_dos').value == 9) {   
                    document.getElementById('diagnostico').value = 'gingivitis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 9 && document.getElementById('sintoma_dos').value == 8) {   
                        document.getElementById('diagnostico').value = 'gingivitis';
                    }
                }


                if (document.getElementById('sintoma_uno').value == 10 && document.getElementById('sintoma_dos').value == 11) {   
                    document.getElementById('diagnostico').value = 'necrosis dental';
                }else{
                    if (document.getElementById('sintoma_uno').value == 11 && document.getElementById('sintoma_dos').value == 10) {   
                        document.getElementById('diagnostico').value = 'necrosis dental';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 10 && document.getElementById('sintoma_dos').value == 12) {   
                    document.getElementById('diagnostico').value = 'necrosis dental';
                }else{
                    if (document.getElementById('sintoma_uno').value == 12 && document.getElementById('sintoma_dos').value == 10) {   
                        document.getElementById('diagnostico').value = 'necrosis dental';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 10 && document.getElementById('sintoma_dos').value == 13) {   
                    document.getElementById('diagnostico').value = 'necrosis dental';
                }else{
                    if (document.getElementById('sintoma_uno').value == 13 && document.getElementById('sintoma_dos').value == 10) {   
                        document.getElementById('diagnostico').value = 'necrosis dental';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 11 && document.getElementById('sintoma_dos').value == 12) {   
                    document.getElementById('diagnostico').value = 'necrosis dental';
                }else{
                    if (document.getElementById('sintoma_uno').value == 12 && document.getElementById('sintoma_dos').value == 11) {   
                        document.getElementById('diagnostico').value = 'necrosis dental';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 11 && document.getElementById('sintoma_dos').value == 13) {   
                    document.getElementById('diagnostico').value = 'necrosis dental';
                }else{
                    if (document.getElementById('sintoma_uno').value == 13 && document.getElementById('sintoma_dos').value == 11) {   
                        document.getElementById('diagnostico').value = 'necrosis dental';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 12 && document.getElementById('sintoma_dos').value == 13) {   
                    document.getElementById('diagnostico').value = 'necrosis dental';
                }else{
                    if (document.getElementById('sintoma_uno').value == 13 && document.getElementById('sintoma_dos').value == 12) {   
                        document.getElementById('diagnostico').value = 'necrosis dental';
                    }
                }


                if (document.getElementById('sintoma_uno').value == 14 && document.getElementById('sintoma_dos').value == 15) {   
                    document.getElementById('diagnostico').value = 'paricoronaritis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 15 && document.getElementById('sintoma_dos').value == 14) {   
                        document.getElementById('diagnostico').value = 'paricoronaritis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 14 && document.getElementById('sintoma_dos').value == 16) {   
                    document.getElementById('diagnostico').value = 'paricoronaritis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 16 && document.getElementById('sintoma_dos').value == 14) {   
                        document.getElementById('diagnostico').value = 'paricoronaritis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 14 && document.getElementById('sintoma_dos').value == 17) {   
                    document.getElementById('diagnostico').value = 'paricoronaritis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 17 && document.getElementById('sintoma_dos').value == 14) {   
                        document.getElementById('diagnostico').value = 'paricoronaritis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 15 && document.getElementById('sintoma_dos').value == 16) {   
                    document.getElementById('diagnostico').value = 'paricoronaritis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 16 && document.getElementById('sintoma_dos').value == 15) {   
                        document.getElementById('diagnostico').value = 'paricoronaritis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 15 && document.getElementById('sintoma_dos').value == 17) {   
                    document.getElementById('diagnostico').value = 'paricoronaritis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 17 && document.getElementById('sintoma_dos').value == 15) {   
                        document.getElementById('diagnostico').value = 'paricoronaritis';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 16 && document.getElementById('sintoma_dos').value == 17) {   
                    document.getElementById('diagnostico').value = 'paricoronaritis';
                }else{
                    if (document.getElementById('sintoma_uno').value == 17 && document.getElementById('sintoma_dos').value == 16) {   
                        document.getElementById('diagnostico').value = 'paricoronaritis';
                    }
                }


                if (document.getElementById('sintoma_uno').value == 18 && document.getElementById('sintoma_dos').value == 19) {   
                    document.getElementById('diagnostico').value = 'pulpitis irreversible';
                }else{
                    if (document.getElementById('sintoma_uno').value == 19 && document.getElementById('sintoma_dos').value == 18) {   
                        document.getElementById('diagnostico').value = 'pulpitis irreversible';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 18 && document.getElementById('sintoma_dos').value == 20) {   
                    document.getElementById('diagnostico').value = 'pulpitis irreversible';
                }else{
                    if (document.getElementById('sintoma_uno').value == 20 && document.getElementById('sintoma_dos').value == 18) {   
                        document.getElementById('diagnostico').value = 'pulpitis irreversible';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 18 && document.getElementById('sintoma_dos').value == 21) {   
                    document.getElementById('diagnostico').value = 'pulpitis irreversible';
                }else{
                    if (document.getElementById('sintoma_uno').value == 21 && document.getElementById('sintoma_dos').value == 18) {   
                        document.getElementById('diagnostico').value = 'pulpitis irreversible';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 19 && document.getElementById('sintoma_dos').value == 20) {   
                    document.getElementById('diagnostico').value = 'pulpitis irreversible';
                }else{
                    if (document.getElementById('sintoma_uno').value == 20 && document.getElementById('sintoma_dos').value == 19) {   
                        document.getElementById('diagnostico').value = 'pulpitis irreversible';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 19 && document.getElementById('sintoma_dos').value == 21) {   
                    document.getElementById('diagnostico').value = 'pulpitis irreversible';
                }else{
                    if (document.getElementById('sintoma_uno').value == 21 && document.getElementById('sintoma_dos').value == 19) {   
                        document.getElementById('diagnostico').value = 'pulpitis irreversible';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 20 && document.getElementById('sintoma_dos').value == 21) {   
                    document.getElementById('diagnostico').value = 'pulpitis irreversible';
                }else{
                    if (document.getElementById('sintoma_uno').value == 21 && document.getElementById('sintoma_dos').value == 20) {   
                        document.getElementById('diagnostico').value = 'pulpitis irreversible';
                    }
                }


                if (document.getElementById('sintoma_uno').value == 22 && document.getElementById('sintoma_dos').value == 23) {   
                    document.getElementById('diagnostico').value = 'caries dental esmalte';
                }else{
                    if (document.getElementById('sintoma_uno').value == 23 && document.getElementById('sintoma_dos').value == 22) {   
                        document.getElementById('diagnostico').value = 'caries dental esmalte';
                    }
                }

                if (document.getElementById('sintoma_uno').value == 22 && document.getElementById('sintoma_dos').value == 24) {   
                    document.getElementById('diagnostico').value = 'caries dental dertina';
                }else{
                    if (document.getElementById('sintoma_uno').value == 24 && document.getElementById('sintoma_dos').value == 22) {   
                        document.getElementById('diagnostico').value = 'caries dental dertina';
                    }
                }
                if (document.getElementById('sintoma_uno').value == 23 && document.getElementById('sintoma_dos').value == 24) {   
                    document.getElementById('diagnostico').value = 'caries dental dertina';
                }else{
                    if (document.getElementById('sintoma_uno').value == 24 && document.getElementById('sintoma_dos').value == 23) {   
                        document.getElementById('diagnostico').value = 'caries dental dertina';
                    }
                }


                if (document.getElementById('sintoma_uno').value == 25 && document.getElementById('sintoma_dos').value == 29) {   
                    document.getElementById('diagnostico').value = 'edentilo total';
                }else{
                    if (document.getElementById('sintoma_uno').value == 29 && document.getElementById('sintoma_dos').value == 25) {   
                        document.getElementById('diagnostico').value = 'edentilo total';
                    }
                }


                if (document.getElementById('sintoma_uno').value == 26 && document.getElementById('sintoma_dos').value == 29) {   
                    document.getElementById('diagnostico').value = 'edentilo parcial';
                }else{
                    if (document.getElementById('sintoma_uno').value == 29 && document.getElementById('sintoma_dos').value == 26) {   
                        document.getElementById('diagnostico').value = 'edentilo parcial';
                    }
                }

                if (document.getElementById('sintoma_uno').value == 27 && document.getElementById('sintoma_dos').value == 28) {   
                    document.getElementById('diagnostico').value = 'diente con edodoncia';
                }else{
                    if (document.getElementById('sintoma_uno').value == 28 && document.getElementById('sintoma_dos').value == 27) {   
                        document.getElementById('diagnostico').value = 'diente con edodoncia';
                    }
                }

                if (document.getElementById('sintoma_uno').value == '#' || document.getElementById('sintoma_dos').value == '#') {
                    document.getElementById('diagnostico').value = '';
                }*/

                //tiempo estimado
                if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'periodontitis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'periodontitis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'periodontitis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'periodontitis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'periodontitis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'periodontitis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                
                if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'necrosis dental') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'necrosis dental') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'necrosis dental') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }
                if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'necrosis dental') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }
                if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'necrosis dental') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }
                if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'necrosis dental') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }

                if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'pulpitis irreversible') {
                    document.getElementById('tiempo').value = '60 min';
                }

                if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'paricoronaritis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'paricoronaritis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'paricoronaritis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'paricoronaritis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'paricoronaritis') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'paricoronaritis') {
                    document.getElementById('tiempo').value = '30 min';
                }

                if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
                    document.getElementById('tiempo').value = '60 min';
                }
                if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'diente con edodoncia') {
                    document.getElementById('tiempo').value = '60 min';
                }

                if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'caries dental dertina') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }
                if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'caries dental dertina') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }
                if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'caries dental dertina') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }
                if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'caries dental dertina') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }
                if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'caries dental dertina') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }
                if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'caries dental dertina') {
                    document.getElementById('tiempo').value = '30 min o 60 min';
                }

                if (document.getElementById('persona').value == 'Bebé' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Niño' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adolescente' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adulto Joven' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Adulto' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
                    document.getElementById('tiempo').value = '30 min';
                }
                if (document.getElementById('persona').value == 'Tercera Edad' && document.getElementById('diagnostico').value == 'caries dental esmalte') {
                    document.getElementById('tiempo').value = '30 min';
                }
            }
                
        </script>

    </body>
</html>
<?php
	}else{
		header("Location:".Conectar::ruta()."index.php");
	}
?>