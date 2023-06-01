<!DOCTYPE html>
<html lang="es">
<head>
<title>Vehículo actualizado</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <style>
    body {
      background-size: 100% 100%;
      font-weight: bold;
      background-attachment: fixed;
      background: #A2D9CE;
    }
  </style>
</head>
<body>
<?php
// Establecer la conexión a la base de datos
require('../menu/config.php');

//Recibe los datos del formulario con método POST
$placa = $_POST['placavehi'];
$color_vehi = $_POST['colorvehi'];
$marca_vehi = $_POST['marcavehi'];
$tipo_vehi = $_POST['tipovehi'];
$cedula_conductor = $_POST['id_conductorv'];
$cedula_propietario = $_POST['id_propietariov'];


// Verificar si el conductor existe
$consultaConductor = "SELECT cedulaconductor FROM conductores WHERE cedulaconductor = '$cedula_conductor'";
$resultadoConductor = mysqli_query($conn, $consultaConductor);

if (mysqli_num_rows($resultadoConductor) == 0) {
    // El conductor no existe, mostrar error
    ?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
          <button class="close" onclick="location.href='actualizar_vehiculo.php'">&times;</button>
        </div>
        <div class="modal-body">
          <?php
          echo "Hay un error, la cédula del conductor no existe. Debes registrarlo primero.";
          ?>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='actualizar_vehiculo.php'">Cerrar</button>
        </div> 
      </div>
    </div>
    <?php
} else {
    // Verificar si el propietario existe
    $consultaPropietario = "SELECT cedulapropietario FROM propietarios WHERE cedulapropietario = '$cedula_propietario'";
    $resultadoPropietario = mysqli_query($conn, $consultaPropietario);

    if (mysqli_num_rows($resultadoPropietario) == 0) {
        // El propietario no existe, mostrar error
        ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Error</h4>
              <button class="close" onclick="location.href='actualizar_vehiculo.php'">&times;</button>
            </div>
            <div class="modal-body">
              <?php
              echo "Hay un error, la cédula del propietario no existe. Debes registrarlo primero.";
              ?>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" onclick="location.href='actualizar_vehiculo.php'">Cerrar</button>
            </div> 
          </div>
        </div>
        <?php
    } else {
        // Ambos, conductor y propietario, existen
        // Ejecutar la consulta de actualización
        $sql = "UPDATE vehiculo SET color='$color_vehi', marca='$marca_vehi', tipo='$tipo_vehi', id_conductor=(SELECT id_conductor FROM conductores WHERE cedulaconductor='$cedula_conductor' LIMIT 1), id_propietario=(SELECT id_propietario FROM propietarios WHERE cedulapropietario='$cedula_propietario' LIMIT 1) WHERE id_placa='$placa'";

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
                  <h4 class="modal-title">Actualización</h4>
                  <button class="close" onclick="location.href='actualizar_vehiculo.php'">&times;</button>
                </div>
                <div class="modal-body">
                  Información actualizada con éxito
                </div>
                <div class="modal-footer">
                  <button class="btn btn-danger" onclick="location.href='actualizar_vehiculo.php'">Cerrar</button>
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
                  <button class="close" onclick="location.href='actualizar_vehiculo.php'">&times;</button>
                </div>
                <div class="modal-body">
                  <?php
                  echo "Hay un error actualizando la información: " . mysqli_error($conn);
                  ?>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-danger" onclick="location.href='actualizar_vehiculo.php'">Cerrar</button>
                </div> 
              </div>
            </div>
            <?php
        }
    }
}

mysqli_close($conn);
?>
</body>
</html>