-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 Feb 2018 pada 19.18
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_niashotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tamu_id` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `checkin`
--

INSERT INTO `checkin` (`id`, `user_id`, `tamu_id`, `tgl`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-01-19', 1, '2018-01-21 09:55:19', '2018-01-21 20:01:44'),
(2, 3, 1, '2018-01-31', 1, '2018-02-02 17:52:29', '2018-02-05 09:58:18'),
(3, 3, 1, '2018-02-02', 1, '2018-02-02 02:59:47', '2018-02-05 09:59:59'),
(4, 3, 2, '2018-02-06', 1, '2018-02-05 19:39:26', '2018-02-07 23:17:18'),
(5, 3, 1, '2018-02-07', 1, '2018-02-07 09:05:47', '2018-02-07 23:16:50'),
(6, 3, 1, '2018-02-08', 0, '2018-02-07 23:36:27', '2018-02-07 23:36:27'),
(7, 3, 2, '2018-02-08', 0, '2018-02-07 23:38:00', '2018-02-07 23:38:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `checkin_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `keterangan` text,
  `status` int(1) DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `service` float DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id`, `checkin_id`, `user_id`, `tgl`, `keterangan`, `status`, `tax`, `service`, `diskon`, `subtotal`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-01-22', NULL, 1, 0, 0, NULL, 0, 855000, '2018-01-21 20:01:44', '2018-01-21 20:01:44'),
(2, 2, 3, '2018-02-05', NULL, 1, 105000, 73500, 10, 1050000, 1105650, '2018-02-05 09:58:18', '2018-02-05 09:58:18'),
(3, 3, 3, '2018-02-05', NULL, 1, 225000, 157500, 15, 2250000, 2237625, '2018-02-05 09:59:59', '2018-02-05 09:59:59'),
(4, 5, 3, '2018-02-08', NULL, 1, 21000, 14700, 1, 210000, 243243, '2018-02-07 23:16:50', '2018-02-07 23:16:50'),
(5, 4, 3, '2018-02-08', NULL, 1, 170000, 119000, 1, 1700000, 1969110, '2018-02-07 23:17:18', '2018-02-07 23:17:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `type_id`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'a574553b871dc5c069c3982ecc224315.jpg', 'Foto Kamar', '2018-01-19 23:40:35', '2018-01-19 23:40:35'),
(2, 1, 'dda1c629879a1073a872c161b6f13a91.jpg', 'awesome', '2018-01-19 23:48:57', '2018-01-19 23:48:57'),
(3, 1, '47661939749042e55a157a15d2020919.jpg', 'Keren', '2018-01-19 23:49:08', '2018-01-19 23:49:08'),
(4, 2, 'f21098fb18e5feda4ef2f76a4477a750.jpg', 'Mantap', '2018-01-19 23:49:27', '2018-01-19 23:49:27'),
(5, 2, '75ddf3031abd02db871170c2e775777c.jpg', 'Kamar', '2018-01-19 23:49:40', '2018-01-19 23:49:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `no_kamar` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `extra_bed` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `type_id`, `status`, `no_kamar`, `harga`, `extra_bed`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 'L101', 200000, 75000, '2018-01-19 23:27:32', '2018-02-07 23:36:27'),
(2, 2, 1, 'L103', 200000, 75000, '2018-02-02 02:59:34', '2018-02-07 23:19:09'),
(3, 2, 0, 'L102', 200000, 75000, '2018-02-07 09:03:53', '2018-02-07 23:38:00'),
(4, 2, 1, 'L104', 200000, 75000, '2018-02-07 23:19:40', '2018-02-07 23:19:40'),
(5, 2, 1, 'L105', 200000, 75000, '2018-02-07 23:20:06', '2018-02-07 23:20:06'),
(6, 2, 1, 'L106', 200000, 75000, '2018-02-07 23:20:43', '2018-02-07 23:20:43'),
(7, 2, 1, 'L107', 200000, 75000, '2018-02-07 23:21:19', '2018-02-07 23:21:19'),
(8, 2, 1, 'L108', 200000, 75000, '2018-02-07 23:21:50', '2018-02-07 23:21:50'),
(9, 2, 1, 'L109', 200000, 75000, '2018-02-07 23:22:17', '2018-02-07 23:22:17'),
(10, 2, 1, 'L110', 200000, 75000, '2018-02-07 23:22:51', '2018-02-07 23:22:51'),
(11, 1, 1, 'L131', 350000, 100000, '2018-02-07 23:24:37', '2018-02-07 23:26:34'),
(12, 1, 1, 'L132', 350000, 100000, '2018-02-07 23:25:16', '2018-02-07 23:26:54'),
(13, 1, 1, 'L133', 350000, 100000, '2018-02-07 23:25:49', '2018-02-07 23:27:12'),
(14, 1, 1, 'L234', 350000, 100000, '2018-02-07 23:27:36', '2018-02-07 23:27:36'),
(15, 1, 1, 'L235', 350000, 100000, '2018-02-07 23:28:06', '2018-02-07 23:28:06'),
(16, 1, 1, 'L236', 350000, 100000, '2018-02-07 23:28:42', '2018-02-07 23:28:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text,
  `hp` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `jenis_kelamin` int(1) DEFAULT NULL,
  `citizen` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id`, `nama`, `alamat`, `hp`, `email`, `no_identitas`, `jenis_kelamin`, `citizen`, `created_at`, `updated_at`) VALUES
(1, 'Hendra Wijaya', 'Jalan Gita Sura No.1', '082247464196', 'wijaya.imd@gmail.com', '0838373744422', 1, 2, '2018-01-20 00:08:47', '2018-02-12 10:15:15'),
(2, 'Sarita Gita Anandari', 'Jalan Antasura No.8', '08557373736', 'saritagita@mail.com', '983792837493287', 2, 2, '2018-02-05 09:42:06', '2018-02-07 23:29:16'),
(3, 'Wirajaya Wijaya Kusuma', 'Jalan Bukit Gede no 99x', '08782134567', 'wirajaya@yahoo.com', '234567899098765', 1, 1, '2018-02-07 23:30:33', '2018-02-07 23:30:33'),
(4, 'Nitia Sari', 'Jalan Unggasan no 78', '089678234567', 'nitia123@gmail.com', '12345678765432', 2, 2, '2018-02-07 23:31:25', '2018-02-07 23:31:25'),
(5, 'Ni Made Wirantini', 'Jalan Batu Bidak no 12', '08786788771', 'mdwirantini@yahoo.co.id', '12345678987654321', 2, 1, '2018-02-07 23:32:19', '2018-02-07 23:32:19'),
(6, 'Wayan Kasih Wirantini Dewi', 'Jalan Suli no 56', '087860123145', 'kasihwd@yahoo.com', '1239008766622', 2, 1, '2018-02-07 23:33:34', '2018-02-07 23:33:34'),
(7, 'Tedy Mahadi Putra', 'Jalan Pulau Bali no 76', '0822345678', 'tedymp@yahoo.com', '23402991922222', 1, 2, '2018-02-07 23:35:03', '2018-02-07 23:35:03'),
(8, 'Gita Gutawa', 'Jalan Gunung Andakasa no 90', '08776527111', 'gitagutawa@yahoo.com', '12345532332', 2, 2, '2018-02-07 23:36:00', '2018-02-07 23:36:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL,
  `checkin_id` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `jumlah_tamu` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `extra_bed` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `checkin_id`, `kamar_id`, `jumlah_tamu`, `total`, `extra_bed`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 285000, 1, '2018-01-21 09:55:19', '2018-01-21 09:55:19'),
(2, 2, 1, 1, 210000, 0, '2018-02-02 17:52:29', '2018-02-02 17:52:29'),
(3, 3, 2, 3, 750000, 0, '2018-02-02 02:59:47', '2018-02-02 02:59:47'),
(4, 4, 2, 2, 850000, 1, '2018-02-05 19:39:26', '2018-02-05 19:39:26'),
(5, 5, 1, 1, 210000, 0, '2018-02-07 09:05:47', '2018-02-07 09:05:47'),
(6, 6, 1, 2, 200000, 0, '2018-02-07 23:36:27', '2018-02-07 23:36:27'),
(7, 7, 3, 2, 275000, 1, '2018-02-07 23:38:00', '2018-02-07 23:38:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fasilitas` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `type`
--

INSERT INTO `type` (`id`, `name`, `fasilitas`, `status`, `created_at`, `updated_at`) VALUES
(1, 'VIP', 'AC, TV, Double Bed, Lemari, Meja, Kursi', 1, '2018-01-18 11:27:21', '2018-02-07 23:16:10'),
(2, 'Standar', 'AC, TV, Double Bed, Lemari, Meja, Kursi', 1, '2018-01-19 22:34:24', '2018-02-07 23:15:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` int(1) NOT NULL,
  `type` int(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `isActive`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@mail.com', '082247464196', '$2y$10$dRhj6fdwxNY2C/iM7Cb9fu4C30pQCNo7vp5TvRg1rKmljjG/M9hR.', 1, 1, 'EHr4L2cVkDpXCKkbNuSCqz1vZHrUQIbZx790GvZvxVi0PFRX2dIxB2fTJJxy', '2018-01-17 21:18:42', '2018-01-20 00:45:50'),
(2, 'Nias', 'nias@gmail.com', '0837474637', '$2y$10$OAwNl6kAoDP7pQu4XQ.gA.CXhAhasyBXJTc8C3s8jln0JHd7eNoJa', 1, 1, NULL, '2018-01-20 00:33:20', '2018-01-20 00:33:20'),
(3, 'Karyawan Teladan', 'karyawan@mail.com', '085737343658', '$2y$10$3S9X9MBtUglK9dMc0TnIcuegFWQ2jYMvw5pKqbkFcN7mOarTuM2Zy', 1, 2, 'DKIKdeGz221xOuCt59jeudqXKVtmx5fCCI6XIetfXgVQmh5RsULiaPtez0Hr', '2018-01-20 00:41:44', '2018-01-20 00:42:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
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
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
