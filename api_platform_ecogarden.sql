-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 25 mars 2026 à 14:25
-- Version du serveur : 8.0.44
-- Version de PHP : 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `api_platform_ecogarden`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20260325141502', '2026-03-25 14:16:50', 47);

-- --------------------------------------------------------

--
-- Structure de la table `month`
--

CREATE TABLE `month` (
  `id` int NOT NULL,
  `number` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `month`
--

INSERT INTO `month` (`id`, `number`, `name`) VALUES
(1, 1, 'Janvier'),
(2, 2, 'Février'),
(3, 3, 'Mars'),
(4, 4, 'Avril'),
(5, 5, 'Mai'),
(6, 6, 'Juin'),
(7, 7, 'Juillet'),
(8, 8, 'Août'),
(9, 9, 'Septembre'),
(10, 10, 'Octobre'),
(11, 11, 'Novembre'),
(12, 12, 'Décembre');

-- --------------------------------------------------------

--
-- Structure de la table `tip`
--

CREATE TABLE `tip` (
  `id` int NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tip`
--

INSERT INTO `tip` (`id`, `content`) VALUES
(1, 'Conseil 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(2, 'Conseil 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(3, 'Conseil 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(4, 'Conseil 4 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(5, 'Conseil 5 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(6, 'Conseil 6 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(7, 'Conseil 7 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(8, 'Conseil 8 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(9, 'Conseil 9 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(10, 'Conseil 10 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(11, 'Conseil 11 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(12, 'Conseil 12 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(13, 'Conseil 13 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(14, 'Conseil 14 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(15, 'Conseil 15 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(16, 'Conseil 16 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(17, 'Conseil 17 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(18, 'Conseil 18 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(19, 'Conseil 19 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'),
(20, 'Conseil 20 : Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');

-- --------------------------------------------------------

--
-- Structure de la table `tip_month`
--

CREATE TABLE `tip_month` (
  `tip_id` int NOT NULL,
  `month_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tip_month`
--

INSERT INTO `tip_month` (`tip_id`, `month_id`) VALUES
(1, 1),
(1, 5),
(1, 10),
(2, 10),
(3, 11),
(4, 3),
(4, 7),
(4, 11),
(5, 2),
(5, 4),
(5, 10),
(6, 10),
(6, 11),
(6, 12),
(7, 1),
(7, 7),
(8, 1),
(8, 5),
(9, 2),
(9, 10),
(10, 2),
(10, 4),
(11, 1),
(12, 3),
(13, 3),
(13, 12),
(14, 3),
(15, 2),
(15, 3),
(15, 11),
(16, 8),
(17, 6),
(18, 3),
(18, 5),
(18, 9),
(19, 2),
(20, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `city`) VALUES
(1, 'user@ecogarden.com', '[\"ROLE_USER\"]', '$2y$13$8IBAL7bYZeV0xj8MzT2hb.eQvBMu/s8MuO3PVvQrtMaf2h3AuOqpK', 'Marseille'),
(2, 'admin@ecogarden.com', '[\"ROLE_ADMIN\"]', '$2y$13$P9.IER2eLv6ViCzMh621Ju9LaEuB.P1hB0bg5npJvMd/167SM.vXi', 'Paris');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8EB6100696901F54` (`number`);

--
-- Index pour la table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tip_month`
--
ALTER TABLE `tip_month`
  ADD PRIMARY KEY (`tip_id`,`month_id`),
  ADD KEY `IDX_DDC6B0F5476C47F6` (`tip_id`),
  ADD KEY `IDX_DDC6B0F5A0CBDE4` (`month_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `month`
--
ALTER TABLE `month`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `tip`
--
ALTER TABLE `tip`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tip_month`
--
ALTER TABLE `tip_month`
  ADD CONSTRAINT `FK_DDC6B0F5476C47F6` FOREIGN KEY (`tip_id`) REFERENCES `tip` (`id`),
  ADD CONSTRAINT `FK_DDC6B0F5A0CBDE4` FOREIGN KEY (`month_id`) REFERENCES `month` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
