-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2014 at 10:54 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `point-it`
--
CREATE DATABASE IF NOT EXISTS `point-it` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `point-it`;

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_id` int(11) NOT NULL,
  `profil_id` int(11) NOT NULL,
  `com_texte` text COLLATE utf8_bin NOT NULL,
  `com_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`com_id`),
  KEY `point_id` (`point_id`),
  KEY `profil_id` (`profil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=31 ;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`com_id`, `point_id`, `profil_id`, `com_texte`, `com_date`) VALUES
(1, 1, 5, 'T''as fumé un cactus ?', '2014-04-17 19:43:50'),
(2, 1, 2, 'T''es un champion champion', '2014-04-17 19:43:50'),
(3, 2, 2, 'Arrête c''était trop cool !', '2014-04-17 19:43:50'),
(4, 2, 1, 'T''as gâché plein de bières...', '2014-04-17 19:43:50'),
(5, 4, 3, 'batar !!', '2014-04-17 19:43:50'),
(25, 6, 2, 'Vous formez une belle bande de tocard quand même !', '2014-05-07 22:14:21'),
(26, 5, 2, 'Grenaaaaaaaaaaaade !', '2014-05-07 22:14:44'),
(27, 7, 2, 'Et qui casse son téléphone en plus !', '2014-05-07 22:16:12'),
(28, 4, 2, 'Vous êtes meugnon ♥', '2014-05-07 22:16:35'),
(29, 3, 2, 'Et il recommence ce soir !  ( mercredi )\r\n" non, mais ce soir je sors pas, on doit déjà sortir samedi" ', '2014-05-07 22:17:17'),
(30, 11, 2, '"Mais non, c''est la faute des médicaments"', '2014-05-07 22:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE IF NOT EXISTS `points` (
  `point_id` int(11) NOT NULL AUTO_INCREMENT,
  `typept_id` int(11) NOT NULL,
  `profil_id_donne` int(11) NOT NULL,
  `point_description` text COLLATE utf8_bin NOT NULL,
  `point_date_crea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `point_date_evenement` timestamp NULL DEFAULT NULL,
  `point_date_actualite` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`point_id`),
  KEY `typept_id` (`typept_id`),
  KEY `profil_id_donne` (`profil_id_donne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`point_id`, `typept_id`, `profil_id_donne`, `point_description`, `point_date_crea`, `point_date_evenement`, `point_date_actualite`) VALUES
(1, 4, 1, 'Se perdre en campagne totalement raisin et reprendre conscience dans un champ de poneys.', '2014-05-07 20:34:29', '2014-03-19 23:00:00', '2014-05-07 18:34:29'),
(2, 1, 1, 'A fait de la soupe à la bière et a kiffé alors que c''était crade.', '2013-01-16 23:00:00', NULL, '2014-05-07 20:00:21'),
(3, 3, 3, 'Ne vient pas en soirée parce qu''il a déjà but il y a deux semaines', '2014-05-07 22:35:33', '2014-04-17 19:33:14', '2014-05-07 20:17:17'),
(4, 1, 2, 'Ont fait des choses.', '2014-05-07 22:16:35', NULL, '2014-05-07 20:16:35'),
(5, 1, 2, 'Grenaaaaaaade !', '2014-05-07 22:14:44', NULL, '2014-05-07 20:14:44'),
(6, 4, 2, 'Dégrisement à Brest ! La honte !', '2014-05-07 22:14:21', NULL, '2014-05-07 20:14:21'),
(7, 1, 2, 'Dark Thoumou en soirée qui lance des limaces dans sa propre maison et qui prend 5 minutes à sortir d''une haie alors qu''il est tombé dedans tout seul !', '2014-05-07 22:16:12', NULL, '2014-05-07 20:16:12'),
(8, 1, 2, 'Recevoir une proposition de viol d''un vieux de 50ans alors que t''es déguisé en Viking, c''est fucking freaky !', '2014-05-07 22:26:30', NULL, '2014-05-07 22:26:30'),
(9, 4, 2, 'Thomas au concert d''Earth Wind & Fire, un moment plutôt magique', '2014-05-07 22:36:18', NULL, '2014-05-07 22:36:18'),
(10, 1, 2, 'La création du Point Vietnam au Vieilles Charrues, ou comment se faire détester par ses voisins', '2014-05-07 22:41:37', NULL, '2014-05-07 22:41:37'),
(11, 2, 2, 'Ne sait pas boire au nouvel an', '2014-05-07 22:43:42', NULL, '2014-05-07 20:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `profils`
--

CREATE TABLE IF NOT EXISTS `profils` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `profil_pass` varchar(255) COLLATE utf8_bin NOT NULL,
  `profil_image` varchar(255) COLLATE utf8_bin DEFAULT 'http://www.air-cosmos.com/img/unknown-avatar.png',
  PRIMARY KEY (`profil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

--
-- Dumping data for table `profils`
--

INSERT INTO `profils` (`profil_id`, `profil_nom`, `profil_pass`, `profil_image`) VALUES
(1, 'Thoumou', 'sha256:1000:FKxa25WQvdsdg4mwX3WVlPBlWUjj9PXK:dRLFPODs3W17GQS2abcTgVj3rm/5jhsA', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c114.59.733.733/s160x160/522418_10200703773854067_2122395249_n.jpg'),
(2, 'Baptiste', 'sha256:1000:8Kl6zY41RB9F//XdsKKQ+hV4FiRgL3qP:4Wz4y5dIOfonXN27hBOnseh549fS8mW5', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn2/t1.0-1/c0.0.160.160/p160x160/1471311_10202499053824936_1112516852_n.jpg'),
(3, 'Alan', 'sha256:1000:u4xbQO5Cr5aKdxtP+B73fmkzAf7g1dOC:aDvd33ogLFCdvmhrMC/Y0CaAa5LtjoZT', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/t1.0-1/c40.0.160.160/p160x160/1512637_10203039467293487_1302683863_n.jpg'),
(4, 'Bilou', 'sha256:1000:gGJ3hZt+xa8HCKvM5LiLB/6e+kOe1b/Q:/hAe03crrGavBK0neTNFNZkljtjgNYcx', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/t1.0-1/c7.0.160.160/p160x160/1469849_834512176565273_1993682422_n.jpg'),
(5, 'Vincent', 'sha256:1000:i2vp83jo8/gIhPzU+iKM3qLbKs1F7E4m:E7s+5/gsClVfY06xoojLAaKdbLpl2dpC', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/t1.0-1/c1.134.608.608/s160x160/421916_10200195443623105_1218810733_n.jpg'),
(6, 'Paul', 'sha256:1000:bsVVvvqMSQA5f6lpe+7NflK7srMxJht6:G91XmNMP3+hfSRpNC7TxyUIgH5uDvNda', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc3/t1.0-1/c8.0.160.160/p160x160/1779341_10201405039868973_1486349226_n.jpg'),
(7, 'Joséphine', 'sha256:1000:VXvpDMfRbcXnyNsCw5w/8xMjLvcyQMg5:3FuwUC39BRESHomKKnUZO7eG6PsK8ly8', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c0.0.160.160/p160x160/1010406_10203343290290047_707070944_n.jpg'),
(8, 'Colin', 'sha256:1000:2sv1TOZqnQCasUtejGPW0jZPlg7zo4zj:4k8abgBZgJI6UFekHUZe0CUQ9YME/u+W', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn2/t1.0-1/c1.0.520.520/s160x160/1375839_10202182328709402_1948752618_n.jpg'),
(9, 'Romain', 'sha256:1000:i4fakeutbzN+nMpZ20PCyUa03l4WpdV9:PAIlBfw8MxLozew6eBM6wL/d5DRnNvLu', 'https://scontent-a-cdg.xx.fbcdn.net/hphotos-frc3/v/t1.0-9/p526x296/1463201_10201085111990976_1474023803_n.jpg?oh=848ed8dff7554db9ee4bf28db0bb15d8&oe=53DD9FFD'),
(10, 'Camille', 'sha256:1000:X4qMU0JkEZiH1X8JZ6abHClxpx5AnbRT:miprlkDkiqOO+it/IEyC4hXEQoALRJH4', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-ash4/t1.0-9/1505406_10203745490345555_3691328165633938406_n.jpg'),
(11, 'Le Cloarec', 'sha256:1000:hzHWF/ypP6x3zfR/z4AM3s5HheLLZVlC:o4vBWXeiqqXLLcTNhml5KGFHa5TRHNz5', 'https://scontent-b-cdg.xx.fbcdn.net/hphotos-prn2/t1.0-9/1175662_10202067449831084_2073325399_n.jpg'),
(12, 'Nikita', 'sha256:1000:88wdaoXDT8AMATBiokiK/CGURzh07QQh:jUiQFuCu45XzMgQ6EYYQmwtRz0SFuelE', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-frc1/t1.0-9/3380_4464455650897_1114377766_n.jpg'),
(13, 'Charlotte', 'sha256:1000:HbriWMMZtCH988LzZwCYfqQBK9dCIhdG:ypmxKw9+AUyIQ3xpgcv3l9XQ1OsqKgWU', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c0.74.160.160/p160x160/1976894_10152353652529415_534134657_n.jpg'),
(14, 'Solène', 'sha256:1000:YLzOYJFjYhwhqapeaEq/TLTPiGKV5jLJ:y45JdjDVQPauwwrgkzWBExBtmbByPNg9', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc3/t1.0-1/c62.0.160.160/p160x160/1560398_10203063824745398_125008659_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recoit`
--

CREATE TABLE IF NOT EXISTS `recoit` (
  `point_id` int(11) NOT NULL DEFAULT '0',
  `profil_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`point_id`,`profil_id`),
  KEY `profil_id` (`profil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `recoit`
--

INSERT INTO `recoit` (`point_id`, `profil_id`) VALUES
(1, 1),
(7, 1),
(9, 1),
(2, 2),
(8, 2),
(4, 3),
(6, 3),
(3, 4),
(4, 6),
(6, 6),
(5, 9),
(11, 9),
(10, 13);

-- --------------------------------------------------------

--
-- Table structure for table `types_point`
--

CREATE TABLE IF NOT EXISTS `types_point` (
  `typept_id` int(11) NOT NULL AUTO_INCREMENT,
  `typept_nom` varchar(30) COLLATE utf8_bin NOT NULL,
  `typept_description` text COLLATE utf8_bin NOT NULL,
  `typept_image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`typept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `types_point`
--

INSERT INTO `types_point` (`typept_id`, `typept_nom`, `typept_description`, `typept_image`) VALUES
(1, 'Viêt Nam', 'La guerre c''est moche... Les points Viêt Nam aussi.', NULL),
(2, 'Princesse', 'À ceux qui font leur précieuse, vous avez été entendu.', NULL),
(3, 'Ouin-Ouin', 'Comme les japonaises', NULL),
(4, 'Moustache', 'Parce que c''est classe !', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_ibfk_1` FOREIGN KEY (`point_id`) REFERENCES `points` (`point_id`),
  ADD CONSTRAINT `commentaires_ibfk_2` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`profil_id`);

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points_ibfk_1` FOREIGN KEY (`typept_id`) REFERENCES `types_point` (`typept_id`),
  ADD CONSTRAINT `points_ibfk_2` FOREIGN KEY (`profil_id_donne`) REFERENCES `profils` (`profil_id`);

--
-- Constraints for table `recoit`
--
ALTER TABLE `recoit`
  ADD CONSTRAINT `recoit_ibfk_1` FOREIGN KEY (`point_id`) REFERENCES `points` (`point_id`),
  ADD CONSTRAINT `recoit_ibfk_2` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`profil_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
