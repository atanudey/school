CREATE DATABASE  IF NOT EXISTS `educare_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `educare_db`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: educare_db
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Table structure for table `candidate_type`
--

DROP TABLE IF EXISTS `candidate_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidate_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` varchar(45) NOT NULL COMMENT 'Student/Staff',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidate_type`
--

LOCK TABLES `candidate_type` WRITE;
/*!40000 ALTER TABLE `candidate_type` DISABLE KEYS */;
INSERT INTO `candidate_type` VALUES (1,'Student'),(2,'Teacher'),(3,'Staff');
/*!40000 ALTER TABLE `candidate_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('1409781ae60758fd4dcf21ce241b075d443caa62','::1',1478745288,'__ci_last_regenerate|i:1478745287;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:31:{i:0;a:9:{s:4:\"Name\";s:11:\"Rusha ( 2 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:1;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"21/10/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:2;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"28/10/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:3;a:9:{s:4:\"Name\";s:11:\"Rusha ( 2 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:4;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"06/11/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:5;a:9:{s:4:\"Name\";s:18:\"Sujit Ghosh ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:6;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"12/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:7;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"18/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:8;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"19/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:9;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"23/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:10;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"27/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:11;a:9:{s:4:\"Name\";s:18:\"Sujit Ghosh ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:12;a:9:{s:4:\"Name\";s:16:\"Rana Saha ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:13;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"11/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:14;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"13/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:15;a:9:{s:4:\"Name\";s:16:\"Rana Saha ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:16;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"04/11/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:17;a:9:{s:4:\"Name\";s:14:\"Arghya  ( 11 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:18;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"14/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:19;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"15/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:20;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"20/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:21;a:9:{s:4:\"Name\";s:14:\"Arghya  ( 11 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:22;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"10/11/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:23;a:9:{s:4:\"Name\";s:12:\"Adfdf ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:24;a:9:{s:4:\"Name\";s:12:\"Adfdf ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:25;a:9:{s:4:\"Name\";s:12:\"Atanu ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( B )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:26;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"10/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:27;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"16/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:28;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"22/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:29;a:9:{s:4:\"Name\";s:12:\"Atanu ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( B )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:30;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"01/11/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}}report_parameters|a:5:{s:4:\"type\";s:7:\"student\";s:10:\"start_date\";s:10:\"10/10/2016\";s:8:\"end_date\";s:10:\"10/11/2016\";s:9:\"school_id\";s:7:\"SC00001\";s:15:\"student_id_list\";s:12:\"2,4,5,6,7,14\";}'),('1749bebb17fda7d71a2179b5b138082f2ec1e06f','::1',1478742321,'__ci_last_regenerate|i:1478742309;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:4:{i:0;a:8:{s:7:\"Roll_No\";s:1:\"1\";s:7:\"RFID_NO\";s:10:\"8665123351\";s:14:\"Candidate_Name\";s:6:\"Prahan\";s:12:\"ClassSection\";s:11:\"Class 1 - A\";s:13:\"Guardian_Name\";s:6:\"Partha\";s:4:\"Mob1\";s:10:\"9051733137\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:30:00\";}i:1;a:8:{s:7:\"Roll_No\";s:1:\"2\";s:7:\"RFID_NO\";s:10:\"1425241197\";s:14:\"Candidate_Name\";s:5:\"Rusha\";s:12:\"ClassSection\";s:11:\"Class 2 - A\";s:13:\"Guardian_Name\";s:5:\"Rahul\";s:4:\"Mob1\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:40:00\";}i:2;a:8:{s:7:\"Roll_No\";s:1:\"2\";s:7:\"RFID_NO\";s:10:\"1425241197\";s:14:\"Candidate_Name\";s:5:\"Rusha\";s:12:\"ClassSection\";s:11:\"Class 2 - A\";s:13:\"Guardian_Name\";s:5:\"Rahul\";s:4:\"Mob1\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:00:00\";}i:3;a:8:{s:7:\"Roll_No\";s:2:\"10\";s:7:\"RFID_NO\";s:11:\"16213812237\";s:14:\"Candidate_Name\";s:5:\"Titli\";s:12:\"ClassSection\";s:11:\"Class 4 - A\";s:13:\"Guardian_Name\";s:10:\"Shiladitya\";s:4:\"Mob1\";s:12:\"919051733137\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:45:00\";}}report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"01/10/2016\";s:9:\"school_id\";s:7:\"SC00001\";}'),('1c1800c80e530ea89b3c2387835a105f830069de','::1',1478736055,'__ci_last_regenerate|i:1478735894;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report_parameters|a:9:{s:4:\"type\";s:5:\"other\";s:11:\"start_month\";i:10;s:9:\"end_month\";i:11;s:9:\"school_id\";s:7:\"SC00001\";s:7:\"classes\";s:0:\"\";s:8:\"sections\";s:0:\"\";s:8:\"interval\";i:1;s:10:\"start_date\";s:10:\"10/10/2016\";s:8:\"end_date\";s:10:\"10/11/2016\";}report|a:9:{i:0;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:13:\"October, 2016\";s:4:\"Roll\";s:0:\"\";s:4:\"Name\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:5:\"Class\";s:0:\"\";s:7:\"Section\";s:0:\"\";s:7:\"Present\";s:0:\"\";s:6:\"Absent\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:1;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:1:\"1\";s:4:\"Name\";s:6:\"Prahan\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 1\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"6\";s:6:\"Absent\";s:2:\"15\";s:4:\"Type\";s:4:\"data\";}i:2;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:1:\"2\";s:4:\"Name\";s:5:\"Rusha\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"7\";s:6:\"Absent\";s:2:\"14\";s:4:\"Type\";s:4:\"data\";}i:3;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"10\";s:4:\"Name\";s:5:\"Titli\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 4\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"7\";s:6:\"Absent\";s:2:\"14\";s:4:\"Type\";s:4:\"data\";}i:4;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"13\";s:4:\"Name\";s:11:\"Sujit Ghosh\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"5\";s:6:\"Absent\";s:2:\"16\";s:4:\"Type\";s:4:\"data\";}i:5;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"12\";s:4:\"Name\";s:9:\"Rana Saha\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"4\";s:6:\"Absent\";s:2:\"17\";s:4:\"Type\";s:4:\"data\";}i:6;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"11\";s:4:\"Name\";s:7:\"Arghya \";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"6\";s:6:\"Absent\";s:2:\"15\";s:4:\"Type\";s:4:\"data\";}i:7;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"13\";s:4:\"Name\";s:5:\"Atanu\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"B\";s:7:\"Present\";s:1:\"4\";s:6:\"Absent\";s:2:\"17\";s:4:\"Type\";s:4:\"data\";}i:8;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:20:\"Total for 7 Students\";s:4:\"Roll\";s:0:\"\";s:4:\"Name\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:5:\"Class\";s:0:\"\";s:7:\"Section\";s:0:\"\";s:7:\"Present\";s:2:\"39\";s:6:\"Absent\";s:3:\"108\";s:4:\"Type\";s:7:\"summary\";}}'),('31088c38c4367e94e2f0cb7b6810f5b4846f722a','::1',1478738445,'__ci_last_regenerate|i:1478738445;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"01/10/2016\";s:9:\"school_id\";s:7:\"SC00001\";}report|a:4:{i:0;a:8:{s:7:\"Roll_No\";s:1:\"1\";s:7:\"RFID_NO\";s:10:\"8665123351\";s:14:\"Candidate_Name\";s:6:\"Prahan\";s:12:\"ClassSection\";s:11:\"Class 1 - A\";s:13:\"Guardian_Name\";s:6:\"Partha\";s:4:\"Mob1\";s:10:\"9051733137\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:30:00\";}i:1;a:8:{s:7:\"Roll_No\";s:1:\"2\";s:7:\"RFID_NO\";s:10:\"1425241197\";s:14:\"Candidate_Name\";s:5:\"Rusha\";s:12:\"ClassSection\";s:11:\"Class 2 - A\";s:13:\"Guardian_Name\";s:5:\"Rahul\";s:4:\"Mob1\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:40:00\";}i:2;a:8:{s:7:\"Roll_No\";s:1:\"2\";s:7:\"RFID_NO\";s:10:\"1425241197\";s:14:\"Candidate_Name\";s:5:\"Rusha\";s:12:\"ClassSection\";s:11:\"Class 2 - A\";s:13:\"Guardian_Name\";s:5:\"Rahul\";s:4:\"Mob1\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:00:00\";}i:3;a:8:{s:7:\"Roll_No\";s:2:\"10\";s:7:\"RFID_NO\";s:11:\"16213812237\";s:14:\"Candidate_Name\";s:5:\"Titli\";s:12:\"ClassSection\";s:11:\"Class 4 - A\";s:13:\"Guardian_Name\";s:10:\"Shiladitya\";s:4:\"Mob1\";s:12:\"919051733137\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:45:00\";}}'),('447a5fd8c27aeb161acdfb63f2e79f2386ba9b04','::1',1478734391,'__ci_last_regenerate|i:1478734233;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;'),('49fa470a99f046631de72c3a6d09ee92ede294e7','::1',1478739195,'__ci_last_regenerate|i:1478739153;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"01/10/2016\";s:9:\"school_id\";s:7:\"SC00001\";}report|a:4:{i:0;a:8:{s:7:\"Roll_No\";s:1:\"1\";s:7:\"RFID_NO\";s:10:\"8665123351\";s:14:\"Candidate_Name\";s:6:\"Prahan\";s:12:\"ClassSection\";s:11:\"Class 1 - A\";s:13:\"Guardian_Name\";s:6:\"Partha\";s:4:\"Mob1\";s:10:\"9051733137\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:30:00\";}i:1;a:8:{s:7:\"Roll_No\";s:1:\"2\";s:7:\"RFID_NO\";s:10:\"1425241197\";s:14:\"Candidate_Name\";s:5:\"Rusha\";s:12:\"ClassSection\";s:11:\"Class 2 - A\";s:13:\"Guardian_Name\";s:5:\"Rahul\";s:4:\"Mob1\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:40:00\";}i:2;a:8:{s:7:\"Roll_No\";s:1:\"2\";s:7:\"RFID_NO\";s:10:\"1425241197\";s:14:\"Candidate_Name\";s:5:\"Rusha\";s:12:\"ClassSection\";s:11:\"Class 2 - A\";s:13:\"Guardian_Name\";s:5:\"Rahul\";s:4:\"Mob1\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:00:00\";}i:3;a:8:{s:7:\"Roll_No\";s:2:\"10\";s:7:\"RFID_NO\";s:11:\"16213812237\";s:14:\"Candidate_Name\";s:5:\"Titli\";s:12:\"ClassSection\";s:11:\"Class 4 - A\";s:13:\"Guardian_Name\";s:10:\"Shiladitya\";s:4:\"Mob1\";s:12:\"919051733137\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:45:00\";}}'),('4b43b3b08ca9345c9c57deef63028e079c1c7736','::1',1478741485,'__ci_last_regenerate|i:1478741458;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:0:{}report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"10/11/2016\";s:9:\"school_id\";N;}'),('78d6919c8b2dad82cd95f4e79eb2839f55153752','::1',1478740747,'__ci_last_regenerate|i:1478740725;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:0:{}report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"10/11/2016\";s:9:\"school_id\";N;}'),('79ff6f1bbd5270d154e047275f4a24daa6ff2ccc','::1',1478742163,'__ci_last_regenerate|i:1478741949;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:0:{}report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"10/11/2016\";s:9:\"school_id\";s:7:\"SC00001\";}'),('848a135ef63854c2304b70ce98c36c52169e6012','::1',1478736835,'__ci_last_regenerate|i:1478736602;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report_parameters|a:9:{s:4:\"type\";s:5:\"other\";s:11:\"start_month\";i:10;s:9:\"end_month\";i:11;s:9:\"school_id\";s:7:\"SC00001\";s:7:\"classes\";s:0:\"\";s:8:\"sections\";s:0:\"\";s:8:\"interval\";i:1;s:10:\"start_date\";s:10:\"10/10/2016\";s:8:\"end_date\";s:10:\"10/11/2016\";}report|a:9:{i:0;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:13:\"October, 2016\";s:4:\"Roll\";s:0:\"\";s:4:\"Name\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:5:\"Class\";s:0:\"\";s:7:\"Section\";s:0:\"\";s:7:\"Present\";s:0:\"\";s:6:\"Absent\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:1;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:1:\"1\";s:4:\"Name\";s:6:\"Prahan\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 1\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"6\";s:6:\"Absent\";s:2:\"15\";s:4:\"Type\";s:4:\"data\";}i:2;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:1:\"2\";s:4:\"Name\";s:5:\"Rusha\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"7\";s:6:\"Absent\";s:2:\"14\";s:4:\"Type\";s:4:\"data\";}i:3;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"10\";s:4:\"Name\";s:5:\"Titli\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 4\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"7\";s:6:\"Absent\";s:2:\"14\";s:4:\"Type\";s:4:\"data\";}i:4;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"13\";s:4:\"Name\";s:11:\"Sujit Ghosh\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"5\";s:6:\"Absent\";s:2:\"16\";s:4:\"Type\";s:4:\"data\";}i:5;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"12\";s:4:\"Name\";s:9:\"Rana Saha\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"4\";s:6:\"Absent\";s:2:\"17\";s:4:\"Type\";s:4:\"data\";}i:6;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"11\";s:4:\"Name\";s:7:\"Arghya \";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"6\";s:6:\"Absent\";s:2:\"15\";s:4:\"Type\";s:4:\"data\";}i:7;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"13\";s:4:\"Name\";s:5:\"Atanu\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"B\";s:7:\"Present\";s:1:\"4\";s:6:\"Absent\";s:2:\"17\";s:4:\"Type\";s:4:\"data\";}i:8;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:20:\"Total for 7 Students\";s:4:\"Roll\";s:0:\"\";s:4:\"Name\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:5:\"Class\";s:0:\"\";s:7:\"Section\";s:0:\"\";s:7:\"Present\";s:2:\"39\";s:6:\"Absent\";s:3:\"108\";s:4:\"Type\";s:7:\"summary\";}}'),('89720f1591e2c6239eff7088f740f7f2bce63a1c','::1',1478743850,'__ci_last_regenerate|i:1478743577;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:31:{i:0;a:9:{s:4:\"Name\";s:11:\"Rusha ( 2 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:1;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"21/10/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:2;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"28/10/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:3;a:9:{s:4:\"Name\";s:11:\"Rusha ( 2 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:4;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"06/11/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:5;a:9:{s:4:\"Name\";s:18:\"Sujit Ghosh ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:6;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"12/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:7;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"18/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:8;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"19/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:9;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"23/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:10;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"27/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:11;a:9:{s:4:\"Name\";s:18:\"Sujit Ghosh ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:12;a:9:{s:4:\"Name\";s:16:\"Rana Saha ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:13;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"11/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:14;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"13/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:15;a:9:{s:4:\"Name\";s:16:\"Rana Saha ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:16;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"04/11/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:17;a:9:{s:4:\"Name\";s:14:\"Arghya  ( 11 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:18;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"14/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:19;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"15/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:20;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"20/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:21;a:9:{s:4:\"Name\";s:14:\"Arghya  ( 11 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:22;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"10/11/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:23;a:9:{s:4:\"Name\";s:12:\"Adfdf ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:24;a:9:{s:4:\"Name\";s:12:\"Adfdf ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:25;a:9:{s:4:\"Name\";s:12:\"Atanu ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( B )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:26;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"10/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:27;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"16/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:28;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"22/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:29;a:9:{s:4:\"Name\";s:12:\"Atanu ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( B )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:30;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"01/11/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}}report_parameters|a:5:{s:4:\"type\";s:7:\"student\";s:10:\"start_date\";s:10:\"10/10/2016\";s:8:\"end_date\";s:10:\"10/11/2016\";s:9:\"school_id\";s:7:\"SC00001\";s:15:\"student_id_list\";s:12:\"2,4,5,6,7,14\";}'),('8d94197b1c787fc2e1539cbf9ef342511e9c6854','::1',1478734643,'__ci_last_regenerate|i:1478734627;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;'),('95ea8796a7b30a6fb9016df66da2964e3751d69d','::1',1478737145,'__ci_last_regenerate|i:1478736928;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"01/10/2016\";s:9:\"school_id\";s:7:\"SC00001\";}report|a:4:{i:0;a:8:{s:7:\"Roll_No\";s:1:\"1\";s:7:\"RFID_NO\";s:10:\"8665123351\";s:14:\"Candidate_Name\";s:6:\"Prahan\";s:12:\"ClassSection\";s:11:\"Class 1 - A\";s:13:\"Guardian_Name\";s:6:\"Partha\";s:4:\"Mob1\";s:10:\"9051733137\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:30:00\";}i:1;a:8:{s:7:\"Roll_No\";s:1:\"2\";s:7:\"RFID_NO\";s:10:\"1425241197\";s:14:\"Candidate_Name\";s:5:\"Rusha\";s:12:\"ClassSection\";s:11:\"Class 2 - A\";s:13:\"Guardian_Name\";s:5:\"Rahul\";s:4:\"Mob1\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:40:00\";}i:2;a:8:{s:7:\"Roll_No\";s:1:\"2\";s:7:\"RFID_NO\";s:10:\"1425241197\";s:14:\"Candidate_Name\";s:5:\"Rusha\";s:12:\"ClassSection\";s:11:\"Class 2 - A\";s:13:\"Guardian_Name\";s:5:\"Rahul\";s:4:\"Mob1\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:00:00\";}i:3;a:8:{s:7:\"Roll_No\";s:2:\"10\";s:7:\"RFID_NO\";s:11:\"16213812237\";s:14:\"Candidate_Name\";s:5:\"Titli\";s:12:\"ClassSection\";s:11:\"Class 4 - A\";s:13:\"Guardian_Name\";s:10:\"Shiladitya\";s:4:\"Mob1\";s:12:\"919051733137\";s:7:\"Address\";s:9:\"Add1 Add2\";s:7:\"IN_Time\";s:8:\"10:45:00\";}}'),('a3782911b2a3b54ac5d8ef00e9a4e88e3e633ffa','::1',1478736585,'__ci_last_regenerate|i:1478736300;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report_parameters|a:9:{s:4:\"type\";s:5:\"other\";s:11:\"start_month\";i:10;s:9:\"end_month\";i:11;s:9:\"school_id\";s:7:\"SC00001\";s:7:\"classes\";s:0:\"\";s:8:\"sections\";s:0:\"\";s:8:\"interval\";i:1;s:10:\"start_date\";s:10:\"10/10/2016\";s:8:\"end_date\";s:10:\"10/11/2016\";}report|a:9:{i:0;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:13:\"October, 2016\";s:4:\"Roll\";s:0:\"\";s:4:\"Name\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:5:\"Class\";s:0:\"\";s:7:\"Section\";s:0:\"\";s:7:\"Present\";s:0:\"\";s:6:\"Absent\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:1;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:1:\"1\";s:4:\"Name\";s:6:\"Prahan\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 1\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"6\";s:6:\"Absent\";s:2:\"15\";s:4:\"Type\";s:4:\"data\";}i:2;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:1:\"2\";s:4:\"Name\";s:5:\"Rusha\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"7\";s:6:\"Absent\";s:2:\"14\";s:4:\"Type\";s:4:\"data\";}i:3;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"10\";s:4:\"Name\";s:5:\"Titli\";s:7:\"Address\";s:9:\"Add1 Add2\";s:5:\"Class\";s:7:\"Class 4\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"7\";s:6:\"Absent\";s:2:\"14\";s:4:\"Type\";s:4:\"data\";}i:4;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"13\";s:4:\"Name\";s:11:\"Sujit Ghosh\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"5\";s:6:\"Absent\";s:2:\"16\";s:4:\"Type\";s:4:\"data\";}i:5;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"12\";s:4:\"Name\";s:9:\"Rana Saha\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"4\";s:6:\"Absent\";s:2:\"17\";s:4:\"Type\";s:4:\"data\";}i:6;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"11\";s:4:\"Name\";s:7:\"Arghya \";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"A\";s:7:\"Present\";s:1:\"6\";s:6:\"Absent\";s:2:\"15\";s:4:\"Type\";s:4:\"data\";}i:7;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:0:\"\";s:4:\"Roll\";s:2:\"13\";s:4:\"Name\";s:5:\"Atanu\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:5:\"Class\";s:7:\"Class 2\";s:7:\"Section\";s:1:\"B\";s:7:\"Present\";s:1:\"4\";s:6:\"Absent\";s:2:\"17\";s:4:\"Type\";s:4:\"data\";}i:8;a:10:{s:5:\"Month\";s:2:\"10\";s:11:\"Information\";s:20:\"Total for 7 Students\";s:4:\"Roll\";s:0:\"\";s:4:\"Name\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:5:\"Class\";s:0:\"\";s:7:\"Section\";s:0:\"\";s:7:\"Present\";s:2:\"39\";s:6:\"Absent\";s:3:\"108\";s:4:\"Type\";s:7:\"summary\";}}'),('af78e53795b4f6626ae231915ab5ac53e9651de3','::1',1478740225,'__ci_last_regenerate|i:1478740180;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:0:{}report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"10/11/2016\";s:9:\"school_id\";N;}'),('bbf114c4e891c435ff094496f753c97f792799d6','::1',1478741067,'__ci_last_regenerate|i:1478741039;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:0:{}report_parameters|a:3:{s:4:\"type\";s:7:\"missing\";s:4:\"date\";s:10:\"10/11/2016\";s:9:\"school_id\";N;}'),('d7367e7988820df7cf93144c0c33a52f5b7ec87d','::1',1478733954,'__ci_last_regenerate|i:1478733713;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;'),('f8c072d175e0171f8e22952523074bce3116a983','::1',1478744168,'__ci_last_regenerate|i:1478743889;user|O:8:\"stdClass\":18:{s:2:\"ID\";s:2:\"13\";s:4:\"Name\";s:10:\"Demo Admin\";s:7:\"User_ID\";s:5:\"admin\";s:8:\"Password\";s:60:\"$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm\";s:8:\"Is_Admin\";N;s:5:\"Email\";s:20:\"prana.chak@gmail.com\";s:4:\"Mob1\";s:10:\"9000000000\";s:7:\"Address\";s:13:\"Bhadreshwar, \";s:4:\"City\";s:7:\"Kolkata\";s:5:\"State\";s:2:\"WB\";s:7:\"ZipCode\";s:6:\"712124\";s:9:\"School_ID\";s:0:\"\";s:12:\"User_Type_ID\";s:1:\"1\";s:8:\"Added_On\";s:19:\"2016-10-17 06:30:50\";s:10:\"Updated_On\";s:19:\"2016-10-27 07:45:44\";s:9:\"is_active\";s:1:\"1\";s:10:\"is_deleted\";s:1:\"0\";s:9:\"Type_Name\";s:5:\"Admin\";}user_id|s:2:\"13\";school|a:16:{s:2:\"ID\";s:7:\"SC00001\";s:9:\"School_ID\";s:1:\"1\";s:11:\"School_Name\";s:13:\"School Name 1\";s:11:\"Description\";s:1000:\"Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r\";s:8:\"Address1\";s:25:\"02, Sector - II, PNB Stop\";s:8:\"Address2\";s:7:\"Kolkata\";s:7:\"Contact\";s:10:\"0332602020\";s:5:\"State\";s:2:\"WB\";s:3:\"Pin\";s:6:\"700001\";s:14:\"No_Of_Students\";s:4:\"1500\";s:14:\"No_Of_Machines\";s:1:\"5\";s:12:\"Event_Active\";s:1:\"0\";s:8:\"Added_On\";s:19:\"0000-00-00 00:00:00\";s:10:\"Updated_On\";s:19:\"2016-10-24 09:44:02\";s:10:\"Updated_By\";s:1:\"0\";s:10:\"Is_Deleted\";s:1:\"0\";}school_id|s:7:\"SC00001\";logged_in|b:1;report|a:31:{i:0;a:9:{s:4:\"Name\";s:11:\"Rusha ( 2 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:1;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"21/10/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:2;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"28/10/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:3;a:9:{s:4:\"Name\";s:11:\"Rusha ( 2 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:4;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"06/11/2016\";s:8:\"Guardian\";s:5:\"Rahul\";s:5:\"Phone\";s:12:\"917890217074\";s:7:\"Address\";s:9:\"Add1 Add2\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:5;a:9:{s:4:\"Name\";s:18:\"Sujit Ghosh ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:6;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"12/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:7;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"18/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:8;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"19/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:9;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"23/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:10;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"27/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:11;a:9:{s:4:\"Name\";s:18:\"Sujit Ghosh ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:12;a:9:{s:4:\"Name\";s:16:\"Rana Saha ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:13;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"11/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:14;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"13/10/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:15;a:9:{s:4:\"Name\";s:16:\"Rana Saha ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:16;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"04/11/2016\";s:8:\"Guardian\";s:8:\"Guardian\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:19:\"Bhowanipore Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:17;a:9:{s:4:\"Name\";s:14:\"Arghya  ( 11 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:18;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"14/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:19;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"15/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:20;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"20/10/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:21;a:9:{s:4:\"Name\";s:14:\"Arghya  ( 11 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:22;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"10/11/2016\";s:8:\"Guardian\";s:9:\"Kashinath\";s:5:\"Phone\";s:10:\"9051733137\";s:7:\"Address\";s:28:\"17/A Durga Bari Road Kolkata\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:23;a:9:{s:4:\"Name\";s:12:\"Adfdf ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:24;a:9:{s:4:\"Name\";s:12:\"Adfdf ( 12 )\";s:5:\"Class\";s:13:\"Class 2 ( A )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:25;a:9:{s:4:\"Name\";s:12:\"Atanu ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( B )\";s:4:\"Date\";s:12:\"October 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:26;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"10/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:27;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"16/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:28;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"22/10/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}i:29;a:9:{s:4:\"Name\";s:12:\"Atanu ( 13 )\";s:5:\"Class\";s:13:\"Class 2 ( B )\";s:4:\"Date\";s:13:\"November 2016\";s:8:\"Guardian\";s:0:\"\";s:5:\"Phone\";s:0:\"\";s:7:\"Address\";s:0:\"\";s:2:\"IN\";s:0:\"\";s:3:\"OUT\";s:0:\"\";s:4:\"Type\";s:6:\"header\";}i:30;a:9:{s:4:\"Name\";N;s:5:\"Class\";N;s:4:\"Date\";s:10:\"01/11/2016\";s:8:\"Guardian\";s:5:\"Netai\";s:5:\"Phone\";s:10:\"9000000000\";s:7:\"Address\";s:31:\"17/A Durga Bari Road Cantonment\";s:2:\"IN\";s:8:\"10:00 AM\";s:3:\"OUT\";s:7:\"4:00 PM\";s:4:\"Type\";s:4:\"data\";}}report_parameters|a:5:{s:4:\"type\";s:7:\"student\";s:10:\"start_date\";s:10:\"10/10/2016\";s:8:\"end_date\";s:10:\"10/11/2016\";s:9:\"school_id\";s:7:\"SC00001\";s:15:\"student_id_list\";s:12:\"2,4,5,6,7,14\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Section` varchar(20) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\\n1 = Yes',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'Class 1','A',NULL,NULL,NULL,0),(2,'Class 1','B',NULL,NULL,NULL,0),(3,'Class 2','A',NULL,NULL,NULL,0),(4,'Class 2','B',NULL,NULL,NULL,0),(5,'Class 3','A',NULL,NULL,NULL,0),(6,'Class 3','B',NULL,NULL,NULL,0),(7,'Class 4','A',NULL,NULL,NULL,0),(8,'Class 4','B',NULL,NULL,NULL,0),(9,'Class 5','A',NULL,NULL,NULL,0),(10,'Class 5','B',NULL,NULL,NULL,0),(11,'Class 1','C',NULL,'2016-11-03 05:45:06',NULL,0);
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(60) NOT NULL,
  `Description` varchar(600) DEFAULT NULL,
  `Message` varchar(160) DEFAULT NULL,
  `File_Name` varchar(255) NOT NULL,
  `Date` date DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\n1 = Yes',
  `Event_Type_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_Event_School1_idx` (`School_ID`),
  KEY `fk_Event_Event_Type1_idx` (`Event_Type_ID`),
  CONSTRAINT `fk_Event_Event_Type1` FOREIGN KEY (`Event_Type_ID`) REFERENCES `event_type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Event_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'Tdts','teest',NULL,'','2016-11-28','SC00001',NULL,'2016-11-06 19:15:50',NULL,0,1);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_type`
--

DROP TABLE IF EXISTS `event_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` varchar(60) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_type`
--

LOCK TABLES `event_type` WRITE;
/*!40000 ALTER TABLE `event_type` DISABLE KEYS */;
INSERT INTO `event_type` VALUES (1,'Annual Sports'),(2,'Guardian Call');
/*!40000 ALTER TABLE `event_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'SELECT C.`Roll_No`, C.`RFID_NO`, C.`Candidate_Name`, CONCAT(CL.`Name`, \' - \', CL.`Section`) ClassSection, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, \' \', C.`Address2`) Address, A.IN_Time FROMSC00001_Candidate C JOIN Class CL ON C.Class_ID = CL.ID JOIN SC00001_Attendance A ON C.Candidate_ID = A.Candidate_ID WHERE Date_Attendance = \'2016-10-01\' AND OUT_Time IS NULL'),(2,'SELECT C.`Roll_No`, C.`RFID_NO`, C.`Candidate_Name`, CONCAT(CL.`Name`, \' - \', CL.`Section`) ClassSection, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, \' \', C.`Address2`) Address, A.IN_Time FROM SC00001_Candidate C JOIN Class CL ON C.Class_ID = CL.ID JOIN SC00001_Attendance A ON C.Candidate_ID = A.Candidate_ID WHERE Date_Attendance = \'0000-00-00\' AND OUT_Time IS NULL'),(3,'SELECT C.`Roll_No`, C.`RFID_NO`, C.`Candidate_Name`, CONCAT(CL.`Name`, \' - \', CL.`Section`) ClassSection, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, \' \', C.`Address2`) Address, A.IN_Time FROM SC00001_Candidate C JOIN Class CL ON C.Class_ID = CL.ID JOIN SC00001_Attendance A ON C.Candidate_ID = A.Candidate_ID WHERE Date_Attendance = \'0000-00-00\' AND OUT_Time IS NULL'),(4,'SELECT C.`Roll_No`, C.`RFID_NO`, C.`Candidate_Name`, CONCAT(CL.`Name`, \' - \', CL.`Section`) ClassSection, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, \' \', C.`Address2`) Address, A.IN_Time FROM SC00001_Candidate C JOIN Class CL ON C.Class_ID = CL.ID JOIN SC00001_Attendance A ON C.Candidate_ID = A.Candidate_ID WHERE Date_Attendance = \'0000-00-00\' AND OUT_Time IS NULL'),(5,'SELECT C.`Roll_No`, C.`RFID_NO`, C.`Candidate_Name`, CONCAT(CL.`Name`, \' - \', CL.`Section`) ClassSection, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, \' \', C.`Address2`) Address, A.IN_Time FROM SC00001_Candidate C JOIN Class CL ON C.Class_ID = CL.ID JOIN SC00001_Attendance A ON C.Candidate_ID = A.Candidate_ID WHERE Date_Attendance = \'0000-00-00\' AND OUT_Time IS NULL');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_sp_execution_test`
--

DROP TABLE IF EXISTS `log_sp_execution_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_sp_execution_test` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `execution_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sp_message` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_sp_execution_test`
--

LOCK TABLES `log_sp_execution_test` WRITE;
/*!40000 ALTER TABLE `log_sp_execution_test` DISABLE KEYS */;
INSERT INTO `log_sp_execution_test` VALUES (48,'2016-08-30 16:58:30','1|919051733137|Your daughter Rusha has entered into the school at 22:28:30.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),(49,'2016-08-31 04:16:14','1|919051733137|Your daughter Rusha has entered into the school at 09:46:14.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),(50,'2016-08-31 04:24:21','1|919051733137|Your daughter Rusha has entered into the school at 09:54:21.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),(51,'2016-08-31 04:56:41','1|917890217074|Your daughter Rusha has entered into the school at 10:26:41.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),(52,'2016-08-31 05:22:13','1|917890217074|Your daughter Rusha has entered into the school at 10:52:13.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),(53,'2016-08-31 05:57:45','1|917890217074|Your daughter Rusha has entered into the school at 11:27:45.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),(54,'2016-08-31 06:00:34','1|919051733137|Your daughter Prahan has entered into the school at 11:30:34.|dfe9d88e60ed4314b3c138189368f79d2bef9671|107.200.10.02'),(55,'2016-08-31 06:02:56','0'),(56,'2016-08-31 06:04:09','0'),(57,'2016-08-31 06:31:08','0');
/*!40000 ALTER TABLE `log_sp_execution_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(60) DEFAULT NULL,
  `User_ID` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Is_Admin` tinyint(4) DEFAULT '0',
  `Email` varchar(60) DEFAULT NULL,
  `Mob1` varchar(13) DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `State` varchar(45) DEFAULT NULL,
  `ZipCode` bigint(20) DEFAULT NULL,
  `School_ID` varchar(7) DEFAULT NULL COMMENT 'School_ID field will be blank or ''0'', if the user type is not school.',
  `User_Type_ID` int(11) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_Login_User_Type1_idx` (`User_Type_ID`),
  CONSTRAINT `fk_Login_User_Type1` FOREIGN KEY (`User_Type_ID`) REFERENCES `user_type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Atanu Dey','atanu','$2y$10$sE.XN9iSXSOwDLSY5Ckngu4LsWHAhCK6pngH5L6vYIwb5NOGxNYMK',NULL,'atanu-test@gmail.com','9000000000','Dum Dum, Kolkata','Kolkata','West Bengal',700028,'SC00001',2,'2016-09-05 03:02:11','2016-10-16 17:51:32',1,0),(2,'Atanu Dey','atanudey','$2y$10$44Ay5FDr2m/nSseRpIXItu3tIGAQ6J9yQivXqOUkLSQWHODv9npom',NULL,'test-atanu@gmail.com','9000000000','Dum Dum, Kolkata','Kolkata','West Bengal',700028,'SC00001',2,'2016-09-05 03:10:48','2016-10-16 17:51:47',1,0),(5,'Atanu Dey','atanud','$2y$10$YpHeGyBEsFKCZrrMirTFr.b5ntDM2uPU29MC.18bHYELjiz3HTSLa',NULL,'test@gmail.com','9000000000','Dum Dum, Kolkata','Kolkata','West Bengal',700028,'SC00001',4,'2016-09-05 03:31:02','2016-10-16 17:52:00',1,0),(7,'G','Guardian1','$2y$10$xnE7Y2KpqLTJuxRVncidS.yAPh9hLQeItkUcpc0P.lzRHiDJGhQUy',NULL,'p.p@gmail.in','9000000001','','Kolkata','West Bengal',700001,'SC00001',3,'2016-09-06 13:10:39','2016-09-06 06:41:13',1,0),(8,'Company Staff','Staffuser1','$2y$10$5r0lzcuF.TRI.QgifvOtqe3NoRZneY2hlY3XrHfG3JsGVY8uQ7Vhe',NULL,'prana_chak@hotmail.com','9000000001','','Kolkata','West Bengal',700001,'',4,'2016-09-06 13:58:13','2016-10-27 02:15:31',1,0),(9,'Atanu Dey','atanudey1','$2y$10$dyNXDoXcUBf.rhtCNS3d/.n4jrii3PYuLZSlXNPYMly5e6bBOPz8C',NULL,'atanu@test.com','9007559769','17/A Durga Bari Road','Kolkata','West Bengal',700028,'SC00001',2,'2016-10-07 00:32:26','2016-10-16 17:51:07',0,0),(10,'Demo School','school','$2y$10$EdeIfXxwCduFatyCEeXGZuAksHH.K4HVnejmNjNCCLSlU1ifCj25i',NULL,'mratanudey@gmail.com','9000000000','17/A Durga Bari Road','Kolkata','WB',700028,'SC00001',2,'2016-10-17 00:52:16','2016-10-16 17:53:36',1,0),(11,'Demo Guardian','guardian','$2y$10$QNou8A4AmoCjrKONoHPZ6ucoHd7EIVjqkp2GitQU/ryXh4tnqLOAa',NULL,'debajyoti009@gmail.com','9000000000','Baranagar','Kolkata','WB',700036,'SC00001',3,'2016-10-17 00:56:07','2016-10-16 18:01:23',1,0),(12,'Demo Staff','staff','$2y$10$h2IHnE3Got.DzEfgIzQHFe4A23uQQ39GJkaw37a3Rz2r.vxUN03d2',NULL,'mratanudey83@gmail.com','9000000000','17/A Durga Bari Road','Kolkata','WB',700028,'',4,'2016-10-17 00:58:01','2016-10-27 02:15:40',1,0),(13,'Demo Admin','admin','$2y$10$cvnT88TFnkxS4AVO2t.MzetNg1miq4pb2ufsciJ.WUHi3YYiM0Nmm',NULL,'prana.chak@gmail.com','9000000000','Bhadreshwar, ','Kolkata','WB',712124,'',1,'2016-10-17 01:00:50','2016-10-27 02:15:44',1,0);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sc00001_attendance`
--

DROP TABLE IF EXISTS `sc00001_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sc00001_attendance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Attendance` date NOT NULL,
  `IN_Time` time DEFAULT NULL,
  `OUT_Time` time DEFAULT NULL,
  `Candidate_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_SC00001_Attendance_SC00001_Candidate1_idx` (`Candidate_ID`),
  CONSTRAINT `fk_SC00001_Attendance_SC00001_Candidate1` FOREIGN KEY (`Candidate_ID`) REFERENCES `sc00001_candidate` (`Candidate_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=552 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sc00001_attendance`
--

LOCK TABLES `sc00001_attendance` WRITE;
/*!40000 ALTER TABLE `sc00001_attendance` DISABLE KEYS */;
INSERT INTO `sc00001_attendance` VALUES (1,'2016-10-01','10:30:00',NULL,1),(2,'2016-10-02','10:30:00','02:30:00',1),(3,'2016-10-03','10:30:00','02:30:00',1),(4,'2016-10-01','10:40:00',NULL,2),(5,'2016-10-02','10:40:00','03:30:00',2),(6,'2016-10-03','10:40:00','03:30:00',2),(7,'2016-10-01','10:45:00',NULL,3),(8,'2016-10-02','10:45:00','04:00:00',3),(9,'2016-10-03','10:45:00','04:00:00',3),(10,'2016-03-29','10:00:00','16:00:00',7),(11,'2016-12-26','10:00:00','16:00:00',1),(12,'2016-04-22','10:00:00','16:00:00',6),(206,'2016-03-29','10:00:00','16:00:00',7),(207,'2016-12-26','10:00:00','16:00:00',1),(208,'2016-04-22','10:00:00','16:00:00',6),(209,'2016-02-07','10:00:00','16:00:00',5),(210,'2016-06-05','10:00:00','16:00:00',1),(211,'2016-09-28','10:00:00','16:00:00',5),(212,'2016-05-04','10:00:00','16:00:00',5),(213,'2016-10-15','10:00:00','16:00:00',6),(214,'2016-06-06','10:00:00','16:00:00',1),(215,'2016-01-29','10:00:00','16:00:00',6),(216,'2016-05-20','10:00:00','16:00:00',1),(217,'2016-06-02','10:00:00','16:00:00',1),(218,'2016-04-02','10:00:00','16:00:00',3),(219,'2016-02-18','10:00:00','16:00:00',2),(220,'2016-02-05','10:00:00','16:00:00',3),(221,'2016-03-13','10:00:00','16:00:00',7),(222,'2016-09-11','10:00:00','16:00:00',7),(223,'2016-12-30','10:00:00','16:00:00',7),(224,'2016-01-27','10:00:00','16:00:00',2),(225,'2016-06-12','10:00:00','16:00:00',2),(226,'2016-10-03','10:00:00','16:00:00',2),(227,'2016-08-24','10:00:00','16:00:00',3),(228,'2016-02-19','10:00:00','16:00:00',5),(229,'2016-05-14','10:00:00','16:00:00',7),(230,'2016-04-23','10:00:00','16:00:00',7),(231,'2016-01-06','10:00:00','16:00:00',4),(232,'2016-08-19','10:00:00','16:00:00',3),(233,'2016-06-14','10:00:00','16:00:00',1),(234,'2016-07-11','10:00:00','16:00:00',6),(235,'2016-09-16','10:00:00','16:00:00',5),(236,'2016-11-29','10:00:00','16:00:00',3),(237,'2016-08-01','10:00:00','16:00:00',4),(238,'2016-10-02','10:00:00','16:00:00',3),(239,'2016-02-25','10:00:00','16:00:00',5),(240,'2016-07-07','10:00:00','16:00:00',6),(241,'2016-05-24','10:00:00','16:00:00',5),(242,'2016-11-27','10:00:00','16:00:00',6),(243,'2016-04-27','10:00:00','16:00:00',2),(244,'2016-04-06','10:00:00','16:00:00',5),(245,'2016-08-04','10:00:00','16:00:00',5),(246,'2016-10-08','10:00:00','16:00:00',6),(247,'2016-09-27','10:00:00','16:00:00',1),(248,'2016-02-21','10:00:00','16:00:00',2),(249,'2016-10-12','10:00:00','16:00:00',4),(250,'2016-10-01','10:00:00',NULL,2),(251,'2016-09-02','10:00:00','16:00:00',5),(252,'2016-05-16','10:00:00','16:00:00',1),(253,'2016-06-20','10:00:00','16:00:00',5),(254,'2016-08-27','10:00:00','16:00:00',5),(255,'2016-09-05','10:00:00','16:00:00',2),(256,'2016-06-11','10:00:00','16:00:00',6),(257,'2016-07-24','10:00:00','16:00:00',5),(258,'2016-07-14','10:00:00','16:00:00',4),(259,'2016-10-24','10:00:00','16:00:00',1),(260,'2016-07-27','10:00:00','16:00:00',2),(261,'2016-12-08','10:00:00','16:00:00',2),(262,'2016-03-03','10:00:00','16:00:00',7),(263,'2016-07-29','10:00:00','16:00:00',5),(264,'2016-02-06','10:00:00','16:00:00',3),(265,'2016-08-02','10:00:00','16:00:00',3),(266,'2016-08-11','10:00:00','16:00:00',3),(267,'2016-11-22','10:00:00','16:00:00',3),(268,'2016-01-28','10:00:00','16:00:00',3),(269,'2016-12-21','10:00:00','16:00:00',4),(270,'2016-01-05','10:00:00','16:00:00',2),(271,'2016-01-01','10:00:00','16:00:00',4),(272,'2016-03-23','10:00:00','16:00:00',3),(273,'2016-01-14','10:00:00','16:00:00',3),(274,'2016-06-23','10:00:00','16:00:00',3),(275,'2016-07-22','10:00:00','16:00:00',5),(276,'2016-11-26','10:00:00','16:00:00',2),(277,'2016-03-01','10:00:00','16:00:00',4),(278,'2016-09-13','10:00:00','16:00:00',1),(279,'2016-09-19','10:00:00','16:00:00',4),(280,'2016-01-13','10:00:00','16:00:00',7),(281,'2016-02-22','10:00:00','16:00:00',7),(282,'2016-04-07','10:00:00','16:00:00',3),(283,'2016-07-23','10:00:00','16:00:00',4),(284,'2016-11-03','10:00:00','16:00:00',1),(285,'2016-08-21','10:00:00','16:00:00',4),(286,'2016-04-26','10:00:00','16:00:00',4),(287,'2016-05-18','10:00:00','16:00:00',6),(288,'2016-02-08','10:00:00','16:00:00',6),(289,'2016-02-26','10:00:00','16:00:00',1),(290,'2016-03-24','10:00:00','16:00:00',2),(291,'2016-01-11','10:00:00','16:00:00',6),(292,'2016-12-19','10:00:00','16:00:00',3),(293,'2016-01-16','10:00:00','16:00:00',5),(294,'2016-09-14','10:00:00','16:00:00',2),(295,'2016-08-12','10:00:00','16:00:00',4),(296,'2016-05-29','10:00:00','16:00:00',4),(297,'2016-05-10','10:00:00','16:00:00',2),(298,'2016-08-09','10:00:00','16:00:00',4),(299,'2016-12-03','10:00:00','16:00:00',2),(300,'2016-02-24','10:00:00','16:00:00',7),(301,'2016-02-20','10:00:00','16:00:00',3),(302,'2016-03-26','10:00:00','16:00:00',2),(303,'2016-02-16','10:00:00','16:00:00',2),(304,'2016-12-09','10:00:00','16:00:00',2),(305,'2016-04-01','10:00:00','16:00:00',4),(306,'2016-10-05','10:00:00','16:00:00',6),(307,'2016-11-24','10:00:00','16:00:00',6),(308,'2016-09-15','10:00:00','16:00:00',6),(309,'2016-02-17','10:00:00','16:00:00',2),(310,'2016-11-01','10:00:00','16:00:00',7),(311,'2016-01-03','10:00:00','16:00:00',1),(312,'2016-09-29','10:00:00','16:00:00',1),(313,'2016-07-20','10:00:00','16:00:00',1),(314,'2016-04-09','10:00:00','16:00:00',4),(315,'2016-12-06','10:00:00','16:00:00',5),(316,'2016-11-23','10:00:00','16:00:00',1),(317,'2016-08-22','10:00:00','16:00:00',1),(318,'2016-06-26','10:00:00','16:00:00',3),(319,'2016-10-21','10:00:00','16:00:00',2),(320,'2016-11-18','10:00:00','16:00:00',2),(321,'2016-03-20','10:00:00','16:00:00',1),(322,'2016-03-07','10:00:00','16:00:00',2),(323,'2016-10-13','10:00:00','16:00:00',5),(324,'2016-05-26','10:00:00','16:00:00',1),(325,'2016-11-11','10:00:00','16:00:00',6),(326,'2016-05-27','10:00:00','16:00:00',7),(327,'2016-07-16','10:00:00','16:00:00',4),(328,'2016-06-24','10:00:00','16:00:00',1),(329,'2016-01-18','10:00:00','16:00:00',6),(330,'2016-02-14','10:00:00','16:00:00',2),(331,'2016-12-16','10:00:00','16:00:00',7),(332,'2016-10-19','10:00:00','16:00:00',4),(333,'2016-06-10','10:00:00','16:00:00',2),(334,'2016-07-10','10:00:00','16:00:00',2),(335,'2016-11-05','10:00:00','16:00:00',3),(336,'2016-09-10','10:00:00','16:00:00',1),(337,'2016-10-20','10:00:00','16:00:00',6),(338,'2016-04-13','10:00:00','16:00:00',7),(339,'2016-08-17','10:00:00','16:00:00',5),(340,'2016-04-11','10:00:00','16:00:00',4),(341,'2016-12-11','10:00:00','16:00:00',2),(342,'2016-08-30','10:00:00','16:00:00',3),(343,'2016-04-12','10:00:00','16:00:00',4),(344,'2016-06-15','10:00:00','16:00:00',5),(345,'2016-02-02','10:00:00','16:00:00',7),(346,'2016-07-04','10:00:00','16:00:00',3),(347,'2016-07-12','10:00:00','16:00:00',6),(348,'2016-03-30','10:00:00','16:00:00',2),(349,'2016-10-18','10:00:00','16:00:00',4),(350,'2016-05-12','10:00:00','16:00:00',5),(351,'2016-01-23','10:00:00','16:00:00',4),(352,'2016-08-26','10:00:00','16:00:00',4),(353,'2016-07-01','10:00:00','16:00:00',1),(354,'2016-04-25','10:00:00','16:00:00',1),(355,'2016-07-09','10:00:00','16:00:00',6),(356,'2016-04-17','10:00:00','16:00:00',4),(357,'2016-12-13','10:00:00','16:00:00',5),(358,'2016-05-30','10:00:00','16:00:00',7),(359,'2016-09-30','10:00:00','16:00:00',5),(360,'2016-05-09','10:00:00','16:00:00',1),(361,'2016-11-17','10:00:00','16:00:00',5),(362,'2016-01-04','10:00:00','16:00:00',5),(363,'2016-12-05','10:00:00','16:00:00',4),(364,'2016-11-20','10:00:00','16:00:00',6),(365,'2016-04-28','10:00:00','16:00:00',6),(366,'2016-02-13','10:00:00','16:00:00',1),(367,'2016-12-20','10:00:00','16:00:00',7),(368,'2016-09-18','10:00:00','16:00:00',2),(369,'2016-03-10','10:00:00','16:00:00',3),(370,'2016-02-03','10:00:00','16:00:00',6),(371,'2016-03-22','10:00:00','16:00:00',6),(372,'2016-10-16','10:00:00','16:00:00',7),(373,'2016-10-14','10:00:00','16:00:00',6),(374,'2016-10-28','10:00:00','16:00:00',2),(375,'2016-01-17','10:00:00','16:00:00',6),(376,'2016-06-07','10:00:00','16:00:00',3),(377,'2016-11-28','10:00:00','16:00:00',2),(378,'2016-12-01','10:00:00','16:00:00',5),(379,'2016-06-03','10:00:00','16:00:00',4),(380,'2016-12-28','10:00:00','16:00:00',6),(381,'2016-04-19','10:00:00','16:00:00',7),(382,'2016-07-08','10:00:00','16:00:00',4),(383,'2016-06-08','10:00:00','16:00:00',3),(384,'2016-12-14','10:00:00','16:00:00',2),(385,'2016-06-19','10:00:00','16:00:00',1),(386,'2016-11-30','10:00:00','16:00:00',3),(387,'2016-01-21','10:00:00','16:00:00',7),(388,'2016-09-03','10:00:00','16:00:00',4),(389,'2016-06-22','10:00:00','16:00:00',6),(390,'2016-09-09','10:00:00','16:00:00',6),(391,'2016-02-28','10:00:00','16:00:00',5),(392,'2016-05-08','10:00:00','16:00:00',1),(393,'2016-09-04','10:00:00','16:00:00',1),(394,'2016-11-07','10:00:00','16:00:00',3),(395,'2016-03-11','10:00:00','16:00:00',3),(396,'2016-03-12','10:00:00','16:00:00',5),(397,'2016-08-23','10:00:00','16:00:00',6),(398,'2016-12-17','10:00:00','16:00:00',7),(399,'2016-01-15','10:00:00','16:00:00',3),(400,'2016-07-06','10:00:00','16:00:00',1),(401,'2016-04-16','10:00:00','16:00:00',5),(402,'2016-03-06','10:00:00','16:00:00',2),(403,'2016-12-22','10:00:00','16:00:00',5),(404,'2016-11-15','10:00:00','16:00:00',3),(405,'2016-03-21','10:00:00','16:00:00',5),(406,'2016-06-29','10:00:00','16:00:00',5),(407,'2016-04-30','10:00:00','16:00:00',7),(408,'2016-10-09','10:00:00','16:00:00',7),(409,'2016-08-03','10:00:00','16:00:00',1),(410,'2016-08-10','10:00:00','16:00:00',6),(411,'2016-12-23','10:00:00','16:00:00',4),(412,'2016-09-22','10:00:00','16:00:00',2),(413,'2016-01-10','10:00:00','16:00:00',1),(414,'2016-09-06','10:00:00','16:00:00',6),(415,'2016-04-21','10:00:00','16:00:00',5),(416,'2016-09-25','10:00:00','16:00:00',5),(417,'2016-09-17','10:00:00','16:00:00',2),(418,'2016-01-20','10:00:00','16:00:00',7),(419,'2016-05-28','10:00:00','16:00:00',3),(420,'2016-12-29','10:00:00','16:00:00',5),(421,'2016-01-08','10:00:00','16:00:00',4),(422,'2016-04-18','10:00:00','16:00:00',7),(423,'2016-06-18','10:00:00','16:00:00',5),(424,'2016-01-30','10:00:00','16:00:00',3),(425,'2016-05-01','10:00:00','16:00:00',6),(426,'2016-04-29','10:00:00','16:00:00',2),(427,'2016-09-01','10:00:00','16:00:00',7),(428,'2016-12-07','10:00:00','16:00:00',4),(429,'2016-08-25','10:00:00','16:00:00',2),(430,'2016-01-09','10:00:00','16:00:00',3),(431,'2016-06-09','10:00:00','16:00:00',5),(432,'2016-03-05','10:00:00','16:00:00',1),(433,'2016-07-28','10:00:00','16:00:00',2),(434,'2016-03-27','10:00:00','16:00:00',6),(435,'2016-04-05','10:00:00','16:00:00',5),(436,'2016-11-12','10:00:00','16:00:00',5),(437,'2016-12-25','10:00:00','16:00:00',2),(438,'2016-07-18','10:00:00','16:00:00',4),(439,'2016-06-17','10:00:00','16:00:00',7),(440,'2016-08-16','10:00:00','16:00:00',7),(441,'2016-06-30','10:00:00','16:00:00',2),(442,'2016-06-13','10:00:00','16:00:00',7),(443,'2016-09-20','10:00:00','16:00:00',3),(444,'2016-09-21','10:00:00','16:00:00',1),(445,'2016-01-02','10:00:00','16:00:00',7),(446,'2016-06-16','10:00:00','16:00:00',5),(447,'2016-04-20','10:00:00','16:00:00',7),(448,'2016-07-03','10:00:00','16:00:00',2),(449,'2016-04-24','10:00:00','16:00:00',6),(450,'2016-05-23','10:00:00','16:00:00',3),(451,'2016-08-18','10:00:00','16:00:00',2),(452,'2016-05-17','10:00:00','16:00:00',3),(453,'2016-06-27','10:00:00','16:00:00',6),(454,'2016-11-08','10:00:00','16:00:00',1),(455,'2016-03-15','10:00:00','16:00:00',5),(456,'2016-07-21','10:00:00','16:00:00',6),(457,'2016-07-30','10:00:00','16:00:00',1),(458,'2016-05-13','10:00:00','16:00:00',5),(459,'2016-03-02','10:00:00','16:00:00',6),(460,'2016-07-15','10:00:00','16:00:00',1),(461,'2016-10-23','10:00:00','16:00:00',4),(462,'2016-10-17','10:00:00','16:00:00',1),(463,'2016-11-10','10:00:00','16:00:00',6),(464,'2016-12-10','10:00:00','16:00:00',1),(465,'2016-03-18','10:00:00','16:00:00',2),(466,'2016-11-25','10:00:00','16:00:00',1),(467,'2016-07-05','10:00:00','16:00:00',5),(468,'2016-05-15','10:00:00','16:00:00',3),(469,'2016-03-16','10:00:00','16:00:00',7),(470,'2016-12-02','10:00:00','16:00:00',4),(471,'2016-05-03','10:00:00','16:00:00',1),(472,'0000-00-00','10:00:00','16:00:00',6),(473,'2016-10-25','10:00:00','16:00:00',3),(474,'2016-01-12','10:00:00','16:00:00',6),(475,'2016-03-08','10:00:00','16:00:00',6),(476,'2016-01-26','10:00:00','16:00:00',5),(477,'2016-03-19','10:00:00','16:00:00',1),(478,'2016-11-06','10:00:00','16:00:00',2),(479,'2016-03-09','10:00:00','16:00:00',6),(480,'2016-05-25','10:00:00','16:00:00',5),(481,'2016-09-07','10:00:00','16:00:00',7),(482,'2016-05-19','10:00:00','16:00:00',3),(483,'2016-08-06','10:00:00','16:00:00',6),(484,'2016-06-04','10:00:00','16:00:00',3),(485,'2016-10-26','10:00:00','16:00:00',3),(486,'2016-02-27','10:00:00','16:00:00',2),(487,'2016-11-14','10:00:00','16:00:00',7),(488,'2016-12-12','10:00:00','16:00:00',3),(489,'2016-11-04','10:00:00','16:00:00',5),(490,'2016-05-22','10:00:00','16:00:00',7),(491,'2016-02-04','10:00:00','16:00:00',3),(492,'2016-11-13','10:00:00','16:00:00',7),(493,'2016-05-06','10:00:00','16:00:00',1),(494,'2016-09-26','10:00:00','16:00:00',3),(495,'2016-09-23','10:00:00','16:00:00',3),(496,'2016-03-17','10:00:00','16:00:00',1),(497,'2016-09-08','10:00:00','16:00:00',4),(498,'2016-01-19','10:00:00','16:00:00',4),(499,'2016-10-04','10:00:00','16:00:00',5),(500,'2016-04-15','10:00:00','16:00:00',5),(501,'2016-09-12','10:00:00','16:00:00',3),(502,'2016-02-11','10:00:00','16:00:00',2),(503,'2016-10-07','10:00:00','16:00:00',6),(504,'2016-02-01','10:00:00','16:00:00',6),(505,'2016-07-02','10:00:00','16:00:00',3),(506,'2016-02-29','10:00:00','16:00:00',2),(507,'2016-05-11','10:00:00','16:00:00',1),(508,'2016-02-15','10:00:00','16:00:00',7),(509,'2016-09-24','10:00:00','16:00:00',4),(510,'2016-05-02','10:00:00','16:00:00',2),(511,'2016-06-21','10:00:00','16:00:00',6),(512,'2016-10-11','10:00:00','16:00:00',5),(513,'2016-06-28','10:00:00','16:00:00',2),(514,'2016-02-09','10:00:00','16:00:00',3),(515,'2016-02-10','10:00:00','16:00:00',4),(516,'2016-04-08','10:00:00','16:00:00',5),(517,'2016-10-27','10:00:00','16:00:00',4),(518,'2016-08-20','10:00:00','16:00:00',7),(519,'2016-11-19','10:00:00','16:00:00',4),(520,'2016-08-08','10:00:00','16:00:00',4),(521,'2016-08-07','10:00:00','16:00:00',7),(522,'2016-01-25','10:00:00','16:00:00',5),(523,'2016-10-22','10:00:00','16:00:00',7),(524,'2016-05-07','10:00:00','16:00:00',2),(525,'2016-07-13','10:00:00','16:00:00',2),(526,'2016-08-13','10:00:00','16:00:00',3),(527,'2016-05-05','10:00:00','16:00:00',2),(528,'2016-10-29','10:00:00','16:00:00',1),(529,'2016-10-10','10:00:00','16:00:00',7),(530,'2016-08-14','10:00:00','16:00:00',5),(531,'2016-07-26','10:00:00','16:00:00',2),(532,'2016-06-25','10:00:00','16:00:00',5),(533,'2016-07-17','10:00:00','16:00:00',5),(534,'2016-06-01','10:00:00','16:00:00',2),(535,'2016-04-10','10:00:00','16:00:00',5),(536,'2016-02-23','10:00:00','16:00:00',5),(537,'2016-04-04','10:00:00','16:00:00',5),(538,'2016-10-30','10:00:00','16:00:00',3),(539,'2016-01-07','10:00:00','16:00:00',2),(540,'2016-12-27','10:00:00','16:00:00',1),(541,'2016-01-22','10:00:00','16:00:00',7),(542,'2016-03-28','10:00:00','16:00:00',2),(543,'2016-11-16','10:00:00','16:00:00',2),(544,'2016-12-04','10:00:00','16:00:00',3),(545,'2016-04-14','10:00:00','16:00:00',3),(546,'2016-10-06','10:00:00','16:00:00',5),(547,'2016-12-18','10:00:00','16:00:00',7),(548,'2016-02-12','10:00:00','16:00:00',6),(549,'2016-12-24','10:00:00','16:00:00',2),(550,'2016-03-14','10:00:00','16:00:00',6),(551,'2016-08-05','10:00:00','16:00:00',1);
/*!40000 ALTER TABLE `sc00001_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sc00001_candidate`
--

DROP TABLE IF EXISTS `sc00001_candidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sc00001_candidate` (
  `Candidate_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RFID_NO` varchar(20) NOT NULL,
  `Roll_No` int(11) NOT NULL,
  `Candidate_Name` varchar(45) NOT NULL,
  `Address1` varchar(60) DEFAULT NULL,
  `Address2` varchar(60) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `Pin` varchar(7) DEFAULT NULL,
  `Guardian_Name` varchar(45) NOT NULL,
  `Email_ID` varchar(60) DEFAULT NULL,
  `Mob1` varchar(15) NOT NULL,
  `Mob2` varchar(15) DEFAULT NULL,
  `Blood_Group` varchar(10) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Age` smallint(6) DEFAULT NULL,
  `Is_Admin` tinyint(4) DEFAULT '0',
  `IN_OUT` varchar(3) DEFAULT NULL COMMENT 'IN/OUT',
  `School_ID` varchar(7) NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Candidate_Type_ID` int(11) NOT NULL,
  `Is_Card_Ready` int(11) DEFAULT '0' COMMENT '0 = No; 1 = Processed; 2 = Complete',
  `Image_Name` varchar(20) DEFAULT NULL COMMENT 'Candidate Passport Image Name',
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\\n1 = Yes',
  PRIMARY KEY (`Candidate_ID`),
  KEY `fk_SC00001_Candidate_School1_idx` (`School_ID`),
  KEY `fk_SC00001_Candidate_Class1_idx` (`Class_ID`),
  KEY `fk_SC00001_Candidate_Candidate_Type1_idx` (`Candidate_Type_ID`),
  CONSTRAINT `fk_SC00001_Candidate_Candidate_Type1` FOREIGN KEY (`Candidate_Type_ID`) REFERENCES `candidate_type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SC00001_Candidate_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_SC00001_Candidate_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sc00001_candidate`
--

LOCK TABLES `sc00001_candidate` WRITE;
/*!40000 ALTER TABLE `sc00001_candidate` DISABLE KEYS */;
INSERT INTO `sc00001_candidate` VALUES (1,'8665123351',1,'Prahan','Add1','Add2','','700025','Partha','prana_chak@hotmail.com','9051733137','','O +ve','M',22,0,'OUT','SC00001',1,1,0,NULL,NULL,'2016-11-06 07:52:12',NULL,0),(2,'1425241197',2,'Rusha','Add1','Add2',NULL,NULL,'Rahul','r.majum@gmail.com','917890217074','','AB +ve','F',36,0,'OUT','SC00001',3,1,0,NULL,NULL,'2016-08-31 06:22:03',NULL,0),(3,'16213812237',10,'Titli','Add1','Add2',NULL,NULL,'Shiladitya','s.chatterjee@gmail.com','919051733137','','AB +ve','F',48,0,'OUT','SC00001',7,1,0,NULL,NULL,'2016-08-30 13:12:03',NULL,0),(4,'343425',13,'Sujit Ghosh','Bhowanipore','Kolkata','','700025','Guardian','sujit__mail_test@gmail.com','9000000000','','B+','M',33,NULL,'IN','SC00001',3,1,0,'','2016-10-03 08:12:34','2016-11-06 12:16:42',1,0),(5,'343423',12,'Rana Saha','Bhowanipore','Kolkata','West Bengal','700025','Guardian','rana__mail_test@gmail.com','9000000000','','B+','M',33,0,'IN','SC00001',3,1,0,'','2016-10-03 08:12:34','2016-11-06 12:17:23',1,0),(6,'bmbnmbnmbnmbnm',11,'Arghya ','17/A Durga Bari Road','Kolkata','','712124','Kashinath','mratanudey@gmail.com','9051733137','vcbxcvbxcvb','','M',0,0,'Out','SC00001',3,1,0,NULL,NULL,'2016-10-10 05:43:37',NULL,0),(7,'4545454545',13,'Atanu','17/A Durga Bari Road','Cantonment','','700028','Netai','mratanudey@gmail.com','9000000000','','','M',33,0,'','SC00001',4,1,0,'4545454545.jpg',NULL,'2016-11-06 12:16:00',NULL,0),(8,'3535354345',23,'Student Name','Some Place','','WB','700000','Guardian Testing','guard.test@abc.com','6666666666','','','M',59,0,'OUT','SC00001',7,1,0,'3535354345.jpg',NULL,'2016-11-06 11:34:27',NULL,0),(11,'5000000000',12,'Adfdf','fdgdg','dgdg','MP','700025','dfdgdgd','ata@fata.com','9051733137','','','M',19,0,'OUT','SC00001',6,1,0,'5000000000.jpg',NULL,'2016-11-06 11:29:36',NULL,0),(12,'4545454545',12,'Adfdf','fdgdg','','','700025','uyuyuy','ata@fata.com','9051733137','','','M',55,0,'OUT','SC00001',7,1,0,NULL,NULL,NULL,NULL,0),(13,'4545454545',12,'Adfdf','dfdf','','','434334','fsfdsfsfs','ata@fata.com','9051733137','','','M',20,0,'OUT','SC00001',8,1,0,'4545454545.jpg',NULL,'2016-11-09 23:32:55',NULL,0),(14,'4545454545',12,'Adfdf','fdgdg','','','700025','dfdgdgd','ata@fata.com','9051733137','','','M',20,0,'OUT','SC00001',3,1,0,'4545454545.jpg',NULL,'2016-11-09 23:32:04',NULL,0);
/*!40000 ALTER TABLE `sc00001_candidate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sc00002_attendance`
--

DROP TABLE IF EXISTS `sc00002_attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sc00002_attendance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Attendance` date NOT NULL,
  `IN_Time` time DEFAULT NULL,
  `OUT_Time` time DEFAULT NULL,
  `Candidate_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_SC00002_Attendance_SC00002_Candidate1` (`Candidate_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sc00002_attendance`
--

LOCK TABLES `sc00002_attendance` WRITE;
/*!40000 ALTER TABLE `sc00002_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `sc00002_attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sc00002_candidate`
--

DROP TABLE IF EXISTS `sc00002_candidate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sc00002_candidate` (
  `Candidate_ID` int(11) NOT NULL AUTO_INCREMENT,
  `RFID_NO` varchar(20) NOT NULL,
  `Roll_No` int(11) NOT NULL,
  `Candidate_Name` varchar(45) NOT NULL,
  `Address1` varchar(60) DEFAULT NULL,
  `Address2` varchar(60) DEFAULT NULL,
  `State` varchar(30) DEFAULT NULL,
  `Pin` varchar(7) DEFAULT NULL,
  `Guardian_Name` varchar(45) NOT NULL,
  `Email_ID` varchar(60) DEFAULT NULL,
  `Mob1` varchar(15) NOT NULL,
  `Mob2` varchar(15) DEFAULT NULL,
  `Blood_Group` varchar(10) DEFAULT NULL,
  `Gender` varchar(1) DEFAULT NULL,
  `Age` smallint(6) DEFAULT NULL,
  `Is_Admin` tinyint(4) DEFAULT '0',
  `IN_OUT` varchar(3) DEFAULT NULL COMMENT 'IN/OUT',
  `School_ID` varchar(7) NOT NULL,
  `Class_ID` int(11) NOT NULL,
  `Candidate_Type_ID` int(11) NOT NULL,
  `Image_Name` varchar(20) DEFAULT NULL COMMENT 'Candidate Passport Image Name',
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`Candidate_ID`),
  KEY `fk_SC00002_Candidate_School1_idx` (`School_ID`),
  KEY `fk_SC00002_Candidate_Class1_idx` (`Class_ID`),
  KEY `fk_SC00002_Candidate_Candidate_Type1_idx` (`Candidate_Type_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sc00002_candidate`
--

LOCK TABLES `sc00002_candidate` WRITE;
/*!40000 ALTER TABLE `sc00002_candidate` DISABLE KEYS */;
INSERT INTO `sc00002_candidate` VALUES (1,'4656411111',4355435,'Atanu Dey','17/A Durga Bari Road','','WB','700025','Netai','mratanudey@gmail.com','9007559769','9007559769','B+','M',33,1,'OUT','SC00002',3,1,'4656411111.jpg',NULL,'2016-11-06 12:22:41',NULL,0);
/*!40000 ALTER TABLE `sc00002_candidate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school` (
  `ID` varchar(7) NOT NULL COMMENT 'Like: ''SC00001''',
  `School_ID` int(10) NOT NULL,
  `School_Name` varchar(60) NOT NULL,
  `Description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `Address1` varchar(45) DEFAULT NULL,
  `Address2` varchar(45) DEFAULT NULL,
  `Contact` varchar(10) NOT NULL,
  `State` varchar(30) DEFAULT NULL,
  `Pin` varchar(7) DEFAULT NULL,
  `No_Of_Students` int(11) DEFAULT NULL,
  `No_Of_Machines` int(11) DEFAULT NULL,
  `Event_Active` tinyint(4) DEFAULT '0' COMMENT '1 or 0',
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\\n1 = Yes',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES ('SC00001',1,'School Name 1','Donec eu libero sapien. Cras in euismod urna, eu sodales arcu. Quisque porttitor neque diam, vitae elementum turpis mollis in. Praesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum non, vehicula nec nunc. Nullam in elit metus. Fusce ut imperdiet nisi, eget aliquet ante. Phasellus dui nibh, egestas eu volutpat sit amet, efficitur vel risus. Etiam id sem est.\r\nPraesent vitae sem sollicitudin, volutpat turpis quis, facilisis neque. In vestibulum luctus condimentum. Nulla odio ex, posuere in magna eget, dapibus ornare nulla. Aliquam erat volutpat. In a ullamcorper lorem. Proin vitae feugiat massa. Praesent eu ipsum sit amet urna sagittis luctus in non sem. Phasellus tortor risus, pulvinar sed bibendum.\r','02, Sector - II, PNB Stop','Kolkata','0332602020','WB','700001',1500,5,0,'0000-00-00 00:00:00','2016-10-24 04:14:02',0,0),('SC00002',2,'School Name 2','School Name 2','School Name 2','School Name 2','0332602121','WB','700025',0,0,1,'2016-10-17 11:10:28','2016-10-24 04:16:18',0,0);
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_days`
--

DROP TABLE IF EXISTS `school_days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_days` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Month` varchar(10) NOT NULL,
  `Month_Days` int(11) DEFAULT NULL,
  `Month_Off_Days` int(11) DEFAULT NULL,
  `Extra_Leave` int(11) DEFAULT NULL,
  `Remarks` varchar(100) DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_School_Days_School1_idx` (`School_ID`),
  CONSTRAINT `fk_School_Days_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_days`
--

LOCK TABLES `school_days` WRITE;
/*!40000 ALTER TABLE `school_days` DISABLE KEYS */;
INSERT INTO `school_days` VALUES (1,'1',30,6,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(2,'2',30,8,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(3,'3',30,11,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(4,'4',30,7,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(5,'5',30,6,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(6,'6',30,8,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(7,'7',30,7,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(8,'8',30,7,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(9,'9',30,12,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(10,'10',30,9,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(11,'11',30,9,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1),(12,'12',30,6,0,NULL,'SC00001','2016-08-28 16:22:46','2016-08-28 16:22:46',1);
/*!40000 ALTER TABLE `school_days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_machines`
--

DROP TABLE IF EXISTS `school_machines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_machines` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SIM_No` varchar(13) DEFAULT NULL,
  `Provider` varchar(25) DEFAULT NULL,
  `Is_Active` tinyint(4) DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`),
  KEY `fk_School_Machines_School1_idx` (`School_ID`),
  CONSTRAINT `fk_School_Machines_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_machines`
--

LOCK TABLES `school_machines` WRITE;
/*!40000 ALTER TABLE `school_machines` DISABLE KEYS */;
/*!40000 ALTER TABLE `school_machines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_notice`
--

DROP TABLE IF EXISTS `school_notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_notice` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(25) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Upload_File_Name` varchar(45) DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Notice_Date` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_School_Notice_School1_idx` (`School_ID`),
  CONSTRAINT `fk_School_Notice_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_notice`
--

LOCK TABLES `school_notice` WRITE;
/*!40000 ALTER TABLE `school_notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `school_notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_pointofcontact`
--

DROP TABLE IF EXISTS `school_pointofcontact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_pointofcontact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PointOfContact_Name` varchar(60) NOT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `Mob1` varchar(15) DEFAULT NULL,
  `Mob2` varchar(15) DEFAULT NULL,
  `Email_ID` varchar(60) DEFAULT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`),
  KEY `fk_School_PointOfContact_School1_idx` (`School_ID`),
  CONSTRAINT `fk_School_PointOfContact_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_pointofcontact`
--

LOCK TABLES `school_pointofcontact` WRITE;
/*!40000 ALTER TABLE `school_pointofcontact` DISABLE KEYS */;
/*!40000 ALTER TABLE `school_pointofcontact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school_timing`
--

DROP TABLE IF EXISTS `school_timing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school_timing` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IN_OUT` varchar(3) NOT NULL COMMENT 'IN/OUT',
  `Cut_Off_Time` time NOT NULL,
  `GressTime_To_InOut` varchar(8) DEFAULT NULL,
  `Class_ID` int(11) NOT NULL,
  `School_ID` varchar(7) NOT NULL,
  `Added_On` timestamp NULL DEFAULT NULL,
  `Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Updated_By` int(11) DEFAULT NULL,
  `Is_Deleted` int(11) DEFAULT '0' COMMENT '0 = No\n1 = Yes',
  PRIMARY KEY (`ID`),
  KEY `fk_School_Timing_Class1_idx` (`Class_ID`),
  KEY `fk_School_Timing_School1_idx` (`School_ID`),
  CONSTRAINT `fk_School_Timing_Class1` FOREIGN KEY (`Class_ID`) REFERENCES `class` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_School_Timing_School1` FOREIGN KEY (`School_ID`) REFERENCES `school` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school_timing`
--

LOCK TABLES `school_timing` WRITE;
/*!40000 ALTER TABLE `school_timing` DISABLE KEYS */;
INSERT INTO `school_timing` VALUES (1,'IN','11:40:00','01:00:00',3,'SC00001',NULL,NULL,NULL,0),(2,'OUT','03:30:00','01:00:00',3,'SC00001',NULL,NULL,NULL,0),(3,'IN','11:40:00','01:00:00',7,'SC00001',NULL,NULL,NULL,0),(4,'OUT','04:00:00','00:30:00',7,'SC00001',NULL,NULL,NULL,0),(5,'IN','11:40:00','01:00:00',1,'SC00001',NULL,NULL,NULL,0),(6,'OUT','03:30:00','01:00:00',1,'SC00001',NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `school_timing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `screen_master`
--

DROP TABLE IF EXISTS `screen_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `screen_master` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Screen_Name` varchar(40) NOT NULL,
  `Uri` varchar(50) NOT NULL,
  `Parent_ID` int(11) NOT NULL,
  `weight` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `screen_master`
--

LOCK TABLES `screen_master` WRITE;
/*!40000 ALTER TABLE `screen_master` DISABLE KEYS */;
INSERT INTO `screen_master` VALUES (1,'School Events','event',0,1),(2,'School Candidates','candidate',0,2),(3,'School Point of Contact','',0,3),(4,'Class Master','edu_class',0,4),(5,'School Master','school',0,5),(6,'Report','',0,6),(7,'Attendance Report','report',6,7),(8,'Missing Report','report/missing',6,8),(9,'User Privilege Master','',0,2),(10,'School Machine Master','',0,5),(11,'School Timing Master','',0,7),(12,'Attendance Adjustment','report/adjustment',6,12);
/*!40000 ALTER TABLE `screen_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_provider`
--

DROP TABLE IF EXISTS `sms_provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_provider` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Provider_Name` varchar(60) DEFAULT NULL,
  `SMS_Type` varchar(20) DEFAULT NULL COMMENT 'Transaction or Promotion',
  `SMS_Count` float DEFAULT NULL,
  `API_Key` varchar(60) DEFAULT NULL,
  `Route` varchar(45) DEFAULT NULL,
  `Recharge_Date` timestamp NULL DEFAULT NULL,
  `Is_Active` int(11) NOT NULL DEFAULT '0' COMMENT '0 or 1',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_provider`
--

LOCK TABLES `sms_provider` WRITE;
/*!40000 ALTER TABLE `sms_provider` DISABLE KEYS */;
INSERT INTO `sms_provider` VALUES (1,'Text Local','Transaction',10,'dfe9d88e60ed4314b3c138189368f79d2bef9671','107.200.10.02','2016-07-26 07:00:00',1);
/*!40000 ALTER TABLE `sms_provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test`
--

DROP TABLE IF EXISTS `test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field1` datetime NOT NULL,
  `field2` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test`
--

LOCK TABLES `test` WRITE;
/*!40000 ALTER TABLE `test` DISABLE KEYS */;
INSERT INTO `test` VALUES (1,'2016-08-27 10:09:06','2016-08-27 17:09:06'),(2,'2016-08-27 22:41:29','2016-08-27 17:11:29');
/*!40000 ALTER TABLE `test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_privilege`
--

DROP TABLE IF EXISTS `user_privilege`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_privilege` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Is_Active` tinyint(4) DEFAULT '0',
  `Remarks` varchar(45) DEFAULT NULL,
  `Screen_Master_ID` int(11) NOT NULL,
  `User_Type_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_User_Privilege_Screen_Master1_idx` (`Screen_Master_ID`),
  KEY `fk_User_Privilege_User_Type1_idx` (`User_Type_ID`),
  CONSTRAINT `fk_User_Privilege_Screen_Master1` FOREIGN KEY (`Screen_Master_ID`) REFERENCES `screen_master` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_Privilege_User_Type1` FOREIGN KEY (`User_Type_ID`) REFERENCES `user_type` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_privilege`
--

LOCK TABLES `user_privilege` WRITE;
/*!40000 ALTER TABLE `user_privilege` DISABLE KEYS */;
INSERT INTO `user_privilege` VALUES (1,1,NULL,2,1),(2,1,NULL,3,1),(3,1,NULL,4,1),(4,1,NULL,5,1),(5,1,NULL,6,1),(6,1,NULL,7,1),(7,1,NULL,8,1),(8,1,NULL,2,2),(9,1,NULL,3,2),(10,0,NULL,4,2),(11,0,NULL,5,2),(12,1,NULL,6,2),(13,1,NULL,7,2),(14,1,NULL,8,2),(15,1,NULL,2,3),(16,1,NULL,3,3),(17,1,NULL,4,3),(18,1,NULL,5,3),(19,1,NULL,6,3),(20,1,NULL,7,3),(21,1,NULL,8,3),(22,1,NULL,2,4),(23,1,NULL,3,4),(24,1,NULL,4,4),(25,0,NULL,5,4),(26,1,NULL,6,4),(27,1,NULL,7,4),(28,1,NULL,8,4),(29,1,NULL,1,1),(30,1,NULL,1,2),(31,1,NULL,1,3),(32,1,NULL,1,4),(45,1,NULL,9,1),(46,1,NULL,10,1),(47,1,NULL,11,1),(48,0,NULL,9,2),(49,0,NULL,10,2),(50,1,NULL,11,2),(51,1,NULL,9,3),(52,1,NULL,10,3),(53,1,NULL,11,3),(54,0,NULL,9,4),(55,1,NULL,10,4),(56,1,NULL,11,4),(57,1,NULL,12,1),(58,0,NULL,12,2),(59,0,NULL,12,3),(60,0,NULL,12,4);
/*!40000 ALTER TABLE `user_privilege` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type_Name` varchar(20) DEFAULT NULL COMMENT '1. School\n2. Gurdian\n3. Agent\n4. Admin\n5. Company',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Admin'),(2,'School'),(3,'Guardian'),(4,'Staff');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'educare_db'
--
/*!50003 DROP PROCEDURE IF EXISTS `CreateSchool` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreateSchool`(IN `parameters` VARCHAR(65535))
BEGIN
	DECLARE school VARCHAR(2000);
	DECLARE candidate VARCHAR(2000);
	DECLARE attendance VARCHAR(2000);
    DECLARE insert_param VARCHAR(65535);
    
    DECLARE new_sch_id INT;
    DECLARE new_id INT;
    
    SELECT CONCAT('SC', LPAD(MAX(`School_ID`) + 1, 5, '0')), (MAX(`School_ID`) + 1) FROM `School` INTO @new_id, @new_sch_id;
    
    SET @insert_param = QUOTE(parameters);
    SET @insert_param = REPLACE(@insert_param, ",", "','");
    
    SET @school = CONCAT("INSERT INTO `School` 
						(`ID`, `School_ID`, `School_Name`, `Description`, `Address1`, `Address2`, `State`, `Pin`, `No_Of_Students`, `No_Of_Machines`, `Event_Active`, `Added_On`, `Updated_On`, `Updated_By`, `Is_Deleted`) VALUES('", @new_id, "',", @new_sch_id, ",", @insert_param , ")");
    
    PREPARE stmt FROM @school;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
    
    SET @candidate = CONCAT('CREATE TABLE IF NOT EXISTS `', @new_id, '_Candidate` (
		`Candidate_ID` int(11) NOT NULL AUTO_INCREMENT,
		`RFID_NO` varchar(20) NOT NULL,
		`Roll_No` int(11) NOT NULL,
		`Candidate_Name` varchar(45) NOT NULL,
		`Address1` varchar(60) DEFAULT NULL,
		`Address2` varchar(60) DEFAULT NULL,
		`State` varchar(30) DEFAULT NULL,
		`Pin` varchar(7) DEFAULT NULL,
		`Guardian_Name` varchar(45) NOT NULL,
		`Email_ID` varchar(60) DEFAULT NULL,
		`Mob1` varchar(15) NOT NULL,
		`Mob2` varchar(15) DEFAULT NULL,
		`Blood_Group` varchar(10) DEFAULT NULL,
		`Gender` varchar(1) DEFAULT NULL,
		`Age` smallint(6) DEFAULT NULL,
		`Is_Admin` tinyint(4) DEFAULT \'0\',
		`IN_OUT` varchar(3) DEFAULT NULL COMMENT \'IN/OUT\',
		`School_ID` varchar(7) NOT NULL,
		`Class_ID` int(11) NOT NULL,
		`Candidate_Type_ID` int(11) NOT NULL,
		`Image_Name` varchar(20) DEFAULT NULL COMMENT \'Candidate Passport Image Name\',
		`Added_On` timestamp NULL DEFAULT NULL,
		`Updated_On` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
		`Updated_By` int(11) DEFAULT NULL,
		`Is_Deleted` int(11) DEFAULT \'0\' COMMENT \'0 = No\\n1 = Yes\',
		PRIMARY KEY (`Candidate_ID`),
		KEY `fk_', @new_id, '_Candidate_School1_idx` (`School_ID`),
		KEY `fk_', @new_id, '_Candidate_Class1_idx` (`Class_ID`),
		KEY `fk_', @new_id, '_Candidate_Candidate_Type1_idx` (`Candidate_Type_ID`)
	)');
    
    PREPARE stmt FROM @candidate;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
    
    SET @attendance = CONCAT('CREATE TABLE IF NOT EXISTS `', @new_id, '_Attendance` (
		`ID` INT(11) NOT NULL AUTO_INCREMENT,
		`Date_Attendance` DATE NOT NULL,
		`IN_Time` TIME,
		`OUT_Time` TIME,
		`Candidate_ID` INT(11) NOT NULL,
		PRIMARY KEY (`ID`),
        CONSTRAINT `fk_',@new_id,'_Attendance_',@new_id,'_Candidate1`
		FOREIGN KEY (`Candidate_ID`)
		REFERENCES `educare_db`.`',@new_id,'_Candidate` (`Candidate_ID`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION
	)');
    
    PREPARE stmt FROM @attendance;
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MissingStudents` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MissingStudents`(IN schoolid VARCHAR(7), IN missingDate DATE)
BEGIN
	DECLARE school_candidate_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Candidate');
	DECLARE school_attendance_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Attendance');
 
	SET @sql_statement = CONCAT("SELECT C.`Roll_No`, C.`RFID_NO`, C.`Candidate_Name`, CONCAT(CL.`Name`, ' - ', CL.`Section`) ClassSection, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, ' ', C.`Address2`) Address, A.IN_Time FROM ", school_candidate_tblname, " C JOIN Class CL ON C.Class_ID = CL.ID JOIN ", school_attendance_tblname, " A ON C.Candidate_ID = A.Candidate_ID WHERE Date_Attendance = '", missingDate, "' AND OUT_Time IS NULL");
    
	PREPARE stmt FROM @sql_statement;	
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MonthWiseReport` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MonthWiseReport`(IN `start_month` INT(2), IN `end_month` INT(2), IN `school_id` VARCHAR(255), IN `class` VARCHAR(255), IN `section` VARCHAR(255), IN `month_interval` INT(2))
BEGIN
	DECLARE finished INT;

	DECLARE mnth VARCHAR(30);
	DECLARE sch_days INT;
    DECLARE class_not VARCHAR(3);
    DECLARE section_not VARCHAR(3);
    DECLARE diffMonth INT;
    DECLARE lastMonth INT;

    DECLARE query_month VARCHAR(2000);
    DECLARE query_group VARCHAR(2000);
    DECLARE query_agg VARCHAR(2000);
    DECLARE query_sch_days VARCHAR(2000);
    DECLARE curs CURSOR FOR
    SELECT * FROM Month_Days;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;

	CREATE TEMPORARY TABLE IF NOT EXISTS `Month_Days`(
		`Month` VARCHAR(25) NOT NULL,
		`total_school_days` INT
	) ENGINE=MEMORY;
    
    SET @diffMonth = (SELECT PERIOD_DIFF( end_month, start_month) as diffMonth);
    
    WHILE (@diffMonth >= month_interval) DO
		SET @lastMonth = start_month + month_interval - 1;
		
		SET @query_sch_days = CONCAT("INSERT INTO Month_Days (`Month`, `total_school_days`)
		SELECT GROUP_CONCAT(`Month`) Month, SUM((`Month_Days` - (`Month_Off_Days` + `Extra_Leave`))) `total_school_days` FROM `School_Days` 
		WHERE School_ID = '", school_id, "'
		AND `Month` BETWEEN ", start_month ,"
		AND ", @lastMonth);
		
		-- INSERT INTO `log` SET `log` = CONCAT("INTERVAL - ", month_interval, " START - ", start_month, " END - ", @lastMonth);
	
		PREPARE stmt FROM @query_sch_days;
		EXECUTE stmt;
		DEALLOCATE PREPARE stmt;
			
		SET @diffMonth = @diffMonth - month_interval;
		SET start_month = start_month + month_interval;
	END WHILE;
	
	IF ( @diffMonth > 0) THEN
		SET @lastMonth = start_month + @diffMonth;
		
		SET @query_sch_days = CONCAT("INSERT INTO Month_Days (`Month`, `total_school_days`)
		SELECT GROUP_CONCAT(`Month`) Month, SUM((`Month_Days` - (`Month_Off_Days` + `Extra_Leave`))) `total_school_days` FROM `School_Days` 
		WHERE School_ID = '", school_id, "'
		AND `Month` BETWEEN ", start_month ,"
		AND ", @lastMonth);
		
		-- INSERT INTO `log` SET `log` = @query_sch_days;
		
		PREPARE stmt FROM @query_sch_days;
		EXECUTE stmt;
		DEALLOCATE PREPARE stmt;
	END IF;
    
	OPEN curs;    
    CREATE TEMPORARY TABLE IF NOT EXISTS `MonthWiseReportTable` (
		`Month` varchar(20) NOT NULL,
        `Information` varchar(255) NOT NULL,
		`Roll` varchar(255) NOT NULL DEFAULT '',
		`Name` varchar(255) NOT NULL DEFAULT '',
		`Address` varchar(255) DEFAULT '',
		`Class` varchar(255) NOT NULL DEFAULT '',
		`Section` varchar(255) NOT NULL DEFAULT '',
		`Present` varchar(255) DEFAULT NULL DEFAULT '',
		`Absent` varchar(255) DEFAULT NULL DEFAULT '',
  		`Type` enum('header','data','summary') NOT NULL DEFAULT 'data'
	) ENGINE=MEMORY;

    CREATE TEMPORARY TABLE IF NOT EXISTS `GroupTable`(
		`Month` varchar(20) NOT NULL,
		`StudentCount` float NOT NULL,
        `TotalPresent` float NOT NULL,
        `TotalAbsent` float NOT NULL
	) ENGINE=MEMORY;

	SET finished = 0;
	REPEAT    
		FETCH curs INTO mnth, sch_days;
        IF NOT finished THEN 
			SET @class_not = CONCAT("FIND_IN_SET( CL.`Name`,'", class, "')");
            IF class = ''
            THEN 
                SET @class_not = CONCAT("NOT", " ", "FIND_IN_SET( CL.`Name`,'", class, "')");	
            END IF;
            
            SET @section_not = CONCAT("FIND_IN_SET( CL.`Section`,'", section, "')");
            IF section = ''
            THEN 
                SET @section_not = CONCAT("NOT", " ", "FIND_IN_SET( CL.`Section`,'", section, "')");
            END IF;

            INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Type`)
            SELECT mnth `Month`,
                CONCAT(MONTHNAME(STR_TO_DATE(mnth, '%m')), ', ', YEAR(NOW())) `Infromation`,			   
                'header' `Type`;		
            
            SET @query_month = CONCAT("INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Roll`, `Name`, `Address`, `Class`, `Section`, `Present`, `Absent`) 
            SELECT  '", mnth, "' `Month`,
                    '' `Information`,
                    `Roll_No`  `Roll` ,  
                    `Candidate_Name` Name, 
                    CONCAT(  `Address1` , ' ',  `Address2` ) Address,  
                    CL.`Name`  `Class` ,
                    CL.`Section` `Section`,
                    COUNT( A.ID ) Present,
                    (", sch_days, " - COUNT( A.ID)) Absent
            FROM  `", school_id, "_Candidate` C
            JOIN  `", school_id, "_Attendance` A ON C.`Candidate_ID` = A.`Candidate_ID` 
            JOIN  `Class` CL ON C.`class_id` = CL.`ID` 
            WHERE FIND_IN_SET(  `School_ID` , '", school_id ,"') 
            AND ", @class_not, " 
            AND ", @section_not, "
            AND FIND_IN_SET(MONTH(A.`Date_Attendance`),'", mnth, "')
            GROUP BY A.`Candidate_ID`");
            
            -- INSERT INTO `log` SET `log` = @query_month;

            PREPARE stmt FROM @query_month;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;

            SET @query_group = CONCAT("INSERT INTO `GroupTable` (`Month`, `StudentCount`, `TotalPresent`, `TotalAbsent`) 
            SELECT  '", mnth , "' `Month`,
                    COUNT(DISTINCT A.`Candidate_ID`) StudentCount,
                    COUNT( A.ID ) Present,
                    (", sch_days, " - COUNT( A.ID )) Absent
            FROM `", school_id, "_Candidate` C JOIN  `", school_id, "_Attendance` A
            ON C.`Candidate_ID` =  A.`Candidate_ID`  
            JOIN `Class` CL 
            ON C.`Class_id` = CL.`ID` 
            WHERE FIND_IN_SET(`School_ID`, '", school_id, "')
            AND ", @class_not, " 
            AND ", @section_not, "
            AND FIND_IN_SET(MONTH(A.`Date_Attendance`),'", mnth, "')
            GROUP BY A.`Candidate_ID`");
            
            -- INSERT INTO `log` SET `log` = @query_group;

            PREPARE stmt FROM @query_group;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
            
            SET @query_agg = CONCAT("INSERT INTO `MonthWiseReportTable` (`Month`, `Information`, `Present`, `Absent`, `Type`)
            SELECT `Month`,
                CONCAT('Total for ', CAST(SUM(`StudentCount`) AS CHAR), ' Students') `Information`,
                SUM(`TotalPresent`) `Present`,
                SUM(`TotalAbsent`) `Absent`,
                'summary' `Type`
            FROM `GroupTable` 
            WHERE `Month` = '", mnth, "'  
            GROUP BY `Month`");
            
            -- INSERT INTO `log` SET `log` = @query_agg;

            PREPARE stmt FROM @query_agg;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        END IF;
	UNTIL finished END REPEAT;

	CLOSE curs;
    
    PREPARE stmt FROM "SELECT * FROM MonthWiseReportTable";
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MonthWiseStudentReport` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MonthWiseStudentReport`(IN `start_date` CHAR(10), IN `end_date` CHAR(10), IN `school_id` VARCHAR(255), IN `student_id_list` VARCHAR(255))
    NO SQL
BEGIN
	DECLARE finished INT;
	DECLARE query_attendance VARCHAR(2000);
	DECLARE sid INT;
	DECLARE sname VARCHAR(255);
	DECLARE sroll INT;
	DECLARE sclass VARCHAR(255);
	DECLARE ssection VARCHAR(255);
	DECLARE sguardian VARCHAR(255);
	DECLARE sphone VARCHAR(20);
	DECLARE saddress TEXT;

	DECLARE diffMonth INT;
	DECLARE diffIter INT;
	DECLARE begin_date CHAR(10);
	DECLARE final_date CHAR(10);

	DECLARE curs CURSOR FOR
	SELECT C.`Candidate_ID`, C.`Candidate_Name`, C.`Roll_No`, CL.`Name`, CL.`Section`, C.`Guardian_Name`, C.`Mob1`, CONCAT(C.`Address1`, " ", C.`Address2`) FROM SC00001_Candidate C JOIN Class CL ON C.Class_ID = CL.ID WHERE FIND_IN_SET(`Candidate_ID`, student_id_list);
		
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET finished = 1;
    
    CREATE TEMPORARY TABLE IF NOT EXISTS `StudentReport`(
		`Name` VARCHAR(255),
        `Class` VARCHAR(30),
		`Date` VARCHAR(20) DEFAULT '',		
        `Guardian` VARCHAR(255) DEFAULT '',
        `Phone` VARCHAR(20) DEFAULT '',
        `Address` VARCHAR(255) DEFAULT '',
        `IN` VARCHAR(8) DEFAULT '',
        `OUT` VARCHAR(8) DEFAULT '',
        `Type` CHAR(6) DEFAULT 'data'
	) ENGINE=MEMORY;
    
	OPEN curs;
    
    SET finished = 0;
	REPEAT    
		FETCH curs INTO sid, sname, sroll, sclass, ssection, sguardian, sphone, saddress;
        IF NOT finished THEN 
			SET @diffMonth = (SELECT PERIOD_DIFF(REPLACE(SUBSTRING(end_date, 1, CHAR_LENGTH(end_date) - 2), '-', ''), REPLACE(SUBSTRING(start_date, 1, CHAR_LENGTH(start_date) - 2), '-', '')) AS `diffMonth`);
            SET @diffMonth = @diffMonth + 1;
            
            -- INSERT INTO `log` SET `log` = start_date;
			-- INSERT INTO `log` SET `log` = end_date;
            
            -- INSERT INTO `log` SET `log` = @diffMonth;
			
            SET @diffIter = 1;
            WHILE (@diffIter <= @diffMonth) DO		
				IF @diffIter = 1 THEN
					SET @begin_date = start_date;
                    SET @final_date = (SELECT LAST_DAY(start_date) AS `final_day`);
				ELSEIF @diffIter = @diffMonth THEN					
					SET @begin_date = (SELECT DATE_ADD(@final_date, INTERVAL 1 DAY) AS `begin_date`);
                    SET @final_date = end_date;
                ELSE					
					SET @begin_date = (SELECT DATE_ADD(@final_date, INTERVAL 1 DAY) AS `begin_date`);
                    SET @final_date = (SELECT LAST_DAY(@begin_date) AS `final_day`);
				END IF;
                
				SET @query_attendance = CONCAT("INSERT INTO StudentReport (`Name`, `Class`, `Date`, `Type`) 
				SELECT '", sname, " ( ", sroll ," )', '", sclass," ( ", ssection, " )', DATE_FORMAT('", @begin_date,"', '%M %Y'), 'header'");
				
				-- INSERT INTO `log` SET `log` = @query_attendance;
				
				PREPARE stmt FROM @query_attendance;
				EXECUTE stmt;
				DEALLOCATE PREPARE stmt;
			
				SET @query_attendance = CONCAT("INSERT INTO StudentReport (`Date`, `Guardian`, `Phone`, `Address`, `IN`, `OUT`)  			
				SELECT DATE_FORMAT(`Date_Attendance`, '%d/%m/%Y'), '", sguardian,"', '", sphone,"', '", saddress ,"', 
                DATE_FORMAT(`IN_Time`, '%l:%i %p') `IN`, DATE_FORMAT(`OUT_Time`, '%l:%i %p') `OUT` 
                FROM `SC00001_Attendance` WHERE `Candidate_ID` = ", sid, " AND 
                Date_Attendance BETWEEN '", @begin_date,"' AND '", @final_date,"' ORDER BY Date_Attendance");
				
				-- INSERT INTO `log` SET `log` = @query_attendance;
				
				PREPARE stmt FROM @query_attendance;
				EXECUTE stmt;
				DEALLOCATE PREPARE stmt;
                
                SET @diffIter = @diffIter + 1;
                
            END WHILE;            
		END IF;
			
	UNTIL finished END REPEAT;
	CLOSE curs;
    
    PREPARE stmt FROM "SELECT * FROM StudentReport";
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_AbsentListForSection` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_AbsentListForSection`(IN schoolid VARCHAR(7), 
	IN classid INT, IN correctionDate DATE)
BEGIN
DECLARE school_candidate_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Candidate');
DECLARE school_attendance_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Attendance');

	-- SET @sql_statement = CONCAT('SELECT sc.Roll_No, sc.Candidate_Name,sc.Guardian_Name, sc.Email_ID, sc.Mob1, sc.Mob2  FROM ', school_candidate_tblname, ' sc LEFT JOIN ', school_attendance_tblname, ' sa ON sc.Candidate_ID = sa.Candidate_ID WHERE sa.Date_Attendance = "', correctionDate, '" AND sc.Class_ID =', classid, ' AND sa.Candidate_ID IS NULL');
    SET @sql_statement = CONCAT('SELECT sc.Roll_No, sc.Candidate_Name,sc.Guardian_Name, sc.Email_ID, sc.Mob1, sc.Mob2  FROM ', school_candidate_tblname, ' sc WHERE sc.Class_ID =', classid, ' AND sc.Candidate_ID NOT IN (SELECT sa.Candidate_ID FROM  ', school_attendance_tblname, ' sa WHERE sa.Date_Attendance = "', correctionDate, '")');
	PREPARE stmt FROM @sql_statement;	
	EXECUTE stmt;
	DEALLOCATE PREPARE stmt;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_CorrectionAttendance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_CorrectionAttendance`(IN `schoolid` VARCHAR(7), IN `candidateid` INT(10), IN `inORout` VARCHAR(3), IN `correctionDate` DATE, OUT `successmessage` VARCHAR(100))
    NO SQL
root:BEGIN

DECLARE school_candidate_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Candidate');
DECLARE school_attendance_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Attendance');

DECLARE Cut_Off_Time TIME;
DECLARE GressTime_To_InOut VARCHAR(8);

DECLARE done INT DEFAULT FALSE;
DECLARE cur_schooltime CURSOR FOR SELECT * FROM schooltime_vw;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

SET @RecordCount = 0;
	
SET @sql_statement = CONCAT('SELECT COUNT(sa.ID) INTO @RecordCount FROM ', school_attendance_tblname, ' sa WHERE Candidate_ID = ', candidateid, ' AND Date_Attendance = "', correctionDate, '"');

PREPARE stmt FROM @sql_statement;	
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

IF inORout = 'IN' THEN
	IF @RecordCount > 0 THEN
		SET successmessage = "Candidate already present or invalid try. Please try with the correct information.";
		-- Insert into log_sp_execution_test(execution_date, sp_message) values(NOW( ), successmessage);
		LEAVE root;
	END IF;   
ELSE
	IF @RecordCount = 0 THEN
		SET successmessage = "Candidate is not present for the day. Please create a present record properly.";
		-- Insert into log_sp_execution_test(execution_date, sp_message) values(NOW( ), successmessage);
		LEAVE root;
	END IF;
END IF;


SET @sql_statement = CONCAT('CREATE VIEW schooltime_vw AS SELECT st.Cut_Off_Time, st.GressTime_To_InOut FROM School_Timing st JOIN ', school_candidate_tblname, ' sc ON st.Class_ID = sc.Class_ID WHERE st.School_ID = ''', schoolid, ''' AND st.IN_OUT =''', inORout , ''' AND sc.Candidate_ID = ', candidateid);
PREPARE stmt FROM @sql_statement;	
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

OPEN cur_schooltime;
read_loop: LOOP
	FETCH cur_schooltime INTO Cut_Off_Time, GressTime_To_InOut;
	IF done THEN			
		LEAVE read_loop;		
	END IF;    
	
	SET @sql_statement = CONCAT('UPDATE ', school_candidate_tblname, ' SET IN_OUT=''', inORout, ''' WHERE Candidate_ID=', candidateid);            
	PREPARE stmt1 FROM @sql_statement;
	EXECUTE stmt1;
	DEALLOCATE PREPARE stmt1;
						
	IF (inORout = 'IN') THEN
		# --Insert record in Attendance table			
		SET @sql_statement = CONCAT('INSERT INTO ', school_attendance_tblname, ' (Candidate_ID, Date_Attendance, IN_Time) VALUES (', candidateid, ',''', correctionDate, ''', ''', Cut_Off_Time, ''')');
		PREPARE stmt1 FROM @sql_statement;
		EXECUTE stmt1;
		DEALLOCATE PREPARE stmt1;            
	ELSE
		SET @sql_statement = CONCAT('UPDATE ', school_attendance_tblname, ' SET OUT_Time=''', Cut_Off_Time, ''' WHERE Candidate_ID=', candidateid, ' AND Date_Attendance="', correctionDate, '"');
		PREPARE stmt1 FROM @sql_statement;
		EXECUTE stmt1;
		DEALLOCATE PREPARE stmt1;            
	END IF;
	SET successmessage = '1';
END LOOP;
CLOSE cur_schooltime;
DROP VIEW schooltime_vw;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_InsertStudentAttendance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_InsertStudentAttendance`(IN `schoolid` VARCHAR(7), IN `RFIdNo` VARCHAR(20), OUT `successmessage` VARCHAR(225))
    NO SQL
BEGIN

DECLARE isSuccess INT1 DEFAULT 0;
DECLARE server_time TIME DEFAULT CURTIME();
DECLARE gress_in_time TIME;
DECLARE current_IN_OUT VARCHAR(3);
DECLARE school_candidate_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Candidate');
DECLARE school_attendance_tblname VARCHAR(18) DEFAULT CONCAT(schoolid, '_Attendance');
DECLARE messageText VARCHAR(160);
DECLARE schoolid_for_where VARCHAR(15);
 
DECLARE Candidate_ID INT;
DECLARE Candidate_Name VARCHAR(45);
DECLARE Guardian_Name VARCHAR(45);
DECLARE Mob1 VARCHAR(15);
DECLARE Gender VARCHAR(6);
DECLARE IN_OUT VARCHAR(3);
DECLARE School_Name VARCHAR(60);
DECLARE Class_ID INT;
DECLARE Cut_Off_Time TIME;
DECLARE GressTime_To_InOut VARCHAR(8);
DECLARE Candidate_Type_Name VARCHAR(10);
DECLARE API_Key VARCHAR(50);
DECLARE Route VARCHAR(20);

DECLARE done INT DEFAULT FALSE;
DECLARE cur_candidate CURSOR FOR SELECT * FROM candidate_vw;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

SET successmessage = '0';
SET schoolid_for_where = CONCAT('''', UPPER(schoolid), '''');
SET @sql_statement = CONCAT('CREATE VIEW candidate_vw AS SELECT sc.Candidate_ID, sc.Candidate_Name, sc.Guardian_Name, sc.Mob1, sc.Gender, sc.IN_OUT, s.School_Name, sc.Class_ID, st.Cut_Off_Time, st.GressTime_To_InOut, ct.Type_Name, sp.API_Key, sp.Route FROM School s JOIN ', school_candidate_tblname, ' sc ON s.ID = sc.School_ID JOIN School_Timing st ON sc.School_ID = st.School_ID AND sc.Class_ID = st.Class_ID AND sc.IN_OUT != st.IN_OUT JOIN Candidate_Type ct ON sc.Candidate_Type_ID = ct.ID JOIN SMS_Provider sp WHERE sp.SMS_Type = ''Transaction'' AND sc.RFID_NO=', RFIdNo, ' AND s.ID=', schoolid_for_where);
-- SET @sql_statement = CONCAT('CREATE VIEW candidate_vw AS SELECT sc.Candidate_ID, sc.Candidate_Name, sc.Gurdian_Name, sc.Mob1, sc.Gender, sc.IN_OUT, s.School_Name, sc.Class_ID, st.Cut_Off_Time, st.GressTime_To_InOut, ct.Type_Name FROM School s JOIN ', school_candidate_tblname, ' sc ON s.ID = sc.School_ID JOIN School_Timing st ON sc.School_ID = st.School_ID AND sc.Class_ID = st.Class_ID AND sc.IN_OUT != st.IN_OUT JOIN Candidate_Type ct ON sc.Candidate_Type_ID = ct.ID WHERE sc.RFID_NO=', RFIdNo, ' AND s.ID=', schoolid_for_where);
PREPARE stmt FROM @sql_statement;	
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

OPEN cur_candidate;

read_loop: LOOP
	FETCH cur_candidate INTO Candidate_ID, Candidate_Name, Guardian_Name, Mob1, Gender, IN_OUT, School_Name, Class_ID, Cut_Off_Time, GressTime_To_InOut, Candidate_Type_Name, API_Key, Route;
	IF done THEN
		LEAVE read_loop;		
    END IF;    
     
	IF(Candidate_ID IS NOT NULL) THEN    
		IF (IN_OUT = 'IN') THEN
			SET current_IN_OUT = 'OUT';
            SET gress_in_time = ADDTIME(Cut_Off_Time, GressTime_To_InOut);  -- Adding Gress Time'00:30:00' with Cut_Off_Time
             
            IF (server_time >= Cut_Off_Time AND server_time <= gress_in_time) THEN
				SET isSuccess = 1;
                
                SET messageText = CONCAT('Your ', if(Gender = 'M', 'son ', 'daughter '), Candidate_Name, ' has left the school at ', server_time, '.');
			ELSE
				SET isSuccess = 0;
            END IF;
            
		ELSE
			SET current_IN_OUT = 'IN';            
            SET gress_in_time = SUBTIME(Cut_Off_Time, GressTime_To_InOut);  -- Subtracting Gress Time'00:30:00' from Cut_Off_Time
                        
            IF (server_time >= gress_in_time AND server_time <= Cut_Off_Time) THEN
				SET isSuccess = 1;
                SET messageText = CONCAT('Your ', if(Gender = 'M', 'son ', 'daughter '), Candidate_Name, ' has entered into the school at ', server_time, '.');
			ELSE
				SET isSuccess = 0;
            END IF;            
            
		END IF;        	
            
		IF (isSuccess = 1) THEN            
			# --Update Candidate table for IN_OUT
			SET @sql_statement = CONCAT('UPDATE ', school_candidate_tblname, ' SET IN_OUT=''', current_IN_OUT, ''' WHERE Candidate_ID=', Candidate_ID);            
			PREPARE stmt1 FROM @sql_statement;
			EXECUTE stmt1;
			DEALLOCATE PREPARE stmt1;
                        
			# --Insert record in Attendance table			
            SET @sql_statement = CONCAT('INSERT INTO ', school_attendance_tblname, ' (Candidate_ID, Date, Time, IN_OUT) VALUES (', Candidate_ID, ',''', NOW(), ''', ''', server_time, ''',''', current_IN_OUT,''')');
			PREPARE stmt1 FROM @sql_statement;
			EXECUTE stmt1;
			DEALLOCATE PREPARE stmt1;
            
			IF (Candidate_Type_Name = 'Student') THEN                
                SET successmessage = CONCAT('1|', Mob1, '|', messageText, '|', API_Key, '|', Route);
                -- SET successmessage = CONCAT('1|', Mob1, '|', messageText);				            
            ELSE
				SET successmessage = '1|0';
            END IF;            
                        
		ELSE
            SET successmessage = '0';
		END IF;                    
    ELSE
		SET successmessage = '0';
    END IF;

END LOOP;
Insert into log_sp_execution_test(execution_date, sp_message) values(NOW( ), successmessage);
CLOSE cur_candidate;
-- SELECT successmessage;
DROP VIEW candidate_vw;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_TestOutResult` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TestOutResult`(IN `schoolid` VARCHAR(7), IN `rfidno` VARCHAR(20), INOUT `successmessage` VARCHAR(200))
    NO SQL
BEGIN

SET successmessage = '1|917890801439|Titli has entered into the school on time.';
Insert into log_sp_execution_test(execution_date, sp_message) values(NOW( ), successmessage);
-- SELECT successmessage;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-10  9:39:40
