<?php
// memanggil library FPDF
require("../../../fpdf.php");

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image("../../image/logo combiphar ungu.png",165,8,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->Ln(8);
    // Move to the right
    $this->Cell(85);
        // Title
    $this->Cell(20,10,'LAPORAN DATA INFO PRODUK PACKDEV',0,0,'C');
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
$pdf->Cell(26,6,'NIK',1,0);
$pdf->Cell(70,6,'NAMA KARYAWAN',1,0);
$pdf->Cell(92,6,'JABATAN',1,1);

$pdf->SetFont('Arial','',7);

include ("../../../system/koneksi.php");
$produk = mysqli_query($db, "SELECT * FROM tb_karyawan");
while ($row = mysqli_fetch_array($produk)){
    $pdf->Cell(26,6,$row['nik'],1,0);
    $pdf->Cell(70,6,$row['nama_karyawan'],1,0);   
    $pdf->Cell(92,6,$row['jabatan'],1,1); 
}

$pdf->Output();


?>