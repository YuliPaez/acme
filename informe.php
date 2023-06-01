<?php
require('C:\AppServ\www\acme\fpdf\fpdf.php');
date_default_timezone_set("America/Bogota");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Ln(10);
$pdf->Cell(100,20,utf8_decode('INFORME INDIVIDUAL ACME'));
$pdf->Ln(20);
$pdf->Cell(90,20,'Fecha: '.date('d/m/Y'),0);
$pdf->Cell(90,20,'Hora: '.date('H:i:s'),0);
$pdf->Ln(20);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,20,'Placa',1,0,"C");
$pdf->Cell(25,20,'Marca',1,0,"C");
$pdf->Cell(60,20,'Nombre del conductor',1,0,"C");
$pdf->Cell(70,20,'Nombre del propietario',1,1,"C");

// Establecer la conexión a la base de datos
require('config.php');

//Selecciona los datos de las tablas vehiculo, conductores y propietarios
$sql = "SELECT vehi.id_placa, vehi.marca, conduc.primernombreconductor, conduc.segundonombreconductor, conduc.apellidosconductor, prop.primernombrepropietario, prop.segundonombrepropietario, prop.apellidospropietario
        FROM vehiculo vehi
        INNER JOIN conductores conduc ON vehi.id_conductor = conduc.cedulaconductor
        INNER JOIN propietarios prop ON vehi.id_propietario = prop.cedulapropietario";
$result = mysqli_query($conn, $sql);

//Si se encuentran resultados va a imprimir lo siguiente
if (mysqli_num_rows($result) > 0) {
    while ($reg = mysqli_fetch_assoc($result)) {
        $pdf->Cell(20, 20, $reg['id_placa'], 1, 0, 'C');
        $pdf->Cell(25, 20, utf8_decode($reg['marca']), 1, 0, 'C');
        $pdf->Cell(60, 20, utf8_decode($reg['primernombreconductor'] . ' ' . $reg['segundonombreconductor'] . ' ' . $reg['apellidosconductor']), 1, 0, 'C');
        $pdf->Cell(70, 20, utf8_decode($reg['primernombrepropietario'] . ' ' . $reg['segundonombrepropietario'] . ' ' . $reg['apellidospropietario']), 1, 1, 'C');
    }
}

$pdf->Output();
mysqli_close($conn);
?>
