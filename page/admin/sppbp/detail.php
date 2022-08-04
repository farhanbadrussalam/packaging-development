    <?php
        if(isset($_GET['kd_sppbp'])){
            $kd_sppbp    =$_GET['kd_sppbp'];
        }
        else {
            die ("Error. No ID Selected!");    
        }
       include("../../../system/koneksi.php");

        $query    =mysqli_query($db, "SELECT * FROM tb_sppbp WHERE kd_sppbp='$kd_sppbp'");
        $result    =mysqli_fetch_array($query);
    ?>
    <html>
    <head>
        <title>Script PHP untuk Menampilkan Data dari Database Derdasarkan Id</title>
    </head>
    <body>
        <h2>Detail Data SPPBP</h2>
        <p><i>Note: Dibawah ini adalah detail informasi SPPBP berdasarkan KODE SPPBP</i> <b><?php echo $kd_sppbp?></b></p>
        <table border="0" cellpadding="4">
            <tr>
                <td size="90">KODE SPPBP</td>
                <td>: <?php echo $result['kd_sppbp']?></td>
            </tr>
           
            <tr>
                <td>Tanggal</td>
                <td>: <?php echo $result['tanggal']?></td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>: <?php echo $result['nik']?></td>
            </tr>
            <tr>
                <td>Nama Karyawan</td>
                <td>: <?php echo $result['nama_karyawan']?></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>: <?php echo $result['jabatan']?></td>
            </tr>
            <tr>
                <td>Kode Produk</td>
                <td>: <?php echo $result['kd_produk']?></td>
            </tr>

            <tr>
                <td>Nama Produk</td>
                <td>: <?php echo $result['nama_produk']?></td>
            </tr>

            <tr>
                <td>Bahan Kemas</td>
                <td>: <?php echo $result['bahan_kemas']?></td>
            </tr>

            <tr>
                <td>Penyimpanan</td>
                <td>: <?php echo $result['penyimpanan']?></td>
            </tr>

            <tr>
                <td>Metode Pemeriksaan</td>
                <td>: <?php echo $result['metode_pemeriksaan']?></td>
            </tr>

            <tr>
                <td>Material</td>
                <td>: <?php echo $result['material']?></td>
            </tr>

            <tr>
                <td>Teks</td>
                <td>: <?php echo $result['teks']?></td>
            </tr>

            <tr>
                <td>Warna</td>
                <td>: <?php echo $result['warna']?></td>
            </tr>

            <tr>
                <td>Bobot</td>
                <td>: <?php echo $result['bobot']?></td>
            </tr>

            <tr>
                <td>Ukuran</td>
                <td>: <?php echo $result['ukuran']?></td>
            </tr>

            <tr>
                <td>Kerekatan Lem</td>
                <td>: <?php echo $result['kerekatan_lem']?></td>
            </tr>

            <tr>
                <td>Kondisi Lockbottom</td>
                <td>: <?php echo $result['kondisi_lockbottom']?></td>
            </tr>

            <tr>
                <td>Abrasi Test</td>
                <td>: <?php echo $result['abrasi_test']?></td>
            </tr>

            <tr>
                <td>Kondisi Pengemas</td>
                <td>: <?php echo $result['kondisi_pengemas']?></td>
            </tr>

            <tr>
                <td>Prosedur Pemeriksaan</td>
                <td>: <?php echo $result['prosedur_pemeriksaan']?></td>
            </tr>

            <tr>
                <td>Kode Supplier</td>
                <td>: <?php echo $result['kd_supplier']?></td>
            </tr>

            <tr>
                <td>Penyimpangan Kritis</td>
                <td>: <?php echo $result['penyimpangan_kritis']?></td>
            </tr>

            <tr>
                <td>Penyimpangan Major</td>
                <td>: <?php echo $result['penyimpangan_major']?></td>
            </tr>

            <tr>
                <td>Penyimpangan Minor</td>
                <td>: <?php echo $result['penyimpangan_minor']?></td>
            </tr>

            <tr>
                
                 <td><input type="button" value="Kembali" onclick="history.back(-1)" /></td> 
                 <tr>
            </tr>
        </table>
    </body>
    </html>
