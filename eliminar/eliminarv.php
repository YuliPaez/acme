<html lang="es">
<head>
<title>Vehículo eliminado</title>
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
$placa = $_POST['placavehi'];

// Verificar si el vehículo existe con la consulta
$consultaVehiculo = "SELECT id_placa FROM vehiculo WHERE id_placa = '$placa'";
$resultadoVehiculo = $conn->query($consultaVehiculo);

if ($resultadoVehiculo->num_rows == 0) {
    // El vehículo no existe, mostrar error
    echo "Hay un error, el vehículo no existe debe registrarlo primero.";
} else {
    // Ejecutar la consulta de eliminación
    $sql = "DELETE FROM vehiculo WHERE id_placa = '$placa'";

    if ($conn->query($sql) === TRUE) {
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
                    <button class="close" onclick="location.href='eliminar_vehiculo.php'">&times;</button>
                </div>
                <div class="modal-body">
                    Vehículo eliminado con éxito
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" onclick="location.href='eliminar_vehiculo.php'">Cerrar</button>
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
                    <button class="close" onclick="location.href='eliminar_vehiculo.php'">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo "Hay un error eliminando el vehículo: " . $conn->error;
                    ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" onclick="location.href='eliminar_vehiculo.php'">Cerrar</button>
                </div>
            </div>
        </div>
        <?php
    }
}

$conn->close();
?>
</body>
</html>

