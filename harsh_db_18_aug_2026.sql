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

-- Dumping structure for table jams_db.mas_application_action
CREATE TABLE IF NOT EXISTS `mas_application_action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_application_action: ~14 rows (approximately)
DELETE FROM `mas_application_action`;
INSERT INTO `mas_application_action` (`id`, `name`) VALUES
	(1, 'SUBMITTED'),
	(2, 'PDF_GENERATED'),
	(3, 'SIGNED_APPLICATION_UPLOADED'),
	(4, 'DEALING_HAND_REVIEW'),
	(5, 'SO_REVIEW'),
	(6, 'US_REVIEW'),
	(7, 'JS_REVIEW'),
	(8, 'SECRETARY_REVIEW'),
	(9, 'APPROVED'),
	(10, 'PERMISSION_LETTER_GENERATED'),
	(11, 'PERMISSION_LETTER_SIGNED'),
	(12, 'COMPLETED'),
	(13, 'RETURNED'),
	(14, 'REJECTED');

-- Dumping structure for table jams_db.mas_model
CREATE TABLE IF NOT EXISTS `mas_model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `vendor_id` int NOT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_model: ~0 rows (approximately)
DELETE FROM `mas_model`;
INSERT INTO `mas_model` (`id`, `name`, `vendor_id`, `isactive`) VALUES
	(1, 'abc', 1, 1);

-- Dumping structure for table jams_db.mas_organization
CREATE TABLE IF NOT EXISTS `mas_organization` (
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

-- Dumping data for table jams_db.mas_organization: ~0 rows (approximately)
DELETE FROM `mas_organization`;
INSERT INTO `mas_organization` (`id`, `org_name`, `org_type`, `org_description`, `authorization_letter_required`, `isactive`, `created_at`, `updated_at`) VALUES
	(1, 'SSC', 2, 'Staff Selection Commission', 1, 1, '2026-08-17 17:44:15', '2026-08-18 12:18:19'),
	(2, 'UPSC', 2, 'Union Public Service Commission', 1, 1, '2026-08-18 06:56:42', '2026-08-18 12:19:37'),
	(3, 'IBPS', 3, 'Institute of Banking Personnel Selection', 1, 1, '2026-08-18 06:56:55', '2026-08-18 12:18:24'),
	(4, 'RRB', 2, 'Railway Recruitment Board', 1, 1, '2026-08-18 06:57:08', '2026-08-18 12:18:26'),
	(5, 'NTA', 3, 'National Testing Agency', 1, 1, '2026-08-18 06:57:21', '2026-08-18 12:18:28'),
	(6, 'NRA', 1, 'National Recruitment Agency', 1, 1, '2026-08-18 06:57:31', '2026-08-18 06:57:31'),
	(7, 'SBI', 2, 'State Bank of India', 1, 1, '2026-08-18 06:57:42', '2026-08-18 06:57:42'),
	(8, 'FCI', 7, '', 1, 1, '2026-08-18 09:53:49', '2026-08-18 09:53:49'),
	(9, 'DRDO', 6, '', 1, 1, '2026-08-18 09:53:59', '2026-08-18 09:53:59'),
	(10, 'ISRO', 5, '', 1, 1, '2026-08-18 09:54:09', '2026-08-18 09:54:09'),
	(11, 'BPSC', 4, '', 1, 1, '2026-08-18 09:54:19', '2026-08-18 09:54:19'),
	(12, 'SEBI', 4, '', 1, 1, '2026-08-18 09:54:32', '2026-08-18 09:54:32');

-- Dumping structure for table jams_db.mas_organization_type
CREATE TABLE IF NOT EXISTS `mas_organization_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `isactive` tinyint NOT NULL DEFAULT '1',
  `is_ugc_id_required` tinyint NOT NULL DEFAULT '0',
  `competent_authority` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_organization_type: ~0 rows (approximately)
DELETE FROM `mas_organization_type`;
INSERT INTO `mas_organization_type` (`id`, `name`, `isactive`, `is_ugc_id_required`, `competent_authority`) VALUES
	(1, 'Statuary Body', 1, 0, 'HOD'),
	(2, 'Recruitment Commission', 1, 1, ''),
	(3, 'Constitutional Recruitment Commission', 1, 1, ''),
	(4, 'Banking Recruitment Body', 1, 0, ''),
	(5, 'Railway Recruitment Board', 1, 0, ''),
	(6, 'Examination Agency', 1, 0, ''),
	(7, 'Recruitment Board', 1, 1, '');

-- Dumping structure for table jams_db.mas_registration_action
CREATE TABLE IF NOT EXISTS `mas_registration_action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_registration_action: ~6 rows (approximately)
DELETE FROM `mas_registration_action`;
INSERT INTO `mas_registration_action` (`id`, `name`) VALUES
	(1, 'Registration Request Submitted'),
	(2, 'Mail sent to user for uploading authorization letter'),
	(3, 'Under Verification'),
	(4, 'Approved'),
	(5, 'Rejected'),
	(6, 'Login Credentials Sent on mail');

-- Dumping structure for table jams_db.mas_role
CREATE TABLE IF NOT EXISTS `mas_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `code` varchar(45) NOT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_role: ~8 rows (approximately)
DELETE FROM `mas_role`;
INSERT INTO `mas_role` (`id`, `name`, `code`, `isactive`) VALUES
	(1, 'Organization User', 'ORG_USER', 1),
	(2, 'Dealing Hand', 'DEALING_HAND', 1),
	(3, 'Section Officer', 'SO', 1),
	(4, 'Under Secretary', 'US', 1),
	(5, 'Joint Secretary', 'JS', 1),
	(6, 'Secretary', 'SECRETARY', 1),
	(7, 'System Administrator', 'ADMIN', 1),
	(8, 'Report View Only', 'REPORT_VIEW', 1);

-- Dumping structure for table jams_db.mas_vendor
CREATE TABLE IF NOT EXISTS `mas_vendor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(250) NOT NULL,
  `isactive` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_vendor: ~2 rows (approximately)
DELETE FROM `mas_vendor`;
INSERT INTO `mas_vendor` (`id`, `vendor_name`, `isactive`) VALUES
	(1, 'BEL', '1'),
	(2, 'ECIL', '1');

-- Dumping structure for table jams_db.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table jams_db.migrations: ~0 rows (approximately)
DELETE FROM `migrations`;

-- Dumping structure for table jams_db.reg_daily_counter
CREATE TABLE IF NOT EXISTS `reg_daily_counter` (
  `request_date` date NOT NULL,
  `request_no` int NOT NULL,
  PRIMARY KEY (`request_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.reg_daily_counter: ~0 rows (approximately)
DELETE FROM `reg_daily_counter`;
INSERT INTO `reg_daily_counter` (`request_date`, `request_no`) VALUES
	('2026-08-17', 2);

-- Dumping structure for table jams_db.registration
CREATE TABLE IF NOT EXISTS `registration` (
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

-- Dumping data for table jams_db.registration: ~2 rows (approximately)
DELETE FROM `registration`;
INSERT INTO `registration` (`id`, `reg_no`, `name`, `email`, `mobile_no`, `organization_id`, `org_type`, `designation`, `ugc_id`, `auth_link`, `auth_link_generated_at`, `isactive_authlink`, `authorization_letter`) VALUES
	(2, 'REG/20260817/1', 'rohit', 'rohit@cabsec.nic.in', '7896543210', 1, 1, NULL, '', NULL, NULL, NULL, NULL),
	(3, 'REG/20260817/2', 'Rohit', 'test@nic.in', '7896543215', 1, 1, NULL, '', NULL, NULL, NULL, NULL);

-- Dumping structure for table jams_db.registration_history
CREATE TABLE IF NOT EXISTS `registration_history` (
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

-- Dumping data for table jams_db.registration_history: ~0 rows (approximately)
DELETE FROM `registration_history`;
INSERT INTO `registration_history` (`id`, `reg_id`, `status`, `performed_by`, `created_at`, `remarks`) VALUES
	(1, 2, 4, 1, '2026-08-17 18:30:24', 'okk');

-- Dumping structure for table jams_db.requests
CREATE TABLE IF NOT EXISTS `requests` (
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

-- Dumping data for table jams_db.requests: ~9 rows (approximately)
DELETE FROM `requests`;
INSERT INTO `requests` (`id`, `organisation_name`, `organisation_type`, `letter_number`, `exam_name`, `exam_date`, `exam_address`, `vendor_name`, `contact_person`, `contact_email`, `contact_phone`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'Test', 'central-government-department', 'test', 'Harsh', '2026-08-05', 'C-534, Badarpur Border', 'netra-defence-electronics', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 09:03:50', NULL),
	(2, 'NIC', 'central-government-department', '76575765765', 'Harsh', '2026-08-06', 'C-534, Badarpur Border', 'shakti-communication-works', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 11:55:19', NULL),
	(3, 'NIC', 'state-government-department', 'test', 'Harsh', '2026-08-06', 'C-534, Badarpur Border', 'shakti-communication-works', 'Harsh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 11:58:21', NULL),
	(4, 'NIC', 'central-government-department', '76575765765', 'Harsh', '2026-08-05', 'C-534, Badarpur Border', 'bharat-secure-systems-pvt-ltd', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:10:11', NULL),
	(5, 'Test', 'central-government-department', 'test', 'Harsh', '2026-08-05', 'C-534, Badarpur Border', 'shakti-communication-works', 'Harsh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:11:03', NULL),
	(6, 'New test', 'autonomous-examination-body', '76575765765', 'Harsh', '2026-08-06', 'C-534, Badarpur Border', 'shakti-communication-works', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:28:21', NULL),
	(7, 'Test', 'autonomous-examination-body', '76575765765', 'Harsh', '2026-08-05', 'President\'s Estate', 'shakti-communication-works', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:36:55', NULL),
	(8, 'Test', 'autonomous-examination-body', '76575765765', 'Harsh Singh', '2026-08-05', 'President\'s Estate', 'netra-defence-electronics', 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'pending', 10, '2026-08-05 12:53:21', NULL),
	(9, 'IIT DElhi', 'state-government-department', '213124SADER', 'Rohit', '2026-08-12', 'Address of examination', 'bharat-secure-systems-pvt-ltd', 'Rohit', 'rkcsid1234@gmail.com', '98013121222', 'pending', 9, '2026-08-12 07:27:51', NULL);

-- Dumping structure for table jams_db.user
CREATE TABLE IF NOT EXISTS `user` (
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

-- Dumping data for table jams_db.user: ~0 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `name`, `email`, `mobile_no`, `organization_id`, `org_type`, `designation`, `authorization_letter`, `isactive`, `salt`, `hash`, `created_at`, `ugc_id`) VALUES
	(3, 'rohit', 'rohit@cabsec.nic.in', '7896543210', 1, 1, NULL, NULL, 1, NULL, NULL, '2026-08-17 18:30:24', '');

-- Dumping structure for table jams_db.user_authorization
CREATE TABLE IF NOT EXISTS `user_authorization` (
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.user_authorization: ~30 rows (approximately)
DELETE FROM `user_authorization`;
INSERT INTO `user_authorization` (`id`, `user_id`, `full_name`, `email`, `mobile`, `username`, `body_name`, `body_type`, `ugc_details`, `authorization_letter`, `status`, `remarks`, `approved_by`, `approved_at`, `created_at`, `updated_at`) VALUES
	(5, 33, 'Rohit', 'rkcsid1234@gmail.com', '1234567890', NULL, 'Ministry/Department', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-13 08:42:54', '2026-08-13 08:42:54'),
	(7, 35, 'Rohit', 'rkcsid1234@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-13 09:03:53', '2026-08-13 09:03:53'),
	(8, 36, 'Rohit', 'rkcsid12341@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-13 09:12:39', '2026-08-13 09:12:39'),
	(9, 37, 'Rohit', 'rkcsid123411@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-13 09:17:41', '2026-08-13 09:17:41'),
	(10, 38, 'Rohit', 'rkcsid1234111@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', '1786615389_9bbbc7d510db71116a41.pdf', 1, NULL, NULL, NULL, '2026-08-13 09:18:28', '2026-08-13 10:03:09'),
	(11, 39, 'harsh', 'rkcsid123433@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'UGC', 'PMO', '1786619967_5ecfb7cd403855acfde1.pdf', 0, NULL, NULL, NULL, '2026-08-13 11:00:00', '2026-08-13 11:19:27'),
	(12, 40, 'gitesh', 'rkcsid123455@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', '1786620084_741ccb007f0e5738e627.pdf', 0, NULL, NULL, NULL, '2026-08-13 11:21:01', '2026-08-13 11:21:24'),
	(13, 41, 'Harsh Singh', 'harsh@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Autonomous Body', '', '1786620174_600b44f220acdb9c990e.pdf', 2, NULL, NULL, NULL, '2026-08-13 11:22:30', '2026-08-13 11:22:54'),
	(14, 42, 'Rohit', 'rkcsid12341131@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', '1786620551_3587a0bfd169cda8d0d8.pdf', 0, NULL, NULL, NULL, '2026-08-13 11:28:53', '2026-08-13 11:29:11'),
	(15, 43, 'Rohit', 'rkcsid1234333@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'UGC', 'PMO', '1786624278_bc667df05ac3e82c4cdd.pdf', 0, NULL, NULL, NULL, '2026-08-13 12:30:40', '2026-08-13 12:31:18'),
	(16, 44, 'Rohit', 'rkcsid124434@gmail.com', '1234567890', NULL, 'Attached Office', 'Autonomous Body', '', '1786685283_e4c0b00ccfbb25811ad9.pdf', 0, NULL, NULL, NULL, '2026-08-14 05:25:40', '2026-08-14 05:28:03'),
	(17, 45, 'Rohit', 'rkcsid12341133@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', '1786689846_42525dbd8b1758ce1ab7.pdf', 1, NULL, NULL, NULL, '2026-08-14 06:36:12', '2026-08-14 06:44:06'),
	(18, 46, 'Rohit', 'rkcsid155234@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'UGC', 'PMO', '1786690927_d841409fb3317092860b.pdf', 0, NULL, NULL, NULL, '2026-08-14 07:01:36', '2026-08-14 07:02:07'),
	(19, 47, 'Rohit', 'rkcwsid1234@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Autonomous Body', '', '1786698028_a2e006d86221540931d8.pdf', 0, NULL, NULL, NULL, '2026-08-14 08:59:15', '2026-08-14 09:00:28'),
	(20, 48, 'Rohit', 'rkcyysid1234@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'UGC', 'PMO', '1786699353_440933bbb94d20b07a05.pdf', 1, NULL, NULL, NULL, '2026-08-14 09:18:54', '2026-08-14 09:22:33'),
	(21, 49, 'Rohit', 'rkcsidee1234@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', '1786706811_29a8c747522b5007bc9a.pdf', 0, NULL, NULL, NULL, '2026-08-14 11:15:56', '2026-08-14 11:26:51'),
	(22, 50, 'Rohit', 'rkcsuuid1234@gmail.com', '1234567890', NULL, 'Cabinet Secretariat', 'Statutory Body', '', '1786707314_973c5b69aefc028cf7f3.pdf', 1, NULL, NULL, NULL, '2026-08-14 11:34:34', '2026-08-14 11:35:14'),
	(23, 51, 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 06:29:25', '2026-08-17 06:29:25'),
	(24, 52, 'Harsh Singh', 'distinctharsh1@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Autonomous Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 07:00:18', '2026-08-17 07:00:18'),
	(25, 53, 'Harsh Singh', 'distinctharsh3@gmail.com', '7840091293', NULL, 'Ministry/Department', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 08:38:22', '2026-08-17 08:38:22'),
	(26, 54, 'Harsh Singh', 'distinctharsh5@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 08:54:08', '2026-08-17 08:54:08'),
	(27, 55, 'Harsh Singh', 'distinctharsh6@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 08:57:16', '2026-08-17 08:57:16'),
	(28, 56, 'Harsh Singh', 'distinctharsh7@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', '1786957481_d6b38f9f168e4b24d809.pdf', 0, NULL, NULL, NULL, '2026-08-17 09:00:59', '2026-08-17 09:04:41'),
	(30, 58, 'Harsh Singh', 'distinctharsh8@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', '1786958715_19fcf88c7ff8fae2d1cc.pdf', 0, NULL, NULL, NULL, '2026-08-17 09:08:37', '2026-08-17 09:25:15'),
	(31, 59, 'Harsh Singh', 'distinctharsh9@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 10:10:33', '2026-08-17 10:10:33'),
	(32, 60, 'Harsh Singh', 'distinctharsh10@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 11:03:47', '2026-08-17 11:03:47'),
	(33, 61, 'Harsh Singh', 'distinctharsh19@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 11:37:36', '2026-08-17 11:37:36'),
	(34, 62, 'Harsh Singh', 'distinctharsh20@gmail.com', '7840091293', NULL, 'Cabinet Secretariat', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 11:44:46', '2026-08-17 11:44:46'),
	(35, 63, 'Harsh Singh', 'distinctharsh21@gmail.com', '7840091293', NULL, 'Ministry/Department', 'Statutory Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-17 11:58:25', '2026-08-17 11:58:25'),
	(36, 64, 'Harsh Singh', 'distinctharsh212@gmail.com', '7840091293', NULL, 'UPSC', 'Statuary Body', '120', NULL, 0, NULL, NULL, NULL, '2026-08-17 12:28:39', '2026-08-17 12:28:39'),
	(37, 65, 'Harsh Singh', 'distinctharsh22@gmail.com', '7840091293', NULL, 'RRB', 'Autonomous Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-18 06:40:49', '2026-08-18 06:40:49');

-- Dumping structure for table jams_db.user_role_mapping
CREATE TABLE IF NOT EXISTS `user_role_mapping` (
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

-- Dumping data for table jams_db.user_role_mapping: ~0 rows (approximately)
DELETE FROM `user_role_mapping`;

-- Dumping structure for table jams_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table jams_db.users: ~30 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `full_name`, `employee_id`, `email`, `mobile`, `username`, `password`, `is_active`, `created_at`, `updated_at`) VALUES
	(9, 'Gitesh Srivastava', 'NIC123', 'wasacot724@devlug.com', '1234567890', 'gitesh', '$2y$10$IyKNsWoWpjUI6oHlXa0uuuKx2OGlztEBGK0jjEJF6ynetTbtf.yA.', 1, '2026-08-03 08:03:16', '2026-08-03 08:03:16'),
	(41, 'Harsh Singh', 'NIC1234', 'harsh@gmail.com', '7840091293', 'distinctharsh', '$2y$10$IyKNsWoWpjUI6oHlXa0uuuKx2OGlztEBGK0jjEJF6ynetTbtf.yA.', 1, '2026-08-13 11:22:30', '2026-08-13 11:22:30');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
