<?php  
include ("../../../system/koneksi.php");

if(isset($_POST['simpan']))
{
	//ambil data dari Form Input Data Produk
	$id = $_POST['kd-supplier'];
	$nama = $_POST['nama-supplier'];
	$alamat = $_POST['alamat'];
	$tlp = $_POST['tlp'];
	

	//query save data ke database
	$sql = "INSERT INTO tb_supplier (kd_supplier, nama_supplier, alamat_supplier, no_telepon) VALUES ('$id','$nama','$alamat','$tlp')";
	$query = mysqli_query($db, $sql);

	//pengecekan apakah query berhasil tersimpan?

	if($query)
	{
		//jika berhasil
		header('Location: form-entry-data-supplier.php?status=sukses');
	}
	else
	{
		//jika gagal
		header('Location: form-entry-data-supplier.php?status=gagal');
	}
	}
	else
	{
		die("Akses dilarang...!");
	}

?>