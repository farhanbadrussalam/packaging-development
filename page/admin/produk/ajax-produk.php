<?php
include("../../../system/koneksi.php");
$kd = $_GET['kd_produk'];
$query = mysqli_query($db, "SELECT * FROM tb_produk WHERE kd_produk='$kd'");
$kemas = mysqli_fetch_array($query);
$data = array(                   
            'nama_produk'   =>  $kemas['nama_produk'],
            'bahan_kemas'   =>  $kemas['bahan_kemas'],
            'kd_supplier'   =>  $kemas['kd_supplier'],);
 echo json_encode($data);
?>