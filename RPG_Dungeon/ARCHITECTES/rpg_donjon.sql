-- BDD User : UserDonjon
-- BDD PassWord : Super
-- BDD Name : RPG_DONJON
-- 
-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Novembre 2015 à 13:18
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

-- --------------------------------------------------------

--
-- Structure de la table `plateformes`
--

CREATE TABLE IF NOT EXISTS `plateformes` (
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `Direction` enum('NORD','EST','SUD','OUEST') NOT NULL,
  `idReference` int(11) NOT NULL,
  PRIMARY KEY (`x`,`y`),
  KEY `idReference` (`idReference`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `plateformes`
--

INSERT INTO `plateformes` (`x`, `y`, `Direction`, `idReference`) VALUES
(0, 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `references`
--

CREATE TABLE IF NOT EXISTS `references` (
  `idReference` int(11) NOT NULL AUTO_INCREMENT,
  `Valeur` varchar(15) NOT NULL,
  `idTexture` int(11) NOT NULL,
  PRIMARY KEY (`idReference`),
  KEY `idTexture` (`idTexture`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `references`
--

INSERT INTO `references` (`idReference`, `Valeur`, `idTexture`) VALUES
(1, 'sol', 0),
(2, 'mur', 0),
(3, 'joueur', 0);

-- --------------------------------------------------------

--
-- Structure de la table `textures`
--

CREATE TABLE IF NOT EXISTS `textures` (
  `idTexture` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) NOT NULL,
  `Chemin` varchar(200) NOT NULL,
  PRIMARY KEY (`idTexture`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
