-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 05 okt 2014 om 14:21
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `smartcms`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `smartcms_config`
--

CREATE TABLE IF NOT EXISTS `smartcms_config` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `smartcms_config`
--

INSERT INTO `smartcms_config` (`id`, `key`, `value`) VALUES
(1, 'ada', 'adsas');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `smartcms_menu`
--

CREATE TABLE IF NOT EXISTS `smartcms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `destination` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `perm_level` int(3) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `smartcms_menu`
--

INSERT INTO `smartcms_menu` (`id`, `title`, `destination`, `parent`, `perm_level`) VALUES
(1, 'Home', 'http://www.atlasdev.nl', 0, 0),
(2, 'Google', 'http://www.google.nl', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `smartcms_users`
--

CREATE TABLE IF NOT EXISTS `smartcms_users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sessionID` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `perm_level` int(3) NOT NULL DEFAULT '0',
  `password` varchar(32) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `registerIP` int(16) unsigned DEFAULT NULL,
  `registerDate` int(20) NOT NULL,
  `lastLogin` int(10) NOT NULL,
  `lastIP` int(16) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
