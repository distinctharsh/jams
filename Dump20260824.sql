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
  `undertaking` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_no_UNIQUE` (`app_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
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
  `district` int NOT NULL,
  `state` int NOT NULL,
  `centre_name` varchar(1000) NOT NULL,
  `centre_address` varchar(5000) DEFAULT NULL,
  `coorrdinator_name` varchar(500) DEFAULT NULL,
  `coordinator_mobile_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_centre_mapping`
--

LOCK TABLES `application_centre_mapping` WRITE;
/*!40000 ALTER TABLE `application_centre_mapping` DISABLE KEYS */;
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
  `exam_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_date_mapping`
--

LOCK TABLES `application_date_mapping` WRITE;
/*!40000 ALTER TABLE `application_date_mapping` DISABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_document_master`
--

LOCK TABLES `application_document_master` WRITE;
/*!40000 ALTER TABLE `application_document_master` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_history`
--

LOCK TABLES `application_history` WRITE;
/*!40000 ALTER TABLE `application_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `application_history` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_model`
--

LOCK TABLES `mas_model` WRITE;
/*!40000 ALTER TABLE `mas_model` DISABLE KEYS */;
INSERT INTO `mas_model` VALUES (1,'abc',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_vendor`
--

LOCK TABLES `mas_vendor` WRITE;
/*!40000 ALTER TABLE `mas_vendor` DISABLE KEYS */;
INSERT INTO `mas_vendor` VALUES (1,'BEL','1'),(2,'ECIL','1');
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
INSERT INTO `reg_daily_counter` VALUES ('2026-08-21',3),('2026-08-22',7),('2026-08-24',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (61,'REG/20260821/1','Gitesh Srivastava','gitesh@gmail.com','7840091293',2,2,NULL,'PMO TST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYxLCJleHBpcmVzIjoxNzg3NTY2NTc2fQ.dd1cdfe6356323707dcc02bc904736a006bc49a5fdacc789f1956dfbc3827b04','2026-08-21 10:16:16',1,'1787307397_f2eac820031ab0171d96.pdf'),(62,'REG/20260821/2','Rohit','rkcsid1234@gmail.com','12345678907',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYyLCJleHBpcmVzIjoxNzg3NTcwNzAwfQ.94870195f5820f39cbca22cffce0dee2e6819dd6e968b72b57bf188f76cb30f8','2026-08-21 11:25:00',1,'1787311519_a2470c44ae22a80ad6e5.pdf'),(63,'REG/20260821/3','Rohit Kumar','rkcsid1234@gmail.com','7840091293',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYzLCJleHBpcmVzIjoxNzg3NTcyODU3fQ.ab035ce1ce1fe2f947387a7f243ed642e17ad749481f1700dd2cefd5bc02e5e4','2026-08-21 12:00:57',1,'1787313682_a072e1ea64f45d6f1a24.pdf'),(64,'REG/20260822/1','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY0LCJleHBpcmVzIjoxNzg3NjMyMzk3fQ.199783d0af924169c54a4a89a3af4e21828b73d5f0f14d568a855c3a60a02a1c','2026-08-22 04:33:17',1,'1787373221_dbae2a49934d86d9fa05.pdf'),(65,'REG/20260822/2','Rohit','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY1LCJleHBpcmVzIjoxNzg3NjM2NTA4fQ.ccead99d26a8a7f655827c470ebf7e803688df169b19c2a71dd375c2544b6caa','2026-08-22 05:41:48',1,'1787377329_fe2225538b02d96a1d2d.pdf'),(66,'REG/20260822/3','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY2LCJleHBpcmVzIjoxNzg3NjQxOTI1fQ.96dea759a8205ab2401a4555e365b07840335dc2442f3d202b61b612bd95a5f0','2026-08-22 07:12:05',1,'1787382755_3cc933131984b7b8b252.pdf'),(67,'REG/20260822/4','Rohit','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY3LCJleHBpcmVzIjoxNzg3NjQyMzQ3fQ.8c34e711b068c198d46c80d0d43a6b1cedc9f6b0f6ae7d15cf364f4ea71a56db','2026-08-22 07:19:07',1,'1787383210_ed703b85c74811930cf7.pdf'),(68,'REG/20260822/5','Rohit','rkcsid1234@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY4LCJleHBpcmVzIjoxNzg3NjUxMTY0fQ.f1022bdf4271f69a62096395c17d82b56336e094df01855cfb38d07f20a5b237','2026-08-22 09:46:04',1,'1787392026_4f95b4164cbd3c6d6c02.pdf'),(69,'REG/20260822/6','Rohit','rkcsid1234@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY5LCJleHBpcmVzIjoxNzg3NjUxNzU0fQ.faad41212799aec6e84f267a0d84a6b483a81e75d9abd528acb618ced662d4c0','2026-08-22 09:55:54',1,'1787393230_8459a22e20b37dc9c05d.pdf'),(70,'REG/20260822/7','Rohit','rkcsid1234@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcwLCJleHBpcmVzIjoxNzg3NjUyNzU5fQ.18ca631ffd42fe3c2fe7f1e7eb1d6b4df41b56a1ece29409d1e15b977e03a1d7','2026-08-22 10:12:39',1,'1787393606_000bfeec258f4a880018.pdf'),(71,'REG/20260824/1','Rohit k','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO Test','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcxLCJleHBpcmVzIjoxNzg3ODA5MDE4fQ.c23e3292edde2a879ea240c8f8bbada32c6c85e09a019ff8d2c6123389e11ea1','2026-08-24 05:36:58',1,'1787549845_15a3160b08551a090967.pdf'),(72,'REG/20260824/2','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'TEST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcyLCJleHBpcmVzIjoxNzg3ODA5NDgxfQ.99a30995ee48c8ff8e5682c249627c655683f7ca5c57df48bfa2f349ae0b5bed','2026-08-24 05:44:41',1,'1787550456_318713354828c06c9e98.pdf');
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
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration_history`
--

LOCK TABLES `registration_history` WRITE;
/*!40000 ALTER TABLE `registration_history` DISABLE KEYS */;
INSERT INTO `registration_history` VALUES (76,61,1,NULL,'2026-08-21 15:46:16',NULL),(77,61,3,NULL,'2026-08-21 15:46:37','Authorization Letter submitted.'),(78,61,4,NULL,'2026-08-21 15:47:20','Aproved'),(79,62,1,NULL,'2026-08-21 16:55:00',NULL),(80,62,3,NULL,'2026-08-21 16:55:19','Authorization Letter submitted.'),(81,63,1,NULL,'2026-08-21 17:30:57',NULL),(82,63,3,NULL,'2026-08-21 17:31:22','Authorization Letter submitted.'),(83,64,1,NULL,'2026-08-22 10:03:17',NULL),(84,64,3,NULL,'2026-08-22 10:03:41','Authorization Letter submitted.'),(85,65,1,NULL,'2026-08-22 11:11:48',NULL),(86,65,3,NULL,'2026-08-22 11:12:09','Authorization Letter submitted.'),(87,66,1,NULL,'2026-08-22 12:42:05',NULL),(88,66,3,NULL,'2026-08-22 12:42:35','Authorization Letter submitted.'),(89,67,1,NULL,'2026-08-22 12:49:07',NULL),(90,67,3,NULL,'2026-08-22 12:50:10','Authorization Letter submitted.'),(91,68,1,NULL,'2026-08-22 15:16:04',NULL),(92,68,3,NULL,'2026-08-22 15:17:06','Authorization Letter submitted.'),(93,69,1,NULL,'2026-08-22 15:25:54',NULL),(94,69,3,NULL,'2026-08-22 15:37:10','Authorization Letter submitted.'),(95,70,1,NULL,'2026-08-22 15:42:39',NULL),(96,70,3,NULL,'2026-08-22 15:43:26','Authorization Letter submitted.'),(97,71,1,NULL,'2026-08-24 11:06:58',NULL),(98,71,3,NULL,'2026-08-24 11:07:25','Authorization Letter submitted.'),(99,72,1,NULL,'2026-08-24 11:14:41',NULL),(100,72,3,NULL,'2026-08-24 11:17:36','Authorization Letter submitted.');
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
  `salt` varchar(500) DEFAULT NULL,
  `hash` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `ugc_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `org_idx` (`organization_id`),
  KEY `org_type_idx` (`org_type`),
  CONSTRAINT `org_type_user` FOREIGN KEY (`org_type`) REFERENCES `mas_organization_type` (`id`),
  CONSTRAINT `org_user` FOREIGN KEY (`organization_id`) REFERENCES `mas_organization` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (6,'Gitesh Srivastava','gitesh@gmail.com','7840091293',2,2,'NA','1787307397_f2eac820031ab0171d96.pdf',1,NULL,'$2y$10$MASvxOkTIF3ic2hKOqrfMe/c8U9HwzZHhOBvV6KbcYuLo1tZ8TUqe','2026-08-21 15:50:09',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_mapping`
--

LOCK TABLES `user_role_mapping` WRITE;
/*!40000 ALTER TABLE `user_role_mapping` DISABLE KEYS */;
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

-- Dump completed on 2026-08-24 11:25:54
