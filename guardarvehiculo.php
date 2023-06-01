<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
// Establecer la conexión a la base de datos 
require('config.php');

// Recibe los datos atraves del formulario utilizando el metodo POST
$id_placa = $_POST['id_placa'];
$color = $_POST['color'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$id_conductor = $_POST['id_conductor'];
$id_propietario = $_POST['id_propietario'];

// Verificar si el conductor existe
$consultaConductor = "SELECT cedulaconductor FROM conductores WHERE cedulaconductor = '$id_conductor'";
$resultadoConductor = mysqli_query($conn, $consultaConductor);

if (mysqli_num_rows($resultadoConductor) == 0) {
    // El conductor no existe, mostrar error
    ?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
          <button class="close" onclick="location.href='vehiculo.php'">&times;</button>
        </div>
        <div class="modal-body">
          <?php
          echo "Hay un error, la cédula del conductor no existe. Debes registrarlo primero.";
          ?>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='vehiculo.php'">Cerrar</button>
        </div> 
      </div>
    </div>
    <?php
} else {
    // Verificar si el propietario existe
    $consultaPropietario = "SELECT cedulapropietario FROM propietarios WHERE cedulapropietario = '$id_propietario'";
    $resultadoPropietario = mysqli_query($conn, $consultaPropietario);

    if (mysqli_num_rows($resultadoPropietario) == 0) {
        // El propietario no existe, mostrar error
        ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Error</h4>
              <button class="close" onclick="location.href='vehiculo.php'">&times;</button>
            </div>
            <div class="modal-body">
              <?php
              echo "Hay un error, la cédula del propietario no existe. Debes registrarlo primero.";
              ?>
            </div>
            <div class="modal-footer">
              <button class="btn btn-danger" onclick="location.href='vehiculo.php'">Cerrar</button>
            </div> 
          </div>
        </div>
        <?php
    } else {
        // Ambos, conductor y propietario, existen
        // Inserta datos en la tabla vehiculo de la base de datos acme
        $sql = "INSERT INTO vehiculo (id_placa, color, marca, tipo, id_conductor, id_propietario) VALUES ('$id_placa', '$color', '$marca', '$tipo', '$id_conductor', '$id_propietario')";

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
                  <button class="close" onclick="location.href='menu.php'">&times;</button>
                </div>
                <div class="modal-body">
                  Información actualizada con éxito
                </div>
                <div class="modal-footer">
                  <button class="btn btn-danger" onclick="location.href='menu.php'">Cerrar</button>
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
                  <button class="close" onclick="location.href='vehiculo.php'">&times;</button>
                </div>
                <div class="modal-body">
                  <?php
                  echo "Hay un error actualizando la información: " . mysqli_error($conn);
                  ?>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-danger" onclick="location.href='vehiculo.php'">Cerrar</button>
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

