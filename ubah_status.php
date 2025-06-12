<?php
include 'proses/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    mysqli_query($conn, "UPDATE tb_pesanan SET status='selesai' WHERE id=$id");
}

header("Location: index.php?page=menu");
exit;
