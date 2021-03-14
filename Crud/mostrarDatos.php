<?php
require_once '../conexion/conexion.php';

$obje = new Conexion();


$sql = 'SELECT * FROM autores';

$query = $obje->conectar()->prepare($sql);
$query->execute();

$resultado = $query->fetchAll();

//var_dump($resultado);