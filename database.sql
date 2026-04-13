-- =========================
-- TABEL ADMIN
-- =========================
CREATE TABLE admin (
    id_admin INT AUTO_INCREMENT PRIMARY KEY,
    nama_admin VARCHAR(12),
    username VARCHAR(12),
    password VARCHAR(12)
);

-- INSERT DATA ADMIN
INSERT INTO admin (nama_admin, username, password) VALUES
('Bagas', 'admin', '123'),
('Andi', 'andi', '123'),
('Siti', 'siti', '123');

-- =========================
-- TABEL PENJUALAN
-- =========================
CREATE TABLE penjualan (
    id_penjualan INT AUTO_INCREMENT PRIMARY KEY,
    bulan_penjualan VARCHAR(100),
    shif VARCHAR(100),
    pentol VARCHAR(100),
    frozen VARCHAR(100),
    status_penjualan VARCHAR(100),
    id_admin INT,
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin)
);


-- =========================
-- TABEL PREDIKSI
-- =========================
CREATE TABLE prediksi_penjualan (
    id_prediksi INT AUTO_INCREMENT PRIMARY KEY,
    bulan_prediksi VARCHAR(100),
    shif_prediksi VARCHAR(100),
    pentol VARCHAR(100),
    frozen VARCHAR(100),
    status_penjualan VARCHAR(100),
    probabilitas VARCHAR(100),
    tanggal_prediksi DATE,
    id_admin INT,
    FOREIGN KEY (id_admin) REFERENCES admin(id_admin)
);