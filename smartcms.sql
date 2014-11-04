-- phpMyAdmin SQL Dump
-- version 4.2.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2014 at 02:58 PM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `smartcms_config`
--

CREATE TABLE IF NOT EXISTS `smartcms_config` (
`id` int(100) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `smartcms_group`
--

CREATE TABLE IF NOT EXISTS `smartcms_group` (
`id` int(11) NOT NULL,
  `display_name` text NOT NULL,
  `color` char(6) NOT NULL DEFAULT '000000'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartcms_group`
--

INSERT INTO `smartcms_group` (`id`, `display_name`, `color`) VALUES
(1, 'Normal', '00000'),
(2, 'Moderator', '0000FF'),
(3, 'Admin', 'CC0000');

-- --------------------------------------------------------

--
-- Table structure for table `smartcms_group_inheritance`
--

CREATE TABLE IF NOT EXISTS `smartcms_group_inheritance` (
`id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `inheritance` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartcms_group_inheritance`
--

INSERT INTO `smartcms_group_inheritance` (`id`, `group_id`, `inheritance`) VALUES
(1, 2, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `smartcms_group_perms`
--

CREATE TABLE IF NOT EXISTS `smartcms_group_perms` (
`id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `perm_node` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartcms_group_perms`
--

INSERT INTO `smartcms_group_perms` (`id`, `group_id`, `perm_node`) VALUES
(1, 1, 'page.home'),
(2, 3, 'system.backend'),
(3, 2, 'plugin.blog.post'),
(4, 2, 'plugin.blog.edit');

-- --------------------------------------------------------

--
-- Table structure for table `smartcms_menu`
--

CREATE TABLE IF NOT EXISTS `smartcms_menu` (
`id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `destination` text NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `perm_node` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartcms_menu`
--

INSERT INTO `smartcms_menu` (`id`, `title`, `destination`, `parent`, `perm_node`) VALUES
(1, 'Home', 'http://www.atlasdev.nl', 0, 'menu.home'),
(2, 'Google', 'http://www.google.nl', 0, 'menu.google');

-- --------------------------------------------------------

--
-- Table structure for table `smartcms_users`
--

CREATE TABLE IF NOT EXISTS `smartcms_users` (
`id` int(255) NOT NULL,
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
  `lastIP` int(16) unsigned DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smartcms_users`
--

INSERT INTO `smartcms_users` (`id`, `sessionID`, `username`, `user_group`, `password`, `salt`, `email`, `fullname`, `registerIP`, `registerDate`, `lastLogin`, `lastIP`) VALUES
(1, 'D4nwbCRukvjZaYyZhJXWN1lQgw39OuXP1CnlZ8aFiLEh3JH8RI', 'AtlasDev', 3, '57be70f10d43c51a79a282b36a37ccf2a3ae40655dad22a8b00766aadc976216', '12345678', 'some@email.com', 'John doe', 1270, 1413709653, 1413740129, 1270);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `smartcms_config`
--
ALTER TABLE `smartcms_config`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`,`key`);

--
-- Indexes for table `smartcms_group`
--
ALTER TABLE `smartcms_group`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `smartcms_group_inheritance`
--
ALTER TABLE `smartcms_group_inheritance`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `smartcms_group_perms`
--
ALTER TABLE `smartcms_group_perms`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `smartcms_menu`
--
ALTER TABLE `smartcms_menu`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `smartcms_users`
--
ALTER TABLE `smartcms_users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `smartcms_config`
--
ALTER TABLE `smartcms_config`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `smartcms_group`
--
ALTER TABLE `smartcms_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `smartcms_group_inheritance`
--
ALTER TABLE `smartcms_group_inheritance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `smartcms_group_perms`
--
ALTER TABLE `smartcms_group_perms`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `smartcms_menu`
--
ALTER TABLE `smartcms_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `smartcms_users`
--
ALTER TABLE `smartcms_users`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
