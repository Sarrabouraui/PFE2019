-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 07 juin 2019 à 22:11
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cc`
--

-- --------------------------------------------------------

--
-- Structure de la table `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `calendar_events`
--

DROP TABLE IF EXISTS `calendar_events`;
CREATE TABLE IF NOT EXISTS `calendar_events` (
  `ID` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `calendar_events`
--

INSERT INTO `calendar_events` (`ID`, `title`, `start`, `end`, `description`) VALUES
(1, 'Test Event', '2019-05-16 00:00:00', '2019-05-16 00:00:00', ''),
(2, 'New Event', '2019-05-23 00:00:00', '2019-05-23 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `cardetails`
--

DROP TABLE IF EXISTS `cardetails`;
CREATE TABLE IF NOT EXISTS `cardetails` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `Brand_name` varchar(50) NOT NULL,
  `Car_price` varchar(20) NOT NULL,
  `Launch_date` date NOT NULL,
  `image_path` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `displays`
--

DROP TABLE IF EXISTS `displays`;
CREATE TABLE IF NOT EXISTS `displays` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `mac` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `logged` varchar(3) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `title`, `url`, `class`, `start_date`, `end_date`) VALUES
(1, 'Example', 'http://www.example.com', 'event-sucess', '2019-06-10 19:00:00', '2019-06-10 19:01:02'),
(2, 'Jee Tutorials', 'https://www.jeejava.com', 'event-important', '0000-00-00 00:00:00', '2019-06-12 18:42:45'),
(3, 'Roy Tutorial', 'https://www.roytuts.com', 'event-info', '2019-06-12 19:03:05', '2019-06-13 07:45:53');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `title`, `date`, `start`, `end`) VALUES
(1, 'ta', '2019-05-25', '01:01:00', '01:13:00'),
(2, 'test', '2019-05-20', '23:23:00', '02:33:00'),
(3, 'efre', '2019-01-01', '11:11:00', '11:11:00'),
(4, 'blbl', '2019-05-04', '02:03:00', '05:03:00'),
(5, 'test 1', '2019-11-01', '00:00:00', '00:00:00'),
(6, 'lay 1', '2019-06-01', '00:00:00', '23:59:00'),
(7, 'lay 3', '2019-06-01', '00:00:00', '23:59:00'),
(8, 'test', '2019-11-11', '11:11:00', '11:11:00'),
(9, 'test 2', '2019-11-11', '11:11:00', '11:11:00'),
(10, 'test 3', '2019-11-11', '11:11:00', '11:11:00'),
(11, 'test 3', '2019-11-11', '11:11:00', '11:11:00');

-- --------------------------------------------------------

--
-- Structure de la table `layouts`
--

DROP TABLE IF EXISTS `layouts`;
CREATE TABLE IF NOT EXISTS `layouts` (
  `lay_id` int(8) NOT NULL AUTO_INCREMENT,
  `lay_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lay_from` time NOT NULL,
  `lay_to` time NOT NULL,
  `lay_date` date NOT NULL,
  `lay_weather` tinyint(1) NOT NULL,
  `lay_time` tinyint(1) NOT NULL,
  PRIMARY KEY (`lay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `layouts`
--

INSERT INTO `layouts` (`lay_id`, `lay_title`, `lay_from`, `lay_to`, `lay_date`, `lay_weather`, `lay_time`) VALUES
(2, 'test', '11:11:00', '11:11:00', '2019-11-11', 1, 0),
(3, 'test 2', '11:11:00', '11:11:00', '2019-11-11', 1, 1),
(5, 'test 3', '11:11:00', '11:11:00', '2019-11-11', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lay_cont`
--

DROP TABLE IF EXISTS `lay_cont`;
CREATE TABLE IF NOT EXISTS `lay_cont` (
  `pic` int(20) NOT NULL,
  `lay` int(20) NOT NULL,
  `pic_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  KEY `FK` (`pic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `lay_cont`
--

INSERT INTO `lay_cont` (`pic`, `lay`, `pic_file`) VALUES
(3, 2, 'pic_1.jpg'),
(4, 2, 'pic_2.jpg'),
(5, 2, 'pic_41.jpg'),
(4, 3, 'pic_2.jpg'),
(5, 3, 'pic_41.jpg'),
(4, 5, 'pic_2.jpg'),
(5, 5, 'pic_41.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `guid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pic_dur` time NOT NULL,
  `pic_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` longblob NOT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`pic_id`, `pic_title`, `pic_dur`, `pic_file`, `data`) VALUES
(3, 'pic 1', '00:00:10', 'pic_1.jpg', 0x30),
(4, 'pic 2', '00:00:10', 'pic_2.jpg', 0x30),
(5, 'pic 4', '00:00:10', 'pic_41.jpg', 0x30);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
