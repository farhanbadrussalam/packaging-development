<?php
include("../../../system/koneksi.php");
$nik = $_GET['nik'];
$query = mysqli_query($db, "SELECT * FROM tb_karyawan WHERE nik='$nik'");
$karyawan = mysqli_fetch_array($query);
$data = array(
            'nama_karyawan'      =>  $karyawan['nama_karyawan'],           
            'jabatan'   		 =>  $karyawan['jabatan'],);
 echo json_encode($data);
?>