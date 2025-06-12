<?php
include 'proses/connect.php';
session_start();

if (!isset($_SESSION['session_id'])) {
    // echo "<div class='alert alert-warning'>Session belum aktif. Silakan refresh halaman.</div>";
    echo "<div class='alert alert-warning'>Tidak ada pesanane. pilih menu terlebih dahulu</div>";
    exit;
}

$session_id = $_SESSION['session_id'];
$query = "SELECT k.*, m.nama, m.harga, m.gambar 
          FROM tb_keranjang k 
          JOIN tb_menu_makanan m ON k.id_menu = m.id 
          WHERE k.session_id = '$session_id'";
$result = mysqli_query($conn, $query);

$total = 0;
?>

<table class="table table-bordered table-hover align-middle">
  <thead class="table-light text-center">
    <tr>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Qty</th>
      <th>Total</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): 
      $subtotal = $row['harga'] * $row['qty'];
      $total += $subtotal;
    ?>
    <tr>
      <td class="text-center">
        <img src="gambar/<?= htmlspecialchars($row['gambar']) ?>" width="60">
      </td>
      <td><?= htmlspecialchars($row['nama']) ?></td>
      <td class="text-end">Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
      <td class="text-center"><?= $row['qty'] ?></td>
      <td class="text-end">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
      <td class="text-center">
        <button class="btn btn-sm btn-danger" onclick="hapusItem(<?= $row['id_menu'] ?>)">Hapus</button>
      </td>
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>

<div class="text-end">
  <strong>Total Belanja:</strong> Rp <?= number_format($total, 0, ',', '.') ?>
</div>
