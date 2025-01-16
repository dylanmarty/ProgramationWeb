-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 15 jan. 2025 à 09:10
-- Version du serveur :  10.4.12-MariaDB-log
-- Version de PHP : 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e2405469`
--

-- --------------------------------------------------------

--
-- Structure de la table `MeilleursScores`
--

CREATE TABLE `MeilleursScores` (
  `ID` int(11) NOT NULL,
  `AttrapeEtoile` int(11) NOT NULL DEFAULT 0,
  `Pong` int(11) NOT NULL
  `Memory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `ID` int(11) NOT NULL,
  `Nom` char(255) NOT NULL,
  `Prenom` char(255) NOT NULL,
  `Email` char(255) NOT NULL,
  `MotDePasse` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `MeilleursScores`
--
ALTER TABLE `MeilleursScores`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `MeilleursScores`
--
ALTER TABLE `MeilleursScores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `MeilleursScores`
--
ALTER TABLE `MeilleursScores`
  ADD CONSTRAINT `MeilleursScores_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `Utilisateurs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
