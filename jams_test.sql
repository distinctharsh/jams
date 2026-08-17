-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: new_schema
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
-- Table structure for table `mas_application_action`
--

DROP TABLE IF EXISTS `mas_application_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mas_application_action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_application_action`
--

LOCK TABLES `mas_application_action` WRITE;
/*!40000 ALTER TABLE `mas_application_action` DISABLE KEYS */;
INSERT INTO `mas_application_action` VALUES (1,'SUBMITTED'),(2,'PDF_GENERATED'),(3,'SIGNED_APPLICATION_UPLOADED'),(4,'DEALING_HAND_REVIEW'),(5,'SO_REVIEW'),(6,'US_REVIEW'),(7,'JS_REVIEW'),(8,'SECRETARY_REVIEW'),(9,'APPROVED'),(10,'PERMISSION_LETTER_GENERATED'),(11,'PERMISSION_LETTER_SIGNED'),(12,'COMPLETED'),(13,'RETURNED'),(14,'REJECTED');
/*!40000 ALTER TABLE `mas_application_action` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_organization`
--

LOCK TABLES `mas_organization` WRITE;
/*!40000 ALTER TABLE `mas_organization` DISABLE KEYS */;
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
  `Competent Authority` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_organization_type`
--

LOCK TABLES `mas_organization_type` WRITE;
/*!40000 ALTER TABLE `mas_organization_type` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_role`
--

LOCK TABLES `mas_role` WRITE;
/*!40000 ALTER TABLE `mas_role` DISABLE KEYS */;
INSERT INTO `mas_role` VALUES (1,'Organization User','ORG_USER',1),(2,'Dealing Hand','DEALING_HAND',1),(3,'Section Officer','SO',1),(4,'Under Secretary','US',1),(5,'Joint Secretary','JS',1),(6,'Secretary','SECRETARY',1),(7,'System Administrator','ADMIN',1),(8,'Report View Only','REPORT_VIEW',1);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
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
  `performed_by` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_id_idx` (`reg_id`),
  KEY `status_idx` (`status`),
  CONSTRAINT `reg_id` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`id`),
  CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `mas_registration_action` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration_history`
--

LOCK TABLES `registration_history` WRITE;
/*!40000 ALTER TABLE `registration_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `registration_history` ENABLE KEYS */;
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `org_idx` (`organization_id`),
  KEY `org_type_idx` (`org_type`),
  CONSTRAINT `org_type_user` FOREIGN KEY (`org_type`) REFERENCES `mas_organization_type` (`id`),
  CONSTRAINT `org_user` FOREIGN KEY (`organization_id`) REFERENCES `mas_organization` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role_mapping`
--

LOCK TABLES `user_role_mapping` WRITE;
/*!40000 ALTER TABLE `user_role_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_role_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'new_schema'
--

--
-- Dumping routines for database 'new_schema'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-17 17:05:43
