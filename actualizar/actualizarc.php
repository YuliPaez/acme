<!DOCTYPE html>
<html lang="es">
<head>
<title>Conductor actualizado</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body">
    <style type="">
body{
   background-size:100% 100%; 
   font-weight: bold;
   background-attachment:fixed;
   background:#A2D9CE ;
 }
 </style>
</body>

 <?php

// Establecer la conexión a la base de datos
require('../config.php');

// Recibe los datos atravez del formulario utilizando el metodo POST
$cedula = $_POST['cedulaconduc'];
$primer_nombre = $_POST['primernombreconduc'];
$segundo_nombre = $_POST['segundonombreconduc'];
$apellidos = $_POST['apellidosconduc'];
$direccion = $_POST['direccionconduc'];
$telefono = $_POST['telefonoconduc'];
$ciudad = $_POST['ciudadconduc'];

//Actualiza datos en la tabla conductores de la base de datos acme
$sql = "UPDATE conductores SET primernombreconductor='$primer_nombre', segundonombreconductor='$segundo_nombre', apellidosconductor='$apellidos', direccionconductor= '$direccion', telefonoconductor='$telefono',ciudadconductor='$ciudad' WHERE cedulaconductor='$cedula' ";


if (mysqli_query($conn, $sql)) {

?>
<style>
.modal-header{
    background: #E74C3C;
  }
</style>
    <div class="modal-dialog" >
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Actualización</h4>
          <button class="close" onclick="location.href='actualizar_conductor.php'">&times;</button>
        </div>
        <div class="modal-body">
          Información actualizada con exito
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='actualizar_conductor.php'">Cerrar</button>
        </div>
        
      </div>
    </div>
 <?php
} 
else 
{

?>

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
          <button class="close" onclick="location.href='actualizar_conductor.php'">&times;</button>
        </div>
        <div class="modal-body">
          <?php
          echo "Hay un error actualizando la información ". mysqli_error($conn);
          ?>
        </div>
<div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='actualizar_conductor.php'">Cerrar</button>
        </div> 
      </div>
    </div>
 <?php
}
mysqli_close($conn);

?> 