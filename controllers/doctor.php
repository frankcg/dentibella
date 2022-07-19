<?php
    require_once("../config/conexion.php");
    require_once("../models/Doctor.php");
    $Doctor = new Doctor();

    switch($_GET["op"]){
        case "insert":
            $Doctor ->insert_doctor($_POST["id_usuario"],$_POST["nombres"],$_POST["apellidos"],$_POST["especialidad"],$_POST["fecha_nacimiento"],$_POST["dni"]);
        break;
        case "listar":
            $datos=$Doctor->listar_doctor();
            $data=Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[]=$row["id_doctor"];
                $sub_array[]=$row["nombres"];
                $sub_array[]=$row["apellidos"];
                $sub_array[]=$row["dni"];
                $sub_array[]=$row["especialidad"];
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_creacion"]));
                $sub_array[] = '<button type="button" onClick="editar('.$row["id_doctor"].');"  id="'.$row["id_doctor"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-pencil"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_doctor"].');"  id="'.$row["id_doctor"].'" class="btn btn-outline-danger btn-icon"><div><i class="icon-trash"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        case "eliminar":
            $Doctor ->delete_doctor($_POST["id_doctor"]);
        break;
        case "actualizar":
            $Doctor->update_doctor($_POST["id_doctor"],$_POST["nombres"],$_POST["apellidos"],$_POST["especialidad"]);
        break;
        case 'mostrar':
            $datos=$Doctor->get_doctor_x_id($_POST["id_doctor"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_doctor"] = $row["id_doctor"];
                    $output["nombres"] = $row["nombres"];
                    $output["apellidos"] = $row["apellidos"];
                    $output["especialidad"] = $row["especialidad"];
                }
                echo json_encode($output);
            }
        break;
    }
    
?>