-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 28, 2014 at 05:20 AM
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
  `DateOpened` date DEFAULT NULL,
  `ProfileImage` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Businesses`
--

INSERT INTO `Businesses` (`BusinessID`, `UserID`, `BusinessName`, `Address`, `City`, `Country`, `PostalCode`, `Phone`, `DateOpened`, `ProfileImage`) VALUES
(3, 1, 'Lady Christines Baby Back Ribs', '123 Test Street', 'Lipa', 'Philippines', 'L26 123', 1231231233, '1992-10-15', NULL),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Journals`
--

CREATE TABLE `Journals` (
`JournalID` int(11) unsigned NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `BusinessID` int(11) DEFAULT NULL,
  `Date` int(11) DEFAULT NULL,
  `Time` int(11) DEFAULT NULL,
  `NetSales` int(11) DEFAULT NULL,
  `TransactionCount` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Journals`
--

INSERT INTO `Journals` (`JournalID`, `UserID`, `BusinessID`, `Date`, `Time`, `NetSales`, `TransactionCount`) VALUES
(1, 1, 3, NULL, 12, 12322, 2),
(2, 1, 3, NULL, 12, 1232, 2),
(3, 1, 4, NULL, 12, 10032, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `Username`, `Password`, `Email`, `FirstName`, `LastName`) VALUES
(1, 'bill', 'pass123', '', 'Bill', 'Gates'),
(2, 'bob', 'pass123', '', NULL, NULL),
(3, 'russ', 'pass123', '', NULL, NULL),
(4, 'newto', 'newtoopass', 'joe@gm.com', 'ha', NULL),
(5, 'newto', 'newtoopass', '', NULL, NULL);

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
MODIFY `JournalID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;