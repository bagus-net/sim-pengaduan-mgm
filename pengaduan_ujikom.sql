-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2020 pada 00.43
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_ujikom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pengaduan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_pengaduan`, `komentar`, `foto`, `name`, `created_at`, `updated_at`) VALUES
(8, '23', 'keren mam aplikasinya hahaha', 'avatar.png', 'Naufal China', '2020-04-10 14:42:26', '2020-04-10 14:42:26');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `masyarakat`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `masyarakat` (
`id` bigint(20) unsigned
,`nik` char(16)
,`telp` char(12)
,`name` varchar(191)
,`email` varchar(191)
,`password` varchar(191)
,`level` enum('admin','petugas','masyarakat')
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_04_05_123021_create_pengaduan_table', 2),
(5, '2020_04_06_113825_create_komentar_table', 3),
(6, '2020_04_07_104252_create_pengumuman_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_laporan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('verified','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `cover`, `nik`, `nama`, `isi_laporan`, `foto`, `judul`, `kategori`, `status`, `id_petugas`, `created_at`, `updated_at`) VALUES
(19, '1586155843_.png', '3201251409760004', 'Imam Firmansyah', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quisquam, eius ea voluptate dolorum facere. In consequatur optio sequi eius! Ullam nam maxime odio veritatis ducimus eaque alias voluptate et!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quisquam, eius ea voluptate dolorum facere. In consequatur optio sequi eius! Ullam nam maxime odio veritatis ducimus eaque alias voluptate et!</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quisquam, eius ea voluptate dolorum facere. In consequatur optio sequi eius! Ullam nam maxime odio veritatis ducimus eaque alias voluptate et!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quisquam, eius ea voluptate dolorum facere. In consequatur optio sequi eius! Ullam nam maxime odio veritatis ducimus eaque alias voluptate et!</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quisquam, eius ea voluptate dolorum facere. In consequatur optio sequi eius! Ullam nam maxime odio veritatis ducimus eaque alias voluptate et!</p>', '1586291590_.jpg', 'Dugaan Penimbun Masker', 'Bantuan Kemanusian', 'selesai', 12, '2020-04-07 13:33:10', '2020-04-10 14:37:25'),
(23, '1586543626_.jpg', '3201251409760004', 'Imam Firmansyah aja', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '1586552376_.jpg', 'Dugaan Penyeludupan Uang', 'Pelayanan Masyarakat', 'selesai', 12, '2020-04-10 13:59:36', '2020-04-10 14:37:39'),
(25, '1586543626_.jpg', '3201251409760004', 'Imam Firmansyah aja', '<p>korremea kaeroearkao earokkerj korremea kaeroearkao earokkerj korremea kaeroearkao earokkerj korremea kaeroearkao earokkerj korremea kaeroearkao earokkerj</p>', '1586553376_.jpeg', 'dasdaas', 'Pelayanan Masyarakat', 'verified', 12, '2020-04-10 14:16:16', '2020-04-10 14:37:14'),
(26, 'avatar.png', '3201251409760011', 'Naufal China', '<p>hehehheheheheheh heheheh ehehehehe heheheheh hehehheheheheheh heheheh ehehehehe heheheheh hehehheheheheheh heheheh ehehehehe heheheheh </p>', '1586554844_.jpg', 'Tes Laporan deh', 'Bantuan Kemanusian', 'proses', 12, '2020-04-10 14:40:44', '2020-04-10 14:41:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `nama`, `level`, `isi`, `judul`, `created_at`, `updated_at`) VALUES
(3, 'Imam Firmansyah', 'admin', '<p>Verifikasi Laporan ketika anda mengirim laporan pada aplikasi pedora, jadi laporan yang anda kirim tidak langsung akan di munculkan di beranda orang lain, harus melalui verifikasi selama maximal 3 hari peninjauan.</p>', 'Apa itu Verifikasi Laporan?', '2020-04-10 12:47:37', '2020-04-10 12:47:37');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tanggapan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tanggapan` (
`id` bigint(20) unsigned
,`nik` varchar(191)
,`nama` varchar(191)
,`judul` varchar(191)
,`isi_laporan` text
,`kategori` varchar(32)
,`status` enum('verified','proses','selesai')
,`name` varchar(191)
,`level` enum('admin','petugas','masyarakat')
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` char(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas','masyarakat') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `foto`, `nik`, `telp`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, '1586543626_.jpg', '3201251409760004', '087870400291', 'Imam Firmansyah', 'imamfirmansyah724@gmail.com', NULL, '$2y$10$kcqZ7xmI6jlcvz2Sz1qL5e6ZGMcPHXcxhjfbi8VWy55Uvr2tadxjq', 'masyarakat', NULL, '2022-04-05 23:59:31', '2020-04-10 14:31:32'),
(11, 'avatar.png', '3201251409760011', '087870400294', 'Naufal China', 'naufal@gmail.com', NULL, '$2y$10$WOxVPcBVTNwUPLXoBgWcrOPUQIf/loNGL/evagBzmgZVvo40P26rK', 'masyarakat', NULL, '2020-04-06 01:12:00', '2020-04-08 03:17:28'),
(12, '1586339122_.png', '3201251409760071', '08817211099', 'Imam Firmansyah', 'admin@admin.com', NULL, '$2y$10$wZSHIFIVJ52kAJs3K0Zu1uZwiOq1r.H193kEG0IZecZn1qBYkDMkW', 'admin', NULL, '2020-04-06 23:48:21', '2020-04-10 12:34:51'),
(13, 'avatar.png', NULL, NULL, 'anwar biasa aja', 'petugas@anwar.com', NULL, '$2y$10$wZSHIFIVJ52kAJs3K0Zu1uZwiOq1r.H193kEG0IZecZn1qBYkDMkW', 'petugas', NULL, '2020-04-06 17:00:00', '2020-04-10 13:11:57'),
(14, 'avatar.png', '3201251409760088', '08817211096', 'Imam Firmansyah', 'imamfirmansyah@gmail.com', NULL, '$2y$10$y6OGdZwo5XOo6aDavTPg/OG95gMJ0.A8uvw48zkGdam.474mP1yDy', 'masyarakat', NULL, '2020-04-10 15:22:44', '2020-04-10 15:22:44');

-- --------------------------------------------------------

--
-- Struktur untuk view `masyarakat`
--
DROP TABLE IF EXISTS `masyarakat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `masyarakat`  AS  select `users`.`id` AS `id`,`users`.`nik` AS `nik`,`users`.`telp` AS `telp`,`users`.`name` AS `name`,`users`.`email` AS `email`,`users`.`password` AS `password`,`users`.`level` AS `level`,`users`.`created_at` AS `created_at` from `users` where (`users`.`level` = 'masyarakat') ;

-- --------------------------------------------------------

--
-- Struktur untuk view `tanggapan`
--
DROP TABLE IF EXISTS `tanggapan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tanggapan`  AS  select `pengaduan`.`id` AS `id`,`pengaduan`.`nik` AS `nik`,`pengaduan`.`nama` AS `nama`,`pengaduan`.`judul` AS `judul`,`pengaduan`.`isi_laporan` AS `isi_laporan`,`pengaduan`.`kategori` AS `kategori`,`pengaduan`.`status` AS `status`,`users`.`name` AS `name`,`users`.`level` AS `level` from (`pengaduan` join `users`) where (`pengaduan`.`id_petugas` = `users`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
