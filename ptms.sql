-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: trms
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faculty` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `faculty` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `Subject` (`faculty`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;
INSERT INTO `faculty` VALUES (13,'کمپیوتر ساینس','2019-10-13 19:00:22'),(27,'اقتصاد','2023-10-19 02:55:17'),(28,'ادبیات','2023-10-19 02:55:33');
/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbladmin`
--

LOCK TABLES `tbladmin` WRITE;
/*!40000 ALTER TABLE `tbladmin` DISABLE KEYS */;
INSERT INTO `tbladmin` VALUES (1,'sharif','sharif',795657528,'sharifsultanzada3@gmail.com','68eacb97d86f0c4621fa2b0e17cabd8c','2019-10-04 06:10:04');
/*!40000 ALTER TABLE `tbladmin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblquery`
--

DROP TABLE IF EXISTS `tblquery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblquery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherId` int(11) DEFAULT NULL,
  `fName` varchar(200) DEFAULT NULL,
  `emailId` varchar(200) DEFAULT NULL,
  `mobileNumber` bigint(10) DEFAULT NULL,
  `Query` mediumtext DEFAULT NULL,
  `queryDate` timestamp NULL DEFAULT current_timestamp(),
  `teacherNote` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tid` (`teacherId`),
  CONSTRAINT `tid` FOREIGN KEY (`teacherId`) REFERENCES `tblteacher` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblquery`
--

LOCK TABLES `tblquery` WRITE;
/*!40000 ALTER TABLE `tblquery` DISABLE KEYS */;
INSERT INTO `tblquery` VALUES (13,38,'sharif ahmad','ssultanzada@gmail.com',796234563,'salaam sawal dashtom','2023-10-19 03:28:43',NULL);
/*!40000 ALTER TABLE `tblquery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblteacher`
--

DROP TABLE IF EXISTS `tblteacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblteacher` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(120) DEFAULT NULL,
  `lname` varchar(120) DEFAULT NULL,
  `fname` varchar(120) DEFAULT NULL,
  `mzf` varchar(120) NOT NULL,
  `mzm` varchar(120) NOT NULL,
  `ls` varchar(200) DEFAULT NULL,
  `ms` varchar(200) DEFAULT NULL,
  `do` varchar(200) DEFAULT NULL,
  `ls1` varchar(200) DEFAULT NULL,
  `ms1` varchar(200) DEFAULT NULL,
  `do1` varchar(200) DEFAULT NULL,
  `Picture` varchar(200) NOT NULL,
  `propic1` varchar(200) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Qualifications` varchar(120) DEFAULT NULL,
  `department` varchar(200) DEFAULT NULL,
  `tsub` varchar(200) NOT NULL,
  `degree` varchar(200) DEFAULT NULL,
  `sciencer` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `addressd` varchar(200) DEFAULT NULL,
  `addressa` varchar(200) DEFAULT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `addressd1` varchar(200) DEFAULT NULL,
  `addressa1` varchar(200) DEFAULT NULL,
  `faculty` varchar(200) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `teachingExp` varchar(10) DEFAULT NULL,
  `JoiningDate` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ljoiningdate` varchar(120) DEFAULT NULL,
  `isPublic` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `subname` (`faculty`),
  CONSTRAINT `subname` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`faculty`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblteacher`
--

LOCK TABLES `tblteacher` WRITE;
/*!40000 ALTER TABLE `tblteacher` DISABLE KEYS */;
INSERT INTO `tblteacher` VALUES (38,'sharif ','sultanzada','Ab Q','Techar','moder','M.S.D','this','lskf','sdlkjf','dslkf','sdlkf','7981ec3957e56699bc1d07d58725ffd71697687736.JPG','e3a0fec3e8cdcbd05768272bc8d5ed5e1697428976.gif','sharif@gmail.com',707070707,'202cb962ac59075b964b07152d234b70',NULL,'dslkf','C.S','NAM P','MMA','farah','markaz','markaz','herat','markaz','markaz','کمپیوتر ساینس','','4','2023-10-15','2023-10-16 04:02:56','2023-10-18',1),(52,'محمد شریف ','سلطانی','فقیر','this','منسبیت','دارد','دارد','دارد','ندارد','ندارد','ندارد1','eac0f4af765f2e311b6603dde95a2d111697686300.gif','c8f62d2c440806b2263c2f8687c21f4a1697686300.JPG','sharif@gmial.com',709909090,NULL,NULL,'is','بیولوژی','دوکتورا','sfdkj','فراه','قلعه کاه','دسته گل','فراه','قلعه کاه','دسته گل','کمپیوتر ساینس','فاهس','21','2023-11-02','2023-10-19 03:31:40','2023-10-27',0),(53,'هدی ','رحمانی','غلام سخی','رئیس','رئیس','ندارد','ندارد','دارد','دارد','دارد','دارد','2044e6cc88d5daefec185091028f60111697725791.jpg','699b21445b803ae21202c227bcf5a6261697725791.jpg','hudyrahmani@gmail.com',705287293,NULL,NULL,'IS','java, web ','دوکتورا','پوهاند','فراه','قلعه کاه ','دسته گل','فراه','قلعه کاه','دسته گل','کمپیوتر ساینس','استاد فن بیان ','10','2023-10-19','2023-10-19 14:29:51','2023-10-25',1);
/*!40000 ALTER TABLE `tblteacher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-19  7:41:44
