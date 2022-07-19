<?php

    class Doctor extends Conectar{
        public function listar_doctor(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
                    id_doctor,nombres,apellidos,dni,especialidad,fecha_creacion
                FROM doctor WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_doctor($id_doctor){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE doctor
                    SET 
                    estado='0',
                    fecha_eliminacion = now()
                    WHERE id_doctor=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_doctor);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_doctor($id_usuario,$nombres,$apellidos,$especialidad,$fecha_nacimiento,$dni){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO doctor (id_doctor,id_usuario,nombres,apellidos,especialidad,fecha_nacimiento,dni,fecha_creacion,estado) VALUE (NULL,?,?,?,?,?,?,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->bindValue(2, $nombres);
            $sql->bindValue(3, $apellidos);
            $sql->bindValue(4, $especialidad);
            $sql->bindValue(5, $fecha_nacimiento);
            $sql->bindValue(6, $dni);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_doctor($id_doctor,$nombres,$apellidos,$especialidad){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE doctor SET
                nombres=?,
                apellidos=?,
                especialidad=?,
                fecha_modificacion=now()
                WHERE
                id_doctor=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombres);
            $sql->bindValue(2, $apellidos);
            $sql->bindValue(3, $especialidad);
            $sql->bindValue(4, $id_doctor);
			$sql->execute();
        }

        public function get_doctor_x_id($id_doctor){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                id_doctor,
                nombres,
                apellidos,
                especialidad
            FROM doctor
            WHERE  id_doctor=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_doctor);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }
    }

?>