<?php
include ("../../../system/koneksi.php");

if (isset($_POST['upload'])) {
  if (($_FILES['photo']['name'] != "")) {
    // Where the file is going to be stored
    $target_dir = "../../../galeri/";
    $file = $_FILES['photo']['name'];
    $path = pathinfo($file);
    $ext = $path['extension'];
    $filename = $path['filename'] . "." . $ext;
    $temp_name = $_FILES['photo']['tmp_name'];
    $path_filename_ext = $target_dir . $filename;

    // Check if file already exists
    if (file_exists($path_filename_ext)) {
      echo "Sorry, file already exists.";
    } else {
      move_uploaded_file($temp_name, $path_filename_ext);
      echo "Congratulations! File Uploaded Successfully.";
    }
  }


  $c_ = mysqli_query($db, "INSERT INTO `tb_galeri`(`gambar`) VALUES ('$filename')");
  //$check_user_data=mysqli_fetch_array($check_user_);
  if ($c = true) {
    echo '1';
  }

  if ($c) {
    //jika berhasil
    header('Location: form-input-foto1.php?status=sukses');
  } else {
    //jika gagal
    header('Location: form-input-foto1.php?status=gagal');
  }
} else {
  die("Akses dilarang...!");
}
