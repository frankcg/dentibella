<?php

    class Usuario extends Conectar{
        public function login(){
            $conectar = parent::conexion();
            parent::set_names();
            if (isset($_POST["ingresar"])) {
                $usuario = $_POST["usuario"];
                $clave = $_POST["clave"];
                $rol = $_POST["rol"];
                if(empty($usuario) and empty($clave)){
                    header("Location:".conectar::ruta()."index.php?m=2");
					exit();
                }else{
                    $sql = "SELECT * FROM usuarios WHERE usuario=? and clave=? and id_rol=? and estado=1";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $usuario);
                    $stmt->bindValue(2, $clave);
                    $stmt->bindValue(3, $rol);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    if (is_array($resultado) and count($resultado)>0){
                        $_SESSION["id_usuario"]=$resultado["id_usuario"];
                        $_SESSION["nombres"]=$resultado["nombre"];
                        $_SESSION["apellidos"]=$resultado["apellidos"];
                        $_SESSION["rol"]=$resultado["id_rol"];
                        header("Location:".Conectar::ruta()."views/Home/home.php");
                        exit(); 
                    }else{
                        header("Location:".Conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }

        public function listar_usuario(){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="SELECT 
                    id_usuario,nombre,apellidos,usuario,id_rol,fecha_creacion
                FROM usuarios WHERE estado=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_usuario($id_usuario){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE usuarios
                    SET 
                    estado='0',
                    fecha_eliminacion = now()
                    WHERE id_usuario=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_usuario($id_rol,$nombre,$apellidos,$usuario,$clave){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="INSERT INTO usuarios (id_usuario,id_rol,nombre,apellidos,usuario,clave,fecha_creacion,estado) VALUE (NULL,?,?,?,?,?,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_rol);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $apellidos);
            $sql->bindValue(4, $usuario);
            $sql->bindValue(5, $clave);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_usuario($id_usuario,$nombre,$apellidos,$usuario,$id_rol,$clave){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE usuarios SET
                nombre=?,
                apellidos=?,
                usuario=?,
                id_rol=?,
                clave=?,
                fecha_modificacion=now()
                WHERE
                id_usuario=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $apellidos);
            $sql->bindValue(3, $usuario);
            $sql->bindValue(4, $id_rol);
            $sql->bindValue(5, $clave);
            $sql->bindValue(6, $id_usuario);
			$sql->execute();
        }

        public function get_usuario_x_id($id_usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                usu.id_usuario,
                usu.nombre,
                usu.apellidos,
                usu.usuario,
                tipo.nombre as rol,
                usu.clave
            FROM usuarios as usu
            join roles as tipo on usu.id_rol = tipo.id_rol
            WHERE  usu.id_usuario=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_usuario);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }

        public function get_validar_usuario($usuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                usuario
            FROM usuarios
            WHERE  usuario=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
			$sql->execute();
			return $resultado=$sql->fetchAll();
        }
    }

?>