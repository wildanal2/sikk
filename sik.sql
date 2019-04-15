-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2019 at 06:03 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

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
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `nama`, `stok`) VALUES
(1, 'kayu', 110),
(2, 'lem', 70),
(3, 'skrup', 26),
(4, 'engsel', 47),
(5, 'cat', 15),
(6, 'kaca', 56);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `kd_trans` varchar(50) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `kd_trans`, `kd_barang`, `jumlah`, `harga`, `status`) VALUES
(1, 'INV1904130082149', 2, 2, 3000, 1),
(2, 'INV1904130082149', 4, 1, 4500, 1),
(3, 'INV1904130112505', 1, 1, 11000, 1),
(4, 'INV1904130152209', 5, 1, 5700, 0),
(5, 'INV1904130161934', 2, 1, 3000, 1),
(6, 'INV1904140180007', 5, 2, 5700000, 0),
(7, 'INV1904150053314', 1, 1, 2800000, 1),
(8, 'INV1904150054523', 5, 2, 5700000, 0),
(9, 'INV1904150054523', 4, 1, 4500000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_bahanbaku`
--

CREATE TABLE `pembelian_bahanbaku` (
  `id` int(11) NOT NULL,
  `tanggal_req` datetime NOT NULL,
  `kd_produksi` int(11) NOT NULL,
  `kd_bahan` int(11) NOT NULL,
  `request` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_bahanbaku`
--

INSERT INTO `pembelian_bahanbaku` (`id`, `tanggal_req`, `kd_produksi`, `kd_bahan`, `request`, `status`) VALUES
(2, '2019-04-15 06:43:54', 33305, 1, 30, 1),
(3, '2019-04-15 10:37:18', 33306, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `kd_barang` int(10) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`kd_barang`, `nama_barang`, `deskripsi`, `harga`, `foto`) VALUES
(1, 'kursi macan', 'kursi dengan motif macan dari kayu pinus', 2800000, 'pen.jpg'),
(2, 'Almari monalisa', 'almari besar, bermotif istana', 9300000, 'note.jpg'),
(4, 'meja makan lingkaran', 'terbuat dari akar kayu jati tua yang sangat kokoh', 4500000, 'peng.jpg'),
(5, 'Pintu', 'Daun pintu motif batik', 5700000, 'folio.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `product_formula`
--

CREATE TABLE `product_formula` (
  `id_for` int(11) NOT NULL,
  `kd_produk` int(11) NOT NULL,
  `kd_bahan` int(11) NOT NULL,
  `jumlah_bahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_formula`
--

INSERT INTO `product_formula` (`id_for`, `kd_produk`, `kd_bahan`, `jumlah_bahan`) VALUES
(4, 1, 1, 8),
(5, 1, 2, 5),
(6, 1, 5, 5),
(7, 2, 1, 20),
(8, 2, 5, 15),
(9, 2, 4, 14),
(10, 2, 3, 32),
(11, 2, 6, 6),
(12, 4, 1, 7),
(13, 4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produk` int(11) NOT NULL,
  `tgl_produksi` datetime NOT NULL,
  `kd_pembelian` int(11) NOT NULL,
  `kd_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produk`, `tgl_produksi`, `kd_pembelian`, `kd_produk`, `jumlah`, `status`) VALUES
(4, '2019-04-14 12:12:34', 5, 2, 1, 2),
(5, '2019-04-14 12:43:14', 2, 4, 1, 2),
(29866, '2019-04-13 22:46:28', 3, 1, 1, 2),
(33305, '2019-04-14 00:33:49', 1, 2, 2, 2),
(33306, '2019-04-15 10:36:20', 7, 1, 1, 2),
(33307, '2019-04-15 10:49:47', 9, 4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `keterangan`) VALUES
(0, 'Transaksi Dibatalkan'),
(1, 'Menunggu Verifikasi Pembayaran'),
(2, 'Pembayaran Tidak Valid, Transaksi Dibatalkan'),
(3, 'Sedang Diteruskan ke Bag.Produksi'),
(4, 'Sedang di Produksi'),
(5, 'Produksi Selesai, diteruskan ke Bag.Pengiriman '),
(6, 'Barang Dalam Pengiriman Kurir'),
(7, 'Transaksi Selesai, Barang Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `status_produksi`
--

CREATE TABLE `status_produksi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_produksi`
--

INSERT INTO `status_produksi` (`id`, `keterangan`) VALUES
(1, 'sedang di produksi'),
(2, 'Produksi Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_trans` varchar(50) NOT NULL,
  `tgl_trans` date NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `kd_cust` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `total` int(11) NOT NULL,
  `bukti` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kd_trans`, `tgl_trans`, `tgl_pembayaran`, `tgl_pengiriman`, `kd_cust`, `nama`, `alamat`, `total`, `bukti`, `status`) VALUES
('INV1904130082149', '2019-04-13', '2019-04-13 13:18:00', '0000-00-00', 1, 'awaw', 'opopo', 10500, 'pembayarancustomer/120190413132210.png', 4),
('INV1904130112505', '2019-04-13', '2019-04-13 03:00:00', '0000-00-00', 1, 'Andi', 'lololo', 11000, 'pembayarancustomer/120190413162522.png', 7),
('INV1904130152209', '2019-04-13', '2019-04-13 20:22:25', '0000-00-00', 1, 'awaw a', 'lololo', 5700, 'pembayarancustomer/120190413202225.png', 2),
('INV1904130161934', '2019-04-13', '2019-04-13 21:19:48', '0000-00-00', 1, 'Andi ww', 'lololo', 3000, 'pembayarancustomer/120190413211948.jpg', 7),
('INV1904140180007', '2019-04-14', '2019-04-14 23:00:27', '0000-00-00', 1, 'faisal', 'mlg', 11400000, 'pembayarancustomer/120190414230027.jpg', 1),
('INV1904150053314', '2019-04-15', '2019-04-15 10:34:30', '0000-00-00', 1, 'faisal', 'mlgg', 2800000, 'pembayarancustomer/120190415103430.jpg', 7),
('INV1904150054523', '2019-04-15', '2019-04-15 10:47:37', '0000-00-00', 1, 'Andi', 'mlg a', 15900000, 'pembayarancustomer/120190415104737.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_cust` int(10) NOT NULL,
  `nama_cust` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_cust`, `nama_cust`, `alamat`, `email`, `password`, `level`) VALUES
(1, 'faisal', 'jalkam', 'f@gmail.com', 'a', 6),
(2, 'wildan', 'jl', 'w@gmail.com', 'a', 4),
(3, 'anji', 'ass', 'a@gmail.com', 'a', 5),
(4, 'momo', 'm', 'm@gmail.com', 'a', 2),
(5, 'panji', 'as', 'p@gmail.com', 'a', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_trans` (`kd_trans`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `pembelian_bahanbaku`
--
ALTER TABLE `pembelian_bahanbaku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_req_kdbahan` (`kd_bahan`),
  ADD KEY `fk_req_kdproduksi` (`kd_produksi`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `product_formula`
--
ALTER TABLE `product_formula`
  ADD PRIMARY KEY (`id_for`),
  ADD KEY `fk_produk_formula` (`kd_produk`),
  ADD KEY `fk_formula_bahan` (`kd_bahan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_pembelian` (`kd_pembelian`),
  ADD KEY `fk_statusproduksi` (`status`),
  ADD KEY `fk_kd_produk` (`kd_produk`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_produksi`
--
ALTER TABLE `status_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_trans`),
  ADD UNIQUE KEY `kd_trans` (`kd_trans`),
  ADD KEY `kd_cust` (`kd_cust`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_cust`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembelian_bahanbaku`
--
ALTER TABLE `pembelian_bahanbaku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `kd_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_formula`
--
ALTER TABLE `product_formula`
  MODIFY `id_for` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33308;

--
-- AUTO_INCREMENT for table `status_produksi`
--
ALTER TABLE `status_produksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `kd_cust` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelian_produk` FOREIGN KEY (`kd_barang`) REFERENCES `product` (`kd_barang`);

--
-- Constraints for table `pembelian_bahanbaku`
--
ALTER TABLE `pembelian_bahanbaku`
  ADD CONSTRAINT `fk_req_kdbahan` FOREIGN KEY (`kd_bahan`) REFERENCES `bahan_baku` (`id_bahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_req_kdproduksi` FOREIGN KEY (`kd_produksi`) REFERENCES `produksi` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_formula`
--
ALTER TABLE `product_formula`
  ADD CONSTRAINT `fk_formula_bahan` FOREIGN KEY (`kd_bahan`) REFERENCES `bahan_baku` (`id_bahan`),
  ADD CONSTRAINT `fk_produk_formula` FOREIGN KEY (`kd_produk`) REFERENCES `product` (`kd_barang`);

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `fk_kd_produk` FOREIGN KEY (`kd_produk`) REFERENCES `product` (`kd_barang`),
  ADD CONSTRAINT `fk_produk_pembelian` FOREIGN KEY (`kd_pembelian`) REFERENCES `pembelian` (`id`),
  ADD CONSTRAINT `fk_statusproduksi` FOREIGN KEY (`status`) REFERENCES `status_produksi` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_cust` FOREIGN KEY (`kd_cust`) REFERENCES `user` (`kd_cust`),
  ADD CONSTRAINT `fk_jenis_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
