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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Astro v5.7.10">
    <title>KopiSop</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <script src="../assets/js/color-modes.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
        crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <main class="form-signin w-100 m-auto">
        <form class="needs-validation" novalidate action="proses/proses_login.php" method="POST">
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="Bootstrap Logo" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please Log in</h1>

            <div class="form-floating mb-3">
                <input name="username" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
                <div class="invalid-feedback">
                    Masukan Email Yang Valid
                </div>
            </div>

            <div class="form-floating mb-3">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                <div class="invalid-feedback">
                    Masukan Password Yang Benar
                </div>
            </div>

            <div class="form-check text-start mb-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault">
                <label class="form-check-label" for="checkDefault">Remember me</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit" name="kirim" value="123">Log in</button>

            <p class="mt-5 mb-3 text-center text-body-secondary">
                &copy; <span id="year"></span>
            </p>
        </form>
    </main>
    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Set current year automatically
        document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>

</html>