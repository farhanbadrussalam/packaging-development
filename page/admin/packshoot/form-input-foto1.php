<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../../../style/style-input-galeri.css">
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
            <a class="nav-link js-scroll-trigger" href="../../../page/admin/packshoot/galeri.php">GALERI</a>
          </li>
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

  <h1 class="display-4">FORM INPUT ILLUSTARSI PRODUK</h1> 

  <p class="lead">Silakan Masukkan Gambar Illustrasi</p>
  <hr class="my-4">

  <div class="container overflow-hidden">
  <div class="row gx-5">
    <div class="col">
 
    <body>
  <div id="content">
    
    <form name="fileUpload" method="post" id="fileUpload" enctype="multipart/form-data" action="proses-upload-foto.php"">
      <div>
        <label for="gambar">Pilih gambar yang akan diupload</label>
        <br><br>
      
        <input type="file" name="photo" required=""><br>
      </div>
      <br>
      <div>        
      <button type="submit" name="upload">Upload</button>
      </div>
    </form>

    

  </div>
           
    </div>
  </div>
</div> 
</div>
<br>
</div>

  <br><br><br>

  <!-- TABEL CARI PRODUK -->  
  
  <div class="list-data">

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

 tr:nth-child(even){
      background-color: #f2f2f2;
    }
    
  </style>
</head>

<div class="container">

<body>
  <h1 style="text-align: right;">Pencarian Illustrasi Produk</h1>
  <form method="GET" action="form-input-foto1.php" style="text-align: right;">
    <label>Kata Pencarian : </label>
    <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
    <button type="submit">Cari</button>
  </form>

  <div class="table-box">

  <table>
    <thead>
      <tr>
        <th>No</th> 
        <th>Nama Produk</th>
        <th>Tindakan</th>
              
      </tr>
    </div>  
    </form>





      <?php 
      
      include ("../../../system/koneksi.php");
      $no_urut=0;   


        //jika kita klik cari, maka yang tampil query cari ini
        if(isset($_GET['kata_cari'])) {
          //menampung variabel kata_cari dari form pencarian
          $kata_cari = $_GET['kata_cari'];

          //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
          //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
          $query = "SELECT * FROM tb_galeri WHERE id like '%".$kata_cari."%' OR gambar like '%".$kata_cari."%' ORDER BY id ASC";
        } else {
          //jika tidak ada pencarian, default yang dijalankan query ini
          $query = "SELECT * FROM tb_galeri ORDER BY id ASC";
        }
        

        $result = mysqli_query($db, $query);

        if(!$result) {
          die("Query Error : ".mysqli_errno($db)." - ".mysqli_error($db));
        }
        //kalau ini melakukan foreach atau perulangan
        while ($row = mysqli_fetch_assoc($result)) 
        {
      
    $no_urut++;
      echo "<tr>";
      echo "<td>".$no_urut."</td>";
      echo "<td>".$row['gambar']."</td>";
     

      
      echo "<td>";
      echo "<a href='../../admin/packshoot/tampil-gambar.php?id=".$row['id']."'>View</a> | ";
      echo "<a href='form-edit-data-galeri.php?id=".$row['id']."'>Edit</a> | ";
      echo "<a href='hapus-data-galeri.php?id=".$row['id']."' onClick=\"return confirm('Anda yakin akan menghapus data ?')\">Hapus</a>";
    
      echo "</td>";

      echo "</tr>";
      }
      ?>
    </tbody>
     </tbody>



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
