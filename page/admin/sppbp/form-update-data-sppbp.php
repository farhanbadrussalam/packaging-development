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
echo ", Selamat Pagi !!";}
else if (($a>15) && ($a<=18)){
echo ", Selamat Siang !!";}
else { echo ", <b> Selamat Malam </b>";}
?> </p>
<?php

include ("../../../system/koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['kd_sppbp']) ){
    header('Location: list-data-sppbp.php');
}

//ambil id dari query string
$kdsppbp = $_GET['kd_sppbp'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tb_sppbp WHERE kd_sppbp='$kdsppbp'";
$query = mysqli_query($db, $sql);
$sppbp = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
 <html>
 <head>
 	 <style>
a, button,input[type=submit],input[type=reset],input[type=button] {
    font-family: sans-serif;
    font-size: 15px;
    background: #22a4cf;
    color: white;
    border: white 3px solid;
    border-radius: 5px;
    padding: 12px 20px;
    margin-top: 10px;
}
a {
    text-decoration: none;
}
a:hover, button:hover, input[type=submit]:hover, input[type=reset]:hover{
    opacity:0.9;
}
</style>
 	<title>Formulir Update Data SPPBP  |  PACKDEV</title>
 </head>

 <body>
 	<header>
 		<h3>Formulir Update Data Data</h3>
 	</header>

 	<form action="proses-edit-sppbp.php" method="POST">

 		<fieldset>

 			<table>
 			
 			<input type="hidden" name="kode-sppbp" value="<?php echo $sppbp['kd_sppbp'] ?>" />

 			<tr>
       			 	<td>Tanggal Input SPPBP</td>
       				<td>:</td>
       				<td><input type="text" name="tgl" value="<?php echo date('y/m/d');?>" /></td>
   			 	</tr>


   			 	<tr>
       			 	<td>NIK</td>
       				<td>:</td>
       				<td><input type="text" name="nik" onkeyup="isi_otomatis()" id="nik" value="<?php echo $sppbp ['nik'] ?>"/>
       				</td>

   			 	</tr>

   			 	<tr>
       			 	<td>Nama</td>
       				<td>:</td>
       				<td><input type="text" name="nama_karyawan" id="nama_karyawan" value="<?php echo $sppbp ['nama_karyawan'] ?>" size="50" maxlength="50"/>
       				</td>
   			 	</tr>

   			 	<tr>
       			 	<td>Jabatan</td>
       				<td>:</td>
       				<td><input type="text" name="jabatan" id="jabatan" value="<?php echo $sppbp ['jabatan'] ?>" size="50" maxlength="50"/>
       				</td>
   			 	</tr>

   			 	<tr>
       			 	<td>Kode Produk</td>
       				<td>:</td>
       				 <td><input type="text" name="kd_produk" onkeyup="isi()" id="kd_produk" value="<?php echo $sppbp ['kd_produk'] ?>">
              </td>
   			 	</tr>

            <tr>
              <td>Nama Produk</td>
              <td>:</td>
              <td><input type="text" name="nama_produk" id="nama_produk" value="<?php echo $sppbp ['nama_produk'] ?>" size="50" maxlength="50"/>
              </td>
          </tr>

   			 	<tr>
       			 	<td>Bahan Kemas</td>
       				<td>:</td>
       				<td><input type="text" name="bahan_kemas" id="bahan_kemas" value="<?php echo $sppbp ['bahan_kemas'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Suhu Simpan</td>
       				<td>:</td>
       				<td><input type="text" name="suhu" value="<?php echo $sppbp ['penyimpanan'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Metode Pemeriksaan</td>
       				<td>:</td>
       				<td><input type="text" name="metode" value="<?php echo $sppbp ['metode_pemeriksaan'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Material</td>
       				<td>:</td>
       				<td><input type="text" name="bahan" value="<?php echo $sppbp ['material'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Teks</td>
       				<td>:</td>
       				<td><input type="text" name="tek" value="<?php echo $sppbp ['teks'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Warna</td>
       				<td>:</td>
       				<td><input type="text" name="wrn" value="<?php echo $sppbp ['warna'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Bobot</td>
       				<td>:</td>
       				<td><input type="text" name="bbt" value="<?php echo $sppbp ['bobot'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Ukuran</td>
       				<td>:</td>
       				<td><input type="text" name="ukur" value="<?php echo $sppbp ['ukuran'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Kerekatan Lem</td>
       				<td>:</td>
       				<td><input type="text" name="lem" value="<?php echo $sppbp ['kerekatan_lem'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Kondisi Lockbottom</td>
       				<td>:</td>
       				<td><input type="text" name="lockbottom" value="<?php echo $sppbp ['kondisi_lockbottom'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Abrasi Test</td>
       				<td>:</td>
       				<td><input 

       					type="text" 
       					name="abrasi" 
       					value="<?php echo $sppbp ['abrasi_test'] ?>" 
       					size="50" maxlength="50"/>

       				</td>
   			 	</tr>

   			 	<tr>
       			 	<td>Kondisi Pengemas</td>
       				<td>:</td>
       				<td><textarea 

       					style="resize:vertical" 
       					textarea cols="49" 
       					rows="20" 
       					name="kondisi-pengemas"        					
       					><?php echo $sppbp ['kondisi_pengemas']?>
       						
       					</textarea></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Prosedur Pemeriksaan</td>
       				<td>:</td>
       				<td><input type="text" name="prosedur" value="<?php echo $sppbp ['prosedur_pemeriksaan'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Kode Supplier</td>
       				<td>:</td>
       				<td><input type="text" name="kd_supplier" id="kd_supplier" value="<?php echo $sppbp ['kd_supplier'] ?>"size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Penyimpangan Kritis</td>
       				<td>:</td>
       				<td><input type="text" name="kritis" value="<?php echo $sppbp ['penyimpangan_kritis'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Penyimpangan Major</td>
       				<td>:</td>
       				<td><input type="text" name="major" value="<?php echo $sppbp ['penyimpangan_major'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	<tr>
       			 	<td>Penyimpangan Minor</td>
       				<td>:</td>
       				<td><input type="text" name="minor" value="<?php echo $sppbp ['penyimpangan_minor'] ?>" size="50" maxlength="50"/></td>
   			 	</tr>

   			 	</tbody>
		</table>	
   </fieldset>	
 <tr>
        <input type="submit" value ="Simpan" name="simpan">
      </tr>
      
       
         <td><input type="button" value="Kembali" onclick="history.back(-1)" /></td> 
         <tr>
	</form>

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script type="text/javascript">
            function isi_otomatis(){
                var nik = $("#nik").val();
                $.ajax({
                    url: 'ajak.php',
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
                    url: 'ajax-produk.php',
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


</body>
</html>