<?php  

include ("../../../system/koneksi.php");

//cek apakah tombol simpan sudah diklik atau belum?

if (isset($_POST['simpan']))
{

	//ambil data dari formulir
	$kd 		= $_POST['kode-sppbp'];
	$tanggal 	= $_POST['tgl'];
	$nik 		= $_POST['nik'];
	$nama 		= $_POST['nama_karyawan'];
	$jabatan 	= $_POST['jabatan'];
	$kd_pdk 	= $_POST['kd_produk'];
	$nm_pdk 	= $_POST['nama_produk'];
	$kemas 		= $_POST['bahan_kemas'];
	$suhu 		= $_POST['suhu'];
	$metode 	= $_POST['metode'];
	$bahan 		= $_POST['bahan'];
	$tek 		= $_POST['tek'];
	$warna 		= $_POST['wrn'];
	$bobot 		= $_POST['bbt'];
	$ukuran 	= $_POST['ukur'];
	$lem 		= $_POST['lem'];
	$lockbottom = $_POST['lockbottom'];
	$abrasi 	= $_POST['abrasi'];
	$kondisi 	= $_POST['kondisi-pengemas'];
	$prosedur 	= $_POST['prosedur'];	
	$kdsup 		= $_POST['kd_supplier'];
	$kritis 	= $_POST['kritis'];
	$major 		= $_POST['major'];
	$minor 		= $_POST['minor'];

	//buat query update

	$sql = "UPDATE tb_sppbp SET 
	tanggal					='$tgl', 
	nik 					='$nik', 
	nama_karyawan			='$nama', 
	jabatan					='$jabatan',
	kd_produk 				='$kd_pdk',
	nama_produk 			='$nm_pdk',
	bahan_kemas				='$kemas',
	penyimpanan 			='$suhu',
	metode_pemeriksaan		='$metode',
	material				='$bahan',
	teks 					='$tek',
	warna 					='$warna',
	bobot 					='$bobot',
	ukuran 					='$ukuran',
	kerekatan_lem 			='$lem',
	kondisi_lockbottom		='$lockbottom',
	abrasi_test 			='$abrasi',
	kondisi_pengemas 		='$kondisi',
	prosedur_pemeriksaan 	='$prosedur',
	kd_supplier 			='$kdsup',
	penyimpangan_kritis 	='$kritis',
	penyimpangan_major 		='$major',
	penyimpangan_minor 		='$minor'
	WHERE kd_sppbp='$kd'";

	$query = mysqli_query($db, $sql);

	//apakah update berhasil?
	if($query)
	{
		//jika berhasil alihkan ke halaman list-siswa.php
		header('Location: list-data-sppbp.php');
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