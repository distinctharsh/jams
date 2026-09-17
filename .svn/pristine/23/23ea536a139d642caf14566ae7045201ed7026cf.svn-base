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
