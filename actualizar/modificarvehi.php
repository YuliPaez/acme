<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar Información del vehículo</title>
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
      background:#A2D9CE ;
    }

    h2 {
      font-family: lemon, sans-serif;
      font-size: 30px;
      color: red;
    }

    label {
      font-family: verdana, sans-serif;
      font-size: 20px;
      color: black;
    }

    .btn-default {
      background: #E74C3C;
      transform: translateX(370%);
    }
  </style>
</head>
<body background="#A2D9CE">
<?php
// Establecer la conexión a la base de datos
require('../config.php');

// Guardar la variable consultada
$searchInput = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $placa = $_POST['searchInput'];
   //Ejecuta la consulta
  $sql = "SELECT id_placa, color, marca, tipo, id_conductor, id_propietario FROM vehiculo WHERE id_placa='$placa'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="container">
  <br><br>
  <h2>Actualizar datos del vehículo</h2>

  <form class="form-horizontal" action="actualizarv.php" role="form" method="POST" onsubmit="return validarFormulario()">
    <div class="input">
      <label>Placa del vehículo:</label>
      <input type="text" class="form-control" value="<?php echo $row['id_placa'] ?>" name="placavehi" id="placavehi" placeholder="Ingrese la placa de su vehiculo">
    </div>

    <div class="input">
      <label>Color del vehículo:</label>
      <input type="text" class="form-control" value="<?php echo $row['color'] ?>" name="colorvehi" id="colorvehi" placeholder="Ingrese el color de su vehiculo">
    </div>

    <div class="input">
      <label>Marca del vehículo:</label>
      <input type="text" class="form-control" value="<?php echo $row['marca'] ?>" name="marcavehi" id="marcavehi" placeholder="Ingrese la marca de su vehiculo">
    </div>

    <div class="input">
      <label>Tipo del vehículo (particular o público):</label>
      <input type="text" class="form-control" value="<?php echo $row['tipo'] ?>" name="tipovehi" id="tipovehi" placeholder="Ingrese el tipo de vehiculo">
    </div>

    <div class="input">
      <label>Cédula del conductor:</label>
      <input type="text" class="form-control" value="<?php echo $row['id_conductor'] ?>" name="id_conductorv"  id="id_conductorv" placeholder="Ingrese la cedula del conductor">
    </div>

    <div class="input">
      <label>Cédula del propietario:</label>
      <input type="text" class="form-control" value="<?php echo $row['id_propietario'] ?>" name="id_propietariov" id="id_propietariov" placeholder="Ingrese la cedula del propietario">
    </div>

    <p></p>
    <p></p>

    <p></p>
    <p></p>
    <br>
    <button type="button" name="cancel" class="btn btn-default" onclick="window.location.href='actualizar_vehiculo.php'">Cancelar</button>
    <button type="submit" name="submit" class="btn btn-default">Actualizar datos</button>
  </form>
  <script>
    function validarFormulario() {
      var placa_vehiculo = document.getElementById("placavehi").value;
      var color_vehiculo = document.getElementById("colorvehi").value;
      var marca_vehiculo = document.getElementById("marcavehi").value;
      var tipo_vehiculo = document.getElementById("tipovehi").value;
      var cedula_conductor = document.getElementById("id_conductorv").value;
      var cedula_propietario = document.getElementById("id_propietariov").value;

      if (placa_vehiculo == "") {
        alert("Por favor, ingresa la placa del vehículo.");
        return false;
      }
      if (color_vehiculo == "") {
        alert("Por favor, ingresa el color del vehículo.");
        return false;
      }
      if (marca_vehiculo == "") {
        alert("Por favor, ingresa la marca del vehículo.");
        return false;
      }
      if (tipo_vehiculo == "") {
        alert("Por favor, ingresa el tipo del vehículo.");
        return false;
      }
      if (cedula_conductor == "") {
        alert("Por favor, ingresa la cedula del conductor.");
        return false;
      }
      if (cedula_propietario == "") {
        alert("Por favor, ingresa la cedula del propietario.");
        return false;
      }

      return true;
    }
  </script>
</div>
<p></p>
<p></p>
<?php
    }
  } else {
    ?>
    <style>
      .modal-header {
        background: #E74C3C;
      }
    </style>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Error</h4>
          <button class="close" onclick="location.href='actualizar_vehiculo.php'">&times;</button>
        </div>
        <div class="modal-body">
          <?php
          echo "Este vehiculo no está registrado.";
          ?>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='actualizar_vehiculo.php'">Cerrar</button>
        </div>
      </div>
    </div>
    <?php
  }
  mysqli_close($conn);
}
?>
</body>
</html>

