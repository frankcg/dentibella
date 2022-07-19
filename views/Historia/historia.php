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
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Historia</a></li>
                                <li class="breadcrumb-item active">Registro</li>
                            </ol>
                            <h4 class="page-title">Registro Historia</h4>
                        </div>
                        <!-- End page title box -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Registro Historia</h4>
        
                                    <form role="form"  action="" method="POST" id="historia_form" name="historia_form" onclick='calcular()'>
                                        <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION["id_usuario"] ?>">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Cita<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <select id="id_cita" name="id_cita" class="form-control select2" required>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Archivo<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="file" required class="form-control" id="archivo" name="archivo">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Comentario<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <textarea name="comentario" id="comentario" autocomplete="off" class="form-control" rows="5" style="resize: none;"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-4 col-form-label">Odontograma<span class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <img src="../../assets/images/Odontograma.png" alt="">
                                                <input type="number" class="form-control" id="diente" name="diente" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="inputEmail3" class=" col-form-label">Leyenda<span class="text-danger">*</span></label>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="header-title mt-3 mt-sm-0">Buen Estado</h4>
                                                <div class="mt-3">
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check1" name="check1" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Diente Ausente</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check2" name="check2" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Corona en buen estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check3" name="check3" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Obturación en buen estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check4" name="check4" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Sellado de fosas y fisuras en buen estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check5" name="check5" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Prótesis parcial fija en buen estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check6" name="check6" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Presencia de aparato de ortodoncia</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
                                            <div class="col-md-4">
                                                <h4 class="header-title mt-3 mt-sm-0">Mal Estado</h4>
                                                <div class="mt-3">
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check7" name="check7" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Diente indicado a extracción</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check8" name="check8" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Corona en mal estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check9" name="check9" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Obturación en mal estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check10" name="check10" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Sellado de fosas y fisuras en mal estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check11" name="check11" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Prótesis parcial fija en mal estado</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check12" name="check12" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Fractura de corona dental</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-7">
                                                            <input type="checkbox" id="check13" name="check13" value="0">
                                                            <label for="inputEmail3" class="col-form-label">Caries dental (se marca la superficie afectada)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end col -->
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
        <script type="text/javascript">
            function calcular(){
                if (document.getElementById('check1').checked==true){
                    document.getElementById('check1').value='Diente Ausente';
                }else{
                    document.getElementById('check1').value=0;
                }
                if (document.getElementById('check2').checked==true){
                    document.getElementById('check2').value='Corona en buen estado';
                }else{
                    document.getElementById('check2').value=0;
                } 
                if (document.getElementById('check3').checked==true){
                    document.getElementById('check3').value='Obturación en buen estado';
                }else{
                    document.getElementById('check3').value=0;
                }
                if (document.getElementById('check4').checked==true){
                    document.getElementById('check4').value='Sellado de fosas y fisuras en buen estado';
                }else{
                    document.getElementById('check4').value=0;
                }
                if (document.getElementById('check5').checked==true){
                    document.getElementById('check5').value='Prótesis parcial fija en buen estado';
                }else{
                    document.getElementById('check5').value=0;
                }
                if (document.getElementById('check6').checked==true){
                    document.getElementById('check6').value='Presencia de aparato de ortodoncia';
                }else{
                    document.getElementById('check6').value=0;
                }
                if (document.getElementById('check7').checked==true){
                    document.getElementById('check7').value='Diente indicado a extracción';
                }else{
                    document.getElementById('check7').value=0;
                }
                if (document.getElementById('check8').checked==true){
                    document.getElementById('check8').value='Corona en mal estado';
                }else{
                    document.getElementById('check8').value=0;
                }
                if (document.getElementById('check9').checked==true){
                    document.getElementById('check9').value='Obturación en mal estado';
                }else{
                    document.getElementById('check9').value=0;
                }
                if (document.getElementById('check10').checked==true){
                    document.getElementById('check10').value='Sellado de fosas y fisuras en mal estado';
                }else{
                    document.getElementById('check10').value=0;
                }
                if (document.getElementById('check11').checked==true){
                    document.getElementById('check11').value='Prótesis parcial fija en mal estado';
                }else{
                    document.getElementById('check11').value=0;
                }
                if (document.getElementById('check12').checked==true){
                    document.getElementById('check12').value='Fractura de corona dental';
                }else{
                    document.getElementById('check12').value=0;
                }
                if (document.getElementById('check13').checked==true){
                    document.getElementById('check13').value='Caries dental (se marca la superficie afectada)';
                }else{
                    document.getElementById('check13').value=0;
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