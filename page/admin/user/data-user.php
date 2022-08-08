<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
}
?>

<?php
include("../../../system/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" type="text/css" href="../../../style/style-idsup11.css">
  <!-- Required meta tags -->
  <meta charset="utf-8">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>PACKAGING DEVELOPMENT - <?php echo strtoupper($_SESSION['level']); ?></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


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

      <h1 class="display-4">DATA USER</h1>

      <hr class="my-4">

      <!-- Modal Tambah-->
      <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-labelledby="modalTambahUserLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTambahUserLabel">Tambah user</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../user/proses-input-data-user.php" method="POST">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control" name="nik" onkeyup="searchNIK(this)" id="nik" required>
                  </div>
                  <div class="col-md-6">
                    <label for="user_id">USER ID</label>
                    <input type="text" class="form-control" name="user_id" id="user_id" required>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="nama_karyawan">Nama User</label>
                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" required readonly>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="level">Level</label>
                    <select name="level" id="level" class="form-select" required>
                      <option value='Manager'>Manager</option>
                      <option value='SPV'>SPV</option>
                      <option value='Designer'>Designer</option>
                      <option value='Staff'>Staff</option>
                      <option value='Customers'>Customers</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" name="pwd" id="pwd" required>
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

      <!-- Modal Update  -->
      <div class="modal fade" id="modalUpdateUser" tabindex="-1" aria-labelledby="modalUpdateUserLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalUpdateUserLabel">Update user</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="../user/proses-input-data-user.php" method="POST">
                <div class="row mb-2">
                  <div class="col-md-6">
                    <label for="nik_edit">NIK</label>
                    <input type="text" class="form-control" name="nik" id="nik_edit" readonly>
                  </div>
                  <div class="col-md-6">
                    <label for="user_id_edit">USER ID</label>
                    <input type="text" class="form-control" name="user_id" id="user_id_edit" readonly>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="nama_karyawan_edit">Nama User</label>
                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan_edit" readonly required>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="level_edit">Level</label>
                    <select name="level" id="level_edit" class="form-select">
                      <option value='Manager'>Manager</option>
                      <option value='SPV'>SPV</option>
                      <option value='Designer'>Designer</option>
                      <option value='Staff'>Staff</option>
                      <option value='Customers'>Customers</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-12">
                    <label for="pwd_edit">Password</label>
                    <input type="password" class="form-control" name="pwd" id="pwd_edit">
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

  <div class="container">

    <div class="d-flex justify-content-between w-100 align-items-end">
      <div>
        <!-- Button trigger modal -->
        <?php if ($_SESSION['level'] == "Manager") { ?>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahUser">
            Tambah user
          </button>
        <?php } ?>
      </div>
      <div>
        <form method="GET">
          <h1>Pencarian Data USER</h1>
          <div class="input-group">
            <input placeholder="Kata Pencarian" type="text" name="kata_cari" class="form-control" value="<?php if (isset($_GET['kata_cari'])) {
                                                                                                            echo $_GET['kata_cari'];
                                                                                                          } ?>" />
            <button class="btn btn-secondary input-group-text" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    <div class="table-box mt-2">
      <table border="1">
        <thead>
          <tr>
            <th>No</th>
            <th>User ID</th>
            <th>NIK</th>
            <th>Nama user</th>
            <th>Level</th>
            <?php if ($_SESSION['level'] == "Manager") { ?>
              <th>Tindakan</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no_urut = 0;

          if (isset($_GET['kata_cari'])) {
            $kata_cari = $_GET['kata_cari'];
            $sql = "SELECT * FROM tb_user WHERE nik like '%" . $kata_cari . "%' OR nama_karyawan like '%" . $kata_cari . "%' ORDER BY nik ASC";
          } else {
            $sql = "SELECT * FROM tb_user";
          }
          $query = mysqli_query($db, $sql);

          while ($user = mysqli_fetch_array($query)) {
            $no_urut++;
            echo "<tr>";
            echo "<td>" . $no_urut . "</td>";
            echo "<td>" . $user['user_id'] . "</td>";
            echo "<td>" . $user['nik'] . "</td>";
            echo "<td>" . $user['nama_karyawan'] . "</td>";
            echo "<td>" . $user['level'] . "</td>";
            if ($_SESSION['level'] == "Manager") {
              echo "<td class='text-center'>";
              echo "<button class='btn btn-warning btn-sm me-2' data-item='" . json_encode($user) . "' onclick='updateData(this)'>Edit</button>";
              echo "<a class='btn btn-danger btn-sm' href='../user/proses-input-data-user.php?user_id=" . $user['user_id'] . "' onClick=\"return confirm('Anda yakin akan menghapus data ?')\">Hapus</a>";
              echo "</td>";
            }
            echo "</tr>";
          }

          if (mysqli_num_rows($query) == 0) {
          ?>
            <tr>
              <td colspan="7" class="text-center">Data tidak ditemukan</td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <center>
        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
      </center>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>
      function updateData(obj) {
        let item = $(obj).data('item');

        document.getElementById('user_id_edit').value = item.user_id;
        document.getElementById('nik_edit').value = item.nik;
        document.getElementById('nama_karyawan_edit').value = item.nama_karyawan;
        document.getElementById('level_edit').value = item.level;
        document.getElementById('pwd_edit').value = item.pwd;

        $('#modalUpdateUser').modal('show');
      }

      function searchNIK(val) {
        const nik = val.value;
        $.ajax({
          url: '../data-karyawan/ajax-karyawan.php',
          data: {
            nik: nik
          },
        }).success(function(data) {
          if (data) {
            const json = JSON.parse(data);
            $('#nama_karyawan').val(json.nama_karyawan);
          } else {
            $('#nama_karyawan').val('');
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