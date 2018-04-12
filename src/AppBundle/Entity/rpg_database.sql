-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 192.168.99.100    Database: rpg
-- ------------------------------------------------------
-- Server version	5.7.21

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
-- Table structure for table `capacities`
--

DROP TABLE IF EXISTS `capacities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacities` (
  `id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `range` int(11) DEFAULT NULL,
  `attack` int(11) DEFAULT NULL,
  `defense` int(11) DEFAULT NULL,
  `move` int(11) DEFAULT NULL,
  `quickness` int(11) DEFAULT NULL,
  `health` int(11) DEFAULT NULL,
  `energy` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacities`
--

LOCK TABLES `capacities` WRITE;
/*!40000 ALTER TABLE `capacities` DISABLE KEYS */;
INSERT INTO `capacities` VALUES (1,'/images/epee.jpg',1,1,0,0,0,0,0,0),(2,'/images/heal.jpg',2,1,0,0,0,0,4,-2),(3,'/images/charge.jpg',1,1,3,-3,4,NULL,NULL,-3),(4,NULL,1,5,0,0,0,0,0,0);
/*!40000 ALTER TABLE `capacities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacitiesByCharacter`
--

DROP TABLE IF EXISTS `capacitiesByCharacter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacitiesByCharacter` (
  `id` int(11) NOT NULL,
  `characterId` int(11) DEFAULT NULL,
  `capacityId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `characterId_idx` (`characterId`),
  CONSTRAINT `characterId` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacitiesByCharacter`
--

LOCK TABLES `capacitiesByCharacter` WRITE;
/*!40000 ALTER TABLE `capacitiesByCharacter` DISABLE KEYS */;
INSERT INTO `capacitiesByCharacter` VALUES (1,24,1),(2,24,3),(3,24,2);
/*!40000 ALTER TABLE `capacitiesByCharacter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacitiesByFollower`
--

DROP TABLE IF EXISTS `capacitiesByFollower`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `capacitiesByFollower` (
  `id` int(11) NOT NULL,
  `followerId` int(11) DEFAULT NULL,
  `capacityId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `followerId_idx` (`followerId`),
  KEY `capacityId_idx` (`capacityId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacitiesByFollower`
--

LOCK TABLES `capacitiesByFollower` WRITE;
/*!40000 ALTER TABLE `capacitiesByFollower` DISABLE KEYS */;
INSERT INTO `capacitiesByFollower` VALUES (1,1,1),(2,1,3);
/*!40000 ALTER TABLE `capacitiesByFollower` ENABLE KEYS */;
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
INSERT INTO `characters` VALUES (24,'hhh',0,5,5,5,5,5,5,3,3,3,3,1,1,0,'/images/tete.jpg',1,1,310,0,0,0,0,0,0,0,0,0,10,NULL,1,1),(27,'ddddddddd',2,5,5,5,5,5,5,3,3,3,3,1,1,0,'/images/tete.jpg',1,1,280,0,0,0,0,0,5,0,0,41,10,NULL,2,1);
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
INSERT INTO `containers` VALUES (1,1,3,2,27),(2,1,4,2,27);
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followers`
--

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
INSERT INTO `followers` VALUES (1,'Conan',1,5,5,0,0,3,3,4,2,1,1,0,' ',1,'SR',10,2,0,1,0,0,0,0),(2,'Sonia La Rousse',1,5,5,0,0,3,3,3,3,1,1,0,' ',1,'SR',10,2,0,1,0,0,0,0),(3,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',50,1,1,0,10,0,0,0),(4,'Sherif',2,5,5,0,0,3,3,4,2,1,1,0,' ',1,'SR',10,2,1,1,50,0,0,0),(5,'Paladin',2,5,5,0,0,3,3,4,4,1,1,0,' ',1,'SSR',5,3,2,1,100,0,100,0),(6,'Picker',2,3,3,0,0,3,3,3,1,1,1,0,' ',1,'R',30,1,1,0,10,0,0,0),(7,'Archer',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',25,1,1,0,10,0,0,0),(8,'Merc',1,3,3,0,0,3,3,4,3,1,1,0,' ',1,'R',30,1,3,0,0,0,0,0),(9,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',1,'R',50,1,0,0,0,0,0,0),(10,'Thief',1,3,3,0,0,3,3,2,4,1,1,0,'',1,'R',20,1,4,0,0,10,0,0),(11,'Mage',1,3,3,0,0,3,3,4,2,1,1,0,'',1,'R',15,1,0,0,0,0,0,0),(12,'Priest',1,3,3,0,0,3,3,3,3,1,1,0,' ',1,'R',15,1,0,0,0,0,0,0);
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
  PRIMARY KEY (`id`),
  KEY `characterId_idx` (`characterId`),
  KEY `followerId_idx` (`followerId`),
  CONSTRAINT `FK_492018735AF690F3` FOREIGN KEY (`characterId`) REFERENCES `characters` (`id`),
  CONSTRAINT `FK_49201873F542AA03` FOREIGN KEY (`followerId`) REFERENCES `followers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `followersByCharacter`
--

LOCK TABLES `followersByCharacter` WRITE;
/*!40000 ALTER TABLE `followersByCharacter` DISABLE KEYS */;
INSERT INTO `followersByCharacter` VALUES (66,1,'Mage',1,3,3,0,0,3,3,4,2,1,1,0,'',0,'R',0,1,11,27,0,0,0,0),(67,0,'Mage',1,3,3,0,0,3,3,4,2,1,1,0,'',0,'R',0,1,11,27,0,0,0,0),(68,0,'Merc',1,3,3,0,0,3,3,4,3,1,1,0,' ',3,'R',0,1,8,27,0,0,0,0),(69,0,'Merc',1,3,3,0,0,3,3,4,3,1,1,0,' ',3,'R',0,1,8,27,0,0,0,0),(70,0,'Sonia La Rousse',1,5,5,0,0,3,3,3,3,1,1,0,' ',0,'SR',1,2,2,27,0,0,0,0),(71,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(72,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(73,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(74,0,'Priest',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,12,27,0,0,0,0),(75,1,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(76,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(77,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(78,1,'Thief',1,3,3,0,0,3,3,2,4,1,1,0,'',4,'R',0,1,10,27,0,10,0,0),(79,0,'Mage',1,3,3,0,0,3,3,4,2,1,1,0,'',0,'R',0,1,11,27,0,0,0,0),(80,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(81,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(82,1,'Sonia La Rousse',1,5,5,0,0,3,3,3,3,1,1,0,' ',0,'SR',1,2,2,27,0,0,0,0),(83,0,'Mage',1,3,3,0,0,3,3,4,2,1,1,0,'',0,'R',0,1,11,27,0,0,0,0),(84,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(85,0,'Merc',1,3,3,0,0,3,3,4,3,1,1,0,' ',3,'R',0,1,8,27,0,0,0,0),(86,0,'Aventurer',1,3,3,0,0,3,3,3,3,1,1,0,' ',0,'R',0,1,9,27,0,0,0,0),(87,0,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,3,27,10,0,0,0),(88,0,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,3,27,10,0,0,0),(89,0,'Picker',2,3,3,0,0,3,3,3,1,1,1,0,' ',1,'R',0,1,6,27,10,0,0,0),(90,0,'Archer',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,7,27,10,0,0,0),(91,0,'Picker',2,3,3,0,0,3,3,3,1,1,1,0,' ',1,'R',0,1,6,27,10,0,0,0),(92,0,'Paladin',2,5,5,0,0,3,3,4,4,1,1,0,' ',2,'SSR',1,3,5,27,100,0,100,0),(93,0,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,3,27,10,0,0,0),(94,0,'Archer',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,7,27,10,0,0,0),(95,0,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,3,27,10,0,0,0),(96,0,'Sherif',2,5,5,0,0,3,3,4,2,1,1,0,' ',1,'SR',1,2,4,27,50,0,0,0),(97,0,'Picker',2,3,3,0,0,3,3,3,1,1,1,0,' ',1,'R',0,1,6,27,10,0,0,0),(98,0,'Archer',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,7,27,10,0,0,0),(99,0,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,3,27,10,0,0,0),(100,0,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,3,27,10,0,0,0),(101,0,'Picker',2,3,3,0,0,3,3,3,1,1,1,0,' ',1,'R',0,1,6,27,10,0,0,0),(102,0,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,3,27,10,0,0,0),(103,0,'Sherif',2,5,5,0,0,3,3,4,2,1,1,0,' ',1,'SR',1,2,4,27,50,0,0,0),(104,0,'Picker',2,3,3,0,0,3,3,3,1,1,1,0,' ',1,'R',0,1,6,27,10,0,0,0),(105,0,'Guard',2,3,3,0,0,3,3,2,2,1,1,0,' ',1,'R',0,1,3,27,10,0,0,0),(106,0,'Picker',2,3,3,0,0,3,3,3,1,1,1,0,' ',1,'R',0,1,6,27,10,0,0,0);
/*!40000 ALTER TABLE `followersByCharacter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `functionsByPlace`
--

DROP TABLE IF EXISTS `functionsByPlace`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `functionsByPlace` (
  `id` int(11) NOT NULL,
  `placeId` int(11) DEFAULT NULL,
  `functionId` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `placeId_idx` (`placeId`),
  KEY `functionId_idx` (`functionId`),
  CONSTRAINT `functionId` FOREIGN KEY (`functionId`) REFERENCES `placesFunction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `placeId` FOREIGN KEY (`placeId`) REFERENCES `places` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `functionsByPlace`
--

LOCK TABLES `functionsByPlace` WRITE;
/*!40000 ALTER TABLE `functionsByPlace` DISABLE KEYS */;
INSERT INTO `functionsByPlace` VALUES (1,1,1,'Recrutement'),(2,1,8,'Rumeurs'),(3,1,2,'Embauches'),(4,2,1,'Enrôlement'),(5,2,8,'Informations'),(6,2,2,'Enquêtes'),(7,1,7,'Salle de Repos'),(8,2,3,'Salle d\'entraînement');
/*!40000 ALTER TABLE `functionsByPlace` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Bow',1,0,0,1,0,1,0,0,4,20,100,0,0,0,NULL,2),(2,'Bag',2,0,0,0,0,0,0,0,0,10,25,1,1,10,NULL,1),(3,'heal potion',3,0,0,0,0,0,10,0,0,10,50,0,0,0,NULL,1),(4,'key',4,0,0,0,0,0,0,0,0,0,0,0,0,0,NULL,1);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemsByCharacter`
--

DROP TABLE IF EXISTS `itemsByCharacter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemsByCharacter` (
  `id` int(11) NOT NULL,
  `equiped` int(11) DEFAULT NULL,
  `contained` int(11) DEFAULT NULL,
  `container_space` int(11) DEFAULT NULL,
  `containerId` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `bonus_move` int(11) DEFAULT NULL,
  `bonus_quickness` int(11) DEFAULT NULL,
  `bonus_attack` int(11) DEFAULT NULL,
  `bonus_defense` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`),
  KEY `characterId_idx` (`characterId`),
  KEY `itemId_idx` (`itemId`),
  CONSTRAINT `itemId` FOREIGN KEY (`itemId`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemsByCharacter`
--

LOCK TABLES `itemsByCharacter` WRITE;
/*!40000 ALTER TABLE `itemsByCharacter` DISABLE KEYS */;
INSERT INTO `itemsByCharacter` VALUES (1,0,0,0,NULL,'Bow',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,1),(2,0,0,10,NULL,'Bag',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,2),(3,0,1,0,2,'Heal potion',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,3),(4,0,1,0,2,'Key',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,27,4);
/*!40000 ALTER TABLE `itemsByCharacter` ENABLE KEYS */;
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
INSERT INTO `places` VALUES (1,'Taverne',1,1),(2,'Poste de garde',2,1);
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
  CONSTRAINT `mapId` FOREIGN KEY (`mapId`) REFERENCES `map` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placesByMap`
--

LOCK TABLES `placesByMap` WRITE;
/*!40000 ALTER TABLE `placesByMap` DISABLE KEYS */;
INSERT INTO `placesByMap` VALUES (1,1,1),(2,1,2);
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
  `follower_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `characterId_idx` (`character_id`),
  KEY `mateId_idx` (`team_mate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
INSERT INTO `team` VALUES (37,4,0,82,27,2),(44,1,0,78,27,10),(45,5,0,75,27,9),(46,3,0,66,27,11);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Roland'),(2,'Rodolphe');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'rpg'
--

--
-- Dumping routines for database 'rpg'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-12 13:43:29
