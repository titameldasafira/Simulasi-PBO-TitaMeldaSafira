-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 03:00 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1c_titameldasafira`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(100) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMA Negeri 1 Jakarta', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'SMA Negeri 3 Bandung', '88.25', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Budi Santoso', 'SMK Negeri 2 Surabaya', '80.00', '250000.00', 'Reguler', 'Teknik Elektro', 'Kampus B', NULL, NULL, NULL, NULL),
(4, 'Citra Lestari', 'SMA Kristen Yusuf', '91.10', '250000.00', 'Reguler', 'Kedokteran', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Dedi Wijaya', 'SMA Negeri 5 Semarang', '78.45', '250000.00', 'Reguler', 'Manajemen', 'Kampus B', NULL, NULL, NULL, NULL),
(6, 'Eka Putri', 'SMA Negeri 1 Yogyakarta', '86.70', '250000.00', 'Reguler', 'Akuntansi', 'Kampus B', NULL, NULL, NULL, NULL),
(7, 'Fajar Ramadhan', 'MA Negeri 2 Malik', '83.90', '250000.00', 'Reguler', 'Hukum', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Gita Gutawa', 'SMA Negeri 8 Jakarta', '92.00', '150000.00', 'Prestasi', 'Ilmu Komunikasi', 'Kampus Utama', 'Olimpiade Sains Matematika', 'Nasional', NULL, NULL),
(9, 'Hendra Setiawan', 'SMA Olahraga Ragunan', '79.50', '150000.00', 'Prestasi', 'Pendidikan Olahraga', 'Kampus B', 'Bulutangkis Tunggal Putra', 'Internasional', NULL, NULL),
(10, 'Indah Permata', 'SMA Negeri 1 Surakarta', '89.80', '150000.00', 'Prestasi', 'Sastra Inggris', 'Kampus Utama', 'Debat Bahasa Inggris', 'Provinsi', NULL, NULL),
(11, 'Kevin Sanjaya', 'SMA Kristen Petra', '81.00', '150000.00', 'Prestasi', 'Manajemen Bisnis', 'Kampus B', 'Bulutangkis Ganda Putra', 'Internasional', NULL, NULL),
(12, 'Lesti Kejora', 'SMA Negeri 1 Ciawi', '85.00', '150000.00', 'Prestasi', 'Seni Musik', 'Kampus Utama', 'FLS2N Menyanyi Solo', 'Nasional', NULL, NULL),
(13, 'Muhammad Ali', 'MA Negeri 1 Medan', '94.30', '150000.00', 'Prestasi', 'Teknik Kimia', 'Kampus Utama', 'Karya Tulis Ilmiah', 'Nasional', NULL, NULL),
(14, 'Nadia Vega', 'SMA Negeri 2 Padang', '88.00', '150000.00', 'Prestasi', 'Arsitektur', 'Kampus Utama', 'Lomba Menggambar Sketsa', 'Provinsi', NULL, NULL),
(15, 'Oki Setiana', 'SMA Negeri 1 Makassar', '87.20', '300000.00', 'Kedinasan', 'Ilmu Pemerintahan', 'Kampus Utama', NULL, NULL, 'SK-IKATAN-001/2026', 'Kementerian Dalam Negeri'),
(16, 'Putra Perkasa', 'SMA Taruna Nusantara', '90.15', '300000.00', 'Kedinasan', 'Teknik Sipil Siber', 'Kampus Utama', NULL, NULL, 'SK-IKATAN-002/2026', 'Badan Siber dan Sandi Negara'),
(17, 'Qori Sandioriva', 'SMA Negeri 3 Monokwari', '82.60', '300000.00', 'Kedinasan', 'Administrasi Publik', 'Kampus B', NULL, NULL, 'SK-IKATAN-003/2026', 'Pemerintah Daerah Papua'),
(18, 'Rian Agung', 'SMK Kehutanan Samarinda', '84.10', '300000.00', 'Kedinasan', 'Manajemen Hutan', 'Kampus C', NULL, NULL, 'SK-IKATAN-004/2026', 'Kementerian LHK'),
(19, 'Sinta Bella', 'SMA Negeri 1 Pontianak', '86.40', '300000.00', 'Kedinasan', 'Statistika Keuangan', 'Kampus Utama', NULL, NULL, 'SK-IKATAN-005/2026', 'Badan Pusat Statistik'),
(20, 'Taufik Hidayat', 'SMA Negeri 4 Bandung', '89.00', '300000.00', 'Kedinasan', 'Teknik Telekomunikasi', 'Kampus Utama', NULL, NULL, 'SK-IKATAN-006/2026', 'Kementerian Kominfo'),
(21, 'Utami Dewi', 'SMA Negeri 1 Denpasar', '91.50', '300000.00', 'Kedinasan', 'Akuntansi Sektor Publik', 'Kampus Utama', NULL, NULL, 'SK-IKATAN-007/2026', 'Kementerian Keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
