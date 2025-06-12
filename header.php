<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container-lg">
        <a class="navbar-brand fw-bold d-flex align-items-center" href=".">
            <i class="bi bi-cup-hot me-2"></i> Kopian <span> .</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i>
                        <?php echo htmlspecialchars($hasil['username']); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2 shadow-sm">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-fill me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear-fill me-2"></i>Setting</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="logout"><i class="bi bi-box-arrow-right me-2"></i>Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
