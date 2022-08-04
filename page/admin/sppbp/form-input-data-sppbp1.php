<?php  
session_start();
if (!isset($_SESSION['user_id'])){
  header("Location: index.php");  
}
?>


<p align=right><?php
$tanggal= mktime(date("m"),date("d"),date("Y"));
echo "Tanggal : <b>".date("d/M/Y", $tanggal)."</b> ";
date_default_timezone_set('Asia/Jakarta');
$jam=date("H:i:s");
echo "| Pukul : <b>". $jam." "."</b>";
$a = date ("H");
if (($a>=6) && ($a<=11)){
echo "<b>, Selamat Pagi !!</b>";
}
else if(($a>11) && ($a<=15))
{
echo ", Selamat Siang !!";}
else if (($a>15) && ($a<=18)){
echo ", Selamat Sore !!";}
else { echo ", <b> Selamat Malam </b>";}
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
  <title>PACKAGING DEVELOPMENT</title>
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
   <script type="text/javascript">
            function isi_otomatis(){
                var nik = $("#nik").val();
                $.ajax({
                    url: '../../../page/admin/data-karyawan/ajax-karyawan.php',
                    data:"nik="+nik ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama_karyawan').val(obj.nama_karyawan);
                    $('#jabatan').val(obj.jabatan);                  
                });
            }
        </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <script type="text/javascript">
            function isi(){
                var kd_produk = $("#kd_produk").val();
                $.ajax({
                    url: '../../../page/admin/produk/ajax-produk.php',
                    data:"kd_produk="+kd_produk ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);  
                    $('#nama_produk').val(obj.nama_produk);                 
                    $('#bahan_kemas').val(obj.bahan_kemas);
                    $('#kd_supplier').val(obj.kd_supplier);                  
                }); 
            }
        </script>
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

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../../guideline/GL OTC 2020.pdf">PRODUK OTC</a></li>            
          </ul>  

          
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../../../page/admin/tentang.php">TENTANG</a>
          </li>
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#akun" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            AKUN
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">              
            <li><a class="dropdown-item" href="../../../index.php">Ganti User</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../../system/logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Keluar Aplikasi</a></li>
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
       <img class="kiri" src="../../../image/logo combiphar ungu.png" width="250px"/> 

  <h1 class="display-4">FORM ENTRY DATA SPPBP</h1> 
    <form action="../../../page/admin/sppbp/proses-input-data-sppbp.php" method="POST">
  <p class="lead">Silakan Masukkan Data SPPBP</p>
   <hr class="my-4">

  <div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">

  <table border="0" cellspacing="10" width="800" align="left">  
  <form action="proses-input-data-sppbp.php" method="POST">
        <tr>
          <td>Kode SPPBP</td>
          <td>:</td>
          <td><input type="text" name="kode-sppbp" placeholder="Masukan Kode SPPBP..."size="20" maxlength="10" autocomplete="   off" autofocus/>
        </tr>

        <tr>
              <td>Tanggal Input SPPBP</td>
              <td>:</td>
              <td><input type="text" name="tgl" value="<?php echo date('y/m/d');?>" /></td>
          </tr>

          <tr>
              <td>NIK</td>
              <td>:</td>
              <td><input type="text" name="nik" onkeyup="isi_otomatis()" id="nik">
              </td>

          </tr>

          <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" name="nama_karyawan" id="nama_karyawan" size="50" maxlength="50"/>
              </td>
          </tr>

          <tr>
              <td>Jabatan</td>
              <td>:</td>
              <td><input type="text" name="jabatan" id="jabatan" size="50" maxlength="50"/>
              </td>
          </tr>

          <tr>
              <td>Kode Produk</td>
              <td>:</td>
               <td><input type="text" name="kd_produk" onkeyup="isi()" id="kd_produk">
              </td>
          </tr>

            <tr>
              <td>Nama Produk</td>
              <td>:</td>
              <td><input type="text" name="nama_produk" id="nama_produk" size="50" maxlength="50"/>
              </td>
          </tr>

          <tr>
              <td>Bahan Kemas</td>
              <td>:</td>
              <td><input type="text" name="bahan_kemas" id="bahan_kemas" size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Suhu Simpan</td>
              <td>:</td>
              <td><input type="text" name="suhu" placeholder="Masukan Suhu Simpan..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Metode Pemeriksaan</td>
              <td>:</td>
              <td><input type="text" name="metode" placeholder="Masukan Jenis Metode..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Material</td>
              <td>:</td>
              <td><input type="text" name="bahan" placeholder="Masukan Jenis Material..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Teks</td>
              <td>:</td>
              <td><input type="text" name="tek" placeholder="Masukan Teks..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Warna</td>
              <td>:</td>
              <td><input type="text" name="wrn" placeholder="Masukan Warna..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Bobot</td>
              <td>:</td>
              <td><input type="text" name="bbt" placeholder="Masukan Bobot..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Ukuran</td>
              <td>:</td>
              <td><input type="text" name="ukur" placeholder="Masukan Ukuran..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Kerekatan Lem</td>
              <td>:</td>
              <td><input type="text" name="lem" placeholder="Hasil Kerekatan Lem..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Kondisi Lockbottom</td>
              <td>:</td>
              <td><input type="text" name="lockbottom" placeholder="Masukan Kondisi..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Abrasi Test</td>
              <td>:</td>
              <td><input type="text" name="abrasi" placeholder="Masukan Hasil Test..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Kondisi Pengemas</td>
              <td>:</td>
              <td><textarea name="kondisi-pengemas" textarea cols="49" rows="20" style="resize:vertical" ></textarea></td>
          </tr>

          <tr>
              <td>Prosedur Pemeriksaan</td>
              <td>:</td>
              <td><input type="text" name="prosedur" placeholder="Masukan Prosedur..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Kode Supplier</td>
              <td>:</td>
              <td><input type="text" name="kd_supplier" id="kd_supplier" size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Penyimpangan Kritis</td>
              <td>:</td>
              <td><input type="text" name="kritis" placeholder="Masukan Penyimpangan Kritis..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Penyimpangan Major</td>
              <td>:</td>
              <td><input type="text" name="major" placeholder="Masukan Penyimpangan Major..." size="50" maxlength="50"/></td>
          </tr>

          <tr>
              <td>Penyimpangan Minor</td>
              <td>:</td>
              <td><input type="text" name="minor" placeholder="Masukan Penyimpangan Minor..." size="50" maxlength="50"/></td>
          </tr>     
             

    </table>      
    </tbody>



  <table border="0" cellspacing="10" width="800" align="left">
    <body>
         <tr>
             <td><br>                      
              <input class="btn btn-primary" name="simpan" type="submit" value="Simpan">
              <input class="btn btn-primary" type="reset" value="Reset"></td>
           </tr> 
            </table>            
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



