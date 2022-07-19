<?php

    require_once("../config/conexion.php");
    require_once("../models/Home.php");
    $home = new Home();

    switch($_GET["op"]){
    
        case 'mostrarPacientes':
            $results = $home->get_pacientes();
            if (is_array($results)==true and count($results)>0) {
                foreach($results as $row){
                    $output['pacientes'] = $row['pacientes'];
                }
                echo json_encode($output);
            }
        break;

        case 'mostrarUsuarios':
            $results = $home->get_usuarios();
            if (is_array($results)==true and count($results)>0) {
                foreach($results as $row){
                    $output['usuarios'] = $row['usuarios'];
                }
                echo json_encode($output);
            }
        break;

        case 'mostrarCitas':
            $results = $home->get_citas();
            if (is_array($results)==true and count($results)>0) {
                foreach($results as $row){
                    $output['citas'] = $row['citas'];
                }
                echo json_encode($output);
            }
        break;

        case 'mostrarAu':
            $results = $home->get_ausente();
            if (is_array($results)==true and count($results)>0) {
                foreach($results as $row){
                    $output['ausentes'] = $row['ausentes'];
                }
                echo json_encode($output);
            }
        break;

        case 'mostrarHis':
            $results = $home->get_historias();
            if (is_array($results)==true and count($results)>0) {
                foreach($results as $row){
                    $output['historias'] = $row['historias'];
                }
                echo json_encode($output);
            }
        break;

        case 'mostrarDoc':
            $results = $home->get_doctores();
            if (is_array($results)==true and count($results)>0) {
                foreach($results as $row){
                    $output['doctores'] = $row['doctores'];
                }
                echo json_encode($output);
            }
        break;
    }
?>