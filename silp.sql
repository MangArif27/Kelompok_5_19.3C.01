-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 09:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silp`
--

-- --------------------------------------------------------

--
-- Table structure for table `datawbp`
--

CREATE TABLE `datawbp` (
  `no` int(11) NOT NULL,
  `no_induk` varchar(25) NOT NULL,
  `nama_wbp` varchar(90) NOT NULL,
  `kejahatan` varchar(50) NOT NULL,
  `kamar` varchar(25) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(25) NOT NULL,
  `button` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datawbp`
--

INSERT INTO `datawbp` (`no`, `no_induk`, `nama_wbp`, `kejahatan`, `kamar`, `tgl_masuk`, `status`, `button`) VALUES
(1, '123456789', 'RIZKY NURARIEF BIN JAMAL', 'PEMBUNUHAN', 'ALFA 2.5', '2021-10-21', 'NARAPIDANA', 'btn-success'),
(2, '987654321', 'AGUS SURYADI BIN MAD ARIF', 'KORUPSI', 'DELTA 1.1', '2021-10-21', 'TAHANAN', 'btn-success');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `no` int(11) NOT NULL,
  `no_identitas` varchar(25) NOT NULL,
  `no_induk` varchar(25) NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `jenis_layanan` varchar(40) NOT NULL,
  `tiket` varchar(6) NOT NULL,
  `status_layanan` varchar(20) NOT NULL,
  `button` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`no`, `no_identitas`, `no_induk`, `tgl_pelaksanaan`, `jenis_layanan`, `tiket`, `status_layanan`, `button`) VALUES
(1, '123456789', '123456789', '2021-11-10', 'Video Call', 'XTR56S', 'Proses', 'btn-warning');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `no_identitas` int(25) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `alamat` text NOT NULL,
  `no_handphone` varchar(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `photo` text NOT NULL,
  `scan_identitas` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `level` varchar(10) NOT NULL,
  `button` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `no_identitas`, `nama`, `alamat`, `no_handphone`, `email`, `photo`, `scan_identitas`, `jenis_kelamin`, `level`, `button`, `password`, `created`, `updated`) VALUES
(1, 123456789, 'ADILMAN ZAI', 'CILODONG', '085', '19200198@bsi.ac.id', '678130.png', 'Identitas.png', 'Laki-Laki', 'User', 'btn-warning', '25f9e794323b453885f5181f1b624d0b', '2021-11-01 22:11:43', '2021-11-02 19:11:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datawbp`
--
ALTER TABLE `datawbp`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datawbp`
--
ALTER TABLE `datawbp`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
