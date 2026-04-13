-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2026 at 03:04 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prediksi`
--
CREATE DATABASE IF NOT EXISTS `db_prediksi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_prediksi`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(12) DEFAULT NULL,
  `username` varchar(12) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$lhP9JM9g5t6FHvlSCvabcOnrqVKQvbcyyfhOtP/ZekG5pJdzNcRvK');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int NOT NULL,
  `id_admin` int DEFAULT NULL,
  `bulan_penjualan` varchar(100) DEFAULT NULL,
  `shif` varchar(100) DEFAULT NULL,
  `pentol` varchar(100) DEFAULT NULL,
  `frozen` varchar(100) DEFAULT NULL,
  `status_penjualan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_admin`, `bulan_penjualan`, `shif`, `pentol`, `frozen`, `status_penjualan`) VALUES
(1, 1, 'Oktober', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris'),
(2, 1, 'Oktober', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(3, 1, 'Oktober', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(4, 1, 'Oktober', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(5, 1, 'Oktober', 'Malam', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(6, 1, 'Oktober', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(7, 1, 'Oktober', 'Malam', 'Sedang', 'Sedang', 'Sangat Laris'),
(8, 1, 'Oktober', 'Pagi', 'Rendah', 'Sedang', 'Tidak Laris'),
(9, 1, 'Oktober', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(10, 1, 'Oktober', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(11, 1, 'Oktober', 'Pagi', 'Rendah', 'Tinggi', 'Laris'),
(12, 1, 'Oktober', 'Malam', 'Tinggi', 'Sedang', 'Sangat Laris'),
(13, 1, 'Oktober', 'Pagi', 'Rendah', 'Sedang', 'Laris'),
(14, 1, 'Oktober', 'Malam', 'Sedang', 'Tinggi', 'Sangat Laris'),
(15, 1, 'Oktober', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(16, 1, 'Oktober', 'Pagi', 'Rendah', 'Tinggi', 'Tidak Laris'),
(17, 1, 'November', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(18, 1, 'November', 'Malam', 'Tinggi', 'Rendah', 'Laris'),
(19, 1, 'November', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(20, 1, 'November', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(21, 1, 'November', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(22, 1, 'November', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(23, 1, 'November', 'Pagi', 'Rendah', 'Tinggi', 'Laris'),
(24, 1, 'November', 'Pagi', 'Tinggi', 'Sedang', 'Sangat Laris'),
(25, 1, 'November', 'Malam', 'Sedang', 'Tinggi', 'Sangat Laris'),
(26, 1, 'November', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris'),
(27, 1, 'November', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(28, 1, 'November', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(29, 1, 'November', 'Malam', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(30, 1, 'November', 'Pagi', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(31, 1, 'November', 'Pagi', 'Sedang', 'Tinggi', 'Sangat Laris'),
(32, 1, 'November', 'Malam', 'Sedang', 'Rendah', 'Tidak Laris'),
(33, 1, 'November', 'Malam', 'Rendah', 'Rendah', 'Tidak Laris'),
(34, 1, 'Desember', 'Pagi', 'Sedang', 'Tinggi', 'Sangat Laris'),
(35, 1, 'Desember', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(36, 1, 'Desember', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(37, 1, 'Desember', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(38, 1, 'Desember', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(39, 1, 'Desember', 'Malam', 'Sedang', 'Sedang', 'Sangat Laris'),
(40, 1, 'Desember', 'Malam', 'Sedang', 'Rendah', 'Tidak Laris'),
(41, 1, 'Desember', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(42, 1, 'Desember', 'Pagi', 'Rendah', 'Sedang', 'Laris'),
(43, 1, 'Desember', 'Malam', 'Rendah', 'Sedang', 'Tidak Laris'),
(44, 1, 'Desember', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(45, 1, 'Desember', 'Malam', 'Rendah', 'Tinggi', 'Laris'),
(46, 1, 'Desember', 'Malam', 'Rendah', 'Rendah', 'Tidak Laris'),
(47, 1, 'Desember', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(48, 1, 'Desember', 'Pagi', 'Tinggi', 'Rendah', 'Laris'),
(49, 1, 'Desember', 'Malam', 'Tinggi', 'Rendah', 'Laris'),
(50, 1, 'Januari', 'Pagi', 'Tinggi', 'Sedang', 'Laris'),
(51, 1, 'Januari', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(52, 1, 'Januari', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(53, 1, 'Januari', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(54, 1, 'Januari', 'Pagi', 'Rendah', 'Tinggi', 'Laris'),
(55, 1, 'Januari', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(56, 1, 'Januari', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(57, 1, 'Januari', 'Malam', 'Sedang', 'Tinggi', 'Sangat Laris'),
(58, 1, 'Januari', 'Malam', 'Rendah', 'Rendah', 'Tidak Laris'),
(59, 1, 'Januari', 'Pagi', 'Rendah', 'Sedang', 'Laris'),
(60, 1, 'Januari', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris'),
(61, 1, 'Januari', 'Malam', 'Sedang', 'Rendah', 'Tidak Laris'),
(62, 1, 'Januari', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(63, 1, 'Januari', 'Pagi', 'Tinggi', 'Sedang', 'Sangat Laris'),
(64, 1, 'Januari', 'Malam', 'Tinggi', 'Sedang', 'Sangat Laris'),
(65, 1, 'Februari', 'Pagi', 'Tinggi', 'Sedang', 'Sangat Laris'),
(66, 1, 'Februari', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(67, 1, 'Februari', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(68, 1, 'Februari', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(69, 1, 'Februari', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(70, 1, 'Februari', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(71, 1, 'Februari', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(72, 1, 'Februari', 'Pagi', 'Tinggi', 'Sedang', 'Laris'),
(73, 1, 'Februari', 'Pagi', 'Tinggi', 'Rendah', 'Laris'),
(74, 1, 'Februari', 'Malam', 'Tinggi', 'Sedang', 'Sangat Laris'),
(75, 1, 'Maret', 'Pagi', 'Tinggi', 'Sedang', 'Sangat Laris'),
(76, 1, 'Maret', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(77, 1, 'Maret', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(78, 1, 'Maret', 'Malam', 'Tinggi', 'Sedang', 'Laris'),
(79, 1, 'Maret', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(80, 1, 'Maret', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(81, 1, 'Maret', 'Malam', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(82, 1, 'Maret', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(83, 1, 'Maret', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(84, 1, 'Maret', 'Pagi', 'Sedang', 'Tinggi', 'Sangat Laris'),
(85, 1, 'Maret', 'Malam', 'Sedang', 'Sedang', 'Sangat Laris'),
(86, 1, 'Maret', 'Malam', 'Tinggi', 'Sedang', 'Sangat Laris'),
(87, 1, 'April', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(88, 1, 'April', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(89, 1, 'April', 'Malam', 'Sedang', 'Tinggi', 'Sangat Laris'),
(90, 1, 'April', 'Pagi', 'Sedang', 'Tinggi', 'Sangat Laris'),
(91, 1, 'April', 'Pagi', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(92, 1, 'April', 'Malam', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(93, 1, 'April', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(94, 1, 'April', 'Malam', 'Tinggi', 'Sedang', 'Sangat Laris'),
(95, 1, 'April', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(96, 1, 'April', 'Pagi', 'Tinggi', 'Rendah', 'Laris'),
(97, 1, 'April', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris'),
(98, 1, 'April', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(99, 1, 'April', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(100, 1, 'April', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(101, 1, 'April', 'Malam', 'Tinggi', 'Rendah', 'Laris'),
(102, 1, 'Mei', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(103, 1, 'Mei', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(104, 1, 'Mei', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(105, 1, 'Mei', 'Pagi', 'Tinggi', 'Rendah', 'Laris'),
(106, 1, 'Mei', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(107, 1, 'Mei', 'Pagi', 'Sedang', 'Tinggi', 'Sangat Laris'),
(108, 1, 'Mei', 'Pagi', 'Rendah', 'Sedang', 'Laris'),
(109, 1, 'Mei', 'Malam', 'Tinggi', 'Sedang', 'Laris'),
(110, 1, 'Mei', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(111, 1, 'Mei', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris'),
(112, 1, 'Mei', 'Malam', 'Sedang', 'Rendah', 'Tidak Laris'),
(113, 1, 'Mei', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(114, 1, 'Mei', 'Malam', 'Rendah', 'Rendah', 'Tidak Laris'),
(115, 1, 'Juni', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(116, 1, 'Juni', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(117, 1, 'Juni', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris'),
(118, 1, 'Juni', 'Malam', 'Sedang', 'Tinggi', 'Sangat Laris'),
(119, 1, 'Juni', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(120, 1, 'Juni', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(121, 1, 'Juni', 'Malam', 'Tinggi', 'Rendah', 'Laris'),
(122, 1, 'Juni', 'Malam', 'Tinggi', 'Rendah', 'Sangat Laris'),
(123, 1, 'Juni', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(124, 1, 'Juni', 'Malam', 'Sedang', 'Rendah', 'Tidak Laris'),
(125, 1, 'Juni', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(126, 1, 'Juni', 'Pagi', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(127, 1, 'Juni', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(128, 1, 'Juni', 'Malam', 'Tinggi', 'Sedang', 'Sangat Laris'),
(129, 1, 'Juli', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(130, 1, 'Juli', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(131, 1, 'Juli', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(132, 1, 'Juli', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(133, 1, 'Juli', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(134, 1, 'Juli', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(135, 1, 'Juli', 'Pagi', 'Rendah', 'Sedang', 'Tidak Laris'),
(136, 1, 'Juli', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(137, 1, 'Juli', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris'),
(138, 1, 'Juli', 'Malam', 'Tinggi', 'Rendah', 'Laris'),
(139, 1, 'Juli', 'Pagi', 'Sedang', 'Tinggi', 'Sangat Laris'),
(140, 1, 'Agustus', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(141, 1, 'Agustus', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(142, 1, 'Agustus', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(143, 1, 'Agustus', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(144, 1, 'Agustus', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(145, 1, 'Agustus', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris'),
(146, 1, 'Agustus', 'Malam', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(147, 1, 'Agustus', 'Pagi', 'Tinggi', 'Rendah', 'Laris'),
(148, 1, 'Agustus', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(149, 1, 'Agustus', 'Malam', 'Sedang', 'Tinggi', 'Sangat Laris'),
(150, 1, 'Agustus', 'Pagi', 'Tinggi', 'Sedang', 'Sangat Laris'),
(151, 1, 'Agustus', 'Pagi', 'Rendah', 'Sedang', 'Laris'),
(152, 1, 'September', 'Pagi', 'Sedang', 'Rendah', 'Laris'),
(153, 1, 'September', 'Malam', 'Sedang', 'Tinggi', 'Laris'),
(154, 1, 'September', 'Pagi', 'Sedang', 'Tinggi', 'Sangat Laris'),
(155, 1, 'September', 'Malam', 'Sedang', 'Rendah', 'Laris'),
(156, 1, 'September', 'Malam', 'Tinggi', 'Sedang', 'Sangat Laris'),
(157, 1, 'September', 'Pagi', 'Sedang', 'Sedang', 'Laris'),
(158, 1, 'September', 'Malam', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(159, 1, 'September', 'Malam', 'Tinggi', 'Rendah', 'Laris'),
(160, 1, 'September', 'Pagi', 'Rendah', 'Rendah', 'Tidak Laris'),
(161, 1, 'September', 'Malam', 'Sedang', 'Tinggi', 'Sangat Laris'),
(162, 1, 'September', 'Pagi', 'Rendah', 'Tinggi', 'Laris'),
(163, 1, 'September', 'Malam', 'Sedang', 'Sedang', 'Laris'),
(164, 1, 'September', 'Pagi', 'Tinggi', 'Rendah', 'Laris'),
(165, 1, 'September', 'Pagi', 'Sedang', 'Tinggi', 'Laris'),
(166, 1, 'September', 'Pagi', 'Tinggi', 'Tinggi', 'Sangat Laris'),
(167, 1, 'September', 'Malam', 'Tinggi', 'Rendah', 'Sangat Laris'),
(168, 1, 'September', 'Pagi', 'Sedang', 'Rendah', 'Tidak Laris');

-- --------------------------------------------------------

--
-- Table structure for table `prediksi_penjualan`
--

CREATE TABLE `prediksi_penjualan` (
  `id_prediksi` int NOT NULL,
  `bulan_prediksi` varchar(100) DEFAULT NULL,
  `shif_prediksi` varchar(100) DEFAULT NULL,
  `pentol` varchar(100) DEFAULT NULL,
  `frozen` varchar(100) DEFAULT NULL,
  `status_penjualan` varchar(100) DEFAULT NULL,
  `probabilitas` varchar(100) DEFAULT NULL,
  `tanggal_prediksi` date DEFAULT NULL,
  `id_admin` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `prediksi_penjualan`
--
ALTER TABLE `prediksi_penjualan`
  ADD PRIMARY KEY (`id_prediksi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `prediksi_penjualan`
--
ALTER TABLE `prediksi_penjualan`
  MODIFY `id_prediksi` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `prediksi_penjualan`
--
ALTER TABLE `prediksi_penjualan`
  ADD CONSTRAINT `prediksi_penjualan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
