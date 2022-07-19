<?php
    require_once("../config/conexion.php");
    require_once("../models/Seguimiento.php");
    $seguimiento = new Seguimiento();

    switch($_GET["op"]){
        case "listar":
            $datos=$seguimiento->listar_cita();
            $data=Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[]=$row["id_cita"];
                $sub_array[]=$row["doctor"];
                $sub_array[]=$row["paciente"];
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_cita"]));
                $sub_array[]=$row["hora_cita"];
                /*if ($row["sintoma_uno"]==0 or $row["sintoma_uno"]==NULL) {
                    $sub_array[]='<span class="badge badge-warning">No tiene</span>';
                }else {
                    $sub_array[]=$row["sintoma_uno"];
                }
                if ($row["sintoma_dos"]==0 or $row["sintoma_dos"]==NULL) {
                    $sub_array[]='<span class="badge badge-warning">No tiene</span>';
                }else {
                    $sub_array[]=$row["sintoma_dos"];
                }*/               
                if ($row["diagnostico"]=='' or $row["diagnostico"]==NULL) {
                    $sub_array[]='<span class="badge badge-warning">No tiene</span>';
                }else {
                    $sub_array[]=$row["diagnostico"];
                }
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_creacion"]));
                if ($row["estado_cita"]=="2") {
                    $sub_array[]='<span class="badge badge-primary">Registrado</span>';
                }else {
                    if ($row["estado_cita"]=="3") {
                        $sub_array[]='<span class="badge badge-warning">En Espera</span>';
                    }else {
                        if ($row["estado_cita"]=="4") {
                            $sub_array[]='<span class="badge badge-primary">En Atención</span>';
                        }else {
                            if ($row["estado_cita"]=="5") {
                                $sub_array[]='<span class="badge badge-success">Atendido</span>';
                            }else {
                                if ($row["estado_cita"]=="6") {
                                    $sub_array[]='<span class="badge badge-warning">Ausente</span>';
                                }
                            }

                        }
                    }
                }
                if ($row["estado_cita"]=="2") {
                    $sub_array[] = '<button type="button" onClick="espera('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="en_atencion('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-primary btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="atendido('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-success btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="ausente('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-minus"></i></div></button>';
                }else {
                    if ($row["estado_cita"]=="3") {
                        $sub_array[] = '<span class="badge badge-danger">-------</span>';
                    $sub_array[] = '<button type="button" onClick="en_atencion('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-primary btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="atendido('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-success btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="ausente('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-minus"></i></div></button>';
                    }else {
                        if ($row["estado_cita"]=="4") {
                            $sub_array[] = '<button type="button" onClick="espera('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<span class="badge badge-danger">-------</span>';
                    $sub_array[] = '<button type="button" onClick="atendido('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-success btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="ausente('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-minus"></i></div></button>';
                        }else {
                            if ($row["estado_cita"]=="5") {
                                $sub_array[] = '<button type="button" onClick="espera('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="en_atencion('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-primary btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<span class="badge badge-danger">-------</span>';
                    $sub_array[] = '<button type="button" onClick="ausente('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-minus"></i></div></button>';
                            }else {
                                if ($row["estado_cita"]=="6") {
                                    $sub_array[] = '<button type="button" onClick="espera('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="en_atencion('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-primary btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="atendido('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-success btn-icon"><div><i class="icon-check"></i></div></button>';
                    $sub_array[] = '<span class="badge badge-danger">-------</span>';
                                }
                            }

                        }
                    }
                }
                $sub_array[] = '<button type="button" onClick="espera('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-check"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="en_atencion('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-primary btn-icon"><div><i class="icon-check"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="atendido('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-success btn-icon"><div><i class="icon-check"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="ausente('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-minus"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        case "espera":
            $seguimiento ->espera_cita($_POST["id_cita"]);
        break;
        case "en_atencion":
            $seguimiento ->en_atencion_cita($_POST["id_cita"]);
        break;
        case "atendido":
            $seguimiento ->atendido_cita($_POST["id_cita"]);
        break;
        case "ausente":
            $seguimiento ->ausente_cita($_POST["id_cita"]);
        break;
    }
    
?>