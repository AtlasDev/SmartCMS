-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 03 nov 2014 om 21:18
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `smartcms_group`
--

CREATE TABLE IF NOT EXISTS `smartcms_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` text NOT NULL,
  `color` char(6) NOT NULL DEFAULT '000000',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `smartcms_group`
--

INSERT INTO `smartcms_group` (`id`, `display_name`, `color`) VALUES
(1, 'Normal', '00000'),
(2, 'Moderator', '0000FF'),
(3, 'Admin', 'CC0000');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `smartcms_group_inherance`
--

CREATE TABLE IF NOT EXISTS `smartcms_group_inherance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `inheritance` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `smartcms_group_inherance`
--

INSERT INTO `smartcms_group_inherance` (`id`, `group_id`, `inheritance`) VALUES
(1, 2, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `smartcms_group_perms`
--

CREATE TABLE IF NOT EXISTS `smartcms_group_perms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `perm_node` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Gegevens worden geëxporteerd voor tabel `smartcms_group_perms`
--

INSERT INTO `smartcms_group_perms` (`id`, `group_id`, `perm_node`) VALUES
(1, 1, 'page.home'),
(2, 3, 'system.backend'),
(3, 2, 'plugin.blog.post'),
(4, 2, 'plugin.blog.edit');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `smartcms_menu`
--

CREATE TABLE IF NOT EXISTS `smartcms_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `destination` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `perm_node` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `smartcms_menu`
--

INSERT INTO `smartcms_menu` (`id`, `title`, `destination`, `parent`, `perm_node`) VALUES
(1, 'Home', 'http://www.atlasdev.nl', 0, 'menu.home'),
(2, 'Google', 'http://www.google.nl', 0, 'menu.google');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `smartcms_users`
--

CREATE TABLE IF NOT EXISTS `smartcms_users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `sessionID` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_group` int(11) NOT NULL DEFAULT '1',
  `password` varchar(64) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` text NOT NULL,
  `registerIP` int(16) unsigned DEFAULT NULL,
  `registerDate` int(20) NOT NULL,
  `lastLogin` int(10) NOT NULL,
  `lastIP` int(16) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `smartcms_users`
--

INSERT INTO `smartcms_users` (`id`, `sessionID`, `username`, `user_group`, `password`, `salt`, `email`, `fullname`, `registerIP`, `registerDate`, `lastLogin`, `lastIP`) VALUES
(1, 'D4nwbCRukvjZaYyZhJXWN1lQgw39OuXP1CnlZ8aFiLEh3JH8RI', 'AtlasDev', 3, '57be70f10d43c51a79a282b36a37ccf2a3ae40655dad22a8b00766aadc976216', '12345678', 'some@email.com', 'John doe', 1270, 1413709653, 1413740129, 1270);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
