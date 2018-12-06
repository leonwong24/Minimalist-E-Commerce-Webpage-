-- MySQL dump 10.16  Distrib 10.1.32-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: minimalist
-- ------------------------------------------------------
-- Server version	10.1.32-MariaDB

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `custId` int(4) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mobileno` varchar(20) DEFAULT NULL,
  `address` varchar(30) NOT NULL,
  `streetName` varchar(30) NOT NULL,
  `city` varchar(15) DEFAULT NULL,
  `postalCode` varchar(10) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`custId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Anne','Brian','annebrian@test.com','0834667755','IT Tralee','Dromtacker','Tralee','V92','Ireland','password'),(2,'Leon','Wong','Yit.How.Wong@student','08341122211','TTCA','',NULL,NULL,NULL,NULL),(4,'dummy','account','dummy@email.com','12345673412','dummy house','dummy street','dummy city','2233','United Kingdom','dummy123'),(5,'Jonathon','Ng','jonathonng@gmail.com','12345','Dublin House','Dublin Street','Dublin','V21 2123','Ireland','jonathon'),(6,'laura','kelly','laura@email.com','12345','laura house','laura street','Tralee','V92 HC02','Ireland','laurapassword');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(30) NOT NULL,
  `description` varchar(30) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Converse','American skating shoe',100.00),(2,'Common Projects','Italian luxury leather shoe',350.00),(3,'Adidas Ultraboost','Adidas boost-technology shoe',180.00);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itemstock`
--

DROP TABLE IF EXISTS `itemstock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itemstock` (
  `itemId` int(11) NOT NULL,
  `size` decimal(3,1) NOT NULL,
  `quantity` int(2) NOT NULL,
  PRIMARY KEY (`itemId`,`size`),
  CONSTRAINT `fk_itemid` FOREIGN KEY (`itemId`) REFERENCES `item` (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itemstock`
--

LOCK TABLES `itemstock` WRITE;
/*!40000 ALTER TABLE `itemstock` DISABLE KEYS */;
INSERT INTO `itemstock` VALUES (1,6.0,7),(1,6.5,11),(1,7.0,8),(1,7.5,0),(2,6.0,3),(2,6.5,0),(2,7.0,1),(2,7.5,14),(3,6.0,4),(3,6.5,10),(3,7.0,2),(3,7.5,3);
/*!40000 ALTER TABLE `itemstock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderitems` (
  `orderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `size` int(2) NOT NULL,
  `quantity` int(2) NOT NULL,
  PRIMARY KEY (`orderid`,`itemid`,`size`),
  KEY `itemid` (`itemid`),
  CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`itemid`) REFERENCES `item` (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderitems`
--

LOCK TABLES `orderitems` WRITE;
/*!40000 ALTER TABLE `orderitems` DISABLE KEYS */;
INSERT INTO `orderitems` VALUES (0,1,7,1),(1,2,7,1);
/*!40000 ALTER TABLE `orderitems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `custid` int(4) NOT NULL,
  `orderdate` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'U',
  `payid` int(4) NOT NULL,
  `totalprice` decimal(5,2) NOT NULL,
  `feedback` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`orderid`),
  KEY `custid` (`custid`),
  KEY `fk_payid` (`payid`),
  CONSTRAINT `fk_payid` FOREIGN KEY (`payid`) REFERENCES `payments` (`payid`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`custid`) REFERENCES `customer` (`custId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,'2018-11-08','U',1,350.00,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `payid` int(11) NOT NULL AUTO_INCREMENT,
  `status` char(1) NOT NULL DEFAULT 'U',
  `accno` bigint(16) NOT NULL,
  `secno` int(3) NOT NULL,
  `exmonth` int(2) NOT NULL,
  `exyear` int(4) NOT NULL,
  PRIMARY KEY (`payid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,'U',1234567890123456,123,12,2020),(2,'U',9876543210987654,321,11,2019),(3,'P',1111222233334444,444,12,2021),(4,'D',4444333322221111,333,1,2020);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-06 16:24:09
