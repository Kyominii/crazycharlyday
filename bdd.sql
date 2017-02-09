-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 09 Février 2017 à 20:00
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `crazyday`
--

-- --------------------------------------------------------

--
-- Structure de la table `estmembre`
--

CREATE TABLE `estmembre` (
  `id_groupe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `estCreateur` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `estmembre`
--

INSERT INTO `estmembre` (`id_groupe`, `id_user`, `estCreateur`) VALUES
(1, 32, 1);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `id_logement` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `description`, `id_logement`, `url`) VALUES
(1, '', -1, '8ccbed40da5cead237ffadbdcd211837a876d0f1');

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id`, `places`) VALUES
(1, 3),
(2, 3),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 5),
(9, 5),
(10, 6),
(11, 6),
(12, 6),
(13, 7),
(14, 7),
(15, 8),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Mp` varchar(256) NOT NULL,
  `nom` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `Mp`, `nom`, `message`) VALUES
(1, '', 'Jeanne', 'aime la musique ♫'),
(2, '', 'Paul', 'aime cuisiner ♨ ♪'),
(3, '', 'Myriam', 'mange Halal ☪'),
(4, '', 'Nicolas', 'ouvert à tous ⛄'),
(5, '', 'Sophie', 'aime sortir ♛'),
(6, '', 'Karim', 'aime le soleil ☀'),
(7, '', 'Julie', 'apprécie le calme ☕'),
(8, '', 'Etienne', 'accepte jeunes et vieux ☯'),
(9, '', 'Max', 'féru de musique moderne ☮'),
(10, '', 'Sabrina', 'aime les repas en commun ⛵☻'),
(11, '', 'Nathalie', 'bricoleuse ⛽'),
(12, '', 'Martin', 'sportif ☘ ⚽ ⚾ ⛳'),
(13, '', 'Manon', ''),
(14, '', 'Thomas', ''),
(15, '', 'Léa', ''),
(16, '', 'Alexandre', ''),
(17, '', 'Camille', ''),
(18, '', 'Quentin', ''),
(19, '', 'Marie', ''),
(20, '', 'Antoine', ''),
(21, '', 'Laura', ''),
(22, '', 'Julien', ''),
(23, '', 'Pauline', ''),
(24, '', 'Lucas', ''),
(25, '', 'Sarah', ''),
(26, '', 'Romain', ''),
(27, '', 'Mathilde', ''),
(28, '', 'Florian', ''),
(32, '$2y$10$Yle9.Z6QLjeuhJ13ebocfeqSVQEwWpaKLWX6cq477ulXmH33pjF5K', 'moi', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
