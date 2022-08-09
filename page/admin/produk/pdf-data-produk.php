<?php
// memanggil library FPDF
include('../../../fpdf.php');

class PDF extends FPDF
{
    // Page header
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
        $this->Cell(20, 10, 'LAPORAN DATA INFO PRODUK PACKDEV', 0, 0, 'C');
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
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(190, 7, '', 0, 1, 'C');
for ($i = 1; $i <= 40; $i++)

    $pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(26, 6, 'KODE PRODUK', 1, 0);
$pdf->Cell(35, 6, 'NAMA PRODUK', 1, 0);
$pdf->Cell(30, 6, 'BENTUK SEDIAAN', 1, 0);
$pdf->Cell(26, 6, 'KATEGORI OBAT', 1, 0);
$pdf->Cell(28, 6, 'BAHAN KEMAS', 1, 0);
$pdf->Cell(25, 6, 'KODE SUPPLIER', 1, 0);
$pdf->Cell(25, 6, 'KODE SPPBP', 1, 1);

$pdf->SetFont('Arial', '', 7);

include("../../../system/koneksi.php");
$produk = mysqli_query($db, "SELECT tb_produk.*, tb_sppbp.kd_sppbp FROM tb_produk LEFT JOIN tb_sppbp ON tb_sppbp.kd_produk = tb_produk.kd_produk");
while ($row = mysqli_fetch_array($produk)) {
    $cellWidth = 35; // lebar sel
    $cellHeight = 5; // tinggi sel satu baris normal

    // Periksa apakah teks melebihi kolom
    if ($pdf->GetStringWidth($row['nama_produk']) < $cellWidth) {
        //jika tidak, maka tidak melakukan apa-apa
        $line = 1;
    } else {
        //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
        //dengan memisahkan teks agar sesuai dengan lebar sel
        //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel

        $textLength = strlen($row['nama_produk']);    //total panjang teks
        $errMargin = 5;        //margin kesalahan lebar sel, untuk jaga-jaga
        $startChar = 0;        //posisi awal karakter untuk setiap baris
        $maxChar = 0;            //karakter maksimum dalam satu baris, yang akan ditambahkan nanti
        $textArray = array();    //untuk menampung data untuk setiap baris
        $tmpString = "";        //untuk menampung teks untuk setiap baris (sementara)

        while ($startChar < $textLength) { //perulangan sampai akhir teks
            //perulangan sampai karakter maksimum tercapai
            while (
                $pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) &&
                ($startChar + $maxChar) < $textLength
            ) {
                $maxChar++;
                $tmpString = substr($row['nama_produk'], $startChar, $maxChar);
            }
            //pindahkan ke baris berikutnya
            $startChar = $startChar + $maxChar;
            //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
            array_push($textArray, $tmpString);
            //reset variabel penampung
            $maxChar = 0;
            $tmpString = '';
        }
        //dapatkan jumlah baris
        $line = count($textArray);
    }
    $pdf->Cell(26, ($line * $cellHeight), $row['kd_produk'], 1, 0);

    //memanfaatkan MultiCell sebagai ganti Cell
    //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
    //ingat posisi x dan y sebelum menulis MultiCell
    $xPos = $pdf->GetX();
    $yPos = $pdf->GetY();
    $pdf->MultiCell($cellWidth, $cellHeight, $row['nama_produk'], 1, 'L', 0);
    //kembalikan posisi untuk sel berikutnya di samping MultiCell 
    //dan offset x dengan lebar MultiCell
    $pdf->SetXY($xPos + $cellWidth, $yPos);

    $pdf->Cell(30, ($line * $cellHeight), $row['bentuk_sediaan'], 1, 0);
    $pdf->Cell(26, ($line * $cellHeight), $row['kategori_produk'], 1, 0);
    $pdf->Cell(28, ($line * $cellHeight), $row['bahan_kemas'], 1, 0);
    $pdf->Cell(25, ($line * $cellHeight), $row['kd_supplier'], 1, 0);
    $pdf->Cell(25, ($line * $cellHeight), $row['kd_sppbp'], 1, 1);
}

$pdf->Output();
