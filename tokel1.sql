-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql301.byetcluster.com
-- Generation Time: Oct 16, 2022 at 09:59 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32800131_Tokel`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `gambar_barang` varchar(100) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` varchar(30) NOT NULL,
  `kategori_barang` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `gambar_barang`, `harga_barang`, `stok_barang`, `kategori_barang`) VALUES
(7, 'Geforce RTX 3080 TI', 'gambar/13.jpg', 8500000, '40', 'Video Card'),
(11, 'Geforce GTX 1660 TI', '', 2750000, '20', 'Video Card'),
(12, 'Logitech G PRO S', '', 1825000, '10', 'Mouse'),
(13, 'Coolermaster NH752', '', 1200000, '15', 'Headset'),
(14, 'Artisan Ninja FX Hayate', '', 3150000, '8', 'Mousepad'),
(15, 'Logitech G102 Black', '', 250000, '25', 'Mouse'),
(16, 'Logitech G402 Black', '', 400000, '15', 'Mouse');

-- --------------------------------------------------------

--
-- Table structure for table `barang_cart`
--

CREATE TABLE `barang_cart` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` varchar(50) NOT NULL,
  `gambar_barang` varchar(255) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `total_harga` varchar(100) NOT NULL,
  `kategori_barang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `gambar`) VALUES
(1, '13.jpg'),
(2, 'Mohamad Fahrul Islami_24060120130074_B1_3.png'),
(3, 'Mohamad Fahrul Islami_24060120130074_B1_3.png'),
(4, 'Mohamad Fahrul Islami_24060120130074_B1_2.png'),
(5, 'Mohamad Fahrul Islami_24060120130074_B1_3.png'),
(6, 'Mohamad Fahrul Islami_24060120130074_B1_3.png'),
(7, 'Mohamad Fahrul Islami_24060120130074_B1_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(18) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `payments` varchar(50) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `nama`, `email`, `phone`, `alamat`, `payments`, `barang`, `jumlah_pembayaran`) VALUES
(41, 'Akbar', 'ksatriaakbarpp@gmail.com', 2147483647, 'Villa Cipayung Residence', 'cod', 'Geforce RTX 3060 TI(20000)', '20000'),
(42, 'reter', 'michelle@yahoo.com', 2147483647, 'Villa Cipayung Residence', 'netbanking', 'Geforce RTX 3060 TI(10000)', '10000'),
(43, 'Fahrul', 'fahrulislami@gmail.com', 2147483647, 'Villa Cipayung Residence', 'cod', 'Geforce RTX 3060 TI(40000)', '40000'),
(44, 'RAM', 'michelle@yahoo.com', 2147483647, 'Villa Cipayung Residence', 'cod', 'Geforce RTX 3080 TI(8500000)', '8500000'),
(45, 'fahrul', 'fahrulislami@gmail.com', 12345, 'asdfgrhj', 'cod', 'Geforce RTX 3080 TI(8500000), Geforce RTX 3080 TI(8500000)', '17000000'),
(46, 'Akbar', 'ksatriaakbarpp@gmail.com', 2147483647, 'Villa Cipayung Residence', 'cod', '', '0'),
(47, 'Akbar', 'ksatriaakbarpp@gmail.com', 2147483647, 'Villa Cipayung Residence', 'cod', 'Artisan Ninja FX Hayate(3150000)', '3150000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','pembeli') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `level`) VALUES
(1, 'Fahrul', 'fahrul1@gmail.com', 'fahrul123', 'admin'),
(2, 'Topik', 'topik@gmail.com', 'topik123', 'pembeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `id_barang` (`id_barang`),
  ADD KEY `id_barang_2` (`id_barang`);

--
-- Indexes for table `barang_cart`
--
ALTER TABLE `barang_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barang_cart`
--
ALTER TABLE `barang_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
