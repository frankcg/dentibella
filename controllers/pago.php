<?php
    require_once("../config/conexion.php");
    require_once("../models/Pago.php");
    $Pago = new Pago();

    switch($_GET["op"]){
        case "listar":
            $datos=$Pago->listar_pago();
            $data=Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[]=$row["id_cita"];
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_cita"]));
                $sub_array[]=$row["cita"];
                if ($row["monto"]==NULL) {
                    $sub_array[]='----';
                }else {
                    $sub_array[]=$row["monto"];
                }
                if ($row["tipo"]==NULL) {
                    $sub_array[]='----';
                }else {
                    $sub_array[]=$row["tipo"];
                }

                if ($row["estado_pago"]==NULL) {
                    $sub_array[]='<span class="badge badge-danger">Pendiente</span>';
                }else {
                    if ($row["estado_pago"]==1) {
                        $sub_array[]='<span class="badge badge-primary">Pagado</span>';
                    }
                }

                if ($row["estado_pago"]==1) {
                    $sub_array[]='<span class="badge badge-primary">-------</span>';
                }else {
                    $sub_array[] = '<button type="button" onClick="pago('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-primary btn-icon"><div><i class="icon-check"></i></div></button>';
                }

                if ($row["estado_pago"]==1) {
                    $sub_array[]='<span class="badge badge-primary">-------</span>';
                }else {
                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-check"></i></div></button>';
                }

                
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        case "actualizar":
            $Pago->update_pago($_POST["id_cita"],$_POST["monto"],$_POST["tipo"]);
        break;
        case 'mostrar':
            $datos=$Pago->get_pago_x_id($_POST["id_cita"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_cita"] = $row["id_cita"];
                    $output["monto"] = $row["monto"];
                }
                echo json_encode($output);
            }
        break;

        case "pago":
            $Pago->actualizar_pago($_POST["id_cita"]);
        break;
    }
    
?>