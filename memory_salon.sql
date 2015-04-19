-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2015 at 04:42 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `memory_salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gaji` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`username`, `password`, `nama`, `gaji`, `status`) VALUES
('andarias', 'anda', 'Andarias Silvanus', 3000000, 1),
('gifarikautsar', 'agi', 'Gifari Kautsar', 2000000, 1),
('indammuhammad', 'indam', 'Indam Muhammad', 2000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`username`) VALUES
('gifarikautsar'),
('indammuhammad');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
`id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `nama`, `biaya`) VALUES
(1, 'Cuci', 20000),
(2, 'Creambath', 50000),
(3, 'Potong', 25000),
(4, 'Blow', 20000),
(5, 'Lain-lain', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`username`) VALUES
('andarias');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE IF NOT EXISTS `pemasukan` (
`id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `username_kasir` varchar(30) DEFAULT NULL,
  `nama_pelanggan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `keterangan`, `nominal`, `tanggal`, `username_kasir`, `nama_pelanggan`) VALUES
(2, 'Pembayaran Layanan', 20000, '2015-04-05', 'gifarikautsar', 'atia'),
(3, 'Pembayaran juga', 100000, '2015-04-05', NULL, NULL),
(4, 'Creambath shampo', 50000, '2015-04-19', NULL, NULL),
(7, 'Cuci rambut', 30000, '2015-04-19', NULL, NULL),
(8, 'Pelayanan jasa', 70000, '2015-04-19', 'gifarikautsar', 'Risa');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
`id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `username_manager` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `keterangan`, `nominal`, `tanggal`, `username_manager`) VALUES
(1, 'Pembelian Shampoo', 500000, '2015-04-01', 'andarias'),
(3, 'Pembayaran Listrik 2', 250000, '2015-04-17', 'andarias'),
(4, 'Pembayaran Air', 250000, '2015-04-11', 'andarias');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `nama_pelanggan` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`nama_pelanggan`, `status`) VALUES
('Arina', 0),
('Atia', 1),
('Hayyu', 1),
('Risa', 1),
('Riska', 0),
('Sachi', 0),
('Stanley', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_layanan`
--

CREATE TABLE IF NOT EXISTS `pesanan_layanan` (
  `id_layanan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_layanan`
--

INSERT INTO `pesanan_layanan` (`id_layanan`, `nama_pelanggan`) VALUES
(1, 'Arina'),
(2, 'Arina'),
(3, 'Arina'),
(4, 'Arina'),
(1, 'Atia'),
(1, 'Hayyu'),
(4, 'Hayyu'),
(1, 'Risa'),
(2, 'Risa'),
(1, 'Riska'),
(2, 'Riska'),
(4, 'Riska'),
(2, 'Sachi'),
(4, 'Sachi'),
(5, 'Sachi'),
(1, 'Stanley'),
(3, 'Stanley');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
 ADD PRIMARY KEY (`username`), ADD KEY `un_kasir` (`username`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `pemasukan_pelanggan` (`nama_pelanggan`), ADD KEY `pemasukan_kasir` (`username_kasir`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
 ADD PRIMARY KEY (`id`), ADD KEY `pengeluaran_manager` (`username_manager`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
 ADD PRIMARY KEY (`nama_pelanggan`);

--
-- Indexes for table `pesanan_layanan`
--
ALTER TABLE `pesanan_layanan`
 ADD PRIMARY KEY (`id_layanan`,`nama_pelanggan`), ADD KEY `nama_pelanggan` (`nama_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kasir`
--
ALTER TABLE `kasir`
ADD CONSTRAINT `kasir_ibfk_1` FOREIGN KEY (`username`) REFERENCES `karyawan` (`username`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`username`) REFERENCES `karyawan` (`username`);

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`username_kasir`) REFERENCES `kasir` (`username`),
ADD CONSTRAINT `pemasukan_ibfk_2` FOREIGN KEY (`nama_pelanggan`) REFERENCES `pesanan` (`nama_pelanggan`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`username_manager`) REFERENCES `manager` (`username`);

--
-- Constraints for table `pesanan_layanan`
--
ALTER TABLE `pesanan_layanan`
ADD CONSTRAINT `pesanan_layanan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id`),
ADD CONSTRAINT `pesanan_layanan_ibfk_2` FOREIGN KEY (`nama_pelanggan`) REFERENCES `pesanan` (`nama_pelanggan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
