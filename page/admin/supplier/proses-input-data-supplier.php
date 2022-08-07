<?php
include("../../../system/koneksi.php");

if (isset($_POST['simpan'])) {
	//ambil data dari Form Input Data Produk
	$id = $_POST['kd-supplier'];
	$nama = $_POST['nama-supplier'];
	$alamat = $_POST['alamat'];
	$tlp = $_POST['tlp'];


	//query save data ke database
	$sql = "INSERT INTO tb_supplier (kd_supplier, nama_supplier, alamat_supplier, no_telepon) VALUES ('$id','$nama','$alamat','$tlp')";
	$query = mysqli_query($db, $sql);

	//pengecekan apakah query berhasil tersimpan?

	if ($query) {
		//jika berhasil
		echo "<script>alert('Data Berhasil ditambah');document.location='data-supplier.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data Gagal ditambah.');document.location='data-supplier.php'</script>";
	}
} else if (isset($_POST['update'])) {
	//ambil data dari formulir
	$kd = $_POST['kd-supplier'];
	$nm = $_POST['nama-supplier'];
	$alamat = $_POST['alamat'];
	$tlp = $_POST['tlp'];

	//buat query update
	$sql = "UPDATE tb_supplier SET nama_supplier='$nm', alamat_supplier='$alamat', no_telepon='$tlp' WHERE kd_supplier='$kd'";
	$query = mysqli_query($db, $sql);

	if ($query) {
		//jika berhasil
		echo "<script>alert('Data Berhasil diupdate');document.location='data-supplier.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data Gagal diupdate.');document.location='data-supplier.php'</script>";
	}
} else if (isset($_GET['kd_supplier'])) {

	//ambil kode produk dari query string
	$kde = $_GET['kd_supplier'];

	//buat query hapus
	$sql = "DELETE FROM tb_supplier WHERE kd_supplier='$kde'";
	$query = mysqli_query($db, $sql);

	//apakah query hapus berhasil?
	if ($query) {
		//jika berhasil
		echo "<script>alert('Data Berhasil dihapus');document.location='data-supplier.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data Gagal dihapus.');document.location='data-supplier.php'</script>";
	}
}
