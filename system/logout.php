<?php 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman login
header("location:../index.php?pesan=anda berhasil logout.");
?>