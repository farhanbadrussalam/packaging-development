<?php
include("../../../system/koneksi.php");
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

        object {
            width: 1600px;
            height: 900px;
        }
    </style>
</head>

<body>
    <?php
    $id    = mysqli_real_escape_string($db, $_GET['kd_produk']);
    $query = mysqli_query($db, "SELECT * FROM tb_produk WHERE kd_produk='$id' ");
    $data  = mysqli_fetch_array($query);
    $file = $data['artwork'];
    ?>
    <center>
        <h1>SILAKAN DIUNDUH UNTUK MENYIMPAN FILE</h1>
    </center>
    <hr>
    <b>Artwork:</b> <?php echo $data['artwork']; ?> | <a href='#' onclick="history.back()"> Kembali </a>
    <hr>
    <div>
        <center>
            <object data="pdf/<?php echo $data['artwork']; ?>" type="application/pdf">
                <embed src="../../../pdf/<?php echo $data['artwork']; ?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="1080px" height="550px" />
            </object>
        </center>
    </div>

</body>

</html>