<?php

include_once '../conexion/conexion.php';

$obj = new Conexion();

if($_POST){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO autores( nombre, apellido,  direccion) VALUES (:nom, :ape, :dir)";

    $query = $obj->conectar()->prepare($sql);

    $query->bindParam(':nom',$nombre, PDO::PARAM_STR);
    $query->bindParam(':ape',$apellido, PDO::PARAM_STR);
    $query->bindParam(':dir',$direccion, PDO::PARAM_STR);

    $query->execute();

    header('location: index.php');
}

?>
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Insertar con ayuda de dios</title>
</head>
<body>
    
<div class="container mt-4 w-50">

<form action="" method="post" class= "form-control">

<label>Nombre</label>
<input type="text" name="nombre" class= "form-control">

<label for="apellido">Apellido</label>
<input type="text" name="apellido" class= "form-control">

<label for="direccion">Direccion</label>
<input type="text" name="direccion" class= "form-control">

    <button type="submit">Enviar</button>
</form>

</div>

</body>
</html> -->