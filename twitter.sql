-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 15, 2017 at 12:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `fid` int(5) NOT NULL,
  `follow_id` int(5) NOT NULL,
  `following_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `tid` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `message` varchar(150) DEFAULT NULL,
  `imgUrl` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`tid`, `uid`, `message`, `imgUrl`) VALUES
(1, 2, 'hey there', NULL),
(2, 2, 'hey there', NULL),
(3, 2, 'hello i am here', NULL),
(4, 2, 'What are you doing brother ???', NULL),
(5, 2, 'My name is Puspendra Pandey\r\nAny one online now', NULL),
(6, 2, 'llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll', NULL),
(7, 2, 'k\r\n', NULL),
(8, 2, 'k', NULL),
(9, 2, '', NULL),
(10, 2, '', NULL),
(11, 2, '', NULL),
(12, 2, '', NULL),
(13, 2, '', NULL),
(14, 2, '', NULL),
(15, 2, '', NULL),
(16, 2, '', NULL),
(17, 2, '', NULL),
(18, 2, '', NULL),
(19, 2, '', NULL),
(20, 2, '', NULL),
(21, 2, '', NULL),
(22, 2, '', NULL),
(23, 2, '', NULL),
(24, 2, 'kkk', NULL),
(25, 2, 'kkk', NULL),
(26, 2, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `profile` varchar(50) DEFAULT 'img/profile/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `pass`, `profile`) VALUES
(1, 'pusp94', 'pusp94@gmail.com', 'asdf', 'img/profile/default.jpg'),
(2, 'jack', 'jack@hotmail.com', 'asdf', 'img/profile/default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `fid` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `tid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
