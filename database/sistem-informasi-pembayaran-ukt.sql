-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 12:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem-informasi-pembayaran-ukt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(2) NOT NULL,
  `username` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `username`, `password`) VALUES
(1, 'admin1', 'admin1'),
(2, 'admin2', 'admin2'),
(3, 'admin3', 'admin3'),
(4, 'admin4', 'admin4'),
(5, 'admin5', 'admin5'),
(6, 'admin6', 'admin6'),
(7, 'admin7', 'admin7'),
(8, 'admin8', 'admin8'),
(9, 'admin9', 'admin9'),
(10, 'admin10', 'admin10'),
(11, 'admin11', 'admin11'),
(12, 'admin12', 'admin12'),
(13, 'admin13', 'admin13');

-- --------------------------------------------------------

--
-- Table structure for table `histori-pembayaran`
--

CREATE TABLE `histori-pembayaran` (
  `idHistori` int(15) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `idPembayaran` int(15) NOT NULL,
  `kodeSemester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kodeJurusan` int(2) NOT NULL,
  `namaJurusan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kodeJurusan`, `namaJurusan`) VALUES
(1, 'Teknik Sipil'),
(2, 'Teknik Mesin'),
(3, 'Teknik Perkapalan'),
(4, 'Teknik Elektro'),
(5, 'Teknik Arsitektur'),
(6, 'Teknik Geologi'),
(7, 'Teknik Industri'),
(8, 'Teknik Kelautan'),
(9, 'Teknik Sistem Perkapalan'),
(10, 'Teknik Perencanaan Wilayah dan Kota'),
(11, 'Teknik Pertambangan'),
(12, 'Teknik Informatika'),
(13, 'Teknik Lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `noTelp` varchar(12) NOT NULL,
  `kodeJurusan` int(2) NOT NULL,
  `kodeSemester` int(2) NOT NULL,
  `golonganUKT` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` int(15) NOT NULL,
  `tanggalPembayaran` date NOT NULL,
  `bukti` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kodeSemester` int(2) NOT NULL,
  `golonganUKT` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `kodeSemester` int(2) NOT NULL,
  `namaSemester` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`kodeSemester`, `namaSemester`) VALUES
(1, 'Semester Awal 2014/2015'),
(2, 'Semester Akhir 2014/2015'),
(3, 'Semester Awal 2015/2016'),
(4, 'Semester Akhir 2015/2016'),
(5, 'Semester Awal 2016/2017'),
(6, 'Semester Akhir 2016/2017'),
(7, 'Semester Awal 2017/2018'),
(8, 'Semester Akhir 2017/2018'),
(9, 'Semester Awal 2018/2019'),
(10, 'Semester Akhir 2018/2019'),
(11, 'Semester Awal 2019/2020'),
(12, 'Semester Akhir 2019/2020'),
(13, 'Semester Awal 2020/2021'),
(14, 'Semester Akhir 2020/2021'),
(15, 'Semester Awal 2021/2022'),
(16, 'Semester Akhir 2021/2022');

-- --------------------------------------------------------

--
-- Table structure for table `ukt`
--

CREATE TABLE `ukt` (
  `golonganUKT` int(2) NOT NULL,
  `tarifUKT` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukt`
--

INSERT INTO `ukt` (`golonganUKT`, `tarifUKT`) VALUES
(1, 500000),
(2, 600000),
(3, 750000),
(4, 2000000),
(5, 2400000),
(6, 3250000),
(7, 4250000),
(8, 5500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `histori-pembayaran`
--
ALTER TABLE `histori-pembayaran`
  ADD PRIMARY KEY (`idHistori`),
  ADD KEY `nim` (`nim`),
  ADD KEY `idPembayaran` (`idPembayaran`),
  ADD KEY `kodeSemester` (`kodeSemester`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kodeJurusan`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kodeJurusan` (`kodeJurusan`),
  ADD KEY `kodeSemester` (`kodeSemester`),
  ADD KEY `golonganUKT` (`golonganUKT`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`),
  ADD KEY `nim` (`nim`),
  ADD KEY `tarifUKT` (`golonganUKT`),
  ADD KEY `kodeSemester` (`kodeSemester`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`kodeSemester`);

--
-- Indexes for table `ukt`
--
ALTER TABLE `ukt`
  ADD PRIMARY KEY (`golonganUKT`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `histori-pembayaran`
--
ALTER TABLE `histori-pembayaran`
  MODIFY `idHistori` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `kodeJurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idPembayaran` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `kodeSemester` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ukt`
--
ALTER TABLE `ukt`
  MODIFY `golonganUKT` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histori-pembayaran`
--
ALTER TABLE `histori-pembayaran`
  ADD CONSTRAINT `histori-pembayaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `histori-pembayaran_ibfk_2` FOREIGN KEY (`idPembayaran`) REFERENCES `pembayaran` (`idPembayaran`),
  ADD CONSTRAINT `histori-pembayaran_ibfk_3` FOREIGN KEY (`kodeSemester`) REFERENCES `pembayaran` (`kodeSemester`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kodeJurusan`) REFERENCES `jurusan` (`kodeJurusan`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kodeSemester`) REFERENCES `semester` (`kodeSemester`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`golonganUKT`) REFERENCES `ukt` (`golonganUKT`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`golonganUKT`) REFERENCES `ukt` (`golonganUKT`),
  ADD CONSTRAINT `pembayaran_ibfk_4` FOREIGN KEY (`kodeSemester`) REFERENCES `semester` (`kodeSemester`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
