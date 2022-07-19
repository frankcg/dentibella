<?php

require_once("../config/conexion.php");
require_once("../models/Reporte.php");
$reporte = new Reporte();

switch($_GET["op"]){
        case "reporteInc":
        $fechaIni = $_POST["fechaIni"];
        $fechaFin = $_POST["fechaFin"];
        $results = $reporte->reporte_inc($fechaIni, $fechaFin);
        echo json_encode($results);
        break;

        case "reporteTme":
            $fechaIni = $_POST["fechaIni"];
            $fechaFin = $_POST["fechaFin"];
            $results = $reporte->reporte_tme($fechaIni, $fechaFin);
            echo json_encode($results);
        break;
}
?>