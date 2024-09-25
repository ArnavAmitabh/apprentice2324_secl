-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2024 at 06:08 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apprentice`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `regno` varchar(25) NOT NULL,
  `presat` text,
  `prespo` text,
  `presdistt` text,
  `prescity` text,
  `presstate` text,
  `prespin` text,
  `permat` text,
  `permpo` text,
  `permdistt` text,
  `permcity` text,
  `permstate` text,
  `permpin` text,
  `createdby` text,
  `createdate` date DEFAULT NULL,
  `modby` text,
  `moddate` date DEFAULT NULL,
  PRIMARY KEY (`regno`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uname` text NOT NULL,
  `pwd` text NOT NULL,
  `createdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `pwd`, `createdate`) VALUES
(1, 'ee', 'ee123', '2023-08-17');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

DROP TABLE IF EXISTS `bank`;
CREATE TABLE IF NOT EXISTS `bank` (
  `regno` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bankname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `branchname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `acno` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ifsc` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `acnoname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `regno` varchar(25) NOT NULL,
  `institute` text,
  `rollno` text,
  `specialisation` text,
  `qualification` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `dop` date DEFAULT NULL,
  `percentd` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `percents` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `createdby` text,
  `createdate` date DEFAULT NULL,
  `modby` text,
  `moddate` date DEFAULT NULL,
  `filename` text COMMENT 'file upload',
  PRIMARY KEY (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_exchange`
--

DROP TABLE IF EXISTS `emp_exchange`;
CREATE TABLE IF NOT EXISTS `emp_exchange` (
  `regno` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `natsid` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `dor` date DEFAULT NULL,
  `apprenticeship` text,
  `createdby` text,
  `createdate` date DEFAULT NULL,
  `modby` text,
  `moddate` date DEFAULT NULL,
  `filename` text,
  `training` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`regno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `id`
--

DROP TABLE IF EXISTS `id`;
CREATE TABLE IF NOT EXISTS `id` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `regno` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createdate` date DEFAULT NULL,
  `createdby` text,
  `moddate` date DEFAULT NULL,
  `modby` text,
  PRIMARY KEY (`regno`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `regno` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `posta` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `fstname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `middlename` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `lastname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `fatherfstname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `fathermiddlename` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `fatherlastname` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `sex` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `community` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `dob` date DEFAULT NULL,
  `aadhar` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `mobileno` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `createdby` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `createdate` date DEFAULT NULL,
  `modby` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `moddate` date DEFAULT NULL,
  `status` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL COMMENT 'S-saved\r\nA- submitted\r\nQ- qualified',
  `photo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `signature` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `aadhar` (`aadhar`),
  UNIQUE KEY `mobileno` (`mobileno`),
  UNIQUE KEY `regno` (`regno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Triggers `register`
--
DROP TRIGGER IF EXISTS `generate_registration_number`;
DELIMITER $$
CREATE TRIGGER `generate_registration_number` BEFORE INSERT ON `register` FOR EACH ROW BEGIN
INSERT INTO id VALUES (null);
    SET NEW.regno = CONCAT("SECL/2024/HRD/",LPAD(LAST_INSERT_ID(),5,"0"));
   
END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
