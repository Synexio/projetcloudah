-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2021 at 07:40 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wilhem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `idComment` int(11) NOT NULL,
  `content` text NOT NULL,
  `dateSend` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userID` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`idComment`, `content`, `dateSend`, `userID`, `email`) VALUES
(1, 'prouiouot', '2019-07-27 13:18:35', 3, NULL),
(2, 'elkrfuhgoizeurhg tjzhebrmltg kzjgmlhk', '2019-07-27 15:35:06', 3, NULL),
(3, 'brobrobr', '2019-07-27 16:19:48', 3, 'default'),
(4, 'bijouuur', '2019-07-27 16:20:32', 0, 'benana59@hotmail.fr'),
(5, 'khhlutrhlkjhrlktjhytlkerthylkjehrlkj', '2019-07-27 16:24:46', 0, 'wilh0u@hotmail.fr'),
(6, 'fhjhgkjeghkrfjhgkjdhfkghdkjfgh', '2019-07-27 16:25:05', 3, 'default'),
(7, 'Bonjour ça va ?', '2020-04-23 12:12:33', 0, 'alex.hannagan@hotmail.fr'),
(8, 'Qu\'y a-t-il ?', '2020-06-11 12:32:09', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `sessionID` int(11) NOT NULL,
  `schedule` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `duration` varchar(5) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `profID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` char(8) DEFAULT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `comment` text,
  `rank` tinyint(3) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `lastname`, `firstname`, `email`, `password`, `phone`, `grade`, `address`, `comment`, `rank`) VALUES
(2, 'Aelteria', 'Lili', 'englishman2009@hotmail.fr', '$2y$10$xfCsNL0/PUsN03aRcxDVu.p3.SrUyT3QmxLVBBBA.4jAUMQ112Zku', NULL, NULL, NULL, NULL, 0),
(3, 'Hannagan', 'Alexandre', 'alex.hannagan@hotmail.fr', '$2y$10$EyYxw0GaK8IYDtGgmxXLDunXU6Yo8au7IgX44vY5Pb6csuQ3AjU6W', NULL, NULL, NULL, NULL, 0),
(4, 'Chillet', 'Wilhem', 'wc@gmail.com', '$2y$10$tL7FFNhYguiXBDwaNU7ovuq98vZZUXGwSL9nlfjxpYwyIRWipMd0a', NULL, NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idComment`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `sessionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
