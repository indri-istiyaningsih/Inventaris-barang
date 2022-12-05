-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 10:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_admin` varchar(64) NOT NULL,
  `nama_pembuat` varchar(64) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `barecode` varchar(64) NOT NULL,
  `stok` int(11) NOT NULL,
  `barang_masuk` int(11) NOT NULL,
  `barang_keluar` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Barang`
--

INSERT INTO `buku` (`id`, `nama_barang`, `id_kategori`, `nama_admin`, `nama_pembuat`, `tahun_terbit`, `barecode`, `stok`, `barang_masuk`, `barang_keluar`, `image`, `tanggal_input`, `tanggal_update`) VALUES
(17, 'ptik 1', 3, 'amin nr', 'Teknosain 1', 2012, '111-111-1111-22-2', 2, 0, 0, 'buku-20221007-095628.jpg', '2022-10-07 09:40:50', '2022-10-07 09:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Komputer'),
(3, 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `department` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `tanggal_input` datetime NOT NULL,
  `tanggal_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `nama`, `image`, `password`, `department`, `is_active`, `tanggal_input`, `tanggal_update`) VALUES
('admin@admin.com', 'admin', 'admin.png', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2022-10-07 03:15:04', '2022-10-07 03:15:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--

ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
