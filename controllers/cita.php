<?php
    require_once("../config/conexion.php");
    require_once("../models/Cita.php");
    $cita = new Cita();

    switch($_GET["op"]){
        case "swiprolog":
            $sintomas = $_POST["sintomas"];
            $join_sintomas =  '['.$sintomas.']';
            $output = `swipl -s seic.pl -g "test($join_sintomas)." -t halt.`;
            echo $output;
        break;
        case "insert":
            /*$arr_sintomas = ["s1","s4"];
            $join_sintomas =  '['.join($arr_sintomas,',').']';
            echo $join_sintomas;
            $output = `swipl -s seic.pl -g "test($join_sintomas)." -t halt.`;
            echo $output;
            exit();*/

            $fecha = $_POST["fecha_cita"];
            $hora = $_POST["hora_cita"];
            $enviar= $fecha.' '.$hora.':00';
            //echo $enviar;
            $datos=$cita->get_validar_hora_cita($enviar);
            if (count($datos)>0) {
                echo'validado';
            } else {
                //$cita ->insert_cita($_POST["id_usuario"],$_POST["id_paciente"],$_POST["id_doctor"],$_POST["fecha_cita"],$_POST["hora_cita"],$_POST["sintoma_uno"],$_POST["sintoma_dos"],$_POST["diagnostico"],$_POST["tiempo"]);
                $cita ->insert_cita($_POST["id_usuario"],$_POST["id_paciente"],$_POST["id_doctor"],$_POST["fecha_cita"],$_POST["hora_cita"],"","",$_POST["diagnostico"],$_POST["tiempo"]);
            }
            
        break;
        case "listar":
            $datos=$cita->listar_cita();
            $data=Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[]=$row["id_cita"];
                $sub_array[]=$row["doctor"];
                $sub_array[]=$row["paciente"];
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_cita"]));
                $sub_array[]=$row["hora_cita"];
                /*if ($row["sintoma_uno"]==NULL or $row["sintoma_uno"]==0)  {
                    $sub_array[]='<span class="badge badge-warning">---------------------------</span>';
                }else {
                    if ($row["sintoma_uno"]==1) {
                        $sub_array[]='<span class="badge badge-primary">placa y calculo dental</span>';
                    }else {
                        if ($row["sintoma_uno"]==2) {
                            $sub_array[]='<span class="badge badge-primary">retraccion gingivil</span>';
                        }else {
                            if ($row["sintoma_uno"]==3) {
                                $sub_array[]='<span class="badge badge-primary">perdida de hueso</span>';
                            }else {
                                if ($row["sintoma_uno"]==4) {
                                    $sub_array[]='<span class="badge badge-primary">sangrado</span>';
                                }else {
                                    if ($row["sintoma_uno"]==5) {
                                        $sub_array[]='<span class="badge badge-primary">movilidad dental</span>';
                                    }else {
                                        if ($row["sintoma_uno"]==6) {
                                            $sub_array[]='<span class="badge badge-primary">mal aliento</span>';
                                        }else {
                                            if ($row["sintoma_uno"]==7) {
                                                $sub_array[]='<span class="badge badge-primary">sangrado de la encía</span>';
                                            }else {
                                                if ($row["sintoma_uno"]==8) {
                                                    $sub_array[]='<span class="badge badge-primary">inflamacion de encias</span>';
                                                }else {
                                                    if ($row["sintoma_uno"]==9) {
                                                        $sub_array[]='<span class="badge badge-primary">encía rojas</span>';
                                                    }else {
                                                        if ($row["sintoma_uno"]==10) {
                                                            $sub_array[]='<span class="badge badge-primary">destruccion coronaris</span>';
                                                        }else {
                                                            if ($row["sintoma_uno"]==11) {
                                                                $sub_array[]='<span class="badge badge-primary">dolor espontaneo</span>';
                                                            }else {
                                                                if ($row["sintoma_uno"]==12) {
                                                                    $sub_array[]='<span class="badge badge-primary">movilidad permanente</span>';
                                                                }else {
                                                                    if ($row["sintoma_uno"]==13) {
                                                                        $sub_array[]='<span class="badge badge-primary">imagen radiolucida</span>';
                                                                    }else {
                                                                        if ($row["sintoma_uno"]==14) {
                                                                            $sub_array[]='<span class="badge badge-primary">inflamacion de la encia alrededor</span>';
                                                                        }else {
                                                                            if ($row["sintoma_uno"]==15) {
                                                                                $sub_array[]='<span class="badge badge-primary">dolor bucal</span>';
                                                                            }else {
                                                                                if ($row["sintoma_uno"]==16) {
                                                                                    $sub_array[]='<span class="badge badge-primary">apertura bucal limitada</span>';
                                                                                }else {
                                                                                    if ($row["sintoma_uno"]==17) {
                                                                                        $sub_array[]='<span class="badge badge-primary">pus</span>';
                                                                                    }else {
                                                                                        if ($row["sintoma_uno"]==18) {
                                                                                            $sub_array[]='<span class="badge badge-primary">dolor espontaneo y agudo</span>';
                                                                                        }else {
                                                                                            if ($row["sintoma_uno"]==19) {
                                                                                                $sub_array[]='<span class="badge badge-primary">dolor a la percusion</span>';
                                                                                            }else {
                                                                                                if ($row["sintoma_uno"]==20) {
                                                                                                    $sub_array[]='<span class="badge badge-primary">caries profunda</span>';
                                                                                                }else {
                                                                                                    if ($row["sintoma_uno"]==21) {
                                                                                                        $sub_array[]='<span class="badge badge-primary">compromiso pulpar</span>';
                                                                                                    }else {
                                                                                                        if ($row["sintoma_uno"]==22) {
                                                                                                            $sub_array[]='<span class="badge badge-primary">estructura dental</span>';
                                                                                                        }else {
                                                                                                            if ($row["sintoma_uno"]==23) {
                                                                                                                $sub_array[]='<span class="badge badge-primary">pigmentacion negra</span>';
                                                                                                            }else {
                                                                                                                if ($row["sintoma_uno"]==24) {
                                                                                                                    $sub_array[]='<span class="badge badge-primary">sensibilidad al frio</span>';
                                                                                                                }else {
                                                                                                                    if ($row["sintoma_uno"]==25) {
                                                                                                                        $sub_array[]='<span class="badge badge-primary">no presenta ningun diente</span>';
                                                                                                                    }else {
                                                                                                                        if ($row["sintoma_uno"]==26) {
                                                                                                                            $sub_array[]='<span class="badge badge-primary">pregunta algunos pliegos dentales</span>';
                                                                                                                        }else {
                                                                                                                            if ($row["sintoma_uno"]==27) {
                                                                                                                                $sub_array[]='<span class="badge badge-primary">material rediopoas sin sintomas</span>';
                                                                                                                            }else {
                                                                                                                                if ($row["sintoma_uno"]==28) {
                                                                                                                                    $sub_array[]='<span class="badge badge-primary">dolor, mololato a un proceso apicol</span>';
                                                                                                                                }else {
                                                                                                                                    if ($row["sintoma_uno"]==29) {
                                                                                                                                        $sub_array[]='<span class="badge badge-primary">Ningun otro síntoma</span>';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if ($row["sintoma_dos"]==NULL or $row["sintoma_dos"]==0) {
                    $sub_array[]='<span class="badge badge-warning">---------------------------</span>';
                }else {
                    if ($row["sintoma_dos"]==1) {
                        $sub_array[]='<span class="badge badge-primary">placa y calculo dental</span>';
                    }else {
                        if ($row["sintoma_dos"]==2) {
                            $sub_array[]='<span class="badge badge-primary">retraccion gingivil</span>';
                        }else {
                            if ($row["sintoma_dos"]==3) {
                                $sub_array[]='<span class="badge badge-primary">perdida de hueso</span>';
                            }else {
                                if ($row["sintoma_dos"]==4) {
                                    $sub_array[]='<span class="badge badge-primary">sangrado</span>';
                                }else {
                                    if ($row["sintoma_dos"]==5) {
                                        $sub_array[]='<span class="badge badge-primary">movilidad dental</span>';
                                    }else {
                                        if ($row["sintoma_dos"]==6) {
                                            $sub_array[]='<span class="badge badge-primary">mal aliento</span>';
                                        }else {
                                            if ($row["sintoma_dos"]==7) {
                                                $sub_array[]='<span class="badge badge-primary">sangrado de la encía</span>';
                                            }else {
                                                if ($row["sintoma_dos"]==8) {
                                                    $sub_array[]='<span class="badge badge-primary">inflamacion de encias</span>';
                                                }else {
                                                    if ($row["sintoma_dos"]==9) {
                                                        $sub_array[]='<span class="badge badge-primary">encía rojas</span>';
                                                    }else {
                                                        if ($row["sintoma_dos"]==10) {
                                                            $sub_array[]='<span class="badge badge-primary">destruccion coronaris</span>';
                                                        }else {
                                                            if ($row["sintoma_dos"]==11) {
                                                                $sub_array[]='<span class="badge badge-primary">dolor espontaneo</span>';
                                                            }else {
                                                                if ($row["sintoma_dos"]==12) {
                                                                    $sub_array[]='<span class="badge badge-primary">movilidad permanente</span>';
                                                                }else {
                                                                    if ($row["sintoma_dos"]==13) {
                                                                        $sub_array[]='<span class="badge badge-primary">imagen radiolucida</span>';
                                                                    }else {
                                                                        if ($row["sintoma_dos"]==14) {
                                                                            $sub_array[]='<span class="badge badge-primary">inflamacion de la encia alrededor</span>';
                                                                        }else {
                                                                            if ($row["sintoma_dos"]==15) {
                                                                                $sub_array[]='<span class="badge badge-primary">dolor bucal</span>';
                                                                            }else {
                                                                                if ($row["sintoma_dos"]==16) {
                                                                                    $sub_array[]='<span class="badge badge-primary">apertura bucal limitada</span>';
                                                                                }else {
                                                                                    if ($row["sintoma_dos"]==17) {
                                                                                        $sub_array[]='<span class="badge badge-primary">pus</span>';
                                                                                    }else {
                                                                                        if ($row["sintoma_dos"]==18) {
                                                                                            $sub_array[]='<span class="badge badge-primary">dolor espontaneo y agudo</span>';
                                                                                        }else {
                                                                                            if ($row["sintoma_dos"]==19) {
                                                                                                $sub_array[]='<span class="badge badge-primary">dolor a la percusion</span>';
                                                                                            }else {
                                                                                                if ($row["sintoma_dos"]==20) {
                                                                                                    $sub_array[]='<span class="badge badge-primary">caries profunda</span>';
                                                                                                }else {
                                                                                                    if ($row["sintoma_dos"]==21) {
                                                                                                        $sub_array[]='<span class="badge badge-primary">compromiso pulpar</span>';
                                                                                                    }else {
                                                                                                        if ($row["sintoma_dos"]==22) {
                                                                                                            $sub_array[]='<span class="badge badge-primary">estructura dental</span>';
                                                                                                        }else {
                                                                                                            if ($row["sintoma_dos"]==23) {
                                                                                                                $sub_array[]='<span class="badge badge-primary">pigmentacion negra</span>';
                                                                                                            }else {
                                                                                                                if ($row["sintoma_dos"]==24) {
                                                                                                                    $sub_array[]='<span class="badge badge-primary">sensibilidad al frio</span>';
                                                                                                                }else {
                                                                                                                    if ($row["sintoma_dos"]==25) {
                                                                                                                        $sub_array[]='<span class="badge badge-primary">no presenta ningun diente</span>';
                                                                                                                    }else {
                                                                                                                        if ($row["sintoma_dos"]==26) {
                                                                                                                            $sub_array[]='<span class="badge badge-primary">pregunta algunos pliegos dentales</span>';
                                                                                                                        }else {
                                                                                                                            if ($row["sintoma_dos"]==27) {
                                                                                                                                $sub_array[]='<span class="badge badge-primary">material rediopoas sin sintomas</span>';
                                                                                                                            }else {
                                                                                                                                if ($row["sintoma_dos"]==28) {
                                                                                                                                    $sub_array[]='<span class="badge badge-primary">dolor, mololato a un proceso apicol</span>';
                                                                                                                                }else {
                                                                                                                                    if ($row["sintoma_dos"]==29) {
                                                                                                                                        $sub_array[]='<span class="badge badge-primary">Ningun otro síntoma</span>';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }*/
                if ($row["diagnostico"]==NULL or $row["diagnostico"]=='') {
                    $sub_array[]='<span class="badge badge-warning">---------------------------</span>';
                }else {
                    $sub_array[]=$row["diagnostico"];
                }
                if ($row["estado_pago"]=="1") {
                    $sub_array[]='<span class="badge badge-primary">Pagado</span>';
                }else {
                    $sub_array[]='<span class="badge badge-danger">Pendiente</span>';
                }
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_creacion"]));
                if ($row["estado_cita"]=="2") {
                    $sub_array[]='<span class="badge badge-primary">Registrado</span>';
                }else {
                    if ($row["estado_cita"]=="3") {
                        $sub_array[]='<span class="badge badge-warning">En Espera</span>';
                    }else {
                        if ($row["estado_cita"]=="4") {
                            $sub_array[]='<span class="badge badge-success">En Atención</span>';
                        }else {
                            if ($row["estado_cita"]=="5") {
                                $sub_array[]='<span class="badge badge-primary">Atendido</span>';
                            }else {
                                if ($row["estado_cita"]=="6") {
                                    $sub_array[]='<span class="badge badge-warning">Ausente</span>';
                                }
                            }

                        }
                    }
                }
                $sub_array[] = '<button type="button" onClick="editar('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-warning btn-icon"><div><i class="icon-pencil"></i></div></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_cita"].');"  id="'.$row["id_cita"].'" class="btn btn-outline-danger btn-icon"><div><i class="icon-trash"></i></div></button>';
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
            $cita ->delete_cita($_POST["id_cita"]);
        break;
        case "comboDoc":
            $datos = $cita->get_doctor();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_doctor']."'>".$row['dni']." - ".$row['nombres']." ".$row['apellidos']."</option>";
                }
                echo $html;
            }
        break;
        case "comboPac":
            $datos = $cita->get_pacientes();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_paciente']."'>".$row['dni']." - ".$row['nombres']." ".$row['apellidos']."</option>";
                }
                echo $html;
            }
        break;
        case "actualizar":
            $cita->update_cita($_POST["id_cita"],$_POST["fecha_cita"],$_POST["hora_cita"]);
        break;
        case 'mostrar':
            $datos=$cita->get_cita_x_id($_POST["id_cita"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["id_cita"] = $row["id_cita"];
                    $output["fecha_cita"] = $row["fecha_cita"];
                    $output["hora_cita"] = $row["hora_cita"];
                }
                echo json_encode($output);
            }
        break;
        case 'persona':
            $datos=$cita->get_persona_x_id($_POST["paciente"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["persona"] = $row["persona"];
                }
                echo json_encode($output);
            }
        break;
        case "listar_agenda":
            $datos=$cita->listar_agenda();
            $data=Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[]=$row["doctor"];
                $sub_array[]=$row["paciente"];
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_cita"]));
                $sub_array[]=$row["hora_cita"];
                if ($row["tiempo"]==NULL) {
                    $sub_array[]='<span class="badge badge-warning">---------</span>';
                }else {
                    $sub_array[]=$row["tiempo"];
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
    }
    
?>