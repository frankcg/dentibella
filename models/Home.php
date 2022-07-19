<?php

class Home extends Conectar{

    public function get_pacientes(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) as pacientes FROM pacientes where estado=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_usuarios(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) as usuarios FROM usuarios where estado=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_citas(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) as citas FROM citas where estado=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_ausente(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) as ausentes FROM citas where estado=1 and estado_cita=4";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_historias(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) as historias FROM historias where estado=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_doctores(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT COUNT(*) as doctores FROM doctor where estado=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>