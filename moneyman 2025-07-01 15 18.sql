-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2025 at 07:18 AM
-- Server version: 11.5.2-MariaDB-log
-- PHP Version: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneyman`
--

-- --------------------------------------------------------

--
-- Table structure for table `cicilan_savings`
--

CREATE TABLE `cicilan_savings` (
  `id` int(11) NOT NULL,
  `id_savings` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text NOT NULL,
  `jml_cicilan` int(11) NOT NULL,
  `status_cicilan` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cicilan_savings`
--

INSERT INTO `cicilan_savings` (`id`, `id_savings`, `id_user`, `tanggal`, `catatan`, `jml_cicilan`, `status_cicilan`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 0, '2024-11-22', '1', 1000000, 1, '2024-11-22-674037420e9b3-795_ADxrPMbQzURNWB', '2024-11-22 07:48:18', '2024-11-22 07:48:18', '0000-00-00 00:00:00'),
(2, 3, 0, '2024-11-22', 'Testing', 1000000, 1, '2024-11-22-674055b3b25d2-RWcVMojBXyzAbZFr8p', '2024-11-22 09:58:11', '2024-11-22 09:58:11', '0000-00-00 00:00:00'),
(3, 4, 0, '2024-11-22', 'testing...', 150000, 1, '2024-11-22-674069cd5c9f5-4JZBjq1GXvS3-2wCeD', '2024-11-22 11:23:57', '2024-11-22 11:23:57', '0000-00-00 00:00:00'),
(4, 4, 0, '2024-11-23', 'testing 1', 150000, 1, '2024-11-23-6741523f2dd59-0RXVSLUynw1tWf4HC_', '2024-11-23 03:55:43', '2024-11-23 03:55:43', '0000-00-00 00:00:00'),
(5, 4, 0, '2024-11-23', 'testing 2', 150000, 1, '2024-11-23-6741550da5f92-2jxJ4G9zPSoMqXAgbR', '2024-11-23 04:07:41', '2024-11-23 04:07:41', '0000-00-00 00:00:00'),
(6, 8, 1, '2025-01-01', 'testing 1', 100000, 1, '2025-01-01-6775029116405-T4YHy1JS0OAikbgRpw', '2025-01-01 15:53:37', '2025-01-01 15:53:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_expenses` int(11) NOT NULL,
  `name_expenses` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_expenses` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `id_user`, `id_kategori_expenses`, `name_expenses`, `amount`, `description`, `date_expenses`, `status`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 5, 'Wi-Fi', 250000, 'Lebih hemat lagi', '2024-11-25', 0, 'wi-fi-6744275b4bfa4-ABSxFtGkCU4uQfTdgV', '2024-11-25 13:29:35', '2024-11-25 13:29:35', '0000-00-00 00:00:00'),
(2, 0, 1, 'Nasi goreng', 15000, 'lebih hemat lagi', '2024-11-21', 0, 'nasi-goreng-674481d92f669-oXTD8rEn4jsRexUVN3', '2024-11-25 05:55:37', '2024-11-25 05:55:37', '0000-00-00 00:00:00'),
(3, 0, 1, 'testing 1', 10000, 'testing..... 1', '2024-11-25', 0, 'testing-1-674538254e1d3-NgjFL8AQ-hpJwelfZX', '2024-11-25 18:53:25', '2024-11-25 18:53:25', '0000-00-00 00:00:00'),
(4, 0, 4, 'bensin', 20000, 'jaga kondisi kendaraan', '2024-11-28', 0, 'bensin-6748387eb7e1f-gLdy1mW3wFT9h6RVq8', '2024-11-28 01:31:42', '2024-11-28 01:31:42', '0000-00-00 00:00:00'),
(5, 0, 4, 'Service motor', 330000, 'ganti spare part', '2024-12-01', 0, 'service-motor-674c05ee7e676-NDtiwGPTB5-n3xua9g', '2024-11-30 22:45:02', '2024-11-30 22:45:02', '0000-00-00 00:00:00'),
(6, 0, 4, 'tambal ban', 20000, 'ban luar tipis, harus mulai di ganti', '2024-12-05', 0, 'tambal-ban-67524d5514d68-puq-9fQkrMWm6S4PHU', '2024-12-05 17:03:17', '2024-12-05 17:03:17', '0000-00-00 00:00:00'),
(7, 0, 1, 'geprek (3)', 25000, 'untuk berbuka puasa', '2024-12-05', 0, 'geprek-3-67524d8b8c9c6-a-N5fJU41ISutywAcX', '2024-12-05 17:04:11', '2024-12-05 17:04:11', '0000-00-00 00:00:00'),
(8, 0, 4, 'kena tilang', 100000, 'sim mati kena denda', '2024-12-07', 0, 'kena-tilang-67546e80cfe29-xLBnOPwEhQYdcuSp6a', '2024-12-07 07:49:20', '2024-12-07 07:49:20', '0000-00-00 00:00:00'),
(10, 1, 6, 'testing', 30303, 'te', '2024-12-12', 0, 'testing-67597b7c93fd5-Bui5TG9oHkJFfRbpj4', '2024-12-11 03:46:04', '2025-01-04 09:36:29', '2025-01-04 17:36:29'),
(11, 1, 5, 'testing 1', 50000, 'testing 1 ....', '2024-12-19', 0, 'testing-1-6764dc339e788-ZfdmzK6NDCTBOau_R9', '2024-12-19 18:53:39', '2024-12-19 18:53:39', '0000-00-00 00:00:00'),
(12, 1, 4, 'Testing 2', 20000, 'Testing testing', '2024-12-20', 0, 'testing-2-67650337a9102-uLFBYa43ZNR9WGj67I', '2024-12-19 21:40:07', '2024-12-19 21:40:07', '0000-00-00 00:00:00'),
(13, 1, 1, 'testing 3', 100000, 'testing 3 .....', '2024-12-21', 0, 'testing-3-67678f0d0c56e-mEirwdg9vjYpG5oBX0', '2024-12-21 20:01:17', '2024-12-21 20:01:17', '0000-00-00 00:00:00'),
(14, 1, 1, 'testing 4', 52000, 'testing lalapan', '2024-12-23', 0, 'testing-4-6769efe23e33b-PTkdcuWvpmU1ZzF96a', '2024-12-23 15:18:58', '2024-12-23 15:18:58', '0000-00-00 00:00:00'),
(15, 1, 1, 'testing 5', 65000, 'testing bakso + bensin', '2024-12-24', 0, 'testing-5-676ba5815a09f-Svu4GDXRMUEecgbPf1', '2024-12-25 05:26:09', '2024-12-25 05:26:09', '0000-00-00 00:00:00'),
(16, 1, 5, 'Wi-Fi', 250000, 'testing wi-fi', '2024-12-25', 0, 'wi-fi-676bff7434104-6vyj4MluO3WHi-wten', '2024-12-25 11:49:56', '2024-12-25 11:49:56', '0000-00-00 00:00:00'),
(17, 1, 1, 'testing 6', 17500, 'testing yakult+mie 2', '2024-12-25', 0, 'testing-6-676bffbc5b600-1n3j20NBAtcwCehdJu', '2024-12-25 11:51:08', '2024-12-25 11:51:08', '0000-00-00 00:00:00'),
(18, 2, 1, 'jajan', 15000, 'mie 2 + susu ultra milk', '2024-12-29', 0, 'jajan-6771500576e06-NKpPD-UxG2B_AvcW4r', '2025-01-05 07:56:17', '2025-01-05 07:05:05', '2025-01-05 15:05:05'),
(19, 1, 1, 'jajan', 15000, 'testing mie + ultramilk', '2024-12-28', 0, 'jajan-6772d0ad5603d-1BYENKGZ0uke97hxJ6', '2024-12-30 15:56:13', '2024-12-30 15:56:13', '0000-00-00 00:00:00'),
(20, 1, 1, 'testing 7', 26000, 'testing selada + saos', '2024-12-31', 0, 'testing-7-6775021396fc0-zFe1oL8r0PjTbuO3EA', '2025-01-01 07:51:31', '2025-01-01 07:51:31', '0000-00-00 00:00:00'),
(21, 3, 4, 'tes', 100000, 'testing', '2025-01-01', 0, 'tes-677523a876dbd-6DacGZFrxme2SnqXNp', '2025-01-01 10:14:48', '2025-01-01 10:14:48', '0000-00-00 00:00:00'),
(22, 3, 1, 'tes', 23000, 'testing testing', '2024-12-17', 0, 'tes-67752418509bc-3AZNHJlXTvm_D0bKx5', '2025-01-01 10:16:40', '2025-01-04 14:04:39', '2025-01-04 22:04:39'),
(23, 1, 6, 'shopee', 98209, 'kabel data, otg + sol sepatu + topi', '2025-01-01', 0, 'shopee-67755b6f28c4d--TwY9rWRmziFIUfvbZ', '2025-01-01 14:12:47', '2025-01-01 14:12:47', '0000-00-00 00:00:00'),
(24, 1, 4, 'bensin', 20000, 'hemat', '2025-01-02', 0, 'bensin-6776af75a4e06-my5joB4SeV_LzQc0dx', '2025-01-02 14:23:33', '2025-01-02 14:23:33', '0000-00-00 00:00:00'),
(25, 1, 7, 'Tes', 30000, 'Testing kumpul', '2025-01-03', 0, 'tes-6777b276d8a4d-lGc0qpna5Q4EADVN7y', '2025-01-05 10:49:11', '2025-01-05 10:49:11', '0000-00-00 00:00:00'),
(26, 1, 1, 'geprek', 16000, 'geprek sambal ijo', '2025-01-03', 0, 'geprek-67789ebb02089-XW-yHqfwAmEpzxKgoI', '2025-01-04 01:36:43', '2025-01-04 01:36:43', '0000-00-00 00:00:00'),
(27, 4, 5, 'Testing', 25000, 'Kuota', '2025-01-06', 0, 'testing-677b985430e55-6Z9xGcUOrskL0zhlC-', '2025-01-06 07:46:12', '2025-01-06 07:46:12', '0000-00-00 00:00:00'),
(28, 4, 6, 'Testing', 60000, 'Ape nu', '2025-01-01', 0, 'testing-677b99312aedb-yPx_F8r9NBJtlbgG0S', '2025-01-06 07:49:53', '2025-01-06 07:49:53', '0000-00-00 00:00:00'),
(29, 4, 5, 'Pls', 41500, 'Kuota', '2025-01-05', 0, 'pls-677b99525bd3f-dI-ixOaNZl5XsyJbhC', '2025-01-06 07:50:26', '2025-01-06 07:50:26', '0000-00-00 00:00:00'),
(30, 1, 5, 'Pulsa', 41500, 'Cimb: kuota', '2025-01-06', 0, 'pulsa-677be089475a5-AMLtJQ9_acKNUk6Cvj', '2025-01-06 12:54:17', '2025-01-06 12:54:17', '0000-00-00 00:00:00'),
(31, 1, 1, 'air', 15000, 'alfamart air + susu', '2025-01-07', 0, 'air-677ccf1b8b9dc-qdRjicx65O3NhUHk0B', '2025-01-07 05:52:11', '2025-01-07 05:52:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `icons`
--

CREATE TABLE `icons` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori_income` int(11) NOT NULL,
  `name_income` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_income` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `id_user`, `id_kategori_income`, `name_income`, `amount`, `description`, `date_income`, `status`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 1, 'testing', 20000, 'testing ..... 1', '2024-12-05', 0, 'testing-67528fed7c2e4-OGuFW3ekmXI8dwvrcA', '2024-12-06 05:47:25', '2024-12-06 05:47:25', '0000-00-00 00:00:00'),
(2, 1, 5, 'Gaji', 2500000, 'gaji bulan november', '2024-11-29', 0, 'gaji-6756df0c5f188-U2rNvXn74zs510FZSl', '2024-12-09 20:19:01', '2024-12-09 20:19:01', '0000-00-00 00:00:00'),
(3, 3, 1, 'kembali', 300000, 'uang saya telah kembali', '2024-12-14', 0, 'kembali-675d9dfa7100b-o9lqwIEW6s10TF8uAS', '2024-12-14 15:02:18', '2024-12-14 15:02:18', '0000-00-00 00:00:00'),
(4, 3, 2, 'testing', 20000, 'testing testing', '2024-11-14', 0, 'testing-675da5a9337ea-1LtoyJMVsudl4Xnx5v', '2024-12-14 15:35:05', '2025-01-04 22:04:54', '2025-01-04 22:04:54'),
(6, 1, 1, 'testing 1', 1000, 'testing hadiah', '2024-12-25', 1, 'testing-1-676c09d6603cb-JeMEabhRtmH2id8TzA', '2024-12-25 20:34:14', '2024-12-25 20:34:14', '0000-00-00 00:00:00'),
(7, 1, 5, 'desember', 3635182, 'gaji bulan desember', '2024-12-27', 1, 'desember-676e9625b8a89-wqzgTJHQeNVU2kMYif', '2024-12-27 18:57:25', '2024-12-27 18:57:25', '0000-00-00 00:00:00'),
(8, 1, 4, 'testing 1', 10000, 'testing testing 1', '2025-01-03', 1, 'testing-1-677a64a5c6a4d-BU2FmYSkxLg3pchbHu', '2025-01-05 17:53:25', '2025-01-05 18:04:48', '2025-01-05 18:04:48'),
(9, 1, 5, 'testing 2', 20000, 'testing testing 2', '2025-01-01', 1, 'testing-2-677a650ef1eb1-WQc4zIrjuld7opZPD3', '2025-01-05 17:55:11', '2025-01-05 17:55:11', '0000-00-00 00:00:00'),
(10, 4, 1, 'Testing', 500000, 'Testing', '2025-01-06', 1, 'testing-677b9886bc8db-keAZ1RvUa_24KPCf5E', '2025-01-06 15:47:02', '2025-01-06 15:47:02', '0000-00-00 00:00:00'),
(11, 4, 4, 'Testing', 150000, 'Testing', '2025-01-02', 1, 'testing-677b997a99641-W8Rz-s5yeaFjYSuVdn', '2025-01-06 15:51:06', '2025-01-06 15:51:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE `inventori` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_expenses`
--

CREATE TABLE `kategori_expenses` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_expenses`
--

INSERT INTO `kategori_expenses` (`id`, `kategori`, `icon`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Makanan', 'fa-utensils', 'makanan-67262982a7ccf-zvR2NDqg9oXk6tAhpw', '2024-11-02 05:30:42', '2024-11-02 05:30:42', '0000-00-00 00:00:00'),
(2, 'Listrik', 'fa-bolt', 'listrik-6727144b69aa7-0_pcuF-xskWXACVadn', '2024-11-02 06:34:53', '2024-11-02 22:12:27', '0000-00-00 00:00:00'),
(4, 'Kendaraan', 'fa-motorcycle', 'kendaraan-67270e24b0d5d-0H4rS6DKCqVzyTE_Am', '2024-11-02 13:56:10', '2024-11-02 21:46:12', '0000-00-00 00:00:00'),
(5, 'Internet', 'fa-wifi', 'internet-67271b4d0621a--DBcVA9t1YjblwOgCm', '2024-11-02 22:42:21', '2024-11-02 22:42:21', '0000-00-00 00:00:00'),
(6, 'Belanja', 'fa-bag-shopping', 'belanja-67276e85eb57f-FlkCRNXg8Aiuy7Jpc2', '2024-11-03 04:37:25', '2024-11-03 04:37:25', '0000-00-00 00:00:00'),
(7, 'Hibah', 'fa-circle-dollar-to-slot', 'hibah-6777b23eca9c6-9ZMWfKC2PuRwejnEJ_', '2025-01-03 08:47:42', '2025-01-03 08:47:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_income`
--

CREATE TABLE `kategori_income` (
  `id` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_income`
--

INSERT INTO `kategori_income` (`id`, `kategori`, `icon`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hadiah', 'fa-home', 'hadiah-67271bfd13dbc--0HvotFAfD87B4pK5k', '2024-11-02 06:46:20', '2024-11-02 22:45:17', '0000-00-00 00:00:00'),
(2, 'listrik', 'fa-bolt-lightning', 'listrik-672702513516f-hrNqTFDAj8EWQfiGcU', '2024-11-02 06:52:52', '2024-11-02 20:55:45', '0000-00-00 00:00:00'),
(3, 'Hibah', 'fa-face-smile', 'hibah-67271b259129b-XyoClMtYVkNgn_7mwa', '2024-11-02 07:16:44', '2024-11-02 22:41:41', '0000-00-00 00:00:00'),
(4, 'Penjualan', 'fa-shop', 'penjualan-67270de3a6a5c-4uMX6fhdZgYNDnK2_q', '2024-11-02 20:47:01', '2024-11-02 21:45:07', '0000-00-00 00:00:00'),
(5, 'Gaji', 'fa-rupiah-sign', 'gaji-6756dee11e147-_ndZiOMEH7Ujk8gcpN', '2024-12-09 04:13:21', '2024-12-09 04:13:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pakai`
--

CREATE TABLE `pakai` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `catatan` text NOT NULL,
  `status_pakai` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pakai`
--

INSERT INTO `pakai` (`id`, `id_user`, `id_kategori`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `catatan`, `status_pakai`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'testing', '2024-10-01', '2025-01-01', 'testing ....', 0, 'testing-', '2024-12-31 01:33:42', '2024-12-31 01:33:42', '2024-12-31 09:33:42'),
(2, 1, 2, 'testing testing', '2025-01-02', '2025-01-31', 'tes dulu ga sih', 1, 'testing-testing-6775ff9eba1e6-KRdsAaN8MTkZ1lCbhP', '2025-01-02 01:53:18', '2025-01-02 05:07:04', '0000-00-00 00:00:00'),
(3, 1, 4, 'Testing 1', '2024-12-01', '0000-00-00', 'Testing testing', 0, 'testing-1-677642d5d45f8-8Ri0JeG1uwxsoZakEl', '2025-01-02 06:40:05', '2025-01-02 06:40:05', '0000-00-00 00:00:00'),
(4, 1, 4, 'Bensin', '2025-01-02', '0000-00-00', 'Catat kapan bensin 20k ini habis', 0, 'bensin-6777752701505-hUw2PbuRoVN8Alyg01', '2025-01-03 04:27:03', '2025-01-03 04:27:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `savings_goals`
--

CREATE TABLE `savings_goals` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `goal_name` varchar(100) NOT NULL,
  `target_amount` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `frequency` enum('harian','mingguan','bulanan','') NOT NULL,
  `total_saved` int(11) DEFAULT 0,
  `jml_cicilan` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `savings_goals`
--

INSERT INTO `savings_goals` (`id`, `id_user`, `goal_name`, `target_amount`, `start_date`, `end_date`, `frequency`, `total_saved`, `jml_cicilan`, `icon`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'beli tanah', 50000000, '2024-11-20', '2027-08-07', 'bulanan', 2000000, 2000000, 'fa-users', 'beli-tanah-673dff8ae179b-OZ8Cjuw3JUSILn2sEb', '2024-11-07 12:50:01', '2024-11-20 07:26:02', '0000-00-00 00:00:00'),
(3, 0, 'PC baru', 10000000, '2024-11-20', '0000-00-00', 'bulanan', 2000000, 1000000, 'fa-computer', 'pc-baru-673dfabe61996-gXkc6Is_pO-QvVbud5', '2024-11-18 17:06:45', '2024-11-22 01:58:11', '0000-00-00 00:00:00'),
(4, 0, 'tes 2', 20000000, '2024-11-20', '0000-00-00', 'bulanan', 600000, 150000, 'fa-home', 'tes-2-673dff61e0af9-cIe6vL5J2kTKnszEud', '2024-11-18 18:49:58', '2024-11-22 20:07:41', '0000-00-00 00:00:00'),
(5, 2, 'testing', 2000000, '2024-12-29', '0000-00-00', 'bulanan', 0, 50000, 'fa-star', 'testing-67714c08ccee9-8uPtDjRrWTgIyYm57x', '2024-12-29 12:18:00', '2024-12-29 12:18:00', '0000-00-00 00:00:00'),
(6, 2, 'Dana Darurat', 50000000, '2024-12-29', '0000-00-00', 'bulanan', 0, 100000, 'fa-triangle-exclamation', 'dana-darurat-67714c3c35f76-rXYIPnNmUCcBOSw2Rg', '2024-12-29 12:18:52', '2024-12-29 12:18:52', '0000-00-00 00:00:00'),
(7, 3, 'testing', 5000000, '2024-12-29', '0000-00-00', 'bulanan', 0, 100000, 'fa-xmark', 'testing-67714d096c408-g-azD5SHjBuvqOoKPm', '2024-12-29 12:22:17', '2024-12-29 12:22:17', '0000-00-00 00:00:00'),
(8, 1, 'Dana Darurat', 50000000, '2025-01-01', '0000-00-00', 'bulanan', 100000, 100000, 'fa-triangle-exclamation', 'dana-darurat-67750271bc601-S3i58vGgLczHTYXEsq', '2025-01-01 07:53:05', '2025-01-01 07:53:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `status_user` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `slug`, `reset_token`, `status_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tes', 'tes@gmail.com', '$2y$10$muUNml7u5peOmGHWprJVfeQaeDYFBOttNYTYz5qfYEQCQ78maVEUu', '', '', 1, '2025-01-02 07:43:40', '2025-01-02 07:43:40', '0000-00-00 00:00:00'),
(2, 'test1', '', '$2y$10$iOEGwIYoQRnWetpwP6FYL.io3s27Irf30u1aHdmLneWQSlYMKsAUu', 'test1-67595c4a3c373-gDtaIT3bEy2ZFhX_kO', '', 0, '2024-12-11 01:32:58', '2024-12-11 23:18:08', '0000-00-00 00:00:00'),
(3, 'ifan testing', '', '$2y$10$L99d7xiNpfeRjjI6VJdvvuC9TxAF0zHyhzI1UKrp3ykW3LGAThorq', 'ifan-testing-675d98efe8dd2-7_lYi0zjsLIapARU2m', '', 0, '2024-12-14 06:40:48', '2024-12-27 05:03:52', '0000-00-00 00:00:00'),
(4, 'coba21', 'coba21@gmail.com', '$2y$10$iOFk1RqtU2/yrmM4lbzEyucxoTg07B/wA6CMSP6nuaPBsv8C0YJI2', 'coba21-67779255c80e7-s37c-SRW_FLOf6VtD8', '', 0, '2025-01-03 06:31:33', '2025-01-03 06:31:33', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cicilan_savings`
--
ALTER TABLE `cicilan_savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventori`
--
ALTER TABLE `inventori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_expenses`
--
ALTER TABLE `kategori_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_income`
--
ALTER TABLE `kategori_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pakai`
--
ALTER TABLE `pakai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings_goals`
--
ALTER TABLE `savings_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cicilan_savings`
--
ALTER TABLE `cicilan_savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inventori`
--
ALTER TABLE `inventori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_expenses`
--
ALTER TABLE `kategori_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori_income`
--
ALTER TABLE `kategori_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pakai`
--
ALTER TABLE `pakai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `savings_goals`
--
ALTER TABLE `savings_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
