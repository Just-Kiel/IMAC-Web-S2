-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 29 mai 2022 à 09:47
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_qg`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categoryID`, `title`) VALUES
(1, 'Culture'),
(2, 'Cinéma'),
(3, 'Théâtre'),
(4, 'Musée'),
(5, 'Livre'),
(6, 'DVD / CD'),
(7, 'Mode'),
(8, 'Vêtement Homme'),
(9, 'Vêtement Femme'),
(10, 'Vêtement No Gender'),
(11, 'Chaussures'),
(12, 'Accessoires'),
(13, 'Meubles et Déco'),
(14, 'Déco'),
(15, 'Mobilier Intérieur'),
(16, 'Mobilier Extérieur'),
(17, 'Entretien'),
(18, 'Sport'),
(19, 'Matériel'),
(20, 'Coaching'),
(21, 'Sorties'),
(22, 'High Tech'),
(23, 'Ordinateur'),
(24, 'Téléphone'),
(25, 'Autre'),
(26, 'Gaming'),
(27, 'Tuto'),
(28, 'Matériel'),
(29, 'Stream'),
(30, 'Cuisine'),
(31, 'Tuto'),
(32, 'Don'),
(33, 'Partage ton repas'),
(34, 'Aide aux Devoirs'),
(35, 'Maths'),
(36, 'Prog'),
(37, 'Sciences en Général'),
(38, 'Littérature / Economie'),
(39, 'Arts et Autre');

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `cityID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  KEY `cityID` (`cityID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`cityID`, `name`) VALUES
(1, 'Bordeaux'),
(2, 'Noisiel'),
(3, 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `text` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `goodplanID` int(11) DEFAULT NULL,
  PRIMARY KEY (`commentID`),
  KEY `userID` (`userID`),
  KEY `goodplanID` (`goodplanID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `friendshipID` int(11) NOT NULL AUTO_INCREMENT,
  `firstuserID` int(11) DEFAULT NULL,
  `seconduserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`friendshipID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `goodplans`
--

DROP TABLE IF EXISTS `goodplans`;
CREATE TABLE IF NOT EXISTS `goodplans` (
  `goodplanID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `textContent` text DEFAULT NULL,
  `startingDate` date DEFAULT NULL,
  `endingDate` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `mediaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`goodplanID`),
  KEY `userID` (`userID`),
  KEY `categoryID` (`categoryID`),
  KEY `cityID` (`cityID`),
  KEY `mediaID` (`mediaID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `likeID` int(11) NOT NULL AUTO_INCREMENT,
  `goodplanID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  PRIMARY KEY (`likeID`),
  KEY `goodplanID` (`goodplanID`),
  KEY `userID` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `medias`
--

DROP TABLE IF EXISTS `medias`;
CREATE TABLE IF NOT EXISTS `medias` (
  `mediaID` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`mediaID`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `seconduserID` int(11) DEFAULT NULL,
  `firstuserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`messageID`),
  KEY `userID` (`seconduserID`),
  KEY `firstuserID` (`firstuserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `subcategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`subcategoryID`),
  KEY `categoryID` (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`subcategoryID`, `categoryID`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(8, 7),
(9, 7),
(10, 7),
(11, 7),
(12, 7),
(14, 13),
(15, 13),
(16, 13),
(17, 13),
(19, 18),
(20, 18),
(21, 18),
(23, 22),
(24, 22),
(25, 22),
(27, 26),
(28, 26),
(29, 26),
(31, 30),
(32, 30),
(33, 30),
(35, 34),
(36, 34),
(37, 34),
(38, 34),
(39, 34);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(30) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `mediaID` int(11) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  KEY `cityID` (`cityID`),
  KEY `mediaID` (`mediaID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`goodplanID`) REFERENCES `goodplans` (`goodplanID`);

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
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

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
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`),
  ADD CONSTRAINT `subcategories_ibfk_2` FOREIGN KEY (`subcategoryID`) REFERENCES `categories` (`categoryID`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `cities` (`cityID`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`mediaID`) REFERENCES `medias` (`mediaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
