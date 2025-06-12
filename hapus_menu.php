<?php include 'proses/connect.php';

if (!isset($_GET['id'])) {
    header("Location: index.php?page=menu");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT gambar FROM tb_menu_makanan WHERE id = $id");
$row = mysqli_fetch_assoc($data);

// Hapus file gambar juga
if ($row && file_exists("gambar/" . $row['gambar'])) {
    unlink("gambar/" . $row['gambar']);
}

mysqli_query($conn, "DELETE FROM tb_menu_makanan WHERE id = $id");
header("Location: index.php");
exit;
