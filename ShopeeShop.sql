-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2023 at 01:05 AM
-- Server version: 8.1.0
-- PHP Version: 8.2.12

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

-- --------------------------------------------------------

--
-- Table structure for table `Articles`
--

CREATE TABLE `Articles` (
  `id_art` int NOT NULL,
  `nom` varchar(25) NOT NULL,
  `quantite` int NOT NULL,
  `prix` float NOT NULL,
  `url_photo` varchar(40) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`id_art`, `nom`, `quantite`, `prix`, `url_photo`, `description`) VALUES
(1, 'iPhone 15 Pro', 542575, 1229, 'images/iphone.png', 'Nouvel iPhone 15 Pro, Design en titane\r\nFace avant Ceramic Shield\r\nDos en verre mat texturé'),
(2, 'Plante verte', 5490490, 49.99, 'images/plante-verte.png', 'Jolie plante verte toute en plastique, ne demande pas d\'entretien'),
(3, 'Google Pixel 7 Pro', 1345768, 899, 'images/pixel.png', 'Le Google Pixel le plus puissant à ce jour.\r\nUn design élégant conçu avec des matériaux recyclés11.\r\nGoogle Tensor G2, pour encore plus de puissance8.\r\nLe module photo professionnel de Google.');

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `id_client` int NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `numero` int NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Clients`
--

INSERT INTO `Clients` (`id_client`, `nom`, `prenom`, `adresse`, `numero`, `mail`, `mdp`) VALUES
(1, 'Thomas', 'Pasquet', '124 rue des tournefeuilles', 643981224, 'thomas.pasquet@gmail.com', '$2y$10$VjXAJaQBh4WubQLOUJOLKeCsXz5aO8DPv.M0XlgUEwTlIKwFWPNAy'),
(2, 'Gonçalves', 'Hugo', '3 rue Charles Didion', 643381055, 'hugoglvs@icloud.com', '$2y$10$gTy80P.kqMSfXDaytd0U7.0zPGQceAj8hwEAUsM.FHRYuHrBoZCie'),
(3, 'Thomas', 'Bergerac', '3 Rue du Vigneron', 632019345, 'thomas.vigneron@gmail.com', '$2y$10$ThjnTpDCLI.Ba0SMWhQQIuze/vbzAR3bXFJcbj4TjshOXl7OQrIem'),
(6, 'Triozon', 'Lucas', '1 rue de la Méridienne', 766666666, 'legendre.trois.dimensions@gmail.com', '$2y$10$N6mUXeogBlYL9EAl9Sv5LudLq741ZCGkeqrOmUpq6/cZEcTL7FLta'),
(7, 'Bogneron', 'Bobby', '3 Rue des Boules', 603040054, 'bobbylamenace@outlook.fr', '$2y$10$p0lHOraNZgNuZzHDWUwMgO91g.sX5neXY2EuKMBxo.K1URsVUtStG'),
(8, 'Nom', 'Prenom', 'Adresse', 612345678, 'test@gmail.com', '$2y$10$ysm9ZwpGToLVlb4ZkIHd7.OnX8ORhUSuwzh90oDpGstcL1AK/K/tG'),
(9, 'Benmouloud', 'Mehdi', '125 rue du couscous', 626497056, 'eat.lair@gmail.com', '$2y$10$8u/u0SSh1zICbnoCOa37FOXIvXuCfiQZx8MV0YPoaQRdsGlAgsove'),
(10, 'Lousignan', 'Louise', '69 chemin des coquelicots', 987654321, 'louise@yahoo.fr', '$2y$10$zJ8e0JBHbpgJB8PqRsmeB.JNafZ5lUflWQlL6e2Ekl6eD4o3wye.q'),
(11, 'yaha', 'yoho', 'zed', 1234098765, 'louise@yahoo.fr', '$2y$10$MeZyflMrEzJuIy491jVl9eT8HpOMP02v0dJ2y75uKnzj0vdCBLRuy'),
(12, 'dcd', 'zdsxd', 'dss', 1234567890, 'louise@yahoo.f', '$2y$10$ju0x4xZ0IlbzlBsd8STH/eSiNKR4adOtH3gEtehoyntiU8vWl6t2e'),
(13, 'b', 'gj', 'klj', 987651455, 'louise@ya.c', '$2y$10$73uw5m.tRnqK9bQPKJc5SOxLTmjv/JfDLIbu0UTFDzeAG6PUGauiu'),
(15, 'dc', 'dqs', 'dqwx', 987133412, 'dseda@fd.fr', '$2y$10$zdPg/qd2QnU4I.IG9V6tDum38fWFnQQafNQ8F/9DywtkLuxTHG5ra');

-- --------------------------------------------------------

--
-- Table structure for table `Commandes`
--

CREATE TABLE `Commandes` (
  `id_commande` int NOT NULL,
  `id_art` int DEFAULT NULL,
  `id_client` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `envoi` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Commandes`
--

INSERT INTO `Commandes` (`id_commande`, `id_art`, `id_client`, `quantite`, `envoi`) VALUES
(6, 2, 8, 3, 0),
(7, 3, 8, 1, 0),
(8, 2, 8, 1, 0),
(9, 1, 8, 1, 0),
(10, 1, 9, 80, 0),
(11, 3, 9, 794220, 0),
(12, 1, 8, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`id_art`);

--
-- Indexes for table `Clients`
--
ALTER TABLE `Clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `Commandes`
--
ALTER TABLE `Commandes`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_art` (`id_art`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Articles`
--
ALTER TABLE `Articles`
  MODIFY `id_art` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Clients`
--
ALTER TABLE `Clients`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Commandes`
--
ALTER TABLE `Commandes`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_art`) REFERENCES `Articles` (`id_art`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `Clients` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
