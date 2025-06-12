<?php 
include 'proses/connect.php'; 
if (empty($_SESSION['username_kopisop'])) {
    header("Location: login");
    exit;
  }
?>
<style>
        .menu-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .menu-item {
            width: 200px;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .menu-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
    </style>
<div class="col-lg-9 mt-2">
    <h1>Daftar Menu</h1>
    <a href="tambah_menu.php">➕ Tambah Menu Baru</a>
    <div class="menu-container">
        <?php
        $query = "SELECT * FROM tb_menu_makanan ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='menu-item'>";
            echo "<img src='gambar/" . htmlspecialchars($row['gambar']) . "'>";
            echo "<h3>" . htmlspecialchars($row['nama']) . "</h3>";
            echo "<p>Rp " . number_format($row['harga'], 0, ',', '.') . "</p>";
            echo "<p>" . htmlspecialchars($row['deskripsi']) . "</p>";
            echo "<a class='btn' href='edit_menu.php?id={$row['id']}'>✏️ Edit</a>";
            echo "<a class='btn' href='hapus_menu.php?id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>🗑️ Hapus</a>";
            echo "</div>";
        }
        ?>
    </div>
</div>