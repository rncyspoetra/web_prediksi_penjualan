<?php

require dirname(__DIR__) . '/layout/header.php';
require dirname(__DIR__) . '/layout/sidebar.php';

?>

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Penjualan</h1>

    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambah">
        <i class="fas fa-plus"></i> Tambah Data
    </button>

    <div class="card shadow">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered text-center" id="tableSales">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Shift</th>
                            <th>Pentol</th>
                            <th>Frozen</th>
                            <th>Status</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($data as $d): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['bulan_penjualan'] ?></td>
                                <td><?= $d['shif'] ?></td>
                                <td><?= $d['pentol'] ?></td>
                                <td><?= $d['frozen'] ?></td>
                                <td>
                                    <?php
                                    $status = $d['status_penjualan'];

                                    if ($status == "Tidak Laris") {
                                        $badge = "badge-danger"; 
                                    } elseif ($status == "Laris") {
                                        $badge = "badge-warning"; 
                                    } elseif ($status == "Sangat Laris") {
                                        $badge = "badge-success";  
                                    } else {
                                        $badge = "badge-secondary";
                                    }
                                    ?>

                                    <span class="badge <?= $badge ?>">
                                        <?= $status ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm"
                                        data-toggle="modal"
                                        data-target="#edit<?= $d['id_penjualan'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <a href="#"
                                        class="btn btn-danger btn-sm btn-hapus"
                                        data-id="<?= $d['id_penjualan'] ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <?php include 'modal_edit.php'; ?>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<?php include 'modal_create.php'; ?>

<?php require dirname(__DIR__) . '/layout/footer.php'; ?>s