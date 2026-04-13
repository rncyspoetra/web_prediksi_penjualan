<div class="modal fade" id="edit<?= $d['id_penjualan'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="<?= BASE_URL ?>/penjualan/update">

                <input type="hidden" name="id" value="<?= $d['id_penjualan'] ?>">

                <div class="modal-header">
                    <h5>Edit Data Penjualan</h5>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control">
                            <option <?= $d['bulan_penjualan'] == 'Januari' ? 'selected' : '' ?>>Januari</option>
                            <option <?= $d['bulan_penjualan'] == 'Februari' ? 'selected' : '' ?>>Februari</option>
                            <option <?= $d['bulan_penjualan'] == 'Maret' ? 'selected' : '' ?>>Maret</option>
                            <option <?= $d['bulan_penjualan'] == 'April' ? 'selected' : '' ?>>April</option>
                            <option <?= $d['bulan_penjualan'] == 'Mei' ? 'selected' : '' ?>>Mei</option>
                            <option <?= $d['bulan_penjualan'] == 'Juni' ? 'selected' : '' ?>>Juni</option>
                            <option <?= $d['bulan_penjualan'] == 'Juli' ? 'selected' : '' ?>>Juli</option>
                            <option <?= $d['bulan_penjualan'] == 'Agustus' ? 'selected' : '' ?>>Agustus</option>
                            <option <?= $d['bulan_penjualan'] == 'September' ? 'selected' : '' ?>>September</option>
                            <option <?= $d['bulan_penjualan'] == 'Oktober' ? 'selected' : '' ?>>Oktober</option>
                            <option <?= $d['bulan_penjualan'] == 'November' ? 'selected' : '' ?>>November</option>
                            <option <?= $d['bulan_penjualan'] == 'Desember' ? 'selected' : '' ?>>Desember</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Shift</label>
                        <select name="shif" class="form-control">
                            <option <?= $d['shif'] == 'Pagi' ? 'selected' : '' ?>>Pagi</option>
                            <option <?= $d['shif'] == 'Malam' ? 'selected' : '' ?>>Malam</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pentol</label>
                        <select name="pentol" class="form-control">
                            <option <?= $d['pentol'] == 'Rendah' ? 'selected' : '' ?>>Rendah</option>
                            <option <?= $d['pentol'] == 'Sedang' ? 'selected' : '' ?>>Sedang</option>
                            <option <?= $d['pentol'] == 'Tinggi' ? 'selected' : '' ?>>Tinggi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Frozen</label>
                        <select name="frozen" class="form-control">
                            <option <?= $d['frozen'] == 'Rendah' ? 'selected' : '' ?>>Rendah</option>
                            <option <?= $d['frozen'] == 'Sedang' ? 'selected' : '' ?>>Sedang</option>
                            <option <?= $d['frozen'] == 'Tinggi' ? 'selected' : '' ?>>Tinggi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status Penjualan</label>
                        <select name="status" class="form-control">
                            <option <?= $d['status_penjualan'] == 'Tidak Laris' ? 'selected' : '' ?>>Tidak Laris</option>
                            <option <?= $d['status_penjualan'] == 'Laris' ? 'selected' : '' ?>>Laris</option>
                            <option <?= $d['status_penjualan'] == 'Sangat Laris' ? 'selected' : '' ?>>Sangat Laris</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>