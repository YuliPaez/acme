<!DOCTYPE html>
<html>
<head>
  <title>Consultar conductor</title>
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
      margin: 300px;
      background:#A2D9CE ;
    }

    h1 {
      text-align: center;
    }

    form {
      text-align: center;
    }

    input[type="text"] {
      width: 300px;
      padding: 5px;
      font-size: 16px;
    }

    input[type="submit"] {
      background:blue;
      padding: 10px 20px;
      font-size: 16px;
      color: #FAFAF9;
      font-weight: bolder;
    }

    #results {
      margin-top: 20px;
      border: 1px solid #ccc;
      padding: 20px;
    }
  </style>
</head>
<body>
  <h1>Consultar información de los conductores</h1>
  <form action="buscarconductor.php" method="POST" onsubmit="return validarFormulario()">
    <input type="text" name="searchInput" name="id" id="searchInput" placeholder="Introduzca la cedula del conductor">
    <input type="submit" value="Consultar">
  </form>

  <div id="results"></div>

  <script>
    function searchProduct() {
      // Evitar que se envíe el formulario de forma predeterminada
      event.preventDefault();

      // Obtener el valor ingresado en el campo de búsqueda
      var searchInput = document.getElementById("searchInput").value;

      // Realizar la solicitud AJAX para buscar la información en buscarconductor.php
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "buscarconductor.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById("results").innerHTML = xhr.responseText;
        }
      };
      xhr.send("searchInput=" + searchInput);
    }
    function validarFormulario() {
      var cedula_conductor = document.getElementById("searchInput").value;

      if (cedula_conductor == "") {
        alert("Por favor, ingresa la cedula del conductor del vehículo.");
        return false;
      }

      return true;
    }
  </script>
</body>
    <a href="../menu.php" class="volver-atras">
      <img src="https://cdn-icons-png.flaticon.com/512/3588/3588230.png" alt="Volver atrás">
    </a>
</html>