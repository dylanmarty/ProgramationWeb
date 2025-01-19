-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 19 jan. 2025 à 14:48
-- Version du serveur : 8.0.40
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeux_videos`
--

-- --------------------------------------------------------

--
-- Structure de la table `meilleursscores`
--

DROP TABLE IF EXISTS `meilleursscores`;
CREATE TABLE IF NOT EXISTS `meilleursscores` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AttrapeEtoile` int NOT NULL DEFAULT '0',
  `Pong` int DEFAULT '0',
  `2048` int DEFAULT '0',
  `FlappyBird` int NOT NULL DEFAULT '0',
  `Snake` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `meilleursscores`
--

INSERT INTO `meilleursscores` (`ID`, `AttrapeEtoile`, `Pong`, `2048`, `FlappyBird`, `Snake`) VALUES
(2, 100, 100, 0, 0, 0),
(4, 4, 32, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nom` char(255) NOT NULL,
  `Prenom` char(255) NOT NULL,
  `Email` char(255) NOT NULL,
  `MotDePasse` char(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Nom`, `Prenom`, `Email`, `MotDePasse`) VALUES
(2, 'Marty', 'Dylan', 'md@gmail.com', 'toto'),
(4, 'a', 'b', 'c', 'd');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `meilleursscores`
--
ALTER TABLE `meilleursscores`
  ADD CONSTRAINT `MeilleursScores_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `utilisateurs` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
