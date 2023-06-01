<?php
require('C:\AppServ\www\acme\fpdf\fpdf.php');
date_default_timezone_set("America/Bogota");
// Crear una instancia de TCPDF
$pdf = new FPDF();

// Agregar una página
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Ln(10);
$pdf->Cell(100,20,utf8_decode('INFORME GENERAL ACME'));
$pdf->Ln(20);
$pdf->Cell(90,20,'Fecha: '.date('d/m/Y'),0);
$pdf->Cell(90,20,'Hora: '.date('H:i:s'),0);
$pdf->Ln(10);

// Establecer la conexión a la base de datos
require('config.php');

// Consulta para obtener los datos de los vehículos
$query_vehiculos = "SELECT * FROM vehiculo";
$result_vehiculos = mysqli_query($conn, $query_vehiculos);

// Consulta para obtener los datos de los conductores
$query_conductores = "SELECT * FROM conductores";
$result_conductores = mysqli_query($conn, $query_conductores);

// Consulta para obtener los datos de los propietarios
$query_propietarios = "SELECT * FROM propietarios";
$result_propietarios = mysqli_query($conn, $query_propietarios);

// Crear la primera tabla para los datos de los vehículos
$pdf->Ln(10);
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 10,utf8_decode('Vehículos registrados'), 0, 1, 'L');
$pdf->Ln(5);

$pdf->SetFont('Helvetica', '', 10);

// Cabecera de la tabla de vehículos
$pdf->Cell(20, 10, 'Placa', 1, 0, 'C');
$pdf->Cell(24, 10, 'Color', 1, 0, 'C');
$pdf->Cell(28, 10, 'Marca', 1, 0, 'C');
$pdf->Cell(32, 10,utf8_decode('Tipo de vehículo'), 1, 0, 'C');
$pdf->Cell(36, 10,utf8_decode('Cédula conductor'), 1, 0, 'C');
$pdf->Cell(40, 10,utf8_decode('Cédula propietario'), 1, 1, 'C');

// Mostrar los datos de los vehículos
while ($row = mysqli_fetch_assoc($result_vehiculos)) {
    $pdf->Cell(20, 10,$row['id_placa'], 1, 0, 'C');
    $pdf->Cell(24, 10,utf8_encode($row['color']), 1, 0, 'C');
    $pdf->Cell(28, 10,utf8_encode($row['marca']), 1, 0, 'C');
    $pdf->Cell(32, 10,utf8_decode($row['tipo']), 1, 0, 'C');
    $pdf->Cell(36, 10, $row['id_conductor'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['id_propietario'], 1, 1, 'C');
}

$pdf->Ln(10);

// Crear la segunda tabla para los datos de los conductores
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Conductores registrados', 0, 1, 'L');
$pdf->Ln(5);

$pdf->SetFont('Helvetica', '', 10);

// Cabecera de la tabla de conductores
$pdf->Cell(20, 10,utf8_decode('Cédula'), 1, 0, 'C');
$pdf->Cell(40, 10,utf8_decode('Nombre completo'), 1, 0, 'C');
$pdf->Cell(40, 10,utf8_decode('Dirección'), 1, 0, 'C');
$pdf->Cell(45, 10,utf8_decode('Teléfono'), 1, 0, 'C');
$pdf->Cell(47, 10, 'Ciudad', 1, 1, 'C');

// Mostrar los datos de los conductores
while ($row = mysqli_fetch_assoc($result_conductores)) {
    $nombre_completo = $row['primernombreconductor'] . ' ' . $row['segundonombreconductor'] . ' ' . $row['apellidosconductor'];

    $pdf->Cell(20, 10, $row['cedulaconductor'], 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_decode($nombre_completo), 1, 0, 'C');
    $pdf->Cell(40, 10, utf8_encode($row['direccionconductor']), 1, 0, 'C');
    $pdf->Cell(45, 10,$row['telefonoconductor'], 1, 0, 'C');
    $pdf->Cell(47, 10,utf8_encode($row['ciudadconductor']), 1, 1, 'C');
}

$pdf->Ln(10);

// Crear la tercera tabla para los datos de los propietarios
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Propietarios registrados', 0, 1, 'L');
$pdf->Ln(5);

$pdf->SetFont('Helvetica', '', 10);

// Cabecera de la tabla de propietarios
$pdf->Cell(20, 10,utf8_decode('Cédula'), 1, 0, 'C');
$pdf->Cell(40, 10, 'Nombre completo', 1, 0, 'C');
$pdf->Cell(40, 10,utf8_decode('Dirección'), 1, 0, 'C');
$pdf->Cell(45, 10,utf8_decode('Teléfono'), 1, 0, 'C');
$pdf->Cell(47, 10, 'Ciudad', 1, 1, 'C');

// Mostrar los datos de los propietarios
while ($row = mysqli_fetch_assoc($result_propietarios)) {
    $nombre_completo = $row['primernombrepropietario'] . ' ' . $row['segundonombrepropietario'] . ' ' . $row['apellidospropietario'];

    $pdf->Cell(20, 10, $row['cedulapropietario'], 1, 0, 'C');
    $pdf->Cell(40, 10,utf8_decode($nombre_completo), 1, 0, 'C');
    $pdf->Cell(40, 10,utf8_encode($row['direccionpropietario']), 1, 0, 'C');
    $pdf->Cell(45, 10, $row['telefonopropietario'], 1, 0, 'C');
    $pdf->Cell(47, 10,utf8_encode($row['ciudadpropietario']), 1, 1, 'C');
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);

// Salida del PDF
$pdf->Output();
?>
