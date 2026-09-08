-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: jams_db
-- ------------------------------------------------------
-- Server version	8.4.9

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application` (
  `id` int NOT NULL AUTO_INCREMENT,
  `app_no` varchar(50) NOT NULL,
  `user_id` int NOT NULL,
  `adequate_arrangement_check` int NOT NULL DEFAULT '0',
  `jammer_accounted` int NOT NULL DEFAULT '0',
  `non_intereference` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `current_status` int NOT NULL DEFAULT '1',
  `isactive` int NOT NULL DEFAULT '1',
  `is_single_exam` int NOT NULL DEFAULT '1',
  `is_single_date` int NOT NULL DEFAULT '0',
  `centre_list_ready` int NOT NULL DEFAULT '1',
  `contact_person` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `organisation` varchar(255) DEFAULT NULL,
  `organisation_type` varchar(255) DEFAULT NULL,
  `undertaking` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_no_UNIQUE` (`app_no`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES (34,'UPSC/202609/0017',6,1,1,1,'2026-09-07 09:05:55',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(35,'UPSC/202609/0018',6,1,1,1,'2026-09-07 09:08:47',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(36,'UPSC/202609/0019',6,1,1,1,'2026-09-07 09:12:08',1,1,0,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(37,'UPSC/202609/0020',6,1,1,1,'2026-09-07 09:22:14',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(40,'UPSC/202609/0023',6,1,1,1,'2026-09-07 09:34:19',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(41,'UPSC/202609/0024',6,1,1,1,'2026-09-07 09:42:29',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(42,'UPSC/202609/0025',6,1,1,1,'2026-09-07 09:45:07',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(43,'UPSC/202609/0026',6,1,1,1,'2026-09-07 09:47:53',1,1,0,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(44,'UPSC/202609/0027',6,1,1,1,'2026-09-07 10:04:22',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(45,'UPSC/202609/0028',6,1,1,1,'2026-09-07 10:31:32',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(46,'UPSC/202609/0029',6,1,1,1,'2026-09-07 10:36:15',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(47,'UPSC/202609/0030',6,1,1,1,'2026-09-07 10:39:59',1,1,0,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(48,'UPSC/202609/0031',6,1,1,1,'2026-09-07 11:14:47',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(49,'UPSC/202609/0032',6,1,1,1,'2026-09-07 11:19:29',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(50,'UPSC/202609/0033',6,1,1,1,'2026-09-07 11:52:34',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(51,'UPSC/202609/0034',6,1,1,1,'2026-09-07 12:20:10',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(52,'UPSC/202609/0035',6,1,1,1,'2026-09-07 12:45:12',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(53,'UPSC/202609/0036',6,1,1,1,'2026-09-07 13:01:37',1,1,0,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(54,'UPSC/202609/0037',6,1,1,1,'2026-09-07 13:20:24',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(55,'UPSC/202609/0038',6,1,1,1,'2026-09-08 05:17:18',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(56,'UPSC/202609/0039',6,1,1,1,'2026-09-08 06:09:57',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(57,'UPSC/202609/0040',6,1,1,1,'2026-09-08 06:12:05',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(58,'UPSC/202609/0041',6,1,1,1,'2026-09-08 06:48:59',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(59,'UPSC/202609/0042',6,1,1,1,'2026-09-08 07:25:42',3,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(60,'UPSC/202609/0043',6,1,1,1,'2026-09-08 09:00:07',3,1,1,1,1,'Rohit Kumar','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(61,'UPSC/202609/0044',6,1,1,1,'2026-09-08 09:03:50',3,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(62,'UPSC/202609/0045',6,1,1,1,'2026-09-08 09:23:36',3,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(63,'UPSC/202609/0046',6,1,1,1,'2026-09-08 09:25:28',3,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission',''),(64,'UPSC/202609/0047',6,1,1,1,'2026-09-08 10:20:12',1,1,1,1,1,'Rohit','rkcsid1234@gmail.com','98013121222','UPSC','Recruitment Commission','');
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_centre_mapping`
--

DROP TABLE IF EXISTS `application_centre_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_centre_mapping` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `centre_name` varchar(1000) NOT NULL,
  `centre_address` varchar(5000) DEFAULT NULL,
  `centre_coordinates` varchar(255) DEFAULT NULL,
  `coorrdinator_name` varchar(500) DEFAULT NULL,
  `coordinator_mobile_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_centre_mapping`
--

LOCK TABLES `application_centre_mapping` WRITE;
/*!40000 ALTER TABLE `application_centre_mapping` DISABLE KEYS */;
INSERT INTO `application_centre_mapping` VALUES (19,34,'','','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(20,34,'','','Joint Entrance Examination (JEE) Main 2026','Centre Address2','28.6139, 77.2090','',''),(21,35,'','','Joint Entrance Examination (JEE) Main 2026','Centre Address111','28.6139, 77.2090','',''),(22,35,'','','UPSC','Centre Address22','28.6139, 77.2090','',''),(23,36,'','','UPSC','Centre Address1','28.6139, 77.2090','',''),(24,36,'','','UPSC','Centre Address22','28.6139, 77.2090','',''),(25,36,'','','UPP Ploic','Centre Address','28.6139, 77.2090','',''),(26,37,'','','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(27,40,'','','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(28,41,'2','1','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(29,42,'59','3','Joint Entrance Examination (JEE) Main 2026','Centre Address1','28.6139, 77.2090','',''),(30,42,'30','2','Joint Entrance Examination (JEE) Main 2026','Centre Address2','28.6139, 77.2090','',''),(31,43,'58','3','UPSC','Centre Address','28.6139, 77.2090','',''),(32,43,'29','2','UPSC','Centre Address2','28.6139, 77.2090','',''),(33,43,'1','1','UPP Ploic','Centre Address2','28.6139, 77.2090','',''),(34,43,'92','4','UPP Ploic','Centre Address3','28.6139, 77.2090','',''),(35,44,'2','1','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(36,44,'30','2','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(37,45,'30','2','Joint Entrance Examination (JEE) Main 2026','Centre Address1','28.6139, 77.2090','',''),(38,45,'2','1','Joint Entrance Examination (JEE) Main 2026','Centre Address2','28.6139, 77.2090','',''),(39,46,'30','2','Joint Entrance Examination (JEE) Main 2026','Centre Address1','28.6139, 77.2090','',''),(40,46,'2','1','UPSC','Centre Address2','28.6139, 77.2090','',''),(41,47,'2','1','UPSC','Centre Address1','28.6139, 77.2090','',''),(42,47,'58','3','UPSC','Centre Address2','28.6139, 77.2090','',''),(43,47,'738','29','UPP Ploic','Centre Address2','28.6139, 77.2090','',''),(44,47,'2','1','UPP Ploic2','Centre Address2','28.6139, 77.2090','',''),(45,48,'2','1','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(46,49,'29','2','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(47,50,'739','29','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(48,51,'2','1','Joint Entrance Examination (JEE) Main 2026','Download it, obtain the authorised signature, and upload the signed copy — the file then moves to the Dealing Hand.','28.6139, 77.2090','',''),(49,51,'92','4','Joint Entrance Examination (JEE) Main 2026','Keep the sanction letter, examination schedule and vendor jammer specifications ready in PDF or Excel format.','28.6139, 77.2090','',''),(50,51,'2','1','Joint Entrance Examination (JEE) Main 2026','On submission, the system generates the application in government letter format.','28.6139, 77.2090','',''),(51,52,'738','29','Joint Entrance Examination (JEE) Main 2026','Keep the sanction letter, examination schedule and vendor jammer specifications ready in PDF or Excel format.','28.6139, 77.2090','',''),(52,52,'738','29','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(53,52,'1','1','Joint Entrance Examination (JEE) Main 2026','On submission, the system generates the application in government letter format.','28.6139, 77.2090','',''),(54,53,'92','4','UPSC','Keep the sanction letter, examination schedule and vendor jammer specifications ready in PDF or Excel format.','28.6139, 77.2090','',''),(55,53,'29','2','UPSC-2','Keep the sanction letter, examination schedule and vendor jammer specifications ready in PDF or Excel format.','28.6139, 77.2090','',''),(56,53,'2','1','UPP Ploic','Keep the sanction letter, examination schedule and vendor jammer specifications ready in PDF or Excel format.','28.6139, 77.2090','',''),(57,54,'57','3','Joint Entrance Examination (JEE) Main 2026','Keep the sanction letter, examination schedule and vendor jammer specifications ready in PDF or Excel format.','28.6139, 77.2090','',''),(58,54,'58','3','UPSC','On submission, the system generates the application in government letter format.','28.6139, 77.2090','',''),(59,55,'2','1','UPSC','Centre Address','28.6139, 77.2090','',''),(60,56,'738','29','Joint Entrance Examination (JEE) Main 2026','On submission, the system generates the application in government letter format.','28.6139, 77.2090','',''),(61,57,'2','1','Joint Entrance Examination (JEE) Main 2026','On submission, the system generates the application in government letter format.','28.6139, 77.2090','',''),(62,58,'2','1','Joint Entrance Examination (JEE) Main 2026-1','Centre Address 1','28.6139, 77.2090','',''),(63,58,'57','3','Joint Entrance Examination (JEE) Main 2026-2','Centre Address -2','28.6139, 77.2090','',''),(64,59,'1','1','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(65,60,'92','4','UPS Goverment College','UPS Goverment College  Plot No.244 Bhihar','28.6139, 77.2090','',''),(66,60,'93','4','JPS Goverment College','JPS Goverment College Goverment College  Plot No.244 Bhihar','28.6139, 77.2090','',''),(67,62,'90','4','Joint Entrance Examination (JEE) Main 2026','Centre Address','28.6139, 77.2090','',''),(68,63,'2','1','UPS Goverment College','Centre Address','28.6139, 77.2090','',''),(69,64,'2','1','Joint Entrance Examination (JEE) Main 2026-1','','28.6139, 77.2090','',''),(70,64,'2','1','UPSC','','28.6139, 77.2090','','');
/*!40000 ALTER TABLE `application_centre_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_date_mapping`
--

DROP TABLE IF EXISTS `application_date_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_date_mapping` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `exam_name` varchar(255) DEFAULT NULL,
  `exam_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_date_mapping`
--

LOCK TABLES `application_date_mapping` WRITE;
/*!40000 ALTER TABLE `application_date_mapping` DISABLE KEYS */;
INSERT INTO `application_date_mapping` VALUES (33,34,'Rohit','2026-09-15 00:00:00'),(34,35,'UPSC Main 2026','2026-09-17 00:00:00'),(35,36,'UPPSS','2026-09-11 00:00:00'),(36,36,'DELHI POLICE','2026-09-15 00:00:00'),(37,37,'UPSC Main 2026','2026-09-15 00:00:00'),(40,40,'UPSCC','2026-09-17 00:00:00'),(41,41,'Rohit','2026-09-17 00:00:00'),(42,42,'UPSC Main 2026','2026-09-17 00:00:00'),(43,43,'UPSC20256','2026-09-02 00:00:00'),(44,43,'IIT JEE','2026-09-30 00:00:00'),(45,44,'Rohit IIT JEE','2026-09-08 00:00:00'),(46,45,'Rohit IIT JEE','2026-09-17 00:00:00'),(47,46,'Rohit IIT JEEE','2026-09-08 00:00:00'),(48,47,'Rohit IIT N PDS','2026-09-08 00:00:00'),(49,47,'Rohit23NIC PD','2026-09-10 00:00:00'),(50,48,'Rohit','2026-09-03 00:00:00'),(51,49,'Rohit','2026-09-15 00:00:00'),(52,50,'Rohit','2026-09-15 00:00:00'),(53,51,'IIT JEE EXAM','2026-09-17 00:00:00'),(54,52,'IIT JEE','2026-09-03 00:00:00'),(55,53,'IIT JEE','2026-09-08 00:00:00'),(56,53,'UPPSS -2','2026-09-10 00:00:00'),(57,54,'Rohit IIT JEE','2026-09-15 00:00:00'),(58,55,'Rohit IIT','2026-09-09 00:00:00'),(59,56,'Rohit IIT','2026-09-22 00:00:00'),(60,57,'Rohit IIT','2026-09-02 00:00:00'),(61,58,'Rohit IIT','2026-09-10 00:00:00'),(62,59,'Rohit IIT','2026-09-03 00:00:00'),(63,60,'Railway Bord Exam','2026-09-30 00:00:00'),(64,61,'Rohit','2026-09-03 00:00:00'),(65,62,'Rohit','2026-09-30 00:00:00'),(66,63,'Rohit','2026-09-15 00:00:00'),(67,64,'Rohit','2026-09-08 00:00:00');
/*!40000 ALTER TABLE `application_date_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_document_master`
--

DROP TABLE IF EXISTS `application_document_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_document_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `document_type` int NOT NULL,
  `document_name` varchar(500) DEFAULT NULL,
  `document_path` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_document_master`
--

LOCK TABLES `application_document_master` WRITE;
/*!40000 ALTER TABLE `application_document_master` DISABLE KEYS */;
INSERT INTO `application_document_master` VALUES (9,35,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788772127_efcb203c2e6dea1948dd.pdf'),(10,35,2,'Jammer portal.pdf','uploads/vendor_documents/1788772127_ccd84d39451007c27acc.pdf'),(11,36,2,'Jammer portal.pdf','uploads/vendor_documents/1788772328_e6857b486d060c907455.pdf'),(12,37,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788772934_cade2b28724e6955c246.pdf'),(13,41,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788774149_cd2657762fffe7440a9c.pdf'),(14,42,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788774307_fe08b1c283925419a71c.pdf'),(15,42,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788774307_6f5f5efb3e6552750366.pdf'),(16,43,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788774473_5d1eb8b1b56e1fb55806.pdf'),(17,43,2,'Jammer portal.pdf','uploads/vendor_documents/1788774473_2c5738c7d2555b7eb32b.pdf'),(18,44,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788775462_9f522a54c179c8eb074a.pdf'),(19,44,2,'Jammer portal.pdf','uploads/vendor_documents/1788775462_34c7df4d88fcde7d00b1.pdf'),(20,44,1,'Gitesh Srivastava_2026-08-21.xlsx','uploads/examinations_documents/1788775462_43e26bb475e072a93068.xlsx'),(21,45,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788777092_236177fc4eb6a3ec2556.pdf'),(22,45,2,'Jammer portal.pdf','uploads/vendor_documents/1788777092_990c676f5d9fd8f480c2.pdf'),(23,45,1,'Gitesh Srivastava_2026-08-21.xlsx','uploads/examinations_documents/1788777092_36722fd70fe90ab218cc.xlsx'),(24,46,2,'Feasibility Study (JAMS).pdf','uploads/vendor_documents/1788777375_52612116c4a1dd4e995f.pdf'),(25,46,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788777375_ea2c0cc956df8027aa7e.pdf'),(26,46,1,'Gitesh Srivastava_2026-08-21.xlsx','uploads/examinations_documents/1788777375_33e47d895ff29f6d36bc.xlsx'),(27,47,2,'Jammer portal.pdf','uploads/vendor_documents/1788777599_8fe9baa35e5a6dac62b6.pdf'),(28,47,2,'Jammer portal.pdf','uploads/vendor_documents/1788777599_5e6a0da7634b1553d4ce.pdf'),(29,48,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788779687_311f06d965313697e408.pdf'),(30,49,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788779969_2c9e61a1d2650433833f.pdf'),(31,49,1,'Nisha_20260720162811_CSID-Testing.xlsx','uploads/examinations_documents/1788779969_61b3b9151318474e8b02.xlsx'),(32,50,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788781954_4d3b94cda68e826dc186.pdf'),(33,51,2,'UPSC_202609_0033.pdf','uploads/vendor_documents/1788783610_0f544cc7fa5a25c45019.html'),(34,51,2,'UPSC_202609_0033.pdf','uploads/vendor_documents/1788783610_8de8309f52cb7923603a.html'),(35,52,2,'UPSC_202609_0033.pdf','uploads/vendor_documents/1788785112_c73c8e880025745d9756.html'),(36,52,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788785112_7288c84449b7eef71526.pdf'),(37,53,2,'Application Preview.pdf','uploads/vendor_documents/1788786097_c3d5adc5d6716efa77c4.pdf'),(38,53,2,'UPSC_202609_0033.pdf','uploads/vendor_documents/1788786097_de39701d251dfb9ee1ba.html'),(39,54,2,'UPSC_202609_0033.pdf','uploads/vendor_documents/1788787224_bbb30158b51a3990031a.html'),(40,54,2,'UPSC_202609_0033.pdf','uploads/vendor_documents/1788787224_8915f94b36a4d8a5e613.html'),(41,55,2,'JPMS_2026_001057.pdf','uploads/vendor_documents/1788844638_02bd41ffcb08c881f9ed.pdf'),(42,55,2,'Jammer portal.pdf','uploads/vendor_documents/1788844638_6702603ffec9aaf0ede0.pdf'),(43,56,2,'UPSC_202609_0038 (3).pdf','uploads/vendor_documents/1788847797_fa125c8bd60d9f957a50.html'),(44,57,2,'UPSC_202609_0033.pdf','uploads/vendor_documents/1788847925_5c11800393cc1503aa69.html'),(45,58,2,'Application PDF-1.pdf','uploads/vendor_documents/1788850139_fde9388c99da37e08134.pdf'),(46,58,2,'Application Preview.pdf','uploads/vendor_documents/1788850139_ce92239efc11b8c5270d.pdf'),(47,59,2,'Application PDF-2.pdf','uploads/vendor_documents/1788852342_5dd547f43589e307d326.pdf'),(48,59,3,'Application PDF-3.pdf','uploads/signed_documents/signed_59_1788856678.pdf'),(49,60,2,'Application PDF-3.pdf','uploads/vendor_documents/1788858007_2f0156d10646badf6235.pdf'),(50,60,2,'Application PDF-2.pdf','uploads/vendor_documents/1788858007_a4a2820ba30328b4c6f6.pdf'),(51,60,3,'Application PDF-4.pdf','uploads/signed_documents/signed_60_1788858075.pdf'),(52,61,3,'Application PDF-4.pdf','uploads/signed_documents/signed_61_1788858383.pdf'),(53,62,2,'Application PDF-4.pdf','uploads/vendor_documents/1788859416_7c0c5aadb501d7662179.pdf'),(54,62,3,'Application PDF-4.pdf','uploads/signed_documents/signed_62_1788859439.pdf'),(55,63,2,'Application PDF-1.pdf','uploads/vendor_documents/1788859528_02a639c278e7076d5ac4.pdf'),(56,63,3,'Application PDF-4.pdf','uploads/signed_documents/signed_63_1788859555.pdf');
/*!40000 ALTER TABLE `application_document_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_history`
--

DROP TABLE IF EXISTS `application_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_history` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `status` int NOT NULL,
  `performed_by` int DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_history`
--

LOCK TABLES `application_history` WRITE;
/*!40000 ALTER TABLE `application_history` DISABLE KEYS */;
INSERT INTO `application_history` VALUES (23,34,1,6,'Application submitted successfully.','2026-09-07 09:05:55'),(24,35,1,6,'Application submitted successfully.','2026-09-07 09:08:47'),(25,36,1,6,'Application submitted successfully.','2026-09-07 09:12:08'),(26,37,1,6,'Application submitted successfully.','2026-09-07 09:22:14'),(27,40,1,6,'Application submitted successfully.','2026-09-07 09:34:19'),(28,41,1,6,'Application submitted successfully.','2026-09-07 09:42:29'),(29,42,1,6,'Application submitted successfully.','2026-09-07 09:45:07'),(30,43,1,6,'Application submitted successfully.','2026-09-07 09:47:53'),(31,44,1,6,'Application submitted successfully.','2026-09-07 10:04:22'),(32,45,1,6,'Application submitted successfully.','2026-09-07 10:31:32'),(33,46,1,6,'Application submitted successfully.','2026-09-07 10:36:15'),(34,47,1,6,'Application submitted successfully.','2026-09-07 10:39:59'),(35,48,1,6,'Application submitted successfully.','2026-09-07 11:14:47'),(36,49,1,6,'Application submitted successfully.','2026-09-07 11:19:29'),(37,50,1,6,'Application submitted successfully.','2026-09-07 11:52:34'),(38,51,1,6,'Application submitted successfully.','2026-09-07 12:20:10'),(39,52,1,6,'Application submitted successfully.','2026-09-07 12:45:12'),(40,53,1,6,'Application submitted successfully.','2026-09-07 13:01:37'),(41,51,2,6,'PDF_GENERATED','2026-09-07 18:34:27'),(42,54,1,6,'Application submitted successfully.','2026-09-07 13:20:24'),(43,54,2,6,'PDF_GENERATED','2026-09-07 13:20:24'),(44,54,3,6,NULL,'2026-09-07 18:55:09'),(45,55,1,6,'Application submitted successfully.','2026-09-08 05:17:18'),(46,55,2,6,'PDF_GENERATED','2026-09-08 05:17:18'),(47,56,1,6,'Application submitted successfully.','2026-09-08 06:09:57'),(48,56,2,6,'PDF_GENERATED','2026-09-08 06:09:57'),(49,57,1,6,'Application submitted successfully.','2026-09-08 06:12:05'),(50,57,2,6,'PDF_GENERATED','2026-09-08 06:12:05'),(51,58,1,6,'Application submitted successfully.','2026-09-08 06:48:59'),(52,58,2,6,'PDF_GENERATED','2026-09-08 06:48:59'),(53,59,1,6,'Application submitted successfully.','2026-09-08 07:25:42'),(54,59,2,6,'PDF_GENERATED','2026-09-08 07:25:42'),(55,59,3,6,'Signed application uploaded successfully.','2026-09-08 08:37:58'),(56,60,1,6,'Application submitted successfully.','2026-09-08 09:00:07'),(57,60,2,6,'PDF_GENERATED','2026-09-08 09:00:07'),(58,60,3,6,'Signed application uploaded successfully.','2026-09-08 09:01:15'),(59,61,1,6,'Application submitted successfully.','2026-09-08 09:03:50'),(60,61,2,6,'PDF_GENERATED','2026-09-08 09:03:51'),(61,61,3,6,'Signed application uploaded successfully.','2026-09-08 09:06:23'),(62,62,1,6,'Application submitted successfully.','2026-09-08 09:23:36'),(63,62,2,6,'PDF_GENERATED','2026-09-08 09:23:36'),(64,62,3,6,'Signed application uploaded successfully.','2026-09-08 09:23:59'),(65,63,1,6,'Application submitted successfully.','2026-09-08 09:25:28'),(66,63,2,6,'PDF_GENERATED','2026-09-08 09:25:28'),(67,63,3,6,'Signed application uploaded successfully.','2026-09-08 09:25:55'),(68,64,1,6,'Application submitted successfully.','2026-09-08 10:20:12'),(69,64,2,6,'PDF_GENERATED','2026-09-08 10:20:12');
/*!40000 ALTER TABLE `application_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_vendor_mapping`
--

DROP TABLE IF EXISTS `application_vendor_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `application_vendor_mapping` (
  `id` int NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `vendor_id` int DEFAULT NULL,
  `jammer_id` int DEFAULT NULL,
  `technical_specifications` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_vendor_mapping`
--

LOCK TABLES `application_vendor_mapping` WRITE;
/*!40000 ALTER TABLE `application_vendor_mapping` DISABLE KEYS */;
INSERT INTO `application_vendor_mapping` VALUES (25,34,1,5,'','2026-09-07 09:05:55','2026-09-07 09:05:55'),(26,34,8,7,'','2026-09-07 09:05:55','2026-09-07 09:05:55'),(27,35,8,7,'1788772127_efcb203c2e6dea1948dd.pdf','2026-09-07 09:08:47','2026-09-07 09:08:47'),(28,35,2,6,'1788772127_ccd84d39451007c27acc.pdf','2026-09-07 09:08:47','2026-09-07 09:08:47'),(29,36,1,5,'','2026-09-07 09:12:08','2026-09-07 09:12:08'),(30,36,1,5,'1788772328_e6857b486d060c907455.pdf','2026-09-07 09:12:08','2026-09-07 09:12:08'),(31,37,1,5,'1788772934_cade2b28724e6955c246.pdf','2026-09-07 09:22:14','2026-09-07 09:22:14'),(32,40,1,5,'','2026-09-07 09:34:19','2026-09-07 09:34:19'),(33,41,1,5,'1788774149_cd2657762fffe7440a9c.pdf','2026-09-07 09:42:29','2026-09-07 09:42:29'),(34,42,8,7,'1788774307_fe08b1c283925419a71c.pdf','2026-09-07 09:45:07','2026-09-07 09:45:07'),(35,42,1,5,'1788774307_6f5f5efb3e6552750366.pdf','2026-09-07 09:45:07','2026-09-07 09:45:07'),(36,43,1,1,'1788774473_5d1eb8b1b56e1fb55806.pdf','2026-09-07 09:47:53','2026-09-07 09:47:53'),(37,43,8,4,'1788774473_2c5738c7d2555b7eb32b.pdf','2026-09-07 09:47:53','2026-09-07 09:47:53'),(38,44,1,1,'1788775462_9f522a54c179c8eb074a.pdf','2026-09-07 10:04:22','2026-09-07 10:04:22'),(39,44,8,7,'1788775462_34c7df4d88fcde7d00b1.pdf','2026-09-07 10:04:22','2026-09-07 10:04:22'),(40,45,1,1,'1788777092_236177fc4eb6a3ec2556.pdf','2026-09-07 10:31:32','2026-09-07 10:31:32'),(41,45,8,7,'1788777092_990c676f5d9fd8f480c2.pdf','2026-09-07 10:31:32','2026-09-07 10:31:32'),(42,46,1,5,'1788777375_52612116c4a1dd4e995f.pdf','2026-09-07 10:36:15','2026-09-07 10:36:15'),(43,46,2,2,'1788777375_ea2c0cc956df8027aa7e.pdf','2026-09-07 10:36:15','2026-09-07 10:36:15'),(44,47,8,7,'1788777599_8fe9baa35e5a6dac62b6.pdf','2026-09-07 10:39:59','2026-09-07 10:39:59'),(45,47,2,2,'1788777599_5e6a0da7634b1553d4ce.pdf','2026-09-07 10:39:59','2026-09-07 10:39:59'),(46,48,8,7,'1788779687_311f06d965313697e408.pdf','2026-09-07 11:14:47','2026-09-07 11:14:47'),(47,49,1,1,'1788779969_2c9e61a1d2650433833f.pdf','2026-09-07 11:19:29','2026-09-07 11:19:29'),(48,50,8,4,'1788781954_4d3b94cda68e826dc186.pdf','2026-09-07 11:52:34','2026-09-07 11:52:34'),(49,51,8,7,'1788783610_0f544cc7fa5a25c45019.html','2026-09-07 12:20:10','2026-09-07 12:20:10'),(50,51,1,5,'1788783610_8de8309f52cb7923603a.html','2026-09-07 12:20:10','2026-09-07 12:20:10'),(51,52,1,1,'1788785112_c73c8e880025745d9756.html','2026-09-07 12:45:12','2026-09-07 12:45:12'),(52,52,8,7,'1788785112_7288c84449b7eef71526.pdf','2026-09-07 12:45:12','2026-09-07 12:45:12'),(53,53,8,4,'1788786097_c3d5adc5d6716efa77c4.pdf','2026-09-07 13:01:37','2026-09-07 13:01:37'),(54,53,2,6,'1788786097_de39701d251dfb9ee1ba.html','2026-09-07 13:01:37','2026-09-07 13:01:37'),(55,54,8,7,'1788787224_bbb30158b51a3990031a.html','2026-09-07 13:20:24','2026-09-07 13:20:24'),(56,54,1,5,'1788787224_8915f94b36a4d8a5e613.html','2026-09-07 13:20:24','2026-09-07 13:20:24'),(57,55,8,7,'1788844638_02bd41ffcb08c881f9ed.pdf','2026-09-08 05:17:18','2026-09-08 05:17:18'),(58,55,1,5,'1788844638_6702603ffec9aaf0ede0.pdf','2026-09-08 05:17:18','2026-09-08 05:17:18'),(59,56,1,1,'1788847797_fa125c8bd60d9f957a50.html','2026-09-08 06:09:57','2026-09-08 06:09:57'),(60,57,1,5,'1788847925_5c11800393cc1503aa69.html','2026-09-08 06:12:05','2026-09-08 06:12:05'),(61,58,1,1,'1788850139_fde9388c99da37e08134.pdf','2026-09-08 06:48:59','2026-09-08 06:48:59'),(62,58,8,7,'1788850139_ce92239efc11b8c5270d.pdf','2026-09-08 06:48:59','2026-09-08 06:48:59'),(63,59,1,5,'1788852342_5dd547f43589e307d326.pdf','2026-09-08 07:25:42','2026-09-08 07:25:42'),(64,60,1,5,'1788858007_2f0156d10646badf6235.pdf','2026-09-08 09:00:07','2026-09-08 09:00:07'),(65,60,8,7,'1788858007_a4a2820ba30328b4c6f6.pdf','2026-09-08 09:00:07','2026-09-08 09:00:07'),(66,61,1,1,'','2026-09-08 09:03:50','2026-09-08 09:03:50'),(67,62,1,1,'1788859416_7c0c5aadb501d7662179.pdf','2026-09-08 09:23:36','2026-09-08 09:23:36'),(68,63,1,1,'1788859528_02a639c278e7076d5ac4.pdf','2026-09-08 09:25:28','2026-09-08 09:25:28'),(69,64,8,4,'','2026-09-08 10:20:12','2026-09-08 10:20:12'),(70,64,2,6,'','2026-09-08 10:20:12','2026-09-08 10:20:12');
/*!40000 ALTER TABLE `application_vendor_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_action`
--

DROP TABLE IF EXISTS `audit_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit_action` (
  `action_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `login_name` varchar(100) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `record_id` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`action_id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_login_name` (`login_name`),
  KEY `idx_module` (`module`),
  KEY `idx_action` (`action`),
  KEY `idx_record_id` (`record_id`),
  KEY `idx_created_at` (`created_at`),
  KEY `idx_ip_address` (`ip_address`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_action`
--

LOCK TABLES `audit_action` WRITE;
/*!40000 ALTER TABLE `audit_action` DISABLE KEYS */;
INSERT INTO `audit_action` VALUES (2,NULL,'rkcsid122234@gmail.com','REGISTRATION','PENDING','78','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 07:28:56'),(3,NULL,'rkcsid123411@gmail.com','REGISTRATION','PENDING','REG/20260828/3','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:00:58'),(4,NULL,'rkcsid121134@gmail.com','REGISTRATION','PENDING','REG/20260828/4','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:11:58'),(5,NULL,'rkcsid111234@gmail.com','REGISTRATION','PENDING','REG/20260828/5','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:12:48'),(6,NULL,'rkcsid1234333@gmail.com','REGISTRATION','PENDING','REG/20260828/6','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:19:59'),(7,NULL,'rkcsid1234333@gmail.com','REGISTRATION','PENDING','REG/20260828/7','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:22:10'),(8,NULL,'rkcsid124434@gmail.com','REGISTRATION','PENDING','REG/20260828/8','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:27:07'),(9,NULL,'rkcsid177234@gmail.com','REGISTRATION','PENDING','REG/20260828/9','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:28:08'),(10,NULL,'rkcsiduuu1234@gmail.com','REGISTRATION','PENDING','REG/20260828/10','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:36:51'),(11,NULL,'rkcsid331234@gmail.com','REGISTRATION','PENDING','REG/20260828/11','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:38:06'),(12,NULL,'rkcsid16234@gmail.com','REGISTRATION','PENDING','REG/20260828/12','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:42:57'),(13,NULL,'swd1-cabsec786@supportgov.in','REGISTRATION','PENDING','REG/20260828/13','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0','2026-08-28 09:50:41'),(14,NULL,'rkcsid12341@gmail.com','REGISTRATION','PENDING','REG/20260828/14','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0','2026-08-28 09:51:35'),(15,NULL,'rkcsiwd1234@gmail.com','REGISTRATION','PENDING','REG/20260828/15','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:52:37'),(16,NULL,'rkcs44id1234@gmail.com','REGISTRATION','PENDING','REG/20260828/16','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:53:48'),(17,NULL,'rkcsid221234@gmail.com','REGISTRATION','PENDING','REG/20260828/17','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 10:38:00'),(18,NULL,'rkcsi333d1234@gmail.com','REGISTRATION','PENDING','REG/20260828/18','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 11:46:59'),(19,NULL,'swd11-cabsec@supportgov.in','REGISTRATION','PENDING','REG/20260828/19','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0','2026-08-28 13:32:53'),(20,NULL,'rkcsi3d1234@gmail.com','REGISTRATION','PENDING','REG/20260829/1','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 05:10:51'),(21,NULL,'rkcrrsid1234@gmail.com','REGISTRATION','PENDING','REG/20260831/1','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 04:58:13'),(22,NULL,'rkcsittd1234@gmail.com','REGISTRATION','PENDING','REG/20260831/2','Registration successful. Please upload your Authorization Letter.','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:46:47');
/*!40000 ALTER TABLE `audit_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_trail`
--

DROP TABLE IF EXISTS `audit_trail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit_trail` (
  `audit_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `login_name` varchar(100) DEFAULT NULL,
  `action` varchar(50) NOT NULL,
  `action_description` varchar(255) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`audit_id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_login_name` (`login_name`),
  KEY `idx_action` (`action`),
  KEY `idx_created_at` (`created_at`),
  KEY `idx_ip_address` (`ip_address`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
INSERT INTO `audit_trail` VALUES (4,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 05:59:42',NULL,'2026-08-28 05:59:42'),(5,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 06:00:37','2026-08-28 06:00:37'),(6,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 06:43:19',NULL,'2026-08-28 06:43:19'),(7,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 06:45:51','2026-08-28 06:45:51'),(8,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 06:46:12',NULL,'2026-08-28 06:46:12'),(9,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 06:50:32','2026-08-28 06:50:32'),(10,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 06:50:43',NULL,'2026-08-28 06:50:43'),(11,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 06:51:05','2026-08-28 06:51:05'),(12,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 06:51:23',NULL,'2026-08-28 06:51:23'),(13,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 06:51:36','2026-08-28 06:51:36'),(14,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 06:56:15',NULL,'2026-08-28 06:56:15'),(15,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 07:00:37','2026-08-28 07:00:37'),(16,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 07:00:49',NULL,'2026-08-28 07:00:49'),(17,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 07:14:13','2026-08-28 07:14:13'),(18,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 07:15:33',NULL,'2026-08-28 07:15:33'),(19,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 07:16:16','2026-08-28 07:16:16'),(20,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 07:22:20',NULL,'2026-08-28 07:22:20'),(21,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 07:22:30','2026-08-28 07:22:30'),(22,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 08:32:28',NULL,'2026-08-28 08:32:28'),(23,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 09:00:38','2026-08-28 09:00:38'),(24,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:39:48',NULL,'2026-08-28 09:39:48'),(25,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 09:42:29','2026-08-28 09:42:29'),(26,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:54:42',NULL,'2026-08-28 09:54:42'),(27,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 09:55:41','2026-08-28 09:55:41'),(28,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 09:57:59',NULL,'2026-08-28 09:57:59'),(29,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 10:37:22','2026-08-28 10:37:22'),(30,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 10:38:40',NULL,'2026-08-28 10:38:40'),(31,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 11:31:51',NULL,'2026-08-28 11:31:51'),(32,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 11:46:35','2026-08-28 11:46:35'),(33,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 11:47:33',NULL,'2026-08-28 11:47:33'),(34,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 11:53:44','2026-08-28 11:53:44'),(35,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 11:54:15',NULL,'2026-08-28 11:54:15'),(36,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 11:57:40',NULL,'2026-08-28 11:57:40'),(37,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 12:20:56','2026-08-28 12:20:56'),(38,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 12:21:08',NULL,'2026-08-28 12:21:08'),(39,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 13:01:58','2026-08-28 13:01:58'),(40,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 13:02:10',NULL,'2026-08-28 13:02:10'),(41,6,'gitesh@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-08-28 13:03:12'),(42,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 13:03:17','2026-08-28 13:03:17'),(43,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 13:04:06',NULL,'2026-08-28 13:04:06'),(44,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 13:06:35','2026-08-28 13:06:35'),(45,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 13:14:17',NULL,'2026-08-28 13:14:17'),(46,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 13:20:28','2026-08-28 13:20:28'),(47,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 13:20:46',NULL,'2026-08-28 13:20:46'),(48,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 13:21:42',NULL,'2026-08-28 13:21:42'),(49,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 13:26:26','2026-08-28 13:26:26'),(50,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 13:27:10',NULL,'2026-08-28 13:27:10'),(51,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 13:28:38','2026-08-28 13:28:38'),(52,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0','2026-08-28 13:29:46',NULL,'2026-08-28 13:29:46'),(53,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-28 13:34:16',NULL,'2026-08-28 13:34:16'),(54,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-28 13:34:38','2026-08-28 13:34:38'),(55,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 05:11:35',NULL,'2026-08-29 05:11:35'),(56,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 05:47:09','2026-08-29 05:47:09'),(57,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 05:47:22',NULL,'2026-08-29 05:47:22'),(58,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 05:49:39','2026-08-29 05:49:39'),(59,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 05:49:50',NULL,'2026-08-29 05:49:50'),(60,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 05:59:28','2026-08-29 05:59:28'),(61,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 05:59:49',NULL,'2026-08-29 05:59:49'),(62,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 06:05:00',NULL,'2026-08-29 06:05:00'),(63,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 06:10:43','2026-08-29 06:10:43'),(64,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 06:11:10',NULL,'2026-08-29 06:11:10'),(65,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 06:12:32','2026-08-29 06:12:32'),(66,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 06:22:11',NULL,'2026-08-29 06:22:11'),(67,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 06:42:37','2026-08-29 06:42:37'),(68,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 07:09:38',NULL,'2026-08-29 07:09:38'),(69,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 07:12:53','2026-08-29 07:12:53'),(70,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 07:13:08',NULL,'2026-08-29 07:13:08'),(71,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 07:15:20','2026-08-29 07:15:20'),(72,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 07:15:32',NULL,'2026-08-29 07:15:32'),(73,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 07:17:17','2026-08-29 07:17:17'),(74,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 07:28:50',NULL,'2026-08-29 07:28:50'),(75,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 07:30:43','2026-08-29 07:30:43'),(76,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 07:30:56',NULL,'2026-08-29 07:30:56'),(77,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 07:39:14','2026-08-29 07:39:14'),(78,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 07:39:27',NULL,'2026-08-29 07:39:27'),(79,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 07:41:31','2026-08-29 07:41:31'),(80,NULL,NULL,'LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 07:41:32','2026-08-29 07:41:32'),(81,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 07:41:51',NULL,'2026-08-29 07:41:51'),(82,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 08:27:41','2026-08-29 08:27:41'),(83,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 08:28:03',NULL,'2026-08-29 08:28:03'),(84,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 08:47:02','2026-08-29 08:47:02'),(85,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 08:47:26',NULL,'2026-08-29 08:47:26'),(86,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 08:49:00','2026-08-29 08:49:00'),(87,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 08:49:16',NULL,'2026-08-29 08:49:16'),(88,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 08:50:30','2026-08-29 08:50:30'),(89,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 08:52:59',NULL,'2026-08-29 08:52:59'),(90,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 09:00:53','2026-08-29 09:00:53'),(91,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 09:01:10',NULL,'2026-08-29 09:01:10'),(92,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 09:03:21','2026-08-29 09:03:21'),(93,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 09:03:59',NULL,'2026-08-29 09:03:59'),(94,6,'gitesh@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-08-29 09:49:59'),(95,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 09:50:19','2026-08-29 09:50:19'),(96,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 09:50:29',NULL,'2026-08-29 09:50:29'),(97,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 09:51:58','2026-08-29 09:51:58'),(98,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 09:52:26',NULL,'2026-08-29 09:52:26'),(99,6,'gitesh@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-08-29 09:54:02'),(100,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 09:54:34','2026-08-29 09:54:34'),(101,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 09:54:52',NULL,'2026-08-29 09:54:52'),(102,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 10:08:53','2026-08-29 10:08:53'),(103,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 10:09:17',NULL,'2026-08-29 10:09:17'),(104,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 10:16:47','2026-08-29 10:16:47'),(105,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-29 10:17:00',NULL,'2026-08-29 10:17:00'),(106,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-29 10:18:35','2026-08-29 10:18:35'),(107,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 04:56:42',NULL,'2026-08-31 04:56:42'),(108,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 04:57:11','2026-08-31 04:57:11'),(109,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 04:57:23',NULL,'2026-08-31 04:57:23'),(110,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 04:57:50','2026-08-31 04:57:50'),(111,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 05:13:20',NULL,'2026-08-31 05:13:20'),(112,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 06:30:17','2026-08-31 06:30:17'),(113,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 06:30:41',NULL,'2026-08-31 06:30:41'),(114,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 06:32:14','2026-08-31 06:32:14'),(115,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 06:32:26',NULL,'2026-08-31 06:32:26'),(116,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 07:01:12','2026-08-31 07:01:12'),(117,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 07:01:37',NULL,'2026-08-31 07:01:37'),(118,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 07:07:01','2026-08-31 07:07:01'),(119,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 07:07:27',NULL,'2026-08-31 07:07:27'),(120,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 07:09:02','2026-08-31 07:09:02'),(121,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 07:09:14',NULL,'2026-08-31 07:09:14'),(122,6,'gitesh@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-08-31 07:09:39'),(123,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 10:14:13','2026-08-31 10:14:13'),(124,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 10:14:34',NULL,'2026-08-31 10:14:34'),(125,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:24:51','2026-08-31 11:24:51'),(126,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:25:17',NULL,'2026-08-31 11:25:17'),(127,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:26:51','2026-08-31 11:26:51'),(128,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:27:01',NULL,'2026-08-31 11:27:01'),(129,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:27:42','2026-08-31 11:27:42'),(130,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:27:56',NULL,'2026-08-31 11:27:56'),(131,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:29:56','2026-08-31 11:29:56'),(132,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:30:08',NULL,'2026-08-31 11:30:08'),(133,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:31:37','2026-08-31 11:31:37'),(134,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:32:01',NULL,'2026-08-31 11:32:01'),(135,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:37:14','2026-08-31 11:37:14'),(136,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:37:41',NULL,'2026-08-31 11:37:41'),(137,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:46:10','2026-08-31 11:46:10'),(138,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:47:24',NULL,'2026-08-31 11:47:24'),(139,6,'gitesh@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-08-31 11:49:41'),(140,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:53:30','2026-08-31 11:53:30'),(141,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:53:49',NULL,'2026-08-31 11:53:49'),(142,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 11:54:10','2026-08-31 11:54:10'),(143,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 11:55:03',NULL,'2026-08-31 11:55:03'),(144,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:07:58','2026-08-31 12:07:58'),(145,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:08:22',NULL,'2026-08-31 12:08:22'),(146,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:08:40','2026-08-31 12:08:40'),(147,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:08:58',NULL,'2026-08-31 12:08:58'),(148,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:09:35','2026-08-31 12:09:35'),(149,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:13:18',NULL,'2026-08-31 12:13:18'),(150,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:13:47','2026-08-31 12:13:47'),(151,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:14:07',NULL,'2026-08-31 12:14:07'),(152,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:15:46','2026-08-31 12:15:46'),(153,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:16:00',NULL,'2026-08-31 12:16:00'),(154,6,'gitesh@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-08-31 12:16:24'),(155,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:16:32','2026-08-31 12:16:32'),(156,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:16:51',NULL,'2026-08-31 12:16:51'),(157,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:41:07','2026-08-31 12:41:07'),(158,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:41:47',NULL,'2026-08-31 12:41:47'),(159,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:43:32','2026-08-31 12:43:32'),(160,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:43:49',NULL,'2026-08-31 12:43:49'),(161,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:45:10','2026-08-31 12:45:10'),(162,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:45:23',NULL,'2026-08-31 12:45:23'),(163,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 12:57:20','2026-08-31 12:57:20'),(164,15,'rkcsittd1234@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 12:57:42',NULL,'2026-08-31 12:57:42'),(165,15,'rkcsittd1234@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-08-31 12:59:24'),(166,15,'rkcsittd1234@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 13:00:53','2026-08-31 13:00:53'),(167,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 13:01:06',NULL,'2026-08-31 13:01:06'),(168,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 13:07:29','2026-08-31 13:07:29'),(169,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 13:12:18',NULL,'2026-08-31 13:12:18'),(170,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 13:13:26','2026-08-31 13:13:26'),(171,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-09-01 04:51:13',NULL,'2026-09-01 04:51:13'),(172,6,'gitesh@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-09-01 04:55:47'),(173,6,'gitesh@gmail.com','PASSWORD','User changed password successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,NULL,'2026-09-01 04:56:27'),(174,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-09-01 04:56:35','2026-09-01 04:56:35'),(175,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-09-01 04:56:48',NULL,'2026-09-01 04:56:48'),(176,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-09-01 04:56:53','2026-09-01 04:56:53'),(177,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-09-01 05:19:23',NULL,'2026-09-01 05:19:23'),(178,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-09-01 05:35:21','2026-09-01 05:35:21'),(179,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-09-01 05:35:39',NULL,'2026-09-01 05:35:39'),(180,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-09-01 05:36:36',NULL,'2026-09-01 05:36:36'),(181,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-09-01 13:13:31','2026-09-01 13:13:31'),(182,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-09-02 04:41:05',NULL,'2026-09-02 04:41:05'),(183,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-09-02 05:34:46','2026-09-02 05:34:46'),(184,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-09-02 05:39:44',NULL,'2026-09-02 05:39:44'),(185,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-03 04:55:44',NULL,'2026-09-03 04:55:44'),(186,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-03 07:25:42',NULL,'2026-09-03 07:25:42'),(187,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-03 09:53:49','2026-09-03 09:53:49'),(188,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-03 09:54:02',NULL,'2026-09-03 09:54:02'),(189,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-03 10:31:40','2026-09-03 10:31:40'),(190,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-03 10:31:51',NULL,'2026-09-03 10:31:51'),(191,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-03 13:29:53','2026-09-03 13:29:53'),(192,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-07 05:21:46',NULL,'2026-09-07 05:21:46'),(193,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-07 07:25:54','2026-09-07 07:25:54'),(194,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-07 07:26:05',NULL,'2026-09-07 07:26:05'),(195,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-08 04:48:03',NULL,'2026-09-08 04:48:03'),(196,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-08 06:08:56','2026-09-08 06:08:56'),(197,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-08 06:09:15',NULL,'2026-09-08 06:09:15'),(198,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-08 06:11:21',NULL,'2026-09-08 06:11:21'),(199,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-08 06:47:32','2026-09-08 06:47:32'),(200,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-08 06:47:44',NULL,'2026-09-08 06:47:44'),(201,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-08 07:24:50','2026-09-08 07:24:50'),(202,6,'gitesh@gmail.com','LOGIN','User logged in successfully','127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-08 07:25:01',NULL,'2026-09-08 07:25:01');
/*!40000 ALTER TABLE `audit_trail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int unsigned NOT NULL,
  `city_name` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_state_city` (`state_id`,`city_name`),
  KEY `idx_city_state_id` (`state_id`),
  CONSTRAINT `fk_city_state` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=792 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,1,'Alluri Sitharama Raju',1),(2,1,'Anakapalli',1),(3,1,'Anantapur',1),(4,1,'Annamayya',1),(5,1,'Bapatla',1),(6,1,'Chittoor',1),(7,1,'Dr. B.R. Ambedkar Konaseema',1),(8,1,'East Godavari',1),(9,1,'Eluru',1),(10,1,'Guntur',1),(11,1,'Kakinada',1),(12,1,'Krishna',1),(13,1,'Kurnool',1),(14,1,'Nandyal',1),(15,1,'NTR',1),(16,1,'Palnadu',1),(17,1,'Parvathipuram Manyam',1),(18,1,'Prakasam',1),(19,1,'Sri Potti Sriramulu Nellore',1),(20,1,'Sri Sathya Sai',1),(21,1,'Srikakulam',1),(22,1,'Tirupati',1),(23,1,'Visakhapatnam',1),(24,1,'Vizianagaram',1),(25,1,'West Godavari',1),(26,1,'YSR Kadapa',1),(27,2,'Anjaw',1),(28,2,'Bichom',1),(29,2,'Changlang',1),(30,2,'Dibang Valley',1),(31,2,'East Kameng',1),(32,2,'East Siang',1),(33,2,'Itanagar',1),(34,2,'Kamle',1),(35,2,'Keyi Panyor',1),(36,2,'Kra Daadi',1),(37,2,'Kurung Kumey',1),(38,2,'Lepa Rada',1),(39,2,'Lohit',1),(40,2,'Longding',1),(41,2,'Lower Dibang Valley',1),(42,2,'Lower Siang',1),(43,2,'Lower Subansiri',1),(44,2,'Namsai',1),(45,2,'Pakke Kessang',1),(46,2,'Papum Pare',1),(47,2,'Shi Yomi',1),(48,2,'Siang',1),(49,2,'Tawang',1),(50,2,'Tirap',1),(51,2,'Upper Siang',1),(52,2,'Upper Subansiri',1),(53,2,'West Kameng',1),(54,2,'West Siang',1),(55,3,'Baksa',1),(56,3,'Barpeta',1),(57,3,'Biswanath',1),(58,3,'Bongaigaon',1),(59,3,'Cachar',1),(60,3,'Charaideo',1),(61,3,'Chirang',1),(62,3,'Darrang',1),(63,3,'Dhemaji',1),(64,3,'Dhubri',1),(65,3,'Dibrugarh',1),(66,3,'Dima Hasao',1),(67,3,'Goalpara',1),(68,3,'Golaghat',1),(69,3,'Hailakandi',1),(70,3,'Hojai',1),(71,3,'Jorhat',1),(72,3,'Kamrup',1),(73,3,'Kamrup Metropolitan',1),(74,3,'Karbi Anglong',1),(75,3,'Karimganj',1),(76,3,'Kokrajhar',1),(77,3,'Lakhimpur',1),(78,3,'Majuli',1),(79,3,'Morigaon',1),(80,3,'Nagaon',1),(81,3,'Nalbari',1),(82,3,'Sivasagar',1),(83,3,'Sonitpur',1),(84,3,'South Salmara-Mankachar',1),(85,3,'Tamulpur',1),(86,3,'Tinsukia',1),(87,3,'Udalguri',1),(88,3,'West Karbi Anglong',1),(89,4,'Araria',1),(90,4,'Arwal',1),(91,4,'Aurangabad',1),(92,4,'Banka',1),(93,4,'Begusarai',1),(94,4,'Bhagalpur',1),(95,4,'Bhojpur',1),(96,4,'Buxar',1),(97,4,'Darbhanga',1),(98,4,'East Champaran',1),(99,4,'Gaya',1),(100,4,'Gopalganj',1),(101,4,'Jamui',1),(102,4,'Jehanabad',1),(103,4,'Kaimur',1),(104,4,'Katihar',1),(105,4,'Khagaria',1),(106,4,'Kishanganj',1),(107,4,'Lakhisarai',1),(108,4,'Madhepura',1),(109,4,'Madhubani',1),(110,4,'Munger',1),(111,4,'Muzaffarpur',1),(112,4,'Nalanda',1),(113,4,'Nawada',1),(114,4,'Patna',1),(115,4,'Purnia',1),(116,4,'Rohtas',1),(117,4,'Saharsa',1),(118,4,'Samastipur',1),(119,4,'Saran',1),(120,4,'Sheikhpura',1),(121,4,'Sheohar',1),(122,4,'Sitamarhi',1),(123,4,'Siwan',1),(124,4,'Supaul',1),(125,4,'Vaishali',1),(126,4,'West Champaran',1),(127,5,'Balod',1),(128,5,'Baloda Bazar',1),(129,5,'Balrampur',1),(130,5,'Bastar',1),(131,5,'Bemetara',1),(132,5,'Bijapur',1),(133,5,'Bilaspur',1),(134,5,'Dantewada',1),(135,5,'Dhamtari',1),(136,5,'Durg',1),(137,5,'Gariaband',1),(138,5,'Gaurela-Pendra-Marwahi',1),(139,5,'Janjgir-Champa',1),(140,5,'Jashpur',1),(141,5,'Kabirdham',1),(142,5,'Kanker',1),(143,5,'Khairagarh-Chhuikhadan-Gandai',1),(144,5,'Kondagaon',1),(145,5,'Korba',1),(146,5,'Korea',1),(147,5,'Mahasamund',1),(148,5,'Manendragarh-Chirmiri-Bharatpur',1),(149,5,'Mohla-Manpur-Ambagarh Chowki',1),(150,5,'Mungeli',1),(151,5,'Narayanpur',1),(152,5,'Raigarh',1),(153,5,'Raipur',1),(154,5,'Rajnandgaon',1),(155,5,'Sakti',1),(156,5,'Sarangarh-Bilaigarh',1),(157,5,'Sukma',1),(158,5,'Surajpur',1),(159,5,'Surguja',1),(160,6,'North Goa',1),(161,6,'South Goa',1),(162,7,'Ahmedabad',1),(163,7,'Amreli',1),(164,7,'Anand',1),(165,7,'Aravalli',1),(166,7,'Banaskantha',1),(167,7,'Bharuch',1),(168,7,'Bhavnagar',1),(169,7,'Botad',1),(170,7,'Chhota Udepur',1),(171,7,'Dahod',1),(172,7,'Dang',1),(173,7,'Devbhoomi Dwarka',1),(174,7,'Gandhinagar',1),(175,7,'Gir Somnath',1),(176,7,'Jamnagar',1),(177,7,'Junagadh',1),(178,7,'Kheda',1),(179,7,'Kutch',1),(180,7,'Mahisagar',1),(181,7,'Mehsana',1),(182,7,'Morbi',1),(183,7,'Narmada',1),(184,7,'Navsari',1),(185,7,'Panchmahal',1),(186,7,'Patan',1),(187,7,'Porbandar',1),(188,7,'Rajkot',1),(189,7,'Sabarkantha',1),(190,7,'Surat',1),(191,7,'Surendranagar',1),(192,7,'Tapi',1),(193,7,'Vadodara',1),(194,7,'Valsad',1),(195,8,'Ambala',1),(196,8,'Bhiwani',1),(197,8,'Charkhi Dadri',1),(198,8,'Faridabad',1),(199,8,'Fatehabad',1),(200,8,'Gurugram',1),(201,8,'Hisar',1),(202,8,'Jhajjar',1),(203,8,'Jind',1),(204,8,'Kaithal',1),(205,8,'Karnal',1),(206,8,'Kurukshetra',1),(207,8,'Mahendragarh',1),(208,8,'Nuh',1),(209,8,'Palwal',1),(210,8,'Panchkula',1),(211,8,'Panipat',1),(212,8,'Rewari',1),(213,8,'Rohtak',1),(214,8,'Sirsa',1),(215,8,'Sonipat',1),(216,8,'Yamunanagar',1),(217,9,'Bilaspur',1),(218,9,'Chamba',1),(219,9,'Hamirpur',1),(220,9,'Kangra',1),(221,9,'Kinnaur',1),(222,9,'Kullu',1),(223,9,'Lahaul and Spiti',1),(224,9,'Mandi',1),(225,9,'Shimla',1),(226,9,'Sirmaur',1),(227,9,'Solan',1),(228,9,'Una',1),(229,10,'Bokaro',1),(230,10,'Chatra',1),(231,10,'Deoghar',1),(232,10,'Dhanbad',1),(233,10,'Dumka',1),(234,10,'East Singhbhum',1),(235,10,'Garhwa',1),(236,10,'Giridih',1),(237,10,'Godda',1),(238,10,'Gumla',1),(239,10,'Hazaribagh',1),(240,10,'Jamtara',1),(241,10,'Khunti',1),(242,10,'Koderma',1),(243,10,'Latehar',1),(244,10,'Lohardaga',1),(245,10,'Pakur',1),(246,10,'Palamu',1),(247,10,'Ramgarh',1),(248,10,'Ranchi',1),(249,10,'Sahebganj',1),(250,10,'Seraikela Kharsawan',1),(251,10,'Simdega',1),(252,10,'West Singhbhum',1),(253,11,'Bagalkot',1),(254,11,'Ballari',1),(255,11,'Belagavi',1),(256,11,'Bengaluru Rural',1),(257,11,'Bengaluru Urban',1),(258,11,'Bidar',1),(259,11,'Chamarajanagar',1),(260,11,'Chikkaballapur',1),(261,11,'Chikkamagaluru',1),(262,11,'Chitradurga',1),(263,11,'Dakshina Kannada',1),(264,11,'Davanagere',1),(265,11,'Dharwad',1),(266,11,'Gadag',1),(267,11,'Hassan',1),(268,11,'Haveri',1),(269,11,'Kalaburagi',1),(270,11,'Kodagu',1),(271,11,'Kolar',1),(272,11,'Koppal',1),(273,11,'Mandya',1),(274,11,'Mysuru',1),(275,11,'Raichur',1),(276,11,'Ramanagara',1),(277,11,'Shivamogga',1),(278,11,'Tumakuru',1),(279,11,'Udupi',1),(280,11,'Uttara Kannada',1),(281,11,'Vijayanagara',1),(282,11,'Vijayapura',1),(283,11,'Yadgir',1),(284,12,'Alappuzha',1),(285,12,'Ernakulam',1),(286,12,'Idukki',1),(287,12,'Kannur',1),(288,12,'Kasaragod',1),(289,12,'Kollam',1),(290,12,'Kottayam',1),(291,12,'Kozhikode',1),(292,12,'Malappuram',1),(293,12,'Palakkad',1),(294,12,'Pathanamthitta',1),(295,12,'Thiruvananthapuram',1),(296,12,'Thrissur',1),(297,12,'Wayanad',1),(298,13,'Agar Malwa',1),(299,13,'Alirajpur',1),(300,13,'Anuppur',1),(301,13,'Ashoknagar',1),(302,13,'Balaghat',1),(303,13,'Barwani',1),(304,13,'Betul',1),(305,13,'Bhind',1),(306,13,'Bhopal',1),(307,13,'Burhanpur',1),(308,13,'Chhatarpur',1),(309,13,'Chhindwara',1),(310,13,'Damoh',1),(311,13,'Datia',1),(312,13,'Dewas',1),(313,13,'Dhar',1),(314,13,'Dindori',1),(315,13,'Guna',1),(316,13,'Gwalior',1),(317,13,'Harda',1),(318,13,'Indore',1),(319,13,'Jabalpur',1),(320,13,'Jhabua',1),(321,13,'Katni',1),(322,13,'Khandwa',1),(323,13,'Khargone',1),(324,13,'Maihar',1),(325,13,'Mandla',1),(326,13,'Mandsaur',1),(327,13,'Mauganj',1),(328,13,'Morena',1),(329,13,'Narmadapuram',1),(330,13,'Narsinghpur',1),(331,13,'Neemuch',1),(332,13,'Niwari',1),(333,13,'Panna',1),(334,13,'Raisen',1),(335,13,'Rajgarh',1),(336,13,'Ratlam',1),(337,13,'Rewa',1),(338,13,'Sagar',1),(339,13,'Satna',1),(340,13,'Sehore',1),(341,13,'Seoni',1),(342,13,'Shahdol',1),(343,13,'Shajapur',1),(344,13,'Sheopur',1),(345,13,'Shivpuri',1),(346,13,'Sidhi',1),(347,13,'Singrauli',1),(348,13,'Tikamgarh',1),(349,13,'Ujjain',1),(350,13,'Umaria',1),(351,13,'Vidisha',1),(352,14,'Ahmednagar',1),(353,14,'Akola',1),(354,14,'Amravati',1),(355,14,'Aurangabad',1),(356,14,'Beed',1),(357,14,'Bhandara',1),(358,14,'Buldhana',1),(359,14,'Chandrapur',1),(360,14,'Dhule',1),(361,14,'Gadchiroli',1),(362,14,'Gondia',1),(363,14,'Hingoli',1),(364,14,'Jalgaon',1),(365,14,'Jalna',1),(366,14,'Kolhapur',1),(367,14,'Latur',1),(368,14,'Mumbai City',1),(369,14,'Mumbai Suburban',1),(370,14,'Nagpur',1),(371,14,'Nanded',1),(372,14,'Nandurbar',1),(373,14,'Nashik',1),(374,14,'Osmanabad',1),(375,14,'Palghar',1),(376,14,'Parbhani',1),(377,14,'Pune',1),(378,14,'Raigad',1),(379,14,'Ratnagiri',1),(380,14,'Sangli',1),(381,14,'Satara',1),(382,14,'Sindhudurg',1),(383,14,'Solapur',1),(384,14,'Thane',1),(385,14,'Wardha',1),(386,14,'Washim',1),(387,14,'Yavatmal',1),(388,15,'Bishnupur',1),(389,15,'Chandel',1),(390,15,'Churachandpur',1),(391,15,'Imphal East',1),(392,15,'Imphal West',1),(393,15,'Jiribam',1),(394,15,'Kakching',1),(395,15,'Kamjong',1),(396,15,'Kangpokpi',1),(397,15,'Noney',1),(398,15,'Pherzawl',1),(399,15,'Senapati',1),(400,15,'Tamenglong',1),(401,15,'Tengnoupal',1),(402,15,'Thoubal',1),(403,15,'Ukhrul',1),(404,16,'East Garo Hills',1),(405,16,'East Jaintia Hills',1),(406,16,'East Khasi Hills',1),(407,16,'Eastern West Khasi Hills',1),(408,16,'North Garo Hills',1),(409,16,'Ri Bhoi',1),(410,16,'South Garo Hills',1),(411,16,'South West Garo Hills',1),(412,16,'South West Khasi Hills',1),(413,16,'West Garo Hills',1),(414,16,'West Jaintia Hills',1),(415,16,'West Khasi Hills',1),(416,17,'Aizawl',1),(417,17,'Champhai',1),(418,17,'Hnahthial',1),(419,17,'Khawzawl',1),(420,17,'Kolasib',1),(421,17,'Lawngtlai',1),(422,17,'Lunglei',1),(423,17,'Mamit',1),(424,17,'Saiha',1),(425,17,'Saitual',1),(426,17,'Serchhip',1),(427,18,'Chumoukedima',1),(428,18,'Dimapur',1),(429,18,'Kiphire',1),(430,18,'Kohima',1),(431,18,'Longleng',1),(432,18,'Mokokchung',1),(433,18,'Mon',1),(434,18,'Niuland',1),(435,18,'Noklak',1),(436,18,'Peren',1),(437,18,'Phek',1),(438,18,'Shamator',1),(439,18,'Tuensang',1),(440,18,'Tseminyu',1),(441,18,'Wokha',1),(442,18,'Zunheboto',1),(443,19,'Angul',1),(444,19,'Balangir',1),(445,19,'Balasore',1),(446,19,'Bargarh',1),(447,19,'Bhadrak',1),(448,19,'Boudh',1),(449,19,'Cuttack',1),(450,19,'Deogarh',1),(451,19,'Dhenkanal',1),(452,19,'Gajapati',1),(453,19,'Ganjam',1),(454,19,'Jagatsinghpur',1),(455,19,'Jajpur',1),(456,19,'Jharsuguda',1),(457,19,'Kalahandi',1),(458,19,'Kandhamal',1),(459,19,'Kendrapara',1),(460,19,'Kendujhar',1),(461,19,'Khordha',1),(462,19,'Koraput',1),(463,19,'Malkangiri',1),(464,19,'Mayurbhanj',1),(465,19,'Nabarangpur',1),(466,19,'Nayagarh',1),(467,19,'Nuapada',1),(468,19,'Puri',1),(469,19,'Rayagada',1),(470,19,'Sambalpur',1),(471,19,'Subarnapur',1),(472,19,'Sundargarh',1),(473,20,'Amritsar',1),(474,20,'Barnala',1),(475,20,'Bathinda',1),(476,20,'Faridkot',1),(477,20,'Fatehgarh Sahib',1),(478,20,'Fazilka',1),(479,20,'Ferozepur',1),(480,20,'Gurdaspur',1),(481,20,'Hoshiarpur',1),(482,20,'Jalandhar',1),(483,20,'Kapurthala',1),(484,20,'Ludhiana',1),(485,20,'Malerkotla',1),(486,20,'Mansa',1),(487,20,'Moga',1),(488,20,'Pathankot',1),(489,20,'Patiala',1),(490,20,'Rupnagar',1),(491,20,'Sahibzada Ajit Singh Nagar',1),(492,20,'Sangrur',1),(493,20,'Shahid Bhagat Singh Nagar',1),(494,20,'Sri Muktsar Sahib',1),(495,20,'Tarn Taran',1),(496,21,'Ajmer',1),(497,21,'Alwar',1),(498,21,'Anupgarh',1),(499,21,'Balotra',1),(500,21,'Banswara',1),(501,21,'Baran',1),(502,21,'Barmer',1),(503,21,'Beawar',1),(504,21,'Bharatpur',1),(505,21,'Bhilwara',1),(506,21,'Bikaner',1),(507,21,'Bundi',1),(508,21,'Chittorgarh',1),(509,21,'Churu',1),(510,21,'Dausa',1),(511,21,'Deeg',1),(512,21,'Dholpur',1),(513,21,'Didwana-Kuchamana',1),(514,21,'Dudu',1),(515,21,'Dungarpur',1),(516,21,'Ganganagar',1),(517,21,'Gangapur City',1),(518,21,'Hanumangarh',1),(519,21,'Jaipur',1),(520,21,'Jaisalmer',1),(521,21,'Jalore',1),(522,21,'Jhalawar',1),(523,21,'Jhunjhunu',1),(524,21,'Jodhpur',1),(525,21,'Karauli',1),(526,21,'Kekri',1),(527,21,'Khairthal-Tijara',1),(528,21,'Kota',1),(529,21,'Kotputli-Behror',1),(530,21,'Nagaur',1),(531,21,'Neem Ka Thana',1),(532,21,'Pali',1),(533,21,'Phalodi',1),(534,21,'Pratapgarh',1),(535,21,'Rajsamand',1),(536,21,'Salumbar',1),(537,21,'Sawai Madhopur',1),(538,21,'Shahpura',1),(539,21,'Sikar',1),(540,21,'Sirohi',1),(541,21,'Tonk',1),(542,21,'Udaipur',1),(543,22,'Gangtok',1),(544,22,'Gyalshing',1),(545,22,'Mangan',1),(546,22,'Namchi',1),(547,22,'Pakyong',1),(548,22,'Soreng',1),(549,23,'Ariyalur',1),(550,23,'Chengalpattu',1),(551,23,'Chennai',1),(552,23,'Coimbatore',1),(553,23,'Cuddalore',1),(554,23,'Dharmapuri',1),(555,23,'Dindigul',1),(556,23,'Erode',1),(557,23,'Kallakurichi',1),(558,23,'Kanchipuram',1),(559,23,'Kanniyakumari',1),(560,23,'Karur',1),(561,23,'Krishnagiri',1),(562,23,'Madurai',1),(563,23,'Mayiladuthurai',1),(564,23,'Nagapattinam',1),(565,23,'Namakkal',1),(566,23,'Perambalur',1),(567,23,'Pudukkottai',1),(568,23,'Ramanathapuram',1),(569,23,'Ranipet',1),(570,23,'Salem',1),(571,23,'Sivaganga',1),(572,23,'Tenkasi',1),(573,23,'Thanjavur',1),(574,23,'Theni',1),(575,23,'Thoothukudi',1),(576,23,'Tiruchirappalli',1),(577,23,'Tirunelveli',1),(578,23,'Tirupathur',1),(579,23,'Tiruppur',1),(580,23,'Tiruvallur',1),(581,23,'Tiruvannamalai',1),(582,23,'Tiruvarur',1),(583,23,'Vellore',1),(584,23,'Viluppuram',1),(585,23,'Virudhunagar',1),(586,24,'Adilabad',1),(587,24,'Bhadradri Kothagudem',1),(588,24,'Hanamkonda',1),(589,24,'Hyderabad',1),(590,24,'Jagtial',1),(591,24,'Jangaon',1),(592,24,'Jayashankar Bhupalpally',1),(593,24,'Jogulamba Gadwal',1),(594,24,'Kamareddy',1),(595,24,'Karimnagar',1),(596,24,'Khammam',1),(597,24,'Komaram Bheem',1),(598,24,'Mahabubabad',1),(599,24,'Mahbubnagar',1),(600,24,'Mancherial',1),(601,24,'Medak',1),(602,24,'Medchal-Malkajgiri',1),(603,24,'Mulugu',1),(604,24,'Nagarkurnool',1),(605,24,'Nalgonda',1),(606,24,'Narayanpet',1),(607,24,'Nirmal',1),(608,24,'Nizamabad',1),(609,24,'Peddapalli',1),(610,24,'Rajanna Sircilla',1),(611,24,'Rangareddy',1),(612,24,'Sangareddy',1),(613,24,'Siddipet',1),(614,24,'Suryapet',1),(615,24,'Vikarabad',1),(616,24,'Wanaparthy',1),(617,24,'Warangal',1),(618,24,'Yadadri Bhuvanagiri',1),(619,25,'Dhalai',1),(620,25,'Gomati',1),(621,25,'Khowai',1),(622,25,'North Tripura',1),(623,25,'Sepahijala',1),(624,25,'South Tripura',1),(625,25,'Unakoti',1),(626,25,'West Tripura',1),(627,26,'Agra',1),(628,26,'Aligarh',1),(629,26,'Ambedkar Nagar',1),(630,26,'Amethi',1),(631,26,'Amroha',1),(632,26,'Auraiya',1),(633,26,'Ayodhya',1),(634,26,'Azamgarh',1),(635,26,'Baghpat',1),(636,26,'Bahraich',1),(637,26,'Ballia',1),(638,26,'Balrampur',1),(639,26,'Banda',1),(640,26,'Barabanki',1),(641,26,'Bareilly',1),(642,26,'Basti',1),(643,26,'Bhadohi',1),(644,26,'Bijnor',1),(645,26,'Budaun',1),(646,26,'Bulandshahr',1),(647,26,'Chandauli',1),(648,26,'Chitrakoot',1),(649,26,'Deoria',1),(650,26,'Etah',1),(651,26,'Etawah',1),(652,26,'Farrukhabad',1),(653,26,'Fatehpur',1),(654,26,'Firozabad',1),(655,26,'Gautam Buddha Nagar',1),(656,26,'Ghaziabad',1),(657,26,'Ghazipur',1),(658,26,'Gonda',1),(659,26,'Gorakhpur',1),(660,26,'Hamirpur',1),(661,26,'Hapur',1),(662,26,'Hardoi',1),(663,26,'Hathras',1),(664,26,'Jalaun',1),(665,26,'Jaunpur',1),(666,26,'Jhansi',1),(667,26,'Kannauj',1),(668,26,'Kanpur Dehat',1),(669,26,'Kanpur Nagar',1),(670,26,'Kasganj',1),(671,26,'Kaushambi',1),(672,26,'Kushinagar',1),(673,26,'Lakhimpur Kheri',1),(674,26,'Lalitpur',1),(675,26,'Lucknow',1),(676,26,'Maharajganj',1),(677,26,'Mahoba',1),(678,26,'Mainpuri',1),(679,26,'Mathura',1),(680,26,'Mau',1),(681,26,'Meerut',1),(682,26,'Mirzapur',1),(683,26,'Moradabad',1),(684,26,'Muzaffarnagar',1),(685,26,'Pilibhit',1),(686,26,'Pratapgarh',1),(687,26,'Prayagraj',1),(688,26,'Raebareli',1),(689,26,'Rampur',1),(690,26,'Saharanpur',1),(691,26,'Sambhal',1),(692,26,'Sant Kabir Nagar',1),(693,26,'Shahjahanpur',1),(694,26,'Shamli',1),(695,26,'Shravasti',1),(696,26,'Siddharthnagar',1),(697,26,'Sitapur',1),(698,26,'Sonbhadra',1),(699,26,'Sultanpur',1),(700,26,'Unnao',1),(701,26,'Varanasi',1),(702,27,'Almora',1),(703,27,'Bageshwar',1),(704,27,'Chamoli',1),(705,27,'Champawat',1),(706,27,'Dehradun',1),(707,27,'Haridwar',1),(708,27,'Nainital',1),(709,27,'Pauri Garhwal',1),(710,27,'Pithoragarh',1),(711,27,'Rudraprayag',1),(712,27,'Tehri Garhwal',1),(713,27,'Udham Singh Nagar',1),(714,27,'Uttarkashi',1),(715,28,'Alipurduar',1),(716,28,'Bankura',1),(717,28,'Birbhum',1),(718,28,'Cooch Behar',1),(719,28,'Dakshin Dinajpur',1),(720,28,'Darjeeling',1),(721,28,'Hooghly',1),(722,28,'Howrah',1),(723,28,'Jalpaiguri',1),(724,28,'Jhargram',1),(725,28,'Kalimpong',1),(726,28,'Kolkata',1),(727,28,'Malda',1),(728,28,'Murshidabad',1),(729,28,'Nadia',1),(730,28,'North 24 Parganas',1),(731,28,'Paschim Bardhaman',1),(732,28,'Paschim Medinipur',1),(733,28,'Purba Bardhaman',1),(734,28,'Purba Medinipur',1),(735,28,'Purulia',1),(736,28,'South 24 Parganas',1),(737,28,'Uttar Dinajpur',1),(738,29,'Nicobar',1),(739,29,'North and Middle Andaman',1),(740,29,'South Andaman',1),(741,30,'Chandigarh',1),(742,31,'Dadra and Nagar Haveli',1),(743,31,'Daman',1),(744,31,'Diu',1),(745,32,'Central Delhi',1),(746,32,'East Delhi',1),(747,32,'New Delhi',1),(748,32,'North Delhi',1),(749,32,'North East Delhi',1),(750,32,'North West Delhi',1),(751,32,'Shahdara',1),(752,32,'South Delhi',1),(753,32,'South East Delhi',1),(754,32,'South West Delhi',1),(755,32,'West Delhi',1),(756,33,'Anantnag',1),(757,33,'Bandipora',1),(758,33,'Baramulla',1),(759,33,'Budgam',1),(760,33,'Doda',1),(761,33,'Ganderbal',1),(762,33,'Jammu',1),(763,33,'Kathua',1),(764,33,'Kishtwar',1),(765,33,'Kulgam',1),(766,33,'Kupwara',1),(767,33,'Poonch',1),(768,33,'Pulwama',1),(769,33,'Rajouri',1),(770,33,'Ramban',1),(771,33,'Reasi',1),(772,33,'Samba',1),(773,33,'Shopian',1),(774,33,'Srinagar',1),(775,33,'Udhampur',1),(776,34,'Kargil',1),(777,34,'Leh',1),(778,35,'Agatti',1),(779,35,'Amini',1),(780,35,'Andrott',1),(781,35,'Bitra',1),(782,35,'Chetlat',1),(783,35,'Kavaratti',1),(784,35,'Kalpeni',1),(785,35,'Kadmat',1),(786,35,'Kiltan',1),(787,35,'Minicoy',1),(788,36,'Karaikal',1),(789,36,'Mahe',1),(790,36,'Puducherry',1),(791,36,'Yanam',1);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_application_action`
--

DROP TABLE IF EXISTS `mas_application_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_application_action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_application_action`
--

LOCK TABLES `mas_application_action` WRITE;
/*!40000 ALTER TABLE `mas_application_action` DISABLE KEYS */;
INSERT INTO `mas_application_action` VALUES (1,'SUBMITTED'),(2,'PDF_GENERATED'),(3,'SIGNED_APPLICATION_UPLOADED'),(4,'DEALING_HAND_REVIEW'),(5,'SO_REVIEW'),(6,'US_REVIEW'),(7,'JS_REVIEW'),(8,'SECRETARY_REVIEW'),(9,'APPROVED'),(10,'PERMISSION_LETTER_GENERATED'),(11,'PERMISSION_LETTER_SIGNED'),(12,'COMPLETED'),(13,'RETURNED'),(14,'REJECTED'),(15,'Saved_AS_DRAFT');
/*!40000 ALTER TABLE `mas_application_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_designation`
--

DROP TABLE IF EXISTS `mas_designation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_designation` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_designation`
--

LOCK TABLES `mas_designation` WRITE;
/*!40000 ALTER TABLE `mas_designation` DISABLE KEYS */;
/*!40000 ALTER TABLE `mas_designation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_model`
--

DROP TABLE IF EXISTS `mas_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `vendor_id` int NOT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_model`
--

LOCK TABLES `mas_model` WRITE;
/*!40000 ALTER TABLE `mas_model` DISABLE KEYS */;
INSERT INTO `mas_model` VALUES (1,'BSS-JX 400 (Multi-band)',1,1),(2,'NDE Sentinel 5G',2,1),(3,'Shakti SJ-2100',7,1),(4,'Indus RF Guard Pro',8,1),(5,'SAT-Mode',1,1),(6,'Shaker-model',2,1),(7,'JAM_MOD-2',8,1);
/*!40000 ALTER TABLE `mas_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_organization`
--

DROP TABLE IF EXISTS `mas_organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_organization` (
  `id` int NOT NULL AUTO_INCREMENT,
  `org_name` varchar(1000) NOT NULL,
  `org_type` int NOT NULL,
  `org_description` varchar(1000) DEFAULT NULL,
  `authorization_letter_required` int NOT NULL DEFAULT '1',
  `isactive` tinyint NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_organization`
--

LOCK TABLES `mas_organization` WRITE;
/*!40000 ALTER TABLE `mas_organization` DISABLE KEYS */;
INSERT INTO `mas_organization` VALUES (1,'SSC',2,'Staff Selection Commission',1,1,'2026-08-17 17:44:15','2026-08-18 12:18:19'),(2,'UPSC',2,'Union Public Service Commission',1,1,'2026-08-18 06:56:42','2026-08-18 12:19:37'),(3,'IBPS',3,'Institute of Banking Personnel Selection',1,1,'2026-08-18 06:56:55','2026-08-18 12:18:24'),(4,'RRB',2,'Railway Recruitment Board',1,1,'2026-08-18 06:57:08','2026-08-18 12:18:26'),(5,'NTA',3,'National Testing Agency',1,1,'2026-08-18 06:57:21','2026-08-18 12:18:28'),(6,'NRA',1,'National Recruitment Agency',1,1,'2026-08-18 06:57:31','2026-08-18 06:57:31'),(7,'SBI',2,'State Bank of India',1,1,'2026-08-18 06:57:42','2026-08-18 06:57:42'),(8,'FCI',7,'',1,1,'2026-08-18 09:53:49','2026-08-18 09:53:49'),(9,'DRDO',6,'',1,1,'2026-08-18 09:53:59','2026-08-18 09:53:59'),(10,'ISRO',5,'',1,1,'2026-08-18 09:54:09','2026-08-18 09:54:09'),(11,'BPSC',4,'',1,1,'2026-08-18 09:54:19','2026-08-18 09:54:19'),(12,'SEBI',4,'',1,1,'2026-08-18 09:54:32','2026-08-18 09:54:32');
/*!40000 ALTER TABLE `mas_organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_organization_type`
--

DROP TABLE IF EXISTS `mas_organization_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_organization_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `isactive` tinyint NOT NULL DEFAULT '1',
  `is_ugc_id_required` tinyint NOT NULL DEFAULT '0',
  `competent_authority` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_organization_type`
--

LOCK TABLES `mas_organization_type` WRITE;
/*!40000 ALTER TABLE `mas_organization_type` DISABLE KEYS */;
INSERT INTO `mas_organization_type` VALUES (1,'Statuary Body',1,0,'HOD'),(2,'Recruitment Commission',1,1,''),(3,'Constitutional Recruitment Commission',1,1,''),(4,'Banking Recruitment Body',1,0,''),(5,'Railway Recruitment Board',1,0,''),(6,'Examination Agency',1,0,''),(7,'Recruitment Board',1,1,'');
/*!40000 ALTER TABLE `mas_organization_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_registration_action`
--

DROP TABLE IF EXISTS `mas_registration_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_registration_action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_registration_action`
--

LOCK TABLES `mas_registration_action` WRITE;
/*!40000 ALTER TABLE `mas_registration_action` DISABLE KEYS */;
INSERT INTO `mas_registration_action` VALUES (1,'Registration Request Submitted'),(2,'Mail sent to user for uploading authorization letter'),(3,'Under Verification'),(4,'Approved'),(5,'Rejected'),(6,'Login Credentials Sent on mail');
/*!40000 ALTER TABLE `mas_registration_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_role`
--

DROP TABLE IF EXISTS `mas_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(45) NOT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_role`
--

LOCK TABLES `mas_role` WRITE;
/*!40000 ALTER TABLE `mas_role` DISABLE KEYS */;
INSERT INTO `mas_role` VALUES (1,'Organization User','ORG_USER',1),(2,'Dealing Hand','DEALING_HAND',1),(3,'Section Officer','SO',1),(4,'Under Secretary','US',1),(5,'Joint Secretary','JS',1),(6,'Secretary','SECRETARY',1),(7,'Administrator','ADMIN',1),(8,'Report View Only','REPORT_VIEW',1),(9,'System Admin','SYSTEM_ADMIN',1);
/*!40000 ALTER TABLE `mas_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mas_vendor`
--

DROP TABLE IF EXISTS `mas_vendor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_vendor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(250) NOT NULL,
  `isactive` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_vendor`
--

LOCK TABLES `mas_vendor` WRITE;
/*!40000 ALTER TABLE `mas_vendor` DISABLE KEYS */;
INSERT INTO `mas_vendor` VALUES (1,'Bharat Secure Systems Pvt. Ltd','1'),(2,'Netra Defence Electronics','1'),(7,'Shakti Communication Works','1'),(8,'Indus RF Technologies','1');
/*!40000 ALTER TABLE `mas_vendor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization_monthly_counter`
--

DROP TABLE IF EXISTS `organization_monthly_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organization_monthly_counter` (
  `organization_id` int NOT NULL,
  `year_month_counter` char(6) NOT NULL,
  `last_count` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`organization_id`,`year_month_counter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization_monthly_counter`
--

LOCK TABLES `organization_monthly_counter` WRITE;
/*!40000 ALTER TABLE `organization_monthly_counter` DISABLE KEYS */;
INSERT INTO `organization_monthly_counter` VALUES (2,'202609',47);
/*!40000 ALTER TABLE `organization_monthly_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reg_daily_counter`
--

DROP TABLE IF EXISTS `reg_daily_counter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reg_daily_counter` (
  `request_date` date NOT NULL,
  `request_no` int NOT NULL,
  PRIMARY KEY (`request_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reg_daily_counter`
--

LOCK TABLES `reg_daily_counter` WRITE;
/*!40000 ALTER TABLE `reg_daily_counter` DISABLE KEYS */;
INSERT INTO `reg_daily_counter` VALUES ('2026-08-21',3),('2026-08-22',7),('2026-08-24',4),('2026-08-27',2),('2026-08-28',19),('2026-08-29',1),('2026-08-31',2);
/*!40000 ALTER TABLE `reg_daily_counter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reg_no` varchar(250) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `org_type` int DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `ugc_id` varchar(100) DEFAULT NULL,
  `auth_link` varchar(500) DEFAULT NULL,
  `auth_link_generated_at` datetime DEFAULT NULL,
  `isactive_authlink` tinyint DEFAULT NULL,
  `authorization_letter` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reg_no_UNIQUE` (`reg_no`),
  KEY `org_idx` (`organization_id`),
  KEY `org_type_idx` (`org_type`),
  CONSTRAINT `org` FOREIGN KEY (`organization_id`) REFERENCES `mas_organization` (`id`),
  CONSTRAINT `org_type` FOREIGN KEY (`org_type`) REFERENCES `mas_organization_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (61,'REG/20260821/1','Gitesh Srivastava','gitesh@gmail.com','7840091293',2,2,NULL,'PMO TST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYxLCJleHBpcmVzIjoxNzg3NTY2NTc2fQ.dd1cdfe6356323707dcc02bc904736a006bc49a5fdacc789f1956dfbc3827b04','2026-08-21 10:16:16',1,'1787307397_f2eac820031ab0171d96.pdf'),(62,'REG/20260821/2','Rohit','rkcsid1234@gmail.com','12345678907',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYyLCJleHBpcmVzIjoxNzg3NTcwNzAwfQ.94870195f5820f39cbca22cffce0dee2e6819dd6e968b72b57bf188f76cb30f8','2026-08-21 11:25:00',1,'1787311519_a2470c44ae22a80ad6e5.pdf'),(63,'REG/20260821/3','Rohit Kumar','rkcsid1234@gmail.com','7840091293',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYzLCJleHBpcmVzIjoxNzg3NTcyODU3fQ.ab035ce1ce1fe2f947387a7f243ed642e17ad749481f1700dd2cefd5bc02e5e4','2026-08-21 12:00:57',1,'1787313682_a072e1ea64f45d6f1a24.pdf'),(64,'REG/20260822/1','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY0LCJleHBpcmVzIjoxNzg3NjMyMzk3fQ.199783d0af924169c54a4a89a3af4e21828b73d5f0f14d568a855c3a60a02a1c','2026-08-22 04:33:17',1,'1787373221_dbae2a49934d86d9fa05.pdf'),(65,'REG/20260822/2','Rohit','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY1LCJleHBpcmVzIjoxNzg3NjM2NTA4fQ.ccead99d26a8a7f655827c470ebf7e803688df169b19c2a71dd375c2544b6caa','2026-08-22 05:41:48',1,'1787377329_fe2225538b02d96a1d2d.pdf'),(66,'REG/20260822/3','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY2LCJleHBpcmVzIjoxNzg3NjQxOTI1fQ.96dea759a8205ab2401a4555e365b07840335dc2442f3d202b61b612bd95a5f0','2026-08-22 07:12:05',1,'1787382755_3cc933131984b7b8b252.pdf'),(67,'REG/20260822/4','Rohit','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY3LCJleHBpcmVzIjoxNzg3NjQyMzQ3fQ.8c34e711b068c198d46c80d0d43a6b1cedc9f6b0f6ae7d15cf364f4ea71a56db','2026-08-22 07:19:07',1,'1787383210_ed703b85c74811930cf7.pdf'),(68,'REG/20260822/5','Rohit','rkcsid1234@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY4LCJleHBpcmVzIjoxNzg3NjUxMTY0fQ.f1022bdf4271f69a62096395c17d82b56336e094df01855cfb38d07f20a5b237','2026-08-22 09:46:04',1,'1787392026_4f95b4164cbd3c6d6c02.pdf'),(69,'REG/20260822/6','Rohit','rkcsid1234@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY5LCJleHBpcmVzIjoxNzg3NjUxNzU0fQ.faad41212799aec6e84f267a0d84a6b483a81e75d9abd528acb618ced662d4c0','2026-08-22 09:55:54',1,'1787393230_8459a22e20b37dc9c05d.pdf'),(70,'REG/20260822/7','Rohit','rkcsid1234@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcwLCJleHBpcmVzIjoxNzg3NjUyNzU5fQ.18ca631ffd42fe3c2fe7f1e7eb1d6b4df41b56a1ece29409d1e15b977e03a1d7','2026-08-22 10:12:39',1,'1787393606_000bfeec258f4a880018.pdf'),(71,'REG/20260824/1','Rohit k','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO Test','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcxLCJleHBpcmVzIjoxNzg3ODA5MDE4fQ.c23e3292edde2a879ea240c8f8bbada32c6c85e09a019ff8d2c6123389e11ea1','2026-08-24 05:36:58',1,'1787549845_15a3160b08551a090967.pdf'),(72,'REG/20260824/2','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'TEST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcyLCJleHBpcmVzIjoxNzg3ODA5NDgxfQ.99a30995ee48c8ff8e5682c249627c655683f7ca5c57df48bfa2f349ae0b5bed','2026-08-24 05:44:41',1,'1787550456_318713354828c06c9e98.pdf'),(73,'REG/20260824/3','Rohit','rkcsid12341111@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjczLCJleHBpcmVzIjoxNzg3ODExNzk0fQ.f0e0854d4a35ac23953dd3886d0e9893cb2fab8cb43bfa5b7dbaea24039d645e','2026-08-24 06:23:14',1,NULL),(74,'REG/20260824/4','Rohit KN','rkcsid1234@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjc0LCJleHBpcmVzIjoxNzg3ODEyOTc1fQ.3064c0459dcbb1d00b16c10a67188b3b7f066852088f065c9f77582abf86e7fe','2026-08-24 06:42:55',1,'1787553827_1a68d90c3bf0b71f2a60.pdf'),(75,'REG/20260827/1','Rohit','rkcsid123422@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjc1LCJleHBpcmVzIjoxNzg4MDY5OTkyfQ.bb15bc37d022893d34c881f49c8e6edef8c1fe7cd2fcc66b0d7194d7c47ac04c','2026-08-27 06:06:32',1,'1787810815_d16fcba2b5ae4d910a04.pdf'),(76,'REG/20260827/2','Rohit','rkcsid123334@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjc2LCJleHBpcmVzIjoxNzg4MDkyOTAwfQ.7bf3a62eaa1995ab617e7bc5732c9b6b02816410bcb894277f4519d50f7e276e','2026-08-27 12:28:20',1,'1787833720_e44b2bad692b14677fb1.pdf'),(77,'REG/20260828/1','Rohit','rkcsid166234@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjc3LCJleHBpcmVzIjoxNzg4MTYxMDM0fQ.1b559057dc6406ec3dfd73e3339f940e4d11cef3e56bbc7a633938425b76742f','2026-08-28 07:23:54',1,NULL),(78,'REG/20260828/2','Rohit','rkcsid122234@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjc4LCJleHBpcmVzIjoxNzg4MTYxMzM2fQ.39dac0c5c1a725bdbda783fc1c30b83af3daac08fc29afd5b34c151d7b310216','2026-08-28 07:28:56',1,NULL),(79,'REG/20260828/3','Rohit','rkcsid123411@gmail.com','7840091293',3,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjc5LCJleHBpcmVzIjoxNzg4MTY2ODU4fQ.b82fa34d5872bcd5f91ff2ed37bb33dfd7e7563ffc7b8a23e984e8d7c6f329f3','2026-08-28 09:00:58',1,'1787907744_53d18c9d86d039e08f4e.pdf'),(80,'REG/20260828/4','Rohit','rkcsid121134@gmail.com','1234567890',2,3,NULL,'1213','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjgwLCJleHBpcmVzIjoxNzg4MTY3NTE4fQ.b585d88fda663bb59fed3d6fe569f0bd23584bc074ff001ad4f0d29ae5f9943e','2026-08-28 09:11:58',1,'1787908336_ad8760e50c69c8d53271.png'),(81,'REG/20260828/5','Rohit','rkcsid111234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjgxLCJleHBpcmVzIjoxNzg4MTY3NTY4fQ.f889ed87c98d64654d508e3ba274c52c3c279152027356dba1a29fffd568a980','2026-08-28 09:12:48',1,'1787908386_b9f280731d013e2af3e6.pdf'),(82,'REG/20260828/6','Rohit','rkcsid1234333@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjgyLCJleHBpcmVzIjoxNzg4MTY3OTk5fQ.aeaf4643d056ade336d5712a6c54fc433c26ac82695e713300df33199c70dea8','2026-08-28 09:19:59',1,'1787908895_089e243c31d95224ea83.png'),(83,'REG/20260828/7','Rohit','rkcsid1234333@gmail.com','91784009129',3,4,NULL,NULL,'http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjgzLCJleHBpcmVzIjoxNzg4MTY4MTMwfQ.9358cbde62bf70168166390302ef40a7eb4ef76680ebaec7c6655842064ecdab','2026-08-28 09:22:10',1,'1787908968_55ff500400f73eec0d11.png'),(84,'REG/20260828/8','Rohit','rkcsid124434@gmail.com','91784009129',2,4,NULL,NULL,'http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjg0LCJleHBpcmVzIjoxNzg4MTY4NDI3fQ.f1ab312600a523791668925957bf4a63e6ec256771ea3c180c30c5611baf9a5e','2026-08-28 09:27:07',1,'1787909255_3e1a55fa4c9a0bd68f62.png'),(85,'REG/20260828/9','Rohit','rkcsid177234@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjg1LCJleHBpcmVzIjoxNzg4MTY4NDg3fQ.ffc488143a3de1c2f85c7221dfaa98cbfd0ad9aea8005d0ec38a0feb61dbe100','2026-08-28 09:28:07',1,'1787909303_3412befaf8f8bf0985b7.pdf'),(86,'REG/20260828/10','Rohit','rkcsiduuu1234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjg2LCJleHBpcmVzIjoxNzg4MTY5MDExfQ.fa8b88c391feab5ba79797e38db46b633d3d84d9b2c9ab676769bd728379fe7f','2026-08-28 09:36:51',1,'1787909840_096f89fb60413c9c470c.png'),(87,'REG/20260828/11','Rohit','rkcsid331234@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjg3LCJleHBpcmVzIjoxNzg4MTY5MDg2fQ.d9a1da8572b9fd438c25e432f592c5aea802adf8a241dcd95161be10073a3283','2026-08-28 09:38:06',1,'1787909900_040b2ea2ad2806dd4587.pdf'),(88,'REG/20260828/12','Rohit','rkcsid16234@gmail.com','1234567890',3,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjg4LCJleHBpcmVzIjoxNzg4MTY5Mzc3fQ.a82b67a159ddb7f12cf7a06998e2bb5b2067c673414f6cb2a00ee80247967be8','2026-08-28 09:42:57',1,'1787910194_d7882fec64fd539ef463.png'),(89,'REG/20260828/13','Anupama Rathore','swd1-cabsec786@supportgov.in','09968278918',2,2,NULL,'TEST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjg5LCJleHBpcmVzIjoxNzg4MTY5ODQxfQ.2a02ed3551f4478b6f3a80460dffc85f9d287d33e4801110f8fa59d1a6fbdbd4','2026-08-28 09:50:41',1,'1787910655_6294df23d605f65586bf.pdf'),(90,'REG/20260828/14','Rohit','rkcsid12341@gmail.com','09968278918',2,2,NULL,'TEST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjkwLCJleHBpcmVzIjoxNzg4MTY5ODk1fQ.43359039eadcb95cb707f9667500b2520a60a8f0abcd2dad4b1d12924e3f5187','2026-08-28 09:51:35',1,'1787910712_7aeedd1ded32641723e5.png'),(91,'REG/20260828/15','Rohit','rkcsiwd1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjkxLCJleHBpcmVzIjoxNzg4MTY5OTU3fQ.3bff801deb5336f52726ed0026cb5bb5d0141ea400c830054021fd0a96118ca1','2026-08-28 09:52:37',1,'1787910788_daddc290eca8d10b7d99.pdf'),(92,'REG/20260828/16','Rohit','rkcs44id1234@gmail.com','91784009129',2,3,NULL,'1213','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjkyLCJleHBpcmVzIjoxNzg4MTcwMDI4fQ.b1a895d9ca8b08efe2726943139ceda4a2d97f40e998633972b2923de04bb009','2026-08-28 09:53:48',1,'1787910844_527c63d6f269110ce93d.pdf'),(93,'REG/20260828/17','Rohit','rkcsid221234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjkzLCJleHBpcmVzIjoxNzg4MTcyNjgwfQ.8c5e7d914f1add69be78d5ee9e1b9bd4f04b24b13fe14fb776f3b75b2d19f5d8','2026-08-28 10:38:00',1,'1787913498_5704903960631c08df0b.pdf'),(94,'REG/20260828/18','Rohit','rkcsi333d1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjk0LCJleHBpcmVzIjoxNzg4MTc2ODE5fQ.ef7785ead3a94f1bc4abf801adcfc1d27b93ca5d33af69e2ffc6ff12c7789634','2026-08-28 11:46:59',1,'1787917636_07d07b99125710a945a7.pdf'),(95,'REG/20260828/19','Anupama Rathore','swd11-cabsec@supportgov.in','09968278918',3,3,NULL,'TEST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjk1LCJleHBpcmVzIjoxNzg4MTgzMTczfQ.bff7d9abc15bf4a1e6880b8ea6920a59f0d6c814b1371c87b8c7c07fc49e52a6','2026-08-28 13:32:53',1,'1787924009_c81098ceded81f4cf3d0.pdf'),(96,'REG/20260829/1','Rohit','rkcsi3d1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjk2LCJleHBpcmVzIjoxNzg4MjM5NDUxfQ.e190a90306fa92f3cc56731577013d3527f286e5524cb26b0f83ecf05f8f2a26','2026-08-29 05:10:51',1,'1787980273_ba2f1e75161f33b565d8.png'),(97,'REG/20260831/1','Rohit','rkcrrsid1234@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjk3LCJleHBpcmVzIjoxNzg4NDExNDkzfQ.6ea81fb5dea86c147abf8e036d590bf2d913cdc865485666059876791193ccc5','2026-08-31 04:58:13',1,'1788152312_3d88f15f5309275d962f.pdf'),(98,'REG/20260831/2','Rohit','rkcsittd1234@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjk4LCJleHBpcmVzIjoxNzg4NDM2MDA3fQ.2e17e19c790c52a28fc92fa12be0ecd767645ef42a1816ae090977dc459cf8e1','2026-08-31 11:46:47',1,'1788176823_04f0032757fcac93430d.pdf');
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration_history`
--

DROP TABLE IF EXISTS `registration_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registration_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `reg_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `performed_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_id_idx` (`reg_id`),
  KEY `status_idx` (`status`),
  CONSTRAINT `reg_id` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`id`),
  CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `mas_registration_action` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration_history`
--

LOCK TABLES `registration_history` WRITE;
/*!40000 ALTER TABLE `registration_history` DISABLE KEYS */;
INSERT INTO `registration_history` VALUES (76,61,1,NULL,'2026-08-21 15:46:16',NULL),(77,61,3,NULL,'2026-08-21 15:46:37','Authorization Letter submitted.'),(78,61,4,NULL,'2026-08-21 15:47:20','Aproved'),(79,62,1,NULL,'2026-08-21 16:55:00',NULL),(80,62,3,NULL,'2026-08-21 16:55:19','Authorization Letter submitted.'),(81,63,1,NULL,'2026-08-21 17:30:57',NULL),(82,63,3,NULL,'2026-08-21 17:31:22','Authorization Letter submitted.'),(83,64,1,NULL,'2026-08-22 10:03:17',NULL),(84,64,3,NULL,'2026-08-22 10:03:41','Authorization Letter submitted.'),(85,65,1,NULL,'2026-08-22 11:11:48',NULL),(86,65,3,NULL,'2026-08-22 11:12:09','Authorization Letter submitted.'),(87,66,1,NULL,'2026-08-22 12:42:05',NULL),(88,66,3,NULL,'2026-08-22 12:42:35','Authorization Letter submitted.'),(89,67,1,NULL,'2026-08-22 12:49:07',NULL),(90,67,3,NULL,'2026-08-22 12:50:10','Authorization Letter submitted.'),(91,68,1,NULL,'2026-08-22 15:16:04',NULL),(92,68,3,NULL,'2026-08-22 15:17:06','Authorization Letter submitted.'),(93,69,1,NULL,'2026-08-22 15:25:54',NULL),(94,69,3,NULL,'2026-08-22 15:37:10','Authorization Letter submitted.'),(95,70,1,NULL,'2026-08-22 15:42:39',NULL),(96,70,3,NULL,'2026-08-22 15:43:26','Authorization Letter submitted.'),(97,71,1,NULL,'2026-08-24 11:06:58',NULL),(98,71,3,NULL,'2026-08-24 11:07:25','Authorization Letter submitted.'),(99,72,1,NULL,'2026-08-24 11:14:41',NULL),(100,72,3,NULL,'2026-08-24 11:17:36','Authorization Letter submitted.'),(101,73,1,NULL,'2026-08-24 11:53:14',NULL),(102,74,1,NULL,'2026-08-24 12:12:55',NULL),(103,74,3,NULL,'2026-08-24 12:13:47','Authorization Letter submitted.'),(104,74,4,6,'2026-08-24 12:14:07','Ok'),(105,75,1,NULL,'2026-08-27 11:36:31',NULL),(106,75,3,NULL,'2026-08-27 11:36:56','Authorization Letter submitted.'),(107,76,1,NULL,'2026-08-27 17:58:20',NULL),(108,76,3,NULL,'2026-08-27 17:58:40','Authorization Letter submitted.'),(109,76,4,6,'2026-08-27 18:03:30','test'),(110,77,1,NULL,'2026-08-28 12:53:54',NULL),(111,78,1,NULL,'2026-08-28 12:58:56',NULL),(112,79,1,NULL,'2026-08-28 14:30:58',NULL),(113,79,3,NULL,'2026-08-28 14:32:24','Authorization Letter submitted.'),(114,80,1,NULL,'2026-08-28 14:41:58',NULL),(115,80,3,NULL,'2026-08-28 14:42:16','Authorization Letter submitted.'),(116,81,1,NULL,'2026-08-28 14:42:48',NULL),(117,81,3,NULL,'2026-08-28 14:43:06','Authorization Letter submitted.'),(118,82,1,NULL,'2026-08-28 14:49:59',NULL),(119,82,3,NULL,'2026-08-28 14:51:35','Authorization Letter submitted.'),(120,83,1,NULL,'2026-08-28 14:52:10',NULL),(121,83,3,NULL,'2026-08-28 14:52:48','Authorization Letter submitted.'),(122,84,1,NULL,'2026-08-28 14:57:07',NULL),(123,84,3,NULL,'2026-08-28 14:57:35','Authorization Letter submitted.'),(124,85,1,NULL,'2026-08-28 14:58:07',NULL),(125,85,3,NULL,'2026-08-28 14:58:23','Authorization Letter submitted.'),(126,86,1,NULL,'2026-08-28 15:06:51',NULL),(127,86,3,NULL,'2026-08-28 15:07:20','Authorization Letter submitted.'),(128,87,1,NULL,'2026-08-28 15:08:06',NULL),(129,87,3,NULL,'2026-08-28 15:08:20','Authorization Letter submitted.'),(130,88,1,NULL,'2026-08-28 15:12:57',NULL),(131,88,3,NULL,'2026-08-28 15:13:14','Authorization Letter submitted.'),(132,89,1,NULL,'2026-08-28 15:20:41',NULL),(133,89,3,NULL,'2026-08-28 15:20:55','Authorization Letter submitted.'),(134,90,1,NULL,'2026-08-28 15:21:35',NULL),(135,90,3,NULL,'2026-08-28 15:21:52','Authorization Letter submitted.'),(136,91,1,NULL,'2026-08-28 15:22:37',NULL),(137,91,3,NULL,'2026-08-28 15:23:08','Authorization Letter submitted.'),(138,92,1,NULL,'2026-08-28 15:23:48',NULL),(139,92,3,NULL,'2026-08-28 15:24:04','Authorization Letter submitted.'),(140,93,1,NULL,'2026-08-28 16:08:00',NULL),(141,93,3,NULL,'2026-08-28 16:08:18','Authorization Letter submitted.'),(142,94,1,NULL,'2026-08-28 17:16:59',NULL),(143,94,3,NULL,'2026-08-28 17:17:16','Authorization Letter submitted.'),(144,94,4,6,'2026-08-28 17:18:10','ok'),(145,95,1,NULL,'2026-08-28 19:02:53',NULL),(146,95,3,NULL,'2026-08-28 19:03:29','Authorization Letter submitted.'),(147,96,1,NULL,'2026-08-29 10:40:51',NULL),(148,96,3,NULL,'2026-08-29 10:41:13','Authorization Letter submitted.'),(149,96,4,6,'2026-08-29 11:41:39',''),(150,79,4,6,'2026-08-29 11:41:58','dg'),(151,97,1,NULL,'2026-08-31 10:28:13',NULL),(152,97,3,NULL,'2026-08-31 10:28:32','Authorization Letter submitted.'),(153,98,1,NULL,'2026-08-31 17:16:47',NULL),(154,98,3,NULL,'2026-08-31 17:17:03','Authorization Letter submitted.'),(155,98,4,6,'2026-08-31 18:25:46','ok'),(156,97,4,6,'2026-09-01 10:51:57','ok'),(157,85,4,6,'2026-09-01 10:52:14','ok'),(158,84,4,6,'2026-09-01 10:52:36','ok');
/*!40000 ALTER TABLE `registration_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `organisation_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `letter_number` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exam_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `exam_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `vendor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_person` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_by` int unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requests`
--

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` VALUES (1,'Test','central-government-department','test','Harsh','2026-08-05','C-534, Badarpur Border','netra-defence-electronics','Harsh Singh','distinctharsh@gmail.com','7840091293','pending',10,'2026-08-05 09:03:50',NULL),(2,'NIC','central-government-department','76575765765','Harsh','2026-08-06','C-534, Badarpur Border','shakti-communication-works','Harsh Singh','distinctharsh@gmail.com','7840091293','pending',10,'2026-08-05 11:55:19',NULL),(3,'NIC','state-government-department','test','Harsh','2026-08-06','C-534, Badarpur Border','shakti-communication-works','Harsh','distinctharsh@gmail.com','7840091293','pending',10,'2026-08-05 11:58:21',NULL),(4,'NIC','central-government-department','76575765765','Harsh','2026-08-05','C-534, Badarpur Border','bharat-secure-systems-pvt-ltd','Harsh Singh','distinctharsh@gmail.com','7840091293','pending',10,'2026-08-05 12:10:11',NULL),(5,'Test','central-government-department','test','Harsh','2026-08-05','C-534, Badarpur Border','shakti-communication-works','Harsh','distinctharsh@gmail.com','7840091293','pending',10,'2026-08-05 12:11:03',NULL),(6,'New test','autonomous-examination-body','76575765765','Harsh','2026-08-06','C-534, Badarpur Border','shakti-communication-works','Harsh Singh','distinctharsh@gmail.com','7840091293','pending',10,'2026-08-05 12:28:21',NULL),(7,'Test','autonomous-examination-body','76575765765','Harsh','2026-08-05','President\'s Estate','shakti-communication-works','Harsh Singh','distinctharsh@gmail.com','7840091293','pending',10,'2026-08-05 12:36:55',NULL),(8,'Test','autonomous-examination-body','76575765765','Harsh Singh','2026-08-05','President\'s Estate','netra-defence-electronics','Harsh Singh','distinctharsh@gmail.com','7840091293','pending',10,'2026-08-05 12:53:21',NULL),(9,'IIT DElhi','state-government-department','213124SADER','Rohit','2026-08-12','Address of examination','bharat-secure-systems-pvt-ltd','Rohit','rkcsid1234@gmail.com','98013121222','pending',9,'2026-08-12 07:27:51',NULL);
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `state` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `state_name` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_state_name` (`state_name`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Andhra Pradesh',1),(2,'Arunachal Pradesh',1),(3,'Assam',1),(4,'Bihar',1),(5,'Chhattisgarh',1),(6,'Goa',1),(7,'Gujarat',1),(8,'Haryana',1),(9,'Himachal Pradesh',1),(10,'Jharkhand',1),(11,'Karnataka',1),(12,'Kerala',1),(13,'Madhya Pradesh',1),(14,'Maharashtra',1),(15,'Manipur',1),(16,'Meghalaya',1),(17,'Mizoram',1),(18,'Nagaland',1),(19,'Odisha',1),(20,'Punjab',1),(21,'Rajasthan',1),(22,'Sikkim',1),(23,'Tamil Nadu',1),(24,'Telangana',1),(25,'Tripura',1),(26,'Uttar Pradesh',1),(27,'Uttarakhand',1),(28,'West Bengal',1),(29,'Andaman and Nicobar Islands',1),(30,'Chandigarh',1),(31,'Dadra and Nagar Haveli and Daman and Diu',1),(32,'Delhi',1),(33,'Jammu and Kashmir',1),(34,'Ladakh',1),(35,'Lakshadweep',1),(36,'Puducherry',1);
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `organization_id` int DEFAULT NULL,
  `org_type` int DEFAULT NULL,
  `designation` varchar(250) DEFAULT NULL,
  `authorization_letter` varchar(500) DEFAULT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `mfa_required` tinyint(1) NOT NULL DEFAULT '1',
  `salt` varchar(500) DEFAULT NULL,
  `hash` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `ugc_id` varchar(45) DEFAULT NULL,
  `password_reset_req` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `org_idx` (`organization_id`),
  KEY `org_type_idx` (`org_type`),
  CONSTRAINT `org_type_user` FOREIGN KEY (`org_type`) REFERENCES `mas_organization_type` (`id`),
  CONSTRAINT `org_user` FOREIGN KEY (`organization_id`) REFERENCES `mas_organization` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (6,'Gitesh Srivastava','gitesh@gmail.com','7840091293',2,2,'Software Develeoper','1787307397_f2eac820031ab0171d96.pdf',1,0,1,NULL,'$2y$10$DrVHUPXCp4RNZbbnHR6WueCetyHvZQJtDyCWv32pppdqZZaxIMcSq','2026-08-21 15:50:09','PMO',0),(7,'Rohit KN','rkcsid1234@gmail.com','91784009129',2,2,NULL,'1787553827_1a68d90c3bf0b71f2a60.pdf',1,0,1,NULL,NULL,'2026-08-24 12:14:07','PMO',0),(10,'Rohit','rkcsid123334@gmail.com','1234567890',2,3,NULL,'1787833720_e44b2bad692b14677fb1.pdf',1,0,1,NULL,'$2y$10$9ahfSgk2yV0sRB8jvFmuCuX0s2erCFMrBBvICFo0YXWxz/aJC7UJe','2026-08-27 18:03:30','PMO',0),(11,'Rohit','rkcsid111234@gmail.com','7840091293',3,3,'Joint Secretary',NULL,1,0,1,NULL,'$2y$10$F.7h.9YG5HBbbEKJ7rifuedokHH.bQ8QnI4DHDylZcku0PyrDWgC.','2026-08-28 15:57:09','PMO',0),(12,'Rohit','rkcsi333d1234@gmail.com','1234567890',2,3,NULL,'1787917636_07d07b99125710a945a7.pdf',1,0,1,NULL,'$2y$10$0P8e8B0kwdpWXapeD63ELutqEb6vz0Lb6u.OyQ8QjfbIpv1etATRq','2026-08-28 17:18:10','PMO',1),(13,'Rohit','rkcsi3d1234@gmail.com','1234567890',2,3,NULL,'1787980273_ba2f1e75161f33b565d8.png',1,0,1,NULL,'$2y$10$QxpqB8DVQFUscONGgk5I/eJJ5MBOgmMI3ekeOhvn5DPlSKmBgBAdG','2026-08-29 11:41:39','PMO',1),(14,'Rohit','rkcsid123411@gmail.com','7840091293',3,3,NULL,'1787907744_53d18c9d86d039e08f4e.pdf',1,0,1,NULL,'$2y$10$ohyE1QyPKUbcI3WGucdOjebGrCqdXGGpaDSsajgVs0cZsZ8wn6PlG','2026-08-29 11:41:58','PMO',1),(15,'Rohit','rkcsittd1234@gmail.com','91784009129',2,2,NULL,'1788176823_04f0032757fcac93430d.pdf',1,0,1,NULL,'$2y$10$ynfmBRmIkwHqjj.0UdaG9uqKqxh4J7xe5aGYqV0p5YyeYGzPuWINy','2026-08-31 18:25:46','PMO',0),(16,'Rohit','rkcrrsid1234@gmail.com','1234567890',2,2,NULL,'1788152312_3d88f15f5309275d962f.pdf',1,0,1,NULL,'$2y$10$f7mEaiqu4VsB/NE/YlzBn.LQfLr2EroED82A0BFYCvtmSb1nj0zZG','2026-09-01 10:51:57','PMO',1),(17,'Rohit','rkcsid177234@gmail.com','91784009129',2,2,NULL,'1787909303_3412befaf8f8bf0985b7.pdf',1,0,1,NULL,'$2y$10$J0QW8hK9RYohBVmxmozPNu0EOKKrA/Q5D3i3IdZ.jZAKxXn2pE6.W','2026-09-01 10:52:14','PMO',1),(18,'Rohit','rkcsid124434@gmail.com','91784009129',2,4,NULL,'1787909255_3e1a55fa4c9a0bd68f62.png',1,0,1,NULL,'$2y$10$/1JTJ8vPibgj/T2yTsMz3.hqQPTO6lEuo5QsKrkI8ueDrNGzCYCae','2026-09-01 10:52:36',NULL,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role_mapping`
--

DROP TABLE IF EXISTS `user_role_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_role_mapping` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_uid_rid_idx` (`user_id`),
  KEY `fk_rid_idx` (`role_id`),
  CONSTRAINT `fk_rid` FOREIGN KEY (`role_id`) REFERENCES `mas_role` (`id`),
  CONSTRAINT `fk_uid` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_mapping`
--

LOCK TABLES `user_role_mapping` WRITE;
/*!40000 ALTER TABLE `user_role_mapping` DISABLE KEYS */;
INSERT INTO `user_role_mapping` VALUES (18,13,3,1),(19,14,3,1),(20,15,1,1),(21,6,1,1),(22,6,2,1),(23,6,3,1),(24,6,4,1),(25,6,5,1),(26,6,6,1),(27,6,7,1),(28,6,8,1),(29,6,9,1),(30,16,1,1),(31,17,1,1),(32,18,1,1);
/*!40000 ALTER TABLE `user_role_mapping` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-08 17:00:12
