-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 09:34 AM
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
-- Database: `fppweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(5) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '$2y$10$0DatTchVPDq/32oh2/fadegm6a8pJQwHwiDR1PTd5CMbU5b5dUBly');

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int(11) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `mapel`) VALUES
(3, 'Matematika Dasar'),
(4, 'Fisika 1'),
(5, 'Bahasa Inggris'),
(6, 'Teknologi Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tendik`
--

CREATE TABLE `tendik` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `institusi` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tendik`
--

INSERT INTO `tendik` (`id`, `fullname`, `email`, `institusi`, `username`, `password`) VALUES
(1, 'tendik1', 'tendik1@gmail.com', 'SMA TENDIK 1 TENDIKARJO', 'tendik1', '$2y$10$vB0VGDGrXl9nGcNbpsoFBuEKS3uum/p2sC5PjjJmpXiJelbqgG3yq'),
(2, 'tendik2', 'tendik2@gmail.com', 'UNIVERSITAS TENDIK SIDOARJO', 'tendik2', '$2y$10$k0QfPSLQWcGJBOIlfQUjsePJZrhLEBsA4Cd2LR8SzXY63/Uk5ibia'),
(3, 'dosen1', 'dosen1@gmail.com', 'UNIVERSITAS DISEBUAH KOTA', 'dosen1', '$2y$10$wIOxzNOai341f9U9DqDmOeFXGa4GyuACKx3s0hd5ENJpiKbHxP2Ru');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `submitID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `mapelID` int(11) NOT NULL,
  `judultugas` varchar(100) NOT NULL,
  `namatugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`submitID`, `userID`, `mapelID`, `judultugas`, `namatugas`) VALUES
(1, 28, 5, 'testingpertama', 'ppcoro.png'),
(2, 29, 4, 'Testing kedua', 'njoellecetuju.PNG'),
(4, 30, 5, 'testing keempat', '5ff18cb2025a6.png'),
(5, 31, 6, 'Testing kekw', '5ff196122210c.docx'),
(6, 33, 3, 'demo1', '5ff3e27d6242c.docx');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `password`) VALUES
(28, 'siswa1', 'siswa1@gmail.com', 'siswa1', '$2y$10$3snLwmrEM7kjsptOsdElEe7gkn.p2pWsEbVNmQrR1VIAJywftlBJG'),
(29, 'siswa2', 'siswa2@gmail.com', 'siswa2', '$2y$10$WfV8tx6iEHJffnF5E.jktumpXW8lNgdyJioQkj1pQK6O3yPWaBEGK'),
(30, 'siswa3', 'siswa3@gmail.com', 'siswa3', '$2y$10$QjpfDqwtHV9oybpBf7kined35HCYMb6YDoOKly0H0Qdwr17/zYGPS'),
(31, 'siswa5', 'siswa5@gmail.com', 'siswa5', '$2y$10$WY292ZTHKOp1CVQ2sS8ox.F2w9RCVcljdP0wvORapDmXDR21L1jxm'),
(32, 'siswa6', 'tes@gmail.com', 'siswa6', '$2y$10$b3Gp5Y00at0sVnqf7.0TeuNAcTGGFB1Cmx3xieqCZQjCE2vzc6F3u'),
(33, 'demo1', 'demo1@demo.com', 'demo1', '$2y$10$1PXIRG2oXt9CBbiwdebb/O/zYNjLEL7Td0XYPULVl3WpPkSi5biGq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tendik`
--
ALTER TABLE `tendik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`submitID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `mapelID` (`mapelID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tendik`
--
ALTER TABLE `tendik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `submitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tugas_ibfk_2` FOREIGN KEY (`mapelID`) REFERENCES `matapelajaran` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
