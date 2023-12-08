-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 08, 2023 at 08:47 PM
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
  `id_stripe` varchar(55) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `quantite` int NOT NULL,
  `prix` float NOT NULL,
  `url_photo` varchar(40) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Articles`
--

INSERT INTO `Articles` (`id_art`, `id_stripe`, `nom`, `quantite`, `prix`, `url_photo`, `description`) VALUES
(1, 'price_1OKSLpGL1HwwBRENLSuSqrBM', 'Ane', 181, 1229, 'images/donkey.png', 'Bel âne, bien monté, carrosserie grise. 3 chevaux. Gentil. 5 carottes / 100km.'),
(2, 'price_1OKi2bGL1HwwBRENTyJqM8Dh', 'Panda', 510, 8750, 'images/pandas.png', 'Panda, maîtrise le Kung-Fu. Pelage mixte noir/blanc. 830kg. Parle Espagnol et Mandarin. Casier judiciaire vierge.'),
(3, 'price_1OKi4wGL1HwwBRENmF6qjC0L', 'Baleine', 5, 5, 'images/whale.png', 'Reconditionné, état presque neuf. Exclusivité mondiale. Peinture d\'origine. Garantie constructeur 3ans reconductible + prime à la casse. Mange bien. Nageoires non incluses. Braconné par nos soins à l\'Odysseum.');

-- --------------------------------------------------------

--
-- Table structure for table `Clients`
--

CREATE TABLE `Clients` (
  `id_client` int NOT NULL,
  `id_stripe` varchar(55) NOT NULL,
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

INSERT INTO `Clients` (`id_client`, `id_stripe`, `nom`, `prenom`, `adresse`, `numero`, `mail`, `mdp`) VALUES
(2, 'cus_P96vB7x2cRwWAt', 'Gonçalves', 'Hugo', '3 rue Charles Didion', 643381055, 'hugoglvs@icloud.com', '$2y$10$gTy80P.kqMSfXDaytd0U7.0zPGQceAj8hwEAUsM.FHRYuHrBoZCie'),
(6, 'cus_P96wV1b1a0mzBw', 'Triozon', 'Lucas', '1 rue de la Méridienne', 766666666, 'legendre.trois.dimensions@gmail.com', '$2y$10$N6mUXeogBlYL9EAl9Sv5LudLq741ZCGkeqrOmUpq6/cZEcTL7FLta'),
(8, 'cus_P96wX9rlL1oMCV', 'Nom', 'Prenom', 'Adresse', 612345678, 'test@gmail.com', '$2y$10$ysm9ZwpGToLVlb4ZkIHd7.OnX8ORhUSuwzh90oDpGstcL1AK/K/tG'),
(9, 'cus_P96xnuNu1IjqZc', 'Benmouloud', 'Mehdi', '125 rue du couscous', 626497056, 'eat.lair@gmail.com', '$2y$10$8u/u0SSh1zICbnoCOa37FOXIvXuCfiQZx8MV0YPoaQRdsGlAgsove'),
(10, 'cus_P8l6BFBGRGifJH', 'Lousignan', 'Louise', '69 chemin des coquelicots', 987654321, 'louise@yahoo.fr', '$2y$10$zJ8e0JBHbpgJB8PqRsmeB.JNafZ5lUflWQlL6e2Ekl6eD4o3wye.q'),
(16, 'cus_P8lnq5Ak2kZu45', 'edqs', 'rzd', 'rzd', 608785884, 'loue@yao.fr', '$2y$10$1TcGCqmajKwNikguJjbBiuBz/sTj6H5sYMHKV6RLoCpLX5OGjhutG'),
(17, 'cus_P8lnDFj3hXEmYX', 'edzs', 'fed', 'ed', 1234567890, 'lose@yafffhoo.fr', '$2y$10$TykxORYBsSGFVu9DvWFN1erR1YLWlL7pfIX91YwmPUhQE5hQ.X4NW'),
(18, 'cus_P8m2Hq7TE6x8Vl', 'eazdqs', 'ezsd', 'ezds', 923142981, 'edadzlkn@mm.fr', '$2y$10$R6LjEmghWIUqLJfiTtgx4eMtiuRuBoM/miFA9PPpjMkmS/iFXeNxy'),
(19, 'cus_P8m38hfiBFKz7n', 'Benosmane', 'Yacine', 'Leucate', 782888717, 'ya.benosmane@gmail.com', '$2y$10$r7wTvHInVW4/JhKe7l66/u.zFM1Yqbwk0mhdWB4Ku0/X2eVA6j0MG'),
(20, 'cus_P9JnNiGylEAflm', 'Mohamedatni', 'Aya', '1 rue Tort ', 618888415, 'aya@gmail.com', '$2y$10$tu76oJQVVPrlMfXwFYMlMubNY.Fh94C/mfBSHlm6Eo4PhNN0ROblu');

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
(12, 1, 8, 1, 0),
(13, 1, 8, 1, 0),
(14, 1, 10, 10, 0),
(15, 1, 10, 4, 0),
(16, 1, 19, 2, 0),
(17, 1, 19, 4, 0),
(18, 3, 19, 4, 0),
(19, 2, 19, 4, 0),
(20, 1, 19, 4, 0),
(21, 3, 19, 5, 0),
(22, 2, 19, 3, 0),
(23, 1, 19, 8, 0),
(24, 2, 19, 10, 0),
(25, 2, 19, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `content` text NOT NULL,
  `id_client` int NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Commandes`
--
ALTER TABLE `Commandes`
  MODIFY `id_commande` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
