-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2016 at 05:30 AM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gggdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `implementorId` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `description`, `implementorId`, `deadline`, `status`) VALUES
(1, 'The Relation between Rooves and Microproccessors', 1, '2016-05-12', 1),
(2, 'Truncate Viable Quantum Breaks', 1, '2017-05-31', 1),
(3, 'Return to Definite Retaliators', 1, '2016-05-15', 1),
(4, 'Go Fun Team Blue', 1, '2017-01-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `author`, `url`) VALUES
(1, 'Decoupling Sensor Networks from Rasterization...', 'Li Wu Xing, Rorschach Hayes', '/Downloads/DecouplingSensorNetworks.pdf'),
(2, 'Probabilistic Methodologies in Networking', 'Thomer M. Gil', '/Downloads/InfluenceProbalisticMethodologies.pdf'),
(3, 'Typical Unification of Access Points', 'Jeremy Stribling, Daniel Aguayo, Maxwell Krohn', '/Downloads/TypicalUnificationRedundancy.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `projectId` int(11) DEFAULT '0',
  `supervisorId` int(11) DEFAULT '0',
  `image` varchar(100) DEFAULT 'https://cdn0.vox-cdn.com/images/verge/default-avatar.v9899025.gif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `projectId`, `supervisorId`, `image`) VALUES
(1, 'matt', '$2y$10$jRHgqC.TezlsHhLGETzG0eLQP5mHmgVjc8qmSkAgDyIQfY77kLuLq', 1, 1, 1, NULL),
(2, 'pijus', '$2y$10$h/h1LelsSuEOiEMgUohw5eOv5roTd7ofm21K2RB5piaxCEMfEbyxC', 1, 1, 1, NULL),
(3, 'admin', '$2y$10$41x7Mb3y956JadJbJzwG4uAZfyqcVNFKCrG/DbOD40Rnff7CW1gu.', 2, 0, 0, 'http://www.dnnhero.com/Portals/0/images/thumbs/admin-account-dnn7-1.png'),
(4, 'john', '$2y$10$/fd3/ZRGdURZR4RKnHtHPOIoqovQM3w6wt4uLaymk7ilFq8Kont3O', 0, 0, 0, 'https://cdn0.vox-cdn.com/images/verge/default-avatar.v9899025.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
