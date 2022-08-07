<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['user_id'];
$password = $_POST['pwd'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($db,"SELECT * FROM tb_user WHERE user_id='$username' AND pwd='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	// buat session login dan username
	$_SESSION['user_id'] = $username;
	$_SESSION['level'] = $data['level'];
	$_SESSION['nik'] = $data['nik'];
	// alihkan ke halaman dashboard admin
	header("location:../page/admin/menu-utama-admin.php");
}else{
	header("location:../index.php?pesan=User ID atau Password yang Anda Masukkan Salah!");
}
