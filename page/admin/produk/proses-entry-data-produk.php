<?php
include("../../../system/koneksi.php");
if (isset($_POST['simpan'])) {
	//ambil data dari Form Input Data Produk
	$kd = $_POST['kode-produk'];
	$nm = $_POST['nama-produk'];
	$sediaan = $_POST['bentuk-sediaan'];
	$kategori = $_POST['kategori-produk'];
	$kemasan = $_POST['bahan-kemas'];
	$aw = trim($_FILES['artwork']['name']);
	$gb = trim($_FILES['gambar']['name']);
	$supplier = $_POST['kd-supplier'];
	$nama_baru = $kd . ".pdf";
	$nama_gambar = $kd . ".jpg";
	//query save data ke database
	$sql = "INSERT INTO tb_produk (kd_produk, nama_produk, bentuk_sediaan, kategori_produk, bahan_kemas, artwork, gambar, kd_supplier) VALUES ('$kd','$nm','$sediaan','$kategori',
	'$kemasan','$nama_baru','$nama_gambar','$supplier')";
	$query = mysqli_query($db, $sql);


	$file_temp = $_FILES['artwork']['tmp_name']; //data temp yang di upload
	$folder    = "../../../pdf/"; //folder tujuan
	if (!file_exists($folder)) {
		mkdir($folder, 0777, true);
	}
	move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload


	$file_temp1 = $_FILES['gambar']['tmp_name']; //data temp yang di upload
	$folder1    = "../../../jpg/"; //folder tujuan
	if (!file_exists($folder1)) {
		mkdir($folder1, 0777, true);
	}
	move_uploaded_file($file_temp1, "$folder1/$nama_gambar"); //fungsi upload

	echo "<script>alert('Data Produk Berhasil disimpan ke database');document.location='data-produk.php'</script>";
} else if (isset($_POST['update'])) {
	$kd = $_POST['kode-produk'];
	$nm = $_POST['nama-produk'];
	$sediaan = $_POST['bentuk-sediaan'];
	$kategori = $_POST['kategori-produk'];
	$kemasan = $_POST['bahan-kemas'];
	if ($_FILES['artwork']['name'] != '') {
		$nama_baru = $kd . ".pdf";
		$file_temp = $_FILES['artwork']['tmp_name']; //data temp yang di upload
		$folder    = "../../../pdf/"; //folder tujuan

		if (file_exists($folder . $nama_baru)) {
			unlink($folder . $nama_baru); // hapus data pdf sebelumnya
		}

		if (!file_exists($folder)) {
			mkdir($folder, 0777, true);
		}
		move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
	}

	if ($_FILES['gambar']['name'] != '') {
		$nama_gambar = $kd . ".jpg";
		$file_temp1 = $_FILES['gambar']['tmp_name']; //data temp yang di upload
		$folder1    = "../../../jpg/"; //folder tujuan
		if (file_exists($folder1 . $nama_gambar)) {
			unlink($folder1 . $nama_gambar); // hapus data gambar sebelumnya
		}

		if (!file_exists($folder1)) {
			mkdir($folder1, 0777, true);
		}
		move_uploaded_file($file_temp1, "$folder1/$nama_gambar"); //fungsi upload
	}
	$supplier = $_POST['kd-supplier'];

	$sql = "UPDATE tb_produk SET nama_produk='$nm', bentuk_sediaan='$sediaan', kategori_produk='$kategori', bahan_kemas='$kemasan', Kd_supplier='$supplier' WHERE kd_produk='$kd'";
	$query = mysqli_query($db, $sql);

	//apakah update berhasil?
	if ($query) {
		//jika berhasil alihkan ke halaman list-siswa.php
		echo "<script>alert('Data Berhasil diupdate');document.location='data-produk.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data Gagal diupdate.');document.location='data-produk.php'</script>";
	}
} else if ($_GET['kd_produk']) {
	$del = $_GET['kd_produk'];

	$perintah1 = sprintf("DELETE FROM tb_produk WHERE kd_produk='$del'"); //query untuk delete
	$perintah2 = "SELECT * FROM tb_produk WHERE kd_produk='$del'"; //wuery untuk pilih db dulu
	$a = @mysqli_query($db, $perintah2); //simpan query ke variabel $a
	$b = mysqli_fetch_array($a); //selanjutnya pecah data dan simpan ke variabel $b

	if (file_exists('../../../pdf/' . $b['artwork'])) {
		unlink('../../../pdf/' . $b['artwork']);
	}
	if (file_exists('../../../jpg/' . $b['gambar'])) {
		unlink('../../../jpg/' . $b['gambar']); //sekarang jalankan perintah unlink untuk hapus gambar dari folder, ambil data dan dkd_produkepannya ditambahkan paramter tempatt dimana folder gambar tersimpan
	}
	$del2 = @mysqli_query($db, $perintah1); //query untuk mendelete data di database

	if ($del2) {
		//jika berhasil alihkan ke halaman list-siswa.php
		echo "<script>alert('Data Berhasil dihapus');document.location='data-produk.php'</script>";
	} else {
		//jika gagal
		echo "<script>alert('Data Gagal dihapu.');document.location='data-produk.php'</script>";
	}
}
