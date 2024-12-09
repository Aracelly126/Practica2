<?php
class Conexion{
    public function conectar(){
        define('server','localhost');
        define('dbname','servicios');
        define('user','root');
        define('password','');
        try{
            $conn = new PDO("mysql:host=".server.";dbname=".dbname,user,password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $conn;
            
        }catch(PDOexception $e){
            die("Error en la conexion");

        }
    }
  

}




?>