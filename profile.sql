-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2015 at 04:42 PM
-- Server version: 5.5.19
-- PHP Version: 5.4.0RC4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `commentserv`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(70) DEFAULT NULL,
  `email_addr` varchar(100) CHARACTER SET ascii NOT NULL DEFAULT '',
  `company_name` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `avatar` varchar(60) DEFAULT NULL,
  `role` varchar(40) NOT NULL,
  `encryption_key` char(48) DEFAULT NULL,
  `active` int(2) DEFAULT NULL,
  `lastlogin` varchar(90) DEFAULT NULL,
  `logstatus` int(2) DEFAULT NULL,
  `session_id` char(48) DEFAULT NULL,
  `payment_status` int(3) DEFAULT NULL,
  `ip_address` varchar(14) CHARACTER SET ascii NOT NULL,
  `activation` int(3) DEFAULT NULL,
  `verification_hash` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_addr` (`email_addr`),
  UNIQUE KEY `account_name` (`account_name`),
  UNIQUE KEY `encryption_key` (`encryption_key`),
  UNIQUE KEY `verification_hash` (`verification_hash`),
  KEY `account_name_2` (`account_name`,`email_addr`,`password`,`active`,`activation`),
  KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=armscii8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile2` (`id`, `account_name`, `email_addr`, `company_name`, `password`, `avatar`, `role`, `encryption_key`, `active`, `lastlogin`, `logstatus`, `session_id`, `payment_status`, `ip_address`, `activation`, `verification_hash`) VALUES
(1, '', 'admin@yoursite.com', 'Danes', 'adsP40wWaa7dU', 'vector.jpg', 'CLIENT', 'RTM0/1W/bChIk', 1, ' 2nd of May 2015 03:32:40 PM', 1, 'b7ttduslp90nahmcd71o871n34', 0, '127.0.0.1', 1, 'KeGZwX8yeGYUc'),
(3, 'danes', 'danes@yahoo.co.uk', 'Johnsons Corporation', 'ad334BdbAZ9C6', ' ', 'ADMIN', 'RT3ICKuYPKhXQ', 1, ' 14th of May 2015 04:41:37 PM', 1, '9gkpj4fneogqiij3mp90leuui3', 0, '127.0.0.1', 1, 'KeLa8KFHilUcs');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
