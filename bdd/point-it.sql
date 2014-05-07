-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2014 at 09:25 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=25 ;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`com_id`, `point_id`, `profil_id`, `com_texte`, `com_date`) VALUES
(1, 1, 5, 'T''as fumé un cactus ?', '2014-04-17 19:43:50'),
(2, 1, 2, 'T''es un champion champion', '2014-04-17 19:43:50'),
(3, 2, 2, 'Arrête c''était trop cool !', '2014-04-17 19:43:50'),
(4, 2, 1, 'T''as gâché plein de bières...', '2014-04-17 19:43:50'),
(5, 4, 3, 'batar !!', '2014-04-17 19:43:50');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`point_id`, `typept_id`, `profil_id_donne`, `point_description`, `point_date_crea`, `point_date_evenement`, `point_date_actualite`) VALUES
(1, 4, 1, 'Se perdre en campagne totalement raisin et reprendre conscience dans un champ de poneys.', '2014-05-07 20:34:29', '2014-03-19 23:00:00', '2014-05-07 18:34:29'),
(2, 1, 1, 'A fait de la soupe à la bière et a kiffé alors que c''était crade.', '2013-01-16 23:00:00', NULL, '2014-05-07 20:00:21'),
(3, 2, 3, 'Ne vient pas en soirée parce qu''il a déjà but il y a deux semaines', '2014-05-07 20:36:48', '2014-04-17 19:33:14', '2014-05-05 18:35:21'),
(4, 1, 2, 'Ont fait des choses.', '2014-05-07 20:36:44', NULL, '2014-05-06 18:34:06');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Dumping data for table `profils`
--

INSERT INTO `profils` (`profil_id`, `profil_nom`, `profil_pass`, `profil_image`) VALUES
(1, 'Thoumou', 'sha256:1000:FKxa25WQvdsdg4mwX3WVlPBlWUjj9PXK:dRLFPODs3W17GQS2abcTgVj3rm/5jhsA', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c114.59.733.733/s160x160/522418_10200703773854067_2122395249_n.jpg'),
(2, 'Baptiste', 'sha256:1000:8Kl6zY41RB9F//XdsKKQ+hV4FiRgL3qP:4Wz4y5dIOfonXN27hBOnseh549fS8mW5', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn2/t1.0-1/c0.0.160.160/p160x160/1471311_10202499053824936_1112516852_n.jpg'),
(3, 'Alan', 'sha256:1000:u4xbQO5Cr5aKdxtP+B73fmkzAf7g1dOC:aDvd33ogLFCdvmhrMC/Y0CaAa5LtjoZT', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/t1.0-1/c40.0.160.160/p160x160/1512637_10203039467293487_1302683863_n.jpg'),
(4, 'Bilou', 'sha256:1000:gGJ3hZt+xa8HCKvM5LiLB/6e+kOe1b/Q:/hAe03crrGavBK0neTNFNZkljtjgNYcx', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/t1.0-1/c7.0.160.160/p160x160/1469849_834512176565273_1993682422_n.jpg'),
(5, 'Vincent', 'sha256:1000:i2vp83jo8/gIhPzU+iKM3qLbKs1F7E4m:E7s+5/gsClVfY06xoojLAaKdbLpl2dpC', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/t1.0-1/c1.134.608.608/s160x160/421916_10200195443623105_1218810733_n.jpg'),
(6, 'Paul', 'sha256:1000:bsVVvvqMSQA5f6lpe+7NflK7srMxJht6:G91XmNMP3+hfSRpNC7TxyUIgH5uDvNda', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-frc3/t1.0-1/c8.0.160.160/p160x160/1779341_10201405039868973_1486349226_n.jpg');

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
(2, 2),
(4, 3),
(3, 4),
(4, 6);

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
(3, 'Oin oin', 'Comme les japonaises', NULL),
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
