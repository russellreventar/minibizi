-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 02, 2014 at 11:00 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Mini_Bizi`
--

-- --------------------------------------------------------

--
-- Table structure for table `Businesses`
--

CREATE TABLE `Businesses` (
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
-- Dumping data for table `Businesses`
--

INSERT INTO `Businesses` (`BusinessID`, `UserID`, `BusinessName`, `Address`, `City`, `Country`, `PostalCode`, `Phone`, `StockName`, `DateOpened`, `ProfileImage`, `DailyTarget`) VALUES
(3, 1, 'Lady Christines Baby Back Ribs', '123 Test Street', 'Lipa', 'Philippines', 'L26 123', 1231231234, 'GOOG', 'October 15, 1992', NULL, 1500),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Journals`
--

CREATE TABLE `Journals` (
`JournalID` int(11) unsigned NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BusinessID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `NetSales` float DEFAULT NULL,
  `TransactionCount` int(11) DEFAULT NULL,
  `Expenses` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Journals`
--

INSERT INTO `Journals` (`JournalID`, `UserID`, `BusinessID`, `Date`, `Time`, `NetSales`, `TransactionCount`, `Expenses`) VALUES
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
(13, 1, 3, '2014-11-12', '06:47:43', 34, 344, 34),
(14, 1, 3, '2014-11-13', '18:07:38', 1093, 2, 500),
(15, 1, 3, '2014-11-14', '18:07:38', 999, 2, 800),
(16, 1, 3, '2014-11-15', '18:07:38', 1000, 2, 300),
(17, 1, 3, '2014-11-16', '18:07:38', 1300, 2, 600),
(18, 1, 3, '2014-11-17', '18:07:38', 1201, 2, 900),
(19, 1, 3, '2014-11-18', '18:07:38', 1207, 2, 300),
(20, 1, 3, '2014-11-19', '15:16:25', 1699, 7, 1000),
(21, 1, 3, '2014-11-20', '18:07:38', 2165, 2, 800),
(22, 1, 3, '2014-11-21', '14:31:06', 0, 0, 650),
(23, 1, 3, '2014-11-22', '18:07:38', 1300, 2, 400),
(24, 1, 3, '2014-11-23', '18:07:38', 1432, 2, 654),
(25, 1, 3, '2014-11-24', '18:07:38', 1005, 2, 234),
(26, 1, 3, '2014-11-25', '18:07:38', 987, 2, 654),
(27, 1, 3, '2014-11-26', '18:07:38', 944, 2, 345),
(28, 1, 3, '2014-11-27', '18:07:38', 1100, 2, 688),
(29, 1, 3, '2014-11-28', '18:07:38', 900, 2, 500),
(30, 1, 3, '2014-11-29', '18:07:38', 1300, 2, 700),
(31, 1, 3, '2014-11-30', '18:07:38', 1233, 2, 340),
(33, 1, 3, '2014-12-02', '14:36:53', 1233, 3, 340),
(34, 1, 3, '2014-12-03', '18:07:38', 1233, 2, 340),
(35, 1, 3, '2014-12-04', '18:07:38', 1233, 2, 340),
(36, 1, 3, '2014-12-05', '18:07:38', 1233, 2, 340),
(37, 1, 3, '2014-12-06', '18:07:38', 1233, 2, 340),
(38, 1, 3, '2014-12-07', '18:07:38', 1233, 2, 340),
(39, 1, 3, '2014-12-08', '18:07:38', 1233, 2, 340),
(40, 1, 3, '2014-12-09', '18:07:38', 1233, 2, 340),
(41, 1, 3, '2014-12-10', '18:07:38', 1233, 2, 340),
(42, 1, 3, '2014-12-11', '18:07:38', 1233, 2, 340),
(43, 1, 3, '2014-12-12', '18:07:38', 1233, 2, 340),
(44, 1, 3, '2014-12-13', '18:07:38', 1233, 2, 340),
(45, 1, 3, '2014-12-14', '18:07:38', 1233, 2, 340),
(46, 1, 3, '2014-12-15', '18:07:38', 1233, 2, 340),
(47, 1, 3, '2014-12-01', '15:34:29', 12.22, 1, 10),
(48, 1, 3, '2014-12-23', '11:10:59', 1232.45, 4, 232.54),
(49, 1, 3, '2014-12-21', '05:37:53', 12, 12, 12),
(50, 1, 3, '2014-12-18', '15:35:02', 123.23, 20, 10.23);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
`UserID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Email` varchar(128) NOT NULL,
  `FirstName` varchar(128) DEFAULT NULL,
  `LastName` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`) VALUES
(1, 'bill', 'pass123', '', 'Bill', 'Gates'),
(2, 'bob', 'pass123', '', NULL, NULL),
(3, 'russ', 'pass123', '', NULL, NULL),
(4, 'newto', 'newtoopass', 'joe@gm.com', 'ha', NULL),
(5, 'newto', 'newtoopass', '', NULL, NULL),
(6, 'asd', 'asdasd', 'a@s', 'asd', 'asd'),
(7, 'sdf', 'sdfsdf', 'd@d', 'sdf', 'sdf'),
(10, 'qwer', '123123', 'w@s', 'hg', 'gh'),
(11, 'joac', 'asdasd', 'a@d', 'asd', 'asd'),
(12, 'billok', 'asdasd', 'a@d', 'sd', 'sd'),
(13, 'wer', 'werwer', 'w@w', 'wer', 'wer'),
(14, 'qwe', 'qweqwe', 'w@w', 'qwe', 'qwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Businesses`
--
ALTER TABLE `Businesses`
 ADD PRIMARY KEY (`BusinessID`);

--
-- Indexes for table `Journals`
--
ALTER TABLE `Journals`
 ADD PRIMARY KEY (`JournalID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
 ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Businesses`
--
ALTER TABLE `Businesses`
MODIFY `BusinessID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Journals`
--
ALTER TABLE `Journals`
MODIFY `JournalID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;