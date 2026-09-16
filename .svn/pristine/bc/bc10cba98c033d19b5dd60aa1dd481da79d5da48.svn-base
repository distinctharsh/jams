CREATE DATABASE  IF NOT EXISTS `jams_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `jams_db`;
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
  `contact_person` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `organisation` varchar(255) DEFAULT NULL,
  `organisation_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_no_UNIQUE` (`app_no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES (2,'SEBI/202609/0002',9,1,1,1,'2026-09-08 12:19:12',1,1,1,1,0,'','fjfj','fj@nic.in','3216549870','SEBI','Banking Recruitment Body'),(4,'SEBI/202609/0003',9,1,1,1,'2026-09-08 12:25:46',1,1,1,1,1,'','fykyk','fykyk@nic.in','3216549870','SEBI','Banking Recruitment Body');
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
  `centre_coordinates` varchar(255) DEFAULT NULL,
  `coorrdinator_name` varchar(500) DEFAULT NULL,
  `coordinator_mobile_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_centre_mapping`
--

LOCK TABLES `application_centre_mapping` WRITE;
/*!40000 ALTER TABLE `application_centre_mapping` DISABLE KEYS */;
INSERT INTO `application_centre_mapping` VALUES (1,4,114,4,'dagd','dgjhdg dhdfh','21,21','','');
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
  `exam_name` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_date_mapping`
--

LOCK TABLES `application_date_mapping` WRITE;
/*!40000 ALTER TABLE `application_date_mapping` DISABLE KEYS */;
INSERT INTO `application_date_mapping` VALUES (2,2,'2026-09-16 00:00:00','yky'),(4,4,'2026-09-09 00:00:00','gsdg');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_document_master`
--

LOCK TABLES `application_document_master` WRITE;
/*!40000 ALTER TABLE `application_document_master` DISABLE KEYS */;
INSERT INTO `application_document_master` VALUES (1,4,2,'Jammer reg..pdf','uploads/vendor_documents/1788870346_bea1d57013d0d4bb6fa7.pdf');
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
  `assigned_to` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_history`
--

LOCK TABLES `application_history` WRITE;
/*!40000 ALTER TABLE `application_history` DISABLE KEYS */;
INSERT INTO `application_history` VALUES (1,2,1,9,'Application submitted successfully.','2026-09-08 12:19:12',NULL),(2,2,2,9,'PDF_GENERATED','2026-09-08 12:19:12',NULL),(3,4,1,9,'Application submitted successfully.','2026-09-08 12:25:46',NULL),(4,4,12,9,'PDF_GENERATED','2026-09-08 12:25:46',NULL);
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
  `jammer_id` int NOT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `technical_specifications` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_model_idx` (`jammer_id`),
  KEY `fk_vendor_idx` (`vendor_id`),
  KEY `fk_application_idx` (`app_id`),
  CONSTRAINT `fk_application` FOREIGN KEY (`app_id`) REFERENCES `application` (`id`),
  CONSTRAINT `fk_model` FOREIGN KEY (`jammer_id`) REFERENCES `mas_model` (`id`),
  CONSTRAINT `fk_vendor` FOREIGN KEY (`vendor_id`) REFERENCES `mas_vendor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_vendor_mapping`
--

LOCK TABLES `application_vendor_mapping` WRITE;
/*!40000 ALTER TABLE `application_vendor_mapping` DISABLE KEYS */;
INSERT INTO `application_vendor_mapping` VALUES (1,2,1,1,NULL,'','2026-09-08 12:19:12','2026-09-08 12:19:12'),(2,4,1,1,NULL,'1788870346_bea1d57013d0d4bb6fa7.pdf','2026-09-08 12:25:46','2026-09-08 12:25:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_action`
--

LOCK TABLES `audit_action` WRITE;
/*!40000 ALTER TABLE `audit_action` DISABLE KEYS */;
INSERT INTO `audit_action` VALUES (1,NULL,'gitesh1@gmail.com','REGISTRATION','PENDING','REG/20260831/1','Registration successful. Please upload your Authorization Letter.','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 13:15:13'),(2,NULL,'9','LOCK_ACCOUNT','ACCOUNT LOCKED BY ADMINISTRATOR','gitesh@gmail.com',NULL,'10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 12:15:14'),(3,NULL,'9','UNLOCK_ACCOUNT','ACCOUNT UNLOCKED BY ADMINISTRATOR','gitesh@gmail.com',NULL,'10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 12:15:22'),(4,NULL,'9','LOCK_ACCOUNT','ACCOUNT LOCKED BY ADMINISTRATOR','admin@cabsec.gov.in',NULL,'10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 12:15:26'),(5,NULL,'contact.yka@gmail.com','REGISTRATION','PENDING','REG/20260909/1','Registration successful. Please upload your Authorization Letter.','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-09 09:44:15');
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
  `user_id` bigint DEFAULT NULL,
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
  KEY `idx_ip_address` (`ip_address`),
  KEY `idx_audit_login_failed` (`login_name`,`ip_address`,`action`,`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_trail`
--

LOCK TABLES `audit_trail` WRITE;
/*!40000 ALTER TABLE `audit_trail` DISABLE KEYS */;
INSERT INTO `audit_trail` VALUES (1,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-08-31 07:47:25',NULL,'2026-08-31 07:47:25'),(2,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-08-31 10:39:45',NULL,'2026-08-31 10:39:45'),(3,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 13:09:01',NULL,'2026-08-31 13:09:01'),(4,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 13:14:19','2026-08-31 13:14:19'),(5,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','2026-08-31 13:19:12',NULL,'2026-08-31 13:19:12'),(6,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36',NULL,'2026-08-31 13:47:54','2026-08-31 13:47:54'),(7,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-08-31 13:48:43','2026-08-31 13:48:43'),(8,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-08-31 13:49:07',NULL,'2026-08-31 13:49:07'),(9,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-01 06:07:27',NULL,'2026-09-01 06:07:27'),(10,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-01 06:11:29','2026-09-01 06:11:29'),(11,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-01 06:40:13',NULL,'2026-09-01 06:40:13'),(12,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-01 09:18:42','2026-09-01 09:18:42'),(13,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-01 13:08:32',NULL,'2026-09-01 13:08:32'),(14,6,'gitesh@gmail.com','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-02 06:28:19',NULL,'2026-09-02 06:28:19'),(15,6,'gitesh@gmail.com','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-02 06:31:54','2026-09-02 06:31:54'),(16,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-02 06:32:58',NULL,'2026-09-02 06:32:58'),(17,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-02 11:49:08',NULL,'2026-09-02 11:49:08'),(18,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-02 12:41:56',NULL,'2026-09-02 12:41:56'),(19,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 06:30:40',NULL,'2026-09-03 06:30:40'),(20,9,'admin@cabsec.gov.in','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-03 07:08:26','2026-09-03 07:08:26'),(21,0,'admin@cabsec.gov.in','LOGIN_FAILED','Invalid email or password.','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,NULL,'2026-09-03 07:16:07'),(22,0,'admin@cabsec.gov.in','ACCOUNT_UNLOCKED','ACCOUNT_UNLOCKED',NULL,NULL,NULL,NULL,'2026-09-03 14:26:50'),(23,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 09:10:50',NULL,'2026-09-03 09:10:50'),(24,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 12:15:06',NULL,'2026-09-03 12:15:06'),(25,6,'gitesh@gmail.com','ACCOUNT_UNLOCKED','ACCOUNT_UNLOCKED_BY_ADMIN','10.19.91.200',NULL,NULL,NULL,'2026-09-03 17:45:22'),(26,9,'admin@cabsec.gov.in','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-03 12:15:30','2026-09-03 12:15:30'),(27,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 12:16:52',NULL,'2026-09-03 12:16:52'),(28,9,'admin@cabsec.gov.in','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-03 13:01:26','2026-09-03 13:01:26'),(29,10,'test_user@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 13:01:55',NULL,'2026-09-03 13:01:55'),(30,10,'test_user@gov.in','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-03 13:02:50','2026-09-03 13:02:50'),(31,10,'test_user@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 13:03:24',NULL,'2026-09-03 13:03:24'),(32,10,'test_user@gov.in','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-03 13:03:34','2026-09-03 13:03:34'),(33,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-03 13:03:53',NULL,'2026-09-03 13:03:53'),(34,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-07 06:15:29',NULL,'2026-09-07 06:15:29'),(35,11,'admin@gov.in','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0',NULL,'2026-09-07 06:15:35','2026-09-07 06:15:35'),(36,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.88.186','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-07 07:05:56',NULL,'2026-09-07 07:05:56'),(37,11,'admin@gov.in','LOGOUT','User logged out successfully','10.19.88.186','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-07 07:06:51','2026-09-07 07:06:51'),(38,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-07 08:58:25',NULL,'2026-09-07 08:58:25'),(39,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:154.0) Gecko/20100101 Firefox/154.0','2026-09-07 11:58:19',NULL,'2026-09-07 11:58:19'),(40,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-08 07:15:55',NULL,'2026-09-08 07:15:55'),(41,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:155.0) Gecko/20100101 Firefox/155.0','2026-09-08 10:04:55',NULL,'2026-09-08 10:04:55'),(42,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:155.0) Gecko/20100101 Firefox/155.0','2026-09-08 12:11:40',NULL,'2026-09-08 12:11:40'),(43,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-09 07:27:34',NULL,'2026-09-09 07:27:34'),(44,9,'admin@cabsec.gov.in','LOGOUT','User logged out successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-09 09:40:08','2026-09-09 09:40:08'),(45,9,'admin@cabsec.gov.in','LOGIN','User logged in successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-09 09:45:52',NULL,'2026-09-09 09:45:52'),(46,9,'admin@cabsec.gov.in','LOGOUT','User logged out successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-09 09:56:09','2026-09-09 09:56:09'),(47,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-09 09:56:33',NULL,'2026-09-09 09:56:33'),(48,11,'admin@gov.in','LOGOUT','User logged out successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-09 09:58:24','2026-09-09 09:58:24'),(49,10,'test_user@gov.in','LOGIN','User logged in successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36','2026-09-09 09:59:11',NULL,'2026-09-09 09:59:11'),(50,10,'test_user@gov.in','LOGOUT','User logged out successfully','10.19.91.194','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36',NULL,'2026-09-09 10:03:39','2026-09-09 10:03:39'),(51,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:155.0) Gecko/20100101 Firefox/155.0','2026-09-09 10:09:50',NULL,'2026-09-09 10:09:50'),(52,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Linux; Android 14; SM-S931B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Mobile Safari/537.36','2026-09-10 10:47:18',NULL,'2026-09-10 10:47:18'),(53,11,'admin@gov.in','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Linux; Android 14; SM-S931B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Mobile Safari/537.36',NULL,'2026-09-10 10:47:40','2026-09-10 10:47:40'),(54,10,'test_user@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Linux; Android 14; SM-S931B) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Mobile Safari/537.36','2026-09-10 10:48:08',NULL,'2026-09-10 10:48:08'),(55,10,'test_user@gov.in','LOGOUT','User logged out successfully','10.19.91.200','Mozilla/5.0 (Linux; Android 14; Pixel 9) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Mobile Safari/537.36',NULL,'2026-09-10 11:15:41','2026-09-10 11:15:41'),(56,11,'admin@gov.in','LOGIN','User logged in successfully','10.19.91.200','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:155.0) Gecko/20100101 Firefox/155.0','2026-09-10 12:05:57',NULL,'2026-09-10 12:05:57');
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
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_designation`
--

LOCK TABLES `mas_designation` WRITE;
/*!40000 ALTER TABLE `mas_designation` DISABLE KEYS */;
INSERT INTO `mas_designation` VALUES (1,'abc',1,'2026-08-27 17:46:33','2026-08-27 17:46:33');
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
-- Table structure for table `mas_settings`
--

DROP TABLE IF EXISTS `mas_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `desc` varchar(500) NOT NULL,
  `value` varchar(500) DEFAULT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_settings`
--

LOCK TABLES `mas_settings` WRITE;
/*!40000 ALTER TABLE `mas_settings` DISABLE KEYS */;
INSERT INTO `mas_settings` VALUES (1,'Default Password','jams@2026',1),(2,'Default application Landing User','1',1);
/*!40000 ALTER TABLE `mas_settings` ENABLE KEYS */;
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
INSERT INTO `organization_monthly_counter` VALUES (1,'202609',2),(4,'202609',1),(12,'202609',3);
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
INSERT INTO `reg_daily_counter` VALUES ('2026-08-21',3),('2026-08-22',7),('2026-08-24',2),('2026-08-31',1),('2026-09-09',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (61,'REG/20260821/1','Gitesh Srivastava','gitesh@gmail.com','7840091293',2,2,NULL,'PMO TST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYxLCJleHBpcmVzIjoxNzg3NTY2NTc2fQ.dd1cdfe6356323707dcc02bc904736a006bc49a5fdacc789f1956dfbc3827b04','2026-08-21 10:16:16',1,'1787307397_f2eac820031ab0171d96.pdf'),(62,'REG/20260821/2','Rohit','rkcsid1234@gmail.com','12345678907',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYyLCJleHBpcmVzIjoxNzg3NTcwNzAwfQ.94870195f5820f39cbca22cffce0dee2e6819dd6e968b72b57bf188f76cb30f8','2026-08-21 11:25:00',1,'1787311519_a2470c44ae22a80ad6e5.pdf'),(63,'REG/20260821/3','Rohit Kumar','rkcsid1234@gmail.com','7840091293',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjYzLCJleHBpcmVzIjoxNzg3NTcyODU3fQ.ab035ce1ce1fe2f947387a7f243ed642e17ad749481f1700dd2cefd5bc02e5e4','2026-08-21 12:00:57',1,'1787313682_a072e1ea64f45d6f1a24.pdf'),(64,'REG/20260822/1','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY0LCJleHBpcmVzIjoxNzg3NjMyMzk3fQ.199783d0af924169c54a4a89a3af4e21828b73d5f0f14d568a855c3a60a02a1c','2026-08-22 04:33:17',1,'1787373221_dbae2a49934d86d9fa05.pdf'),(65,'REG/20260822/2','Rohit','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY1LCJleHBpcmVzIjoxNzg3NjM2NTA4fQ.ccead99d26a8a7f655827c470ebf7e803688df169b19c2a71dd375c2544b6caa','2026-08-22 05:41:48',1,'1787377329_fe2225538b02d96a1d2d.pdf'),(66,'REG/20260822/3','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY2LCJleHBpcmVzIjoxNzg3NjQxOTI1fQ.96dea759a8205ab2401a4555e365b07840335dc2442f3d202b61b612bd95a5f0','2026-08-22 07:12:05',1,'1787382755_3cc933131984b7b8b252.pdf'),(67,'REG/20260822/4','Rohit','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY3LCJleHBpcmVzIjoxNzg3NjQyMzQ3fQ.8c34e711b068c198d46c80d0d43a6b1cedc9f6b0f6ae7d15cf364f4ea71a56db','2026-08-22 07:19:07',1,'1787383210_ed703b85c74811930cf7.pdf'),(68,'REG/20260822/5','Rohit','rkcsid1234@gmail.com','91784009129',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY4LCJleHBpcmVzIjoxNzg3NjUxMTY0fQ.f1022bdf4271f69a62096395c17d82b56336e094df01855cfb38d07f20a5b237','2026-08-22 09:46:04',1,'1787392026_4f95b4164cbd3c6d6c02.pdf'),(69,'REG/20260822/6','Rohit','rkcsid1234@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjY5LCJleHBpcmVzIjoxNzg3NjUxNzU0fQ.faad41212799aec6e84f267a0d84a6b483a81e75d9abd528acb618ced662d4c0','2026-08-22 09:55:54',1,'1787393230_8459a22e20b37dc9c05d.pdf'),(70,'REG/20260822/7','Rohit','rkcsid1234@gmail.com','1234567890',2,2,NULL,'PMO','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcwLCJleHBpcmVzIjoxNzg3NjUyNzU5fQ.18ca631ffd42fe3c2fe7f1e7eb1d6b4df41b56a1ece29409d1e15b977e03a1d7','2026-08-22 10:12:39',1,'1787393606_000bfeec258f4a880018.pdf'),(71,'REG/20260824/1','Rohit k','rkcsid1234@gmail.com','91784009129',2,3,NULL,'PMO Test','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcxLCJleHBpcmVzIjoxNzg3ODA5MDE4fQ.c23e3292edde2a879ea240c8f8bbada32c6c85e09a019ff8d2c6123389e11ea1','2026-08-24 05:36:58',1,'1787549845_15a3160b08551a090967.pdf'),(72,'REG/20260824/2','Rohit','rkcsid1234@gmail.com','1234567890',2,3,NULL,'TEST','http://jams-nic.test:8080/auth/authorization?token=eyJyZWdfaWQiOjcyLCJleHBpcmVzIjoxNzg3ODA5NDgxfQ.99a30995ee48c8ff8e5682c249627c655683f7ca5c57df48bfa2f349ae0b5bed','2026-08-24 05:44:41',1,'1787550456_318713354828c06c9e98.pdf'),(73,'REG/20260831/1','Tarun Kumar','gitesh1@gmail.com','1234567890',2,2,NULL,'yg1234','http://10.19.91.200/auth/authorization?token=eyJyZWdfaWQiOjczLCJleHBpcmVzIjoxNzg4NDQxMzEzfQ.4a5cf9660ead608108ee5f80d4ebc0d4daaa642e58af1c292e9404f07c201ac6','2026-08-31 13:15:13',1,NULL),(74,'REG/20260909/1','Tarun Kumar','contact.yka@gmail.com','1234567890',2,2,NULL,'yg1234','http://10.19.91.200/auth/authorization?token=eyJyZWdfaWQiOjc0LCJleHBpcmVzIjoxNzg5MjA2MjU1fQ.bcac579bb69687556ee01900957ee57b13f41457e8d3dbee6b488a2aa0b2da37','2026-09-09 09:44:15',1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration_history`
--

LOCK TABLES `registration_history` WRITE;
/*!40000 ALTER TABLE `registration_history` DISABLE KEYS */;
INSERT INTO `registration_history` VALUES (76,61,1,NULL,'2026-08-21 15:46:16',NULL),(77,61,3,NULL,'2026-08-21 15:46:37','Authorization Letter submitted.'),(78,61,4,NULL,'2026-08-21 15:47:20','Aproved'),(79,62,1,NULL,'2026-08-21 16:55:00',NULL),(80,62,3,NULL,'2026-08-21 16:55:19','Authorization Letter submitted.'),(81,63,1,NULL,'2026-08-21 17:30:57',NULL),(82,63,3,NULL,'2026-08-21 17:31:22','Authorization Letter submitted.'),(83,64,1,NULL,'2026-08-22 10:03:17',NULL),(84,64,3,NULL,'2026-08-22 10:03:41','Authorization Letter submitted.'),(85,65,1,NULL,'2026-08-22 11:11:48',NULL),(86,65,3,NULL,'2026-08-22 11:12:09','Authorization Letter submitted.'),(87,66,1,NULL,'2026-08-22 12:42:05',NULL),(88,66,3,NULL,'2026-08-22 12:42:35','Authorization Letter submitted.'),(89,67,1,NULL,'2026-08-22 12:49:07',NULL),(90,67,3,NULL,'2026-08-22 12:50:10','Authorization Letter submitted.'),(91,68,1,NULL,'2026-08-22 15:16:04',NULL),(92,68,3,NULL,'2026-08-22 15:17:06','Authorization Letter submitted.'),(93,69,1,NULL,'2026-08-22 15:25:54',NULL),(94,69,3,NULL,'2026-08-22 15:37:10','Authorization Letter submitted.'),(95,70,1,NULL,'2026-08-22 15:42:39',NULL),(96,70,3,NULL,'2026-08-22 15:43:26','Authorization Letter submitted.'),(97,71,1,NULL,'2026-08-24 11:06:58',NULL),(98,71,3,NULL,'2026-08-24 11:07:25','Authorization Letter submitted.'),(99,72,1,NULL,'2026-08-24 11:14:41',NULL),(100,72,3,NULL,'2026-08-24 11:17:36','Authorization Letter submitted.'),(101,72,5,6,'2026-08-27 17:26:09','rejected'),(102,71,4,6,'2026-08-27 19:21:00','okk'),(103,69,5,6,'2026-08-27 19:23:14','rejected'),(104,73,1,NULL,'2026-08-31 18:45:13',NULL),(105,74,1,NULL,'2026-09-09 15:14:15',NULL);
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
  `failed_login_attempts` int NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (6,'Gitesh Srivastava','gitesh@gmail.com','7840091293',2,1,NULL,'1787307397_f2eac820031ab0171d96.pdf',1,0,0,1,NULL,'$2y$10$Q3WCN9Xg5jGVvYQxj6fLquXQ8vWshB7PrHzUWfLapp72.ftXZorpG','2026-08-21 15:50:09','',0),(7,'Rohit k','rkcsid1234@gmail.com','91784009129',2,3,NULL,'1787549845_15a3160b08551a090967.pdf',0,0,0,1,NULL,'$2y$10$ZnCYrBaQf73HEFXRAd0U3O.sKoDMJtvo5iXQhtz9a/Xe2bz6fV8Re','2026-08-27 19:21:00','PMO Test',1),(9,'Admin','admin@cabsec.gov.in','9876543210',12,4,'US',NULL,1,0,0,1,NULL,'$2y$10$KHZZjsOtFQ.fa5adoXKNveVBEX3lvtC.1dFe.RtOwVOoTN4NrSTGK','2026-09-02 12:00:04','',0),(10,'Test','test_user@gov.in','9876543220',12,4,'ABC','1788440174_3be136d2e68dafbe88bf.pdf',1,0,0,1,NULL,'$2y$10$ZYV5fCPJ.VlGoYp1Dz6i5eh9sk2XXhheq.bWB6NXkadkjrBN2wh3i','2026-09-03 18:26:14','',0),(11,'admin','admin@gov.in','6598741230',12,4,'DS',NULL,1,0,0,1,NULL,'$2y$10$/VUBB29Pbsp8AezUt95MtOqYiesGW9Iu1bpcVoJRAsGp9CvEjk83m','2026-09-03 18:28:35','',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_mapping`
--

LOCK TABLES `user_role_mapping` WRITE;
/*!40000 ALTER TABLE `user_role_mapping` DISABLE KEYS */;
INSERT INTO `user_role_mapping` VALUES (1,6,1,1),(2,6,4,1),(3,6,7,1),(4,6,9,1),(5,6,3,1),(6,7,3,1),(7,9,1,1),(8,9,4,1),(9,9,7,1),(10,9,9,1),(11,10,1,1),(14,11,4,1),(15,11,7,1);
/*!40000 ALTER TABLE `user_role_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_application_latest_status`
--

DROP TABLE IF EXISTS `vw_application_latest_status`;
/*!50001 DROP VIEW IF EXISTS `vw_application_latest_status`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_application_latest_status` AS SELECT 
 1 AS `application_id`,
 1 AS `id`,
 1 AS `app_no`,
 1 AS `user_id`,
 1 AS `adequate_arrangement_check`,
 1 AS `jammer_accounted`,
 1 AS `non_intereference`,
 1 AS `created_at`,
 1 AS `current_status`,
 1 AS `isactive`,
 1 AS `is_single_exam`,
 1 AS `is_single_date`,
 1 AS `centre_list_ready`,
 1 AS `undertaking`,
 1 AS `contact_person`,
 1 AS `email`,
 1 AS `phone`,
 1 AS `organisation`,
 1 AS `organisation_type`,
 1 AS `history_id`,
 1 AS `status`,
 1 AS `history_created`,
 1 AS `performed_by`,
 1 AS `currently_with`,
 1 AS `exam_dates`,
 1 AS `examination_centres`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_application_latest_status1`
--

DROP TABLE IF EXISTS `vw_application_latest_status1`;
/*!50001 DROP VIEW IF EXISTS `vw_application_latest_status1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_application_latest_status1` AS SELECT 
 1 AS `application_id`,
 1 AS `id`,
 1 AS `app_no`,
 1 AS `user_id`,
 1 AS `adequate_arrangement_check`,
 1 AS `jammer_accounted`,
 1 AS `non_intereference`,
 1 AS `created_at`,
 1 AS `current_status`,
 1 AS `isactive`,
 1 AS `is_single_exam`,
 1 AS `is_single_date`,
 1 AS `centre_list_ready`,
 1 AS `undertaking`,
 1 AS `contact_person`,
 1 AS `email`,
 1 AS `phone`,
 1 AS `organisation`,
 1 AS `organisation_type`,
 1 AS `history_id`,
 1 AS `status`,
 1 AS `history_created`,
 1 AS `currently_with`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'jams_db'
--

--
-- Dumping routines for database 'jams_db'
--
/*!50003 DROP PROCEDURE IF EXISTS `approve_registration` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `approve_registration`(
    IN p_reg_id BIGINT,
    IN p_approved_by INT,
    IN p_action INT,
    IN p_remarks VARCHAR(1000),
    IN pwd VARCHAR(500)
)
BEGIN

    DECLARE v_reg_no VARCHAR(50) DEFAULT NULL;
    DECLARE v_name VARCHAR(1000) DEFAULT NULL;
    DECLARE v_email VARCHAR(50) DEFAULT NULL;
    DECLARE v_phone VARCHAR(15) DEFAULT NULL;
    DECLARE v_org INT DEFAULT 1;
    DECLARE v_org_type INT DEFAULT 1;
    DECLARE v_ugc_id VARCHAR(100) DEFAULT NULL;
    DECLARE v_authorization_letter VARCHAR(500) DEFAULT NULL;
    DECLARE v_designation INT DEFAULT NULL;
    DECLARE v_status INT DEFAULT NULL;
    DECLARE v_user_id BIGINT DEFAULT NULL;

    DECLARE v_error_code INT DEFAULT NULL;
    DECLARE v_error_message TEXT DEFAULT NULL;


    /* =========================================================
       ERROR HANDLER
       ========================================================= */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN

        GET DIAGNOSTICS CONDITION 1
            v_error_code = MYSQL_ERRNO,
            v_error_message = MESSAGE_TEXT;

        ROLLBACK;

        SELECT
            0 AS success,
            'Registration could not be approved' AS message,
            NULL AS id,
            v_reg_no AS reg_no,
            v_error_code AS error_code,
            v_error_message AS error_message;

    END;


    /* =========================================================
       START TRANSACTION
       ========================================================= */
    START TRANSACTION;


    /* =========================================================
       GET REGISTRATION DETAILS
       ========================================================= */
    SELECT
        reg_no,
        name,
        email,
        mobile_no,
        organization_id,
        org_type,
        ugc_id,
        authorization_letter,
        designation
    INTO
        v_reg_no,
        v_name,
        v_email,
        v_phone,
        v_org,
        v_org_type,
        v_ugc_id,
        v_authorization_letter,
        v_designation
    FROM registration
    WHERE id = p_reg_id
    FOR UPDATE;


    /* =========================================================
       CHECK REGISTRATION EXISTS
       ========================================================= */
    IF v_reg_no IS NULL THEN

        ROLLBACK;

        SELECT
            0 AS success,
            'Registration not found' AS message,
            NULL AS id,
            NULL AS reg_no,
            404 AS error_code,
            'No registration exists for the supplied ID' AS error_message;


    ELSE

        /* =====================================================
           GET LATEST REGISTRATION HISTORY STATUS
           ===================================================== */
        SET v_status = NULL;

        SELECT
            status
        INTO
            v_status
        FROM registration_history
        WHERE reg_id = p_reg_id
        ORDER BY id DESC
        LIMIT 1
        FOR UPDATE;


        /* =====================================================
           CHECK WHETHER REGISTRATION CAN BE PROCESSED

           Assuming:
             1 = Pending
             2 = Some intermediate status
             3 = Some intermediate status
             4 = Approved
             5 = Rejected
           ===================================================== */
        IF v_status IS NULL OR v_status NOT IN (1, 2, 3) THEN

            ROLLBACK;

            SELECT
                0 AS success,
                'Registration already processed' AS message,
                NULL AS id,
                NULL AS reg_no,
                409 AS error_code,
                'Already approved or rejected' AS error_message;


        ELSE

            /* =================================================
               ACTION 5 = REJECT

               For rejection:
               Do NOT create a user.
               Only insert registration history.
               ================================================= */
            IF p_action <> 5 THEN

                /* =============================================
                   CREATE USER
                   ============================================= */
                INSERT INTO `user`
                (
                    name,
                    email,
                    mobile_no,
                    organization_id,
                    org_type,
                    ugc_id,
                    authorization_letter,
                    designation,`hash`,password_reset_req
                )
                VALUES
                (
                    v_name,
                    v_email,
                    v_phone,
                    v_org,
                    v_org_type,
                    v_ugc_id,
                    v_authorization_letter,
                    v_designation,pwd,1
                );


                /* =============================================
                   GET NEW USER ID
                   ============================================= */
                SET v_user_id = LAST_INSERT_ID();


                /* =============================================
                   ASSIGN DEFAULT ROLE
                   ============================================= */
                REPLACE INTO user_role_mapping
                (
                    user_id,
                    role_id,
                    isactive
                )
                VALUES
                (
                    v_user_id,
                    1,
                    1
                );

            END IF;


            /* =================================================
               ALWAYS INSERT REGISTRATION HISTORY
               ================================================= */
            INSERT INTO registration_history
            (
                reg_id,
                status,
                performed_by,
                remarks
            )
            VALUES
            (
                p_reg_id,
                p_action,
                p_approved_by,
                p_remarks
            );


            /* =================================================
               COMMIT
               ================================================= */
            COMMIT;


            /* =================================================
               SUCCESS RESPONSE
               ================================================= */
            SELECT
                1 AS success,

                CASE
                    WHEN p_action = 5
                        THEN 'Registration Rejected successfully'
                    ELSE 'Registration approved successfully'
                END AS message,

                v_user_id AS id,
                v_reg_no AS reg_no,
                NULL AS error_code,
                NULL AS error_message;

        END IF;

    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `generate_application_no` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `generate_application_no`(
    IN p_organization_id INT,
    OUT p_application_no VARCHAR(100)
)
BEGIN
    DECLARE v_short_name VARCHAR(50);
    DECLARE v_year_month CHAR(6);
    DECLARE v_count INT;

    SET v_year_month = DATE_FORMAT(CURDATE(), '%Y%m');

    /* Get organization short name */
    SELECT org_name
    INTO v_short_name
    FROM mas_organization
    WHERE id = p_organization_id
    LIMIT 1;

    /* Validate organization */
    IF v_short_name IS NULL THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Invalid organization ID';
    END IF;

    /*
       Increment monthly counter.
       INSERT creates counter = 1 for a new month.
       ON DUPLICATE KEY UPDATE safely increments it.
    */
    INSERT INTO organization_monthly_counter
        (organization_id, year_month_counter, last_count)
    VALUES
        (p_organization_id, v_year_month, 1)
    ON DUPLICATE KEY UPDATE
        last_count = last_count + 1;

    /* Get the newly assigned number */
    SELECT last_count
    INTO v_count
    FROM organization_monthly_counter
    WHERE organization_id = p_organization_id
      AND year_month_counter = v_year_month;

    /* Build application number */
    SET p_application_no = CONCAT(
        v_short_name,
        '/',
        v_year_month,
        '/',
        LPAD(v_count, 4, '0')
    );

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `register_user` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `register_user`(
    IN p_name      VARCHAR(1000),
    IN p_email     VARCHAR(500),
    IN p_phone     VARCHAR(15),
    IN p_org       INT,
    IN p_org_type  INT,
    IN p_ugc_id    VARCHAR(100)
)
BEGIN

    DECLARE v_request_no INT;
    DECLARE v_reg_no VARCHAR(50);
    DECLARE v_id BIGINT;

DECLARE v_error_code INT DEFAULT NULL;
    DECLARE v_error_message TEXT DEFAULT NULL;

    /*
      Error Handler
    */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN

        GET DIAGNOSTICS CONDITION 1
            v_error_code = MYSQL_ERRNO,
            v_error_message = MESSAGE_TEXT;

        ROLLBACK;

        /*
          Error Response
        */
        SELECT
            0 AS success,
            'Registration could not be created' AS message,
            NULL AS id,
            NULL AS reg_no,
            v_error_code AS error_code,
            v_error_message AS error_message;

    END;


    START TRANSACTION;

    /*
      Atomically create/increment today's request number.
      InnoDB row locking makes this concurrency-safe.
    */
    INSERT INTO reg_daily_counter
        (request_date, request_no)
    VALUES
        (CURDATE(), 1)
    ON DUPLICATE KEY UPDATE
        request_no = LAST_INSERT_ID(request_no + 1);

    /*SET v_request_no = LAST_INSERT_ID();*/
	select request_no into v_request_no from reg_daily_counter where request_date=CURDATE();
    /*
      Generate registration number
      Example: REG/20260817/25
    */
    SET v_reg_no = CONCAT(
        'REG/',
        DATE_FORMAT(CURDATE(), '%Y%m%d'),
        '/',
        v_request_no
    );

    /*
      Insert registration
    */
    INSERT INTO registration
    (
        reg_no,
        name,
        email,
        mobile_no,
        organization_id,
        org_type,
        ugc_id
    )
    VALUES
    (
        v_reg_no,
        p_name,
        p_email,
        p_phone,
        p_org,
        p_org_type,
        p_ugc_id
    );

    SET v_id = LAST_INSERT_ID();
    insert into registration_history (reg_id,status) values(v_id,1);

    COMMIT;

    /*
      Return generated registration details
    */
    SELECT
        1 AS success,
        'Registration created successfully' AS message,
        v_id AS id,
        v_reg_no AS reg_no,
        NULL AS error_code,
        NULL AS error_message;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_lock_account` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lock_account`(
    IN p_user_id INT,
    IN p_email VARCHAR(255),
    IN p_description VARCHAR(500)
)
BEGIN

    DECLARE v_user_id INT DEFAULT NULL;
    DECLARE v_email VARCHAR(255) DEFAULT NULL;
    DECLARE v_is_locked TINYINT DEFAULT NULL;

    -- Rollback on any SQL error
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        RESIGNAL;
    END;

    START TRANSACTION;

    /*
     * Find user by email if email is supplied
     */
    IF p_email IS NOT NULL AND TRIM(p_email) <> '' THEN

        SELECT 
            id,
            email,
            is_locked
        INTO
            v_user_id,
            v_email,
            v_is_locked
        FROM `user`
        WHERE email = p_email
        LIMIT 1;

    /*
     * Otherwise find user by ID
     */
    ELSEIF p_user_id IS NOT NULL THEN

        SELECT
            id,
            email,
            is_locked
        INTO
            v_user_id,
            v_email,
            v_is_locked
        FROM `user`
        WHERE id = p_user_id
        LIMIT 1;

    END IF;


    /*
     * User doesn't exist
     */
    IF v_user_id IS NULL THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'User not found';

    END IF;


    /*
     * Check whether already locked
     */
    IF v_is_locked = 1 THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'User account is already locked';

    END IF;


    /*
     * Lock account
     */
    UPDATE `user`
    SET is_locked = 1
    WHERE id = v_user_id;


    /*
     * Insert audit record
     */
    INSERT INTO audit_trail (
        user_id,
        login_name,
        action,
        action_description,
        created_at
    )
    VALUES (
        v_user_id,
        v_email,
        'ACCOUNT_LOCKED',
        COALESCE(
            p_description,
            'Account locked from backend'
        ),
        NOW()
    );


    COMMIT;


    /*
     * Return result
     */
    SELECT
        1 AS success,
        'Account locked successfully' AS message,
        v_user_id AS user_id,
        v_email AS email;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_unlock_account` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_unlock_account`(
    IN p_user_id INT,
    IN p_email VARCHAR(255),
    IN p_description VARCHAR(500)
)
BEGIN

    DECLARE v_user_id INT DEFAULT NULL;
    DECLARE v_email VARCHAR(255) DEFAULT NULL;
    DECLARE v_is_locked TINYINT DEFAULT NULL;

    -- Rollback on any SQL error
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        RESIGNAL;
    END;

    START TRANSACTION;

    /*
     * Find user by email if email is supplied
     */
    IF p_email IS NOT NULL AND TRIM(p_email) <> '' THEN

        SELECT 
            id,
            email,
            is_locked
        INTO
            v_user_id,
            v_email,
            v_is_locked
        FROM `user`
        WHERE email = p_email
        LIMIT 1;

    /*
     * Otherwise find user by ID
     */
    ELSEIF p_user_id IS NOT NULL THEN

        SELECT
            id,
            email,
            is_locked
        INTO
            v_user_id,
            v_email,
            v_is_locked
        FROM `user`
        WHERE id = p_user_id
        LIMIT 1;

    END IF;


    /*
     * User doesn't exist
     */
    IF v_user_id IS NULL THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'User not found';

    END IF;


    /*
     * Check whether already locked
     */
    IF v_is_locked = 0 THEN

        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'User account is already unlocked';

    END IF;


    /*
     * Lock account
     */
    UPDATE `user`
    SET is_locked = 1
    WHERE id = v_user_id;


    /*
     * Insert audit record
     */
    INSERT INTO audit_trail (
        user_id,
        login_name,
        action,
        action_description,
        created_at
    )
    VALUES (
        v_user_id,
        v_email,
        'ACCOUNT_UNLOCKED',
        COALESCE(
            p_description,
            'Account UNlocked from backend'
        ),
        NOW()
    );


    COMMIT;


    /*
     * Return result
     */
    SELECT
        1 AS success,
        'Account unlocked successfully' AS message,
        v_user_id AS user_id,
        v_email AS email;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `vw_application_latest_status`
--

/*!50001 DROP VIEW IF EXISTS `vw_application_latest_status`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_application_latest_status` AS select `a`.`id` AS `application_id`,`a`.`id` AS `id`,`a`.`app_no` AS `app_no`,`a`.`user_id` AS `user_id`,`a`.`adequate_arrangement_check` AS `adequate_arrangement_check`,`a`.`jammer_accounted` AS `jammer_accounted`,`a`.`non_intereference` AS `non_intereference`,`a`.`created_at` AS `created_at`,`a`.`current_status` AS `current_status`,`a`.`isactive` AS `isactive`,`a`.`is_single_exam` AS `is_single_exam`,`a`.`is_single_date` AS `is_single_date`,`a`.`centre_list_ready` AS `centre_list_ready`,`a`.`undertaking` AS `undertaking`,`a`.`contact_person` AS `contact_person`,`a`.`email` AS `email`,`a`.`phone` AS `phone`,`a`.`organisation` AS `organisation`,`a`.`organisation_type` AS `organisation_type`,`ah`.`id` AS `history_id`,`ah`.`status` AS `status`,`ah`.`created_at` AS `history_created`,`ah`.`performed_by` AS `performed_by`,`ah`.`assigned_to` AS `currently_with`,(select json_arrayagg(json_object('id',`adm`.`id`,'exam_date',`adm`.`exam_date`,'exam_name',`adm`.`exam_name`)) from `application_date_mapping` `adm` where (`adm`.`app_id` = `a`.`id`)) AS `exam_dates`,(select json_arrayagg(json_object('id',`acm`.`id`,'district',`acm`.`district`,'state',`acm`.`state`,'centre_name',`acm`.`centre_name`,'centre_address',`acm`.`centre_address`,'centre_coordinates',`acm`.`centre_coordinates`,'coordinator_name',`acm`.`coorrdinator_name`,'coordinator_mobile_no',`acm`.`coordinator_mobile_no`)) from `application_centre_mapping` `acm` where (`acm`.`app_id` = `a`.`id`)) AS `examination_centres` from (`application` `a` join `application_history` `ah` on((`ah`.`id` = (select max(`ah2`.`id`) from `application_history` `ah2` where (`ah2`.`app_id` = `a`.`id`))))) where (`a`.`isactive` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_application_latest_status1`
--

/*!50001 DROP VIEW IF EXISTS `vw_application_latest_status1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_application_latest_status1` AS select `a`.`id` AS `application_id`,`a`.`id` AS `id`,`a`.`app_no` AS `app_no`,`a`.`user_id` AS `user_id`,`a`.`adequate_arrangement_check` AS `adequate_arrangement_check`,`a`.`jammer_accounted` AS `jammer_accounted`,`a`.`non_intereference` AS `non_intereference`,`a`.`created_at` AS `created_at`,`a`.`current_status` AS `current_status`,`a`.`isactive` AS `isactive`,`a`.`is_single_exam` AS `is_single_exam`,`a`.`is_single_date` AS `is_single_date`,`a`.`centre_list_ready` AS `centre_list_ready`,`a`.`undertaking` AS `undertaking`,`a`.`contact_person` AS `contact_person`,`a`.`email` AS `email`,`a`.`phone` AS `phone`,`a`.`organisation` AS `organisation`,`a`.`organisation_type` AS `organisation_type`,`ah`.`id` AS `history_id`,`ah`.`status` AS `status`,`ah`.`created_at` AS `history_created`,`ah`.`assigned_to` AS `currently_with` from (`application` `a` join `application_history` `ah` on((`ah`.`id` = (select max(`ah2`.`id`) from `application_history` `ah2` where (`ah2`.`app_id` = `a`.`id`))))) where (`a`.`isactive` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-10 18:54:29
