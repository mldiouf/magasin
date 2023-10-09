-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 oct. 2023 à 11:34
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_article` varchar(50) NOT NULL,
  `categorie` varchar(250) NOT NULL,
  `quantite` int NOT NULL,
  `prix_unitaire` int NOT NULL,
  `date_fabrication` datetime NOT NULL,
  `date_expiration` datetime NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `nom_article`, `categorie`, `quantite`, `prix_unitaire`, `date_fabrication`, `date_expiration`, `images`) VALUES
(1, 'HP', 'Ordinateur', 7, 200000, '2022-09-15 22:32:00', '2022-09-18 19:36:00', NULL),
(2, 'Imprimante scanner', 'Imprimante', 3, 50000, '2022-09-09 20:41:00', '2022-10-02 19:47:00', NULL),
(4, 'souris', 'Accessoire', 5, 6000, '2022-09-16 19:58:00', '2022-09-16 19:02:00', NULL),
(10, 'Souris dell', 'Accessoire', 6, 2000, '2023-04-06 15:07:00', '2024-01-31 19:04:00', NULL),
(11, 'casque', 'Accessoire', 5, 2500, '2023-09-05 13:30:00', '2023-11-12 19:30:00', NULL),
(12, 'clavier', 'Ordinateur', 3, 1800, '2023-09-14 17:59:00', '2023-09-26 19:59:00', NULL),
(13, 'Ordinateur mini Acer', 'Ordinateur', 3, 175000, '2023-09-21 19:34:00', '2023-11-24 02:34:00', NULL),
(14, 'chargeur hp', 'Ordinateur', 4, 12000, '2023-08-31 15:55:00', '2023-10-08 21:55:00', NULL),
(15, 'Iphone 15', 'Accessoire', 2, 299900, '2023-09-02 13:01:00', '2023-09-29 13:01:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `telephone`, `adresse`) VALUES
(1, 'Seck', 'Abdou', '+22798960382', 'Tivaouane - Thies - Sénégal'),
(2, 'Faye', 'Modou', '+22177895434', 'Senegal pikine'),
(3, 'Diouf', 'Mamadou', '773966943', 'Pikine'),
(4, 'Nabou', 'Diop', '77 3966954', 'Thiaroye sur mer');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'mldiouf', 'mldiouf255@gmail.com', 'Mamadou@1995'),
(2, 'oumou', 'mldiouf255@gmail.com', '123456'),
(3, 'lamine', 'passer@live.sn', 'passer'),
(4, 'mldiouf', 'mldiouf500@gmail.com', '123456'),
(5, 'awa', 'awa@awa.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_article` int NOT NULL,
  `id_client` int NOT NULL,
  `quantite` int NOT NULL,
  `prix` int NOT NULL,
  `date_vente` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_article` (`id_article`),
  KEY `id_client` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id`, `id_article`, `id_client`, `quantite`, `prix`, `date_vente`, `etat`) VALUES
(19, 12, 1, 1, 1800, '2023-10-03 16:39:29', '0'),
(20, 1, 1, 1, 200000, '2023-10-03 16:50:24', '0'),
(21, 1, 3, 1, 200000, '2023-10-09 10:09:58', '1'),
(22, 13, 1, 2, 350000, '2023-10-09 10:16:15', '1');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `vente_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `vente_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
