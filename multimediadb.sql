-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 20, 2020 at 10:32 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `multimediadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `titre` varchar(255) NOT NULL,
  `nomp` varchar(50) NOT NULL,
  `prenomp` varchar(50) NOT NULL,
  `resumer` text NOT NULL,
  `dat` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `e_absence_retard`
--

CREATE TABLE `e_absence_retard` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `Ab_Rt` varchar(30) NOT NULL,
  `motif` text NOT NULL,
  `dat` varchar(11) NOT NULL,
  `heur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `e_absence_retard`
--

INSERT INTO `e_absence_retard` (`username`, `nom`, `prenom`, `specialite`, `Ab_Rt`, `motif`, `dat`, `heur`) VALUES
('kb97G1', 'kebbi', 'billal', 'Etudiant', 'absence', ' malade', '27/04/2020', 23);

-- --------------------------------------------------------

--
-- Table structure for table `e_com_d`
--

CREATE TABLE `e_com_d` (
  `username` varchar(70) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `date_nais` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(111) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `e_creation_d`
--

CREATE TABLE `e_creation_d` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_nais` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(11) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `e_creation_d`
--

INSERT INTO `e_creation_d` (`username`, `nom`, `prenom`, `date_nais`, `adresse`, `email`, `motdepasse`, `NbrAb`, `RaisonAb`, `NbrRt`) VALUES
('admin', 'kebbi', 'billal', '05/05/1997', 'seddouk', '', 'erpogjwergw', 0, '', 0),
('ADMIN0', 'ppppp', 'qqqqqq', '2020-04-28', 'thjrt', 'melissa@gmail.com', '4b71b002cd2a95f7c0ea1713cf519c9c', 0, '', 0),
;

-- --------------------------------------------------------

--
-- Table structure for table `e_dev_web`
--

CREATE TABLE `e_dev_web` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `prenom` varchar(70) NOT NULL,
  `date_nais` varchar(30) CHARACTER SET latin1 NOT NULL,
  `adresse` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `NbrAb` int(11) NOT NULL,
  `RaisonAb` text NOT NULL,
  `NbrRt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `e_groupe1`
--

CREATE TABLE `e_groupe1` (
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
-- Dumping data for table `e_groupe1`
--

INSERT INTO `e_groupe1` (`username`, `nom`, `prenom`, `date_nais`, `adresse`, `email`, `motdepasse`, `NbrAb`, `RaisonAb`, `NbrRt`) VALUES
('Etudiant', 'Multimedia', 'etudiant', '1998-04-01', 'France pairs', 'etudiant@gmail.com', 'c03318c15d6bc24b8c3d3604ad346b57', 0, '', 0),
('Melissa', 'BENMEZIANE', 'MELISSA', '1998-04-01', 'France paris ', 'melissabenmeziane01@gmail.com', '86b49576f4b74fb8eec8124b83061ac1', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `e_groupe2`
--

CREATE TABLE `e_groupe2` (
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

-- --------------------------------------------------------

--
-- Table structure for table `e_groupe3`
--

CREATE TABLE `e_groupe3` (
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
-- Table structure for table `ligneproduction`
--

CREATE TABLE `ligneproduction` (
  `NumLigneP` int(20) NOT NULL,
  `NbPH` int(20) NOT NULL,
  `idbalance` int(11) NOT NULL,
  `marqueb` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ligneproduction`
--

INSERT INTO `ligneproduction` (`NumLigneP`, `NbPH`, `idbalance`, `marqueb`) VALUES
(1, 500, 1, 'casio');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `username` varchar(30) NOT NULL,
  `nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `prenom` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `adresse` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL,
  `type_user` varchar(30) NOT NULL,
  `motdepasse` varchar(255) CHARACTER SET utf8 COLLATE utf8_latvian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`username`, `nom`, `prenom`, `adresse`, `date_naissance`, `email`, `type_user`, `motdepasse`) VALUES
('admin', 'Gbape', 'Sandra', 'France paris ', '0001-01-01', 'admin01@gmail.com', 'admin', '72eaa10075d215eca78a5fc40581b749'),
('Enseignant', 'Tranchina', 'Thierry', 'France paris ', '0001-01-01', 'ThierryTranchina@gmail.com', 'enseignant', '072a45643f11017eabb1e36fc3ded016'),
('Etudiant', 'Multimedia', 'etudiant', 'France pairs', '1998-04-01', 'etudiant@gmail.com', 'Prepa A', 'c03318c15d6bc24b8c3d3604ad346b57'),
('Melissa', 'BENMEZIANE', 'MELISSA', 'France paris ', '1998-04-01', 'melissabenmeziane01@gmail.com', 'Prepa A', '86b49576f4b74fb8eec8124b83061ac1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`titre`);

--
-- Indexes for table `e_absence_retard`
--
ALTER TABLE `e_absence_retard`
  ADD PRIMARY KEY (`dat`,`heur`,`username`);

--
-- Indexes for table `e_com_d`
--
ALTER TABLE `e_com_d`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `e_creation_d`
--
ALTER TABLE `e_creation_d`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `e_dev_web`
--
ALTER TABLE `e_dev_web`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ligneproduction`
--
ALTER TABLE `ligneproduction`
  ADD PRIMARY KEY (`NumLigneP`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`username`);