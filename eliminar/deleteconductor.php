<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Eliminar Información del conductor</title>
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

//Guarda la variable consultada
$searchInput = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cedula = $_POST['searchInput'];
  //Ejecuta la consulta
  $sql = "SELECT cedulaconductor, primernombreconductor, segundonombreconductor, apellidosconductor, direccionconductor, telefonoconductor, ciudadconductor FROM conductores WHERE cedulaconductor='$cedula'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="container">
  <br><br>
  <h2>Eliminar datos del conductor</h2>

  <form class="form-horizontal" action="eliminarc.php" role="form" method="POST" onsubmit="return validarFormulario()">
    <div class="input">
      <label>Cédula del conductor:</label>
      <input type="text" class="form-control" value="<?php echo $row['cedulaconductor'] ?>" name="cedulaconduc" placeholder="Ingrese la cedula" id="cedulaconduc">
    </div>

    <div class="input">
      <label>Primer nombre:</label>
      <input type="text" class="form-control" value="<?php echo $row['primernombreconductor'] ?>" name="primernombreconduc" placeholder="Ingrese su primer nombre" id="primernombreconduc">
    </div>

    <div class="input">
      <label>Segundo nombre:</label>
      <input type="text" class="form-control" value="<?php echo $row['segundonombreconductor'] ?>" name="segundonombreconduc" placeholder="Ingrese su segundo nombre" id="segundonombreconduc">
    </div>

    <div class="input">
      <label>Apellidos:</label>
      <input type="text" class="form-control" value="<?php echo $row['apellidosconductor'] ?>" name="apellidosconduc" placeholder="Ingrese sus apellidos" id="apellidosconduc">
    </div>

    <div class="input">
      <label>Dirección:</label>
      <input type="text" class="form-control" value="<?php echo $row['direccionconductor'] ?>" name="direccionconduc" placeholder="Ingrese su direccion" id="direccionconduc">
    </div>

    <div class="input">
      <label>Teléfono:</label>
      <input type="text" class="form-control" value="<?php echo $row['telefonoconductor'] ?>" name="telefonoconduc" placeholder="Ingrese su telefono" id="telefonoconduc">
    </div>

    <div class="input">
      <label>Ciudad:</label>
      <input type="text" class="form-control" value="<?php echo $row['ciudadconductor'] ?>" name="ciudadconduc" placeholder="Ingrese su ciudad" id="ciudadconduc">
    </div>

    <p></p>
    <p></p>

    <p></p>
    <p></p>
    <br>
    <button type="button" name="cancel" class="btn btn-default" onclick="window.location.href='eliminar_conductor.php'">Cancelar</button>
    <button type="submit" name="submit" class="btn btn-default">Eliminar datos</button>
  </form>
  <script>
    function validarFormulario() {
      var cedula_conductor = document.getElementById("cedulaconduc").value;
      var primer_nombre = document.getElementById("primernombreconduc").value;
      var segundo_nombre = document.getElementById("segundonombreconduc").value;
      var apellidos_conductor = document.getElementById("apellidosconduc").value;
      var direccion_conductor = document.getElementById("direccionconduc").value;
      var telefono_conductor = document.getElementById("telefonoconduc").value;
      var ciudad_conductor = document.getElementById("ciudadconduc").value;

      if (cedula_conductor == "") {
        alert("Por favor, ingresa la cedula del conductor del vehículo.");
        return false;
      }
      if (primer_nombre == "") {
        alert("Por favor, ingresa su primer nombre.");
        return false;
      }
      if (segundo_nombre == "") {
        alert("Por favor, ingresa su segundo nombre.");
        return false;
      }
      if (apellidos_conductor == "") {
        alert("Por favor, ingresa sus apellidos.");
        return false;
      }
      if (direccion_conductor == "") {
        alert("Por favor, ingresa tu dirección.");
        return false;
      }
      if (telefono_conductor == "") {
        alert("Por favor, ingresa tu telefono.");
        return false;
      }
      if (ciudad_conductor == "") {
        alert("Por favor, ingresa tu ciudad.");
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
          <button class="close" onclick="location.href='eliminar_conductor.php'">&times;</button>
        </div>
        <div class="modal-body">
          <?php
          echo "Este conductor no está registrado.";
          ?>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='eliminar_conductor.php'">Cerrar</button>
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

