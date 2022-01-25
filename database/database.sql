-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server versie:                5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Versie:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Databasestructuur van login wordt geschreven
CREATE DATABASE IF NOT EXISTS `login` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `login`;

-- Structuur van  tabel login.products wordt geschreven
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel login.products: ~54 rows (ongeveer)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `price`, `picture`, `description`, `category`) VALUES
	(1, 'product 1', 10.95, '(NULL)\r\n\r\n', 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(2, 'product 2', 69.42, NULL, 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(6, 'product 3', 68.09, NULL, 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(7, 'product 4 ', 24.94, NULL, 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(8, 'product 5', 34.76, NULL, 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(9, 'product 6', 49.76, NULL, 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(10, 'product 7', 1000, NULL, 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(11, 'product 8', 34.98, NULL, 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(12, 'product 9', 24.9, NULL, 'lekker zoet en scherp, verpakt per 20.', 'indian'),
	(23, 'product 1', 37.23, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(24, 'product 2', 32.65, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(25, 'product 3', 23.54, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(26, 'product 4', 34.21, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(27, 'product 5', 98.45, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(28, 'product 6', 24.45, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(29, 'product 7', 24.78, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(30, 'product 8', 24.97, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(31, 'product 9', 23.87, NULL, 'lekker zoet en scherp, verpakt per 20.', 'japan'),
	(32, 'product 1', 32.68, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(33, 'product 2', 82.24, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(34, 'product 3', 35.65, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(35, 'product 4', 35.98, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(36, 'product 5', 18.26, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(37, 'product 6', 24.75, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(38, 'product 7', 34.21, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(39, 'product 8', 23.54, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(40, 'product 9', 24.45, NULL, 'lekker zoet en scherp, verpakt per 20.', 'chinese'),
	(41, 'product 1', 52.74, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(42, 'product 2', 47.54, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(43, 'product 3', 93.12, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(44, 'product 4', 67.21, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(45, 'product 5', 34.86, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(46, 'product 6', 86.23, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(47, 'product 7', 45.89, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(48, 'product 8', 43.56, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(49, 'product 9', 35.53, NULL, 'lekker zoet en scherp, verpakt per 20.', 'thai'),
	(50, 'product 1', 68, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(51, 'product 2', 34.21, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(52, 'product 3', 23.23, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(53, 'product 4', 32.2, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(54, 'product 5', 233.5, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(55, 'product 6', 25.78, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(56, 'product 7', 12.97, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(57, 'product 8', 23.76, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(58, 'product 9', 34.64, NULL, 'lekker zoet en scherp, verpakt per 20.', 'vietnam'),
	(59, 'product 1', 83.34, NULL, 'goeie pan voor alle soorten gerechten', 'supplies'),
	(60, 'product 2', 42.12, NULL, 'goeie pan voor alle soorten gerechten', 'supplies'),
	(61, 'product 3', 87.54, NULL, 'goeie pan voor alle soorten gerechten', 'supplies'),
	(62, 'product 4', 45.78, NULL, 'goeie pan voor alle soorten gerechten', 'supplies'),
	(63, 'product 5', 43.21, NULL, 'goeie pan voor alle soorten gerechten', 'supplies'),
	(64, 'product 6', 34.78, NULL, 'goeie pan voor alle soorten gerechten', 'supplies'),
	(65, 'product 7', 56.89, NULL, 'goeie pan voor alle soorten gerechten', 'supplies'),
	(66, 'product 8', 53.12, NULL, 'goeie pan voor alle soorten gerechten', 'supplies'),
	(67, 'product 9', 35.9, NULL, 'goeie pan voor alle soorten gerechten', 'supplies');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Structuur van  tabel login.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumpen data van tabel login.users: ~3 rows (ongeveer)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `password`, `admin`) VALUES
	(1, 'test@test.nl', 'test', 1),
	(2, 'horsevechter@boom.com', '123456', 0),
	(3, 'cyvubj@fgah.com', '123456', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
