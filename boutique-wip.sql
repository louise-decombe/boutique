-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 05, 2020 at 07:42 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id_newsletter`, `email`) VALUES
(1, 'nadia@gmail.com');

-- --------------------------------------------------------
--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `date_registration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `gender`, `phone`, `email`, `password`, `is_admin`, `date_registration`) VALUES
(1, 'admin', 'admin', 'non-genré', '0658449105', 'admin@gmail.com', 'Password-1', 1, '2020-08-03 10:00:00'),
(2, 'Nadia', 'RAIS', 'Femme', '0494662823', 'ndrs455@gmail.com', '$2y$10$2T5GS0b30.Oxzo01slrr6OqqS6ZtKs7P2Z/.Jjvx0jWSEEOINnvgS', 0, '2020-08-03 16:51:49'),
(3, 'ruben', 'ruben', 'Homme', '0658449191', 'ruben@gmail.com', '$2y$10$.yFTv1arLWo9dxUc8B15a.05vChbmJ4zypNUdf9p14ffnznYzLcVm', 0, '2020-08-04 09:37:29'),
(4, 'nadia', 'nadia', 'Femme', '0123456789', 'nadia@gmail.com', '$2y$10$aGUljOx4rg.OEr3kQIXF0ukJxYAgE7J2Jiayv56zUMJIoN7pbO5xe', 0, '2020-08-04 14:35:11'),
(6, 'test', 'test', 'Non genré', '0123456789', 'test@gmail.com', '$2y$10$2cU3oOEOKlQ.vx9SrT4QdeSKPrRIATPadZ44KLLQWgf0XRQFgbJ/W', 0, '2020-08-04 16:35:39'),
(13, 'testo', 'testo', 'Non genré', '0123456789', 'testo@gmail.com', '$2y$10$brkpkDkvA8xcF66DVflgau0ShRWXN2cAEWzLLjNVDx38eilppENBS', 0, '2020-08-04 17:01:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_newsletter`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

