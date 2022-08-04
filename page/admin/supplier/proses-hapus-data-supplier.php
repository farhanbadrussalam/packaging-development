<?php  

include ("../../../system/koneksi.php");

if( isset($_GET['kd_supplier']) )
	{

	//ambil kode produk dari query string
	$kde = $_GET['kd_supplier'];

	//buat query hapus

	$sql = "DELETE FROM tb_supplier WHERE kd_supplier='$kde'";
	$query = mysqli_query($db, $sql);

	//apakah query hapus berhasil?

	if($query)
	{
		header('Location: list-data-supplier.php');
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