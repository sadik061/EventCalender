-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2019 at 07:43 AM
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
  `organized_by` varchar(120) NOT NULL,
  `venu` varchar(120) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `start_event` date NOT NULL,
  `end_event` date NOT NULL,
  `color` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `funded_by`, `organized_by`, `venu`, `Description`, `start_event`, `end_event`, `color`) VALUES
(153, 'E-learning', 'UNFPA', 'DGNM', 'Nursing Institute', 'example', '2019-10-24', '2019-10-24', '#007bff80'),
(161, 'Training', 'DGNM', 'DGNM', 'DGNM', 'Example', '2019-10-25', '2019-10-25', 'orange'),
(163, 'Champaign', 'Select new Funder', 'UNFPA', 'Nursing', '', '2019-10-17', '2019-10-17', 'orange'),
(172, 'checking', 'Select new Funder', 'ME', 'The ICT Hub', 'adw', '2019-11-07', '2019-11-07', 'orange');

-- --------------------------------------------------------

--
-- Table structure for table `funded_by`
--

CREATE TABLE `funded_by` (
  `id` int(11) NOT NULL,
  `funder_id` int(120) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funded_by`
--

INSERT INTO `funded_by` (`id`, `funder_id`, `event_id`) VALUES
(17, 2, 163),
(6, 8, 172),
(1, 23, 172);

-- --------------------------------------------------------

--
-- Table structure for table `funder`
--

CREATE TABLE `funder` (
  `funder_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funder`
--

INSERT INTO `funder` (`funder_id`, `name`) VALUES
(1, 'UNFPA'),
(2, 'DGNM'),
(7, 'DGHS'),
(8, 'DGFP'),
(9, 'BNMC'),
(10, 'DFID'),
(11, 'SIDA'),
(12, 'GAC'),
(14, 'UNICEF'),
(15, 'UNFPA'),
(16, 'JAICA'),
(17, 'KOIKA'),
(18, 'Save the Children'),
(19, 'OGSB'),
(20, 'FIGO'),
(21, 'NIPORT'),
(22, 'IPAS'),
(23, 'Care Bangladesh'),
(24, 'WHO'),
(28, 'sadik');

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
(24, 'Nursing Institute', 'Mymensingh', 'Comilla-80 Seats', '131412412'),
(25, 'Naoga Institute of Nursing', 'Sylhet', 'iie', '0101');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `institute_id` int(11) DEFAULT NULL,
  `Designation` varchar(30) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `contact` int(30) NOT NULL,
  `email` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `institute_id`, `Designation`, `name`, `contact`, `email`) VALUES
(8, 23, 'SRHR', 'rahima', 124, ''),
(9, 23, 'mid_Faculty', 'Nowshin', 168661564, ''),
(10, 23, 'Principal', 'Jamshed', 1234555, ''),
(11, 23, 'Nursing', 'Marybeth T. Hammond', 1556748464, 'dawdaw'),
(12, 24, 'Midwives', 'Sandra J. Reichert', 1651561515, ''),
(13, 25, 'Nurse', 'Nusrat', 101011, ''),
(14, 23, 'mid_Faculty', 'dwa', 21412412, 'dadawde');

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
(8, 153, 0),
(9, 153, 1),
(9, 172, 0),
(10, 172, 1),
(13, 153, 0),
(14, 153, 0);

-- --------------------------------------------------------

--
-- Table structure for table `resource_person`
--

CREATE TABLE `resource_person` (
  `id` int(11) NOT NULL,
  `namee` varchar(120) DEFAULT NULL,
  `organization` varchar(120) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_person`
--

INSERT INTO `resource_person` (`id`, `namee`, `organization`, `event_id`) VALUES
(2, 'daw', 'daw', 172),
(3, 'ssssss', 'ssssss', 172),
(4, 'da', 'dd', 172),
(5, 'sadik', 'ami', 172);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(200) NOT NULL,
  `image` varchar(1200) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `funded_by`
--
ALTER TABLE `funded_by`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `funder_id` (`funder_id`,`event_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `funder`
--
ALTER TABLE `funder`
  ADD PRIMARY KEY (`funder_id`);

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
-- Indexes for table `resource_person`
--
ALTER TABLE `resource_person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `funded_by`
--
ALTER TABLE `funded_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `funder`
--
ALTER TABLE `funder`
  MODIFY `funder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `resource_person`
--
ALTER TABLE `resource_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funded_by`
--
ALTER TABLE `funded_by`
  ADD CONSTRAINT `funded_by_ibfk_1` FOREIGN KEY (`funder_id`) REFERENCES `funder` (`funder_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `funded_by_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `resource_person`
--
ALTER TABLE `resource_person`
  ADD CONSTRAINT `resource_person_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
