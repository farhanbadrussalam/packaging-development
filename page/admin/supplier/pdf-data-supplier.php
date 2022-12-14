<?php
// memanggil library FPDF
include('../../../fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../../../image/logo combiphar ungu.png',165,8,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->Ln(8);
    // Move to the right
    $this->Cell(85);
        // Title
    $this->Cell(20,10,'LAPORAN DATA SUPPLIER',0,0,'C');
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,7,'',0,1,'C');
for($i=1;$i<=40;$i++)
   
$pdf->SetFont('Arial','B',8);
$pdf->Cell(26,6,'KODE SUPPLIER',1,0);
$pdf->Cell(60,6,'NAMA SUPPLIER',1,0);
$pdf->Cell(70,6,'ALAMAT SUPPLIER',1,0);
$pdf->Cell(30,6,'TELEPON',1,1);

$pdf->SetFont('Arial','',7);

include ("../../../system/koneksi.php");
$produk = mysqli_query($db, "SELECT * FROM tb_supplier");
while ($row = mysqli_fetch_array($produk)){
    $pdf->Cell(26,6,$row['kd_supplier'],1,0);
    $pdf->Cell(60,6,$row['nama_supplier'],1,0);
    $pdf->Cell(70,6,$row['alamat_supplier'],1,0);
    $pdf->Cell(30,6,$row['no_telepon'],1,1);
   
}

$pdf->Output();


?>