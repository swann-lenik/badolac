-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2014 at 05:46 PM
-- Server version: 5.5.40-MariaDB-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `badolac`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id_user` int(10) NOT NULL,
  `controller` varchar(32) NOT NULL,
  `action` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id_comment` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `comment` text NOT NULL COMMENT 'modifiable textarea',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_post`, `id_user`, `comment`, `date_add`) VALUES
(1, 1, 1, 'comment 1', '2014-11-21 14:17:53'),
(2, 1, 1, 'comment 2', '2014-11-21 14:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id_contact` int(11) NOT NULL,
  `lastname` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT 'modifiable',
  `firstname` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT 'modifiable',
  `mail` varchar(128) CHARACTER SET utf8 NOT NULL COMMENT 'modifiable',
  `phone` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT 'modifiable',
  `address_1` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'modifiable',
  `address_2` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'modifiable',
  `zipcode` int(6) NOT NULL COMMENT 'modifiable',
  `city` varchar(63) CHARACTER SET utf8 NOT NULL COMMENT 'modifiable',
  `country` varchar(63) CHARACTER SET utf8 NOT NULL COMMENT 'modifiable',
  `licence` int(8) NOT NULL COMMENT 'modifiable',
  `club` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'modifiable',
  `sexe` varchar(1) COLLATE latin1_general_ci NOT NULL COMMENT 'modifiable',
  `ranking` varchar(20) COLLATE latin1_general_ci NOT NULL COMMENT 'modifiable',
  `birthdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'modifiable'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id_contact`, `lastname`, `firstname`, `mail`, `phone`, `address_1`, `address_2`, `zipcode`, `city`, `country`, `licence`, `club`, `sexe`, `ranking`, `birthdate`) VALUES
(2, 'LENIK', 'Swann', 'slu2011@hotmail.com', '0662787853', '9 rue de la gare', '', 94230, 'Cachan', 'France', 103699, 'AASF 94', 'H', 'A3 / A1 / A2', '2014-11-21 16:29:02'),
(1, 'FOSSY', 'Olivier', 'olivier@badolac.com', '+33123456789', '1 rue de la gare', '', 75001, 'PARIS', 'FRANCE', 123456, 'AASF Fresnes', 'M', 'A1 / A1 / A2', '2014-10-06 09:13:33');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu_item` int(10) NOT NULL,
  `id_parent` int(10) NOT NULL,
  `label` varchar(64) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu_item`, `id_parent`, `label`, `link`) VALUES
(1, 0, 'Accueil', '/'),
(3, 0, 'Stages', ''),
(4, 3, 'Nos stages', '/stage/description'),
(5, 3, 'Modalités d''inscription', '/stage/modalite'),
(6, 3, 'S''inscrire', '/stage/inscription'),
(7, 0, 'Calendrier', '/calendar'),
(8, 0, 'Bad''o''Lac', ''),
(9, 8, 'Qui sommes-nous ?', '/misc/contact'),
(10, 8, 'Entraineurs', '/misc/entraineur'),
(11, 8, 'Contact', '/misc/contact'),
(12, 0, 'Bibliothèque', ''),
(13, 12, 'Documents', '/misc/documents'),
(14, 12, 'Photos', '/misc/photos'),
(15, 12, 'vidéos', '/misc/videos');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_contact` int(10) NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_contact`, `date_message`, `message`) VALUES
(2, '2014-09-24 16:41:06', 'TEST test !!!!');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
`id_page` int(10) NOT NULL,
  `title` varchar(64) NOT NULL COMMENT 'modifiable',
  `subtitle` varchar(64) NOT NULL COMMENT 'modifiable',
  `body` text NOT NULL COMMENT 'modifiable textarea',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_upd` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_display` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `author` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `title`, `subtitle`, `body`, `date_add`, `date_upd`, `date_display`, `author`) VALUES
(1, 'Qui sommes-nous ?', 'Laissez-nous nous présenter', 'Ceci est notre but !\r\n\r\nOui !!!!', '2014-10-06 09:13:43', '2014-10-06 09:12:20', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `participe`
--

CREATE TABLE IF NOT EXISTS `participe` (
  `id_contact` int(10) NOT NULL,
  `id_stage` int(10) NOT NULL,
  `tshirt_count` int(2) NOT NULL DEFAULT '1',
  `tshirt_model` varchar(1) NOT NULL,
  `tshirt_size` varchar(2) NOT NULL,
  `welcome` tinyint(1) NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id_post` int(10) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_upd` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(64) NOT NULL COMMENT 'modifiable',
  `subtitle` varchar(64) NOT NULL COMMENT 'modifiable',
  `body` text NOT NULL COMMENT 'modifiable textarea',
  `author` int(10) NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `comments` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `date_add`, `date_upd`, `title`, `subtitle`, `body`, `author`, `hidden`, `comments`) VALUES
(1, '2014-11-21 16:17:36', '2014-11-21 16:21:45', 'Titre 1', 'Sous titre 1', 'Corps 1 modifié', 1, 0, 1),
(2, '2014-11-21 16:17:36', '2014-11-21 16:17:36', 'Titre 2', 'Sous titre 2', 'Corps 2', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanitaire`
--

CREATE TABLE IF NOT EXISTS `sanitaire` (
  `id_contact` int(10) NOT NULL,
  `id_stage` int(10) NOT NULL,
  `vaccins` text NOT NULL,
  `disease` text NOT NULL,
  `allergies` text NOT NULL,
  `health_difficulties` text NOT NULL,
  `recommandations` text NOT NULL,
  `legal_responsible` text NOT NULL,
  `signature_name` varchar(255) NOT NULL,
  `validated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
`id_stage` int(10) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'modifiable',
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'modifiable',
  `date_limit_subscription` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'modifiable',
  `max_participants` int(4) NOT NULL COMMENT 'modifiable',
  `title` varchar(255) NOT NULL COMMENT 'modifiable',
  `body` text NOT NULL COMMENT 'modifiable textarea'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id_stage`, `date_start`, `date_end`, `date_limit_subscription`, `max_participants`, `title`, `body`) VALUES
(1, '2014-10-18 07:00:00', '2014-10-25 16:00:00', '2014-10-04 16:00:00', 20, 'Stage Toussaint Adulte', 'Stage réservé aux adultes tout niveau');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE IF NOT EXISTS `trainer` (
`id_trainer` int(10) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'modifiable',
  `firstname` varchar(255) NOT NULL COMMENT 'modifiable',
  `description` text NOT NULL COMMENT 'modifiable textarea',
  `mail` varchar(255) NOT NULL COMMENT 'modifiable',
  `phone` varchar(20) NOT NULL COMMENT 'modifiable',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'modifiable checkbox'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id_trainer`, `name`, `firstname`, `description`, `mail`, `phone`, `active`) VALUES
(1, 'FOSSY', 'Olivier', 'C''est moi !!!', 'olivier@badolac.com', '+33123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `id_contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `mail`, `id_contact`) VALUES
('Olivier', '20e11e85', 'olivier@badolac.com', 1),
('Swann', '20e11e85', 'swann@lenik.fr', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
 ADD PRIMARY KEY (`id_user`,`controller`,`action`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id_comment`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id_contact`), ADD UNIQUE KEY `lastname` (`lastname`,`firstname`,`mail`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu_item`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id_contact`,`date_message`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `participe`
--
ALTER TABLE `participe`
 ADD PRIMARY KEY (`id_contact`,`id_stage`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `sanitaire`
--
ALTER TABLE `sanitaire`
 ADD PRIMARY KEY (`id_contact`,`id_stage`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
 ADD PRIMARY KEY (`id_stage`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
 ADD PRIMARY KEY (`id_trainer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu_item` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
MODIFY `id_page` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stage`
--
ALTER TABLE `stage`
MODIFY `id_stage` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
MODIFY `id_trainer` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
