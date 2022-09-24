-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 06:45 AM
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
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_perpustakaan`
--

CREATE TABLE `tb_perpustakaan` (
  `id_perpustakaan` int(11) NOT NULL,
  `kode_buku` varchar(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_perpustakaan`
--

INSERT INTO `tb_perpustakaan` (`id_perpustakaan`, `kode_buku`, `nama_buku`, `keterangan`, `file`) VALUES
(64, 'B-001', 'PENGETAHUAN ALAM', '-', 'TESPDF.pdf'),
(65, 'B-002', 'PENGETAHUAN', '-', 'TESPDF.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_perpustakaan`
--
ALTER TABLE `tb_perpustakaan`
  ADD PRIMARY KEY (`id_perpustakaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_perpustakaan`
--
ALTER TABLE `tb_perpustakaan`
  MODIFY `id_perpustakaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
