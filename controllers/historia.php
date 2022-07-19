<?php
    require_once("../config/conexion.php");
    require_once("../models/Historia.php");
    $historia = new Historia();

    switch($_GET["op"]){
        case "combo":
            $datos = $historia->get_citas();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['id_cita']."'>".$row['dni']." - ".$row['nombres']." ".$row['apellidos']."</option>";
                }
                echo $html;
            }
        break;
        case "insert":
                    if ($_FILES['files']['name']==0){
                    }else{
                        $countfiles = count($_FILES['files']['name']);
                        $ruta = "../archivos/";
                        $files_arr = array();

                        for ($index = 0; $index < $countfiles; $index++) {
                            $doc1 = $_FILES['files']['tmp_name'][$index];
                            $destino = $ruta.$_FILES['files']['name'][$index];

                            //$informacion->insert_informacion( $output["id_proyecto"],$doc1);
                            $historia ->insert_informacion($_POST["id_cita"],$_POST["id_usuario"],$_FILES['files']['name'][$index],$_POST["comentario"]);

                            move_uploaded_file($doc1,$destino);
                        }
                    }
        break;
        case "listar":
            $datos=$historia->listar_informacion();
            $data=Array();
            foreach ($datos as $row) {
                $sub_array = array();
                $sub_array[]=$row["id_historia"];
                $sub_array[]=$row["id_cita"];
                $sub_array[]=$row["doctor"];
                $sub_array[]=$row["paciente"];
                $sub_array[]=$row["comentario"];
                $sub_array[]=$row["diente"];
                $sub_array[]='<a href="../../archivos/'.$row["archivo"].'" target="_blank">'.$row["archivo"].'</a>';
                $sub_array[]=date("d/m/Y", strtotime($row["fecha_creacion"]));
                $sub_array[] = '<a href="../../archivos/'.$row["archivo"].'" target="_blank" class="btn btn-outline-warning btn-icon"><i class="icon-cloud-download"></i></a>';
                $sub_array[] = '<button type="button" onClick="ver('.$row["id_historia"].');"  id="'.$row["id_historia"].'" class="btn btn-outline-success btn-icon"><div><i class="icon-eye"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        case 'mostrar':
            $datos=$historia->get_historia_x_id($_POST["id_historia"]);
            $data=Array();
                foreach($datos as $row)
                {
                    $sub_array = array();
                    $sub_array[]=$row["id_historia"];
                    if ($row["check1"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/1.png" alt="" style="width:60px;">';
                        //$row["check1"];
                    }
                    if ($row["check2"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/2.png" alt="" style="width:60px;">';;
                    }
                    if ($row["check3"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/3.png" alt="" style="width:60px;">';
                    }
                    if ($row["check4"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/4.png" alt="" style="width:60px;">';
                    }
                    if ($row["check5"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/5.png" alt="" style="width:60px;">';
                    }
                    if ($row["check6"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/6.png" alt="" style="width:60px;">';
                    }
                    if ($row["check7"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/7.png" alt="" style="width:60px;">';
                    }
                    if ($row["check8"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/8.png" alt="" style="width:60px;">';
                    }
                    if ($row["check9"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/9.png" alt="" style="width:60px;">';
                    }
                    if ($row["check10"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/10.png" alt="" style="width:60px;">';
                    }
                    if ($row["check11"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/11.png" alt="" style="width:60px;">';
                    }
                    if ($row["check12"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/12.png" alt="" style="width:60px;">';
                    }
                    if ($row["check13"]=='0') {
                        $sub_array[]='-';
                    }else {
                        $sub_array[]='<img src="../../assets/images/odon/13.png" alt="" style="width:60px;">';
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