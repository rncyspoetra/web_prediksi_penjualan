<?php require dirname(__DIR__) . '/layout/header.php'; ?>
<?php require dirname(__DIR__) . '/layout/sidebar.php'; ?>

<script>
    const trainData = <?= json_encode(array_values($_SESSION['train_data'] ?? [])) ?>;
    const testData = <?= json_encode(array_values($_SESSION['test_data'] ?? [])) ?>;
    /* const smoteData = <?= json_encode(array_values($_SESSION['smote_data'] ?? [])) ?>; */
    /* const rosData = <?= json_encode(array_values($_SESSION['ros_data'] ?? [])) ?>; */
</script>

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Data Preprocessing</h1>

    <!-- BUTTON PROSES -->
    <a href="<?= BASE_URL ?>/preprocessing/process" class="btn btn-primary mb-3">
        <i class="fas fa-cogs"></i> Proses Splitting + SMOTE + ROS
    </a>

    <?php
    $trainData = $_SESSION['train_data'] ?? [];
    $testData  = $_SESSION['test_data'] ?? [];
/*     $smoteData = $_SESSION['smote_data'] ?? [];
    $rosData   = $_SESSION['ros_data'] ?? []; */
    ?>

    <?php if (!empty($trainData) || !empty($testData) /* || !empty($smoteData) || !empty($rosData) */) : ?>

        <!-- NAV TAB -->
        <ul class="nav nav-tabs" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#test">
                    Testing
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#train">
                    Training
                </a>
            </li>

<!--             <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#smote">
                    SMOTE
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#ros">
                    ROS
                </a>
            </li> -->

        </ul>

        <!-- TAB CONTENT -->
        <div class="tab-content mt-3">

            <!-- ================= TEST ================= -->
            <div class="tab-pane fade show active" id="test">
                <div class="card shadow mb-4">
                    <div class="card-header bg-success text-white font-weight-bold">
                        Data Testing
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered text-center" id="tableTest">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Shift</th>
                                    <th>Pentol</th>
                                    <th>Frozen</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($testData as $row): ?>
                                    <tr>
                                        <td><?= $row['bulan_penjualan'] ?></td>
                                        <td><?= $row['shif'] ?></td>
                                        <td><?= $row['pentol'] ?></td>
                                        <td><?= $row['frozen'] ?></td>
                                        <td><?= $row['status_penjualan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ================= TRAIN ================= -->
            <div class="tab-pane fade" id="train">
                <div class="card shadow mb-4">
                    <div class="card-header bg-primary text-white font-weight-bold">
                        Data Training
                    </div>
                    <div class="card-body table-responsive">
                        <div style="height: 250px;">
                            <canvas id="chartTrain"></canvas>
                        </div>
                        <table class="table table-bordered text-center" id="tableTrain">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Shift</th>
                                    <th>Pentol</th>
                                    <th>Frozen</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($trainData as $row): ?>
                                    <tr>
                                        <td><?= $row['bulan_penjualan'] ?></td>
                                        <td><?= $row['shif'] ?></td>
                                        <td><?= $row['pentol'] ?></td>
                                        <td><?= $row['frozen'] ?></td>
                                        <td><?= $row['status_penjualan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ================= SMOTE ================= -->
            <!-- <div class="tab-pane fade" id="smote">
                <div class="card shadow mb-4">
                    <div class="card-header bg-warning text-dark font-weight-bold">
                        Data Training + SMOTE
                    </div>
                    <div class="card-body table-responsive">
                        <div style="height: 250px;">
                            <canvas id="chartSmote"></canvas>
                        </div>
                        <table class="table table-bordered text-center" id="tableSmote">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Shift</th>
                                    <th>Pentol</th>
                                    <th>Frozen</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($smoteData as $row): ?>
                                    <tr>
                                        <td><?= $row['bulan_penjualan'] ?></td>
                                        <td><?= $row['shif'] ?></td>
                                        <td><?= $row['pentol'] ?></td>
                                        <td><?= $row['frozen'] ?></td>
                                        <td><?= $row['status_penjualan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->

            <!-- ================= ROS ================= -->
            <!-- <div class="tab-pane fade" id="ros">
                <div class="card shadow mb-4">
                    <div class="card-header bg-danger text-white font-weight-bold">
                        Data Training + ROS
                    </div>
                    <div class="card-body table-responsive">
                        <div style="height: 250px;">
                            <canvas id="chartRos"></canvas>
                        </div>
                        <table class="table table-bordered text-center" id="tableRos">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Shift</th>
                                    <th>Pentol</th>
                                    <th>Frozen</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rosData as $row): ?>
                                    <tr>
                                        <td><?= $row['bulan_penjualan'] ?></td>
                                        <td><?= $row['shif'] ?></td>
                                        <td><?= $row['pentol'] ?></td>
                                        <td><?= $row['frozen'] ?></td>
                                        <td><?= $row['status_penjualan'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> -->

        </div>

    <?php endif; ?>

</div>


<?php require dirname(__DIR__) . '/layout/footer.php'; ?>