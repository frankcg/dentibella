<?php

    class Historia extends Conectar{

        public function get_citas(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
                    cit.id_cita,
                    pac.dni,
                    pac.nombres as nombres,
                    pac.apellidos as apellidos
                    FROM citas as cit
                    JOIN pacientes as pac on cit.id_paciente=pac.id_paciente
                    WHERE cit.estado=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_informacion($id_cita,$id_usuario,$archivo,$comentario){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO historias (id_historia,id_cita,id_usuario,archivo,comentario,fecha_creacion,estado) VALUE (NULL,?,?,?,?,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->bindValue(2, $id_usuario);
            $sql->bindValue(3, $archivo);
            $sql->bindValue(4, $comentario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_informacion(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
                    inf.id_historia,
                    inf.id_cita,
                    pro.nombres as doctor,
                    CONCAT (pac.nombres,' ',pac.apellidos) as paciente,
                    inf.archivo,
                    inf.comentario,
                    inf.diente,
                    inf.fecha_creacion
                FROM historias as inf
                JOIN citas as cit on inf.id_cita = cit.id_cita
                JOIN pacientes as pac on cit.id_paciente = pac.id_paciente
                JOIN doctor as pro on cit.id_doctor = pro.id_doctor
                WHERE inf.estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_historia_x_id($id_historia){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT id_historia,
                    check1,
                    check2,
                    check3,
                    check4,
                    check5,
                    check6,
                    check7,
                    check8,
                    check9,
                    check10,
                    check11,
                    check12,
                    check13
                FROM historias
                WHERE id_historia=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_historia);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }
    }
?>