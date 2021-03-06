-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Ven 20 Novembre 2015 à 19:21
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `rpg`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

CREATE TABLE IF NOT EXISTS `affecter` (
  `id_utilisateur` int(11) NOT NULL,
  `id_groupe` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_groupe`),
  KEY `id_groupe` (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`id_utilisateur`, `id_groupe`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 9);

-- --------------------------------------------------------

--
-- Structure de la table `anecdote`
--

CREATE TABLE IF NOT EXISTS `anecdote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `moment` datetime NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_personnage` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_personnage` (`id_personnage`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attribuer`
--

CREATE TABLE IF NOT EXISTS `attribuer` (
  `id_droit` smallint(5) unsigned NOT NULL,
  `id_groupe` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`id_droit`,`id_groupe`),
  KEY `id_groupe` (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `attribuer`
--

INSERT INTO `attribuer` (`id_droit`, `id_groupe`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(5, 9),
(6, 9),
(7, 9),
(8, 9),
(9, 9),
(10, 9),
(11, 9),
(12, 9),
(13, 9),
(14, 9),
(15, 9),
(16, 9),
(17, 9),
(18, 9),
(19, 9),
(20, 9),
(21, 9),
(22, 9),
(23, 9),
(24, 9),
(25, 9),
(26, 9),
(27, 9),
(28, 9),
(29, 9),
(30, 9),
(31, 9),
(32, 9),
(33, 9),
(34, 9),
(35, 9),
(36, 9),
(51, 9),
(1, 10),
(3, 10),
(4, 10),
(51, 10);

-- --------------------------------------------------------

--
-- Structure de la table `aventure`
--

CREATE TABLE IF NOT EXISTS `aventure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_univers` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_univers` (`id_univers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `communaute`
--

CREATE TABLE IF NOT EXISTS `communaute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `maximum` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_lieu` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_lieu` (`id_lieu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE IF NOT EXISTS `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `conferer`
--

CREATE TABLE IF NOT EXISTS `conferer` (
  `id_race` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `id_competence` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_race`,`id_classe`,`id_competence`),
  KEY `id_classe` (`id_classe`),
  KEY `id_competence` (`id_competence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `confidentialite`
--

CREATE TABLE IF NOT EXISTS `confidentialite` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `confidentialite`
--

INSERT INTO `confidentialite` (`id`, `libelle`) VALUES
(2, 'les contacts de mes contacts'),
(3, 'mes contacts'),
(4, 'seulement moi'),
(1, 'tout le monde');

-- --------------------------------------------------------

--
-- Structure de la table `consommer`
--

CREATE TABLE IF NOT EXISTS `consommer` (
  `id_action` int(11) NOT NULL,
  `id_competence` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_action`,`id_competence`),
  KEY `id_competence` (`id_competence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`id`, `nom`, `actif`) VALUES
(1, 'UtilisateurControler::connect', 1),
(3, 'UtilisateurControler::create', 1),
(4, 'UtilisateurControler::forgotten', 1),
(5, 'UtilisateurControler::disconnect', 1),
(6, 'UtilisateurControler::invite', 1),
(7, 'UtilisateurControler::read_profil_owner', 1),
(8, 'UtilisateurControler::update_owner_profil', 1),
(9, 'UtilisateurControler::upload_avatar', 1),
(10, 'UtilisateurControler::select_avatar', 1),
(11, 'UtilisateurControler::update_confid', 1),
(12, 'UtilisateurControler::read_list', 1),
(13, 'UtilisateurControler::read_profil', 1),
(14, 'UtilisateurControler::add_contact', 1),
(15, 'UtilisateurControler::remove_contact', 1),
(16, 'UtilisateurControler::block_contact', 1),
(17, 'UtilisateurSignalControler::create', 1),
(18, 'MessageControler::create', 1),
(19, 'MessageControler::read_owner', 1),
(20, 'MessageControler::archive_owner', 1),
(21, 'MessageSignalControler::create', 1),
(22, 'PersonnageControler::create', 1),
(23, 'PersonnageControler::update_owner', 1),
(24, 'PersonnageControler::archive_owner', 1),
(25, 'InterventionControler::create', 1),
(26, 'InterventionControler::use_action', 1),
(27, 'InterventionControler::update_owner', 1),
(28, 'InterventionSignalControler::create', 1),
(29, 'MessageRPControler::create', 1),
(30, 'MessageRPControler::read_owner', 1),
(31, 'MessageRPControler::archive_owner', 1),
(32, 'MessageRPSignalControler::create', 1),
(33, 'AventureControler::create', 1),
(34, 'AventureControler::update_owner', 1),
(35, 'AventureControler::archive_owner', 1),
(36, 'AventureControler::close_owner', 1),
(37, 'DroitControler::read', 1),
(38, 'DroitControler::update', 1),
(39, 'DroitControler::delete', 1),
(40, 'DroitControler::active', 1),
(41, 'DroitControler::desactive', 1),
(42, 'GroupeControler::read', 1),
(43, 'GroupeControler::update', 1),
(44, 'GroupeControler::delete', 1),
(45, 'GroupeControler::active', 1),
(46, 'GroupeControler::desactive', 1),
(47, 'AffecterControler::link', 1),
(48, 'AttribuerControler::link', 1),
(49, 'GroupeControler::create', 1),
(50, 'DroitControler::create', 1),
(51, 'DefaultControler::defaultAction', 1),
(52, 'PersonnageControler::read', 1),
(53, 'PersonnageControler::update', 1),
(54, 'PersonnageControler::delete', 1),
(55, 'PersonnageControler::active', 1),
(56, 'PersonnageControler::desactive', 1),
(57, 'UtilisateurControler::read', 1),
(58, 'UtilisateurControler::update', 1),
(59, 'UtilisateurControler::delete', 1);

-- --------------------------------------------------------

--
-- Structure de la table `exercer`
--

CREATE TABLE IF NOT EXISTS `exercer` (
  `id_personnage` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_personnage`,`id_classe`),
  KEY `id_classe` (`id_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déclencheurs `exercer`
--
DROP TRIGGER IF EXISTS `exercer_bi`;
DELIMITER //
CREATE TRIGGER `exercer_bi` BEFORE INSERT ON `exercer`
 FOR EACH ROW IF NOT EXISTS(
	SELECT *
	FROM classe
	INNER JOIN proposer ON proposer.id_classe = classe.id
	INNER JOIN race ON proposer.id_race = race.id
	INNER JOIN personnage ON personnage.id_race = race.id
	WHERE classe.id = NEW.id_classe
	AND personnage.id = NEW.id_personnage)
THEN
	SIGNAL SQLSTATE '45000'
	SET MESSAGE_TEXT = "`id_classe` and `id_personnage` values not found in (`personnage` -> `race` -> `proposer`) table(s).";
END IF
//
DELIMITER ;
DROP TRIGGER IF EXISTS `exercer_bu`;
DELIMITER //
CREATE TRIGGER `exercer_bu` BEFORE UPDATE ON `exercer`
 FOR EACH ROW IF NOT EXISTS(
	SELECT *
	FROM classe
	INNER JOIN proposer ON proposer.id_classe = classe.id
	INNER JOIN race ON proposer.id_race = race.id
	INNER JOIN personnage ON personnage.id_race = race.id
	WHERE classe.id = NEW.id_classe
	AND personnage.id = NEW.id_personnage)
THEN
	SIGNAL SQLSTATE '45000'
	SET MESSAGE_TEXT = "`id_classe` and `id_personnage` values not found in (`personnage` -> `race` -> `proposer`) table(s).";
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `exister`
--

CREATE TABLE IF NOT EXISTS `exister` (
  `id_race` int(11) NOT NULL,
  `id_univers` int(11) NOT NULL,
  PRIMARY KEY (`id_race`,`id_univers`),
  KEY `id_univers` (`id_univers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `maximum` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `connecte` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`, `maximum`, `avatar`, `connecte`, `actif`) VALUES
(1, 'Grand Concepteur', 'Maître absolu et incontesté des Univers.', 1, '2c7fa0fa37eb7dc32a772f20c5306ac277b08768.png', 1, 1),
(2, 'Architecte(s)', 'Maître d&#39;un Univers.', 1, '0c9a7e3da93a997931c324f3b7c554d2c477f71b.png', 1, 1),
(3, 'Maître(s) de Jeu', 'Assistant de l&#39;architecte sur le développement RP de son Univers.', 1, '3159333ba60204a296f1367ea4059c59da45ee7b.png', 1, 1),
(4, 'Juge(s)', 'Impartial, il fait appliquer la loi dans un secteur.\r\nUne fois rendue, sa décision ne peut être contestée.', 1, 'f05e649c978352cd60a1bfcdb3a269a48798295a.png', 1, 1),
(5, 'Bourreau(x)', 'Mystérieux et solitaire, il applique les sentences prononcées par le juge.', 3, '4996de5c03d390882127c9d26fde43284f4f1294.png', 1, 1),
(6, 'Diplomate(s)', 'Généreux et volontaire, il est le garant de la paix dans un secteur.\r\nIl s&#39;assure que les conflits peuvent être réglés à l&#39;amiable avant de les porter devant le tribunal.\r\n', 5, '31c56cea6c961b45036a6f8007b5ba8591e5acf7.png', 1, 1),
(7, 'Veilleur(s)', 'Attentif, discret, honnête, il surveille le déroulement des aventures\r\net le comportement RP / HRP des personnages / utilisateurs.\r\nEn cas d&#39;infraction aux règlements du site, du secteur, ou de l&#39;univers\r\nle veilleur fait un signalement objectif et précis de l&#39;incident.', 10, 'dad5e7cde0cb21564176ed18ced68aec41c88719.png', 1, 1),
(8, 'Scribe(s)', 'Irréprochable dans son orthographe, et sa grammaire, il est le garant du respect de la langue Française.', 20, '5f8b9b655d9d5b32f97d6d03dd6bcc5970823b1e.png', 1, 1),
(9, 'Utilisateur(s)', 'Utilisateur normal', 0, NULL, 1, 1),
(10, 'Anonyme(s)', 'Internaute non connecté', 0, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE IF NOT EXISTS `intervention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `moment` datetime NOT NULL,
  `id_personnage` int(11) DEFAULT NULL,
  `id_aventure` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_action` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_personnage` (`id_personnage`),
  KEY `id_aventure` (`id_aventure`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_action` (`id_action`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE IF NOT EXISTS `lieu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `coord_x` int(11) NOT NULL,
  `coord_y` int(11) NOT NULL,
  `carte` varchar(255) NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_secteur` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_secteur` (`id_secteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `contenu` text NOT NULL,
  `momentEnvoie` datetime NOT NULL,
  `momentVu` datetime NOT NULL,
  `momentConfirme` datetime NOT NULL,
  `id_utilisateur_envoyer` int(11) DEFAULT NULL,
  `id_utilisateur_recevoir` int(11) DEFAULT NULL,
  `id_message_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur_envoyer` (`id_utilisateur_envoyer`),
  KEY `id_utilisateur_recevoir` (`id_utilisateur_recevoir`),
  KEY `id_message_type` (`id_message_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `message_type`
--

CREATE TABLE IF NOT EXISTS `message_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `libelle` (`libelle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `niveau_personnage`
--

CREATE TABLE IF NOT EXISTS `niveau_personnage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_niveau_suivant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `id_niveau_suivant` (`id_niveau_suivant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `niveau_personnage`
--

INSERT INTO `niveau_personnage` (`id`, `nom`, `description`, `actif`, `id_niveau_suivant`) VALUES
(1, 'niveau 1', '', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `niveau_utilisateur`
--

CREATE TABLE IF NOT EXISTS `niveau_utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_niveau_suivant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `id_niveau_suivant` (`id_niveau_suivant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `niveau_utilisateur`
--

INSERT INTO `niveau_utilisateur` (`id`, `nom`, `description`, `actif`, `id_niveau_suivant`) VALUES
(1, 'débutant', '', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `objectif_personnage`
--

CREATE TABLE IF NOT EXISTS `objectif_personnage` (
  `id_niveau_personnage` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `description` text NOT NULL,
  `script` text NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_niveau_personnage`,`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objectif_utilisateur`
--

CREATE TABLE IF NOT EXISTS `objectif_utilisateur` (
  `id_niveau_utilisateur` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `description` text NOT NULL,
  `script` text NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_niveau_utilisateur`,`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `octroyer`
--

CREATE TABLE IF NOT EXISTS `octroyer` (
  `id_personnage` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_communaute` int(11) NOT NULL,
  `moment` datetime NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_personnage`,`id_role`,`id_communaute`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_role` (`id_role`),
  KEY `octroyer_ibfk_3` (`id_communaute`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(3) NOT NULL,
  `alpha2` varchar(2) NOT NULL,
  `alpha3` varchar(3) NOT NULL,
  `nom_en_gb` varchar(45) NOT NULL,
  `nom_fr_fr` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alpha2` (`alpha2`),
  UNIQUE KEY `alpha3` (`alpha3`),
  UNIQUE KEY `code_unique` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=242 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `code`, `alpha2`, `alpha3`, `nom_en_gb`, `nom_fr_fr`) VALUES
(1, 4, 'AF', 'AFG', 'Afghanistan', 'Afghanistan'),
(2, 8, 'AL', 'ALB', 'Albania', 'Albanie'),
(3, 10, 'AQ', 'ATA', 'Antarctica', 'Antarctique'),
(4, 12, 'DZ', 'DZA', 'Algeria', 'Algérie'),
(5, 16, 'AS', 'ASM', 'American Samoa', 'Samoa Américaines'),
(6, 20, 'AD', 'AND', 'Andorra', 'Andorre'),
(7, 24, 'AO', 'AGO', 'Angola', 'Angola'),
(8, 28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antigua-et-Barbuda'),
(9, 31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaïdjan'),
(10, 32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(11, 36, 'AU', 'AUS', 'Australia', 'Australie'),
(12, 40, 'AT', 'AUT', 'Austria', 'Autriche'),
(13, 44, 'BS', 'BHS', 'Bahamas', 'Bahamas'),
(14, 48, 'BH', 'BHR', 'Bahrain', 'Bahreïn'),
(15, 50, 'BD', 'BGD', 'Bangladesh', 'Bangladesh'),
(16, 51, 'AM', 'ARM', 'Armenia', 'Arménie'),
(17, 52, 'BB', 'BRB', 'Barbados', 'Barbade'),
(18, 56, 'BE', 'BEL', 'Belgium', 'Belgique'),
(19, 60, 'BM', 'BMU', 'Bermuda', 'Bermudes'),
(20, 64, 'BT', 'BTN', 'Bhutan', 'Bhoutan'),
(21, 68, 'BO', 'BOL', 'Bolivia', 'Bolivie'),
(22, 70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnie-Herzégovine'),
(23, 72, 'BW', 'BWA', 'Botswana', 'Botswana'),
(24, 74, 'BV', 'BVT', 'Bouvet Island', 'Île Bouvet'),
(25, 76, 'BR', 'BRA', 'Brazil', 'Brésil'),
(26, 84, 'BZ', 'BLZ', 'Belize', 'Belize'),
(27, 86, 'IO', 'IOT', 'British Indian Ocean Territory', 'Territoire Britannique de l''Océan Indien'),
(28, 90, 'SB', 'SLB', 'Solomon Islands', 'Îles Salomon'),
(29, 92, 'VG', 'VGB', 'British Virgin Islands', 'Îles Vierges Britanniques'),
(30, 96, 'BN', 'BRN', 'Brunei Darussalam', 'Brunéi Darussalam'),
(31, 100, 'BG', 'BGR', 'Bulgaria', 'Bulgarie'),
(32, 104, 'MM', 'MMR', 'Myanmar', 'Myanmar'),
(33, 108, 'BI', 'BDI', 'Burundi', 'Burundi'),
(34, 112, 'BY', 'BLR', 'Belarus', 'Bélarus'),
(35, 116, 'KH', 'KHM', 'Cambodia', 'Cambodge'),
(36, 120, 'CM', 'CMR', 'Cameroon', 'Cameroun'),
(37, 124, 'CA', 'CAN', 'Canada', 'Canada'),
(38, 132, 'CV', 'CPV', 'Cape Verde', 'Cap-vert'),
(39, 136, 'KY', 'CYM', 'Cayman Islands', 'Îles Caïmanes'),
(40, 140, 'CF', 'CAF', 'Central African', 'République Centrafricaine'),
(41, 144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lanka'),
(42, 148, 'TD', 'TCD', 'Chad', 'Tchad'),
(43, 152, 'CL', 'CHL', 'Chile', 'Chili'),
(44, 156, 'CN', 'CHN', 'China', 'Chine'),
(45, 158, 'TW', 'TWN', 'Taiwan', 'Taïwan'),
(46, 162, 'CX', 'CXR', 'Christmas Island', 'Île Christmas'),
(47, 166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Îles Cocos (Keeling)'),
(48, 170, 'CO', 'COL', 'Colombia', 'Colombie'),
(49, 174, 'KM', 'COM', 'Comoros', 'Comores'),
(50, 175, 'YT', 'MYT', 'Mayotte', 'Mayotte'),
(51, 178, 'CG', 'COG', 'Republic of the Congo', 'République du Congo'),
(52, 180, 'CD', 'COD', 'The Democratic Republic Of The Congo', 'République Démocratique du Congo'),
(53, 184, 'CK', 'COK', 'Cook Islands', 'Îles Cook'),
(54, 188, 'CR', 'CRI', 'Costa Rica', 'Costa Rica'),
(55, 191, 'HR', 'HRV', 'Croatia', 'Croatie'),
(56, 192, 'CU', 'CUB', 'Cuba', 'Cuba'),
(57, 196, 'CY', 'CYP', 'Cyprus', 'Chypre'),
(58, 203, 'CZ', 'CZE', 'Czech Republic', 'République Tchèque'),
(59, 204, 'BJ', 'BEN', 'Benin', 'Bénin'),
(60, 208, 'DK', 'DNK', 'Denmark', 'Danemark'),
(61, 212, 'DM', 'DMA', 'Dominica', 'Dominique'),
(62, 214, 'DO', 'DOM', 'Dominican Republic', 'République Dominicaine'),
(63, 218, 'EC', 'ECU', 'Ecuador', 'Équateur'),
(64, 222, 'SV', 'SLV', 'El Salvador', 'El Salvador'),
(65, 226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Guinée Équatoriale'),
(66, 231, 'ET', 'ETH', 'Ethiopia', 'Éthiopie'),
(67, 232, 'ER', 'ERI', 'Eritrea', 'Érythrée'),
(68, 233, 'EE', 'EST', 'Estonia', 'Estonie'),
(69, 234, 'FO', 'FRO', 'Faroe Islands', 'Îles Féroé'),
(70, 238, 'FK', 'FLK', 'Falkland Islands', 'Îles (malvinas) Falkland'),
(71, 239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'Géorgie du Sud et les Îles Sandwich du Sud'),
(72, 242, 'FJ', 'FJI', 'Fiji', 'Fidji'),
(73, 246, 'FI', 'FIN', 'Finland', 'Finlande'),
(74, 248, 'AX', 'ALA', 'Åland Islands', 'Îles Åland'),
(75, 250, 'FR', 'FRA', 'France', 'France'),
(76, 254, 'GF', 'GUF', 'French Guiana', 'Guyane Française'),
(77, 258, 'PF', 'PYF', 'French Polynesia', 'Polynésie Française'),
(78, 260, 'TF', 'ATF', 'French Southern Territories', 'Terres Australes Françaises'),
(79, 262, 'DJ', 'DJI', 'Djibouti', 'Djibouti'),
(80, 266, 'GA', 'GAB', 'Gabon', 'Gabon'),
(81, 268, 'GE', 'GEO', 'Georgia', 'Géorgie'),
(82, 270, 'GM', 'GMB', 'Gambia', 'Gambie'),
(83, 275, 'PS', 'PSE', 'Occupied Palestinian Territory', 'Territoire Palestinien Occupé'),
(84, 276, 'DE', 'DEU', 'Germany', 'Allemagne'),
(85, 288, 'GH', 'GHA', 'Ghana', 'Ghana'),
(86, 292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(87, 296, 'KI', 'KIR', 'Kiribati', 'Kiribati'),
(88, 300, 'GR', 'GRC', 'Greece', 'Grèce'),
(89, 304, 'GL', 'GRL', 'Greenland', 'Groenland'),
(90, 308, 'GD', 'GRD', 'Grenada', 'Grenade'),
(91, 312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(92, 316, 'GU', 'GUM', 'Guam', 'Guam'),
(93, 320, 'GT', 'GTM', 'Guatemala', 'Guatemala'),
(94, 324, 'GN', 'GIN', 'Guinea', 'Guinée'),
(95, 328, 'GY', 'GUY', 'Guyana', 'Guyana'),
(96, 332, 'HT', 'HTI', 'Haiti', 'Haïti'),
(97, 334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Îles Heard et Mcdonald'),
(98, 336, 'VA', 'VAT', 'Vatican City State', 'Saint-Siège (état de la Cité du Vatican)'),
(99, 340, 'HN', 'HND', 'Honduras', 'Honduras'),
(100, 344, 'HK', 'HKG', 'Hong Kong', 'Hong-Kong'),
(101, 348, 'HU', 'HUN', 'Hungary', 'Hongrie'),
(102, 352, 'IS', 'ISL', 'Iceland', 'Islande'),
(103, 356, 'IN', 'IND', 'India', 'Inde'),
(104, 360, 'ID', 'IDN', 'Indonesia', 'Indonésie'),
(105, 364, 'IR', 'IRN', 'Islamic Republic of Iran', 'République Islamique d''Iran'),
(106, 368, 'IQ', 'IRQ', 'Iraq', 'Iraq'),
(107, 372, 'IE', 'IRL', 'Ireland', 'Irlande'),
(108, 376, 'IL', 'ISR', 'Israel', 'Israël'),
(109, 380, 'IT', 'ITA', 'Italy', 'Italie'),
(110, 384, 'CI', 'CIV', 'Côte d''Ivoire', 'Côte d''Ivoire'),
(111, 388, 'JM', 'JAM', 'Jamaica', 'Jamaïque'),
(112, 392, 'JP', 'JPN', 'Japan', 'Japon'),
(113, 398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstan'),
(114, 400, 'JO', 'JOR', 'Jordan', 'Jordanie'),
(115, 404, 'KE', 'KEN', 'Kenya', 'Kenya'),
(116, 408, 'KP', 'PRK', 'Democratic People''s Republic of Korea', 'République Populaire Démocratique de Corée'),
(117, 410, 'KR', 'KOR', 'Republic of Korea', 'République de Corée'),
(118, 414, 'KW', 'KWT', 'Kuwait', 'Koweït'),
(119, 417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kirghizistan'),
(120, 418, 'LA', 'LAO', 'Lao People''s Democratic Republic', 'République Démocratique Populaire Lao'),
(121, 422, 'LB', 'LBN', 'Lebanon', 'Liban'),
(122, 426, 'LS', 'LSO', 'Lesotho', 'Lesotho'),
(123, 428, 'LV', 'LVA', 'Latvia', 'Lettonie'),
(124, 430, 'LR', 'LBR', 'Liberia', 'Libéria'),
(125, 434, 'LY', 'LBY', 'Libyan Arab Jamahiriya', 'Jamahiriya Arabe Libyenne'),
(126, 438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(127, 440, 'LT', 'LTU', 'Lithuania', 'Lituanie'),
(128, 442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg'),
(129, 446, 'MO', 'MAC', 'Macao', 'Macao'),
(130, 450, 'MG', 'MDG', 'Madagascar', 'Madagascar'),
(131, 454, 'MW', 'MWI', 'Malawi', 'Malawi'),
(132, 458, 'MY', 'MYS', 'Malaysia', 'Malaisie'),
(133, 462, 'MV', 'MDV', 'Maldives', 'Maldives'),
(134, 466, 'ML', 'MLI', 'Mali', 'Mali'),
(135, 470, 'MT', 'MLT', 'Malta', 'Malte'),
(136, 474, 'MQ', 'MTQ', 'Martinique', 'Martinique'),
(137, 478, 'MR', 'MRT', 'Mauritania', 'Mauritanie'),
(138, 480, 'MU', 'MUS', 'Mauritius', 'Maurice'),
(139, 484, 'MX', 'MEX', 'Mexico', 'Mexique'),
(140, 492, 'MC', 'MCO', 'Monaco', 'Monaco'),
(141, 496, 'MN', 'MNG', 'Mongolia', 'Mongolie'),
(142, 498, 'MD', 'MDA', 'Republic of Moldova', 'République de Moldova'),
(143, 500, 'MS', 'MSR', 'Montserrat', 'Montserrat'),
(144, 504, 'MA', 'MAR', 'Morocco', 'Maroc'),
(145, 508, 'MZ', 'MOZ', 'Mozambique', 'Mozambique'),
(146, 512, 'OM', 'OMN', 'Oman', 'Oman'),
(147, 516, 'NA', 'NAM', 'Namibia', 'Namibie'),
(148, 520, 'NR', 'NRU', 'Nauru', 'Nauru'),
(149, 524, 'NP', 'NPL', 'Nepal', 'Népal'),
(150, 528, 'NL', 'NLD', 'Netherlands', 'Pays-Bas'),
(151, 530, 'AN', 'ANT', 'Netherlands Antilles', 'Antilles Néerlandaises'),
(152, 533, 'AW', 'ABW', 'Aruba', 'Aruba'),
(153, 540, 'NC', 'NCL', 'New Caledonia', 'Nouvelle-Calédonie'),
(154, 548, 'VU', 'VUT', 'Vanuatu', 'Vanuatu'),
(155, 554, 'NZ', 'NZL', 'New Zealand', 'Nouvelle-Zélande'),
(156, 558, 'NI', 'NIC', 'Nicaragua', 'Nicaragua'),
(157, 562, 'NE', 'NER', 'Niger', 'Niger'),
(158, 566, 'NG', 'NGA', 'Nigeria', 'Nigéria'),
(159, 570, 'NU', 'NIU', 'Niue', 'Niué'),
(160, 574, 'NF', 'NFK', 'Norfolk Island', 'Île Norfolk'),
(161, 578, 'NO', 'NOR', 'Norway', 'Norvège'),
(162, 580, 'MP', 'MNP', 'Northern Mariana Islands', 'Îles Mariannes du Nord'),
(163, 581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'Îles Mineures Éloignées des États-Unis'),
(164, 583, 'FM', 'FSM', 'Federated States of Micronesia', 'États Fédérés de Micronésie'),
(165, 584, 'MH', 'MHL', 'Marshall Islands', 'Îles Marshall'),
(166, 585, 'PW', 'PLW', 'Palau', 'Palaos'),
(167, 586, 'PK', 'PAK', 'Pakistan', 'Pakistan'),
(168, 591, 'PA', 'PAN', 'Panama', 'Panama'),
(169, 598, 'PG', 'PNG', 'Papua New Guinea', 'Papouasie-Nouvelle-Guinée'),
(170, 600, 'PY', 'PRY', 'Paraguay', 'Paraguay'),
(171, 604, 'PE', 'PER', 'Peru', 'Pérou'),
(172, 608, 'PH', 'PHL', 'Philippines', 'Philippines'),
(173, 612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn'),
(174, 616, 'PL', 'POL', 'Poland', 'Pologne'),
(175, 620, 'PT', 'PRT', 'Portugal', 'Portugal'),
(176, 624, 'GW', 'GNB', 'Guinea-Bissau', 'Guinée-Bissau'),
(177, 626, 'TL', 'TLS', 'Timor-Leste', 'Timor-Leste'),
(178, 630, 'PR', 'PRI', 'Puerto Rico', 'Porto Rico'),
(179, 634, 'QA', 'QAT', 'Qatar', 'Qatar'),
(180, 638, 'RE', 'REU', 'Réunion', 'Réunion'),
(181, 642, 'RO', 'ROU', 'Romania', 'Roumanie'),
(182, 643, 'RU', 'RUS', 'Russian Federation', 'Fédération de Russie'),
(183, 646, 'RW', 'RWA', 'Rwanda', 'Rwanda'),
(184, 654, 'SH', 'SHN', 'Saint Helena', 'Sainte-Hélène'),
(185, 659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Saint-Kitts-et-Nevis'),
(186, 660, 'AI', 'AIA', 'Anguilla', 'Anguilla'),
(187, 662, 'LC', 'LCA', 'Saint Lucia', 'Sainte-Lucie'),
(188, 666, 'PM', 'SPM', 'Saint-Pierre and Miquelon', 'Saint-Pierre-et-Miquelon'),
(189, 670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint-Vincent-et-les Grenadines'),
(190, 674, 'SM', 'SMR', 'San Marino', 'Saint-Marin'),
(191, 678, 'ST', 'STP', 'Sao Tome and Principe', 'Sao Tomé-et-Principe'),
(192, 682, 'SA', 'SAU', 'Saudi Arabia', 'Arabie Saoudite'),
(193, 686, 'SN', 'SEN', 'Senegal', 'Sénégal'),
(194, 690, 'SC', 'SYC', 'Seychelles', 'Seychelles'),
(195, 694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leone'),
(196, 702, 'SG', 'SGP', 'Singapore', 'Singapour'),
(197, 703, 'SK', 'SVK', 'Slovakia', 'Slovaquie'),
(198, 704, 'VN', 'VNM', 'Vietnam', 'Viet Nam'),
(199, 705, 'SI', 'SVN', 'Slovenia', 'Slovénie'),
(200, 706, 'SO', 'SOM', 'Somalia', 'Somalie'),
(201, 710, 'ZA', 'ZAF', 'South Africa', 'Afrique du Sud'),
(202, 716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwe'),
(203, 724, 'ES', 'ESP', 'Spain', 'Espagne'),
(204, 732, 'EH', 'ESH', 'Western Sahara', 'Sahara Occidental'),
(205, 736, 'SD', 'SDN', 'Sudan', 'Soudan'),
(206, 740, 'SR', 'SUR', 'Suriname', 'Suriname'),
(207, 744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard etÎle Jan Mayen'),
(208, 748, 'SZ', 'SWZ', 'Swaziland', 'Swaziland'),
(209, 752, 'SE', 'SWE', 'Sweden', 'Suède'),
(210, 756, 'CH', 'CHE', 'Switzerland', 'Suisse'),
(211, 760, 'SY', 'SYR', 'Syrian Arab Republic', 'République Arabe Syrienne'),
(212, 762, 'TJ', 'TJK', 'Tajikistan', 'Tadjikistan'),
(213, 764, 'TH', 'THA', 'Thailand', 'Thaïlande'),
(214, 768, 'TG', 'TGO', 'Togo', 'Togo'),
(215, 772, 'TK', 'TKL', 'Tokelau', 'Tokelau'),
(216, 776, 'TO', 'TON', 'Tonga', 'Tonga'),
(217, 780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinité-et-Tobago'),
(218, 784, 'AE', 'ARE', 'United Arab Emirates', 'Émirats Arabes Unis'),
(219, 788, 'TN', 'TUN', 'Tunisia', 'Tunisie'),
(220, 792, 'TR', 'TUR', 'Turkey', 'Turquie'),
(221, 795, 'TM', 'TKM', 'Turkmenistan', 'Turkménistan'),
(222, 796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Îles Turks et Caïques'),
(223, 798, 'TV', 'TUV', 'Tuvalu', 'Tuvalu'),
(224, 800, 'UG', 'UGA', 'Uganda', 'Ouganda'),
(225, 804, 'UA', 'UKR', 'Ukraine', 'Ukraine'),
(226, 807, 'MK', 'MKD', 'The Former Yugoslav Republic of Macedonia', 'L''ex-République Yougoslave de Macédoine'),
(227, 818, 'EG', 'EGY', 'Egypt', 'Égypte'),
(228, 826, 'GB', 'GBR', 'United Kingdom', 'Royaume-Uni'),
(229, 833, 'IM', 'IMN', 'Isle of Man', 'Île de Man'),
(230, 834, 'TZ', 'TZA', 'United Republic Of Tanzania', 'République-Unie de Tanzanie'),
(231, 840, 'US', 'USA', 'United States', 'États-Unis'),
(232, 850, 'VI', 'VIR', 'U.S. Virgin Islands', 'Îles Vierges des États-Unis'),
(233, 854, 'BF', 'BFA', 'Burkina Faso', 'Burkina Faso'),
(234, 858, 'UY', 'URY', 'Uruguay', 'Uruguay'),
(235, 860, 'UZ', 'UZB', 'Uzbekistan', 'Ouzbékistan'),
(236, 862, 'VE', 'VEN', 'Venezuela', 'Venezuela'),
(237, 876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis et Futuna'),
(238, 882, 'WS', 'WSM', 'Samoa', 'Samoa'),
(239, 887, 'YE', 'YEM', 'Yemen', 'Yémen'),
(240, 891, 'CS', 'SCG', 'Serbia and Montenegro', 'Serbie-et-Monténégro'),
(241, 894, 'ZM', 'ZMB', 'Zambia', 'Zambie');

-- --------------------------------------------------------

--
-- Structure de la table `personnage`
--

CREATE TABLE IF NOT EXISTS `personnage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_race` int(11) DEFAULT NULL,
  `id_univers` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_niveau_personnage` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_race` (`id_race`),
  KEY `id_univers` (`id_univers`),
  KEY `id_niveau` (`id_niveau_personnage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Déclencheurs `personnage`
--
DROP TRIGGER IF EXISTS `personnage_bi`;
DELIMITER //
CREATE TRIGGER `personnage_bi` BEFORE INSERT ON `personnage`
 FOR EACH ROW IF NOT EXISTS(
	SELECT *
	FROM exister
	WHERE id_race = NEW.id_race
	AND id_univers = NEW.id_univers)
THEN
	SIGNAL SQLSTATE '45000'
	SET MESSAGE_TEXT = "`id_race` and `id_univers` values not found in `exister` table.";
END IF
//
DELIMITER ;
DROP TRIGGER IF EXISTS `personnage_bu`;
DELIMITER //
CREATE TRIGGER `personnage_bu` BEFORE UPDATE ON `personnage`
 FOR EACH ROW IF NOT EXISTS(
	SELECT *
	FROM exister
	WHERE id_race = NEW.id_race
	AND id_univers = NEW.id_univers)
THEN
	SIGNAL SQLSTATE '45000'
	SET MESSAGE_TEXT = "`id_race` and `id_univers` values not found in (`exister`) table(s).";
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE IF NOT EXISTS `posseder` (
  `id_personnage` int(11) NOT NULL,
  `id_competence` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  PRIMARY KEY (`id_personnage`,`id_competence`),
  KEY `id_competence` (`id_competence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

CREATE TABLE IF NOT EXISTS `proposer` (
  `id_race` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  PRIMARY KEY (`id_race`,`id_classe`),
  KEY `id_classe` (`id_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE IF NOT EXISTS `race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` text,
  `avatar` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `coord_x` int(11) NOT NULL,
  `coord_y` int(11) NOT NULL,
  `carte` varchar(255) NOT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_univers` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_univers` (`id_univers`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `univers`
--

CREATE TABLE IF NOT EXISTS `univers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `carte` varchar(255) DEFAULT NULL,
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_utilisateur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(20) NOT NULL,
  `motdepasse` varchar(32) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `nom` varchar(30) NOT NULL,
  `id_confid_nom` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `prenom` varchar(30) NOT NULL,
  `id_confid_prenom` int(11) NOT NULL DEFAULT '1',
  `naissance` date NOT NULL,
  `id_confid_naissance` int(11) NOT NULL DEFAULT '1',
  `sexe` enum('H','F') DEFAULT NULL,
  `id_confid_sexe` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `id_confid_email` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `ville` varchar(30) DEFAULT NULL,
  `id_confid_ville` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `id_pays` smallint(5) unsigned DEFAULT '75',
  `id_confid_pays` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `description` varchar(200) NOT NULL,
  `id_confid_description` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `actif` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `id_utilisateur_parrainer` int(11) DEFAULT NULL,
  `id_niveau_utilisateur` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifiant` (`identifiant`),
  UNIQUE KEY `pseudo` (`pseudo`),
  KEY `id_pays` (`id_pays`),
  KEY `id_confid_nom` (`id_confid_nom`),
  KEY `id_confid_email` (`id_confid_email`),
  KEY `id_confid_ville` (`id_confid_ville`),
  KEY `id_confid_pays` (`id_confid_pays`),
  KEY `id_confid_description` (`id_confid_description`),
  KEY `id_utilisateur_parrainer` (`id_utilisateur_parrainer`),
  KEY `id_niveau` (`id_niveau_utilisateur`),
  KEY `id_confid_prenom` (`id_confid_prenom`),
  KEY `id_confid_naissance` (`id_confid_naissance`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `identifiant`, `motdepasse`, `pseudo`, `avatar`, `nom`, `id_confid_nom`, `prenom`, `id_confid_prenom`, `naissance`, `id_confid_naissance`, `sexe`, `id_confid_sexe`, `email`, `id_confid_email`, `ville`, `id_confid_ville`, `id_pays`, `id_confid_pays`, `description`, `id_confid_description`, `actif`, `id_utilisateur_parrainer`, `id_niveau_utilisateur`) VALUES
(1, 'root', '', 'Maître', NULL, 'Administrateur', 1, '', 1, '0000-00-00', 1, NULL, 1, '', 1, NULL, 1, NULL, 1, '', 1, 1, NULL, 1),
(2, 'david.riehl', '', 'D.A.R.Y.L.', NULL, 'RIEHL', 4, 'David', 4, '1980-10-26', 4, 'H', 3, 'david.riehl@ac-lille.fr', 3, 'Valenciennes', 3, 75, 1, '', 1, 1, 1, 1);

--
-- Déclencheurs `utilisateur`
--
DROP TRIGGER IF EXISTS `utilisateur_ai`;
DELIMITER //
CREATE TRIGGER `utilisateur_ai` AFTER INSERT ON `utilisateur`
 FOR EACH ROW INSERT INTO `affecter` (`id_utilisateur`, `id_groupe`)
SELECT new.id, (
    SELECT id
	FROM groupe
	WHERE nom = 'Utilisateur(s)'
)
//
DELIMITER ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `affecter`
--
ALTER TABLE `affecter`
  ADD CONSTRAINT `affecter_ibfk_2` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `affecter_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `anecdote`
--
ALTER TABLE `anecdote`
  ADD CONSTRAINT `anecdote_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `anecdote_ibfk_1` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `attribuer`
--
ALTER TABLE `attribuer`
  ADD CONSTRAINT `attribuer_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribuer_ibfk_2` FOREIGN KEY (`id_droit`) REFERENCES `droit` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `aventure`
--
ALTER TABLE `aventure`
  ADD CONSTRAINT `aventure_ibfk_2` FOREIGN KEY (`id_univers`) REFERENCES `univers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `aventure_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `communaute`
--
ALTER TABLE `communaute`
  ADD CONSTRAINT `communaute_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `communaute_ibfk_1` FOREIGN KEY (`id_lieu`) REFERENCES `secteur` (`id`);

--
-- Contraintes pour la table `conferer`
--
ALTER TABLE `conferer`
  ADD CONSTRAINT `conferer_ibfk_3` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conferer_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `race` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conferer_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `consommer`
--
ALTER TABLE `consommer`
  ADD CONSTRAINT `consommer_ibfk_2` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `consommer_ibfk_1` FOREIGN KEY (`id_action`) REFERENCES `action` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `exercer`
--
ALTER TABLE `exercer`
  ADD CONSTRAINT `exercer_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exercer_ibfk_1` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `exister`
--
ALTER TABLE `exister`
  ADD CONSTRAINT `exister_ibfk_2` FOREIGN KEY (`id_univers`) REFERENCES `univers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exister_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `race` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `intervention_ibfk_1` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `intervention_ibfk_2` FOREIGN KEY (`id_aventure`) REFERENCES `aventure` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `intervention_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `intervention_ibfk_4` FOREIGN KEY (`id_action`) REFERENCES `action` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD CONSTRAINT `lieu_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `lieu_ibfk_1` FOREIGN KEY (`id_secteur`) REFERENCES `secteur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`id_utilisateur_recevoir`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id_utilisateur_envoyer`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`id_message_type`) REFERENCES `message_type` (`id`);

--
-- Contraintes pour la table `niveau_personnage`
--
ALTER TABLE `niveau_personnage`
  ADD CONSTRAINT `niveau_personnage_ibfk_1` FOREIGN KEY (`id_niveau_suivant`) REFERENCES `niveau_personnage` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `niveau_utilisateur`
--
ALTER TABLE `niveau_utilisateur`
  ADD CONSTRAINT `niveau_utilisateur_ibfk_1` FOREIGN KEY (`id_niveau_suivant`) REFERENCES `niveau_utilisateur` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `objectif_personnage`
--
ALTER TABLE `objectif_personnage`
  ADD CONSTRAINT `objectif_personnage_ibfk_1` FOREIGN KEY (`id_niveau_personnage`) REFERENCES `niveau_personnage` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `objectif_utilisateur`
--
ALTER TABLE `objectif_utilisateur`
  ADD CONSTRAINT `objectif_utilisateur_ibfk_1` FOREIGN KEY (`id_niveau_utilisateur`) REFERENCES `niveau_utilisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `octroyer`
--
ALTER TABLE `octroyer`
  ADD CONSTRAINT `octroyer_ibfk_4` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `octroyer_ibfk_1` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `octroyer_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `octroyer_ibfk_3` FOREIGN KEY (`id_communaute`) REFERENCES `communaute` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `personnage`
--
ALTER TABLE `personnage`
  ADD CONSTRAINT `personnage_ibfk_4` FOREIGN KEY (`id_niveau_personnage`) REFERENCES `niveau_personnage` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `personnage_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `race` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `personnage_ibfk_2` FOREIGN KEY (`id_univers`) REFERENCES `univers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `personnage_ibfk_3` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `posseder`
--
ALTER TABLE `posseder`
  ADD CONSTRAINT `posseder_ibfk_2` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posseder_ibfk_1` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `proposer`
--
ALTER TABLE `proposer`
  ADD CONSTRAINT `proposer_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposer_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `race` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `secteur`
--
ALTER TABLE `secteur`
  ADD CONSTRAINT `secteur_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `secteur_ibfk_1` FOREIGN KEY (`id_univers`) REFERENCES `univers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `univers`
--
ALTER TABLE `univers`
  ADD CONSTRAINT `univers_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_8` FOREIGN KEY (`id_niveau_utilisateur`) REFERENCES `niveau_utilisateur` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_confid_nom`) REFERENCES `confidentialite` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_confid_email`) REFERENCES `confidentialite` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_3` FOREIGN KEY (`id_confid_ville`) REFERENCES `confidentialite` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_4` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_5` FOREIGN KEY (`id_confid_pays`) REFERENCES `confidentialite` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_6` FOREIGN KEY (`id_confid_description`) REFERENCES `confidentialite` (`id`),
  ADD CONSTRAINT `utilisateur_ibfk_7` FOREIGN KEY (`id_utilisateur_parrainer`) REFERENCES `utilisateur` (`id`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
