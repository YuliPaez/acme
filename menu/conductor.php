<!DOCTYPE html>
<html>
<head>
  <title>Registrar</title>
  <style>
    .volver-atras {
      float:left;
      margin-left: 10px;
      padding: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
      text-decoration: none;
      color: #333;
      font-size: 12px;
      align-items: center;
    }
    .volver-atras img {
      width: 80px;
      height: 80px;
      vertical-align: middle;
      margin-right: 5px;
    }
    body {
      font-family: Arial, sans-serif;
	  background:#A2D9CE ;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    h1 {
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
  <h2>Registrar Conductor:</h2>

  <form class="form-horizontal" action="guardarconductor.php" role="form" method="POST" onsubmit="return validarFormulario()">

    <label for="cedulaconductor">Cédula conductor:</label>
    <input type="text" id="cedulaconductor" name="cedulaconductor">

    <label for="primernombreconductor">Primer nombre:</label>
    <input type="text" id="primernombreconductor" name="primernombreconductor">

    <label for="segundonombreconductor">Segundo nombre:</label>
    <input type="text" id="segundonombreconductor" name="segundonombreconductor">

    <label for="apellidosconductor">Apellidos:</label>
    <input type="text" id="apellidosconductor" name="apellidosconductor">

    <label for="direccionconductor">Dirección:</label>
    <input type="text" id="direccionconductor" name="direccionconductor">

    <label for="telefonoconductor">Télefono:</label>
    <input type="text" id="telefonoconductor" name="telefonoconductor">

    <label for="ciudadconductor">Ciudad:</label>
    <input type="text" id="ciudadconductor" name="ciudadconductor">

    <input type="submit" value="Registrar">

  </form>
  <script>

function validarFormulario() {
  var cedula_conductor = document.getElementById("cedulaconductor").value;
  var primer_nombre = document.getElementById("primernombreconductor").value;
  var segundo_nombre = document.getElementById("segundonombreconductor").value;
  var apellidos = document.getElementById("apellidosconductor").value;
  var direccion = document.getElementById("direccionconductor").value;
  var telefono = document.getElementById("telefonoconductor").value;
  var ciudad = document.getElementById("ciudadconductor").value;
  
  // Realiza las validaciones necesarias
  if (cedula_conductor == "") {
    alert("Por favor, ingresa la cedula del conductor.");
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
    <a href="javascript:history.go(-1)" class="volver-atras">
      <img src="https://cdn-icons-png.flaticon.com/512/3588/3588230.png" alt="Volver atrás">
    </a>
</html>
