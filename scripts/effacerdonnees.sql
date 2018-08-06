use moi;
DROP TABLE IF EXISTS `coups_ouverture`;
DROP TABLE IF EXISTS `coups_variantes`;
DROP TABLE IF EXISTS `lescoups`;
DROP TABLE IF EXISTS `ouverturepropose`;
DROP TABLE IF EXISTS `ouvertures`;
DROP TABLE IF EXISTS `ouverture_variantes`;
DROP TABLE IF EXISTS `types`;
DROP TABLE IF EXISTS `varianteproposee`;
DROP TABLE IF EXISTS `variantes`;

CREATE TABLE `lescoups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coup` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `ouvertureproposee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lecoup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `ouvertures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ouverture` varchar(50) NOT NULL,
  `id_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE `coups_ouverture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ouverture` int(11) NOT NULL,
  `id_coup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `ouverture_variantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ouverture` int(11) NOT NULL,
  `id_variante` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `coups_variantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_variante` int(11) NOT NULL,
  `id_coup` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `varianteproposee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lecoup` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `variantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variante` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'débuts ouverts'),
(2, 'débuts semi-ouverts'),
(3, 'débuts fermés'),
(4, 'débuts semi-fermés');
