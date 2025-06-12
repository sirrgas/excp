<?php include 'proses/connect.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>☕ Kopian. | Ngopi disini Ajaa </title>
</head>

<body>

    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Kopian navigation bar">

        <div class="container">
            <a class="navbar-brand" href="index.html">Kopian<span>.</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsKopian" aria-controls="navbarsKopian" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsKopian">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li><a class="nav-link" href="#">Shop</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="login.php"><img src="gambar/user.svg"></a></li>
                    <li>
                        <a class="nav-link" href="javascript:void(0);" onclick="tampilKeranjang()">
                            <img src="gambar/cart.svg" alt="Keranjang" style="width: 24px; height: 24px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- End Header/Navigation -->

    <!-- Start hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Sehari Segelas<span class="d-block">Makin Berkelas</span></h1>
                        <p class="mb-4">Dari biji terbaik sampai suasana terbaik. Temukan rasa yang pas buat kamu—temani skripsi, kerjaan, atau sekadar healing sore hari.</p>
                        <p>
                            <a href="#" class="btn btn-secondary me-2">Pesan Sekarang</a>
                            <a href="#" class="btn btn-white-outline">Lihat Menu</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="gambar/kopian1.png" class="img-fluid" style="width: 70%; margin-left: 35%;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End hero Section -->

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Menu Spesial Hari Ini</h2>
                    <p class="mb-4">Silakan pilih makanan dan minuman favorit Anda. Semua dibuat dengan bahan terbaik dan rasa yang menggoda selera.</p>
                </div>
                <!-- End Column 1 -->

                <?php
                $query = "SELECT * FROM tb_menu_makanan ORDER BY id DESC";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)):
                ?>
                    <!-- Start Dynamic Column -->
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <div class="product-item" style="cursor:pointer;" onclick="tambahKeKeranjang(<?= $row['id'] ?>)">
                            <img src="gambar/<?= htmlspecialchars($row['gambar']) ?>" class="img-fluid product-thumbnail">
                            <h3 class="product-title"><?= htmlspecialchars($row['nama']) ?></h3>
                            <strong class="product-price">Rp <?= number_format($row['harga'], 0, ',', '.') ?></strong>
                            <span class="icon-cross">
                                <img src="gambar/cart.svg" class="img-fluid">
                            </span>
                            </button>
                        </div>
                    </div>
                    <!-- End Dynamic Column -->
                <?php endwhile; ?>

            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">

            <div class="sofa-img">
                <img src="gambar/kopian.png" alt="Image" class="img-fluid">
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap">
                        <a href="#" class="footer-logo">Kopian<span>.</span></a>
                    </div>
                    <p class="mb-4">
                        Tempat nongkrong virtual kamu buat ngopi sambil nugas, kerja, atau sekadar ngelamun sore-sore. Rasa kopi yang serius, tapi vibes-nya tetap santai.
                    </p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-whatsapp"></span></a></li>
                    </ul>
                </div>
            </div>


            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash; Designed with love by <a href="https://google.com">Kopian.co</a> Distributed By <a href="https://google.com">Kopian</a>
                        </p>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- Alert Box -->
    <!-- Overlay Blur untuk alert -->
    <div id="alertOverlay" class="position-fixed top-0 start-0 w-100 h-100"
        style="display: none; background-color: rgba(0, 0, 0, 0.4); backdrop-filter: blur(4px); z-index: 9998;">
    </div>

    <!-- Kotak Alert -->
    <div id="alertBox" class="position-fixed top-50 start-50 translate-middle text-white text-center fw-bold shadow"
        style="display: none; background-color: rgba(25, 135, 84, 0.9); padding: 6rem 3rem; font-size: 1.5rem; z-index: 9999; max-width: 90%; box-shadow: 0 0 30px rgba(0,0,0,0.3); border-radius: 2rem;">
        Item berhasil ditambahkan ke keranjang!
    </div>


    <script>
        function tambahKeKeranjang(id) {
            fetch('proses/tambah_keranjang.php?id_menu=' + id)
                .then(response => response.text())
                .then(data => {
                    const alertBox = document.getElementById('alertBox');
                    const alertOverlay = document.getElementById('alertOverlay');

                    alertBox.style.display = 'block';
                    alertOverlay.style.display = 'block';

                    alertBox.style.opacity = '1';
                    alertOverlay.style.opacity = '1';

                    // Sembunyikan setelah 2.5 detik
                    setTimeout(() => {
                        alertBox.style.opacity = '0';
                        alertOverlay.style.opacity = '0';
                        setTimeout(() => {
                            alertBox.style.display = 'none';
                            alertOverlay.style.display = 'none';
                        }, 500);
                    }, 1000);
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                });
        }
    </script>
    <!-- End Alert Box -->

    <!-- Modal Keranjang -->
    <div class="modal fade" id="modalKeranjang" tabindex="-1" aria-labelledby="modalKeranjangLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKeranjangLabel">Keranjang Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="isiKeranjang">
                    <!-- Konten keranjang akan dimuat di sini via JavaScript -->
                </div>
                <div class="modal-footer">
                    <!-- <a href="checkout.php" class="btn btn-success">Checkoute</a> -->
                    <button class="btn btn-success" onclick="tampilModalCheckout()">Checkoutbung</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Fungsi sembunyikan overlay dan alert
            function sembunyikanOverlayAlert() {
                const alertBox = document.getElementById('alertBox');
                const alertOverlay = document.getElementById('alertOverlay');
                if (alertBox) {
                    alertBox.style.opacity = '0';
                    alertBox.style.display = 'none';
                }
                if (alertOverlay) {
                    alertOverlay.style.opacity = '0';
                    alertOverlay.style.display = 'none';
                }
            }

            // Simpan instance modal global
            let modalInstance = null;

            // Fungsi tampil keranjang
            window.tampilKeranjang = function() {
                fetch('keranjang_ajax.php')
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('isiKeranjang').innerHTML = html;

                        const modalEl = document.getElementById('modalKeranjang');

                        if (modalInstance) {
                            modalInstance.hide();
                            modalInstance.dispose();
                            modalInstance = null;
                        }

                        modalInstance = new bootstrap.Modal(modalEl);
                        modalInstance.show();
                    });
            }

            // Fungsi hapus item
            window.hapusItem = function(id_menu) {
                if (confirm('Yakin ingin menghapus item ini dari keranjang?')) {
                    fetch('proses/tambah_keranjang.php?id_menu=' + id_menu + '&aksi=hapus')
                        .then(response => response.text())
                        .then(() => {
                            tampilKeranjang();
                        });
                }
            }

            // Event saat modal ditutup
            const modalKeranjang = document.getElementById('modalKeranjang');
            if (modalKeranjang) {
                modalKeranjang.addEventListener('hidden.bs.modal', () => {
                    sembunyikanOverlayAlert();
                    if (modalInstance) {
                        modalInstance.dispose();
                        modalInstance = null;
                    }
                });
            }
        });
    </script>


<!-- Modal Checkout -->
<div class="modal fade" id="modalCheckout" tabindex="-1" aria-labelledby="modalCheckoutLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formCheckout">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCheckoutLabel">Form Checkout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="namaPemesan" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="namaPemesan" name="nama_pemesan" required>
          </div>
          <div class="mb-3">
            <label for="nomorMeja" class="form-label">Nomor Meja</label>
            <input type="number" class="form-control" id="nomorMeja" name="nomor_meja" required min="1">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
function tampilModalCheckout() {
    const modalCheckout = new bootstrap.Modal(document.getElementById('modalCheckout'));
    modalCheckout.show();
}

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('formCheckout').addEventListener('submit', function (e) {
        e.preventDefault();
        
        const nama = document.getElementById('namaPemesan').value;
        const meja = document.getElementById('nomorMeja').value;

        // Kirim data ke backend via AJAX (opsional)
        fetch('proses/kirim_pesanan.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: new URLSearchParams({nama_pemesan: nama, nomor_meja: meja})
        })
        .then(response => response.text())
        .then(result => {
            // alert("Checkout berhasil BUNGGG!");
            bootstrap.Modal.getInstance(document.getElementById('modalCheckout')).hide();
            setTimeout(() => location.reload(), 300);
            // Kosongkan keranjang atau redirect kalau perlu
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Terjadi kesalahan saat checkout.");
        });
    });
});
</script>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>