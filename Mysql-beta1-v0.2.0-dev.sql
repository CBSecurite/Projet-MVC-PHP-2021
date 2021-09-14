-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 sep. 2021 à 21:16
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
  `staffRoleId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `staff_profile`
--

CREATE TABLE `staff_profile` (
  `id` int(11) NOT NULL,
  `staffId` int(11) DEFAULT NULL,
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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `staffRoleId` (`staffRoleId`) USING BTREE;

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `staff_profile`
--
ALTER TABLE `staff_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `staff_role`
--
ALTER TABLE `staff_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`staffRoleId`) REFERENCES `staff_role` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD CONSTRAINT `staff_profile_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;


--
-- Métadonnées
--
USE `phpmyadmin`;

--
-- Métadonnées pour la table staff
--

--
-- Métadonnées pour la table staff_profile
--

--
-- Métadonnées pour la table staff_role
--

--
-- Métadonnées pour la base de données mvc-beta1
--

--
-- Déchargement des données de la table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_descr`) VALUES
('mvc-beta1', 'uml1');

SET @LAST_PAGE = LAST_INSERT_ID();

--
-- Déchargement des données de la table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('mvc-beta1', 'staff', @LAST_PAGE, 445, 109),
('mvc-beta1', 'staff_profile', @LAST_PAGE, 776, 88),
('mvc-beta1', 'staff_role', @LAST_PAGE, 122, 238);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
