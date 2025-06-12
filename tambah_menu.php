<?php include 'proses/connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu</title>
</head>
<body>
    <h2>Tambah Menu Makanan/Minuman</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Harga (Rp):</label><br>
        <input type="number" name="harga" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi" rows="4" required></textarea><br><br>

        <label>Gambar:</label><br>
        <input type="file" name="gambar" accept="image/*" required><br><br>

        <button type="submit" name="submit">Simpan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = mysqli_real_escape_string($conn, $_POST['nama']);
        $harga = $_POST['harga'];
        $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];

        $folder = "gambar/";
        $upload = move_uploaded_file($tmp, $folder . $gambar);

        if ($upload) {
            $insert = "INSERT INTO tb_menu_makanan (nama, harga, deskripsi, gambar) VALUES 
                      ('$nama', '$harga', '$deskripsi', '$gambar')";
            if (mysqli_query($conn, $insert)) {
                echo "<p>✅ Data berhasil disimpan.</p>";
                echo "<a href='index.php'>Kembali ke menu</a>";
            } else {
                echo "<p>❌ Gagal menyimpan ke database.</p>";
            }
        } else {
            echo "<p>❌ Upload gambar gagal.</p>";
        }
    }
    ?>
</body>
</html>
