-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 09 jan. 2025 à 08:15
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
-- Base de données : `jeux_videos`
--

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

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`ID`, `Nom`, `Prenom`, `Email`, `MotDePasse`) VALUES
(2, 'Marty', 'Dylan', 'md@gmail.com', 'toto');

-- --------------------------------------------------------

--
-- Structure de la table `MeilleursScores`
--

CREATE TABLE `MeilleursScores` (
  `ID` int(11) NOT NULL,
  `AttrapeEtoile` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `MeilleursScores`
--

INSERT INTO `MeilleursScores` (`ID`, `AttrapeEtoile`) VALUES
(2, 100);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs_site_TP`
--

CREATE TABLE `utilisateurs_site_TP` (
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs_site_TP`
--

INSERT INTO `utilisateurs_site_TP` (`login`, `password`, `nom`, `prenom`, `mail`) VALUES
('chRoy', 'password1', 'Roy', 'Charles', 'charles.roy@gmail.com'),
('ClarkBest', 'password2', 'Wayne', 'Bruce', 'batman.robin@wayne.co'),
('TomOlive', 'password3', 'Dupont', 'Edgard', 'yugi.sacha@wanadoo.fr'),
('WhatsUp', 'password4', 'Rogers', 'Shaggy', 'scooby.doo@mystery.mach');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `MeilleursScores`
--
ALTER TABLE `MeilleursScores`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateurs_site_TP`
--
ALTER TABLE `utilisateurs_site_TP`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `MeilleursScores`
--
ALTER TABLE `MeilleursScores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
