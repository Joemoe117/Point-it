-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2014 at 09:11 PM
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
CREATE DATABASE IF NOT EXISTS `point-it` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `point-it`;

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `point` int(11) NOT NULL,
  `profil` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE IF NOT EXISTS `point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `profil` int(11) NOT NULL,
  `texte` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`id`, `type`, `profil`, `texte`, `date`) VALUES
(1, 1, 1, 'Baptiste a créé ce magnifique site', '2014-04-13 21:10:03'),
(2, 1, 2, 'Thomas a aidé à créer ce magnifique site', '2014-04-13 21:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nom`, `password`, `image`) VALUES
(1, 'Baptiste', 'boutdumonde', 'http://localhost/Point-it/assets/images/profil.jpg'),
(2, 'Thomas', 'carrelage', 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/t1.0-1/c114.59.733.733/s160x160/522418_10200703773854067_2122395249_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_point`
--

CREATE TABLE IF NOT EXISTS `type_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `type_point`
--

INSERT INTO `type_point` (`id`, `nom`, `description`, `image`) VALUES
(1, 'Moustache', 'à remplir', ''),
(2, 'Vietnam', 'à remplir aussi =)', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
