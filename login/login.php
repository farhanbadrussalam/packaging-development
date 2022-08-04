<?php 
// mengaktifkan session php


if( !isset($_SESSION["login"])){
	header("Location: index.php");
	}
 ?>
 

<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
if (isset($_POST["login"])) 
{
$id = $_POST['user_id'];
$pwd = $_POST['pwd'];
 
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($db,"SELECT * FROM tb_user WHERE user_id='$id'");

// cek userid
if(mysqli_num_rows($result) === 1) {

	//cek password
	$row = mysqli_fetch_assoc($result);
	if($id == $usernamelogin && $passwordlogin == "pwd") {

	//set session
		session_start();

	$_SESSION["login"] = true;
	header("location:menu-utama.php");
	exit;
}
}
} else {
	header("location:index.php?pesan=gagal login data tidak ditemukan.");
}
?>