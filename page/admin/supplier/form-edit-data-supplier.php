<?php

include ("../../../system/koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['kd_supplier']) ){
    header('Location: form-input-data-supplier.php');
}

//ambil id dari query string
$kd_supplier = $_GET['kd_supplier'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_supplier WHERE kd_supplier='$kd_supplier'";
$query = mysqli_query($db, $sql);
$karyawan = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
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


   

  <title>PACKAGING DEVELOPMENT</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">        
        <div class="container">
      <a class="navbar-brand" href="#page-top">PACKAGING DEVELOPMENT DEPARTMENT</a>       
      <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav navbar-nav ml-auto">
          <li class="nav-item active">
          <a class="nav-link js-scroll-trigger" aria-current="page" href="menu-utama.html"><strong>HOME</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="buka-galeri.php">GALERI</a>
          </li>
           <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="tentang.php">TENTANG</a>
          </li>
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#akun" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            AKUN
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">              
            <li><a class="dropdown-item" href="login-form.php" onclick="return confirm('Apakah anda yakin ingin melakukan Switch User ?')">Ganti User</a></li>
            <li><hr class="dropdown-divider"></li>
             <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Keluar Aplikasi</a></li>  
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

  <h1 class="display-4">FORM EDIT SUPPLIER</h1> 
 
  <form action="proses-edit-data-supplier.php" method="POST">
  <p class="lead">Silakan Update Data Supplier</p>
  <hr class="my-4">

  <div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">  

     <input type="hidden" name="kd_supplier" value="<?php echo $karyawan['kd_supplier'] ?>" />

       <tr>
             <td>Nama Supplier</td>
             <td>:</td>
             <br>
             <td> <input type="text" name="nama-supplier" size="50" maxlength="50" placeholder="Masukkan Nama Supplier..." value="<?php echo $karyawan['nama_supplier']?>" /></td>
         </tr>

         <br><br>

          <tr>
             <td>Alamat</td>
             <td>:</td>
             <br>
             <td><input type="text" name="alamat-supplier" size="40" maxlength="50" placeholder="Masukkan Alamat..." value="<?php echo $karyawan['alamat_supplier']?>" />
             </td>
         </tr>  

          <br><br> 

          <tr>
             <td>No. Telepon</td>
             <td>:</td>
             <br>
             <td><input type="text" name="no-telepon" size="40" maxlength="50" placeholder="Masukkan No. Telepon..." value="<?php echo $karyawan['no_telepon']?>" />
             </td>
         </tr>   


 <br><br>


  
    <body>
         <tr>
             <td><br>                      
              <input class="btn btn-primary" name="simpan" type="submit" value="Simpan">
              <input class="btn btn-primary" type="button" value="Batalkan" onclick="history.back(-1)" /></td>
           </tr> 
         
         <br><br>                               

           
    </div>
  </div>
</div> 
</div>
<br>
</form>
</div>


 <!-- LIST DATA KARYAWAN -->

  <div class="list-data">
  <div class="container"> 

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
    th, td {
      border: 1px solid #ddeeee;
      padding: 20px;
      text-align: left;
    }
  </style>


  </table>
 
  </table>
  </div>
   </div>
    </div>
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








