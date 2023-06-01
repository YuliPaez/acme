<html lang="es">
<head>
<title>Propietario eliminado</title>
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

//Guarda la variable consultada
$cedula = $_POST['cedulaprop'];

//Ejecuta la consulta para eliminar propietario
$sql = "DELETE FROM propietarios WHERE cedulapropietario='$cedula'";

if (mysqli_query($conn, $sql)) {
    ?>
    <style>
    .modal-header {
        background: #E74C3C;
    }
    </style>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Eliminación</h4>
          <button class="close" onclick="location.href='eliminar_propietario.php'">&times;</button>
        </div>
        <div class="modal-body">
          Registro eliminado con éxito.
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='eliminar_propietario.php'">Cerrar</button>
        </div>
      </div>
    </div>
    <?php
} else {
    ?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
          <button class="close" onclick="location.href='eliminar_propietario.php'">&times;</button>
        </div>
        <div class="modal-body">
          <?php
          echo "Ha ocurrido un error al eliminar el registro: " . mysqli_error($conn);
          ?>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='eliminar_propietario.php'">Cerrar</button>
        </div>
      </div>
    </div>
    <?php
}
mysqli_close($conn);
?>
