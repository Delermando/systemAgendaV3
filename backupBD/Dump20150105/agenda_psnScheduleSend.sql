CREATE DATABASE  IF NOT EXISTS `agenda` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `agenda`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 192.168.0.198    Database: agenda
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `psnScheduleSend`
--

DROP TABLE IF EXISTS `psnScheduleSend`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `psnScheduleSend` (
  `agnID` int(11) NOT NULL AUTO_INCREMENT,
  `agnIDToEmail` int(11) NOT NULL,
  `agnIDFromEmail` int(11) NOT NULL,
  `agnIDMessage` int(11) NOT NULL,
  `agnDateToSend` char(10) NOT NULL,
  PRIMARY KEY (`agnID`),
  KEY `fkDestinatario_idx` (`agnIDToEmail`),
  KEY `fkRemente_idx` (`agnIDFromEmail`),
  KEY `fkMensagem_idx` (`agnIDMessage`),
  CONSTRAINT `fkFromEmail` FOREIGN KEY (`agnIDFromEmail`) REFERENCES `psnFromEmail` (`agnID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkMessage` FOREIGN KEY (`agnIDMessage`) REFERENCES `psnMessageToSend` (`agnID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkToEmail` FOREIGN KEY (`agnIDToEmail`) REFERENCES `psnToEmail` (`agnID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `psnScheduleSend`
--

LOCK TABLES `psnScheduleSend` WRITE;
/*!40000 ALTER TABLE `psnScheduleSend` DISABLE KEYS */;
INSERT INTO `psnScheduleSend` VALUES (147,75,149,196,'16-07-2014');
/*!40000 ALTER TABLE `psnScheduleSend` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-05 12:04:15
