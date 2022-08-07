<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
}
?>


<p align=right><?php
                $tanggal = mktime(date("m"), date("d"), date("Y"));
                echo "Tanggal : <b>" . date("d/M/Y", $tanggal) . "</b> ";
                date_default_timezone_set('Asia/Jakarta');
                $jam = date("H:i:s");
                echo "| Pukul : <b>" . $jam . " " . "</b>";
                $a = date("H");
                if (($a >= 6) && ($a <= 11)) {
                  echo "<b>, Selamat Pagi !!</b>";
                } else if (($a > 11) && ($a <= 15)) {
                  echo ", Selamat Siang !!";
                } else if (($a > 15) && ($a <= 18)) {
                  echo ", Selamat Sore !!";
                } else {
                  echo ", <b> Selamat Malam </b>";
                }
                ?> </p>


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

      <h1 class="display-4">FORM ENTRY DATA SPPBP</h1>
      <p class="lead">Silakan Masukkan Data SPPBP</p>
      <hr class="my-4">
      <div class="container overflow-hidden">
        <form action="proses-input-data-sppbp.php" method="post">
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="kd-produk">Kode Produk</label>
              <input type="text" name="kd_produk" id="kd-produk" onkeyup="searchProduk(this.value)" class="form-control" autofocus required>
            </div>
            <div class="col-md-4">
              <label for="nama_produk">Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" class="form-control" readonly required>
            </div>
            <div class="col-md-4">
              <label for="bahan_kemas">Bahan Kemas</label>
              <input type="text" id="bahan_kemas" class="form-control" readonly>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="kode-sppbp">Kode SPPBP</label>
              <input type="text" name="kode-sppbp" id="kode-sppbp" class="form-control" placeholder="Masukan Kode SPPPBP" required>
            </div>
            <div class="col-md-4">
              <label for="tgl">Tanggal input SPPBP</label>
              <input type="text" name="tgl" id="tgl" class="form-control" value="<?= date('Y/m/d') ?>" placeholder="Masukan Kode SPPPBP" readonly>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="nik">NIK</label>
              <input type="number" name="nik" id="nik" onkeyup="searchNIK(this.value)" class="form-control">
            </div>
            <div class="col-md-4">
              <label for="nama_karyawan">Nama Karyawan</label>
              <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" readonly required>
            </div>
            <div class="col-md-4">
              <label for="jabatan">Jabatan</label>
              <input type="text" id="jabatan" class="form-control" readonly>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="suhu">Suhu Simpan</label>
              <input type="text" name="suhu" id="suhu" class="form-control" placeholder="Masukan Suhu Simpan">
            </div>
            <div class="col-md-4">
              <label for="metode">Metode Pemeriksaan</label>
              <input type="text" name="metode" id="metode" class="form-control" placeholder="Masukan Jenis Metode">
            </div>
            <div class="col-md-4">
              <label for="bahan">Material</label>
              <input type="text" name="bahan" id="bahan" class="form-control" placeholder="Masukan Jeniis Material">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="teks">Teks</label>
              <input type="text" name="tek" id="teks" class="form-control" placeholder="Masukan Teks">
            </div>
            <div class="col-md-4">
              <label for="warna">Warna</label>
              <input type="text" name="wrn" id="warna" class="form-control" placeholder="Masukan Warna">
            </div>
            <div class="col-md-4">
              <label for="bobot">Bobot</label>
              <input type="text" name="bbt" id="bobot" class="form-control" placeholder="Masukan Bobot">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="ukuran">Ukuran</label>
              <input type="text" name="ukur" id="ukuran" class="form-control" placeholder="Masukan Ukuran">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="abrasi">Abrasi test</label>
              <input type="text" name="abrasi" id="abrasi" class="form-control" placeholder="Masukan hasil test">
            </div>
            <div class="col-md-4">
              <label for="prosedur">Prosedur Pemeriksaan</label>
              <input type="text" name="prosedur" id="prosedur" class="form-control" placeholder="Masukan Prosedur">
            </div>
            <div class="col-md-4">
              <label for="kondisi-pengemas">Kondisi Pengemas</label>
              <textarea name="kondisi-pengemas" id="kondisi-pengemas" cols="30" rows="3" class="form-control"></textarea>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="kritis">Penyimpangan Kritis</label>
              <input type="text" name="kritis" id="kritis" class="form-control" placeholder="Masukan Penyimpangan Kritis">
            </div>
            <div class="col-md-4">
              <label for="major">Penyimpangan Major</label>
              <input type="text" name="major" id="major" class="form-control" placeholder="Masukan Penyimpangan Major">
            </div>
            <div class="col-md-4">
              <label for="minor">Penyimpangan Minor</label>
              <input type="text" name="minor" id="minor" class="form-control" placeholder="Masukan Penyimpangan Minor">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <label for="nama_supplier">Supplier</label>
              <input type="hidden" name="kd_supplier" id="kd_supplier" class="form-control">
              <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" readonly>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <button class="btn btn-primary" type="submit" name="simpan">Simpan</button>
              <button class="btn btn-warning" type="reset">reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script type="text/javascript">
      let kd_produk = '<?= isset($_GET['kd_produk']) ? $_GET['kd_produk'] : '0'; ?>'
      let nikKaryawan = '<?= $_SESSION['nik'] ?>';


      if (kd_produk != '0') {
        document.getElementById('kd-produk').value = kd_produk;
        searchProduk(kd_produk);
      }

      if (nikKaryawan) {
        document.getElementById('nik').value = nikKaryawan;
        searchNIK(nikKaryawan);
      }

      function searchNIK(nik) {
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

      function searchProduk(kd_produk) {
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
            $('#kode-sppbp').val(kd_produk.substr(0, kd_produk.length - 7))
          } else {
            $('#nama_produk').val('');
            $('#bahan_kemas').val('');
            $('#kd_supplier').val('');
            $('#nama_supplier').val('');
            $('#kode-sppbp').val('');
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