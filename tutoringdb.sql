-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2022 at 01:55 AM
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
  `adminID` int(11) NOT NULL,
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
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$10$dzCXtC3010tQxNBx05lQ9exAjVpJsq8PLD5H0tM6qYlayrlBbWH..', 'adminstrator'),
(6, 'asd', 'Tarek', 'fady1900456@miuegypt.edu.eg', '$2y$10$bnLT/e7qXWAvruJDoSDl7./h403jALiIfHXpvE0Xi6shiMNzdq1si', 'adminstrator');

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
(0, 'Machine Learning', '3', 4000, 'Machine learning is a method of data analysis that automates analytical model building. It is a branch of artificial intelligence based on the idea that systems can learn from data, identify patterns and make decisions with minimal human intervention.', 'machineLearning.jpeg', 1),
(1, 'Intro to programming', '4', 3300, 'Learn the basics of programming through HTML, CSS, Python, and JavaScript. Get extensive practice with hands-on exercises and projects that demonstrate your grasp of coding fundamentals, and build confidence in your ability to think and problem-solve like a programmer.', 'introtoprogramming.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `learners`
--

CREATE TABLE `learners` (
  `learnerID` int(11) NOT NULL,
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
(1, 'Shihab', 'Kandil', 'shihab@gmail.com', '$2y$10$xcPKesBMOwXWuihFVwzVKOm8i8EaZDTIP0CF5MTKai1ejH7WMEzBi', 'pictures/profile/default.png', 'learner'),
(2, 'Fady', 'Tarek', 'fady@gmail.com', '$2y$10$XdvAxsPmefZ.MMhYvemFseAV2h2ZG4zCqbeHOMcdIdru4N09NbQvm', 'pictures/profile/default.png', 'learner');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `courseID` int(11) NOT NULL,
  `materialPath` text NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `sent_by` int(11) NOT NULL,
  `received_by` int(11) NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createdAt` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sent_by`, `received_by`, `message`, `createdAt`) VALUES
(77, 13, 14, 'aaaa', '2022-01-08 09:07:58pm'),
(78, 13, 14, 'hi', '2022-01-08 09:09:40pm'),
(79, 13, 14, 'hi', '2022-01-08 09:09:46pm'),
(80, 13, 14, 'a7a', '2022-01-08 09:11:13pm'),
(81, 13, 14, 'a7a', '2022-01-08 09:11:18pm'),
(82, 13, 11, 'hi', '2022-01-08 11:14:28pm'),
(83, 13, 11, 'sad', '2022-01-08 11:14:38pm'),
(84, 13, 14, 'sad', '2022-01-08 11:23:30pm'),
(85, 13, 14, 'alo', '2022-01-08 11:23:40pm'),
(86, 13, 14, 'hla', '2022-01-08 11:23:55pm'),
(87, 13, 14, 'alo', '2022-01-08 11:24:02pm'),
(88, 13, 14, 'aaaa', '2022-01-08 11:24:12pm'),
(89, 13, 14, 'sad', '2022-01-08 11:24:14pm'),
(90, 13, 14, 'hi', '2022-01-08 11:24:17pm'),
(91, 14, 13, 'fine', '2022-01-08 11:25:12pm'),
(92, 13, 14, 'zby', '2022-01-08 11:34:04pm'),
(93, 14, 13, 'kosomk', '2022-01-08 11:34:10pm'),
(94, 13, 11, 'hi', '2022-01-15 12:36:55am'),
(95, 13, 11, 'alo', '2022-01-15 12:36:57am'),
(96, 13, 11, 'hla', '2022-01-15 12:42:53am'),
(97, 11, 13, '????', '2022-01-15 12:43:00am'),
(98, 11, 13, 'hello world', '2022-01-15 12:43:20am'),
(99, 13, 11, 'hi', '2022-01-15 12:43:30am'),
(100, 13, 11, 'hi', '2022-01-15 12:46:27am'),
(101, 11, 13, 'hello world', '2022-01-15 12:46:28am'),
(102, 11, 13, 'hello world', '2022-01-15 12:46:45am'),
(103, 13, 11, 'aaaa', '2022-01-15 12:47:06am'),
(104, 11, 13, 'fine', '2022-01-15 12:47:12am'),
(105, 13, 11, 'aaaa', '2022-01-15 12:47:22am'),
(106, 13, 11, 'hla', '2022-01-15 12:47:28am'),
(107, 11, 13, '????', '2022-01-15 12:47:33am'),
(108, 11, 13, '????', '2022-01-15 12:47:54am'),
(109, 13, 11, 'hla', '2022-01-15 12:47:55am'),
(110, 13, 11, 'sad', '2022-01-15 12:48:04am'),
(111, 13, 11, 'aaaa', '2022-01-15 12:48:12am'),
(112, 13, 11, 'a7a', '2022-01-15 12:48:16am'),
(113, 13, 11, 'hi', '2022-01-15 12:48:20am'),
(114, 11, 13, 'hello world', '2022-01-15 12:48:24am'),
(115, 11, 13, 'hello world', '2022-01-15 12:48:28am'),
(116, 1, 2, 'hi', '2022-01-15 01:27:09am'),
(117, 2, 1, 'fine', '2022-01-15 01:27:51am');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(20) NOT NULL,
  `courseID` int(11) NOT NULL,
  `learnerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `courseID`, `learnerID`) VALUES
(1823682149, 0, 1),
(1823682149, 1, 1),
(514864683, 0, 1),
(937556936, 1, 2),
(937556936, 0, 2),
(456430094, 0, 2),
(206761981, 0, 1),
(1662757592, 0, 1),
(1662757592, 1, 1),
(959431989, 0, 1),
(959431989, 1, 1),
(1194711523, 0, 1),
(1194711523, 1, 1),
(2068024582, 0, 1),
(2068024582, 1, 1);

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
(0, 1, 1, 'bad'),
(0, 2, 5, 'test'),
(1, 1, NULL, NULL);

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
(1, 'asd', 'sfgds', 'sad@asd.com', '$2y$10$GzslTlOJ1GBltKEvbB1O4OlBSeH/jUsxZSGqGKP7ZzRpXgdAZSKR.', 'tutor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminstrators`
--
ALTER TABLE `adminstrators`
  ADD PRIMARY KEY (`adminID`),
  ADD KEY `adminID` (`adminID`);

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
  ADD UNIQUE KEY `courseID` (`courseID`);

--
-- Indexes for table `learners`
--
ALTER TABLE `learners`
  ADD PRIMARY KEY (`learnerID`);

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
-- AUTO_INCREMENT for table `adminstrators`
--
ALTER TABLE `adminstrators`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auditors`
--
ALTER TABLE `auditors`
  MODIFY `auditorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `learners`
--
ALTER TABLE `learners`
  MODIFY `learnerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`learnerID`) REFERENCES `learners` (`learnerID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
