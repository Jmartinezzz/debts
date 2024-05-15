-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: debts
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `debtors`
--

DROP TABLE IF EXISTS `debtors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debtors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(175) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debtors`
--

LOCK TABLES `debtors` WRITE;
/*!40000 ALTER TABLE `debtors` DISABLE KEYS */;
INSERT INTO `debtors` VALUES (11,'Vanesa',NULL,'2023-08-01 17:14:29','2023-08-01 17:14:29'),(12,'Niña eva',NULL,'2023-08-01 18:01:48','2023-08-01 18:01:48'),(13,'Niña susana',NULL,'2023-08-02 14:31:43','2023-08-02 14:31:43'),(14,'Gloria',NULL,'2023-08-03 14:32:51','2023-08-03 14:32:51'),(16,'Don fran',NULL,'2023-08-04 10:11:14','2023-08-04 10:11:14'),(17,'Alsira',NULL,'2023-08-06 11:07:18','2023-08-06 11:07:18'),(18,'Don rene',NULL,'2023-08-09 14:20:50','2023-08-09 14:20:50'),(19,'Ana Lus',NULL,'2023-10-27 10:12:28','2023-10-27 10:12:28'),(20,'Jordan',NULL,'2024-02-14 19:50:29','2024-02-14 19:50:29'),(21,'Johana','Ojitos','2024-03-03 20:10:38','2024-03-03 20:10:38'),(22,'Niña melisa',NULL,'2024-03-29 09:30:35','2024-03-29 09:30:35');
/*!40000 ALTER TABLE `debtors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `debts`
--

DROP TABLE IF EXISTS `debts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `debtor_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `type` enum('charge','payment') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'charge',
  `description` varchar(175) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `debts_debtor_id_foreign` (`debtor_id`),
  KEY `debts_user_id_foreign` (`user_id`),
  CONSTRAINT `debts_debtor_id_foreign` FOREIGN KEY (`debtor_id`) REFERENCES `debtors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `debts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=891 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `debts`
--

LOCK TABLES `debts` WRITE;
/*!40000 ALTER TABLE `debts` DISABLE KEYS */;
INSERT INTO `debts` VALUES (717,17,2,1.50,'charge',NULL,'2024-03-22 11:16:49','2024-03-22 11:16:49'),(721,17,2,1.80,'charge',NULL,'2024-03-22 19:58:21','2024-03-22 19:58:21'),(731,17,2,2.65,'charge',NULL,'2024-03-25 08:31:14','2024-03-25 08:31:14'),(844,18,2,5.80,'charge',NULL,'2024-04-30 10:27:46','2024-04-30 10:27:46'),(845,18,2,2.90,'charge',NULL,'2024-04-30 10:28:08','2024-04-30 10:28:08'),(846,18,2,10.30,'charge',NULL,'2024-04-30 18:44:40','2024-04-30 18:44:40'),(847,17,2,1.00,'charge',NULL,'2024-04-30 19:32:37','2024-04-30 19:32:37'),(848,12,2,8.00,'charge',NULL,'2024-05-01 09:38:18','2024-05-01 09:38:18'),(849,14,2,1.90,'charge',NULL,'2024-05-01 10:39:57','2024-05-01 10:39:57'),(850,11,2,20.75,'charge',NULL,'2024-05-01 16:07:58','2024-05-01 16:07:58'),(851,18,2,3.50,'charge',NULL,'2024-05-01 17:25:37','2024-05-01 17:25:37'),(852,18,2,2.00,'charge',NULL,'2024-05-01 17:25:51','2024-05-01 17:25:51'),(853,18,2,13.75,'charge',NULL,'2024-05-01 19:47:11','2024-05-01 19:47:11'),(858,18,2,1.00,'charge',NULL,'2024-05-02 09:08:06','2024-05-02 09:08:06'),(859,12,2,4.10,'charge',NULL,'2024-05-02 09:34:38','2024-05-02 09:34:38'),(860,18,2,7.10,'charge',NULL,'2024-05-02 21:41:01','2024-05-02 21:41:01'),(861,18,2,2.30,'charge',NULL,'2024-05-03 07:56:07','2024-05-03 07:56:07'),(864,18,2,3.00,'charge',NULL,'2024-05-04 14:24:11','2024-05-04 14:24:11'),(865,12,2,0.50,'charge',NULL,'2024-05-04 21:39:11','2024-05-04 21:39:11'),(866,14,2,11.00,'charge',NULL,'2024-05-05 08:34:08','2024-05-05 08:34:08'),(867,11,2,15.65,'charge',NULL,'2024-05-05 12:37:13','2024-05-05 12:37:13'),(868,18,2,24.00,'charge',NULL,'2024-05-06 10:41:48','2024-05-06 10:41:48'),(869,14,2,5.85,'charge',NULL,'2024-05-06 13:33:53','2024-05-06 13:33:53'),(870,12,2,5.00,'charge',NULL,'2024-05-06 15:17:47','2024-05-06 15:17:47'),(871,11,2,8.60,'charge',NULL,'2024-05-06 20:57:38','2024-05-06 20:57:38'),(872,11,2,5.50,'charge',NULL,'2024-05-06 20:57:49','2024-05-06 20:57:49'),(873,12,2,3.40,'charge',NULL,'2024-05-07 10:39:27','2024-05-07 10:39:27'),(874,14,1,4.70,'charge',NULL,'2024-05-08 14:03:33','2024-05-08 14:03:33'),(875,12,2,1.15,'charge',NULL,'2024-05-09 10:49:59','2024-05-09 10:49:59'),(876,11,2,7.85,'charge',NULL,'2024-05-10 11:06:18','2024-05-10 11:06:18'),(877,14,2,1.45,'charge',NULL,'2024-05-10 19:02:48','2024-05-10 19:02:48'),(878,18,2,11.95,'charge',NULL,'2024-05-10 21:16:37','2024-05-10 21:16:37'),(879,18,2,3.00,'charge',NULL,'2024-05-11 09:38:09','2024-05-11 09:38:09'),(880,14,2,2.00,'charge',NULL,'2024-05-11 14:39:13','2024-05-11 14:39:13'),(881,14,2,2.00,'charge',NULL,'2024-05-12 13:17:00','2024-05-12 13:17:00'),(882,12,2,5.95,'charge',NULL,'2024-05-12 21:39:21','2024-05-12 21:39:21'),(883,11,2,8.80,'charge',NULL,'2024-05-12 21:43:21','2024-05-12 21:43:21'),(884,18,2,5.60,'charge',NULL,'2024-05-12 21:44:19','2024-05-12 21:44:19'),(885,14,2,2.00,'charge',NULL,'2024-05-13 09:19:12','2024-05-13 09:19:12'),(886,18,2,3.30,'charge',NULL,'2024-05-13 15:29:33','2024-05-13 15:29:33'),(887,18,2,60.00,'payment',NULL,'2024-05-14 14:33:00','2024-05-14 14:33:00'),(888,11,2,3.10,'charge',NULL,'2024-05-14 15:54:02','2024-05-14 15:54:02'),(889,12,2,1.60,'charge',NULL,'2024-05-15 10:01:13','2024-05-15 10:01:13'),(890,12,2,0.90,'charge',NULL,'2024-05-15 10:37:04','2024-05-15 10:37:04');
/*!40000 ALTER TABLE `debts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_08_04_043545_create_debtors_table',1),(5,'2021_08_04_043603_create_debts_table',1),(6,'2022_03_20_122543_add_type_to_debts_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_unique` (`name`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jorge','correo@correo.com','2023-08-01 11:48:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','UfPVuYBqwg','2023-08-01 11:48:13','2023-08-01 11:48:13'),(2,'emely','correo2@coreo.com','2023-08-01 11:48:13','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Sp2XTRH89y99godYr1qcg2xCNSOpCm0iEeZXzXZfLHu3qIxc4giclNmtAACs','2023-08-01 11:48:13','2023-08-01 11:48:13');
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

-- Dump completed on 2024-05-15 17:38:21
