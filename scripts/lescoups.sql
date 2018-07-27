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
-- Structure de la table `lescoups`
--

CREATE TABLE IF NOT EXISTS `lescoups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coup` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=607 ;

--
-- Contenu de la table `lescoups`
--

INSERT INTO `lescoups` (`id`, `coup`) VALUES
(3, 'e2-e4 e7-e6'),
(4, 'd2-d4 d7-d5'),
(5, 'e4-e5 c7-c5'),
(6, 'e2-e4 e7-e5'),
(7, 'Ff1-b5'),
(8, 'Fa4 Cf6'),
(9, 'De2 Fc5'),
(10, 'Cb1-c3 Cg8-f6'),
(11, 'f2-f4 d7-d5'),
(12, 'd2-d4'),
(13, 'Cg1-f3 Cb8-c6'),
(14, 'Ff1-b5 Cg8-f6'),
(15, 'Cb1-c3 Ff8-b4'),
(16, 'd2-d4 e5xd4'),
(17, 'Cf3xd4 Fg7'),
(18, 'Fe3 Cf6'),
(21, 'Ff1-c4 Ff8-c5'),
(22, 'b2-b4'),
(23, 'e2-e4 d7-d6'),
(25, 'f2-f4 Fg7'),
(26, 'Cf3 O-O'),
(27, 'e2-e4 c7-c5'),
(28, 'd2-d4 c5xd4'),
(29, 'Cf3xd4'),
(31, 'c2-c4 d5xc4'),
(33, 'c2-c4 e7-e6'),
(35, 'e2-e3 0-0'),
(36, 'Fd3 c7-c5'),
(37, '0-0 Fb4xc3'),
(38, 'b2xc3 d7-d6'),
(39, 'Cf3-d2 b7-b6'),
(40, 'Cd2-b3 e6-e5'),
(41, 'f2-f4 e5-e4'),
(42, 'e2-e4 c7-c6'),
(43, 'Cc3 d5xe4'),
(45, 'c2-c4 Cf6'),
(47, 'Cf3 b7-b6'),
(48, 'e2-e4'),
(50, 'Ff1-c4 Cg8-f6'),
(51, '0-0 Ff8-c5'),
(52, 'e4-e5'),
(53, 'Cg1-f3 Cg8-f6'),
(54, 'Cg1-f3 d7-d6'),
(55, 'Dd1xd4 Cb8-c6'),
(56, 'Dd4-e3 Cg8-f6'),
(57, 'Cb1-c3 Ff8-b4'),
(58, 'Fc1-d2 0-0'),
(59, '0-0-0 Tf8-e8'),
(60, 'Ff1-c4 d7-d6'),
(61, 'c2-c3 d4xc3'),
(62, 'Ff1-c4 c3xb2'),
(63, 'Fc1xb2'),
(64, 'f2-f4 e5xf4'),
(65, 'b2-b4 Fc5xb4'),
(66, 'c2-c3 Fb4-a5'),
(67, 'd2-d4 d7-d6'),
(68, 'Dd1-b3 Dd8-d7'),
(69, 'd4xe5 Fa5-b6'),
(70, 'e5xd6'),
(71, 'Cb1-c3 Cg8-f6'),
(72, 'Ff1-b5 Cc6-d4'),
(73, 'Cc3-d5 Cg8-f6'),
(74, 'Ff1-c4'),
(75, 'Cf3xd4 Cg8-f6'),
(76, 'Ff1-c4 Ff8-e7'),
(77, 'h2-h3 Cg8-f6'),
(78, 'Cb1-c3 0-0'),
(79, '0-0'),
(80, 'e2-e4 Cg8-f6'),
(81, 'e4-e5 Cf6-d5'),
(82, 'Cg1-f3 Fc8-g4'),
(83, 'Ff1-e2 e7-e6'),
(84, '0-0 Ff8-e7'),
(85, 'c2-c4 Cd5-b6'),
(86, 'Fc1-e3 Cb8-c6'),
(87, 'e5xd6 c7xd6'),
(88, 'b2-b3 Fe7-f6'),
(89, 'a2-a3'),
(90, 'd2-d4 Cg8-f6'),
(91, 'Cb1-c3 g7-g6'),
(92, 'f2-f4 Ff8-g7'),
(93, 'Cg1-f3 0-0'),
(94, 'e2-e4 d7-d5'),
(95, 'e4xd5 Dd8xd5'),
(96, 'Cb1-c3 Dd5-a5'),
(97, 'h2-h3 Fg4xf3'),
(98, 'Dd1xf3 c7-c6'),
(99, 'Fc1-d2 Cb8-d7'),
(100, '0-0-0 e7-e6'),
(101, 'g2-g4'),
(102, 'e4xd5 Cg8-f6'),
(103, 'Ff1c4 Cg8-f6'),
(104, 'Cf3-g5 d7-d5'),
(105, 'e4xd5'),
(107, 'Fc1-g5 Ff8-e7'),
(108, 'Cg1-f3 h7-h6'),
(109, 'Fg5-h4 b7-b6'),
(110, 'c4xd5 Cf6xd5'),
(111, 'Fh4xe7 Dd8xe7'),
(112, 'Cc3xd5 e6xd5'),
(113, 'Ta1-c1 Fc8-e6'),
(114, 'Dd1-a4 c7-c5'),
(115, 'Da4-a3 Tf8-c8'),
(116, 'Ff1-e2 Cb8-d7'),
(117, '0-0 Rg8-f8'),
(118, 'd4xc5 b6xc5'),
(119, 'Tf1-d1'),
(120, 'Cb1-c3 c7-c5'),
(121, 'c4xd5 e6xd5'),
(122, 'Cb1-c3 c7-c6'),
(123, 'c2-c4 c7-c6'),
(124, 'Cb1-c3 e7-e6'),
(125, 'e2-e3 Cb8-d7'),
(126, 'c2-c4 Cg8-f6'),
(127, 'Cg1-f3 Fc8-f5'),
(128, 'Dd1-b3 Cb8-c6'),
(129, 'Cb1-d2 Cd5-b6'),
(130, 'e2-e4 Ff5-g6'),
(131, 'd4-d5 Cc6-b8'),
(132, 'e2-e3 e7-e6'),
(133, 'Ff1xc4 c7-c5'),
(134, '0-0 a7-a6'),
(135, 'Ff1-d3 d5xc4'),
(136, 'Fd3xc4 b7-b5'),
(137, 'Fc4-d3 Fc8-b7'),
(138, 'e3-e4 b5-b4'),
(139, 'Cc3-a5 c6-c5'),
(140, 'd4xc5 Dd8-a5'),
(141, '0-0 Ff8xc5'),
(142, 'Cb1-d2 c7-c5'),
(143, 'c2-c3'),
(144, 'c2-c4 g7-g6'),
(145, 'Cb1-c3 Ff8-g7'),
(146, 'Cb1-c3 d7-d5'),
(147, 'Cg1-f3 b7-b6'),
(148, 'Cg1-f3 d7-d5'),
(149, 'g2-g3'),
(150, 'Ff1-b5 d7-d6'),
(151, 'd2-d4 Fc8-d7'),
(152, 'Fb5-c6 Fd7xc6'),
(154, 'Dd1-d3 e5xd4'),
(155, 'Cf3xd4 Fc6-d7'),
(156, '0-0-0'),
(157, 'Cf3xd4 e5xd4'),
(158, '0-0 c7-c6'),
(159, 'Fb5-c4 Cg8-f6'),
(160, 'Dd1-e2 d7-d6'),
(161, 'Cb1xc3'),
(162, 'Ff1-b5 Ff8-c5'),
(164, '0-0 0-0'),
(165, 'd2-d4 Fc5-b6'),
(166, 'Fc1-g5 h7-h6'),
(167, 'c2-c3 Cg8-f6'),
(168, 'Ff1-b5 f7-f5'),
(169, 'd2-d3 f5xe4'),
(170, 'd3xe4 Cg8-f6'),
(171, '0-0 d7-d6'),
(172, 'Cb1-c3 Ff8-e7'),
(173, 'Dd1-d3'),
(174, 'Ff1-b5 a7-a6'),
(175, 'Fb5xc6 d7xc6'),
(176, 'Fb5-a4 Cg8-f6'),
(177, '0-0 Cf6xe4'),
(178, 'd2-d4 b7-b5'),
(179, 'Fa4-b3 d7-d5'),
(180, 'd4xe5 Fc8-e6'),
(181, 'c2-c3 Ff8-e7'),
(182, 'Cb1-d2 0-0'),
(183, 'Dd1-e2 Ce4-c5'),
(184, 'Cf3-d4 Cc5xb3'),
(185, 'Cd2xb3 Dd8-d7'),
(186, 'Cd4xc6 Dd7xc6'),
(187, 'e4-e5 Cf6-g4'),
(188, 'Fc1-f4 d7-d6'),
(189, 'e5xd6 Fc5xd6'),
(190, 'Ff4xd6 Dd8xd6'),
(191, 'Fc4-b5'),
(192, 'e4-e5 d7-d5'),
(193, 'e5xf6 d5xc4'),
(194, 'Tf1-e1 Fc8-e6'),
(195, 'Cf3-g5 Dd8-d5'),
(196, 'Cb1-c3 Dd5-f5'),
(197, 'Cc3-e4'),
(199, 'e4xd5 Cf6xd5'),
(200, '0-0 Fc8-e6'),
(201, 'Tf1-e1 Dd8-d7'),
(202, 'Cg5xf7 Re8xf7'),
(203, 'Dd1-f3 Rf7-g8'),
(204, 'Te1xe6'),
(205, 'e4xd5 Cc6-a5'),
(206, 'Cg1-f3 g7-g6'),
(207, 'd2-d4 Ff8-g7'),
(208, 'Cb1-c3'),
(209, 'Cf3xd4 g7-g6'),
(210, 'c2-c4 Ff8-g7'),
(211, 'Fc1-e3 Cg8-f6'),
(212, 'Cb1-c3 Cf6-g4'),
(213, 'Dd1xg4 Cc6xd4'),
(214, 'Dg4-d1 e7-e5'),
(215, 'Cc3-b5'),
(216, 'Fc1-e3 Ff8-g7'),
(217, 'f2-f3 0-0'),
(218, 'Dd1-d2 Cb8-c6'),
(219, 'Ff1-c4 Fc8-d7'),
(220, 'Fc4-b3 Dd8-a5'),
(221, '0-0-0 Tf8-c8'),
(222, 'Rc1-b1 Cc6-e5'),
(223, 'Cg1-f3 e7-e6'),
(224, 'Cb1-c3 d7-d6'),
(225, 'Ff1-e2 a7-a6'),
(226, '0-0 Cb8-d7'),
(227, 'f2-f4 b7-b5'),
(228, 'Fe2-f3 Fc8-b7'),
(229, 'e4-e5 Fb7xf3'),
(230, 'Cd4xf3 d6xe5'),
(231, 'f4xe5 Cf6-g4'),
(232, 'Dd1-e1 b5-b4'),
(233, 'Cf3xd4 e7-e6'),
(234, 'Cb1-c3 a7-a6'),
(235, 'Fc1-e3 Dd8-c7'),
(236, 'Ff1-e2'),
(237, 'Ff1-e2 Ff8-e7'),
(238, '0-0 Cb8-c6'),
(239, 'e4xd5 e6xd5'),
(240, 'Ff1-d3 Cb8-c6'),
(241, 'Cg1-e2 Ff8-d6'),
(242, 'Cb1-c3 Cg8-e7'),
(243, 'c2-c3 Cb8-c6'),
(244, 'Cg1-f3 Dd8-b6'),
(245, 'Ff1-e2 c5xd4'),
(246, 'c3xd4 Cg8-h6'),
(247, 'Cb1-c3 Ch6-f5'),
(248, 'Cc3-a4 Db6-a5'),
(249, 'Fc1-d2 Ff8-b4'),
(250, 'Fd2-c3 Fb4xc3'),
(251, 'Ca4xc3 Da5-b6'),
(252, 'Cb1-c3 d5xe4'),
(253, 'Cc3xe4 Cb8-d7'),
(254, 'Ce4xf6 Cd7xf6'),
(255, 'Ff1-d3 b7-b6'),
(256, 'Dd1-e2 Fc8-b7'),
(257, '0-0-0 0-0'),
(258, 'Fc1-g5 d5xe4'),
(259, 'Cc3xe4 Ff8-e7'),
(260, 'Fg5xf6 g7xf6'),
(261, 'Cg1-f3 f6-f5'),
(262, 'Ce4-c3 Fe7-f6'),
(263, 'Dd1-d2 c7-c5'),
(264, 'e4-e5 Cf6-d7'),
(265, 'f2-f4 c7-c5'),
(267, 'Fc1-e3 c5xd4'),
(268, 'Cf3xd4 Ff8-c5'),
(269, 'Dd1-d2 Cc6xd4'),
(270, 'Fe3xd4 Fc5xd4'),
(271, 'Dd2xd4 Dd8-b6'),
(272, 'Cc3-b5 Dd6xd4'),
(273, 'Cb5xd4'),
(274, 'd4xc5 d5-d4'),
(275, 'Ff1-b5 Cb8-c6'),
(276, 'Fb5xc6 b7xc6'),
(277, 'Cc3-e2 Ff8xc5'),
(278, 'Cg1-f3 Dd8-a5'),
(279, 'Fc1-d2 Da5-b6'),
(280, '0-0 a7-a5'),
(281, 'd2-d3 d7-d6'),
(282, 'Fg5xf6 Dd8xf6'),
(283, 'Cc3-d5 Df6-d8'),
(284, 'c2-c3 d7-d6'),
(285, 'c3xd4 Fc5-b6'),
(286, 'Fc1-e3 Fc8-g4'),
(287, 'Fc4-b3 0-0'),
(288, 'Dd1-d3 Tf8-e8'),
(289, 'c2-c3 Dd8-e7'),
(290, 'a2-a4 a7-a6'),
(291, 'Tf1-e1 0-0'),
(292, 'Fc4-b5 Cf6-e4'),
(293, 'c3xd4 Fc5-b4'),
(294, 'Fc1-d2 Fb4xd2'),
(295, 'Cb1xd2 d7-d5'),
(296, 'Dd1-b3 Cc6-e7'),
(297, 'Cb1-c3 Cf6xe4'),
(298, 'd4-d5 Fc3-f6'),
(299, 'Tf1-e1 Cc6-e7'),
(300, 'Te1xe4 d7-d6'),
(301, 'Fc1-g5 Ff6xg5'),
(302, 'Cf3xg5 0-0'),
(303, 'Cg5xh7 Rg8xh7'),
(304, 'Dd1-h5 Rh7-g8'),
(305, 'Te4-h4 f7-f5'),
(306, 'd2-d4 Cb8-d7'),
(307, 'Ff1-c4 c7-c6'),
(308, 'd4xe5 d6xe5'),
(309, 'Cf3-g5 Fe7xg5'),
(310, 'Dd1-h5 g7-g6'),
(311, 'Dh5xg5 Dd8xg5'),
(312, 'Fc1xg5'),
(313, 'd4xe5 Cf6xe4'),
(314, 'Cb1-d2 Ce4-c5'),
(315, 'Cd2-c4 d6-d5'),
(316, 'Fc1-g5 Dd8-d7'),
(318, 'Cc4-e3 c7-c6'),
(319, 'Cf3-d4 Ff8-e7'),
(320, 'Dd1-h5'),
(321, 'Cf3xe5 d7-d6'),
(322, 'Ce5-f3 Cf6xe4'),
(323, 'd2-d4 d6-d5'),
(324, 'e4-e5 Cf6-e4'),
(325, 'Dd1xd4 d7-d5'),
(326, 'e5xd6 Ce4xd6'),
(327, 'Fc1-g5 Cb8-c6'),
(328, 'c2-c3 d7-d5'),
(329, 'Cg1-f3 Cf6xd5'),
(330, 'Ff1-b5 Ff8-e7'),
(331, 'Ff1-c4 Ff8-e5'),
(332, 'b2-b4 Fc5-b6'),
(333, 'e4-e5 d4xc3'),
(334, 'e5xf6 Dd8xf6'),
(335, 'd2xc3 Df6-e5'),
(336, 'Cf3xe5 Dd8-e7'),
(337, 'f2-f4 Cd4xb5'),
(338, 'Cc3xb5 d7-d6'),
(339, 'Ce5-f3 De7xe4'),
(340, 'Re1-f2 Cf6-g4'),
(341, 'Rf2-g3 De4-g6'),
(342, 'Dd1-e2 Re8-d8'),
(343, 'Cd4xc6 b7xc6'),
(344, 'Ff1-d3 d7-d5'),
(345, 'e4xd5 c6xd5'),
(346, 'Fc1-g5 Fc8-e6'),
(347, 'Fc1-e3 Dd8-f6'),
(348, 'c2-c3 Cg8-e7'),
(349, 'Cd4-c2 Fc5xe3'),
(350, 'Cc2xe3 Df6-e5'),
(351, 'Dd1-f3'),
(352, 'f4xe5 Cf6xe4'),
(353, 'Cg1-f3 Ff8-e7'),
(354, 'd2-d4 0-0'),
(355, 'Ff1-d3 f7-f5'),
(356, 'e5xf6 Fe7xf6'),
(357, 'Ff1-c4 Cf6xe4'),
(358, 'Dd1-h5 Ce4-d6'),
(359, 'Dh5xe5'),
(360, 'Cb1-c3 Cd5xc3'),
(361, 'f2-f4 d6xe5'),
(362, 'f4xe5 Fc8-f5'),
(363, 'd2-d4 e7-e6'),
(364, 'c2-c3 Cg8--f6'),
(365, 'Fc1-f4 g7-g6'),
(366, 'h2-h3 Fc8-f5'),
(367, 'c4-c5 0-0'),
(368, 'b2-b4 a7-a5'),
(369, 'Cc3-a4 Cb8-d7'),
(370, 'a2-a3 a5xb4'),
(371, 'a3xb4 b6xc5'),
(372, 'b4xc5 e6-e5'),
(373, 'Cf3xe5 Fe7xc5'),
(374, '0-0 Cd7xe5'),
(375, 'd4xe5 Cf6-e4'),
(376, 'Dd1-b3 Ff8-g7'),
(377, 'c4xd5 0-0'),
(378, 'e4-e5 Fc8-f5'),
(379, 'Ff1-d3 Ff5xd3'),
(380, 'Dd1xd3 e7-e6'),
(381, 'Cb1-c3 Dd8-b6'),
(382, 'Cg1-e2 Db6-a6'),
(383, 'Ce2-f4 Da6xd3'),
(384, 'Cf4xd3 Cb8-d7'),
(385, 'h2-h4 h7-h5'),
(386, 'Cb1-c3 Cb8-d7'),
(387, 'c4xd5 c6xd5'),
(388, 'Ff1xc4 e7-e6'),
(389, 'Cg1-e2'),
(390, 'c2-c4 Fc8-f5'),
(391, 'Ce4-g3 ff5-g6'),
(392, 'h2-h4 h7-h6'),
(393, 'Cg1-f3 Cb8-d7'),
(394, 'h4-h5 Fg6-h7'),
(395, 'Ff1-d3 Fh7xd3'),
(396, 'Dd1xd3 Dd8-c7'),
(397, 'Fc1-d2 e7-e6'),
(398, 'Dd3-e2 Cg8-f6'),
(399, '0-0-0 0-0-0'),
(400, 'Cf3-e5 Cd7xe5'),
(401, 'd4xe5 Cf6-d7'),
(402, 'f2-f4'),
(403, 'Ce4xf6'),
(404, 'Ce4xf6 e7xf6'),
(405, 'Cg1-e2 0-0'),
(406, 'Fc4-b3 Tf8-e8'),
(407, 'Ce2-f4 Cd7-f8'),
(409, 'Ce4xf6 g7xg6'),
(410, 'c2-c4 Cb8-d7'),
(411, '0-0 Dd8-c7'),
(412, 'd4-d5'),
(413, 'Ce4xf6 g7xf6'),
(414, 'Cg1-e2 Fc8-g4'),
(415, 'Dd1-d3 Fg4xe2'),
(416, 'Ff1xe2 e7-e6'),
(417, '0-0 Ff8-d6'),
(418, 'Cb1-c3 d5xe4'),
(419, 'Ff1-c4 Fc8-f5'),
(420, 'Dd1-e2 e7-e6'),
(421, 'Ff1-c4 Cg8-g6'),
(422, 'Ce4-g5 e7-e6'),
(423, 'Dd1-e2 Cd7-b6'),
(424, 'Fc4-b3 h7-h6'),
(425, 'Cg5-f3 c6-c5'),
(426, 'Fc1-f4'),
(427, 'Fc4-d3 a7-a6'),
(428, 'e3-e4 c6-c5'),
(429, 'Dd1-c2 Ff8-d6'),
(430, 'e3-e4 d5xe4'),
(431, 'Cc3xe4 Cf6xe4'),
(432, 'Dc2xe4 e6-e5'),
(434, 'b2-b3 0-0'),
(435, 'Ff1-e2 e6-e5'),
(437, '0-0-0 e6-e5'),
(438, 'Cc3-b5 Fd6-b8'),
(439, 'd4xe5 Cd7xe5'),
(440, 'Fd2-c3 Dd8-e7'),
(441, 'Ff1-d3 Ff8-d6'),
(442, 'Fd3xe4 0-0'),
(443, 'Fe4-c2'),
(444, 'Ff1-d3 Ff8-e7'),
(445, 'b2-b3 b7-b6'),
(446, 'Fc1-b2 Fc8-b7'),
(447, 'Dd1-e2 Dd8-c7'),
(448, 'd4xc5 Fd6xc5'),
(449, 'e3-e4 Dd8-c7'),
(450, 'Dd1-e2 Cf6-g4'),
(451, 'c2-c3 Cb8-d7'),
(452, 'Cd2xe4 Cf6xe4'),
(453, 'Fd3xe4 Cd7-f6'),
(454, 'Fe4-c2 b7-b6'),
(455, 'e2-e3 Fc8-f5'),
(456, 'Ff1-d3 e7-e6'),
(457, 'Fd3xf5 e6xf5'),
(458, 'Dd1-d3 Dd8-c8'),
(459, 'b2-b3 Cb8-a6'),
(460, 'c2-c4 0-0'),
(461, 'Dd1-e2 Cb8-c6'),
(462, 'Cb1-c3 b7-b5'),
(463, 'Fc4-b3 Fc8-b7'),
(464, 'Tf1-d1 Dd8-c7'),
(465, 'd4-d5 e6xd5'),
(466, 'Cc3xd5 Cf6xd5'),
(467, 'Fb3xd5 Ff8-e7'),
(468, 'Dd1-e2 b7-b5'),
(469, 'Tf1-d1 Cb8-d7'),
(470, 'Cb1-c3 Dd8-b8'),
(471, 'd4-d5 Cf6xd5'),
(472, 'Cc3xd5 Fb7xd5'),
(473, 'Fb3xd5 e6xd5'),
(474, 'Td1xd5'),
(475, 'a2-a4 Cb8-c6'),
(476, 'Dd1-e2 Ff8-e7'),
(477, 'b2-b3 Fc8-d7'),
(478, 'Fc1-b2 Ta8-d8'),
(479, 'Fc4xd5 Fd7-g4'),
(480, 'e2-e4 b7-b5'),
(481, 'a2-a4 Cd5xc3'),
(482, 'b2xc3 Fc8-b7'),
(483, 'e5-e6'),
(484, 'e2-e3 f7-f6'),
(485, 'e2-e4 d5xe4'),
(486, 'Cc3xe4 Ff8-b4'),
(487, 'Fc1-d2 Dd8xd4'),
(488, 'Fd2xb4 Dd4xe4'),
(489, 'Cg1-f3 d5xc4'),
(490, 'a2-a4 Ff8-b4'),
(491, 'e2-e3 b7-b5'),
(492, 'Fc1-d2 a7-a5'),
(493, 'a4xb5 Fb4xc3'),
(494, 'Fd2xc3 c6xb5'),
(495, 'b2-b3 Fc8-b7'),
(496, 'd4-d5 Cg8-f6'),
(497, 'b3xc4 b5-b4'),
(498, 'Fc3xf6 Dd8xf6'),
(499, 'Dd1-a4'),
(502, 'Dd1-b3 Dd8-c7'),
(503, 'e2-e3 g7-g6'),
(504, 'Dd1-b3 0-0'),
(505, 'Fc1-d2 d5xc4'),
(506, 'Ff1xc4 Cb8-d7'),
(507, '0-0 Cd7-b6'),
(508, 'c2-c4 c7-c3'),
(509, 'Cb1-c3 d5xc4'),
(510, 'a2-a4 Fc8-f5'),
(511, 'Ff1xc4 Ff8-b4'),
(512, 'Dd1-e2 Cb8-d7'),
(513, 'e3-e4 Ff5-g6'),
(514, 'Fc4-d3 Fg6-h5'),
(515, 'Fc1-f4 Tf8-e8'),
(516, 'Cc3xd5 c6xd5'),
(517, 'De2-e3'),
(518, 'Cf3-g5 h7-h6'),
(519, 'Cg5-e4'),
(520, 'Fc1-f4 Fc8-f5'),
(521, 'Ff1-b5 Cf6-d7'),
(522, 'Fc1-f4 e7-e6'),
(523, 'e2-e3 Ff8-d6'),
(524, 'Ff4-g3 a7-a6'),
(525, 'Ff1-d3 Fd6xg3'),
(526, 'h2xg3 Dd8-d6'),
(527, 'Dd1-e2'),
(528, 'd4xc5 Cg8-f6'),
(529, 'Cf3-d2 Cf6-g4'),
(530, 'Cd2-b3 Cg4xe3'),
(531, 'f2xe3 Da5-d8'),
(532, 'Dd1xd5 Fc8-e6'),
(533, 'g2-g3 Cg8-f6'),
(534, 'Ff1-g2 Ff8-e7'),
(535, 'Ta1-c1 c5-c4'),
(536, 'e2-e3 Cb8-c6'),
(537, 'Ff1-d3 c5xd4'),
(538, 'e3xd4 Ff8-e7'),
(539, 'Ta1-c1 c7-c6'),
(540, 'Fd3xc4 Cf6-d5'),
(541, 'Fg5xe7 Dd8xe7'),
(542, '0-0 Cd5xc3'),
(543, 'Tc1xc3 e6-e5'),
(544, 'Dd1-c2 c2-c5'),
(545, 'd4xc5 Cd7xc5'),
(546, 'e2-e3 c7-c6'),
(547, 'Ff1-d3 Cb8-d7'),
(548, 'Dd1-c2 h7-h6'),
(549, 'Fg5-h4 0-0'),
(550, 'Cg1-f3 Tf8-e8'),
(551, '0-0 Cd7-f8'),
(552, 'Ta1-b1'),
(553, '0-0 e7-e5'),
(554, 'Tf1-e1 e5xd4'),
(555, 'Cf3xd4 Tf8-e8'),
(556, 'Fe2-f1 Cd7-c5'),
(557, 'f2-f3'),
(558, 'Fc1-e3 e7-e5'),
(559, 'Dd1xd8 Tf8xd8'),
(560, 'Cc3-d5 Cf6xd5'),
(561, 'c4xd5 c7-c6'),
(562, 'Ff1-c4 c6xd5'),
(563, 'Fc4xd5 Cb8-c6'),
(564, 'Ta1-d1 Cc6-d4'),
(565, 'd4-d5 Cf6-h5'),
(566, 'Dd1-d2 f7-f5'),
(567, 'Cg1-e2 c7-c6'),
(568, 'Dd1-d2 e5xd4'),
(569, 'Ce2xd4 d6-d5'),
(570, 'g2-g3 Fc8-b7'),
(571, 'Cb1-c3 Cf6-e4'),
(572, 'Dd1-c2 Ce4xc3'),
(573, 'Dc2xc3 f7-f5'),
(574, 'Cf3-e1'),
(575, 'e2-e3 Fc8-b7'),
(576, 'b2-b3 c7-c5'),
(577, 'Fc1-b2 d7-d5'),
(578, 'Cb1-c3 Cb8-c6'),
(579, 'Dd1-e2 c5xd4'),
(580, 'e3xd4 d5xc4'),
(581, 'b3xc4'),
(582, 'a2-a3 Fb4xc3'),
(583, 'b2xc3 c7-c5'),
(584, 'f2-f3 d7-d5'),
(585, 'Fc1-d2 Cb8-c6'),
(586, 'Ff1-d3 Cc6xd4'),
(587, 'c3xd4 e6-e5'),
(588, 'e2-e4 Cd5xc3'),
(589, 'Ff1-c4 Ff8-g7'),
(590, '0-0 c5xd4'),
(591, 'c3xd4 Cb8-c6'),
(592, 'f2-f3 Cc6-a5'),
(593, 'Fc4-d3 Fg4-e6'),
(594, 'Cg1-f3 c5xd4'),
(595, 'Ff1-c4 Dd5-d6'),
(596, '0-0 Cg8-f6'),
(597, 'Cd2-b3 Cb8-c6'),
(598, 'Tf1-e1 a7-a6'),
(599, 'a2-a4 Ff8-e7'),
(600, 'Cf3xd4 Cc6xd4'),
(601, 'Dd1xd4 Fc8-d7'),
(602, 'Fc1-f4 Dd6xd4'),
(603, 'Cb3xd4'),
(604, 'Ff1-b5 Ff8-d6'),
(605, '0-0 Cg8-e7'),
(606, 'Cd2-b3 Fc5-d6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
