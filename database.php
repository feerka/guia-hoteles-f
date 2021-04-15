
<?php

class Database{
    private $con;
    private $dbhost="localhost";
    private $dbuser="root";
    private $dbpass="";
    private $dbname="cliente";
    function __construct(){
        $this->connect_db();
    }
    public function connect_db(){
        $this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if(mysqli_connect_error()){
            die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
        }
    }
    
    public function sanitize($var){
        $return = mysqli_real_escape_string($this->con, $var);
        return $return;
    }

    public function createClien($id, $nombres, $apellidos, $direccion,$provincia, $correo_electronico){
        $sql = "INSERT INTO `clientes` (id, nombres, apellidos, direccion, provincia, correo_electronico ) 
        VALUES ('$id', '$nombres', '$apellidos', '$direccion', '$provincia', '$correo_electronico')";
        $res = mysqli_query($this->con, $sql);
        if($res){
            return true;
        }else{
            return false;
        }
       
        }
        public function createCom($comentario,$id){
            $sql = "INSERT INTO `comentarios` (comentario,id) VALUES ('$comentario','$id')";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            }else{
                return false;
            }   
        }
   
}

