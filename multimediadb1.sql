-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 17 juin 2020 à 14:27
-- Version du serveur :  5.5.28
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `danonedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `titre` varchar(255) NOT NULL,
  `nomp` varchar(50) NOT NULL,
  `prenomp` varchar(50) NOT NULL,
  `resumer` text NOT NULL,
  `dat` int(15) NOT NULL,
  PRIMARY KEY (`titre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `e_absence_retard`
--

DROP TABLE IF EXISTS `e_absence_retard`;
CREATE TABLE IF NOT EXISTS `e_absence_retard` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `Ab_Rt` varchar(30) NOT NULL,
  `motif` text NOT NULL,
  `dat` varchar(11) NOT NULL,
  `heur` int(11) NOT NULL,
  PRIMARY KEY (`dat`,`heur`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `e_absence_retard`
--

INSERT INTO `e_absence_retard` (`username`, `nom`, `prenom`, `specialite`, `Ab_Rt`, `motif`, `dat`, `heur`) VALUES
('kb97G1', 'kebbi', 'billal', 'Etudiant', 'absence', ' malade', '27/04/2020', 23);

-- --------------------------------------------------------

--
-- Structure de la table `e_com_d`
--

DROP TABLE IF EXISTS `e_com_d`;
CREATE TABLE IF NOT EXISTS `e_com_d` (
  `username` varchar(70) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `date_nais` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(111) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(111) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `e_creation_d`
--

DROP TABLE IF EXISTS `e_creation_d`;
CREATE TABLE IF NOT EXISTS `e_creation_d` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_nais` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(11) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `e_creation_d`
--

INSERT INTO `e_creation_d` (`username`, `nom`, `prenom`, `date_nais`, `adresse`, `email`, `motdepasse`, `NbrAb`, `RaisonAb`, `NbrRt`) VALUES
('admin', 'kebbi', 'billal', '05/05/1997', 'seddouk', '', 'erpogjwergw', 0, '', 0),
('ADMIN0', 'ppppp', 'qqqqqq', '2020-04-28', 'thjrt', 'melissa@gmail.com', '4b71b002cd2a95f7c0ea1713cf519c9c', 0, '', 0),
('OPERATEUR3', 'aaaaaaaaa', 'billal', '6666-06-06', 'thjrt', 'kbibillal@gmail.com', '4b71b002cd2a95f7c0ea1713cf519c9c', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `e_dev_web`
--

DROP TABLE IF EXISTS `e_dev_web`;
CREATE TABLE IF NOT EXISTS `e_dev_web` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `date_nais` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(11) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `e_dev_web`
--

INSERT INTO `e_dev_web` (`username`, `nom`, `prenom`, `date_nais`, `adresse`, `email`, `motdepasse`, `NbrAb`, `RaisonAb`, `NbrRt`) VALUES
('admin', 'keb', 'bil', '33/33/3333', 'seddouk', '', '', 11, ' \"ther\"', 2),
('admin1', 'keb', 'bil', '33/33/3333', 'seddouk', '', '', 11, 'ther', 2);

-- --------------------------------------------------------

--
-- Structure de la table `e_groupe1`
--

DROP TABLE IF EXISTS `e_groupe1`;
CREATE TABLE IF NOT EXISTS `e_groupe1` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_nais` varchar(11) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(11) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `e_groupe1`
--

INSERT INTO `e_groupe1` (`username`, `nom`, `prenom`, `date_nais`, `adresse`, `email`, `motdepasse`, `NbrAb`, `RaisonAb`, `NbrRt`) VALUES
('kb97G1', 'kebbi', 'billal', '2222-02-22', 'seddouk', 'kbibillal@gmail.com', '4b71b002cd2a95f7c0ea1713cf519c9c', 0, '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `e_groupe2`
--

DROP TABLE IF EXISTS `e_groupe2`;
CREATE TABLE IF NOT EXISTS `e_groupe2` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_nais` varchar(11) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(11) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `e_groupe2`
--

INSERT INTO `e_groupe2` (`username`, `nom`, `prenom`, `date_nais`, `adresse`, `email`, `motdepasse`, `NbrAb`, `RaisonAb`, `NbrRt`) VALUES
('bp33g2', 'pitt', 'brad', '3333-03-31', 'paris', 'melissa@gmail.com', '4b71b002cd2a95f7c0ea1713cf519c9c', 0, '', 0),
('bp33g2', 'pitt', 'brad', '3333-03-31', 'paris', 'melissa@gmail.com', '4b71b002cd2a95f7c0ea1713cf519c9c', 0, '', 0),
('bp33g2', 'pitt', 'brad', '3333-03-31', 'paris', 'melissa@gmail.com', '4b71b002cd2a95f7c0ea1713cf519c9c', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `e_groupe3`
--

DROP TABLE IF EXISTS `e_groupe3`;
CREATE TABLE IF NOT EXISTS `e_groupe3` (
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_nais` varchar(11) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(11) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligneproduction`
--

DROP TABLE IF EXISTS `ligneproduction`;
CREATE TABLE IF NOT EXISTS `ligneproduction` (
  `NumLigneP` int(20) NOT NULL,
  `NbPH` int(20) NOT NULL,
  `idbalance` int(11) NOT NULL,
  `marqueb` varchar(30) NOT NULL,
  PRIMARY KEY (`NumLigneP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligneproduction`
--

INSERT INTO `ligneproduction` (`NumLigneP`, `NbPH`, `idbalance`, `marqueb`) VALUES
(1, 500, 1, 'casio');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `prenom` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `adresse` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `type_user` varchar(30) NOT NULL,
  `motdepasse` varchar(255) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`username`, `nom`, `prenom`, `adresse`, `date_naissance`, `email`, `type_user`, `motdepasse`) VALUES
('ADMIN', 'kebbi', 'billal', 'seddouk', '1997-05-05', 'billal@gmail.com', 'admin', '4b71b002cd2a95f7c0ea1713cf519c9c'),
('ADMIN0', 'ppppp', 'qqqqqq', 'thjrt', '2020-04-28', 'melissa@gmail.com', 'Etudiant', '4b71b002cd2a95f7c0ea1713cf519c9c'),
('kb97G1', 'kebbi', 'billal', 'seddouk', '2222-02-22', 'kbibillal@gmail.com', 'Etudiant', '4b71b002cd2a95f7c0ea1713cf519c9c'),
('melissa', 'qoqo', 'oqoqo', '\\wlemfwe', '0000-00-00', '', 'admin', ''),
('OPERATEUR', 'aaaaaaaaa', 'qqqqqq', 'thjrt', '1111-11-11', '', 'operateur', '4b71b002cd2a95f7c0ea1713cf519c9c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
