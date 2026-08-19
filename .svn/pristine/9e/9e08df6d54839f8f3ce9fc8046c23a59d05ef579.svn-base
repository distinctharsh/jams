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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_organization`
--

LOCK TABLES `mas_organization` WRITE;
/*!40000 ALTER TABLE `mas_organization` DISABLE KEYS */;
INSERT INTO `mas_organization` VALUES (1,'Test',1,'test',1,1,'2026-08-17 17:44:15','2026-08-17 17:44:15');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mas_organization_type`
--

LOCK TABLES `mas_organization_type` WRITE;
/*!40000 ALTER TABLE `mas_organization_type` DISABLE KEYS */;
INSERT INTO `mas_organization_type` VALUES (1,'Statuary Body',1,0,'HOD');
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
INSERT INTO `reg_daily_counter` VALUES ('2026-08-17',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (2,'REG/20260817/1','rohit','rohit@cabsec.nic.in','7896543210',1,1,NULL,'',NULL,NULL,NULL,NULL),(3,'REG/20260817/2','Rohit','test@nic.in','7896543215',1,1,NULL,'',NULL,NULL,NULL,NULL);
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
  `performed_by` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_id_idx` (`reg_id`),
  KEY `status_idx` (`status`),
  CONSTRAINT `reg_id` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`id`),
  CONSTRAINT `status` FOREIGN KEY (`status`) REFERENCES `mas_registration_action` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration_history`
--

LOCK TABLES `registration_history` WRITE;
/*!40000 ALTER TABLE `registration_history` DISABLE KEYS */;
INSERT INTO `registration_history` VALUES (1,2,4,1,'2026-08-17 18:30:24','okk');
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
  `ugc_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `org_idx` (`organization_id`),
  KEY `org_type_idx` (`org_type`),
  CONSTRAINT `org_type_user` FOREIGN KEY (`org_type`) REFERENCES `mas_organization_type` (`id`),
  CONSTRAINT `org_user` FOREIGN KEY (`organization_id`) REFERENCES `mas_organization` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'rohit','rohit@cabsec.nic.in','7896543210',1,1,NULL,NULL,1,NULL,NULL,'2026-08-17 18:30:24','');
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
    IN p_remarks VARCHAR(1000)
)
BEGIN

    DECLARE v_reg_no VARCHAR(50) DEFAULT NULL;
    DECLARE v_name VARCHAR(1000) DEFAULT NULL;
    DECLARE v_email VARCHAR(50) DEFAULT NULL;
    DECLARE v_phone VARCHAR(15) DEFAULT NULL;
    DECLARE v_org INT DEFAULT 1;
    DECLARE v_org_type INT DEFAULT 1;
    DECLARE v_ugc_id VARCHAR(100) DEFAULT NULL;
    DECLARE v_authorization_letter VARCHAR(500)DEFAULT NULL;
    DECLARE v_designation INT;
	Declare temp int;
    DECLARE v_user_id BIGINT DEFAULT NULL;

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

        SELECT
            0 AS success,
            'Registration could not be approved' AS message,
            NULL AS id,
            v_reg_no AS reg_no,
            v_error_code AS error_code,
            v_error_message AS error_message;

    END;


    /*
      Start Transaction
    */
    START TRANSACTION;


    /*
      Get registration details using reg.id
      FOR UPDATE prevents concurrent approval
    */
    SELECT
        reg_no,
        name,
        email,
        mobile_no,
        organization_id,
        org_type,
        ugc_id,authorization_letter,designation
    INTO
        v_reg_no,
        v_name,
        v_email,
        v_phone,
        v_org,
        v_org_type,
        v_ugc_id,v_authorization_letter,v_designation
    FROM registration
    WHERE id = p_reg_id
    FOR UPDATE;


    /*
      Check registration exists
    */
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
    SELECT
        status 
    INTO
        temp
    FROM registration_history
    WHERE reg_id = p_reg_id order by id desc limit 1
    FOR UPDATE;
IF temp not in(1,2,3) THEN

        ROLLBACK;

        SELECT
            0 AS success,
            'Registration not found' AS message,
            NULL AS id,
            NULL AS reg_no,
            404 AS error_code,
            'Aleardy approved or rejected' AS error_message;

    ELSE
        /*
          Insert registration data into user table
        */
        INSERT INTO user
        (
            name,
            email,
            mobile_no,
            organization_id,
            org_type,
            ugc_id,authorization_letter,designation
        )
        VALUES
        (
            v_name,
            v_email,
            v_phone,
            v_org,
            v_org_type,
            v_ugc_id,v_authorization_letter,v_designation
        );


        /*
          Get newly created user ID
        */
        SET v_user_id = LAST_INSERT_ID();
		insert into registration_history(reg_id,status,performed_by,remarks) values (p_reg_id,p_action,p_approved_by,p_remarks);

        /*
          Commit transaction
        */
        COMMIT;


        /*
          Success Response
        */
        SELECT
            1 AS success,
            'Registration approved successfully' AS message,
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

    SET v_request_no = LAST_INSERT_ID();

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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-19 11:43:17
