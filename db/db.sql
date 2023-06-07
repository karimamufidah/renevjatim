-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: renevjatim
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `data_fois`
--

DROP TABLE IF EXISTS `data_fois`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `data_fois` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_fois`
--

LOCK TABLES `data_fois` WRITE;
/*!40000 ALTER TABLE `data_fois` DISABLE KEYS */;
INSERT INTO `data_fois` VALUES (3,'e-brochure_CITRALAND_SURABAYA_2020_RUMAH_LAMA.pdf',4,'2022-10-01 17:02:57','Admin'),(6,'BA_Infra_-_VM_DB_App_Wappin_PolarDB.docx',1,'2022-10-04 19:59:51','andika');
/*!40000 ALTER TABLE `data_fois` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `defense_scheme`
--

DROP TABLE IF EXISTS `defense_scheme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `defense_scheme` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `defense_scheme`
--

LOCK TABLES `defense_scheme` WRITE;
/*!40000 ALTER TABLE `defense_scheme` DISABLE KEYS */;
INSERT INTO `defense_scheme` VALUES (11,'3.png',3,'2022-10-01 16:15:42','Admin'),(17,'ExampleHowtoWriteRecommendationLetter.pdf',0,'2022-10-02 21:04:13','Admin');
/*!40000 ALTER TABLE `defense_scheme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deklarasi_tmp`
--

DROP TABLE IF EXISTS `deklarasi_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deklarasi_tmp` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deklarasi_tmp`
--

LOCK TABLES `deklarasi_tmp` WRITE;
/*!40000 ALTER TABLE `deklarasi_tmp` DISABLE KEYS */;
INSERT INTO `deklarasi_tmp` VALUES (3,'Karima_Mufidah_-_Supervised_Learning_Task_1_-_Answer.docx',0,'2022-10-02 11:10:39','Admin');
/*!40000 ALTER TABLE `deklarasi_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eob`
--

DROP TABLE IF EXISTS `eob`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eob` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eob`
--

LOCK TABLES `eob` WRITE;
/*!40000 ALTER TABLE `eob` DISABLE KEYS */;
INSERT INTO `eob` VALUES (2,'ExampleHowtoWriteRecommendationLetter.pdf',0,'2022-10-02 10:52:03','Admin');
/*!40000 ALTER TABLE `eob` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eot`
--

DROP TABLE IF EXISTS `eot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eot` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eot`
--

LOCK TABLES `eot` WRITE;
/*!40000 ALTER TABLE `eot` DISABLE KEYS */;
INSERT INTO `eot` VALUES (2,'012_Karima_Mufidah-dikonversi.docx',0,'2022-10-02 11:02:14','Admin');
/*!40000 ALTER TABLE `eot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ibt_perencanaan`
--

DROP TABLE IF EXISTS `ibt_perencanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ibt_perencanaan` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `ibt` varchar(150) NOT NULL,
  `kv` varchar(11) DEFAULT NULL,
  `satuan` varchar(20) NOT NULL,
  `inom` int DEFAULT NULL,
  `ren_0030` decimal(19,2) DEFAULT NULL,
  `ren_0100` decimal(19,2) DEFAULT NULL,
  `ren_0130` decimal(19,2) DEFAULT NULL,
  `ren_0200` decimal(19,2) DEFAULT NULL,
  `ren_0230` decimal(19,2) DEFAULT NULL,
  `ren_0300` decimal(19,2) DEFAULT NULL,
  `ren_0330` decimal(19,2) DEFAULT NULL,
  `ren_0400` decimal(19,2) DEFAULT NULL,
  `ren_0430` decimal(19,2) DEFAULT NULL,
  `ren_0500` decimal(19,2) DEFAULT NULL,
  `ren_0530` decimal(19,2) DEFAULT NULL,
  `ren_0600` decimal(19,2) DEFAULT NULL,
  `ren_0630` decimal(19,2) DEFAULT NULL,
  `ren_0700` decimal(19,2) DEFAULT NULL,
  `ren_0730` decimal(19,2) DEFAULT NULL,
  `ren_0800` decimal(19,2) DEFAULT NULL,
  `ren_0830` decimal(19,2) DEFAULT NULL,
  `ren_0900` decimal(19,2) DEFAULT NULL,
  `ren_0930` decimal(19,2) DEFAULT NULL,
  `ren_1000` decimal(19,2) DEFAULT NULL,
  `ren_1030` decimal(19,2) DEFAULT NULL,
  `ren_1100` decimal(19,2) DEFAULT NULL,
  `ren_1130` decimal(19,2) DEFAULT NULL,
  `ren_1200` decimal(19,2) DEFAULT NULL,
  `ren_1230` decimal(19,2) DEFAULT NULL,
  `ren_1300` decimal(19,2) DEFAULT NULL,
  `ren_1330` decimal(19,2) DEFAULT NULL,
  `ren_1400` decimal(19,2) DEFAULT NULL,
  `ren_1430` decimal(19,2) DEFAULT NULL,
  `ren_1500` decimal(19,2) DEFAULT NULL,
  `ren_1530` decimal(19,2) DEFAULT NULL,
  `ren_1600` decimal(19,2) DEFAULT NULL,
  `ren_1630` decimal(19,2) DEFAULT NULL,
  `ren_1700` decimal(19,2) DEFAULT NULL,
  `ren_1730` decimal(19,2) DEFAULT NULL,
  `ren_1800` decimal(19,2) DEFAULT NULL,
  `ren_1830` decimal(19,2) DEFAULT NULL,
  `ren_1900` decimal(19,2) DEFAULT NULL,
  `ren_1930` decimal(19,2) DEFAULT NULL,
  `ren_2000` decimal(19,2) DEFAULT NULL,
  `ren_2030` decimal(19,2) DEFAULT NULL,
  `ren_2100` decimal(19,2) DEFAULT NULL,
  `ren_2130` decimal(19,2) DEFAULT NULL,
  `ren_2200` decimal(19,2) DEFAULT NULL,
  `ren_2230` decimal(19,2) DEFAULT NULL,
  `ren_2300` decimal(19,2) DEFAULT NULL,
  `ren_2330` decimal(19,2) DEFAULT NULL,
  `ren_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ibt_perencanaan`
--

LOCK TABLES `ibt_perencanaan` WRITE;
/*!40000 ALTER TABLE `ibt_perencanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `ibt_perencanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ibt_realisasi`
--

DROP TABLE IF EXISTS `ibt_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ibt_realisasi` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `ibt` varchar(150) NOT NULL,
  `kv` varchar(11) DEFAULT NULL,
  `satuan` varchar(20) NOT NULL,
  `inom` int DEFAULT NULL,
  `eval_0030` decimal(19,2) DEFAULT NULL,
  `eval_0100` decimal(19,2) DEFAULT NULL,
  `eval_0130` decimal(19,2) DEFAULT NULL,
  `eval_0200` decimal(19,2) DEFAULT NULL,
  `eval_0230` decimal(19,2) DEFAULT NULL,
  `eval_0300` decimal(19,2) DEFAULT NULL,
  `eval_0330` decimal(19,2) DEFAULT NULL,
  `eval_0400` decimal(19,2) DEFAULT NULL,
  `eval_0430` decimal(19,2) DEFAULT NULL,
  `eval_0500` decimal(19,2) DEFAULT NULL,
  `eval_0530` decimal(19,2) DEFAULT NULL,
  `eval_0600` decimal(19,2) DEFAULT NULL,
  `eval_0630` decimal(19,2) DEFAULT NULL,
  `eval_0700` decimal(19,2) DEFAULT NULL,
  `eval_0730` decimal(19,2) DEFAULT NULL,
  `eval_0800` decimal(19,2) DEFAULT NULL,
  `eval_0830` decimal(19,2) DEFAULT NULL,
  `eval_0900` decimal(19,2) DEFAULT NULL,
  `eval_0930` decimal(19,2) DEFAULT NULL,
  `eval_1000` decimal(19,2) DEFAULT NULL,
  `eval_1030` decimal(19,2) DEFAULT NULL,
  `eval_1100` decimal(19,2) DEFAULT NULL,
  `eval_1130` decimal(19,2) DEFAULT NULL,
  `eval_1200` decimal(19,2) DEFAULT NULL,
  `eval_1230` decimal(19,2) DEFAULT NULL,
  `eval_1300` decimal(19,2) DEFAULT NULL,
  `eval_1330` decimal(19,2) DEFAULT NULL,
  `eval_1400` decimal(19,2) DEFAULT NULL,
  `eval_1430` decimal(19,2) DEFAULT NULL,
  `eval_1500` decimal(19,2) DEFAULT NULL,
  `eval_1530` decimal(19,2) DEFAULT NULL,
  `eval_1600` decimal(19,2) DEFAULT NULL,
  `eval_1630` decimal(19,2) DEFAULT NULL,
  `eval_1700` decimal(19,2) DEFAULT NULL,
  `eval_1730` decimal(19,2) DEFAULT NULL,
  `eval_1800` decimal(19,2) DEFAULT NULL,
  `eval_1830` decimal(19,2) DEFAULT NULL,
  `eval_1900` decimal(19,2) DEFAULT NULL,
  `eval_1930` decimal(19,2) DEFAULT NULL,
  `eval_2000` decimal(19,2) DEFAULT NULL,
  `eval_2030` decimal(19,2) DEFAULT NULL,
  `eval_2100` decimal(19,2) DEFAULT NULL,
  `eval_2130` decimal(19,2) DEFAULT NULL,
  `eval_2200` decimal(19,2) DEFAULT NULL,
  `eval_2230` decimal(19,2) DEFAULT NULL,
  `eval_2300` decimal(19,2) DEFAULT NULL,
  `eval_2330` decimal(19,2) DEFAULT NULL,
  `eval_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ibt_realisasi`
--

LOCK TABLES `ibt_realisasi` WRITE;
/*!40000 ALTER TABLE `ibt_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `ibt_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ibt_realisasi_table`
--

DROP TABLE IF EXISTS `ibt_realisasi_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ibt_realisasi_table` (
  `logged_at` timestamp NOT NULL,
  `nama` varchar(300) NOT NULL,
  `mw` double DEFAULT NULL,
  `mvar` double DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  PRIMARY KEY (`logged_at`,`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ibt_realisasi_table`
--

LOCK TABLES `ibt_realisasi_table` WRITE;
/*!40000 ALTER TABLE `ibt_realisasi_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `ibt_realisasi_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konfigurasi_diagram`
--

DROP TABLE IF EXISTS `konfigurasi_diagram`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konfigurasi_diagram` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konfigurasi_diagram`
--

LOCK TABLES `konfigurasi_diagram` WRITE;
/*!40000 ALTER TABLE `konfigurasi_diagram` DISABLE KEYS */;
INSERT INTO `konfigurasi_diagram` VALUES (5,'3.png',3,'2022-10-02 09:27:42','Admin');
/*!40000 ALTER TABLE `konfigurasi_diagram` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `konfigurasi_kerawanan`
--

DROP TABLE IF EXISTS `konfigurasi_kerawanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konfigurasi_kerawanan` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `konfigurasi_kerawanan`
--

LOCK TABLES `konfigurasi_kerawanan` WRITE;
/*!40000 ALTER TABLE `konfigurasi_kerawanan` DISABLE KEYS */;
INSERT INTO `konfigurasi_kerawanan` VALUES (1,'ExampleHowtoWriteRecommendationLetter.pdf',0,'2022-10-02 09:48:11','Admin');
/*!40000 ALTER TABLE `konfigurasi_kerawanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `min_max`
--

DROP TABLE IF EXISTS `min_max`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `min_max` (
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `min_max`
--

LOCK TABLES `min_max` WRITE;
/*!40000 ALTER TABLE `min_max` DISABLE KEYS */;
INSERT INTO `min_max` VALUES ('Min'),('Max');
/*!40000 ALTER TABLE `min_max` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasokan_subsistem`
--

DROP TABLE IF EXISTS `pasokan_subsistem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pasokan_subsistem` (
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasokan_subsistem`
--

LOCK TABLES `pasokan_subsistem` WRITE;
/*!40000 ALTER TABLE `pasokan_subsistem` DISABLE KEYS */;
INSERT INTO `pasokan_subsistem` VALUES ('IBT'),('KIT'),('BEBAN'),('TRANSFER'),('DMP'),('%');
/*!40000 ALTER TABLE `pasokan_subsistem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembangkit_perencanaan`
--

DROP TABLE IF EXISTS `pembangkit_perencanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembangkit_perencanaan` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `pembangkit` varchar(150) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `ren_0030` decimal(19,2) DEFAULT NULL,
  `ren_0100` decimal(19,2) DEFAULT NULL,
  `ren_0130` decimal(19,2) DEFAULT NULL,
  `ren_0200` decimal(19,2) DEFAULT NULL,
  `ren_0230` decimal(19,2) DEFAULT NULL,
  `ren_0300` decimal(19,2) DEFAULT NULL,
  `ren_0330` decimal(19,2) DEFAULT NULL,
  `ren_0400` decimal(19,2) DEFAULT NULL,
  `ren_0430` decimal(19,2) DEFAULT NULL,
  `ren_0500` decimal(19,2) DEFAULT NULL,
  `ren_0530` decimal(19,2) DEFAULT NULL,
  `ren_0600` decimal(19,2) DEFAULT NULL,
  `ren_0630` decimal(19,2) DEFAULT NULL,
  `ren_0700` decimal(19,2) DEFAULT NULL,
  `ren_0730` decimal(19,2) DEFAULT NULL,
  `ren_0800` decimal(19,2) DEFAULT NULL,
  `ren_0830` decimal(19,2) DEFAULT NULL,
  `ren_0900` decimal(19,2) DEFAULT NULL,
  `ren_0930` decimal(19,2) DEFAULT NULL,
  `ren_1000` decimal(19,2) DEFAULT NULL,
  `ren_1030` decimal(19,2) DEFAULT NULL,
  `ren_1100` decimal(19,2) DEFAULT NULL,
  `ren_1130` decimal(19,2) DEFAULT NULL,
  `ren_1200` decimal(19,2) DEFAULT NULL,
  `ren_1230` decimal(19,2) DEFAULT NULL,
  `ren_1300` decimal(19,2) DEFAULT NULL,
  `ren_1330` decimal(19,2) DEFAULT NULL,
  `ren_1400` decimal(19,2) DEFAULT NULL,
  `ren_1430` decimal(19,2) DEFAULT NULL,
  `ren_1500` decimal(19,2) DEFAULT NULL,
  `ren_1530` decimal(19,2) DEFAULT NULL,
  `ren_1600` decimal(19,2) DEFAULT NULL,
  `ren_1630` decimal(19,2) DEFAULT NULL,
  `ren_1700` decimal(19,2) DEFAULT NULL,
  `ren_1730` decimal(19,2) DEFAULT NULL,
  `ren_1800` decimal(19,2) DEFAULT NULL,
  `ren_1830` decimal(19,2) DEFAULT NULL,
  `ren_1900` decimal(19,2) DEFAULT NULL,
  `ren_1930` decimal(19,2) DEFAULT NULL,
  `ren_2000` decimal(19,2) DEFAULT NULL,
  `ren_2030` decimal(19,2) DEFAULT NULL,
  `ren_2100` decimal(19,2) DEFAULT NULL,
  `ren_2130` decimal(19,2) DEFAULT NULL,
  `ren_2200` decimal(19,2) DEFAULT NULL,
  `ren_2230` decimal(19,2) DEFAULT NULL,
  `ren_2300` decimal(19,2) DEFAULT NULL,
  `ren_2330` decimal(19,2) DEFAULT NULL,
  `ren_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembangkit_perencanaan`
--

LOCK TABLES `pembangkit_perencanaan` WRITE;
/*!40000 ALTER TABLE `pembangkit_perencanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembangkit_perencanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembangkit_realisasi`
--

DROP TABLE IF EXISTS `pembangkit_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembangkit_realisasi` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `pembangkit` varchar(150) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `eval_0030` decimal(19,2) DEFAULT NULL,
  `eval_0100` decimal(19,2) DEFAULT NULL,
  `eval_0130` decimal(19,2) DEFAULT NULL,
  `eval_0200` decimal(19,2) DEFAULT NULL,
  `eval_0230` decimal(19,2) DEFAULT NULL,
  `eval_0300` decimal(19,2) DEFAULT NULL,
  `eval_0330` decimal(19,2) DEFAULT NULL,
  `eval_0400` decimal(19,2) DEFAULT NULL,
  `eval_0430` decimal(19,2) DEFAULT NULL,
  `eval_0500` decimal(19,2) DEFAULT NULL,
  `eval_0530` decimal(19,2) DEFAULT NULL,
  `eval_0600` decimal(19,2) DEFAULT NULL,
  `eval_0630` decimal(19,2) DEFAULT NULL,
  `eval_0700` decimal(19,2) DEFAULT NULL,
  `eval_0730` decimal(19,2) DEFAULT NULL,
  `eval_0800` decimal(19,2) DEFAULT NULL,
  `eval_0830` decimal(19,2) DEFAULT NULL,
  `eval_0900` decimal(19,2) DEFAULT NULL,
  `eval_0930` decimal(19,2) DEFAULT NULL,
  `eval_1000` decimal(19,2) DEFAULT NULL,
  `eval_1030` decimal(19,2) DEFAULT NULL,
  `eval_1100` decimal(19,2) DEFAULT NULL,
  `eval_1130` decimal(19,2) DEFAULT NULL,
  `eval_1200` decimal(19,2) DEFAULT NULL,
  `eval_1230` decimal(19,2) DEFAULT NULL,
  `eval_1300` decimal(19,2) DEFAULT NULL,
  `eval_1330` decimal(19,2) DEFAULT NULL,
  `eval_1400` decimal(19,2) DEFAULT NULL,
  `eval_1430` decimal(19,2) DEFAULT NULL,
  `eval_1500` decimal(19,2) DEFAULT NULL,
  `eval_1530` decimal(19,2) DEFAULT NULL,
  `eval_1600` decimal(19,2) DEFAULT NULL,
  `eval_1630` decimal(19,2) DEFAULT NULL,
  `eval_1700` decimal(19,2) DEFAULT NULL,
  `eval_1730` decimal(19,2) DEFAULT NULL,
  `eval_1800` decimal(19,2) DEFAULT NULL,
  `eval_1830` decimal(19,2) DEFAULT NULL,
  `eval_1900` decimal(19,2) DEFAULT NULL,
  `eval_1930` decimal(19,2) DEFAULT NULL,
  `eval_2000` decimal(19,2) DEFAULT NULL,
  `eval_2030` decimal(19,2) DEFAULT NULL,
  `eval_2100` decimal(19,2) DEFAULT NULL,
  `eval_2130` decimal(19,2) DEFAULT NULL,
  `eval_2200` decimal(19,2) DEFAULT NULL,
  `eval_2230` decimal(19,2) DEFAULT NULL,
  `eval_2300` decimal(19,2) DEFAULT NULL,
  `eval_2330` decimal(19,2) DEFAULT NULL,
  `eval_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembangkit_realisasi`
--

LOCK TABLES `pembangkit_realisasi` WRITE;
/*!40000 ALTER TABLE `pembangkit_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembangkit_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penghantar_perencanaan`
--

DROP TABLE IF EXISTS `penghantar_perencanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penghantar_perencanaan` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `ruas` varchar(150) NOT NULL,
  `kv` int DEFAULT NULL,
  `numerik` varchar(150) NOT NULL,
  `inom` int DEFAULT NULL,
  `satuan` varchar(20) NOT NULL,
  `ren_0030` decimal(19,2) DEFAULT NULL,
  `ren_0100` decimal(19,2) DEFAULT NULL,
  `ren_0130` decimal(19,2) DEFAULT NULL,
  `ren_0200` decimal(19,2) DEFAULT NULL,
  `ren_0230` decimal(19,2) DEFAULT NULL,
  `ren_0300` decimal(19,2) DEFAULT NULL,
  `ren_0330` decimal(19,2) DEFAULT NULL,
  `ren_0400` decimal(19,2) DEFAULT NULL,
  `ren_0430` decimal(19,2) DEFAULT NULL,
  `ren_0500` decimal(19,2) DEFAULT NULL,
  `ren_0530` decimal(19,2) DEFAULT NULL,
  `ren_0600` decimal(19,2) DEFAULT NULL,
  `ren_0630` decimal(19,2) DEFAULT NULL,
  `ren_0700` decimal(19,2) DEFAULT NULL,
  `ren_0730` decimal(19,2) DEFAULT NULL,
  `ren_0800` decimal(19,2) DEFAULT NULL,
  `ren_0830` decimal(19,2) DEFAULT NULL,
  `ren_0900` decimal(19,2) DEFAULT NULL,
  `ren_0930` decimal(19,2) DEFAULT NULL,
  `ren_1000` decimal(19,2) DEFAULT NULL,
  `ren_1030` decimal(19,2) DEFAULT NULL,
  `ren_1100` decimal(19,2) DEFAULT NULL,
  `ren_1130` decimal(19,2) DEFAULT NULL,
  `ren_1200` decimal(19,2) DEFAULT NULL,
  `ren_1230` decimal(19,2) DEFAULT NULL,
  `ren_1300` decimal(19,2) DEFAULT NULL,
  `ren_1330` decimal(19,2) DEFAULT NULL,
  `ren_1400` decimal(19,2) DEFAULT NULL,
  `ren_1430` decimal(19,2) DEFAULT NULL,
  `ren_1500` decimal(19,2) DEFAULT NULL,
  `ren_1530` decimal(19,2) DEFAULT NULL,
  `ren_1600` decimal(19,2) DEFAULT NULL,
  `ren_1630` decimal(19,2) DEFAULT NULL,
  `ren_1700` decimal(19,2) DEFAULT NULL,
  `ren_1730` decimal(19,2) DEFAULT NULL,
  `ren_1800` decimal(19,2) DEFAULT NULL,
  `ren_1830` decimal(19,2) DEFAULT NULL,
  `ren_1900` decimal(19,2) DEFAULT NULL,
  `ren_1930` decimal(19,2) DEFAULT NULL,
  `ren_2000` decimal(19,2) DEFAULT NULL,
  `ren_2030` decimal(19,2) DEFAULT NULL,
  `ren_2100` decimal(19,2) DEFAULT NULL,
  `ren_2130` decimal(19,2) DEFAULT NULL,
  `ren_2200` decimal(19,2) DEFAULT NULL,
  `ren_2230` decimal(19,2) DEFAULT NULL,
  `ren_2300` decimal(19,2) DEFAULT NULL,
  `ren_2330` decimal(19,2) DEFAULT NULL,
  `ren_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penghantar_perencanaan`
--

LOCK TABLES `penghantar_perencanaan` WRITE;
/*!40000 ALTER TABLE `penghantar_perencanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `penghantar_perencanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penghantar_realisasi`
--

DROP TABLE IF EXISTS `penghantar_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penghantar_realisasi` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `ruas` varchar(150) NOT NULL,
  `kv` int DEFAULT NULL,
  `numerik` varchar(150) NOT NULL,
  `inom` int DEFAULT NULL,
  `satuan` varchar(20) NOT NULL,
  `eval_0030` decimal(19,2) DEFAULT NULL,
  `eval_0100` decimal(19,2) DEFAULT NULL,
  `eval_0130` decimal(19,2) DEFAULT NULL,
  `eval_0200` decimal(19,2) DEFAULT NULL,
  `eval_0230` decimal(19,2) DEFAULT NULL,
  `eval_0300` decimal(19,2) DEFAULT NULL,
  `eval_0330` decimal(19,2) DEFAULT NULL,
  `eval_0400` decimal(19,2) DEFAULT NULL,
  `eval_0430` decimal(19,2) DEFAULT NULL,
  `eval_0500` decimal(19,2) DEFAULT NULL,
  `eval_0530` decimal(19,2) DEFAULT NULL,
  `eval_0600` decimal(19,2) DEFAULT NULL,
  `eval_0630` decimal(19,2) DEFAULT NULL,
  `eval_0700` decimal(19,2) DEFAULT NULL,
  `eval_0730` decimal(19,2) DEFAULT NULL,
  `eval_0800` decimal(19,2) DEFAULT NULL,
  `eval_0830` decimal(19,2) DEFAULT NULL,
  `eval_0900` decimal(19,2) DEFAULT NULL,
  `eval_0930` decimal(19,2) DEFAULT NULL,
  `eval_1000` decimal(19,2) DEFAULT NULL,
  `eval_1030` decimal(19,2) DEFAULT NULL,
  `eval_1100` decimal(19,2) DEFAULT NULL,
  `eval_1130` decimal(19,2) DEFAULT NULL,
  `eval_1200` decimal(19,2) DEFAULT NULL,
  `eval_1230` decimal(19,2) DEFAULT NULL,
  `eval_1300` decimal(19,2) DEFAULT NULL,
  `eval_1330` decimal(19,2) DEFAULT NULL,
  `eval_1400` decimal(19,2) DEFAULT NULL,
  `eval_1430` decimal(19,2) DEFAULT NULL,
  `eval_1500` decimal(19,2) DEFAULT NULL,
  `eval_1530` decimal(19,2) DEFAULT NULL,
  `eval_1600` decimal(19,2) DEFAULT NULL,
  `eval_1630` decimal(19,2) DEFAULT NULL,
  `eval_1700` decimal(19,2) DEFAULT NULL,
  `eval_1730` decimal(19,2) DEFAULT NULL,
  `eval_1800` decimal(19,2) DEFAULT NULL,
  `eval_1830` decimal(19,2) DEFAULT NULL,
  `eval_1900` decimal(19,2) DEFAULT NULL,
  `eval_1930` decimal(19,2) DEFAULT NULL,
  `eval_2000` decimal(19,2) DEFAULT NULL,
  `eval_2030` decimal(19,2) DEFAULT NULL,
  `eval_2100` decimal(19,2) DEFAULT NULL,
  `eval_2130` decimal(19,2) DEFAULT NULL,
  `eval_2200` decimal(19,2) DEFAULT NULL,
  `eval_2230` decimal(19,2) DEFAULT NULL,
  `eval_2300` decimal(19,2) DEFAULT NULL,
  `eval_2330` decimal(19,2) DEFAULT NULL,
  `eval_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penghantar_realisasi`
--

LOCK TABLES `penghantar_realisasi` WRITE;
/*!40000 ALTER TABLE `penghantar_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `penghantar_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penghantar_realisasi_table`
--

DROP TABLE IF EXISTS `penghantar_realisasi_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penghantar_realisasi_table` (
  `logged_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(45) NOT NULL,
  `mw` decimal(19,2) DEFAULT NULL,
  `mvar` decimal(19,2) DEFAULT NULL,
  `percentage` decimal(19,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penghantar_realisasi_table`
--

LOCK TABLES `penghantar_realisasi_table` WRITE;
/*!40000 ALTER TABLE `penghantar_realisasi_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `penghantar_realisasi_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rekonstruksi`
--

DROP TABLE IF EXISTS `rekonstruksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rekonstruksi` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rekonstruksi`
--

LOCK TABLES `rekonstruksi` WRITE;
/*!40000 ALTER TABLE `rekonstruksi` DISABLE KEYS */;
INSERT INTO `rekonstruksi` VALUES (2,'3.png',3,'2022-10-01 16:48:11','Admin'),(4,'e-brochure_CORNELL_DENVER_APT.pdf',5,'2022-10-01 17:40:01','operator'),(7,'182-1829287_cammy-lin-ux-designer-circle-picture-profile-girl182-1829287_cammy-lin-ux-designer-circle-picture-profile-girl182-1829287_cammy-lin-ux-designer-circle-picture-profile-girl_(1).png',0,'2022-10-01 22:57:31','Admin');
/*!40000 ALTER TABLE `rekonstruksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rob`
--

DROP TABLE IF EXISTS `rob`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rob` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rob`
--

LOCK TABLES `rob` WRITE;
/*!40000 ALTER TABLE `rob` DISABLE KEYS */;
INSERT INTO `rob` VALUES (2,'2.png',4,'2022-10-02 10:29:25','Admin');
/*!40000 ALTER TABLE `rob` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rot`
--

DROP TABLE IF EXISTS `rot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rot` (
  `file_id` int NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_size` int NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploaded_by` varchar(100) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rot`
--

LOCK TABLES `rot` WRITE;
/*!40000 ALTER TABLE `rot` DISABLE KEYS */;
INSERT INTO `rot` VALUES (2,'Karima_Mufidah.pdf',0,'2022-10-02 10:44:51','Admin');
/*!40000 ALTER TABLE `rot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan_ibt`
--

DROP TABLE IF EXISTS `satuan_ibt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `satuan_ibt` (
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan_ibt`
--

LOCK TABLES `satuan_ibt` WRITE;
/*!40000 ALTER TABLE `satuan_ibt` DISABLE KEYS */;
INSERT INTO `satuan_ibt` VALUES ('MW'),('MVAR'),('I'),('%');
/*!40000 ALTER TABLE `satuan_ibt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan_pembangkit`
--

DROP TABLE IF EXISTS `satuan_pembangkit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `satuan_pembangkit` (
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan_pembangkit`
--

LOCK TABLES `satuan_pembangkit` WRITE;
/*!40000 ALTER TABLE `satuan_pembangkit` DISABLE KEYS */;
INSERT INTO `satuan_pembangkit` VALUES ('MW'),('MVAR'),('DMP'),('%');
/*!40000 ALTER TABLE `satuan_pembangkit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan_penghantar`
--

DROP TABLE IF EXISTS `satuan_penghantar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `satuan_penghantar` (
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan_penghantar`
--

LOCK TABLES `satuan_penghantar` WRITE;
/*!40000 ALTER TABLE `satuan_penghantar` DISABLE KEYS */;
INSERT INTO `satuan_penghantar` VALUES ('MW'),('MVAR'),('I'),('%');
/*!40000 ALTER TABLE `satuan_penghantar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `satuan_trafo`
--

DROP TABLE IF EXISTS `satuan_trafo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `satuan_trafo` (
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `satuan_trafo`
--

LOCK TABLES `satuan_trafo` WRITE;
/*!40000 ALTER TABLE `satuan_trafo` DISABLE KEYS */;
INSERT INTO `satuan_trafo` VALUES ('MW'),('MX'),('%');
/*!40000 ALTER TABLE `satuan_trafo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistem_perencanaan`
--

DROP TABLE IF EXISTS `sistem_perencanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sistem_perencanaan` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `sistem` varchar(100) NOT NULL,
  `ren_0030` decimal(19,2) DEFAULT NULL,
  `ren_0100` decimal(19,2) DEFAULT NULL,
  `ren_0130` decimal(19,2) DEFAULT NULL,
  `ren_0200` decimal(19,2) DEFAULT NULL,
  `ren_0230` decimal(19,2) DEFAULT NULL,
  `ren_0300` decimal(19,2) DEFAULT NULL,
  `ren_0330` decimal(19,2) DEFAULT NULL,
  `ren_0400` decimal(19,2) DEFAULT NULL,
  `ren_0430` decimal(19,2) DEFAULT NULL,
  `ren_0500` decimal(19,2) DEFAULT NULL,
  `ren_0530` decimal(19,2) DEFAULT NULL,
  `ren_0600` decimal(19,2) DEFAULT NULL,
  `ren_0630` decimal(19,2) DEFAULT NULL,
  `ren_0700` decimal(19,2) DEFAULT NULL,
  `ren_0730` decimal(19,2) DEFAULT NULL,
  `ren_0800` decimal(19,2) DEFAULT NULL,
  `ren_0830` decimal(19,2) DEFAULT NULL,
  `ren_0900` decimal(19,2) DEFAULT NULL,
  `ren_0930` decimal(19,2) DEFAULT NULL,
  `ren_1000` decimal(19,2) DEFAULT NULL,
  `ren_1030` decimal(19,2) DEFAULT NULL,
  `ren_1100` decimal(19,2) DEFAULT NULL,
  `ren_1130` decimal(19,2) DEFAULT NULL,
  `ren_1200` decimal(19,2) DEFAULT NULL,
  `ren_1230` decimal(19,2) DEFAULT NULL,
  `ren_1300` decimal(19,2) DEFAULT NULL,
  `ren_1330` decimal(19,2) DEFAULT NULL,
  `ren_1400` decimal(19,2) DEFAULT NULL,
  `ren_1430` decimal(19,2) DEFAULT NULL,
  `ren_1500` decimal(19,2) DEFAULT NULL,
  `ren_1530` decimal(19,2) DEFAULT NULL,
  `ren_1600` decimal(19,2) DEFAULT NULL,
  `ren_1630` decimal(19,2) DEFAULT NULL,
  `ren_1700` decimal(19,2) DEFAULT NULL,
  `ren_1730` decimal(19,2) DEFAULT NULL,
  `ren_1800` decimal(19,2) DEFAULT NULL,
  `ren_1830` decimal(19,2) DEFAULT NULL,
  `ren_1900` decimal(19,2) DEFAULT NULL,
  `ren_1930` decimal(19,2) DEFAULT NULL,
  `ren_2000` decimal(19,2) DEFAULT NULL,
  `ren_2030` decimal(19,2) DEFAULT NULL,
  `ren_2100` decimal(19,2) DEFAULT NULL,
  `ren_2130` decimal(19,2) DEFAULT NULL,
  `ren_2200` decimal(19,2) DEFAULT NULL,
  `ren_2230` decimal(19,2) DEFAULT NULL,
  `ren_2300` decimal(19,2) DEFAULT NULL,
  `ren_2330` decimal(19,2) DEFAULT NULL,
  `ren_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistem_perencanaan`
--

LOCK TABLES `sistem_perencanaan` WRITE;
/*!40000 ALTER TABLE `sistem_perencanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `sistem_perencanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistem_realisasi`
--

DROP TABLE IF EXISTS `sistem_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sistem_realisasi` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `sistem` varchar(100) NOT NULL,
  `eval_0030` decimal(19,2) DEFAULT NULL,
  `eval_0100` decimal(19,2) DEFAULT NULL,
  `eval_0130` decimal(19,2) DEFAULT NULL,
  `eval_0200` decimal(19,2) DEFAULT NULL,
  `eval_0230` decimal(19,2) DEFAULT NULL,
  `eval_0300` decimal(19,2) DEFAULT NULL,
  `eval_0330` decimal(19,2) DEFAULT NULL,
  `eval_0400` decimal(19,2) DEFAULT NULL,
  `eval_0430` decimal(19,2) DEFAULT NULL,
  `eval_0500` decimal(19,2) DEFAULT NULL,
  `eval_0530` decimal(19,2) DEFAULT NULL,
  `eval_0600` decimal(19,2) DEFAULT NULL,
  `eval_0630` decimal(19,2) DEFAULT NULL,
  `eval_0700` decimal(19,2) DEFAULT NULL,
  `eval_0730` decimal(19,2) DEFAULT NULL,
  `eval_0800` decimal(19,2) DEFAULT NULL,
  `eval_0830` decimal(19,2) DEFAULT NULL,
  `eval_0900` decimal(19,2) DEFAULT NULL,
  `eval_0930` decimal(19,2) DEFAULT NULL,
  `eval_1000` decimal(19,2) DEFAULT NULL,
  `eval_1030` decimal(19,2) DEFAULT NULL,
  `eval_1100` decimal(19,2) DEFAULT NULL,
  `eval_1130` decimal(19,2) DEFAULT NULL,
  `eval_1200` decimal(19,2) DEFAULT NULL,
  `eval_1230` decimal(19,2) DEFAULT NULL,
  `eval_1300` decimal(19,2) DEFAULT NULL,
  `eval_1330` decimal(19,2) DEFAULT NULL,
  `eval_1400` decimal(19,2) DEFAULT NULL,
  `eval_1430` decimal(19,2) DEFAULT NULL,
  `eval_1500` decimal(19,2) DEFAULT NULL,
  `eval_1530` decimal(19,2) DEFAULT NULL,
  `eval_1600` decimal(19,2) DEFAULT NULL,
  `eval_1630` decimal(19,2) DEFAULT NULL,
  `eval_1700` decimal(19,2) DEFAULT NULL,
  `eval_1730` decimal(19,2) DEFAULT NULL,
  `eval_1800` decimal(19,2) DEFAULT NULL,
  `eval_1830` decimal(19,2) DEFAULT NULL,
  `eval_1900` decimal(19,2) DEFAULT NULL,
  `eval_1930` decimal(19,2) DEFAULT NULL,
  `eval_2000` decimal(19,2) DEFAULT NULL,
  `eval_2030` decimal(19,2) DEFAULT NULL,
  `eval_2100` decimal(19,2) DEFAULT NULL,
  `eval_2130` decimal(19,2) DEFAULT NULL,
  `eval_2200` decimal(19,2) DEFAULT NULL,
  `eval_2230` decimal(19,2) DEFAULT NULL,
  `eval_2300` decimal(19,2) DEFAULT NULL,
  `eval_2330` decimal(19,2) DEFAULT NULL,
  `eval_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistem_realisasi`
--

LOCK TABLES `sistem_realisasi` WRITE;
/*!40000 ALTER TABLE `sistem_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `sistem_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subsistem_perencanaan`
--

DROP TABLE IF EXISTS `subsistem_perencanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subsistem_perencanaan` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `subsistem` varchar(100) NOT NULL,
  `pasokan` varchar(20) NOT NULL,
  `ren_0030` decimal(19,2) DEFAULT NULL,
  `ren_0100` decimal(19,2) DEFAULT NULL,
  `ren_0130` decimal(19,2) DEFAULT NULL,
  `ren_0200` decimal(19,2) DEFAULT NULL,
  `ren_0230` decimal(19,2) DEFAULT NULL,
  `ren_0300` decimal(19,2) DEFAULT NULL,
  `ren_0330` decimal(19,2) DEFAULT NULL,
  `ren_0400` decimal(19,2) DEFAULT NULL,
  `ren_0430` decimal(19,2) DEFAULT NULL,
  `ren_0500` decimal(19,2) DEFAULT NULL,
  `ren_0530` decimal(19,2) DEFAULT NULL,
  `ren_0600` decimal(19,2) DEFAULT NULL,
  `ren_0630` decimal(19,2) DEFAULT NULL,
  `ren_0700` decimal(19,2) DEFAULT NULL,
  `ren_0730` decimal(19,2) DEFAULT NULL,
  `ren_0800` decimal(19,2) DEFAULT NULL,
  `ren_0830` decimal(19,2) DEFAULT NULL,
  `ren_0900` decimal(19,2) DEFAULT NULL,
  `ren_0930` decimal(19,2) DEFAULT NULL,
  `ren_1000` decimal(19,2) DEFAULT NULL,
  `ren_1030` decimal(19,2) DEFAULT NULL,
  `ren_1100` decimal(19,2) DEFAULT NULL,
  `ren_1130` decimal(19,2) DEFAULT NULL,
  `ren_1200` decimal(19,2) DEFAULT NULL,
  `ren_1230` decimal(19,2) DEFAULT NULL,
  `ren_1300` decimal(19,2) DEFAULT NULL,
  `ren_1330` decimal(19,2) DEFAULT NULL,
  `ren_1400` decimal(19,2) DEFAULT NULL,
  `ren_1430` decimal(19,2) DEFAULT NULL,
  `ren_1500` decimal(19,2) DEFAULT NULL,
  `ren_1530` decimal(19,2) DEFAULT NULL,
  `ren_1600` decimal(19,2) DEFAULT NULL,
  `ren_1630` decimal(19,2) DEFAULT NULL,
  `ren_1700` decimal(19,2) DEFAULT NULL,
  `ren_1730` decimal(19,2) DEFAULT NULL,
  `ren_1800` decimal(19,2) DEFAULT NULL,
  `ren_1830` decimal(19,2) DEFAULT NULL,
  `ren_1900` decimal(19,2) DEFAULT NULL,
  `ren_1930` decimal(19,2) DEFAULT NULL,
  `ren_2000` decimal(19,2) DEFAULT NULL,
  `ren_2030` decimal(19,2) DEFAULT NULL,
  `ren_2100` decimal(19,2) DEFAULT NULL,
  `ren_2130` decimal(19,2) DEFAULT NULL,
  `ren_2200` decimal(19,2) DEFAULT NULL,
  `ren_2230` decimal(19,2) DEFAULT NULL,
  `ren_2300` decimal(19,2) DEFAULT NULL,
  `ren_2330` decimal(19,2) DEFAULT NULL,
  `ren_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsistem_perencanaan`
--

LOCK TABLES `subsistem_perencanaan` WRITE;
/*!40000 ALTER TABLE `subsistem_perencanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `subsistem_perencanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subsistem_realisasi`
--

DROP TABLE IF EXISTS `subsistem_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subsistem_realisasi` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `subsistem` varchar(100) NOT NULL,
  `pasokan` varchar(20) NOT NULL,
  `eval_0030` decimal(19,2) DEFAULT NULL,
  `eval_0100` decimal(19,2) DEFAULT NULL,
  `eval_0130` decimal(19,2) DEFAULT NULL,
  `eval_0200` decimal(19,2) DEFAULT NULL,
  `eval_0230` decimal(19,2) DEFAULT NULL,
  `eval_0300` decimal(19,2) DEFAULT NULL,
  `eval_0330` decimal(19,2) DEFAULT NULL,
  `eval_0400` decimal(19,2) DEFAULT NULL,
  `eval_0430` decimal(19,2) DEFAULT NULL,
  `eval_0500` decimal(19,2) DEFAULT NULL,
  `eval_0530` decimal(19,2) DEFAULT NULL,
  `eval_0600` decimal(19,2) DEFAULT NULL,
  `eval_0630` decimal(19,2) DEFAULT NULL,
  `eval_0700` decimal(19,2) DEFAULT NULL,
  `eval_0730` decimal(19,2) DEFAULT NULL,
  `eval_0800` decimal(19,2) DEFAULT NULL,
  `eval_0830` decimal(19,2) DEFAULT NULL,
  `eval_0900` decimal(19,2) DEFAULT NULL,
  `eval_0930` decimal(19,2) DEFAULT NULL,
  `eval_1000` decimal(19,2) DEFAULT NULL,
  `eval_1030` decimal(19,2) DEFAULT NULL,
  `eval_1100` decimal(19,2) DEFAULT NULL,
  `eval_1130` decimal(19,2) DEFAULT NULL,
  `eval_1200` decimal(19,2) DEFAULT NULL,
  `eval_1230` decimal(19,2) DEFAULT NULL,
  `eval_1300` decimal(19,2) DEFAULT NULL,
  `eval_1330` decimal(19,2) DEFAULT NULL,
  `eval_1400` decimal(19,2) DEFAULT NULL,
  `eval_1430` decimal(19,2) DEFAULT NULL,
  `eval_1500` decimal(19,2) DEFAULT NULL,
  `eval_1530` decimal(19,2) DEFAULT NULL,
  `eval_1600` decimal(19,2) DEFAULT NULL,
  `eval_1630` decimal(19,2) DEFAULT NULL,
  `eval_1700` decimal(19,2) DEFAULT NULL,
  `eval_1730` decimal(19,2) DEFAULT NULL,
  `eval_1800` decimal(19,2) DEFAULT NULL,
  `eval_1830` decimal(19,2) DEFAULT NULL,
  `eval_1900` decimal(19,2) DEFAULT NULL,
  `eval_1930` decimal(19,2) DEFAULT NULL,
  `eval_2000` decimal(19,2) DEFAULT NULL,
  `eval_2030` decimal(19,2) DEFAULT NULL,
  `eval_2100` decimal(19,2) DEFAULT NULL,
  `eval_2130` decimal(19,2) DEFAULT NULL,
  `eval_2200` decimal(19,2) DEFAULT NULL,
  `eval_2230` decimal(19,2) DEFAULT NULL,
  `eval_2300` decimal(19,2) DEFAULT NULL,
  `eval_2330` decimal(19,2) DEFAULT NULL,
  `eval_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsistem_realisasi`
--

LOCK TABLES `subsistem_realisasi` WRITE;
/*!40000 ALTER TABLE `subsistem_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `subsistem_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tegangan`
--

DROP TABLE IF EXISTS `tegangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tegangan` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `gardu_induk` varchar(100) NOT NULL,
  `busbar` varchar(100) DEFAULT NULL,
  `kv` int DEFAULT NULL,
  `ren_0030` decimal(19,2) DEFAULT NULL,
  `eval_0030` decimal(19,2) DEFAULT NULL,
  `ren_0100` decimal(19,2) DEFAULT NULL,
  `eval_0100` decimal(19,2) DEFAULT NULL,
  `ren_0130` decimal(19,2) DEFAULT NULL,
  `eval_0130` decimal(19,2) DEFAULT NULL,
  `ren_0200` decimal(19,2) DEFAULT NULL,
  `eval_0200` decimal(19,2) DEFAULT NULL,
  `ren_0230` decimal(19,2) DEFAULT NULL,
  `eval_0230` decimal(19,2) DEFAULT NULL,
  `ren_0300` decimal(19,2) DEFAULT NULL,
  `eval_0300` decimal(19,2) DEFAULT NULL,
  `ren_0330` decimal(19,2) DEFAULT NULL,
  `eval_0330` decimal(19,2) DEFAULT NULL,
  `ren_0400` decimal(19,2) DEFAULT NULL,
  `eval_0400` decimal(19,2) DEFAULT NULL,
  `ren_0430` decimal(19,2) DEFAULT NULL,
  `eval_0430` decimal(19,2) DEFAULT NULL,
  `ren_0500` decimal(19,2) DEFAULT NULL,
  `eval_0500` decimal(19,2) DEFAULT NULL,
  `ren_0530` decimal(19,2) DEFAULT NULL,
  `eval_0530` decimal(19,2) DEFAULT NULL,
  `ren_0600` decimal(19,2) DEFAULT NULL,
  `eval_0600` decimal(19,2) DEFAULT NULL,
  `ren_0630` decimal(19,2) DEFAULT NULL,
  `eval_0630` decimal(19,2) DEFAULT NULL,
  `ren_0700` decimal(19,2) DEFAULT NULL,
  `eval_0700` decimal(19,2) DEFAULT NULL,
  `ren_0730` decimal(19,2) DEFAULT NULL,
  `eval_0730` decimal(19,2) DEFAULT NULL,
  `ren_0800` decimal(19,2) DEFAULT NULL,
  `eval_0800` decimal(19,2) DEFAULT NULL,
  `ren_0830` decimal(19,2) DEFAULT NULL,
  `eval_0830` decimal(19,2) DEFAULT NULL,
  `ren_0900` decimal(19,2) DEFAULT NULL,
  `eval_0900` decimal(19,2) DEFAULT NULL,
  `ren_0930` decimal(19,2) DEFAULT NULL,
  `eval_0930` decimal(19,2) DEFAULT NULL,
  `ren_1000` decimal(19,2) DEFAULT NULL,
  `eval_1000` decimal(19,2) DEFAULT NULL,
  `ren_1030` decimal(19,2) DEFAULT NULL,
  `eval_1030` decimal(19,2) DEFAULT NULL,
  `ren_1100` decimal(19,2) DEFAULT NULL,
  `eval_1100` decimal(19,2) DEFAULT NULL,
  `ren_1130` decimal(19,2) DEFAULT NULL,
  `eval_1130` decimal(19,2) DEFAULT NULL,
  `ren_1200` decimal(19,2) DEFAULT NULL,
  `eval_1200` decimal(19,2) DEFAULT NULL,
  `ren_1230` decimal(19,2) DEFAULT NULL,
  `eval_1230` decimal(19,2) DEFAULT NULL,
  `ren_1300` decimal(19,2) DEFAULT NULL,
  `eval_1300` decimal(19,2) DEFAULT NULL,
  `ren_1330` decimal(19,2) DEFAULT NULL,
  `eval_1330` decimal(19,2) DEFAULT NULL,
  `ren_1400` decimal(19,2) DEFAULT NULL,
  `eval_1400` decimal(19,2) DEFAULT NULL,
  `ren_1430` decimal(19,2) DEFAULT NULL,
  `eval_1430` decimal(19,2) DEFAULT NULL,
  `ren_1500` decimal(19,2) DEFAULT NULL,
  `eval_1500` decimal(19,2) DEFAULT NULL,
  `ren_1530` decimal(19,2) DEFAULT NULL,
  `eval_1530` decimal(19,2) DEFAULT NULL,
  `ren_1600` decimal(19,2) DEFAULT NULL,
  `eval_1600` decimal(19,2) DEFAULT NULL,
  `ren_1630` decimal(19,2) DEFAULT NULL,
  `eval_1630` decimal(19,2) DEFAULT NULL,
  `ren_1700` decimal(19,2) DEFAULT NULL,
  `eval_1700` decimal(19,2) DEFAULT NULL,
  `ren_1730` decimal(19,2) DEFAULT NULL,
  `eval_1730` decimal(19,2) DEFAULT NULL,
  `ren_1800` decimal(19,2) DEFAULT NULL,
  `eval_1800` decimal(19,2) DEFAULT NULL,
  `ren_1830` decimal(19,2) DEFAULT NULL,
  `eval_1830` decimal(19,2) DEFAULT NULL,
  `ren_1900` decimal(19,2) DEFAULT NULL,
  `eval_1900` decimal(19,2) DEFAULT NULL,
  `ren_1930` decimal(19,2) DEFAULT NULL,
  `eval_1930` decimal(19,2) DEFAULT NULL,
  `ren_2000` decimal(19,2) DEFAULT NULL,
  `eval_2000` decimal(19,2) DEFAULT NULL,
  `ren_2030` decimal(19,2) DEFAULT NULL,
  `eval_2030` decimal(19,2) DEFAULT NULL,
  `ren_2100` decimal(19,2) DEFAULT NULL,
  `eval_2100` decimal(19,2) DEFAULT NULL,
  `ren_2130` decimal(19,2) DEFAULT NULL,
  `eval_2130` decimal(19,2) DEFAULT NULL,
  `ren_2200` decimal(19,2) DEFAULT NULL,
  `eval_2200` decimal(19,2) DEFAULT NULL,
  `ren_2230` decimal(19,2) DEFAULT NULL,
  `eval_2230` decimal(19,2) DEFAULT NULL,
  `ren_2300` decimal(19,2) DEFAULT NULL,
  `eval_2300` decimal(19,2) DEFAULT NULL,
  `ren_2330` decimal(19,2) DEFAULT NULL,
  `eval_2330` decimal(19,2) DEFAULT NULL,
  `ren_2400` decimal(19,2) DEFAULT NULL,
  `eval_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tegangan`
--

LOCK TABLES `tegangan` WRITE;
/*!40000 ALTER TABLE `tegangan` DISABLE KEYS */;
INSERT INTO `tegangan` VALUES (2,'2022-10-15','surabaya','busbar a',12,89.00,88.00,90.00,83.00,58.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-10-28 19:21:02','admin',NULL,''),(6,'2022-10-28','malang','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-10-28 21:22:35','Admin',NULL,NULL),(8,'2022-10-01','kediri','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-10-28 21:26:47','Admin',NULL,NULL),(9,'2022-10-02','pasuruan','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-10-28 21:48:29','Admin',NULL,NULL),(10,'2022-09-30','gresik','',NULL,90.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-10-28 22:04:37','Admin',NULL,NULL),(11,'2022-10-08','gresik','',NULL,13.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2022-10-28 22:30:26','Admin',NULL,NULL),(12,'2022-10-12','madura','',NULL,44.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'2022-10-28 22:31:54','Admin',NULL,NULL);
/*!40000 ALTER TABLE `tegangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tegangan_perencanaan`
--

DROP TABLE IF EXISTS `tegangan_perencanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tegangan_perencanaan` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `gardu_induk` varchar(100) NOT NULL,
  `busbar` varchar(100) DEFAULT NULL,
  `kv` int DEFAULT NULL,
  `ren_0030` decimal(19,2) DEFAULT NULL,
  `ren_0100` decimal(19,2) DEFAULT NULL,
  `ren_0130` decimal(19,2) DEFAULT NULL,
  `ren_0200` decimal(19,2) DEFAULT NULL,
  `ren_0230` decimal(19,2) DEFAULT NULL,
  `ren_0300` decimal(19,2) DEFAULT NULL,
  `ren_0330` decimal(19,2) DEFAULT NULL,
  `ren_0400` decimal(19,2) DEFAULT NULL,
  `ren_0430` decimal(19,2) DEFAULT NULL,
  `ren_0500` decimal(19,2) DEFAULT NULL,
  `ren_0530` decimal(19,2) DEFAULT NULL,
  `ren_0600` decimal(19,2) DEFAULT NULL,
  `ren_0630` decimal(19,2) DEFAULT NULL,
  `ren_0700` decimal(19,2) DEFAULT NULL,
  `ren_0730` decimal(19,2) DEFAULT NULL,
  `ren_0800` decimal(19,2) DEFAULT NULL,
  `ren_0830` decimal(19,2) DEFAULT NULL,
  `ren_0900` decimal(19,2) DEFAULT NULL,
  `ren_0930` decimal(19,2) DEFAULT NULL,
  `ren_1000` decimal(19,2) DEFAULT NULL,
  `ren_1030` decimal(19,2) DEFAULT NULL,
  `ren_1100` decimal(19,2) DEFAULT NULL,
  `ren_1130` decimal(19,2) DEFAULT NULL,
  `ren_1200` decimal(19,2) DEFAULT NULL,
  `ren_1230` decimal(19,2) DEFAULT NULL,
  `ren_1300` decimal(19,2) DEFAULT NULL,
  `ren_1330` decimal(19,2) DEFAULT NULL,
  `ren_1400` decimal(19,2) DEFAULT NULL,
  `ren_1430` decimal(19,2) DEFAULT NULL,
  `ren_1500` decimal(19,2) DEFAULT NULL,
  `ren_1530` decimal(19,2) DEFAULT NULL,
  `ren_1600` decimal(19,2) DEFAULT NULL,
  `ren_1630` decimal(19,2) DEFAULT NULL,
  `ren_1700` decimal(19,2) DEFAULT NULL,
  `ren_1730` decimal(19,2) DEFAULT NULL,
  `ren_1800` decimal(19,2) DEFAULT NULL,
  `ren_1830` decimal(19,2) DEFAULT NULL,
  `ren_1900` decimal(19,2) DEFAULT NULL,
  `ren_1930` decimal(19,2) DEFAULT NULL,
  `ren_2000` decimal(19,2) DEFAULT NULL,
  `ren_2030` decimal(19,2) DEFAULT NULL,
  `ren_2100` decimal(19,2) DEFAULT NULL,
  `ren_2130` decimal(19,2) DEFAULT NULL,
  `ren_2200` decimal(19,2) DEFAULT NULL,
  `ren_2230` decimal(19,2) DEFAULT NULL,
  `ren_2300` decimal(19,2) DEFAULT NULL,
  `ren_2330` decimal(19,2) DEFAULT NULL,
  `ren_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tegangan_perencanaan`
--

LOCK TABLES `tegangan_perencanaan` WRITE;
/*!40000 ALTER TABLE `tegangan_perencanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tegangan_perencanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tegangan_realisasi`
--

DROP TABLE IF EXISTS `tegangan_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tegangan_realisasi` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `gardu_induk` varchar(100) NOT NULL,
  `busbar` varchar(100) DEFAULT NULL,
  `kv` int DEFAULT NULL,
  `eval_0030` decimal(19,2) DEFAULT NULL,
  `eval_0100` decimal(19,2) DEFAULT NULL,
  `eval_0130` decimal(19,2) DEFAULT NULL,
  `eval_0200` decimal(19,2) DEFAULT NULL,
  `eval_0230` decimal(19,2) DEFAULT NULL,
  `eval_0300` decimal(19,2) DEFAULT NULL,
  `eval_0330` decimal(19,2) DEFAULT NULL,
  `eval_0400` decimal(19,2) DEFAULT NULL,
  `eval_0430` decimal(19,2) DEFAULT NULL,
  `eval_0500` decimal(19,2) DEFAULT NULL,
  `eval_0530` decimal(19,2) DEFAULT NULL,
  `eval_0600` decimal(19,2) DEFAULT NULL,
  `eval_0630` decimal(19,2) DEFAULT NULL,
  `eval_0700` decimal(19,2) DEFAULT NULL,
  `eval_0730` decimal(19,2) DEFAULT NULL,
  `eval_0800` decimal(19,2) DEFAULT NULL,
  `eval_0830` decimal(19,2) DEFAULT NULL,
  `eval_0900` decimal(19,2) DEFAULT NULL,
  `eval_0930` decimal(19,2) DEFAULT NULL,
  `eval_1000` decimal(19,2) DEFAULT NULL,
  `eval_1030` decimal(19,2) DEFAULT NULL,
  `eval_1100` decimal(19,2) DEFAULT NULL,
  `eval_1130` decimal(19,2) DEFAULT NULL,
  `eval_1200` decimal(19,2) DEFAULT NULL,
  `eval_1230` decimal(19,2) DEFAULT NULL,
  `eval_1300` decimal(19,2) DEFAULT NULL,
  `eval_1330` decimal(19,2) DEFAULT NULL,
  `eval_1400` decimal(19,2) DEFAULT NULL,
  `eval_1430` decimal(19,2) DEFAULT NULL,
  `eval_1500` decimal(19,2) DEFAULT NULL,
  `eval_1530` decimal(19,2) DEFAULT NULL,
  `eval_1600` decimal(19,2) DEFAULT NULL,
  `eval_1630` decimal(19,2) DEFAULT NULL,
  `eval_1700` decimal(19,2) DEFAULT NULL,
  `eval_1730` decimal(19,2) DEFAULT NULL,
  `eval_1800` decimal(19,2) DEFAULT NULL,
  `eval_1830` decimal(19,2) DEFAULT NULL,
  `eval_1900` decimal(19,2) DEFAULT NULL,
  `eval_1930` decimal(19,2) DEFAULT NULL,
  `eval_2000` decimal(19,2) DEFAULT NULL,
  `eval_2030` decimal(19,2) DEFAULT NULL,
  `eval_2100` decimal(19,2) DEFAULT NULL,
  `eval_2130` decimal(19,2) DEFAULT NULL,
  `eval_2200` decimal(19,2) DEFAULT NULL,
  `eval_2230` decimal(19,2) DEFAULT NULL,
  `eval_2300` decimal(19,2) DEFAULT NULL,
  `eval_2330` decimal(19,2) DEFAULT NULL,
  `eval_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tegangan_realisasi`
--

LOCK TABLES `tegangan_realisasi` WRITE;
/*!40000 ALTER TABLE `tegangan_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tegangan_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tegangan_realisasi_table`
--

DROP TABLE IF EXISTS `tegangan_realisasi_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tegangan_realisasi_table` (
  `logged_at` timestamp NOT NULL,
  `nama` varchar(300) NOT NULL,
  `kv` int DEFAULT NULL,
  `percentage` int DEFAULT NULL,
  PRIMARY KEY (`logged_at`,`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tegangan_realisasi_table`
--

LOCK TABLES `tegangan_realisasi_table` WRITE;
/*!40000 ALTER TABLE `tegangan_realisasi_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `tegangan_realisasi_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trafo_perencanaan`
--

DROP TABLE IF EXISTS `trafo_perencanaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trafo_perencanaan` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `trafo` varchar(150) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `ren_0030` decimal(19,2) DEFAULT NULL,
  `ren_0100` decimal(19,2) DEFAULT NULL,
  `ren_0130` decimal(19,2) DEFAULT NULL,
  `ren_0200` decimal(19,2) DEFAULT NULL,
  `ren_0230` decimal(19,2) DEFAULT NULL,
  `ren_0300` decimal(19,2) DEFAULT NULL,
  `ren_0330` decimal(19,2) DEFAULT NULL,
  `ren_0400` decimal(19,2) DEFAULT NULL,
  `ren_0430` decimal(19,2) DEFAULT NULL,
  `ren_0500` decimal(19,2) DEFAULT NULL,
  `ren_0530` decimal(19,2) DEFAULT NULL,
  `ren_0600` decimal(19,2) DEFAULT NULL,
  `ren_0630` decimal(19,2) DEFAULT NULL,
  `ren_0700` decimal(19,2) DEFAULT NULL,
  `ren_0730` decimal(19,2) DEFAULT NULL,
  `ren_0800` decimal(19,2) DEFAULT NULL,
  `ren_0830` decimal(19,2) DEFAULT NULL,
  `ren_0900` decimal(19,2) DEFAULT NULL,
  `ren_0930` decimal(19,2) DEFAULT NULL,
  `ren_1000` decimal(19,2) DEFAULT NULL,
  `ren_1030` decimal(19,2) DEFAULT NULL,
  `ren_1100` decimal(19,2) DEFAULT NULL,
  `ren_1130` decimal(19,2) DEFAULT NULL,
  `ren_1200` decimal(19,2) DEFAULT NULL,
  `ren_1230` decimal(19,2) DEFAULT NULL,
  `ren_1300` decimal(19,2) DEFAULT NULL,
  `ren_1330` decimal(19,2) DEFAULT NULL,
  `ren_1400` decimal(19,2) DEFAULT NULL,
  `ren_1430` decimal(19,2) DEFAULT NULL,
  `ren_1500` decimal(19,2) DEFAULT NULL,
  `ren_1530` decimal(19,2) DEFAULT NULL,
  `ren_1600` decimal(19,2) DEFAULT NULL,
  `ren_1630` decimal(19,2) DEFAULT NULL,
  `ren_1700` decimal(19,2) DEFAULT NULL,
  `ren_1730` decimal(19,2) DEFAULT NULL,
  `ren_1800` decimal(19,2) DEFAULT NULL,
  `ren_1830` decimal(19,2) DEFAULT NULL,
  `ren_1900` decimal(19,2) DEFAULT NULL,
  `ren_1930` decimal(19,2) DEFAULT NULL,
  `ren_2000` decimal(19,2) DEFAULT NULL,
  `ren_2030` decimal(19,2) DEFAULT NULL,
  `ren_2100` decimal(19,2) DEFAULT NULL,
  `ren_2130` decimal(19,2) DEFAULT NULL,
  `ren_2200` decimal(19,2) DEFAULT NULL,
  `ren_2230` decimal(19,2) DEFAULT NULL,
  `ren_2300` decimal(19,2) DEFAULT NULL,
  `ren_2330` decimal(19,2) DEFAULT NULL,
  `ren_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trafo_perencanaan`
--

LOCK TABLES `trafo_perencanaan` WRITE;
/*!40000 ALTER TABLE `trafo_perencanaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `trafo_perencanaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trafo_realisasi`
--

DROP TABLE IF EXISTS `trafo_realisasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trafo_realisasi` (
  `data_id` int unsigned NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `trafo` varchar(150) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `eval_0030` decimal(19,2) DEFAULT NULL,
  `eval_0100` decimal(19,2) DEFAULT NULL,
  `eval_0130` decimal(19,2) DEFAULT NULL,
  `eval_0200` decimal(19,2) DEFAULT NULL,
  `eval_0230` decimal(19,2) DEFAULT NULL,
  `eval_0300` decimal(19,2) DEFAULT NULL,
  `eval_0330` decimal(19,2) DEFAULT NULL,
  `eval_0400` decimal(19,2) DEFAULT NULL,
  `eval_0430` decimal(19,2) DEFAULT NULL,
  `eval_0500` decimal(19,2) DEFAULT NULL,
  `eval_0530` decimal(19,2) DEFAULT NULL,
  `eval_0600` decimal(19,2) DEFAULT NULL,
  `eval_0630` decimal(19,2) DEFAULT NULL,
  `eval_0700` decimal(19,2) DEFAULT NULL,
  `eval_0730` decimal(19,2) DEFAULT NULL,
  `eval_0800` decimal(19,2) DEFAULT NULL,
  `eval_0830` decimal(19,2) DEFAULT NULL,
  `eval_0900` decimal(19,2) DEFAULT NULL,
  `eval_0930` decimal(19,2) DEFAULT NULL,
  `eval_1000` decimal(19,2) DEFAULT NULL,
  `eval_1030` decimal(19,2) DEFAULT NULL,
  `eval_1100` decimal(19,2) DEFAULT NULL,
  `eval_1130` decimal(19,2) DEFAULT NULL,
  `eval_1200` decimal(19,2) DEFAULT NULL,
  `eval_1230` decimal(19,2) DEFAULT NULL,
  `eval_1300` decimal(19,2) DEFAULT NULL,
  `eval_1330` decimal(19,2) DEFAULT NULL,
  `eval_1400` decimal(19,2) DEFAULT NULL,
  `eval_1430` decimal(19,2) DEFAULT NULL,
  `eval_1500` decimal(19,2) DEFAULT NULL,
  `eval_1530` decimal(19,2) DEFAULT NULL,
  `eval_1600` decimal(19,2) DEFAULT NULL,
  `eval_1630` decimal(19,2) DEFAULT NULL,
  `eval_1700` decimal(19,2) DEFAULT NULL,
  `eval_1730` decimal(19,2) DEFAULT NULL,
  `eval_1800` decimal(19,2) DEFAULT NULL,
  `eval_1830` decimal(19,2) DEFAULT NULL,
  `eval_1900` decimal(19,2) DEFAULT NULL,
  `eval_1930` decimal(19,2) DEFAULT NULL,
  `eval_2000` decimal(19,2) DEFAULT NULL,
  `eval_2030` decimal(19,2) DEFAULT NULL,
  `eval_2100` decimal(19,2) DEFAULT NULL,
  `eval_2130` decimal(19,2) DEFAULT NULL,
  `eval_2200` decimal(19,2) DEFAULT NULL,
  `eval_2230` decimal(19,2) DEFAULT NULL,
  `eval_2300` decimal(19,2) DEFAULT NULL,
  `eval_2330` decimal(19,2) DEFAULT NULL,
  `eval_2400` decimal(19,2) DEFAULT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trafo_realisasi`
--

LOCK TABLES `trafo_realisasi` WRITE;
/*!40000 ALTER TABLE `trafo_realisasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `trafo_realisasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trafo_realisasi_table`
--

DROP TABLE IF EXISTS `trafo_realisasi_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trafo_realisasi_table` (
  `logged_at` timestamp NOT NULL,
  `nama` varchar(300) NOT NULL,
  `mw` double DEFAULT NULL,
  `mx` double DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  PRIMARY KEY (`logged_at`,`nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trafo_realisasi_table`
--

LOCK TABLES `trafo_realisasi_table` WRITE;
/*!40000 ALTER TABLE `trafo_realisasi_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `trafo_realisasi_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `role` int NOT NULL COMMENT '1:admin, 2:operator',
  `image` varchar(200) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','admin','d033e22ae348aeb5660fc2140aec35850c4da997','Manager',1,'182-1829287_cammy-lin-ux-designer-circle-picture-profile-girl.png','0000-00-00 00:00:00','2022-10-01 21:51:51'),(24,'karima','karima','bce8a055bdb70470d0d3436f08a579b26d0b5451',NULL,1,'default.png','2022-10-01 11:59:19',NULL),(25,'operator','operator','bce8a055bdb70470d0d3436f08a579b26d0b5451',NULL,2,'default.png','2022-10-01 17:39:22',NULL),(26,'andika','andika','3a4b956145eddc64ae34d5d5a391f154d8ca6736',NULL,2,'IMG_3345.PNG','2022-10-04 19:48:26','2022-10-04 19:49:05');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07 11:40:57
