-- MySQL dump 10.13  Distrib 5.1.58, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: skylib
-- ------------------------------------------------------
-- Server version	5.1.58-1ubuntu1

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
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ils`
--

DROP TABLE IF EXISTS `ils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ils` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ils`
--

LOCK TABLES `ils` WRITE;
/*!40000 ALTER TABLE `ils` DISABLE KEYS */;
INSERT INTO `ils` VALUES (1,'Абсотек Юникод'),(2,'Ирбис 32'),(3,'Ирбис 64'),(4,'Ирбис 128'),(5,'Руслан'),(6,'МаркSQL');
/*!40000 ALTER TABLE `ils` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `library`
--

DROP TABLE IF EXISTS `library`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `abbrev` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organization` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ils_id` int(11) DEFAULT NULL,
  `access` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `library_type_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `library`
--

LOCK TABLES `library` WRITE;
/*!40000 ALTER TABLE `library` DISABLE KEYS */;
INSERT INTO `library` VALUES (1,'test','',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(2,'тест','',NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL),(3,'test','teset',NULL,'etset',NULL,NULL,NULL,NULL,'2012-01-18 19:02:05','2012-01-18 19:02:05'),(4,'test','teset',NULL,'test',NULL,NULL,NULL,NULL,'2012-01-18 19:10:40','2012-01-18 19:10:40'),(5,'testet','teset',NULL,'setset',NULL,NULL,NULL,NULL,'2012-01-19 17:05:38','2012-01-19 17:05:38'),(6,'wea','test3',NULL,'aweawe',NULL,NULL,NULL,NULL,'2012-01-19 17:34:29','2012-01-19 17:34:29'),(7,'НТБ МЭИ','МЭИ',NULL,'123123',NULL,NULL,NULL,NULL,'2012-01-20 04:31:35','2012-01-20 04:31:35');
/*!40000 ALTER TABLE `library` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `library_type`
--

DROP TABLE IF EXISTS `library_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `library_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `library_type`
--

LOCK TABLES `library_type` WRITE;
/*!40000 ALTER TABLE `library_type` DISABLE KEYS */;
INSERT INTO `library_type` VALUES (1,'Публичная'),(2,'Библиотека ВУЗа'),(3,'Библиотека предприятия'),(4,'Государственная');
/*!40000 ALTER TABLE `library_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worker`
--

DROP TABLE IF EXISTS `worker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `library_id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middle_name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='library worker';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worker`
--

LOCK TABLES `worker` WRITE;
/*!40000 ALTER TABLE `worker` DISABLE KEYS */;
INSERT INTO `worker` VALUES (1,0,'test',NULL,'TETY',NULL,'support@librmedia.ru',NULL,NULL,'2012-01-27 16:02:24','2012-01-27 16:02:24'),(2,0,'Александр','Tushin','Сергеевич','программист','support@librmedia.ru','+7 (495) 234-23-34',NULL,'2012-01-27 16:18:51','2012-01-27 16:18:51'),(3,0,'Александр','Tushin','Сергеевич','программист','support@librmedia.ru','+7 (495) 234-23-34','test','2012-01-27 18:29:40','2012-01-27 18:29:40'),(4,0,'Александр','Tushin','Сергеевич','программист','support@librmedia.ru','+7 (495) 234-23-34','test','2012-01-27 18:48:12','2012-01-27 18:48:12'),(5,0,'Александр','Tushin','Сергеевич','программист','support@librmedia.ru','+7 (495) 234-23-34','test','2012-01-27 18:51:42','2012-01-27 18:51:42'),(6,0,'Александр','Tushin','Сергеевич','программист','support@librmedia.ru','+7 (495) 234-23-34','098f6bcd4621d373cade4e832627b4f6','2012-01-27 18:51:55','2012-01-27 18:51:55');
/*!40000 ALTER TABLE `worker` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-01-27 19:31:34
