<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="../../../style/style-idsup11.css">
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
            <a class="nav-link js-scroll-trigger" aria-current="page" href="../../../page/admin/menu-utama-admin.php"><strong>HOME</strong></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#akun" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              GUIDELINE KEMASAN
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

              <li><a class="dropdown-item" href="../../../../../guideline/GL ETICAL PRODUCT.pdf">PRODUK ETHICAL</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="../../../../../guideline/GL OTC 2020.pdf">PRODUK OTC</a></li>
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

      <h1 class="display-4">DATA KARYAWAN</h1>

      <hr class="my-4">

      <!-- Modal Tambah-->
      <div class="modal fade" id="modalTambahKaryawan" tabindex="-1" aria-labelledby="modalTambahKaryawanLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTambahKaryawanLabel">Tambah karyawan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="proses-entry-data-karyawan.php" method="POST">
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control" name="nik" id="nik" required>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" required>
                  </div>
                  <div class="col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@combiphar.com" required>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="tgl_lahir">Tanggal lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" required>
                  </div>
                  <div class="col-md-6">
                    <label>Gender</label>
                    <div class="col-md-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender-laki" value="L" required>
                        <label class="form-check-label" for="gender-laki">Laki-laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender-perempuan" value="P" required>
                        <label class="form-check-label" for="gender-perempuan">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="no_tlp">No telepon</label>
                    <input type="number" class="form-control" name="no_tlp" id="no_tlp" required>
                  </div>
                  <div class="col-md-6">
                    <label for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan" required>
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
      <div class="modal fade" id="modalUpdateKaryawan" tabindex="-1" aria-labelledby="modalUpdateKaryawanLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalUpdateKaryawanLabel">Update karyawan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="proses-entry-data-karyawan.php" method="POST">
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="nik_edit">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik_edit" required>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="nama_karyawan_edit">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan_edit" required>
                  </div>
                  <div class="col-md-6">
                    <label for="email_edit">Email</label>
                    <input type="email" class="form-control" name="email" id="email_edit" placeholder="example@combiphar.com" required>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="tgl_lahir_edit">Tanggal lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir_edit" required>
                  </div>
                  <div class="col-md-6">
                    <label>Gender</label>
                    <div class="col-md-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender-laki_edit" value="L" required>
                        <label class="form-check-label" for="gender-laki_edit">Laki-laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender-perempuan_edit" value="P" required>
                        <label class="form-check-label" for="gender-perempuan_edit">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="alamat_edit">Alamat</label>
                    <textarea name="alamat" id="alamat_edit" cols="30" rows="3" class="form-control"></textarea>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="no_tlp_edit">No telepon</label>
                    <input type="number" class="form-control" name="no_tlp" id="no_tlp_edit" required>
                  </div>
                  <div class="col-md-6">
                    <label for="jabatan_edit">Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" id="jabatan_edit" required>
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

      <!-- view detail -->
      <div class="modal fade" id="modalDetailKaryawan" tabindex="-1" aria-labelledby="modalDetailKaryawanLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalDetailKaryawanLabel">Detail karyawan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="p-4 pt-2">
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-between">
                    <label class="fw-bold">NIK</label>
                    <label class="fw-bold">:</label>
                  </div>
                  <div class="col-md-8">
                    <span id="nik_detail"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-between">
                    <label class="fw-bold">Nama</label>
                    <label class="fw-bold">:</label>
                  </div>
                  <div class="col-md-8">
                    <span id="nama_detail"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-between">
                    <label class="fw-bold">Email</label>
                    <label class="fw-bold">:</label>
                  </div>
                  <div class="col-md-8">
                    <span id="email_detail"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-between">
                    <label class="fw-bold">Tanggal Lahir</label>
                    <label class="fw-bold">:</label>
                  </div>
                  <div class="col-md-8">
                    <span id="tgl_lahir_detail"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-between">
                    <label class="fw-bold">Gender</label>
                    <label class="fw-bold">:</label>
                  </div>
                  <div class="col-md-8">
                    <span id="gender_detail"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-between">
                    <label class="fw-bold">Alamat</label>
                    <label class="fw-bold">:</label>
                  </div>
                  <div class="col-md-8">
                    <span id="alamat_detail"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-between">
                    <label class="fw-bold">No Telepon</label>
                    <label class="fw-bold">:</label>
                  </div>
                  <div class="col-md-8">
                    <span id="no_tlp_detail"></span>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 d-flex justify-content-between">
                    <label class="fw-bold">Jabatan</label>
                    <label class="fw-bold">:</label>
                  </div>
                  <div class="col-md-8">
                    <span id="jabatan_detail"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <br>
  </div>


  <!-- LIST DATA KARYAWAN -->

  <div class="list-data">
    <div class="container">
      <div class="d-flex justify-content-between w-100 align-items-end">
        <div>
          <!-- Button trigger modal -->
          <?php if ($_SESSION['level'] == "Manager") { ?>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKaryawan">
              Tambah karyawan
            </button>
          <?php } ?>
        </div>

        <div>
          <form method="GET">
            <h2>Pencarian Data Karyawan</h2>
            <div class="input-group">
              <input type="text" name="kata_cari" class="form-control" value="<?php if (isset($_GET['kata_cari'])) {
                                                                                echo $_GET['kata_cari'];
                                                                              } ?>" />
              <button class="btn btn-secondary input-group-text" type="submit">Cari</button>
            </div>
        </div>
        </form>
      </div>
      <div class="table-box mt-2">
        <table>
          <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama Karyawan</th>
              <th>Jabatan</th>
              <th>Tindakan</th>
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
              $query = "SELECT * FROM tb_karyawan WHERE nik like '%" . $kata_cari . "%' OR nama_karyawan like '%" . $kata_cari . "%' OR jabatan like '%" . $kata_cari . "%' ORDER BY nik ASC";
            } else {
              //jika tidak ada pencarian, default yang dijalankan query ini
              $query = "SELECT * FROM tb_karyawan ORDER BY nik ASC";
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
              echo "<td>" . $row['nik'] . "</td>";
              echo "<td>" . $row['nama_karyawan'] . "</td>";
              echo "<td>" . $row['jabatan'] . "</td>";
              echo "<td class='text-center'>";
              echo "<button class='btn btn-info btn-sm me-2' data-item='" . json_encode($row) . "' onclick='lihatData(this)'>Detail</button>";
              if ($_SESSION['level'] == "Manager") {
                echo "<button class='btn btn-warning btn-sm me-2' data-item='" . json_encode($row) . "' onclick='updateData(this)'>Edit</button>";
                echo "<a class='btn btn-danger btn-sm' href='proses-entry-data-karyawan.php?nik=" . $row['nik'] . "'onClick=\"return confirm('Anda yakin akan menghapus data ?')\">Hapus</a>";
              }
              echo "</td>";
              echo "</tr>";
            }

            if (mysqli_num_rows($result) == 0) {
            ?>
              <tr>
                <td colspan="5" class="text-center">Data tidak ditemukan</td>
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

      document.getElementById('nik_edit').value = item.nik;
      document.getElementById('nama_karyawan_edit').value = item.nama_karyawan;
      document.getElementById('jabatan_edit').value = item.jabatan;
      document.getElementById('email_edit').value = item.email;
      document.getElementById('tgl_lahir_edit').value = item.tgl_lahir;
      if (item.gender == 'L') {
        document.getElementById('gender-laki_edit').checked = true;
      } else if (item.gender == 'P') {
        document.getElementById('gender-perempuan_edit').checked = true;
      } else {
        document.getElementById('gender-laki_edit').checked = false;
        document.getElementById('gender-perempuan_edit').checked = false;
      }
      document.getElementById('alamat_edit').value = item.alamat;
      document.getElementById('no_tlp_edit').value = item.no_telp;

      $('#modalUpdateKaryawan').modal('show');
    }

    function lihatData(obj) {
      let item = $(obj).data('item');

      document.getElementById('nik_detail').innerHTML = item.nik;
      document.getElementById('nama_detail').innerHTML = item.nama_karyawan;
      document.getElementById('jabatan_detail').innerHTML = item.jabatan;
      document.getElementById('email_detail').innerHTML = item.email;
      document.getElementById('tgl_lahir_detail').innerHTML = item.tgl_lahir;
      document.getElementById('gender_detail').innerHTML = item.gender == 'L' ? 'Laki-laki' : 'Perempuan';
      document.getElementById('alamat_detail').innerHTML = item.alamat ? item.alamat : '-';
      document.getElementById('no_tlp_detail').innerHTML = item.no_telp ? item.no_telp : '-';

      $('#modalDetailKaryawan').modal('show');
    }
  </script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

</body>

</html>