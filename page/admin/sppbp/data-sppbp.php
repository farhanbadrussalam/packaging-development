<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login-form.php");
}
?>

<?php
include("../../../system/koneksi.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../../../style/style-idsup11.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>PACKAGING DEVELOPMENT - <?php echo strtoupper($_SESSION['level']); ?></title>

  <title>LIST DATA SPPBP</title>
  <style type="text/css">
    * {
      font-family: "Trebuchet MS";

    }

    h1 {
      text-transform: uppercase;
      color: salmon;
    }

    table {
      border: 1px solid #ddeeee;
      border-collapse: collapse;
      border-spacing: 0;
      width: 100%;
      margin: 10px auto 10px auto;
    }

    th,
    td {
      border: 1px solid #ddeeee;
      padding: 10px;
      text-align: left;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <header>
    <center>
      <h1>LIST SPPBP YANG SUDAH DI INPUT KE SISTEM INFORMASI PACKDEV</h1>
    </center>
  </header>

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

  <div class="container">

    <div class="d-flex justify-content-between w-100 align-items-end">
      <div>
        <!-- Button trigger modal -->
        <?php if ($_SESSION['level'] == "Manager" || $_SESSION['level'] == "SPV") { ?>
          <a type="button" class="btn btn-primary" href="form-input-data-sppbp.php">
            Tambah SPPBP
          </a>
        <?php } ?>
      </div>
      <div>
        <form method="GET">
          <label>Pencarian Data SPPBP - PACKDEV</label>
          <div class="input-group">
            <input type="text" name="kata_cari" value="<?php if (isset($_GET['kata_cari'])) {
                                                          echo $_GET['kata_cari'];
                                                        } ?>" class="form-control" placeholder="Kata Pencarian" />
            <button class="btn btn-secondary input-group-text" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>
    <div class="table-box">

      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Kode SPPBP</th>
            <th>Nama Produk</th>
            <th>Bahan Pengemas</th>
            <th>Supplier</th>
            <th>Artwork</th>
            <th>Packshot</th>

            <!--kodisi biar admin keluar user lainnya dihide-->
            <?php if ($_SESSION['level'] == 'Manager' || $_SESSION['level'] == 'SPV') { ?>
              <th>Tindakan</th>
            <?php }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php

          include("../../../system/koneksi.php");
          $no_urut = 0;


          //jika kita klik cari, maka yang tampil query cari ini
          if (isset($_GET['kata_cari'])) {
            //menampung variabel kata_cari dari form pencarian
            $kata_cari = $_GET['kata_cari'];

            //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
            //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
            $query = "SELECT * FROM tb_sppbp inner join tb_produk on tb_produk.kd_produk = tb_sppbp.kd_produk WHERE kd_sppbp like '%" . $kata_cari . "%' OR nama_produk like '%" . $kata_cari . "%' ORDER BY kd_sppbp ASC";
          } else {
            //jika tidak ada pencarian, default yang dijalankan query ini
            $query = "SELECT * FROM tb_sppbp inner join tb_produk on tb_produk.kd_produk = tb_sppbp.kd_produk ORDER BY kd_sppbp ASC";
          }


          $result = mysqli_query($db, $query);

          if (!$result) {
            die("Query Error : " . mysqli_errno($db) . " - " . mysqli_error($db));
          }
          //kalau ini melakukan foreach atau perulangan
          while ($sppbp = mysqli_fetch_assoc($result)) {

            $no_urut++;
            echo "<tr>";
            echo "<td>" . $no_urut . "</td>";
            echo "<td>" . $sppbp['kd_sppbp'] . "</td>";
            echo "<td>" . $sppbp['nama_produk'] . "</td>";
            echo "<td>" . $sppbp['bahan_kemas'] . "</td>";
            echo "<td>" . $sppbp['kd_supplier'] . "</td>";
            echo "<td><a class='text-decoration-none' href='../produk/tampil-pdf.php?kd_produk=" . $sppbp['kd_produk'] . "'>" . $sppbp['artwork'] . "</a></td>";
            echo "<td><a class='text-decoration-none' href='../produk/tampil-gambar.php?kd_produk=" . $sppbp['kd_produk'] . "'>" . $sppbp['gambar'] . "</a></td>";
            if ($_SESSION['level'] == 'Manager' || $_SESSION['level'] == 'SPV') {
              echo "<td>";
              echo "<a href='pdf-data-sppbp.php?kd_sppbp=" . $sppbp['kd_sppbp'] . "' class='btn btn-sm me-2 btn-secondary'>Cetak</a>";
              echo "<a href='form-update-data-sppbp.php?kd_sppbp=" . $sppbp['kd_sppbp'] . "' class='btn btn-warning btn-sm me-2' >Edit</a>";
              echo "<a class='btn btn-danger btn-sm me-2' href='proses-input-data-sppbp.php?kd_sppbp=" . $sppbp['kd_sppbp'] . "'onClick=\"return confirm('Anda yakin akan menghapus data ?')\">Hapus</a>";
              echo "</td>";
            }
            echo "</tr>";
          }

          if (mysqli_num_rows($result) == 0) {
          ?>
            <tr>
              <td colspan="8" class="text-center">Data tidak ditemukan</td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
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