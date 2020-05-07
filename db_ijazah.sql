-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 12:28 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ijazah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan`
--

CREATE TABLE `tb_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `log_pengajuan` datetime NOT NULL,
  `log_kirim` datetime NOT NULL,
  `no_resi` int(20) NOT NULL,
  `status` enum('Belum Diproses','Sudah Dikirim') NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajuan`
--

INSERT INTO `tb_pengajuan` (`id_pengajuan`, `uid`, `log_pengajuan`, `log_kirim`, `no_resi`, `status`, `keterangan`) VALUES
(5, 1, '2020-03-21 16:44:15', '2020-03-21 11:34:06', 15, 'Sudah Dikirim', 'h'),
(6, 5, '2020-03-23 00:00:00', '0000-00-00 00:00:00', 534, 'Sudah Dikirim', 'ascascx'),
(7, 6, '2020-03-23 00:00:00', '0000-00-00 00:00:00', 56, 'Belum Diproses', 'basc'),
(8, 1, '2020-03-23 00:00:00', '0000-00-00 00:00:00', 767, 'Belum Diproses', 'mk'),
(9, 7, '2020-03-23 00:00:00', '0000-00-00 00:00:00', 8, 'Belum Diproses', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `uid` int(11) NOT NULL,
  `nisn` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`uid`, `nisn`, `nama`, `email`, `password`, `tahun_lulus`, `alamat`, `level`) VALUES
(1, 123456781, 'aditiaa aldama', 'asd@asd', 'a8f5f167f44f4964e6c998dee827110c', 2010, 'asdasdasda sdasdasasdasda sdasdasdasdascascascas asdasdasda sdasdasasdasda sdasdasdasdascascascas asdasdasda sdasdasasdasda sdasdasdasdascascascas', 'Admin'),
(5, 123456782, 'Febri Aditya', 'tes@g', '$2y$10$Fg1Aqwqx3mROzuZWSc4I9uAI7iCTR3uBm5N7ieK/wdHmOtjtKzDum', 0000, 'Jl Mangunjaya 56', 'Admin'),
(6, 123456783, 'asd', 'asd@g', '$2y$10$vwRyVrYxApamI.cO0GfHmOo0aNkhm2/5tCofmOQ/1/M2dpM8/zQsa', 2012, 'asd', 'User'),
(7, 0, 'qwerty', 'qwerty@g', '$2y$10$KV1vskyzLualwVyNWfesu.bGHXD94ObejCjbiwje.lMisdpHZ6hsS', 0000, 'asd', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pengajuan`
--
ALTER TABLE `tb_pengajuan`
  ADD CONSTRAINT `tb_pengajuan_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tb_user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
