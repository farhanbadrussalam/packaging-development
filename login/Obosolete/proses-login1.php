<?php 
// mengaktifkan session php
session_start();

if( isset($_SESSION["login"])){
	header("Location: login-form.php");
}
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
if (isset($_POST["login"])) 
{
$id = $_POST['user_id'];
$pwd = $_POST['pwd'];
 
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($db,"SELECT * FROM tb_user where user_id='$id'");

// cek userid
if(mysqli_num_rows($result) === 1) {

	//cek password
	$row = mysqli_fetch_assoc($result);
	if (password_verify($pwd, $row ["pwd"])) {

	//set session

	$_SESSION["login"] = true;
	header("location:menu-utama.html");
	exit;
}
}
} else {
	header("location:login-form.php?pesan=gagal login data tidak ditemukan.");
}
?>