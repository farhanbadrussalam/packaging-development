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
    
    <center>
        <h1>SILAKAN DIUNDUH UNTUK MENYIMPAN FILE</h1>
    </center>
    <hr>
    <b>Packshot:</b> <?php echo $_GET['kd_produk'].'.jpg'; ?> | <a href='#' onclick="history.back()"> Kembali </a>
    <hr>
    <div>
        <center>
        <img src="../../../jpg/<?php echo $_GET['kd_produk'].'.jpg'; ?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="550px" height="auto">

    </div>

</body>

</html>