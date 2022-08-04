<?php
include("../../../system/koneksi.php");

if (isset($_POST['simpan'])) {
	//ambil data dari Form Input Data User
	$id = mysqli_real_escape_string($db, $_POST['user_id']);
	$nik = mysqli_real_escape_string($db, $_POST['nik']);
	$nama = mysqli_real_escape_string($db, $_POST['nama_karyawan']);
	$level = mysqli_real_escape_string($db, $_POST['level']);
	$pwd = mysqli_real_escape_string($db, $_POST['pwd']);

	//query save data ke database
	$sql = "INSERT INTO tb_user (user_id, nik, nama_karyawan, level, pwd) VALUES ('$id','$nik','$nama','$level','$pwd')";
	$query = mysqli_query($db, $sql);

	//pengecekan apakah query berhasil tersimpan?

	if ($query) {
		//jika berhasil
		echo "<script>alert('Data Berhasil disimpan ke database');document.location='data-user.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data yang Anda Masukan Sudah ada atau Data tidak lengkap.');document.location='data-user.php'</script>";
	}
} else if (isset($_POST['update'])) {
	//ambil data dari Form Input Data User
	$id = mysqli_real_escape_string($db, $_POST['user_id']);
	$nik = mysqli_real_escape_string($db, $_POST['nik']);
	$nama = mysqli_real_escape_string($db, $_POST['nama_karyawan']);
	$level = mysqli_real_escape_string($db, $_POST['level']);
	$pwd = mysqli_real_escape_string($db, $_POST['pwd']);

	//buat query update
	$sql = "UPDATE tb_user SET nik='$nik', nama_karyawan='$nama', level='$level', pwd='$pwd' WHERE user_id='$id'";
	$query = mysqli_query($db, $sql);

	//apakah update berhasil?
	if ($query) {
		//jika berhasil alihkan ke halaman list-siswa.php
		echo "<script>alert('Data Berhasil diupdate');document.location='data-user.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data yang Anda Masukan Sudah ada atau Data tidak lengkap.');document.location='data-user.php'</script>";
	}
} else if (isset($_GET['user_id'])) {
	//ambil kode produk dari query string
	$userid = $_GET['user_id'];

	//buat query hapus
	$sql = "DELETE FROM tb_user WHERE user_id='$userid'";
	$query = mysqli_query($db, $sql);

	//apakah query hapus berhasil?

	if ($query) {
		echo "<script>alert('Data Berhasil dihapus');document.location='data-user.php'</script>";
	} else {
		echo "<script>alert('Gagal Menghapus...!!');document.location='data-user.php'</script>";
	}
} else {
	die("Akses dilarang...!");
}
