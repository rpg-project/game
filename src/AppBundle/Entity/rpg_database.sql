-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 192.168.99.100    Database: rpg3
-- ------------------------------------------------------
-- Server version	5.7.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `FollowersItems`
--

DROP TABLE IF EXISTS `FollowersItems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FollowersItems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ItemId` int(11) DEFAULT NULL,
  `FollowersId` int(11) DEFAULT NULL,
  `Equiped` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `followerId_idx` (`FollowersId`),
  KEY `items_idx` (`ItemId`),
  CONSTRAINT `followers` FOREIGN KEY (`FollowersId`) REFERENCES `followers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `items` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FollowersItems`
--

LOCK TABLES `FollowersItems` WRITE;
/*!40000 ALTER TABLE `FollowersItems` DISABLE KEYS */;
INSERT INTO `FollowersItems` VALUES (47,2,2,0),(48,9,3,0),(49,2,3,0),(50,2,4,0),(52,7,4,0),(53,8,4,0),(54,6,4,0),(55,5,4,0),(56,2,5,0),(57,3,5,0),(58,6,5,0),(59,9,5,0),(60,2,7,0),(61,5,7,0),(62,7,7,0),(63,8,7,0),(64,6,6,0),(65,2,8,0),(66,4,8,0),(67,2,9,0),(68,4,10,0),(69,4,10,0),(70,4,11,0),(71,2,12,0),(74,9,4,0),(75,1,1,0);
/*!40000 ALTER TABLE `FollowersItems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Infos`
--

DROP TABLE IF EXISTS `Infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `infos` text,
  `date_info` datetime DEFAULT NULL,
  `place_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Infos`
--

LOCK TABLES `Infos` WRITE;
/*!40000 ALTER TABLE `Infos` DISABLE KEYS */;
INSERT INTO `Infos` VALUES (12,1,'Le shérif te recherche !','<p>Pas de panique gamin !!\r \r Rien de grave, il veut juste te demander un service.\r</p><p>\rPour savoir ce qu\'il veut, retrouve le juste au <a href=\"/place/2\">poste de garde</a></p>','2018-04-25 14:33:58',1),(13,1,'Un mal couve...','Depuis plusieurs mois, le gibier manque. Les chasseurs ont du mal à trouver ne serait-ce qu\'un lapin.\r\n\r\nD\'autres ont carrément peur d\'aller en forêt. Il paraîtrait que certains chasseurs ne sont jamais revenus...','2018-04-25 14:33:58',1),(14,1,'Le paladin','Tu n\'as pas intérêt à sortir du droit chemin, gamin. \r\n\r\nSinon tu vas attirer l\'attention du Paladin. Et même s\'il ne sert que le bien et la justice, ce n\'est pas un tendre. Alors gare à toi !!','2018-04-25 14:33:58',2),(15,1,'Routes non commerciales','Les routes commerciales ne sont plus sûres.\r\n\r\nLes patrouilleurs ruraux ne font plus leur travail et nos convois de marchandises sont souvent attaquées par des brigands.\r\n\r\nMais que fait le roi Olric !!\r\n\r\nDonc on engage de plus en plus une escorte pour atteindre notre destination sain et sauf.','2018-04-25 14:33:58',3),(16,2,'Tutorial Taverne','<p>Salut gamin, bienvenue dans ma taverne.</p><p>Tu veux boire un coup ?</p><p>Il y a beaucoup de passage ici. Des aventuriers que tu peux recruter si tu es assez connu ou si tu as de l\'or.</p><p>Tu peux aussi glaner quelques rumeurs car les gens parlent toujours au barman.</p><p>Certaines personnes embauchent des aventuriers pour effectuer des tâches qu\'ils ne peuvent pas faire. Hésite pas à lire le tableau des embauches.</p><p>J\'ai des chambres. Si tu ne trouves pas où loger ou si tu veux te reposer, c\'est l\'endroit parfait. C\'est sûr et pas trop cher.Alors je te sers quoi gamin ?</p>','2018-04-25 14:33:58',1);
/*!40000 ALTER TABLE `Infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `KillingBoard`
--

DROP TABLE IF EXISTS `KillingBoard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `KillingBoard` (
  `id` int(11) NOT NULL,
  `monsterId` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL,
  `kills` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `KillingBoard`
--

LOCK TABLES `KillingBoard` WRITE;
/*!40000 ALTER TABLE `KillingBoard` DISABLE KEYS */;
/*!40000 ALTER TABLE `KillingBoard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Titles`
--

DROP TABLE IF EXISTS `Titles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Titles` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `date_info` datetime DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `monsterId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mobId_idx` (`monsterId`),
  CONSTRAINT `mobId` FOREIGN KEY (`monsterId`) REFERENCES `monsters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Titles`
--

LOCK TABLES `Titles` WRITE;
/*!40000 ALTER TABLE `Titles` DISABLE KEYS */;
/*!40000 ALTER TABLE `Titles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacities`
--

DROP TABLE IF EXISTS `capacities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_info` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacities`
--

LOCK TABLES `capacities` WRITE;
/*!40000 ALTER TABLE `capacities` DISABLE KEYS */;
INSERT INTO `capacities` VALUES (1,NULL,'/images/epee.jpg',1,1,0,0,0,0,0,0,'2018-04-26 14:59:06'),(2,NULL,'/images/heal.jpg',2,1,0,0,0,0,4,-2,'2018-04-26 14:59:06'),(3,NULL,'/images/charge.jpg',1,1,3,-3,4,NULL,NULL,-3,'2018-04-26 14:59:06'),(4,NULL,NULL,1,5,0,0,0,0,0,0,'2018-04-26 14:59:06');
/*!40000 ALTER TABLE `capacities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacitiesByCharacter`
--

DROP TABLE IF EXISTS `capacitiesByCharacter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacitiesByCharacter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `characterId` int(11) DEFAULT NULL,
  `capacityId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `characterId_idx` (`characterId`),
  CONSTRAINT `characterId` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacitiesByCharacter`
--

LOCK TABLES `capacitiesByCharacter` WRITE;
/*!40000 ALTER TABLE `capacitiesByCharacter` DISABLE KEYS */;
INSERT INTO `capacitiesByCharacter` VALUES (1,27,1);
/*!40000 ALTER TABLE `capacitiesByCharacter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacitiesByFollower`
--

DROP TABLE IF EXISTS `capacitiesByFollower`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacitiesByFollower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `followerId` int(11) DEFAULT NULL,
  `capacityId` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `followerId_idx` (`followerId`),
  KEY `capacityId_idx` (`capacityId`),
  KEY `caracterId_idx` (`characterId`),
  CONSTRAINT `capacity` FOREIGN KEY (`capacityId`) REFERENCES `capacities` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `caracterId` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `follower` FOREIGN KEY (`followerId`) REFERENCES `followers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacitiesByFollower`
--

LOCK TABLES `capacitiesByFollower` WRITE;
/*!40000 ALTER TABLE `capacitiesByFollower` DISABLE KEYS */;
/*!40000 ALTER TABLE `capacitiesByFollower` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacitiesByMonster`
--

DROP TABLE IF EXISTS `capacitiesByMonster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacitiesByMonster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `capacityId` int(11) DEFAULT NULL,
  `monsterId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `monsterId_idx` (`monsterId`),
  KEY `capId_idx` (`capacityId`),
  CONSTRAINT `capId` FOREIGN KEY (`capacityId`) REFERENCES `capacities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `monsterId` FOREIGN KEY (`monsterId`) REFERENCES `monsters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacitiesByMonster`
--

LOCK TABLES `capacitiesByMonster` WRITE;
/*!40000 ALTER TABLE `capacitiesByMonster` DISABLE KEYS */;
/*!40000 ALTER TABLE `capacitiesByMonster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `max_bag_capacity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userId_idx` (`userId`),
  CONSTRAINT `FK_3A29410E64B64DCC` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characters`
--

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` VALUES (24,'hhh',0,5,5,5,5,5,5,3,3,3,3,1,1,0,'/images/tete.jpg',1,1,310,0,0,0,0,0,0,0,0,0,10,NULL,1,1,10),(27,'ddddddddd',30,5,5,5,5,5,5,3,3,3,3,1,1,0,'/images/tete.jpg',1,1,360,0,0,0,0,0,5,0,0,33,10,NULL,2,1,10);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `containers`
--

DROP TABLE IF EXISTS `containers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `containers` (
  `id` int(11) NOT NULL,
  `weigth` int(11) DEFAULT NULL,
  `itemsId` int(11) DEFAULT NULL,
  `containerId` int(11) DEFAULT NULL,
  `characterdId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `itemId_idx` (`itemsId`),
  KEY `containerId_idx` (`containerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `containers`
--

LOCK TABLES `containers` WRITE;
/*!40000 ALTER TABLE `containers` DISABLE KEYS */;
/*!40000 ALTER TABLE `containers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_info` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (1,'Conan',1,5,5,5,5,3,3,4,2,0,1,0,'/images/conan.jpg',1,'SR',10,4,0,1,0,0,0,0,10,NULL,'2018-04-26 14:59:06'),(2,'Sonia La Rousse',1,5,5,5,5,3,3,3,3,0,1,0,'/images/sonia.jpg',1,'SR',10,4,0,1,0,0,0,0,10,NULL,'2018-04-26 14:59:06'),(3,'Guard',2,3,3,3,3,3,3,2,2,0,1,0,'/images/guard.jpg',1,'C',50,1,1,0,10,0,0,0,10,NULL,'2018-04-26 14:59:06'),(4,'Sherif',2,5,5,5,5,3,3,4,2,0,1,0,' ',1,'SR',10,4,1,1,50,0,0,0,10,NULL,'2018-04-26 14:59:06'),(5,'Paladin',2,5,5,5,5,3,3,4,4,0,1,0,'/images/paladin.jpg',1,'SSR',5,5,2,1,100,0,100,0,10,NULL,'2018-04-26 14:59:06'),(6,'Picker',2,3,3,3,3,3,3,3,1,0,1,0,'/images/picker.jpg',1,'C',30,1,1,0,10,0,0,0,10,NULL,'2018-04-26 14:59:06'),(7,'Archer',2,3,3,3,3,3,3,2,2,0,1,0,'/images/archer.jpg',1,'C',25,1,1,0,10,0,0,0,10,NULL,'2018-04-26 14:59:06'),(8,'Merc',1,3,3,3,3,3,3,4,3,0,1,0,'/images/merc.jpg',1,'R',30,3,3,0,0,0,0,0,10,NULL,'2018-04-26 14:59:06'),(9,'Aventurer',1,3,3,3,3,3,3,3,3,0,1,0,' ',1,'R',50,3,0,0,0,0,0,0,10,NULL,'2018-04-26 14:59:06'),(10,'Thief',1,3,3,3,3,3,3,2,4,0,1,0,'/images/thief.jog',1,'R',20,3,4,0,0,10,0,0,10,NULL,'2018-04-26 14:59:06'),(11,'Mage',1,3,3,3,3,3,3,4,2,0,1,0,'/images/mage.jpg',1,'R',15,3,0,0,0,0,0,0,10,NULL,'2018-04-26 14:59:07'),(12,'Priest',1,3,3,3,3,3,3,3,3,0,1,0,' ',1,'R',15,3,0,0,0,0,0,0,10,NULL,'2018-04-26 14:59:07'),(13,'Ghaalmaraz',1,5,5,5,5,3,2,5,2,1,1,0,'1',1,'SSR',5,5,0,1,0,0,0,0,NULL,NULL,'2018-04-27 11:41:01');
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `followersByCharacter`
--

DROP TABLE IF EXISTS `followersByCharacter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `followersByCharacter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `characterId_idx` (`characterId`),
  CONSTRAINT `FK_492018735AF690F3` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followersByCharacter`
--

LOCK TABLES `followersByCharacter` WRITE;
/*!40000 ALTER TABLE `followersByCharacter` DISABLE KEYS */;
INSERT INTO `followersByCharacter` VALUES (192,0,'Merc',1,3,3,3,3,3,3,4,3,0,1,0,'/images/merc.jpg',3,'R',0,3,8,27,0,0,0,0,10,NULL),(193,0,'Aventurer',1,3,3,3,3,3,3,3,3,0,1,0,' ',0,'R',0,3,9,27,0,0,0,0,10,NULL),(194,0,'Aventurer',1,3,3,3,3,3,3,3,3,0,1,0,' ',0,'R',0,3,9,27,0,0,0,0,10,NULL),(195,0,'Sonia La Rousse',1,5,5,5,5,3,3,3,3,0,1,0,'/images/sonia.jpg',0,'SR',1,4,2,27,0,0,0,0,10,NULL),(196,0,'Aventurer',1,3,3,3,3,3,3,3,3,0,1,0,' ',0,'R',0,3,9,27,0,0,0,0,10,NULL),(197,0,'Aventurer',1,3,3,3,3,3,3,3,3,0,1,0,' ',0,'R',0,3,9,27,0,0,0,0,10,NULL),(198,0,'Conan',1,5,5,5,5,3,3,4,2,0,1,0,'/images/conan.jpg',0,'SR',1,4,1,27,0,0,0,0,10,NULL),(199,0,'Merc',1,3,3,3,3,3,3,4,3,0,1,0,'/images/merc.jpg',3,'R',0,3,8,27,0,0,0,0,10,NULL),(200,0,'Mage',1,3,3,3,3,3,3,4,2,0,1,0,'/images/mage.jpg',0,'R',0,3,11,27,0,0,0,0,10,NULL),(201,0,'Thief',1,3,3,3,3,3,3,2,4,0,1,0,'/images/thief.jog',4,'R',0,3,10,27,0,10,0,0,10,NULL),(202,0,'Thief',1,3,3,3,3,3,3,2,4,0,1,0,'/images/thief.jog',4,'R',0,3,10,27,0,10,0,0,10,NULL),(203,0,'Aventurer',1,3,3,3,3,3,3,3,3,0,1,0,' ',0,'R',0,3,9,27,0,0,0,0,10,NULL),(204,0,'Thief',1,3,3,3,3,3,3,2,4,0,1,0,'/images/thief.jog',4,'R',0,3,10,27,0,10,0,0,10,NULL),(205,0,'Merc',1,3,3,3,3,3,3,4,3,0,1,0,'/images/merc.jpg',3,'R',0,3,8,27,0,0,0,0,10,NULL),(206,0,'Aventurer',1,3,3,3,3,3,3,3,3,0,1,0,' ',0,'R',0,3,9,27,0,0,0,0,10,NULL),(207,0,'Aventurer',1,3,3,3,3,3,3,3,3,0,1,0,' ',0,'R',0,3,9,27,0,0,0,0,10,NULL),(208,1,'Ghaalmaraz',1,5,5,5,5,3,2,5,2,1,1,0,'1',0,'SSR',1,5,13,27,0,0,0,0,NULL,NULL),(209,0,'Ghaalmaraz',1,5,5,5,5,3,2,5,2,1,1,0,'1',0,'SSR',1,5,13,27,0,0,0,0,NULL,NULL),(210,0,'Merc',1,3,3,3,3,3,3,4,3,0,1,0,'/images/merc.jpg',3,'R',0,3,8,27,0,0,0,0,10,NULL),(211,0,'Ghaalmaraz',1,5,5,5,5,3,2,5,2,1,1,0,'1',0,'SSR',1,5,13,27,0,0,0,0,NULL,NULL),(212,0,'Merc',1,3,3,3,3,3,3,4,3,0,1,0,'/images/merc.jpg',3,'R',0,3,8,27,0,0,0,0,10,NULL);
/*!40000 ALTER TABLE `followersByCharacter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `functionsByPlace`
--

DROP TABLE IF EXISTS `functionsByPlace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `functionsByPlace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placeId` int(11) DEFAULT NULL,
  `functionId` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `placeId_idx` (`placeId`),
  KEY `functionId_idx` (`functionId`),
  CONSTRAINT `functionId` FOREIGN KEY (`functionId`) REFERENCES `placesFunction` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `placeId` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `functionsByPlace`
--

LOCK TABLES `functionsByPlace` WRITE;
/*!40000 ALTER TABLE `functionsByPlace` DISABLE KEYS */;
INSERT INTO `functionsByPlace` VALUES (1,1,1,'Recrutement'),(2,1,8,'Rumeurs'),(3,1,2,'Embauches'),(4,2,1,'Enrôlement'),(5,2,8,'Informations'),(6,2,2,'Enquêtes'),(7,1,7,'Salle de Repos'),(8,2,3,'Salle d\'entraînement'),(9,3,5,'Vente'),(10,3,6,'Récupération'),(11,3,8,'Informations');
/*!40000 ALTER TABLE `functionsByPlace` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infosByCharacter`
--

DROP TABLE IF EXISTS `infosByCharacter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infosByCharacter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `characterId` int(11) DEFAULT NULL,
  `infoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `characId_idx` (`characterId`),
  KEY `infoId_idx` (`infoId`),
  CONSTRAINT `characId` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `infoId` FOREIGN KEY (`infoId`) REFERENCES `Infos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infosByCharacter`
--

LOCK TABLES `infosByCharacter` WRITE;
/*!40000 ALTER TABLE `infosByCharacter` DISABLE KEYS */;
INSERT INTO `infosByCharacter` VALUES (40,27,16);
/*!40000 ALTER TABLE `infosByCharacter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infosByQuest`
--

DROP TABLE IF EXISTS `infosByQuest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infosByQuest` (
  `id` int(11) NOT NULL,
  `questId` int(11) DEFAULT NULL,
  `infosId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `quid_idx` (`questId`),
  KEY `infid_idx` (`infosId`),
  CONSTRAINT `infid` FOREIGN KEY (`infosId`) REFERENCES `Infos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `quid` FOREIGN KEY (`questId`) REFERENCES `quests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infosByQuest`
--

LOCK TABLES `infosByQuest` WRITE;
/*!40000 ALTER TABLE `infosByQuest` DISABLE KEYS */;
/*!40000 ALTER TABLE `infosByQuest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_info` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Hache',1,1,1,'C',0,0,1,0,1,0,0,1,15,75,0,0,0,'/images/hache.png',1,50,1,NULL,'2018-04-25 15:50:38'),(2,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,15,75,0,0,0,'/images/sword.jpg',1,50,1,NULL,'2018-04-25 15:50:38'),(3,'Potion de soins',3,1,1,'C',0,0,0,0,0,5,0,1,30,75,0,0,0,'/images/heal_potion.png',1,50,1,NULL,'2018-04-25 15:50:38'),(4,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,25,65,0,0,0,'/images/dague.jpg',1,50,1,NULL,'2018-04-25 15:50:38'),(5,'Arc',1,1,1,'C',0,0,1,0,0,0,0,4,30,75,0,0,0,'/images/arc.jpg',2,50,1,NULL,'2018-04-25 15:50:38'),(6,'Pique',1,1,1,'C',0,0,1,0,0,0,0,5,20,75,0,0,0,'/images/pick.jpg',2,50,1,NULL,'2018-04-25 15:50:38'),(7,'Carquois',2,1,1,'C',0,0,0,0,0,0,0,0,20,50,1,1,20,'/images/carquois.jpg',1,50,1,NULL,'2018-04-25 15:50:38'),(8,'Flèche',3,1,1,'C',0,0,0,0,0,0,0,0,5,15,0,0,0,'/images/fleche.jpg',0,50,1,NULL,'2018-04-25 15:50:38'),(9,'Bouclier',1,1,1,'C',0,0,0,2,0,0,0,6,30,75,0,0,0,'/images/shield.jpg',1,50,1,NULL,'2018-04-25 15:50:38');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemsByCharacter`
--

DROP TABLE IF EXISTS `itemsByCharacter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemsByCharacter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `description` text,
  PRIMARY KEY (`id`),
  KEY `characterId_idx` (`characterId`),
  KEY `item_idx` (`itemId`),
  CONSTRAINT `char` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `item` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemsByCharacter`
--

LOCK TABLES `itemsByCharacter` WRITE;
/*!40000 ALTER TABLE `itemsByCharacter` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemsByCharacter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemsByFollowers`
--

DROP TABLE IF EXISTS `itemsByFollowers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemsByFollowers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `description` text,
  PRIMARY KEY (`id`),
  KEY `followerId_idx` (`followerId`),
  KEY `itemFollower_idx` (`itemId`),
  KEY `charac_idx` (`characterId`),
  CONSTRAINT `charac` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `followerId` FOREIGN KEY (`followerId`) REFERENCES `followersByCharacter` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `itemFollower` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemsByFollowers`
--

LOCK TABLES `itemsByFollowers` WRITE;
/*!40000 ALTER TABLE `itemsByFollowers` DISABLE KEYS */;
INSERT INTO `itemsByFollowers` VALUES (67,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,192,27,NULL),(68,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,192,27,NULL),(69,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,193,27,NULL),(70,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,194,27,NULL),(71,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,195,27,NULL),(72,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,196,27,NULL),(73,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,197,27,NULL),(74,0,1,0,0,'Hache',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/hache.png',0,1,1,198,27,NULL),(75,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,199,27,NULL),(76,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,199,27,NULL),(77,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,200,27,NULL),(78,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,201,27,NULL),(79,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,201,27,NULL),(80,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,202,27,NULL),(81,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,202,27,NULL),(82,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,203,27,NULL),(83,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,204,27,NULL),(84,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,204,27,NULL),(85,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,205,27,NULL),(86,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,205,27,NULL),(87,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,206,27,NULL),(88,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,207,27,NULL),(89,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,210,27,NULL),(90,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,210,27,NULL),(91,0,1,0,0,'Epée',1,1,1,'C',0,0,1,0,1,0,0,1,0,75,'/images/sword.jpg',0,1,2,212,27,NULL),(92,0,1,0,0,'Dague',1,1,1,'C',0,0,1,0,2,0,0,1,0,65,'/images/dague.jpg',0,1,4,212,27,NULL);
/*!40000 ALTER TABLE `itemsByFollowers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemsByQuest`
--

DROP TABLE IF EXISTS `itemsByQuest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemsByQuest` (
  `id` int(11) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `questId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questid_idx` (`questId`),
  KEY `itemid_idx` (`itemId`),
  CONSTRAINT `iid` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `qid` FOREIGN KEY (`questId`) REFERENCES `quests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemsByQuest`
--

LOCK TABLES `itemsByQuest` WRITE;
/*!40000 ALTER TABLE `itemsByQuest` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemsByQuest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map`
--

DROP TABLE IF EXISTS `map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `map_name` varchar(50) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `width` varchar(45) DEFAULT NULL,
  `height` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map`
--

LOCK TABLES `map` WRITE;
/*!40000 ALTER TABLE `map` DISABLE KEYS */;
INSERT INTO `map` VALUES (1,'starting ground','Town',NULL,NULL);
/*!40000 ALTER TABLE `map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monsters`
--

DROP TABLE IF EXISTS `monsters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monsters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `kill_title` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monsters`
--

LOCK TABLES `monsters` WRITE;
/*!40000 ALTER TABLE `monsters` DISABLE KEYS */;
/*!40000 ALTER TABLE `monsters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `places`
--

LOCK TABLES `places` WRITE;
/*!40000 ALTER TABLE `places` DISABLE KEYS */;
INSERT INTO `places` VALUES (1,'Taverne',1,1),(2,'Poste de garde',2,1),(3,'Quincaillerie',3,1);
/*!40000 ALTER TABLE `places` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placesByMap`
--

DROP TABLE IF EXISTS `placesByMap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placesByMap` (
  `id` int(11) NOT NULL,
  `mapId` int(11) DEFAULT NULL,
  `placeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mapId_idx` (`mapId`),
  KEY `place_idx` (`placeId`),
  CONSTRAINT `mapId` FOREIGN KEY (`mapId`) REFERENCES `map` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `place` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placesByMap`
--

LOCK TABLES `placesByMap` WRITE;
/*!40000 ALTER TABLE `placesByMap` DISABLE KEYS */;
INSERT INTO `placesByMap` VALUES (1,1,1),(2,1,2),(3,1,3);
/*!40000 ALTER TABLE `placesByMap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placesFunction`
--

DROP TABLE IF EXISTS `placesFunction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placesFunction` (
  `id` int(11) NOT NULL,
  `function` varchar(50) DEFAULT NULL,
  `typeFunction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placesFunction`
--

LOCK TABLES `placesFunction` WRITE;
/*!40000 ALTER TABLE `placesFunction` DISABLE KEYS */;
INSERT INTO `placesFunction` VALUES (1,'summon',1),(2,'quest',2),(3,'training',3),(4,'craft',4),(5,'sell',5),(6,'buy',6),(7,'healing',7),(8,'info',8);
/*!40000 ALTER TABLE `placesFunction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quests`
--

DROP TABLE IF EXISTS `quests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quests` (
  `id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `description` text,
  `difficulty` int(11) DEFAULT NULL,
  `glory_reward` int(11) DEFAULT NULL,
  `gold_reward` int(11) DEFAULT NULL,
  `xp_reward` int(11) DEFAULT NULL,
  `bonus_law` int(11) DEFAULT NULL,
  `bonus_chaos` int(11) DEFAULT NULL,
  `bonus_good` int(11) DEFAULT NULL,
  `bonus_evil` int(11) DEFAULT NULL,
  `level_min` int(11) DEFAULT NULL,
  `date_info` datetime DEFAULT NULL,
  `placeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `place_idx` (`placeId`),
  KEY `pId_idx` (`placeId`),
  CONSTRAINT `pId` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quests`
--

LOCK TABLES `quests` WRITE;
/*!40000 ALTER TABLE `quests` DISABLE KEYS */;
/*!40000 ALTER TABLE `quests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questsByCharacter`
--

DROP TABLE IF EXISTS `questsByCharacter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questsByCharacter` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `questId` int(11) DEFAULT NULL,
  `characterId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questID_idx` (`questId`),
  KEY `cid_idx` (`characterId`),
  CONSTRAINT `cid` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `questID` FOREIGN KEY (`questId`) REFERENCES `quests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questsByCharacter`
--

LOCK TABLES `questsByCharacter` WRITE;
/*!40000 ALTER TABLE `questsByCharacter` DISABLE KEYS */;
/*!40000 ALTER TABLE `questsByCharacter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rate`
--

DROP TABLE IF EXISTS `rate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `rate_label` varchar(45) DEFAULT NULL,
  `pop_rate` int(11) DEFAULT NULL,
  `price_back` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rate`
--

LOCK TABLES `rate` WRITE;
/*!40000 ALTER TABLE `rate` DISABLE KEYS */;
INSERT INTO `rate` VALUES (1,'SSR',5,5),(2,'SR',10,4),(3,'R',25,3),(4,'N',35,2),(5,'C',50,1),(6,'XR',3,10);
/*!40000 ALTER TABLE `rate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place` int(11) DEFAULT NULL,
  `avalaible` int(11) DEFAULT NULL,
  `team_mate_id` int(11) DEFAULT NULL,
  `character_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `characterId_idx` (`character_id`),
  KEY `mate_idx` (`team_mate_id`),
  CONSTRAINT `charactr` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `mate` FOREIGN KEY (`team_mate_id`) REFERENCES `followersByCharacter` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (98,1,0,208,27);
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Roland'),(2,'Rodolphe'),(3,'toto');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'rpg3'
--

--
-- Dumping routines for database 'rpg3'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-30 11:07:46
