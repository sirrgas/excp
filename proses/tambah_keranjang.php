<?php
require_once 'connect.php';
session_start();

if (!isset($_SESSION['session_id'])) {
    $_SESSION['session_id'] = uniqid();
}
$session_id = $_SESSION['session_id'];

if (!isset($_GET['id_menu']) || !is_numeric($_GET['id_menu'])) {
    die("ID menu tidak valid.");
}

$id_menu = intval($_GET['id_menu']);
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'tambah';

if ($aksi === 'hapus') {
    $hapus = mysqli_query($conn, "DELETE FROM tb_keranjang WHERE session_id='$session_id' AND id_menu=$id_menu");
    echo $hapus ? "Item dihapus" : "Gagal hapus";
} else {
    $cek = mysqli_query($conn, "SELECT * FROM tb_keranjang WHERE session_id='$session_id' AND id_menu=$id_menu");
    if (mysqli_num_rows($cek) > 0) {
        mysqli_query($conn, "UPDATE tb_keranjang SET qty = qty + 1 WHERE session_id='$session_id' AND id_menu=$id_menu");
    } else {
        mysqli_query($conn, "INSERT INTO tb_keranjang (session_id, id_menu, qty) VALUES ('$session_id', $id_menu, 1)");
    }
    echo "Item ditambahkan";
}
exit;
