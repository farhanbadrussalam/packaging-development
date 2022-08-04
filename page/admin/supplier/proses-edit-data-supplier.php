<?php  

include ("../../../system/koneksi.php");

//cek apakah tombol simpan sudah diklik atau belum?

if (isset($_POST['simpan']))
{

	//ambil data dari formulir
	$kd = $_POST['kd_supplier'];
	$nm = $_POST['nama-supplier'];
	$alamat = $_POST['alamat-supplier'];
	$tlp = $_POST['no-telepon'];
	

	//buat query update

	$sql = "UPDATE tb_supplier SET nama_supplier='$nm', alamat_supplier='$alamat', no_telepon='$tlp' WHERE kd_supplier='$kd'";
	$query = mysqli_query($db, $sql);

	//apakah update berhasil?
	if($query)
	{
		//jika berhasil alihkan ke halaman list-siswa.php
		header('Location: form-entry-data-supplier.php');
	}

	else
	{
		// jika gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}

}
	else
	{
		die("Akses dilarang...");
	}
?>