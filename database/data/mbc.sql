-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2015 at 12:13 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `admin_filterprayer` tinyint(1) DEFAULT NULL,
  `admin_postprayer` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `events_date` date DEFAULT NULL,
  `events_location` varchar(100) DEFAULT NULL,
  `events_prioritylevel` int(11) DEFAULT NULL,
  `no_of_attendees` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `filtered_prayerrequest`
--

CREATE TABLE IF NOT EXISTS `filtered_prayerrequest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prayerrequest_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`prayerrequest_id`,`admin_id`),
  KEY `fk_Filtered_PrayerRequest_Admin1_idx` (`admin_id`),
  KEY `fk_Filtered_PrayerRequest_PrayerRequest1` (`prayerrequest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL,
  `member_lastname` varchar(45) DEFAULT NULL,
  `member_firstname` varchar(45) DEFAULT NULL,
  `member_contactno` varchar(45) DEFAULT NULL,
  `member_homeadd` varchar(45) DEFAULT NULL,
  `member_emailadd` varchar(45) DEFAULT NULL,
  `member_actministry` varchar(45) DEFAULT NULL,
  `member_attendance` varchar(100) DEFAULT NULL,
  `membercol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_gives_prayerrequest`
--

CREATE TABLE IF NOT EXISTS `member_gives_prayerrequest` (
  `id` int(11) NOT NULL,
  `prayerrequest_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`prayerrequest_id`,`member_id`,`id`),
  KEY `fk_Member_gives_PrayerRequest_Member1_idx` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member_has_events`
--

CREATE TABLE IF NOT EXISTS `member_has_events` (
  `id` int(11) NOT NULL,
  `events_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`events_id`,`member_id`,`id`),
  KEY `fk_Member_has_Events_Member1_idx` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1425564756),
('m130524_201442_init', 1425564764);

-- --------------------------------------------------------

--
-- Table structure for table `prayerrequest`
--

CREATE TABLE IF NOT EXISTS `prayerrequest` (
  `id` int(11) NOT NULL,
  `prayerrequest_code` int(11) DEFAULT NULL,
  `prayerrequest_type` varchar(45) DEFAULT NULL,
  `prayerrequest_description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tithe`
--

CREATE TABLE IF NOT EXISTS `tithe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tithe_date` date DEFAULT NULL,
  `tithe_envno` varchar(45) DEFAULT NULL,
  `tithe_amount` int(11) DEFAULT NULL,
  `tithe_total` int(11) DEFAULT NULL,
  `member_ID` int(11) NOT NULL,
  PRIMARY KEY (`id`,`member_ID`),
  KEY `fk_Tithe_Member1_idx` (`member_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mbc-rts', 'ksQDL0ghCxdjvYHc7vAJYrtzBdQjqeX5', '$2y$13$rFeKksR2JqFUh3X5jjyonuoH1rSIx9BukIchjDWIpmUiOPZTFh3CK', NULL, 'sagungenerpaolo@gmail.com', 10, 1425565785, 1425565785);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `filtered_prayerrequest`
--
ALTER TABLE `filtered_prayerrequest`
  ADD CONSTRAINT `fk_Filtered_PrayerRequest_Admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Filtered_PrayerRequest_PrayerRequest1` FOREIGN KEY (`prayerrequest_id`) REFERENCES `prayerrequest` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_gives_prayerrequest`
--
ALTER TABLE `member_gives_prayerrequest`
  ADD CONSTRAINT `fk_Member_gives_PrayerRequest_Member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Member_gives_PrayerRequest_PrayerRequest1` FOREIGN KEY (`prayerrequest_id`) REFERENCES `prayerrequest` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `member_has_events`
--
ALTER TABLE `member_has_events`
  ADD CONSTRAINT `fk_Member_has_Events_Events` FOREIGN KEY (`events_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Member_has_Events_Member1` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tithe`
--
ALTER TABLE `tithe`
  ADD CONSTRAINT `fk_Tithe_Member1` FOREIGN KEY (`member_ID`) REFERENCES `member` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
