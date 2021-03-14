<?php
include_once '../conexion/conexion.php';
$obj = new Conexion();


if(isset($_GET['id']))
{
$id = $_GET['id'];

$sql = "DELETE FROM autores WHERE id = :id";

$query = $obj->conectar()->prepare($sql);

$query->bindParam(':id',$id, PDO::PARAM_INT);

$query->execute();

header('location: index.php');
}