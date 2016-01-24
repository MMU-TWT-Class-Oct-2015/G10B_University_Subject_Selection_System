-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2016 at 05:51 PM
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
  `Student_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Student_Name` varchar(100) NOT NULL,
  `Student_Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Student_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `Student_Name`, `Student_Password`) VALUES
(111, 'ali', 'ali');

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
  `Admin_ID` int(10) NOT NULL,
  PRIMARY KEY (`Subject_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_ID`, `Subject_Code`, `Subject_Title`, `Subject_Date`, `Subject_Time`, `Admin_ID`) VALUES
(5, ' ioopo ', 'oooooooo', '2016-01-29', '03:03:00', 1121115994);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
