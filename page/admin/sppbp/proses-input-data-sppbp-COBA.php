<?php  
include("../../../system/koneksi.php");

if(isset($_POST['simpan']))
{
	//ambil data dari Form Input Data Produk
	$kd = $_POST['kode-sppbp'];
	$tgl = $_POST['tgl'];
	$nik = $_POST['nik'];
	$nama = $_POST['nama_karyawan'];
	$jabatan = $_POST['jabatan'];
	$kd_pdk = $_POST['kd_produk'];
	$nm_pdk = $_POST['nama_produk'];
	$kemas = $_POST['bahan_kemas'];
	$suhu = $_POST['suhu'];
	$metode = $_POST['metode'];
	$bahan = $_POST['bahan'];
	$tek = $_POST['tek'];
	$warna = $_POST['wrn'];
	$bobot = $_POST['bbt'];
	$ukuran = $_POST['ukur'];
	$lem = $_POST['lem'];
	$lockbottom = $_POST['lockbottom'];
	$abrasi = $_POST['abrasi'];
	$kondisi = $_POST['kondisi-pengemas'];
	$prosedur = $_POST['prosedur'];	
	$kdsup = $_POST['kd_supplier'];
	$kritis = $_POST['kritis'];
	$major = $_POST['major'];
	$minor = $_POST['minor'];
	
	
	//query save data ke database
	$sql = "INSERT INTO tb_sppbp(
	kd_sppbp, 
	tanggal, 
	nik, 
	nama_karyawan, 
	jabatan, 
	kd_produk,
	nama_produk, 
	bahan_kemas, 
	penyimpanan, 
	metode_pemeriksaan, 
	material, 
	teks, 
	warna, 
	bobot, 
	ukuran, 
	kerekatan_lem, 
	kondisi_lockbottom, 
	abrasi_test, 
	kondisi_pengemas, 
	prosedur_pemeriksaan, 
	kd_supplier, 
	penyimpangan_kritis, 
	penyimpangan_major, 
	penyimpangan_minor
	) 
	VALUES
	(
	'$kd',
	'$tgl',
	'$nik',
	'$nama',
	'$jabatan',
	'$kd_pdk',
	'$nm_pdk',
	'$kemas',
	'$suhu',
	'$metode',
	'$bahan',
	'$tek',
	'$warna',
	'$bobot',
	'$ukuran',
	'$lem',
	'$lockbottom',
	'$abrasi',
	'$kondisi',
	'$prosedur',
	'$kdsup',
	'$kritis',
	'$major',
	'$minor'
	)";
	$query = mysqli_query($db, $sql);

	//pengecekan apakah query berhasil tersimpan?

	if($query)
	{
		//jika berhasil
		header('Location: list-data-sppbp.php?status=sukses');
	}
	else
	{
		//jika gagal
		header('Location: form-input-data-sppbp1.php?status=gagal');
	}
	}
	else
	{
		die("Akses dilarang...!");
	}

?>