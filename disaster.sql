-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ci3_bencana
CREATE DATABASE IF NOT EXISTS `ci3_bencana` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ci3_bencana`;

-- Dumping structure for table ci3_bencana.bencana
CREATE TABLE IF NOT EXISTS `bencana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_bencana` varchar(255) DEFAULT NULL,
  `jenis_bencana_id` int(11) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `deskripsi_bencana` text DEFAULT NULL,
  `photo_bencana` text DEFAULT NULL,
  `tanggal_kejadian` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_bencana_jenis_bencana` (`jenis_bencana_id`),
  CONSTRAINT `FK_bencana_jenis_bencana` FOREIGN KEY (`jenis_bencana_id`) REFERENCES `jenis_bencana` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_bencana.bencana: ~5 rows (approximately)
DELETE FROM `bencana`;
/*!40000 ALTER TABLE `bencana` DISABLE KEYS */;
INSERT INTO `bencana` (`id`, `judul_bencana`, `jenis_bencana_id`, `latitude`, `longitude`, `deskripsi_bencana`, `photo_bencana`, `tanggal_kejadian`, `alamat`) VALUES
	(3, 'Banjir di Jakarta', 1, '-6.237236443335462', '106.79380136080576', 'Banjir setinggi 25 cm', 'banjir.jpeg', '2021-12-04', NULL),
	(4, 'Angin Kencang di Bogor', 1, '-6.60030434422267', '106.8049355177827', 'Atap warga rusak', 'angin.jpg', '2021-12-06', NULL),
	(8, 'Kekeringan di Gunung Kidul', 3, '-7.984321676703807', '110.56613055193596', 'Warga kesulitan air minum', 'kekeringan.jpg', '2021-12-07', NULL),
	(11, 'Gelombang Tinggi di Cilacap', 2, '-7.695952842689874', '108.9630749163863', 'Gelombang tinggi setinggi 1 meter', 'gelombang1.jpg', '2021-12-09', 'Jl. Cilacap'),
	(12, 'Banjir Bandang di Sintang', 1, '0.33778254745377595', '111.42119361106631', 'Banjir bandang merendam 7 desa', '1aecaeaf-15f2-4677-88dd-c6fb3f2ede56.jpeg', '2021-12-23', 'Jl. Sintang Jaya');
/*!40000 ALTER TABLE `bencana` ENABLE KEYS */;

-- Dumping structure for table ci3_bencana.jenis_bencana
CREATE TABLE IF NOT EXISTS `jenis_bencana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_bencana` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_bencana.jenis_bencana: ~2 rows (approximately)
DELETE FROM `jenis_bencana`;
/*!40000 ALTER TABLE `jenis_bencana` DISABLE KEYS */;
INSERT INTO `jenis_bencana` (`id`, `jenis_bencana`) VALUES
	(1, 'Hidrometeorologi'),
	(2, 'Gempa Bumi'),
	(3, 'Iklim'),
	(4, 'Vulkanik');
/*!40000 ALTER TABLE `jenis_bencana` ENABLE KEYS */;

-- Dumping structure for table ci3_bencana.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ci3_bencana.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `email`, `password`) VALUES
	(1, 'Karisma', 'karisma@email.com', 'bb77940377ca1f968647f863b29ee71c');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
