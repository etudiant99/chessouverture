-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 17 Juin 2018 à 10:59
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
-- Structure de la table `variantes`
--

CREATE TABLE IF NOT EXISTS `variantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variante` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Contenu de la table `variantes`
--

INSERT INTO `variantes` (`id`, `variante`) VALUES
(1, 'Défense Steinitz'),
(2, 'Défense berlinoise'),
(3, 'Défense Bird'),
(4, 'Défense Cordel'),
(5, 'Défense Cordel moderne'),
(6, 'Défense de gambit'),
(7, 'Échange'),
(8, 'Défense ouverte'),
(9, 'Alekhine'),
(10, 'Italienne'),
(11, 'Russe'),
(12, 'Défense fermée'),
(13, 'Prise 3. C x e5'),
(14, 'Avance 3. d2-d4 (Steinitz)'),
(15, 'Protection du pion R'),
(16, 'Max-Lange refusée'),
(17, 'Max-Lange acceptée'),
(18, 'I'),
(19, 'II'),
(20, 'Dragon accéléré'),
(21, 'Dragon semi-accéléré'),
(22, 'Système Rauser'),
(23, 'Système Paulsen'),
(24, 'Système Taimanov'),
(25, 'Système de Scheveningue'),
(26, 'Echange'),
(27, 'Avance'),
(28, 'Protection (Rubinstein)'),
(29, 'Protection (Burn)'),
(30, 'Protection (Steinitz)'),
(31, 'Protection (Nimzovitch)'),
(32, 'Protection (Marshall)'),
(33, 'Tarrasch (4. ...Dd8xd5)'),
(34, 'I'),
(35, 'II'),
(36, 'II A'),
(37, 'II B (fermée)'),
(38, 'C (contre-attaque sur e4)'),
(39, 'C1'),
(40, 'C2'),
(41, 'C3 (gambit de Gréco)'),
(42, 'I'),
(43, 'II'),
(44, 'I'),
(45, 'II'),
(46, 'Gambit nordique refusé'),
(47, 'Gambit Evans refusé'),
(48, 'A'),
(49, 'B'),
(50, 'I'),
(51, 'II (Mieses)'),
(52, 'III (classique)'),
(53, '3. Fc4'),
(54, 'Moderne'),
(55, 'Échange'),
(56, 'Panov I'),
(57, 'Panov II'),
(58, 'Avance I'),
(59, 'Avance II'),
(60, 'Avance III'),
(61, 'Avance III A'),
(62, 'Avance III B'),
(63, 'III B (Tartakover)'),
(64, 'III B (Nimzovitch) A'),
(67, 'III B (Nimzovitch) B'),
(68, 'Cavalier dame A'),
(69, 'Cavalier dame B'),
(70, 'A'),
(71, 'Anti-mérane (Stoltz)'),
(72, 'Anti-mérane (Najdorf)'),
(73, 'Anti-mérane (Taimanov)'),
(74, 'Semi-mérane (Tchigorine)'),
(75, 'Semi-mérane (Bogoljubov)'),
(76, 'A'),
(77, 'B'),
(78, 'Système anti-Colle'),
(80, 'Pression sur d4'),
(81, 'Fianchetto accéléré'),
(82, 'Classique'),
(83, 'De gambit'),
(84, 'Protection de c4  A'),
(85, 'Protection de c4  B'),
(86, 'Sacifice provisoire de c4'),
(87, 'Refusé (sortie 4. ..., Ff5)'),
(88, 'Refusé (sortie 4. ..., g6)'),
(89, 'Gambit slave accepté'),
(90, 'Gambit'),
(91, 'Échange (symétrique)'),
(92, 'Échange (non symétrique)'),
(93, 'Gambit Tarrasch'),
(94, 'Variante de Prague'),
(95, 'Semi-classique'),
(96, '7. Dc2'),
(97, 'Échange'),
(98, '5. Cf3'),
(99, 'Cf3 (échange)'),
(100, 'Cf3 (fermeture du centre)'),
(101, 'Cf3 (attente)'),
(102, 'Système Samisch'),
(103, 'Samisch (stabilisation)'),
(104, 'Samisch (fermeture)'),
(105, 'Samisch (tension)'),
(106, 'Contre-fianchetto'),
(107, 'Variante fermée'),
(108, 'Samisch'),
(109, 'Échange'),
(110, 'Tarrasch (4. ...e6xd5)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
