<?php include 'proses/connect.php';

if (!isset($_GET['id'])) {
    header("Location: index.php?page=menu");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM tb_menu_makanan WHERE id = $id");
$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Data tidak ditemukan";
    exit;
}

if (isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harga = $_POST['harga'];
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp, "gambar/" . $gambar);
    } else {
        $gambar = $row['gambar'];
    }

    $query = "UPDATE tb_menu_makanan SET nama='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$gambar' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php?page=menu");
        exit;
    } else {
        echo "Gagal update data";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Menu</title>
</head>
<body>
    <h2>Edit Menu</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="<?= $row['harga'] ?>" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" required><?= htmlspecialchars($row['deskripsi']) ?></textarea><br><br>

        <label>Gambar (Kosongkan jika tidak diganti):</label><br>
        <input type="file" name="gambar"><br><br>

        <button type="submit" name="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
