<?php

    class Pago extends Conectar{
        
        public function listar_pago(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
                    ci.id_cita, 
                    ci.fecha_cita,
                    CONCAT(pa.dni,'-',pa.nombres,' ',pa.apellidos) as cita,
                    ci.monto,
                    ci.tipo,
                    ci.estado_pago
                FROM citas as ci
                join pacientes as pa on ci.id_paciente=pa.id_paciente
                WHERE ci.estado=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_pago($id_cita,$monto,$tipo){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE citas SET
                monto=?,
                tipo=?,
                fecha_modificacion=now()
                WHERE
                id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $monto);
            $sql->bindValue(2, $tipo);
            $sql->bindValue(3, $id_cita);
			$sql->execute();
        }

        public function get_pago_x_id($id_cita){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                id_cita,
                monto
            FROM citas
            WHERE  id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }

        public function get_citas(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT
                ci.id_cita,
                CONCAT(ci.id_cita,':  ',pa.dni,'-',pa.nombres,' ',pa.apellidos) as cita
            FROM citas as ci
            join pacientes as pa on ci.id_paciente=pa.id_paciente
            WHERE ci.estado=1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function actualizar_pago($id_cita){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE citas
                    SET 
                    estado_pago='1'
                    WHERE id_cita=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_cita);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }

?>