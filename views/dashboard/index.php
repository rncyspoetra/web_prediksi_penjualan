<?php 
require dirname(__DIR__) . '/layout/header.php';
require dirname(__DIR__) . '/layout/sidebar.php';
?>

<div id="content-wrapper" class="d-flex flex-column">
<div id="content">

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Dashboard
    </h1>

    <h5>Selamat datang, <?= $user['nama_admin']; ?></h5>

    <div class="row mt-4">

        <!-- Card Data Penjualan -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <h6 class="text-primary">Data Penjualan</h6>
                    <h4><?= $penjualan ?></h4>
                </div>
            </div>
        </div>

        <!-- Card Status -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <h6 class="text-warning">Status Terbanyak</h6>
                    <h4><?= $status ?></h4>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
</div>

<?php 
require dirname(__DIR__) . '/layout/footer.php';
?>