-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 12:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kehadiran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` varchar(3) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  `namaadmin` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `password`, `namaadmin`) VALUES
('M01', 'M01', 'aliff'),
('M02', 'M02', 'shah'),
('M03', 'M03', 'Zaid\r\n'),
('M04', 'M04', 'Shila');

-- --------------------------------------------------------

--
-- Table structure for table `ahli`
--

CREATE TABLE `ahli` (
  `idahli` varchar(4) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  `namaahli` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ahli`
--

INSERT INTO `ahli` (`idahli`, `password`, `namaahli`) VALUES
('A001', 'A001', 'Aliff'),
('A002', 'A002', 'Akhtar'),
('A003', 'A003', 'Aisyah'),
('A004', 'A004', 'Shen Lin'),
('A005', 'A005', 'Taufik\r\n'),
('A006', 'A006', 'Sara');

-- --------------------------------------------------------

--
-- Table structure for table `aktiviti`
--

CREATE TABLE `aktiviti` (
  `idaktiviti` varchar(3) NOT NULL,
  `namaaktiviti` varchar(50) DEFAULT NULL,
  `tempat` varchar(30) DEFAULT NULL,
  `tarikhmasa` datetime DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `idadmin` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktiviti`
--

INSERT INTO `aktiviti` (`idaktiviti`, `namaaktiviti`, `tempat`, `tarikhmasa`, `gambar`, `idadmin`) VALUES
('P00', 'MINGGU INOVASI MULTIMEDIA', 'MAKMAL KOMPUTER 1', '2024-03-20 10:30:00', 'P00.png', 'M01'),
('P01', 'MINGGU CEMERLANG IT', 'MAKMAL KOMPUTER 2', '2024-08-21 12:30:00', 'P01.png', 'M01'),
('P03', 'MESYUARAT AGUNG TAHUNAN', 'BILIK SIDANG', '2024-03-25 10:45:00', 'P03.png', 'M02');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `idahli` varchar(4) NOT NULL,
  `idaktiviti` varchar(3) NOT NULL,
  `hadir` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`idahli`, `idaktiviti`, `hadir`) VALUES
('A001', 'P00', 'ya'),
('A001', 'P01', 'ya'),
('A001', 'P03', 'tidak'),
('A002', 'P00', 'ya'),
('A002', 'P01', 'ya'),
('A003', 'P00', 'ya'),
('A004', 'P00', 'ya'),
('A004', 'P01', 'ya'),
('A005', 'P00', 'ya'),
('A006', 'P00', 'ya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `ahli`
--
ALTER TABLE `ahli`
  ADD PRIMARY KEY (`idahli`);

--
-- Indexes for table `aktiviti`
--
ALTER TABLE `aktiviti`
  ADD PRIMARY KEY (`idaktiviti`),
  ADD KEY `idadmin` (`idadmin`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`idahli`,`idaktiviti`),
  ADD KEY `idahli` (`idahli`),
  ADD KEY `idaktiviti` (`idaktiviti`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktiviti`
--
ALTER TABLE `aktiviti`
  ADD CONSTRAINT `aktiviti_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ahli` FOREIGN KEY (`idahli`) REFERENCES `ahli` (`idahli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kehadiran_aktiviti` FOREIGN KEY (`idaktiviti`) REFERENCES `aktiviti` (`idaktiviti`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
