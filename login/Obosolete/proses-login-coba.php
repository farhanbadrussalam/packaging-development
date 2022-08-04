    <?php 
        session_start();
        include 'koneksi.php';
     
        // menangkap data yang dikirim dari form login
        $userid = $_POST['user_id'];
        $password = $_POST['pwd'];
     
        // menyeleksi data pada tabel admin dengan username dan password yang sesuai
        $data = mysqli_query($db, "SELECT * FROM tb_user WHERE user_id='$userid' and pwd='$password'");
     
        // menghitung jumlah data yang ditemukan
        $cek = mysqli_num_rows($data);
     
        if($cek > 0){
            $_SESSION['user_id'] = $userid;
            $_SESSION['status'] = "login";
            header("location:menu-utama.php");
        }
        else{
            header("location:login-form.php?pesan=User Id atau Password yang Anda Masukkan Salah!");
        }
    ?>
