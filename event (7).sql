-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 01:09 PM
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
  `organized_by` varchar(120) NOT NULL,
  `venu` varchar(120) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `start_event` date NOT NULL,
  `end_event` date NOT NULL,
  `color` varchar(30) NOT NULL,
  `funded_by` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `organized_by`, `venu`, `Description`, `start_event`, `end_event`, `color`, `funded_by`) VALUES
(174, 'E-learning 2019', 'daw', 'dwa', 'dwa', '2019-11-09', '2019-11-07', 'orange', 'Select new Funder'),
(175, 'The charity Event of the Year!', 'daw', 'dwa', '', '2019-11-07', '2019-11-07', '#dc3545b5', 'Select new Funder'),
(176, 'An Occasion for charity', 'daw', 'daw', '', '2019-11-08', '2019-11-08', '#dc3545b5', 'Select new Funder'),
(177, 'E-learning Charity Fundraiser', 'dwa', 'daw', '', '2019-11-14', '2019-11-14', '#e731e7', 'Select new Funder'),
(178, 'The charity Experience', 'adw', 'daw', '', '2019-11-15', '2019-11-15', 'yellow', 'Select new Funder'),
(179, 'E-learning Conference', 'daw', 'daw', '', '2019-11-16', '2019-11-16', '#b4b4b4', 'Select new Funder'),
(180, 'Training Fundraiser', 'daw', 'daw', '', '2019-11-15', '2019-11-15', '#00ff00', 'Select new Funder'),
(181, 'Training Conference', 'daw', 'dwa', '', '2019-11-13', '2019-11-13', '#007bff80', 'Select new Funder');

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
(38, 2, 174),
(40, 7, 174),
(51, 19, 177),
(49, 20, 175),
(52, 20, 178),
(54, 21, 180),
(50, 22, 176),
(53, 22, 179),
(55, 22, 181);

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
(27, 'Muzahid');

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
(27, 'Nursing Institute Munshiganj', 'Munshiganj', '', ''),
(28, 'Nursing Institute Pabna', 'Pabna', '', ''),
(29, 'Fouzdarhat Nursing College', 'Fouzdarhat', '', ''),
(30, 'Nursing Institute Jessore', 'Jessore', '', ''),
(31, 'Nursing Institute Comilla', 'Comilla', '', ''),
(32, 'Kustia Nursing Institute', 'Kustia', '', ''),
(33, 'Nursing Institute Pirojpur', 'Pirojpur', '', ''),
(34, 'Nursing College Manikganj', 'Manikganj', '', ''),
(35, 'Nursing Institute Satkhira', 'Satkhira', '', ''),
(36, 'Nursing Institute Faridpur', 'Faridpur', '', ''),
(37, 'Nursing College Bogra', 'Bogra', '', ''),
(38, 'Nursing College Rangpur', 'Rangpur', '', ''),
(39, 'Nursing Institute Patuakhali', 'Patuakhali', '', ''),
(40, 'Nursing Institute Naogoan', 'Naogoan', '', ''),
(41, 'Nursing Institute Chandpur', 'Chandpur', '', ''),
(42, 'Rajshahi Nursing College', 'Rajshahi', '', ''),
(43, 'Nursing Institute Moulvibazar', 'Moulvibazar', '', ''),
(44, 'Nursing Institute Hobigang', 'Hobigang', '', ''),
(45, 'Nursing Institute Tangail', 'Tangail', '', ''),
(47, 'Khulna Nursing College', 'Khulna', '', ''),
(48, 'Nursing College Dinajpur', 'Dinajpur', '', ''),
(49, 'Mymensingh Nursing College', 'Mymensingh', '', ''),
(50, 'Dhaka Nursing College', 'Dhaka', '', ''),
(51, 'Sylhet Nursing College', 'Sylhet', '', ''),
(52, 'Nursing Institute Kurigram', 'Kurigram', '', ''),
(53, 'Nursing Institute Mitford', 'Mitford', '', ''),
(54, 'Barisal Nursing College', 'Barisal', '', ''),
(55, 'Nursing Institute Rangamati', 'Rangamati', '', ''),
(56, 'Nursing Institute Noakhali', 'Noakhali', '', ''),
(57, 'Nursing Institute Rajbari', 'Rajbari', '', ''),
(58, 'Nursing Institute Kishoregonj', 'Kishoregonj', '', ''),
(59, 'Nursing Institute Sirajgonj', 'Sirajgonj', '', ''),
(60, 'Nursing Institute Feni', 'Feni', '', ''),
(61, 'Nursing Institute Jhenaidah', 'Jhenaidah', '', ''),
(62, 'Nursing Institute Gopalgonj', 'Gopalgonj', '', ''),
(63, 'Nursing Institute Joypurhat', 'Joypurhat', '', ''),
(64, 'Nursing College Chittagonj', 'Chittagong ', '', '');

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
(17, 50, 'Nursing Faculty ', 'Nasima Perveen', 1715154547, ''),
(18, 50, 'Midwifery Faculty (SRHR) ', 'Dalia Akter', 1867397199, ''),
(19, 50, 'Midwifery Faculty (SRHR) ', 'Jesmin Akter', 1911578934, ''),
(20, 50, 'Nursing Faculty', 'Amina Begum', 1712096255, ''),
(21, 50, 'Nursing Faculty', 'Nurun Naher', 1553536326, ''),
(22, 50, 'Nursing Faculty', 'Rehena Khanum', 1711946130, ''),
(23, 50, 'Midwifery Faculty (SRHR) ', 'Mouluda Jahan', 1718076082, ''),
(24, 53, 'Midwifery Faculty (SRHR) ', 'Momtaz Begum', 1716355375, ''),
(25, 53, 'Nursing Faculty', 'Mosammat Nurjahan', 1818795804, ''),
(26, 53, 'Nursing Faculty', 'Namita Mondal', 0, ''),
(27, 53, 'Midwifery Faculty (SRHR) ', 'Nurjahan Begum', 1720447107, ''),
(28, 53, 'Nursing Faculty', 'Selina Khatun', 1715546409, ''),
(29, 49, 'Nursing Faculty (SRHR Faculty)', 'Momtaz Begum 2', 1717255401, ''),
(30, 49, 'Nursing Faculty (SRHR Faculty)', 'Rokeya Khatun', 0, ''),
(31, 58, 'Midwifery Faculty (SRHR) ', 'Jharna Rani Mandal', 1928218927, ''),
(32, 58, 'Midwifery Faculty (SRHR) ', 'Nilima Rani Barman', 1718894798, ''),
(33, 58, 'Nursing Faculty', 'Sheuly Begum', 1824333677, ''),
(34, 58, 'Nursing Faculty', 'Shila Rani Banik', 1717208283, ''),
(35, 58, 'Nursing Faculty', 'Most. Nazmun Nahar', 1716099739, ''),
(36, 58, 'Nursing Faculty', 'Keya Gosami', 1729167057, ''),
(37, 27, 'Nursing Faculty (SRHR Faculty)', 'Zohra Khatoon', 1818623222, ''),
(38, 27, 'Nursing Faculty', 'Suraia Akter', 1682310476, ''),
(39, 27, 'Nursing Faculty', 'Laila Yasmin', 1720300474, ''),
(40, 27, '', 'Gaitry Rani Chakraborti', 1911529282, ''),
(41, 27, 'Nursing Faculty (SRHR Faculty)', 'Mossamat: Mormohol', 0, ''),
(42, 38, 'Midwifery Faculty (SRHR) ', 'Most. Rehana Akter', 1712437423, ''),
(43, 38, 'Midwifery Faculty (SRHR) ', 'Sufia Begum', 1857768219, ''),
(44, 38, 'Midwifery Faculty (SRHR) ', 'Nargis Akter', 0, ''),
(45, 38, 'Midwifery Faculty (SRHR) ', 'JesmineAkter', 0, ''),
(46, 43, 'Nursing Faculty ', 'Setara Begum', 1673856579, ''),
(47, 43, 'Nursing Faculty ', 'Rezina Begum', 1912050983, ''),
(48, 43, 'Nursing Faculty ', 'Amita Singh', 0, ''),
(49, 43, 'Midwifery Faculty (SRHR) ', 'Mossamat: Delowara Begum', 0, ''),
(50, 43, 'Midwifery Faculty (SRHR)', 'Nazma Begum', 0, ''),
(51, 51, 'Midwifery Faculty (SRHR) ', 'Minara Khatun', 0, ''),
(52, 51, 'Nursing Faculty ', 'Gita Rani Sinha', 0, ''),
(53, 51, 'Midwifery Faculty (SRHR) ', 'Rokeya Khatun', 0, ''),
(54, 64, 'Midwifery Faculty (SRHR)', 'Merry Chowdhury', 1836852301, ''),
(55, 64, 'Midwifery Faculty (SRHR)', 'Lucky Das', 1726230264, ''),
(56, 64, 'Midwifery Faculty (SRHR) ', 'Purnima Nandy', 0, ''),
(57, 64, 'Nursing Faculty', 'Khadeza Akter', 1764495818, ''),
(58, 64, '', 'Urmila Bhatacharia', 1819339353, ''),
(59, 34, 'Midwifery Faculty (SRHR) ', 'Mst. Nurmohol Khatun', 0, ''),
(60, 34, 'Nursing Faculty ', 'Anowara', 1818776163, ''),
(61, 34, 'Midwifery Faculty (SRHR)', 'Rafiza Khatun', 0, ''),
(62, 34, 'Nursing Faculty ', 'Farida Yesmin', 0, ''),
(63, 34, 'Nursing Faculty ', 'Padma Rani Ghosh', 0, ''),
(64, 34, 'Midwifery Faculty (SRHR) ', 'Monira Khatun', 1793470022, ''),
(65, 55, 'Nursing Faculty (SRHR Faculty)', 'Krishna Chakma ', 1553675142, ''),
(66, 55, 'Midwifery Faculty (SRHR) ', 'Sumona Chakma', 1556596871, ''),
(67, 55, 'Midwifery Faculty (SRHR) ', 'Ripona Chakma', 1556541056, ''),
(68, 55, '', 'Seema  Mondal', 0, ''),
(69, 55, 'Midwifery Faculty (SRHR) ', 'Mossamat: Parvin Akter', 0, ''),
(70, 55, 'Midwifery Faculty (SRHR) ', 'Anti Chakma', 0, ''),
(71, 37, 'Nursing Faculty', 'Mst. Farida Yesmin', 1918076952, ''),
(72, 37, 'Nursing Faculty ', 'Most. Arse Ara Begum', 1716962208, ''),
(73, 37, 'Nursing Faculty ', 'Fatema Khatun', 1878020514, ''),
(74, 37, 'Nursing Faculty', 'Nasrin Akter', 1749122909, ''),
(75, 37, '', 'Most. Nargis Ara Begum (Akter)', 1710190195, ''),
(76, 59, 'Nursing Faculty (SRHR Faculty)', 'Mst. Momtaj Mohol', 1717673396, ''),
(77, 59, 'Nursing Faculty (SRHR Faculty)', 'Rehana Khatun', 1712062064, ''),
(78, 59, 'Nursing Faculty (SRHR Faculty)', 'Nazma Yasmin', 1731966024, ''),
(79, 59, 'Nursing Faculty (SRHR Faculty)', 'Hamida Khatun', 1916435927, ''),
(80, 59, 'Nursing Faculty ', 'Suriya Banu', 0, ''),
(81, 59, 'Nursing Faculty ', 'Ferdousi Begum', 0, ''),
(82, 54, 'Nursing Faculty', 'Aklima Begum', 1719408368, ''),
(83, 54, 'Midwifery Faculty (SRHR) ', 'Anowara', 1917686175, ''),
(84, 54, 'Nursing Faculty', 'Mosammat Mariam', 1917686175, ''),
(85, 54, 'Nursing Faculty', 'Mosammat Momtaz Begum', 1715022192, ''),
(86, 54, 'Nursing Faculty', 'Nasima Akter (Khatun)', 1796689625, ''),
(87, 54, 'Midwifery Faculty (SRHR) ', 'Hasina Akter', 1629000402, ''),
(88, 62, 'Nursing Faculty', 'Archana Khan', 1726404224, ''),
(89, 62, 'Nursing Faculty ', 'Gita Rani Biswas', 1779493983, ''),
(90, 62, 'Nursing Faculty ', 'Chameli Biswas', 0, ''),
(91, 62, 'Nursing Faculty', 'Dhabali Joydhar', 1712464425, ''),
(92, 62, 'Nursing Faculty', 'Niparna Bhakta', 1724527417, ''),
(93, 62, 'Nursing Faculty', 'Tripti Lata Biswas', 1712431108, ''),
(94, 48, 'Midwifery Faculty (SRHR) ', 'Most. Rebeka Khatun', 1734899005, ''),
(95, 48, 'Midwifery Faculty (SRHR) ', 'Most. Aleyaparvin', 1754536133, ''),
(96, 48, 'Nursing Faculty ', 'Kohinoor Begum', 1715359740, ''),
(97, 48, 'Nursing Faculty', 'Sikha Biswas', 1712931777, ''),
(98, 48, 'Nursing Faculty', 'Bina Das', 0, ''),
(99, 48, 'Nursing Faculty', 'Tanzila Khatun', 0, ''),
(100, 45, 'Midwifery Faculty (SRHR) ', 'Mosammat Marium Begum', 1739706878, ''),
(101, 45, 'Midwifery Faculty (SRHR) ', 'Most. Nargis Nahar', 1713860422, ''),
(102, 45, 'Nursing Faculty', 'Amina Akter', 0, ''),
(103, 45, 'Nursing Faculty', 'Shamsun Naher', 0, ''),
(104, 45, 'Nursing Faculty', 'Nasrin Sultana', 1794028320, ''),
(105, 45, 'Nursing Faculty', 'Rowshan Ara Khan', 0, ''),
(106, 42, 'Midwifery Faculty (SRHR) ', 'Most. Momtaz Begum', 1713860422, ''),
(107, 42, 'Midwifery Faculty (SRHR) ', 'Nazma Sultana', 1716155623, ''),
(108, 42, 'Midwifery Faculty (SRHR) ', 'Rowshan Ara Begum', 1773845090, ''),
(109, 42, 'Midwifery Faculty (SRHR) ', 'Maksuda Khatun', 1765716122, ''),
(110, 42, 'Nursing Faculty', 'Ferdous Ara', 0, ''),
(111, 42, 'Nursing Faculty', 'Rowshon Ara', 1715361958, ''),
(112, 42, 'Midwifery Faculty (SRHR) ', 'Baby Khatun', 0, ''),
(113, 56, 'Midwifery Faculty (SRHR) ', 'AklimaAkter', 1710807037, ''),
(114, 56, 'Midwifery Faculty (SRHR) ', 'Kalsarun Nahar', 1818151493, ''),
(115, 56, 'Nursing Faculty', 'Dilruba Siddika', 0, ''),
(116, 56, 'Nursing Faculty', 'Khaleda Khanum', 1715164193, ''),
(117, 56, 'Midwifery Faculty (SRHR) ', 'Kamrun Nahar', 0, ''),
(118, 28, 'Midwifery Faculty (SRHR) ', 'Most. Aklima Khatun', 0, ''),
(119, 28, 'Nursing Faculty', 'Most. Jamela Khatun', 0, ''),
(120, 28, 'Midwifery Faculty (SRHR) ', 'Most. Masuda Parvin', 1720939346, ''),
(121, 28, 'Nursing Faculty', 'Most. Monjila Khatun', 0, ''),
(122, 28, 'Nursing Faculty', 'Mst. Shefali Khanam', 0, ''),
(123, 41, 'Nursing Faculty', 'Moshammmed Jaynab Begum', 1819882129, ''),
(124, 41, 'Nursing Faculty', 'Most. Mukta Begum', 1744282207, ''),
(125, 41, 'Nursing Faculty', 'Mossamat Salina Akter', 1716086800, ''),
(126, 41, 'Nursing Faculty', 'Shahanara Akter', 1728093225, ''),
(127, 41, 'Midwifery Faculty (SRHR) ', 'Mushrat Jahan', 1927915250, ''),
(128, 61, 'Nursing Faculty', 'Bela Rani Saha', 1915937977, ''),
(129, 61, 'Nursing Faculty', 'Most. Rozena Khatun', 1724177690, ''),
(130, 61, 'Nursing Faculty', 'Mst. Lina Nasrin', 1711965477, ''),
(131, 61, 'Nursing Faculty', 'Mst. Rahana Banu', 1744770262, ''),
(132, 61, 'Midwifery Faculty (SRHR) ', 'Selina Akter ', 0, ''),
(133, 61, 'Midwifery Faculty (SRHR) ', 'Most. Shahanaz perveen', 0, ''),
(134, 30, 'Nursing Faculty', 'Afroja Khatun', 0, ''),
(135, 30, 'Nursing Faculty', 'Mst. Rokeya Khanam', 1717863643, ''),
(136, 30, 'Midwifery Faculty (SRHR) ', 'Most. Rehana Akter', 1731477674, ''),
(137, 30, 'Midwifery Faculty (SRHR) ', 'Monoara Khatun', 1718827667, ''),
(138, 29, 'Nursing Faculty', 'Sadia Mostafa', 1819475616, ''),
(139, 29, 'Nursing Faculty', 'Shirina Akhter', 1733982981, ''),
(140, 29, 'Nursing Faculty', 'Shampa Barua', 1554310790, ''),
(141, 29, 'Nursing Faculty', 'Pritikana Barua', 0, ''),
(142, 32, 'Midwifery Faculty (SRHR) ', 'Most. Zubayda Rokshanara Khatu', 1779687143, ''),
(143, 32, 'Midwifery Faculty (SRHR) ', 'Most. Shamsunnaher', 1710177522, ''),
(144, 32, 'Nursing Faculty', 'Nasrin Sultana', 1723954354, ''),
(145, 32, 'Nursing Faculty', 'Rownak Jahan', 1716984809, ''),
(146, 32, 'Nursing Faculty', 'Sabnam Mushtary', 1712161013, ''),
(147, 40, 'Nursing Faculty', 'Jibon Nessa', 0, ''),
(148, 40, 'Nursing Faculty', 'Kohinoor ', 0, ''),
(149, 40, 'Nursing Faculty', 'Mosa. Roushan Ara Begum', 0, ''),
(150, 40, 'Midwifery Faculty (SRHR) ', 'Hasna Hena', 1745318796, ''),
(151, 40, 'Midwifery Faculty (SRHR) ', 'Anowara begum', 1921483023, ''),
(152, 63, 'Midwifery Faculty (SRHR) ', 'Shahanara Begum', 1712230923, ''),
(153, 63, 'Nursing Faculty', 'Musrshida Begum', 1729574887, ''),
(154, 63, 'Nursing Faculty', 'Nasima Shahin', 1710647631, ''),
(155, 63, 'Nursing Faculty', 'Aklima Khatun', 0, ''),
(156, 63, 'Nursing Faculty', 'Morsheda Dewan', 0, ''),
(157, 44, 'Nursing Faculty', 'Protima Rani Sarker', 1718542562, ''),
(158, 44, 'Nursing Faculty', 'Salma Begum', 1718222823, ''),
(159, 44, 'Nursing Faculty (SRHR Faculty)', 'Hena Rani Bala', 1711452042, ''),
(160, 44, 'Nursing Faculty (SRHR Faculty)', 'Shampa Rani Das', 1716295181, ''),
(161, 33, 'Nursing Faculty', 'Baby Roy', 0, ''),
(162, 33, 'Nursing Faculty', 'Minati Rani Maitra', 0, ''),
(163, 33, 'Nursing Faculty', 'Minoti Rani', 0, ''),
(164, 33, 'Nursing Faculty', 'Most.Jesminara Khanam', 0, ''),
(165, 33, 'Nursing Faculty (SRHR Faculty)', 'Shilpi Rani Sadhak', 1758401784, ''),
(166, 60, 'Nursing Faculty', 'Beauty Rani Majumder', 0, ''),
(167, 60, 'Nursing Faculty', 'Mst Meherun Nessa', 2147483647, ''),
(168, 60, 'Nursing Faculty', 'Tahmina Khanam', 167489727, ''),
(169, 60, 'Nursing Faculty', 'Shilpi Mazumder', 0, ''),
(170, 60, 'Nursing Faculty (SRHR Faculty)', 'Delowara Begum', 1819141492, ''),
(171, 36, 'Nursing Faculty', 'Shukla Bhakta', 1718, ''),
(172, 36, 'Nursing Faculty (SRHR Faculty)', 'Sultana Parvin', 1731956170, ''),
(173, 36, 'Nursing Faculty', 'Suniti Biwas', 0, ''),
(174, 31, 'Nursing Faculty', 'Akbori Khanam', 1727658307, ''),
(175, 31, 'Nursing Faculty', 'Dilruba Akter Ansaree', 1818102103, ''),
(176, 31, 'Nursing Faculty', 'Ferdousi Akter', 0, ''),
(177, 31, 'Nursing Faculty', 'Gulshan Akter', 1916858732, ''),
(178, 31, 'Nursing Faculty', 'Most. Shirin Akter', 1778311308, ''),
(179, 31, 'Midwifery Faculty (SRHR) ', 'Aoulia Khatun', 1717343704, ''),
(180, 35, 'Nursing Faculty', 'Archana Prova Mistry', 1739482627, ''),
(181, 35, 'Nursing Faculty', 'Chanchala Rani', 1720586219, ''),
(182, 35, 'Nursing Faculty', 'Dipali Sarker', 0, ''),
(183, 39, 'Nursing Faculty', 'Most. Khadiza Basmin', 0, ''),
(184, 52, 'Nursing Faculty', 'Shikha Rani Dhali', 1712657082, ''),
(185, 52, 'Nursing Faculty', 'Shanti Rani Roy', 0, ''),
(186, 52, 'Nursing Faculty', 'Karuna  Rani Roy', 0, ''),
(187, 52, 'Nursing Faculty', 'Most. Rokeya Khatun', 0, ''),
(188, 57, 'Nursing Faculty', 'Aroti Rani Shil', 0, ''),
(189, 57, 'Nursing Faculty', 'Halima Khanam', 1716472627, ''),
(190, 57, 'Nursing Faculty', 'Ruma Hazarika', 1705999038, ''),
(191, 57, 'Nursing Faculty', 'Shaleha Khatun', 1717104388, ''),
(192, 57, 'Nursing Faculty', 'Suchitra Rani Nandi', 1714744818, ''),
(193, 57, 'Nursing Faculty', 'Pobittra Kundu', 1720800583, ''),
(194, 47, 'Nursing Faculty', 'Mst. Hosneara Khatun', 1717810631, ''),
(195, 47, 'Nursing Faculty', 'Mst. Khurshida Khatun', 1819693206, ''),
(196, 47, 'Nursing Faculty', 'Syeda Rokhsana Khanam', 1846720185, ''),
(197, 47, 'Nursing Faculty', 'Tahmina Akter', 1911016301, ''),
(198, 47, 'Nursing Faculty', 'Rahima Khatun', 1711936923, '');

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
(38, 181, 0),
(39, 181, 0),
(61, 181, 0),
(62, 181, 0),
(63, 181, 0),
(118, 181, 0),
(119, 181, 0),
(120, 181, 1),
(122, 181, 0),
(138, 181, 0),
(139, 181, 0),
(140, 181, 0),
(141, 181, 0),
(171, 181, 0),
(173, 181, 0),
(174, 181, 0),
(175, 181, 0),
(176, 181, 0),
(177, 181, 0),
(178, 181, 0),
(179, 181, 0);

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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `role`) VALUES
(1, 'Sadik Ahammed', 'sadik061@gmail.com', '1234', '21112019130605157433796501-1User-2-512.png', '1'),
(2, 'Rifat', 'rifat@gmail.com', '123', '16112019202853157393253467770181_2361602144160136_1564561134579613696_o.jpg', '0');

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
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `funded_by`
--
ALTER TABLE `funded_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `funder`
--
ALTER TABLE `funder`
  MODIFY `funder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `institute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `resource_person`
--
ALTER TABLE `resource_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `resource_person_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
