<?php

    class Paciente extends Conectar{
        public function listar_paciente(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
                    id_paciente,nombres,apellidos,dni,telefono,direccion,enfermedad,fecha_creacion
                FROM pacientes WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_paciente($id_paciente){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE pacientes
                    SET 
                    estado='0',
                    fecha_eliminacion = now()
                    WHERE id_paciente=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_paciente);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_paciente($id_usuario,$nombres,$apellidos,$dni,$telefono,$direccion,$fecha_nacimiento,$enfermedad,$persona){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO pacientes (id_paciente,id_usuario,nombres,apellidos,dni,telefono,direccion,fecha_nacimiento,enfermedad,persona,fecha_creacion,estado) VALUE (NULL,?,?,?,?,?,?,?,?,?,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->bindValue(2, $nombres);
            $sql->bindValue(3, $apellidos);
            $sql->bindValue(4, $dni);
            $sql->bindValue(5, $telefono);
            $sql->bindValue(6, $direccion);
            $sql->bindValue(7, $fecha_nacimiento);
            $sql->bindValue(8, $enfermedad);
            $sql->bindValue(9, $persona);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_paciente($id_paciente,$nombres,$apellidos,$dni,$telefono,$direccion){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE pacientes SET
                nombres=?,
                apellidos=?,
                dni=?,
                telefono=?,
                direccion=?,
                fecha_modificacion=now()
                WHERE
                id_paciente=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombres);
            $sql->bindValue(2, $apellidos);
            $sql->bindValue(3, $dni);
            $sql->bindValue(4, $telefono);
            $sql->bindValue(5, $direccion);
            $sql->bindValue(6, $id_paciente);
			$sql->execute();
        }

        public function get_paciente_x_id($id_paciente){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                id_paciente,
                nombres,
                apellidos,
                dni,
                telefono,
                direccion
            FROM pacientes
            WHERE  id_paciente=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_paciente);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }

        public function get_validar_paciente($dni){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
            dni
            FROM pacientes
            where dni=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $dni);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }
    }

?>