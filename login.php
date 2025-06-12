<?php
// session_start();
if (!empty($_SESSION['username_kopisop'])) {
    header('Location: home');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>☕ Kopian. | Login</title>
    <!-- <title> | Ngopi disini Ajaa </title> -->

    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

</head>
<body class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="form-container">
        <div class="card p-4 p-md-5">
            <div class="text-center mb-4">
                <div class="brand-title">☕ KopiSop</div>
                <small class="text-muted">Selamat datang! Silakan login dulu ya~</small>
            </div>
            <form class="needs-validation" novalidate action="proses/proses_login.php" method="POST">
                <div class="form-floating mb-3">
                    <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                    <div class="invalid-feedback">Masukkan email yang valid</div>
                </div>
                <div class="form-floating mb-3">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    <div class="invalid-feedback">Masukkan password yang benar</div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
                    <label class="form-check-label" for="checkDefault">Ingat saya</label>
                </div>
                <button class="btn btn-coffee w-100 py-2" type="submit" name="kirim" value="123">Masuk</button>
            </form>
            <footer class="mt-4 text-center">
                <small class="text-muted">&copy; <span id="year"></span> KopiSop Café</small>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
            document.getElementById('year').textContent = new Date().getFullYear();
        })();
    </script>
</body>
</html>
