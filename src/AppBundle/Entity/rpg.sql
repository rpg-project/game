-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 02 Mai 2018 à 11:06
-- Version du serveur :  5.5.43-0ubuntu0.14.10.1
-- Version de PHP :  5.5.12-2ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rpg`
--

-- --------------------------------------------------------

--
-- Structure de la table `capacities`
--

CREATE TABLE IF NOT EXISTS `capacities` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `type` int(11) DEFAULT NULL,
  `range` int(11) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `move` int(11) DEFAULT NULL,
  `quickness` int(11) DEFAULT NULL,
  `health` int(11) DEFAULT NULL,
  `energy` int(11) DEFAULT NULL,
  `date_info` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `capacities`
--

INSERT INTO `capacities` (`id`, `name`, `description`, `type`, `range`, `attack`, `defense`, `move`, `quickness`, `health`, `energy`, `date_info`) VALUES
(1, NULL, '/images/epee.jpg', 1, 1, 0, 0, 0, 0, 0, 0, '2018-04-26 14:59:06'),
(2, NULL, '/images/heal.jpg', 2, 1, 0, 0, 0, 0, 4, -2, '2018-04-26 14:59:06'),
(3, NULL, '/images/charge.jpg', 1, 1, 3, -3, 4, NULL, NULL, -3, '2018-04-26 14:59:06'),
(4, NULL, NULL, 1, 5, 0, 0, 0, 0, 0, 0, '2018-04-26 14:59:06');

-- --------------------------------------------------------

--
-- Structure de la table `capacitiesByCharacter`
--

CREATE TABLE IF NOT EXISTS `capacitiesByCharacter` (
`id` int(11) NOT NULL,
  `characterId` int(11) DEFAULT NULL,
  `capacityId` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `capacitiesByCharacter`
--

INSERT INTO `capacitiesByCharacter` (`id`, `characterId`, `capacityId`) VALUES
(1, 27, 1);

-- --------------------------------------------------------

--
-- Structure de la table `capacitiesByFollower`
--

CREATE TABLE IF NOT EXISTS `capacitiesByFollower` (
`id` int(11) NOT NULL,
  `followerId` int(11) DEFAULT NULL,
  `capacityId` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `capacitiesByMonster`
--

CREATE TABLE IF NOT EXISTS `capacitiesByMonster` (
`id` int(11) NOT NULL,
  `capacityId` int(11) DEFAULT NULL,
  `monsterId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gold` int(11) DEFAULT NULL,
  `health` int(11) DEFAULT NULL,
  `max_health` int(11) DEFAULT NULL,
  `stamina` int(11) DEFAULT NULL,
  `max_stamina` int(11) DEFAULT NULL,
  `energy` int(11) DEFAULT NULL,
  `max_energy` int(11) DEFAULT NULL,
  `move` int(11) DEFAULT NULL,
  `quickness` int(11) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `critical` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `xp` int(11) DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `repop_location` int(11) DEFAULT NULL,
  `glory` int(11) DEFAULT NULL,
  `faith` int(11) DEFAULT NULL,
  `craft_skill` int(11) DEFAULT NULL,
  `law` int(11) DEFAULT NULL,
  `chaos` int(11) DEFAULT NULL,
  `good` int(11) DEFAULT NULL,
  `evil` int(11) DEFAULT NULL,
  `war_rank` int(11) DEFAULT NULL,
  `arena_rank` int(11) DEFAULT NULL,
  `box_size` int(11) DEFAULT NULL,
  `max_box_size` int(11) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `title` int(11) DEFAULT NULL,
  `max_bag_capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Contenu de la table `characters`
--

INSERT INTO `characters` (`id`, `name`, `gold`, `health`, `max_health`, `stamina`, `max_stamina`, `energy`, `max_energy`, `move`, `quickness`, `attack`, `defense`, `critical`, `level`, `xp`, `image`, `location`, `repop_location`, `glory`, `faith`, `craft_skill`, `law`, `chaos`, `good`, `evil`, `war_rank`, `arena_rank`, `box_size`, `max_box_size`, `last_login`, `userId`, `title`, `max_bag_capacity`) VALUES
(24, 'hhh', 0, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 1, 1, 0, '/images/tete.jpg', 1, 1, 310, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, NULL, 1, 1, 10),
(27, 'ddddddddd', 30, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 1, 2, 0, '/images/tete.jpg', 1, 1, 360, 0, 0, 0, 0, 0, 5, 0, 0, 33, 10, NULL, 2, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `containers`
--

CREATE TABLE IF NOT EXISTS `containers` (
  `id` int(11) NOT NULL,
  `weigth` int(11) DEFAULT NULL,
  `itemsId` int(11) DEFAULT NULL,
  `containerId` int(11) DEFAULT NULL,
  `characterdId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `descriptionFollowers`
--

CREATE TABLE IF NOT EXISTS `descriptionFollowers` (
`id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `date_description` date NOT NULL,
  `followerId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `descriptionFollowers`
--

INSERT INTO `descriptionFollowers` (`id`, `description`, `date_description`, `followerId`) VALUES
(1, 'Conan est un barbare', '2018-04-08', 1),
(2, 'Sonia La Rousse est une bonne... guerrière', '2018-04-08', 2);

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `health` int(11) DEFAULT NULL,
  `max_health` int(11) DEFAULT NULL,
  `energy` int(11) DEFAULT NULL,
  `max_energy` int(11) DEFAULT NULL,
  `move` int(11) DEFAULT NULL,
  `quickness` int(11) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `critical` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `xp` int(11) DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level_min` int(11) DEFAULT NULL,
  `rate_label` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pop_rate` int(11) DEFAULT NULL,
  `price_back` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `unique_rate` int(11) DEFAULT NULL,
  `law` int(11) DEFAULT NULL,
  `chaos` int(11) DEFAULT NULL,
  `good` int(11) DEFAULT NULL,
  `evil` int(11) DEFAULT NULL,
  `max_capacity_bag` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `date_info` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Contenu de la table `followers`
--

INSERT INTO `followers` (`id`, `name`, `type`, `health`, `max_health`, `energy`, `max_energy`, `move`, `quickness`, `attack`, `defense`, `critical`, `level`, `xp`, `image`, `level_min`, `rate_label`, `pop_rate`, `price_back`, `goal`, `unique_rate`, `law`, `chaos`, `good`, `evil`, `max_capacity_bag`, `description`, `date_info`) VALUES
(1, 'Conan', 1, 5, 5, 5, 5, 3, 3, 4, 2, 0, 1, 0, '/images/conan.jpg', 1, 'SR', 10, 4, 0, 1, 0, 0, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(2, 'Sonia La Rousse', 1, 5, 5, 5, 5, 3, 3, 3, 3, 0, 1, 0, '/images/sonia.jpg', 1, 'SR', 10, 4, 0, 1, 0, 0, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(3, 'Guard', 2, 3, 3, 3, 3, 3, 3, 2, 2, 0, 1, 0, '/images/guard.jpg', 1, 'C', 50, 1, 1, 0, 10, 0, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(4, 'Sherif', 2, 5, 5, 5, 5, 3, 3, 4, 2, 0, 1, 0, ' ', 1, 'SR', 10, 4, 1, 1, 50, 0, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(5, 'Paladin', 2, 5, 5, 5, 5, 3, 3, 4, 4, 0, 1, 0, '/images/paladin.jpg', 1, 'SSR', 5, 5, 2, 1, 100, 0, 100, 0, 10, NULL, '2018-04-26 14:59:06'),
(6, 'Picker', 2, 3, 3, 3, 3, 3, 3, 3, 1, 0, 1, 0, '/images/picker.jpg', 1, 'C', 30, 1, 1, 0, 10, 0, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(7, 'Archer', 2, 3, 3, 3, 3, 3, 3, 2, 2, 0, 1, 0, '/images/archer.jpg', 1, 'C', 25, 1, 1, 0, 10, 0, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(8, 'Merc', 1, 3, 3, 3, 3, 3, 3, 4, 3, 0, 1, 0, '/images/merc.jpg', 1, 'R', 30, 3, 3, 0, 0, 0, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(9, 'Aventurer', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 1, 'R', 50, 3, 0, 0, 0, 0, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(10, 'Thief', 1, 3, 3, 3, 3, 3, 3, 2, 4, 0, 1, 0, '/images/thief.jog', 1, 'R', 20, 3, 4, 0, 0, 10, 0, 0, 10, NULL, '2018-04-26 14:59:06'),
(11, 'Mage', 1, 3, 3, 3, 3, 3, 3, 4, 2, 0, 1, 0, '/images/mage.jpg', 1, 'R', 15, 3, 0, 0, 0, 0, 0, 0, 10, NULL, '2018-04-26 14:59:07'),
(12, 'Priest', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 1, 'R', 15, 3, 0, 0, 0, 0, 0, 0, 10, NULL, '2018-04-26 14:59:07'),
(13, 'Ghaalmaraz', 1, 5, 5, 5, 5, 3, 2, 5, 2, 1, 1, 0, '1', 1, 'SSR', 5, 5, 0, 1, 0, 0, 0, 0, NULL, NULL, '2018-04-27 11:41:01');

-- --------------------------------------------------------

--
-- Structure de la table `followersByCharacter`
--

CREATE TABLE IF NOT EXISTS `followersByCharacter` (
`id` int(11) NOT NULL,
  `teamed` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `health` int(11) DEFAULT NULL,
  `max_health` int(11) DEFAULT NULL,
  `energy` int(11) DEFAULT NULL,
  `max_energy` int(11) DEFAULT NULL,
  `move` int(11) DEFAULT NULL,
  `quickness` int(11) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `critical` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `xp` int(11) DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `rate_label` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unique_rate` int(11) DEFAULT NULL,
  `price_back` int(11) DEFAULT NULL,
  `followerId` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL,
  `law` int(11) DEFAULT NULL,
  `chaos` int(11) DEFAULT NULL,
  `good` int(11) DEFAULT NULL,
  `evil` int(11) DEFAULT NULL,
  `max_capacity_bag` int(11) DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=213 ;

--
-- Contenu de la table `followersByCharacter`
--

INSERT INTO `followersByCharacter` (`id`, `teamed`, `name`, `type`, `health`, `max_health`, `energy`, `max_energy`, `move`, `quickness`, `attack`, `defense`, `critical`, `level`, `xp`, `image`, `goal`, `rate_label`, `unique_rate`, `price_back`, `followerId`, `characterId`, `law`, `chaos`, `good`, `evil`, `max_capacity_bag`, `description`) VALUES
(192, 0, 'Merc', 1, 3, 3, 3, 3, 3, 3, 4, 3, 0, 1, 0, '/images/merc.jpg', 3, 'R', 0, 3, 8, 27, 0, 0, 0, 0, 10, NULL),
(193, 0, 'Aventurer', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 0, 'R', 0, 3, 9, 27, 0, 0, 0, 0, 10, NULL),
(194, 0, 'Aventurer', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 0, 'R', 0, 3, 9, 27, 0, 0, 0, 0, 10, NULL),
(195, 0, 'Sonia La Rousse', 1, 5, 5, 5, 5, 3, 3, 3, 3, 0, 1, 0, '/images/sonia.jpg', 0, 'SR', 1, 4, 2, 27, 0, 0, 0, 0, 10, NULL),
(196, 0, 'Aventurer', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 0, 'R', 0, 3, 9, 27, 0, 0, 0, 0, 10, NULL),
(197, 0, 'Aventurer', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 0, 'R', 0, 3, 9, 27, 0, 0, 0, 0, 10, NULL),
(198, 0, 'Conan', 1, 5, 5, 5, 5, 3, 3, 4, 2, 0, 1, 0, '/images/conan.jpg', 0, 'SR', 1, 4, 1, 27, 0, 0, 0, 0, 10, NULL),
(199, 0, 'Merc', 1, 3, 3, 3, 3, 3, 3, 4, 3, 0, 1, 0, '/images/merc.jpg', 3, 'R', 0, 3, 8, 27, 0, 0, 0, 0, 10, NULL),
(200, 0, 'Mage', 1, 3, 3, 3, 3, 3, 3, 4, 2, 0, 1, 0, '/images/mage.jpg', 0, 'R', 0, 3, 11, 27, 0, 0, 0, 0, 10, NULL),
(201, 0, 'Thief', 1, 3, 3, 3, 3, 3, 3, 2, 4, 0, 1, 0, '/images/thief.jog', 4, 'R', 0, 3, 10, 27, 0, 10, 0, 0, 10, NULL),
(202, 0, 'Thief', 1, 3, 3, 3, 3, 3, 3, 2, 4, 0, 1, 0, '/images/thief.jog', 4, 'R', 0, 3, 10, 27, 0, 10, 0, 0, 10, NULL),
(203, 0, 'Aventurer', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 0, 'R', 0, 3, 9, 27, 0, 0, 0, 0, 10, NULL),
(204, 0, 'Thief', 1, 3, 3, 3, 3, 3, 3, 2, 4, 0, 1, 0, '/images/thief.jog', 4, 'R', 0, 3, 10, 27, 0, 10, 0, 0, 10, NULL),
(205, 0, 'Merc', 1, 3, 3, 3, 3, 3, 3, 4, 3, 0, 1, 0, '/images/merc.jpg', 3, 'R', 0, 3, 8, 27, 0, 0, 0, 0, 10, NULL),
(206, 0, 'Aventurer', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 0, 'R', 0, 3, 9, 27, 0, 0, 0, 0, 10, NULL),
(207, 0, 'Aventurer', 1, 3, 3, 3, 3, 3, 3, 3, 3, 0, 1, 0, ' ', 0, 'R', 0, 3, 9, 27, 0, 0, 0, 0, 10, NULL),
(208, 0, 'Ghaalmaraz', 1, 5, 5, 5, 5, 3, 2, 5, 2, 1, 1, 0, '1', 0, 'SSR', 1, 5, 13, 27, 0, 0, 0, 0, NULL, NULL),
(209, 0, 'Ghaalmaraz', 1, 5, 5, 5, 5, 3, 2, 5, 2, 1, 1, 0, '1', 0, 'SSR', 1, 5, 13, 27, 0, 0, 0, 0, NULL, NULL),
(210, 0, 'Merc', 1, 3, 3, 3, 3, 3, 3, 4, 3, 0, 1, 0, '/images/merc.jpg', 3, 'R', 0, 3, 8, 27, 0, 0, 0, 0, 10, NULL),
(211, 0, 'Ghaalmaraz', 1, 5, 5, 5, 5, 3, 2, 5, 2, 1, 1, 0, '1', 0, 'SSR', 1, 5, 13, 27, 0, 0, 0, 0, NULL, NULL),
(212, 0, 'Merc', 1, 3, 3, 3, 3, 3, 3, 4, 3, 0, 1, 0, '/images/merc.jpg', 3, 'R', 0, 3, 8, 27, 0, 0, 0, 0, 10, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `FollowersItems`
--

CREATE TABLE IF NOT EXISTS `FollowersItems` (
`id` int(11) NOT NULL,
  `ItemId` int(11) DEFAULT NULL,
  `FollowersId` int(11) DEFAULT NULL,
  `Equiped` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Contenu de la table `FollowersItems`
--

INSERT INTO `FollowersItems` (`id`, `ItemId`, `FollowersId`, `Equiped`) VALUES
(47, 2, 2, 0),
(48, 9, 3, 0),
(49, 2, 3, 0),
(50, 2, 4, 0),
(52, 7, 4, 0),
(53, 8, 4, 0),
(54, 6, 4, 0),
(55, 5, 4, 0),
(56, 2, 5, 0),
(57, 3, 5, 0),
(58, 6, 5, 0),
(59, 9, 5, 0),
(60, 2, 7, 0),
(61, 5, 7, 0),
(62, 7, 7, 0),
(63, 8, 7, 0),
(64, 6, 6, 0),
(65, 2, 8, 0),
(66, 4, 8, 0),
(67, 2, 9, 0),
(68, 4, 10, 0),
(69, 4, 10, 0),
(70, 4, 11, 0),
(71, 2, 12, 0),
(74, 9, 4, 0),
(75, 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `functionsByPlace`
--

CREATE TABLE IF NOT EXISTS `functionsByPlace` (
`id` int(11) NOT NULL,
  `placeId` int(11) DEFAULT NULL,
  `functionId` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `functionsByPlace`
--

INSERT INTO `functionsByPlace` (`id`, `placeId`, `functionId`, `name`) VALUES
(1, 1, 1, 'Recrutement'),
(2, 1, 8, 'Rumeurs'),
(3, 1, 2, 'Embauches'),
(4, 2, 1, 'Enrôlement'),
(5, 2, 8, 'Informations'),
(6, 2, 2, 'Enquêtes'),
(7, 1, 7, 'Salle de Repos'),
(8, 2, 3, 'Salle d''entraînement'),
(9, 3, 5, 'Vente'),
(10, 3, 6, 'Récupération'),
(11, 3, 8, 'Informations');

-- --------------------------------------------------------

--
-- Structure de la table `Infos`
--

CREATE TABLE IF NOT EXISTS `Infos` (
`id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `infos` text,
  `date_info` datetime DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `Infos`
--

INSERT INTO `Infos` (`id`, `type`, `title`, `infos`, `date_info`, `place_id`) VALUES
(12, 1, 'Le shérif te recherche !', '<p>Pas de panique gamin !!\r \r Rien de grave, il veut juste te demander un service.\r</p><p>\rPour savoir ce qu''il veut, retrouve le juste au <a href="/place/2">poste de garde</a></p>', '2018-04-25 14:33:58', 1),
(13, 1, 'Un mal couve...', 'Depuis plusieurs mois, le gibier manque. Les chasseurs ont du mal à trouver ne serait-ce qu''un lapin.\r\n\r\nD''autres ont carrément peur d''aller en forêt. Il paraîtrait que certains chasseurs ne sont jamais revenus...', '2018-04-25 14:33:58', 1),
(14, 1, 'Le paladin', 'Tu n''as pas intérêt à sortir du droit chemin, gamin. \r\n\r\nSinon tu vas attirer l''attention du Paladin. Et même s''il ne sert que le bien et la justice, ce n''est pas un tendre. Alors gare à toi !!', '2018-04-25 14:33:58', 2),
(15, 1, 'Routes non commerciales', 'Les routes commerciales ne sont plus sûres.\r\n\r\nLes patrouilleurs ruraux ne font plus leur travail et nos convois de marchandises sont souvent attaquées par des brigands.\r\n\r\nMais que fait le roi Olric !!\r\n\r\nDonc on engage de plus en plus une escorte pour atteindre notre destination sain et sauf.', '2018-04-25 14:33:58', 3),
(16, 2, 'Tutorial Taverne', '<p>Salut gamin, bienvenue dans ma taverne.</p><p>Tu veux boire un coup ?</p><p>Il y a beaucoup de passage ici. Des aventuriers que tu peux recruter si tu es assez connu ou si tu as de l''or.</p><p>Tu peux aussi glaner quelques rumeurs car les gens parlent toujours au barman.</p><p>Certaines personnes embauchent des aventuriers pour effectuer des tâches qu''ils ne peuvent pas faire. Hésite pas à lire le tableau des embauches.</p><p>J''ai des chambres. Si tu ne trouves pas où loger ou si tu veux te reposer, c''est l''endroit parfait. C''est sûr et pas trop cher.Alors je te sers quoi gamin ?</p>', '2018-04-25 14:33:58', 1);

-- --------------------------------------------------------

--
-- Structure de la table `infosByCharacter`
--

CREATE TABLE IF NOT EXISTS `infosByCharacter` (
`id` int(11) NOT NULL,
  `characterId` int(11) DEFAULT NULL,
  `infoId` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `infosByCharacter`
--

INSERT INTO `infosByCharacter` (`id`, `characterId`, `infoId`) VALUES
(40, 27, 16);

-- --------------------------------------------------------

--
-- Structure de la table `infosByQuest`
--

CREATE TABLE IF NOT EXISTS `infosByQuest` (
  `id` int(11) NOT NULL,
  `questId` int(11) DEFAULT NULL,
  `infosId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `level_min` int(11) DEFAULT NULL,
  `quality` varchar(45) DEFAULT NULL,
  `bonus_move` int(11) DEFAULT NULL,
  `bonus_quickness` int(11) DEFAULT NULL,
  `bonus_attack` int(11) DEFAULT NULL,
  `bonus_defense` int(11) DEFAULT NULL,
  `bonus_critical` int(11) DEFAULT NULL,
  `bonus_health` int(11) DEFAULT NULL,
  `bonus_energy` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price_buy` int(11) DEFAULT NULL,
  `price_sell` int(11) DEFAULT NULL,
  `open` int(11) DEFAULT NULL,
  `container` int(11) DEFAULT NULL,
  `container_space` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `weigth` int(11) DEFAULT NULL,
  `pop_rate` int(11) DEFAULT NULL,
  `pop_zone` int(11) DEFAULT NULL,
  `description` text,
  `date_info` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `items`
--

INSERT INTO `items` (`id`, `name`, `type`, `level`, `level_min`, `quality`, `bonus_move`, `bonus_quickness`, `bonus_attack`, `bonus_defense`, `bonus_critical`, `bonus_health`, `bonus_energy`, `capacity`, `price_buy`, `price_sell`, `open`, `container`, `container_space`, `image`, `weigth`, `pop_rate`, `pop_zone`, `description`, `date_info`) VALUES
(1, 'Hache', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 15, 75, 0, 0, 0, '/images/hache.png', 1, 50, 1, NULL, '2018-04-25 15:50:38'),
(2, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 15, 75, 0, 0, 0, '/images/sword.jpg', 1, 50, 1, NULL, '2018-04-25 15:50:38'),
(3, 'Potion de soins', 3, 1, 1, 'C', 0, 0, 0, 0, 0, 5, 0, 1, 30, 75, 0, 0, 0, '/images/heal_potion.png', 1, 50, 1, NULL, '2018-04-25 15:50:38'),
(4, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 25, 65, 0, 0, 0, '/images/dague.jpg', 1, 50, 1, NULL, '2018-04-25 15:50:38'),
(5, 'Arc', 1, 1, 1, 'C', 0, 0, 1, 0, 0, 0, 0, 4, 30, 75, 0, 0, 0, '/images/arc.jpg', 2, 50, 1, NULL, '2018-04-25 15:50:38'),
(6, 'Pique', 1, 1, 1, 'C', 0, 0, 1, 0, 0, 0, 0, 5, 20, 75, 0, 0, 0, '/images/pick.jpg', 2, 50, 1, NULL, '2018-04-25 15:50:38'),
(7, 'Carquois', 2, 1, 1, 'C', 0, 0, 0, 0, 0, 0, 0, 0, 20, 50, 1, 1, 20, '/images/carquois.jpg', 1, 50, 1, NULL, '2018-04-25 15:50:38'),
(8, 'Flèche', 3, 1, 1, 'C', 0, 0, 0, 0, 0, 0, 0, 0, 5, 15, 0, 0, 0, '/images/fleche.jpg', 0, 50, 1, NULL, '2018-04-25 15:50:38'),
(9, 'Bouclier', 1, 1, 1, 'C', 0, 0, 0, 2, 0, 0, 0, 6, 30, 75, 0, 0, 0, '/images/shield.jpg', 1, 50, 1, NULL, '2018-04-25 15:50:38');

-- --------------------------------------------------------

--
-- Structure de la table `itemsByCharacter`
--

CREATE TABLE IF NOT EXISTS `itemsByCharacter` (
`id` int(11) NOT NULL,
  `equiped` int(11) DEFAULT NULL,
  `contained` int(11) DEFAULT NULL,
  `container_space` int(11) DEFAULT NULL,
  `containerId` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `level_min` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `quality` varchar(45) DEFAULT NULL,
  `bonus_move` int(11) DEFAULT NULL,
  `bonus_quickness` int(11) DEFAULT NULL,
  `bonus_attack` int(11) DEFAULT NULL,
  `bonus_defense` int(11) DEFAULT NULL,
  `bonus_critical` int(11) DEFAULT NULL,
  `bonus_health` int(11) DEFAULT NULL,
  `bonus_energy` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price_buy` int(11) DEFAULT NULL,
  `price_sell` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `open` int(11) DEFAULT NULL,
  `weigth` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL,
  `itemId` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `itemsByFollowers`
--

CREATE TABLE IF NOT EXISTS `itemsByFollowers` (
`id` int(11) NOT NULL,
  `equiped` int(11) DEFAULT NULL,
  `contained` int(11) DEFAULT NULL,
  `container_space` int(11) DEFAULT NULL,
  `containerId` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `level_min` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `quality` varchar(45) DEFAULT NULL,
  `bonus_move` int(11) DEFAULT NULL,
  `bonus_quickness` int(11) DEFAULT NULL,
  `bonus_attack` int(11) DEFAULT NULL,
  `bonus_defense` int(11) DEFAULT NULL,
  `bonus_critical` int(11) DEFAULT NULL,
  `bonus_health` int(11) DEFAULT NULL,
  `bonus_energy` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price_buy` int(11) DEFAULT NULL,
  `price_sell` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `open` int(11) DEFAULT NULL,
  `weigth` int(11) DEFAULT NULL,
  `itemId` int(11) DEFAULT NULL,
  `followerId` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Contenu de la table `itemsByFollowers`
--

INSERT INTO `itemsByFollowers` (`id`, `equiped`, `contained`, `container_space`, `containerId`, `name`, `type`, `level_min`, `level`, `quality`, `bonus_move`, `bonus_quickness`, `bonus_attack`, `bonus_defense`, `bonus_critical`, `bonus_health`, `bonus_energy`, `capacity`, `price_buy`, `price_sell`, `image`, `open`, `weigth`, `itemId`, `followerId`, `characterId`, `description`) VALUES
(67, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 192, 27, NULL),
(68, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 192, 27, NULL),
(69, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 193, 27, NULL),
(70, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 194, 27, NULL),
(71, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 195, 27, NULL),
(72, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 196, 27, NULL),
(73, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 197, 27, NULL),
(74, 0, 1, 0, 0, 'Hache', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/hache.png', 0, 1, 1, 198, 27, NULL),
(75, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 199, 27, NULL),
(76, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 199, 27, NULL),
(77, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 200, 27, NULL),
(78, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 201, 27, NULL),
(79, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 201, 27, NULL),
(80, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 202, 27, NULL),
(81, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 202, 27, NULL),
(82, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 203, 27, NULL),
(83, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 204, 27, NULL),
(84, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 204, 27, NULL),
(85, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 205, 27, NULL),
(86, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 205, 27, NULL),
(87, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 206, 27, NULL),
(88, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 207, 27, NULL),
(89, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 210, 27, NULL),
(90, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 210, 27, NULL),
(91, 0, 1, 0, 0, 'Epée', 1, 1, 1, 'C', 0, 0, 1, 0, 1, 0, 0, 1, 0, 75, '/images/sword.jpg', 0, 1, 2, 212, 27, NULL),
(92, 0, 1, 0, 0, 'Dague', 1, 1, 1, 'C', 0, 0, 1, 0, 2, 0, 0, 1, 0, 65, '/images/dague.jpg', 0, 1, 4, 212, 27, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `itemsByQuest`
--

CREATE TABLE IF NOT EXISTS `itemsByQuest` (
  `id` int(11) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `questId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `KillingBoard`
--

CREATE TABLE IF NOT EXISTS `KillingBoard` (
  `id` int(11) NOT NULL,
  `monsterId` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL,
  `kills` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `map`
--

CREATE TABLE IF NOT EXISTS `map` (
  `id` int(11) NOT NULL,
  `map_name` varchar(50) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `width` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `map`
--

INSERT INTO `map` (`id`, `map_name`, `type`, `width`, `height`) VALUES
(1, 'starting ground', 'Town', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `monsters`
--

CREATE TABLE IF NOT EXISTS `monsters` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `health` int(11) DEFAULT NULL,
  `energy` int(11) DEFAULT NULL,
  `move` int(11) DEFAULT NULL,
  `quickness` int(11) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `critical` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `description` text,
  `date_info` datetime DEFAULT NULL,
  `kill` int(11) DEFAULT NULL,
  `kill_title` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `places`
--

INSERT INTO `places` (`id`, `description`, `type`, `level`) VALUES
(1, 'Taverne', 1, 1),
(2, 'Poste de garde', 2, 1),
(3, 'Quincaillerie', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `placesByMap`
--

CREATE TABLE IF NOT EXISTS `placesByMap` (
  `id` int(11) NOT NULL,
  `mapId` int(11) DEFAULT NULL,
  `placeId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `placesByMap`
--

INSERT INTO `placesByMap` (`id`, `mapId`, `placeId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `placesFunction`
--

CREATE TABLE IF NOT EXISTS `placesFunction` (
  `id` int(11) NOT NULL,
  `function` varchar(50) DEFAULT NULL,
  `typeFunction` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `placesFunction`
--

INSERT INTO `placesFunction` (`id`, `function`, `typeFunction`) VALUES
(1, 'summon', 1),
(2, 'quest', 2),
(3, 'training', 3),
(4, 'craft', 4),
(5, 'sell', 5),
(6, 'buy', 6),
(7, 'healing', 7),
(8, 'info', 8);

-- --------------------------------------------------------

--
-- Structure de la table `quests`
--

CREATE TABLE IF NOT EXISTS `quests` (
`id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `chapter` int(11) DEFAULT NULL,
  `difficulty_max` int(11) NOT NULL,
  `difficulty_min` int(11) NOT NULL,
  `glory_reward` int(11) DEFAULT NULL,
  `gold_reward` int(11) DEFAULT NULL,
  `xp_reward` int(11) DEFAULT NULL,
  `bonus_law` int(11) DEFAULT NULL,
  `bonus_chaos` int(11) DEFAULT NULL,
  `bonus_good` int(11) DEFAULT NULL,
  `bonus_evil` int(11) DEFAULT NULL,
  `level_min` int(11) DEFAULT NULL,
  `date_info` datetime DEFAULT NULL,
  `placeId` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `quests`
--

INSERT INTO `quests` (`id`, `title`, `description`, `chapter`, `difficulty_max`, `difficulty_min`, `glory_reward`, `gold_reward`, `xp_reward`, `bonus_law`, `bonus_chaos`, `bonus_good`, `bonus_evil`, `level_min`, `date_info`, `placeId`) VALUES
(2, 'Enquête', '<p>Faire une enquête pour déterminer pourquoi plus de gibier</p>', 1, 1, 1, 100, 25, 100, 25, 0, 0, 0, 1, '2018-04-30 11:49:51', 2),
(3, 'Chasse aux Loups', 'Tracter et chasser ces loups', 2, 3, 1, 100, 50, 100, 100, 0, 0, 0, 1, '2018-04-30 13:47:28', 2),
(4, 'test', 'test', 3, 3, 1, 100, 100, 110, 0, 10, 0, 0, 1, '2018-04-30 14:26:08', 2),
(5, 'test', 'test', 1, 1, 1, 100, 25, 100, 0, 0, 0, 0, 1, '2018-05-02 10:58:29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `questsByCharacter`
--

CREATE TABLE IF NOT EXISTS `questsByCharacter` (
  `id` int(11) NOT NULL,
  `placeId` int(11) DEFAULT NULL,
  `questId` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL,
  `difficulty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questsByCharacter`
--

INSERT INTO `questsByCharacter` (`id`, `placeId`, `questId`, `characterId`, `difficulty`) VALUES
(1, 2, 2, 27, 1),
(2, 2, 3, 27, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(11) NOT NULL,
  `rate_label` varchar(45) DEFAULT NULL,
  `pop_rate` int(11) DEFAULT NULL,
  `price_back` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rate`
--

INSERT INTO `rate` (`id`, `rate_label`, `pop_rate`, `price_back`) VALUES
(1, 'SSR', 5, 5),
(2, 'SR', 10, 4),
(3, 'R', 25, 3),
(4, 'N', 35, 2),
(5, 'C', 50, 1),
(6, 'XR', 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`id` int(11) NOT NULL,
  `place` int(11) DEFAULT NULL,
  `avalaible` int(11) DEFAULT NULL,
  `team_mate_id` int(11) DEFAULT NULL,
  `character_id` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

-- --------------------------------------------------------

--
-- Structure de la table `Titles`
--

CREATE TABLE IF NOT EXISTS `Titles` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `date_info` datetime DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `monsterId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`) VALUES
(1, 'Roland'),
(2, 'Rodolphe'),
(3, 'toto');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `capacities`
--
ALTER TABLE `capacities`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `capacitiesByCharacter`
--
ALTER TABLE `capacitiesByCharacter`
 ADD PRIMARY KEY (`id`), ADD KEY `characterId_idx` (`characterId`);

--
-- Index pour la table `capacitiesByFollower`
--
ALTER TABLE `capacitiesByFollower`
 ADD PRIMARY KEY (`id`), ADD KEY `followerId_idx` (`followerId`), ADD KEY `capacityId_idx` (`capacityId`), ADD KEY `caracterId_idx` (`characterId`);

--
-- Index pour la table `capacitiesByMonster`
--
ALTER TABLE `capacitiesByMonster`
 ADD PRIMARY KEY (`id`), ADD KEY `monsterId_idx` (`monsterId`), ADD KEY `capId_idx` (`capacityId`);

--
-- Index pour la table `characters`
--
ALTER TABLE `characters`
 ADD PRIMARY KEY (`id`), ADD KEY `userId_idx` (`userId`);

--
-- Index pour la table `containers`
--
ALTER TABLE `containers`
 ADD PRIMARY KEY (`id`), ADD KEY `itemId_idx` (`itemsId`), ADD KEY `containerId_idx` (`containerId`);

--
-- Index pour la table `descriptionFollowers`
--
ALTER TABLE `descriptionFollowers`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `followers`
--
ALTER TABLE `followers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `followersByCharacter`
--
ALTER TABLE `followersByCharacter`
 ADD PRIMARY KEY (`id`), ADD KEY `characterId_idx` (`characterId`);

--
-- Index pour la table `FollowersItems`
--
ALTER TABLE `FollowersItems`
 ADD PRIMARY KEY (`id`), ADD KEY `followerId_idx` (`FollowersId`), ADD KEY `items_idx` (`ItemId`);

--
-- Index pour la table `functionsByPlace`
--
ALTER TABLE `functionsByPlace`
 ADD PRIMARY KEY (`id`), ADD KEY `placeId_idx` (`placeId`), ADD KEY `functionId_idx` (`functionId`);

--
-- Index pour la table `Infos`
--
ALTER TABLE `Infos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `infosByCharacter`
--
ALTER TABLE `infosByCharacter`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `characId_idx` (`characterId`), ADD KEY `infoId_idx` (`infoId`);

--
-- Index pour la table `infosByQuest`
--
ALTER TABLE `infosByQuest`
 ADD PRIMARY KEY (`id`), ADD KEY `infid_idx` (`infosId`), ADD KEY `questid_idx` (`questId`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `itemsByCharacter`
--
ALTER TABLE `itemsByCharacter`
 ADD PRIMARY KEY (`id`), ADD KEY `characterId_idx` (`characterId`), ADD KEY `item_idx` (`itemId`);

--
-- Index pour la table `itemsByFollowers`
--
ALTER TABLE `itemsByFollowers`
 ADD PRIMARY KEY (`id`), ADD KEY `followerId_idx` (`followerId`), ADD KEY `itemFollower_idx` (`itemId`), ADD KEY `charac_idx` (`characterId`);

--
-- Index pour la table `itemsByQuest`
--
ALTER TABLE `itemsByQuest`
 ADD PRIMARY KEY (`id`), ADD KEY `itemid_idx` (`itemId`), ADD KEY `quid_idx` (`questId`);

--
-- Index pour la table `KillingBoard`
--
ALTER TABLE `KillingBoard`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `map`
--
ALTER TABLE `map`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `monsters`
--
ALTER TABLE `monsters`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `places`
--
ALTER TABLE `places`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `placesByMap`
--
ALTER TABLE `placesByMap`
 ADD PRIMARY KEY (`id`), ADD KEY `mapId_idx` (`mapId`), ADD KEY `place_idx` (`placeId`);

--
-- Index pour la table `placesFunction`
--
ALTER TABLE `placesFunction`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `quests`
--
ALTER TABLE `quests`
 ADD PRIMARY KEY (`id`), ADD KEY `place_idx` (`placeId`), ADD KEY `pId_idx` (`placeId`);

--
-- Index pour la table `questsByCharacter`
--
ALTER TABLE `questsByCharacter`
 ADD PRIMARY KEY (`id`), ADD KEY `cid_idx` (`characterId`), ADD KEY `qid_idx` (`questId`);

--
-- Index pour la table `rate`
--
ALTER TABLE `rate`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`id`), ADD KEY `characterId_idx` (`character_id`), ADD KEY `mate_idx` (`team_mate_id`);

--
-- Index pour la table `Titles`
--
ALTER TABLE `Titles`
 ADD PRIMARY KEY (`id`), ADD KEY `mobId_idx` (`monsterId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `capacities`
--
ALTER TABLE `capacities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `capacitiesByCharacter`
--
ALTER TABLE `capacitiesByCharacter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `capacitiesByFollower`
--
ALTER TABLE `capacitiesByFollower`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `capacitiesByMonster`
--
ALTER TABLE `capacitiesByMonster`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `characters`
--
ALTER TABLE `characters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `descriptionFollowers`
--
ALTER TABLE `descriptionFollowers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `followers`
--
ALTER TABLE `followers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `followersByCharacter`
--
ALTER TABLE `followersByCharacter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT pour la table `FollowersItems`
--
ALTER TABLE `FollowersItems`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT pour la table `functionsByPlace`
--
ALTER TABLE `functionsByPlace`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `Infos`
--
ALTER TABLE `Infos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `infosByCharacter`
--
ALTER TABLE `infosByCharacter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `itemsByCharacter`
--
ALTER TABLE `itemsByCharacter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `itemsByFollowers`
--
ALTER TABLE `itemsByFollowers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT pour la table `monsters`
--
ALTER TABLE `monsters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `quests`
--
ALTER TABLE `quests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `team`
--
ALTER TABLE `team`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `capacitiesByCharacter`
--
ALTER TABLE `capacitiesByCharacter`
ADD CONSTRAINT `characterId` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `capacitiesByFollower`
--
ALTER TABLE `capacitiesByFollower`
ADD CONSTRAINT `capacity` FOREIGN KEY (`capacityId`) REFERENCES `capacities` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `caracterId` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `follower` FOREIGN KEY (`followerId`) REFERENCES `followers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `capacitiesByMonster`
--
ALTER TABLE `capacitiesByMonster`
ADD CONSTRAINT `capId` FOREIGN KEY (`capacityId`) REFERENCES `capacities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `monsterId` FOREIGN KEY (`monsterId`) REFERENCES `monsters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `characters`
--
ALTER TABLE `characters`
ADD CONSTRAINT `FK_3A29410E64B64DCC` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `followersByCharacter`
--
ALTER TABLE `followersByCharacter`
ADD CONSTRAINT `FK_492018735AF690F3` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `FollowersItems`
--
ALTER TABLE `FollowersItems`
ADD CONSTRAINT `followers` FOREIGN KEY (`FollowersId`) REFERENCES `followers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `items` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `functionsByPlace`
--
ALTER TABLE `functionsByPlace`
ADD CONSTRAINT `functionId` FOREIGN KEY (`functionId`) REFERENCES `placesFunction` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `placeId` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `infosByCharacter`
--
ALTER TABLE `infosByCharacter`
ADD CONSTRAINT `characId` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `infoId` FOREIGN KEY (`infoId`) REFERENCES `Infos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `infosByQuest`
--
ALTER TABLE `infosByQuest`
ADD CONSTRAINT `infid` FOREIGN KEY (`infosId`) REFERENCES `Infos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `questid` FOREIGN KEY (`questId`) REFERENCES `quests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `itemsByCharacter`
--
ALTER TABLE `itemsByCharacter`
ADD CONSTRAINT `char` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `item` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `itemsByFollowers`
--
ALTER TABLE `itemsByFollowers`
ADD CONSTRAINT `charac` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `followerId` FOREIGN KEY (`followerId`) REFERENCES `followersByCharacter` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `itemFollower` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `itemsByQuest`
--
ALTER TABLE `itemsByQuest`
ADD CONSTRAINT `iid` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `quid` FOREIGN KEY (`questId`) REFERENCES `quests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `placesByMap`
--
ALTER TABLE `placesByMap`
ADD CONSTRAINT `mapId` FOREIGN KEY (`mapId`) REFERENCES `map` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `place` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `quests`
--
ALTER TABLE `quests`
ADD CONSTRAINT `pId` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `questsByCharacter`
--
ALTER TABLE `questsByCharacter`
ADD CONSTRAINT `cid` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `qid` FOREIGN KEY (`questId`) REFERENCES `quests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `team`
--
ALTER TABLE `team`
ADD CONSTRAINT `charactr` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `mate` FOREIGN KEY (`team_mate_id`) REFERENCES `followersByCharacter` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `Titles`
--
ALTER TABLE `Titles`
ADD CONSTRAINT `mobId` FOREIGN KEY (`monsterId`) REFERENCES `monsters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
