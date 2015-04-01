-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2015 at 05:13 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mbc_rts`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '10', NULL),
('admin', '4', NULL),
('admin', '6', NULL),
('admin', '9', NULL),
('member', '11', NULL),
('member', '5', NULL),
('member', '8', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `type` (`type`),
  KEY `fk_{4B44A0CC-0EAD-4175-92D6-DC4249F287ED}` (`rule_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Super User', NULL, NULL, NULL, NULL),
('member', 1, 'limited access', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `fk_{D3E7AA73-43BE-48A2-B391-64DF2610474E}` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events_date` date DEFAULT NULL,
  `events_location` varchar(100) DEFAULT NULL,
  `events_prioritylevel` varchar(10) DEFAULT NULL,
  `event_desc` varchar(255) DEFAULT NULL,
  `no_of_attendees` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prayer`
--

CREATE TABLE IF NOT EXISTS `prayer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prayer_desc` varchar(100) DEFAULT NULL,
  `prayer_type` varchar(45) DEFAULT NULL,
  `prayer_code` varchar(10) NOT NULL,
  `prayer_schedule` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_member_gives_prayerrequest_user1_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tithe`
--

CREATE TABLE IF NOT EXISTS `tithe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tithe_date` date DEFAULT NULL,
  `tithe_envno` varchar(45) DEFAULT NULL,
  `tithe_amount` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_tithe_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tithe`
--

INSERT INTO `tithe` (`id`, `tithe_date`, `tithe_envno`, `tithe_amount`, `user_id`) VALUES
(4, '2015-09-12', '23', 200, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) DEFAULT '10',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `user_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_contactno` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_homeadd` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_actministry` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_attendance` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `user_name`, `user_contactno`, `user_homeadd`, `user_actministry`, `user_attendance`) VALUES
(4, 'admin', 'wzDxHx9a_eN9GYoIRYHyEuCWIdJMz492', '$2y$13$iIfUICF6aI9XHGDpK5pEduiCoGS.p9ZtK1KtNabTnMqCB1sQDMzq6', NULL, 'admin@admin.com', 10, 1427674384, 1427674384, '', '', '', '', ''),
(5, 'member', 'A21W8unSMcuDZ1d80p5IVEIKgmjJRb2v', '$2y$13$u626vZuRPizf6LOzA3ySDO.tOQKmlr/akqp0NN3NHAklnCmZMek/m', NULL, 'member@member.com', 10, 1427674415, 1427674415, '', '', '', '', ''),
(6, 'acgsia', 'SYvA6DfD3a-odlnhtPSgLeLfwF5owYx3', '$2y$13$Xr/qP7liK2.VhOGZ8rn3le5wIV8suL8aaZn8p6lRXcPcjUk1OpZSW', NULL, 'acgsia@gmail.com', 10, 1427677333, 1427677333, 'Angelo Sia', '3637175', '164 Sample St', 'Balintawak', ''),
(8, 'abby_bia', 'W55S4__O-kGntfI_Ih69QlrHXvaagKeX', '$2y$13$zdrlqyNm/KycAxhUKcVaVuBDDkBpuN3WRc8rdkoXs25Fi7VHbp1A.', NULL, 'abby_bia@abby.com', 10, 1427698024, 1427698024, 'Arianne Papna', '09358142357', 'Taguig City', 'Youth President', 'Perfect Attendance'),
(9, 'PSagun', 'Bb5eJmX7yX5vQvtRh2Z1tBAHZsfXTLpK', '$2y$13$89bNXGWEOiIYyTax0hHj/uU5G8ewKzjA8rQTh7lXUwmNmvLGgFDte', NULL, 'PSaguna@mbc.com', 10, 1427855427, 1427855427, 'Paolo Sagun', '0925118645', '619 Damo Damo Street Butong ', 'Ministry', '5'),
(10, 'JAcuna', 'U6PiccSHveVh2PPWwRQR8UVbHYZRhCMM', '$2y$13$E4eZmB2af9sp2JWvsIl9O..piztVkRACthRqfNQCkY4Hi1t5SHM1u', NULL, 'JAcuna@mbc.com', 10, 1427855476, 1427855476, 'Julian Acuna', '09161234567', '23 Michael Jordan', 'Act', '100'),
(11, 'Jowee', '2Dz2T9yab4QfSyQsRJO7Pio1yZKZqEGe', '$2y$13$p5XF4kguBpkq82WwKXR76uUfLSgS0JP9L6n.85O/KQ17A2Y7fqxSW', NULL, 'Jwee@mbc.com', 10, 1427855569, 1427855569, 'Jow Wee', '4278854', '55 Siomai Hopia', 'Head ', '56');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_events`
--

CREATE TABLE IF NOT EXISTS `user_has_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `events_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`events_id`,`user_id`),
  KEY `fk_member_has_events_user1_idx` (`user_id`),
  KEY `fk_Member_has_Events_Events` (`events_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `fk_{4C192318-B4C2-4B06-9A5F-085F50194A45}` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_{4B44A0CC-0EAD-4175-92D6-DC4249F287ED}` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `fk_{ABA01DD3-D817-414E-8A97-3E86FE8A80C4}` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_{D3E7AA73-43BE-48A2-B391-64DF2610474E}` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prayer`
--
ALTER TABLE `prayer`
  ADD CONSTRAINT `fk_member_gives_prayerrequest_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tithe`
--
ALTER TABLE `tithe`
  ADD CONSTRAINT `fk_tithe_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_has_events`
--
ALTER TABLE `user_has_events`
  ADD CONSTRAINT `fk_Member_has_Events_Events` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_member_has_events_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
