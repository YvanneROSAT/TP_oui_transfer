-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 02 mars 2024 à 15:56
-- Version du serveur : 10.6.14-MariaDB-cll-lve
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u479250329_oui_transfer`
--

-- --------------------------------------------------------

--
-- Structure de la table `Fichiers`
--

CREATE TABLE `Fichiers` (
  `ID` int(11) NOT NULL,
  `nom_fichier` varchar(255) NOT NULL,
  `nom_fichier_cryptee` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nombre_telechargement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Fichiers`
--

INSERT INTO `Fichiers` (`ID`, `nom_fichier`, `nom_fichier_cryptee`, `id_user`, `nombre_telechargement`) VALUES
(69, 'test.png', '09ebdc1e4ed2ac81d558ba4664d5e7e370114e4ea04c32b86334ba46c2c1314665e3284f6251f.png', 3, 2),
(70, 'cours_frontend_1.pdf', '8474bd220a4822b6c5bd2f7343390c9dfc0794e50d7af1ea5556b29a01e350d365e32c840a127.pdf', 4, 1),
(73, 'cours_fronttend_2.pdf', '8474bd220a4822b6c5bd2f7343390c9dfc0794e50d7af1ea5556b29a01e350d365e33d834cb76.pdf', 4, 0),
(79, 'cours_fronttend_2.pdf', '8474bd220a4822b6c5bd2f7343390c9dfc0794e50d7af1ea5556b29a01e350d365e34ab59b0d7.pdf', 4, 0),
(80, 'cours_frontend_1.pdf', '8474bd220a4822b6c5bd2f7343390c9dfc0794e50d7af1ea5556b29a01e350d365e34b039cde8.pdf', 4, 0),
(81, 'cours_fronttend_2.pdf', '8474bd220a4822b6c5bd2f7343390c9dfc0794e50d7af1ea5556b29a01e350d365e34b2564dfe.pdf', 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Partage`
--

CREATE TABLE `Partage` (
  `ID` int(11) NOT NULL,
  `id_fichier` int(11) NOT NULL,
  `id_utilisateur_partage` int(11) NOT NULL,
  `id_user_autorisee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Partage`
--

INSERT INTO `Partage` (`ID`, `id_fichier`, `id_utilisateur_partage`, `id_user_autorisee`) VALUES
(25, 69, 3, 4),
(26, 70, 4, 3),
(27, 73, 4, 3),
(31, 79, 4, 3),
(32, 79, 4, 1),
(33, 80, 4, 3),
(34, 81, 4, 3),
(35, 81, 4, 1),
(36, 81, 4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`ID`, `nom`, `email`, `password_user`) VALUES
(1, 'Jean', 'jean@gmail.com', '$2y$10$HRXtz1Po5E65I3wHOnyObe3ajph5ANHIzKKj7dwnPCe32x/Qb0L9W'),
(3, 'Louis P', 'Louis@Pignion.fr', '$2y$10$wx.VonZALWYHWxI7pTLqmeDxWpvDjxh3F9BeKkLU6pVJ8XVFb7G.O'),
(4, 'abou', 'abo@gmail.com', '$2y$10$tm/FgrXGgp5e4njzrXXmrugCDhAa.tIPgje0QP0BviK5wEAfWCo1W'),
(5, 'lala', 'lala@gmail.com', '$2y$10$T6ZaxAE7UXzVbJltVOTxI.lwn7yakLSKAnX5R3rCiIYk1CTTomCLK'),
(6, 'brice', 'paul@gmail.com', '$2y$10$I/hbXR6NlIrXhV9bcNLxA.oKdlx32FuI0cm4MlXD27Z7S6EZC6hXS'),
(7, 'stan', 'stanley77185@gmail.com', '$2y$10$FvxiSqUWt9lXCOC17jtrGenzR5Ym5DYY1FbIRhnNkKksETLccQhDq'),
(8, 'Test', 'test@mail.com', '$2y$10$UIXLeXqu92zq4CwPoa/L2.WSt5vrldj1ilnRqJpl3XmMtG5g6KaWm');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Fichiers`
--
ALTER TABLE `Fichiers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `Partage`
--
ALTER TABLE `Partage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_fichier` (`id_fichier`),
  ADD KEY `id_utilisateur_partage` (`id_utilisateur_partage`),
  ADD KEY `id_user_autorisee` (`id_user_autorisee`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Fichiers`
--
ALTER TABLE `Fichiers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `Partage`
--
ALTER TABLE `Partage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Fichiers`
--
ALTER TABLE `Fichiers`
  ADD CONSTRAINT `Fichiers_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `Users` (`ID`);

--
-- Contraintes pour la table `Partage`
--
ALTER TABLE `Partage`
  ADD CONSTRAINT `Partage_ibfk_1` FOREIGN KEY (`id_fichier`) REFERENCES `Fichiers` (`ID`),
  ADD CONSTRAINT `Partage_ibfk_2` FOREIGN KEY (`id_utilisateur_partage`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `Partage_ibfk_3` FOREIGN KEY (`id_user_autorisee`) REFERENCES `Users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
