<div class="modal fade" id="modalTambah">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="<?= BASE_URL ?>/penjualan/store">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Penjualan</h5>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" class="form-control">
                            <option>Januari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>Mei</option>
                            <option>Juni</option>
                            <option>Juli</option>
                            <option>Agustus</option>
                            <option>September</option>
                            <option>Oktober</option>
                            <option>November</option>
                            <option>Desember</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Shift</label>
                        <select name="shif" class="form-control">
                            <option>Pagi</option>
                            <option>Malam</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pentol</label>
                        <select name="pentol" class="form-control">
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Frozen</label>
                        <select name="frozen" class="form-control">
                            <option>Rendah</option>
                            <option>Sedang</option>
                            <option>Tinggi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status Penjualan</label>
                        <select name="status" class="form-control">
                            <option>Tidak Laris</option>
                            <option>Laris</option>
                            <option>Sangat Laris</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>