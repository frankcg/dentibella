<?php

    class Cita extends Conectar{
        public function listar_cita(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
                    ci.id_cita,CONCAT (doc.nombres,' ',doc.apellidos) as doctor,CONCAT(pac.nombres,' ',pac.apellidos) as paciente,ci.fecha_cita,ci.hora_cita,ci.sintoma_uno,
                    ci.sintoma_dos,ci.diagnostico,ci.estado_pago,ci.fecha_creacion,ci.estado_cita
                FROM citas as ci
                JOIN doctor as doc on ci.id_doctor = doc.id_doctor
                JOIN pacientes as pac on ci.id_paciente = pac.id_paciente
                /*JOIN sintomas as si on ci.sintoma_uno = si.id_sintoma 
                JOIN sintomas as sint on ci.sintoma_dos = sint.id_sintoma*/
                WHERE ci.estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_cita($id_cita){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE citas
                    SET 
                    estado='0',
                    fecha_eliminacion = now()
                    WHERE id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_cita($id_usuario,$id_paciente,$id_doctor,$fecha_cita,$hora_cita,$sintoma_uno,$sintoma_dos,$diagnostico,$tiempo){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO citas (id_cita,id_usuario,id_paciente,id_doctor,fecha_cita,hora_cita,sintoma_uno,sintoma_dos,diagnostico,tiempo,estado_cita,fecha_creacion,estado) VALUE (NULL,?,?,?,?,?,?,?,?,?,'2',now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->bindValue(2, $id_paciente);
            $sql->bindValue(3, $id_doctor);
            $sql->bindValue(4, $fecha_cita);
            $sql->bindValue(5, $hora_cita);
            $sql->bindValue(6, $sintoma_uno);
            $sql->bindValue(7, $sintoma_dos);
            $sql->bindValue(8, $diagnostico);
            $sql->bindValue(9, $tiempo);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_doctor(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM doctor WHERE estado=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_pacientes(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM pacientes WHERE estado=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_cita($id_cita,$fecha_cita,$hora_cita){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE citas SET
                fecha_cita=?,
                hora_cita=?,
                fecha_modificacion=now()
                WHERE
                id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fecha_cita);
            $sql->bindValue(2, $hora_cita);
            $sql->bindValue(3, $id_cita);
			$sql->execute();
        }

        public function get_cita_x_id($id_cita){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT ci.id_cita,ci.fecha_cita,ci.hora_cita
                FROM citas as ci
                WHERE ci.id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }

        public function get_persona_x_id($paciente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT persona
                FROM pacientes
                WHERE id_paciente=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $paciente);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }

        public function get_validar_hora_cita($enviar){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            concat(fecha_cita,' ',hora_cita) as agenda
            FROM citas 
            where concat(fecha_cita,' ',hora_cita)=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $enviar);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }

        public function listar_agenda(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
                    CONCAT (doc.nombres,' ',doc.apellidos) as doctor,
                    CONCAT(pac.nombres,' ',pac.apellidos) as paciente,
                    ci.fecha_cita,
                    ci.hora_cita,
                    ci.tiempo
                FROM citas as ci
                JOIN doctor as doc on ci.id_doctor = doc.id_doctor
                JOIN pacientes as pac on ci.id_paciente = pac.id_paciente
                WHERE ci.estado=1 and ci.fecha_cita>=now() and ci.estado_cita in (2,3,4)";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }

?>