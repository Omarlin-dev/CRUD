<?php 

class Conexion{
    private $usuario = "root";
    private $pass = "";

    public function conectar(){
        $conec = new PDO("mysql:host=localhost;dbname=empresa", "root", "");
        return $conec;
    }

}

$obj = new Conexion();

if($obj->conectar()){
   // echo 'bien omarlin';
}
else{
    //echo 'mal omarlin';
}
