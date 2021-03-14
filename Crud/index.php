<?php

require_once 'mostrarDatos.php';

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "SELECT * FROM autores WHERE id = $id";
    $query = $obj->conectar()->prepare($sql);
    $query->execute();

    $resultadoone = $query->fetch();
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>    <title>Crud ayuda de dios</title>
</head>
<body>
    
<div class="container w-75 mt-5">

<!-- Button trigger modal -->

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Agregar nuevo
</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php if(!isset($_GET['id'])): ?>
      <div class="modal-body">
            <form action="insertar.php" method="post" class= "form-control">
        <h2>Agregar</h2>
        <label>Nombre</label>
        <input type="text" name="nombre" class= "form-control">

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" class= "form-control">

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" class= "form-control">
        
        <input type="hidden" name = "id" value = "<?php echo $resultadoone['id']; ?>">

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" >Enviar</button>
      </div>
      </form>
      </div>
      <?php endif ?>

  <?php if(isset($_GET['id'])): ?>
      <div class="modal-body">
            <form action="edit.php? id= <?php echo $resultadoone['id'] ?>" method="GET" class= "form-control">
        <h2>Editar</h2>
        <label>Nombre</label>
        <input type="text" name="nombre" class= "form-control" value = "<?php echo $resultadoone['nombre']; ?>">

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" class= "form-control" value = "<?php echo $resultadoone['apellido']; ?>">

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" class= "form-control" value = "<?php echo $resultadoone['direccion']; ?>">

        <input type="hidden" name = "id" value = "<?php echo $resultadoone['id']; ?>">
        <script>

        $(document).ready(function () {
         
          $('#exampleModal').modal('show');

        });
    
    </script>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick=" location.href='index.php'; ">Close</button>
        <button type="submit" class="btn btn-primary" >Enviar</button>
      </div>
      </form>
      </div>

  <?php endif ?>
      
    </div>
  </div>
</div>


<table class="table table-striped table-bordered">

<thead class="bg-dark text-white">

<th>Nombre</th>
<th>Apellido</th>
<th>Dirreccion</th>

</thead>

<tbody>

<?php foreach($resultado as $valor): ?>
    <tr>
<td><?php echo $valor['nombre'] ?></td>
<td><?php echo $valor['apellido'] ?></td>
<td><?php echo $valor['direccion'] ?></td>

<td>

<a href="index.php?id= <?php echo $valor['id'] ?>"><i class="fas fa-edit mx-3"></i></a>
<a onclick="return confirm('Estas seguro que deseas eliminar este registro');" href="delete.php?id= <?php echo $valor['id'] ?>"><i class="fas fa-trash-alt"></i></a>

</td>
</tr>

<?php endforeach ?>

</tbody>


</table>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>