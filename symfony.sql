-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 08 Juin 2017 à 12:36
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
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `nomMarque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `marque`
--

INSERT INTO `marque` (`id`, `nomMarque`, `slug`) VALUES
(1, 'Apple', 'apple'),
(2, 'Samsung', 'samsung'),
(3, 'Nokia', 'nokia'),
(4, 'Motorola', 'motorola'),
(5, 'LG', 'lg'),
(6, 'Htc', 'htc'),
(7, 'Huawei', 'huawei'),
(8, 'Sony', 'sony');

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

CREATE TABLE `modele` (
  `id` int(11) NOT NULL,
  `nomModele` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marque_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `modele`
--

INSERT INTO `modele` (`id`, `nomModele`, `marque_id`, `slug`) VALUES
(1, 'Iphone 4', 1, 'iphone-4'),
(2, 'Iphone 5', 1, 'iphone-5'),
(3, 'Iphone 5c', 1, 'iphone-5c'),
(4, 'Iphone 6', 1, 'iphone-6'),
(5, 'Iphone 7', 1, 'iphone-7'),
(6, 'Galaxy S6', 2, 'galaxy-s6'),
(7, 'Galaxy S6 EDGE', 2, 'galaxy-s6-edge'),
(8, 'Xperia Z5', 8, 'xperia-z5'),
(9, 'G3', 5, 'g3'),
(10, 'galaxy A3', 2, 'galaxy-a3'),
(11, 'galaxy j5', 2, 'galaxy-j5'),
(12, '435', 3, '435'),
(13, '520', 3, '520'),
(14, 'one s', 6, 'one-s'),
(15, 'm7', 6, 'm7'),
(16, 'm8', 6, 'm8'),
(17, 'Mate S', 7, 'mate-s'),
(18, 'Mate 7', 7, 'mate-7');

-- --------------------------------------------------------

--
-- Structure de la table `reparation`
--

CREATE TABLE `reparation` (
  `id` int(11) NOT NULL,
  `nomReparation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `reparation`
--

INSERT INTO `reparation` (`id`, `nomReparation`, `slug`) VALUES
(1, 'ecran', 'ecran'),
(2, 'batterie', 'batterie'),
(3, 'bouton on off', 'bouton-on-off'),
(4, 'camera arriere', 'camera-arriere'),
(5, 'charge(conn.)', 'charge-conn'),
(6, 'camera avant', 'camera-avant'),
(7, 'desoxydation', 'desoxydation'),
(8, 'probleme logiciel', 'probleme-logiciel'),
(9, 'sim', 'sim'),
(10, 'bluetooth', 'bluetooth'),
(11, 'antenne', 'antenne'),
(12, 'ecouteur interne', 'ecouteur-interne');

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(11) NOT NULL,
  `prix` double NOT NULL,
  `model_id` int(11) NOT NULL,
  `reparation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `telephone`
--

CREATE TABLE `telephone` (
  `id` int(11) NOT NULL,
  `marque` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modele` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'a', 'a', 'a', 'a', 1, 'wkTCIPM3d5DqBwVTjPJNwFfO2yFkbQQe0LlfwMUfqQk', 'jlHWLPnh8+eHegTRUQi0WsmQKtoaG73hFn2ArxRFifQnNBQjS8BrtlkQnK25xkJIdyeaP/9zxvcjC33+MGpypw==', NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}'),
(2, 'b', 'b', 'b', 'b', 1, 'LON3hdJ86ZqkgdXs2FmJpZL7XCwhM0ZbrV.7z5NNLWA', 'CqkP/uO1eKN02mbTA6Y4Y4w82K//u/Vj8ievk9bvGDQZpKxjfIwg8dy+c0uwEP0W4oBeMSbxF8NzGyZqmU83GQ==', '2017-05-24 12:13:50', NULL, NULL, 'a:0:{}'),
(11, 'dddd', 'dddd', 'florenzabs@hotmail.fr', 'florenzabs@hotmail.fr', 0, 'Ve4G9VxKvemf9YSUR7ZKCucIgGOF/QQw.4nSszHWTY0', '0KXA+yzvU1lgWRof7O+5hXqewv/3YGSWNC7W6P00zKkLyfkbzy1mH0fRQfXDdGiU09/STlpQVLlyarCQ09fQ3A==', NULL, '29VZjfc7ykRVNnSJj7UpeEW_scci3S4rz8HL6jGzsd0', '2017-05-30 14:49:18', 'a:0:{}'),
(19, 'ahmon', 'ahmon', 'florentzabs@gmail.com', 'florentzabs@gmail.com', 1, 'lBMuYoesa1vc8FmdBJy8Vl1uiIL3VZLVnFiq66qZxto', '7JdcBOGsgyWnNwvvhE2oYhi6ZxmkLUIylHRZaouRB/BcjYP1heSUrAmxHMMb04UbniCOMD9TTbvAu/ovGx/GBg==', '2017-06-07 11:12:57', NULL, NULL, 'N;'),
(20, 'anonf', 'anonf', 'florenzabs@net-c.com', 'florenzabs@net-c.com', 1, 'ZfnXuBnHmtNa1fFKnZ23Nvps6Og25iv3XH2N73BkMPA', 'ZuXEVIV1liSUwnE1WXfaBo5TddLgJDNbAfjmoZ8jC9seyWHPrpwjvMmTBiDtjg0YpkJeRwJtT9rlJIiyqnEOWQ==', '2017-06-07 12:13:31', NULL, NULL, 'N;');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `adressepostale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `complement` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5A6F91CE989D9B62` (`slug`);

--
-- Index pour la table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_10028558989D9B62` (`slug`),
  ADD KEY `IDX_100285584827B9B2` (`marque_id`);

--
-- Index pour la table `reparation`
--
ALTER TABLE `reparation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8FDF219D989D9B62` (`slug`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E7189C97975B7E7` (`model_id`),
  ADD KEY `IDX_E7189C997934BA` (`reparation_id`);

--
-- Index pour la table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1D1C63B3A76ED395` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `modele`
--
ALTER TABLE `modele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `reparation`
--
ALTER TABLE `reparation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `FK_100285584827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`);

--
-- Contraintes pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `FK_E7189C97975B7E7` FOREIGN KEY (`model_id`) REFERENCES `modele` (`id`),
  ADD CONSTRAINT `FK_E7189C997934BA` FOREIGN KEY (`reparation_id`) REFERENCES `reparation` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
