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
-- Table structure for table `user_authorization`
--

DROP TABLE IF EXISTS `user_authorization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_authorization` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `body_name` varchar(150) NOT NULL,
  `body_type` varchar(100) NOT NULL,
  `ugc_details` varchar(255) DEFAULT NULL,
  `authorization_letter` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `remarks` varchar(500) DEFAULT NULL,
  `approved_by` int DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_user_authorization_user_id` (`user_id`),
  KEY `idx_user_id` (`user_id`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_authorization`
--

LOCK TABLES `user_authorization` WRITE;
/*!40000 ALTER TABLE `user_authorization` DISABLE KEYS */;
INSERT INTO `user_authorization` VALUES (5,33,'Rohit','rkcsid1234@gmail.com','1234567890',NULL,'Ministry/Department','Statutory Body','',NULL,0,NULL,NULL,NULL,'2026-08-13 08:42:54','2026-08-13 08:42:54'),(7,35,'Rohit','rkcsid1234@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','',NULL,0,NULL,NULL,NULL,'2026-08-13 09:03:53','2026-08-13 09:03:53'),(8,36,'Rohit','rkcsid12341@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','',NULL,0,NULL,NULL,NULL,'2026-08-13 09:12:39','2026-08-13 09:12:39'),(9,37,'Rohit','rkcsid123411@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','',NULL,0,NULL,NULL,NULL,'2026-08-13 09:17:41','2026-08-13 09:17:41'),(10,38,'Rohit','rkcsid1234111@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','','1786615389_9bbbc7d510db71116a41.pdf',1,NULL,NULL,NULL,'2026-08-13 09:18:28','2026-08-13 10:03:09'),(11,39,'harsh','rkcsid123433@gmail.com','1234567890',NULL,'Cabinet Secretariat','UGC','PMO','1786619967_5ecfb7cd403855acfde1.pdf',0,NULL,NULL,NULL,'2026-08-13 11:00:00','2026-08-13 11:19:27'),(12,40,'gitesh','rkcsid123455@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','','1786620084_741ccb007f0e5738e627.pdf',0,NULL,NULL,NULL,'2026-08-13 11:21:01','2026-08-13 11:21:24'),(13,41,'Harsh Singh','harsh@gmail.com','7840091293',NULL,'Cabinet Secretariat','Autonomous Body','','1786620174_600b44f220acdb9c990e.pdf',2,NULL,NULL,NULL,'2026-08-13 11:22:30','2026-08-13 11:22:54'),(14,42,'Rohit','rkcsid12341131@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','','1786620551_3587a0bfd169cda8d0d8.pdf',0,NULL,NULL,NULL,'2026-08-13 11:28:53','2026-08-13 11:29:11'),(15,43,'Rohit','rkcsid1234333@gmail.com','1234567890',NULL,'Cabinet Secretariat','UGC','PMO','1786624278_bc667df05ac3e82c4cdd.pdf',0,NULL,NULL,NULL,'2026-08-13 12:30:40','2026-08-13 12:31:18'),(16,44,'Rohit','rkcsid124434@gmail.com','1234567890',NULL,'Attached Office','Autonomous Body','','1786685283_e4c0b00ccfbb25811ad9.pdf',0,NULL,NULL,NULL,'2026-08-14 05:25:40','2026-08-14 05:28:03'),(17,45,'Rohit','rkcsid12341133@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','','1786689846_42525dbd8b1758ce1ab7.pdf',1,NULL,NULL,NULL,'2026-08-14 06:36:12','2026-08-14 06:44:06'),(18,46,'Rohit','rkcsid155234@gmail.com','1234567890',NULL,'Cabinet Secretariat','UGC','PMO','1786690927_d841409fb3317092860b.pdf',0,NULL,NULL,NULL,'2026-08-14 07:01:36','2026-08-14 07:02:07'),(19,47,'Rohit','rkcwsid1234@gmail.com','1234567890',NULL,'Cabinet Secretariat','Autonomous Body','','1786698028_a2e006d86221540931d8.pdf',0,NULL,NULL,NULL,'2026-08-14 08:59:15','2026-08-14 09:00:28'),(20,48,'Rohit','rkcyysid1234@gmail.com','1234567890',NULL,'Cabinet Secretariat','UGC','PMO','1786699353_440933bbb94d20b07a05.pdf',1,NULL,NULL,NULL,'2026-08-14 09:18:54','2026-08-14 09:22:33'),(21,49,'Rohit','rkcsidee1234@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','','1786706811_29a8c747522b5007bc9a.pdf',0,NULL,NULL,NULL,'2026-08-14 11:15:56','2026-08-14 11:26:51'),(22,50,'Rohit','rkcsuuid1234@gmail.com','1234567890',NULL,'Cabinet Secretariat','Statutory Body','','1786707314_973c5b69aefc028cf7f3.pdf',1,NULL,NULL,NULL,'2026-08-14 11:34:34','2026-08-14 11:35:14');
/*!40000 ALTER TABLE `user_authorization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (9,'Gitesh Srivastava','NIC123','wasacot724@devlug.com','1234567890','gitesh','$2y$10$IyKNsWoWpjUI6oHlXa0uuuKx2OGlztEBGK0jjEJF6ynetTbtf.yA.',1,'2026-08-03 08:03:16','2026-08-03 08:03:16'),(35,'Rohit',NULL,'rkcsid1234@gmail.com','1234567890',NULL,'$2y$10$75IQlK8ZU3hZwcnocGTHyeeUOGa2FfGfjnlgSSxQtQ6iB52SaA5vu',0,'2026-08-13 09:03:53','2026-08-13 09:03:53'),(36,'Rohit',NULL,'rkcsid12341@gmail.com','1234567890',NULL,'$2y$10$3PGJpivEDZ7R2WdY8DqaJeg3MnSWuKnvat4QRA8jtob33tgcVta0y',0,'2026-08-13 09:12:39','2026-08-13 09:12:39'),(37,'Rohit',NULL,'rkcsid123411@gmail.com','1234567890',NULL,'$2y$10$W4t6hnMMBWEXkIiLyliah.FAX290sihfXEmr3EIy/wmoglpAolxTC',0,'2026-08-13 09:17:41','2026-08-13 09:17:41'),(38,'Rohit',NULL,'rkcsid1234111@gmail.com','1234567890',NULL,'$2y$10$RunGKvFpr76gkff5xXAyoOj/eM2RSu6mSbXemG0tW/t4/pmrNA1kS',0,'2026-08-13 09:18:28','2026-08-13 09:18:28'),(39,'harsh',NULL,'rkcsid123433@gmail.com','1234567890',NULL,'$2y$10$9//sVSSZMVrLfCopHAtqz.SSO/JXF4ft2IucnoG3nh5iwPPHgSdoe',0,'2026-08-13 11:00:00','2026-08-13 11:00:00'),(40,'gitesh',NULL,'rkcsid123455@gmail.com','1234567890',NULL,'$2y$10$0vLb97RN7O.FpRfarhNRQuTroVk8fqgKs8rA5M4EkUPGv2GdQvNPK',0,'2026-08-13 11:21:01','2026-08-13 11:21:01'),(41,'Harsh Singh',NULL,'harsh@gmail.com','7840091293',NULL,'$2y$10$H6zczRG6uJ6U5kkiPQiP4urcnzHJ89iJsY666I.FqVqR5uOX57hrm',0,'2026-08-13 11:22:30','2026-08-13 11:22:30'),(42,'Rohit',NULL,'rkcsid12341131@gmail.com','1234567890',NULL,'$2y$10$X3fmwugbt.bQl4RpQQH6qOne03Tg7fLcg3hCtVTbwuB6Wt7SKpvuG',0,'2026-08-13 11:28:53','2026-08-13 11:28:53'),(43,'Rohit',NULL,'rkcsid1234333@gmail.com','1234567890',NULL,'$2y$10$8IPyIKH9fAxQbCAowkc.nuZt.zfEi7H.eNxjdI1M/tKUerC2ah/eu',0,'2026-08-13 12:30:40','2026-08-13 12:30:40'),(44,'Rohit',NULL,'rkcsid124434@gmail.com','1234567890',NULL,'$2y$10$zBx0.1DMohAWEfs3RnSNMeMti8fThiysh4hsVxr5lhCY.6LsFCiKK',0,'2026-08-14 05:25:40','2026-08-14 05:25:40'),(45,'Rohit',NULL,'rkcsid12341133@gmail.com','1234567890',NULL,'$2y$10$249cCDQhwThObYHf1xNey.OrHxoa/jEc8o3AESw9zqfqxDmaFQu2y',0,'2026-08-14 06:36:12','2026-08-14 06:36:12'),(46,'Rohit',NULL,'rkcsid155234@gmail.com','1234567890',NULL,'$2y$10$XHx4dxv1lUvYFSNC1M24E.QnX0BDpg/VSqqrtnTsfI1FX6L060lJy',0,'2026-08-14 07:01:36','2026-08-14 07:01:36'),(47,'Rohit',NULL,'rkcwsid1234@gmail.com','1234567890',NULL,'$2y$10$YUWCI4cGz7v3APnOCuCDgOyp9J56RmLbTLiCJU4lsXBxwfEOUz8Uq',0,'2026-08-14 08:59:15','2026-08-14 08:59:15'),(48,'Rohit',NULL,'rkcyysid1234@gmail.com','1234567890',NULL,'$2y$10$5xl7G/hz1spj/8sdEFkNsuaCYHXBJ3t4PWdLXd11nWvTscHl1LN2W',0,'2026-08-14 09:18:54','2026-08-14 09:18:54'),(49,'Rohit',NULL,'rkcsidee1234@gmail.com','1234567890',NULL,'$2y$10$g72/207yOMiMAkeY0xGgkufstlmmnVosEEXxUQmWR3y2fFRzAqVbW',0,'2026-08-14 11:15:56','2026-08-14 11:15:56'),(50,'Rohit',NULL,'rkcsuuid1234@gmail.com','1234567890',NULL,'$2y$10$17qxJzRkP82Q0KJb3zq1QOQW9PKts1XJ8htJ1vF85l5AYQZgkeVae',0,'2026-08-14 11:34:34','2026-08-14 11:34:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-14 17:30:06
