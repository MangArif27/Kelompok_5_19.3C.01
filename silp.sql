-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 10:10 PM
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
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `no` int(11) NOT NULL,
  `nama_apk` varchar(50) NOT NULL,
  `id_upt` varchar(3) NOT NULL,
  `nama_upt` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `website` varchar(100) NOT NULL,
  `tentang_apk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`no`, `nama_apk`, `id_upt`, `nama_upt`, `alamat`, `no_tlp`, `email`, `website`, `tentang_apk`) VALUES
(1, 'Sistem Informasi Layanan Pemasyarakatan', '516', 'LEMBAGA PEMASYARAKATAN KELAS IIA CIBINONG', 'Jl. Taman Makam Pahlawan No. 02 Pondok Rajeg, Cibinong Kab. Bogor', '(021)8788921', 'lp.cibinong@kemenkumham.go.id', 'lapascibinong.kemenkumham.go.id', '<p style=\"text-align: justify;\">&nbsp; &nbsp;<span style=\"color: rgb(51, 51, 51); font-family: Roboto, Arial, sans-serif; font-size: 14px; text-align: left;\">Aplikasi <b>Sistem Informasi Layanan Pemasyarakatan</b> adalah Sistem Informasi Pelayanan Publik yang khusus digunakan pada Lembaga Pemasyarakatan untuk mempermudah masyarakat mengakses informasi layanan yang diberikan oleh Lembaga Pemasyarakatan, selain itu <b>Sistem Informasi Layanan Pemasyarakatan</b> ini juga mewujudkan E-Goverment pada Lembaga Pemasyarakatan , serta Pelayanan Terpadu Satu Pintu secara Elektronik.</span></p>');

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
  `button_layanan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`no`, `no_identitas`, `no_induk`, `tgl_pelaksanaan`, `jenis_layanan`, `tiket`, `status_layanan`, `button_layanan`) VALUES
(1, '123456789', '123456789', '2021-11-10', 'Video Call', 'XTR56S', 'Proses', 'btn-warning'),
(2, '123456', '987654321', '2021-11-05', 'Penitipan Barang', 'Z29AB7', 'Proses', 'btn-warning'),
(3, '123456', '987654321', '2021-11-05', 'Penitipan Barang', 'ITWNVC', 'Proses', 'btn-warning'),
(4, '123456', '987654321', '2021-11-15', 'Penitipan Barang', '2HGPQJ', 'Selesai', 'btn-success'),
(5, '123456', '987654321', '2021-11-16', 'Penitipan Barang', 'FCKPOZ', 'Proses', 'btn-warning');

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
(1, 123456789, 'ADILMAN ZAI', 'CILODONG', '085', '19200198@bsi.ac.id', '678130.png', 'Identitas.png', 'Laki-Laki', 'Admin', 'btn-success', '25f9e794323b453885f5181f1b624d0b', '2021-11-01 22:11:43', '2021-11-14 19:11:09'),
(2, 123456, 'FAREL JAVA', 'CITEUREUP', '085', '19200198@bsi.ac.id', '678130.png', 'Identitas.png', 'Laki-Laki', 'User', 'btn-warning', 'e10adc3949ba59abbe56e057f20f883e', '2021-11-04 19:11:43', '2021-11-14 15:11:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`no`);

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
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datawbp`
--
ALTER TABLE `datawbp`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
