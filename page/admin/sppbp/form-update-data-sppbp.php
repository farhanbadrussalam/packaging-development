<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header("Location: index.php");
}
include("../../../system/koneksi.php");

$sql = "SELECT * FROM tb_sppbp 
		inner join tb_karyawan on tb_karyawan.nik = tb_sppbp.nik 
		inner join tb_produk on tb_produk.kd_produk = tb_sppbp.kd_produk 
		inner join tb_supplier on tb_supplier.kd_supplier = tb_produk.kd_supplier 
		where kd_sppbp = '" . $_GET['kd_sppbp'] . "' ";
$query = mysqli_query($db, $sql);
$dtSppbp = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" type="text/css" href="../../../style/style-idp11.css">
	<!-- Required meta tags -->
	<meta charset="utf-8">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<title>PACKAGING DEVELOPMENT - <?php echo strtoupper($_SESSION['level']); ?></title>
	<style type="text/css">
		* {
			font-family: "Trebuchet MS";
		}

		h1 {
			text-transform: uppercase;
			color: salmon;
		}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="#page-top">PACKAGING DEVELOPMENT DEPARTMENT - LOGIN <?php echo strtoupper($_SESSION['level']); ?></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
				<ul class="navbar-nav navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link js-scroll-trigger" aria-current="page" href="../../../page/admin/menu-utama-admin.php"><strong>HOME</strong></a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#akun" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							GUIDELINE KEMASAN
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

							<li><a class="dropdown-item" href="../../../guideline/GL ETICAL PRODUCT.pdf">PRODUK ETHICAL</a></li>

							<li>
								<hr class="dropdown-divider">
							</li>
							<li><a class="dropdown-item" href="../../../guideline/GL OTC 2020.pdf">PRODUK OTC</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href="../../../page/admin/tentang.php">TENTANG</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#akun" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							AKUN
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="../../../system/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron">
		<div class="container">
			<br>
			<br><br><br>
			<img class="kiri" src="../../../image/logo combiphar ungu.png" width="250px" />

			<h1 class="display-4">UPDATE DATA SPPBP</h1>
			<hr class="my-4">
			<div class="container overflow-hidden">
				<form action="proses-input-data-sppbp.php" method="post">
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="kd-produk">Kode Produk</label>
							<input type="text" name="kd_produk" id="kd-produk" value="<?= $dtSppbp['kd_produk'] ?>" onkeyup="searchProduk(this)" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="nama_produk">Nama Produk</label>
							<input type="text" id="nama_produk" class="form-control" value="<?= $dtSppbp['nama_produk'] ?>" readonly required>
						</div>
						<div class="col-md-4">
							<label for="bahan_kemas">Bahan Kemas</label>
							<input type="text" id="bahan_kemas" class="form-control" value="<?= $dtSppbp['bahan_kemas'] ?>" readonly>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="kode-sppbp">Kode SPPBP</label>
							<input type="text" name="kode-sppbp" id="kode-sppbp" class="form-control" placeholder="Masukan Kode SPPPBP" value="<?= $dtSppbp['kd_sppbp'] ?>" readonly>
						</div>
						<div class="col-md-4">
							<label for="tgl">Tanggal input SPPBP</label>
							<input type="text" name="tgl" id="tgl" class="form-control" value="<?= $dtSppbp['tanggal'] ?>" placeholder="Masukan Kode SPPPBP" readonly>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="nik">NIK</label>
							<input type="number" name="nik" id="nik" onkeyup="searchNIK(this)" value="<?= $dtSppbp['nik'] ?>" class="form-control">
						</div>
						<div class="col-md-4">
							<label for="nama_karyawan">Nama Karyawan</label>
							<input type="text" id="nama_karyawan" class="form-control" value="<?= $dtSppbp['nama_karyawan'] ?>" readonly required>
						</div>
						<div class="col-md-4">
							<label for="jabatan">Jabatan</label>
							<input type="text" id="jabatan" class="form-control" value="<?= $dtSppbp['jabatan'] ?>" readonly>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="suhu">Suhu Simpan</label>
							<input type="text" name="suhu" id="suhu" class="form-control" value="<?= $dtSppbp['penyimpanan'] ?>" placeholder="Masukan Suhu Simpan">
						</div>
						<div class="col-md-4">
							<label for="metode">Metode Pemeriksaan</label>
							<input type="text" name="metode" id="metode" class="form-control" value="<?= $dtSppbp['metode_pemeriksaan'] ?>" placeholder="Masukan Jenis Metode">
						</div>
						<div class="col-md-4">
							<label for="bahan">Material</label>
							<input type="text" name="bahan" id="bahan" class="form-control" value="<?= $dtSppbp['material'] ?>" placeholder="Masukan Jeniis Material">
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="teks">Teks</label>
							<input type="text" name="tek" id="teks" class="form-control" value="<?= $dtSppbp['teks'] ?>" placeholder="Masukan Teks">
						</div>
						<div class="col-md-4">
							<label for="warna">Warna</label>
							<input type="text" name="wrn" id="warna" class="form-control" value="<?= $dtSppbp['warna'] ?>" placeholder="Masukan Warna">
						</div>
						<div class="col-md-4">
							<label for="bobot">Bobot</label>
							<input type="text" name="bbt" id="bobot" class="form-control" value="<?= $dtSppbp['bobot'] ?>" placeholder="Masukan Bobot">
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="ukuran">Ukuran</label>
							<input type="text" name="ukur" id="ukuran" class="form-control" value="<?= $dtSppbp['ukuran'] ?>" placeholder="Masukan Ukuran">
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="abrasi">Abrasi test</label>
							<input type="text" name="abrasi" id="abrasi" class="form-control" value="<?= $dtSppbp['abrasi_test'] ?>" placeholder="Masukan hasil test">
						</div>
						<div class="col-md-4">
							<label for="prosedur">Prosedur Pemeriksaan</label>
							<input type="text" name="prosedur" id="prosedur" class="form-control" value="<?= $dtSppbp['prosedur_pemeriksaan'] ?>" placeholder="Masukan Prosedur">
						</div>
						<div class="col-md-4">
							<label for="kondisi-pengemas">Kondisi Pengemas</label>
							<textarea name="kondisi-pengemas" id="kondisi-pengemas" cols="30" rows="3" class="form-control"><?= $dtSppbp['kondisi_pengemas'] ?></textarea>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="kritis">Penyimpangan Kritis</label>
							<input type="text" name="kritis" id="kritis" class="form-control" value="<?= $dtSppbp['penyimpangan_kritis'] ?>" placeholder="Masukan Penyimpangan Kritis">
						</div>
						<div class="col-md-4">
							<label for="major">Penyimpangan Major</label>
							<input type="text" name="major" id="major" class="form-control" value="<?= $dtSppbp['penyimpangan_major'] ?>" placeholder="Masukan Penyimpangan Major">
						</div>
						<div class="col-md-4">
							<label for="minor">Penyimpangan Minor</label>
							<input type="text" name="minor" id="minor" class="form-control" value="<?= $dtSppbp['penyimpangan_minor'] ?>" placeholder="Masukan Penyimpangan Minor">
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-4">
							<label for="nama_supplier">Supplier</label>
							<input type="hidden" name="kd_supplier" id="kd_supplier" class="form-control">
							<input type="text" name="nama_supplier" id="nama_supplier" value="<?= $dtSppbp['nama_supplier'] ?>" class="form-control" readonly>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col-md-6">
							<button class="btn btn-primary" type="submit" name="update">Update</button>
							<button class="btn btn-warning" type="reset">reset</button>
							<a class="btn btn-secondary" href="data-sppbp.php">Kembali</a>
						</div>
					</div>
				</form>
			</div>
		</div>

		<!-- Optional JavaScript; choose one of the two! -->

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

		<script type="text/javascript">
			function searchNIK(val) {
				const nik = val.value;
				$.ajax({
					url: '../../../page/admin/data-karyawan/ajax-karyawan.php',
					data: {
						nik: nik
					},
				}).success(function(data) {
					if (data) {
						const json = JSON.parse(data);
						$('#nama_karyawan').val(json.nama_karyawan);
						$('#jabatan').val(json.jabatan);
					} else {
						$('#nama_karyawan').val('');
						$('#jabatan').val('');
					}
				});
			}

			function searchProduk(val) {
				const kd_produk = val.value;
				$.ajax({
					url: '../../../page/admin/produk/ajax-produk.php',
					data: {
						kd_produk: kd_produk
					},
				}).success(function(data) {
					if (data) {
						const json = JSON.parse(data);
						$('#nama_produk').val(json.nama_produk);
						$('#bahan_kemas').val(json.bahan_kemas);
						$('#kd_supplier').val(json.kd_supplier);
						$('#nama_supplier').val(json.supplier);
					} else {
						$('#nama_produk').val('');
						$('#bahan_kemas').val('');
						$('#kd_supplier').val('');
						$('#nama_supplier').val('');
					}
				});
			}
		</script>
		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

</body>

</html>