<?php


include_once '../conexion/conexion.php';


$obj = new Conexion();



if(isset($_GET['id']))
{
    
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    $direccion = $_GET['direccion'];


    $sql = "UPDATE autores SET nombre = '$nombre', apellido = '$apellido', direccion = '$direccion' WHERE id= '$id'";

    $query = $obj->conectar()->prepare($sql);

    $query->execute();
    
    header("Location: index.php");

}

