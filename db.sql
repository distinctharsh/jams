-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.46 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.17.0.7270
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for jams_db
CREATE DATABASE IF NOT EXISTS `jams_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `jams_db`;

-- Dumping structure for table jams_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table jams_db.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;

-- Dumping structure for table jams_db.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `organisation_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `organisation_type` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `letter_number` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `exam_address` text COLLATE utf8mb4_general_ci,
  `vendor_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contact_phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_by` int unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table jams_db.requests: ~8 rows (approximately)
DELETE FROM `requests`;
INSERT INTO `requests` (`id`, `organisation_name`, `organisation_type`, `letter_number`, `exam_name`, `exam_date`, `exam_address`, `vendor_name`, `contact_person`, `contact_email`, `contact_phone`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Test', 'central-government-department', 'test', 'Harsh', '2026-08-05', 'C-534, Badarpur Border', 'netra-defence-electronics', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 09:03:50', NULL),
	(2, 'NIC', 'central-government-department', '76575765765', 'Harsh', '2026-08-06', 'C-534, Badarpur Border', 'shakti-communication-works', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 11:55:19', NULL),
	(3, 'NIC', 'state-government-department', 'test', 'Harsh', '2026-08-06', 'C-534, Badarpur Border', 'shakti-communication-works', 'Harsh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 11:58:21', NULL),
	(4, 'NIC', 'central-government-department', '76575765765', 'Harsh', '2026-08-05', 'C-534, Badarpur Border', 'bharat-secure-systems-pvt-ltd', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:10:11', NULL),
	(5, 'Test', 'central-government-department', 'test', 'Harsh', '2026-08-05', 'C-534, Badarpur Border', 'shakti-communication-works', 'Harsh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:11:03', NULL),
	(6, 'New test', 'autonomous-examination-body', '76575765765', 'Harsh', '2026-08-06', 'C-534, Badarpur Border', 'shakti-communication-works', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:28:21', NULL),
	(7, 'Test', 'autonomous-examination-body', '76575765765', 'Harsh', '2026-08-05', 'President\'s Estate', 'shakti-communication-works', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:36:55', NULL),
	(8, 'Test', 'autonomous-examination-body', '76575765765', 'Harsh Singh', '2026-08-05', 'President\'s Estate', 'netra-defence-electronics', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:53:21', NULL);

-- Dumping structure for table jams_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id` (`employee_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jams_db.users: ~6 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `full_name`, `employee_id`, `email`, `mobile`, `username`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
	(9, 'Gitesh Srivastava', 'NIC123', 'wasacot724@devlug.com', '1234567890', 'gitesh', '$2y$10$IyKNsWoWpjUI6oHlXa0uuuKx2OGlztEBGK0jjEJF6ynetTbtf.yA.', 1, '2026-08-03 08:03:16', '2026-08-03 08:03:16'),
	(10, 'Harsh Singh', 'HARSH123', 'wa1sacot724@devlug.com', '1234567890', 'harsh', '$2y$10$wFC4kBBwp6gyuIGy0xE6/OP8io632bSHxgU1Qjey1qYSK2VVUQeiu', 1, '2026-08-03 10:32:57', '2026-08-03 10:32:57'),
	(11, 'Ram Kumar', 'RAM22', 'ram@gmail.com', '1234567890', 'ram1', '$2y$10$25o4gjcB0uy1zJpopEK9ru4MfWI32zCyFsuj3z.UZRUYMNUFRU.t6', 1, '2026-08-03 11:42:14', '2026-08-03 11:42:14'),
	(16, 'Anil Kumar', 'ANIL121', 'wasacot7242@devlug.com', '1234567890', 'anil', '$2y$10$Ql3Lyw53Eavyzyodafzzf.w6wmoMjYEPvjXW04OyG5693u00IV/A.', 1, '2026-08-03 12:18:59', '2026-08-03 12:18:59'),
	(17, 'Shubham Kumar', '123', 'shubham@gmail.com', '7840000000', 'shubham', '$2y$10$i7iIZOg3OpcyIInzEqozLeJCsL4eNYzzI0jfboOXIczK2bOojf0vS', 1, '2026-08-03 12:23:32', '2026-08-03 12:23:32'),
	(18, 'Harsh Singh', '', 'distinctharsh@gmail.com', '7840091293', 'distinctharsh', '$2y$10$geEGUxar23itsB91B4.kWeWgl8qVzsZzaJRJD8CJHgBlWR2ZV/Caa', 1, '2026-08-11 05:57:18', '2026-08-11 05:57:18');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
