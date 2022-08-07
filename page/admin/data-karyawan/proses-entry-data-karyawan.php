<?php
include("../../../system/koneksi.php");

if (isset($_POST['simpan'])) {
    $nik = mysqli_real_escape_string($db, $_POST['nik']);
    $nama = mysqli_real_escape_string($db, $_POST['nama_karyawan']);
    $jbt = mysqli_real_escape_string($db, $_POST['jabatan']);
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];

    $save = mysqli_query($db, "INSERT INTO tb_karyawan (nik, nama_karyawan, jabatan, email, tgl_lahir, gender, alamat, no_telp) VALUES ('$nik','$nama','$jbt','$email','$tgl_lahir','$gender','$alamat','$no_tlp')");
    if ($save) { //jika simpan berhasil maka muncul pesan dan menuju ke halaman produk
        echo "<script>alert('Data Karyawan Berhasil disimpan ke database');document.location='data-karyawan.php'</script>";
    } else {  //jika simpan gagal maka muncul pesan
        echo $save;
        echo "<script>alert('Data yang Anda Masukan sudah ada atau data tidak lengkap.');document.location='data-karyawan.php'</script>";
    }
} else if (isset($_POST['update'])) {
    $nik = mysqli_real_escape_string($db, $_POST['nik']);
    $nama = mysqli_real_escape_string($db, $_POST['nama_karyawan']);
    $jbt = mysqli_real_escape_string($db, $_POST['jabatan']);
    $email = $_POST['email'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];
    $no_tlp = $_POST['no_tlp'];

    //buat query update

    $sql = "UPDATE tb_karyawan SET nama_karyawan='$nama', jabatan='$jbt', email='$email', tgl_lahir='$tgl_lahir', gender='$gender', alamat='$alamat', no_telp='$no_tlp' WHERE nik='$nik'";
    $query = mysqli_query($db, $sql);

    //apakah update berhasil?
    if ($query) {
        //jika berhasil alihkan ke halaman list-siswa.php
        echo "<script>alert('Data Karyawan Berhasil diupdate');document.location='data-karyawan.php'</script>";
    } else {
        // jika gagal tampilkan pesan
        echo "<script>alert('Data yang Anda Masukan sudah ada atau data tidak lengkap.');document.location='data-karyawan.php'</script>";
    }
} else if (isset($_GET['nik'])) {
    //ambil kode produk dari query string
    $kde = $_GET['nik'];

    //buat query hapus
    $sql = "DELETE FROM tb_karyawan WHERE nik='$kde'";
    $query = mysqli_query($db, $sql);

    //apakah query hapus berhasil?

    if ($query) {
        echo "<script>alert('Data Karyawan Berhasil dihapus');document.location='data-karyawan.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');document.location='data-karyawan.php'</script>";
    }
}
