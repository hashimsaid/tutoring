-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 10:15 AM
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

--
-- Dumping data for table `auditors`
--

INSERT INTO `auditors` (`auditorID`, `Fname`, `Lname`, `Email`, `Password`, `Type`) VALUES
(1, 'auditor', 'test', 'auditor.test@gmail.com', '123', 'auditor');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `courseID` int(11) NOT NULL,
  `learnerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`courseID`, `learnerID`) VALUES
(8, 2),
(8, 2);

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
  `approved` tinyint(1) NOT NULL,
  `tutorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `averageRating`, `price`, `description`, `picture`, `approved`, `tutorID`) VALUES
(10, 'Web Development', '0', 7000, 'A Web Designing course belongs to the field of Computer Science and IT. It enables students to learn various techniques, tools and programming languages in order to create and maintain web pages. There is an array of courses in this field ranging from certificate and Diploma courses to UG, PG and PGDM programs.', 'ilya-pavlov-OqtafYT5kTw-unsplash.jpg', 1, 2),
(11, 'Data Structures', '0', 5000, 'An overview of data structure concepts, arrays, stack, queues, trees, and graphs. Discussion of various implementations of these data objects, programming styles, and run-time representations. Course also examines algorithms for sorting, searching and some graph algorithms.', 'christopher-gower-m_HRfLhgABo-unsplash.jpg', 1, 2),
(12, 'Game Dev', '0', 9000, 'In this course you will learn the fundamentals of game design, including an understanding of the game world, storytelling, gameplay, user experience, and game technology. You will continue developing videogames using industry standard game development tools, including the Unity game engine.', 'lorenzo-herrera-p0j-mE6mGo4-unsplash.jpg', 1, 2),
(13, 'React', '0', 7000, 'Format: This course combines lecture, discussion and demonstrations with hands-on labs. React js is a client side UI building library to develop web based applications. React is a library developed by Facebook, and it is designed to build large applications with data that changes over time.', 'download.png', 1, 2),
(14, 'Ethical Hacking', '0', 10000, 'This ethical hacking course reveals the fundamental techniques cyber attackers use to exploit vulnerabilities in systems and the methods used to protect such systems against possible cyberattacks. You will master the processes of conducting penetration testing on devices and applications and maintain anonymity on the web.', 'markus-spiske-iar-afB0QQw-unsplash.jpg', 1, 2);

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
('61eac18477237', 'fady', 'learner', 'fady@gmail.com', '$2y$10$6cgcsNhmsXfHYxKYg.H2vejo1pB70rKDCAMPdu.Pex4liX7IAXDT.', 'pictures/profile/default.png', 'learner'),
('61eb1f9760bb7', 'learnertest', 'learnertest', 'learnertest@gmail.com', '$2y$10$A0WGN7y0LRst4bW5x85J4evxhN1D4NbNzi.IH9EkFA1pvvLQ6QRbW', 'pictures/profile/default.png', 'learner'),
('61eb3a15352f7', 'ahmed', 'kamal', 'ahmed.kamal@gmail.com', '$2y$10$f4FQIh8qEecQMfFlKTDUiOMAT5ibDQStDX.PbYJwdsBP7wfxQs4me', 'pictures/profile/drow_ranger_dota_2_art_95109_1920x1080.jpg', 'learner'),
('61eba31a9faea', 'tamer', 'aly', 'tamer@gmail.com', '$2y$10$5e2xNC3MBX2owDtnzynU1Oc/CKFcb7BWjqVeISSG/YTwNNZsigK02', 'pictures/profile/default.png', 'learner');

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
  `createdAt` varchar(255) CHARACTER SET latin1 NOT NULL,
  `seen` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1471664575, 13, '61eac18477237', 7000),
(497061545, 12, '61eac18477237', 9000),
(1563285105, 14, '61eac18477237', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `selectedcourses`
--

CREATE TABLE `selectedcourses` (
  `courseID` int(11) NOT NULL,
  `learnerID` varchar(255) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `survey` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selectedcourses`
--

INSERT INTO `selectedcourses` (`courseID`, `learnerID`, `rating`, `review`, `survey`) VALUES
(12, '61eac18477237', NULL, NULL, 0),
(13, '61eac18477237', NULL, NULL, 0),
(14, '61eac18477237', NULL, NULL, 0);

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
  MODIFY `auditorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
