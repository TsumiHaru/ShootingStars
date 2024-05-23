-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 mai 2024 à 13:36
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shootingstars`
--

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `ID` int NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_text` varchar(255) NOT NULL,
  `article_img1` varchar(255) NOT NULL,
  `article_img2` varchar(255) NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`ID`, `article_title`, `article_text`, `article_img1`, `article_img2`) VALUES
(1, 'The Constellation Aquila - Expedition', 'Explore any distant horizons! The Constellation Aquila features a redesigned cockpit for maximum visibility, advanced sensors and an onboard Ursa rover for planetary exploration. Let’s see what’s out there!\r\nDISCLAIMER: These are our current vehicle speci', '/ShootingStars/asset/img/aquila1.jpg', '/ShootingStars/asset/img/aquila2.jpg'),
(2, 'The Terrapin - Expedition', 'Explore any distant horizons! The Constellation Aquila features a redesigned cockpit for maximum visibility, advanced sensors and an onboard Ursa rover for planetary exploration. Let’s see what’s out there!\r\nDISCLAIMER: These are our current vehicle speci', '/ShootingStars/asset/img/terrapin1.jpg', '/ShootingStars/asset/img/terrapin2.jpg'),
(3, 'The Pledge X1 - Tourring', 'Explore any distant horizons! The Constellation Aquila features a redesigned cockpit for maximum visibility, advanced sensors and an onboard Ursa rover for planetary exploration. Let’s see what’s out there!\r\nDISCLAIMER: These are our current vehicle speci', '/ShootingStars/asset/img/pledge1.jpg', '/ShootingStars/asset/img/pledge2.jpg'),
(4, 'The 400i1 - Tourring', 'Explore any distant horizons! The Constellation Aquila features a redesigned cockpit for maximum visibility, advanced sensors and an onboard Ursa rover for planetary exploration. Let’s see what’s out there!\r\nDISCLAIMER: These are our current vehicle speci', '/ShootingStars/asset/img/400i2.jpg', '/ShootingStars/asset/img/400i1.jpg'),
(5, 'The 600i1 - Tourring', 'Explore any distant horizons! The Constellation Aquila features a redesigned cockpit for maximum visibility, advanced sensors and an onboard Ursa rover for planetary exploration. Let’s see what’s out there!\r\nDISCLAIMER: These are our current vehicle speci', '/ShootingStars/asset/img/600i1.jpg', '/ShootingStars/asset/img/600i1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` tinyint NOT NULL,
  `date_naissance` date NOT NULL,
  `date_creation` date NOT NULL,
  `date_connexion` date NOT NULL,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `nom`, `prenom`, `email`, `role`, `date_naissance`, `date_creation`, `date_connexion`) VALUES
(3, 'user', '$2y$10$yemc2qkdMndyYcrh43w8V.7FeUNr3A9odzg46iB9RPE', 'utili', 'Sateur', 'user@hotmail.com', 0, '6511-05-04', '0000-00-00', '0000-00-00'),
(2, 'admin', '$2y$10$oRr0nNJ0MX.j5Rat40MJ8uJn8QbdwWan8NZ8vFy9Ape', 'admin', 'istrateur', 'admin@hotmail.com', 0, '1111-11-11', '0000-00-00', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
