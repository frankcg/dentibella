<?php
    class Seguimiento extends Conectar{
        
        public function listar_cita(){
            $conectar=parent::conexion();
            parent::set_names();

            $sql="SELECT 
                    ci.id_cita,CONCAT (doc.nombres,' ',doc.apellidos) as doctor,CONCAT(pac.nombres,' ',pac.apellidos) as paciente,ci.fecha_cita,ci.hora_cita,
                    sintoma_uno,
                    sintoma_dos,
                    ci.diagnostico,ci.fecha_creacion,ci.estado_cita
                FROM citas as ci
                JOIN doctor as doc on ci.id_doctor = doc.id_doctor
                JOIN pacientes as pac on ci.id_paciente = pac.id_paciente

                WHERE ci.estado=1 and ci.estado_cita in (2,3,4,5,6)";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
            /*$sql="SELECT 
                    ci.id_cita,CONCAT (doc.nombres,' ',doc.apellidos) as doctor,CONCAT(pac.nombres,' ',pac.apellidos) as paciente,ci.fecha_cita,ci.hora_cita,
                    si.nombre as sintoma_uno,
                    sint.nombre as sintoma_dos,
                    ci.diagnostico,ci.fecha_creacion,ci.estado_cita
                FROM citas as ci
                JOIN doctor as doc on ci.id_doctor = doc.id_doctor
                JOIN pacientes as pac on ci.id_paciente = pac.id_paciente
                JOIN sintomas as si on ci.sintoma_uno = si.id_sintoma 
                JOIN sintomas as sint on ci.sintoma_dos = sint.id_sintoma
                WHERE ci.estado=1 and ci.estado_cita in (2,3,4,5,6)";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();*/




        }

        public function espera_cita($id_cita){
            $hora=date('H:i:s');
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE citas
                    SET 
                    estado_cita='3',
                    hora_espera = '$hora'
                    WHERE id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function en_atencion_cita($id_cita){
            $hora=date('H:i:s');
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE citas
                    SET 
                    estado_cita='4',
                    hora_en_atencion = '$hora'
                    WHERE id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function atendido_cita($id_cita){
            $hora=date('H:i:s');
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE citas
                    SET 
                    estado_cita='5',
                    hora_atendido = '$hora'
                    WHERE id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function ausente_cita($id_cita){
            $hora=date('H:i:s');
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE citas
                    SET 
                    estado_cita='6',
                    hora_ausente = '$hora',
                    fecha_eliminacion = now()
                    WHERE id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }

?>