<?php
    require_once("../config/conexion.php");
    require_once("../models/Usuario.php");
    $Usuario = new Usuario();

    switch($_GET["op"]){
        case "insert":
            $datos=$Usuario->get_validar_usuario($_POST["usuario"]);
            if (count($datos)>0) {
                echo'validado';
            }else {
                $Usuario ->insert_usuario($_POST["id_rol"],$_POST["nombre"],$_POST["apellidos"],$_POST["usuario"],$_POST["clave"]);
            }
        break;
        case "listar":
            $datos=$Usuario->listar_usuario();
            $data=Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[]=$row["id_usuario"];
                $sub_array[]=$row["nombre"];
                $sub_array[]=$row["apellidos"];
                $sub_array[]=$row["usuario"];
                if ($row["id_rol"]=="1") {
                    $sub_array[]='<span class="label label-indigo">Administrador</span>';
                }else {
                    $sub_array[]='<span class="label label-primary">Asistente</span>';
                }
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_creacion"]));
                $sub_array[] = '<button type="button" onClick="editar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-pencil"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_usuario"].');"  id="'.$row["id_usuario"].'" class="btn btn-outline-danger btn-icon"><div><i class="icon-trash"></i></div></button>';
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
            $Usuario ->delete_usuario($_POST["id_usuario"]);
        break;
        case "actualizar":
            $Usuario->update_usuario($_POST["id_usuario"],$_POST["nombre"],$_POST["apellidos"],$_POST["usuario"],$_POST["id_rol"],$_POST["clave"]);
        break;
        case 'mostrar':
            $datos=$Usuario->get_usuario_x_id($_POST["id_usuario"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_usuario"] = $row["id_usuario"];
                    $output["nombre"] = $row["nombre"];
                    $output["apellidos"] = $row["apellidos"];
                    $output["usuario"] = $row["usuario"];
                    $output["id_rol"] = $row["rol"];
                    $output["clave"] = $row["clave"];
                }
                echo json_encode($output);
            }
        break;
    }
    
?>