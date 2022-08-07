<?php
include("../../../system/koneksi.php");
$nik = $_GET['nik'];
$query = mysqli_query($db, "SELECT * FROM tb_karyawan WHERE nik='$nik'");
$karyawan = mysqli_fetch_array($query);
if ($karyawan) {
    $data = [
        'nama_karyawan'      =>  $karyawan['nama_karyawan'],
        'jabatan'            =>  $karyawan['jabatan']
    ];
} else {
    $data = false;
}
echo $data ? json_encode($data) : $data;
