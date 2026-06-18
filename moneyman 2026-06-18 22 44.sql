-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Jun 2026 pada 14.43
-- Versi server: 11.5.2-MariaDB-log
-- Versi PHP: 8.2.23

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
-- Struktur dari tabel `cicilan_savings`
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
-- Dumping data untuk tabel `cicilan_savings`
--

INSERT INTO `cicilan_savings` (`id`, `id_savings`, `id_user`, `tanggal`, `catatan`, `jml_cicilan`, `status_cicilan`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 0, '2024-11-22', '1', 1000000, 1, '2024-11-22-674037420e9b3-795_ADxrPMbQzURNWB', '2024-11-22 07:48:18', '2024-11-22 07:48:18', '0000-00-00 00:00:00'),
(2, 3, 0, '2024-11-22', 'Testing', 1000000, 1, '2024-11-22-674055b3b25d2-RWcVMojBXyzAbZFr8p', '2024-11-22 09:58:11', '2024-11-22 09:58:11', '0000-00-00 00:00:00'),
(3, 4, 0, '2024-11-22', 'testing...', 150000, 1, '2024-11-22-674069cd5c9f5-4JZBjq1GXvS3-2wCeD', '2024-11-22 11:23:57', '2024-11-22 11:23:57', '0000-00-00 00:00:00'),
(4, 4, 0, '2024-11-23', 'testing 1', 150000, 1, '2024-11-23-6741523f2dd59-0RXVSLUynw1tWf4HC_', '2024-11-23 03:55:43', '2024-11-23 03:55:43', '0000-00-00 00:00:00'),
(5, 4, 0, '2024-11-23', 'testing 2', 150000, 1, '2024-11-23-6741550da5f92-2jxJ4G9zPSoMqXAgbR', '2024-11-23 04:07:41', '2024-11-23 04:07:41', '0000-00-00 00:00:00'),
(6, 8, 1, '2025-01-01', 'testing 1', 100000, 1, '2025-01-01-6775029116405-T4YHy1JS0OAikbgRpw', '2025-01-01 15:53:37', '2025-01-01 15:53:37', '0000-00-00 00:00:00'),
(7, 9, 4, '2025-01-17', 'Testing 1', 100000, 1, '2025-01-17-6789ecd60ef77-uOspg6er-SCtDjB5lc', '2025-01-17 12:38:30', '2025-01-17 12:38:30', '0000-00-00 00:00:00'),
(8, 8, 1, '2025-02-03', 'bulan januari', 350000, 1, '2025-02-03-67a0aba7d8a93-0MrUkDnBeZV37sQHwa', '2025-02-03 18:42:31', '2025-02-03 18:42:31', '0000-00-00 00:00:00'),
(9, 10, 1, '2025-03-16', 'Tgl 15-03-2025', 250000, 1, '2025-03-16-67d6877fb5acb-VlUgR-hki2toTOSNsH', '2025-03-16 15:10:39', '2025-03-16 15:10:39', '0000-00-00 00:00:00'),
(10, 8, 1, '2025-05-12', 'Tanggal 11-05-2025', 200000, 1, '2025-05-12-6821672b1e866-6Jqhl5xZGXkwpSOFNt', '2025-05-12 10:12:43', '2025-05-12 10:12:43', '0000-00-00 00:00:00'),
(11, 10, 1, '2025-05-19', 'Ke-2', 250000, 1, '2025-05-19-682b482387f96-COL679f-UtYnWJqQzv', '2025-05-19 22:02:59', '2025-05-19 22:02:59', '0000-00-00 00:00:00'),
(12, 10, 1, '2025-06-10', 'Ke 3 di bulan juni', 250000, 1, '2025-07-05-6868a7ebe1539-rq_M4IeH2hKnsWuSxU', '2025-07-05 11:19:55', '2025-07-05 11:19:55', '0000-00-00 00:00:00'),
(13, 8, 1, '2025-07-05', 'Mei - juni', 800000, 1, '2025-07-05-68691ac0aa1a0-k0ZW8ncBomzT-Ub_VS', '2025-07-05 19:29:52', '2025-07-05 19:29:52', '0000-00-00 00:00:00'),
(14, 10, 1, '2025-07-15', 'Juli', 250000, 1, '2025-07-15-687661999924d-uj7WylgkVC-xrpvTAi', '2025-07-15 21:11:37', '2025-07-15 21:11:37', '0000-00-00 00:00:00'),
(15, 8, 1, '2025-08-03', 'Alhamdulillah, agustus', 800000, 1, '2025-08-03-688f6f4d419fa-HEOjh1vs-BFIqnCmGW', '2025-08-03 21:16:45', '2025-08-03 21:16:45', '0000-00-00 00:00:00'),
(16, 10, 1, '2025-09-02', 'Agustus - antara sudah atau belum', 250000, 1, '2025-09-02-68b6e529b81e5-PFC9dmLqa0AzK-fONu', '2025-09-02 19:38:01', '2025-09-02 19:38:01', '0000-00-00 00:00:00'),
(17, 10, 1, '2025-09-06', 'Bulan september, ke-6', 250000, 1, '2025-09-06-68bc570c83ac2-ZaiL_-4z2EV5umfcYv', '2025-09-06 22:45:16', '2025-09-06 22:45:16', '0000-00-00 00:00:00'),
(18, 10, 1, '2025-10-15', 'Tinggal 1 kali lagi', 250000, 1, '2025-10-15-68eee6b08b464-FUPYG8R6konAKa1dl-', '2025-10-15 07:11:28', '2025-10-15 07:11:28', '0000-00-00 00:00:00'),
(19, 10, 1, '2025-11-23', 'Lunas', 250000, 1, '2025-11-23-692315edd6884-3tP9Qgyow7-Juxe6UF', '2025-11-23 21:10:53', '2025-11-23 21:10:53', '0000-00-00 00:00:00'),
(20, 12, 1, '2026-02-18', 'Done', 1000000, 1, '2026-02-18-699541fd9f711-zaYQZ9wJvSPElF5e7V', '2026-02-18 11:37:17', '2026-02-18 11:37:17', '0000-00-00 00:00:00'),
(21, 16, 1, '2026-03-08', 'Langsung di done kan', 1450000, 1, '2026-03-08-69ad93c09c224-1KXtTg2sl9cUYCMZrJ', '2026-03-08 22:20:32', '2026-03-08 22:20:32', '0000-00-00 00:00:00'),
(22, 15, 1, '2026-03-15', '13 Maret 2026 - iuran 1', 500000, 1, '2026-03-15-69b6e105e7eee-eABK1lIwLQn4C0pYFx', '2026-03-15 23:40:37', '2026-03-15 23:40:37', '0000-00-00 00:00:00'),
(23, 15, 1, '2026-04-28', 'cicil ke 2', 500000, 1, '2026-04-28-69f0d50706445-eqMLGwyWnJi9pz-6rf', '2026-04-28 22:40:55', '2026-04-28 22:40:55', '0000-00-00 00:00:00'),
(24, 15, 1, '2026-05-16', '10 Mei 2026', 500000, 1, '2026-05-16-6a08928825d81-HYO07a6o_buiVFtxc-', '2026-05-16 22:51:36', '2026-05-16 22:51:36', '0000-00-00 00:00:00'),
(25, 17, 1, '2026-05-16', 'streak 1', 200000, 1, '2026-05-16-6a089463646d5-vQ9Tn1Xkm5wWHlKzgO', '2026-05-16 22:59:31', '2026-05-16 22:59:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_dompet` varchar(100) NOT NULL,
  `saldo` int(11) NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`id`, `id_user`, `nama_dompet`, `saldo`, `saldo_awal`, `catatan`, `status`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Testing', 10, 10, '', 0, 'testing-67d7c5fcaa3ca-7-tNO_hbEeITYX49pM', '2025-03-17 13:49:32', '2025-03-17 13:49:32', '0000-00-00 00:00:00'),
(2, 4, 'Testing 1', 16000, 20000, '', 0, 'testing-1-67d7ccb8eb44e-biylFKdu9Y_VXAs5vP', '2025-03-17 14:18:16', '2025-03-27 07:06:54', '0000-00-00 00:00:00'),
(3, 4, 'testing 3', 9823000, 10000000, '', 0, 'testing-3-67d8e6c1d90c4-3LE4-1kDlRtanh9oTK', '2025-03-18 10:21:37', '2025-05-10 21:07:31', '0000-00-00 00:00:00'),
(4, 3, 'Testing', 1000000, 1000000, '', 0, 'testing-67eb8a0da3f99-e90DgIoqxWK7Uha-m8', '2025-04-01 13:39:09', '2025-04-01 13:39:09', '0000-00-00 00:00:00'),
(5, 1, 'BRI', 1952605, 3414348, '', 0, 'bri-6819a16fbddc5-FlOBu3G-HgkpbYDEhL', '2025-05-06 12:43:11', '2026-05-16 23:07:23', '0000-00-00 00:00:00'),
(6, 1, 'CIMB', 44841875, 13236211, '', 0, 'cimb-6819a21ae4a07-KzdvywCYMNEShBIlZA', '2025-05-06 12:46:02', '2026-05-16 21:47:10', '0000-00-00 00:00:00'),
(7, 4, 'Testing 4', 2975000, 3000000, '', 0, 'testing-4-6819a2e7f02d0-cx3bFNJ-Xy8qTEB46f', '2025-05-06 12:49:27', '2025-05-06 12:58:00', '0000-00-00 00:00:00'),
(8, 5, 'BRI', 2500000, 2500000, '', 0, 'bri-685fa38d2aa70-qnO_5pJbQPKSgCRuYx', '2025-06-28 15:10:53', '2025-06-28 15:10:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dompet` int(11) NOT NULL,
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
-- Dumping data untuk tabel `expenses`
--

INSERT INTO `expenses` (`id`, `id_user`, `id_dompet`, `id_kategori_expenses`, `name_expenses`, `amount`, `description`, `date_expenses`, `status`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 0, 5, 'Wi-Fi', 250000, 'Lebih hemat lagi', '2024-11-25', 0, 'wi-fi-6744275b4bfa4-ABSxFtGkCU4uQfTdgV', '2024-11-25 13:29:35', '2024-11-25 13:29:35', '0000-00-00 00:00:00'),
(2, 0, 0, 1, 'Nasi goreng', 15000, 'lebih hemat lagi', '2024-11-21', 0, 'nasi-goreng-674481d92f669-oXTD8rEn4jsRexUVN3', '2024-11-25 05:55:37', '2024-11-25 05:55:37', '0000-00-00 00:00:00'),
(3, 0, 0, 1, 'testing 1', 10000, 'testing..... 1', '2024-11-25', 0, 'testing-1-674538254e1d3-NgjFL8AQ-hpJwelfZX', '2024-11-25 18:53:25', '2024-11-25 18:53:25', '0000-00-00 00:00:00'),
(4, 0, 0, 4, 'bensin', 20000, 'jaga kondisi kendaraan', '2024-11-28', 0, 'bensin-6748387eb7e1f-gLdy1mW3wFT9h6RVq8', '2024-11-28 01:31:42', '2024-11-28 01:31:42', '0000-00-00 00:00:00'),
(5, 0, 0, 4, 'Service motor', 330000, 'ganti spare part', '2024-12-01', 0, 'service-motor-674c05ee7e676-NDtiwGPTB5-n3xua9g', '2024-11-30 22:45:02', '2024-11-30 22:45:02', '0000-00-00 00:00:00'),
(6, 0, 0, 4, 'tambal ban', 20000, 'ban luar tipis, harus mulai di ganti', '2024-12-05', 0, 'tambal-ban-67524d5514d68-puq-9fQkrMWm6S4PHU', '2024-12-05 17:03:17', '2024-12-05 17:03:17', '0000-00-00 00:00:00'),
(7, 0, 0, 1, 'geprek (3)', 25000, 'untuk berbuka puasa', '2024-12-05', 0, 'geprek-3-67524d8b8c9c6-a-N5fJU41ISutywAcX', '2024-12-05 17:04:11', '2024-12-05 17:04:11', '0000-00-00 00:00:00'),
(8, 0, 0, 4, 'kena tilang', 100000, 'sim mati kena denda', '2024-12-07', 0, 'kena-tilang-67546e80cfe29-xLBnOPwEhQYdcuSp6a', '2024-12-07 07:49:20', '2024-12-07 07:49:20', '0000-00-00 00:00:00'),
(10, 1, 0, 6, 'testing', 30303, 'te', '2024-12-12', 0, 'testing-67597b7c93fd5-Bui5TG9oHkJFfRbpj4', '2024-12-11 03:46:04', '2025-01-04 09:36:29', '2025-01-04 17:36:29'),
(11, 1, 0, 5, 'testing 1', 50000, 'testing 1 ....', '2024-12-19', 0, 'testing-1-6764dc339e788-ZfdmzK6NDCTBOau_R9', '2024-12-19 18:53:39', '2024-12-19 18:53:39', '0000-00-00 00:00:00'),
(12, 1, 0, 4, 'Testing 2', 20000, 'Testing testing', '2024-12-20', 0, 'testing-2-67650337a9102-uLFBYa43ZNR9WGj67I', '2024-12-19 21:40:07', '2024-12-19 21:40:07', '0000-00-00 00:00:00'),
(13, 1, 0, 1, 'testing 3', 100000, 'testing 3 .....', '2024-12-21', 0, 'testing-3-67678f0d0c56e-mEirwdg9vjYpG5oBX0', '2024-12-21 20:01:17', '2024-12-21 20:01:17', '0000-00-00 00:00:00'),
(14, 1, 0, 1, 'testing 4', 52000, 'testing lalapan', '2024-12-23', 0, 'testing-4-6769efe23e33b-PTkdcuWvpmU1ZzF96a', '2024-12-23 15:18:58', '2024-12-23 15:18:58', '0000-00-00 00:00:00'),
(15, 1, 0, 1, 'testing 5', 65000, 'testing bakso + bensin', '2024-12-24', 0, 'testing-5-676ba5815a09f-Svu4GDXRMUEecgbPf1', '2024-12-25 05:26:09', '2024-12-25 05:26:09', '0000-00-00 00:00:00'),
(16, 1, 0, 5, 'Wi-Fi', 250000, 'testing wi-fi', '2024-12-25', 0, 'wi-fi-676bff7434104-6vyj4MluO3WHi-wten', '2024-12-25 11:49:56', '2024-12-25 11:49:56', '0000-00-00 00:00:00'),
(17, 1, 0, 1, 'testing 6', 17500, 'testing yakult+mie 2', '2024-12-25', 0, 'testing-6-676bffbc5b600-1n3j20NBAtcwCehdJu', '2024-12-25 11:51:08', '2024-12-25 11:51:08', '0000-00-00 00:00:00'),
(18, 2, 0, 1, 'jajan', 15000, 'mie 2 + susu ultra milk', '2024-12-29', 0, 'jajan-6771500576e06-NKpPD-UxG2B_AvcW4r', '2025-01-05 07:56:17', '2025-01-05 07:05:05', '2025-01-05 15:05:05'),
(19, 1, 0, 1, 'jajan', 15000, 'testing mie + ultramilk', '2024-12-28', 0, 'jajan-6772d0ad5603d-1BYENKGZ0uke97hxJ6', '2024-12-30 15:56:13', '2024-12-30 15:56:13', '0000-00-00 00:00:00'),
(20, 1, 0, 1, 'testing 7', 26000, 'testing selada + saos', '2024-12-31', 0, 'testing-7-6775021396fc0-zFe1oL8r0PjTbuO3EA', '2025-01-01 07:51:31', '2025-01-01 07:51:31', '0000-00-00 00:00:00'),
(21, 3, 0, 4, 'tes', 100000, 'testing', '2025-01-01', 0, 'tes-677523a876dbd-6DacGZFrxme2SnqXNp', '2025-01-01 10:14:48', '2025-01-01 10:14:48', '0000-00-00 00:00:00'),
(22, 3, 0, 1, 'tes', 23000, 'testing testing', '2024-12-17', 0, 'tes-67752418509bc-3AZNHJlXTvm_D0bKx5', '2025-01-01 10:16:40', '2025-01-04 14:04:39', '2025-01-04 22:04:39'),
(23, 1, 0, 6, 'shopee', 98209, 'kabel data, otg + sol sepatu + topi', '2025-01-01', 0, 'shopee-67755b6f28c4d--TwY9rWRmziFIUfvbZ', '2025-01-01 14:12:47', '2025-01-01 14:12:47', '0000-00-00 00:00:00'),
(24, 1, 0, 4, 'bensin', 20000, 'hemat', '2025-01-02', 0, 'bensin-6776af75a4e06-my5joB4SeV_LzQc0dx', '2025-01-02 14:23:33', '2025-01-02 14:23:33', '0000-00-00 00:00:00'),
(25, 1, 0, 7, 'Tes', 30000, 'Testing kumpul', '2025-01-03', 0, 'tes-6777b276d8a4d-lGc0qpna5Q4EADVN7y', '2025-01-05 10:49:11', '2025-01-05 10:49:11', '0000-00-00 00:00:00'),
(26, 1, 0, 1, 'geprek', 16000, 'geprek sambal ijo', '2025-01-03', 0, 'geprek-67789ebb02089-XW-yHqfwAmEpzxKgoI', '2025-01-04 01:36:43', '2025-01-04 01:36:43', '0000-00-00 00:00:00'),
(27, 4, 0, 5, 'Testing', 25000, 'Kuota', '2025-01-06', 0, 'testing-677b985430e55-6Z9xGcUOrskL0zhlC-', '2025-01-06 07:46:12', '2025-01-06 07:46:12', '0000-00-00 00:00:00'),
(28, 4, 3, 6, 'Testing', 60000, 'Ape nu', '2025-01-01', 0, 'testing-677b99312aedb-yPx_F8r9NBJtlbgG0S', '2025-03-20 06:24:04', '2025-03-20 06:24:04', '0000-00-00 00:00:00'),
(29, 4, 0, 5, 'Pls', 41500, 'Kuota', '2025-01-05', 0, 'pls-677b99525bd3f-dI-ixOaNZl5XsyJbhC', '2025-01-06 07:50:26', '2025-01-06 07:50:26', '0000-00-00 00:00:00'),
(30, 1, 0, 5, 'Pulsa', 41500, 'Cimb: kuota', '2025-01-06', 0, 'pulsa-677be089475a5-AMLtJQ9_acKNUk6Cvj', '2025-01-06 12:54:17', '2025-01-06 12:54:17', '0000-00-00 00:00:00'),
(31, 1, 0, 1, 'air', 15000, 'alfamart air + susu', '2025-01-07', 0, 'air-677ccf1b8b9dc-qdRjicx65O3NhUHk0B', '2025-01-07 05:52:11', '2025-01-07 05:52:11', '0000-00-00 00:00:00'),
(32, 1, 0, 6, 'Mie 2 + kopi mix + geprek', 33500, 'Alfamart', '2025-01-08', 0, 'mie-2-kopi-mix-geprek-677f9d828f362-Twqt3sdeF6Y9HQOV_z', '2025-01-09 08:57:22', '2025-01-09 08:57:22', '0000-00-00 00:00:00'),
(33, 1, 0, 8, 'rehat', 30000, 'testing lintas alam pakuan', '2025-01-10', 0, 'rehat-67825935609f1-9RVa2CHsdPqL4QhFUO', '2025-01-11 10:42:45', '2025-01-11 10:42:45', '0000-00-00 00:00:00'),
(34, 4, 0, 4, 'service motor', 250000, 'testing testing kendaraan', '2025-01-12', 0, 'service-motor-67832ddc443b5-zbxQkeX9f6vBE_IGRa', '2025-01-12 01:50:04', '2025-01-12 01:50:04', '0000-00-00 00:00:00'),
(35, 1, 0, 4, 'bensin', 20000, 'testing bensin pertamina sayang-sayang', '2025-01-12', 0, 'bensin-6783465fd4495-eDbUcLBm4vtxIhFTi-', '2025-01-12 03:34:39', '2025-01-12 03:34:39', '0000-00-00 00:00:00'),
(36, 1, 0, 9, 'cukur rambut', 55000, 'mullet jay jo (pennylane barbershop)', '2025-01-12', 0, 'cukur-rambut-6783af1749ea8-pX32sOWr7KbZiqa-ol', '2025-01-12 11:01:27', '2025-01-12 11:01:27', '0000-00-00 00:00:00'),
(37, 1, 0, 1, 'cilok', 10000, 'cilok pong', '2025-01-12', 0, 'cilok-6783e28cd742d-OatF9P0gM8H4GTLDnE', '2025-01-12 14:41:00', '2025-01-12 14:41:00', '0000-00-00 00:00:00'),
(38, 1, 0, 2, 'pulsa listrik', 53500, 'kWh 150.3 (promo dari pemerintah)', '2025-01-15', 0, 'pulsa-listrik-6789242c8636b-jXK4Cl-QsTO9gH2thM', '2025-01-16 14:22:20', '2025-01-16 14:22:20', '0000-00-00 00:00:00'),
(39, 1, 0, 1, 'jajan', 5000, 'jajan 1rbuan', '2025-01-16', 0, 'jajan-6789245901034-hH5GFbx7npVyNATJQC', '2025-01-16 14:23:05', '2025-01-16 14:23:05', '0000-00-00 00:00:00'),
(40, 1, 0, 4, 'ganti oli motor', 50000, 'oli mesin yang di ganti', '2025-01-16', 0, 'ganti-oli-motor-6789255ca3b67-lLx6Bo72rv4zufq5mZ', '2025-01-16 14:27:24', '2025-01-16 14:27:24', '0000-00-00 00:00:00'),
(41, 1, 0, 4, 'Service motor', 150000, 'Ganti v-belt (pagesangan)', '2025-01-20', 0, 'service-motor-678f0b4686c49-CeYXvDrIx7RAW9ulJh', '2025-01-21 01:49:42', '2025-01-21 01:49:42', '0000-00-00 00:00:00'),
(42, 1, 0, 8, 'Lintas alam', 30000, 'Pelunasan lintas alam pakuan', '2025-01-18', 0, 'lintas-alam-678f0ddeb63ab-GSC2qnKpJcNBUwYVzF', '2025-01-21 02:00:46', '2025-01-21 02:00:46', '0000-00-00 00:00:00'),
(43, 1, 0, 8, 'Dukep empak', 10000, 'Dukep empak lintas alam pakuan', '2025-01-18', 0, 'dukep-empak-678f0e0b4f926-Gjm_WYLHg854e3M-xU', '2025-01-21 02:01:31', '2025-01-21 02:01:31', '0000-00-00 00:00:00'),
(44, 1, 0, 8, 'Matras', 15000, 'Sewa matras 3 lintas alam pakuan', '2025-01-18', 0, 'matras-678f0ecb7f403-DdPF1IG2lKi_nUo6ev', '2025-01-21 02:04:43', '2025-01-21 02:04:43', '0000-00-00 00:00:00'),
(45, 1, 0, 1, 'Frisian flag', 36000, 'Persiapan camp pakuan', '2025-01-18', 0, 'frisian-flag-678f308813206-3LFTqtAIBxZmzMn_pb', '2025-01-21 04:28:40', '2025-01-21 04:28:40', '0000-00-00 00:00:00'),
(46, 1, 0, 1, 'Cilok', 20000, 'Jajan di camp pakuan', '2025-01-18', 0, 'cilok-678f30ce841ac-EblmBSWy6U1opZ_3tQ', '2025-01-21 04:29:50', '2025-01-21 04:29:50', '0000-00-00 00:00:00'),
(47, 1, 0, 1, 'Es kelapa', 10000, 'Jajan lintas alam pakuan', '2025-01-19', 0, 'es-kelapa-678f30fdbc249-L4_t1uwzGHEilxa8JR', '2025-01-21 04:30:37', '2025-01-21 04:30:37', '0000-00-00 00:00:00'),
(48, 1, 0, 1, 'Salad', 40000, 'Jajan lintas alam pakuan', '2025-01-19', 0, 'salad-678f3118838bb-TIlS9ZQ-1Lh56rpxaq', '2025-01-21 04:31:04', '2025-01-21 04:31:04', '0000-00-00 00:00:00'),
(49, 1, 0, 4, 'Bensin', 20000, 'Pertamina pagesangan', '2025-01-20', 0, 'bensin-678f31757ae6c-6bF4diP7HTzZJXYNGc', '2025-01-21 04:32:37', '2025-01-21 04:32:37', '0000-00-00 00:00:00'),
(50, 1, 0, 5, 'Pulsa', 41500, 'Pulsa for kuota (21gb)', '2025-01-19', 0, 'pulsa-678f32108ee1f-kQBWT90c-FEpPgDmdK', '2025-01-21 04:35:12', '2025-01-21 04:35:12', '0000-00-00 00:00:00'),
(51, 1, 0, 5, 'Bayar wifi', 218150, 'Ganti paket wifi dari 30mb ke 20mb', '2025-01-26', 0, 'bayar-wifi-67970db2adf41-C43lSMNy9TVd61xDEg', '2025-01-27 03:38:11', '2025-01-27 03:38:11', '0000-00-00 00:00:00'),
(52, 1, 0, 1, 'Jajan', 37500, 'Alfamar + parkir + bakso 2 (10k)', '2025-01-25', 0, 'jajan-6797105a5c3ac-J_6GykRPNLZwYCt1XK', '2025-01-27 03:49:30', '2025-01-27 03:49:30', '0000-00-00 00:00:00'),
(53, 1, 0, 4, 'bensin', 20000, 'pertamina sayang-sayang', '2025-02-01', 0, 'bensin-679e38b5c750f-Xv3hl_FkPYpyeRK8UZ', '2025-02-01 14:07:33', '2025-02-01 14:07:33', '0000-00-00 00:00:00'),
(54, 1, 0, 6, 'alat outdoor', 191650, 'kursi lipat + meja lipat (outdoor camping) shopee', '2025-02-02', 0, 'alat-outdoor-679ff44450a35-weKD3X_2MacbyUl1YQ', '2025-02-02 21:40:04', '2025-02-02 21:40:04', '0000-00-00 00:00:00'),
(55, 1, 0, 6, 'Alat outdoor', 94550, 'Shopee - kursi outdoor, hatomugi', '2025-02-04', 0, 'alat-outdoor-67a1a7774a2e6-lfk4PO2q03JNA5wEiW', '2025-02-04 04:36:55', '2025-02-04 04:36:55', '0000-00-00 00:00:00'),
(56, 1, 0, 1, 'SKM + ultramilk coklat', 20500, 'Beli di alfamart deket rumah', '2025-02-07', 0, 'skm-ultramilk-coklat-67a56f14229fa-MCVd_9SYyWGilkxXQU', '2025-02-07 01:25:24', '2025-02-07 01:25:24', '0000-00-00 00:00:00'),
(57, 1, 0, 1, 'nasi goreng', 30000, 'nasi goreng sayang-sayang', '2025-02-08', 0, 'nasi-goreng-67a84240b5eb2-jSH42qKZz0kI75ELh1', '2025-02-09 04:50:56', '2025-02-09 04:50:56', '0000-00-00 00:00:00'),
(58, 1, 0, 1, 'geprek + yakult + floridina', 33000, 'belanja di alfa + geprek di lauk', '2025-02-10', 0, 'geprek-yakult-floridina-67aa09b4b5e01-GksMqJrVHZepcEvmQF', '2025-02-10 13:14:12', '2025-02-10 13:14:12', '0000-00-00 00:00:00'),
(59, 1, 0, 1, 'bahan grill', 105500, 'sosis + saus + selada + enoki', '2025-02-09', 0, 'bahan-grill-67aa0a50cf8bb-C8X51osKeVj4zx6nMm', '2025-02-10 13:16:48', '2025-02-10 13:16:48', '0000-00-00 00:00:00'),
(60, 1, 0, 1, 'cilok', 10000, 'beli cilok untuk berbuka', '2025-02-13', 0, 'cilok-67affa28a0c70-zqxADURQwy3mi4u-I2', '2025-02-15 01:21:28', '2025-02-15 01:21:28', '0000-00-00 00:00:00'),
(61, 1, 0, 7, 'ortu', 200000, 'kasih ortu', '2025-02-14', 0, 'ortu-67b0744a55e70-Nx4F7usXVBrU2zimYK', '2025-02-15 10:02:34', '2025-02-15 10:02:34', '0000-00-00 00:00:00'),
(62, 1, 0, 7, 'ngumpulan', 10000, 'testing testing', '2025-02-12', 0, 'ngumpulan-67b074ccae873-kHvLn7a1tGw-9Dz2ei', '2025-02-15 10:04:44', '2025-02-15 10:04:44', '0000-00-00 00:00:00'),
(63, 1, 0, 1, 'isi perut', 39000, 'geprek 2 + yakult + ultramilk + air', '2025-02-17', 0, 'isi-perut-67b35e7db9999-8ITpoHLwDd9qtUfNmg', '2025-02-17 15:06:21', '2025-02-17 15:06:21', '0000-00-00 00:00:00'),
(64, 1, 0, 5, 'Kuota', 41000, 'Sekedik beli kuota', '2025-02-19', 0, 'kuota-67b84acc98a5a-XMkxKuRjqfJ-1AEwsr', '2025-02-21 08:43:40', '2025-02-21 08:43:40', '0000-00-00 00:00:00'),
(65, 1, 0, 4, 'Bensin + isi angin', 30000, 'Bensin 20k + isi angin 10k (nitrogen)', '2025-02-20', 0, 'bensin-isi-angin-67b84bdc110ff-LvlDCi2Q7AX0Mhxg8z', '2025-02-21 08:48:12', '2025-02-21 08:48:12', '0000-00-00 00:00:00'),
(66, 1, 0, 1, 'Mie + yakult + pocari', 42000, 'Belanja di alfamart', '2025-02-23', 0, 'mie-yakult-pocari-67bb2c98c5133-v2-Mf0Ba_UN3klXArx', '2025-02-23 13:11:36', '2025-02-23 13:11:36', '0000-00-00 00:00:00'),
(67, 1, 0, 6, 'Tisu + downy', 20000, 'Ruby', '2025-02-15', 0, 'tisu-downy-67bb2e0ae7de0-9NdZc1PorxSsMtD4TU', '2025-02-23 13:17:46', '2025-02-23 13:17:46', '0000-00-00 00:00:00'),
(68, 1, 0, 1, 'Geprek', 20000, 'Geprek 2', '2025-02-26', 0, 'geprek-67c1c96b040b9-Inw5xparh3lkWOHDPb', '2025-02-28 13:34:19', '2025-02-28 13:34:19', '0000-00-00 00:00:00'),
(69, 1, 0, 5, 'Wifi', 218150, 'Bayar wifi bulan februari', '2025-02-27', 0, 'wifi-67c1c9ada91fd-oGxgut9Zh7NqTRz2QW', '2025-02-28 13:35:25', '2025-02-28 13:35:25', '0000-00-00 00:00:00'),
(70, 1, 0, 1, 'Geprek + belanja alfamart', 64000, 'Geprek 2 + yakult, ultramilk, yogurt, cimory, pocari', '2025-02-28', 0, 'geprek-belanja-alfamart-67c1cadfc5180-GfVAnF5-4aNYBkHx_q', '2025-02-28 13:40:31', '2025-02-28 13:40:31', '0000-00-00 00:00:00'),
(71, 1, 0, 9, 'cukur', 60000, 'cukur longtrim (penny lane)', '2025-03-08', 0, 'cukur-67cd62e3b264c-Of_mX6iZK3RAEuyL1e', '2025-03-09 08:44:03', '2025-03-09 08:44:03', '0000-00-00 00:00:00'),
(72, 1, 0, 4, 'bensin', 20000, 'pertamina sayang-sayang', '2025-03-07', 0, 'bensin-67cd637d5d579-0LZg7SEnOdIHPoajDx', '2025-03-09 08:46:37', '2025-03-09 08:46:37', '0000-00-00 00:00:00'),
(73, 1, 0, 7, 'hadiah', 132500, 'for wisuda adam', '2025-03-08', 0, 'hadiah-67cd64d09ba69-GPicxnaWoOzuB1NJUS', '2025-03-09 08:52:17', '2025-03-09 08:52:17', '0000-00-00 00:00:00'),
(74, 1, 0, 1, 'bukber', 37000, 'lalapan di belencong', '2025-03-08', 0, 'bukber-67cd65a6d93eb-3S2fxWBz4OJLd78wUR', '2025-03-09 08:55:51', '2025-03-09 08:55:51', '0000-00-00 00:00:00'),
(75, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-03-17', 0, 'bensin-67d83eed3a864-P8hEq3t1YiaxXJSpjb', '2025-03-17 14:25:33', '2025-03-17 14:25:33', '0000-00-00 00:00:00'),
(76, 1, 0, 1, 'Fly chicken jumbo', 70000, 'Beli di dr geprek', '2025-03-17', 0, 'fly-chicken-jumbo-67d83f0c2214b-92v34tfWXbF0UGNusz', '2025-03-17 14:26:04', '2025-03-17 14:26:04', '0000-00-00 00:00:00'),
(77, 4, 0, 6, 'Ular', 1000000, 'I\'fans club', '2025-03-18', 0, 'ular-67d8c86bbc260-n9QXJIVia1jOk2AHcd', '2025-03-18 00:12:11', '2025-03-18 00:12:11', '0000-00-00 00:00:00'),
(78, 6, 0, 10, 'Belanja Tikus ', 120000, 'pakan ular tanggal 17 maret', '2025-03-17', 0, 'belanja-tikus-67d8c96875586-aUE8hmuseQ9XjkAMl2', '2025-03-18 00:16:24', '2025-03-18 00:16:24', '0000-00-00 00:00:00'),
(79, 6, 0, 10, 'Narik Duit ', 150000, '', '2025-03-17', 0, 'narik-duit-67d8c986e563c-C3EF4ST2jmeLJkVPvR', '2025-03-18 00:16:54', '2025-03-18 00:16:54', '0000-00-00 00:00:00'),
(80, 1, 0, 1, 'Alpukat', 24000, 'Beli 2kg', '2025-03-19', 0, 'alpukat-67db83e11f27c--LxeWbI35tPn_ESZaA', '2025-03-20 01:56:33', '2025-03-20 01:56:33', '0000-00-00 00:00:00'),
(81, 1, 0, 1, 'Alfamart', 36000, 'Skm + cimory + keju meg', '2025-03-19', 0, 'alfamart-67db84286bb68-aKzU7J3dlFiwjTH61v', '2025-03-20 01:57:44', '2025-03-20 01:57:44', '0000-00-00 00:00:00'),
(82, 4, 0, 4, 'Testing brody', 25000, 'Pertamax oplos', '2025-03-20', 0, 'testing-brody-67dbb8ef0b5aa-h8r2zXlbxAR_J7nMPH', '2025-03-20 05:42:55', '2025-03-20 05:42:55', '0000-00-00 00:00:00'),
(83, 4, 0, 10, 'tes', 12000, 'tes tes', '2025-03-22', 0, 'tes-67dec40c2f415-ied4VNmtMYL_vbugA2', '2025-03-22 13:07:08', '2025-03-22 13:07:08', '0000-00-00 00:00:00'),
(84, 1, 0, 10, 'jajan bolu', 20000, 'beli jajan di rumah', '2025-03-23', 0, 'jajan-bolu-67df8fa6a0d4a-JrQDKLgCxHfITya-s2', '2025-03-23 03:35:50', '2025-03-23 03:35:50', '0000-00-00 00:00:00'),
(85, 4, 0, 10, 'Tes tes', 50000, 'Horeeeeeee', '2025-03-25', 0, 'tes-tes-67e206613e6f4-5YwOH_iGzkcQsE1lBb', '2025-03-25 00:26:57', '2025-03-25 00:26:57', '0000-00-00 00:00:00'),
(86, 4, 0, 10, 'A', 1000, 'Aaaaaaaa', '2025-03-25', 0, 'a-67e206e4832b1-xP7CFStdLgi42qmXo6', '2025-03-25 00:29:08', '2025-03-25 00:29:08', '0000-00-00 00:00:00'),
(87, 1, 0, 1, 'Bakso', 20000, 'Beli utk berbuka puasa', '2025-03-24', 0, 'bakso-67e20b9087424--U98FrbtGavVdQT1wq', '2025-03-25 00:49:04', '2025-03-25 00:49:04', '0000-00-00 00:00:00'),
(88, 4, 0, 8, 'b', 1000, 'bbbbbbb', '2025-03-25', 0, 'b-67e20e16377ae-uWm8D2Oz_yjYbwBTJ1', '2025-03-25 00:59:50', '2025-03-25 00:59:50', '0000-00-00 00:00:00'),
(89, 4, 3, 10, 'C', 1000, 'Cccccccc', '2025-03-25', 0, 'c-67e21b8b3be0e-GFtuTmf4bHYPZhlQkK', '2025-03-25 01:57:15', '2025-03-25 01:57:15', '0000-00-00 00:00:00'),
(90, 4, 3, 10, 'D', 1000, 'Dddddd', '2025-03-25', 0, 'd-67e21db875b34-NY6Zn0MKmCOru9I4VL', '2025-03-25 02:06:32', '2025-03-25 02:06:32', '0000-00-00 00:00:00'),
(91, 4, 3, 10, 'F', 1000, 'Ffffff', '2025-03-25', 0, 'f-67e21f2c31084-MIEiAQ3Cr-FqvX4JZ9', '2025-03-25 02:12:44', '2025-03-25 02:12:44', '0000-00-00 00:00:00'),
(92, 4, 3, 10, 'G', 1000, 'Ggggggg', '2025-03-25', 0, 'g-67e22060c69cf-PYEuz94pLAnl8aicZT', '2025-03-25 02:17:52', '2025-03-25 02:17:52', '0000-00-00 00:00:00'),
(93, 1, 0, 1, 'Bukber', 106500, 'Bukber di rumah esky', '2025-03-25', 0, 'bukber-67e2a6fc4155d-Qa1MgqV_mu8HXREnc7', '2025-03-25 11:52:12', '2025-03-25 11:52:12', '0000-00-00 00:00:00'),
(94, 1, 0, 1, 'Bukber', 56500, 'Bukber (gede)', '2025-03-25', 0, 'bukber-67e2a8a74cbcd-p2o0hTzN-Uwj41XqGY', '2025-03-25 11:59:19', '2025-03-25 11:59:19', '0000-00-00 00:00:00'),
(95, 4, 2, 10, 'J', 1000, 'Jjjjjjj testing', '2025-03-26', 0, 'j-67e35e83e5ce0-4y91jDUYOQs2V7LqzE', '2025-03-26 00:55:15', '2025-03-26 00:55:15', '0000-00-00 00:00:00'),
(96, 4, 0, 10, 'K', 1000, 'Kkkkkkkkkk', '2025-03-26', 0, 'k-67e35eae37225--HzynSQf3LV_9KFJmw', '2025-03-26 00:55:58', '2025-03-26 00:55:58', '0000-00-00 00:00:00'),
(97, 4, 0, 10, 'L', 1000, 'Llllllll', '2025-03-26', 0, 'l-67e35fca39e66-dSopH14UZTsQlIYfew', '2025-03-26 01:00:42', '2025-03-26 01:00:42', '0000-00-00 00:00:00'),
(98, 4, 1, 2, 'M', 1000, 'Mmmmmm', '2025-03-26', 0, 'm-67e372e49102e-xY54uaQDPrGH0FsCl8', '2025-03-26 02:22:12', '2025-03-26 02:22:12', '0000-00-00 00:00:00'),
(99, 4, 1, 4, 'N', 1000, 'Nnnnnnnnn', '2025-03-26', 0, 'n-67e375126eb2d-BxNaSqO9Jkiy48pC3P', '2025-03-26 02:31:30', '2025-03-26 02:31:30', '0000-00-00 00:00:00'),
(100, 4, 2, 5, 'O', 1000, 'Ooooooo', '2025-03-26', 0, 'o-67e375d5b0640-oE2pWR9-CZIsmYtrjT', '2025-03-26 02:34:45', '2025-03-26 02:34:45', '0000-00-00 00:00:00'),
(101, 4, 1, 7, 'P', 1000, 'Ppppp', '2025-03-26', 0, 'p-67e39c3e7eb09-7EC96BgfxvTQFJ-eaU', '2025-03-26 05:18:38', '2025-03-26 05:18:38', '0000-00-00 00:00:00'),
(102, 4, 2, 2, 'Q', 1000, 'Qqqqqqqqq', '2025-03-27', 0, 'q-67e4969e4fa35-BhXUrktdIKOnM0ax1o', '2025-03-26 23:06:54', '2025-03-26 23:06:54', '0000-00-00 00:00:00'),
(103, 1, 0, 5, 'Wifi', 218150, 'Wifi bulan maret', '2025-03-29', 0, 'wifi-67e8bc0ae2d41-izLwnWTavemyMKkBqJ', '2025-03-30 02:35:38', '2025-03-30 02:35:38', '0000-00-00 00:00:00'),
(104, 1, 0, 6, 'Baju batik', 100000, 'Beli baju batik di top fashion', '2025-03-28', 0, 'baju-batik-67e8bd256bcd6-BjguDeZ3b2zASqKXyd', '2025-03-30 02:40:21', '2025-03-30 02:40:21', '0000-00-00 00:00:00'),
(105, 1, 0, 7, 'Ortu', 700000, 'Kasih ke ortu kurang 300k', '2025-03-26', 0, 'ortu-67e8bdee10fe9-tCdZc7iN5_pOVAkRrY', '2025-03-30 02:43:42', '2025-03-30 02:43:42', '0000-00-00 00:00:00'),
(106, 1, 0, 7, 'Hol', 15000, 'Ngasih hol', '2025-03-31', 0, 'hol-67ea28605f485-4EsrDnekw9pJq6d28-', '2025-03-31 04:30:08', '2025-03-31 04:30:08', '0000-00-00 00:00:00'),
(107, 1, 0, 7, 'Thr', 100000, 'Kasih ke bapuk + ponakan', '2025-03-31', 0, 'thr-67ea58e56cda9-GHWBuRCY9KcrNaijAo', '2025-03-31 07:57:09', '2025-03-31 07:57:09', '0000-00-00 00:00:00'),
(108, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-03-28', 0, 'bensin-67ea5cb436d39-L06OTrSdnFQ2j135Ui', '2025-03-31 08:13:24', '2025-03-31 08:13:24', '0000-00-00 00:00:00'),
(109, 1, 0, 1, 'ultramilk + mie', 34500, 'ultramilk + mie alfamart', '2025-04-02', 0, 'ultramilk-mie-67ed3eb2600da-zPYx9GoOSv2sNJ-Z1y', '2025-04-02 12:42:10', '2025-04-02 12:42:10', '0000-00-00 00:00:00'),
(110, 1, 0, 1, 'Frozen food', 87000, 'Sosis yona (1kg) + saus + enoki 2 (nindy frozen)', '2025-04-04', 0, 'frozen-food-67efc9aabd54e-0FoBVfivk-D_WuTmZJ', '2025-04-04 10:59:38', '2025-04-04 10:59:38', '0000-00-00 00:00:00'),
(111, 1, 0, 1, 'Bakso', 20000, 'Bakso maman ugeng', '2025-04-04', 0, 'bakso-67efc9c216774-rc1_lZjOnyfwktAsYm', '2025-04-04 11:00:02', '2025-04-04 11:00:02', '0000-00-00 00:00:00'),
(112, 1, 0, 4, 'ganti oli', 50000, 'bengkel di lauk', '2025-04-05', 0, 'ganti-oli-67f0dc9a1020e-HRoxJdCQ_tvc2If7B9', '2025-04-05 06:32:42', '2025-04-05 06:32:42', '0000-00-00 00:00:00'),
(113, 1, 0, 1, 'Nongki', 27000, 'Mie goreng telur + mendoan + es teh (meta cafe)', '2025-04-08', 0, 'nongki-67f618715c2bc-ihOsjwcTyfkd5Sr6IR', '2025-04-09 05:49:21', '2025-04-09 05:49:21', '0000-00-00 00:00:00'),
(114, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-04-09', 0, 'bensin-67f618a695ef1-9ezsR3T6dpltwUaKEY', '2025-04-09 05:50:14', '2025-04-09 05:50:14', '0000-00-00 00:00:00'),
(115, 1, 0, 1, 'Alfamart', 14000, 'Mineral 2 + ultramilk', '2025-04-09', 0, 'alfamart-67f619c83836f-xmUdc0C87hzMfBXIOl', '2025-04-09 05:55:04', '2025-04-09 05:55:04', '0000-00-00 00:00:00'),
(116, 1, 0, 1, 'Geprek', 16000, 'Geprek 2 (buka puasa)', '2025-04-10', 0, 'geprek-67f8c2a7bd9b2-iAX86xPRLwasl_F1z9', '2025-04-11 06:20:07', '2025-04-11 06:20:07', '0000-00-00 00:00:00'),
(117, 1, 0, 1, 'Bukber', 22000, 'Mie bakar + es teh + tempe mendoan', '2025-04-14', 0, 'bukber-67fdb41159b17-bTlt-VHCL5APfy8XkE', '2025-04-15 00:19:13', '2025-04-15 00:19:13', '0000-00-00 00:00:00'),
(118, 1, 0, 6, 'Ruby', 155000, 'Shampo + tonic + tisu + odol + sabun', '2025-04-15', 0, 'ruby-68004be0cb637-R28AzLOm4cJaqxKg7N', '2025-04-16 23:31:28', '2025-04-16 23:31:28', '0000-00-00 00:00:00'),
(119, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-04-16', 0, 'bensin-6801eee766498-QtN6p2mayGvZWkf1DI', '2025-04-18 05:19:19', '2025-04-18 05:19:19', '0000-00-00 00:00:00'),
(120, 1, 0, 1, 'Bakso + ultramilk', 42500, 'Alfamart + bakso di lauk', '2025-04-17', 0, 'bakso-ultramilk-6801ef2d8a6d3-AkMeSY68z9ch3voFNT', '2025-04-18 05:20:29', '2025-04-18 05:20:29', '0000-00-00 00:00:00'),
(121, 1, 0, 9, 'cukur', 60000, 'pendek (buzz cut x mullet)', '2025-04-19', 0, 'cukur-68050082cdefd--LbE8YexkgaBwyOP60', '2025-04-20 13:11:14', '2025-04-20 13:11:14', '0000-00-00 00:00:00'),
(122, 1, 0, 8, 'biaya masuk', 40000, 'camping (pantai kecinan)', '2025-04-19', 0, 'biaya-masuk-68050119531f0-Apt5ETOPvQDGYMUzVn', '2025-04-20 13:13:45', '2025-04-20 13:13:45', '0000-00-00 00:00:00'),
(123, 1, 0, 1, 'logistik (makanan)', 97000, 'nuget + mie + cocolatos', '2025-04-19', 0, 'logistik-makanan-68050187ec06f-Ui_9pfPwqV-BrztXM2', '2025-04-20 13:15:35', '2025-04-20 13:15:35', '0000-00-00 00:00:00'),
(124, 1, 0, 5, 'kuota', 41000, '21 gb 30 days', '2025-04-20', 0, 'kuota-680503a3e5ebb-nkTpjVSWF1DXQbC-IH', '2025-04-20 13:24:35', '2025-04-20 13:24:35', '0000-00-00 00:00:00'),
(125, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-04-22', 0, 'bensin-68072188a4191-tEadJ36B05ouMcVfGN', '2025-04-22 03:56:40', '2025-04-22 03:56:40', '0000-00-00 00:00:00'),
(126, 1, 0, 1, 'Mie sedap devina', 12000, 'Nongki di artcoffeelago', '2025-04-22', 0, 'mie-sedap-devina-68086abe1d2cf-0zy-jXsRemtbZlHSoW', '2025-04-23 03:21:18', '2025-04-23 03:21:18', '0000-00-00 00:00:00'),
(127, 1, 0, 5, 'Wi-fi', 218150, 'Bayar wifi bulan april', '2025-04-23', 0, 'wi-fi-68086af5c77c5-wIgfCtydv7MprZ1Se4', '2025-04-23 03:22:13', '2025-04-23 03:22:13', '0000-00-00 00:00:00'),
(128, 1, 0, 1, 'Geprek', 10000, 'Sambal nya kureng maknyus (geprek okmah)', '2025-04-26', 0, 'geprek-680cf3e250f26-8vbD4k9UVtwTjHC1EQ', '2025-04-26 13:55:30', '2025-04-26 13:55:30', '0000-00-00 00:00:00'),
(129, 1, 0, 1, 'Belanja alfamart', 57000, 'Mie 5 + ultramilk 1l + yakult + pocari', '2025-04-27', 0, 'belanja-alfamart-680e2ae605881-3Da0Ecz-SmM_dhers9', '2025-04-27 12:02:30', '2025-04-27 12:02:30', '0000-00-00 00:00:00'),
(130, 1, 0, 1, 'Geprek', 16000, 'Untuk makan siang di kantor, geprek deket perempatan taliwang', '2025-04-29', 0, 'geprek-6810d9af2c9da-nDItLiGqpmYfF5KVOQ', '2025-04-29 12:52:47', '2025-04-29 12:52:47', '0000-00-00 00:00:00'),
(131, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-04-29', 0, 'bensin-6810d9c67ec2a-7FwJTcQvBjqs14z8i0', '2025-04-29 12:53:10', '2025-04-29 12:53:10', '0000-00-00 00:00:00'),
(132, 1, 0, 1, 'Geprek', 16000, 'Geprek 2', '2025-05-01', 0, 'geprek-68134e2cab23c-Q_be0IPwkRUa5iAzLo', '2025-05-01 09:34:20', '2025-05-01 09:34:20', '0000-00-00 00:00:00'),
(133, 1, 0, 1, 'nongki', 32000, 'latte macha + pisang coklat + parkir (artcoffeelago)', '2025-05-02', 0, 'nongki-6816e0ac9bee9-_xlvuHmLZeCk0f92Tc', '2025-05-04 02:36:12', '2025-05-04 02:36:12', '0000-00-00 00:00:00'),
(134, 1, 0, 1, 'Susu + yakult', 33000, 'Ultramil 1l + yakult (alfamart deket rumah)', '2025-05-04', 0, 'susu-yakult-68179b8936f93-t415_pIxkiX6lGm3-2', '2025-05-04 15:53:29', '2025-05-04 15:53:29', '0000-00-00 00:00:00'),
(135, 4, 7, 10, 'Z', 25000, 'Zzzzzzz', '2025-05-06', 0, 'z-6819a4e82660b-CTk-fx6Fcy_Qlevi0A', '2025-05-06 04:58:00', '2025-05-06 04:58:00', '0000-00-00 00:00:00'),
(136, 1, 0, 1, 'Jaje bawang', 10000, 'Beli jaje bawang di nino', '2025-05-07', 0, 'jaje-bawang-681c5dfe4552c-TtxvnIR74ClX-kyPhJ', '2025-05-08 06:32:14', '2025-05-08 06:32:14', '0000-00-00 00:00:00'),
(137, 1, 0, 7, 'Hadiah jul', 50000, 'Hadiah untuk bang jul', '2025-05-08', 0, 'hadiah-jul-681c5e1e6b747-IYK9xdQOzLvHa3N_Gm', '2025-05-08 06:32:46', '2025-05-08 06:32:46', '0000-00-00 00:00:00'),
(138, 1, 6, 2, 'listrik', 53500, 'token listrik 75.2kWh', '2025-05-08', 0, 'listrik-681cc7458ea20-E8SA9wJFMkaN65ybGZ', '2025-05-08 14:01:25', '2025-05-08 14:01:25', '0000-00-00 00:00:00'),
(139, 1, 0, 1, 'geprek', 16000, 'geprek sayang-sayang', '2025-05-09', 0, 'geprek-681e1683789b0-jwtCce_9XKFnA8GNUb', '2025-05-09 13:51:47', '2025-05-09 13:51:47', '0000-00-00 00:00:00'),
(140, 1, 0, 4, 'Bensin + isi angin', 40000, 'Bensin 30 k + nitrogen 10k', '2025-05-10', 0, 'bensin-isi-angin-681ea52e059f5-QwO3ys7DfBtlCi1ReM', '2025-05-10 00:00:30', '2025-05-10 00:00:30', '0000-00-00 00:00:00'),
(141, 4, 3, 4, 'bensin', 25000, 'pertamina', '2025-05-10', 0, 'bensin-681f5ca207e50-274D9_vnSu-akGC3rb', '2025-05-10 13:03:14', '2025-05-10 13:03:14', '0000-00-00 00:00:00'),
(142, 4, 3, 5, 'kuota', 50000, 'kuota 25gb satu bulan', '2025-05-21', 0, 'kuota-681f5d4bcb5b0-NwMKuLQa4Yce-_hV3b', '2025-05-10 13:06:03', '2025-05-10 13:06:03', '0000-00-00 00:00:00'),
(143, 4, 3, 1, 'salad buah', 100000, 'bahan buat salad buah', '2025-05-27', 0, 'salad-buah-681f5da3572be--k8TFfmDh92MJzqn_w', '2025-05-10 13:07:31', '2025-05-10 13:07:31', '0000-00-00 00:00:00'),
(144, 1, 0, 1, 'Geprek + belanjar di alfamart', 65000, 'Geprek 3 + ultramilk 1l + yakult + mie 2', '2025-05-11', 0, 'geprek-belanjar-di-alfamart-682096561c793-rSJ1kgmeRbvnGKxoNF', '2025-05-11 11:21:42', '2025-05-11 11:21:42', '0000-00-00 00:00:00'),
(145, 1, 0, 1, 'nongki upnormal', 42000, 'susu hazelnut + roti bakar susu + parkir', '2025-05-17', 0, 'nongki-upnormal-68285d0b99eab-ETg2wA1SZXFaBoIPjk', '2025-05-17 08:55:23', '2025-05-17 08:55:23', '0000-00-00 00:00:00'),
(146, 1, 0, 1, 'makan siang', 12000, 'warung di sekitaran catur warga', '2025-05-17', 0, 'makan-siang-68285d6863765-8NqAG7-h4pj35sKeg0', '2025-05-17 08:56:56', '2025-05-17 08:56:56', '0000-00-00 00:00:00'),
(147, 1, 0, 1, 'Sahuraaa', 63000, 'Ultramilk + yakult + mie 2 + parkir + (terang bulan 20k)', '2025-05-18', 0, 'sahuraaa-682a0898d25fb-5ahtvsRep_bVkN6uF3', '2025-05-18 16:21:49', '2025-05-18 16:21:49', '0000-00-00 00:00:00'),
(148, 1, 5, 5, 'Kuota', 36000, 'Kuota telkomsel 14gb', '2025-05-19', 0, 'kuota-682ad9522ad80-RZxbacGBOYhj0g5slv', '2025-05-19 06:10:10', '2025-05-19 06:10:10', '0000-00-00 00:00:00'),
(149, 1, 0, 6, 'Ruby', 35000, 'Sabun 6 + odol 1', '2025-05-19', 0, 'ruby-682b47fb4de67-UKl3nfg5H9xpcoRDiS', '2025-05-19 14:02:19', '2025-05-19 14:02:19', '0000-00-00 00:00:00'),
(150, 1, 0, 1, 'Es coklat', 18000, 'Es coklat + roti kopi (esatoeh)', '2025-05-20', 0, 'es-coklat-682c9be9da7e9-vcoPdgqeNbEkGWC_1-', '2025-05-20 14:12:41', '2025-05-20 14:12:41', '0000-00-00 00:00:00'),
(151, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-05-21', 0, 'bensin-682f478873d26-O5Z9gn68VNvFDsoHJ1', '2025-05-22 14:49:28', '2025-05-22 14:49:28', '0000-00-00 00:00:00'),
(152, 1, 0, 1, 'Cilik', 5000, 'Cilok deket masjid taliwang', '2025-05-23', 0, 'cilik-6832dd33bf6eb-UFZGDhoaynqX1NdbSH', '2025-05-25 08:04:51', '2025-05-25 08:04:51', '0000-00-00 00:00:00'),
(153, 1, 0, 1, 'Nongki natura', 50000, 'Kerjain project web summit', '2025-05-24', 0, 'nongki-natura-6832dd583ecd5-78VpgQac2D3Irzb0uA', '2025-05-25 08:05:28', '2025-05-25 08:05:28', '0000-00-00 00:00:00'),
(154, 1, 0, 1, 'Susu ultramilk', 23000, 'Alfamart sayang sayang', '2025-05-25', 0, 'susu-ultramilk-6832e9939afed-RxLClnTqfOd1jN_F0g', '2025-05-25 08:57:39', '2025-05-25 08:57:39', '0000-00-00 00:00:00'),
(155, 1, 6, 5, 'Wifi mei', 218150, 'Tagihan wifi bulan mei (20mbps) my republic', '2025-05-25', 0, 'wifi-mei-6832eac35339c-SF5WQMtmex8_-0KEzT', '2025-05-25 09:02:43', '2025-05-25 09:02:43', '0000-00-00 00:00:00'),
(156, 1, 0, 1, 'Jus alpukat', 10000, 'Beli di deket masjid (mantap)', '2025-05-27', 0, 'jus-alpukat-6835dbe97f5e0-stFJqc1VnMLH2xyNaC', '2025-05-27 14:36:09', '2025-05-27 14:36:09', '0000-00-00 00:00:00'),
(157, 1, 0, 1, 'Jus alpukat', 10000, 'Masjid deket masjid', '2025-05-28', 0, 'jus-alpukat-6836d4b1aea59-NVAT58dJ9aOZDyWKit', '2025-05-28 08:17:37', '2025-05-28 08:17:37', '0000-00-00 00:00:00'),
(158, 1, 0, 4, 'Bensin', 20000, 'Pertamina kekalik', '2025-05-29', 0, 'bensin-68385c9a5fbe2-KG_fEHdv5SmjiQ97MP', '2025-05-29 12:09:46', '2025-05-29 12:09:46', '0000-00-00 00:00:00'),
(159, 1, 0, 1, 'Geprek', 24000, 'Geprek 3, geprek di lauk', '2025-05-29', 0, 'geprek-68385cb09bf34-J1tPNESHx_jWLQRG97', '2025-05-29 12:10:08', '2025-05-29 12:10:08', '0000-00-00 00:00:00'),
(160, 1, 0, 1, 'Nongki es kepal', 51000, 'Alpukat + salad (kureng)', '2025-05-31', 0, 'nongki-es-kepal-683ab7f93847b-doKtLu3gfAmHNO8p1_', '2025-05-31 07:04:09', '2025-05-31 07:04:09', '0000-00-00 00:00:00'),
(161, 1, 0, 9, 'cukur', 62000, 'pennylane (mullet) + parkir 2k', '2025-05-31', 0, 'cukur-683b08386f0dc-Bxm9NjVi6lrEZpGdJy', '2025-05-31 12:46:32', '2025-05-31 12:46:32', '0000-00-00 00:00:00'),
(162, 1, 0, 4, 'Bensin', 40000, 'Pertamina narmada 20k + pertamina kayangan 20k', '2025-06-01', 0, 'bensin-683d070f49067-iwSJes8XVgfIdLBHar', '2025-06-02 01:06:07', '2025-06-02 01:06:07', '0000-00-00 00:00:00'),
(163, 1, 0, 1, 'Tuak manis', 10000, 'Tuak manis pusuk', '2025-06-01', 0, 'tuak-manis-683d0738877fd-J8k59vEhlo1xn4RtFN', '2025-06-02 01:06:48', '2025-06-02 01:06:48', '0000-00-00 00:00:00'),
(164, 1, 0, 4, 'Ganti ban luar dan dalam', 265000, 'ban luar 225k + ban dalam 40k', '2025-06-02', 0, 'ganti-ban-luar-dan-dalam-683d076936072-_0LNydi3OW1kt9o56S', '2025-06-02 01:07:37', '2025-06-02 01:07:37', '0000-00-00 00:00:00'),
(165, 1, 0, 1, 'alfamart', 42000, 'ultramilk 1l + yakult + pop mie', '2025-06-02', 0, 'alfamart-683dc73899dd1-teBK7k9V8E0oDGsI2F', '2025-06-02 14:46:00', '2025-06-02 14:46:00', '0000-00-00 00:00:00'),
(166, 1, 0, 1, 'Jus alpukat', 10000, 'Dagang jus deket masjid', '2025-06-03', 0, 'jus-alpukat-683ec6bd83ead-wWh-NTnP0AYpSG4y18', '2025-06-03 08:56:13', '2025-06-03 08:56:13', '0000-00-00 00:00:00'),
(167, 1, 0, 1, 'Makan malam', 28000, 'Mie 2 + ultramilk + yakult + parkir (alfamart geria/keri)', '2025-06-06', 0, 'makan-malam-68430fe418a32-l690oPIUWXCgE-fj5k', '2025-06-06 14:57:24', '2025-06-06 14:57:24', '0000-00-00 00:00:00'),
(168, 1, 0, 9, 'Baju', 50000, 'Baju kutang', '2025-06-01', 0, 'baju-684310c266257-mDseRcpd3IfVqCo6xy', '2025-06-06 15:01:06', '2025-06-06 15:01:06', '0000-00-00 00:00:00'),
(169, 1, 0, 8, 'Gas portable', 26500, 'Untuk camp di pantai 3', '2025-06-07', 0, 'gas-portable-685821bc32d26-q-5GgcP7sn_vfUkYHM', '2025-06-22 14:31:08', '2025-06-22 14:31:08', '0000-00-00 00:00:00'),
(170, 1, 0, 4, 'Bensin', 10000, 'Pertamini (camp ke pantai 3)', '2025-06-07', 0, 'bensin-685821ed0f6f5-3rund-vo7SjhwiWJDe', '2025-06-22 14:31:57', '2025-06-22 14:31:57', '0000-00-00 00:00:00'),
(171, 1, 0, 8, 'Toilet', 8000, 'Toilet di pantai 3 (bak + wudhu)', '2025-06-07', 0, 'toilet-6858222bc33be-fWGlMx3ZLhFoIP6qaH', '2025-06-22 14:32:59', '2025-06-22 14:32:59', '0000-00-00 00:00:00'),
(172, 1, 0, 1, 'Gorengan', 5000, 'Sedak ngoding di btn nino', '2025-06-08', 0, 'gorengan-6858225526200-o3DE_fJM6lBSbT1aI8', '2025-06-22 14:33:41', '2025-06-22 14:33:41', '0000-00-00 00:00:00'),
(173, 1, 0, 1, 'Nongki natura', 36000, 'Boba + mix max', '2025-06-09', 0, 'nongki-natura-685823256b196-U7qsEpzVI-emM3KnvQ', '2025-06-22 14:37:09', '2025-06-22 14:37:09', '0000-00-00 00:00:00'),
(174, 1, 0, 1, 'Geprek', 18000, 'Untuk sahur', '2025-06-11', 0, 'geprek-6858235ce9e27-nkb7EdrSjWL-4Q9tOo', '2025-06-22 14:38:04', '2025-06-22 14:38:04', '0000-00-00 00:00:00'),
(175, 1, 0, 1, 'Geprek + ultramilk', 39000, 'Geprek 2 (16k) + ultramilk 1L (untuk sahur)(23k)', '2025-06-18', 0, 'geprek-ultramilk-685823d8e90c6-RdQ7FqC3LXu_6NvDA1', '2025-06-22 14:40:08', '2025-06-22 14:40:08', '0000-00-00 00:00:00'),
(176, 1, 0, 4, 'Service motor', 105000, 'Ganti ban dalam ban depan + ganti oli', '2025-06-16', 0, 'service-motor-685824ec1a706-S-BoynfG_INKqpzvRV', '2025-06-22 14:44:44', '2025-06-22 14:44:44', '0000-00-00 00:00:00'),
(177, 1, 0, 1, 'Nongki nyaman cafe', 61050, 'Agak mahal, tapi enak', '2025-06-14', 0, 'nongki-nyaman-cafe-68582613ccc1b-ptqdPjkSlJf9LihUXw', '2025-06-22 14:49:39', '2025-06-22 14:49:39', '0000-00-00 00:00:00'),
(178, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang-sayang', '2025-06-12', 0, 'bensin-6858264d47b3e-MG3wRrn5uv4-J6_8mH', '2025-06-22 14:50:37', '2025-06-22 14:50:37', '0000-00-00 00:00:00'),
(179, 1, 0, 5, 'Kuota', 36000, '14gb 30 hari 35k (admin 1000 via tlkm briva bri)', '2025-06-17', 0, 'kuota-685828ae5c887-RzmJwLKj29Ge_ocTPX', '2025-06-22 15:00:46', '2025-06-22 15:00:46', '0000-00-00 00:00:00'),
(180, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-06-23', 0, 'bensin-6858deb3c0dd8-6De_mQPBU8HdM7jWX2', '2025-06-23 03:57:23', '2025-06-23 03:57:23', '0000-00-00 00:00:00'),
(181, 1, 0, 1, 'Alfamart + geprek 2', 42000, 'Geprek 2 + ultramilk 8k + mie 2 + yakult', '2025-06-23', 0, 'alfamart-geprek-2-685ac2b667b5d-2pUsFBJzG04e7AxZyf', '2025-06-24 14:22:30', '2025-06-24 14:22:30', '0000-00-00 00:00:00'),
(182, 1, 0, 7, 'Surprise', 74000, 'Surprise for ceo', '2025-06-24', 0, 'surprise-685ac3001b947-5Joc2BxCA_vLdEaZ60', '2025-06-24 14:23:44', '2025-06-24 14:23:44', '0000-00-00 00:00:00'),
(183, 1, 6, 5, 'Wifi juni', 218150, 'Bayar wifi bulan juni 2025', '2025-06-25', 0, 'wifi-juni-685c07a181a30-cFmCp9vIRHhlnMX0Nd', '2025-06-25 13:28:49', '2025-06-25 13:28:49', '0000-00-00 00:00:00'),
(184, 1, 5, 2, 'token listrik', 53000, 'bulan juni, 75.20kwh', '2025-06-27', 0, 'token-listrik-685e66c95665d-RBQa5-1Esd4HuLY_Av', '2025-06-27 08:39:21', '2025-06-27 08:39:21', '0000-00-00 00:00:00'),
(185, 1, 0, 1, 'Nongki', 25000, 'Kopte cafe + parkir + pantai ampenan', '2025-06-28', 0, 'nongki-686009543ceb7-CegEPlHG5RwpZkyYDA', '2025-06-28 14:25:08', '2025-06-28 14:25:08', '0000-00-00 00:00:00'),
(186, 1, 0, 1, 'Cilok pong + belanja alfamart', 82000, 'Cilok + ultramilk 1L + happytos 3 (promo) + yakult + pocary sweat + pop mie', '2025-06-29', 0, 'cilok-pong-belanja-alfamart-68615869c65e4-eRYF5LHly9V2zNGjm1', '2025-06-29 14:14:49', '2025-06-29 14:14:49', '0000-00-00 00:00:00'),
(187, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-07-04', 0, 'bensin-68676e7509f05-97w_eZKIx4dRWgiSNt', '2025-07-04 05:02:29', '2025-07-04 05:02:29', '0000-00-00 00:00:00'),
(188, 1, 0, 1, 'Pecel + jeli', 18000, 'Pecel 12k + jeli 6k (pecel hj kamariyah)', '2025-07-04', 0, 'pecel-jeli-68676eb013696-XnhsWZd5MQRwIEmt3_', '2025-07-04 05:03:28', '2025-07-04 05:03:28', '0000-00-00 00:00:00'),
(189, 1, 0, 1, 'Nongki + cilok', 38000, 'Es coklat maharani 33k + cilok di sekitaran btn nino 5k', '2025-07-05', 0, 'nongki-cilok-68691a08296d7-vLTrcUaQgs4xIKNoHY', '2025-07-05 11:26:48', '2025-07-05 11:26:48', '0000-00-00 00:00:00'),
(190, 1, 0, 1, 'Jus alpukat', 10000, 'Beli di deket masjid taliwang', '2025-07-08', 0, 'jus-alpukat-686d06e40c6ea-k90rnOu5YjxyRchLtg', '2025-07-08 10:54:12', '2025-07-08 10:54:12', '0000-00-00 00:00:00'),
(191, 1, 0, 1, 'Cilok pong', 15000, 'Lumayan, kalo bisa kurangi', '2025-07-08', 0, 'cilok-pong-686d371a49d4b-lixnQDsMfZ-4GTL6N9', '2025-07-08 14:19:54', '2025-07-08 14:19:54', '0000-00-00 00:00:00'),
(192, 1, 0, 6, 'Ruby', 95000, 'Ultramilk 1L + tisu jolly + sabun harmony 10 + natur hair tonic', '2025-07-09', 0, 'ruby-686f4bea1becb-mHOyVEADS6s5ZhKwft', '2025-07-10 04:13:14', '2025-07-10 04:13:14', '0000-00-00 00:00:00'),
(193, 1, 0, 1, 'Jus alpukat', 10000, 'Jus alpukat deket masjid taliwang', '2025-07-11', 0, 'jus-alpukat-687115cc081c7-AVEI9pjJWKurH_XB5b', '2025-07-11 12:46:52', '2025-07-11 12:46:52', '0000-00-00 00:00:00'),
(194, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-07-11', 0, 'bensin-687115eb5308f--jhpQ23krZAPayW1JK', '2025-07-11 12:47:23', '2025-07-11 12:47:23', '0000-00-00 00:00:00'),
(195, 1, 0, 7, 'Perombok', 100000, 'Perombok kepeng inak', '2025-07-13', 0, 'perombok-687528628a3ca-CgA92fHatjB3qUhVFZ', '2025-07-14 14:55:14', '2025-07-14 14:55:14', '0000-00-00 00:00:00'),
(196, 1, 0, 1, 'Kentang goreng', 12000, 'Kentang goreng keripik (kak wa)', '2025-07-13', 0, 'kentang-goreng-6875288944351-l-Q9iX346kSZ8WeBsm', '2025-07-14 14:55:53', '2025-07-14 14:55:53', '0000-00-00 00:00:00'),
(197, 1, 0, 1, 'Protein (susu)', 36000, 'Frisian flag 2 (promo) + cimory + es krim 2 + yakult', '2025-07-14', 0, 'protein-susu-687528f1337dc-OtWzHbB0VKZ8vYdGA-', '2025-07-14 14:57:37', '2025-07-14 14:57:37', '0000-00-00 00:00:00'),
(198, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-07-16', 0, 'jajan-6878755d36390-9zxriN7QAv3Y_8KLGy', '2025-07-17 03:00:29', '2025-07-17 03:00:29', '0000-00-00 00:00:00'),
(199, 1, 5, 5, 'Kuota', 36000, 'Kuota 14gb - 35k + admin 1k', '2025-07-17', 0, 'kuota-687875960e414-MOTWtplQJj189c_auz', '2025-07-17 03:01:26', '2025-07-17 03:01:26', '0000-00-00 00:00:00'),
(200, 1, 0, 1, 'geprek', 16000, 'geprek 2, geprek deket stokan', '2025-07-17', 0, 'geprek-687b4fa72d976-Mfz7JtTm1g0DQajxn5', '2025-07-19 06:56:23', '2025-07-19 06:56:23', '0000-00-00 00:00:00'),
(201, 1, 0, 1, 'jajan + jus alpukat', 14000, 'jajan 4k + jus alpukat 10k', '2025-07-18', 0, 'jajan-jus-alpukat-687b4fe34c192-7Zlo98G3VTBSikMjhH', '2025-07-19 06:57:23', '2025-07-19 06:57:23', '0000-00-00 00:00:00'),
(202, 1, 0, 1, 'jajan', 10000, 'jajan di bibik abik', '2025-07-19', 0, 'jajan-687b5003380ae-wDfVCKUiYWrTBqk2Gm', '2025-07-19 06:57:55', '2025-07-19 06:57:55', '0000-00-00 00:00:00'),
(203, 1, 0, 1, 'Untuk sahur', 37000, 'Ultramilk 1L + mie 4 + parkir (alfamart)', '2025-07-20', 0, 'untuk-sahur-687e2d7034620-KlXfTI6Q51cwxyMOCH', '2025-07-21 11:07:12', '2025-07-21 11:07:12', '0000-00-00 00:00:00'),
(204, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-07-20', 0, 'bensin-687e2dafb3b5c-PHvxJ-0VKb84ZUXsro', '2025-07-21 12:21:32', '2025-07-21 12:21:32', '0000-00-00 00:00:00'),
(205, 1, 0, 8, 'Healing', 9000, 'Pantai alang-alang', '2025-07-20', 0, 'healing-687e2f7de90cd-4QGUjJ6Dt9PfuTdcr8', '2025-07-21 11:15:57', '2025-07-21 11:15:57', '0000-00-00 00:00:00'),
(206, 1, 0, 1, 'Jajan', 4000, 'Jajan di kantor', '2025-07-23', 0, 'jajan-688187538387a-i9MRz-juybUrgfm7v4', '2025-07-24 00:07:31', '2025-07-24 00:07:31', '0000-00-00 00:00:00'),
(207, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-07-25', 0, 'jajan-688311ef818aa-ydmu4efvRNaDQLFErp', '2025-07-25 04:11:11', '2025-07-25 04:11:11', '0000-00-00 00:00:00'),
(208, 1, 6, 1, 'Nongki', 48200, 'Es kepal mataram (ayam bakar geprek + parkir)', '2025-07-24', 0, 'nongki-68831293a09d0-BWl-3xSK0VRrho5HIg', '2025-07-25 04:13:55', '2025-07-25 04:13:55', '0000-00-00 00:00:00'),
(209, 1, 0, 10, 'Badminton', 10000, 'Olahrage sekedik', '2025-07-26', 0, 'badminton-68848f5cf0da3-o7lWIuKj0T5fkwp9dS', '2025-07-26 07:18:36', '2025-07-26 07:18:36', '0000-00-00 00:00:00'),
(210, 1, 6, 5, 'Wi-Fi juli', 218150, 'Tagihan wifi bulan juli', '2025-07-27', 0, 'wi-fi-juli-688630d38c251-L8-2xf5sM1O0U6DC37', '2025-07-27 12:59:47', '2025-07-27 13:00:16', '2025-07-27 21:00:16'),
(211, 1, 6, 5, 'Wi-Fi juli', 218150, 'Tagihan wifi bulan juli', '2025-07-27', 0, 'wi-fi-juli-688630d38bd1d-oUsT0JgBk5lZzL7f3b', '2025-07-27 12:59:47', '2025-07-27 12:59:47', '0000-00-00 00:00:00'),
(212, 1, 0, 1, 'Jajan', 44500, 'Ultramilk 1L + yakult + bakso pong + parkir', '2025-07-27', 0, 'jajan-688631569e60d-Ug1pW_lrjhXHA3LFan', '2025-07-27 13:01:58', '2025-07-27 13:01:58', '0000-00-00 00:00:00'),
(213, 1, 0, 4, 'bensin', 20000, 'pertamina sayang sayang', '2025-07-28', 0, 'bensin-6887253d50543-K-DPeQVf0IMpCaZdHx', '2025-07-28 06:22:37', '2025-07-28 06:22:37', '0000-00-00 00:00:00'),
(214, 1, 0, 10, 'Print tugas alfan', 25000, 'Print di lilir (berwarna 18 lembar)', '2025-07-29', 0, 'print-tugas-alfan-6888c25900e7a-DObCtUGgHZko0craJ2', '2025-07-29 11:45:13', '2025-07-29 11:45:13', '0000-00-00 00:00:00'),
(215, 1, 6, 6, 'Baju smart starts', 95000, 'Baju untuk acara smart starts ultah summit', '2025-07-30', 0, 'baju-smart-starts-688981fbb613f-wCJmAtNc-8aYEO3H0B', '2025-07-30 01:22:51', '2025-07-30 01:22:51', '0000-00-00 00:00:00'),
(216, 1, 0, 7, 'Hadiah perpisahan', 10000, 'Sama sama 10k hadiah perpisahan utk mas syam & haji jul', '2025-07-30', 0, 'hadiah-perpisahan-6889f8459cf18-EiOA_erLQcpb5y72ZH', '2025-07-30 09:47:33', '2025-07-30 09:47:33', '0000-00-00 00:00:00'),
(217, 1, 0, 1, 'ultramilk + jajan', 25500, 'ultramilk 1L 21.5k + jajan di kantor 4k', '2025-08-01', 0, 'ultramilk-jajan-688e1ddf3d5e8-9lAjnzw-bdhI64TPfu', '2025-08-02 13:17:03', '2025-08-02 13:17:03', '0000-00-00 00:00:00'),
(218, 1, 0, 1, 'cilok pong', 10000, 'cilok pong', '2025-08-01', 0, 'cilok-pong-688e1e06d1efd-EXNJcWkvS572sLiQo1', '2025-08-02 13:17:42', '2025-08-02 13:17:42', '0000-00-00 00:00:00'),
(219, 1, 0, 8, 'badminton', 15000, 'main bulutangkis 1jam di tj sport', '2025-08-02', 0, 'badminton-688e1e3cf2a37-uz_Y-nI20HVS9dg8Jy', '2025-08-02 13:18:37', '2025-08-02 13:18:37', '0000-00-00 00:00:00'),
(220, 1, 0, 1, 'Geprek', 16000, 'Geprek di sayang sayang', '2025-08-03', 0, 'geprek-688f70004250e-f7sDBvSFJQmaEyVKuU', '2025-08-03 13:19:44', '2025-08-03 13:19:44', '0000-00-00 00:00:00'),
(221, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-08-05', 0, 'jajan-689604cdad307-YJ1vs8DkXEjnVZl9b6', '2025-08-08 13:08:13', '2025-08-08 13:08:13', '0000-00-00 00:00:00'),
(222, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-08-06', 0, 'jajan-689604e24f5cf-Mefbz1qaPr5vJj-C9X', '2025-08-08 13:08:34', '2025-08-08 13:08:34', '0000-00-00 00:00:00'),
(223, 1, 0, 4, 'Bensin + isi angin', 30000, 'Bensin 20k + nitrogen 10k (isi baru)', '2025-08-07', 0, 'bensin-isi-angin-68960510c9b00-BClfx3tKQPHWb5gT2m', '2025-08-08 13:09:20', '2025-08-08 13:09:20', '0000-00-00 00:00:00'),
(224, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-08-08', 0, 'jajan-689605717be62-8Axdbca5vPZseWowVX', '2025-08-08 13:10:57', '2025-08-08 13:10:57', '0000-00-00 00:00:00'),
(225, 1, 0, 9, 'Gastby spray', 36500, 'Pomade', '2025-08-08', 0, 'gastby-spray-68960652da01c-mEiOrNtkAhZCgwKMne', '2025-08-08 13:14:42', '2025-08-08 13:14:42', '0000-00-00 00:00:00'),
(226, 1, 0, 1, 'Susu', 19400, 'Ultramilk 250ml + yakult', '2025-08-08', 0, 'susu-689606b859d81-oei7bjmdsq6Y_fpk2K', '2025-08-08 13:16:24', '2025-08-08 13:16:24', '0000-00-00 00:00:00'),
(227, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-08-12', 0, 'jajan-689a9d44b6c10-o0yUr3qNKMEJx1_sQ6', '2025-08-12 00:47:48', '2025-08-12 00:47:48', '0000-00-00 00:00:00'),
(228, 1, 0, 1, 'Tomoro', 73000, 'Nongki di tomoro (coffee latte + caramel cheese latte + croisant)', '2025-08-09', 0, 'tomoro-689aa91bdf381-xFf_jUPBsNoZHYmaW1', '2025-08-12 01:38:19', '2025-08-12 01:38:19', '0000-00-00 00:00:00'),
(229, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-08-15', 0, 'jajan-68a0190ce5d21-aJso9tku0bPiq_Vm8W', '2025-08-16 04:37:16', '2025-08-16 04:37:16', '0000-00-00 00:00:00'),
(230, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-08-15', 0, 'jajan-68a019197b43f-XsfhKwa97dr3MSloUT', '2025-08-16 04:37:29', '2025-08-16 04:37:29', '0000-00-00 00:00:00'),
(231, 1, 5, 2, 'Listrik', 53000, 'Pulsa listrik 75.20kWH', '2025-08-16', 0, 'listrik-68a01a740dfd4-1y0Uo4uDxpsGhg7KR2', '2025-08-16 04:43:16', '2025-08-16 04:43:16', '0000-00-00 00:00:00'),
(232, 1, 6, 5, 'Kuota', 42000, 'Kuota 16gb 42k', '2025-08-17', 0, 'kuota-68a2132d98c48-oc5xHAmeh-SptUdJZn', '2025-08-17 16:36:45', '2025-08-17 16:36:45', '0000-00-00 00:00:00'),
(233, 1, 0, 1, 'Nongki', 31000, 'Nongki di tomoro sudirman', '2025-08-17', 0, 'nongki-68a2136da94b1-fSjs2Vv51LIgQpEY7q', '2025-08-17 16:37:49', '2025-08-17 16:37:49', '0000-00-00 00:00:00'),
(234, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-08-17', 0, 'bensin-68a213a29e502-QD2m0bl-ot4zrM5kpy', '2025-08-17 16:38:42', '2025-08-17 16:38:42', '0000-00-00 00:00:00'),
(235, 1, 0, 1, 'Buka', 47000, 'Untuk berbuka (geprek 2 + ultramilk 1l + mie 2 + parkir 2k)', '2025-08-18', 0, 'buka-68a35b63a1577-5G1y-A3zVhDLmdl9kW', '2025-08-18 15:57:07', '2025-08-18 15:59:32', '2025-08-18 23:59:32'),
(236, 1, 0, 1, 'Buka', 47000, 'Untuk berbuka (geprek 2 + ultramilk 1l + mie 2 + parkir 2k)', '2025-08-18', 0, 'buka-68a35bdca1c2e-UNqwk13-0ueVy95Dxg', '2025-08-18 15:59:08', '2025-08-18 15:59:08', '0000-00-00 00:00:00'),
(237, 1, 0, 6, 'Peralatan mandi', 50000, 'Sabun muka + sikat gigi + ultramilk 250ml + parkir 1k', '2025-08-20', 0, 'peralatan-mandi-68a5ea4ac44e2-ce8ga0JRX9-YINKh1v', '2025-08-20 14:31:22', '2025-08-20 14:31:22', '0000-00-00 00:00:00'),
(238, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-08-20', 0, 'jajan-68a5ea6caa5fe-CjhMlW5_3HdDanKzPy', '2025-08-20 14:31:56', '2025-08-20 14:31:56', '0000-00-00 00:00:00'),
(239, 1, 0, 1, 'Es krim', 34000, 'Es krim momoyo ukuran jumbo', '2025-08-22', 0, 'es-krim-68a9e4db3fcf4-uQa-hIESLdgAX4WRsw', '2025-08-23 14:57:15', '2025-08-23 14:57:15', '0000-00-00 00:00:00'),
(240, 1, 0, 1, 'Bakmie tianlong', 40000, 'Coba bakmie di tianlong 88', '2025-08-23', 0, 'bakmie-tianlong-68a9e4fce22a1-6YF2d_XD8hPIolQcak', '2025-08-23 14:57:48', '2025-08-23 14:57:48', '0000-00-00 00:00:00'),
(241, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-08-22', 0, 'jajan-68a9e52a20e04-c8ZwL_VHybAWMhNlTO', '2025-08-23 14:58:34', '2025-08-23 14:58:34', '0000-00-00 00:00:00'),
(242, 1, 0, 7, 'Hadiah sunat', 100000, 'Untuk anaknya liza', '2025-08-23', 0, 'hadiah-sunat-68a9e5731bc1c-BPaSJ5rD6pVyn0ELcs', '2025-08-23 14:59:47', '2025-08-23 14:59:47', '0000-00-00 00:00:00'),
(243, 1, 6, 5, 'Wifi agustus', 218150, 'Bayar wifi bulan agustus', '2025-08-26', 0, 'wifi-agustus-68ae8b7ace3f0-0U4-mO8pr2PKGlIZgR', '2025-08-27 03:37:14', '2025-08-27 03:37:14', '0000-00-00 00:00:00'),
(244, 1, 0, 1, 'Jajan', 4000, 'Jajan di kantor', '2025-08-26', 0, 'jajan-68aeed4f20086-PlFM10g_j8B9qVWStL', '2025-08-27 10:34:39', '2025-08-27 10:34:39', '0000-00-00 00:00:00'),
(245, 1, 0, 1, 'Geprek 2', 16000, 'Geprek di lauk', '2025-08-26', 0, 'geprek-2-68aeed8f86045-blaPDswY2Bo1rKqf8M', '2025-08-27 10:35:43', '2025-08-27 10:35:43', '0000-00-00 00:00:00'),
(246, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-08-27', 0, 'jajan-68aeeda4e3dfa-5TVke3pYyMatjd8DAP', '2025-08-27 10:36:04', '2025-08-27 10:36:04', '0000-00-00 00:00:00'),
(247, 1, 0, 1, 'jajan', 6000, 'jajan dikantor', '2025-08-29', 0, 'jajan-68b26c05e0653-quA0DpIidECbrtaY7k', '2025-08-30 02:12:05', '2025-08-30 02:12:05', '0000-00-00 00:00:00'),
(248, 1, 6, 8, 'kimetsu no yaiba', 41000, 'nonton bioskop di cgv transmart mataram (kimetsu no yaiba)', '2025-08-29', 0, 'kimetsu-no-yaiba-68b26c4bb9cb3-xeBIKi8sc2QTXD6JmS', '2025-08-30 02:13:15', '2025-08-30 02:13:15', '0000-00-00 00:00:00'),
(249, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-09-02', 0, 'jajan-68b677deb0e78-zcEno7q6V-x2byM9DP', '2025-09-02 03:51:42', '2025-09-03 02:53:41', '2025-09-03 10:53:41'),
(250, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-09-02', 0, 'jajan-68b677f462ca1-ln7FgZrmyiWbvfwRjC', '2025-09-02 03:52:04', '2025-09-02 03:52:22', '2025-09-02 11:52:22'),
(251, 1, 0, 4, 'Bengkel', 75000, 'Tambal ban & ganti kedua oli (gardan, mesin)', '2025-09-02', 0, 'bengkel-68b6788361fe3-EX9OJbeCY8jrWgksGS', '2025-09-02 03:54:27', '2025-09-02 03:54:27', '0000-00-00 00:00:00'),
(252, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-08-29', 0, 'bensin-68b679961d7cf-xGSdw5-pRr0yaCB1Hi', '2025-09-02 03:59:02', '2025-09-02 03:59:02', '0000-00-00 00:00:00'),
(253, 1, 0, 6, 'Ruby', 242096, 'Sabun,vaseline 54k + dani ngutang 187k', '2025-08-31', 0, 'ruby-68b6e5c984751-tk-_chuB9zxgjneYrJ', '2025-09-02 11:40:41', '2025-09-02 11:40:41', '0000-00-00 00:00:00'),
(254, 1, 0, 1, 'Cilok pong', 20000, 'Jajan bakso pong lilir', '2025-08-31', 0, 'cilok-pong-68b6e5f959659-EGcf0RCpXuzxdjIZe3', '2025-09-02 11:41:29', '2025-09-02 11:41:29', '0000-00-00 00:00:00'),
(255, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang2', '2025-09-02', 0, 'bensin-68b7bb9d9c9c4-bjRYru98xMQtwsOh5P', '2025-09-03 02:53:01', '2025-09-03 02:53:01', '0000-00-00 00:00:00'),
(256, 1, 0, 7, 'Maulid', 100000, 'Bagi ke anak anak yang sunatan', '2025-09-06', 0, 'maulid-68bc568e7e481-_vo-3fEztcIJpasi8x', '2025-09-06 14:43:10', '2025-09-06 14:43:10', '0000-00-00 00:00:00'),
(257, 1, 0, 1, 'Sahur', 55000, 'Mie 2 + ultramilk 1l + yakult + pocari + larutan', '2025-09-07', 0, 'sahur-68bd8c4a72b1b-64lyMN7kVInefo-jZ2', '2025-09-07 12:44:42', '2025-09-07 12:44:42', '0000-00-00 00:00:00'),
(258, 1, 0, 1, 'Cilok pong', 20000, 'Cilok pong lilir', '2025-09-07', 0, 'cilok-pong-68bd8c930c8d9-JxCZU3hpKAB-bDPwTa', '2025-09-07 12:45:55', '2025-09-07 12:45:55', '0000-00-00 00:00:00'),
(259, 1, 5, 6, 'Shopee', 584450, 'Sarung jok + headphone anc + peci hitam', '2025-09-09', 0, 'shopee-68c055b186a0d-nxFSRcQ4VO3bpi_HuG', '2025-09-09 15:28:33', '2025-09-09 15:28:33', '0000-00-00 00:00:00');
INSERT INTO `expenses` (`id`, `id_user`, `id_dompet`, `id_kategori_expenses`, `name_expenses`, `amount`, `description`, `date_expenses`, `status`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(260, 1, 0, 1, 'Jajan', 7000, 'Jajan di kantor', '2025-09-09', 0, 'jajan-68c055eea482b-IRugwMDVG4_0Nt5Kfv', '2025-09-09 15:29:34', '2025-09-09 15:29:34', '0000-00-00 00:00:00'),
(261, 1, 0, 1, 'jajan', 7000, 'jajan di kantor', '2025-09-12', 0, 'jajan-68c69dcac0468-NL_UrntFDMVCb5q1wg', '2025-09-14 09:49:46', '2025-09-14 09:49:46', '0000-00-00 00:00:00'),
(262, 1, 0, 1, 'Donate beli bahan', 20000, 'Beli bahan pisang goreng', '2025-09-15', 0, 'donate-beli-bahan-68c79134b6540-TBd1we6m8MDnjYOCWI', '2025-09-15 03:08:20', '2025-09-15 03:08:20', '0000-00-00 00:00:00'),
(263, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-09-15', 0, 'bensin-68cb7369b9e9f-hUSM-18oblwm7u4HaQ', '2025-09-18 01:50:17', '2025-09-18 01:50:17', '0000-00-00 00:00:00'),
(264, 1, 0, 7, 'Maulid ke farhan', 40000, 'Beli gula untuk di bawa maulid', '2025-09-15', 0, 'maulid-ke-farhan-68cb73a57ae26-41yJkMs3f_HBQD0ebp', '2025-09-18 01:51:17', '2025-09-18 01:51:17', '0000-00-00 00:00:00'),
(265, 1, 0, 6, 'Belanja di alfamart', 53000, 'Air mineral + ultramilk 450ml + baterai alkaline isi 6', '2025-09-17', 0, 'belanja-di-alfamart-68cc16d1573e8-fZwGx8zknPDU-qQ6_t', '2025-09-18 13:27:29', '2025-09-18 13:27:29', '0000-00-00 00:00:00'),
(266, 1, 5, 5, 'Kuota', 35000, '14Gb', '2025-09-16', 0, 'kuota-68cc185961bbc-YVipyJ5zMomCNnXftI', '2025-09-18 13:34:01', '2025-09-18 13:34:01', '0000-00-00 00:00:00'),
(267, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-09-17', 0, 'jajan-68cc189369b4f-6F4Y7uZXPChODgTn8N', '2025-09-18 13:34:59', '2025-09-18 13:34:59', '0000-00-00 00:00:00'),
(268, 1, 0, 1, 'Jajan', 4000, 'Jajan di kantor', '2025-09-19', 0, 'jajan-68cd6bdf2720b-e1bTacFopikwAnNvD4', '2025-09-19 13:42:39', '2025-09-19 13:42:39', '0000-00-00 00:00:00'),
(269, 1, 0, 1, 'Makanan', 32000, 'Mie + ultramil 450ml + Yakult + machiatos', '2025-09-21', 0, 'makanan-68d1638e8d353-_i3BPckRuFH1CjvGNe', '2025-09-22 13:56:14', '2025-09-22 13:56:14', '0000-00-00 00:00:00'),
(270, 1, 6, 5, 'Wifi september', 218150, 'Wifi bulan september', '2025-09-27', 0, 'wifi-september-68d92300d3788-wyxc9MP_75BCRAj0bG', '2025-09-28 10:58:56', '2025-09-28 10:58:56', '0000-00-00 00:00:00'),
(271, 1, 0, 7, 'Kado nikahan', 50000, 'Ngumpulan kado utk nikahan teman', '2025-09-26', 0, 'kado-nikahan-68d93c31331f4-xr8lkA25iGMhNu1ZH9', '2025-09-28 12:46:25', '2025-09-28 12:46:25', '0000-00-00 00:00:00'),
(272, 1, 0, 1, 'Jajan', 7000, 'Jajan di kantor', '2025-09-23', 0, 'jajan-68da72b0af914-vkg12WmzQpPs9w70lb', '2025-09-29 10:51:12', '2025-09-29 10:51:12', '0000-00-00 00:00:00'),
(273, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-09-24', 0, 'jajan-68da72d608211-vadq4WNiO1grf5DC-0', '2025-09-29 10:51:50', '2025-09-29 10:51:50', '0000-00-00 00:00:00'),
(274, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-09-26', 0, 'jajan-68da72e63a8eb-sNZq8Ftwmj_VzBdXec', '2025-09-29 10:52:06', '2025-09-29 10:52:06', '0000-00-00 00:00:00'),
(275, 1, 0, 9, 'Cukur', 60000, 'Cukur undercut', '2025-09-28', 0, 'cukur-68db600641f18-wuDSVlkQ12YUW8XgdI', '2025-09-30 03:43:50', '2025-09-30 03:43:50', '0000-00-00 00:00:00'),
(276, 1, 0, 7, 'Beras', 200000, 'Buat ortu beli beras', '2025-09-30', 0, 'beras-68dbb7d451b3c-eSGNkoFJcTtPIjq8h_', '2025-09-30 09:58:28', '2025-09-30 09:58:28', '0000-00-00 00:00:00'),
(277, 1, 0, 2, 'Pls listrik', 53000, '75.20 kWh', '2025-09-30', 0, 'pls-listrik-68dbb84b4058a-gl-xAciS4LbJzkvKPV', '2025-09-30 10:00:27', '2025-09-30 10:00:27', '0000-00-00 00:00:00'),
(278, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-09-30', 0, 'jajan-68dbb8a4ea8b0-Ap1GVsu2tP0rjYJHBn', '2025-09-30 10:01:56', '2025-09-30 10:01:56', '0000-00-00 00:00:00'),
(279, 1, 0, 7, 'Kado', 50000, 'Kado nihakan mas ika (mba vivin)', '2025-09-30', 0, 'kado-68dbb954c0e83-fQ1eyYlXO6KSBWTpdJ', '2025-09-30 10:04:52', '2025-09-30 10:04:52', '0000-00-00 00:00:00'),
(280, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-10-01', 0, 'jajan-68df4d144f3d9-XuZzp9Aj1kPMGqdCwb', '2025-10-03 03:12:04', '2025-10-03 03:12:04', '0000-00-00 00:00:00'),
(281, 1, 6, 1, 'Coba nasi kebuli', 71500, 'Nasi kebuli di alturkia', '2025-10-02', 0, 'coba-nasi-kebuli-68df4d3bad9c3-Ar_zv2bk9-REIWtDKU', '2025-10-03 03:12:43', '2025-10-03 03:12:43', '0000-00-00 00:00:00'),
(282, 1, 0, 1, 'Jajan', 3000, 'Jajan di kantor', '2025-10-03', 0, 'jajan-68df4d5225b6d-zdKq8mjP6hsQu9rMYF', '2025-10-03 03:13:06', '2025-10-03 03:13:06', '0000-00-00 00:00:00'),
(283, 1, 0, 7, 'Melayat', 5000, 'Innalilahi wainnailaihi rojiun', '2025-10-03', 0, 'melayat-68df4e7718cb8-sfLzny2EkihaT_NKC4', '2025-10-03 03:17:59', '2025-10-03 03:17:59', '0000-00-00 00:00:00'),
(284, 1, 0, 1, 'Nasi', 10000, 'Makan siang', '2025-10-03', 0, 'nasi-68df65d689bf5-iAu6MQZYJxmDt7PLvW', '2025-10-03 04:57:42', '2025-10-03 04:57:42', '0000-00-00 00:00:00'),
(285, 1, 0, 1, 'Jajan', 20000, 'Jajan di kantor', '2025-10-08', 0, 'jajan-68e736a8d256d-q8gWP9ivH0mjBpf1-s', '2025-10-09 03:14:32', '2025-10-09 03:14:32', '0000-00-00 00:00:00'),
(286, 1, 0, 1, 'Bekele', 10000, 'Makan sama temen kantor', '2025-10-09', 0, 'bekele-68e736d38b70d-f2XMU7pmzr0u9Fa81k', '2025-10-09 03:15:15', '2025-10-09 03:15:15', '0000-00-00 00:00:00'),
(287, 1, 0, 4, 'Bensin + isi angin', 30000, 'Pertamina sayang sayang + isi nitrogen', '2025-10-10', 0, 'bensin-isi-angin-68eb1e7add812-OldMV18p_6Wg3iayLY', '2025-10-12 02:20:26', '2025-10-12 02:20:26', '0000-00-00 00:00:00'),
(288, 1, 0, 1, 'Jajan', 2000, 'Jajan di kantor', '2025-10-10', 0, 'jajan-68eb1e93d0a7e-Z2uB6_-MKlOmA7v5xj', '2025-10-12 02:20:51', '2025-10-12 02:20:51', '0000-00-00 00:00:00'),
(289, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-10-14', 0, 'jajan-68eee46dee8f0-LZElvSy2-x0Gbs7iBR', '2025-10-14 23:01:49', '2025-10-14 23:01:49', '0000-00-00 00:00:00'),
(290, 1, 0, 6, 'Ruby', 150000, 'Shampo natur, conditioner, hair tonic + sabun harmony + mama lemon + ultramilk 1L', '2025-10-14', 0, 'ruby-68eee58e50c94-zbDOFIeKMAUvHPqugj', '2025-10-14 23:06:38', '2025-10-14 23:06:38', '0000-00-00 00:00:00'),
(291, 1, 5, 5, 'Kuota', 42000, 'Kuota 16gb telkomsel', '2025-10-16', 0, 'kuota-68f076da0ef81-Jq8a7TtLSMADR_CEOy', '2025-10-16 03:38:50', '2025-10-16 03:38:50', '0000-00-00 00:00:00'),
(292, 1, 0, 7, 'Thanks', 100000, 'To vin', '2025-10-16', 0, 'thanks-68f113451d2f1-jguwB59o1CRUVy7SY4', '2025-10-16 14:46:13', '2025-10-20 10:22:42', '2025-10-20 18:22:42'),
(293, 1, 0, 1, 'jajan', 10000, 'jajan di kantor', '2025-10-17', 0, 'jajan-68f267969e97b-kdMhbo5m-0AuqesfRN', '2025-10-17 14:58:14', '2025-10-17 14:58:14', '0000-00-00 00:00:00'),
(294, 1, 0, 7, 'For moms and baby', 40000, 'Untuk menjenguk mba feby and the baby', '2025-10-20', 0, 'for-moms-and-baby-68f61b4334f03--zIYSW15rAwEyHkKhj', '2025-10-20 10:21:39', '2025-10-20 10:21:39', '0000-00-00 00:00:00'),
(295, 1, 0, 7, 'Vin', 40000, 'Vin-> mba feb', '2025-10-20', 0, 'vin-68f61b7317810-VDGKdv12tEnpshFoJL', '2025-10-20 10:22:27', '2025-10-22 13:21:41', '2025-10-22 21:21:41'),
(296, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor', '2025-10-21', 0, 'jajan-68f7678859a50-HKey4PsCiT7WUDaB0O', '2025-10-21 09:59:20', '2025-10-21 09:59:20', '0000-00-00 00:00:00'),
(297, 1, 6, 1, 'Es jeli mangga', 16000, '2 es jeli mangga di nino', '2025-10-21', 0, 'es-jeli-mangga-68f79c2dd5f06-4Ep-wGM2fn0ViOT8qd', '2025-10-21 13:43:57', '2025-10-21 13:43:57', '0000-00-00 00:00:00'),
(298, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-10-22', 0, 'bensin-68f8e86962937-mbOIFY0p3Rkx9H6UoD', '2025-10-22 13:21:29', '2025-10-22 13:21:29', '0000-00-00 00:00:00'),
(299, 1, 6, 5, 'Wifi okto', 218150, 'Wifi bulan oktober 2025', '2025-10-26', 0, 'wifi-okto-68fd43491c7d7-kdMU-QagnWjyzP6X8r', '2025-10-25 20:38:17', '2025-10-25 20:38:17', '0000-00-00 00:00:00'),
(300, 1, 6, 1, 'Bakso majid', 69000, 'Bakso beranak daging + salad bowl', '2025-10-23', 0, 'bakso-majid-68fd461ca7356-iR4vP-IJZF9130Mqh_', '2025-10-25 20:50:20', '2025-10-25 20:50:20', '0000-00-00 00:00:00'),
(301, 1, 6, 1, 'Majid', 40000, 'Vin -> tanggung juluk', '2025-10-23', 0, 'majid-68fd463e29f36-zFwaJthIl1SUPxCjnT', '2025-10-25 20:50:54', '2025-10-28 13:56:08', '2025-10-28 21:56:08'),
(302, 1, 0, 1, 'Jajan', 8000, 'Jajan di kantor 3k + dawet 5k', '2025-10-24', 0, 'jajan-68fd46795f5ad-HvQxYPUWEsoSu2ZjF1', '2025-10-25 20:51:53', '2025-10-25 20:51:53', '0000-00-00 00:00:00'),
(303, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-10-28', 0, 'jajan-690194d7cbd85-Ld_H6ZS94lUY2OXvPg', '2025-10-29 03:15:19', '2025-10-29 03:15:19', '0000-00-00 00:00:00'),
(304, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-10-29', 0, 'jajan-690194e6b2367-ZdxML-8Eoz1AUX4trR', '2025-10-29 03:15:34', '2025-10-29 03:15:34', '0000-00-00 00:00:00'),
(305, 1, 0, 1, 'Jajan', 5000, 'Bakpao keliling di masjid', '2025-10-29', 0, 'jajan-69019514dc25d-IBxmMoyF62KCXaiftL', '2025-10-29 03:16:20', '2025-10-29 03:16:20', '0000-00-00 00:00:00'),
(306, 1, 6, 1, 'Grill', 50000, 'Grill with kuliah friend', '2025-10-31', 0, 'grill-6905d122356ca-FZ_gzu6joV4qACLBfc', '2025-11-01 08:21:38', '2025-11-01 08:21:38', '0000-00-00 00:00:00'),
(307, 1, 6, 7, 'Kas the boys', 25000, 'Kas buat pengajian di kantor', '2025-10-31', 0, 'kas-the-boys-6905d15b93c90-QZDIUeu7dHkc1qFfWR', '2025-11-01 08:22:35', '2025-11-01 08:22:35', '0000-00-00 00:00:00'),
(308, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-10-31', 0, 'bensin-6905d17a22a66-dr_s3xQcHP1YG8ZOBl', '2025-11-01 08:23:06', '2025-11-01 08:23:06', '0000-00-00 00:00:00'),
(309, 1, 0, 1, 'Nasi padang', 23000, 'Nasi padang lestari deket gacoan', '2025-10-31', 0, 'nasi-padang-6905d1a8cc2ef-RnJ0jqOHUB43EFSdQ7', '2025-11-01 08:23:52', '2025-11-01 08:23:52', '0000-00-00 00:00:00'),
(310, 1, 0, 7, 'Jajan', 10000, 'Jajan vin di kantor', '2025-10-29', 0, 'jajan-6905d26da63d8-RIPmQFw3bCx9cUtGDB', '2025-11-01 08:27:09', '2025-11-01 08:27:09', '0000-00-00 00:00:00'),
(311, 1, 0, 1, 'jajan', 7000, 'jajan dikantor (bayar utang hari jumat 31 okto 2025)', '2025-11-03', 0, 'jajan-6908c449222ce-Y5bKe4HFqhvZ_mLWyC', '2025-11-03 14:03:37', '2025-11-03 14:03:37', '0000-00-00 00:00:00'),
(312, 1, 0, 1, 'Jajan', 11000, 'Jajan di kantor + vin', '2025-11-04', 0, 'jajan-690a1b2993f84-qkQK0sjC5dAOobYyDX', '2025-11-04 14:26:33', '2025-11-04 14:26:33', '0000-00-00 00:00:00'),
(313, 1, 0, 1, 'Air + ultramilk', 13000, 'Alfamart + parkir', '2025-11-04', 0, 'air-ultramilk-690a1b5c9e572-8XIRgtNxBjslA3S_qQ', '2025-11-04 14:27:24', '2025-11-04 14:27:24', '0000-00-00 00:00:00'),
(314, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-11-05', 0, 'jajan-690c219e961ef--vwYOsPLcDaKENGnC2', '2025-11-06 03:18:38', '2025-11-06 03:18:38', '0000-00-00 00:00:00'),
(315, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-11-06', 0, 'bensin-690c21b532e19-sZgUdeCa9FW8BKwLAn', '2025-11-06 03:19:01', '2025-11-06 03:19:01', '0000-00-00 00:00:00'),
(316, 1, 0, 1, 'Geprek', 16000, 'Geprek 2', '2025-11-06', 0, 'geprek-690efa172a933-eUW6_XclwnLh5JqZC4', '2025-11-08 07:06:47', '2025-11-08 07:06:47', '0000-00-00 00:00:00'),
(317, 1, 0, 1, 'Jajan', 4000, 'Jajan di kantor', '2025-11-07', 0, 'jajan-690efa3dbfb82-BkaAzUg7cQ-9ZCRfEm', '2025-11-08 07:07:25', '2025-11-08 07:07:25', '0000-00-00 00:00:00'),
(318, 1, 0, 1, 'Mie', 9000, 'Beli mie di alfamart + bayar parkir', '2025-11-09', 0, 'mie-69107629e0298-mB_73ip1OoHJhaK6wF', '2025-11-09 10:08:25', '2025-11-09 10:08:25', '0000-00-00 00:00:00'),
(319, 1, 0, 1, 'Geprek', 16000, 'Geprek kekalik 2 cabang sayang sayang', '2025-11-09', 0, 'geprek-691076d76a72f-uUKlCfJa41xDeFni8t', '2025-11-09 10:11:19', '2025-11-09 10:11:19', '0000-00-00 00:00:00'),
(320, 1, 0, 1, 'Jajan', 10000, 'Jajan di kantor', '2025-11-12', 0, 'jajan-6915f4065e894-X6kuKWfLBnpOja2PlU', '2025-11-13 14:06:46', '2025-11-13 14:06:46', '0000-00-00 00:00:00'),
(321, 1, 0, 1, 'Jajan', 4000, 'Jajan di kantor', '2025-11-11', 0, 'jajan-6915f46be3f59-YNAIjdMgXqpWKmJe1w', '2025-11-13 14:08:27', '2025-11-13 14:08:27', '0000-00-00 00:00:00'),
(322, 1, 0, 1, 'Bukber padang', 35000, 'Padang lestari + parkir 2k', '2025-11-10', 0, 'bukber-padang-6915f4e57c301-hlz7kdFmw3tBnEI2aJ', '2025-11-13 14:10:29', '2025-11-13 14:10:29', '0000-00-00 00:00:00'),
(323, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-11-14', 0, 'jajan-6916a52ea8788-nJ_x9-CBPquLHcG5KW', '2025-11-14 02:42:38', '2025-11-14 02:42:38', '0000-00-00 00:00:00'),
(324, 1, 5, 2, 'Token listrik', 53000, 'Listrik bulan nov (75.20 kWh)', '2025-11-14', 0, 'token-listrik-69171cc569a23-mHRNPLOgCBsvz8wUW_', '2025-11-14 11:12:53', '2025-11-14 11:12:53', '0000-00-00 00:00:00'),
(325, 1, 5, 5, 'Kuota', 42000, '16gb ', '2025-11-15', 0, 'kuota-6918611e7e6bb-lj3GxvoE7ic6OUDImL', '2025-11-15 10:16:46', '2025-11-15 10:16:46', '0000-00-00 00:00:00'),
(326, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-11-14', 0, 'bensin-6919c5bc10094-NnSfvk8XGcugA6Y943', '2025-11-16 11:38:20', '2025-11-16 11:38:20', '0000-00-00 00:00:00'),
(327, 1, 0, 1, 'Bukber', 50000, 'Lalapan 2 (vivinus)', '2025-11-17', 0, 'bukber-691da8b1bfb05-gYAQDlPs5i0G_KNoeL', '2025-11-19 10:23:29', '2025-11-19 10:23:29', '0000-00-00 00:00:00'),
(328, 1, 0, 1, 'Es jelly kurma', 12000, 'Ngentuk an (vivinus) 4k', '2025-11-17', 0, 'es-jelly-kurma-691da911e3e95-NdW3weV1jXQROxpv97', '2025-11-19 10:25:05', '2025-11-19 10:25:05', '0000-00-00 00:00:00'),
(329, 1, 6, 9, 'Dp jersey', 65000, 'Jersey the boys id', '2025-11-18', 0, 'dp-jersey-691da9d389566-5wEva2TdOmSlJYiFUP', '2025-11-19 10:28:19', '2025-11-19 10:28:19', '0000-00-00 00:00:00'),
(330, 1, 0, 1, 'Jajan', 6000, 'Jajan di kantor (atis)', '2025-11-18', 0, 'jajan-691daaabc28d0-g10YoN5cpQlkwFxrSM', '2025-11-19 10:31:55', '2025-11-19 10:31:55', '0000-00-00 00:00:00'),
(331, 1, 0, 1, 'Jajan', 3000, 'Jajan di kantor', '2025-11-18', 0, 'jajan-691daac0c7e45-e1f24j5ta_iybnqVXs', '2025-11-19 10:32:16', '2025-11-19 10:32:16', '0000-00-00 00:00:00'),
(332, 1, 0, 1, 'Soto', 20000, 'Soto 10k hilang 10k', '2025-11-20', 0, 'soto-691fd55d8ac27-zENlteDcT8d6xsZbXp', '2025-11-21 01:58:37', '2025-11-21 01:58:37', '0000-00-00 00:00:00'),
(333, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-11-21', 0, 'jajan-691fd57687471-Qhfm3s6LSi28HJMWFe', '2025-11-21 01:59:02', '2025-11-21 01:59:02', '0000-00-00 00:00:00'),
(334, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-11-22', 0, 'bensin-6921c2b6cd9ca-NvWB5L7CUV-Ri2hYye', '2025-11-22 13:03:34', '2025-11-22 13:03:34', '0000-00-00 00:00:00'),
(335, 1, 0, 1, 'Air', 21000, 'Air gelasan narmada', '2025-11-22', 0, 'air-6921c4094ca07-AGj5a3x1TI7S_dwpNO', '2025-11-22 13:09:13', '2025-11-22 13:09:13', '0000-00-00 00:00:00'),
(336, 1, 6, 5, 'Wifi nov', 218150, 'Wifi bulan november ', '2025-11-23', 0, 'wifi-nov-692315340164f-s6GcjheyA8ECSdPuX4', '2025-11-23 13:07:48', '2025-11-23 13:07:48', '0000-00-00 00:00:00'),
(337, 1, 0, 1, 'Jajan', 4000, 'Jajan di kantor', '2025-11-25', 0, 'jajan-6925c1b630392-RNtCGdwHWkyqVf16lL', '2025-11-25 13:48:22', '2025-11-25 13:48:22', '0000-00-00 00:00:00'),
(338, 1, 0, 1, 'Alfamart + jajan', 25000, 'Ultramilk 750ml + air mineral + jajan di kantor 2k', '2025-11-28', 0, 'alfamart-jajan-6928ff69c3c81-N-9TAhLsJgpdn32R75', '2025-11-28 00:48:25', '2025-11-28 00:48:25', '0000-00-00 00:00:00'),
(339, 1, 6, 9, 'Jersey the boys', 75000, 'Pelunasan jersey', '2025-11-28', 0, 'jersey-the-boys-6929b8b801833-dJvK4c_68NSMmxlOQi', '2025-11-28 13:59:04', '2025-11-28 13:59:04', '0000-00-00 00:00:00'),
(340, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-11-28', 0, 'bensin-6929b8cf364cd-wlVqeFQM65z7-Asg9T', '2025-11-28 13:59:27', '2025-11-28 13:59:27', '0000-00-00 00:00:00'),
(341, 1, 0, 4, 'Isi angin', 10000, 'Isi pakai nitrogen pertamina sayang sayang', '2025-11-28', 0, 'isi-angin-6929b8f2b92cc-gBSqH7c18NvLfFs2KZ', '2025-11-28 14:00:02', '2025-11-28 14:00:02', '0000-00-00 00:00:00'),
(342, 1, 0, 8, 'Hiking', 15000, 'Dp tektok bao daya', '2025-11-28', 0, 'hiking-692ad547b1640-r7k4g6xT1jJC-izGBo', '2025-11-29 10:13:11', '2025-11-29 10:13:11', '0000-00-00 00:00:00'),
(343, 1, 0, 1, 'Geprek', 10000, 'Geprek fillet', '2025-12-01', 0, 'geprek-692dbb049ca17-M3OYJR2scwrH9e-iCS', '2025-12-01 14:57:56', '2025-12-01 14:57:56', '0000-00-00 00:00:00'),
(344, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-12-02', 0, 'jajan-692e66f6550d3-A_eY2DC1x3dHZOjQBf', '2025-12-02 03:11:34', '2025-12-02 03:11:34', '0000-00-00 00:00:00'),
(345, 1, 0, 8, 'badminton', 16000, 'bayar iuran untuk sewa lapangan', '2025-12-04', 0, 'badminton-6936caf2dd361-4onVC83AxTs6UfLIre', '2025-12-08 11:56:18', '2025-12-08 11:56:18', '0000-00-00 00:00:00'),
(346, 1, 0, 1, 'jajan', 5000, 'jajan di kantor', '2025-12-05', 0, 'jajan-6936cb09a2eb4-yRbqYKdVzI6HoF1m8u', '2025-12-08 11:56:41', '2025-12-08 11:56:41', '0000-00-00 00:00:00'),
(347, 1, 0, 1, 'susu ultramilk', 22000, 'tambahan protein (alfamart) nitip di lailai & vivinus', '2025-12-05', 0, 'susu-ultramilk-6936cb9b3ca5e-a1kFl7N9Q3HM6dK-wT', '2025-12-08 11:59:07', '2025-12-08 11:59:07', '0000-00-00 00:00:00'),
(348, 1, 0, 1, 'grill', 65000, 'saya iuran untuk beli daging', '2025-12-05', 0, 'grill-6936cbf45b60e-MA7Bj6gIVRXqQnFKye', '2025-12-08 12:00:36', '2025-12-08 12:00:36', '0000-00-00 00:00:00'),
(349, 1, 0, 1, 'Jajan', 5000, 'Jajan dikantor', '2025-12-09', 0, 'jajan-69395f3abd0fb-8VWmuOMxcra6lETSoN', '2025-12-10 10:53:30', '2025-12-10 10:53:30', '0000-00-00 00:00:00'),
(350, 1, 0, 1, 'Jajan', 13000, 'Jajan di kantor (jajan mba dewi + esjel nino)', '2025-12-10', 0, 'jajan-69395f69a47f3-Y61ZnmQyFhKe8HJUGE', '2025-12-10 10:54:17', '2025-12-10 10:54:17', '0000-00-00 00:00:00'),
(351, 1, 0, 1, 'Jajan', 13000, 'Jajan di kantor (jajan mba dew + esjel nino)', '2025-12-12', 0, 'jajan-693c37e436fc4-tn-c2pVrGHohjWJz7u', '2025-12-12 14:42:28', '2025-12-12 14:42:28', '0000-00-00 00:00:00'),
(352, 1, 0, 1, 'Bakso', 30000, 'Bakso jumbo 2', '2025-12-11', 0, 'bakso-693c3872cd300-ciVp2yvM-OxqUn3uDH', '2025-12-12 14:44:50', '2025-12-12 14:44:50', '0000-00-00 00:00:00'),
(353, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2025-12-09', 0, 'bensin-693c3bceca460-_teKI0sLB5uvohNgAZ', '2025-12-12 14:59:11', '2025-12-12 14:59:11', '0000-00-00 00:00:00'),
(354, 1, 0, 1, 'Pop mie', 33500, 'Pop mie + yakult + roti', '2025-12-10', 0, 'pop-mie-693c3cc0552d9-tiRIUOThrdq5xj6WnS', '2025-12-12 15:03:12', '2025-12-12 15:03:12', '0000-00-00 00:00:00'),
(355, 1, 0, 7, 'Obat', 6000, 'Belikan amak oat', '2025-12-11', 0, 'obat-693c3cf41fba1-J1vVFmnxa0UyWXKfL9', '2025-12-12 15:04:04', '2025-12-12 15:04:04', '0000-00-00 00:00:00'),
(356, 1, 5, 6, 'Belanja', 109104, 'Belanja di shope (boneka + pelembab muka + penutup knalpot)', '2025-12-12', 0, 'belanja-693c3fdb772cf-L7Ao1utY-lWSe9EJOg', '2025-12-12 15:16:27', '2025-12-12 15:16:27', '0000-00-00 00:00:00'),
(357, 1, 0, 9, 'Cukur', 62000, 'Cukur ivy league (pennylane)', '2025-12-13', 0, 'cukur-693d850383aee-lewNoWHEcxy9rkUXYa', '2025-12-13 14:23:47', '2025-12-13 14:23:47', '0000-00-00 00:00:00'),
(358, 1, 6, 5, 'Kuota', 42000, 'Kuota telkom 16gb 42k', '2025-12-16', 0, 'kuota-6940e56871307-z_ZFpUs8aNgoSvVDKB', '2025-12-16 03:51:52', '2025-12-16 03:51:52', '0000-00-00 00:00:00'),
(359, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-12-16', 0, 'jajan-6940e58748188-dKxuEFeq4m9PN3Gsnh', '2025-12-16 03:52:23', '2025-12-16 03:52:23', '0000-00-00 00:00:00'),
(360, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-12-17', 0, 'jajan-6943802287002-_HNheRK5VxM2LFi780', '2025-12-18 03:16:34', '2025-12-18 03:16:34', '0000-00-00 00:00:00'),
(361, 1, 0, 1, 'Jajan', 10000, 'Jajan di kantor', '2025-12-19', 0, 'jajan-6945772db61bf-5Y3ExZv9O0up1FqfGo', '2025-12-19 15:02:53', '2025-12-19 15:02:53', '0000-00-00 00:00:00'),
(362, 1, 0, 4, 'Ganti oli', 65000, 'Ganti oli, bengkel deket kantor', '2025-12-21', 0, 'ganti-oli-6948cee35107c-5GSIzyBfkXUN4_mhAT', '2025-12-22 03:53:55', '2025-12-22 03:53:55', '0000-00-00 00:00:00'),
(363, 1, 0, 4, 'Bensin pertamax', 40000, 'Pertamax isi full, pertamina sayang sayang', '2025-12-20', 0, 'bensin-pertamax-6948cf65b8266-SZHDMQvN2hWOxFJIt_', '2025-12-22 03:56:05', '2025-12-22 03:56:05', '0000-00-00 00:00:00'),
(364, 1, 6, 10, 'Beli hp', 500000, 'Beli aset summit (hp samsung a05)', '2025-12-23', 0, 'beli-hp-694a7f2706369-dv5fZn1oEsQJMm2DI8', '2025-12-23 10:38:15', '2025-12-23 10:38:15', '0000-00-00 00:00:00'),
(365, 1, 0, 1, 'Cilok', 10000, 'Cilok pong', '2025-12-22', 0, 'cilok-694a7f61683c8-PURd_LTx6hgtwaAlKD', '2025-12-23 10:39:13', '2025-12-23 10:39:13', '0000-00-00 00:00:00'),
(366, 1, 5, 2, 'Pulsa listrik', 53000, 'Pulsa listrik bulan des', '2025-12-26', 0, 'pulsa-listrik-694e4c9d20b0b-SlrWRiYcPCEmdp5JB3', '2025-12-26 07:51:41', '2025-12-26 07:51:41', '0000-00-00 00:00:00'),
(367, 1, 6, 5, 'Wifi des', 219000, 'Tagihan wifi bulan desember', '2025-12-26', 0, 'wifi-des-694e4cc24c7d6-i-KDf7FBOWoZwAamgq', '2025-12-26 07:52:18', '2025-12-26 07:52:18', '0000-00-00 00:00:00'),
(368, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-12-24', 0, 'jajan-694e4dd19d886-HD9_Qz47o3OeUncmui', '2025-12-26 07:56:49', '2025-12-26 07:56:49', '0000-00-00 00:00:00'),
(369, 1, 0, 8, 'Dp badminton', 10000, 'Dp untuk main badminton', '2025-12-24', 0, 'dp-badminton-694e4e359ea43-Im2FqShU0pGWOvXsMD', '2025-12-26 07:58:29', '2025-12-26 07:58:29', '0000-00-00 00:00:00'),
(370, 1, 0, 1, 'Buka', 47500, 'Buka puasa (ultramilk 1l, indomie 2, yakult, cimory)', '2025-12-25', 0, 'buka-694e4ebbd1cb2-MI-xeA9qSGRgiVbUkv', '2025-12-26 08:00:43', '2025-12-26 08:00:43', '0000-00-00 00:00:00'),
(371, 1, 0, 10, 'Badminton', 10000, 'Badminton di keri', '2026-01-03', 0, 'badminton-695942cbb1977-cs420eGFHa6j3rNtwl', '2026-01-03 15:24:43', '2026-01-03 15:24:43', '0000-00-00 00:00:00'),
(372, 1, 0, 1, 'Jus buah', 12000, 'Jus buah di depan sd dan smp 4 mataram (parkir 2k di alfamart)', '2026-01-02', 0, 'jus-buah-695942fb1c835-YqkZKTc134VnublE_r', '2026-01-03 15:25:31', '2026-01-03 15:25:31', '0000-00-00 00:00:00'),
(373, 1, 0, 8, 'Ke pantai', 62000, 'Jajan alfamart + gorengan + biaya masuk pantai dan parkirnya', '2025-12-28', 0, 'ke-pantai-6959437b3adca-BComvrK6zRfkTdX8PF', '2026-01-03 15:27:39', '2026-01-03 15:27:39', '0000-00-00 00:00:00'),
(374, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2025-12-30', 0, 'jajan-695943dea41d7-NCMJIjPGTBELhYHxke', '2026-01-03 15:29:18', '2026-01-03 15:29:18', '0000-00-00 00:00:00'),
(375, 1, 0, 6, 'Ruby', 97000, 'Beli keperluan bulanan', '2025-12-30', 0, 'ruby-6959441790285-3ceulKDksboEyImCSz', '2026-01-03 15:30:15', '2026-01-03 15:30:15', '0000-00-00 00:00:00'),
(376, 1, 0, 1, 'Onde onde mini', 15000, 'For orang rumah', '2025-12-30', 0, 'onde-onde-mini-6959443272bb0-qcFM8iTGPjSe7Jf_pI', '2026-01-03 15:30:42', '2026-01-03 15:30:42', '0000-00-00 00:00:00'),
(377, 1, 0, 1, 'Jajan', 4000, 'Jajan di kantor', '2025-12-31', 0, 'jajan-695944527537c-dmsUjvJS2auI4Zb9F1', '2026-01-03 15:31:14', '2026-01-03 15:31:14', '0000-00-00 00:00:00'),
(378, 1, 5, 9, 'Celana training', 122855, 'Training dari v', '2026-01-01', 0, 'celana-training-695944998387f-wc-qs_yMRY6ov8xATI', '2026-01-03 15:32:25', '2026-01-03 15:32:25', '0000-00-00 00:00:00'),
(379, 1, 0, 1, 'Buka puasa', 14500, 'Mie 2 + ultramilk 250ml', '2026-01-01', 0, 'buka-puasa-6959457834568-xNfm8LQ5nhAWUV_27E', '2026-01-03 15:36:08', '2026-01-03 15:36:08', '0000-00-00 00:00:00'),
(380, 1, 0, 1, 'Jus alpukat', 38000, 'Keju + ultramilk 200ml 3 + es batu + skm', '2026-01-04', 0, 'jus-alpukat-695a6742095e8-mhuep5w_HxrskLVtgA', '2026-01-04 12:12:34', '2026-01-04 12:12:34', '0000-00-00 00:00:00'),
(381, 1, 0, 1, 'Bahan jus alpukat', 6000, 'Es batu, skm, nutrisari', '2026-01-05', 0, 'bahan-jus-alpukat-695c914ff070b-IQKNLuv5fihnHFc6mA', '2026-01-06 03:36:31', '2026-01-06 03:36:31', '0000-00-00 00:00:00'),
(382, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2026-01-07', 0, 'jajan-695f39a3a4dc0-vpCgsfWmQzAlRZruij', '2026-01-08 03:59:15', '2026-01-08 03:59:15', '0000-00-00 00:00:00'),
(383, 1, 0, 4, 'Bensin + isi angin', 28000, 'Pertamina pagutan + isi nitrogen (8k)', '2026-01-07', 0, 'bensin-isi-angin-696103d094ccd-TbtPr0Oye28CwR6LAJ', '2026-01-09 12:34:08', '2026-01-09 12:34:08', '0000-00-00 00:00:00'),
(384, 1, 0, 1, 'Jajan', 5000, 'Jajan di kantor', '2026-01-09', 0, 'jajan-6961040982d0d-sO64pdyU8iTIFwNEtD', '2026-01-09 12:35:05', '2026-01-09 12:35:05', '0000-00-00 00:00:00'),
(385, 1, 0, 7, 'Hibah', 10000, 'For people', '2026-01-09', 0, 'hibah-696104f887463-RajGWuJzlAbBhV0CqT', '2026-01-09 12:39:04', '2026-01-09 12:39:04', '0000-00-00 00:00:00'),
(386, 1, 0, 10, 'Badminton', 10000, 'Bayar main', '2026-01-10', 0, 'badminton-6963a1ee171c6--5nZGTEOsogx2Mmdfa', '2026-01-11 12:13:18', '2026-01-11 12:13:18', '0000-00-00 00:00:00'),
(387, 1, 6, 11, 'Raket badminton', 300000, 'Raket brand RS free senar + grip + tas', '2026-01-13', 0, 'raket-badminton-696871034ada1-zespU1WMqyjxkTu6-Z', '2026-01-15 03:45:55', '2026-01-15 03:45:55', '0000-00-00 00:00:00'),
(388, 1, 0, 11, 'Badminton', 10000, 'Main badminton di lap kekeri', '2026-01-17', 0, 'badminton-696dbaff470f7-mevKcSYVwGR0H_IkBF', '2026-01-19 04:02:55', '2026-01-19 04:02:55', '0000-00-00 00:00:00'),
(389, 1, 0, 11, 'Badminton', 30000, 'Badminton with temen kantor', '2026-01-14', 0, 'badminton-696dbb28a5eea-jW4zJ2hDBV0S-rpNkM', '2026-01-19 04:03:36', '2026-01-19 04:03:36', '0000-00-00 00:00:00'),
(390, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2026-01-19', 0, 'bensin-696dbb8ef2e75-Bj5vMXW-sydTUeZ_z0', '2026-01-19 04:05:19', '2026-01-19 04:05:19', '0000-00-00 00:00:00'),
(391, 1, 0, 1, 'Geprek', 16000, 'Geprek 2 di nu lauk', '2026-01-22', 0, 'geprek-697226f97a68e-NkM8Ccwh4DraGERHft', '2026-01-22 12:32:41', '2026-01-22 12:32:41', '0000-00-00 00:00:00'),
(392, 1, 6, 1, 'Kwetiau', 22000, 'Kwetiau kejaksaan', '2026-01-21', 0, 'kwetiau-697227de32db0-w0WILNDEXoaudypPV1', '2026-01-22 12:36:30', '2026-01-22 12:36:30', '0000-00-00 00:00:00'),
(393, 1, 0, 1, 'Makan siang', 12000, 'Nasi 10k + parkir 2k', '2026-01-23', 0, 'makan-siang-6974b0dc8270f-LKUDxiWnk1Y2rcZCJb', '2026-01-24 10:45:32', '2026-01-24 10:45:32', '0000-00-00 00:00:00'),
(394, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2026-01-24', 0, 'bensin-6974b11b91e4e-hM2iVQ1f4CokuJA7Ye', '2026-01-24 10:46:35', '2026-01-24 10:46:35', '0000-00-00 00:00:00'),
(395, 1, 0, 1, 'Air mineral', 6000, '2 botol tanggung', '2026-01-20', 0, 'air-mineral-6974b212d2a36-fZUh2QWNK71x8wH5u-', '2026-01-24 10:50:42', '2026-01-24 10:50:42', '0000-00-00 00:00:00'),
(396, 1, 0, 11, 'Badminton', 10000, 'Main badminton lapangan keri', '2026-01-24', 0, 'badminton-6974b25c051e6-gRPtzdxGUnZs9obl6M', '2026-01-24 10:51:56', '2026-01-24 10:51:56', '0000-00-00 00:00:00'),
(397, 1, 0, 1, 'Seblak', 52000, 'Seblak untuk my inak', '2026-01-24', 0, 'seblak-6974eeed5e4bf-xSnsC3NJy4HoR6Vm5u', '2026-01-24 15:10:21', '2026-01-24 15:10:21', '0000-00-00 00:00:00'),
(398, 1, 6, 5, 'Wifi Jan', 219000, 'Tagihan wifi bulan januari 2026', '2026-01-27', 0, 'wifi-jan-6982d4616b2fd-o8vp5lCdNT0GD-cfhM', '2026-02-04 04:08:49', '2026-02-04 04:08:49', '0000-00-00 00:00:00'),
(399, 1, 0, 1, 'Geprek', 16000, 'Geprek di sayang sayang', '2026-02-01', 0, 'geprek-6982d4c424594-mD-RM6s4YXiyFc9rjC', '2026-02-04 04:10:28', '2026-02-04 04:10:28', '0000-00-00 00:00:00'),
(400, 1, 0, 1, 'Sate tanjung', 20000, 'Beli di sahbi lauk', '2026-02-01', 0, 'sate-tanjung-6982fdfa7d78b-mNXxPoK3cRS69jdLGU', '2026-02-04 07:06:18', '2026-02-04 07:06:18', '0000-00-00 00:00:00'),
(401, 1, 0, 1, 'Grill', 50000, 'Bahan grill & camp', '2026-02-07', 0, 'grill-6989648f63a9c-6R_h3i9Fg8YoAMjytm', '2026-02-09 03:37:35', '2026-02-09 03:37:35', '0000-00-00 00:00:00'),
(402, 1, 0, 1, 'Nasi campur', 15000, 'Nasi campur di klu pemenang', '2026-02-08', 0, 'nasi-campur-698964efa3689-sSRzudTC-m6NvGpV73', '2026-02-09 03:39:11', '2026-02-09 03:39:11', '0000-00-00 00:00:00'),
(403, 1, 0, 1, 'Nasgor', 30000, 'Nasgor 2 (not recom)', '2026-02-11', 0, 'nasgor-698c9c6d7bc65-vs6DgWqHzSXUAPfn-e', '2026-02-11 14:12:45', '2026-02-11 14:12:45', '0000-00-00 00:00:00'),
(404, 1, 0, 1, 'Ultramilk 1L', 22500, 'Beli di alfamart keri', '2026-02-09', 0, 'ultramilk-1l-698c9d9c6ae7a-SG_Z41dkJLWpIa32YB', '2026-02-11 14:17:48', '2026-02-11 14:17:48', '0000-00-00 00:00:00'),
(405, 1, 0, 1, 'Lalapan', 18000, 'Perempatan sayang sayang', '2026-02-09', 0, 'lalapan-698c9dcd23849-Kej1_aRnJhEVDgMBco', '2026-02-11 14:18:37', '2026-02-11 14:18:37', '0000-00-00 00:00:00'),
(406, 1, 6, 7, 'Surprise', 30000, 'Ultah mba feby', '2026-02-04', 0, 'surprise-698c9ff87a4b1-ptqeG0chjPuCHkdMT-', '2026-02-11 14:27:52', '2026-02-11 14:27:52', '0000-00-00 00:00:00'),
(407, 1, 0, 7, 'Hibah', 10000, 'For mas tinus family (sad)', '2026-02-10', 0, 'hibah-698ca06cb2884-HaQc6IAqOYLCv90kTl', '2026-02-11 14:29:48', '2026-02-11 14:29:48', '0000-00-00 00:00:00'),
(408, 1, 5, 2, 'Listrik', 53000, 'Token listrik 75.20 kWh', '2026-02-07', 0, 'listrik-698ca1117c155-buYrBU2ey5kZnRF7Pg', '2026-02-11 14:32:33', '2026-02-11 14:32:33', '0000-00-00 00:00:00'),
(409, 1, 6, 5, 'Kuota', 42000, 'Kuota 16gb', '2026-02-14', 0, 'kuota-69932151affcb-N3OP46n5_yvri7pjme', '2026-02-16 12:53:21', '2026-02-16 12:53:21', '0000-00-00 00:00:00'),
(410, 1, 0, 10, 'Buku', 169000, 'Buku sejarah peradaban islam yang disembunyikan (tamim ansory)', '2026-02-11', 0, 'buku-69932213ba47b-WDiYE1L8Icblg6K2BN', '2026-02-16 12:56:35', '2026-02-16 12:56:35', '0000-00-00 00:00:00'),
(411, 1, 5, 7, 'Adang hud', 100000, 'Unknown, belum di balikin', '2026-01-22', 0, 'adang-hud-69932424bebd4-FitIqUwXey2JYjKg6f', '2026-02-16 13:05:24', '2026-02-16 13:05:24', '0000-00-00 00:00:00'),
(412, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2026-02-14', 0, 'bensin-699324d929817-GUgLms8d2EiZlkhVxB', '2026-02-16 13:08:25', '2026-02-16 13:08:25', '0000-00-00 00:00:00'),
(413, 1, 0, 7, 'Wedding nino', 50000, 'Hadiah for wedding nino', '2026-02-12', 0, 'wedding-nino-699325cc92c18-y9DFxl5nbLE2vWSOU4', '2026-02-16 13:12:28', '2026-02-16 13:12:28', '0000-00-00 00:00:00'),
(414, 1, 0, 1, 'Jus alpukat', 20000, 'Jua alpukat deket sd and smp', '2026-02-13', 0, 'jus-alpukat-69932da88f2a9-wacfD9eX6PldY2p_oN', '2026-02-16 13:46:00', '2026-02-16 13:46:00', '0000-00-00 00:00:00'),
(415, 1, 0, 1, 'Alfamart', 61500, 'Ultramilk 1L * 2, bubuk jelly * 3', '2026-02-23', 0, 'alfamart-69a4563661166-inNcgZwua4mlMWky-7', '2026-03-01 14:07:34', '2026-03-01 14:07:34', '0000-00-00 00:00:00'),
(416, 1, 0, 4, 'Bensin', 20000, 'Pertamina sayang sayang', '2026-02-22', 0, 'bensin-69a457b712ea0-6CRumaSz7q8FN24hi-', '2026-03-01 14:13:59', '2026-03-01 14:13:59', '0000-00-00 00:00:00'),
(417, 1, 0, 7, 'Ultah j', 12000, 'Ultah j, jajan jajanan', '2026-02-23', 0, 'ultah-j-69a45943850fb-opATF1LxCaUPKu8ZYX', '2026-03-01 14:20:35', '2026-03-01 14:20:35', '0000-00-00 00:00:00'),
(418, 1, 6, 5, 'Wifi Feb', 219000, 'Wifi bulan february my repub', '2026-03-01', 0, 'wifi-feb-69a45a5486fad-NPEKxjhBTMnzVFm3du', '2026-03-01 14:25:08', '2026-03-01 14:25:08', '0000-00-00 00:00:00'),
(419, 1, 0, 4, 'Bensin + isi angin', 30000, 'Pertamina sayang sayang (isi nitrogen juga)', '2026-03-05', 0, 'bensin-isi-angin-69ad90e28a5f6-C9qryS4zt8TFQldjYs', '2026-03-08 14:08:18', '2026-03-08 14:08:18', '0000-00-00 00:00:00'),
(420, 1, 0, 1, 'Lauk pauk', 20000, 'Lauk untuk buka ayam suwir + cumi (takjil sayang sayang)', '2026-03-07', 0, 'lauk-pauk-69ad91e0f2278-VFc76uWSTXR9pI4wo8', '2026-03-08 14:12:33', '2026-03-08 14:12:33', '0000-00-00 00:00:00'),
(421, 1, 0, 10, 'amigo', 24000, 'pisau + plastik sampah (beli di amigo)', '2026-03-15', 0, 'amigo-69b6d8262b1d3-U2Wu-V7Dv09bsPQ1LR', '2026-03-15 15:02:46', '2026-03-15 15:02:46', '0000-00-00 00:00:00'),
(422, 1, 5, 2, 'pulsa listrik', 53000, '75.20 kWh', '2026-03-14', 0, 'pulsa-listrik-69b6d8ae5fee8-KmnhrLCt5dpB0XwjM-', '2026-03-15 15:05:02', '2026-03-15 15:05:02', '0000-00-00 00:00:00'),
(423, 1, 6, 1, 'bukber the boys', 46000, 'bukber di bebek pondok galih (kureng)', '2026-03-12', 0, 'bukber-the-boys-69b6dad42074b-S2UrTqwCbQ-Y4nlDfh', '2026-03-15 15:14:12', '2026-03-15 15:14:12', '0000-00-00 00:00:00'),
(424, 1, 0, 11, 'badminton', 5000, 'olahraga sebelum buka puasa', '2026-03-10', 0, 'badminton-69b6de4921c0b-8sR-lCQa93SK_7Tjm1', '2026-03-15 15:28:57', '2026-03-15 15:28:57', '0000-00-00 00:00:00'),
(425, 1, 0, 1, 'es teler', 10000, 'untuk buka puasa selesai main badminton', '2026-03-10', 0, 'es-teler-69b6decb056ee-F2MsqhEQ6SGe4IBcoj', '2026-03-15 15:31:07', '2026-03-15 15:31:07', '0000-00-00 00:00:00'),
(426, 1, 0, 4, 'bensin', 20000, 'pertamina sayang sayang', '2026-03-16', 0, 'bensin-69b814dd93430-h1S49-eIQlCbiGkwMo', '2026-03-16 13:34:05', '2026-03-16 13:34:05', '0000-00-00 00:00:00'),
(427, 1, 6, 5, 'Wifi mar', 219000, 'Wifi bulan maret', '2026-03-28', 0, 'wifi-mar-69c905b0eab89-a-vU1oi_RfYBI6Ag5J', '2026-03-29 09:57:53', '2026-03-29 09:57:53', '0000-00-00 00:00:00'),
(428, 1, 6, 5, 'Kuota', 42000, 'Kuota 16gb', '2026-03-16', 0, 'kuota-69c9062607d52-XMgYDoUTqnRvL3mZrf', '2026-03-29 09:59:50', '2026-03-29 09:59:50', '0000-00-00 00:00:00'),
(429, 1, 0, 7, 'For baby', 50000, 'Untuk anak bang jul', '2026-03-22', 0, 'for-baby-69c9066a20b38-PKnvlUeqDhMQY7Jsim', '2026-03-29 10:00:58', '2026-03-29 10:00:58', '0000-00-00 00:00:00'),
(430, 1, 6, 1, 'Bakso pak majid', 40000, 'Kumpul bersama ex DE (halya)', '2026-03-27', 0, 'bakso-pak-majid-69c906b17a6b0-tODxI3dhg0o8yJN1CR', '2026-03-29 10:02:09', '2026-03-29 10:02:09', '0000-00-00 00:00:00'),
(431, 1, 0, 7, 'THR', 2000000, 'THR for my family', '2026-03-20', 0, 'thr-69c906ec7393a-qK1-7cg5flwj9JaQon', '2026-03-29 10:03:08', '2026-03-29 10:03:08', '0000-00-00 00:00:00'),
(432, 1, 5, 6, 'Belanja ruby', 89000, 'Tisu, sabun muka, hair tonic, sikat gigi', '2026-03-24', 0, 'belanja-ruby-69c908de5dd82-v39-VF4zL7f8qsM2_x', '2026-03-29 10:11:26', '2026-03-29 10:11:26', '0000-00-00 00:00:00'),
(433, 1, 0, 7, 'THR', 300000, 'Thr for someone special', '2026-03-18', 0, 'thr-69c90915998fc-VXhZlPgc6jwaLed2Mz', '2026-03-29 10:12:21', '2026-03-29 10:12:21', '0000-00-00 00:00:00'),
(434, 1, 0, 4, 'Bensin', 10000, 'Pertamina sayang-sayang', '2026-03-29', 0, 'bensin-69c90977536db-LuO79AGVh8mFJ4qDyo', '2026-03-29 10:13:59', '2026-03-29 10:13:59', '0000-00-00 00:00:00'),
(435, 1, 5, 9, 'Tawas', 82489, 'Tawas vivinus', '2026-03-29', 0, 'tawas-69c90bf69827f--Hvh972PWSEAnLOgRx', '2026-03-29 10:24:38', '2026-03-29 10:24:38', '0000-00-00 00:00:00'),
(436, 1, 0, 1, 'ayam 1 ekor', 75000, 'bagi 2 sama vivin (beli di richeese factory)', '2026-04-03', 0, 'ayam-1-ekor-6a0872147f54a-VRot-x2YSAay8ecku3', '2026-05-16 12:33:08', '2026-05-16 12:33:08', '0000-00-00 00:00:00'),
(437, 1, 0, 9, 'headset matras', 83550, 'beli di tiktok shop (vivin)', '2026-04-05', 0, 'headset-matras-6a087477802af-Dzas_QeZhELdN-pByG', '2026-05-16 12:43:19', '2026-05-16 12:43:19', '0000-00-00 00:00:00'),
(438, 1, 5, 9, 'matras', 53345, 'matras olahraga', '2026-04-05', 0, 'matras-6a0874b8746fe-Jj65Mwi-7KhsBz412D', '2026-05-16 12:44:24', '2026-05-16 12:44:24', '0000-00-00 00:00:00'),
(439, 1, 0, 7, 'kondangan', 25000, 'ke resepsi elfa', '2026-04-05', 0, 'kondangan-6a087512d0b5b-iCal5puQ_sF87fqWJr', '2026-05-16 12:45:54', '2026-05-16 12:45:54', '0000-00-00 00:00:00'),
(440, 1, 0, 4, 'samsat', 225000, 'bayar pajak kendaraan (telat 3 bulan)', '2026-04-11', 0, 'samsat-6a0875454f383-Qa7sN8XLD3CF5yvHrP', '2026-05-16 12:46:45', '2026-05-16 12:46:45', '0000-00-00 00:00:00'),
(441, 1, 0, 4, 'bensin', 20000, 'pertamina sayang sayang', '2026-04-11', 0, 'bensin-6a08756cbc09b-zX0K_4jteasvTOynAh', '2026-05-16 12:47:24', '2026-05-16 12:47:24', '0000-00-00 00:00:00'),
(442, 1, 0, 4, 'nitrogen', 10000, 'isi angin ban di pertamina sayang sayang', '2026-04-11', 0, 'nitrogen-6a08758b1b149-50M8gkxwrHUsZyDVTj', '2026-05-16 12:47:55', '2026-05-16 12:47:55', '0000-00-00 00:00:00'),
(443, 1, 5, 2, 'token listrik', 53000, 'pulsa listrik 75.20kwh', '2026-04-14', 0, 'token-listrik-6a0875d9ad363-_zvstGCY8Dx3VHBTor', '2026-05-16 12:49:13', '2026-05-16 12:49:13', '0000-00-00 00:00:00'),
(444, 1, 6, 5, 'kuota', 42000, '16gb telkomsel', '2026-04-15', 0, 'kuota-6a0876bcdd1e1-ne6wQLmfr7jGg5T8iP', '2026-05-16 12:53:00', '2026-05-16 12:53:00', '0000-00-00 00:00:00'),
(445, 1, 0, 1, 'adem sari + parkir', 12000, 'vivin nitip beli di alfamart', '2026-04-17', 0, 'adem-sari-parkir-6a087774437cd-JVXtxBlF-YHThN_a4c', '2026-05-16 12:56:04', '2026-05-16 12:56:04', '0000-00-00 00:00:00'),
(446, 1, 6, 4, 'service motor', 524400, 'ganti ban ke tubbles & ganti aki', '2026-04-18', 0, 'service-motor-6a0877ac4ba12-NxrBgf0n6ILGXwMbF2', '2026-05-16 12:57:00', '2026-05-16 12:57:00', '0000-00-00 00:00:00'),
(447, 1, 0, 11, 'badmin', 20000, 'main badminton di acibara', '2026-04-18', 0, 'badmin-6a0877dbafd37-HGATh192aPZIVneEW6', '2026-05-16 12:57:47', '2026-05-16 12:57:47', '0000-00-00 00:00:00'),
(448, 1, 0, 4, 'bensin', 20000, 'beli di pertamina sayang sayang', '2026-04-18', 0, 'bensin-6a087806d5954-K2lVPtfvRTXmsJBINO', '2026-05-16 12:58:30', '2026-05-16 12:58:30', '0000-00-00 00:00:00'),
(449, 1, 0, 2, 'lampu', 18000, 'beli lampu kamar', '2026-04-23', 0, 'lampu-6a0878432921e-enKED5xR9t2gzcaXYj', '2026-05-16 12:59:31', '2026-05-16 12:59:31', '0000-00-00 00:00:00'),
(450, 1, 0, 7, 'jenguk', 10000, 'jenguk mas ali operasi usus buntu', '2026-04-24', 0, 'jenguk-6a08786e106b1--3FdtKBTY81DWQUAN7', '2026-05-16 13:00:14', '2026-05-16 13:00:14', '0000-00-00 00:00:00'),
(451, 1, 0, 11, 'badmin', 20000, 'main badmin di acibara', '2026-04-25', 0, 'badmin-6a0878962c873-fp9P8LTznWhsgS6rtC', '2026-05-16 13:00:54', '2026-05-16 13:00:54', '0000-00-00 00:00:00'),
(452, 1, 0, 7, 'unknown', 50000, 'gift to vivin', '2026-04-25', 0, 'unknown-6a0879648f19e-0xNcjQnRu-8idVsZ4H', '2026-05-16 13:04:20', '2026-05-16 13:04:20', '0000-00-00 00:00:00'),
(453, 1, 0, 1, 'pocari + jajan', 37000, 'beli di alfamart (pocari 2L + jajan?)', '2026-04-26', 0, 'pocari-jajan-6a0879987758c-prZWHU79XV3Bhq2DGF', '2026-05-16 13:05:12', '2026-05-16 13:05:12', '0000-00-00 00:00:00'),
(454, 1, 0, 10, 'unknown', 24000, 'gift to vivin', '2026-04-26', 0, 'unknown-6a0879b991854-KBxE4hmNPClUOvGj0o', '2026-05-16 13:05:45', '2026-05-16 13:05:45', '0000-00-00 00:00:00'),
(455, 1, 5, 5, 'wifi april', 219000, 'tagihan wifi bulan April', '2026-04-28', 0, 'wifi-april-6a087a0202265-svG_a6IKed9RhDfb3T', '2026-05-16 13:06:58', '2026-05-16 13:06:58', '0000-00-00 00:00:00'),
(456, 1, 0, 11, 'badmin', 10000, 'main badmin di kekeri', '2026-05-02', 0, 'badmin-6a08843f2efc8-E58gYo6BR-jrq0dMTv', '2026-05-16 13:50:39', '2026-05-16 13:50:39', '0000-00-00 00:00:00'),
(457, 1, 0, 1, 'nasgor', 30000, 'nasgor di perempatan sayang sayang', '2026-05-02', 0, 'nasgor-6a0884640dcf4-qEHtQ9peru3AiZXl4R', '2026-05-16 13:51:16', '2026-05-16 13:51:16', '0000-00-00 00:00:00'),
(458, 1, 0, 6, 'ruby', 45000, 'tidak tahu apa yang saya beli', '2026-05-03', 0, 'ruby-6a088493de410-2ynEGiPBSAcdsVr170', '2026-05-16 13:52:03', '2026-05-16 13:52:03', '0000-00-00 00:00:00'),
(459, 1, 0, 10, 'unknown', 15000, 'unknown vivin', '2026-05-03', 0, 'unknown-6a0884c7c4a0e-jmRvtsJi-qFEUpYy7S', '2026-05-16 13:52:55', '2026-05-16 13:52:55', '0000-00-00 00:00:00'),
(460, 1, 0, 1, 'tahu krispi', 20000, 'beli di deket alfamart gegutu', '2026-05-04', 0, 'tahu-krispi-6a0884f9248d6-qOKvCNZL_4EAcpUSjV', '2026-05-16 13:53:45', '2026-05-16 13:53:45', '0000-00-00 00:00:00'),
(461, 1, 5, 9, 'hairdryer', 65000, 'han river', '2026-05-05', 0, 'hairdryer-6a08854bdc8ed-FdvGwrHlkipB_4s-zu', '2026-05-16 13:55:07', '2026-05-16 13:55:07', '0000-00-00 00:00:00'),
(462, 1, 0, 4, 'gantungan motor', 15000, 'gantungan motor with vivin', '2026-05-05', 0, 'gantungan-motor-6a08859fd2e2e-3xmByRvTs2ani6j8ck', '2026-05-16 13:56:31', '2026-05-16 13:56:31', '0000-00-00 00:00:00'),
(463, 1, 5, 5, 'pulsa', 21500, 'pulsa for tlpn vivin', '2026-05-06', 0, 'pulsa-6a0885ce4a40a-hRHg-onsFawlY1dbSL', '2026-05-16 13:57:18', '2026-05-16 13:57:18', '0000-00-00 00:00:00'),
(464, 1, 0, 11, 'badmin', 15000, 'badmin with nino in warna agung', '2026-05-06', 0, 'badmin-6a0885f3a56e2-T9gMDUGq2Rz4acFiKV', '2026-05-16 13:57:55', '2026-05-16 13:57:55', '0000-00-00 00:00:00'),
(465, 1, 0, 1, 'terang bulan', 25000, 'my mom want terang bulan (beli di deket perempatan sayang sayang)', '2026-05-06', 0, 'terang-bulan-6a08861668621-P1-Ze5nkt3aOS_lNDG', '2026-05-16 13:58:30', '2026-05-16 13:58:30', '0000-00-00 00:00:00'),
(466, 1, 0, 9, 'cukur', 60000, 'cukur di pennylane (undercut)', '2026-05-05', 0, 'cukur-6a08868bb2b83-Ux6srS7AoPKqRkeBGt', '2026-05-16 14:00:27', '2026-05-16 14:00:27', '0000-00-00 00:00:00'),
(467, 1, 0, 11, 'badmin', 10000, 'badminton di kekeri barat', '2026-05-16', 0, 'badmin-6a08960cee360-_VbfXUO4qJ6CHcFmQ0', '2026-05-16 15:06:36', '2026-05-16 15:06:36', '0000-00-00 00:00:00'),
(468, 1, 5, 2, 'pulsa listrik', 53000, '75.20kWh', '2026-05-16', 0, 'pulsa-listrik-6a08963b1af1e-MUGSF8ezYxJgcI0v6X', '2026-05-16 15:07:23', '2026-05-16 15:07:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `icons`
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
-- Struktur dari tabel `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dompet` int(11) NOT NULL,
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
-- Dumping data untuk tabel `income`
--

INSERT INTO `income` (`id`, `id_user`, `id_dompet`, `id_kategori_income`, `name_income`, `amount`, `description`, `date_income`, `status`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 0, 1, 'testing', 20000, 'testing ..... 1', '2024-12-05', 1, 'testing-67528fed7c2e4-OGuFW3ekmXI8dwvrcA', '2024-12-06 05:47:25', '2024-12-06 05:47:25', '0000-00-00 00:00:00'),
(2, 1, 0, 5, 'Gaji', 2500000, 'gaji bulan november', '2024-11-29', 1, 'gaji-6756df0c5f188-U2rNvXn74zs510FZSl', '2024-12-09 20:19:01', '2024-12-09 20:19:01', '0000-00-00 00:00:00'),
(3, 3, 0, 1, 'kembali', 300000, 'uang saya telah kembali', '2024-12-14', 1, 'kembali-675d9dfa7100b-o9lqwIEW6s10TF8uAS', '2024-12-14 15:02:18', '2024-12-14 15:02:18', '0000-00-00 00:00:00'),
(4, 3, 0, 2, 'testing', 20000, 'testing testing', '2024-11-14', 1, 'testing-675da5a9337ea-1LtoyJMVsudl4Xnx5v', '2024-12-14 15:35:05', '2025-01-04 22:04:54', '2025-01-04 22:04:54'),
(6, 1, 0, 1, 'testing 1', 1000, 'testing hadiah', '2024-12-25', 1, 'testing-1-676c09d6603cb-JeMEabhRtmH2id8TzA', '2024-12-25 20:34:14', '2024-12-25 20:34:14', '0000-00-00 00:00:00'),
(7, 1, 0, 5, 'desember', 3635182, 'gaji bulan desember', '2024-12-27', 1, 'desember-676e9625b8a89-wqzgTJHQeNVU2kMYif', '2024-12-27 18:57:25', '2024-12-27 18:57:25', '0000-00-00 00:00:00'),
(8, 1, 0, 4, 'testing 1', 10000, 'testing testing 1', '2025-01-03', 1, 'testing-1-677a64a5c6a4d-BU2FmYSkxLg3pchbHu', '2025-01-05 17:53:25', '2025-01-05 18:04:48', '2025-01-05 18:04:48'),
(9, 1, 0, 5, 'testing 2', 20000, 'testing testing 2', '2025-01-01', 1, 'testing-2-677a650ef1eb1-WQc4zIrjuld7opZPD3', '2025-01-05 17:55:11', '2025-01-05 17:55:11', '0000-00-00 00:00:00'),
(10, 4, 0, 1, 'Testing', 500000, 'Testing', '2025-01-06', 1, 'testing-677b9886bc8db-keAZ1RvUa_24KPCf5E', '2025-01-06 15:47:02', '2025-01-06 15:47:02', '0000-00-00 00:00:00'),
(11, 4, 0, 4, 'Testing', 150000, 'Testing', '2025-01-02', 1, 'testing-677b997a99641-W8Rz-s5yeaFjYSuVdn', '2025-01-06 15:51:06', '2025-01-06 15:51:06', '0000-00-00 00:00:00'),
(12, 1, 0, 5, 'Gaji', 2685529, 'Gaji januari', '2025-01-31', 1, 'gaji-679c616146cd7-EfwnXjZzMtDsOINgh9', '2025-01-31 12:36:33', '2025-01-31 12:36:33', '0000-00-00 00:00:00'),
(13, 1, 0, 3, 'dikasih', 50000, 'ngumpulan grill', '2025-02-11', 1, 'dikasih-67aff9f11a738-udsnRhLGCwVJ1Q-eci', '2025-02-15 09:20:33', '2025-02-15 09:20:33', '0000-00-00 00:00:00'),
(14, 5, 0, 5, 'gaji', 2700000, 'gaji bulanan', '2025-02-28', 1, 'gaji-67bfc8361277c-ZfHgoP_i7crU5xKMwh', '2025-02-27 09:04:38', '2025-02-27 09:04:38', '0000-00-00 00:00:00'),
(15, 1, 0, 5, 'Gaji', 3079962, 'Gaji bulan februari', '2025-02-28', 1, 'gaji-67c1cb852f8a1-hijULQK4TW6J7kxNXw', '2025-02-28 21:43:17', '2025-02-28 21:43:17', '0000-00-00 00:00:00'),
(16, 1, 0, 3, 'Gantian', 56000, 'Kepeng gentian lekan dani', '2025-03-15', 1, 'gantian-67d689f774065-1XVEMBIZ4N6SxkL7-3', '2025-03-16 15:21:11', '2025-03-16 15:21:11', '0000-00-00 00:00:00'),
(17, 1, 0, 1, 'THR', 1661612, 'THR dari kantor setengahnya', '2025-03-17', 1, 'thr-67d7cf8c8a5de-j_XeLuRy2x16zmk9KT', '2025-03-17 14:30:20', '2025-03-17 14:30:20', '0000-00-00 00:00:00'),
(18, 6, 0, 6, 'THR', 2700000, 'THR tahun 2025', '2025-03-17', 1, 'thr-67d8c9368be12-M_U38dljPWxJfZrmh9', '2025-03-18 08:15:34', '2025-03-18 08:15:34', '0000-00-00 00:00:00'),
(19, 6, 0, 5, 'Gaji ', 13531724, '', '2025-03-18', 1, 'gaji-67d8ca61d27dc-siXCt8weRYrQqhLJn2', '2025-03-18 08:20:33', '2025-03-18 08:20:33', '0000-00-00 00:00:00'),
(20, 4, 3, 6, 'Testing gan', 25000, 'Testing ape nu', '2025-03-20', 1, 'testing-gan-67dbb94c4c29d-aBeg-3CdwbZzy_DOkH', '2025-03-20 13:44:28', '2025-03-20 13:44:28', '0000-00-00 00:00:00'),
(21, 4, 3, 6, 'Testing', 25000, 'Testing testing testing', '2025-03-21', 1, 'testing-67dcc4e261110-GpabJURi4YfmL86kT0', '2025-03-21 08:46:10', '2025-03-21 08:46:10', '0000-00-00 00:00:00'),
(22, 4, 0, 6, 'Tes', 25000, 'Tes bro', '2025-03-21', 1, 'tes-67dd0a68e22a9-i_-32QARuLD8vKjO0I', '2025-03-21 13:42:48', '2025-03-21 13:42:48', '0000-00-00 00:00:00'),
(23, 1, 0, 5, 'Maret', 2738735, 'Gaji bulan maret', '2025-03-25', 1, 'maret-67e20af7b28f4-Pme3UOfFtG7ZpbjNK1', '2025-03-25 08:46:31', '2025-03-25 08:46:31', '0000-00-00 00:00:00'),
(24, 4, 3, 6, 'E', 1000, 'Eeeeee', '2025-03-25', 1, 'e-67e21dfca3ef5-UvK6l9w3iyZjtn5rFS', '2025-03-25 10:07:40', '2025-03-25 10:07:40', '0000-00-00 00:00:00'),
(25, 4, 3, 6, 'H', 1000, 'Hhhhhhhh', '2025-03-25', 1, 'h-67e22089ea799-3MJk_IBnomFYcDgp71', '2025-03-25 10:18:33', '2025-03-25 10:18:33', '0000-00-00 00:00:00'),
(26, 1, 0, 6, 'Gantian gede & huda', 100000, 'Uang ganti pas bukber', '2025-03-26', 1, 'gantian-gede-huda-67e8bc9166a9e-Rqkr07nh-p54ztbVxA', '2025-03-30 10:37:53', '2025-03-30 10:37:53', '0000-00-00 00:00:00'),
(27, 1, 0, 6, 'Gantian dani', 250000, 'Dani ganti uang cicil 1', '2025-03-16', 1, 'gantian-dani-67e8be8633b5e-oh_nu3lz0drcNXWMIR', '2025-03-30 10:46:14', '2025-03-30 10:46:14', '0000-00-00 00:00:00'),
(28, 1, 0, 3, 'ganti', 30000, 'ganti biaya masuk + logistik (adam)', '2025-04-19', 1, 'ganti-680501c10f211-SWOhPaR3dKgx4H_AQM', '2025-04-20 21:16:33', '2025-04-20 21:16:33', '0000-00-00 00:00:00'),
(29, 1, 0, 3, 'ganti (dani)', 50000, 'ganti biaya masuk + logistik', '2025-04-20', 1, 'ganti-dani-680501f240b6b-U6bOYKT7nDZltfGqh_', '2025-04-20 21:17:22', '2025-04-20 21:17:22', '0000-00-00 00:00:00'),
(30, 1, 0, 5, 'Gaji april', 2738735, 'Gaji bulan april', '2025-04-29', 1, 'gaji-april-6810cf49c6264-YNjA0EfSemg982_wVG', '2025-04-29 20:08:25', '2025-04-29 20:08:25', '0000-00-00 00:00:00'),
(32, 1, 6, 5, 'Gaji mei', 2738735, 'Gaji bulan mei', '2025-05-28', 1, 'gaji-mei-68385c6bc979c-43mfI7n-Vpvz2U1Xby', '2025-05-29 20:08:59', '2025-05-29 20:08:59', '0000-00-00 00:00:00'),
(33, 1, 5, 1, 'Bsu', 600000, 'Hadiah dari pemerintah', '2025-06-24', 1, 'bsu-685ac33df3422-tYOxdnrvJblakDNR2B', '2025-06-24 22:24:46', '2025-06-24 22:24:46', '0000-00-00 00:00:00'),
(34, 1, 6, 5, 'gaji juni', 2738735, 'gaji bulan juni 2025', '2025-06-26', 1, 'gaji-juni-685e664e6df3f-PQALI1lxE0fitowJDh', '2025-06-27 16:37:18', '2025-06-27 16:37:18', '0000-00-00 00:00:00'),
(35, 1, 0, 6, 'kembalian', 20000, 'mengembalikan uang', '2025-06-26', 1, 'kembalian-685e6774aaeb8-eL8PNhWIXjOtkuZFRi', '2025-06-27 16:42:12', '2025-06-27 16:42:12', '0000-00-00 00:00:00'),
(36, 1, 6, 5, 'Gaji juli', 2738735, 'Gaji bulan juli', '2025-07-31', 1, 'gaji-juli-688b00afc94e9-E4al0hSwVgvkp5Gte_', '2025-07-31 12:35:43', '2025-07-31 12:35:43', '0000-00-00 00:00:00'),
(37, 1, 6, 5, 'gaji agustus', 3258666, 'gaji + cuti di duitkan bulan agustus', '2025-08-29', 1, 'gaji-agustus-68b26d1e6106a-y_1m37KOvirzxSMuY9', '2025-08-30 10:16:46', '2025-08-30 10:16:46', '0000-00-00 00:00:00'),
(38, 1, 6, 5, 'compensation benefit', 1423310, 'compen bekerja selama 6 bulan kontrak', '2025-08-29', 1, 'compensation-benefit-68b26d7a5f7af-e6h1AKQaUjrgi8su9k', '2025-08-30 10:18:18', '2025-08-30 10:18:18', '0000-00-00 00:00:00'),
(39, 1, 0, 6, 'gantian dani', 190000, 'gantian uang ketika belanja di ruby', '2025-09-06', 1, 'gantian-dani-68c6a127ccb64-NMwREIsPaWQptO4r_q', '2025-09-14 18:04:07', '2025-09-14 18:04:07', '0000-00-00 00:00:00'),
(40, 1, 0, 5, 'Gaji september', 2738735, 'Gaji bulan september', '2025-09-30', 1, 'gaji-september-68dbba70b5bb7-yRV9v7zNlowFZuSjTq', '2025-09-30 18:09:36', '2025-09-30 18:09:36', '0000-00-00 00:00:00'),
(41, 1, 6, 5, 'gaji okto', 2738735, 'gaji bulan oktober', '2025-10-28', 1, 'gaji-okto-6900dabab8ba2-KjFeVSzmk-IXlvudTp', '2025-10-28 22:01:14', '2025-10-28 22:01:14', '0000-00-00 00:00:00'),
(42, 1, 6, 5, 'Gaji des', 2738735, 'Gaji bulan desember', '2025-11-28', 1, 'gaji-des-692922cf0cdc4-aUG_uF1AH6h2EVLTjO', '2025-11-28 11:19:27', '2025-11-28 11:19:27', '0000-00-00 00:00:00'),
(43, 1, 6, 5, 'Gaji Des', 2738735, 'Gaji bulan desember', '2025-12-24', 1, 'gaji-des-694e4f1e55ace-5eBv2dxqAO7QEFIyr9', '2025-12-26 16:02:22', '2025-12-26 16:02:22', '0000-00-00 00:00:00'),
(44, 1, 6, 5, 'Gaji Jan26', 2732359, 'Gaji bulan januari 2026', '2026-01-29', 1, 'gaji-jan26-698c9f5dbc3c8-mteTKD_zpcA-If8Uoh', '2026-02-11 22:25:17', '2026-02-11 22:25:17', '0000-00-00 00:00:00'),
(45, 1, 6, 5, 'Gaji Februari', 3252290, 'Gaji bulan februari + uang cuti', '2026-02-27', 1, 'gaji-februari-69a45c2ebe4bd-_xX9mWGMAVv1CjPODd', '2026-03-01 22:33:02', '2026-03-01 22:33:02', '0000-00-00 00:00:00'),
(46, 1, 6, 5, 'Compen', 1423310, 'Uang compensation gaji per enam bulan kontrak', '2026-02-27', 1, 'compen-69a45c6c96236-deq3ImWrVK7SXlf5at', '2026-03-01 22:34:04', '2026-03-01 22:34:04', '0000-00-00 00:00:00'),
(47, 1, 6, 1, 'THR', 3012600, 'Thr ramadhan 2026 summit', '2026-03-11', 1, 'thr-69c90556881a4-eT9_nWUlSDALkrXQai', '2026-03-29 17:56:22', '2026-03-29 17:56:22', '0000-00-00 00:00:00'),
(48, 1, 6, 5, 'Gaji Maret', 2911969, 'Gaji bulan desember kenaikan 2026', '2026-03-31', 1, 'gaji-maret-69f0d306b81a9-l_PTBwiSIaZ8Q5tmVF', '2026-04-28 22:32:22', '2026-04-28 22:32:22', '0000-00-00 00:00:00'),
(49, 1, 6, 5, 'Gaji April', 2977550, 'Gaji bulan april', '2026-04-29', 1, 'gaji-april-6a08836dea748-MNq1IHRlXxGPZmeF0u', '2026-05-16 21:47:09', '2026-05-16 21:47:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventori`
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
-- Struktur dari tabel `kategori_expenses`
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
-- Dumping data untuk tabel `kategori_expenses`
--

INSERT INTO `kategori_expenses` (`id`, `kategori`, `icon`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Makanan', 'fa-utensils', 'makanan-67262982a7ccf-zvR2NDqg9oXk6tAhpw', '2024-11-02 05:30:42', '2024-11-02 05:30:42', '0000-00-00 00:00:00'),
(2, 'Listrik', 'fa-bolt', 'listrik-6727144b69aa7-0_pcuF-xskWXACVadn', '2024-11-02 06:34:53', '2024-11-02 22:12:27', '0000-00-00 00:00:00'),
(4, 'Kendaraan', 'fa-motorcycle', 'kendaraan-67270e24b0d5d-0H4rS6DKCqVzyTE_Am', '2024-11-02 13:56:10', '2024-11-02 21:46:12', '0000-00-00 00:00:00'),
(5, 'Internet', 'fa-wifi', 'internet-67271b4d0621a--DBcVA9t1YjblwOgCm', '2024-11-02 22:42:21', '2024-11-02 22:42:21', '0000-00-00 00:00:00'),
(6, 'Belanja', 'fa-bag-shopping', 'belanja-67276e85eb57f-FlkCRNXg8Aiuy7Jpc2', '2024-11-03 04:37:25', '2024-11-03 04:37:25', '0000-00-00 00:00:00'),
(7, 'Hibah', 'fa-circle-dollar-to-slot', 'hibah-6777b23eca9c6-9ZMWfKC2PuRwejnEJ_', '2025-01-03 08:47:42', '2025-01-03 08:47:42', '0000-00-00 00:00:00'),
(8, 'Healing', 'fa-face-angry', 'healing-678258743be4e-hFb-2PXjAqr7Gw5QEc', '2025-01-11 10:39:32', '2025-01-11 10:39:32', '0000-00-00 00:00:00'),
(9, 'Penampilan', 'fa-face-grin', 'penampilan-6783aaf87523d-AHZImz5QiEfpv1B8Nb', '2025-01-12 10:43:52', '2025-01-12 10:43:52', '0000-00-00 00:00:00'),
(10, 'Lain-lain', 'fa-l', 'lain-lain-6783ab93e734d-q9ERyQSKrn4t1o2mle', '2025-01-12 10:46:27', '2025-01-12 10:46:27', '0000-00-00 00:00:00'),
(11, 'Olahraga', 'fa-volleyball', 'olahraga-696870aa7adc5-QfBEk_56-4phw7WcKY', '2026-01-15 03:44:26', '2026-01-15 03:44:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_income`
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
-- Dumping data untuk tabel `kategori_income`
--

INSERT INTO `kategori_income` (`id`, `kategori`, `icon`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hadiah', 'fa-home', 'hadiah-67271bfd13dbc--0HvotFAfD87B4pK5k', '2024-11-02 06:46:20', '2024-11-02 22:45:17', '0000-00-00 00:00:00'),
(2, 'Listrik', 'fa-bolt-lightning', 'listrik-6783adc358dca-qu36L0zFoxCQgIBEMt', '2024-11-02 06:52:52', '2025-01-12 10:55:47', '0000-00-00 00:00:00'),
(3, 'Hibah', 'fa-face-smile', 'hibah-67271b259129b-XyoClMtYVkNgn_7mwa', '2024-11-02 07:16:44', '2024-11-02 22:41:41', '0000-00-00 00:00:00'),
(4, 'Penjualan', 'fa-shop', 'penjualan-67270de3a6a5c-4uMX6fhdZgYNDnK2_q', '2024-11-02 20:47:01', '2024-11-02 21:45:07', '0000-00-00 00:00:00'),
(5, 'Gaji', 'fa-rupiah-sign', 'gaji-6756dee11e147-_ndZiOMEH7Ujk8gcpN', '2024-12-09 04:13:21', '2024-12-09 04:13:21', '0000-00-00 00:00:00'),
(6, 'Lain-lain', 'fa-l', 'lain-lain-6783aba8994fc-5B_TvgQ3u8MhEapo7U', '2025-01-12 10:46:48', '2025-01-12 10:46:48', '0000-00-00 00:00:00'),
(7, 'testing', 'fa-music', 'testing-6783bd8e0de6a-UufkL9PZT37qzWdQBl', '2025-01-12 12:03:10', '2025-01-12 12:03:34', '2025-01-12 20:03:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pakai`
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
-- Dumping data untuk tabel `pakai`
--

INSERT INTO `pakai` (`id`, `id_user`, `id_kategori`, `nama`, `tanggal_mulai`, `tanggal_selesai`, `catatan`, `status_pakai`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'testing', '2024-10-01', '2025-01-01', 'testing ....', 0, 'testing-', '2024-12-31 01:33:42', '2024-12-31 01:33:42', '2024-12-31 09:33:42'),
(2, 1, 2, 'testing testing', '2025-01-02', '2025-01-31', 'tes dulu ga sih', 1, 'testing-testing-6775ff9eba1e6-KRdsAaN8MTkZ1lCbhP', '2025-01-02 01:53:18', '2025-06-27 08:58:40', '2025-06-27 16:58:40'),
(3, 1, 4, 'Testing 1', '2024-12-01', '0000-00-00', 'Testing testing', 0, 'testing-1-677642d5d45f8-8Ri0JeG1uwxsoZakEl', '2025-01-11 12:01:00', '2025-06-27 09:00:00', '2025-06-27 17:00:00'),
(4, 1, 4, 'Bensin', '2025-01-02', '0000-00-00', 'Catat kapan bensin 20k ini habis', 0, 'bensin-6777752701505-hUw2PbuRoVN8Alyg01', '2025-01-03 04:27:03', '2025-06-27 08:58:27', '2025-06-27 16:58:27'),
(5, 1, 8, 'tidak', '2025-01-12', '2025-02-15', 'long', 1, 'tidak-6783643ff3e2e-bGm9c7yu1q-V_kXBnH', '2025-01-12 05:42:07', '2025-02-17 15:07:29', '0000-00-00 00:00:00'),
(6, 1, 9, 'Rambut', '2025-01-12', '2025-03-08', 'Udah di cukur jadi biasa', 1, 'rambut-6783badcb08e4-YtuMjNOnJU4r6e3pFi', '2025-01-12 11:51:40', '2025-03-10 05:14:29', '0000-00-00 00:00:00'),
(7, 1, 2, 'pemakaian listrik', '2025-01-15', '2025-05-08', 'kwh 150.3', 1, 'pemakaian-listrik-678924b9e7b08-2HYCoED8dcUxl0JQqe', '2025-01-16 14:24:41', '2025-05-08 13:32:33', '0000-00-00 00:00:00'),
(8, 1, 4, 'pemakaian oli', '2025-01-16', '2025-04-05', '', 1, 'pemakaian-oli-678924f387c67-lHaqAOGvgyu0eik-32', '2025-01-16 14:25:39', '2025-04-08 00:06:13', '0000-00-00 00:00:00'),
(9, 4, 2, 'Token listrik', '2025-01-15', '0000-00-00', 'Testing', 0, 'token-listrik-6789ebad071f5-GLKi7CyJ4ZPIFDdVqE', '2025-01-17 04:33:33', '2025-01-17 04:33:33', '0000-00-00 00:00:00'),
(10, 1, 9, 'hatomugi', '2025-02-10', '2025-12-07', 'Sudah habis 4 hari yang lalu', 1, 'hatomugi-67aa0aa87c941-LnlzvRQiSWCgdK82Fp', '2025-02-10 13:18:16', '2025-12-07 07:45:36', '0000-00-00 00:00:00'),
(11, 1, 9, 'tidak', '2025-02-16', '2025-04-02', 'Reset lagi', 1, 'tidak-67b35f09d706b-omS2qzNP5JTax86Evu', '2025-02-17 15:08:41', '2025-04-03 04:03:14', '0000-00-00 00:00:00'),
(12, 1, 9, 'Panjangin rambut', '2025-03-08', '2025-04-19', 'Long trim mullet sekedik', 1, 'panjangin-rambut-67ce83b204826-j6-BPv1C2EFGfTiAcY', '2025-03-10 05:16:18', '2025-04-21 03:51:11', '0000-00-00 00:00:00'),
(13, 1, 8, 'Tidak', '2025-04-03', '2025-04-26', 'semangat', 1, 'tidak-67ee1737b96e2-dtl_H7LcgM4-IV3kzD', '2025-04-03 04:05:59', '2025-04-26 02:15:24', '0000-00-00 00:00:00'),
(14, 1, 4, 'Oli', '2025-04-06', '2025-06-16', 'selesai oli', 1, 'oli-67f476a85518a-_sliOV7C6duJTq2z1c', '2025-04-08 00:06:48', '2025-06-27 08:47:25', '0000-00-00 00:00:00'),
(15, 1, 9, 'Shampoo natur 270ml', '2025-04-15', '0000-00-00', 'Mulai lagi', 0, 'shampoo-natur-270ml-68020167715d7-RpW_wTx8oH7rNDPk02', '2025-04-18 06:38:15', '2025-04-18 06:38:15', '0000-00-00 00:00:00'),
(16, 1, 9, 'Hair tonic 140ml', '2025-04-15', '2025-07-15', 'Habiss', 1, 'hair-tonic-140ml-6802017f6422b-X-nfjVSaWGwbeNkI3M', '2025-04-18 06:38:39', '2025-08-03 13:27:46', '0000-00-00 00:00:00'),
(17, 1, 9, 'Rambut', '2025-04-19', '2025-05-31', 'selesai (buzz cut x mullet)', 1, 'rambut-6805ce99abf3d-pfZ2wLIYkiWPSMGczB', '2025-04-21 03:50:33', '2025-06-27 08:56:40', '0000-00-00 00:00:00'),
(18, 1, 9, 'tidak', '2025-04-26', '0000-00-00', 'semangat!!!!', 0, 'tidak-680c4ff185fe0-k3CtgN2Md0VFDe5nQG', '2025-04-26 02:16:01', '2025-04-26 02:16:01', '0000-00-00 00:00:00'),
(19, 1, 2, 'pemakaian listrik', '2025-05-08', '2025-06-27', 'ganti lagi, 75.20kwh', 1, 'pemakaian-listrik-681cc163a06e2-LZt_BKPwofpxRiJCqE', '2025-05-08 13:36:19', '2025-06-27 08:54:44', '0000-00-00 00:00:00'),
(20, 1, 4, 'ganti oli', '2025-06-16', '2025-09-02', 'Diganti', 1, 'ganti-oli-685e68d686b5f-YqlMAEzvNP5CxKZB1W', '2025-06-27 08:48:06', '2025-09-06 14:53:03', '0000-00-00 00:00:00'),
(21, 1, 2, 'token listrik', '2025-06-27', '2025-08-16', 'Sama dengan bulan sebelumnya', 1, 'token-listrik-685e6a772f0cf-PUl3TDHiaVJK6hpwN4', '2025-06-27 08:55:03', '2025-08-16 04:49:16', '0000-00-00 00:00:00'),
(22, 1, 9, 'mullet', '2025-05-31', '2025-09-28', 'Done mullet', 1, 'mullet-685e6b079e87f-m1fq4QtwOnzo7C_UdW', '2025-06-27 08:57:27', '2025-09-30 10:14:02', '0000-00-00 00:00:00'),
(23, 1, 9, 'Hair tonic', '2025-07-15', '2025-09-30', '', 1, 'hair-tonic-688f721965030-Lv0BMwoxIV8NSZFKJq', '2025-08-03 13:28:41', '2025-09-30 10:13:24', '0000-00-00 00:00:00'),
(24, 1, 2, 'Pemakaian listrik', '2025-08-16', '2025-09-30', 'September 2025 - 75.20 kWh', 1, 'pemakaian-listrik-68a01c2759050-bZH8aIzNDsBSVnwxt7', '2025-08-16 04:50:31', '2025-09-30 10:17:49', '0000-00-00 00:00:00'),
(25, 1, 4, 'Ganti oli', '2025-09-02', '2025-12-21', 'End', 1, 'ganti-oli-68bc597f6502c-yvxHFmVhjwrt4Ou0g7', '2025-09-06 14:55:43', '2025-12-26 08:12:02', '0000-00-00 00:00:00'),
(26, 1, 9, 'Panjangin rambut', '2025-09-28', '2025-12-13', 'Done undercut', 1, 'panjangin-rambut-68dbbb9c311c8-074ntVPOl_WN6DyIKE', '2025-09-30 10:14:36', '2025-12-16 03:53:42', '0000-00-00 00:00:00'),
(27, 1, 2, 'Pemakaian listrik', '2025-09-30', '2025-12-26', 'End 26 des 2025', 1, 'pemakaian-listrik-68dbbc8521f67--_K48DGRulmwiv7PMO', '2025-09-30 10:18:29', '2025-12-26 08:08:38', '0000-00-00 00:00:00'),
(28, 1, 9, 'Shampo natur 270 ml', '2025-10-15', '0000-00-00', 'Gunakan secara maksimal', 0, 'shampo-natur-270-ml-68eee6f6bbdad-_jBkySRHbUhNYn4PWE', '2025-10-14 23:12:38', '2025-10-14 23:12:38', '0000-00-00 00:00:00'),
(29, 1, 9, 'Hair tonic 140 ml', '2025-10-15', '0000-00-00', 'Dari natur', 0, 'hair-tonic-140-ml-68eee71414dc7-dFD5EC-paqAx1yhsiX', '2025-10-14 23:13:08', '2025-10-14 23:13:08', '0000-00-00 00:00:00'),
(30, 1, 9, 'Conditioner 160 ml', '2025-10-15', '0000-00-00', 'Dari natur', 0, 'conditioner-160-ml-68eee74a160dd-VdZsuS_bo9aP1xc7Oi', '2025-10-14 23:14:02', '2025-10-14 23:14:02', '0000-00-00 00:00:00'),
(31, 1, 9, 'Panjangin rambut', '2025-12-13', '2026-05-05', 'ivy league (done)', 1, 'panjangin-rambut-6940e628f1b88-pjYdZ3Nr29cb_QtyBK', '2025-12-16 03:55:04', '2026-05-16 15:02:19', '0000-00-00 00:00:00'),
(32, 1, 2, 'Listrik Des', '2025-12-26', '2026-02-07', 'End 75.20 kWh', 1, 'listrik-des-694e50e04c911-FGA9_eoHz1c2sTJpl8', '2025-12-26 08:09:52', '2026-02-11 14:36:30', '0000-00-00 00:00:00'),
(33, 1, 4, 'Ganti oli', '2025-12-21', '0000-00-00', 'Oli mesin oli gardan (2)', 0, 'ganti-oli-694e52887bb75-MqtuEp2OXeCaNYlsbA', '2025-12-26 08:16:56', '2025-12-26 08:16:56', '0000-00-00 00:00:00'),
(34, 1, 9, 'Hatomugi', '2025-12-11', '0000-00-00', 'Berapa lama?', 0, 'hatomugi-694e54a0b3283-7fcu2xmITJZn6aMOFG', '2025-12-26 08:25:52', '2025-12-26 08:25:52', '0000-00-00 00:00:00'),
(35, 1, 2, 'Listrik', '2026-02-07', '2026-03-14', '75.20kWh', 1, 'listrik-698ca22527993-w6bzSdMaY8q1HCJ0-e', '2026-02-11 14:37:09', '2026-03-15 15:25:02', '0000-00-00 00:00:00'),
(36, 1, 2, 'Listrik', '2026-03-14', '2026-05-16', '75.20kWh', 1, 'listrik-69b6dd374829f-AZakmEONLp5sqUb0uP', '2026-03-15 15:24:23', '2026-05-16 15:01:51', '0000-00-00 00:00:00'),
(37, 1, 9, 'panjangin rambut', '2026-05-05', '0000-00-00', 'undercut', 0, 'panjangin-rambut-6a08952a0f7fe-S2PhcuflHt-zqN3Jbj', '2026-05-16 15:02:50', '2026-05-16 15:02:50', '0000-00-00 00:00:00'),
(38, 1, 2, 'Listrik', '2026-05-16', '0000-00-00', '75.20kWh', 0, 'listrik-6a0895442dd3f-s_yKrM2UNa3EI8h5ie', '2026-05-16 15:03:16', '2026-05-16 15:03:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `savings_goals`
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
-- Dumping data untuk tabel `savings_goals`
--

INSERT INTO `savings_goals` (`id`, `id_user`, `goal_name`, `target_amount`, `start_date`, `end_date`, `frequency`, `total_saved`, `jml_cicilan`, `icon`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'beli tanah', 50000000, '2024-11-20', '2027-08-07', 'bulanan', 2000000, 2000000, 'fa-users', 'beli-tanah-673dff8ae179b-OZ8Cjuw3JUSILn2sEb', '2024-11-07 12:50:01', '2025-11-23 13:12:23', '2025-11-23 21:12:23'),
(3, 0, 'PC baru', 10000000, '2024-11-20', '0000-00-00', 'bulanan', 2000000, 1000000, 'fa-computer', 'pc-baru-673dfabe61996-gXkc6Is_pO-QvVbud5', '2024-11-18 17:06:45', '2024-11-22 01:58:11', '0000-00-00 00:00:00'),
(4, 0, 'tes 2', 20000000, '2024-11-20', '0000-00-00', 'bulanan', 600000, 150000, 'fa-home', 'tes-2-673dff61e0af9-cIe6vL5J2kTKnszEud', '2024-11-18 18:49:58', '2024-11-22 20:07:41', '0000-00-00 00:00:00'),
(5, 2, 'testing', 2000000, '2024-12-29', '0000-00-00', 'bulanan', 0, 50000, 'fa-star', 'testing-67714c08ccee9-8uPtDjRrWTgIyYm57x', '2024-12-29 12:18:00', '2024-12-29 12:18:00', '0000-00-00 00:00:00'),
(6, 2, 'Dana Darurat', 50000000, '2024-12-29', '0000-00-00', 'bulanan', 0, 100000, 'fa-triangle-exclamation', 'dana-darurat-67714c3c35f76-rXYIPnNmUCcBOSw2Rg', '2024-12-29 12:18:52', '2024-12-29 12:18:52', '0000-00-00 00:00:00'),
(7, 3, 'testing', 5000000, '2024-12-29', '0000-00-00', 'bulanan', 0, 100000, 'fa-xmark', 'testing-67714d096c408-g-azD5SHjBuvqOoKPm', '2024-12-29 12:22:17', '2024-12-29 12:22:17', '0000-00-00 00:00:00'),
(8, 1, 'Dana Darurat', 50000000, '2025-01-01', '0000-00-00', 'bulanan', 2250000, 100000, 'fa-triangle-exclamation', 'dana-darurat-67750271bc601-S3i58vGgLczHTYXEsq', '2025-01-01 07:53:05', '2025-08-03 13:16:45', '0000-00-00 00:00:00'),
(9, 4, 'Dana darurat', 50000000, '2025-01-17', '0000-00-00', 'bulanan', 100000, 100000, 'fa-circle-xmark', 'dana-darurat-6789c86e16d1a-WpxGA_ot9sY158Khiw', '2025-01-17 02:03:10', '2025-01-17 04:38:30', '0000-00-00 00:00:00'),
(10, 1, 'Dani', 2000000, '2025-03-16', '0000-00-00', 'bulanan', 2000000, 250000, 'fa-handshake', 'dani-67d68748ded76-KUiBajJ5mx1nfrhQV-', '2025-03-16 07:09:44', '2025-11-23 13:10:53', '0000-00-00 00:00:00'),
(11, 1, 'Hari yus', 10000000, '2025-09-18', '0000-00-00', 'bulanan', 0, 1000000, 'fa-handshake', 'hari-yus-68cc1ae0411d0-CEQYSq7A-idys4vBp5', '2025-09-18 13:44:48', '2025-09-18 13:44:48', '0000-00-00 00:00:00'),
(12, 1, 'Khalid', 1000000, '2025-11-23', '0000-00-00', 'bulanan', 1000000, 50000, 'fa-k', 'khalid-6923170eb0c41-zvJiH4Dqp_Qwysu2eM', '2025-11-23 13:15:42', '2026-02-18 03:37:17', '0000-00-00 00:00:00'),
(13, 1, 'Alfin', 9700000, '2025-11-23', '0000-00-00', 'bulanan', 0, 200000, 'fa-a', 'alfin-69231751e27f6-ZFscgvPHCRMKVLQ_1d', '2025-11-23 13:16:49', '2025-11-23 13:16:49', '0000-00-00 00:00:00'),
(14, 1, 'Risky', 1800000, '2025-11-23', '0000-00-00', 'bulanan', 0, 50000, 'fa-r', 'risky-69231796932ed-Tl2YL9tCXPqekJ13ou', '2025-11-23 13:17:58', '2025-11-23 13:17:58', '0000-00-00 00:00:00'),
(15, 1, 'Dani', 2000000, '2026-02-18', '0000-00-00', 'bulanan', 1500000, 250000, 'fa-tooth', 'dani-699541d1a767f-AWgk1fjuK-Jc6VvrEO', '2026-02-18 03:36:33', '2026-05-16 14:51:36', '0000-00-00 00:00:00'),
(16, 1, 'Sudhipurwa', 1450000, '2026-03-01', '0000-00-00', 'bulanan', 1450000, 250000, 'fa-n', 'sudhipurwa-69a46284c6ea7-86jgwJO1nUATPx3hiR', '2026-03-01 15:00:04', '2026-03-08 14:20:32', '0000-00-00 00:00:00'),
(17, 1, 'Reksadana', 10000000, '2026-05-16', '0000-00-00', 'bulanan', 200000, 200000, 'fa-home', 'reksadana-6a08944d89291-dYuhjfZn9w2cvJ4BAo', '2026-05-16 14:59:09', '2026-05-16 14:59:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_dompet_from` int(11) NOT NULL,
  `id_dompet_to` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 2,
  `slug` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `slug`, `reset_token`, `status_user`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tes', 'tes@gmail.com', '$2y$10$muUNml7u5peOmGHWprJVfeQaeDYFBOttNYTYz5qfYEQCQ78maVEUu', '', '', 1, '2025-01-02 07:43:40', '2025-01-02 07:43:40', '0000-00-00 00:00:00'),
(2, 'test1', '', '$2y$10$iOEGwIYoQRnWetpwP6FYL.io3s27Irf30u1aHdmLneWQSlYMKsAUu', 'test1-67595c4a3c373-gDtaIT3bEy2ZFhX_kO', '', 0, '2024-12-11 01:32:58', '2024-12-11 23:18:08', '0000-00-00 00:00:00'),
(3, 'ifan testing', '', '$2y$10$L99d7xiNpfeRjjI6VJdvvuC9TxAF0zHyhzI1UKrp3ykW3LGAThorq', 'ifan-testing-675d98efe8dd2-7_lYi0zjsLIapARU2m', '', 0, '2024-12-14 06:40:48', '2024-12-27 05:03:52', '0000-00-00 00:00:00'),
(4, 'coba21', 'coba21@gmail.com', '$2y$10$iOFk1RqtU2/yrmM4lbzEyucxoTg07B/wA6CMSP6nuaPBsv8C0YJI2', 'coba21-67779255c80e7-s37c-SRW_FLOf6VtD8', '', 0, '2025-01-03 06:31:33', '2025-01-03 06:31:33', '0000-00-00 00:00:00'),
(5, 'reacher', 'reacher@mail.com', '$2y$10$TAx8wt0rDwvQk3WFNBz8yedHTzeC3Zt2BiDCtqjJvqnJVT.VYsEA2', 'reacher-67bfc78fa49bf-PXIF0D5y3tG4TAJMpV', '', 0, '2025-02-27 01:01:51', '2025-06-28 07:08:08', '0000-00-00 00:00:00'),
(6, 'mujahid_ali', 'mrhsart33@gmail.com', '$2y$10$o6lD2G3AZiccKF54TlPLFO2p1L4BTjg7HlqS4CQ868GVm.E90jr5a', 'mujahid-ali-67d8c8e582c2d-FRzCwlEA-VyaqQpO74', '', 0, '2025-03-18 00:14:13', '2025-03-18 00:14:13', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cicilan_savings`
--
ALTER TABLE `cicilan_savings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `icons`
--
ALTER TABLE `icons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventori`
--
ALTER TABLE `inventori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_expenses`
--
ALTER TABLE `kategori_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_income`
--
ALTER TABLE `kategori_income`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pakai`
--
ALTER TABLE `pakai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `savings_goals`
--
ALTER TABLE `savings_goals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cicilan_savings`
--
ALTER TABLE `cicilan_savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `dompet`
--
ALTER TABLE `dompet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=469;

--
-- AUTO_INCREMENT untuk tabel `icons`
--
ALTER TABLE `icons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `inventori`
--
ALTER TABLE `inventori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_expenses`
--
ALTER TABLE `kategori_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori_income`
--
ALTER TABLE `kategori_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pakai`
--
ALTER TABLE `pakai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `savings_goals`
--
ALTER TABLE `savings_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
