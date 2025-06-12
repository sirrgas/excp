<?php
require_once 'connect.php';
session_start();

$session_id = $_SESSION['session_id'];

$nama = $_POST['nama_pemesan'];
$meja = $_POST['nomor_meja'];

// Simpan data pesanan
mysqli_query($conn, "INSERT INTO tb_pesanan (session_id, nama_pemesan, nomor_meja, status) VALUES ('$session_id', '$nama', '$meja', 'proses')");

$id_pesanan = mysqli_insert_id($conn);

// Simpan detail pesanan
$keranjang = mysqli_query($conn, "SELECT * FROM tb_keranjang WHERE session_id='$session_id'");
while ($item = mysqli_fetch_assoc($keranjang)) {
    $harga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT harga FROM tb_menu_makanan WHERE id=" . $item['id_menu']))['harga'];
    mysqli_query($conn, "INSERT INTO detail_pesanan (id_pesanan, id_menu, qty, harga) VALUES ($id_pesanan, {$item['id_menu']}, {$item['qty']}, $harga)");
}

// Hapus keranjang
mysqli_query($conn, "DELETE FROM tb_keranjang WHERE session_id='$session_id'");

// Tampilkan alert dan redirect
echo "
<script>
  alert('Pesanan berhasil dikirimeee!');
  window.location.href = '../index.php';
</script>
";
exit;
