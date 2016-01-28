-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2016 at 05:20 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--
CREATE DATABASE IF NOT EXISTS `school` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `school`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1121115995 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `Admin_Password`) VALUES
(1121115994, 'Jing Xian', 'X12345');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Stu_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Student_ID` int(10) NOT NULL,
  `Student_Name` varchar(100) NOT NULL,
  `Student_Password` varchar(20) NOT NULL,
  `Student_Gender` varchar(10) NOT NULL,
  `Student_Date` date NOT NULL,
  `Student_Year` year(4) NOT NULL,
  PRIMARY KEY (`Stu_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Stu_ID`, `Student_ID`, `Student_Name`, `Student_Password`, `Student_Gender`, `Student_Date`, `Student_Year`) VALUES
(1, 111111, 'ali', 'ali', 'Male', '2017-03-08', 2017),
(2, 222222, 'ahmad', 'ahmad', 'Male', '2016-01-21', 2016),
(3, 333333, 'kiti', 'kiti', 'Female', '2018-04-19', 2018),
(4, 444444, 'jonan', 'jonan', 'Male', '2016-12-02', 2016),
(6, 0, 'ili', 'jk', 'Male', '0000-00-00', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `Subject_ID` int(3) NOT NULL AUTO_INCREMENT,
  `Subject_Code` varchar(8) NOT NULL,
  `Subject_Title` varchar(100) NOT NULL,
  `Subject_Date` date NOT NULL,
  `Subject_Time` time NOT NULL,
  `Adm_ID` int(10) NOT NULL,
  `Subject_Year` year(4) NOT NULL,
  PRIMARY KEY (`Subject_ID`),
  KEY `Adm_ID` (`Adm_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_ID`, `Subject_Code`, `Subject_Title`, `Subject_Date`, `Subject_Time`, `Adm_ID`, `Subject_Year`) VALUES
(10, 'efqed', 'edqwdqw', '2016-01-21', '11:00:00', 1121115994, 2016),
(11, 'ff', 'ff', '2017-02-16', '12:00:00', 1121115994, 2017),
(12, '   DCS22', 'mathematics', '2016-12-28', '00:20:16', 1121115994, 2016),
(13, 'TOP2231', 'Object-oriented programming', '2018-04-04', '09:00:00', 1121115994, 2018),
(14, '', '', '0000-00-00', '00:00:00', 1121115994, 0000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
