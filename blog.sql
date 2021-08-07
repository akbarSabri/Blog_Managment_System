-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 11:38 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `blogid` int(11) NOT NULL,
  `blogTitle` varchar(255) DEFAULT NULL,
  `blogDescription` text DEFAULT NULL,
  `blogImage` varchar(300) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`blogid`, `blogTitle`, `blogDescription`, `blogImage`, `status`, `createdTime`, `updatedTime`) VALUES
(1, 'Test Blog is editing', 'Its my first Blog.', 'assets/upload/blogimg/pp8.jpg', 1, '2021-07-30 11:34:48', '2021-07-30 12:30:07'),
(3, 'my love blog', 'hahahhaha', 'assets/upload/blogimg/pp6.jpg', 1, '2021-07-30 12:18:09', '2021-07-30 12:18:09'),
(4, 'last day', 'here is my last day.', 'assets/upload/blogimg/pp9.jpg', 1, '2021-07-30 12:34:19', '2021-07-30 12:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `backendusers`
--

CREATE TABLE `backendusers` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `backendusers`
--

INSERT INTO `backendusers` (`uid`, `username`, `password`, `status`) VALUES
(1, 'admin', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `backendusers`
--
ALTER TABLE `backendusers`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `backendusers`
--
ALTER TABLE `backendusers`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
