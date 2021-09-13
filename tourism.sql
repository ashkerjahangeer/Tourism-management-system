-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 12:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `mobileno` bigint(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `travelmode` enum('Flight','Train','Bus') NOT NULL,
  `noofadults` int(11) NOT NULL,
  `noofchildren` int(11) NOT NULL,
  `stayamount` int(11) NOT NULL,
  `foodamount` int(11) NOT NULL,
  `travelamount` int(11) NOT NULL,
  `totalamount` int(11) NOT NULL,
  `bookingdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `tourdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `pid`, `uid`, `mobileno`, `address`, `travelmode`, `noofadults`, `noofchildren`, `stayamount`, `foodamount`, `travelamount`, `totalamount`, `bookingdate`, `tourdate`) VALUES
(72, 1, 21, 0, '', 'Flight', 3, 3, 38250, 36000, 22500, 96750, '2019-11-20 10:03:46', '2019-11-21'),
(74, 1, 23, 0, '', 'Flight', 4, 3, 46750, 44000, 27500, 118250, '2019-11-20 10:44:40', '2019-11-20'),
(91, 7, 11, 33333222, 'dasasd', 'Train', 3, 2, 34000, 32000, 20000, 86000, '2019-11-21 06:13:28', '2019-11-27');

--
-- Triggers `booking`
--
DELIMITER $$
CREATE TRIGGER `decrementnoofpackages` AFTER INSERT ON `booking` FOR EACH ROW update packages set noofpackages = noofpackages-1 where packages.pid=new.pid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_booking_enquiry` AFTER DELETE ON `booking` FOR EACH ROW delete from enquiry where bid=old.bid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_booking_travel` AFTER DELETE ON `booking` FOR EACH ROW delete from travel where bid=old.bid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `incrementnoofpackages` AFTER DELETE ON `booking` FOR EACH ROW UPDATE packages set noofpackages= noofpackages+1 where packages.pid=old.pid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `eid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `enquirydate` timestamp NOT NULL DEFAULT current_timestamp(),
  `enquiry` varchar(255) NOT NULL,
  `response` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`eid`, `bid`, `pid`, `uid`, `enquirydate`, `enquiry`, `response`) VALUES
(24, 74, 1, 23, '2019-11-20 10:50:34', 'cool', 'asdas');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `pid` int(11) NOT NULL,
  `place` varchar(50) NOT NULL,
  `noofpackages` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `stayamount` int(11) NOT NULL,
  `foodamount` int(11) NOT NULL,
  `travelamount` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `nights` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pid`, `place`, `noofpackages`, `description`, `stayamount`, `foodamount`, `travelamount`, `days`, `nights`, `image`) VALUES
(1, 'Ranipuram', 3, 'Hill Station', 500, 500, 1000, 1, 2, 'ranipuram.jpg'),
(3, 'Coorg', 2, 'The Scotland Of India', 2500, 2000, 2000, 2, 2, 'coorg.jpg'),
(7, 'Manali', 3, 'The Himalayan Beauty', 8500, 8000, 5000, 10, 11, 'manali.jpg');

--
-- Triggers `packages`
--
DELIMITER $$
CREATE TRIGGER `delete_package_booking` AFTER DELETE ON `packages` FOR EACH ROW delete from booking where pid=old.pid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_package_enquiry` AFTER DELETE ON `packages` FOR EACH ROW delete from enquiry where pid=old.pid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_package_travel` AFTER UPDATE ON `packages` FOR EACH ROW delete from travel where pid=old.pid
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `tid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `bid` int(11) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `vehiclename` varchar(50) NOT NULL,
  `startdate` date NOT NULL,
  `hotelname` varchar(50) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'admin'),
(11, 'jasimabduljamall@gmail.com', 'jasim', 'user'),
(21, 'ashker', 'ashker', 'user'),
(23, 'harsha', 'harsha', 'user'),
(24, 'jasimjamal', 'jasim', 'user');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `delete_user_booking` AFTER DELETE ON `users` FOR EACH ROW delete from booking where uid=old.uid
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_user_enquiry` AFTER DELETE ON `users` FOR EACH ROW delete from enquiry where uid=old.uid
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
