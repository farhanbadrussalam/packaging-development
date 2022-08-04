<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="../../style/style-menu-utama.css">
  <!-- Required meta tags -->
  <meta charset="utf-8">


  <style>
    img:hover {
      transform: scale(1.1);
      /* 110% zoom hover, sesuaikan dgn kebutuhan...*/
    }
  </style>


  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">



  <title>PACKAGING DEVELOPMENT</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#page-top">PACKAGING DEVELOPMENT DEPARTMENT - LOGIN STAFF</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link js-scroll-trigger" aria-current="page" href="menu-utama-administrasi.html"><strong>HOME</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="buka-galeri1.php">GALERI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="tentang.php">TENTANG</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#akun" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              AKUN
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="../../index.php" onclick="return confirm('Apakah anda yakin ingin melakukan Switch User ?')">Ganti User</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../../system/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Keluar Aplikasi</a></li>
            </ul>
        </ul>
      </div>
    </div>
    </div>
  </nav>



  <div class="jumbotron">
    <div class="container">
      <br>
      <br><br><br>

      <h1 class="display-4">RESEARCH AND DEVELOPMENT DIVISION</h1>
      <p class="lead">Selamat Datang di Sistem Informasi Packaging Development.</p>
      <hr class="my-4">
      <p>Ini Merupakan Situs Internal Departemen Packaging Development</p>


      <div class="container overflow-hidden">
        <div class="row gx-5">
          <div class="col">
            <strong>
              <div class="p-3 ">
                <p color:#fafafa>VIDEO</p>
              </div>
            </strong>
            <video loop autoplay="TRUE">
              <source src="../../video/TVC_InstoRedEyesDuniaTidakBerhenti.mp4" type="video/webm" padding="30px">
              Browsermu tidak mendukung tag ini, upgrade donk!
            </video>
            <br> <br>
            <div class="col">
              <div class="p-1"></div>
              <img src="../../image/logo combiphar putih small.png" />
            </div>
          </div>

          <div class="col">
            <strong>
              <div class="p-3 ">
                <p color:#fafafa>APP</p>
              </div>
            </strong>


            <a href="../../page/admin/produk/form-entry-data-produk.php">
              <img src="../../image/entry data produk.png" alt="Form Input Data Barang" style="width:157px">
            </a>

            <a href="list-data-karyawan.php">
              <img src="../../image/list data karyawan.png" alt="List Data Karyawan" style="width:157px">
            </a>

            <a href="list-data-produk.php">
              <img src="../../image/list data produk.png" alt="List Data Barang" style="width:157px">
            </a>

            <a href="cari-data-produk-11.php">
              <img src="../../image/Cari Data Produk.png" alt="List Data User" style="width:157px">
            </a>

            <a href="form-input-foto.php">
              <img src="../../image/Input Data Packshoot.png" alt="List Data User" style="width:157px">
            </a>

            <a href="form-entry-data-supplier.php">
              <img src="../../image/Input Data Supplier.png" alt="List Data User" style="width:157px">
            </a>

            <a href="list-data-supplier.php">
              <img src="../../image/List Data Supplier.png" alt="List Data User" style="width:157px">
            </a>

            <br><br><br>



          </div>
        </div>
      </div>
    </div>
    <br>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

</body>

</html>