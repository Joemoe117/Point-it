-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  pointitfrnpoul.mysql.db
-- Généré le :  Sam 09 Août 2014 à 11:10
-- Version du serveur :  5.1.73-1.1+squeeze+build0+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pointitfrnpoul`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_id` int(11) NOT NULL,
  `profil_id` int(11) NOT NULL,
  `com_texte` text NOT NULL,
  `com_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`com_id`),
  KEY `point_id` (`point_id`),
  KEY `profil_id` (`profil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`com_id`, `point_id`, `profil_id`, `com_texte`, `com_date`) VALUES
(1, 1, 4, 'C''est qui les papas ?', '2014-08-09 09:09:40');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `liste_points`
--
CREATE TABLE IF NOT EXISTS `liste_points` (
`profil_id` int(11)
,`point_id` int(11)
,`typept_id` int(11)
);
-- --------------------------------------------------------

--
-- Structure de la table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `point_id` int(11) NOT NULL AUTO_INCREMENT,
  `typept_id` int(11) NOT NULL,
  `profil_id_donne` int(11) NOT NULL,
  `point_description` text NOT NULL,
  `point_date_crea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `point_date_actualite` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `point_epique` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`point_id`),
  KEY `typept_id` (`typept_id`),
  KEY `profil_id_donne` (`profil_id_donne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `points`
--

INSERT INTO `points` (`point_id`, `typept_id`, `profil_id_donne`, `point_description`, `point_date_crea`, `point_date_actualite`, `point_epique`) VALUES
(1, 1, 4, 'Point moustache pour avoir recrée le site des points !', '2014-08-09 09:09:40', '2014-08-09 09:09:40', 1),
(2, 1, 4, 'Se faire draguer par un vieux de 50 ans alors que je suis déguisé en Vikikng à deux heures du matin', '2014-08-09 00:54:59', '0000-00-00 00:00:00', 0),
(3, 1, 4, 'Dark Thoumou au BDM 2012 devant Earth, Wind & Fire !', '2014-08-09 00:58:08', '0000-00-00 00:00:00', 0),
(4, 1, 4, 'Thomas se perd comme un gros raisin dans un champ après une soirée à Lannion et se réveille dans un champ avec des poneys', '2014-08-09 00:59:46', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE IF NOT EXISTS `profils` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_nom` varchar(30) NOT NULL,
  `profil_pass` varchar(255) NOT NULL,
  `profil_image` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`profil_id`),
  UNIQUE KEY `profil_nom` (`profil_nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `profils`
--

INSERT INTO `profils` (`profil_id`, `profil_nom`, `profil_pass`, `profil_image`) VALUES
(4, 'Baptiste', 'sha256:1000:yeUaSbzcjz7i+RErl3lVjADiXvGmPf3t:Tbxea8JAnB5T8O7OBYnMPIJkLdTjIRkZ', 'https://scontent-b-lhr.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/227430_10201120980213957_2029097382_n.jpg?oh=21c3d168fd31bd7c6dd374dbbcf0a080&oe=5480DF67'),
(5, 'Thomas', 'sha256:1000:LMbYnLmYiDU4JfraWN1dkYQb2z7CkcdI:V9TLDgcrDYZI1eJdCm/sTShds7Z1MsEE', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xaf1/v/t1.0-9/1931180_1066616782986_9603_n.jpg?oh=133208f5eef155d5e4ca45d79a402109&oe=547B6E18&__gda__=1415899945_f2ec3543f3a95a12407446aae63ae466');

-- --------------------------------------------------------

--
-- Structure de la table `recoit`
--

CREATE TABLE IF NOT EXISTS `recoit` (
  `point_id` int(11) NOT NULL DEFAULT '0',
  `profil_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`point_id`,`profil_id`),
  KEY `profil_id` (`profil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recoit`
--

INSERT INTO `recoit` (`point_id`, `profil_id`) VALUES
(1, 4),
(2, 4),
(1, 5),
(3, 5),
(4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `types_point`
--

CREATE TABLE IF NOT EXISTS `types_point` (
  `typept_id` int(11) NOT NULL AUTO_INCREMENT,
  `typept_nom` varchar(30) NOT NULL,
  `typept_description` text NOT NULL,
  `typept_image` varchar(255) DEFAULT NULL,
  `typept_success` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`typept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `types_point`
--

INSERT INTO `types_point` (`typept_id`, `typept_nom`, `typept_description`, `typept_image`, `typept_success`) VALUES
(1, 'Moustache', 'Quand tu fais un truc classe, tu mérites de gagner ce point', NULL, NULL),
(2, 'Vietnam', 'Que tu sois dégueulasse, à marré haute, à marrée basse, tu mérites ce point', NULL, NULL),
(3, 'Nazi', 'Quand tu fais des blagues limites comme Alan...', NULL, NULL),
(4, 'Princesse', 'C''est quand tu ne viens pas en soirée parce que tu as bu la semaine dernière...', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la vue `liste_points`
--
DROP TABLE IF EXISTS `liste_points`;

CREATE ALGORITHM=UNDEFINED DEFINER=`pointitfrnpoul`@`%` SQL SECURITY DEFINER VIEW `liste_points` AS select `recoit`.`profil_id` AS `profil_id`,`recoit`.`point_id` AS `point_id`,`points`.`typept_id` AS `typept_id` from (((`recoit` join `profils` on((`recoit`.`profil_id` = `profils`.`profil_id`))) join `points` on((`recoit`.`point_id` = `points`.`point_id`))) join `types_point` on((`points`.`typept_id` = `types_point`.`typept_id`))) order by `recoit`.`profil_id`;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`point_id`) REFERENCES `points` (`point_id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`profil_id`);

--
-- Contraintes pour la table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`typept_id`) REFERENCES `types_point` (`typept_id`),
  ADD CONSTRAINT `points_ibfk_2` FOREIGN KEY (`profil_id_donne`) REFERENCES `profils` (`profil_id`);

--
-- Contraintes pour la table `recoit`
--
ALTER TABLE `recoit`
  ADD CONSTRAINT `recoit_ibfk_1` FOREIGN KEY (`point_id`) REFERENCES `points` (`point_id`),
  ADD CONSTRAINT `recoit_ibfk_2` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`profil_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
