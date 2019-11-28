-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2019 at 07:47 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `ruang_info`
--

CREATE TABLE `ruang_info` (
  `id_ruang_info` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang_info`
--

INSERT INTO `ruang_info` (`id_ruang_info`, `nama`, `deskripsi`) VALUES
(1, 'Wisata Sekitar', 'bla bla'),
(2, 'Tiket Masuk', 'bla bla'),
(3, 'Kuliner', 'bla bla'),
(4, 'Home Stay', '<p>bla bla</p>\r\n'),
(5, 'Hubungi Kami', '<p>bla</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ruang_info`
--
ALTER TABLE `ruang_info`
  ADD PRIMARY KEY (`id_ruang_info`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ruang_info`
--
ALTER TABLE `ruang_info`
  MODIFY `id_ruang_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
