-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 11:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emerge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Organization` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `FirstName`, `LastName`, `Email`, `Organization`, `Password`) VALUES
(1, 'Andrew', 'Admin', 'admin@emerge.com', 'Ara, Emerge', '$2y$10$jMlQ8.87QSliIFNyH7SXbOcxeJqnP/8.OJiJSTe.PxbmER.TL/mhq');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(11) NOT NULL,
  `Directory` varchar(100) NOT NULL,
  `Type` enum('PDF','Image') NOT NULL,
  `TableRelates` enum('event','students') NOT NULL,
  `TableRelatesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `Directory`, `Type`, `TableRelates`, `TableRelatesID`) VALUES
(11, 'Assets/Uploads/Brochures/52_brochure.pdf', 'PDF', 'event', 52),
(12, 'Assets/Uploads/Gallery/52_6739968bb1e85.jpg', 'Image', 'event', 52),
(13, 'Assets/Uploads/Gallery/52_6739968bb270f.jpg', 'Image', 'event', 52),
(14, 'Assets/Uploads/Gallery/52_6739968bb2e06.jpg', 'Image', 'event', 52),
(15, 'Assets/Uploads/Gallery/52_6739968bb3557.jpg', 'Image', 'event', 52),
(16, 'Assets/Uploads/Gallery/52_6739968bb3d7c.jpg', 'Image', 'event', 52),
(17, 'Assets/Uploads/Gallery/52_6739968bb455e.jpg', 'Image', 'event', 52),
(18, 'Assets/Uploads/Gallery/52_6739968bb4c5f.jpg', 'Image', 'event', 52),
(19, 'Assets/Uploads/Gallery/52_6739968bb53cd.jpg', 'Image', 'event', 52),
(20, 'Assets/Uploads/Gallery/52_6739968bb5b25.jpg', 'Image', 'event', 52),
(21, 'Assets/Uploads/Gallery/52_6739968bb61ff.jpg', 'Image', 'event', 52),
(22, 'Assets/Uploads/Gallery/52_6739968bb6898.jpg', 'Image', 'event', 52),
(23, 'Assets/Uploads/Gallery/52_6739968bb6f92.jpg', 'Image', 'event', 52),
(24, 'Assets/Uploads/Gallery/52_6739968bb773e.jpg', 'Image', 'event', 52),
(25, 'Assets/Uploads/Gallery/52_6739968bb7ed5.jpg', 'Image', 'event', 52),
(26, 'Assets/Uploads/Gallery/52_6739968bb85ef.jpg', 'Image', 'event', 52),
(27, 'Assets/Uploads/Gallery/52_6739968bb8d4b.jpg', 'Image', 'event', 52),
(28, 'Assets/Uploads/Gallery/52_6739968bb944c.jpg', 'Image', 'event', 52),
(29, 'Assets/Uploads/Gallery/52_6739968bb9c31.jpg', 'Image', 'event', 52),
(30, 'Assets/Uploads/Gallery/52_6739968bba376.jpg', 'Image', 'event', 52),
(31, 'Assets/Uploads/Gallery/52_6739968bbab07.jpg', 'Image', 'event', 52),
(32, 'Assets/Uploads/Gallery/52_6739968bbb274.jpg', 'Image', 'event', 52),
(33, 'Assets/Uploads/Gallery/52_6739968bbbab8.jpg', 'Image', 'event', 52),
(34, 'Assets/Uploads/Gallery/52_6739968bbc344.jpg', 'Image', 'event', 52),
(35, 'Assets/Uploads/Gallery/52_6739968bbcb58.jpg', 'Image', 'event', 52),
(36, 'Assets/Uploads/Gallery/52_6739968bbd371.jpg', 'Image', 'event', 52),
(37, 'Assets/Uploads/Gallery/52_6739968bbdb62.jpg', 'Image', 'event', 52),
(38, 'Assets/Uploads/Gallery/52_6739968bbe333.jpg', 'Image', 'event', 52),
(39, 'Assets/Uploads/Gallery/52_6739968bbeaa8.jpg', 'Image', 'event', 52),
(40, 'Assets/Uploads/Gallery/52_6739968bbf1ab.jpg', 'Image', 'event', 52),
(41, 'Assets/Uploads/Gallery/52_6739968bbf8cf.jpg', 'Image', 'event', 52),
(42, 'Assets/Uploads/Gallery/52_6739968bc00a9.jpg', 'Image', 'event', 52),
(43, 'Assets/Uploads/Gallery/52_6739968bc07c3.jpg', 'Image', 'event', 52),
(44, 'Assets/Uploads/Gallery/52_6739968bc0efc.jpg', 'Image', 'event', 52),
(45, 'Assets/Uploads/Gallery/52_6739968bc165c.jpg', 'Image', 'event', 52),
(46, 'Assets/Uploads/Gallery/52_6739968bc1f36.jpg', 'Image', 'event', 52),
(47, 'Assets/Uploads/Gallery/52_6739968bc26ed.jpg', 'Image', 'event', 52),
(48, 'Assets/Uploads/Gallery/52_6739968bc2e6a.jpg', 'Image', 'event', 52),
(49, 'Assets/Uploads/Gallery/52_6739968bc35a1.jpg', 'Image', 'event', 52),
(50, 'Assets/Uploads/Headshots/2.jpg', 'Image', 'students', 2),
(51, 'Assets/Uploads/Posters/2.pdf', 'PDF', 'students', 2),
(52, 'Assets/Uploads/ShortPapers/2.pdf', 'PDF', 'students', 2),
(53, 'Assets/Uploads/Headshots/3.jpg', 'Image', 'students', 3),
(54, 'Assets/Uploads/Posters/3.pdf', 'PDF', 'students', 3),
(55, 'Assets/Uploads/ShortPapers/3.pdf', 'PDF', 'students', 3),
(56, 'Assets/Uploads/Headshots/4.jpg', 'Image', 'students', 4),
(57, 'Assets/Uploads/Posters/4.pdf', 'PDF', 'students', 4),
(58, 'Assets/Uploads/ShortPapers/4.pdf', 'PDF', 'students', 4);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `EventName` varchar(100) NOT NULL,
  `EventDate` date NOT NULL,
  `TourLink` varchar(200) NOT NULL,
  `Publish` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `EventName`, `EventDate`, `TourLink`, `Publish`) VALUES
(52, 'Emerge, Semester 1, 2024', '2024-06-12', 'https://app.lapentor.com/sphere/emerge-s1-2024', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Pathway` enum('Software','Networking','Information') NOT NULL,
  `ProjectName` varchar(100) NOT NULL,
  `Event_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `FirstName`, `LastName`, `Pathway`, `ProjectName`, `Event_ID`) VALUES
(2, 'Jacob', 'Klemick', 'Software', 'Virtual Worlds', 52),
(3, 'Josh', 'Vickery', 'Networking', 'Secure Web Gateway for Fulton Hogan', 52),
(4, 'Chris', 'Buckley', 'Information', 'SharePoint Migration for Christchurch Casino', 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `idx_asset_id` (`asset_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `idx_event_id` (`event_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `Event_ID` (`Event_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `event` (`event_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
