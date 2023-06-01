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
<h2>Registrar Propietario:</h2>
<form class="form-horizontal" action="guardarpropietario.php" role="form" method="POST" onsubmit="return validarFormulario()">
  <label for="cedulapropietario">Cédula propietario:</label>
    <input type="text" id="cedulapropietario" name="cedulapropietario">

    <label for="primernombrepropietario">Primer nombre:</label>
    <input type="text" id="primernombrepropietario" name="primernombrepropietario">

    <label for="segundonombrepropietario">Segundo nombre:</label>
    <input type="text" id="segundonombrepropietario" name="segundonombrepropietario">

    <label for="apellidospropietario">Apellidos:</label>
    <input type="text" id="apellidospropietario" name="apellidospropietario">

    <label for="direccionpropietario">Dirección:</label>
    <input type="text" id="direccionpropietario" name="direccionpropietario">

    <label for="telefonopropietario">Télefono:</label>
    <input type="text" id="telefonopropietario" name="telefonopropietario">

    <label for="ciudadpropietario">Ciudad:</label>
    <input type="text" id="ciudadpropietario" name="ciudadpropietario">
    <input type="submit" href=""  value="Registrar">
  </form>
  <script>

function validarFormulario() {
  var cedula_propietario = document.getElementById("cedulapropietario").value;
  var primer_nombre = document.getElementById("primernombrepropietario").value;
  var segundo_nombre = document.getElementById("segundonombrepropietario").value;
  var apellidos = document.getElementById("apellidospropietario").value;
  var direccion = document.getElementById("direccionpropietario").value;
  var telefono = document.getElementById("telefonopropietario").value;
  var ciudad = document.getElementById("ciudadpropietario").value;
  
  // Realiza las validaciones necesarias
  if (cedula_propietario == "") {
    alert("Por favor, ingresa la cedula del propietario.");
    return false; // Detiene el envío del formulario
  }
  
  if (primer_nombre == "") {
    alert("Por favor, ingresa tu primer nombre.");
    return false; // Detiene el envío del formulario
  }

  if (segundo_nombre == "") {
    alert("Por favor, ingresa tu segundo nombre.");
    return false; // Detiene el envío del formulario
  }

  if (apellidos == "") {
    alert("Por favor, ingresa tus apellidos.");
    return false; // Detiene el envío del formulario
  }

  if (direccion == "") {
    alert("Por favor, ingresa tu dirección.");
    return false; // Detiene el envío del formulario
  }

  if (telefono == "") {
    alert("Por favor, ingresa tu teléfono.");
    return false; // Detiene el envío del formulario
  }
  if (ciudad == "") {
    alert("Por favor, ingresa tu ciudad.");
    return false; // Detiene el envío del formulario
  }
  
  // Si todas las validaciones pasan, puedes enviar el formulario
  return true;
}
</script>
  </body>
</html>