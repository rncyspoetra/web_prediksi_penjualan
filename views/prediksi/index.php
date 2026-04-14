<?php require dirname(__DIR__) . '/layout/header.php'; ?>
<?php require dirname(__DIR__) . '/layout/sidebar.php'; ?>

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">
        Hasil Prediksi Naive Bayes
    </h1>

    <a href="<?= BASE_URL ?>/prediksi/process"
        class="btn btn-success mb-4">
        <i class="fas fa-play"></i> Proses Prediksi
    </a>

    <?php if ($hasResult): ?>

        <div class="row mb-3">

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5>Naive Bayes</h5>
                        <h3><?= round($result['nb_normal']['accuracy'], 2) ?>%</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5>NB + SMOTE</h5>
                        <h3><?= round($result['nb_smote']['accuracy'], 2) ?>%</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h5>NB + ROS</h5>
                        <h3><?= round($result['nb_ros']['accuracy'], 2) ?>%</h3>
                    </div>
                </div>
            </div>

        </div>

        <!-- ================= TAB ================= -->
        <ul class="nav nav-tabs" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#nb">
                    Naive Bayes
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#smote">
                    NB + SMOTE
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#ros">
                    NB + ROS
                </a>
            </li>

        </ul>

        <div class="tab-content mt-3">

            <!-- ========================= -->
            <!-- NAIVE BAYES -->
            <!-- ========================= -->
            <div class="tab-pane fade show active" id="nb">

                <!-- TABEL HASIL PREDIKSI -->
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h5>Hasil Prediksi (Test Data)</h5>

                        <table class="table table-bordered text-center" id="tableTest">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Frozen</th>
                                    <th>Pentol</th>
                                    <th>Shift</th>
                                    <th>Actual</th>
                                    <th>Prob Tidak Laris</th>
                                    <th>Prob Laris</th>
                                    <th>Prob Sangat Laris</th>
                                    <th>Prediksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($result['nb_normal']['results'] as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>

                                        <td><?= $row['data']['bulan_penjualan'] ?></td>
                                        <td><?= $row['data']['frozen'] ?></td>
                                        <td><?= $row['data']['pentol'] ?></td>
                                        <td><?= $row['data']['shif'] ?></td>

                                        <td><?= $row['actual'] ?></td>

                                        <td><?= round($row['probabilities']['tidak laris'] ?? 0, 4) ?></td>
                                        <td><?= round($row['probabilities']['laris'] ?? 0, 4) ?></td>
                                        <td><?= round($row['probabilities']['sangat laris'] ?? 0, 4) ?></td>

                                        <td><b><?= $row['predicted'] ?></b></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

            <!-- ========================= -->
            <!-- SMOTE -->
            <!-- ========================= -->
            <div class="tab-pane fade" id="smote">
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h5>Hasil Prediksi SMOTE</h5>

                        <table class="table table-bordered text-center" id="tableSmote">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Frozen</th>
                                    <th>Pentol</th>
                                    <th>Shift</th>
                                    <th>Actual</th>
                                    <th>Prob Tidak Laris</th>
                                    <th>Prob Laris</th>
                                    <th>Prob Sangat Laris</th>
                                    <th>Prediksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($result['nb_smote']['results'] as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>

                                        <td><?= $row['data']['bulan_penjualan'] ?></td>
                                        <td><?= $row['data']['frozen'] ?></td>
                                        <td><?= $row['data']['pentol'] ?></td>
                                        <td><?= $row['data']['shif'] ?></td>

                                        <td><?= $row['actual'] ?></td>

                                        <td><?= round($row['probabilities']['tidak laris'] ?? 0, 4) ?></td>
                                        <td><?= round($row['probabilities']['laris'] ?? 0, 4) ?></td>
                                        <td><?= round($row['probabilities']['sangat laris'] ?? 0, 4) ?></td>

                                        <td><b><?= $row['predicted'] ?></b></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- ========================= -->
            <!-- ROS -->
            <!-- ========================= -->
            <div class="tab-pane fade" id="ros">

                <div class="card shadow mb-3">
                    <div class="card-body">
                        <h5>Hasil Prediksi Random Over Sampling</h5>

                        <table class="table table-bordered text-center" id="tableRos">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Frozen</th>
                                    <th>Pentol</th>
                                    <th>Shift</th>
                                    <th>Actual</th>
                                    <th>Prob Tidak Laris</th>
                                    <th>Prob Laris</th>
                                    <th>Prob Sangat Laris</th>
                                    <th>Prediksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($result['nb_ros']['results'] as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>

                                        <td><?= $row['data']['bulan_penjualan'] ?></td>
                                        <td><?= $row['data']['frozen'] ?></td>
                                        <td><?= $row['data']['pentol'] ?></td>
                                        <td><?= $row['data']['shif'] ?></td>

                                        <td><?= $row['actual'] ?></td>

                                        <td><?= round($row['probabilities']['tidak laris'] ?? 0, 4) ?></td>
                                        <td><?= round($row['probabilities']['laris'] ?? 0, 4) ?></td>
                                        <td><?= round($row['probabilities']['sangat laris'] ?? 0, 4) ?></td>

                                        <td><b><?= $row['predicted'] ?></b></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    <?php else: ?>

        <div class="alert alert-info text-center">
            Belum ada hasil prediksi. Silakan klik tombol <b>Proses Prediksi</b>.
        </div>

    <?php endif; ?>

</div>

<?php require dirname(__DIR__) . '/layout/footer.php'; ?>