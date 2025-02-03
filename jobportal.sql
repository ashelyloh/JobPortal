-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2020 at 10:47 AM
-- Server version: 8.0.15
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `ContactNumber` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `Password`, `dob`, `Gender`, `ContactNumber`, `Email`) VALUES
(2, 'yeechun', '1234', '2000-11-25', 'Female', '016-7912435', 'yeechun@gmail.com'),
(3, 'Siew Fu', '1234 ', '1998-01-01', 'Female', '012-9392037', 'lizy@gmail.com'),
(23, 'suga', '1234 ', '2001-07-12', 'Male', '0125784747', 'suga@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `advertiser`
--

DROP TABLE IF EXISTS `advertiser`;
CREATE TABLE IF NOT EXISTS `advertiser` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `ContactNumber` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Applyform` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advertiser`
--

INSERT INTO `advertiser` (`ID`, `Username`, `Password`, `dob`, `Gender`, `ContactNumber`, `Email`, `Applyform`) VALUES
(8, 'Michael', '1234', '1968-12-06', 'Male', '016-7211388', 'Michael1968@gmail.com', ''),
(9, 'Christine', '1234', '2001-11-10', 'Male', '016-7634332', 'Christine2001@gmail.com', ''),
(10, 'Emileen', '1234', '2001-01-26', 'Male', '016-7315676', 'maelaiileong@gmail.com', ''),
(31, 'Mark', '1234', '1987-11-16', 'Male', '017-7656454', 'Mark1987@gmail.com', ''),
(39, 'lizy', '1234', '1999-02-05', 'Male', '0189287329', 'lizy@gmail.com', '1)Name:Kim Tae Hyung \r\nApply Job ID: 9	\r\nGender:Male	\r\nEmail:taetae@gmail.com	\r\nContact number:019-7685857\r\nDate of birth:1995-12-30	\r\nAddress:13, Jalan Cahaya 4, Taman Bangtan, 81800 Ulu Tiram, Johor.	\r\nWorking experience: 3 years	\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `applyjob`
--

DROP TABLE IF EXISTS `applyjob`;
CREATE TABLE IF NOT EXISTS `applyjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `applyJobID` int(100) NOT NULL,
  `advertiserUsername` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactNo` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `yearOfExperience` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applyjob`
--

INSERT INTO `applyjob` (`id`, `name`, `applyJobID`, `advertiserUsername`, `gender`, `email`, `contactNo`, `dob`, `address`, `yearOfExperience`) VALUES
(4, 'Kim Tae Hyung', 9, 'lizy', 'Male', 'taetae@gmail.com', '019-7685857', '1995-12-30', '13, Jalan Cahaya 4, Taman Bangtan, 81800 Ulu Tiram, Johor.', '3 years'),
(5, 'Tian Hong Jie', 16, 'tony', 'Male', 'lilbear@gmail.com', '0129372839', '2001-03-19', '16, Jalan Harimau 3, Taman Buaya, 81800 Ulu Tiram, Johor.', '1 year'),
(10, 'Tian Hong Jie', 11, 'lizy', 'Male', 'lilbear@gmail.com', '0129372839', '2001-03-19', '16, Jalan Harimau 3, Taman Buaya, 81800 Ulu Tiram, Johor.', '1 year');

-- --------------------------------------------------------

--
-- Table structure for table `blist`
--

DROP TABLE IF EXISTS `blist`;
CREATE TABLE IF NOT EXISTS `blist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `blacklist` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blist`
--

INSERT INTO `blist` (`id`, `blacklist`) VALUES
(1, 'AAA Company, this company did not pay me for the over time.'),
(2, 'Lim mei mei, I hired this job seeker but at the day she stood me up.'),
(5, 'Chong Wei Xiong, this person always late for work, almost half a month!'),
(6, 'HDU Entertainment, this company exist gender discrimination in the workplace.');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `feedback`) VALUES
(1, 'Can I change my phone number? (Reply: Yes, you can edit your phone number in personal details page.)'),
(6, 'What can I do when I meet a bad company. (Reply: You can post your situation in Blacklist page.)'),
(12, 'How to find job? (Reply: You can find in Job Portal-Find Job page.)');

-- --------------------------------------------------------

--
-- Table structure for table `findjob`
--

DROP TABLE IF EXISTS `findjob`;
CREATE TABLE IF NOT EXISTS `findjob` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jobtype` varchar(100) NOT NULL,
  `paidsalary` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `workinghours` varchar(100) NOT NULL,
  `workingarea` varchar(100) NOT NULL,
  `jobdescription` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `findjob`
--

INSERT INTO `findjob` (`ID`, `Username`, `jobtype`, `paidsalary`, `workinghours`, `workingarea`, `jobdescription`) VALUES
(8, 'james', 'Part time', 'RM10 per hours', '8 hours per day', 'Bukit indah', 'Event crew for concert'),
(9, 'lizy', 'Full time', 'RM3000 per month', '8 hours per day', 'Taman Mount Austin', 'Admin staff for ABC Company'),
(10, 'james', 'Part time', 'RM 10 per hours', '7 hours per day', 'Desa Tebrau', 'Promoter for Milo at AEON Shopping Mall'),
(11, 'lizy', 'Part time', 'RM 9 per hours', '8 hours per day', 'Desa Jaya', 'Promoter at 99 Supermarket'),
(12, 'yeechun', 'Full time', 'RM 4500 per month', '9 hours per day', 'Adda Height', 'Event Manager for company Lucky7'),
(15, 'james', 'Part time', 'RM 7 per hours', '9 hours per day', 'Johor Jaya', 'Cashier for Boba Bubble Tea Shop'),
(16, 'tony', 'Part time', 'RM8 per hours', '9 hours per day', 'Senai', 'Promoter at Econsave');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

DROP TABLE IF EXISTS `jobseeker`;
CREATE TABLE IF NOT EXISTS `jobseeker` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `ContactNumber` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`ID`, `Username`, `Password`, `dob`, `Gender`, `ContactNumber`, `Email`) VALUES
(28, 'WanNing', '1234', '2001-11-01', 'Female', '013-3256787', 'Wanning2001@gmail.com'),
(29, 'Wilson', '1234', '2001-10-08', 'Male', '016-6666666', 'Wilson1999@gmail.com'),
(33, 'James', '1234', '2000-03-13', 'Male', '016-7315212', 'hwangqileong2000@gmail.com'),
(35, 'Lizy', '1234', '2000-02-02', 'Female', '018-8293927', 'lizy@gmail.com'),
(36, 'Suga', '1234', '1999-02-02', 'Male', '0189283922', 'suga@gmail.com'),
(39, 'Kelson', '1234', '2008-02-14', 'Female', '0189999888', '1111111@gmail.com'),
(40, 'Jess123', '1234', '2017-07-04', 'Female', '+10122304918', 'yeechunloh@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
"# Testing002" 
