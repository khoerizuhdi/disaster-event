-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2021 at 09:28 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `bencana`
--

CREATE TABLE `bencana` (
  `id` int(11) NOT NULL,
  `judul_bencana` varchar(255) DEFAULT NULL,
  `jenis_bencana_id` int(11) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `deskripsi_bencana` text,
  `photo_bencana` text,
  `tanggal_kejadian` date DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bencana`
--

INSERT INTO `bencana` (`id`, `judul_bencana`, `jenis_bencana_id`, `latitude`, `longitude`, `deskripsi_bencana`, `photo_bencana`, `tanggal_kejadian`, `alamat`) VALUES
(3, 'Banjir di Jakarta', 1, '-6.237236443335462', '106.79380136080576', 'Banjir setinggi 25 cm', 'banjir.jpeg', '2021-12-04', NULL),
(4, 'Angin Kencang di Bogor', 1, '-6.60030434422267', '106.8049355177827', 'Atap warga rusak', 'angin.jpg', '2021-12-06', NULL),
(8, 'Kekeringan di Gunung Kidul', 3, '-7.984321676703807', '110.56613055193596', 'Warga kesulitan air minum', 'kekeringan.jpg', '2021-12-07', NULL),
(11, 'Gelombang Tinggi di Cilacap', 2, '-7.695952842689874', '108.9630749163863', 'Gelombang tinggi setinggi 1 meter', 'gelombang1.jpg', '2021-12-09', 'Jl. Cilacap'),
(12, 'Banjir Bandang di Sintang', 1, '0.33778254745377595', '111.42119361106631', 'Banjir bandang merendam 7 desa', '1aecaeaf-15f2-4677-88dd-c6fb3f2ede56.jpeg', '2021-12-23', 'Jl. Sintang Jaya'),
(23, 'Kebakaran Hutan', 1, '0.656461', '102.2405593', 'Telah terjadi kebakaran hutan di Riau', 'kebakaran.png', '2021-12-01', 'Riau Timur');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bencana`
--

CREATE TABLE `jenis_bencana` (
  `id` int(11) NOT NULL,
  `jenis_bencana` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_bencana`
--

INSERT INTO `jenis_bencana` (`id`, `jenis_bencana`) VALUES
(1, 'Hidrometeorologi'),
(2, 'Gempa Bumi'),
(3, 'Iklim'),
(4, 'Vulkanik');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
(2, 'khoeri', 'khoeri@kmail.com', '1d9c2f832603a2c312fb2739afa0eede');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bencana_jenis_bencana` (`jenis_bencana_id`);

--
-- Indexes for table `jenis_bencana`
--
ALTER TABLE `jenis_bencana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `jenis_bencana`
--
ALTER TABLE `jenis_bencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bencana`
--
ALTER TABLE `bencana`
  ADD CONSTRAINT `FK_bencana_jenis_bencana` FOREIGN KEY (`jenis_bencana_id`) REFERENCES `jenis_bencana` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
