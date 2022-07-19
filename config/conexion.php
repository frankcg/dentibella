<?php

    session_start();

    class Conectar {
        protected $db;
        
        protected function Conexion(){
            try {
                $conectar = $this->db = new PDO("mysql:local=localhost;dbname=dentibella","root","" );
                return $conectar;
            } catch (Exception $e) {
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                    die();
            }
        }

        public function set_names(){
            return $this->db->query("SET NAMES 'utf8'");
        }

        public function ruta(){
            return "http://localhost/DentiBella/";
        }
    }

?>