<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
}
include "../../../system/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="../../../style/style-idp11.css">
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


  <title>PACKAGING DEVELOPMENT - <?php echo strtoupper($_SESSION['level']); ?></title>

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
      padding: 20px;
      text-align: left;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
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
            <a class="nav-link js-scroll-trigger" aria-current="page" href="../menu-utama-admin.php"><strong>HOME</strong></a>
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
            <a class="nav-link js-scroll-trigger" href="../tentang.php">TENTANG</a>
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

      <h1 class="display-4">DATA PRODUK</h1>

      <hr class="my-4">

      <!-- Modal Tambah-->
      <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-labelledby="modalTambahProdukLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTambahProdukLabel">Tambah product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-center h3 fw-bolder">Silakan Masukkan Identitas Produk</p>
              <form action="proses-entry-data-produk.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="kode-produk">Kode Produk</label>
                    <input type="text" class="form-control" name="kode-produk" id="kode-produk" required>
                  </div>
                  <div class="col-md-6">
                    <label for="nama-produk">Nama Produk</label>
                    <input type="text" class="form-control" name="nama-produk" id="nama-produk" required>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-4">
                    <label for="bentuk-sediaan">Bentuk Sediaan</label>
                    <select name="bentuk-sediaan" id="bentuk-sediaan" class="form-select">
                      <option>Tablet</option>
                      <option>Kaplet</option>
                      <option>Kapsul</option>
                      <option>Sirup</option>
                      <option>Injeksi</option>
                      <option>Suppositoria</option>
                      <option>Suspensi</option>
                      <option>Gel</option>
                      <option>Powder</option>
                      <option>Krim</option>
                      <option>Scalp Lotion</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="kategori-produk">Kategori Produk</label>
                    <select name="kategori-produk" id="kategori-produk" class="form-select">
                      <option value="Ethical"> Ethical</option>
                      <option value="Generik"> Generik</option>
                      <option value="OTC"> OTC</option>
                      <option value="Export"> Export</option>
                      <option value="Import"> Import</option>
                      <option value="Toll In"> Toll In</option>
                      <option value="Toll Out"> Toll Out</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="bahan-kemas">Bahan Kemas</label>
                    <select name="bahan-kemas" id="bahan-kemas" class="form-select" required>
                      <option>Innerbox</option>
                      <option>Etiket Botol</option>
                      <option>Etiket Botol Depan</option>
                      <option>Etiket Botol Belakang</option>
                      <option>Sachet</option>
                      <option>Hanger</option>
                      <option>Stiker</option>
                      <option>Leaflet</option>
                      <option>Catch Cover</option>
                      <option>Foil</option>
                      <option>Blister</option>
                      <option>Vial</option>
                      <option>Ampul</option>
                      <option>Tube</option>
                      <option>Rotoplash</option>
                      <option>Outerbox</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="artwork">Upload File Artwork</label>
                    <input type="file" name="artwork" id="artwork" accept="application/pdf" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-6">
                    <label for="gambar">Upload Foto Produk</label>
                    <input type="file" name="gambar" id="gambar" accept="image/jpeg" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="kd-supplier">Supplier</label>
                    <select name="kd-supplier" id="kd-supplier" class="form-select">
                      <?php
                      $query = "SELECT * FROM tb_supplier";
                      $hasil = mysqli_query($db, $query);
                      while ($qtabel = mysqli_fetch_assoc($hasil)) {
                        echo '<option value="' . $qtabel['kd_supplier'] . '">' . $qtabel['nama_supplier'] . '</option>';
                      }
                      ?>
                    </select>
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
        </div>
      </div>

      <!-- Modal Update-->
      <div class="modal fade" id="modalUpdateProduk" tabindex="-1" aria-labelledby="modalUpdateProdukLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalUpdateProdukLabel">Update product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="proses-entry-data-produk.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="kode-produk-edit">Kode Produk</label>
                    <input type="text" class="form-control" name="kode-produk" id="kode-produk-edit" readonly>
                  </div>
                  <div class="col-md-6">
                    <label for="nama-produk-edit">Nama Produk</label>
                    <input type="text" class="form-control" name="nama-produk" id="nama-produk-edit" required>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-4">
                    <label for="bentuk-sediaan-edit">Bentuk Sediaan</label>
                    <select name="bentuk-sediaan" id="bentuk-sediaan-edit" class="form-select" required>
                      <option>Tablet</option>
                      <option>Kaplet</option>
                      <option>Kapsul</option>
                      <option>Sirup</option>
                      <option>Injeksi</option>
                      <option>Suppositoria</option>
                      <option>Suspensi</option>
                      <option>Gel</option>
                      <option>Powder</option>
                      <option>Krim</option>
                      <option>Scalp Lotion</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="kategori-produk-edit">Kategori Produk</label>
                    <select name="kategori-produk" id="kategori-produk-edit" class="form-select" required>
                      <option value="Ethical"> Ethical</option>
                      <option value="Generik"> Generik</option>
                      <option value="OTC"> OTC</option>
                      <option value="Export"> Export</option>
                      <option value="Import"> Import</option>
                      <option value="Toll In"> Toll In</option>
                      <option value="Toll Out"> Toll Out</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="bahan-kemas-edit">Bahan Kemas</label>
                    <select name="bahan-kemas" id="bahan-kemas-edit" class="form-select" required>
                      <option>Innerbox</option>
                      <option>Etiket Botol</option>
                      <option>Etiket Botol Depan</option>
                      <option>Etiket Botol Belakang</option>
                      <option>Sachet</option>
                      <option>Hanger</option>
                      <option>Stiker</option>
                      <option>Leaflet</option>
                      <option>Catch Cover</option>
                      <option>Foil</option>
                      <option>Blister</option>
                      <option>Vial</option>
                      <option>Ampul</option>
                      <option>Tube</option>
                      <option>Rotoplash</option>
                      <option>Outerbox</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="artwork-edit">Upload File Artwork</label>
                    <input type="file" name="artwork" id="artwork-edit" accept="application/pdf" class="form-control form-control-sm">
                  </div>
                  <div class="col-md-6">
                    <label for="gambar-edit">Upload Foto Produk</label>
                    <input type="file" name="gambar" id="gambar-edit" accept="image/jpeg" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="kd-supplier-edit">Supplier</label>
                    <select name="kd-supplier" id="kd-supplier-edit" class="form-select">
                      <?php
                      $query = "SELECT * FROM tb_supplier";
                      $hasil = mysqli_query($db, $query);
                      while ($qtabel = mysqli_fetch_assoc($hasil)) {
                        echo '<option value="' . $qtabel['kd_supplier'] . '">' . $qtabel['nama_supplier'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                    <button class="btn btn-warning" type="reset">reset</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- TABEL CARI PRODUK -->

  <div class="list-data">
    <div class="container">
      <div class="d-flex justify-content-between w-100 align-items-end">
        <div>
          <!-- Button trigger modal -->
          <?php if ($_SESSION['level'] == "Manager" || $_SESSION['level'] == "Designer") { ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">
              Tambah Produk
            </button>
            <a href="pdf-data-produk.php" class="btn btn-secondary">Cetak Laporan</a>
          <?php } ?>
        </div>
        <div>
          <form method="GET">
            <label>Pencarian Produk</label>
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
              <th>Kode Produk</th>
              <th>Nama Produk</th>
              <th>Bentuk Sediaan</th>
              <th>Kategori Produk</th>
              <th>Bahan Pengemas</th>
              <th>Supplier</th>
              <th>Artwork</th>
              <th>Packshot</th>
              <th>SPPBP</th>
              <?php if ($_SESSION['level'] == "Manager" || $_SESSION['level'] == "Designer") { ?>
                <th>Tindakan</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $no_urut = 0;
            //jika kita klik cari, maka yang tampil query cari ini
            if (isset($_GET['kata_cari'])) {
              //menampung variabel kata_cari dari form pencarian
              $kata_cari = $_GET['kata_cari'];

              //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
              //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
              $query = "SELECT * FROM tb_produk WHERE kd_produk like '%" . $kata_cari . "%' OR nama_produk like '%" . $kata_cari . "%' OR kd_supplier like '%" . $kata_cari . "%' ORDER BY kd_produk ASC";
            } else {
              //jika tidak ada pencarian, default yang dijalankan query ini
              $query = "SELECT * FROM tb_produk ORDER BY kd_produk ASC";
            }


            $result = mysqli_query($db, $query);

            if (!$result) {
              die("Query Error : " . mysqli_errno($db) . " - " . mysqli_error($db));
            }
            //kalau ini melakukan foreach atau perulangan
            while ($row = mysqli_fetch_assoc($result)) {

              $no_urut++;
              echo "<tr>";
              echo "<td>" . $no_urut . "</td>";
              echo "<td>" . $row['kd_produk'] . "</td>";
              echo "<td>" . $row['nama_produk'] . "</td>";
              echo "<td>" . $row['bentuk_sediaan'] . "</td>";
              echo "<td>" . $row['kategori_produk'] . "</td>";
              echo "<td>" . $row['bahan_kemas'] . "</td>";
              echo "<td>" . $row['kd_supplier'] . "</td>";

              echo "<td><a class='text-decoration-none' href='tampil-pdf.php?kd_produk=" . $row['kd_produk'] . "'>" . $row['artwork'] . "</a></td>";
              echo "<td><a class='text-decoration-none' href='tampil-gambar.php?kd_produk=" . $row['kd_produk'] . "'>" . $row['gambar'] . "</a></td>";

              $sqlSppbp = "SELECT * FROM tb_sppbp where kd_produk = '" . $row['kd_produk'] . "'";
              $sppbp = mysqli_query($db, $sqlSppbp);
              $dtSppbp = mysqli_fetch_assoc($sppbp);

              echo "<td class='text-center'>";
              if ($dtSppbp) {
                echo "<a target='_blank' href='../sppbp/pdf-data-sppbp.php?kd_sppbp=" . $dtSppbp['kd_sppbp'] . "' class='text-decoration-none'>" . $dtSppbp['kd_sppbp'] . "</a>";
              } else {
                if ($_SESSION['level'] == "Manager" || $_SESSION['level'] == "SPV") {
                  echo "<a class='btn btn-primary btn-sm' href='../sppbp/form-input-data-sppbp.php?kd_produk=" . $row['kd_produk'] . "'>Tambah SPPBP</a>";
                } else {
                  echo "&nbsp;";
                }
              }
              echo "</td>";
              if ($_SESSION['level'] == "Manager" || $_SESSION['level'] == "Designer") {
                echo "<td class='text-center'>";
                echo "<button class='btn btn-warning btn-sm mb-2 me-2' data-item='" . json_encode($row) . "' onclick='updateData(this)'>Edit</button>";
                echo "<a class='btn btn-danger btn-sm me-2' href='proses-entry-data-produk.php?kd_produk=" . $row['kd_produk'] . "' onClick=\"return confirm('Anda yakin akan menghapus data ?')\">Hapus</a>";
                echo "</td>";
              }
              echo "</tr>";
            }

            if (mysqli_num_rows($result) == 0) {
            ?>
              <tr>
                <td colspan="10" class="text-center">Data tidak ditemukan</td>
              </tr>
            <?php
            }
            ?>
          </tbody>


        </table>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script>
    function updateData(obj) {
      let item = $(obj).data('item');

      document.getElementById('kode-produk-edit').value = item.kd_produk;
      document.getElementById('nama-produk-edit').value = item.nama_produk;
      document.getElementById('bentuk-sediaan-edit').value = item.bentuk_sediaan;
      document.getElementById('kategori-produk-edit').value = item.kategori_produk;
      document.getElementById('bahan-kemas-edit').value = item.bahan_kemas;
      document.getElementById('kd-supplier-edit').value = item.kd_supplier;

      $('#modalUpdateProduk').modal('show');
    }
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>