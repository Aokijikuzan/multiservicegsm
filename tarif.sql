-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 08 Juin 2017 à 12:37
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--
/*
CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `prix` double NOT NULL,
  `model_id` int(11) NOT NULL,
  `reparation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
*/
--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`id`, `prix`, `model_id`, `reparation_id`) VALUES
(1, 14, 1, 1),
(2, 29, 2, 1),
(3, 29, 3, 1),
(4, 39, 4, 1),
(5, 110, 5, 1),
(6, 125, 6, 1),
(7, 189, 7, 1),
(8, 62, 10, 1),
(9, 69, 11, 1),
(10, 35, 12, 1),
(11, 15, 13, 1),
(12, 59, 9, 1),
(13, 45, 14, 1),
(14, 39, 15, 1),
(15, 49, 16, 1),
(16, 79, 17, 1),
(17, 79, 18, 1),
(18, 25, 2, 2),
(19, 35, 2, 3),
(21, 25, 2, 4),
(22, 50, 6, 2),
(23, 50, 6, 3),
(24, 50, 6, 4),
(25, 90, 6, 5),
(26, 45, 6, 6),
(27, 45, 6, 7),
(28, 15, 6, 8);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tarif`
--
