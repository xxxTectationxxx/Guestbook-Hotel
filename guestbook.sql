/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.11-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: guestbook
-- ------------------------------------------------------
-- Server version	10.11.11-MariaDB-0ubuntu0.24.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES
(1,'admin','5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tamu`
--

DROP TABLE IF EXISTS `tamu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `tamu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_kamar` varchar(10) DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `waktu_input` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `tamu_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tamu`
--

LOCK TABLES `tamu` WRITE;
/*!40000 ALTER TABLE `tamu` DISABLE KEYS */;
INSERT INTO `tamu` VALUES
(1,NULL,'udin','udin1@wdsa','123','2004-12-02','2005-12-31','sadasdcxzxc','2025-04-11 23:17:47'),
(2,2,'user1','user2@gmail','12','2025-04-11','2025-04-14','halo bang udah tf ya?','2025-04-11 23:54:14'),
(11,NULL,'John Doe','johndoe@example.com','101','2025-04-10','2025-04-15','Senang menginap di hotel.','2025-04-12 00:33:46'),
(12,NULL,'Jane Doe','janedoe@example.com','102','2025-04-10','2025-04-14','Pelayanan bagus.','2025-04-12 00:33:46'),
(13,NULL,'Michael Smith','michael@example.com','201','2025-04-11','2025-04-16','Kamar bersih dan nyaman.','2025-04-12 00:33:46'),
(14,NULL,'Sarah Connor','sarahconnor@example.com','202','2025-04-12','2025-04-17','Lokasi strategis.','2025-04-12 00:33:46'),
(15,NULL,'Alice Wonder','alice@example.com','301','2025-04-13','2025-04-18','Suka suasana hotel.','2025-04-12 00:33:46'),
(16,NULL,'Bob Builder','bob@example.com','302','2025-04-13','2025-04-19','Harga terjangkau.','2025-04-12 00:33:46'),
(39,3,'ari','ari123@gasmo','123','2025-04-16','2025-04-30','Untuk keluarga 5 orag','2025-04-13 21:53:54'),
(40,2,'Agus1 Wicaksono','email@Jdjslfj','21','2025-04-03','2025-04-15','123','2025-04-13 23:20:45');
/*!40000 ALTER TABLE `tamu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(2,'user1','user1@gmail','24c9e15e52afc47c225b757e7bee1f9d',1),
(3,'user10','user10@gmail','990d67a9f94696b1abe2dccf06900322',1),
(4,'dewa','dewa@pornhub.com','202cb962ac59075b964b07152d234b70',1);
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

-- Dump completed on 2025-04-15 14:46:47
