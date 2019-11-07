-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 04:32 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbikan`
--
CREATE DATABASE IF NOT EXISTS `dbikan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbikan`;

-- --------------------------------------------------------

--
-- Table structure for table `ikan`
--

CREATE TABLE IF NOT EXISTS `ikan` (
  `kd_ikan` varchar(5) NOT NULL,
  `nm_ikan` varchar(25) NOT NULL,
  `hrg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`kd_ikan`, `nm_ikan`, `hrg`) VALUES
('IK-3', 'ikan lele', 3000),
('IK-4', 'ikan nila', 2000),
('IK-5', 'ikan mujaer', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `kd_pesan` varchar(7) NOT NULL,
  `kd_ikan` varchar(7) NOT NULL,
  `jml` int(11) NOT NULL,
  `nm` varchar(30) NOT NULL,
  `alt` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `tgl` date NOT NULL,
  `id_user` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`kd_pesan`, `kd_ikan`, `jml`, `nm`, `alt`, `telp`, `tgl`, `id_user`) VALUES
('PES-1', 'IK-3', 30, 'Usman', 'pendung hiang', '0812321', '2019-11-07', 'US-4'),
('PES-2', 'IK-3', 25, 'Romi', 'tanjung tanah', '08123456789', '2019-11-07', 'US-4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(6) NOT NULL,
  `nm` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm`, `password`) VALUES
('US-1', 'admin', '270399'),
('US-3', 'lexa delvian', '111'),
('US-4', 'sandi m irvan', '321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
 ADD PRIMARY KEY (`kd_ikan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
 ADD PRIMARY KEY (`kd_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
