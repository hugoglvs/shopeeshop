-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2023 at 10:11 PM
-- Server version: 8.1.0
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ShopeeShop`
--
CREATE DATABASE IF NOT EXISTS `ShopeeShop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `ShopeeShop`;

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

DROP TABLE IF EXISTS `Articles`;
CREATE TABLE IF NOT EXISTS `Articles` (
  `id_art` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `quantite` int NOT NULL,
  `prix` float NOT NULL,
  `url_photo` varchar(40) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_art`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`id_art`, `nom`, `quantite`, `prix`, `url_photo`, `description`) VALUES
(1, 'iPhone 15 Pro', 542671, 1229, 'images/iphone.png', 'Nouvel iPhone 15 Pro, Design en titane\r\nFace avant Ceramic Shield\r\nDos en verre mat texturé'),
(2, 'Plante verte', 5490632, 49.99, 'images/plante-verte.png', 'Jolie plante verte toute en plastique, ne demande pas d\'entretien'),
(3, 'Google Pixel 7 Pro', 794213, 899, 'images/pixel.png', 'Le Google Pixel le plus puissant à ce jour.\r\nUn design élégant conçu avec des matériaux recyclés11.\r\nGoogle Tensor G2, pour encore plus de puissance8.\r\nLe module photo professionnel de Google.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
