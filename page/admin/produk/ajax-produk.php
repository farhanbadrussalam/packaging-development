<?php
include("../../../system/koneksi.php");
$kd = $_GET['kd_produk'];
$query = mysqli_query($db, "SELECT * FROM tb_produk inner join tb_supplier on tb_supplier.kd_supplier = tb_produk.kd_supplier WHERE tb_produk.kd_produk='$kd'");
$kemas = mysqli_fetch_array($query);
if ($kemas) {
    $data = [
        'nama_produk'   =>  $kemas['nama_produk'],
        'bahan_kemas'   =>  $kemas['bahan_kemas'],
        'kd_supplier'   =>  $kemas['kd_supplier'],
        'supplier'      =>  $kemas['nama_supplier']
    ];
} else {
    $data = false;
}
echo $data ? json_encode($data) : $data;
