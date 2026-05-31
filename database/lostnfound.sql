-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lostnfound
-- ------------------------------------------------------
-- Server version	8.0.46

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Electronics','2026-05-31 00:27:33','2026-05-31 00:27:33'),(2,'Accessories','2026-05-31 00:27:33','2026-05-31 00:27:33'),(3,'Clothing','2026-05-31 00:27:33','2026-05-31 00:27:33'),(4,'Bags & Wallets','2026-05-31 00:27:33','2026-05-31 00:27:33'),(5,'Jewelry','2026-05-31 00:27:33','2026-05-31 00:27:33'),(6,'Sports & Recreation','2026-05-31 00:27:33','2026-05-31 00:27:33'),(7,'Books & Documents','2026-05-31 00:27:33','2026-05-31 00:27:33'),(8,'Personal Items','2026-05-31 00:27:33','2026-05-31 00:27:33');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claim`
--

DROP TABLE IF EXISTS `claim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `claim` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `found_report_id` bigint unsigned NOT NULL,
  `proof_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_claimed` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `claim_user_id_foreign` (`user_id`),
  KEY `claim_found_report_id_foreign` (`found_report_id`),
  CONSTRAINT `claim_found_report_id_foreign` FOREIGN KEY (`found_report_id`) REFERENCES `found_report` (`id`) ON DELETE CASCADE,
  CONSTRAINT `claim_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim`
--

LOCK TABLES `claim` WRITE;
/*!40000 ALTER TABLE `claim` DISABLE KEYS */;
/*!40000 ALTER TABLE `claim` ENABLE KEYS */;
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
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
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
-- Table structure for table `found_report`
--

DROP TABLE IF EXISTS `found_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `found_report` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `found_report_user_id_foreign` (`user_id`),
  KEY `found_report_item_id_foreign` (`item_id`),
  CONSTRAINT `found_report_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `found_report_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `found_report`
--

LOCK TABLES `found_report` WRITE;
/*!40000 ALTER TABLE `found_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `found_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_reported` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_category_id_foreign` (`category_id`),
  CONSTRAINT `item_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,7,'Student ID','Et vel autem labore eaque est autem odit quia.',NULL,'lost','claimed','Main Hallway','2026-03-20 13:48:38','2026-05-31 00:27:34','2026-05-31 00:27:34'),(2,7,'Notebook','Consequatur cumque iure eos voluptate nisi qui magnam magnam doloribus officia animi totam.',NULL,'lost','pending','TechMac Bldg','2026-04-18 09:26:40','2026-05-31 00:27:34','2026-05-31 00:27:34'),(3,4,'Bluetooth Speaker','Id tempora placeat quo aut consequuntur atque facere laborum debitis cumque.',NULL,'found','claimed','Library Ground Floor','2026-03-20 15:35:31','2026-05-31 00:27:34','2026-05-31 00:27:34'),(4,1,'Samsung Galaxy S23','Aut soluta eos impedit minima dolores assumenda nesciunt eligendi quia rem aperiam recusandae omnis.',NULL,'found','pending','Library Ground Floor','2026-04-08 14:01:26','2026-05-31 00:27:34','2026-05-31 00:27:34'),(5,1,'USB Drive 32GB','Beatae unde praesentium neque impedit repudiandae saepe eos cupiditate doloremque.',NULL,'lost','returned','IT Room 5','2026-04-07 18:47:51','2026-05-31 00:27:34','2026-05-31 00:27:34'),(6,3,'Hairbrush','Quam non in consequuntur labore ullam autem soluta asperiores dignissimos tenetur.',NULL,'lost','claimed','Music Room','2026-03-15 04:13:37','2026-05-31 00:27:34','2026-05-31 00:27:34'),(7,3,'iPad Air','Voluptatum quis asperiores suscipit ex eum quo quod iste.',NULL,'found','pending','Music Room','2026-03-06 04:32:19','2026-05-31 00:27:34','2026-05-31 00:27:34'),(8,4,'Credit Card Holder','Iusto aliquam ut consequatur non esse et nemo quibusdam dicta quia et voluptas.',NULL,'lost','claimed','Cafeteria','2026-05-10 06:42:59','2026-05-31 00:27:34','2026-05-31 00:27:34'),(9,4,'Oakley Sport Glasses','Ut vel et officia repudiandae minima iusto itaque nam molestiae.',NULL,'found','returned','Art Studio','2026-04-23 20:39:16','2026-05-31 00:27:34','2026-05-31 00:27:34'),(10,4,'Garmin Watch','Aliquam ipsa hic sit quos vel quas adipisci tempora.',NULL,'found','pending','Music Room','2026-03-26 03:45:31','2026-05-31 00:27:34','2026-05-31 00:27:34'),(11,6,'Camera Lens','Non sequi dignissimos vel eligendi officia labore sunt eos rerum itaque et.',NULL,'found','pending','Music Room','2026-03-27 16:08:54','2026-05-31 00:27:34','2026-05-31 00:27:34'),(12,2,'Perfume Bottle','Ducimus autem minima fugiat necessitatibus quod ipsam autem pariatur exercitationem velit architecto.',NULL,'found','returned','Computer Lab','2026-03-19 15:53:53','2026-05-31 00:27:34','2026-05-31 00:27:34'),(13,5,'Concert Ticket','Nihil quod magni maxime magni totam et.',NULL,'found','claimed','Conference Room B','2026-03-19 13:23:23','2026-05-31 00:27:34','2026-05-31 00:27:34'),(14,6,'Textbook: Chemistry','Dolorum tenetur eum distinctio voluptas aut quam.',NULL,'lost','claimed','IT Room 3','2026-04-02 10:05:06','2026-05-31 00:27:34','2026-05-31 00:27:34'),(15,5,'Apple Watch Series 8','Et laudantium ducimus et magni deserunt facilis maiores fugit quia itaque et labore.',NULL,'lost','pending','Computer Lab','2026-04-06 09:08:53','2026-05-31 00:27:34','2026-05-31 00:27:34'),(16,7,'Samsung Galaxy Watch','Corporis fuga temporibus rerum aut rerum consequatur quae et consequatur est officia.',NULL,'found','pending','Convention Hall','2026-04-27 08:49:18','2026-05-31 00:27:34','2026-05-31 00:27:34'),(17,2,'Car Keys','Officiis aliquam vero numquam voluptatem vel qui inventore.',NULL,'lost','pending','Auditorium','2026-03-24 16:25:11','2026-05-31 00:27:34','2026-05-31 00:27:34'),(18,1,'Coffee Mug','Ut illum est id et maiores recusandae accusamus dolor provident qui.',NULL,'found','returned','Chemistry Lab','2026-05-04 22:50:44','2026-05-31 00:27:34','2026-05-31 00:27:34'),(19,2,'Passport','Occaecati accusamus minima culpa voluptatem ratione quia sit fuga minus.',NULL,'found','returned','TechMac Bldg','2026-04-17 09:41:04','2026-05-31 00:27:34','2026-05-31 00:27:34'),(20,2,'Ray-Ban Sunglasses','Eaque mollitia laborum quo quaerat voluptatem vel officiis earum.',NULL,'found','pending','Library Ground Floor','2026-04-06 06:29:58','2026-05-31 00:27:34','2026-05-31 00:27:34'),(21,8,'Fitbit Charge 5','Quasi rerum labore illo voluptatibus voluptas perspiciatis tempore rem officia quas.',NULL,'lost','claimed','Conference Room B','2026-03-13 04:08:39','2026-05-31 00:27:34','2026-05-31 00:27:34'),(22,1,'Hair Straightener','Voluptatem maiores et temporibus id est dolore ad ratione sed quae.',NULL,'lost','pending','Tennis Court','2026-03-24 21:06:53','2026-05-31 00:27:34','2026-05-31 00:27:34'),(23,2,'Travel Tumbler','Quo unde quidem rerum tempora quam dolore quod et voluptas fuga.',NULL,'lost','pending','Practice Room','2026-05-09 13:31:51','2026-05-31 00:27:34','2026-05-31 00:27:34'),(24,6,'JBL Flip 6','Maiores vel aliquid quo ut perspiciatis tenetur sit et.',NULL,'lost','returned','Parking Lot','2026-05-24 11:58:20','2026-05-31 00:27:34','2026-05-31 00:27:34'),(25,5,'Camera Lens','Est rem omnis dignissimos in doloremque minus similique.',NULL,'lost','claimed','Chemistry Lab','2026-03-19 17:02:07','2026-05-31 00:27:34','2026-05-31 00:27:34'),(26,1,'Google Pixel 7','Impedit veniam aspernatur ad accusantium perferendis enim omnis itaque velit.',NULL,'found','returned','Biology Lab','2026-04-11 14:16:49','2026-05-31 00:27:34','2026-05-31 00:27:34'),(27,4,'Calligraphy Pen','Et architecto ullam et aut ut aspernatur.',NULL,'lost','pending','Biology Lab','2026-04-24 21:58:05','2026-05-31 00:27:34','2026-05-31 00:27:34'),(28,4,'Notebook','Culpa et sunt consequuntur corrupti soluta voluptas dolor omnis quaerat.',NULL,'lost','claimed','Bathroom','2026-05-22 16:19:24','2026-05-31 00:27:34','2026-05-31 00:27:34'),(29,8,'Gucci Shoulder Bag','Est voluptatem et enim amet praesentium eos commodi veritatis omnis maxime similique.',NULL,'lost','claimed','Biology Lab','2026-04-09 13:19:47','2026-05-31 00:27:34','2026-05-31 00:27:34'),(30,5,'USB Drive 32GB','Harum exercitationem velit ea doloribus accusamus temporibus nobis cum.',NULL,'found','claimed','Chemistry Lab','2026-05-17 13:57:13','2026-05-31 00:27:34','2026-05-31 00:27:34'),(31,3,'Memory Card 256GB','Sed tempore cum dolor id sequi ipsum fuga.',NULL,'found','pending','Chemistry Lab','2026-03-18 22:34:11','2026-05-31 00:27:34','2026-05-31 00:27:34'),(32,8,'Coffee Mug','In culpa doloremque amet eos possimus odio non enim id minus atque fugiat sapiente.',NULL,'found','returned','Computer Lab','2026-05-23 00:56:51','2026-05-31 00:27:34','2026-05-31 00:27:34'),(33,2,'Water Bottle','Earum dolorum et sit eum rerum distinctio rem quae corporis nihil.',NULL,'lost','pending','IT Room 3','2026-03-12 08:27:39','2026-05-31 00:27:34','2026-05-31 00:27:34'),(34,2,'Sports Bottle','Autem unde ipsum et dolorum a tempora consequuntur.',NULL,'found','returned','Cafeteria','2026-03-19 16:12:24','2026-05-31 00:27:34','2026-05-31 00:27:34'),(35,3,'Movie Ticket','Amet animi odit sed qui expedita animi.',NULL,'found','pending','TechMac Bldg','2026-04-18 14:48:40','2026-05-31 00:27:34','2026-05-31 00:27:34'),(36,5,'Fitbit Charge 5','Est et non maiores ipsum repellat similique quia aut.',NULL,'lost','claimed','Library Ground Floor','2026-05-14 11:39:15','2026-05-31 00:27:34','2026-05-31 00:27:34'),(37,8,'Leather Wallet','Hic aut pariatur maiores aut illum dolorum.',NULL,'lost','claimed','Library Ground Floor','2026-05-04 06:33:29','2026-05-31 00:27:34','2026-05-31 00:27:34'),(38,5,'Bluetooth Speaker','In aliquid eligendi occaecati et nisi accusamus nihil eos qui molestiae cupiditate laborum vero.',NULL,'lost','claimed','Campus Canteen','2026-05-09 16:55:29','2026-05-31 00:27:34','2026-05-31 00:27:34'),(39,8,'Hair Straightener','Ea cupiditate velit voluptatem ut sunt ipsum quod.',NULL,'lost','claimed','IT Room 5','2026-04-25 17:35:36','2026-05-31 00:27:34','2026-05-31 00:27:34'),(40,8,'Baseball Cap','Dolor molestiae ut qui dolorem in voluptate explicabo explicabo vero sed ex rem et.',NULL,'lost','claimed','Cafeteria','2026-05-26 13:26:34','2026-05-31 00:27:34','2026-05-31 00:27:34'),(41,8,'Train Pass','Quo est sunt esse esse hic adipisci numquam maxime repellendus.',NULL,'lost','claimed','Bathroom','2026-03-08 18:27:30','2026-05-31 00:27:34','2026-05-31 00:27:34'),(42,6,'Hair Straightener','Consectetur velit voluptas illo labore neque explicabo et ut laboriosam est rem.',NULL,'found','pending','Practice Room','2026-04-28 12:18:10','2026-05-31 00:27:34','2026-05-31 00:27:34'),(43,5,'Garmin Watch','Velit repellendus est consequatur consectetur reiciendis inventore vero consequatur.',NULL,'lost','claimed','Physics Lab','2026-05-29 17:20:22','2026-05-31 00:27:34','2026-05-31 00:27:34'),(44,6,'Silver Earrings','Rerum dolorum molestiae consequatur magni nostrum in est fugiat mollitia suscipit numquam pariatur.',NULL,'lost','returned','Art Studio','2026-05-30 03:06:03','2026-05-31 00:27:34','2026-05-31 00:27:34'),(45,8,'Sunscreen','Error necessitatibus laudantium officiis sed repellendus perferendis voluptas quo unde qui blanditiis.',NULL,'found','returned','Conference Room B','2026-05-04 04:15:04','2026-05-31 00:27:34','2026-05-31 00:27:34'),(46,7,'Cologne','Aut enim qui ab porro ipsam dolorum ut voluptatem unde debitis consectetur quaerat.',NULL,'lost','pending','Conference Room A','2026-04-18 13:29:24','2026-05-31 00:27:34','2026-05-31 00:27:34'),(47,3,'MacBook Pro','Quidem quia animi eos voluptas earum libero laudantium ipsa sit.',NULL,'found','pending','Gym','2026-03-15 08:06:59','2026-05-31 00:27:34','2026-05-31 00:27:34'),(48,8,'iPhone 14','Numquam cupiditate quia repellat corrupti dicta beatae non et explicabo atque assumenda quia.',NULL,'lost','pending','Auditorium','2026-05-19 23:17:06','2026-05-31 00:27:34','2026-05-31 00:27:34'),(49,6,'Aviator Sunglasses','Harum in non debitis nihil architecto libero ab amet.',NULL,'lost','pending','Conference Room B','2026-05-21 15:50:04','2026-05-31 00:27:34','2026-05-31 00:27:34'),(50,8,'Lenovo ThinkPad','Est voluptatibus eius est est doloribus corrupti ea voluptatem sit possimus aut.',NULL,'lost','claimed','IT Room 3','2026-05-13 04:27:54','2026-05-31 00:27:34','2026-05-31 00:27:34'),(51,5,'Travel Tumbler','Doloremque distinctio consequatur delectus ut laboriosam cumque.',NULL,'lost','returned','Tennis Court','2026-05-25 23:19:42','2026-05-31 00:27:34','2026-05-31 00:27:34'),(52,5,'Winter Jacket','Blanditiis quam non pariatur ullam porro non illo labore maiores dolores magnam quibusdam sapiente omnis.',NULL,'lost','returned','Art Studio','2026-03-24 15:18:51','2026-05-31 00:27:34','2026-05-31 00:27:34'),(53,8,'House Keys','Harum facere voluptates in aut sed doloribus ipsa sit possimus.',NULL,'lost','claimed','Conference Room B','2026-04-18 20:08:02','2026-05-31 00:27:34','2026-05-31 00:27:34'),(54,7,'Baseball Cap','Pariatur sit sit incidunt fuga cumque aut aut et totam nostrum.',NULL,'found','pending','Conference Room B','2026-04-21 07:18:50','2026-05-31 00:27:34','2026-05-31 00:27:34'),(55,5,'Dell XPS 13','Cumque sint eaque dicta nisi laboriosam animi labore.',NULL,'lost','returned','Chemistry Lab','2026-05-30 18:49:44','2026-05-31 00:27:34','2026-05-31 00:27:34'),(56,7,'Calligraphy Pen','Et et et velit a laboriosam delectus et vero ullam deserunt vero libero autem.',NULL,'lost','pending','TechHub Bldg','2026-03-24 22:41:54','2026-05-31 00:27:34','2026-05-31 00:27:34'),(57,4,'Soccer Ball','Quo enim voluptas explicabo nesciunt cumque sapiente in doloremque tempora optio deleniti beatae dolor.',NULL,'found','returned','Conference Room A','2026-03-29 02:34:50','2026-05-31 00:27:34','2026-05-31 00:27:34'),(58,8,'Fitbit Charge 5','Maiores alias earum modi velit quod aliquid.',NULL,'found','pending','Physics Lab','2026-04-27 04:03:31','2026-05-31 00:27:34','2026-05-31 00:27:34'),(59,2,'Samsung Galaxy S23','Tempore veniam placeat eveniet consequatur et explicabo.',NULL,'found','returned','Chemistry Lab','2026-05-06 17:58:09','2026-05-31 00:27:34','2026-05-31 00:27:34'),(60,4,'Passport','Iure eum aut quia repudiandae et sit architecto repellendus.',NULL,'lost','pending','Convention Hall','2026-03-12 13:20:43','2026-05-31 00:27:34','2026-05-31 00:27:34'),(61,2,'External Hard Drive 1TB','Consequatur adipisci odio asperiores animi nihil nesciunt vel quia nesciunt consequuntur odio consequatur est.',NULL,'lost','pending','Mac Loh','2026-05-19 21:05:34','2026-05-31 00:27:34','2026-05-31 00:27:34'),(62,6,'Winter Jacket','Quae maxime quod ad voluptatum vel sit aut autem quasi.',NULL,'found','pending','Auditorium','2026-04-07 08:09:22','2026-05-31 00:27:34','2026-05-31 00:27:34'),(63,8,'Bluetooth Speaker','Aut tenetur vitae animi corrupti eum autem sapiente voluptatem sit ipsam.',NULL,'lost','returned','Conference Room A','2026-03-20 18:30:04','2026-05-31 00:27:34','2026-05-31 00:27:34'),(64,1,'Soccer Ball','Est et sunt non ducimus deserunt id doloremque.',NULL,'lost','pending','Gym Locker Room','2026-04-10 11:26:13','2026-05-31 00:27:34','2026-05-31 00:27:34'),(65,8,'Cologne','Accusamus nulla quidem perferendis iste qui voluptatem officiis laboriosam facere.',NULL,'lost','claimed','TechMac Bldg','2026-05-07 03:50:59','2026-05-31 00:27:34','2026-05-31 00:27:34'),(66,6,'Garmin Watch','Rerum qui aliquam odio fuga sit est omnis exercitationem voluptatum aperiam.',NULL,'lost','claimed','Parking Lot','2026-03-04 03:35:47','2026-05-31 00:27:34','2026-05-31 00:27:34'),(67,6,'Camera Lens','Facilis suscipit nihil quis dolore dolores consequuntur molestiae veritatis.',NULL,'lost','pending','Main Hallway','2026-05-28 20:09:27','2026-05-31 00:27:34','2026-05-31 00:27:34'),(68,5,'Microphone','Et enim iusto nobis id repellat quisquam quia velit quas velit.',NULL,'lost','pending','Chemistry Lab','2026-04-28 19:49:51','2026-05-31 00:27:34','2026-05-31 00:27:34'),(69,4,'Umbrella','Voluptatibus dolorum maxime quisquam porro neque a quam.',NULL,'lost','pending','Auditorium','2026-03-11 20:12:32','2026-05-31 00:27:34','2026-05-31 00:27:34'),(70,2,'Sony WH-1000XM4','Aut quis expedita praesentium rerum cumque eaque aut ipsum velit enim nobis voluptas aperiam.',NULL,'lost','returned','Gym','2026-04-18 19:13:51','2026-05-31 00:27:34','2026-05-31 00:27:34'),(71,4,'Memory Card 256GB','Qui amet necessitatibus vero aliquid recusandae possimus commodi.',NULL,'lost','pending','Bathroom','2026-04-03 06:34:48','2026-05-31 00:27:34','2026-05-31 00:27:34'),(72,8,'Travel Tumbler','Dicta omnis tempore architecto modi eos nemo ab omnis esse ab consequatur.',NULL,'found','returned','TechMac Bldg','2026-04-04 01:42:59','2026-05-31 00:27:34','2026-05-31 00:27:34'),(73,1,'Samsung Galaxy S23','Commodi iste sed excepturi non nisi dolorem perferendis ut est sint aut non.',NULL,'found','returned','Computer Lab','2026-05-16 16:20:18','2026-05-31 00:27:34','2026-05-31 00:27:34'),(74,5,'Textbook: Physics','Porro sed architecto alias sit ut eveniet corporis sed distinctio enim et similique itaque.',NULL,'lost','returned','Auditorium','2026-05-05 12:32:31','2026-05-31 00:27:34','2026-05-31 00:27:34'),(75,4,'Leather Wallet','Voluptatem fugit consectetur est consequatur non totam dolores dolor aut optio deserunt.',NULL,'found','pending','Bathroom','2026-03-11 18:38:20','2026-05-31 00:27:34','2026-05-31 00:27:34'),(76,1,'Colored Pencils','Sunt qui cumque alias consequatur est enim quis qui blanditiis nisi architecto saepe laborum.',NULL,'found','returned','TechHub Bldg','2026-04-29 22:34:26','2026-05-31 00:27:34','2026-05-31 00:27:34'),(77,4,'Samsung Galaxy S23','Cupiditate dicta nostrum nostrum commodi provident quas atque nihil omnis nihil porro.',NULL,'found','pending','Bathroom','2026-05-15 02:25:53','2026-05-31 00:27:34','2026-05-31 00:27:34'),(78,4,'Round Sunglasses','Culpa temporibus a voluptate et nulla atque.',NULL,'found','pending','Bathroom','2026-04-11 02:01:05','2026-05-31 00:27:34','2026-05-31 00:27:34'),(79,6,'Cat Eye Glasses','Distinctio fuga ea reprehenderit ea itaque ut quo nihil.',NULL,'lost','returned','Physics Lab','2026-05-16 13:20:55','2026-05-31 00:27:34','2026-05-31 00:27:34'),(80,5,'Gloves','Repellendus ut non commodi minima sunt rerum rem quo ipsam.',NULL,'lost','returned','Gym Locker Room','2026-04-01 05:35:02','2026-05-31 00:27:34','2026-05-31 00:27:34'),(81,7,'Oakley Sport Glasses','Veniam doloremque sit et quibusdam exercitationem et ut perferendis ad debitis ex.',NULL,'lost','claimed','Physics Lab','2026-05-17 14:51:34','2026-05-31 00:27:34','2026-05-31 00:27:34'),(82,4,'Ring Light','Enim dolor suscipit aliquam fuga beatae delectus distinctio dolorem qui.',NULL,'found','pending','Art Studio','2026-05-15 03:55:57','2026-05-31 00:27:34','2026-05-31 00:27:34'),(83,2,'Sports Bottle','Est qui et eos sed necessitatibus libero aliquid labore qui.',NULL,'found','returned','Practice Room','2026-04-17 10:20:28','2026-05-31 00:27:34','2026-05-31 00:27:34'),(84,5,'Concert Ticket','Iste qui tempore ullam et dolores non magni corrupti molestiae voluptatem officiis.',NULL,'found','pending','IT Room 5','2026-05-28 07:34:11','2026-05-31 00:27:34','2026-05-31 00:27:34'),(85,2,'Oakley Sport Glasses','Et sit sunt consequatur est dicta consequatur.',NULL,'found','claimed','Physics Lab','2026-05-25 10:07:51','2026-05-31 00:27:34','2026-05-31 00:27:34'),(86,1,'MacBook Pro','Recusandae corporis laudantium aliquid voluptas dolor deleniti incidunt earum aut.',NULL,'found','claimed','Biology Lab','2026-04-29 02:26:49','2026-05-31 00:27:34','2026-05-31 00:27:34'),(87,1,'Bicycle Helmet','Possimus molestiae ab necessitatibus eaque quisquam doloremque est.',NULL,'found','claimed','Mac Loh','2026-05-07 01:59:52','2026-05-31 00:27:34','2026-05-31 00:27:34'),(88,7,'Sports Bottle','Neque sunt aut laudantium provident reprehenderit nesciunt.',NULL,'found','returned','Chemistry Lab','2026-04-27 07:56:12','2026-05-31 00:27:34','2026-05-31 00:27:34'),(89,1,'Wireless Charger','Recusandae beatae voluptas voluptatem ut nobis ab voluptas.',NULL,'found','claimed','Conference Room B','2026-04-08 13:17:37','2026-05-31 00:27:34','2026-05-31 00:27:34'),(90,3,'Train Pass','Nihil repellat nihil nobis sit nemo consequatur velit pariatur et.',NULL,'found','pending','Music Room','2026-05-06 12:12:06','2026-05-31 00:27:34','2026-05-31 00:27:34'),(91,5,'ASUS VivoBook','Velit ullam qui veritatis cupiditate alias necessitatibus illum non et totam est.',NULL,'found','returned','Mac Loh','2026-05-21 17:41:41','2026-05-31 00:27:34','2026-05-31 00:27:34'),(92,3,'Tripod','Minus ut necessitatibus eos quasi explicabo eum dolorum quia.',NULL,'lost','pending','IT Room 5','2026-05-24 22:27:12','2026-05-31 00:27:34','2026-05-31 00:27:34'),(93,4,'Dress Shoes','Dolorem eius aut beatae ea sunt eos unde voluptates.',NULL,'lost','claimed','Library 2nd Floor','2026-04-09 02:46:11','2026-05-31 00:27:34','2026-05-31 00:27:34'),(94,8,'HP Pavilion','Sed suscipit error odio autem aut non ut ab.',NULL,'found','pending','Practice Room','2026-04-18 08:43:26','2026-05-31 00:27:34','2026-05-31 00:27:34'),(95,8,'Sneakers','Veritatis doloribus dolorum impedit nulla et aliquid officia consequatur sunt iusto vel.',NULL,'found','returned','Swimming Pool','2026-05-16 06:00:09','2026-05-31 00:27:34','2026-05-31 00:27:34'),(96,7,'Water Bottle','Voluptatem vero qui quo explicabo a repellat dolor.',NULL,'found','pending','TechHub Bldg','2026-04-25 14:49:17','2026-05-31 00:27:34','2026-05-31 00:27:34'),(97,6,'Perfume Bottle','Reprehenderit corrupti voluptas alias mollitia quia dolorem soluta.',NULL,'found','pending','Swimming Pool','2026-03-11 22:23:02','2026-05-31 00:27:34','2026-05-31 00:27:34'),(98,1,'Basketball','Quod ab pariatur rerum similique dignissimos maiores.',NULL,'found','returned','Computer Lab','2026-04-16 07:02:59','2026-05-31 00:27:34','2026-05-31 00:27:34'),(99,8,'Fountain Pen','Assumenda accusantium et quod laudantium maxime ea qui.',NULL,'lost','pending','Campus Canteen','2026-05-20 04:47:15','2026-05-31 00:27:34','2026-05-31 00:27:34'),(100,3,'Textbook: Chemistry','Aspernatur non possimus id vel et voluptatem rerum.',NULL,'lost','claimed','Library Ground Floor','2026-03-27 06:34:04','2026-05-31 00:27:34','2026-05-31 00:27:34');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lost_report`
--

DROP TABLE IF EXISTS `lost_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lost_report` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `item_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lost_report_user_id_foreign` (`user_id`),
  KEY `lost_report_item_id_foreign` (`item_id`),
  CONSTRAINT `lost_report_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lost_report_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lost_report`
--

LOCK TABLES `lost_report` WRITE;
/*!40000 ALTER TABLE `lost_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `lost_report` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'0001_01_01_000003_create_categories_table',1),(5,'0001_01_01_000004_create_items_table',1),(6,'0001_01_01_000005_create_lost_reports_table',1),(7,'0001_01_01_000006_create_found_reports_table',1),(8,'0001_01_01_000007_create_claims_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `1` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`),
  CONSTRAINT `1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1gMIoIeI2QFZcPCagzGM6rNnhdMNvDYP0y0i7vcq',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.121.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36','eyJfdG9rZW4iOiJHazRHdjNnNEJoZmVRVmQ2ZU5CdFpWRVNCM3ViSEJtMXo4aHdtYjJYIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1780216635),('VsJqTEFh4FerZYdykgx1O57rkpvR5jpABjJK0ZJj',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36 Edg/148.0.0.0','eyJfdG9rZW4iOiJiVjhqbmFkY0xGaHpVVlhyZFoyZzJxdDFQemdUOXkzZkdsY2Y2a2lDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1780217333);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Test User','test@example.com','+1 (270) 308-4807','$2y$12$IosvqkV/uPOMpDXd8MEkzuYe8pn1fcy27SlHf4nHrA8zIGARXsU2e','user','2026-05-31 00:27:34','2026-05-31 00:27:34');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-31 17:03:52
