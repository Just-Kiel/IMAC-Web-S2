-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2022 at 11:47 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qg`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `cityID` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL,
  `text` text,
  `date` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `goodplanID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friendshipID` int(11) NOT NULL,
  `firstuserID` int(11) DEFAULT NULL,
  `seconduserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `goodplans`
--

CREATE TABLE `goodplans` (
  `goodplanID` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `textContent` text,
  `startingDate` date DEFAULT NULL,
  `endingDate` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `mediaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medias`
--

CREATE TABLE `medias` (
  `mediaID` int(11) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `url` varchar(90) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(11) NOT NULL,
  `seconduserID` int(11) DEFAULT NULL,
  `firstuserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategoryID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cityID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `goodplanID` (`goodplanID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friendshipID`);

--
-- Indexes for table `goodplans`
--
ALTER TABLE `goodplans`
  ADD PRIMARY KEY (`goodplanID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `cityID` (`cityID`),
  ADD KEY `mediaID` (`mediaID`);

--
-- Indexes for table `medias`
--
ALTER TABLE `medias`
  ADD PRIMARY KEY (`mediaID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `userID` (`seconduserID`),
  ADD KEY `firstuserID` (`firstuserID`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategoryID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `cityID` (`cityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friendshipID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goodplans`
--
ALTER TABLE `goodplans`
  MODIFY `goodplanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medias`
--
ALTER TABLE `medias`
  MODIFY `mediaID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`goodplanID`) REFERENCES `goodplans` (`goodplanID`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`friendshipID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `goodplans`
--
ALTER TABLE `goodplans`
  ADD CONSTRAINT `goodplans_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `goodplans_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  ADD CONSTRAINT `goodplans_ibfk_3` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cityID`),
  ADD CONSTRAINT `goodplans_ibfk_4` FOREIGN KEY (`mediaID`) REFERENCES `medias` (`mediaID`);

--
-- Constraints for table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`seconduserID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`firstuserID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cityID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
