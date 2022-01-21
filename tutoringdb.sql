-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 04:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutoringdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminstrators`
--

CREATE TABLE `adminstrators` (
  `adminID` varchar(255) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminstrators`
--

INSERT INTO `adminstrators` (`adminID`, `Fname`, `Lname`, `Email`, `Password`, `Type`) VALUES
('61eaba784da34', 'shihab', 'Admin', 'shihab.admin@gmail.com', '$2y$10$EkM/Bpx6Jn1509Eju5j.P.0U7Hec5w0QCZWbiiGatdNCS0MLAM94.', 'adminstrator'),
('61eaba8c4aac3', 'bilal', 'Admin', 'Bilal.admin@gmail.com', '$2y$10$uUYd0kub2./A0rLDOID5KeQqazP71DLB6hV4mb.7lnC0pZW20IcPO', 'adminstrator');

-- --------------------------------------------------------

--
-- Table structure for table `auditors`
--

CREATE TABLE `auditors` (
  `auditorID` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `courseID` int(11) NOT NULL,
  `learnerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `averageRating` decimal(10,0) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `averageRating`, `price`, `description`, `picture`, `approved`) VALUES
(1, 'Data Structures', '0', 5000, 'ay haga', 'Ayya.gif', 1),
(2, 'Data Structures2', '0', 10000, 'ay haga 2', 'assassins_creed_syndicate_hand_knife_stick_102982_1920x1080.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `learners`
--

CREATE TABLE `learners` (
  `learnerID` varchar(255) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `profilePicture` text DEFAULT NULL,
  `Type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `learners`
--

INSERT INTO `learners` (`learnerID`, `Fname`, `Lname`, `Email`, `Password`, `profilePicture`, `Type`) VALUES
('61eabd8ea6706', 'shihab', 'learner', 'shihab.learner@mail.com', '$2y$10$sI30TgE0wh.BwD0/sSPFjOQpiM8Od7mYKM4pVra.WE7bbiR2cTukq', 'pictures/profile/default.png', 'learner'),
('61eac18477237', 'fady', 'learner', 'fady@gmail.com', '$2y$10$6cgcsNhmsXfHYxKYg.H2vejo1pB70rKDCAMPdu.Pex4liX7IAXDT.', 'pictures/profile/default.png', 'learner');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `courseID` int(11) NOT NULL,
  `materialPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `sent_by` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createdAt` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sent_by`, `received_by`, `message`, `createdAt`) VALUES
(120, '61eaba8c4aac3', '61eabd8ea6706', 'hi', '2022-01-21 03:21:10pm'),
(121, '61eaba8c4aac3', '61eac18477237', 'hello', '2022-01-21 03:23:22pm'),
(122, '61eac18477237', '61eaba8c4aac3', 'hi', '2022-01-21 03:23:37pm'),
(123, '61eaba8c4aac3', '61eac18477237', 'alo', '2022-01-21 03:47:35pm');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(20) NOT NULL,
  `courseID` int(11) NOT NULL,
  `learnerID` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `courseID`, `learnerID`, `total`) VALUES
(1892958798, 0, '61eac18477237', 0),
(1892958798, 1, '61eac18477237', 0);

-- --------------------------------------------------------

--
-- Table structure for table `selectedcourses`
--

CREATE TABLE `selectedcourses` (
  `courseID` int(11) NOT NULL,
  `learnerID` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selectedcourses`
--

INSERT INTO `selectedcourses` (`courseID`, `learnerID`, `rating`, `review`) VALUES
(2, 61, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutorID` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutorID`, `Fname`, `Lname`, `Email`, `Password`, `Type`) VALUES
(2, 'hashim', 'Tutor', 'Hashim.tutor@gmail.com', '$2y$10$nvc5RfKa1syZsvmTqdzxoOt0Y9xnhOd5W1gKPDqJgIBm5nA753n6y', 'tutor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminstrators`
--
ALTER TABLE `adminstrators`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `auditors`
--
ALTER TABLE `auditors`
  ADD PRIMARY KEY (`auditorID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `learnerID` (`learnerID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sent_by` (`sent_by`,`received_by`),
  ADD KEY `received_by` (`received_by`);

--
-- Indexes for table `selectedcourses`
--
ALTER TABLE `selectedcourses`
  ADD UNIQUE KEY `courseID_2` (`courseID`,`learnerID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `learnerID` (`learnerID`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditors`
--
ALTER TABLE `auditors`
  MODIFY `auditorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
