-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2020 at 11:22 PM
-- Server version: 10.3.22-MariaDB-0+deb10u1
-- PHP Version: 7.3.11-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ellestmanuelle`
--

-- --------------------------------------------------------

--
-- Table structure for table `creation`
--

CREATE TABLE `creation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `picture2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creation`
--

INSERT INTO `creation` (`id`, `name`, `description`, `picture`, `picture2`) VALUES
(1, 'creation 1', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(2, 'creation 2', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(3, 'creation 3', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(4, 'creation 4', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(5, 'creation 5', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(6, 'creation 6', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(7, 'creation 7', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(8, 'creation 8', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(9, 'creation 9', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(10, 'creation 10', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(11, 'creation 11', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(12, 'creation 12', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(13, 'creation 13', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(14, 'creation 14', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg'),
(15, 'creation 15', 'Description de ma création', 'hp-1-featured-1.jpg', 'hp-1-featured-11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_creation` int(11) NOT NULL,
  `id_technique` int(11) DEFAULT NULL,
  `id_theme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_creation`, `id_technique`, `id_theme`) VALUES
(2, 1, 5),
(1, 9, 3),
(3, 10, 6),
(4, 11, 4),
(5, 5, 1),
(6, 3, 7),
(7, 3, 1),
(8, 6, 1),
(9, 7, 1),
(10, 5, 6),
(11, 4, 5),
(12, 4, 4),
(13, 5, 6),
(14, 10, 3),
(15, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `technique`
--

CREATE TABLE `technique` (
  `id` int(11) NOT NULL,
  `kind` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technique`
--

INSERT INTO `technique` (`id`, `kind`, `name`, `position`) VALUES
(1, 'artistique', 'illustrations livres pour enfants', 0),
(2, 'artistique', 'dessins au jour le jour', 0),
(3, 'artistique', 'linogravure', 0),
(4, 'artistique', 'sculpture', 0),
(5, 'artistique', 'pliage papier : origami, pop up', 0),
(6, 'artistique', 'graphisme : commandes historial', 0),
(7, 'artisanale', 'couture canevas', 0),
(8, 'artisanale', 'broderie', 0),
(9, 'artisanale', 'tricot', 0),
(10, 'artisanale', 'poterie', 0),
(11, 'artisanale', 'décoration objets : peinture porcelaine', 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `name`, `position`) VALUES
(1, 'le papier : origami, pop up', 0),
(2, 'la flore, la nature  : herbier', 0),
(3, 'le textile : couture, broderie, tricot', 0),
(4, 'le scotch et autre matériau insolite : sculptures', 0),
(5, 'la gomme, le carton : linogravure, tampons', 0),
(6, 'l’argile : poterie, sculpture', 0),
(7, 'les illustrations', 0);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `content`) VALUES
(1, 'home', ''),
(2, 'ateliers', ''),
(3, 'illustrations', ''),
(4, 'qui-suis-je', '')

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `creation`
--
ALTER TABLE `creation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD KEY `fk_creation` (`id_creation`),
  ADD KEY `fk_technique` (`id_technique`),
  ADD KEY `fk_theme` (`id_theme`);

--
-- Indexes for table `technique`
--
ALTER TABLE `technique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creation`
--
ALTER TABLE `creation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `technique`
--
ALTER TABLE `technique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `fk_creation` FOREIGN KEY (`id_creation`) REFERENCES `creation` (`id`),
  ADD CONSTRAINT `fk_technique` FOREIGN KEY (`id_technique`) REFERENCES `technique` (`id`),
  ADD CONSTRAINT `fk_theme` FOREIGN KEY (`id_theme`) REFERENCES `theme` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
