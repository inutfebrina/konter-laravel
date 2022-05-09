-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 06:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konter`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangapps`
--

CREATE TABLE `barangapps` (
  `id_barang` int(10) UNSIGNED NOT NULL,
  `id_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_bl` int(11) NOT NULL,
  `harga_jl` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `unit` enum('PCS','Pack') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangapps`
--

INSERT INTO `barangapps` (`id_barang`, `id_data`, `id`, `nm_barang`, `harga_bl`, `harga_jl`, `stok`, `unit`, `created_at`, `updated_at`) VALUES
(4, '2', '4', 'AXIS 1 GB', 11500, 14000, 5, 'PCS', NULL, '2022-04-07 23:57:29'),
(5, '2', '4', 'AXIS 2 GB', 20500, 23000, 5, 'PCS', NULL, NULL),
(6, '2', '4', 'AXIS 3 GB', 26500, 30000, 8, 'PCS', NULL, NULL),
(7, '2', '2', 'ISAT 2 GB MINI', 29250, 31000, 8, 'PCS', NULL, NULL),
(8, '2', '2', 'ISAT 1 GB UNLIMITED', 18250, 21000, 5, 'PCS', NULL, NULL),
(9, '2', '5', 'SMARTFREN 16GB', 35500, 40000, 11, 'PCS', NULL, NULL),
(10, '1', '1', 'Telkomsel 10k', 10000, 12000, 25, 'PCS', NULL, '2022-04-11 02:09:04'),
(11, '1', '1', 'Telkomsel 20k', 20000, 22000, 10, 'PCS', NULL, NULL),
(12, '1', '4', 'XL 10k', 9750, 11500, 6, 'PCS', NULL, '2022-04-08 00:03:28'),
(17, '1', '4', 'Axis 20K', 20000, 22000, 10, 'PCS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dataapps`
--

CREATE TABLE `dataapps` (
  `id_data` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dataapps`
--

INSERT INTO `dataapps` (`id_data`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Pulsa', NULL, NULL),
(2, 'Paket Data', NULL, NULL),
(3, 'Token Listrik', NULL, NULL),
(4, 'Charger Hp', NULL, '2022-04-11 20:56:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoriapps`
--

CREATE TABLE `kategoriapps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoriapps`
--

INSERT INTO `kategoriapps` (`id`, `provider`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Tekomsel', 'Telkomsel.png', '2022-04-08 02:33:39', '2022-04-08 01:14:32'),
(2, 'Indosat', 'Indosat.png', NULL, '2022-04-08 01:14:41'),
(3, '3 (Tri)', 'Three.png', NULL, '2022-04-08 01:14:50'),
(4, 'XL Axiata', 'XL.png', NULL, '2022-04-08 01:14:59'),
(5, 'Smartfren', 'Smartfren.png', NULL, '2022-04-08 01:15:10'),
(6, '-', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keranjangapps`
--

CREATE TABLE `keranjangapps` (
  `id_keranjang` int(10) UNSIGNED NOT NULL,
  `id_trans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `terjual` int(11) NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjangapps`
--

INSERT INTO `keranjangapps` (`id_keranjang`, `id_trans`, `id_barang`, `tgl`, `terjual`, `ket`, `total`, `created_at`, `updated_at`) VALUES
(1, '8', '5', '2022-04-13', 4, '-', 92000, NULL, NULL),
(2, '8', '7', '2022-04-13', 6, '-', 186000, NULL, NULL),
(3, '9', '7', '2022-04-20', 2, '--', 62000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keranjangtmps`
--

CREATE TABLE `keranjangtmps` (
  `id_keranjang` int(10) UNSIGNED NOT NULL,
  `id_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `terjual` int(11) NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `nama`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yerri Kurnia Febrina', 'inut', '$2y$10$mv/qDcA5IgrxjJcCj/IKF.f9xpbX1kOTgd8cI0XCho558ielMtCtS', NULL, NULL, NULL),
(2, 'Yerri Kurnia Febrina', 'inut', '$2y$10$DUuyhfx5RkOQqmlrn50ZzuA.2c./wAdmaRp7ykYxVbMsZRJ1CBqym', NULL, NULL, NULL),
(3, 'Yerri Kurnia Febrina', 'inutfebrina', '$2y$10$8SB47toTJQio.XpyGzeRQuAHchUORs86R/2qCRNlHOHykbcJt08CW', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_29_025433_create_userapps_table', 1),
(6, '2022_03_29_095508_create_barangapps_table', 1),
(7, '2022_03_30_025255_create_logins_table', 1),
(8, '2022_03_31_075647_create_dataapps_table', 1),
(9, '2022_03_31_082332_create_kategoriapps_table', 1),
(10, '2022_04_08_045508_create_barangapps_table', 2),
(11, '2022_04_08_083019_create_transapps_table', 3),
(12, '2022_04_13_082319_create_keranjangapps_table', 4),
(13, '2022_04_13_082845_create_keranjangapps_table', 5),
(14, '2022_04_13_083027_create_keranjangtmps_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transapps`
--

CREATE TABLE `transapps` (
  `id_trans` int(10) UNSIGNED NOT NULL,
  `tgl` date DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transapps`
--

INSERT INTO `transapps` (`id_trans`, `tgl`, `invoice`, `created_at`, `updated_at`) VALUES
(8, '2022-04-13', '000001', NULL, NULL),
(9, '2022-04-20', '000002', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userapps`
--

CREATE TABLE `userapps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('laki-laki','perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userapps`
--

INSERT INTO `userapps` (`id`, `nama`, `no_telp`, `alamat`, `email`, `jk`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Yerri Kurnia Febrina', '082389598994', 'Lubuk Begalung', 'inutfebrina@gmail.com', 'perempuan', 'icon.png', NULL, '2022-04-08 00:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangapps`
--
ALTER TABLE `barangapps`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `id_data` (`id_barang`,`id_data`),
  ADD UNIQUE KEY `id` (`id_barang`,`id`);

--
-- Indexes for table `dataapps`
--
ALTER TABLE `dataapps`
  ADD PRIMARY KEY (`id_data`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategoriapps`
--
ALTER TABLE `kategoriapps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjangapps`
--
ALTER TABLE `keranjangapps`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `keranjangtmps`
--
ALTER TABLE `keranjangtmps`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transapps`
--
ALTER TABLE `transapps`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `userapps`
--
ALTER TABLE `userapps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangapps`
--
ALTER TABLE `barangapps`
  MODIFY `id_barang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dataapps`
--
ALTER TABLE `dataapps`
  MODIFY `id_data` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoriapps`
--
ALTER TABLE `kategoriapps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `keranjangapps`
--
ALTER TABLE `keranjangapps`
  MODIFY `id_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keranjangtmps`
--
ALTER TABLE `keranjangtmps`
  MODIFY `id_keranjang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transapps`
--
ALTER TABLE `transapps`
  MODIFY `id_trans` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userapps`
--
ALTER TABLE `userapps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
