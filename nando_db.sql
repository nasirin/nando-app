-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 05.32
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nando`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','manager') NOT NULL,
  `img_adm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id_adm`, `nama_adm`, `email`, `password`, `level`, `img_adm`) VALUES
(20, 'Nando', 'nando@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'manager', '1624973903_cad2f317ca7a531da1c5.png'),
(21, 'Admin', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '1624973929_7948993a36f4be264996.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int(11) NOT NULL,
  `id_kamar` int(16) NOT NULL,
  `id_pel` int(16) NOT NULL,
  `harga_per` varchar(20) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date DEFAULT NULL,
  `total` int(16) DEFAULT NULL,
  `due_date_booking` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kamar`
--

CREATE TABLE `detail_kamar` (
  `id_detail_kamar` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `waktu_sewa` varchar(20) NOT NULL,
  `biaya` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_kamar`
--

INSERT INTO `detail_kamar` (`id_detail_kamar`, `id_kamar`, `waktu_sewa`, `biaya`) VALUES
(1, 1, 'Bulanan', 2000000),
(2, 1, 'Mingguan', 500000),
(3, 1, 'Tahunan', 22000000),
(4, 2, 'Bulanan', 2000000),
(5, 2, 'Mingguan', 500000),
(6, 2, 'Tahunan', 22000000),
(7, 3, 'Bulanan', 2000000),
(8, 3, 'Mingguan', 500000),
(9, 3, 'Tahunan', 22000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamars`
--

CREATE TABLE `kamars` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(20) NOT NULL,
  `luas` varchar(10) NOT NULL,
  `status` enum('available','booked') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kamars`
--

INSERT INTO `kamars` (`id_kamar`, `nama_kamar`, `luas`, `status`) VALUES
(1, '01', '4 x 4', 'booked'),
(2, '02', '4 x 4', 'booked'),
(3, '03', '4 x 4', 'booked');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebutuhans`
--

CREATE TABLE `kebutuhans` (
  `id_kebutuhan` int(11) NOT NULL,
  `kebutuhan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya` int(16) NOT NULL,
  `note` varchar(255) NOT NULL,
  `bulan_kebutuhan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id_payment` int(11) NOT NULL,
  `id_booking` int(16) NOT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `id_pel` int(11) DEFAULT NULL,
  `tgl_bayar` date NOT NULL,
  `nominal` int(16) NOT NULL,
  `due_date` date NOT NULL,
  `status` enum('pending','telat','success','checkout') NOT NULL,
  `denda` int(16) DEFAULT NULL,
  `bulan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id_pel` int(11) NOT NULL,
  `nama_pel` varchar(30) NOT NULL,
  `notelp` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `img_ktp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggans`
--

INSERT INTO `pelanggans` (`id_pel`, `nama_pel`, `notelp`, `alamat`, `tgl_lahir`, `pekerjaan`, `jk`, `img_ktp`) VALUES
(1, 'Susanto', '0822211', 'semarang', '1994-10-20', 'Dosen', 'Laki-laki', NULL),
(2, 'Gilang', '0899111111', 'Solotigo', '1995-09-20', 'PNS', 'Laki-laki', NULL),
(3, 'Krisna', '0822333', 'Demak', '1997-10-10', 'Mahasiswa', 'Laki-laki', '1626763224_d4cbf5a3b5e0b1bd5191.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `detail_kamar`
--
ALTER TABLE `detail_kamar`
  ADD PRIMARY KEY (`id_detail_kamar`);

--
-- Indeks untuk tabel `kamars`
--
ALTER TABLE `kamars`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kebutuhans`
--
ALTER TABLE `kebutuhans`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_payment`);

--
-- Indeks untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id_pel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_kamar`
--
ALTER TABLE `detail_kamar`
  MODIFY `id_detail_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kebutuhans`
--
ALTER TABLE `kebutuhans`
  MODIFY `id_kebutuhan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payments`
--
ALTER TABLE `payments`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
