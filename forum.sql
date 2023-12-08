-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 28 oct. 2023 à 15:55
-- Version du serveur : 8.0.33
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id_sms` int NOT NULL AUTO_INCREMENT,
  `contenu_sms` text NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  PRIMARY KEY (`id_sms`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id_sms`, `contenu_sms`, `nom_user`) VALUES
(6, 'yo', 'justin'),
(7, 'yaa', 'Kameni'),
(8, 'maman', 'lolo beauté'),
(9, 'ya les merveilles', 'ingrid'),
(10, '50f', 'ingrid'),
(11, 'je veux deux maa', 'justin'),
(12, 'mince', 'justin'),
(13, 'tu dis a qui??', 'ingrid'),
(14, 'a toi nor ,chouagne', 'justin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(255) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `nom_user`, `pass_user`, `photo`) VALUES
(1, 'Kameni', '12345', 'facebook-blanc.png'),
(2, 'justin', 'justin12', 'facebook-blanc.png'),
(3, 'lolo beauté', 'lolo12', 'facebook-blanc.png'),
(4, 'ingrid', '123', 'facebook-blanc.png'),
(5, 'creature', 'crea', 'back1.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
