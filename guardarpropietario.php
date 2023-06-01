<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<?php
// Establecer la conexión a la base de datos
require('config.php');

// Recibe los datos atravez del formulario utilizando el metodo POST
$cedulapropietario = $_POST['cedulapropietario'];
$primernombrepropietario = $_POST['primernombrepropietario'];
$segundonombrepropietario = $_POST['segundonombrepropietario'];
$apellidospropietario = $_POST['apellidospropietario'];
$direccionpropietario = $_POST['direccionpropietario'];
$telefonopropietario = $_POST['telefonopropietario'];
$ciudadpropietario = $_POST['ciudadpropietario'];

//Inserta datos en la tabla propietarios de la base de datos acme
$sql = "INSERT INTO propietarios (cedulapropietario, primernombrepropietario, segundonombrepropietario, apellidospropietario, direccionpropietario,telefonopropietario,ciudadpropietario) VALUES ('$cedulapropietario', '$primernombrepropietario', '$segundonombrepropietario', '$apellidospropietario', '$direccionpropietario', '$telefonopropietario','$ciudadpropietario')";

if (mysqli_query($conn, $sql)) {
  ?>
  <style>
  .modal-header{
      background: #E74C3C;
    }
  </style>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Excelente</h4>
            <button class="close" onclick="location.href='vehiculo.php'">&times;</button>
          </div>
          <div class="modal-body">
            Datos grabados safisfactoriamente
          </div>
          <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='vehiculo.php'">Cerrar</button>
          </div>
          
        </div>
      </div>
   <?php
  } else 
  {
  
  ?>
  <style>
  .modal-header{
      background: #E74C3C;
    }
  </style>
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Error</h4>
            <button class="close" onclick="location.href='propietario.php'">&times;</button>
          </div>
          <div class="modal-body">
  <?php
   echo "Los datos no pudieron ser grabados " . mysqli_error($conn);
    ?>
  </div>
  
  <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='propietario.php'">Cerrar</button>
          </div> 
        </div>
      </div>
  <?php
  }
  mysqli_close(); 
  ?>    