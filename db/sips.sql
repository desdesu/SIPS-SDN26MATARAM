-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 06:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sips`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_keluar` int(5) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_keluar`, `no_surat`, `perihal`, `tanggal_surat`, `tujuan`, `file`) VALUES
(3, '422.2/003/SDN26M/I/2', 'Surat Keterangan Menerima Mahasiswa PKL', '2020-01-17', 'Program Studi Teknik Informatika Universitas Mataram', 'contoh file.png'),
(4, '01/00/SDN26M/I/2020', 'Surat Izin Kegiatan Pramuka', '2020-01-17', 'Orang Tua Murid', 'contoh file.png'),
(5, '1', 'Surat Keluar', '2020-06-15', 'Murid', 'contoh file.png'),
(6, '2', 'Surat Keluar', '2020-06-15', 'Orang Tua Murid', 'contoh file.png'),
(7, '3', 'Surat Keluar', '2020-06-16', 'Murid', 'contoh file.png'),
(8, '4', 'Surat Keluar', '2020-06-16', 'Guru dan Staff', 'contoh file.png'),
(9, '5', 'Surat Keluar', '2020-06-17', 'Guru dan Staff', 'contoh file.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_masuk` int(5) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_masuk`, `no_surat`, `perihal`, `tanggal_surat`, `asal_surat`, `file`) VALUES
(3, '249/III/2020', 'Penetapan Status Siaga Darurat Bencana Non Alam COVID-19 di Kota Mataram', '2020-03-15', 'Walikota Kota Mataram', 'contoh file.png'),
(4, '1', 'Surat Masuk', '2020-06-15', 'Dinas', 'contoh file.png'),
(5, '2', 'Surat Masuk', '2020-06-15', 'Dinas', 'contoh file.png'),
(6, '3', 'Surat Masuk', '2020-06-15', 'Dinas', 'contoh file.png'),
(7, '4', 'Surat Masuk', '2020-06-15', 'Dinas', 'contoh file.png'),
(12, '123', 'Surat Masuk', '2020-06-23', 'Walikota', 'contoh file.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `foto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`, `foto`) VALUES
(0, 'admin', 'admin', 'Admin SDN 26 Mataram', 'user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
