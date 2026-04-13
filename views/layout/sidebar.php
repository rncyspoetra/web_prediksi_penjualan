<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-text mx-3">Prediksi Penjualan</div>
    </a>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/dashboard">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/penjualan">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Penjualan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/preprocessing">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Preprocessing</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/prediksi">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Prediksi</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>/logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>

</ul>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow bg-">
            <!-- Sidebar Toggle (Hamburger Menu) -->
            <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <ul class="navbar-nav ml-auto">

                <!-- User Info -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?= $user['username']; ?>
                        </span>

                        <img class="img-profile rounded-circle"
                            src="/web_prediksi_penjualan/public/assets/img/undraw_profile.svg">
                    </a>
                </li>

            </ul>

        </nav>

        <!-- Begin Page Content -->
        <div class="container-fluid">