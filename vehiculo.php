<!DOCTYPE html>
<html>
<head>
  <title>Registrar</title>
  <style>
    body {
      font-family: Arial, sans-serif;
	    background:#A2D9CE ;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }
    h1{
      color: red; 
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"],
    select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px;
      transform: translateX(830%);
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <h1>Empresa de transportes ACME S.A</h1>
  <h2>Registrar Vehículo:</h2>
  <form class="form-horizontal" action="guardarvehiculo.php" role="form" method="POST" onsubmit="return validarFormulario()">
  
    <label for="id_placa">Placa:</label>
    <input type="text" id="id_placa" name="id_placa">

    <label for="color">Color:</label>
    <input type="text" id="color" name="color">

    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca">

    <label for="tipo">Tipo de vehículo(Particular o Público):</label>
    <input type="text" id="tipo" name="tipo">

    <label for="id_conductor">ID conductor:</label>
    <input type="text" id="id_conductor" name="id_conductor"  placeholder="Cedula del conductor">

    <label for="id_propietario">ID propietario:</label>
    <input type="text" id="id_propietario" name="id_propietario"  placeholder="Cedula del propietario">
    <input type="submit" href=""  value="Registrar">
</form>
<script>

function validarFormulario() {
  var placa = document.getElementById("id_placa").value;
  var color = document.getElementById("color").value;
  var marca = document.getElementById("marca").value;
  var tipo_vehiculo = document.getElementById("tipo").value;
  var cedula_conductor = document.getElementById("id_conductor").value;
  var cedula_propietario = document.getElementById("id_propietario").value;
  
  // Realiza las validaciones necesarias
  if (placa == "") {
    alert("Por favor, ingresa la placa de tu vehículo.");
    return false; // Detiene el envío del formulario
  }
  
  if (color == "") {
    alert("Por favor, ingresa el color de tu vehículo.");
    return false; // Detiene el envío del formulario
  }

  if (marca == "") {
    alert("Por favor, ingresa la marca de tu vehículo.");
    return false; // Detiene el envío del formulario
  }

  if (tipo_vehiculo == "") {
    alert("Por favor, ingresa el tipo de tu vehículo.");
    return false; // Detiene el envío del formulario
  }

  if (cedula_conductor == "") {
    alert("Por favor, ingresa la cedula del conductor.");
    return false; // Detiene el envío del formulario
  }

  if (cedula_propietario == "") {
    alert("Por favor, ingresa la cedula del propietario.");
    return false; // Detiene el envío del formulario
  }
  
  // Si todas las validaciones pasan, puedes enviar el formulario
  return true;
}
</script>
</body>
</html>