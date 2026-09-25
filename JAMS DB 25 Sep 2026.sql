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

-- Dumping structure for table jams_db.application
CREATE TABLE IF NOT EXISTS `application` (
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
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.application: ~6 rows (approximately)
DELETE FROM `application`;
INSERT INTO `application` (`id`, `app_no`, `user_id`, `adequate_arrangement_check`, `jammer_accounted`, `non_intereference`, `created_at`, `current_status`, `isactive`, `is_single_exam`, `is_single_date`, `centre_list_ready`, `contact_person`, `email`, `phone`, `organisation`, `organisation_type`, `undertaking`) VALUES
	(90, 'RRB/202609/0001', 7, 1, 1, 1, '2026-09-22 15:50:00', 1, 1, 1, 1, 1, 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'RRB', 'Recruitment Commission', '1'),
	(91, 'SEBI/202609/0002', 7, 1, 1, 1, '2026-09-22 15:53:16', 1, 1, 1, 1, 1, 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'SEBI', 'Banking Recruitment Body', '1'),
	(93, 'UPSC/202609/0003', 7, 1, 1, 1, '2026-09-22 15:54:33', 3, 1, 1, 1, 1, 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'UPSC', 'Recruitment Commission', '1'),
	(94, 'SEBI/202609/0004', 7, 1, 1, 1, '2026-09-22 16:49:43', 1, 1, 1, 1, 1, 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'SEBI', 'Railway Recruitment Board', '1'),
	(95, 'SBI/202609/0005', 7, 1, 1, 1, '2026-09-22 16:51:55', 1, 1, 1, 1, 0, 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'SBI', 'Examination Agency', '1'),
	(96, 'RRB/202609/0006', 7, 1, 1, 1, '2026-09-22 16:52:25', 1, 1, 1, 1, 1, 'Harsh Singh', 'distinctharsh@gmail.com', '7840091293', 'RRB', 'Recruitment Board', '1'),
	(97, 'SBI/202609/0007', 7, 1, 1, 1, '2026-09-25 17:07:55', 1, 1, 1, 1, 0, NULL, NULL, NULL, 'SBI', 'Constitutional Recruitment Commission', '1');

-- Dumping structure for table jams_db.application_centre_mapping
CREATE TABLE IF NOT EXISTS `application_centre_mapping` (
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
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.application_centre_mapping: ~15 rows (approximately)
DELETE FROM `application_centre_mapping`;
INSERT INTO `application_centre_mapping` (`id`, `app_id`, `district`, `state`, `centre_name`, `centre_address`, `centre_coordinates`, `coorrdinator_name`, `coordinator_mobile_no`) VALUES
	(98, 90, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(99, 90, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(100, 90, 'East Delhi', 'Delhi', 'ABC Kanya Vidhyalay', 'Test, Delhi', NULL, 'Rohan', '1234567890'),
	(101, 91, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(102, 91, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(103, 91, 'East Delhi', 'Delhi', 'ABC Kanya Vidhyalay', 'Test, Delhi', NULL, 'Rohan', '1234567890'),
	(104, 93, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(105, 93, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(106, 93, 'East Delhi', 'Delhi', 'ABC Kanya Vidhyalay', 'Test, Delhi', NULL, 'Rohan', '1234567890'),
	(107, 94, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(108, 94, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(109, 94, 'East Delhi', 'Delhi', 'ABC Kanya Vidhyalay', 'Test, Delhi', NULL, 'Rohan', '1234567890'),
	(110, 96, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(111, 96, 'Central Delhi', 'Delhi', 'Sarvodya Kanya Vidhyalay', 'Badarpur Border, New Delhi', '28.6139,77.209', 'Madhubala', '9876543210'),
	(112, 96, 'East Delhi', 'Delhi', 'ABC Kanya Vidhyalay', 'Test, Delhi', NULL, 'Rohan', '1234567890');

-- Dumping structure for table jams_db.application_date_mapping
CREATE TABLE IF NOT EXISTS `application_date_mapping` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `exam_name` varchar(255) DEFAULT NULL,
  `exam_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.application_date_mapping: ~22 rows (approximately)
DELETE FROM `application_date_mapping`;
INSERT INTO `application_date_mapping` (`id`, `app_id`, `exam_name`, `exam_date`) VALUES
	(257, 90, 'Section Officer RRB', '2026-09-08 00:00:00'),
	(258, 90, 'SSC', '2026-09-21 00:00:00'),
	(259, 90, 'Abc', '2027-09-21 00:00:00'),
	(260, 90, 'TEST', '2027-09-21 00:00:00'),
	(261, 91, 'SSC exam', '2026-09-08 00:00:00'),
	(263, 93, 'Banking SBI', '2026-08-05 00:00:00'),
	(264, 91, 'SSC', '2026-09-21 00:00:00'),
	(265, 91, 'Abc', '2027-09-21 00:00:00'),
	(266, 91, 'TEST', '2027-09-21 00:00:00'),
	(267, 93, 'SSC', '2026-09-21 00:00:00'),
	(268, 93, 'Abc', '2027-09-21 00:00:00'),
	(269, 93, 'TEST', '2027-09-21 00:00:00'),
	(270, 94, 'Test', '2026-09-06 00:00:00'),
	(271, 94, 'SSC', '2026-09-21 00:00:00'),
	(272, 94, 'Abc', '2027-09-21 00:00:00'),
	(273, 94, 'TEST', '2027-09-21 00:00:00'),
	(274, 95, 'Test3', '2026-09-07 00:00:00'),
	(275, 96, 'Test6', '2026-10-01 00:00:00'),
	(276, 96, 'SSC', '2026-09-21 00:00:00'),
	(277, 96, 'Abc', '2027-09-21 00:00:00'),
	(278, 96, 'TEST', '2027-09-21 00:00:00'),
	(280, 97, 'Harsh Singh', '2026-09-23 00:00:00');

-- Dumping structure for table jams_db.application_document_master
CREATE TABLE IF NOT EXISTS `application_document_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `document_type` int NOT NULL,
  `document_name` varchar(500) DEFAULT NULL,
  `document_path` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.application_document_master: ~0 rows (approximately)
DELETE FROM `application_document_master`;
INSERT INTO `application_document_master` (`id`, `app_id`, `document_type`, `document_name`, `document_path`) VALUES
	(66, 93, 3, 'ttt.pdf', 'uploads/signed_documents/signed_93_1790072678.pdf');

-- Dumping structure for table jams_db.application_history
CREATE TABLE IF NOT EXISTS `application_history` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `status` int NOT NULL,
  `performed_by` int DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `assigned_to` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.application_history: ~23 rows (approximately)
DELETE FROM `application_history`;
INSERT INTO `application_history` (`id`, `app_id`, `status`, `performed_by`, `remarks`, `created_at`, `assigned_to`) VALUES
	(122, 90, 1, 7, 'Application submitted successfully.', '2026-09-22 15:50:00', NULL),
	(123, 90, 2, 7, 'PDF_GENERATED', '2026-09-22 15:50:00', NULL),
	(124, 90, 1, 7, 'Center list uploaded via Excel batch import.', '2026-09-22 15:50:43', NULL),
	(125, 91, 1, 7, 'Application submitted successfully.', '2026-09-22 15:53:16', NULL),
	(126, 91, 2, 7, 'PDF_GENERATED', '2026-09-22 15:53:16', NULL),
	(127, 93, 1, 7, 'Application submitted successfully.', '2026-09-22 15:54:33', NULL),
	(128, 93, 2, 7, 'PDF_GENERATED', '2026-09-22 15:54:33', NULL),
	(129, 93, 3, 7, 'Signed application uploaded successfully.', '2026-09-22 15:54:38', NULL),
	(130, 93, 6, 7, 'Sent to US.', '2026-09-22 15:54:38', NULL),
	(131, 91, 1, 7, 'Center list uploaded via Excel batch import.', '2026-09-22 15:57:50', NULL),
	(132, 93, 1, 7, 'Center list uploaded via Excel batch import.', '2026-09-22 16:44:19', NULL),
	(133, 94, 1, 7, 'Application submitted successfully.', '2026-09-22 16:49:43', NULL),
	(134, 94, 2, 7, 'PDF_GENERATED', '2026-09-22 16:49:43', NULL),
	(135, 94, 1, 7, 'Center list uploaded via Excel batch import.', '2026-09-22 16:50:04', NULL),
	(136, 95, 1, 7, 'Application submitted successfully.', '2026-09-22 16:51:55', NULL),
	(137, 95, 2, 7, 'PDF_GENERATED', '2026-09-22 16:51:55', NULL),
	(138, 96, 1, 7, 'Application submitted successfully.', '2026-09-22 16:52:25', NULL),
	(139, 96, 2, 7, 'PDF_GENERATED', '2026-09-22 16:52:25', NULL),
	(140, 96, 1, 7, 'Center list uploaded via Excel batch import.', '2026-09-24 12:33:26', NULL),
	(141, 97, 1, 7, 'Application submitted successfully.', '2026-09-25 17:07:55', NULL),
	(142, 97, 15, 7, 'Application saved as draft.', '2026-09-25 17:07:55', NULL),
	(143, 97, 1, 7, 'Application updated successfully.', '2026-09-25 17:08:39', NULL),
	(144, 97, 2, 7, 'PDF_GENERATED', '2026-09-25 17:08:39', NULL);

-- Dumping structure for table jams_db.application_vendor_mapping
CREATE TABLE IF NOT EXISTS `application_vendor_mapping` (
  `id` int NOT NULL AUTO_INCREMENT,
  `app_id` int NOT NULL,
  `vendor_id` int DEFAULT NULL,
  `jammer_id` int DEFAULT NULL,
  `technical_specifications` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.application_vendor_mapping: ~7 rows (approximately)
DELETE FROM `application_vendor_mapping`;
INSERT INTO `application_vendor_mapping` (`id`, `app_id`, `vendor_id`, `jammer_id`, `technical_specifications`, `created_at`, `updated_at`) VALUES
	(84, 90, 2, 2, '', '2026-09-22 15:50:00', '2026-09-22 15:50:00'),
	(85, 91, 1, 1, '', '2026-09-22 15:53:16', '2026-09-22 15:53:16'),
	(86, 93, 2, 6, '', '2026-09-22 15:54:33', '2026-09-22 15:54:33'),
	(87, 94, 1, 1, '', '2026-09-22 16:49:43', '2026-09-22 16:49:43'),
	(88, 95, 2, 6, '', '2026-09-22 16:51:55', '2026-09-22 16:51:55'),
	(89, 96, 2, 6, '', '2026-09-22 16:52:25', '2026-09-22 16:52:25'),
	(91, 97, 8, 7, '', '2026-09-25 17:08:39', '2026-09-25 17:08:39');

-- Dumping structure for procedure jams_db.approve_registration
DELIMITER //
CREATE PROCEDURE `approve_registration`(
    IN p_reg_id BIGINT,
    IN p_approved_by INT,
    IN p_action INT,
    IN p_remarks VARCHAR(1000),
    IN p_pwd VARCHAR(500)
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


    /* ERROR HANDLER */
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN

        ROLLBACK;

        SELECT
            0 AS success,
            'Registration could not be approved' AS message,
            NULL AS id,
            v_reg_no AS reg_no,
            NULL AS error_code,
            'Database error occurred' AS error_message;

    END;


    START TRANSACTION;


    /* GET REGISTRATION DETAILS */
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


    /* CHECK REGISTRATION EXISTS */
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

        /* GET LATEST STATUS */
        SET v_status = NULL;

        SELECT status
        INTO v_status
        FROM registration_history
        WHERE reg_id = p_reg_id
        ORDER BY id DESC
        LIMIT 1
        FOR UPDATE;


        /* CHECK STATUS */
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

            /* REJECT */
            IF p_action <> 5 THEN

                /* CREATE USER */
                INSERT INTO `user`
                (
                    name,
                    email,
                    mobile_no,
                    organization_id,
                    org_type,
                    ugc_id,
                    authorization_letter,
                    designation,
                    `hash`,
                    password_reset_req
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
                    v_designation,
                    p_pwd,
                    1
                );


                /* GET USER ID */
                SET v_user_id = LAST_INSERT_ID();


                /* ASSIGN DEFAULT ROLE */
                REPLACE INTO user_role_mapping
                (
                    user_id,
                    role_id,
                    isactive
                )
                VALUES
                (
                    v_user_id,
                    3,
                    1
                );

            END IF;


            /* INSERT HISTORY */
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


            COMMIT;


            /* SUCCESS RESPONSE */
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

END//
DELIMITER ;

-- Dumping structure for table jams_db.audit_action
CREATE TABLE IF NOT EXISTS `audit_action` (
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.audit_action: ~33 rows (approximately)
DELETE FROM `audit_action`;
INSERT INTO `audit_action` (`action_id`, `user_id`, `login_name`, `module`, `action`, `record_id`, `description`, `ip_address`, `user_agent`, `created_at`) VALUES
	(2, NULL, 'rkcsid122234@gmail.com', 'REGISTRATION', 'PENDING', '78', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 07:28:56'),
	(3, NULL, 'rkcsid123411@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/3', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:00:58'),
	(4, NULL, 'rkcsid121134@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/4', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:11:58'),
	(5, NULL, 'rkcsid111234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/5', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:12:48'),
	(6, NULL, 'rkcsid1234333@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/6', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:19:59'),
	(7, NULL, 'rkcsid1234333@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/7', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:22:10'),
	(8, NULL, 'rkcsid124434@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/8', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:27:07'),
	(9, NULL, 'rkcsid177234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/9', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:28:08'),
	(10, NULL, 'rkcsiduuu1234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/10', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:36:51'),
	(11, NULL, 'rkcsid331234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/11', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:38:06'),
	(12, NULL, 'rkcsid16234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/12', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:42:57'),
	(13, NULL, 'swd1-cabsec786@supportgov.in', 'REGISTRATION', 'PENDING', 'REG/20260828/13', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-28 09:50:41'),
	(14, NULL, 'rkcsid12341@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/14', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-28 09:51:35'),
	(15, NULL, 'rkcsiwd1234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/15', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:52:37'),
	(16, NULL, 'rkcs44id1234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/16', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:53:48'),
	(17, NULL, 'rkcsid221234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/17', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 10:38:00'),
	(18, NULL, 'rkcsi333d1234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260828/18', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 11:46:59'),
	(19, NULL, 'swd11-cabsec@supportgov.in', 'REGISTRATION', 'PENDING', 'REG/20260828/19', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-28 13:32:53'),
	(20, NULL, 'rkcsi3d1234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260829/1', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 05:10:51'),
	(21, NULL, 'rkcrrsid1234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260831/1', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 04:58:13'),
	(22, NULL, 'rkcsittd1234@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260831/2', 'Registration successful. Please upload your Authorization Letter.', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:46:47'),
	(23, NULL, 'rohitnnnn@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260909/0', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 10:18:16'),
	(24, NULL, 'test@test.com', 'REGISTRATION', 'PENDING', 'REG/20260909/2', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 10:22:56'),
	(25, NULL, 'distinctharsh1111111@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260909/3', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 12:29:24'),
	(26, NULL, 'distinctharsh123456@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260917/0', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 08:45:06'),
	(27, NULL, 'distinctharsh123456@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260917/2', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 08:47:13'),
	(28, NULL, 'raghu@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260918/0', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-18 11:19:55'),
	(29, NULL, 'distinctharsh123456@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260918/2', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-18 11:21:51'),
	(30, NULL, 'anil@nic.in', 'REGISTRATION', 'PENDING', 'REG/20260922/0', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 12:09:26'),
	(31, NULL, 'sumitra@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260922/2', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 12:15:37'),
	(32, NULL, 'distincthars333h@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260922/3', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 12:17:05'),
	(33, NULL, 'distinctharsh11111@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260922/4', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 12:18:41'),
	(34, NULL, 'kk@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260922/5', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 12:41:50'),
	(35, NULL, 'distincthars111h@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260922/6', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 14:53:30'),
	(36, NULL, 'distincth111arsh@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260922/7', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 14:57:04'),
	(37, NULL, 'manohar@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260922/8', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 15:02:18'),
	(38, NULL, 'distincthar212sh@gmail.com', 'REGISTRATION', 'PENDING', 'REG/20260925/0', 'Registration successful. Please upload your Authorization Letter.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-25 12:28:33');

-- Dumping structure for table jams_db.audit_trail
CREATE TABLE IF NOT EXISTS `audit_trail` (
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
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.audit_trail: ~297 rows (approximately)
DELETE FROM `audit_trail`;
INSERT INTO `audit_trail` (`audit_id`, `user_id`, `login_name`, `action`, `action_description`, `ip_address`, `user_agent`, `login_time`, `logout_time`, `created_at`) VALUES
	(4, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 05:59:42', NULL, '2026-08-28 05:59:42'),
	(5, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 06:00:37', '2026-08-28 06:00:37'),
	(6, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 06:43:19', NULL, '2026-08-28 06:43:19'),
	(7, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 06:45:51', '2026-08-28 06:45:51'),
	(8, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 06:46:12', NULL, '2026-08-28 06:46:12'),
	(9, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 06:50:32', '2026-08-28 06:50:32'),
	(10, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 06:50:43', NULL, '2026-08-28 06:50:43'),
	(11, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 06:51:05', '2026-08-28 06:51:05'),
	(12, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 06:51:23', NULL, '2026-08-28 06:51:23'),
	(13, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 06:51:36', '2026-08-28 06:51:36'),
	(14, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 06:56:15', NULL, '2026-08-28 06:56:15'),
	(15, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 07:00:37', '2026-08-28 07:00:37'),
	(16, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 07:00:49', NULL, '2026-08-28 07:00:49'),
	(17, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 07:14:13', '2026-08-28 07:14:13'),
	(18, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 07:15:33', NULL, '2026-08-28 07:15:33'),
	(19, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 07:16:16', '2026-08-28 07:16:16'),
	(20, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 07:22:20', NULL, '2026-08-28 07:22:20'),
	(21, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 07:22:30', '2026-08-28 07:22:30'),
	(22, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 08:32:28', NULL, '2026-08-28 08:32:28'),
	(23, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 09:00:38', '2026-08-28 09:00:38'),
	(24, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:39:48', NULL, '2026-08-28 09:39:48'),
	(25, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 09:42:29', '2026-08-28 09:42:29'),
	(26, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:54:42', NULL, '2026-08-28 09:54:42'),
	(27, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 09:55:41', '2026-08-28 09:55:41'),
	(28, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 09:57:59', NULL, '2026-08-28 09:57:59'),
	(29, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 10:37:22', '2026-08-28 10:37:22'),
	(30, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 10:38:40', NULL, '2026-08-28 10:38:40'),
	(31, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 11:31:51', NULL, '2026-08-28 11:31:51'),
	(32, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 11:46:35', '2026-08-28 11:46:35'),
	(33, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 11:47:33', NULL, '2026-08-28 11:47:33'),
	(34, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 11:53:44', '2026-08-28 11:53:44'),
	(35, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 11:54:15', NULL, '2026-08-28 11:54:15'),
	(36, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 11:57:40', NULL, '2026-08-28 11:57:40'),
	(37, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 12:20:56', '2026-08-28 12:20:56'),
	(38, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 12:21:08', NULL, '2026-08-28 12:21:08'),
	(39, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 13:01:58', '2026-08-28 13:01:58'),
	(40, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 13:02:10', NULL, '2026-08-28 13:02:10'),
	(41, 6, 'gitesh@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-08-28 13:03:12'),
	(42, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 13:03:17', '2026-08-28 13:03:17'),
	(43, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 13:04:06', NULL, '2026-08-28 13:04:06'),
	(44, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 13:06:35', '2026-08-28 13:06:35'),
	(45, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 13:14:17', NULL, '2026-08-28 13:14:17'),
	(46, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 13:20:28', '2026-08-28 13:20:28'),
	(47, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 13:20:46', NULL, '2026-08-28 13:20:46'),
	(48, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 13:21:42', NULL, '2026-08-28 13:21:42'),
	(49, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 13:26:26', '2026-08-28 13:26:26'),
	(50, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 13:27:10', NULL, '2026-08-28 13:27:10'),
	(51, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 13:28:38', '2026-08-28 13:28:38'),
	(52, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36 Edg/151.0.0.0', '2026-08-28 13:29:46', NULL, '2026-08-28 13:29:46'),
	(53, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-28 13:34:16', NULL, '2026-08-28 13:34:16'),
	(54, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-28 13:34:38', '2026-08-28 13:34:38'),
	(55, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 05:11:35', NULL, '2026-08-29 05:11:35'),
	(56, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 05:47:09', '2026-08-29 05:47:09'),
	(57, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 05:47:22', NULL, '2026-08-29 05:47:22'),
	(58, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 05:49:39', '2026-08-29 05:49:39'),
	(59, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 05:49:50', NULL, '2026-08-29 05:49:50'),
	(60, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 05:59:28', '2026-08-29 05:59:28'),
	(61, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 05:59:49', NULL, '2026-08-29 05:59:49'),
	(62, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 06:05:00', NULL, '2026-08-29 06:05:00'),
	(63, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 06:10:43', '2026-08-29 06:10:43'),
	(64, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 06:11:10', NULL, '2026-08-29 06:11:10'),
	(65, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 06:12:32', '2026-08-29 06:12:32'),
	(66, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 06:22:11', NULL, '2026-08-29 06:22:11'),
	(67, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 06:42:37', '2026-08-29 06:42:37'),
	(68, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 07:09:38', NULL, '2026-08-29 07:09:38'),
	(69, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 07:12:53', '2026-08-29 07:12:53'),
	(70, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 07:13:08', NULL, '2026-08-29 07:13:08'),
	(71, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 07:15:20', '2026-08-29 07:15:20'),
	(72, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 07:15:32', NULL, '2026-08-29 07:15:32'),
	(73, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 07:17:17', '2026-08-29 07:17:17'),
	(74, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 07:28:50', NULL, '2026-08-29 07:28:50'),
	(75, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 07:30:43', '2026-08-29 07:30:43'),
	(76, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 07:30:56', NULL, '2026-08-29 07:30:56'),
	(77, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 07:39:14', '2026-08-29 07:39:14'),
	(78, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 07:39:27', NULL, '2026-08-29 07:39:27'),
	(79, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 07:41:31', '2026-08-29 07:41:31'),
	(80, NULL, NULL, 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 07:41:32', '2026-08-29 07:41:32'),
	(81, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 07:41:51', NULL, '2026-08-29 07:41:51'),
	(82, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 08:27:41', '2026-08-29 08:27:41'),
	(83, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 08:28:03', NULL, '2026-08-29 08:28:03'),
	(84, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 08:47:02', '2026-08-29 08:47:02'),
	(85, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 08:47:26', NULL, '2026-08-29 08:47:26'),
	(86, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 08:49:00', '2026-08-29 08:49:00'),
	(87, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 08:49:16', NULL, '2026-08-29 08:49:16'),
	(88, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 08:50:30', '2026-08-29 08:50:30'),
	(89, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 08:52:59', NULL, '2026-08-29 08:52:59'),
	(90, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 09:00:53', '2026-08-29 09:00:53'),
	(91, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 09:01:10', NULL, '2026-08-29 09:01:10'),
	(92, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 09:03:21', '2026-08-29 09:03:21'),
	(93, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 09:03:59', NULL, '2026-08-29 09:03:59'),
	(94, 6, 'gitesh@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-08-29 09:49:59'),
	(95, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 09:50:19', '2026-08-29 09:50:19'),
	(96, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 09:50:29', NULL, '2026-08-29 09:50:29'),
	(97, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 09:51:58', '2026-08-29 09:51:58'),
	(98, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 09:52:26', NULL, '2026-08-29 09:52:26'),
	(99, 6, 'gitesh@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-08-29 09:54:02'),
	(100, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 09:54:34', '2026-08-29 09:54:34'),
	(101, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 09:54:52', NULL, '2026-08-29 09:54:52'),
	(102, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 10:08:53', '2026-08-29 10:08:53'),
	(103, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 10:09:17', NULL, '2026-08-29 10:09:17'),
	(104, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 10:16:47', '2026-08-29 10:16:47'),
	(105, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-29 10:17:00', NULL, '2026-08-29 10:17:00'),
	(106, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-29 10:18:35', '2026-08-29 10:18:35'),
	(107, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 04:56:42', NULL, '2026-08-31 04:56:42'),
	(108, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 04:57:11', '2026-08-31 04:57:11'),
	(109, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 04:57:23', NULL, '2026-08-31 04:57:23'),
	(110, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 04:57:50', '2026-08-31 04:57:50'),
	(111, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 05:13:20', NULL, '2026-08-31 05:13:20'),
	(112, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 06:30:17', '2026-08-31 06:30:17'),
	(113, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 06:30:41', NULL, '2026-08-31 06:30:41'),
	(114, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 06:32:14', '2026-08-31 06:32:14'),
	(115, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 06:32:26', NULL, '2026-08-31 06:32:26'),
	(116, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 07:01:12', '2026-08-31 07:01:12'),
	(117, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 07:01:37', NULL, '2026-08-31 07:01:37'),
	(118, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 07:07:01', '2026-08-31 07:07:01'),
	(119, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 07:07:27', NULL, '2026-08-31 07:07:27'),
	(120, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 07:09:02', '2026-08-31 07:09:02'),
	(121, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 07:09:14', NULL, '2026-08-31 07:09:14'),
	(122, 6, 'gitesh@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-08-31 07:09:39'),
	(123, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 10:14:13', '2026-08-31 10:14:13'),
	(124, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 10:14:34', NULL, '2026-08-31 10:14:34'),
	(125, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:24:51', '2026-08-31 11:24:51'),
	(126, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:25:17', NULL, '2026-08-31 11:25:17'),
	(127, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:26:51', '2026-08-31 11:26:51'),
	(128, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:27:01', NULL, '2026-08-31 11:27:01'),
	(129, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:27:42', '2026-08-31 11:27:42'),
	(130, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:27:56', NULL, '2026-08-31 11:27:56'),
	(131, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:29:56', '2026-08-31 11:29:56'),
	(132, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:30:08', NULL, '2026-08-31 11:30:08'),
	(133, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:31:37', '2026-08-31 11:31:37'),
	(134, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:32:01', NULL, '2026-08-31 11:32:01'),
	(135, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:37:14', '2026-08-31 11:37:14'),
	(136, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:37:41', NULL, '2026-08-31 11:37:41'),
	(137, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:46:10', '2026-08-31 11:46:10'),
	(138, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:47:24', NULL, '2026-08-31 11:47:24'),
	(139, 6, 'gitesh@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-08-31 11:49:41'),
	(140, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:53:30', '2026-08-31 11:53:30'),
	(141, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:53:49', NULL, '2026-08-31 11:53:49'),
	(142, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 11:54:10', '2026-08-31 11:54:10'),
	(143, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 11:55:03', NULL, '2026-08-31 11:55:03'),
	(144, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:07:58', '2026-08-31 12:07:58'),
	(145, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:08:22', NULL, '2026-08-31 12:08:22'),
	(146, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:08:40', '2026-08-31 12:08:40'),
	(147, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:08:58', NULL, '2026-08-31 12:08:58'),
	(148, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:09:35', '2026-08-31 12:09:35'),
	(149, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:13:18', NULL, '2026-08-31 12:13:18'),
	(150, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:13:47', '2026-08-31 12:13:47'),
	(151, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:14:07', NULL, '2026-08-31 12:14:07'),
	(152, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:15:46', '2026-08-31 12:15:46'),
	(153, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:16:00', NULL, '2026-08-31 12:16:00'),
	(154, 6, 'gitesh@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-08-31 12:16:24'),
	(155, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:16:32', '2026-08-31 12:16:32'),
	(156, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:16:51', NULL, '2026-08-31 12:16:51'),
	(157, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:41:07', '2026-08-31 12:41:07'),
	(158, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:41:47', NULL, '2026-08-31 12:41:47'),
	(159, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:43:32', '2026-08-31 12:43:32'),
	(160, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:43:49', NULL, '2026-08-31 12:43:49'),
	(161, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:45:10', '2026-08-31 12:45:10'),
	(162, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:45:23', NULL, '2026-08-31 12:45:23'),
	(163, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 12:57:20', '2026-08-31 12:57:20'),
	(164, 15, 'rkcsittd1234@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 12:57:42', NULL, '2026-08-31 12:57:42'),
	(165, 15, 'rkcsittd1234@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-08-31 12:59:24'),
	(166, 15, 'rkcsittd1234@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 13:00:53', '2026-08-31 13:00:53'),
	(167, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 13:01:06', NULL, '2026-08-31 13:01:06'),
	(168, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 13:07:29', '2026-08-31 13:07:29'),
	(169, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-08-31 13:12:18', NULL, '2026-08-31 13:12:18'),
	(170, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-08-31 13:13:26', '2026-08-31 13:13:26'),
	(171, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-09-01 04:51:13', NULL, '2026-09-01 04:51:13'),
	(172, 6, 'gitesh@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-09-01 04:55:47'),
	(173, 6, 'gitesh@gmail.com', 'PASSWORD', 'User changed password successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, NULL, '2026-09-01 04:56:27'),
	(174, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-09-01 04:56:35', '2026-09-01 04:56:35'),
	(175, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-09-01 04:56:48', NULL, '2026-09-01 04:56:48'),
	(176, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-09-01 04:56:53', '2026-09-01 04:56:53'),
	(177, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-09-01 05:19:23', NULL, '2026-09-01 05:19:23'),
	(178, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-09-01 05:35:21', '2026-09-01 05:35:21'),
	(179, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-09-01 05:35:39', NULL, '2026-09-01 05:35:39'),
	(180, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-09-01 05:36:36', NULL, '2026-09-01 05:36:36'),
	(181, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-09-01 13:13:31', '2026-09-01 13:13:31'),
	(182, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-09-02 04:41:05', NULL, '2026-09-02 04:41:05'),
	(183, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', NULL, '2026-09-02 05:34:46', '2026-09-02 05:34:46'),
	(184, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36', '2026-09-02 05:39:44', NULL, '2026-09-02 05:39:44'),
	(185, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-03 04:55:44', NULL, '2026-09-03 04:55:44'),
	(186, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-03 07:25:42', NULL, '2026-09-03 07:25:42'),
	(187, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-03 09:53:49', '2026-09-03 09:53:49'),
	(188, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-03 09:54:02', NULL, '2026-09-03 09:54:02'),
	(189, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-03 10:31:40', '2026-09-03 10:31:40'),
	(190, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-03 10:31:51', NULL, '2026-09-03 10:31:51'),
	(191, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-03 13:29:53', '2026-09-03 13:29:53'),
	(192, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-07 05:21:46', NULL, '2026-09-07 05:21:46'),
	(193, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-07 07:25:54', '2026-09-07 07:25:54'),
	(194, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-07 07:26:05', NULL, '2026-09-07 07:26:05'),
	(195, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-08 04:48:03', NULL, '2026-09-08 04:48:03'),
	(196, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-08 06:08:56', '2026-09-08 06:08:56'),
	(197, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-08 06:09:15', NULL, '2026-09-08 06:09:15'),
	(198, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-08 06:11:21', NULL, '2026-09-08 06:11:21'),
	(199, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-08 06:47:32', '2026-09-08 06:47:32'),
	(200, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-08 06:47:44', NULL, '2026-09-08 06:47:44'),
	(201, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-08 07:24:50', '2026-09-08 07:24:50'),
	(202, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-08 07:25:01', NULL, '2026-09-08 07:25:01'),
	(203, 7, 'rkcsid1234@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-08 11:49:48', NULL, '2026-09-08 11:49:48'),
	(204, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-08 11:51:00', NULL, '2026-09-08 11:51:00'),
	(205, 14, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-08 12:53:25', '2026-09-08 12:53:25'),
	(206, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-08 12:53:35', NULL, '2026-09-08 12:53:35'),
	(207, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 04:48:23', NULL, '2026-09-09 04:48:23'),
	(208, NULL, NULL, 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-09 06:56:52', '2026-09-09 06:56:52'),
	(209, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 06:57:02', NULL, '2026-09-09 06:57:02'),
	(210, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-09 09:07:45', '2026-09-09 09:07:45'),
	(211, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 09:07:53', NULL, '2026-09-09 09:07:53'),
	(212, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-09 10:22:12', '2026-09-09 10:22:12'),
	(213, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 10:27:59', NULL, '2026-09-09 10:27:59'),
	(214, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-09 12:29:04', '2026-09-09 12:29:04'),
	(215, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-09 12:29:54', NULL, '2026-09-09 12:29:54'),
	(216, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-10 05:55:25', NULL, '2026-09-10 05:55:25'),
	(217, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-10 09:08:37', '2026-09-10 09:08:37'),
	(218, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-10 09:08:54', NULL, '2026-09-10 09:08:54'),
	(219, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-10 09:08:58', '2026-09-10 09:08:58'),
	(220, 10, 'rkcsid123334@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-10 09:09:10', NULL, '2026-09-10 09:09:10'),
	(221, 10, 'rkcsid123334@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-10 09:11:20', '2026-09-10 09:11:20'),
	(222, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-10 09:11:29', NULL, '2026-09-10 09:11:29'),
	(223, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-10 11:36:18', NULL, '2026-09-10 11:36:18'),
	(224, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-14 04:47:39', NULL, '2026-09-14 04:47:39'),
	(225, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-16 06:58:49', NULL, '2026-09-16 06:58:49'),
	(226, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-16 07:29:22', '2026-09-16 07:29:22'),
	(227, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-16 11:09:11', NULL, '2026-09-16 11:09:11'),
	(228, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-16 11:57:02', '2026-09-16 11:57:02'),
	(229, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-16 11:57:20', NULL, '2026-09-16 11:57:20'),
	(230, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-16 12:51:54', '2026-09-16 12:51:54'),
	(231, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 05:01:16', NULL, '2026-09-17 05:01:16'),
	(232, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 06:18:43', '2026-09-17 06:18:43'),
	(233, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 06:19:15', NULL, '2026-09-17 06:19:15'),
	(234, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 06:54:30', '2026-09-17 06:54:30'),
	(235, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 15:42:31', NULL, '2026-09-17 15:42:31'),
	(236, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 15:42:34', '2026-09-17 15:42:34'),
	(237, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 15:43:26', NULL, '2026-09-17 15:43:26'),
	(238, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 15:43:31', '2026-09-17 15:43:31'),
	(239, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 16:41:03', NULL, '2026-09-17 16:41:03'),
	(240, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 16:41:06', '2026-09-17 16:41:06'),
	(241, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 16:45:28', NULL, '2026-09-17 16:45:28'),
	(242, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 16:45:31', '2026-09-17 16:45:31'),
	(243, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 16:47:19', NULL, '2026-09-17 16:47:19'),
	(244, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 16:47:22', '2026-09-17 16:47:22'),
	(245, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 16:51:06', NULL, '2026-09-17 16:51:06'),
	(246, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 16:51:21', '2026-09-17 16:51:21'),
	(247, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 16:56:14', NULL, '2026-09-17 16:56:14'),
	(248, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 16:56:29', '2026-09-17 16:56:29'),
	(249, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 17:47:03', NULL, '2026-09-17 17:47:03'),
	(250, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 17:47:06', '2026-09-17 17:47:06'),
	(251, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 17:49:39', NULL, '2026-09-17 17:49:39'),
	(252, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 17:52:02', '2026-09-17 17:52:02'),
	(253, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 18:04:09', NULL, '2026-09-17 18:04:09'),
	(254, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 18:18:42', NULL, '2026-09-17 18:18:42'),
	(255, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 18:18:46', '2026-09-17 18:18:46'),
	(256, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 18:19:02', NULL, '2026-09-17 18:19:02'),
	(257, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 18:19:05', '2026-09-17 18:19:05'),
	(258, 0, 'rohit@nic.in', 'LOGIN_FAILED', 'Invalid email or password.', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, NULL, '2026-09-17 18:22:56'),
	(259, 19, 'rohit@nic.in', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 18:23:26', NULL, '2026-09-17 18:23:26'),
	(260, 19, 'rohit@nic.in', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 18:23:34', '2026-09-17 18:23:34'),
	(261, 19, 'rohit@nic.in', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-17 18:24:07', NULL, '2026-09-17 18:24:07'),
	(262, 19, 'rohit@nic.in', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-17 18:24:11', '2026-09-17 18:24:11'),
	(263, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-18 10:20:01', NULL, '2026-09-18 10:20:01'),
	(264, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-18 10:20:05', '2026-09-18 10:20:05'),
	(265, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-18 10:21:06', NULL, '2026-09-18 10:21:06'),
	(266, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-18 11:02:45', NULL, '2026-09-18 11:02:45'),
	(267, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', NULL, '2026-09-18 12:35:14', '2026-09-18 12:35:14'),
	(268, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', '2026-09-18 12:35:25', NULL, '2026-09-18 12:35:25'),
	(269, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 11:05:40', NULL, '2026-09-21 11:05:40'),
	(270, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-21 11:12:10', '2026-09-21 11:12:10'),
	(271, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 11:12:20', NULL, '2026-09-21 11:12:20'),
	(272, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-21 11:13:44', '2026-09-21 11:13:44'),
	(273, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 11:14:06', NULL, '2026-09-21 11:14:06'),
	(274, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-21 12:36:51', '2026-09-21 12:36:51'),
	(275, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 12:37:03', NULL, '2026-09-21 12:37:03'),
	(276, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-21 12:41:45', '2026-09-21 12:41:45'),
	(277, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 12:41:56', NULL, '2026-09-21 12:41:56'),
	(278, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 15:18:54', NULL, '2026-09-21 15:18:54'),
	(279, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 15:51:26', NULL, '2026-09-21 15:51:26'),
	(280, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-21 15:54:12', '2026-09-21 15:54:12'),
	(281, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 15:54:22', NULL, '2026-09-21 15:54:22'),
	(282, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-21 16:50:25', '2026-09-21 16:50:25'),
	(283, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-21 16:50:36', NULL, '2026-09-21 16:50:36'),
	(284, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 10:56:03', NULL, '2026-09-22 10:56:03'),
	(285, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 12:04:33', '2026-09-22 12:04:33'),
	(286, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 12:21:11', NULL, '2026-09-22 12:21:11'),
	(287, 6, 'gitesh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 12:55:22', '2026-09-22 12:55:22'),
	(288, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 12:55:34', NULL, '2026-09-22 12:55:34'),
	(289, 6, 'gitesh@gmail.com', 'LOGIN', 'User logged in successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 14:39:55', NULL, '2026-09-22 14:39:55'),
	(290, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 14:44:18', '2026-09-22 14:44:18'),
	(291, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 15:03:10', NULL, '2026-09-22 15:03:10'),
	(292, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 15:08:28', '2026-09-22 15:08:28'),
	(293, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 15:28:03', NULL, '2026-09-22 15:28:03'),
	(294, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 15:30:20', '2026-09-22 15:30:20'),
	(295, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 15:33:02', NULL, '2026-09-22 15:33:02'),
	(296, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 16:56:15', '2026-09-22 16:56:15'),
	(297, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 16:57:01', NULL, '2026-09-22 16:57:01'),
	(298, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 17:02:08', '2026-09-22 17:02:08'),
	(299, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 17:07:35', NULL, '2026-09-22 17:07:35'),
	(300, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 17:10:47', '2026-09-22 17:10:47'),
	(301, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 17:16:53', NULL, '2026-09-22 17:16:53'),
	(302, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-22 17:30:01', '2026-09-22 17:30:01'),
	(303, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-22 17:47:32', NULL, '2026-09-22 17:47:32'),
	(304, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-24 12:08:55', NULL, '2026-09-24 12:08:55'),
	(305, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-24 14:16:53', '2026-09-24 14:16:53'),
	(306, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-24 14:43:32', NULL, '2026-09-24 14:43:32'),
	(307, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-25 11:33:59', NULL, '2026-09-25 11:33:59'),
	(308, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-25 11:34:07', '2026-09-25 11:34:07'),
	(309, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:25:40'),
	(310, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET', 'User successfully reset password via token link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:26:15'),
	(311, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:27:40'),
	(312, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:40:19'),
	(313, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET', 'User successfully reset password via token link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:40:54'),
	(314, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:41:13'),
	(315, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET', 'User successfully reset password via token link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:41:21'),
	(316, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:41:58'),
	(317, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET', 'User successfully reset password via token link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 12:43:05'),
	(318, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 14:46:05'),
	(319, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 16:43:10'),
	(320, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 16:44:35'),
	(321, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 16:47:39'),
	(322, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET', 'User successfully reset password via token link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 16:48:07'),
	(323, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-25 16:48:18', NULL, '2026-09-25 16:48:18'),
	(324, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-25 16:52:49', '2026-09-25 16:52:49'),
	(325, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 16:52:57'),
	(326, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 16:55:18'),
	(327, 7, 'distinctharsh@gmail.com', 'PASSWORD_RESET_REQUEST', 'Requested password reset link', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, NULL, '2026-09-25 16:58:53'),
	(328, 7, 'distinctharsh@gmail.com', 'LOGIN', 'User logged in via OTP', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', '2026-09-25 17:06:07', NULL, '2026-09-25 17:06:07'),
	(329, 7, 'distinctharsh@gmail.com', 'LOGOUT', 'User logged out successfully', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/153.0.0.0 Safari/537.36', NULL, '2026-09-25 17:08:52', '2026-09-25 17:08:52');

-- Dumping structure for table jams_db.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int unsigned NOT NULL,
  `city_name` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_state_city` (`state_id`,`city_name`),
  KEY `idx_city_state_id` (`state_id`),
  CONSTRAINT `fk_city_state` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=792 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.city: ~791 rows (approximately)
DELETE FROM `city`;
INSERT INTO `city` (`id`, `state_id`, `city_name`, `status`) VALUES
	(1, 1, 'Alluri Sitharama Raju', 1),
	(2, 1, 'Anakapalli', 1),
	(3, 1, 'Anantapur', 1),
	(4, 1, 'Annamayya', 1),
	(5, 1, 'Bapatla', 1),
	(6, 1, 'Chittoor', 1),
	(7, 1, 'Dr. B.R. Ambedkar Konaseema', 1),
	(8, 1, 'East Godavari', 1),
	(9, 1, 'Eluru', 1),
	(10, 1, 'Guntur', 1),
	(11, 1, 'Kakinada', 1),
	(12, 1, 'Krishna', 1),
	(13, 1, 'Kurnool', 1),
	(14, 1, 'Nandyal', 1),
	(15, 1, 'NTR', 1),
	(16, 1, 'Palnadu', 1),
	(17, 1, 'Parvathipuram Manyam', 1),
	(18, 1, 'Prakasam', 1),
	(19, 1, 'Sri Potti Sriramulu Nellore', 1),
	(20, 1, 'Sri Sathya Sai', 1),
	(21, 1, 'Srikakulam', 1),
	(22, 1, 'Tirupati', 1),
	(23, 1, 'Visakhapatnam', 1),
	(24, 1, 'Vizianagaram', 1),
	(25, 1, 'West Godavari', 1),
	(26, 1, 'YSR Kadapa', 1),
	(27, 2, 'Anjaw', 1),
	(28, 2, 'Bichom', 1),
	(29, 2, 'Changlang', 1),
	(30, 2, 'Dibang Valley', 1),
	(31, 2, 'East Kameng', 1),
	(32, 2, 'East Siang', 1),
	(33, 2, 'Itanagar', 1),
	(34, 2, 'Kamle', 1),
	(35, 2, 'Keyi Panyor', 1),
	(36, 2, 'Kra Daadi', 1),
	(37, 2, 'Kurung Kumey', 1),
	(38, 2, 'Lepa Rada', 1),
	(39, 2, 'Lohit', 1),
	(40, 2, 'Longding', 1),
	(41, 2, 'Lower Dibang Valley', 1),
	(42, 2, 'Lower Siang', 1),
	(43, 2, 'Lower Subansiri', 1),
	(44, 2, 'Namsai', 1),
	(45, 2, 'Pakke Kessang', 1),
	(46, 2, 'Papum Pare', 1),
	(47, 2, 'Shi Yomi', 1),
	(48, 2, 'Siang', 1),
	(49, 2, 'Tawang', 1),
	(50, 2, 'Tirap', 1),
	(51, 2, 'Upper Siang', 1),
	(52, 2, 'Upper Subansiri', 1),
	(53, 2, 'West Kameng', 1),
	(54, 2, 'West Siang', 1),
	(55, 3, 'Baksa', 1),
	(56, 3, 'Barpeta', 1),
	(57, 3, 'Biswanath', 1),
	(58, 3, 'Bongaigaon', 1),
	(59, 3, 'Cachar', 1),
	(60, 3, 'Charaideo', 1),
	(61, 3, 'Chirang', 1),
	(62, 3, 'Darrang', 1),
	(63, 3, 'Dhemaji', 1),
	(64, 3, 'Dhubri', 1),
	(65, 3, 'Dibrugarh', 1),
	(66, 3, 'Dima Hasao', 1),
	(67, 3, 'Goalpara', 1),
	(68, 3, 'Golaghat', 1),
	(69, 3, 'Hailakandi', 1),
	(70, 3, 'Hojai', 1),
	(71, 3, 'Jorhat', 1),
	(72, 3, 'Kamrup', 1),
	(73, 3, 'Kamrup Metropolitan', 1),
	(74, 3, 'Karbi Anglong', 1),
	(75, 3, 'Karimganj', 1),
	(76, 3, 'Kokrajhar', 1),
	(77, 3, 'Lakhimpur', 1),
	(78, 3, 'Majuli', 1),
	(79, 3, 'Morigaon', 1),
	(80, 3, 'Nagaon', 1),
	(81, 3, 'Nalbari', 1),
	(82, 3, 'Sivasagar', 1),
	(83, 3, 'Sonitpur', 1),
	(84, 3, 'South Salmara-Mankachar', 1),
	(85, 3, 'Tamulpur', 1),
	(86, 3, 'Tinsukia', 1),
	(87, 3, 'Udalguri', 1),
	(88, 3, 'West Karbi Anglong', 1),
	(89, 4, 'Araria', 1),
	(90, 4, 'Arwal', 1),
	(91, 4, 'Aurangabad', 1),
	(92, 4, 'Banka', 1),
	(93, 4, 'Begusarai', 1),
	(94, 4, 'Bhagalpur', 1),
	(95, 4, 'Bhojpur', 1),
	(96, 4, 'Buxar', 1),
	(97, 4, 'Darbhanga', 1),
	(98, 4, 'East Champaran', 1),
	(99, 4, 'Gaya', 1),
	(100, 4, 'Gopalganj', 1),
	(101, 4, 'Jamui', 1),
	(102, 4, 'Jehanabad', 1),
	(103, 4, 'Kaimur', 1),
	(104, 4, 'Katihar', 1),
	(105, 4, 'Khagaria', 1),
	(106, 4, 'Kishanganj', 1),
	(107, 4, 'Lakhisarai', 1),
	(108, 4, 'Madhepura', 1),
	(109, 4, 'Madhubani', 1),
	(110, 4, 'Munger', 1),
	(111, 4, 'Muzaffarpur', 1),
	(112, 4, 'Nalanda', 1),
	(113, 4, 'Nawada', 1),
	(114, 4, 'Patna', 1),
	(115, 4, 'Purnia', 1),
	(116, 4, 'Rohtas', 1),
	(117, 4, 'Saharsa', 1),
	(118, 4, 'Samastipur', 1),
	(119, 4, 'Saran', 1),
	(120, 4, 'Sheikhpura', 1),
	(121, 4, 'Sheohar', 1),
	(122, 4, 'Sitamarhi', 1),
	(123, 4, 'Siwan', 1),
	(124, 4, 'Supaul', 1),
	(125, 4, 'Vaishali', 1),
	(126, 4, 'West Champaran', 1),
	(127, 5, 'Balod', 1),
	(128, 5, 'Baloda Bazar', 1),
	(129, 5, 'Balrampur', 1),
	(130, 5, 'Bastar', 1),
	(131, 5, 'Bemetara', 1),
	(132, 5, 'Bijapur', 1),
	(133, 5, 'Bilaspur', 1),
	(134, 5, 'Dantewada', 1),
	(135, 5, 'Dhamtari', 1),
	(136, 5, 'Durg', 1),
	(137, 5, 'Gariaband', 1),
	(138, 5, 'Gaurela-Pendra-Marwahi', 1),
	(139, 5, 'Janjgir-Champa', 1),
	(140, 5, 'Jashpur', 1),
	(141, 5, 'Kabirdham', 1),
	(142, 5, 'Kanker', 1),
	(143, 5, 'Khairagarh-Chhuikhadan-Gandai', 1),
	(144, 5, 'Kondagaon', 1),
	(145, 5, 'Korba', 1),
	(146, 5, 'Korea', 1),
	(147, 5, 'Mahasamund', 1),
	(148, 5, 'Manendragarh-Chirmiri-Bharatpur', 1),
	(149, 5, 'Mohla-Manpur-Ambagarh Chowki', 1),
	(150, 5, 'Mungeli', 1),
	(151, 5, 'Narayanpur', 1),
	(152, 5, 'Raigarh', 1),
	(153, 5, 'Raipur', 1),
	(154, 5, 'Rajnandgaon', 1),
	(155, 5, 'Sakti', 1),
	(156, 5, 'Sarangarh-Bilaigarh', 1),
	(157, 5, 'Sukma', 1),
	(158, 5, 'Surajpur', 1),
	(159, 5, 'Surguja', 1),
	(160, 6, 'North Goa', 1),
	(161, 6, 'South Goa', 1),
	(162, 7, 'Ahmedabad', 1),
	(163, 7, 'Amreli', 1),
	(164, 7, 'Anand', 1),
	(165, 7, 'Aravalli', 1),
	(166, 7, 'Banaskantha', 1),
	(167, 7, 'Bharuch', 1),
	(168, 7, 'Bhavnagar', 1),
	(169, 7, 'Botad', 1),
	(170, 7, 'Chhota Udepur', 1),
	(171, 7, 'Dahod', 1),
	(172, 7, 'Dang', 1),
	(173, 7, 'Devbhoomi Dwarka', 1),
	(174, 7, 'Gandhinagar', 1),
	(175, 7, 'Gir Somnath', 1),
	(176, 7, 'Jamnagar', 1),
	(177, 7, 'Junagadh', 1),
	(178, 7, 'Kheda', 1),
	(179, 7, 'Kutch', 1),
	(180, 7, 'Mahisagar', 1),
	(181, 7, 'Mehsana', 1),
	(182, 7, 'Morbi', 1),
	(183, 7, 'Narmada', 1),
	(184, 7, 'Navsari', 1),
	(185, 7, 'Panchmahal', 1),
	(186, 7, 'Patan', 1),
	(187, 7, 'Porbandar', 1),
	(188, 7, 'Rajkot', 1),
	(189, 7, 'Sabarkantha', 1),
	(190, 7, 'Surat', 1),
	(191, 7, 'Surendranagar', 1),
	(192, 7, 'Tapi', 1),
	(193, 7, 'Vadodara', 1),
	(194, 7, 'Valsad', 1),
	(195, 8, 'Ambala', 1),
	(196, 8, 'Bhiwani', 1),
	(197, 8, 'Charkhi Dadri', 1),
	(198, 8, 'Faridabad', 1),
	(199, 8, 'Fatehabad', 1),
	(200, 8, 'Gurugram', 1),
	(201, 8, 'Hisar', 1),
	(202, 8, 'Jhajjar', 1),
	(203, 8, 'Jind', 1),
	(204, 8, 'Kaithal', 1),
	(205, 8, 'Karnal', 1),
	(206, 8, 'Kurukshetra', 1),
	(207, 8, 'Mahendragarh', 1),
	(208, 8, 'Nuh', 1),
	(209, 8, 'Palwal', 1),
	(210, 8, 'Panchkula', 1),
	(211, 8, 'Panipat', 1),
	(212, 8, 'Rewari', 1),
	(213, 8, 'Rohtak', 1),
	(214, 8, 'Sirsa', 1),
	(215, 8, 'Sonipat', 1),
	(216, 8, 'Yamunanagar', 1),
	(217, 9, 'Bilaspur', 1),
	(218, 9, 'Chamba', 1),
	(219, 9, 'Hamirpur', 1),
	(220, 9, 'Kangra', 1),
	(221, 9, 'Kinnaur', 1),
	(222, 9, 'Kullu', 1),
	(223, 9, 'Lahaul and Spiti', 1),
	(224, 9, 'Mandi', 1),
	(225, 9, 'Shimla', 1),
	(226, 9, 'Sirmaur', 1),
	(227, 9, 'Solan', 1),
	(228, 9, 'Una', 1),
	(229, 10, 'Bokaro', 1),
	(230, 10, 'Chatra', 1),
	(231, 10, 'Deoghar', 1),
	(232, 10, 'Dhanbad', 1),
	(233, 10, 'Dumka', 1),
	(234, 10, 'East Singhbhum', 1),
	(235, 10, 'Garhwa', 1),
	(236, 10, 'Giridih', 1),
	(237, 10, 'Godda', 1),
	(238, 10, 'Gumla', 1),
	(239, 10, 'Hazaribagh', 1),
	(240, 10, 'Jamtara', 1),
	(241, 10, 'Khunti', 1),
	(242, 10, 'Koderma', 1),
	(243, 10, 'Latehar', 1),
	(244, 10, 'Lohardaga', 1),
	(245, 10, 'Pakur', 1),
	(246, 10, 'Palamu', 1),
	(247, 10, 'Ramgarh', 1),
	(248, 10, 'Ranchi', 1),
	(249, 10, 'Sahebganj', 1),
	(250, 10, 'Seraikela Kharsawan', 1),
	(251, 10, 'Simdega', 1),
	(252, 10, 'West Singhbhum', 1),
	(253, 11, 'Bagalkot', 1),
	(254, 11, 'Ballari', 1),
	(255, 11, 'Belagavi', 1),
	(256, 11, 'Bengaluru Rural', 1),
	(257, 11, 'Bengaluru Urban', 1),
	(258, 11, 'Bidar', 1),
	(259, 11, 'Chamarajanagar', 1),
	(260, 11, 'Chikkaballapur', 1),
	(261, 11, 'Chikkamagaluru', 1),
	(262, 11, 'Chitradurga', 1),
	(263, 11, 'Dakshina Kannada', 1),
	(264, 11, 'Davanagere', 1),
	(265, 11, 'Dharwad', 1),
	(266, 11, 'Gadag', 1),
	(267, 11, 'Hassan', 1),
	(268, 11, 'Haveri', 1),
	(269, 11, 'Kalaburagi', 1),
	(270, 11, 'Kodagu', 1),
	(271, 11, 'Kolar', 1),
	(272, 11, 'Koppal', 1),
	(273, 11, 'Mandya', 1),
	(274, 11, 'Mysuru', 1),
	(275, 11, 'Raichur', 1),
	(276, 11, 'Ramanagara', 1),
	(277, 11, 'Shivamogga', 1),
	(278, 11, 'Tumakuru', 1),
	(279, 11, 'Udupi', 1),
	(280, 11, 'Uttara Kannada', 1),
	(281, 11, 'Vijayanagara', 1),
	(282, 11, 'Vijayapura', 1),
	(283, 11, 'Yadgir', 1),
	(284, 12, 'Alappuzha', 1),
	(285, 12, 'Ernakulam', 1),
	(286, 12, 'Idukki', 1),
	(287, 12, 'Kannur', 1),
	(288, 12, 'Kasaragod', 1),
	(289, 12, 'Kollam', 1),
	(290, 12, 'Kottayam', 1),
	(291, 12, 'Kozhikode', 1),
	(292, 12, 'Malappuram', 1),
	(293, 12, 'Palakkad', 1),
	(294, 12, 'Pathanamthitta', 1),
	(295, 12, 'Thiruvananthapuram', 1),
	(296, 12, 'Thrissur', 1),
	(297, 12, 'Wayanad', 1),
	(298, 13, 'Agar Malwa', 1),
	(299, 13, 'Alirajpur', 1),
	(300, 13, 'Anuppur', 1),
	(301, 13, 'Ashoknagar', 1),
	(302, 13, 'Balaghat', 1),
	(303, 13, 'Barwani', 1),
	(304, 13, 'Betul', 1),
	(305, 13, 'Bhind', 1),
	(306, 13, 'Bhopal', 1),
	(307, 13, 'Burhanpur', 1),
	(308, 13, 'Chhatarpur', 1),
	(309, 13, 'Chhindwara', 1),
	(310, 13, 'Damoh', 1),
	(311, 13, 'Datia', 1),
	(312, 13, 'Dewas', 1),
	(313, 13, 'Dhar', 1),
	(314, 13, 'Dindori', 1),
	(315, 13, 'Guna', 1),
	(316, 13, 'Gwalior', 1),
	(317, 13, 'Harda', 1),
	(318, 13, 'Indore', 1),
	(319, 13, 'Jabalpur', 1),
	(320, 13, 'Jhabua', 1),
	(321, 13, 'Katni', 1),
	(322, 13, 'Khandwa', 1),
	(323, 13, 'Khargone', 1),
	(324, 13, 'Maihar', 1),
	(325, 13, 'Mandla', 1),
	(326, 13, 'Mandsaur', 1),
	(327, 13, 'Mauganj', 1),
	(328, 13, 'Morena', 1),
	(329, 13, 'Narmadapuram', 1),
	(330, 13, 'Narsinghpur', 1),
	(331, 13, 'Neemuch', 1),
	(332, 13, 'Niwari', 1),
	(333, 13, 'Panna', 1),
	(334, 13, 'Raisen', 1),
	(335, 13, 'Rajgarh', 1),
	(336, 13, 'Ratlam', 1),
	(337, 13, 'Rewa', 1),
	(338, 13, 'Sagar', 1),
	(339, 13, 'Satna', 1),
	(340, 13, 'Sehore', 1),
	(341, 13, 'Seoni', 1),
	(342, 13, 'Shahdol', 1),
	(343, 13, 'Shajapur', 1),
	(344, 13, 'Sheopur', 1),
	(345, 13, 'Shivpuri', 1),
	(346, 13, 'Sidhi', 1),
	(347, 13, 'Singrauli', 1),
	(348, 13, 'Tikamgarh', 1),
	(349, 13, 'Ujjain', 1),
	(350, 13, 'Umaria', 1),
	(351, 13, 'Vidisha', 1),
	(352, 14, 'Ahmednagar', 1),
	(353, 14, 'Akola', 1),
	(354, 14, 'Amravati', 1),
	(355, 14, 'Aurangabad', 1),
	(356, 14, 'Beed', 1),
	(357, 14, 'Bhandara', 1),
	(358, 14, 'Buldhana', 1),
	(359, 14, 'Chandrapur', 1),
	(360, 14, 'Dhule', 1),
	(361, 14, 'Gadchiroli', 1),
	(362, 14, 'Gondia', 1),
	(363, 14, 'Hingoli', 1),
	(364, 14, 'Jalgaon', 1),
	(365, 14, 'Jalna', 1),
	(366, 14, 'Kolhapur', 1),
	(367, 14, 'Latur', 1),
	(368, 14, 'Mumbai City', 1),
	(369, 14, 'Mumbai Suburban', 1),
	(370, 14, 'Nagpur', 1),
	(371, 14, 'Nanded', 1),
	(372, 14, 'Nandurbar', 1),
	(373, 14, 'Nashik', 1),
	(374, 14, 'Osmanabad', 1),
	(375, 14, 'Palghar', 1),
	(376, 14, 'Parbhani', 1),
	(377, 14, 'Pune', 1),
	(378, 14, 'Raigad', 1),
	(379, 14, 'Ratnagiri', 1),
	(380, 14, 'Sangli', 1),
	(381, 14, 'Satara', 1),
	(382, 14, 'Sindhudurg', 1),
	(383, 14, 'Solapur', 1),
	(384, 14, 'Thane', 1),
	(385, 14, 'Wardha', 1),
	(386, 14, 'Washim', 1),
	(387, 14, 'Yavatmal', 1),
	(388, 15, 'Bishnupur', 1),
	(389, 15, 'Chandel', 1),
	(390, 15, 'Churachandpur', 1),
	(391, 15, 'Imphal East', 1),
	(392, 15, 'Imphal West', 1),
	(393, 15, 'Jiribam', 1),
	(394, 15, 'Kakching', 1),
	(395, 15, 'Kamjong', 1),
	(396, 15, 'Kangpokpi', 1),
	(397, 15, 'Noney', 1),
	(398, 15, 'Pherzawl', 1),
	(399, 15, 'Senapati', 1),
	(400, 15, 'Tamenglong', 1),
	(401, 15, 'Tengnoupal', 1),
	(402, 15, 'Thoubal', 1),
	(403, 15, 'Ukhrul', 1),
	(404, 16, 'East Garo Hills', 1),
	(405, 16, 'East Jaintia Hills', 1),
	(406, 16, 'East Khasi Hills', 1),
	(407, 16, 'Eastern West Khasi Hills', 1),
	(408, 16, 'North Garo Hills', 1),
	(409, 16, 'Ri Bhoi', 1),
	(410, 16, 'South Garo Hills', 1),
	(411, 16, 'South West Garo Hills', 1),
	(412, 16, 'South West Khasi Hills', 1),
	(413, 16, 'West Garo Hills', 1),
	(414, 16, 'West Jaintia Hills', 1),
	(415, 16, 'West Khasi Hills', 1),
	(416, 17, 'Aizawl', 1),
	(417, 17, 'Champhai', 1),
	(418, 17, 'Hnahthial', 1),
	(419, 17, 'Khawzawl', 1),
	(420, 17, 'Kolasib', 1),
	(421, 17, 'Lawngtlai', 1),
	(422, 17, 'Lunglei', 1),
	(423, 17, 'Mamit', 1),
	(424, 17, 'Saiha', 1),
	(425, 17, 'Saitual', 1),
	(426, 17, 'Serchhip', 1),
	(427, 18, 'Chumoukedima', 1),
	(428, 18, 'Dimapur', 1),
	(429, 18, 'Kiphire', 1),
	(430, 18, 'Kohima', 1),
	(431, 18, 'Longleng', 1),
	(432, 18, 'Mokokchung', 1),
	(433, 18, 'Mon', 1),
	(434, 18, 'Niuland', 1),
	(435, 18, 'Noklak', 1),
	(436, 18, 'Peren', 1),
	(437, 18, 'Phek', 1),
	(438, 18, 'Shamator', 1),
	(439, 18, 'Tuensang', 1),
	(440, 18, 'Tseminyu', 1),
	(441, 18, 'Wokha', 1),
	(442, 18, 'Zunheboto', 1),
	(443, 19, 'Angul', 1),
	(444, 19, 'Balangir', 1),
	(445, 19, 'Balasore', 1),
	(446, 19, 'Bargarh', 1),
	(447, 19, 'Bhadrak', 1),
	(448, 19, 'Boudh', 1),
	(449, 19, 'Cuttack', 1),
	(450, 19, 'Deogarh', 1),
	(451, 19, 'Dhenkanal', 1),
	(452, 19, 'Gajapati', 1),
	(453, 19, 'Ganjam', 1),
	(454, 19, 'Jagatsinghpur', 1),
	(455, 19, 'Jajpur', 1),
	(456, 19, 'Jharsuguda', 1),
	(457, 19, 'Kalahandi', 1),
	(458, 19, 'Kandhamal', 1),
	(459, 19, 'Kendrapara', 1),
	(460, 19, 'Kendujhar', 1),
	(461, 19, 'Khordha', 1),
	(462, 19, 'Koraput', 1),
	(463, 19, 'Malkangiri', 1),
	(464, 19, 'Mayurbhanj', 1),
	(465, 19, 'Nabarangpur', 1),
	(466, 19, 'Nayagarh', 1),
	(467, 19, 'Nuapada', 1),
	(468, 19, 'Puri', 1),
	(469, 19, 'Rayagada', 1),
	(470, 19, 'Sambalpur', 1),
	(471, 19, 'Subarnapur', 1),
	(472, 19, 'Sundargarh', 1),
	(473, 20, 'Amritsar', 1),
	(474, 20, 'Barnala', 1),
	(475, 20, 'Bathinda', 1),
	(476, 20, 'Faridkot', 1),
	(477, 20, 'Fatehgarh Sahib', 1),
	(478, 20, 'Fazilka', 1),
	(479, 20, 'Ferozepur', 1),
	(480, 20, 'Gurdaspur', 1),
	(481, 20, 'Hoshiarpur', 1),
	(482, 20, 'Jalandhar', 1),
	(483, 20, 'Kapurthala', 1),
	(484, 20, 'Ludhiana', 1),
	(485, 20, 'Malerkotla', 1),
	(486, 20, 'Mansa', 1),
	(487, 20, 'Moga', 1),
	(488, 20, 'Pathankot', 1),
	(489, 20, 'Patiala', 1),
	(490, 20, 'Rupnagar', 1),
	(491, 20, 'Sahibzada Ajit Singh Nagar', 1),
	(492, 20, 'Sangrur', 1),
	(493, 20, 'Shahid Bhagat Singh Nagar', 1),
	(494, 20, 'Sri Muktsar Sahib', 1),
	(495, 20, 'Tarn Taran', 1),
	(496, 21, 'Ajmer', 1),
	(497, 21, 'Alwar', 1),
	(498, 21, 'Anupgarh', 1),
	(499, 21, 'Balotra', 1),
	(500, 21, 'Banswara', 1),
	(501, 21, 'Baran', 1),
	(502, 21, 'Barmer', 1),
	(503, 21, 'Beawar', 1),
	(504, 21, 'Bharatpur', 1),
	(505, 21, 'Bhilwara', 1),
	(506, 21, 'Bikaner', 1),
	(507, 21, 'Bundi', 1),
	(508, 21, 'Chittorgarh', 1),
	(509, 21, 'Churu', 1),
	(510, 21, 'Dausa', 1),
	(511, 21, 'Deeg', 1),
	(512, 21, 'Dholpur', 1),
	(513, 21, 'Didwana-Kuchamana', 1),
	(514, 21, 'Dudu', 1),
	(515, 21, 'Dungarpur', 1),
	(516, 21, 'Ganganagar', 1),
	(517, 21, 'Gangapur City', 1),
	(518, 21, 'Hanumangarh', 1),
	(519, 21, 'Jaipur', 1),
	(520, 21, 'Jaisalmer', 1),
	(521, 21, 'Jalore', 1),
	(522, 21, 'Jhalawar', 1),
	(523, 21, 'Jhunjhunu', 1),
	(524, 21, 'Jodhpur', 1),
	(525, 21, 'Karauli', 1),
	(526, 21, 'Kekri', 1),
	(527, 21, 'Khairthal-Tijara', 1),
	(528, 21, 'Kota', 1),
	(529, 21, 'Kotputli-Behror', 1),
	(530, 21, 'Nagaur', 1),
	(531, 21, 'Neem Ka Thana', 1),
	(532, 21, 'Pali', 1),
	(533, 21, 'Phalodi', 1),
	(534, 21, 'Pratapgarh', 1),
	(535, 21, 'Rajsamand', 1),
	(536, 21, 'Salumbar', 1),
	(537, 21, 'Sawai Madhopur', 1),
	(538, 21, 'Shahpura', 1),
	(539, 21, 'Sikar', 1),
	(540, 21, 'Sirohi', 1),
	(541, 21, 'Tonk', 1),
	(542, 21, 'Udaipur', 1),
	(543, 22, 'Gangtok', 1),
	(544, 22, 'Gyalshing', 1),
	(545, 22, 'Mangan', 1),
	(546, 22, 'Namchi', 1),
	(547, 22, 'Pakyong', 1),
	(548, 22, 'Soreng', 1),
	(549, 23, 'Ariyalur', 1),
	(550, 23, 'Chengalpattu', 1),
	(551, 23, 'Chennai', 1),
	(552, 23, 'Coimbatore', 1),
	(553, 23, 'Cuddalore', 1),
	(554, 23, 'Dharmapuri', 1),
	(555, 23, 'Dindigul', 1),
	(556, 23, 'Erode', 1),
	(557, 23, 'Kallakurichi', 1),
	(558, 23, 'Kanchipuram', 1),
	(559, 23, 'Kanniyakumari', 1),
	(560, 23, 'Karur', 1),
	(561, 23, 'Krishnagiri', 1),
	(562, 23, 'Madurai', 1),
	(563, 23, 'Mayiladuthurai', 1),
	(564, 23, 'Nagapattinam', 1),
	(565, 23, 'Namakkal', 1),
	(566, 23, 'Perambalur', 1),
	(567, 23, 'Pudukkottai', 1),
	(568, 23, 'Ramanathapuram', 1),
	(569, 23, 'Ranipet', 1),
	(570, 23, 'Salem', 1),
	(571, 23, 'Sivaganga', 1),
	(572, 23, 'Tenkasi', 1),
	(573, 23, 'Thanjavur', 1),
	(574, 23, 'Theni', 1),
	(575, 23, 'Thoothukudi', 1),
	(576, 23, 'Tiruchirappalli', 1),
	(577, 23, 'Tirunelveli', 1),
	(578, 23, 'Tirupathur', 1),
	(579, 23, 'Tiruppur', 1),
	(580, 23, 'Tiruvallur', 1),
	(581, 23, 'Tiruvannamalai', 1),
	(582, 23, 'Tiruvarur', 1),
	(583, 23, 'Vellore', 1),
	(584, 23, 'Viluppuram', 1),
	(585, 23, 'Virudhunagar', 1),
	(586, 24, 'Adilabad', 1),
	(587, 24, 'Bhadradri Kothagudem', 1),
	(588, 24, 'Hanamkonda', 1),
	(589, 24, 'Hyderabad', 1),
	(590, 24, 'Jagtial', 1),
	(591, 24, 'Jangaon', 1),
	(592, 24, 'Jayashankar Bhupalpally', 1),
	(593, 24, 'Jogulamba Gadwal', 1),
	(594, 24, 'Kamareddy', 1),
	(595, 24, 'Karimnagar', 1),
	(596, 24, 'Khammam', 1),
	(597, 24, 'Komaram Bheem', 1),
	(598, 24, 'Mahabubabad', 1),
	(599, 24, 'Mahbubnagar', 1),
	(600, 24, 'Mancherial', 1),
	(601, 24, 'Medak', 1),
	(602, 24, 'Medchal-Malkajgiri', 1),
	(603, 24, 'Mulugu', 1),
	(604, 24, 'Nagarkurnool', 1),
	(605, 24, 'Nalgonda', 1),
	(606, 24, 'Narayanpet', 1),
	(607, 24, 'Nirmal', 1),
	(608, 24, 'Nizamabad', 1),
	(609, 24, 'Peddapalli', 1),
	(610, 24, 'Rajanna Sircilla', 1),
	(611, 24, 'Rangareddy', 1),
	(612, 24, 'Sangareddy', 1),
	(613, 24, 'Siddipet', 1),
	(614, 24, 'Suryapet', 1),
	(615, 24, 'Vikarabad', 1),
	(616, 24, 'Wanaparthy', 1),
	(617, 24, 'Warangal', 1),
	(618, 24, 'Yadadri Bhuvanagiri', 1),
	(619, 25, 'Dhalai', 1),
	(620, 25, 'Gomati', 1),
	(621, 25, 'Khowai', 1),
	(622, 25, 'North Tripura', 1),
	(623, 25, 'Sepahijala', 1),
	(624, 25, 'South Tripura', 1),
	(625, 25, 'Unakoti', 1),
	(626, 25, 'West Tripura', 1),
	(627, 26, 'Agra', 1),
	(628, 26, 'Aligarh', 1),
	(629, 26, 'Ambedkar Nagar', 1),
	(630, 26, 'Amethi', 1),
	(631, 26, 'Amroha', 1),
	(632, 26, 'Auraiya', 1),
	(633, 26, 'Ayodhya', 1),
	(634, 26, 'Azamgarh', 1),
	(635, 26, 'Baghpat', 1),
	(636, 26, 'Bahraich', 1),
	(637, 26, 'Ballia', 1),
	(638, 26, 'Balrampur', 1),
	(639, 26, 'Banda', 1),
	(640, 26, 'Barabanki', 1),
	(641, 26, 'Bareilly', 1),
	(642, 26, 'Basti', 1),
	(643, 26, 'Bhadohi', 1),
	(644, 26, 'Bijnor', 1),
	(645, 26, 'Budaun', 1),
	(646, 26, 'Bulandshahr', 1),
	(647, 26, 'Chandauli', 1),
	(648, 26, 'Chitrakoot', 1),
	(649, 26, 'Deoria', 1),
	(650, 26, 'Etah', 1),
	(651, 26, 'Etawah', 1),
	(652, 26, 'Farrukhabad', 1),
	(653, 26, 'Fatehpur', 1),
	(654, 26, 'Firozabad', 1),
	(655, 26, 'Gautam Buddha Nagar', 1),
	(656, 26, 'Ghaziabad', 1),
	(657, 26, 'Ghazipur', 1),
	(658, 26, 'Gonda', 1),
	(659, 26, 'Gorakhpur', 1),
	(660, 26, 'Hamirpur', 1),
	(661, 26, 'Hapur', 1),
	(662, 26, 'Hardoi', 1),
	(663, 26, 'Hathras', 1),
	(664, 26, 'Jalaun', 1),
	(665, 26, 'Jaunpur', 1),
	(666, 26, 'Jhansi', 1),
	(667, 26, 'Kannauj', 1),
	(668, 26, 'Kanpur Dehat', 1),
	(669, 26, 'Kanpur Nagar', 1),
	(670, 26, 'Kasganj', 1),
	(671, 26, 'Kaushambi', 1),
	(672, 26, 'Kushinagar', 1),
	(673, 26, 'Lakhimpur Kheri', 1),
	(674, 26, 'Lalitpur', 1),
	(675, 26, 'Lucknow', 1),
	(676, 26, 'Maharajganj', 1),
	(677, 26, 'Mahoba', 1),
	(678, 26, 'Mainpuri', 1),
	(679, 26, 'Mathura', 1),
	(680, 26, 'Mau', 1),
	(681, 26, 'Meerut', 1),
	(682, 26, 'Mirzapur', 1),
	(683, 26, 'Moradabad', 1),
	(684, 26, 'Muzaffarnagar', 1),
	(685, 26, 'Pilibhit', 1),
	(686, 26, 'Pratapgarh', 1),
	(687, 26, 'Prayagraj', 1),
	(688, 26, 'Raebareli', 1),
	(689, 26, 'Rampur', 1),
	(690, 26, 'Saharanpur', 1),
	(691, 26, 'Sambhal', 1),
	(692, 26, 'Sant Kabir Nagar', 1),
	(693, 26, 'Shahjahanpur', 1),
	(694, 26, 'Shamli', 1),
	(695, 26, 'Shravasti', 1),
	(696, 26, 'Siddharthnagar', 1),
	(697, 26, 'Sitapur', 1),
	(698, 26, 'Sonbhadra', 1),
	(699, 26, 'Sultanpur', 1),
	(700, 26, 'Unnao', 1),
	(701, 26, 'Varanasi', 1),
	(702, 27, 'Almora', 1),
	(703, 27, 'Bageshwar', 1),
	(704, 27, 'Chamoli', 1),
	(705, 27, 'Champawat', 1),
	(706, 27, 'Dehradun', 1),
	(707, 27, 'Haridwar', 1),
	(708, 27, 'Nainital', 1),
	(709, 27, 'Pauri Garhwal', 1),
	(710, 27, 'Pithoragarh', 1),
	(711, 27, 'Rudraprayag', 1),
	(712, 27, 'Tehri Garhwal', 1),
	(713, 27, 'Udham Singh Nagar', 1),
	(714, 27, 'Uttarkashi', 1),
	(715, 28, 'Alipurduar', 1),
	(716, 28, 'Bankura', 1),
	(717, 28, 'Birbhum', 1),
	(718, 28, 'Cooch Behar', 1),
	(719, 28, 'Dakshin Dinajpur', 1),
	(720, 28, 'Darjeeling', 1),
	(721, 28, 'Hooghly', 1),
	(722, 28, 'Howrah', 1),
	(723, 28, 'Jalpaiguri', 1),
	(724, 28, 'Jhargram', 1),
	(725, 28, 'Kalimpong', 1),
	(726, 28, 'Kolkata', 1),
	(727, 28, 'Malda', 1),
	(728, 28, 'Murshidabad', 1),
	(729, 28, 'Nadia', 1),
	(730, 28, 'North 24 Parganas', 1),
	(731, 28, 'Paschim Bardhaman', 1),
	(732, 28, 'Paschim Medinipur', 1),
	(733, 28, 'Purba Bardhaman', 1),
	(734, 28, 'Purba Medinipur', 1),
	(735, 28, 'Purulia', 1),
	(736, 28, 'South 24 Parganas', 1),
	(737, 28, 'Uttar Dinajpur', 1),
	(738, 29, 'Nicobar', 1),
	(739, 29, 'North and Middle Andaman', 1),
	(740, 29, 'South Andaman', 1),
	(741, 30, 'Chandigarh', 1),
	(742, 31, 'Dadra and Nagar Haveli', 1),
	(743, 31, 'Daman', 1),
	(744, 31, 'Diu', 1),
	(745, 32, 'Central Delhi', 1),
	(746, 32, 'East Delhi', 1),
	(747, 32, 'New Delhi', 1),
	(748, 32, 'North Delhi', 1),
	(749, 32, 'North East Delhi', 1),
	(750, 32, 'North West Delhi', 1),
	(751, 32, 'Shahdara', 1),
	(752, 32, 'South Delhi', 1),
	(753, 32, 'South East Delhi', 1),
	(754, 32, 'South West Delhi', 1),
	(755, 32, 'West Delhi', 1),
	(756, 33, 'Anantnag', 1),
	(757, 33, 'Bandipora', 1),
	(758, 33, 'Baramulla', 1),
	(759, 33, 'Budgam', 1),
	(760, 33, 'Doda', 1),
	(761, 33, 'Ganderbal', 1),
	(762, 33, 'Jammu', 1),
	(763, 33, 'Kathua', 1),
	(764, 33, 'Kishtwar', 1),
	(765, 33, 'Kulgam', 1),
	(766, 33, 'Kupwara', 1),
	(767, 33, 'Poonch', 1),
	(768, 33, 'Pulwama', 1),
	(769, 33, 'Rajouri', 1),
	(770, 33, 'Ramban', 1),
	(771, 33, 'Reasi', 1),
	(772, 33, 'Samba', 1),
	(773, 33, 'Shopian', 1),
	(774, 33, 'Srinagar', 1),
	(775, 33, 'Udhampur', 1),
	(776, 34, 'Kargil', 1),
	(777, 34, 'Leh', 1),
	(778, 35, 'Agatti', 1),
	(779, 35, 'Amini', 1),
	(780, 35, 'Andrott', 1),
	(781, 35, 'Bitra', 1),
	(782, 35, 'Chetlat', 1),
	(783, 35, 'Kavaratti', 1),
	(784, 35, 'Kalpeni', 1),
	(785, 35, 'Kadmat', 1),
	(786, 35, 'Kiltan', 1),
	(787, 35, 'Minicoy', 1),
	(788, 36, 'Karaikal', 1),
	(789, 36, 'Mahe', 1),
	(790, 36, 'Puducherry', 1),
	(791, 36, 'Yanam', 1);

-- Dumping structure for procedure jams_db.generate_application_no
DELIMITER //
CREATE PROCEDURE `generate_application_no`(
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

END//
DELIMITER ;

-- Dumping structure for table jams_db.mas_application_action
CREATE TABLE IF NOT EXISTS `mas_application_action` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_application_action: ~15 rows (approximately)
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
	(14, 'REJECTED'),
	(15, 'Saved_AS_DRAFT');

-- Dumping structure for table jams_db.mas_designation
CREATE TABLE IF NOT EXISTS `mas_designation` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table jams_db.mas_designation: ~0 rows (approximately)
DELETE FROM `mas_designation`;

-- Dumping structure for table jams_db.mas_model
CREATE TABLE IF NOT EXISTS `mas_model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `vendor_id` int NOT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_model: ~7 rows (approximately)
DELETE FROM `mas_model`;
INSERT INTO `mas_model` (`id`, `name`, `vendor_id`, `isactive`) VALUES
	(1, 'BSS-JX 400 (Multi-band)', 1, 1),
	(2, 'NDE Sentinel 5G', 2, 1),
	(3, 'Shakti SJ-2100', 7, 1),
	(4, 'Indus RF Guard Pro', 8, 1),
	(5, 'SAT-Mode', 1, 1),
	(6, 'Shaker-model', 2, 1),
	(7, 'JAM_MOD-2', 8, 1);

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

-- Dumping data for table jams_db.mas_organization: ~12 rows (approximately)
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

-- Dumping data for table jams_db.mas_organization_type: ~7 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_role: ~9 rows (approximately)
DELETE FROM `mas_role`;
INSERT INTO `mas_role` (`id`, `name`, `code`, `isactive`) VALUES
	(1, 'Organization User', 'ORG_USER', 1),
	(2, 'Dealing Hand', 'DEALING_HAND', 1),
	(3, 'Section Officer', 'SO', 1),
	(4, 'Under Secretary', 'US', 1),
	(5, 'Joint Secretary', 'JS', 1),
	(6, 'Secretary', 'SECRETARY', 1),
	(7, 'Administrator', 'ADMIN', 1),
	(8, 'Report View Only', 'REPORT_VIEW', 1),
	(9, 'System Admin', 'SYSTEM_ADMIN', 1);

-- Dumping structure for table jams_db.mas_settings
CREATE TABLE IF NOT EXISTS `mas_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `desc` varchar(500) NOT NULL,
  `value` varchar(500) DEFAULT NULL,
  `isactive` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_settings: ~2 rows (approximately)
DELETE FROM `mas_settings`;
INSERT INTO `mas_settings` (`id`, `desc`, `value`, `isactive`) VALUES
	(1, 'Default Password', 'jams@2026', 1),
	(2, 'Default application Landing User', '10', 1),
	(3, 'Permission Letter Generation', '7', 1);

-- Dumping structure for table jams_db.mas_vendor
CREATE TABLE IF NOT EXISTS `mas_vendor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(250) NOT NULL,
  `isactive` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.mas_vendor: ~4 rows (approximately)
DELETE FROM `mas_vendor`;
INSERT INTO `mas_vendor` (`id`, `vendor_name`, `isactive`) VALUES
	(1, 'Bharat Secure Systems Pvt. Ltd', '1'),
	(2, 'Netra Defence Electronics', '1'),
	(7, 'Shakti Communication Works', '1'),
	(8, 'Indus RF Technologies', '1');

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

-- Dumping structure for table jams_db.organization_monthly_counter
CREATE TABLE IF NOT EXISTS `organization_monthly_counter` (
  `organization_id` int NOT NULL,
  `year_month_counter` char(6) NOT NULL,
  `last_count` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`organization_id`,`year_month_counter`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.organization_monthly_counter: ~5 rows (approximately)
DELETE FROM `organization_monthly_counter`;
INSERT INTO `organization_monthly_counter` (`organization_id`, `year_month_counter`, `last_count`) VALUES
	(1, '202609', 1),
	(2, '202609', 65),
	(3, '202609', 3),
	(4, '202609', 3),
	(7, '202609', 4),
	(8, '202609', 1),
	(12, '202609', 5);

-- Dumping structure for table jams_db.reg_daily_counter
CREATE TABLE IF NOT EXISTS `reg_daily_counter` (
  `request_date` date NOT NULL,
  `request_no` int NOT NULL,
  PRIMARY KEY (`request_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.reg_daily_counter: ~8 rows (approximately)
DELETE FROM `reg_daily_counter`;
INSERT INTO `reg_daily_counter` (`request_date`, `request_no`) VALUES
	('2026-08-21', 3),
	('2026-08-22', 7),
	('2026-08-24', 4),
	('2026-08-27', 2),
	('2026-08-28', 19),
	('2026-08-29', 1),
	('2026-08-31', 2),
	('2026-09-09', 3),
	('2026-09-17', 2),
	('2026-09-18', 2),
	('2026-09-22', 8),
	('2026-09-25', 1);

-- Dumping structure for procedure jams_db.register_user
DELIMITER //
CREATE PROCEDURE `register_user`(
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

END//
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.registration: ~1 rows (approximately)
DELETE FROM `registration`;
INSERT INTO `registration` (`id`, `reg_no`, `name`, `email`, `mobile_no`, `organization_id`, `org_type`, `designation`, `ugc_id`, `auth_link`, `auth_link_generated_at`, `isactive_authlink`, `authorization_letter`) VALUES
	(114, 'REG/20260925/0', 'Harsh Singh', 'distincthar212sh@gmail.com', '7840091293', 2, 1, NULL, NULL, 'http://localhost:8080/auth/authorization?token=eyJyZWdfaWQiOjExNCwiZXhwaXJlcyI6MTc5MDU3ODcxM30.b6638b900f2758509f873c278324f636905c0a208df2e60b04810d11690eb020', '2026-09-25 12:28:33', 1, NULL);

-- Dumping structure for table jams_db.registration_history
CREATE TABLE IF NOT EXISTS `registration_history` (
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
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.registration_history: ~1 rows (approximately)
DELETE FROM `registration_history`;
INSERT INTO `registration_history` (`id`, `reg_id`, `status`, `performed_by`, `created_at`, `remarks`) VALUES
	(183, 114, 1, NULL, '2026-09-25 12:28:33', NULL);

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

-- Dumping data for table jams_db.requests: ~0 rows (approximately)
DELETE FROM `requests`;

-- Dumping structure for table jams_db.state
CREATE TABLE IF NOT EXISTS `state` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `state_name` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_state_name` (`state_name`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.state: ~36 rows (approximately)
DELETE FROM `state`;
INSERT INTO `state` (`id`, `state_name`, `status`) VALUES
	(1, 'Andhra Pradesh', 1),
	(2, 'Arunachal Pradesh', 1),
	(3, 'Assam', 1),
	(4, 'Bihar', 1),
	(5, 'Chhattisgarh', 1),
	(6, 'Goa', 1),
	(7, 'Gujarat', 1),
	(8, 'Haryana', 1),
	(9, 'Himachal Pradesh', 1),
	(10, 'Jharkhand', 1),
	(11, 'Karnataka', 1),
	(12, 'Kerala', 1),
	(13, 'Madhya Pradesh', 1),
	(14, 'Maharashtra', 1),
	(15, 'Manipur', 1),
	(16, 'Meghalaya', 1),
	(17, 'Mizoram', 1),
	(18, 'Nagaland', 1),
	(19, 'Odisha', 1),
	(20, 'Punjab', 1),
	(21, 'Rajasthan', 1),
	(22, 'Sikkim', 1),
	(23, 'Tamil Nadu', 1),
	(24, 'Telangana', 1),
	(25, 'Tripura', 1),
	(26, 'Uttar Pradesh', 1),
	(27, 'Uttarakhand', 1),
	(28, 'West Bengal', 1),
	(29, 'Andaman and Nicobar Islands', 1),
	(30, 'Chandigarh', 1),
	(31, 'Dadra and Nagar Haveli and Daman and Diu', 1),
	(32, 'Delhi', 1),
	(33, 'Jammu and Kashmir', 1),
	(34, 'Ladakh', 1),
	(35, 'Lakshadweep', 1),
	(36, 'Puducherry', 1);

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
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `mfa_required` tinyint(1) NOT NULL DEFAULT '1',
  `salt` varchar(500) DEFAULT NULL,
  `hash` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `ugc_id` varchar(45) DEFAULT NULL,
  `password_reset_req` int NOT NULL DEFAULT '1',
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `org_idx` (`organization_id`),
  KEY `org_type_idx` (`org_type`),
  CONSTRAINT `org_type_user` FOREIGN KEY (`org_type`) REFERENCES `mas_organization_type` (`id`),
  CONSTRAINT `org_user` FOREIGN KEY (`organization_id`) REFERENCES `mas_organization` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.user: ~4 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`id`, `name`, `email`, `mobile_no`, `organization_id`, `org_type`, `designation`, `authorization_letter`, `isactive`, `is_locked`, `mfa_required`, `salt`, `hash`, `created_at`, `ugc_id`, `password_reset_req`, `reset_token`, `reset_expires_at`) VALUES
	(6, 'Rohit Kumar', 'rohi1t@nic.in', '7840091293', 2, 2, 'Software Develeoper', '1787307397_f2eac820031ab0171d96.pdf', 1, 0, 0, NULL, '$2y$10$FG0XWRYDD5LFPe/Tozg56ullNqDsJvbutIuvtLWeUF0M1vBblCO..', '2026-08-21 15:50:09', 'PMO', 0, NULL, NULL),
	(7, 'Harsh', 'distinctharsh@gmail.com', '91784009129', 2, 2, 'Scientist C (DD)', '1787553827_1a68d90c3bf0b71f2a60.pdf', 1, 0, 1, NULL, '$2y$10$cRIUBZd9Fs1kiTLjWPPksuL67Hb802JasU08rQaMSb76gTrprsk9O', '2026-08-24 12:14:07', 'PMO', 0, 'dc8c83e505853ad0aea7d23a3a19d3adca263669e71c8120d8ec28bd76eb685e', '2026-09-25 17:58:53'),
	(19, 'Gitesh Srivastava', 'gitesh@gmail.com', '7840091293', 3, 3, 'DD', NULL, 1, 0, 0, NULL, '$2y$10$uZyo00YZJIeQ0ypOKZRK1uJUCKjWwvxlcvPC0VEN9eHKFit0VDLBW', '2026-09-17 18:22:25', '1234', 1, NULL, NULL),
	(20, 'Mohan', 'mohan@nic.in', '78400912831', 4, 6, 'dsds', NULL, 1, 0, 1, NULL, '$2y$10$.uY1ZyoluKrUtxlL05MQz.NkeYsTIJRlxti8euhcs/IsRcl71w6H6', '2026-09-18 11:14:18', '', 1, NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.user_authorization: ~32 rows (approximately)
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
	(37, 65, 'Harsh Singh', 'distinctharsh22@gmail.com', '7840091293', NULL, 'RRB', 'Autonomous Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-18 06:40:49', '2026-08-18 06:40:49'),
	(38, 66, 'Harsh Singh', 'distinctharsh25@gmail.com', '7840091293', NULL, 'NTA', 'Statuary Body', '', NULL, 0, NULL, NULL, NULL, '2026-08-19 05:40:32', '2026-08-19 05:40:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table jams_db.user_role_mapping: ~26 rows (approximately)
DELETE FROM `user_role_mapping`;
INSERT INTO `user_role_mapping` (`id`, `user_id`, `role_id`, `isactive`) VALUES
	(111, 7, 1, 1),
	(112, 7, 2, 1),
	(113, 7, 3, 1),
	(114, 7, 4, 1),
	(115, 7, 5, 1),
	(116, 7, 6, 1),
	(117, 7, 7, 1),
	(118, 7, 8, 1),
	(119, 7, 9, 1),
	(128, 6, 2, 1),
	(129, 6, 3, 1),
	(130, 6, 4, 1),
	(131, 6, 5, 1),
	(132, 6, 7, 1),
	(133, 6, 8, 1),
	(134, 6, 9, 1),
	(135, 19, 1, 1),
	(136, 19, 2, 1),
	(137, 19, 3, 1),
	(138, 19, 4, 1),
	(139, 19, 5, 1),
	(140, 19, 6, 1),
	(141, 19, 7, 1),
	(142, 19, 8, 1),
	(143, 19, 9, 1),
	(144, 20, 3, 1);

-- Dumping structure for view jams_db.vw_application_latest_status
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_application_latest_status` (
	`application_id` INT NOT NULL,
	`id` INT NOT NULL,
	`app_no` VARCHAR(1) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`user_id` INT NOT NULL,
	`adequate_arrangement_check` INT NOT NULL,
	`jammer_accounted` INT NOT NULL,
	`non_intereference` INT NOT NULL,
	`created_at` DATETIME NULL,
	`isactive` INT NOT NULL,
	`is_single_exam` INT NOT NULL,
	`is_single_date` INT NOT NULL,
	`centre_list_ready` INT NOT NULL,
	`undertaking` VARCHAR(1) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`contact_person` VARCHAR(1) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`email` VARCHAR(1) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`phone` VARCHAR(1) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`organisation` VARCHAR(1) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`organisation_type` VARCHAR(1) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`current_status` INT NOT NULL,
	`history_created` DATETIME NULL,
	`currently_with` INT NULL
);

-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_application_latest_status`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_application_latest_status` AS select `a`.`id` AS `application_id`,`a`.`id` AS `id`,`a`.`app_no` AS `app_no`,`a`.`user_id` AS `user_id`,`a`.`adequate_arrangement_check` AS `adequate_arrangement_check`,`a`.`jammer_accounted` AS `jammer_accounted`,`a`.`non_intereference` AS `non_intereference`,`a`.`created_at` AS `created_at`,`a`.`isactive` AS `isactive`,`a`.`is_single_exam` AS `is_single_exam`,`a`.`is_single_date` AS `is_single_date`,`a`.`centre_list_ready` AS `centre_list_ready`,`a`.`undertaking` AS `undertaking`,`a`.`contact_person` AS `contact_person`,`a`.`email` AS `email`,`a`.`phone` AS `phone`,`a`.`organisation` AS `organisation`,`a`.`organisation_type` AS `organisation_type`,`ah`.`status` AS `current_status`,`ah`.`created_at` AS `history_created`,`ah`.`assigned_to` AS `currently_with` from (`application` `a` join `application_history` `ah` on((`ah`.`id` = (select max(`ah2`.`id`) from `application_history` `ah2` where (`ah2`.`app_id` = `a`.`id`))))) where (`a`.`isactive` = 1)
;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
