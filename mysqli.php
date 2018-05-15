<?php

/*

Benjamin Olguin Miranda
PHP 5.x
Mysql 5.6

*/

class Database{

        private $host = "host";
        private $usuario = "usuario";
        private $pass = "pass";
        private $base = "db";

        protected $conex;

        public function conectar(){
            $this->conex = mysqli_connect($this->host, $this->usuario, $this->pass, $this->base) or die("error");
            mysqli_query($this->conex, "set global sql_mode=''");
            if(!$this->conex){
                DIE("No hay conexion".mysqli_errno($this->conex));
            }

            return true;
        }

        public function desconectar(){
            if($this->conectar()){
                mysqli_close($this->conex);
            }
        }

        public function consultar($q){

            mysqli_query($this->conex, "set global sql_mode=''");
            $result = mysqli_query($this->conex, $q);
            if (!$result){
                echo "<h4>Sentencia incorrecta</h4>";
                return null;
            } else {
                $fila = mysqli_fetch_array($result);
                return $fila;
            }
        }

        public function insertar($q){
            mysqli_query($this->conex, "set global sql_mode=''");
            $result = mysqli_query($this->conex, $q);
            if(!$result){
                echo"<h4>Error al insertar en la base de datos</h4>";
            }else{
                //echo"<h4>Datos ingresados correctamente!</h4>";
            }
        }

        public function get_consulta($q){
            $result = mysqli_query($this->conex, $q);
            if(!$result){
                echo"<h4>Error al insertar en la base de datos</h4>";
            }else{
                //echo"<h4>Datos ingresados correctamente!</h4>";
                return $result;
            }
        }

    }

/*
    Para usar clases:

    Para consultar datos a la base de datos, devuelve la fila [mysqli_fetch_array()]
    $db = new Database();
    if($db->conectar()){
        $fila = $db->consulta($query);
    }

*/

?>