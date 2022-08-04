<?php  

include ("../../../system/koneksi.php");

if( isset($_GET['kd_sppbp']) )
	{

	//ambil kode produk dari query string
	$kde = $_GET['kd_sppbp'];

	//buat query hapus

	$sql = "DELETE FROM tb_sppbp WHERE kd_sppbp='$kde'";
	$query = mysqli_query($db, $sql);

	//apakah query hapus berhasil?

	if($query)
	{
		header('Location: list-data-sppbp.php');
	}

	else
	{
		die("Gagal Menghapus...!!");
	}

}
	else
	{
		die("Akses dilarang..!");
	}

?>