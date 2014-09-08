-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  pointitfrnpoul.mysql.db
-- Généré le :  Mar 12 Août 2014 à 20:31
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`com_id`, `point_id`, `profil_id`, `com_texte`, `com_date`) VALUES
(2, 1, 1, 'Lechage de maiiiiiiiiiiiiiiiiiiiiiiiiiiiin !', '2014-08-10 11:49:31'),
(3, 2, 8, 'Wo, ça va vite là', '2014-08-10 11:59:54'),
(4, 3, 5, 'Je suis sur que c''est mon très cher homonyme qui m''a laissé ce point !', '2014-08-10 19:22:22'),
(5, 3, 1, 'Je ne vois pas de qui tu parles =)', '2014-08-10 19:29:25'),
(6, 2, 1, 'C''est une drôle de façon de marquer son territoire quand même', '2014-08-11 17:16:21'),
(10, 4, 13, 'Et moi D:', '2014-08-11 21:38:24'),
(11, 3, 13, 'En attendant la fonction d''approbation, j''approuve ce point verbalement.', '2014-08-11 21:39:32'),
(12, 4, 1, 'Je te rajoute ce soir coloc', '2014-08-12 13:08:33');

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
  `point_date_actualite` timestamp NULL DEFAULT NULL,
  `point_epique` tinyint(1) NOT NULL DEFAULT '0',
  `point_date_evenement` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`point_id`),
  KEY `typept_id` (`typept_id`),
  KEY `profil_id_donne` (`profil_id_donne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `points`
--

INSERT INTO `points` (`point_id`, `typept_id`, `profil_id_donne`, `point_description`, `point_date_crea`, `point_date_actualite`, `point_epique`, `point_date_evenement`) VALUES
(1, 1, 2, 'Grenaaaaaaaaaaaaaaaaaaaaaaade !', '2014-08-10 11:49:31', '2014-08-10 11:49:31', 1, NULL),
(2, 2, 1, 'Vomir ses frites devant sa tente au BDM.', '2014-08-11 17:13:03', '2014-08-11 17:13:03', 0, NULL),
(3, 1, 1, 'Mixer le son d''un film porno ! La classe', '2014-08-11 21:39:32', '2014-08-11 21:39:32', 0, NULL),
(4, 1, 1, 'Meilleur ventragliss au monde sur la terrasse de Romain', '2014-08-12 13:08:33', '2014-08-12 13:08:33', 1, '2014-08-09 22:00:00'),
(5, 1, 1, 'Finir en dégrisement à Brest, faut quand même le faire quoi !', '2014-08-11 17:23:35', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE IF NOT EXISTS `profils` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_nom` varchar(30) NOT NULL,
  `profil_pass` varchar(255) NOT NULL,
  `profil_image` varchar(400) NOT NULL DEFAULT 'http://pointit.fr/assets/images/member.png',
  PRIMARY KEY (`profil_id`),
  UNIQUE KEY `profil_nom` (`profil_nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `profils`
--

INSERT INTO `profils` (`profil_id`, `profil_nom`, `profil_pass`, `profil_image`) VALUES
(1, 'Baptiste', 'sha256:1000:nIJl24NE8by0NHYCygVMsFlYnSO8f8mv:vOHfKrjq6Dv8mFRH0O5Dm+ttkxwtNPTB', 'http://pointit.fr/assets/images/avatars/1_Baptiste/origin.jpg'),
(2, 'Romain', 'sha256:1000:2YEfPQ6vl8Q81cZOVZBE89tLEulDelCL:3B6jUOdWVBRQnL3xbh1v4dBob4bXZD2J', 'http://www.heberger-image.fr/data/images/91016_1463201_10201085111990976_1474023803_n.jpg'),
(3, 'Alan', 'sha256:1000:mRa2i0Jot79rGG25+Anec6bBDdKjoSvq:kAMrw/+jkq7w0+u1jr2fXzDRaKojyt4m', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xpa1/t1.0-9/p417x417/60725_4795770578044_158236221_n.jpg'),
(4, 'Vincent', 'sha256:1000:Ee6gBtpS+qBqRHe8VatrAIit+0UOg3kz:bzR3l9MeoD2FNJiYP4Cl8lWew4ECi/r8', 'https://scontent-a-lhr.xx.fbcdn.net/hphotos-xap1/v/t1.0-9/40865_1596168906963_6266711_n.jpg?oh=66012030c41e06948dbfea74586f26f3&oe=547DA5B6'),
(5, 'B.I.Caban', 'sha256:1000:5OXo989v3nxfc7Np4UNi7ptfYb+9tQ/Y:RLA+naGK5Flxrva3Sfwyr9Ee4ztiUwBX', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xap1/t1.0-9/1780864_712949428725114_10107429_n.jpg'),
(6, 'Thoumou', 'sha256:1000:QBfd1c4qzhMh/JCTzkbA6H7cSByDpdKa:ks2W8nd9r3vA5sh8slxxqN8QNNVQ4mRu', 'http://pointit.fr/assets/images/avatars/6_Thoumou/origin.jpg'),
(7, 'PMO', 'sha256:1000:fowquNwJjyx5jHh9CujJ3HMpoK0hp35n:MGeQvW+N17Ko0HvWdIhmHbKkc9YS1lAS', 'http://pointit.fr/assets/images/member.png'),
(8, 'GotBal', 'sha256:1000:0jJDHXOQbriuRf2vy/6oVFzUcww0Q3CV:9hrcHi04c4RcBqFv7Czw3HqfPgvD/40k', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfa1/t1.0-1/c40.0.160.160/p160x160/1501750_10201654211530034_1044526030_n.jpg'),
(9, 'Lu7', 'sha256:1000:VSSYW6SdooIY114wDoxV3t2SI5iSQvhN:eNo3Gsi94+FK7v73u4Ga6sj9dmRoGyr+', 'http://pointit.fr/assets/images/member.png'),
(10, 'Youenn', 'sha256:1000:cgGVdywVigVRu47Du4dyq+c+CpOn929M:PuAhr0UA0qTPdLzQN16W94kjgWGncG+g', 'http://pointit.fr/assets/images/member.png'),
(11, 'Beuloon', 'sha256:1000:XeTuwx+a/cvfNWMcgDnt6JLlxKj1ZHUt:uyKc7zm+GydXFUnppEXT9NwSOO8vTH+b', 'http://pointit.fr/assets/images/member.png'),
(12, 'Bourou', 'sha256:1000:sn3pWac6UkXKiSwtlZBCQSOzUzhCv2yq:ZrtqcsuPuC6WFaEYafxzMShh4lMz7W3w', 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-xpa1/t1.0-9/p417x417/993475_10201191183882843_2106121312_n.jpg'),
(13, 'Colin', 'sha256:1000:M6u4lv7lX6fevQqfWeOdaLK7pQArNKm0:mID9FENh1DbvK4O4gXYXna+agK/Dmauk', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xpf1/t1.0-1/c1.0.520.520/s50x50/1375839_10202182328709402_1948752618_n.jpg'),
(14, 'Paprika', 'sha256:1000:oyh3Zp/6Ei/YNLTlxOTCjbfmq3jfQ7AQ:HNyoWBqmPmgXOf51xBm3EVwM5lEjLA/w', 'http://pointit.fr/assets/images/member.png'),
(15, 'Marine', 'sha256:1000:r9V59mvescHwY5u8/CubYAMNyIZhFzqv:ijR9+mPf41mMe93dXvdqeUtWBmVRc7kX', 'http://pointit.fr/assets/images/member.png'),
(16, 'Marcel', 'sha256:1000:7fW+om/1snD8a7Vh/FeQrot2Pwq9Swvm:bgX7s9U8cK54Sj0oF7oVGXcCEgeuhC/V', 'http://pointit.fr/assets/images/member.png'),
(17, 'Paul', 'sha256:1000:amKLc0irnqzM11TBEt4gH3uMozv3Jf/2:3R5fd0SsWU48dNypDhT/vxuqVLD6iuhC', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xaf1/t1.0-1/c2.0.50.50/p50x50/10401916_10202092960906569_853797424214182819_n.jpg'),
(18, 'Gwenael', 'sha256:1000:90JM90LxlRdalNR6vQtLOeVVzTI7Zoqm:sUw9Ls4iG3dFHxYCpB3cYdnk8PuiXhvl', 'http://pointit.fr/assets/images/avatars/18_Gwenael/origin.jpg'),
(19, 'Raoul', 'sha256:1000:Z2QXsC5Srjkyr3NcOvuf+wRAWNOGERiB:36AAnmN+8BrmCdSdIgXwpmd5QrxJj9wC', 'https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-xaf1/t1.0-9/394528_4416515460249_347034156_n.jpg'),
(22, 'Solène', 'sha256:1000:cavNwpdJ9wc1Q1zGDNnH0FlnFrX2hBHh:D9lK/Z4tKS3CKQ4gIfgWTAVLOqsdM/Q3', 'http://pointit.fr/assets/images/member.png');

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
(4, 1),
(1, 2),
(4, 3),
(5, 3),
(4, 4),
(3, 5),
(2, 8),
(4, 13),
(4, 17),
(5, 17),
(4, 19);

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
