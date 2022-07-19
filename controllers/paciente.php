<?php
    require_once("../config/conexion.php");
    require_once("../models/Paciente.php");
    $Paciente = new Paciente();

    switch($_GET["op"]){
        case "insert":
            $datos=$Paciente->get_validar_paciente($_POST["dni"]);
            if (count($datos)>0) {
                echo'validado';
            }else {
                $Paciente ->insert_paciente($_POST["id_usuario"],$_POST["nombres"],$_POST["apellidos"],$_POST["dni"],$_POST["telefono"],$_POST["direccion"],
                                        $_POST["fecha_nacimiento"],$_POST["enfermedad"],$_POST["persona"]);
            }
        break;
        case "listar":
            $datos=$Paciente->listar_paciente();
            $data=Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[]=$row["id_paciente"];
                $sub_array[]=$row["nombres"];
                $sub_array[]=$row["apellidos"];
                $sub_array[]=$row["dni"];
                $sub_array[]=$row["telefono"];
                $sub_array[]=$row["direccion"];
                if ($row["enfermedad"]==NULL or $row["enfermedad"]=='0') {
                    $sub_array[]='<span class="badge badge-warning">NO TIENE</span>';
                }else {
                    $sub_array[]=$row["enfermedad"];
                }
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_creacion"]));
                $sub_array[] = '<button type="button" onClick="editar('.$row["id_paciente"].');"  id="'.$row["id_paciente"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-pencil"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_paciente"].');"  id="'.$row["id_paciente"].'" class="btn btn-outline-danger btn-icon"><div><i class="icon-trash"></i></div></button>';
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
            $Paciente ->delete_paciente($_POST["id_paciente"]);
        break;
        case "actualizar":
            $Paciente->update_paciente($_POST["id_paciente"],$_POST["nombres"],$_POST["apellidos"],$_POST["dni"],$_POST["telefono"],$_POST["direccion"]);
        break;
        case 'mostrar':
            $datos=$Paciente->get_paciente_x_id($_POST["id_paciente"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_paciente"] = $row["id_paciente"];
                    $output["nombres"] = $row["nombres"];
                    $output["apellidos"] = $row["apellidos"];
                    $output["dni"] = $row["dni"];
                    $output["telefono"] = $row["telefono"];
                    $output["direccion"] = $row["direccion"];
                }
                echo json_encode($output);
            }
        break;
    }
    
?>