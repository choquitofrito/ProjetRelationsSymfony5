-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 14 mars 2019 à 14:45
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `relations`
--

-- --------------------------------------------------------

--
-- Structure de la table `avatar`
--

CREATE TABLE `avatar` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `fichier` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `categorie_parent_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_exemplaire`
--

CREATE TABLE `client_exemplaire` (
  `client_id` int(11) NOT NULL,
  `exemplaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `id` int(11) NOT NULL,
  `etat` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20190205155749', '2019-02-05 15:58:00'),
('20190205160016', '2019-02-05 16:00:22'),
('20190205161353', '2019-02-05 16:14:00'),
('20190205163508', '2019-02-05 16:35:13'),
('20190205164330', '2019-02-05 16:43:37'),
('20190205165121', '2019-02-05 16:51:25'),
('20190205165718', '2019-02-05 16:57:25'),
('20190211160344', '2019-02-11 16:03:54'),
('20190211160557', '2019-02-11 16:06:03'),
('20190211160818', '2019-02-11 16:08:23');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne_h`
--

CREATE TABLE `personne_h` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `personne_h`
--

INSERT INTO `personne_h` (`id`, `nom`, `prenom`, `discr`, `nationalite`, `numero`, `email`) VALUES
(5, 'Lucas', 'George', 'auteurH', 'USA', NULL, NULL),
(6, 'López', 'Jean', 'clientH', NULL, '200', 'jean.lopez@lala.de'),
(7, 'Lucas', 'George', 'auteurH', 'USA', NULL, NULL),
(8, 'López', 'Jean', 'clientH', NULL, '200', 'jean.lopez@lala.de');

-- --------------------------------------------------------

--
-- Structure de la table `personne_mma`
--

CREATE TABLE `personne_mma` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personne_personne`
--

CREATE TABLE `personne_personne` (
  `personne_source` int(11) NOT NULL,
  `personne_target` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `supervision_mma`
--

CREATE TABLE `supervision_mma` (
  `id` int(11) NOT NULL,
  `evaluation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `superviseur_id` int(11) DEFAULT NULL,
  `supervise_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1677722F19EB6921` (`client_id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_497DD634DF25C577` (`categorie_parent_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client_exemplaire`
--
ALTER TABLE `client_exemplaire`
  ADD PRIMARY KEY (`client_id`,`exemplaire_id`),
  ADD KEY `IDX_CEAC01D319EB6921` (`client_id`),
  ADD KEY `IDX_CEAC01D35843AA21` (`exemplaire_id`);

--
-- Index pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne_h`
--
ALTER TABLE `personne_h`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne_mma`
--
ALTER TABLE `personne_mma`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personne_personne`
--
ALTER TABLE `personne_personne`
  ADD PRIMARY KEY (`personne_source`,`personne_target`),
  ADD KEY `IDX_CC1CC8AA6BF0479E` (`personne_source`),
  ADD KEY `IDX_CC1CC8AA72151711` (`personne_target`);

--
-- Index pour la table `supervision_mma`
--
ALTER TABLE `supervision_mma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D334C8D1B7BB80FF` (`superviseur_id`),
  ADD KEY `IDX_D334C8D1227586CB` (`supervise_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `exemplaire`
--
ALTER TABLE `exemplaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personne_h`
--
ALTER TABLE `personne_h`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `personne_mma`
--
ALTER TABLE `personne_mma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `supervision_mma`
--
ALTER TABLE `supervision_mma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avatar`
--
ALTER TABLE `avatar`
  ADD CONSTRAINT `FK_1677722F19EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `FK_497DD634DF25C577` FOREIGN KEY (`categorie_parent_id`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `client_exemplaire`
--
ALTER TABLE `client_exemplaire`
  ADD CONSTRAINT `FK_CEAC01D319EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CEAC01D35843AA21` FOREIGN KEY (`exemplaire_id`) REFERENCES `exemplaire` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `personne_personne`
--
ALTER TABLE `personne_personne`
  ADD CONSTRAINT `FK_CC1CC8AA6BF0479E` FOREIGN KEY (`personne_source`) REFERENCES `personne` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CC1CC8AA72151711` FOREIGN KEY (`personne_target`) REFERENCES `personne` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `supervision_mma`
--
ALTER TABLE `supervision_mma`
  ADD CONSTRAINT `FK_D334C8D1227586CB` FOREIGN KEY (`supervise_id`) REFERENCES `personne_mma` (`id`),
  ADD CONSTRAINT `FK_D334C8D1B7BB80FF` FOREIGN KEY (`superviseur_id`) REFERENCES `personne_mma` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
