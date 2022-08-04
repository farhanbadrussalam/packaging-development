<?php
include ("../../../system/koneksi.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>SILAKAN DIUNDUH UNTUK MENYIMPAN FILE</title>
    <style type="text/css">
        body {
            font-family: verdana;
            font-size: 12px;
        }

        a {
            text-decoration: none;
            color: #3050F3;
        }

        a:hover {
            color: #000F5E;
        }

        object{
        	width: 1600px;
        	height: 900px;
        }
    </style>
</head>

<body>
<?php
$kd = $_GET['id'];
$query = mysqli_query($db, "SELECT * FROM tb_galeri WHERE id='$kd'"); 

 
$data= mysqli_fetch_array($query);
echo "<tr>";    
echo "<td><img src='../../../galeri/".$data['gambar']."' width='900' height='900'></td>";    




?>
</body>

</html>