<?php
session_start();
if ($_SESSION['Roles_idRoles']==1) { 
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../logo/logoFD(3).png',17,8,33);
    // Arial bold 15
    $this->SetFont('Arial','',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,utf8_decode('Reporte los 10 más vendido'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(90,10,'Id productos',1,0,'C',0);

    $this->Cell(100,10,'Nombre',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


require '../crud/conexion.php';

$consul=mysqli_query($con,"SELECT idProductos,idVentas,descripcion,imagen,nombre,Productos_idProductos, COUNT(Productos_idProductos) from ventas INNER JOIN productos WHERE ventas.Productos_idProductos=idProductos
Group by Productos_idProductos 
Order by count(1) desc LIMIT 10");

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',9);
// $pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));

        while($f=mysqli_fetch_array($consul)){
         //   $pdf->Cell(20,10, $f['imagen'],1,0,'C',0);
           $pdf->Cell(90,10, $f['idProductos'],1,0,'C',0);
           $pdf->Cell(100,10, $f['nombre'],1,1,'C',0);
         //   $pdf->MultiCell(200,40, $f['descripcion'],1,1,'C',0);
          
           
        //    $pdf->Cell(20,10, $row['juego_idJuego'],1,0,'C',0);
         //   $pdf->Cell(100,60, $f['descripcion'],1,1,'C',0);
        //    $pdf->Cell(90,10, $row['descripcion'],1,0,'C',0);
         //   $pdf->Cell(40,10, $row['valorunitario'],1,0,'C',0);
         //   $pdf->Cell(30,10, $row['cantidad'],1,1,'C',0);
        }


$pdf->Output();
}else{
   header("Location:../inicio.php");
}
?>