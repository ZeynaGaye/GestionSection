-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 nov. 2022 à 23:39
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_section`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(4) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `etat` int(2) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `prenom`, `login`, `etat`, `pwd`) VALUES
(1, 'sow', 'Fatima', 'fatimatasow18@gmail.com', 1, '123');

-- --------------------------------------------------------

--
-- Structure de la table `affecter_module`
--

CREATE TABLE `affecter_module` (
  `idAffect` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `enseignant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affecter_module`
--

INSERT INTO `affecter_module` (`idAffect`, `idModule`, `enseignant_id`) VALUES
(1, 4, 23),
(2, 3, 24),
(3, 2, 26);

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `idAnnonce` int(11) NOT NULL,
  `message` varchar(50) DEFAULT NULL,
  `idClasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`idAnnonce`, `message`, `idClasse`) VALUES
(1, ' \r\n       eeeeeeee              ', 1),
(2, ' \r\n votre examen est reporté                    ', 4);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `idClasse` int(11) NOT NULL,
  `nomClasse` varchar(50) DEFAULT NULL,
  `enseignant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `nomClasse`, `enseignant_id`) VALUES
(1, 'L1', 20),
(2, 'L2', 22),
(4, 'L3', 22),
(5, 'M1', 20),
(6, 'M2', 25);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `idCours` int(11) NOT NULL,
  `nomCours` varchar(50) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `enseignant_id` int(11) NOT NULL,
  `idClasse` int(11) NOT NULL,
  `idModule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idCours`, `nomCours`, `url`, `enseignant_id`, `idClasse`, `idModule`) VALUES
(63, 'chap3', 'POOC++2021.pdf', 26, 1, 1),
(64, 'jascript', 'CCNA3-7.pdf', 26, 1, 1),
(66, 'chap1', 'XML-deye2021.pdf', 26, 1, 1),
(72, 'testFinal', 'note.txt', 26, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `idEnseignant` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `civilite` varchar(1) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`idEnseignant`, `nom`, `prenom`, `login`, `password`, `civilite`, `photo`) VALUES
(20, 'Boly', 'lamine', 'lamine@', '1234', 'M', 'Chrysantheme.jpg\r\n'),
(22, 'sow', 'amadou', 'amadou@', '123', 'M', NULL),
(23, 'sow', 'houley', 'houley31@', '12345', 'F', 'WhatsApp Image 2022-06-29 at 22.11.12.jpeg'),
(24, 'barry', 'mamadou', 'mamadou@gmail.com', '123', 'M', 'mikasa.jpeg'),
(25, 'konaté', 'karime', 'kako@', '123', 'M', 'mikasa.jpeg'),
(26, 'camara', 'zeyna', '', 'awa', 'M', 'mikasa.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtudiant` int(4) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `NumCarte` varchar(50) DEFAULT NULL,
  `idClasse` int(11) NOT NULL,
  `etat` int(1) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtudiant`, `nom`, `prenom`, `login`, `email`, `NumCarte`, `idClasse`, `etat`, `pwd`) VALUES
(7, 'sow', 'baba', 'baba@', 'babasow@gmail.com', '201909GJL', 2, 0, '123'),
(8, 'gaye', 'nabou', 'nabou@', 'zey@gmail.com', '201909GDF', 1, 0, '1234'),
(9, 'thiam', 'amisatou', 'amsa@', 'amisa@gmail.com', '201909JKL', 1, 1, '123'),
(10, 'Sow', 'houley', 'houly@', 'houley@gmail.com', '201909GVB', 2, 1, '123');

-- --------------------------------------------------------

--
-- Structure de la table `historique`
--

CREATE TABLE `historique` (
  `idHistorique` int(11) NOT NULL,
  `idEtudiant` int(11) NOT NULL,
  `idCours` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `historique`
--

INSERT INTO `historique` (`idHistorique`, `idEtudiant`, `idCours`, `date`) VALUES
(2, 7, 63, '2022-11-05 20:52:48'),
(5, 7, 66, '2022-11-05 21:02:59'),
(8, 7, 64, '2022-11-05 23:30:43');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `idModule` int(11) NOT NULL,
  `nomModule` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`idModule`, `nomModule`) VALUES
(1, 'php'),
(2, 'java'),
(3, 'algebre'),
(4, 'admin systeme');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Index pour la table `affecter_module`
--
ALTER TABLE `affecter_module`
  ADD PRIMARY KEY (`idAffect`),
  ADD KEY `idModule` (`idModule`),
  ADD KEY `enseignant_id` (`enseignant_id`);

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`idAnnonce`),
  ADD KEY `idClasse` (`idClasse`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`idClasse`),
  ADD KEY `idEnseignant` (`enseignant_id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`idCours`),
  ADD KEY `idEnseignant` (`enseignant_id`),
  ADD KEY `idClasse` (`idClasse`),
  ADD KEY `idModule` (`idModule`),
  ADD KEY `idModule_2` (`idModule`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`idEnseignant`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtudiant`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `idClasse` (`idClasse`);

--
-- Index pour la table `historique`
--
ALTER TABLE `historique`
  ADD PRIMARY KEY (`idHistorique`),
  ADD KEY `idEtudiant` (`idEtudiant`),
  ADD KEY `idCours` (`idCours`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`idModule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `affecter_module`
--
ALTER TABLE `affecter_module`
  MODIFY `idAffect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `idAnnonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `idClasse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `idCours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `idEnseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtudiant` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `historique`
--
ALTER TABLE `historique`
  MODIFY `idHistorique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `idModule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affecter_module`
--
ALTER TABLE `affecter_module`
  ADD CONSTRAINT `affecter_module_ibfk_1` FOREIGN KEY (`idModule`) REFERENCES `module` (`idModule`),
  ADD CONSTRAINT `affecter_module_ibfk_2` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignant` (`idEnseignant`);

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`idClasse`);

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignant` (`idEnseignant`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`enseignant_id`) REFERENCES `enseignant` (`idEnseignant`),
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`idClasse`),
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`idModule`) REFERENCES `module` (`idModule`);

--
-- Contraintes pour la table `historique`
--
ALTER TABLE `historique`
  ADD CONSTRAINT `historique_ibfk_1` FOREIGN KEY (`idEtudiant`) REFERENCES `etudiant` (`idEtudiant`),
  ADD CONSTRAINT `historique_ibfk_2` FOREIGN KEY (`idCours`) REFERENCES `cours` (`idCours`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
