-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2019 at 07:42 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `funded_by` varchar(120) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `funded_by`, `Description`, `start_event`, `end_event`, `color`) VALUES
(152, 'New color', 'UNFPA', 'dawad', '2019-10-23 03:30:00', '2019-10-23 09:00:00', 'orange'),
(153, 'aswd', 'dwa', 'dwad', '2019-10-23 00:00:00', '2019-10-24 00:00:00', '#007bff80'),
(154, '', '', '', '2019-10-23 00:00:00', '2019-10-24 00:00:00', 'orange'),
(155, 'wwnh', 'hbhj', '', '2019-10-23 00:00:00', '2019-10-24 00:00:00', '#dc3545b5');

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `institute_id` int(11) NOT NULL,
  `namee` varchar(100) DEFAULT NULL,
  `area` varchar(30) DEFAULT NULL,
  `address` varchar(400) NOT NULL,
  `contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`institute_id`, `namee`, `area`, `address`, `contact`) VALUES
(23, 'Midford Nursing Institute', 'Dhaka', 'Mitford Hospital, Dhaka- 80 Seats,', '1231234241'),
(24, 'Nursing Institute', 'Comilla', 'Comilla-80 Seats', '131412412');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `Designation` varchar(30) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `contact` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `institute_id`, `Designation`, `name`, `contact`) VALUES
(8, 23, 'Midwives', 'rahima', 124),
(9, 23, 'Nurse', 'Nowshin', 168661564),
(10, 23, 'Midwives', 'Jamshed', 1234555),
(11, 24, 'Midwives', 'Marybeth T. Hammond', 1556748464),
(12, 24, 'Midwives', 'Sandra J. Reichert', 1651561515),
(13, 24, 'Nurse', 'Jennie P. Willard', 351651651),
(14, 24, 'Nurse', 'Marjorie D. Chamberlin', 2147483647),
(15, 24, 'Nurse', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participents`
--

CREATE TABLE `participents` (
  `instructor_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `present` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participents`
--

INSERT INTO `participents` (`instructor_id`, `event_id`, `present`) VALUES
(8, 153, 1),
(8, 155, 1),
(9, 152, 1),
(10, 152, 1),
(13, 155, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`institute_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `institute_id` (`institute_id`);

--
-- Indexes for table `participents`
--
ALTER TABLE `participents`
  ADD PRIMARY KEY (`instructor_id`,`event_id`),
  ADD KEY `event_id` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`institute_id`) REFERENCES `institute` (`institute_id`) ON DELETE CASCADE;

--
-- Constraints for table `participents`
--
ALTER TABLE `participents`
  ADD CONSTRAINT `participents_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`instructor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participents_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
