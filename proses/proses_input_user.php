<?php 
require_once 'connect.php';

$nama     = isset($_POST['nama']) ? htmlentities($_POST['nama']) : "";
$username = isset($_POST['username']) ? htmlentities($_POST['username']) : "";
$level    = isset($_POST['level']) ? htmlentities($_POST['level']) : "";
$no_hp    = isset($_POST['no_hp']) ? htmlentities($_POST['no_hp']) : "";
$password = md5('password');
$alamat   = isset($_POST['alamat']) ? htmlentities($_POST['alamat']) : "";

$massage = ""; // Inisialisasi supaya tidak error

if (!empty($_POST['submit_user'])) {
    $query = mysqli_query($conn, "INSERT INTO tb_user(nama,username,level,no_hp,password,alamat) 
    VALUES ('$nama','$username','$level','$no_hp','$password','$alamat')");

    if (!$query) {
        $massage = '<script>alert("Data gagal dimasukkan");</script>';
    } else {
        $massage = '<script>
            alert("Data berhasil dimasukkan");
            window.location.href = "../user";
        </script>';
    }
}
echo $massage;
?>