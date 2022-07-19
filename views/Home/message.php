<?php
// connecting to database
$conn = mysqli_connect("localhost", "root", "", "dentibella") or die("Database Error");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT CONCAT (pac.nombres,' ',pac.apellidos) as paciente, CONCAT (doc.nombres,' ',doc.apellidos) as doctor, cit.fecha_cita, cit.hora_cita, 
                        si.nombre as sintoma_uno, sint.nombre as sintoma_dos,cit.diagnostico
                    FROM citas as cit
                    JOIN pacientes as pac on cit.id_paciente = pac.id_paciente
                    JOIN doctor as doc on cit.id_doctor = doc.id_doctor 
                    JOIN sintomas as si on cit.sintoma_uno = si.id_sintoma
                    JOIN sintomas as sint on cit.sintoma_dos = sint.id_sintoma
                    WHERE cit.estado=1  and pac.nombres LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query
    $fetch_data = mysqli_fetch_assoc($run_query);
    //storing replay to a varible which we'll send to ajax
    $paciente = $fetch_data['paciente'];
    $doctor = $fetch_data['doctor'];
    $fecha_cita = $fetch_data['fecha_cita'];
    $hora_cita = $fetch_data['hora_cita'];
    $sintoma_uno = $fetch_data['sintoma_uno'];
    $sintoma_dos = $fetch_data['sintoma_dos'];
    $diagnostico = $fetch_data['diagnostico'];
    

    echo "<br>"." El nombre del paciente es: "."$paciente"."<br>".
                "El nombre del doctor es: "."$doctor"."<br>".
                "Su Primer Síntoma es: "."$sintoma_uno"."<br>".
                "Su Segundo Síntoma es: "."$sintoma_dos"."<br>".
                "La Fecha de su Cita es: "."$fecha_cita"."<br>".
                "La Hora de su Cita es: "."$hora_cita";
}else{
    echo "0";
}

?>