<?php

class Reporte extends Conectar{

    public function reporte_inc($fechaIni, $fechaFin){
        $conectar=parent::conexion();
        parent::set_names(); 
        $reporte = array();
		$sql="SELECT fecha_creacion,COUNT(dni) as nuevos,
                (SELECT COUNT(*) FROM pacientes as p where p.fecha_creacion=pacientes.fecha_creacion) as total,
                ROUND(COUNT(dni)/(SELECT COUNT(*) FROM pacientes as p where p.fecha_creacion=pacientes.fecha_creacion),2) as formula
                FROM pacientes where (select COUNT(1) from pacientes as pac where pac.dni=pacientes.dni and pac.fecha_creacion<pacientes.fecha_creacion)=0 and estado = 1 and
                fecha_creacion BETWEEN '{$fechaIni}' and '{$fechaFin}'
                GROUP BY fecha_creacion";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

       /* public function reporte_inc($fechaIni, $fechaFin){
        $conectar=parent::conexion();
        parent::set_names(); 
        $reporte = array();
		$sql="SELECT cit.fecha_cita, 
                (SELECT COUNT(*) FROM pacientes as p where p.fecha_creacion=paci.fecha_creacion) as total, COUNT(paci.dni) as nuevos,
                ROUND(COUNT(paci.dni)/(SELECT COUNT(*) FROM pacientes as p where p.fecha_creacion=paci.fecha_creacion),2) as formula 
                FROM citas as cit join pacientes as paci on cit.id_paciente=paci.id_paciente
                where (select COUNT(1) from pacientes as pac where pac.dni=paci.dni and pac.fecha_creacion<paci.fecha_creacion)=0 and 
                cit.fecha_cita BETWEEN '{$fechaIni}' and '{$fechaFin}'
                GROUP BY cit.fecha_cita";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }*/

    public function reporte_tme($fechaIni, $fechaFin){
        $conectar=parent::conexion();
        parent::set_names(); 
        $reporte = array();
		$sql="SELECT fecha_cita,
                ((SUM(TIME_TO_SEC(hora_en_atencion) DIV 60)) - (SUM(TIME_TO_SEC(hora_espera) DIV 60))) as espera,
                COUNT(*) as total ,
                ROUND((((SUM(TIME_TO_SEC(hora_en_atencion) DIV 60)) - (SUM(TIME_TO_SEC(hora_espera) DIV 60)))/COUNT(*)),2) as tme
                FROM citas WHERE estado_cita=5 and estado = 1
                and fecha_cita BETWEEN '{$fechaIni}' and '{$fechaFin}' GROUP BY fecha_cita";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>