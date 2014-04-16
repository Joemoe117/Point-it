-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 16 Avril 2014 à 19:20
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `point-it`
--
CREATE DATABASE IF NOT EXISTS `point-it` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `point-it`;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `commentaire_id` int(11) NOT NULL AUTO_INCREMENT,
  `commentaire_point_id` int(11) NOT NULL,
  `commentaire_texte` text NOT NULL,
  `commentaire_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentaire_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_nom` varchar(64) NOT NULL,
  `profil_surnom` varchar(64) NOT NULL,
  `profil_password` varchar(256) NOT NULL,
  `profil_image` varchar(256) NOT NULL,
  PRIMARY KEY (`profil_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_point`
--

CREATE TABLE IF NOT EXISTS `type_point` (
  `type_point_id` int(11) NOT NULL,
  `type_point_type` varchar(100) NOT NULL,
  `type_point_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
