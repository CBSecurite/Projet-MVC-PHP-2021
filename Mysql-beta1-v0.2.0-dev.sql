-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 sep. 2021 à 14:00
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mvc-beta1`
--
CREATE DATABASE IF NOT EXISTS `mvc-beta1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mvc-beta1`;

-- --------------------------------------------------------

--
-- Structure de la table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `email` char(255) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `rightAccess` tinyint(1) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `staffProfileId` int(11) DEFAULT NULL,
  `staffSalaryId` int(11) DEFAULT NULL,
  `staffRoleId` int(11) DEFAULT NULL,
  `staffPoleId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `staff_pole`
--

CREATE TABLE `staff_pole` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `staff_profile`
--

CREATE TABLE `staff_profile` (
  `staffId` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `sex` int(1) DEFAULT NULL,
  `birthdate` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postalCode` decimal(5,0) UNSIGNED ZEROFILL DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `staff_role`
--

CREATE TABLE `staff_role` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `priority` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `staff_role`
--

INSERT INTO `staff_role` (`id`, `name`, `priority`) VALUES
(1, 'Super Admin', 999),
(2, 'Admin', 998),
(3, 'User', 0);

-- --------------------------------------------------------

--
-- Structure de la table `staff_salary`
--

CREATE TABLE `staff_salary` (
  `id` int(11) NOT NULL,
  `dateEntry` varchar(10) NOT NULL,
  `salaryBase` decimal(8,2) DEFAULT 1450.00,
  `bonus` decimal(4,3) DEFAULT 0.000,
  `penalty` decimal(4,3) DEFAULT 0.220,
  `seniorityRate` decimal(4,3) DEFAULT 0.025
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `staffRoleId` (`staffRoleId`) USING BTREE,
  ADD KEY `staffSalaryId` (`staffSalaryId`),
  ADD KEY `staffPoleId` (`staffPoleId`),
  ADD KEY `staffProfileId` (`staffProfileId`);

--
-- Index pour la table `staff_pole`
--
ALTER TABLE `staff_pole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staffId` (`staffId`);

--
-- Index pour la table `staff_role`
--
ALTER TABLE `staff_role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `staff_salary`
--
ALTER TABLE `staff_salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `staff_pole`
--
ALTER TABLE `staff_pole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `staff_profile`
--
ALTER TABLE `staff_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `staff_role`
--
ALTER TABLE `staff_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `staff_salary`
--
ALTER TABLE `staff_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_4` FOREIGN KEY (`staffSalaryId`) REFERENCES `staff_salary` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `staff_ibfk_5` FOREIGN KEY (`staffRoleId`) REFERENCES `staff_role` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `staff_ibfk_6` FOREIGN KEY (`staffPoleId`) REFERENCES `staff_pole` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `staff_ibfk_7` FOREIGN KEY (`staffProfileId`) REFERENCES `staff_profile` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD CONSTRAINT `staff_profile_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
