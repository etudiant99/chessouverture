-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Juin 2018 à 15:52
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
-- Structure de la table `ouverture_variantes`
--

CREATE TABLE IF NOT EXISTS `ouverture_variantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ouverture` int(11) NOT NULL,
  `id_variante` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Contenu de la table `ouverture_variantes`
--

INSERT INTO `ouverture_variantes` (`id`, `id_ouverture`, `id_variante`) VALUES
(1, 5, 2),
(2, 5, 1),
(3, 5, 3),
(4, 5, 4),
(5, 5, 5),
(6, 5, 6),
(7, 5, 7),
(8, 5, 8),
(9, 20, 16),
(10, 20, 17),
(11, 19, 18),
(12, 19, 19),
(13, 1, 20),
(14, 1, 21),
(15, 1, 22),
(16, 1, 23),
(17, 1, 24),
(18, 1, 25),
(19, 2, 26),
(20, 2, 27),
(21, 2, 28),
(22, 2, 29),
(23, 2, 30),
(24, 2, 31),
(25, 2, 32),
(26, 2, 33),
(27, 17, 34),
(28, 17, 35),
(29, 17, 36),
(30, 17, 37),
(31, 17, 38),
(32, 17, 39),
(33, 17, 40),
(34, 17, 41),
(35, 23, 42),
(36, 23, 43),
(37, 22, 44),
(38, 22, 45),
(39, 25, 46),
(40, 9, 47),
(41, 16, 48),
(42, 16, 49),
(43, 21, 50),
(44, 21, 51),
(45, 21, 52),
(46, 4, 53),
(47, 32, 54),
(48, 13, 55),
(49, 13, 56),
(50, 13, 57),
(51, 13, 58),
(52, 13, 59),
(53, 13, 60),
(54, 13, 61),
(55, 13, 62),
(56, 13, 63),
(57, 13, 64),
(58, 13, 67),
(59, 13, 68),
(60, 13, 69),
(61, 39, 70),
(62, 39, 71),
(63, 39, 72),
(64, 39, 73),
(65, 39, 74),
(66, 39, 75),
(67, 48, 76),
(68, 48, 77),
(69, 48, 78),
(71, 41, 80),
(72, 41, 81),
(73, 41, 82),
(74, 41, 83),
(75, 37, 84),
(76, 37, 85),
(77, 37, 86),
(78, 38, 87),
(79, 38, 88),
(80, 38, 89),
(81, 38, 90),
(82, 38, 91),
(83, 38, 92),
(84, 36, 93),
(85, 36, 94),
(86, 36, 95),
(87, 11, 96),
(88, 11, 97),
(89, 12, 98),
(90, 12, 99),
(91, 12, 100),
(92, 12, 101),
(93, 12, 102),
(94, 12, 103),
(95, 12, 104),
(96, 12, 105),
(97, 44, 106),
(98, 44, 107),
(99, 42, 108),
(100, 43, 109),
(101, 2, 110);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
