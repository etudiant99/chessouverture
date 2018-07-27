-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Juin 2018 à 10:55
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ouvertures`
--

-- --------------------------------------------------------

--
-- Structure de la table `ouvertures`
--

CREATE TABLE IF NOT EXISTS `ouvertures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ouverture` varchar(50) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Contenu de la table `ouvertures`
--

INSERT INTO `ouvertures` (`id`, `ouverture`, `id_type`) VALUES
(1, 'Défense sicilienne', 2),
(2, 'Partie française', 2),
(4, 'Partie viennoise', 1),
(5, 'Partie espagnole', 1),
(6, 'Partie des trois cavaliers', 1),
(8, 'Défense Pirc', 2),
(9, 'Gambit Evans', 1),
(10, 'Gambit du roi', 1),
(11, 'Gambit de la dame orthodoxe', 3),
(12, 'Défense est-indienne', 4),
(13, 'Défense Caro-Kann', 2),
(16, 'Partie des quatre cavaliers', 1),
(17, 'Partie italienne', 1),
(18, 'Partie hongroise', 1),
(19, 'Défense des deux cavaliers', 1),
(20, 'Attaque Max-Lange', 1),
(21, 'Partie écossaise', 1),
(22, 'Défense russe', 1),
(23, 'Défense Philidor', 1),
(24, 'Gambit du centre', 1),
(25, 'Gambit du nord', 1),
(32, 'Défense Alekhine', 2),
(33, 'Défense scandinave', 2),
(34, 'Défense scandinave moderne', 2),
(35, 'Gambit de la dame néo-orthodoxe', 3),
(36, 'Défense Tarrasch classique', 3),
(37, 'Défense semi-slave', 3),
(38, 'Défense slave', 3),
(39, 'Défense de Méran', 3),
(40, 'Défense Marshall', 3),
(41, 'Gambit de la dame acceptée', 3),
(42, 'Défense Nimzovitch', 4),
(43, 'Défense Grunfeld', 4),
(44, 'Défense ouest-indienne', 4),
(47, 'Défense néo-mérane', 3),
(48, 'Système Colle', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
