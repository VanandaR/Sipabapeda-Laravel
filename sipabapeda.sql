-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2017 at 03:17 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipabapeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `rayon` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nomorhandphone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `nama`, `alamat`, `rayon`, `nomorhandphone`, `created_at`, `updated_at`, `deleted_at`) VALUES
('123124', 'Muhammad Ilham Fauzi', 'Kalimantan X No.22', '1', '081230292232', '2016-11-27 03:01:47', '2016-11-27 03:01:47', NULL),
('123125', 'Muhammad Ilham Fauzi Y', 'Kalimantan X No.22', '1', '081230292232', '2016-11-27 03:02:36', '2016-12-13 11:49:20', '2016-12-13 11:49:20'),
('123412321', 'Shinta', 'Jawa', '1', '081992929222', '2016-12-16 01:02:47', '2016-12-16 01:02:47', NULL),
('12345678', 'Hendarto', 'Kalimantan X No.31', '1', '081234223221', '2016-12-21 22:16:21', '2016-12-21 22:16:21', NULL),
('125353533', 'Anisa', 'Jawa', '1', '082112221221', '2016-12-16 01:04:04', '2016-12-16 01:04:04', NULL),
('125442', 'Yusuf Eka Sayogana', 'Jl Brantas Gg.8 No32', '1', '081213211442', '2016-12-13 09:09:50', '2016-12-21 08:28:43', NULL),
('24061995', 'Ani', 'Jl. Kenanga', '1', '085231234345', '2016-12-13 09:26:59', '2016-12-16 00:35:46', NULL),
('2882221', 'Vananda Rahadika', 'Jl. Kalimantan X No.21', '1', '081222111111', '2016-12-03 02:35:20', '2016-12-21 08:36:40', NULL),
('3245322', 'Andry Dermawan', 'Jl Raya Ambulu', '5', '081232343454', '2016-12-21 17:14:52', '2016-12-21 17:14:52', NULL),
('72123', 'Fery Andik Vermansyah', 'Jl Mastrip No.3', '1', '081981823221', '2016-12-26 21:10:12', '2016-12-26 21:27:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id_level` int(11) NOT NULL,
  `level` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id_level`, `level`) VALUES
(51601, 'Rayon Jember Kota'),
(51602, 'Rayon Lumajang'),
(51603, 'Rayon Kalisat'),
(51604, 'Rayon Rambipuji'),
(51605, 'Rayon Ambulu'),
(51606, 'Rayon Klakah'),
(51607, 'Rayon Tanggul'),
(51608, 'Rayon Kencong'),
(51609, 'Rayon Tempeh'),
(516001, 'Bagian Perencanaan'),
(516002, 'Manajer'),
(516003, 'Bagian Konstruksi'),
(516004, 'Pelayanan Administrasi'),
(516005, 'Bagian Tranel');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_11_08_064227_create_levels_table', 1),
('2016_11_08_111313_create_userlevels_table', 2),
('2016_11_08_123621_create_customers_table', 3),
('2016_11_08_163611_create_progresses_table', 3),
('2016_11_08_163747_create_transactions_table', 4),
('2016_11_08_171222_create_rayons_table', 4),
('2016_11_08_172031_create_powers_table', 5),
('2016_11_28_182458_create_revisions_table', 6),
('2016_12_11_160951_create_categories_table', 7),
('2016_12_22_030952_create_session_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `powers`
--

CREATE TABLE `powers` (
  `id_power` int(11) NOT NULL,
  `daya` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tarif` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `powers`
--

INSERT INTO `powers` (`id_power`, `daya`, `tarif`, `created_at`, `updated_at`) VALUES
(1, '220', 'S1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '450', 'S2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '1300', 'S2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '2200', 'S2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '3500 - 200000', 'S2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '>200000', 'S3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '450-900', 'R1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '1300', 'R2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '2200', 'R2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '3500 - 5500', 'R2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '>6600', 'R3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '450 - 900', 'B1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '1300', 'B1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '2200 - 5500', 'B1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '6600 - 200000', 'B2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, '>200000', 'B3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, '450 - 900', 'I1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, '1300', 'I1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, '2200', 'I1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, '3500 - 14000', 'I1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `progresses`
--

CREATE TABLE `progresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_agenda` int(10) NOT NULL,
  `status_kajian_kelayakan` int(2) NOT NULL DEFAULT '0',
  `file_survei` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_rab` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_analisis` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_kajian_kelayakan` date NOT NULL,
  `status_bayar_BP` int(2) NOT NULL DEFAULT '0',
  `tanggal_bayar_BP` date DEFAULT NULL,
  `status_PK` int(2) NOT NULL DEFAULT '0',
  `file_PK` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_file_PK` date NOT NULL,
  `status_PJBTL` int(2) NOT NULL DEFAULT '0',
  `tanggal_PJBTL` date DEFAULT NULL,
  `file_PJBTL` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_konstruksi` int(11) NOT NULL,
  `status_pembangunan_jtm` int(11) NOT NULL,
  `status_commisioning_test` int(2) NOT NULL DEFAULT '0',
  `tanggal_commisioning_test` date DEFAULT NULL,
  `status_cek_SLO` int(2) NOT NULL DEFAULT '0',
  `tanggal_cek_SLO` date DEFAULT NULL,
  `status_pemasangan_app` int(2) NOT NULL DEFAULT '0',
  `tanggal_pemasangan_app` date DEFAULT NULL,
  `file_pemasangan_app` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_mutasi_PDL` int(2) NOT NULL DEFAULT '0',
  `tanggal_mutasi_PDL` date DEFAULT NULL,
  `file_mutasi_pdl` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_updating_dij` int(2) NOT NULL,
  `tanggal_updating_dij` date NOT NULL,
  `file_updating_dij` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `progresses`
--

INSERT INTO `progresses` (`id`, `no_agenda`, `status_kajian_kelayakan`, `file_survei`, `file_rab`, `file_analisis`, `tanggal_kajian_kelayakan`, `status_bayar_BP`, `tanggal_bayar_BP`, `status_PK`, `file_PK`, `tanggal_file_PK`, `status_PJBTL`, `tanggal_PJBTL`, `file_PJBTL`, `status_konstruksi`, `status_pembangunan_jtm`, `status_commisioning_test`, `tanggal_commisioning_test`, `status_cek_SLO`, `tanggal_cek_SLO`, `status_pemasangan_app`, `tanggal_pemasangan_app`, `file_pemasangan_app`, `status_mutasi_PDL`, `tanggal_mutasi_PDL`, `file_mutasi_pdl`, `status_updating_dij`, `tanggal_updating_dij`, `file_updating_dij`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 123124, 2, 'Belakang.png', '', '', '0000-00-00', 2, '2016-12-03', 2, 'Bagibarang.docx', '0000-00-00', 2, NULL, 'ANALISIS SENTIMEN OTOMATIS DI MEDIA SOSIAL TERHADA', 3, 1, 0, NULL, 0, NULL, 0, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-11-27 03:01:47', '2016-12-14 22:08:57', NULL),
(3, 123125, 2, 'Belakang.png', '', '', '0000-00-00', 2, '2016-02-12', 1, '', '0000-00-00', 0, NULL, '', 0, 0, 0, NULL, 0, NULL, 0, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-11-27 03:02:36', '2016-12-13 11:49:20', '2016-12-13 11:49:20'),
(6, 919199, 2, 'Cetak 6x10.png', '', '', '0000-00-00', 2, '2016-12-15', 2, 'Bagibarang.docx', '0000-00-00', 2, NULL, 'Jawaban Kuis PBO Final.docx', 3, 2, 2, NULL, 2, NULL, 2, NULL, 'REVISI-AKHIR-pt1.docx', 2, NULL, 'Worklog PBW.docx', 2, '0000-00-00', 'Kuis Exception Handling.docx', '2016-12-03 02:35:20', '2016-12-21 08:36:40', '2016-12-21 08:36:40'),
(7, 124221, 2, '', '', '', '0000-00-00', 2, NULL, 2, 'Bagibarang.docx', '0000-00-00', 2, NULL, 'Bagibarang.docx', 3, 2, 2, NULL, 2, NULL, 2, NULL, 'Lembar Jawaban Remidial PBO.docx', 2, NULL, 'Topik.docx', 2, '0000-00-00', 'Kuis Exception Handling.docx', '2016-12-13 09:09:50', '2016-12-21 22:21:00', '2016-12-21 22:21:00'),
(8, 24061995, 2, 'Jawaban Kuis PBO Final.docx', '', '', '0000-00-00', 2, '2016-12-16', 2, 'REVISI-AKHIR-pt1.docx', '0000-00-00', 2, NULL, 'Bagibarang.docx', 3, 1, 0, NULL, 0, NULL, 0, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-12-13 09:26:59', '2016-12-21 22:23:13', NULL),
(9, 12314123, 0, '', '', '', '0000-00-00', 0, NULL, 2, 'Bagibarang.docx', '0000-00-00', 2, NULL, 'ANALISIS SENTIMEN OTOMATIS DI MEDIA SOSIAL TERHADAP KINERJA PEMERINTAHAN KABUPATEN JEMBER BERBASIS T', 3, 2, 2, NULL, 2, NULL, 1, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-12-16 01:02:47', '2016-12-22 18:33:06', NULL),
(10, 123123412, 2, 'REKAP REMIDI PBO KUIS FINAL.docx', 'Rekap Nilai Kuis PBO Final.docx', 'REVISI-AKHIR-pt1.docx', '0000-00-00', 2, '2016-12-09', 1, '', '0000-00-00', 0, NULL, '', 0, 0, 0, NULL, 0, NULL, 0, NULL, '', 2, NULL, 'Worklog PBW.docx', 1, '0000-00-00', '', '2016-12-16 01:04:05', '2016-12-26 21:21:01', NULL),
(14, 132479, 0, '', '', '', '0000-00-00', 2, '2016-12-22', 2, 'REKAP REMIDI PBO KUIS FINAL.docx', '0000-00-00', 1, NULL, '', 0, 0, 0, NULL, 0, NULL, 0, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-12-21 08:36:40', '2016-12-26 21:12:04', NULL),
(15, 432123421, 0, '', '', '', '0000-00-00', 0, NULL, 0, '', '0000-00-00', 0, NULL, '', 0, 0, 0, NULL, 0, NULL, 0, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-12-21 17:14:52', '2016-12-21 17:14:52', NULL),
(16, 12345678, 2, 'Jawaban Kuis PBO Final.docx', 'Bagibarang.docx', 'ANALISIS SENTIMEN OTOMATIS DI MEDIA SOSIAL TERHADAP KINERJA PEMERINTAHAN KABUPATEN JEMBER BERBASIS T', '0000-00-00', 2, '2017-01-02', 2, 'ANALISIS SENTIMEN OTOMATIS DI MEDIA SOSIAL TERHADAP KINERJA PEMERINTAHAN KABUPATEN JEMBER BERBASIS T', '0000-00-00', 2, NULL, 'Metode Tepat Untuk Sentimen Analisis.pdf', 3, 1, 0, NULL, 0, NULL, 0, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-12-21 22:16:21', '2016-12-26 23:03:06', NULL),
(17, 123456789, 0, '', '', '', '0000-00-00', 0, NULL, 0, '', '0000-00-00', 0, NULL, '', 0, 0, 0, NULL, 0, NULL, 0, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-12-21 22:20:59', '2016-12-21 22:20:59', NULL),
(18, 142020201, 2, 'Yang perlu dicari.docx', 'REVISI-AKHIR-pt1.docx', 'Totalan Tahap 2.docx', '0000-00-00', 2, '2016-12-14', 2, 'REVISI-AKHIR-pt1.docx', '0000-00-00', 2, NULL, 'Topik.docx', 1, 0, 0, NULL, 0, NULL, 0, NULL, '', 0, NULL, '', 0, '0000-00-00', '', '2016-12-26 21:10:12', '2016-12-26 22:36:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rayons`
--

CREATE TABLE `rayons` (
  `id_rayon` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `nama_rayon` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rayons`
--

INSERT INTO `rayons` (`id_rayon`, `nama_rayon`) VALUES
('1', 'Jember Kota'),
('2', 'Lumajang'),
('3', 'Kalisat'),
('4', 'Rambipuji'),
('5', 'Ambulu'),
('6', 'Klakah'),
('7', 'Tanggul'),
('8', 'Kencong'),
('9', 'Tempeh');

-- --------------------------------------------------------

--
-- Table structure for table `revisions`
--

CREATE TABLE `revisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `tgl_revisi` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `file_revisi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_file` int(2) NOT NULL,
  `no_agenda` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `no_agenda` int(10) UNSIGNED NOT NULL,
  `id_customer` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `daya_lama` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `daya_baru` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`no_agenda`, `id_customer`, `daya_lama`, `daya_baru`, `jenis`, `tanggal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(123124, '123124', NULL, '3', 2, '2016-11-27', '2016-11-27 03:01:47', '2016-11-27 03:01:47', NULL),
(123125, '123125', NULL, '3', 1, '2016-11-27', '2016-11-27 03:02:36', '2016-12-13 11:49:20', '2016-12-13 11:49:20'),
(124221, '125442', NULL, '4', 1, '2016-12-13', '2016-12-13 09:09:50', '2016-12-21 22:21:00', '2016-12-21 22:21:00'),
(132479, '2882221', NULL, '4', 2, '2016-12-21', '2016-12-21 08:36:40', '2016-12-21 08:36:40', NULL),
(919199, '2882221', NULL, '3', 1, '2016-12-03', '2016-12-03 02:35:20', '2016-12-21 08:36:40', '2016-12-21 08:36:40'),
(12314123, '123412321', NULL, '3', 1, '2016-12-16', '2016-12-16 01:02:47', '2016-12-16 01:02:47', NULL),
(12345678, '12345678', NULL, '3', 1, '2016-12-22', '2016-12-21 22:16:21', '2016-12-21 22:16:21', NULL),
(24061995, '24061995', NULL, '3', 1, '2016-12-13', '2016-12-13 09:26:59', '2016-12-16 00:35:46', NULL),
(123123412, '125353533', NULL, '2', 1, '2016-12-16', '2016-12-16 01:04:05', '2016-12-16 01:04:05', NULL),
(123456789, '125442', NULL, '5', 2, '2016-12-22', '2016-12-21 22:20:59', '2016-12-21 22:20:59', NULL),
(142020201, '72123', NULL, '3', 1, '2016-12-27', '2016-12-26 21:10:12', '2016-12-26 21:10:12', NULL),
(432123421, '3245322', NULL, '4', 1, '2016-12-22', '2016-12-21 17:14:52', '2016-12-21 17:14:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `userlevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `userlevel`) VALUES
(1, 'Vananda Rahadika', 'vanandarahadika79@gmail.com', '$2y$10$x8hP4o10m0fPwkVpCkR20uZsErHvA3JNvGClUjR2NVqb3gnmFYEm6', 'l7RuBsuypjCfXAIPSKx6JxlTQ34BaGIHWuZGXAoCiz3kuBgpmN5bwaMtzosG', '2016-11-11 00:51:56', '2016-12-26 23:03:18', 516001),
(2, 'Rayon Jember', 'rayonplnjember@gmail.com', '$2y$10$x8hP4o10m0fPwkVpCkR20uZsErHvA3JNvGClUjR2NVqb3gnmFYEm6', 'bad8qudOiGZtyUXCBwo9KFq1IPtVCd6EkQYolVhrhyrplr32e8lh8Wqjaypm', '0000-00-00 00:00:00', '2016-12-26 23:01:47', 51601),
(5, 'Anisa', 'anisadz225@gmail.com', '$2y$10$QlhEezOPq3yjvpMQDl0nDe6flyLsUp8Uv4z5s5oTJcSHRDGKEwIu6', '8YxQvQt1rHXgaYN4lTySXLPkBL9Hxu7ADlJaRswguWaPvMiU3HGpUL9qxCMd', '2016-12-15 23:56:50', '2016-12-16 00:15:40', 516002),
(6, 'Muhammad Ilham', 'ilham@gmail.com', '$2y$10$.HSblc6qnoHHYZXJ2uxXxOk5bp8DR1zr6sG044yZq06CcNKxE25Mq', 'lXqJnVIo8XY7OGwI97eQQol4PXI37f740HN3UQOT884mfdynASyVqjZNpmsL', '2016-12-21 16:34:40', '2016-12-21 16:40:38', 516005),
(7, 'Rayon Lumajang', 'rayonlumajang@gmail.com', '$2y$10$kIOHELgaVMSYXBYGMiahCuVDYXRFrgxQE92Ia2XbrM1wzAuP7zOaK', 'ZKuLTYXvO19NSTefxSnBFiMnaPl8fZlsRSnRJCpi9miZuehw17wSK0Bh4qES', '2016-12-21 16:45:55', '2016-12-21 17:02:47', 51602),
(9, 'Rayon Kalisat', 'rayonkalisat@gmail.com', '$2y$10$BNnZ0Yf/WCu2UEDRBPvyAeZnNV6lWAhiqkMwWZ0KI22HP.DOwwMCO', NULL, '2016-12-21 16:54:38', '2016-12-21 17:03:08', 51603),
(10, 'Rayon Rambipuji', 'rayonrambipuji@gmail.com', '$2y$10$8iQpt0X5qqxAk21FJ8qStel6orUm5mJqcN84F26gOeLgkxtcxx7Lm', 'uhQqAXZfZ7qmLegzZ127uigIyKeLhwQ8FoVuWcuEThC9BK639chnFWr0K43v', '2016-12-21 16:59:02', '2016-12-21 17:03:14', 51604),
(11, 'Rayon Ambulu', 'rayonambulu@gmail.com', '$2y$10$iy.5rMtdl9TiMyoOKsIU.uNoCDcu1pDs.rrAKsw7/80zrVz6FUvp2', 'QgpAa2roOMoll4jJmDQffW4eXMuUFtBtDknWPuvmbDVAPi14ZIfJj0lipXb9', '2016-12-21 17:01:34', '2016-12-21 17:03:19', 51605),
(12, 'Savira Oktari', 'saviraoktari@gmail.com', '$2y$10$h6nHQ1nrkLSY.VkOB3eDTOC.CYlgcir7uGYFbZokXpcvrNNLFf0RW', NULL, '2016-12-21 22:12:12', '2016-12-21 22:13:35', 516003);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `rayon` (`rayon`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `powers`
--
ALTER TABLE `powers`
  ADD PRIMARY KEY (`id_power`);

--
-- Indexes for table `progresses`
--
ALTER TABLE `progresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_agenda` (`no_agenda`);

--
-- Indexes for table `rayons`
--
ALTER TABLE `rayons`
  ADD PRIMARY KEY (`id_rayon`);

--
-- Indexes for table `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`no_agenda`),
  ADD KEY `transactions_id_customer_index` (`id_customer`),
  ADD KEY `transactions_daya_lama_index` (`daya_lama`),
  ADD KEY `transactions_daya_baru_index` (`daya_baru`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `userlevel` (`userlevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `powers`
--
ALTER TABLE `powers`
  MODIFY `id_power` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `progresses`
--
ALTER TABLE `progresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `no_agenda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432123422;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
