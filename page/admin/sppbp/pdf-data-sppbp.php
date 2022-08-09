<?php
// memanggil library FPDF
use setasign\Fpdi\Fpdi;

include('../../../fpdf.php');
include('../../../vendor/fpdi/autoload.php');

class PDF extends FPDF
{
    // Page header

}

class ConcatPdf extends Fpdi
{
    public $files = array();

    function Header()
    {
        // Logo
        $this->Image('../../../image/logo combiphar ungu.png', 165, 8, 30);
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        $this->Ln(8);
        // Move to the right
        $this->Cell(85);
        // Title
        $this->Cell(20, 10, 'RESEARCH & DEVELOPMENT DEPARTMENT', 0, 0, 'C');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    public function setFiles($files)
    {
        $this->files = $files;
    }

    public function concat()
    {
        foreach ($this->files as $file) {
            $pageCount = $this->setSourceFile($file);
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $pageId = $this->ImportPage($pageNo);
                $s = $this->getTemplatesize($pageId);
                $this->AddPage($s['orientation'], $s);
                $this->useImportedPage($pageId);
            }
        }
    }
}

// Instanciation of inherited class
$pdf = new ConcatPdf();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', 10);
// $pdf->Cell(190,7,'',0,1,'C');
for ($i = 1; $i <= 40; $i++)

    $pdf->SetFont('Arial', 'B', 8);
// $pdf->Cell(26,6,'KODE sppbp',1,0, 'C');
// $pdf->Cell(55,6,'NAMA sppbp',1,0);
// $pdf->Cell(30,6,'BENTUK SEDIAAN',1,0);
// $pdf->Cell(26,6,'KATEGORI OBAT',1,0);
// $pdf->Cell(28,6,'BAHAN KEMAS',1,0);
// $pdf->Cell(25,6,'KODE SUPPLIER',1,1);

//$pdf->Cell(40,6,'SP. BAHAN PENGEMAS', 1,0);


include("../../../system/koneksi.php");
$kd = $_GET['kd_sppbp'];
$sql = "SELECT tb_sppbp.*, tb_produk.*, tb_karyawan.nama_karyawan FROM tb_sppbp 
        inner join tb_produk on tb_produk.kd_produk = tb_sppbp.kd_produk 
        inner join tb_karyawan on tb_karyawan.nik = tb_sppbp.nik
        where kd_sppbp='$kd'";
$sppbp = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($sppbp);
$column_widths = ["40", "40", "40", "40"];

$pdf->Cell(185, 6, '', 0, 1, 'L');

$pdf->Cell(65, 6, 'SPESIFIKASI BAHAN PENGEMAS', 1, 0, 'C');
$pdf->Cell(120, 6, $row['tanggal'], 1, 1, 'C');
$pdf->Cell(65, 6, 'NAMA BAHAN PENGEMAS', 1, 0, 'C');
$pdf->Cell(40, 6, 'KODE SPPBP', 1, 0, 'C');
$pdf->Cell(40, 6, 'KODE PRODUK', 1, 0, 'C');
$pdf->Cell(40, 6, 'PIC PRODUK', 1, 1, 'C');


$pdf->Cell(65, 36, $row['nama_produk'], 1, 0, 'C');

$x = $pdf->GetX();


$pdf->SetX($x);
$pdf->Cell(40, 6, $row['kd_sppbp'], 1, 0, 'C');
$pdf->Cell(40, 6, $row['kd_produk'], 1, 0, 'C');
$pdf->Cell(40, 6, $row['nama_karyawan'], 1, 1, 'C');

$pdf->SetX($x);
$pdf->Cell($column_widths[0],                     5, "DIBUAT", "", 0, "C", false);
$pdf->Cell($column_widths[0],                     5, "DISETUJUI", "", 0, "C", false);
$pdf->Cell($column_widths[0],                     5, "DIPERIKSA", "", 0, "C", false);

$pdf->SetX($x);
$pdf->Cell($column_widths[0],                     5, "", "", 0, "C", false);
$pdf->Cell(40, 18, '', 1, 0);
$pdf->Cell(40, 18, '', 1, 1);

$pdf->SetX($x);
$pdf->Cell(40, 6, 'Packdev Scientist', 1, 0, 'C');
$pdf->Cell(40, 6, 'R & D Senior GM', 1, 0, 'C');
$pdf->Cell(40, 6, 'QA Manager', 1, 1, 'C');


$pdf->Cell(65, 6, 'PENYIMPANAN :', 1, 0, 'L');
$pdf->Cell(120, 6, $row['penyimpanan'], 1, 1, 'L');


$pdf->Cell(65, 6, 'METODE PEMERIKSAAN :', 1, 0, 'L');
$pdf->Cell(120, 6, $row['metode_pemeriksaan'], 1, 1, 'L');
$pdf->Cell(185, 6, '', 0, 1, 'L');

$pdf->Cell(40, 6, 'PENETAPAN', 1, 0, 'C');
$pdf->Cell(145, 6, 'SPESIFIKASI', 1, 1, 'C');
$pdf->Cell(40, 6, 'MATERIAL', 1, 0, 'L');
$pdf->Cell(145, 6, $row['material'], 1, 1, 'L');
$pdf->Cell(40, 6, 'TEKS', 1, 0, 'L');
$pdf->Cell(145, 6, $row['teks'], 1, 1, 'L');
$pdf->Cell(40, 6, 'WARNA', 1, 0, 'L');
$pdf->Cell(145, 6, $row['warna'], 1, 1, 'L');
$pdf->Cell(40, 6, 'BOBOT', 1, 0, 'L');
$pdf->Cell(145, 6, $row['bobot'], 1, 1, 'L');
$pdf->Cell(40, 6, 'UKURAN', 1, 0, 'L');
$pdf->Cell(145, 6, $row['ukuran'], 1, 1, 'L');
$pdf->Cell(40, 6, 'ABRASI TEST', 1, 0, 'L');
$pdf->Cell(145, 6, $row['abrasi_test'], 1, 1, 'L');
$pdf->Cell(40, 6, 'KONDISI PENGEMAS', 1, 0, 'L');
$pdf->Cell(145, 6, $row['kondisi_pengemas'], 1, 1, 'L');
$pdf->Cell(40, 6, 'PROSEDUR PEMERIKSAAN', 1, 0, 'L');
$pdf->Cell(145, 6, $row['prosedur_pemeriksaan'], 1, 1, 'L');
$pdf->Cell(40, 6, 'KODE SUPPLIER', 1, 0, 'L');
$pdf->Cell(145, 6, $row['kd_supplier'], 1, 1, 'L');
$pdf->Cell(40, 6, 'PENYIMPANGAN KRITIS', 1, 0, 'L');
$pdf->Cell(145, 6, $row['penyimpangan_kritis'], 1, 1, 'L');
$pdf->Cell(40, 6, 'PENYIMPANGAN MAJOR', 1, 0, 'L');
$pdf->Cell(145, 6, $row['penyimpangan_major'], 1, 1, 'L');
$pdf->Cell(40, 6, 'PENYIMPANGAN MINOR', 1, 0, 'L');
$pdf->Cell(145, 6, $row['penyimpangan_minor'], 1, 1, 'L');

$pdf->setFiles(array('../../../pdf/' . $row['artwork']));
$pdf->concat();

$pdf->AddPage();
$pdf->Image('../../../jpg/' . $row['gambar'], 25, 40, 160);

$pdf->Output();
