<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="">
            <?php echo APP_NAME; ?>
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="">Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/vehicles.php">Kenderaan</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <?php if (isLoggedIn()) : ?>
                    <?php if (isAdmin()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/user/index.php">Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/booking/index.php">
                                Tempahan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/pages/admin/vehicle/index.php">
                                Kenderaan
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo user('name'); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/pages/user/profile.php">Profil</a></li>
                            <li><a class="dropdown-item" href="/pages/user/image.php">Gambar</a></li>
                            <li><a class="dropdown-item" href="/pages/user/password.php">Kata Laluan</a></li>
                            <li><a class="dropdown-item" href="/pages/user/bookings.php">Tempahan Anda</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/pages/logout.php">Log Keluar</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/login.php">Log Masuk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/register.php">Daftar</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>