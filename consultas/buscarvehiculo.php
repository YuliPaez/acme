<?php
// Establecer la conexión a la base de datos
require('../menu/config.php');

$searchInput =$_POST['id'];
// Obtener la placa enviada desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchInput = $_POST["searchInput"];

    // Consultar la información del vehículo en la base de datos
    $sql = "SELECT vehi.id_placa, vehi.color, vehi.marca, vehi.tipo,
        conduc.cedulaconductor,conduc.primernombreconductor, conduc.segundonombreconductor, conduc.apellidosconductor, conduc.direccionconductor AS direccionconductor, conduc.telefonoconductor AS telefonoconductor, conduc.ciudadconductor AS ciudadconductor,
        prop.cedulapropietario,prop.primernombrepropietario, prop.segundonombrepropietario, prop.apellidospropietario, prop.direccionpropietario, prop.telefonopropietario, prop.ciudadpropietario
        FROM vehiculo vehi
        INNER JOIN conductores conduc ON vehi.id_conductor = conduc.cedulaconductor
        INNER JOIN propietarios prop ON vehi.id_propietario = prop.cedulapropietario
        WHERE id_placa = ?";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("s", $searchInput);
     $stmt->execute();
     $result = $stmt->get_result();


    if ($result) {
        // establece el estilo de la tabla que muestra la consulta
        echo "<style>
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
            justify-content: flex-start;
            }
            .volver-atras img {
            width: 80px;
            height: 80px;
            margin-right: 5px;
            vertical-align: middle;
            }
            body{
                background: #A2D9CE ;
            }
            table {
                border-collapse: collapse;
                width: 100%;
                border: 3px solid black;
            }
        
            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 3px solid black;
            }
        
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
        
            th {
                background-color: blue;
                color: white;
                border: 3px solid black;
            }
            caption {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 10px;
            }
            td{
                border: 3px solid black;
            }
        </style>";  
        echo "<table>";
        echo "<caption>Información de vehículos</caption>";
        echo "<tr>
                <th>ID Placa</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Cédula conductor</th>
                <th>Nombre completo</th>
                <th></th>
                <th></th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Cédula propietario</th>
                <th>Nombre completo</th>
                <th></th>
                <th></th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
            //muestra los resultados consultados de la celda de datos de la tabla
            echo "<tr>
                    <td>".$row["id_placa"]."</td>
                    <td>".$row["color"]."</td>
                    <td>".$row["marca"]."</td>
                    <td>".$row["tipo"]."</td>
                    <td>".$row["cedulaconductor"]."</td>
                    <td>".$row["primernombreconductor"]." ".$row["segundonombreconductor"]." ".$row["apellidosconductor"]."</td>
                    <td></td>
                    <td></td>
                    <td>".$row["direccionconductor"]."</td>
                    <td>".$row["telefonoconductor"]."</td>
                    <td>".$row["ciudadconductor"]."</td>
                    <td>".$row["cedulapropietario"]."</td>
                    <td>".$row["primernombrepropietario"]." ".$row["segundonombrepropietario"]." ".$row["apellidospropietario"]."</td>
                    <td></td>
                    <td></td>
                    <td>".$row["direccionpropietario"]."</td>
                    <td>".$row["telefonopropietario"]."</td>
                    <td>".$row["ciudadpropietario"]."</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "Error en la consulta: ".$conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <a href="javascript:history.go(-1)" class="volver-atras">
      <img src="https://cdn-icons-png.flaticon.com/512/3588/3588230.png" alt="Volver atrás">
    </a>
</html>

