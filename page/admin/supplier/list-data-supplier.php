<?php  
session_start();
if (!isset($_SESSION['user_id'])){
  header("Location: index.php");  
}
?>



<?php  
include ("../../../system/koneksi.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../../style/style-idsup11.css">
	<meta charset="utf-8">
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<title>LIST DATA SUPPLIER</title>
	<style type="text/css">
		* {
			font-family: "Trebuchet MS";\
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
			text-align: left;		}

			        tr:nth-child(even){
      background-color: #f2f2f2;
    }
    
	</style>
</head>
<body>
	<header>
		<center><h1>LIST PRODUK YANG SUDAH DI INPUT KE SISTEM INFORMASI PACKDEV</h1></center>
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

	<header>
		
	</header>
<div class="container">

	<br>
	
	<table border="1">
		<thead>
			<br>
			<center><h1>LIST SUPPLIER YANG SUDAH DI INPUT KE SISTEM INFORMASI PACKDEV</h1></center>
			<br>
			<tr>
				<th>No</th>
				<th>Kode Supplier</th>
				<th>Nama Supplier</th>
				<th>Alamat</th>	
				<th>No. Telepon</th>


				<!--kodisi biar Manager keluar user lainnya dihide-->
				<?php if ($_SESSION['level'] == 'Manager') { ?>
				<th>Tindakan</th>	
			<?php }
			?>

			</tr>
		</thead>



		<tbody>

		<?php  
		$no_urut = 0;
		$sql = "SELECT * FROM tb_SUPPLIER";
		$query = mysqli_query($db, $sql);

		while($SUPPLIER = mysqli_fetch_array($query))
		{
			$no_urut++;
			echo "<tr>";
			echo "<td>".$no_urut."</td>";
			echo "<td>".$SUPPLIER['kd_supplier']."</td>";
			echo "<td>".$SUPPLIER['nama_supplier']."</td>";
			echo "<td>".$SUPPLIER['alamat_supplier']."</td>";
			echo "<td>".$SUPPLIER['no_telepon']."</td>";

			 if ($_SESSION['level'] == 'Manager')
			 {
						
			echo "<td>";
			echo "<a href='form-edit-data-supplier.php?kd_supplier=".$SUPPLIER['kd_supplier']."'>Edit</a> | ";
			echo "<a href='proses-hapus-data-supplier.php?kd_supplier=".$SUPPLIER['kd_supplier']."'onClick=\"return confirm('Anda yakin akan menghapus data ?')\">Hapus</a>";


			echo "</td>";
				}


			echo "</tr>";
		}
		?>

	</tbody>

	</table>

	<center><p>Total: <?php echo mysqli_num_rows($query) ?></p></center>
	



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



