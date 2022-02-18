-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 10:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jongerenbetrokken`
--

-- --------------------------------------------------------

--
-- Table structure for table `activiteit`
--

CREATE TABLE `activiteit` (
  `activiteitId` int(11) NOT NULL,
  `activiteitNaam` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activiteit`
--

INSERT INTO `activiteit` (`activiteitId`, `activiteitNaam`) VALUES
(1, 'Sociale vaardigheden'),
(2, 'Communicatie vaardigheden'),
(3, 'Survivaltocht'),
(4, 'Een vaartocht '),
(5, 'Sportactiviteit'),
(7, 'Onderwater Hockey'),
(8, 'Voetballen');

-- --------------------------------------------------------

--
-- Table structure for table `jongeren`
--

CREATE TABLE `jongeren` (
  `jongerenId` int(11) NOT NULL,
  `jongerenNaam` varchar(128) NOT NULL,
  `jongerenEmail` varchar(128) NOT NULL,
  `jongerenGeboortedatum` varchar(128) NOT NULL,
  `jongerenWerkOpleiding` varchar(128) NOT NULL,
  `jongerenStartdatum` varchar(128) NOT NULL,
  `jongerenInschrijfdatum` varchar(128) NOT NULL,
  `jongerenPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jongeren`
--

INSERT INTO `jongeren` (`jongerenId`, `jongerenNaam`, `jongerenEmail`, `jongerenGeboortedatum`, `jongerenWerkOpleiding`, `jongerenStartdatum`, `jongerenInschrijfdatum`, `jongerenPwd`) VALUES
(1, 'Tim Bouma', 'timbouma6@gmail.com', '1996-10-22', 'Applicatie Ontwikkelaar', '2017-09-10', '2020-11-25', '$2y$10$y8op0qQjIpXbH6mgr8wOBulR5qXufx3L.dXAFN2zI.1KTZ4CpzbeK'),
(2, 'Dani Krossinng', 'danikrossing@gmail.com', '2006-04-07', 'Youtube tutorials', '2012-09-10', '2020-11-26', '$2y$10$uz9Zsyl5w5BoLBrjeSsoTefNV4JmAK9id2Y5gZiyAte0VN8f/Ad3C'),
(3, 'Jan Jansen', 'janjansen@gmail.com', '1985-05-04', 'Pannekoeken Bakker', '2010-10-11', '2020-10-27', '$2y$10$tP.l8XNI5w5QDqKZk9quHutD8Gb5BFAm1.hdddLtHAmlke3mRIhTy'),
(4, 'Milad', 'milad@gmail.com', '1996-10-22', 'Applicatie Ontwikkelaar', '2017-09-10', '2020-10-27', '$2y$10$tdzkA9nloPvYE37.FgBS6OE2AdyXqFm4KIzNPAkLq4Cb7KM49goRy');

-- --------------------------------------------------------

--
-- Table structure for table `jongerenactiviteit`
--

CREATE TABLE `jongerenactiviteit` (
  `jongerenactiviteitId` int(11) NOT NULL,
  `jongerenId` int(11) NOT NULL,
  `activiteitId` int(11) NOT NULL,
  `activiteitStartdatum` varchar(128) NOT NULL,
  `activiteitAfgerond` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jongerenactiviteit`
--

INSERT INTO `jongerenactiviteit` (`jongerenactiviteitId`, `jongerenId`, `activiteitId`, `activiteitStartdatum`, `activiteitAfgerond`) VALUES
(1, 1, 1, '2020-12-07', 'nee'),
(2, 2, 4, '2020-12-08', 'ja'),
(4, 2, 3, '2020-12-12', 'nee'),
(9, 1, 5, '2020-12-22', 'nee'),
(10, 3, 2, '2020-12-12', 'nee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activiteit`
--
ALTER TABLE `activiteit`
  ADD PRIMARY KEY (`activiteitId`);

--
-- Indexes for table `jongeren`
--
ALTER TABLE `jongeren`
  ADD PRIMARY KEY (`jongerenId`);

--
-- Indexes for table `jongerenactiviteit`
--
ALTER TABLE `jongerenactiviteit`
  ADD PRIMARY KEY (`jongerenactiviteitId`),
  ADD KEY `jongerenId` (`jongerenId`),
  ADD KEY `activiteitId` (`activiteitId`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activiteit`
--
ALTER TABLE `activiteit`
  MODIFY `activiteitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jongeren`
--
ALTER TABLE `jongeren`
  MODIFY `jongerenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jongerenactiviteit`
--
ALTER TABLE `jongerenactiviteit`
  MODIFY `jongerenactiviteitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
