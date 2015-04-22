-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2014 at 05:29 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `minibizi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
`BusinessID` int(11) unsigned NOT NULL,
  `UserID` int(11) unsigned NOT NULL,
  `BusinessName` varchar(128) DEFAULT NULL,
  `Address` varchar(128) DEFAULT NULL,
  `City` varchar(128) DEFAULT NULL,
  `Country` varchar(128) DEFAULT NULL,
  `PostalCode` varchar(20) DEFAULT NULL,
  `Phone` int(20) DEFAULT NULL,
  `StockName` varchar(11) DEFAULT NULL,
  `DateOpened` varchar(128) DEFAULT NULL,
  `ProfileImage` varchar(128) DEFAULT NULL,
  `DailyTarget` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`BusinessID`, `UserID`, `BusinessName`, `Address`, `City`, `Country`, `PostalCode`, `Phone`, `StockName`, `DateOpened`, `ProfileImage`, `DailyTarget`) VALUES
(3, 1, 'Mr Bills Steak House', '123 Coop Street', 'Lipa', 'United States', '60004', 1231231234, 'MSFT', 'October 10, 1990', NULL, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE IF NOT EXISTS `journals` (
`JournalID` int(11) unsigned NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BusinessID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `NetSales` float DEFAULT NULL,
  `TransactionCount` int(11) DEFAULT NULL,
  `Expenses` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`JournalID`, `UserID`, `BusinessID`, `Date`, `Time`, `NetSales`, `TransactionCount`, `Expenses`) VALUES
(1, 1, 3, '2014-11-01', '18:06:54', 1556, 2, 322),
(2, 1, 3, '2014-11-02', '18:07:38', 1235, 2, 343),
(4, 1, 3, '2014-11-03', '18:07:38', 900, 2, 200),
(5, 1, 3, '2014-11-04', '18:07:38', 1293, 2, 200),
(6, 1, 3, '2014-11-05', '18:07:38', 790, 2, 240),
(7, 1, 3, '2014-11-06', '18:07:38', 1800, 2, 500),
(8, 1, 3, '2014-11-07', '18:07:38', 2000, 2, 340),
(9, 1, 3, '2014-11-08', '18:07:38', 1002, 2, 234),
(10, 1, 3, '2014-11-09', '18:07:38', 2303, 2, 432),
(11, 1, 3, '2014-11-11', '18:07:38', 1432, 2, 100),
(12, 1, 3, '2014-11-10', '18:07:38', 2042, 2, 540),
(13, 1, 3, '2014-11-12', '06:47:43', 2224, 23, 34),
(14, 1, 3, '2014-11-13', '18:07:38', 1093, 2, 500),
(15, 1, 3, '2014-11-14', '18:07:38', 999, 2, 800),
(16, 1, 3, '2014-11-15', '18:07:38', 1000, 2, 300),
(17, 1, 3, '2014-11-16', '18:07:38', 1300, 2, 600),
(18, 1, 3, '2014-11-17', '18:07:38', 1201, 2, 900),
(19, 1, 3, '2014-11-18', '18:07:38', 1207, 2, 300),
(20, 1, 3, '2014-11-19', '15:16:25', 1699, 7, 1000),
(21, 1, 3, '2014-11-20', '18:07:38', 2165, 2, 800),
(22, 1, 3, '2014-11-21', '14:31:06', 1400, 23, 650),
(23, 1, 3, '2014-11-22', '18:07:38', 1300, 2, 400),
(24, 1, 3, '2014-11-23', '18:07:38', 1432, 2, 654),
(25, 1, 3, '2014-11-24', '18:07:38', 1005, 2, 234),
(26, 1, 3, '2014-11-25', '18:07:38', 987, 2, 654),
(27, 1, 3, '2014-11-26', '18:07:38', 944, 2, 345),
(29, 1, 3, '2014-11-28', '18:07:38', 900, 2, 500),
(30, 1, 3, '2014-11-29', '18:07:38', 1300, 2, 700),
(31, 1, 3, '2014-11-30', '18:07:38', 1233, 2, 340),
(33, 1, 3, '2014-12-02', '14:36:53', 1589.23, 40, 700.43),
(34, 1, 3, '2014-12-03', '01:36:44', 1409.32, 34, 490.43),
(56, 1, 3, '2014-12-01', '14:36:53', 1489.23, 35, 500.34),
(57, 1, 3, '2014-12-04', '23:26:54', 1600.23, 40, 444.34),
(58, 1, 3, '2014-12-05', '14:36:53', 1560.23, 35, 434.83),
(59, 1, 3, '2014-12-06', '14:36:53', 1800.23, 35, 644.33),
(60, 1, 3, '2014-12-07', '14:36:53', 2000.73, 35, 444.83),
(61, 1, 3, '2014-12-08', '14:36:53', 2100.23, 35, 544.03),
(62, 1, 3, '2014-12-09', '14:36:53', 1900.23, 35, 344.33),
(63, 1, 3, '2014-12-10', '14:36:53', 1800.23, 35, 444.23),
(64, 1, 3, '2014-12-11', '14:57:16', 1000, 12, 233.32),
(65, 1, 3, '2014-12-12', '14:58:55', 1234.34, 54, 900.43),
(66, 1, 3, '2014-12-13', '21:11:04', 1234.34, 23, 100.23),
(67, 1, 3, '2014-12-14', '23:27:34', 1530.43, 23, 345.43);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`UserID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` varchar(128) NOT NULL DEFAULT '',
  `Email` varchar(128) NOT NULL,
  `FirstName` varchar(128) DEFAULT NULL,
  `LastName` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`) VALUES
(1, 'bill', '$1$82960335$ULeH0CasdpCP6/c17WtMi0', 'billgates@microsoft.com', 'Bill', 'Gates');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
 ADD PRIMARY KEY (`BusinessID`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
 ADD PRIMARY KEY (`JournalID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
MODIFY `BusinessID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
MODIFY `JournalID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
