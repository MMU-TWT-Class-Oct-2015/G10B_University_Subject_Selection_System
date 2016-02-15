-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2016 at 07:33 AM
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
  `Admin_Password` varchar(100) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1121115995 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Name`, `Admin_Password`) VALUES
(1121115994, '  Jackie  ', '82a128f7f888823aefd5024b45220ff8');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `Order_ID` varchar(10) NOT NULL,
  `StudID` int(10) NOT NULL,
  `Order_Title` varchar(100) NOT NULL,
  `Order_Date` date NOT NULL,
  `Order_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `StudID`, `Order_Title`, `Order_Date`, `Order_Time`) VALUES
(' DCS22 ', 1, 'mathematic', '2016-12-28', '00:20:16'),
(' DCS22 ', 0, 'mathematic', '2016-12-28', '00:20:16'),
(' DCS22 ', 111, 'mathematic', '2016-12-28', '00:20:16'),
('  DCS444', 111, 'Computer Security', '2016-02-27', '11:00:00'),
(' DCS22 ', 111, 'mathematic', '2016-12-28', '00:20:16');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `Stu_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Student_ID` int(10) NOT NULL,
  `Student_Name` varchar(100) NOT NULL,
  `Student_Password` varchar(100) NOT NULL,
  `Student_Gender` varchar(10) NOT NULL,
  `Student_Date` date NOT NULL,
  `Student_Year` year(4) NOT NULL,
  PRIMARY KEY (`Stu_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Stu_ID`, `Student_ID`, `Student_Name`, `Student_Password`, `Student_Gender`, `Student_Date`, `Student_Year`) VALUES
(1, 111, 'ali', '86318e52f5ed4801abe1d13d509443de', 'Male', '2016-02-29', 2016),
(2, 222, 'admad', '24b0be9388da52386dcbfe26fcb7d0a7', 'Male', '2017-06-14', 2017),
(3, 333, 'Jult', '3aabe832145187f50b1b9bc1b88c89c6', 'Female', '2018-07-18', 2018),
(4, 0, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', '0000-00-00', 0000),
(5, 0, '', 'd41d8cd98f00b204e9800998ecf8427e', 'Male', '0000-00-00', 0000),
(6, 0, 'wqdqwd', 'bf9afc6d7a70a93fbf860d70b72b328c', 'Male', '2016-02-16', 2016),
(7, 0, 'wqdqwd', 'a2958ec16247ad36c229546487296c93', 'Male', '2016-02-24', 0000),
(8, 0, 'wqdqw', 'a2958ec16247ad36c229546487296c93', 'Male', '2016-02-25', 2016),
(9, 0, 'cc', '9df62e693988eb4e1e1444ece0578579', 'Male', '2016-02-17', 0000);

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
(10, 'DCS8080', 'Business', '2017-04-06', '10:00:00', 1121115994, 2017),
(12, ' DCS22 ', 'mathematic', '2016-12-28', '00:20:16', 1121115994, 2016),
(13, 'TOP2231', 'Object-oriented programming', '2018-04-04', '09:00:00', 1121115994, 2018),
(14, '  DCS444', 'Computer Security', '2016-02-27', '11:00:00', 1121115994, 2016);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
