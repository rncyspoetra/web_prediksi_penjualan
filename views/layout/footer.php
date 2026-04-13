</div>

<!-- jQuery -->
<script src="<?= BASE_URL ?>/assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?= BASE_URL ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="<?= BASE_URL ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASE_URL ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- SB Admin -->
<script src="<?= BASE_URL ?>/assets/js/sb-admin-2.min.js"></script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Chart JS -->
<script src="<?= BASE_URL ?>/assets/vendor/chart.js/Chart.min.js"></script>


<!-- BASE_URL -->
<script>
    const BASE_URL = "<?= BASE_URL ?>";
</script>

<!-- Custom JS -->
<script src="<?= BASE_URL ?>/assets/js/custom.js"></script>

<!-- 🔥 FLASH ALERT (PALING AKHIR) -->
<?php if (!empty($_SESSION['success'])): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= $_SESSION['success']; ?>',
                timer: 2000,
                showConfirmButton: false
            });
        });
    </script>
<?php unset($_SESSION['success']);
endif; ?>

<script>
    $(document).ready(function() {

        if (typeof trainData === 'undefined') return;

        function countClass(data) {
            const result = {
                "Tidak Laris": 0,
                "Laris": 0,
                "Sangat Laris": 0
            };

            data.forEach(row => {
                if (result[row.status_penjualan] !== undefined) {
                    result[row.status_penjualan]++;
                }
            });

            return result;
        }

        function createChart(id, type, data, label) {
            const ctx = document.getElementById(id);
            if (!ctx) return;

            new Chart(ctx, {
                type: type,
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: label,
                        data: Object.values(data),
                        backgroundColor: [
                            '#4e73df',
                            '#1cc88a',
                            '#36b9cc'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true
                        }
                    }
                }
            });
        }

        // ===== TRAIN =====
        const trainCount = countClass(trainData);
        createChart("chartTrain", "bar", trainCount, "Training Data");

        // ===== TEST =====
        const testCount = countClass(testData);
        createChart("chartTestChart", "bar", testCount, "Testing Data");

        // ===== SMOTE =====
        const smoteCount = countClass(smoteData);
        createChart("chartSmote", "bar", smoteCount, "SMOTE Data");

        // ===== ROS =====
        const rosCount = countClass(rosData);
        createChart("chartRos", "bar", rosCount, "ROS Data");

    });
</script>

</body>

</html>