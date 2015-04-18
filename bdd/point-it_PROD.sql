-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  pointitfrnpoul.mysql.db
-- Généré le :  Mer 18 Mars 2015 à 19:10
-- Version du serveur :  5.1.73-2+squeeze+build1+1-log
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
-- Structure de la table `approuve`
--

CREATE TABLE IF NOT EXISTS `approuve` (
  `approuve_id` int(11) NOT NULL AUTO_INCREMENT,
  `point_id` int(11) NOT NULL,
  `profil_id` int(11) NOT NULL,
  PRIMARY KEY (`approuve_id`),
  KEY `point_id` (`point_id`),
  KEY `point_id_2` (`point_id`),
  KEY `point_id_3` (`point_id`),
  KEY `profil_id` (`profil_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Contenu de la table `approuve`
--

INSERT INTO `approuve` (`approuve_id`, `point_id`, `profil_id`) VALUES
(2, 10, 1),
(3, 6, 1),
(4, 11, 25),
(5, 7, 25),
(6, 5, 25),
(7, 5, 1),
(8, 9, 1),
(9, 3, 13),
(10, 9, 13),
(11, 4, 13),
(12, 11, 16),
(13, 11, 18),
(14, 3, 18),
(15, 10, 26),
(16, 7, 26),
(17, 5, 26),
(18, 3, 26),
(19, 8, 26),
(20, 9, 26),
(21, 11, 7),
(22, 5, 7),
(23, 6, 7),
(24, 3, 7),
(25, 1, 1),
(26, 3, 1),
(27, 4, 1),
(28, 11, 1),
(29, 12, 23),
(30, 1, 23),
(31, 3, 23),
(32, 12, 1),
(33, 13, 1),
(34, 12, 17),
(35, 14, 17),
(36, 10, 17),
(37, 13, 17),
(38, 1, 17),
(39, 2, 17),
(40, 5, 17),
(41, 6, 17),
(42, 14, 1),
(43, 8, 1),
(44, 9, 9),
(45, 5, 9),
(46, 11, 9),
(47, 12, 9),
(48, 14, 9),
(49, 14, 6),
(50, 15, 1),
(51, 13, 13),
(52, 16, 1),
(53, 17, 1),
(54, 20, 5),
(55, 14, 2),
(56, 20, 2),
(57, 16, 2),
(58, 21, 1),
(59, 22, 31),
(60, 21, 30),
(61, 25, 1),
(62, 10, 30),
(63, 12, 30),
(64, 11, 30),
(65, 5, 30),
(66, 8, 30),
(67, 6, 30),
(68, 6, 6),
(69, 5, 6),
(70, 12, 6),
(71, 25, 6),
(72, 20, 6),
(73, 17, 6),
(74, 9, 6),
(75, 4, 6),
(76, 2, 6),
(77, 14, 19),
(78, 12, 19),
(79, 23, 19),
(80, 25, 12),
(81, 23, 7),
(82, 20, 7),
(83, 25, 3),
(84, 12, 3),
(85, 14, 3),
(86, 4, 3),
(87, 23, 17),
(88, 26, 17),
(89, 17, 17),
(90, 14, 10),
(91, 12, 10),
(92, 9, 10),
(93, 11, 10),
(94, 10, 34),
(95, 10, 35);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

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
(12, 4, 1, 'Je te rajoute ce soir coloc', '2014-08-12 13:08:33'),
(13, 3, 1, 'Le système d''approbation est en cours mais ça va prendre une peu de temps', '2014-08-13 14:18:37'),
(14, 4, 23, 'Je veux !', '2014-08-15 17:28:19'),
(15, 3, 5, 'J''aurais aimé avoir un système d''approbation pour approuver l''avancement du système d''approbation.', '2014-08-19 21:15:20'),
(16, 8, 1, 'C''est pour ça que je t''aime mon coloc !', '2014-08-19 21:49:18'),
(17, 9, 1, 'C''est un point, mais c''est un bon point', '2014-08-26 22:45:22'),
(18, 4, 1, 'Pas de glissade sur le ventre, pas de point !', '2014-09-02 16:32:06'),
(19, 9, 13, 'Je lui aurais pas donné un point moustache pour ça. Il était cageot et il savait pas ce qu''il faisait >:C', '2014-09-08 22:29:29'),
(20, 3, 6, 'Maintenant tu peux le faire ! Et du coup ça a donné quoi comme musique ?', '2014-09-12 11:10:26'),
(21, 3, 1, 'Je veux voir ce film... je veux dire, écouter cette BO !', '2014-09-12 19:05:03'),
(22, 15, 1, 'Tocard a casquette', '2014-09-12 23:33:49'),
(23, 10, 13, '"foeutale"', '2014-09-13 18:23:55'),
(24, 10, 1, 'Je me demande qui est le con qui ne sait pas écrire ', '2014-09-17 15:24:15'),
(25, 9, 1, 'T''as pas besoin de te rendre compte que t''es swag pour être swag', '2014-09-17 15:25:03'),
(26, 13, 1, 'J''aurai pour toujours cette image dans ma tête', '2014-10-14 12:18:19'),
(27, 18, 2, 'Parce que genre j''étais pas là. pute!', '2014-12-14 20:40:18'),
(28, 18, 1, 'Bon ok je te rajoute sale bête', '2014-12-15 13:26:15'),
(29, 23, 1, 'Il fallait bien feter le diplome de Romain', '2014-12-15 13:46:08'),
(30, 17, 6, 'C''est Orléans, ça m''a changé !', '2014-12-20 15:08:23'),
(31, 26, 17, 'Ca ressemble plus à un point mou ou princesse ça', '2014-12-24 12:45:37'),
(32, 26, 2, 'Putes', '2014-12-24 15:24:52'),
(33, 23, 2, 'Faudra penser à le refêter', '2014-12-24 16:48:38'),
(34, 11, 6, 'Oui ! =)', '2015-02-10 01:02:33');

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
  `point_date_crea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `point_date_actualite` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `point_epique` tinyint(1) NOT NULL DEFAULT '0',
  `point_date_evenement` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`point_id`),
  KEY `typept_id` (`typept_id`),
  KEY `profil_id_donne` (`profil_id_donne`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `points`
--

INSERT INTO `points` (`point_id`, `typept_id`, `profil_id_donne`, `point_description`, `point_date_crea`, `point_date_actualite`, `point_epique`, `point_date_evenement`) VALUES
(1, 1, 2, 'Grenaaaaaaaaaaaaaaaaaaaaaaade !', '2014-08-10 11:49:31', '2014-08-10 11:49:31', 1, NULL),
(2, 2, 1, 'Vomir ses frites devant sa tente au BDM.', '2014-12-20 15:10:18', '2014-12-20 15:10:18', 0, NULL),
(3, 1, 1, 'Mixer le son d''un film porno ! La classe', '2014-09-12 19:05:03', '2014-09-12 19:05:03', 0, NULL),
(4, 1, 1, 'Meilleur ventragliss au monde sur la terrasse de Romain', '2014-12-24 12:42:28', '2014-12-24 12:42:28', 1, '2014-08-09 22:00:00'),
(5, 1, 1, 'Finir en dégrisement à Brest, faut quand même le faire quoi !', '2014-12-20 15:06:05', '2014-12-20 15:06:05', 1, NULL),
(6, 4, 1, 'Un samedi soir :<br />\nBaptiste : Bilou, tu viens ce soir, c''est Kergariou, ça va être grosse soirée !<br />\nBilou : Nan, je sors pas, j''ai déjà pris une cuite le week end dernier', '2014-12-20 15:05:58', '2014-12-20 15:05:58', 0, NULL),
(7, 3, 2, '- 2h avant Afrikobendy - <br />\n<br />\n-Baptiste, c''est pour faire quoi les gateaux apéro?<br />\n-Pour le donner aux singes à Afrikobendy!', '2014-09-11 21:24:01', '2014-08-19 11:00:47', 0, NULL),
(8, 3, 2, '"Je suis sûr qu''il existe une vente de nains nazis qui tendent le bras ou bien qui se promènent avec une brouette de juifs"', '2014-12-19 14:08:26', '2014-12-19 14:08:26', 0, '2014-08-17 22:00:00'),
(9, 1, 6, 'C''est du carrelage, mais c''est du bon carrelage !', '2014-12-24 15:15:18', '2014-12-24 15:15:18', 1, '2013-07-13 22:00:00'),
(10, 2, 1, 'Dormir en position foétale devant un bar de nuit à Montpellier juste à coté de son vomi pendant que tout l monde cherche Alan depuis une demi-heure', '2014-12-29 13:07:22', '2014-12-29 13:07:22', 0, NULL),
(11, 1, 1, 'Parce que avoir créér Point-!t, ça mérite au moins un point moustache !', '2015-02-10 01:02:33', '2015-02-10 01:02:33', 1, NULL),
(12, 1, 1, 'Se réveiller dans un champ avec des poneys après la désintégration de Lannion', '2014-12-24 15:15:03', '2014-12-24 15:15:03', 1, NULL),
(13, 2, 1, 'Se mettre du Paprika sous les aisselles et se les lécher mutuellement ', '2014-10-14 12:18:19', '2014-10-14 12:18:19', 1, NULL),
(14, 1, 1, 'Se faire casser le bras au BDM, se faire emmener aux urgences à Brest avec absolument rien sur soi, et revenir en faisant la manche le jour même.', '2014-12-24 15:14:52', '2014-12-24 15:14:52', 0, NULL),
(15, 4, 1, 'Finir au SAMU au Bout Du monde à 18h30, c''est quand même vachement tata !', '2014-09-12 23:33:49', '2014-09-12 23:33:49', 0, NULL),
(16, 4, 1, '"Mais j''avais les oreilles sous l''eau"', '2014-12-14 20:39:57', '2014-12-14 20:39:57', 0, NULL),
(17, 2, 1, 'Thomas qui fait une soirée à la coloc, se vomit dessus et s''endort presque dans les toilettes', '2014-12-24 12:46:11', '2014-12-24 12:46:11', 1, NULL),
(18, 1, 1, 'Le gros Jean des Vieilles Charrues 2012', '2014-12-15 13:26:15', '2014-12-15 13:26:15', 0, NULL),
(19, 2, 1, 'Exploration anale des fesses de Vincent par l''Allemagne', '2014-11-08 13:27:52', '2014-11-08 13:27:33', 0, NULL),
(20, 1, 1, 'les mangeurs de jambonneau, qui l''auront à peine fait tenir trois petites semaines alors qu''ils en annonçaient 8 sur la boite', '2014-12-24 11:49:32', '2014-12-24 11:49:32', 0, NULL),
(21, 1, 1, 'Elle a pris une bouteille d''eau... au passaaaaaaaaaaaaaaaage ! Yaouanc 2014', '2014-12-19 01:22:00', '2014-12-19 01:22:00', 0, NULL),
(22, 4, 2, '"Ouais mais non je vais dormir, je suis fatiguée, je me suis couchée à 1h du mat'' hier soir!"', '2014-12-15 22:59:56', '2014-12-15 22:59:56', 0, '2014-12-05 23:00:00'),
(23, 1, 1, 'Les chevaliers de la table ronde, ou comment boire une quinzaine de litres de vin chaud en quelques jours', '2014-12-24 16:48:38', '2014-12-24 16:48:38', 0, NULL),
(24, 2, 1, 'Retrouver Deborah et Gwenael endormis par terre dans le froid à l''entrée de la coloc parce que ils avaient pas les clés.', '2014-12-19 09:33:36', '2014-12-19 09:33:36', 0, NULL),
(25, 2, 1, 'La traversée mythique du champ de maïs introuvable de Lannion et Simon et sa gueule cassée le lendemain en cours', '2014-12-24 12:41:45', '2014-12-24 12:41:45', 0, NULL),
(26, 2, 1, 'Romain au nouvel an 2013 qui vomit partout parce que il est "malade".', '2014-12-24 15:24:52', '2014-12-24 15:24:52', 0, NULL),
(28, 1, 1, 'Soirée Chouchen à Paule, ou comment se retrouver à 3 heures du matin sous la neige à chanter du Joe Dassin avec le voisin', '2015-03-04 11:10:03', '2015-03-04 11:10:03', 0, NULL),
(29, 2, 1, 'Dark Thoumou aux Alan 2014 qui va se faire cuire des carottes à 4h du mat'' et qui s''endort ensuite sur la canapé en les oubliant dans la casserole', '2015-03-04 11:14:42', '2015-03-04 11:12:23', 0, '2014-12-26 23:00:00'),
(30, 2, 1, 'Raoul qui dort par terre dans sa chambre à la Coloc de Rennes parce que il arrivait pas à monter dans son lit car il était trop caisse', '2015-03-05 08:41:28', '2015-03-05 08:41:28', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE IF NOT EXISTS `profils` (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `profil_nom` varchar(30) NOT NULL,
  `profil_pass` varchar(255) NOT NULL,
  `profil_image` varchar(400) NOT NULL DEFAULT 'http://pointit.fr/assets/images/member.png',
  `profil_last_connection` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`profil_id`),
  UNIQUE KEY `profil_nom` (`profil_nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `profils`
--

INSERT INTO `profils` (`profil_id`, `profil_nom`, `profil_pass`, `profil_image`, `profil_last_connection`) VALUES
(1, 'Baptiste', 'sha256:1000:nIJl24NE8by0NHYCygVMsFlYnSO8f8mv:vOHfKrjq6Dv8mFRH0O5Dm+ttkxwtNPTB', 'http://www.heberger-image.fr/data/images/69244_10357811_10204047522175677_3067593571022759572_n.jpg', '2015-03-18 18:09:22'),
(2, 'Romain', 'sha256:1000:2YEfPQ6vl8Q81cZOVZBE89tLEulDelCL:3B6jUOdWVBRQnL3xbh1v4dBob4bXZD2J', 'http://www.heberger-image.fr/data/images/91016_1463201_10201085111990976_1474023803_n.jpg', '0000-00-00 00:00:00'),
(3, 'Alan', 'sha256:1000:mRa2i0Jot79rGG25+Anec6bBDdKjoSvq:kAMrw/+jkq7w0+u1jr2fXzDRaKojyt4m', 'http://www.heberger-image.fr/data/images/38734_P1010622.jpg', '0000-00-00 00:00:00'),
(4, 'Vincent', 'sha256:1000:Ee6gBtpS+qBqRHe8VatrAIit+0UOg3kz:bzR3l9MeoD2FNJiYP4Cl8lWew4ECi/r8', 'http://pointit.fr/assets/images/avatars/4_Vincent/origin.jpg', '0000-00-00 00:00:00'),
(5, 'B.I.Caban', 'sha256:1000:5OXo989v3nxfc7Np4UNi7ptfYb+9tQ/Y:RLA+naGK5Flxrva3Sfwyr9Ee4ztiUwBX', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xap1/t1.0-9/1780864_712949428725114_10107429_n.jpg', '0000-00-00 00:00:00'),
(6, 'Thoumou', 'sha256:1000:QBfd1c4qzhMh/JCTzkbA6H7cSByDpdKa:ks2W8nd9r3vA5sh8slxxqN8QNNVQ4mRu', 'http://pointit.fr/assets/images/avatars/6_Thoumou/origin.jpg', '2015-03-18 16:23:15'),
(7, 'PMO', 'sha256:1000:fowquNwJjyx5jHh9CujJ3HMpoK0hp35n:MGeQvW+N17Ko0HvWdIhmHbKkc9YS1lAS', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(8, 'GotBal', 'sha256:1000:PscMt45C1CzFiRwznI8S2Q4ecIwEh0r3:9nnfbYV3QaDMNP+ORibtiFktZt2MnFo7', 'http://www.heberger-image.fr/data/images/20724_412443_3696388892692_1512933477_o.jpg', '0000-00-00 00:00:00'),
(9, 'Lucas', 'sha256:1000:lb5iXlKr5zwBBV24BQuu/pQFRuvuwfZY:OWHZy+ZG/XRbx6WgfGFmv4lcVXCm4HHX', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(10, 'Youen', 'sha256:1000:s+xjX7bdhC9L7zAMpIlue7Me3WjHG9Jq:Xx2N8FVqz4PpS2Rp+U9nLRpLzySahuL+', 'http://pointit.fr/assets/images/avatars/10_Youen/origin.jpg', '0000-00-00 00:00:00'),
(11, 'Beuloon', 'sha256:1000:XeTuwx+a/cvfNWMcgDnt6JLlxKj1ZHUt:uyKc7zm+GydXFUnppEXT9NwSOO8vTH+b', 'http://pointit.fr/assets/images/avatars/11_Beuloon/origin.jpg', '0000-00-00 00:00:00'),
(12, 'Bourou', 'sha256:1000:sn3pWac6UkXKiSwtlZBCQSOzUzhCv2yq:ZrtqcsuPuC6WFaEYafxzMShh4lMz7W3w', 'http://www.heberger-image.fr/data/images/60942_10846447_10205078635506704_7177420519330964363_n.jpg', '0000-00-00 00:00:00'),
(13, 'Colin', 'sha256:1000:M6u4lv7lX6fevQqfWeOdaLK7pQArNKm0:mID9FENh1DbvK4O4gXYXna+agK/Dmauk', 'http://pointit.fr/assets/images/avatars/13_Colin/origin.jpg', '0000-00-00 00:00:00'),
(14, 'Paprika', 'sha256:1000:oyh3Zp/6Ei/YNLTlxOTCjbfmq3jfQ7AQ:HNyoWBqmPmgXOf51xBm3EVwM5lEjLA/w', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(15, 'Marine', 'sha256:1000:r9V59mvescHwY5u8/CubYAMNyIZhFzqv:ijR9+mPf41mMe93dXvdqeUtWBmVRc7kX', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(16, 'Marcel', 'sha256:1000:7fW+om/1snD8a7Vh/FeQrot2Pwq9Swvm:bgX7s9U8cK54Sj0oF7oVGXcCEgeuhC/V', 'http://pointit.fr/assets/images/avatars/16_Marcel/origin.jpg', '0000-00-00 00:00:00'),
(17, 'Paul', 'sha256:1000:7mBFffJYSd8n/qQkD7hhgmZ2nclNjMwP:DClKJDTMFZ1SAwuHmRh8mfECpMbv7cmN', 'http://pointit.fr/assets/images/avatars/17_Paul/origin.jpg', '0000-00-00 00:00:00'),
(18, 'Gwenael', 'sha256:1000:90JM90LxlRdalNR6vQtLOeVVzTI7Zoqm:sUw9Ls4iG3dFHxYCpB3cYdnk8PuiXhvl', 'http://pointit.fr/assets/images/avatars/18_Gwenael/origin.jpg', '2015-03-17 22:10:42'),
(19, 'Raoul', 'sha256:1000:Z2QXsC5Srjkyr3NcOvuf+wRAWNOGERiB:36AAnmN+8BrmCdSdIgXwpmd5QrxJj9wC', 'http://pointit.fr/assets/images/avatars/19_Raoul/origin.jpg', '0000-00-00 00:00:00'),
(22, 'Solène', 'sha256:1000:cavNwpdJ9wc1Q1zGDNnH0FlnFrX2hBHh:D9lK/Z4tKS3CKQ4gIfgWTAVLOqsdM/Q3', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(23, 'Bilou', 'sha256:1000:WQJFW0aiEO+c7kcMEOL4VHDNZ5whJchw:As5Ie/OFEgm0ZoXTT4xpFa9ggnESjaeY', 'http://pointit.fr/assets/images/avatars/23_Bilou/origin.jpg', '0000-00-00 00:00:00'),
(24, 'Camille', 'sha256:1000:2wNjX7RpGbfox79kOV30t/JbiUIbL8Fz:IO/bUciyfl56eXjg4Te1zFLBqxWgk2ky', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(25, 'Kévin ', 'sha256:1000:JXWAMXFfdyJYM4OXvtVVbrx6nxeSFRkv:wKTw0Usn5Z/wN/N9nciogVhd51qnv5JD', 'http://pointit.fr/assets/images/avatars/25_Kévin /origin.jpg', '0000-00-00 00:00:00'),
(26, 'Debbite', 'sha256:1000:uw5vXMYvfgZBdDFbs2+553l+bCbEFJEj:ZxEW5HzQ7dC1bGmxNaBIf4I30hbOuT+0', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(27, 'Johanne', 'sha256:1000:+V5toTIIHlNN+AxwMQUU+UutLp1BNJ/O:E5U8Afb+PN3COMvTTR9pKakOfwF5qW9+', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(29, 'Oriane', 'sha256:1000:4nwTgurfBR2B6ItKhlcE4NstWO0cRXrP:pPX18mT1+ah8e6u5AxM1GLXBi1gGP8JQ', 'https://scontent-b-fra.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/1902973_818241664859081_649658164_n.jpg?oh=217d5775118e4096dad3f49540a34b12&oe=5503796B', '0000-00-00 00:00:00'),
(30, 'Titilde', 'sha256:1000:G7UiEgsrYmu0cm777mSwZ0vIyVXZ2cW5:QM70TD6Jpkg2lVSLSbx974CVtP08Db40', 'http://pointit.fr/assets/images/avatars/30_Titilde/origin.jpg', '0000-00-00 00:00:00'),
(31, 'Anouscka', 'sha256:1000:w//Z9649T14s/xMe+ai/gGWcDbSQ7lDj:m9VbYc9UDpkBHEg9O6n2k258ot0a5UZM', 'http://pointit.fr/assets/images/avatars/31_Anouscka/origin.jpg', '0000-00-00 00:00:00'),
(32, 'Daminou', 'sha256:1000:GfvBjpUlZwng2B+Fhd1Pkmx+SNW0c/fq:8kJZjyz7ZNAGRyGMGDR097mUgAVnGPxc', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(33, 'Lulu', 'sha256:1000:jzLr8To1PN1sSDgdHsTFRDezfxTLSIdi:RCzTglzuMBdDoDXbMovU4rzJL7QKU5qf', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(34, 'Richard', 'sha256:1000:1pPPqvZw00GGFcGccc/KT0ugQIVKubPg:leURsKmgH7/ygW22RNDnwAqZdp9Xjo1x', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(35, 'Coco', 'sha256:1000:+q+E0NCAggYx+ZutcgaJCUwxVh9Anodu:56FoZ0osT9bE/otELEbaj+hkUNrvw6zM', 'http://pointit.fr/assets/images/member.png', '0000-00-00 00:00:00'),
(36, 'Morgan', 'sha256:1000:fhUZcH/9XOREm84QsEl2U1a7HFpyGnPE:++3Ho5gt8OglSuq28GW6aJUJETUKXM/t', 'http://pointit.fr/assets/images/member.png', '2015-03-04 14:30:01');

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
(7, 1),
(11, 1),
(18, 1),
(20, 1),
(21, 1),
(23, 1),
(28, 1),
(1, 2),
(13, 2),
(18, 2),
(20, 2),
(23, 2),
(26, 2),
(4, 3),
(5, 3),
(10, 3),
(15, 3),
(18, 3),
(4, 4),
(16, 4),
(18, 4),
(19, 4),
(21, 4),
(3, 5),
(9, 6),
(11, 6),
(12, 6),
(17, 6),
(29, 6),
(2, 8),
(25, 12),
(4, 13),
(8, 13),
(13, 14),
(4, 17),
(5, 17),
(20, 17),
(23, 17),
(24, 18),
(4, 19),
(14, 19),
(20, 19),
(23, 19),
(30, 19),
(6, 23),
(18, 23),
(20, 23),
(23, 23),
(28, 23),
(24, 26),
(21, 30),
(28, 30),
(22, 31);

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
-- Contraintes pour la table `approuve`
--
ALTER TABLE `approuve`
  ADD CONSTRAINT `fk_approuve_point` FOREIGN KEY (`point_id`) REFERENCES `points` (`point_id`),
  ADD CONSTRAINT `fk_approuve_profil` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`profil_id`);

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
