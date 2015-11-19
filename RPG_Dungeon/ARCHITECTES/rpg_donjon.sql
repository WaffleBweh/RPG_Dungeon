-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Novembre 2015 à 13:14
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rpg_donjon`
--
USE `rpg_donjon`;

-- --------------------------------------------------------

--
-- Structure de la table `associertexture`
--

DROP TABLE IF EXISTS `associertexture`;
CREATE TABLE IF NOT EXISTS `associertexture` (
  `idReference` int(11) NOT NULL,
  `idTexture` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`idReference`,`idTexture`),
  KEY `idTexture` (`idTexture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `plateformes`
--

DROP TABLE IF EXISTS `plateformes`;
CREATE TABLE IF NOT EXISTS `plateformes` (
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `Direction` enum('NORD','EST','SUD','OUEST') NOT NULL,
  `idReference` int(11) NOT NULL,
  PRIMARY KEY (`x`,`y`),
  KEY `idReference` (`idReference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `plateformes`
--

INSERT INTO `plateformes` (`x`, `y`, `Direction`, `idReference`) VALUES
(0, 0, '', 2),
(0, 1, '', 2),
(0, 2, '', 2),
(0, 3, '', 2),
(0, 4, '', 2),
(0, 5, '', 2),
(1, 0, '', 2),
(1, 1, '', 1),
(1, 2, '', 1),
(1, 3, '', 1),
(1, 4, '', 2),
(1, 5, '', 2),
(2, 0, '', 2),
(2, 1, '', 2),
(2, 2, '', 2),
(2, 3, '', 1),
(2, 4, '', 2),
(2, 5, '', 2),
(3, 0, '', 2),
(3, 1, '', 1),
(3, 2, '', 2),
(3, 3, '', 3),
(3, 4, '', 1),
(3, 5, '', 2),
(4, 0, '', 2),
(4, 1, '', 1),
(4, 2, '', 1),
(4, 3, '', 1),
(4, 4, '', 1),
(4, 5, '', 2),
(5, 0, '', 2),
(5, 1, '', 2),
(5, 2, '', 2),
(5, 3, '', 2),
(5, 4, '', 2),
(5, 5, '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `references`
--

DROP TABLE IF EXISTS `references`;
CREATE TABLE IF NOT EXISTS `references` (
  `idReference` int(11) NOT NULL AUTO_INCREMENT,
  `Valeur` varchar(15) NOT NULL,
  PRIMARY KEY (`idReference`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `references`
--

INSERT INTO `references` (`idReference`, `Valeur`) VALUES
(1, 'sol'),
(2, 'mur'),
(3, 'joueur');

-- --------------------------------------------------------

--
-- Structure de la table `textures`
--

DROP TABLE IF EXISTS `textures`;
CREATE TABLE IF NOT EXISTS `textures` (
  `idTexture` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) NOT NULL,
  `Chemin` varchar(200) NOT NULL,
  PRIMARY KEY (`idTexture`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `textures`
--

INSERT INTO `textures` (`idTexture`, `Nom`, `Chemin`) VALUES
(1, 'sol1', 'sol1.png'),
(2, 'sol2', 'sol2.png');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(25) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `posX` int(10) NOT NULL,
  `posY` int(10) NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `associertexture`
--
ALTER TABLE `associertexture`
  ADD CONSTRAINT `associertexture_ibfk_2` FOREIGN KEY (`idReference`) REFERENCES `references` (`idReference`),
  ADD CONSTRAINT `associertexture_ibfk_1` FOREIGN KEY (`idTexture`) REFERENCES `textures` (`idTexture`);

--
-- Contraintes pour la table `plateformes`
--
ALTER TABLE `plateformes`
  ADD CONSTRAINT `plateformes_ibfk_1` FOREIGN KEY (`idReference`) REFERENCES `references` (`idReference`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
