<?php 

$server = "localhost";
$user = "root";
$password = "";
$nama_database = "db_packdev";

$db = mysqli_connect($server, $user, $password, $nama_database);

if(!$db)
{
	die("Gagal terhubung ke Database: " .msqli_connect_error());
}

?>
