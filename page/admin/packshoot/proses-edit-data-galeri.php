<?php  

include("koneksi.php");

//cek apakah tombol simpan sudah diklik atau belum?

if (isset($_POST['simpan']))
{

	//ambil data dari formulir
	$id = $_POST['id'];
	$gambar = $_POST['gambar'];


	//buat query update

	$sql = "UPDATE tb_galeri SET gambar='$gambar' WHERE id='$id'";
	$query = mysqli_query($db, $sql);

	//apakah update berhasil?
	if($query)
	{
		//jika berhasil alihkan ke halaman list-siswa.php
		header('Location: form-input-foto1.php');
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