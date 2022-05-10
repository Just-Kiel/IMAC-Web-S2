-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 29 Avril 2022 à 15:23
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `qg`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categoryID` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`cityID` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`commentID` int(11) NOT NULL,
  `text` text,
  `date` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `goodplanID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
`friendshipID` int(11) NOT NULL,
  `firstuserID` int(11) DEFAULT NULL,
  `seconduserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `goodplans`
--

CREATE TABLE IF NOT EXISTS `goodplans` (
`goodplanID` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `textContent` text,
  `startingDate` date DEFAULT NULL,
  `endingDate` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `mediaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
`likeID` int(11) NOT NULL,
  `goodplanID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

CREATE TABLE IF NOT EXISTS `medias` (
`mediaID` int(11) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `url` varchar(90) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`messageID` int(11) NOT NULL,
  `seconduserID` int(11) DEFAULT NULL,
  `firstuserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
`subcategoryID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`userID` int(11) NOT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `mediaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categoryID`);

--
-- Index pour la table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`cityID`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`commentID`), ADD KEY `userID` (`userID`), ADD KEY `goodplanID` (`goodplanID`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`friendshipID`);

--
-- Index pour la table `goodplans`
--
ALTER TABLE `goodplans`
 ADD PRIMARY KEY (`goodplanID`), ADD KEY `userID` (`userID`), ADD KEY `categoryID` (`categoryID`), ADD KEY `cityID` (`cityID`), ADD KEY `mediaID` (`mediaID`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
 ADD PRIMARY KEY (`likeID`), ADD KEY `goodplanID` (`goodplanID`),  ADD KEY `userID` (`userID`);

--
-- Index pour la table `medias`
--
ALTER TABLE `medias`
 ADD PRIMARY KEY (`mediaID`),
 ADD KEY `userID` (`userID`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`messageID`), ADD KEY `userID` (`seconduserID`), ADD KEY `firstuserID` (`firstuserID`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
 ADD PRIMARY KEY (`subcategoryID`), ADD KEY `categoryID` (`categoryID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`userID`), ADD KEY `cityID` (`cityID`), ADD KEY `mediaID` (`mediaID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cities`
--
ALTER TABLE `cities`
MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `friends`
--
ALTER TABLE `friends`
MODIFY `friendshipID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `goodplans`
--
ALTER TABLE `goodplans`
MODIFY `goodplanID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
MODIFY `likeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `medias`
--
ALTER TABLE `medias`
MODIFY `mediaID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
MODIFY `subcategoryID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`goodplanID`) REFERENCES `goodplans` (`goodplanID`);

--
-- Contraintes pour la table `friends`
--
ALTER TABLE `friends`
ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`friendshipID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `goodplans`
--
ALTER TABLE `goodplans`
ADD CONSTRAINT `goodplans_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
ADD CONSTRAINT `goodplans_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
ADD CONSTRAINT `goodplans_ibfk_3` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cityID`),
ADD CONSTRAINT `goodplans_ibfk_4` FOREIGN KEY (`mediaID`) REFERENCES `medias` (`mediaID`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`goodplanID`) REFERENCES `goodplans` (`goodplanID`),
ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `medias`
--
ALTER TABLE `medias`
  ADD CONSTRAINT `medias_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`seconduserID`) REFERENCES `users` (`userID`),
ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`firstuserID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `subcategories`
--
ALTER TABLE `subcategories`
ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cityID`),
ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`mediaID`) REFERENCES `medias` (`mediaID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
