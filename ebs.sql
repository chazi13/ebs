-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Mar 2019 pada 09.42
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
  `transaction_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

-- INSERT INTO `orders` (`order_id`, `tgl_order`, `jml_order`, `subtotal`, `item_id`, `transaction_id`) VALUES
-- (1, '2019-03-15 15:39:34', 1, 50000, 1, 'BL-5C8BB926C5DA6'),
-- (2, '2019-03-15 15:39:36', 1, 50000, 2, 'BL-5C8BB926C5DA6');

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

--
-- Dumping data untuk tabel `prints`
--

-- INSERT INTO `prints` (`print_id`, `nama_file`, `file`, `jenis`, `jml_lembar`, `jml_print`, `transaction_id`) VALUES
-- (1, 'Tugas Adm Server', 'storage\\ffce4464579b2784064ebe7924c35657\\tugas_adm_server_5c8bc027de88f.docx', 'hitam-putih', 2, 5, 'PR-5C8BC027C9010'),
-- (2, 'Ulangan Harian Adm Server', 'storage\\ffce4464579b2784064ebe7924c35657\\print\\ulangan_harian_adm_server_5c8bc136b9730.pptx', 'berwarna', 4, 2, 'PR-5C8BC1369EAF2'),
-- (3, 'Soal UTS Adm Server', 'storage\\ffce4464579b2784064ebe7924c35657\\print\\soal_uts_adm_server_5c8bc1d11b3d4.pdf', 'hitam-putih', 9, 4, 'PR-5C8BC1D0E7A01');

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

--
-- Dumping data untuk tabel `tokos`
--

-- INSERT INTO `tokos` (`toko_id`, `nama_toko`, `foto_toko`, `deskripsi_toko`, `jenis_toko`, `user_id`) VALUES
-- (1, 'Toko Seragam SMK XO', 'storage\\3c3d735209f11f97089c7966350c542c\\toko\\\\foto_toko.jpg', 'Ini adalah toko seragam milik SMK XO. Toko ini menjual khusus perlengkapan seragam untuk siswa-siswa dari SMK XO. Di sini tersedia kemeja putih, batik, seragam jurusan, baju muslim, topi, dasi,  dan segala atribut seragam lainnya', 'seragam', 6),
-- (2, NULL, NULL, NULL, 'atk', 7),
-- (3, NULL, NULL, NULL, 'kantin', 9),
-- (4, 'Kantin Uni', 'storage\\2348c1f9d3c760ced8a95f52989c8bdd\\toko\\foto_toko.jpg', 'Menjual berbagai makanan ringan', 'kantin', 10),
-- (5, NULL, NULL, NULL, 'kantin', 14),
-- (6, NULL, NULL, NULL, 'kantin', 15);

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

--
-- Dumping data untuk tabel `toko_items`
--

-- INSERT INTO `toko_items` (`item_id`, `nama_item`, `foto_item`, `deskripsi_item`, `harga_item`, `stok`, `toko_id`) VALUES
-- (1, 'Kemeja Putih', 'storage\\3c3d735209f11f97089c7966350c542c\\toko\\item\\kemeja_putih.jpg', 'Kemeja Putih untuk seragam hari Senin', 50000, 150, 1),
-- (2, 'Kemeja Batik', 'storage\\3c3d735209f11f97089c7966350c542c\\toko\\item\\kemeja_batik.jpg', 'Kemeja Batik untuk seragam hari kamis', 50000, 150, 1),
-- (3, 'Good Day Fantastic Mocacinno', 'storage\\2348c1f9d3c760ced8a95f52989c8bdd\\toko\\item\\good_day_fantastic_mocacinno.jpg', 'Good Day botol rasa Fantastic Mocacinno', 6000, 10, 4),
-- (11, 'Roti Coklat', 'storage\\2348c1f9d3c760ced8a95f52989c8bdd\\toko\\item\\roti_coklat.jpg', 'Roti coklat enak dan murah', 2000, 12, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` varchar(25) NOT NULL,
  `tgl_transaction` datetime NOT NULL,
  `total` float NOT NULL,
  `jenis` enum('isi saldo','beli','print','transfer','bayar spp') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` enum('Pending','Selesai','Batal') NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transactions`
--

-- INSERT INTO `transactions` (`transaction_id`, `tgl_transaction`, `total`, `jenis`, `keterangan`, `status`, `user_id`) VALUES
-- ('BL-5C8BB926C5DA6', '2019-03-15 15:39:34', 100000, 'beli', 'Beli seragam pada hari Jum\'at, 15 Maret 2019', 'Pending', 6),
-- ('IS-5C8BB30D9C700', '2019-03-15 15:13:33', 50000, 'isi saldo', 'Menabung sebesar Rp. 50.000,00 pada hari Jum\'at, 15 Maret 2019', 'Selesai', 12),
-- ('IS-5C8BB3CBAD7DF', '2019-03-15 15:16:43', 150000, 'isi saldo', 'Menabung sebesar Rp. 150.000,00 pada hari Jum\'at, 15 Maret 2019', 'Selesai', 12),
-- ('IS-5C99C9FA3A2EE', '2019-03-26 07:43:06', 1000000, 'isi saldo', 'Menabung sebesar Rp. 1.000.000,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CA2D2BB87', '2019-03-26 07:43:57', 1000000, 'isi saldo', 'Menabung sebesar Rp. 1.000.000,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CA3CD76DF', '2019-03-26 07:44:12', 1000000, 'isi saldo', 'Menabung sebesar Rp. 1.000.000,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CA3D1CAE1', '2019-03-26 07:44:13', 1, 'isi saldo', 'Menabung sebesar Rp. 1,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CABE79847', '2019-03-26 07:46:22', 1, 'isi saldo', 'Menabung sebesar Rp. 1,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CAFA260CA', '2019-03-26 07:47:22', 1, 'isi saldo', 'Menabung sebesar Rp. 1,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CB04D35F8', '2019-03-26 07:47:32', 1000000, 'isi saldo', 'Menabung sebesar Rp. 1.000.000,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CB153C29B', '2019-03-26 07:47:49', 1000000, 'isi saldo', 'Menabung sebesar Rp. 1.000.000,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CB1599E12', '2019-03-26 07:47:49', 1000000, 'isi saldo', 'Menabung sebesar Rp. 1.000.000,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CB6CD35C0', '2019-03-26 07:49:16', 1000000, 'isi saldo', 'Menabung sebesar Rp. 1.000.000,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('IS-5C99CB6D21DA4', '2019-03-26 07:49:17', 1000000, 'isi saldo', 'Menabung sebesar Rp. 1.000.000,00 pada hari Selasa, 26 Maret 2019', 'Selesai', 11),
-- ('PR-5C8BC027C9010', '2019-03-15 16:09:27', 2500, 'print', 'Print Tugas Adm Server sejumlah 2 lembar sebanyak5 pada hari Jum\'at, 15 Maret 2019', 'Pending', 12),
-- ('PR-5C8BC1369EAF2', '2019-03-15 16:13:58', 4000, 'print', 'Print Ulangan Harian Adm Server sejumlah 4 lembar sebanyak2 pada hari Jum\'at, 15 Maret 2019', 'Pending', 12),
-- ('PR-5C8BC1D0E7A01', '2019-03-15 16:16:32', 9000, 'print', 'Print Soal UTS Adm Server sejumlah 9 lembar sebanyak4 pada hari Jum\'at, 15 Maret 2019', 'Pending', 12);

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
-- (8, '345678910111212', 'Petugas Print', NULL, NULL, 'print@ebs.com', '0857124127', 'print', '$2y$10$G4s7UFbrAO4SfiYAT0sekueAtzNpZd7G5LM5ZPMNOxzRnPYM.iaVC', 'print', 15500, NULL),
-- (10, '', 'Uni', 'storage\\2348c1f9d3c760ced8a95f52989c8bdd\\foto_profil.png', NULL, 'uni@mail.com', '085781204102', 'uni', '$2y$10$lAv1yDHwtECN6QVivmEK1O.AfhuAuulxy7k296pZ8fIQ49d8SZMHe', 'kantin', 0, NULL),
-- (11, '67891011121234', 'Guru 1', 'storage\\53a0fcb218dfeaed092cfa3271eff96d\\foto_profil.png', NULL, 'guru1@mail.com', '081311325132', 'guru1', '$2y$10$jrPi6i.lQOjnuWRXZi/nIOMvhtjlyeFBNf.3l1HIp4U6jSnpfTF2m', 'guru', 8000000, NULL),
-- (12, '12200', 'Siswa 1', 'storage\\ffce4464579b2784064ebe7924c35657\\foto_profil.png', 'X TKJ 1', 'siswa1@mail.com', '081315312312', 'siswa1', '$2y$10$Xg7yzzxZVeqLjHIPjglLVO1l3F4vGP7MEkKDctoa6shC1UX6GHFaq', 'siswa', 84500, NULL),
-- (13, '', 'Wali1 ', NULL, NULL, 'wali1@mail.com', '0817512132', 'wali1', '$2y$10$Yc1GHYL2xXvNMz8eRHn1AuFEkkj2tC6FVIPDr43wmyyOaG34gJicG', 'wali', 0, 12),
-- (14, NULL, 'Kantin Bude Rini', 'storage\\aa68da57a0087d05073487bc21ab87c0\\foto_profil.png', NULL, 'riini@mail.com', '08751714912', 'bude_rini', '$2y$10$gQAyYF2yOB21luiJv96UZeUDRy69IVoaw7c3ay4Z59recb7f5zBey', 'kantin', 0, NULL),
-- (15, NULL, 'Mas Dudung', 'storage\\aa12b8065a97d9de0d5e39584c1a658c\\foto_profil.png', NULL, 'dudung@mail.com', '0812513124', 'dududu', '$2y$10$sdPvhVhizp7.BxiUHjxZO.dYtIJLowVnzWHsLm0cuSKF9Zu4jmp3O', 'kantin', 0, NULL),
-- (16, NULL, 'Petugas BMT 2', NULL, NULL, 'bmt2@ebs.com', NULL, 'bmt2', '$2y$10$cqvVCWd4Z/2fipsKWYgTJeKaW5S2dAgoNwY2tkvkz23X8EXhU2egm', 'bmt', 0, NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `prints`
--
ALTER TABLE `prints`
  MODIFY `print_id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tokos`
--
ALTER TABLE `tokos`
  MODIFY `toko_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `toko_items`
--
ALTER TABLE `toko_items`
  MODIFY `item_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
