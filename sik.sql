-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Mar 2019 pada 15.39
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `deskripsi`, `harga`) VALUES
(0, 'Folio', 'Kertas B5 27mmX36mm', 5700),
(1, 'pulpen', 'Pilot 0.2mm', 11000),
(2, 'note', '', 3000),
(4, 'Penggaris', 'Faber-Castell 30Cm', 4500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `kd_cust` int(10) NOT NULL,
  `nama_cust` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`kd_cust`, `nama_cust`, `alamat`) VALUES
(1, 'faisal', 'jalkam'),
(2, 'wildan', 'jl');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `kd_trans` varchar(50) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `tgl_mulai_produksi` date NOT NULL,
  `tgl_selesai_produksi` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`kd_trans`, `kd_barang`, `tgl_mulai_produksi`, `tgl_selesai_produksi`, `jumlah`, `satuan`) VALUES
('1', 1, '0000-00-00', '0000-00-00', 0, 0),
('1', 2, '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_trans` varchar(50) NOT NULL,
  `tgl_trans` date NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `tgl_penagihan` date NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `kd_cust` int(10) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kd_trans`, `tgl_trans`, `tgl_pengiriman`, `tgl_penagihan`, `tgl_pembayaran`, `kd_cust`, `total`) VALUES
('1', '2019-02-19', '2019-02-21', '2019-02-22', '2019-02-19', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_cust`),
  ADD KEY `kd_cust` (`kd_cust`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD KEY `kd_trans` (`kd_trans`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_trans`),
  ADD UNIQUE KEY `kd_trans` (`kd_trans`),
  ADD KEY `kd_cust` (`kd_cust`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_kd_barang` FOREIGN KEY (`kd_barang`) REFERENCES `barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_kd_cust` FOREIGN KEY (`kd_cust`) REFERENCES `customer` (`kd_cust`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
