<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acme S.A</title>
  <link rel="icon" type="image/jpg" href="https://www.runt.com.co/sites/default/files/images/Como-crear-empresa-logistica.jpg">
</head>
<body>
  <nav class="menu">
    <ul>
      <li><a href="menu.php">Inicio</a></li>
      <li><a href="conductor.php">Registrarme</a></li>
      <li>
        <a href="#">Consultar</a>
        <ul class="submenu">
          <li><a href="consultas/consulta_vehiculo.php">Vehículo</a></li>
          <li><a href="consultas/consulta_conductor.php">Conductor</a></li>
          <li><a href="consultas/consulta_propietario.php">Propietario</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Eliminar</a>
        <ul class="submenu">
          <li><a href="eliminar/eliminar_vehiculo.php">Vehículo</a></li>
          <li><a href="eliminar/eliminar_conductor.php">Conductor</a></li>
          <li><a href="eliminar/eliminar_propietario.php">Propietario</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Actualizar</a>
        <ul class="submenu">
          <li><a href="actualizar/actualizar_vehiculo.php">Vehículo</a></li>
          <li><a href="actualizar/actualizar_conductor.php">Conductor</a></li>
          <li><a href="actualizar/actualizar_propietario.php">Propietario</a></li>
        </ul>
      </li>
      <li>
        <a href="#">Informe</a>
        <ul class="submenu">
          <li><a href="informe.php">Individual</a></li>
          <li><a href="general.php">General</a></li>
        </ul>
      </li>
    </ul>
  </nav>
</body>

</html>
<style>
body {
	margin: 0;
	padding: 0;
  background-image: url("imagen/fondo.jpg");
  }
  
  /* estilo del menu */
  .menu {
    background-color: #333;
    color: #fff;
    padding: 20px;
    font-size: 30px;
    font-weight:bold;
  }
  .menu ul {
	list-style: none;
  margin:0;
  padding:0;
  }
  .menu li {
	display: inline-block;
	position: relative;
  
  }
  nav ul li a {
    text-decoration: none;
    display:block;
  }
  .menu a {
    background-color: #333;
    color: #FAFAF9;
    padding: 10px;
    text-align: center;
    font-weight: bold;
  }
  a:hover {
    background-color: #9B9B96;
  }
  /* Estilos para los submenús */
  nav .submenu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #333;
    padding: 10px 20px;
  }
  
  nav .submenu li {
    width: 100%;
  }
  
  nav li:hover .submenu {
    display: block;
  }
  
  nav .submenu a {
    padding: 10px 20px;
    color: white;
  }
  
  nav .submenu a:hover {
    background-color: #666;
  }
 
</style>
  

