-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 31 Bulan Mei 2021 pada 08.26
-- Versi server: 5.7.24
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian_smk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `aktivitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oleh` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `ip_address` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_antrian`
--

CREATE TABLE `tiket_antrian` (
  `id` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `hari` date NOT NULL,
  `status_tiket` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_ambil` datetime NOT NULL,
  `tanggal_terpanggil` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tiket_antrian`
--

INSERT INTO `tiket_antrian` (`id`, `nomor`, `hari`, `status_tiket`, `tanggal_ambil`, `tanggal_terpanggil`) VALUES
(1, 1, '2021-05-08', 'MULAI', '2021-05-10 00:12:46', NULL),
(2, 2, '2021-05-08', 'MULAI', '2021-05-10 00:12:58', NULL),
(3, 3, '2021-05-08', 'MULAI', '2021-05-10 00:12:58', NULL),
(4, 4, '2021-05-08', 'MULAI', '2021-05-10 00:14:19', NULL),
(5, 1, '2021-05-09', 'MULAI', '2021-05-10 00:14:44', NULL),
(6, 2, '2021-05-09', 'MULAI', '2021-05-10 00:17:52', NULL),
(7, 3, '2021-05-09', 'MULAI', '2021-05-10 00:34:32', NULL),
(8, 1, '2021-05-10', 'SELESAI', '2021-05-10 18:35:47', '2021-05-10 23:28:41'),
(9, 2, '2021-05-10', 'SELESAI', '2021-05-10 18:35:48', '2021-05-10 23:28:59'),
(10, 3, '2021-05-10', 'SELESAI', '2021-05-10 18:35:49', '2021-05-10 23:29:00'),
(11, 4, '2021-05-10', 'SELESAI', '2021-05-10 21:14:55', '2021-05-10 23:28:51'),
(12, 5, '2021-05-10', 'SELESAI', '2021-05-10 21:14:56', '2021-05-10 23:28:53'),
(13, 6, '2021-05-10', 'SELESAI', '2021-05-10 21:39:07', '2021-05-10 23:29:02'),
(14, 7, '2021-05-10', 'SELESAI', '2021-05-10 22:42:23', '2021-05-10 23:28:56'),
(15, 8, '2021-05-10', 'SELESAI', '2021-05-10 23:00:40', '2021-05-10 23:28:57'),
(16, 9, '2021-05-10', 'SELESAI', '2021-05-10 23:40:24', '2021-05-10 23:40:27'),
(17, 10, '2021-05-10', 'SELESAI', '2021-05-10 23:40:29', '2021-05-10 23:40:30'),
(18, 1, '2021-05-11', 'SELESAI', '2021-05-11 11:28:33', '2021-05-11 11:28:48'),
(19, 2, '2021-05-11', 'SELESAI', '2021-05-11 11:28:35', '2021-05-11 11:28:41'),
(20, 3, '2021-05-11', 'SELESAI', '2021-05-11 11:28:36', '2021-05-11 11:28:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `myid` int(11) NOT NULL,
  `myusername` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mypassword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mylast_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`myid`, `myusername`, `mypassword`, `mylast_log`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2021-05-11 11:28:25');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tiket_antrian`
--
ALTER TABLE `tiket_antrian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`myid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tiket_antrian`
--
ALTER TABLE `tiket_antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `myid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
