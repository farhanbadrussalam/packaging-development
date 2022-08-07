<?php
include("../../../system/koneksi.php");

if (isset($_POST['simpan'])) {
	//ambil data dari Form Input Data Produk
	$kd = $_POST['kode-sppbp'];
	$tgl = $_POST['tgl'];
	$nik = $_POST['nik'];
	$kd_pdk = $_POST['kd_produk'];
	$suhu = $_POST['suhu'];
	$metode = $_POST['metode'];
	$bahan = $_POST['bahan'];
	$tek = $_POST['tek'];
	$warna = $_POST['wrn'];
	$bobot = $_POST['bbt'];
	$ukuran = $_POST['ukur'];
	$abrasi = $_POST['abrasi'];
	$kondisi = $_POST['kondisi-pengemas'];
	$prosedur = $_POST['prosedur'];
	$kritis = $_POST['kritis'];
	$major = $_POST['major'];
	$minor = $_POST['minor'];


	//query save data ke database
	$sql = "INSERT INTO tb_sppbp(
	kd_sppbp, 
	tanggal, 
	nik, 
	kd_produk,
	penyimpanan, 
	metode_pemeriksaan, 
	material, 
	teks, 
	warna, 
	bobot, 
	ukuran, 
	abrasi_test, 
	kondisi_pengemas, 
	prosedur_pemeriksaan, 
	penyimpangan_kritis, 
	penyimpangan_major, 
	penyimpangan_minor
	) 
	VALUES
	(
	'$kd',
	'$tgl',
	'$nik',
	'$kd_pdk',
	'$suhu',
	'$metode',
	'$bahan',
	'$tek',
	'$warna',
	'$bobot',
	'$ukuran',
	'$abrasi',
	'$kondisi',
	'$prosedur',
	'$kritis',
	'$major',
	'$minor'
	)";
	$query = mysqli_query($db, $sql);

	//pengecekan apakah query berhasil tersimpan?
	if ($query) {
		//jika berhasil alihkan ke halaman list-siswa.php
		echo "<script>alert('Data Berhasil ditambah');document.location='data-sppbp.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data Gagal ditambah.');document.location='form-input-data-sppbp.php'</script>";
	}
} else if (isset($_POST['update'])) {
	$kd = $_POST['kode-sppbp'];
	$tgl = $_POST['tgl'];
	$nik = $_POST['nik'];
	$kd_pdk = $_POST['kd_produk'];
	$suhu = $_POST['suhu'];
	$metode = $_POST['metode'];
	$bahan = $_POST['bahan'];
	$tek = $_POST['tek'];
	$warna = $_POST['wrn'];
	$bobot = $_POST['bbt'];
	$ukuran = $_POST['ukur'];
	$abrasi = $_POST['abrasi'];
	$kondisi = $_POST['kondisi-pengemas'];
	$prosedur = $_POST['prosedur'];
	$kritis = $_POST['kritis'];
	$major = $_POST['major'];
	$minor = $_POST['minor'];

	$sql = "UPDATE tb_sppbp SET 
	tanggal					='$tgl', 
	nik 					='$nik', 
	kd_produk 				='$kd_pdk',
	penyimpanan 			='$suhu',
	metode_pemeriksaan		='$metode',
	material				='$bahan',
	teks 					='$tek',
	warna 					='$warna',
	bobot 					='$bobot',
	ukuran 					='$ukuran',
	abrasi_test 			='$abrasi',
	kondisi_pengemas 		='$kondisi',
	prosedur_pemeriksaan 	='$prosedur',
	penyimpangan_kritis 	='$kritis',
	penyimpangan_major 		='$major',
	penyimpangan_minor 		='$minor'
	WHERE kd_sppbp='$kd'";

	$query = mysqli_query($db, $sql);

	//pengecekan apakah query berhasil tersimpan?
	if ($query) {
		//jika berhasil alihkan ke halaman list-siswa.php
		echo "<script>alert('Data Berhasil diupdate');document.location='data-sppbp.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data Gagal diupdate.');document.location='form-update-data-sppbp.php?kd_sppbp=" . $kd . "'</script>";
	}
} else if (isset($_GET['kd_sppbp'])) {

	//ambil kode produk dari query string
	$kde = $_GET['kd_sppbp'];

	//buat query hapus

	$sql = "DELETE FROM tb_sppbp WHERE kd_sppbp='$kde'";
	$query = mysqli_query($db, $sql);

	//apakah query hapus berhasil?

	if ($query) {
		//jika berhasil alihkan ke halaman list-siswa.php
		echo "<script>alert('Data Berhasil dihapus');document.location='data-sppbp.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data Gagal dihapus.');document.location='data-sppbp.php'</script>";
	}
}
