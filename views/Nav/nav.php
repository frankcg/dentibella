<?php
if ($_SESSION["rol"]==1) {
?>
<div class="slimscroll-menu">

    <!--- Sidemenu -->
    <div id="sidebar-menu">

        <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navegación</li>

            <li>
                <a href="javascript: void(0);"><i class="mdi mdi-account"></i> <span> Usuarios </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="../Usuarios/lista.php">Listado</a></li>
                    <li><a href="../Usuarios/registro.php">Registro</a></li>  
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="mdi mdi-worker"></i><span> Doctor </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="../Doctor/lista.php">Listado</a></li>
                    <li><a href="../Doctor/registro.php">Registro</a></li>   
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="mdi mdi-account-multiple-plus"></i><span> Pacientes </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="../Pacientes/lista.php">Listado</a></li>
                    <li><a href="../Pacientes/registro.php">Registro</a></li>   
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="mdi mdi-content-paste"></i><span> Citas </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="../Citas/lista.php">Listado</a></li>
                    <li><a href="../Citas/registro.php">Registro</a></li>   
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="mdi mdi-seat-recline-extra"></i><span> Seguimiento </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="../Seguimiento/lista.php">Listado</a></li> 
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="mdi mdi-clipboard-pulse"></i><span> Historia Clinica </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="../Historia/historia.php">Registro</a></li>
                    <li><a href="../Historia/lista.php">Lista</a></li>   
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="mdi mdi-paypal"></i><span> Pagos </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="../Pago/lista.php">Lista</a></li>   
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);"><i class="mdi mdi-chart-bar"></i><span> Reportes </span> <span class="menu-arrow"></span></a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="../Reportes/inc.php">Incorporación De Nuevos Clientes</a></li>
                    <li><a href="../Reportes/tme.php">Tiempo Medio De Espera</a></li>   
                </ul>
            </li>
        </ul>

    </div>
    <!-- Sidebar -->

    <div class="clearfix"></div>

</div>

<?php
}else {
?>
<div class="slimscroll-menu">

<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <li class="menu-title">Navegación</li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-account-multiple-plus"></i><span> Pacientes </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="../Pacientes/lista.php">Listado</a></li>
                <li><a href="../Pacientes/registro.php">Registro</a></li>   
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-content-paste"></i><span> Citas </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="../Citas/lista.php">Listado</a></li>
                <li><a href="../Citas/registro.php">Registro</a></li>   
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-seat-recline-extra"></i><span> Seguimiento </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="../Seguimiento/lista.php">Listado</a></li> 
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-clipboard-pulse"></i><span> Historia Clinica </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="../Historia/historia.php">Registro</a></li>
                <li><a href="../Historia/lista.php">Lista</a></li>   
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-paypal"></i><span> Pagos </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="../Pago/lista.php">Lista</a></li>   
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="mdi mdi-chart-bar"></i><span> Reportes </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="../Reportes/inc.php">Incorporación De Nuevos Clientes</a></li>
                <li><a href="../Reportes/tme.php">Tiempo Medio De Espera</a></li>   
            </ul>
        </li>
    </ul>

</div>
<!-- Sidebar -->

<div class="clearfix"></div>

</div>


<?php
}
?>