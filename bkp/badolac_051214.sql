-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 05 Décembre 2014 à 15:59
-- Version du serveur :  5.5.40-MariaDB-0ubuntu0.14.04.1
-- Version de PHP :  5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `badolac`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id_user` int(10) NOT NULL,
  `controller` varchar(32) NOT NULL,
  `action` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `access`
--

INSERT INTO `access` (`id_user`, `controller`, `action`) VALUES
(1, 'admin', 'access'),
(1, 'admin', 'create'),
(1, 'admin', 'index'),
(1, 'admin', 'modify'),
(1, 'admin', 'personal'),
(2, 'admin', 'index'),
(2, 'admin', 'personal'),
(3, 'admin', 'index'),
(3, 'admin', 'personal'),
(6, 'admin', 'index'),
(6, 'admin', 'personal');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
`id_comment` int(10) NOT NULL,
  `id_post` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `comment` text NOT NULL COMMENT 'modifiable textarea',
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_post`, `id_user`, `comment`, `date_add`) VALUES
(1, 1, 1, 'comment 1', '2014-11-21 14:17:53'),
(2, 1, 1, 'comment 2', '2014-11-21 14:17:53');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `lastname`, `firstname`, `mail`, `phone`, `address_1`, `address_2`, `zipcode`, `city`, `country`, `licence`, `club`, `sexe`, `ranking`, `birthdate`) VALUES
(2, 'LENIK', 'Swann', 'slu2011@hotmail.com', '0662787853', '9 rue de la gare', '', 94230, 'Cachan', 'France', 103699, 'AASF 94', 'H', 'A3 / A1 / A2', '1985-11-20 20:40:00'),
(1, 'FOSSY', 'Olivier', 'olivier@badolac.com', '+33123456789', '1 rue de la gare', '', 75001, 'PARIS', 'FRANCE', 123456, 'AASF Fresnes', 'M', 'A1 / A1 / A2', '2014-10-06 09:13:33'),
(3, 'a', 'b', 'c', 'd', 'e', 'f', 1234, 'h', 'j', 12345678, 'k', 'H', 'NC/NC/NC', '2014-12-02 14:31:18'),
(6, 'nom', 'prenom', 'mail@mail.com', '0102030405', '1 rue de l''avenue', 'Escalier C', 75001, 'PARIS', 'FRANCE', 12345678, 'RCF 75', 'H', 'T20 / T20 / T50', '1970-01-31 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(10) NOT NULL,
  `id_parent` int(10) NOT NULL COMMENT 'modifiable parentlist',
  `label` varchar(64) NOT NULL COMMENT 'modifiable',
  `link` varchar(255) NOT NULL COMMENT 'modifiable'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_parent`, `label`, `link`) VALUES
(1, 0, 'Accueil', ''),
(3, 0, 'Stages', ''),
(4, 3, 'Nos stages à venir', '/stage'),
(5, 3, 'Modalités d''inscription', '/stage/modalite'),
(6, 3, 'S''inscrire', '/stage/inscription'),
(7, 0, 'Calendrier', '/calendar'),
(8, 0, 'Bad''o''Lac', ''),
(9, 8, 'Qui sommes-nous ?', '/page/page/1'),
(10, 8, 'Entraineurs', '/stage/trainer'),
(11, 8, 'Contact', '/misc/contact'),
(12, 0, 'Bibliothèque', ''),
(13, 12, 'Documents', '/misc/documents'),
(14, 12, 'Photos', '/misc/photos'),
(15, 12, 'vidéos', '/misc/videos');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id_contact` int(10) NOT NULL,
  `date_message` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_contact`, `date_message`, `message`) VALUES
(2, '2014-09-24 16:41:06', 'TEST test !!!!');

-- --------------------------------------------------------

--
-- Structure de la table `page`
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
-- Contenu de la table `page`
--

INSERT INTO `page` (`id_page`, `title`, `subtitle`, `body`, `date_add`, `date_upd`, `date_display`, `author`) VALUES
(1, 'Qui sommes-nous ?', 'Laissez-nous nous présenter', 'Ce que nous faisons ?\nDes stages de bad', '2014-12-03 14:49:34', '2014-10-06 09:12:20', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `participe`
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
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id_post` int(10) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_upd` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(64) NOT NULL COMMENT 'modifiable',
  `subtitle` varchar(64) NOT NULL COMMENT 'modifiable',
  `body` text NOT NULL COMMENT 'modifiable textarea',
  `author` int(10) NOT NULL COMMENT 'modifiable userlist',
  `hidden` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'modifiable checkbox',
  `comments` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'modifiable checkbox'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id_post`, `date_add`, `date_upd`, `title`, `subtitle`, `body`, `author`, `hidden`, `comments`) VALUES
(1, '2014-11-21 16:17:36', '2014-11-21 16:21:45', 'Titre 1', 'Sous titre 1', 'Corps 1', 1, 0, 1),
(2, '2014-11-21 16:17:36', '2014-11-21 16:17:36', 'Titre 2', 'Sous titre 2', 'Corps 2', 1, 0, 1),
(3, '2014-11-28 10:46:23', '2014-12-02 11:00:00', 'titre 3', 'Sous titre 3', 'Corps 3', 2, 1, 1),
(27, '2014-11-28 15:55:50', '2014-12-02 06:30:00', 'titre 4', 'sous titre 4', 'corps 4', 2, 1, 0),
(48, '2014-11-28 16:37:20', '2014-12-02 19:47:44', 'titre 5', 'sous titre 5', 'corps 5', 3, 0, 0),
(49, '2014-11-28 16:59:00', '2014-12-02 07:52:00', 'titre 6', 'sous titre 6', 'corps 6', 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sanitaire`
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
-- Structure de la table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
`id_stage` int(10) NOT NULL,
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'modifiable',
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'modifiable',
  `date_limit_subscription` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT 'modifiable',
  `max_participants` int(4) NOT NULL COMMENT 'modifiable',
  `title` varchar(255) NOT NULL COMMENT 'modifiable',
  `body` text NOT NULL COMMENT 'modifiable textarea'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `stage`
--

INSERT INTO `stage` (`id_stage`, `date_start`, `date_end`, `date_limit_subscription`, `max_participants`, `title`, `body`) VALUES
(1, '2014-10-18 07:00:00', '2014-10-25 16:00:00', '2014-10-04 16:00:00', 20, 'Stage Toussaint Adulte', 'Stage réservé aux adultes tout niveau'),
(2, '2014-12-18 06:00:00', '2014-12-25 15:00:00', '2014-12-04 15:00:00', 20, 'Stage Noel Adulte', 'Stage réservé aux adultes tout niveau');

-- --------------------------------------------------------

--
-- Structure de la table `trainer`
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
-- Contenu de la table `trainer`
--

INSERT INTO `trainer` (`id_trainer`, `name`, `firstname`, `description`, `mail`, `phone`, `active`) VALUES
(1, 'FOSSY', 'Olivier', 'C''est moi !!!', 'olivier@badolac.com', '+33123456789', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `id_contact` int(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `mail`, `id_contact`, `active`) VALUES
(1, 'Swann', 'd29fe33b7c15567ff62c7da72542966b', 'swann@lenik.fr', 2, 1),
(2, 'Olivier', 'd29fe33b7c15567ff62c7da72542966b', 'olivier@badolac.com', 1, 1),
(3, 'test', 'd29fe33b7c15567ff62c7da72542966b', 'test@test.com', 3, 1),
(6, 'Moi', '460c93ed116e3ea9ed0a0dc68dd79fd9', 'mail@mail.com', 6, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `access`
--
ALTER TABLE `access`
 ADD PRIMARY KEY (`id_user`,`controller`,`action`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
 ADD PRIMARY KEY (`id_comment`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id_contact`), ADD UNIQUE KEY `lastname` (`lastname`,`firstname`,`mail`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
 ADD PRIMARY KEY (`id_contact`,`date_message`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
 ADD PRIMARY KEY (`id_page`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
 ADD PRIMARY KEY (`id_contact`,`id_stage`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id_post`);

--
-- Index pour la table `sanitaire`
--
ALTER TABLE `sanitaire`
 ADD PRIMARY KEY (`id_contact`,`id_stage`);

--
-- Index pour la table `stage`
--
ALTER TABLE `stage`
 ADD PRIMARY KEY (`id_stage`);

--
-- Index pour la table `trainer`
--
ALTER TABLE `trainer`
 ADD PRIMARY KEY (`id_trainer`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `mail` (`mail`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
MODIFY `id_comment` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
MODIFY `id_page` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT pour la table `stage`
--
ALTER TABLE `stage`
MODIFY `id_stage` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `trainer`
--
ALTER TABLE `trainer`
MODIFY `id_trainer` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
