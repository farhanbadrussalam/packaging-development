<?php
include ("../../../system/koneksi.php");
$del = $_GET['id'];
$perintah1 = sprintf("DELETE FROM tb_galeri WHERE id=%d", $del); //query untuk delete
$perintah2 = "SELECT * FROM tb_galeri WHERE id='$del'"; //wuery untuk pilih db dulu
$a = @mysqli_query($db, $perintah2); //simpan query ke variabel $a
$b = mysqli_fetch_array($a); //selanjutnya pecah data dan simpan ke variabel $b
unlink('../../../galeri/' . $b['gambar']); //sekarang jalankan perintah unlink untuk hapus gambar dari folder, ambil data dan didepannya ditambahkan paramter tempatt dimana folder gambar tersimpan
$del2 = @mysqli_query($db, $perintah1); //query untuk mendelete data di database
if ($del2) {
    echo "Gambar berhasil dihapus<br/>
 <a href='galeri.php'>Kembali</a>";
} else {
    echo "Gagal koneksi=" . mysqli_connect_error();
}
