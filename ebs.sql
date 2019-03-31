-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2019 pada 15.07
-- Versi server: 10.1.33-MariaDB
-- Versi PHP: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebs`
--
CREATE DATABASE IF NOT EXISTS `ebs` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ebs`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `notif_id` int(5) NOT NULL,
  `tgl_notif` datetime NOT NULL,
  `pesan` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `id_pengirim` int(5) NOT NULL,
  `id_penerima` int(5) NOT NULL,
  `dibaca` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `jml_order` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `item_id` int(5) NOT NULL,
  `toko_id` int(5) NOT NULL,
  `transaction_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prints`
--

CREATE TABLE `prints` (
  `print_id` int(3) UNSIGNED NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `file` varchar(150) NOT NULL,
  `jenis` enum('berwarna','hitam-putih') NOT NULL,
  `jml_lembar` int(3) NOT NULL,
  `jml_print` int(3) NOT NULL,
  `transaction_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokos`
--

CREATE TABLE `tokos` (
  `toko_id` int(2) UNSIGNED NOT NULL,
  `nama_toko` char(50) DEFAULT NULL,
  `foto_toko` varchar(150) DEFAULT NULL,
  `deskripsi_toko` varchar(255) DEFAULT NULL,
  `jenis_toko` enum('atk','seragam','kantin') NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko_items`
--

CREATE TABLE `toko_items` (
  `item_id` int(5) UNSIGNED NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `foto_item` varchar(150) NOT NULL,
  `deskripsi_item` varchar(255) DEFAULT NULL,
  `harga_item` float NOT NULL,
  `stok` int(3) NOT NULL,
  `toko_id` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(25) NOT NULL,
  `tgl_transaction` datetime NOT NULL,
  `total` float NOT NULL,
  `jenis` enum('isi saldo','beli','print','transfer','tarik tunai') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('Pending','Selesai','Batal') NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfers`
--

CREATE TABLE `transfers` (
  `transfer_id` int(5) UNSIGNED NOT NULL,
  `jml_transfer` float NOT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `id_pengirim` int(5) UNSIGNED NOT NULL,
  `id_penerima` int(5) UNSIGNED NOT NULL,
  `transaction_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` int(5) UNSIGNED NOT NULL,
  `no_induk` varchar(20) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `kelas` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','bmt','seragam','atk','print','kantin','guru','siswa','wali') NOT NULL,
  `saldo` float DEFAULT '0',
  `siswa_id` int(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `no_induk`, `nama`, `foto`, `kelas`, `email`, `telp`, `username`, `password`, `level`, `saldo`, `siswa_id`) VALUES
(1, '123456789101112', 'Administrator', 'storage\\3875e83a718c4ec27c355a8c8dc4027f\\foto_profil.png', NULL, 'admin@ebs.com', '085774237634', 'admin', '$2y$10$iI41RZ/GI6ni2bFq7Ej4AOqP8.gs1.aaLWNmafJgAF.ZUME0IuI.K', 'admin', 0, 0);
-- (2, '211101987654321', 'Petugas BMT', 'storage\\3991451c08f0e59f6b664647c2ddae9c\\foto_profil.png', NULL, 'bmt@ebs.com', '08571241242', 'p_bmt', '$2y$10$r0pyi5pm.tNuGVQfhpddDOEhODj8pYOs5hX7tWAXoGkLb5BESXVO.', 'bmt', 0, NULL),
-- (6, '567891011124321', 'Petugas Seragam', 'storage\\3c3d735209f11f97089c7966350c542c\\foto_profil.png', NULL, 'seragam@ebs.com', '08571412451', 'p_seragam', '$2y$10$oSfCz//IvtCmki4NdA7zBOClcuNCxObNJm8xZ181eHJlgeHeVGloS', 'seragam', 100000, NULL),
-- (7, '234567891011121', 'Petugas ATK', NULL, NULL, NULL, NULL, 'patk', '$2y$10$ZzwlWR8NEfUXHdjZUBV0Bu/u/30ogDQLp5lftbY.pM/gnPZ4gBNKO', 'atk', 0, NULL),
-- (8, '345678910111212', 'Petugas Print', NULL, NULL, 'print@ebs.com', '0857124127', 'print', '$2y$10$G4s7UFbrAO4SfiYAT0sekueAtzNpZd7G5LM5ZPMNOxzRnPYM.iaVC', 'print', 56501, NULL),
-- (10, '', 'Uni', 'storage\\2348c1f9d3c760ced8a95f52989c8bdd\\foto_profil.png', NULL, 'uni@mail.com', '085781204102', 'uni', '$2y$10$lAv1yDHwtECN6QVivmEK1O.AfhuAuulxy7k296pZ8fIQ49d8SZMHe', 'kantin', 192000, NULL),
-- (11, '67891011121234', 'Guru 1', 'storage\\53a0fcb218dfeaed092cfa3271eff96d\\foto_profil.png', NULL, 'guru1@mail.com', '081311325132', 'guru1', '$2y$10$jrPi6i.lQOjnuWRXZi/nIOMvhtjlyeFBNf.3l1HIp4U6jSnpfTF2m', 'guru', 7456000, NULL),
-- (12, '12200', 'Siswa 1', 'storage\\ffce4464579b2784064ebe7924c35657\\foto_profil.png', 'X TKJ 1', 'siswa1@mail.com', '081315312312', 'siswa1', '$2y$10$Xg7yzzxZVeqLjHIPjglLVO1l3F4vGP7MEkKDctoa6shC1UX6GHFaq', 'siswa', 367499, NULL),
-- (13, '', 'Wali1 ', NULL, NULL, 'wali1@mail.com', '0817512132', 'wali1', '$2y$10$Yc1GHYL2xXvNMz8eRHn1AuFEkkj2tC6FVIPDr43wmyyOaG34gJicG', 'wali', 0, 12),
-- (14, NULL, 'Kantin Bude Rini', 'storage\\aa68da57a0087d05073487bc21ab87c0\\foto_profil.png', NULL, 'riini@mail.com', '08751714912', 'bude_rini', '$2y$10$gQAyYF2yOB21luiJv96UZeUDRy69IVoaw7c3ay4Z59recb7f5zBey', 'kantin', 0, NULL),
-- (15, NULL, 'Mas Dudung', 'storage\\aa12b8065a97d9de0d5e39584c1a658c\\foto_profil.png', NULL, 'dudung@mail.com', '0812513124', 'dududu', '$2y$10$sdPvhVhizp7.BxiUHjxZO.dYtIJLowVnzWHsLm0cuSKF9Zu4jmp3O', 'kantin', 0, NULL),
-- (16, NULL, 'Petugas BMT 2', NULL, NULL, 'bmt2@ebs.com', NULL, 'bmt2', '$2y$10$cqvVCWd4Z/2fipsKWYgTJeKaW5S2dAgoNwY2tkvkz23X8EXhU2egm', 'bmt', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `prints`
--
ALTER TABLE `prints`
  ADD PRIMARY KEY (`print_id`);

--
-- Indeks untuk tabel `tokos`
--
ALTER TABLE `tokos`
  ADD PRIMARY KEY (`toko_id`);

--
-- Indeks untuk tabel `toko_items`
--
ALTER TABLE `toko_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indeks untuk tabel `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`transfer_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `notif_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prints`
--
ALTER TABLE `prints`
  MODIFY `print_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tokos`
--
ALTER TABLE `tokos`
  MODIFY `toko_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toko_items`
--
ALTER TABLE `toko_items`
  MODIFY `item_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transfer_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
