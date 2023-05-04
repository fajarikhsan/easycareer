-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2020 pada 06.44
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easycareer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `id_user`) VALUES
(7, 27),
(8, 28);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_output`
--

CREATE TABLE `file_output` (
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `file_output`
--

INSERT INTO `file_output` (`id_file`, `nama_file`, `id_transaksi`) VALUES
(1, '417242f240e5c2106e3cacf93d3e0499.zip', 2),
(2, '961c543974095c951a01efd7860f1592.zip', 3),
(4, '0608abd94cce511f532f32b751448e3f.zip', 9),
(5, '179ade36f1f1cafca144a02273019ff7.zip', 9),
(6, 'ec8cc81bdcd21716dcabfa4596198933.zip', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `foto_jasa` varchar(255) NOT NULL,
  `judul_jasa` varchar(128) NOT NULL,
  `deskripsi_jasa` varchar(255) NOT NULL,
  `status_jasa` smallint(1) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `pengerjaan` int(2) NOT NULL,
  `id_penyedia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `foto_jasa`, `judul_jasa`, `deskripsi_jasa`, `status_jasa`, `harga`, `id_jenis`, `pengerjaan`, `id_penyedia`) VALUES
(15, '8c1d1a3e35e3f3d5a0d31451ba613c05.png', 'Membuat website apapun MURAH!! semurah harga kerupuk black bos', 'Murah Murah MURAHHH!!! abcdefghjklkadjbnafnbawifnaifsinfsuiyfgsufeseuf', 1, 300000, 2, 3, 14),
(20, '6199479730f6e5cd1b12e0230801c268.png', 'TEST', 'test', 1, 10000, 5, 3, 14),
(21, '2559aed9f47cd28d7f532562c5a68b07.png', 'Membuat design apapun dengan harga terjangkau!', 'Saya dapat membuat design logo, poster, website, dan apapun yang anda inginkan!', 1, 100000, 1, 1, 15),
(22, '8a13cf6fefafef6cd81d0a276255ad92.jpg', 'Membantu menormalkan database anda!', '', 1, 150000, 6, 1, 15),
(23, 'e33a68652e4135550f8673078c4b763a.jpg', 'Bersedia menjadi tester project anda!', '', 1, 200000, 3, 3, 16),
(24, '2364e9096c59831b2ff01a7a7b2e1dcb.jpg', 'Dapat memperbaiki PC anda dengan cepat!', '', 1, 100000, 4, 2, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_jasa`
--

CREATE TABLE `jenis_jasa` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_jasa`
--

INSERT INTO `jenis_jasa` (`id_jenis`, `nama_jenis`) VALUES
(1, 'UI/UX Designer'),
(2, 'Software Developer'),
(3, 'Tester'),
(4, 'Hardware Engineering'),
(5, 'Database Admin'),
(6, 'IT Support');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `rating` varchar(1) DEFAULT NULL,
  `ulasan` varchar(255) DEFAULT NULL,
  `tgl_pembayaran` varchar(15) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `total_harga`, `rating`, `ulasan`, `tgl_pembayaran`, `id_transaksi`) VALUES
(3, 300000, '5', 'Bagus Bang!', '2020/07/26', 2),
(4, 300000, '4', 'Lumayan Bos!', '2020/07/27', 3),
(6, 300000, NULL, NULL, '2020/07/28', 6),
(7, 300000, NULL, NULL, '2020/07/28', 7),
(9, 10000, '5', 'MANTAP!', '2020/07/28', 9),
(10, 200000, '3', 'Ah kurang mas', '2020/07/28', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyedia_jasa`
--

CREATE TABLE `penyedia_jasa` (
  `id_penyedia` int(11) NOT NULL,
  `portfolio` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penyedia_jasa`
--

INSERT INTO `penyedia_jasa` (`id_penyedia`, `portfolio`, `id_user`) VALUES
(14, 'facebook.com', 26),
(15, 'facebook.com', 29),
(16, 'facebook.com', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profesi`
--

CREATE TABLE `profesi` (
  `id_penyedia` int(11) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profesi`
--

INSERT INTO `profesi` (`id_penyedia`, `id_jenis`) VALUES
(14, 2),
(14, 4),
(14, 5),
(14, 6),
(15, 1),
(15, 2),
(15, 6),
(16, 2),
(16, 3),
(16, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `detail_pekerjaan` varchar(255) DEFAULT NULL,
  `tanggal_transaksi` varchar(15) DEFAULT NULL,
  `id_customer` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `id_jasa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `status`, `detail_pekerjaan`, `tanggal_transaksi`, `id_customer`, `id_penyedia`, `id_jasa`) VALUES
(2, 'Pesanan Selesai', 'Tolong buatkan website landing page sebagus yang kamu bisa!', '2020/07/26', 7, 14, 15),
(3, 'Pesanan Selesai', 'tolong buatin website dengan simple crud ya!', '2020/07/27', 8, 14, 15),
(6, 'Pesanan Ditolak', 'test', '2020/07/28', 7, 14, 20),
(7, 'Pesanan Ditolak', 'harus bagus bang!', '2020/07/28', 7, 14, 15),
(9, 'Pesanan Selesai', '1234', '2020/07/28', 7, 14, 20),
(10, 'Pesanan Selesai', 'coba cek link ini ya gan : .....', '2020/07/28', 7, 16, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(13) DEFAULT NULL,
  `foto_profil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nohp`, `foto_profil`) VALUES
(26, 'fajarikhsan', '1234', 'fajarikhsan3@gmail.com', '085314930404', '43118ac534d21a728488e7b7324aca42.jpg'),
(27, 'userAccount', '1234', 'useraccount@user.com', '085314930404', 'c1a2b608a27b90ae7993b36a28d5189a.jpg'),
(28, 'LadiesMan666', '1234', 'ladiesman@gmail.com', '085314930404', '0cbf4e451528220d1e0604a826503816.jpg'),
(29, 'JinxPro', '1234', 'jinxpro@gmail.com', '085314930404', '13e09c9369d678f6beaca29cde799dae.jpg'),
(30, 'NashkiRajaf', '1234', 'nashkirajaf@gmail.com', '085314930404', '6fa6e16df617059d33fbafc1c22266ad.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `file_output`
--
ALTER TABLE `file_output`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indeks untuk tabel `jenis_jasa`
--
ALTER TABLE `jenis_jasa`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  ADD PRIMARY KEY (`id_penyedia`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `profesi`
--
ALTER TABLE `profesi`
  ADD KEY `id_penyedia` (`id_penyedia`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `file_output`
--
ALTER TABLE `file_output`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `jenis_jasa`
--
ALTER TABLE `jenis_jasa`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  MODIFY `id_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `file_output`
--
ALTER TABLE `file_output`
  ADD CONSTRAINT `file_output_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jasa`
--
ALTER TABLE `jasa`
  ADD CONSTRAINT `jasa_ibfk_1` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia_jasa` (`id_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  ADD CONSTRAINT `penyedia_jasa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profesi`
--
ALTER TABLE `profesi`
  ADD CONSTRAINT `profesi_ibfk_1` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia_jasa` (`id_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesi_ibfk_2` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_jasa` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_penyedia`) REFERENCES `penyedia_jasa` (`id_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
