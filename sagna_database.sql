-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 27 avr. 2024 à 15:44
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sagna_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `eno`
--

CREATE TABLE `eno` (
  `nomEno` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `eno`
--

INSERT INTO `eno` (`nomEno`) VALUES
('Dakar'),
('Diourbel'),
('Guédiawaye'),
('Podor'),
('Ziguinchor');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ine` varchar(200) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telephone` int(50) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `filiere` varchar(50) NOT NULL,
  `eno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ine`, `nom`, `prenom`, `email`, `telephone`, `sexe`, `filiere`, `eno`) VALUES
('N0010A', 'FALL', 'Mouhamed', 'mouhamed@uvs.sn', 776319628, 'masculin', 'MIC', 'Diourbel'),
('N0010B', 'Ndiaye', 'Fatou', 'fatou@gmail.com', 776006060, 'feminin', 'AGN', 'Diourbel'),
('N012', 'CISSE', 'Rokhaya', 'dabadakh@gmail.com', 776319628, 'feminin', 'AGN', 'Dakar'),
('N0122', 'Ndiaye', 'Modou', 'modou.ndiaye@uvs.sn', 776319628, 'feminin', 'CD', 'Diourbel'),
('N01255', 'CISSE', 'Rokhaya', 'dabadakh@gmail.com', 776319628, 'masculin', 'MIC', 'Diourbel'),
('N013', 'CISSE', 'Rokhaya', 'dabadakh@gmail.com', 776319628, 'masculin', 'MIC', 'Diourbel'),
('n022', 'Cisse', 'Rokhaya', 'daba@gmail.com', 77, 'feminin', 'AGN', 'Dakar');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `nomfiliere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`nomfiliere`) VALUES
('AGN'),
('CD'),
('MAI'),
('MIC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eno`
--
ALTER TABLE `eno`
  ADD PRIMARY KEY (`nomEno`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`ine`),
  ADD KEY `filiere` (`filiere`),
  ADD KEY `eno` (`eno`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`nomfiliere`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`filiere`) REFERENCES `filiere` (`nomfiliere`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`eno`) REFERENCES `eno` (`nomEno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
