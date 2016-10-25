-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2015 at 08:31 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gameport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('archie', 'ara'),
('pras', 'aldiarta');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `idgame` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(6) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `rilis` varchar(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`idgame`, `nama`, `harga`, `kategori`, `rilis`) VALUES
(9, 'GTA V', 500000, 'open world', '2015'),
(10, 'Payday 2', 300000, 'coop', '2013'),
(11, 'Lost Planet 3', 350000, 'third person shooter', '2013'),
(12, 'CS:GO', 75000, 'fps', '2012'),
(13, 'Dead Rising 3', 250000, 'open world', '2014'),
(14, 'Just Cause 3', 350000, 'open world', '2015'),
(15, 'Project Cars', 100000, 'racing', '2015'),
(16, 'Black ops 3', 675000, 'fps', '2015'),
(17, 'Binding of issac', 45000, 'indie', '2011'),
(18, 'Half-life 2', 50000, 'fps', '2004'),
(19, 'Farcry 4', 645000, 'fps', '2015'),
(21, 'Starcraft 2', 350000, 'Strategy', '2010'),
(22, 'Black messa', 135000, 'FPS', '2015'),
(23, 'Hitman Absolution', 75000, 'Strategy', '2013');

-- --------------------------------------------------------

--
-- Table structure for table `listgame`
--

CREATE TABLE IF NOT EXISTS `listgame` (
  `iduser` int(5) NOT NULL,
  `idgame` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listgame`
--

INSERT INTO `listgame` (`iduser`, `idgame`) VALUES
(2, 9),
(2, 14),
(1, 12),
(1, 15),
(10, 9),
(4, 12),
(2, 17),
(12, 17),
(12, 12),
(8, 18),
(8, 14),
(2, 15),
(14, 12),
(2, 18),
(4, 18);

-- --------------------------------------------------------

--
-- Table structure for table `teman`
--

CREATE TABLE IF NOT EXISTS `teman` (
  `iduser` int(5) NOT NULL,
  `idteman` int(5) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teman`
--

INSERT INTO `teman` (`iduser`, `idteman`, `status`) VALUES
(2, 4, 'Berteman'),
(4, 2, 'Berteman'),
(1, 4, 'Berteman'),
(4, 1, 'Berteman'),
(8, 4, 'Pending'),
(3, 2, 'Berteman'),
(8, 2, 'Berteman'),
(10, 2, 'Berteman'),
(2, 10, 'Berteman'),
(12, 1, 'Berteman'),
(1, 12, 'Berteman'),
(8, 2, 'Berteman'),
(2, 8, 'Berteman'),
(2, 1, 'Berteman'),
(1, 2, 'Berteman'),
(14, 2, 'Berteman'),
(2, 14, 'Berteman'),
(2, 3, 'Berteman'),
(1, 10, 'Pending'),
(2, 17, 'Berteman'),
(17, 2, 'Berteman');

-- --------------------------------------------------------

--
-- Table structure for table `topup`
--

CREATE TABLE IF NOT EXISTS `topup` (
  `idtransaksi` int(5) NOT NULL,
  `usernameAdmin` varchar(30) DEFAULT NULL,
  `idUser` int(5) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `norek` varchar(50) NOT NULL,
  `berita` varchar(50) NOT NULL DEFAULT 'tidak ada',
  `transfer` varchar(50) NOT NULL,
  `total` decimal(8,0) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Request',
  `deskripsi` varchar(30) DEFAULT 'Dalam proses'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--

INSERT INTO `topup` (`idtransaksi`, `usernameAdmin`, `idUser`, `bank`, `tanggal`, `waktu`, `norek`, `berita`, `transfer`, `total`, `status`, `deskripsi`) VALUES
(6, 'archie', 2, 'BCA - Archie Atrie I - 0255706611', '2015-05-07', '02:10', 'ghassan - 071124412354', '081242480700', 'E-Banking', '100000', 'Paid', 'top up berhasil'),
(7, 'archie', 2, 'MANDIRI - Archie Atrie I - 21344723451', '2015-05-05', '14:00', 'archie - 0255706611', '081242480700', 'E-Banking', '150000', 'Paid', 'top up berhasil'),
(8, 'archie', 2, 'BNI - Archie Atrie I - 0330140431', '2015-05-05', '14:00', 'ghassan - 01831223', '081242480700', 'ATM', '30000', 'Rejected', 'waktu pembayaran habis'),
(9, 'archie', 16, 'BNI - Archie Atrie I - 0330140431', '2015-05-05', '16:56', 'archie - 0255706611', '085656637251', 'Setoran tunai', '150000', 'Rejected', 'data transfer tidak ditemukan'),
(10, 'pras', 17, 'BNI - Archie Atrie I - 0330140431', '2015-05-06', '00:12', 'alfi - 462643812438', '', 'ATM', '100000', 'Rejected', 'tidak valid'),
(11, 'pras', 17, 'MANDIRI - Archie Atrie I - 21344723451', '2015-06-05', '00:12', 'tikha - 316314563', '', 'Internet Banking', '300000', 'Paid', 'top up berhasil'),
(12, NULL, 2, 'BCA - Archie Atrie I - 0255706611', '2015-05-06', '12:45', 'ghassan - 0255706611', '', 'Internet Banking', '50000', 'Request', 'Dalam proses');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `saldo` decimal(8,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `nama`, `username`, `password`, `saldo`) VALUES
(1, 'pranesha', 'pras', 'aaaa', '1250000'),
(2, 'archisdiningrat', 'archie', 'ara', '450146'),
(3, 'sarandianti', 'sarah', 'ara', '123000'),
(4, 'maulisye', 'maul', 'rra', '48456'),
(6, 'luke daely', 'luke', 'aaaa', '25000'),
(7, 'Maulina', 'anna', '1234', '0'),
(8, 'bunga dwipa', 'bunga', '1234', '100000'),
(10, 'atikha', 'atikha', 'aaaa', '550000'),
(11, 'ARIDA', 'ARIDA', 'ARIDA', '100000'),
(12, 'andianti', 'anti', 'kuman', '55000'),
(14, 'dwitika', 'tika', 'tika', '125000'),
(16, 'rini wahyuni', 'bonte', '1234', '0'),
(17, 'alfi', 'alfi', 'alfi', '300000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`idgame`);

--
-- Indexes for table `listgame`
--
ALTER TABLE `listgame`
  ADD KEY `iduser` (`iduser`), ADD KEY `idgame` (`idgame`);

--
-- Indexes for table `teman`
--
ALTER TABLE `teman`
  ADD KEY `iduser` (`iduser`), ADD KEY `idteman` (`idteman`);

--
-- Indexes for table `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`idtransaksi`), ADD KEY `usernameAdmin` (`usernameAdmin`), ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `idgame` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `topup`
--
ALTER TABLE `topup`
  MODIFY `idtransaksi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `listgame`
--
ALTER TABLE `listgame`
ADD CONSTRAINT `listgame_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `listgame_ibfk_2` FOREIGN KEY (`idgame`) REFERENCES `game` (`idgame`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teman`
--
ALTER TABLE `teman`
ADD CONSTRAINT `teman_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `teman_ibfk_2` FOREIGN KEY (`idteman`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topup`
--
ALTER TABLE `topup`
ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `topup_ibfk_2` FOREIGN KEY (`usernameAdmin`) REFERENCES `admin` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
