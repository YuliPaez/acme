<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Actualizar Información del propietario</title>
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
require('../menu/config.php');

//Guarda la variable consultada
$searchInput = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $cedula = $_POST['searchInput'];
  //Ejecuta la consulta
  $sql = "SELECT cedulapropietario, primernombrepropietario, segundonombrepropietario, apellidospropietario, direccionpropietario, 	telefonopropietario, ciudadpropietario FROM propietarios WHERE cedulapropietario='$cedula'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="container">
  <br><br>
  <h2>Actualizar datos del propietario</h2>

  <form class="form-horizontal" action="actualizarp.php" role="form" method="POST" onsubmit="return validarFormulario()">
    <div class="input">
      <label>Cédula del conductor:</label>
      <input type="text" class="form-control" value="<?php echo $row['cedulapropietario'] ?>" name="cedulaprop" id="cedulaprop" placeholder="Ingrese la cedula">
    </div>

    <div class="input">
      <label>Primer nombre:</label>
      <input type="text" class="form-control" value="<?php echo $row['primernombrepropietario'] ?>" name="primernombreprop" id="primernombreprop" placeholder="Ingrese su primer nombre">
    </div>

    <div class="input">
      <label>Segundo nombre:</label>
      <input type="text" class="form-control" value="<?php echo $row['segundonombrepropietario'] ?>" name="segundonombreprop" id="segundonombreprop" placeholder="Ingrese su segundo nombre">
    </div>

    <div class="input">
      <label>Apellidos:</label>
      <input type="text" class="form-control" value="<?php echo $row['apellidospropietario'] ?>" name="apellidosprop" id="apellidosprop" placeholder="Ingrese sus apellidos">
    </div>

    <div class="input">
      <label>Dirección:</label>
      <input type="text" class="form-control" value="<?php echo $row['direccionpropietario'] ?>" name="direccionprop" id="direccionprop" placeholder="Ingrese su direccion">
    </div>

    <div class="input">
      <label>Télefono:</label>
      <input type="text" class="form-control" value="<?php echo $row['telefonopropietario'] ?>" name="telefonoprop" id="telefonoprop" placeholder="Ingrese su telefono">
    </div>

    <div class="input">
      <label>Ciudad:</label>
      <input type="text" class="form-control" value="<?php echo $row['ciudadpropietario'] ?>" name="ciudadprop" id="ciudadprop" placeholder="Ingrese su ciudad">
    </div>

    <p></p>
    <p></p>

    <p></p>
    <p></p>
    <br>
    <button type="button" name="cancel" class="btn btn-default" onclick="window.location.href='actualizar_propietario.php'">Cancelar</button>
    <button type="submit" name="submit" class="btn btn-default">Actualizar datos</button>
  </form>
  <script>
    function validarFormulario() {
      var cedula_propietario = document.getElementById("cedulaprop").value;
      var primer_nombre = document.getElementById("primernombreprop").value;
      var segundo_nombre = document.getElementById("segundonombreprop").value;
      var apellidos_propietario = document.getElementById("apellidosprop").value;
      var direccion_propietario = document.getElementById("direccionprop").value;
      var telefono_propietario = document.getElementById("telefonoprop").value;
      var ciudad_propietario = document.getElementById("ciudadprop").value;

      if (cedula_propietario == "") {
        alert("Por favor, ingresa la cedula del propietario del vehículo.");
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
      if (apellidos_propietario == "") {
        alert("Por favor, ingresa sus apellidos.");
        return false;
      }
      if (direccion_propietario == "") {
        alert("Por favor, ingresa tu dirección.");
        return false;
      }
      if (telefono_propietario == "") {
        alert("Por favor, ingresa tu telefono.");
        return false;
      }
      if (ciudad_propietario == "") {
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
          <button class="close" onclick="location.href='actualizar_propietario.php'">&times;</button>
        </div>
        <div class="modal-body">
          <?php
          echo "Este  no está registrado.";
          ?>
        </div>
        <div class="modal-footer">
          <button class="btn btn-danger" onclick="location.href='actualizar_propietario.php'">Cerrar</button>
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
