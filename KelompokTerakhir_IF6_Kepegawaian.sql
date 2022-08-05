-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 03:47 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `Pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `nama`, `Pass`) VALUES
('superadmin', 'Super Admin', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `idgolongan` int(11) NOT NULL,
  `namaGolongan` varchar(100) NOT NULL,
  `gajiPokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`idgolongan`, `namaGolongan`, `gajiPokok`) VALUES
(1, 'karyawan', 5000000),
(2, 'Junior Manager', 10000000),
(3, 'Senior Manager', 25000000),
(4, 'Direktur', 35000000);

-- --------------------------------------------------------

--
-- Table structure for table `log_penggajian`
--

CREATE TABLE `log_penggajian` (
  `kode` int(11) NOT NULL,
  `idPenggajian` int(11) NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_penggajian`
--

INSERT INTO `log_penggajian` (`kode`, `idPenggajian`, `idPegawai`, `Tanggal`, `Gaji`) VALUES
(1, 4, 1001, '2022-08-05', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `idgolongan` int(11) NOT NULL,
  `notelp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `Pass` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `nama`, `idgolongan`, `notelp`, `alamat`, `Pass`) VALUES
(1001, 'Andi Sutir ', 1, '089875615241', 'Jl. Lebah Kecil', '1001'),
(1002, 'Ahmad Saep ', 3, '08981273641', 'Jl. Kiara Condong', '1002'),
(1003, 'Kikin Jael', 4, '089876451627', 'Jl. Musa giri', '1003');

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `idPenggajian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `idPegawai` int(11) NOT NULL,
  `totalGaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`idPenggajian`, `tanggal`, `idPegawai`, `totalGaji`) VALUES
(1, '2022-08-05', 1003, 35000000),
(2, '2022-08-05', 1002, 25000000),
(3, '2022-08-05', 1001, 5000000);

--
-- Triggers `penggajian`
--
DELIMITER $$
CREATE TRIGGER `delete_gaji` AFTER DELETE ON `penggajian` FOR EACH ROW INSERT INTO log_penggajian(idPenggajian, idPegawai, Tanggal, Gaji)
	VALUES(OLD.idPenggajian, OLD. idPegawai, NOW(), OLD.totalGaji)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`idgolongan`);

--
-- Indexes for table `log_penggajian`
--
ALTER TABLE `log_penggajian`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`),
  ADD KEY `idgolongan` (`idgolongan`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`idPenggajian`),
  ADD KEY `idPegawai` (`idPegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_penggajian`
--
ALTER TABLE `log_penggajian`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`idgolongan`) REFERENCES `golongan` (`idgolongan`);

--
-- Constraints for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_ibfk_1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
