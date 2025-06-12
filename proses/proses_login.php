<?php 
session_start();
include "connect.php";

$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? md5(htmlentities($_POST['password']))  : "";

if (!empty($_POST['kirim'])) {
     $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' && password = '$password' ");
     $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if ($hasil) {
            $_SESSION['username_kopisop'] = $username;
            $_SESSION['level_kopisop'] = $hasil['level'];
            // header("Location: ../home");
            // header("Location: ../dashboard.php");
            header("Location: ../home"); // arahkan ke home/dashboard jika sudah login
            exit;
        }
        
    } else { ?>
        <script>
            alert("Username atau password salah!");
            window.location='../login'
        </script>
 <?php       
    }
}
?>
