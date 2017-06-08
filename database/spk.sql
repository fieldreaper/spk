-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2017 at 03:43 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bobot_20` int(2) NOT NULL,
  `bobot_21` int(2) NOT NULL,
  `bobot_22` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `bobot_20`, `bobot_21`, `bobot_22`) VALUES
(5, 'Ngopi Sehat', 6, 8, 6),
(6, 'Mas Mba MIPA', 6, 8, 6),
(7, 'BEM Participant', 6, 8, 4),
(8, 'OLIMIPADE', 6, 8, 6),
(9, 'Pengkaryaan Ekonomi Kreat', 9, 9, 9),
(10, 'Sekolah Ristek', 6, 8, 9),
(11, 'Mipa Competition and Education', 9, 9, 9),
(12, 'Mipa Go Green', 6, 8, 9),
(13, 'Kompos (Kompetisi Poster)', 8, 8, 8),
(14, 'Dusbin Sehat', 9, 9, 6),
(15, 'Dusbin Week', 9, 9, 6),
(16, 'Donor Darah MIPA', 9, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(2) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `bobot` int(2) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `jenis`) VALUES
(20, 'Ruang Lingkup Acara', 8, 'Keuntungan'),
(21, 'Sasaran', 7, 'Keuntungan'),
(22, 'Undangan', 5, 'Biaya');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` int(2) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `bobot` int(2) NOT NULL,
  `id_kriteria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `nama`, `bobot`, `id_kriteria`) VALUES
(10, 'Umum', 9, 20),
(11, 'Universitas', 8, 20),
(12, 'Fakultas', 6, 20),
(13, 'Umum', 9, 21),
(14, 'Mahasiswa', 8, 21),
(15, 'SMA/Sederajat', 6, 21),
(16, 'Luar Universitas', 9, 22),
(17, 'Dalam Universitas', 8, 22),
(18, 'Dalam Fakultas', 6, 22),
(19, 'Tidak ada', 4, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `fk_subkriteria_kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
