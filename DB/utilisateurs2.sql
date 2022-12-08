-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 déc. 2022 à 13:08
-- Version du serveur : 10.6.5-MariaDB
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moduleconnexion`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs2`
--

DROP TABLE IF EXISTS `utilisateurs2`;
CREATE TABLE IF NOT EXISTS `utilisateurs2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs2`
--

INSERT INTO `utilisateurs2` (`id`, `login`, `prenom`, `nom`, `password`, `usertype`) VALUES
(1, 'kamalou', 'kamel', 'SARHIRI', '81dc9bdb52d04dc20036dbd8313ed055', 'ee11cbb19052e40b07aac0ca060c23ee'),
(4, 'Tom', 'Thomas', 'SPINEC', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
(5, 'nadiou', 'nadia', 'SARHIRI', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(6, 'kamkam', 'fdkjfdk', 'lcjfhfsdlj', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(9, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(8, 'sousou', 'sofyane', 'SARHIRI', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(10, 'nabilou', 'nabil', 'SARHIRI', '81dc9bdb52d04dc20036dbd8313ed055', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
