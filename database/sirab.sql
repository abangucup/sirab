-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: sirab
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.20.04.1

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
-- Table structure for table `biodatas`
--

DROP TABLE IF EXISTS `biodatas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `biodatas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` enum('p','l') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `biodatas`
--

LOCK TABLES `biodatas` WRITE;
/*!40000 ALTER TABLE `biodatas` DISABLE KEYS */;
INSERT INTO `biodatas` VALUES (1,'Suci','082111111','Bonebolango','p',NULL,NULL,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(2,'Salman Kotbar','82154488769','Dembe Jaya','l','2000-10-13','http://sirab.test/uploads/FsPdoo6Vgzxhf9msfbCxicXfRtWsDXp0A9eQQgkX.jpg','2024-05-08 20:31:29','2024-05-08 20:31:29'),(5,'Adipisci qui eum nec','55','Reprehenderit vitae','p','2000-12-19','http://sirab.test/uploads/RZnBdIzUKxUzyaH5V7u4UgAkHcHRTrmuwKbLBzDn.jpg','2024-05-21 19:17:31','2024-05-24 18:19:34'),(6,'Etyana Uloli, SKM','82154488769','Bonebolango','p','1974-05-25','http://sirab.test/uploads/Aj3pZVpIAjW3UsjLY7io1ef0wKQ4SQCSGembPBfG.jpg','2024-05-24 15:06:45','2024-05-24 15:06:45');
/*!40000 ALTER TABLE `biodatas` ENABLE KEYS */;
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
-- Table structure for table `imunisasis`
--

DROP TABLE IF EXISTS `imunisasis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imunisasis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kunjungan_id` bigint unsigned NOT NULL,
  `tanggal_pemberian_imunisasi` date NOT NULL,
  `puskesmas_pemberi_imunisasi` bigint unsigned NOT NULL,
  `status_imunisasi` enum('Var 1','Var 2','Var 3','Var 4') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `imunisasis_kunjungan_id_foreign` (`kunjungan_id`),
  KEY `imunisasis_puskesmas_pemberi_imunisasi_foreign` (`puskesmas_pemberi_imunisasi`),
  CONSTRAINT `imunisasis_kunjungan_id_foreign` FOREIGN KEY (`kunjungan_id`) REFERENCES `kunjungans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `imunisasis_puskesmas_pemberi_imunisasi_foreign` FOREIGN KEY (`puskesmas_pemberi_imunisasi`) REFERENCES `instansis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=506 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imunisasis`
--

LOCK TABLES `imunisasis` WRITE;
/*!40000 ALTER TABLE `imunisasis` DISABLE KEYS */;
INSERT INTO `imunisasis` VALUES (407,1,'2002-10-09',10,'Var 1','Quaerat possimus velit tempore non itaque iste et.','2024-05-25 19:02:18','2024-05-25 19:02:18'),(409,1,'2015-12-27',1,'Var 4','Enim qui repudiandae aut quidem esse.','2024-05-25 19:02:18','2024-05-25 19:02:18'),(410,1,'1970-03-16',1,'Var 3','Aliquid ut minus qui quam aut id molestiae.','2024-05-25 19:02:18','2024-05-25 19:02:18');
/*!40000 ALTER TABLE `imunisasis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instansis`
--

DROP TABLE IF EXISTS `instansis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `instansis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_instansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_instansi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('dinas','puskesmas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `instansis_kecamatan_id_foreign` (`kecamatan_id`),
  CONSTRAINT `instansis_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instansis`
--

LOCK TABLES `instansis` WRITE;
/*!40000 ALTER TABLE `instansis` DISABLE KEYS */;
INSERT INTO `instansis` VALUES (1,'Puskesmas Pilolodaa','1071177','Rumah Sakit Umum Daerah Otanaha, Jl. Usman Isa, Pilolodaa, Kec. Kota Bar., Kota Gorontalo, Gorontalo 96181','puskesmas',1,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(2,'Puskesmas Kota Barat','1071178','Jl. Rambutan, Buladu, Kec. Kota Bar., Kabupaten Gorontalo, Gorontalo 9613','puskesmas',1,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(3,'Puskesmas Dungingi','1071179','Jl. Anggur, Huangobotu, Kec. Dungingi, Kabupaten Gorontalo, Gorontalo 96136','puskesmas',4,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(4,'Puskesmas Kota Selatan','1071180','G3V3+9F5, Jl. Moh. Yamin, Limba B, Kota Sel., Kota Gorontalo, Gorontalo 96136','puskesmas',2,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(5,'Puskesmas Kota Timur','1071181','G3QG+Q87, Tamalate, Kec. Kota Tim., Kota Gorontalo, Gorontalo 96135','puskesmas',5,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(6,'Puskesmas Hulonthalangi','1071182','G3F5+QC3, Jalan Karel Satsuit Tubun, Tenda, Kec. Hulonthalangi, Kabupaten Gorontalo, Gorontalo 96133','puskesmas',9,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(7,'Puskesmas Dumbo Raya','1071183','G3C7+88H, Talumolo, Kec. Dumbo Raya, Kota Gorontalo, Gorontalo 96133','puskesmas',8,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(8,'Puskesmas Kota Utara','1071184','H389+HH7, Wongkaditi, Kec. Kota Utara, Kota Gorontalo, Gorontalo 96128','puskesmas',3,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(9,'Puskesmas Kota Tengah','1071185','H26X+79H, Jl. Sulawesi, Dulalowo, Gorontalo, Kota Gorontalo, Gorontalo 96138','puskesmas',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(10,'Puskesmas Sipatana','1071186','Jl. Tondano I, Bulotadaa, Kec. Sipatana, Kota Gorontalo, Gorontalo 96139','puskesmas',7,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(11,'Dinas Kesehatan Gorontalo','75719911','Jalan Jamaludin Malik No.52, Kota Selatan, Limba U Dua, Gorontalo, Kota Gorontalo, Gorontalo 96138','dinas',10,'2024-05-08 20:29:38','2024-05-08 20:29:38');
/*!40000 ALTER TABLE `instansis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jadwal_pelayanans`
--

DROP TABLE IF EXISTS `jadwal_pelayanans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jadwal_pelayanans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instansi_id` bigint unsigned NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_istrahat` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jadwal_pelayanans_instansi_id_foreign` (`instansi_id`),
  CONSTRAINT `jadwal_pelayanans_instansi_id_foreign` FOREIGN KEY (`instansi_id`) REFERENCES `instansis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jadwal_pelayanans`
--

LOCK TABLES `jadwal_pelayanans` WRITE;
/*!40000 ALTER TABLE `jadwal_pelayanans` DISABLE KEYS */;
/*!40000 ALTER TABLE `jadwal_pelayanans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kabkos`
--

DROP TABLE IF EXISTS `kabkos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kabkos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kabko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kabko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kabkos_kode_kabko_unique` (`kode_kabko`),
  KEY `kabkos_provinsi_id_foreign` (`provinsi_id`),
  CONSTRAINT `kabkos_provinsi_id_foreign` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kabkos`
--

LOCK TABLES `kabkos` WRITE;
/*!40000 ALTER TABLE `kabkos` DISABLE KEYS */;
INSERT INTO `kabkos` VALUES (1,'Kabupaten Gorontalo','7501',1,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(2,'Kabupaten Boalemo','7502',1,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(3,'Kabupaten Bone bolango','7503',1,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(4,'Kabupaten Pohuwato','7504',1,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(5,'Kabupaten Gorontalo Utara','7505',1,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(6,'Kota Gorontalo','7571',1,'2024-05-08 20:29:38','2024-05-08 20:29:38');
/*!40000 ALTER TABLE `kabkos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kasus`
--

DROP TABLE IF EXISTS `kasus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kasus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pasien_id` bigint unsigned NOT NULL,
  `tanggal_gigitan` date DEFAULT NULL,
  `hewan_rabies` enum('Anjing','Kucing','Kera','DLL') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_gigitan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kondisi` enum('Sembuh','Mati','Sakit') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gejala` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kasus_pasien_id_foreign` (`pasien_id`),
  CONSTRAINT `kasus_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kasus`
--

LOCK TABLES `kasus` WRITE;
/*!40000 ALTER TABLE `kasus` DISABLE KEYS */;
INSERT INTO `kasus` VALUES (4,3,'1988-04-15','Anjing','Quia distinctio Inc','Mati','TEST','2024-05-21 19:17:31','2024-05-24 22:58:57');
/*!40000 ALTER TABLE `kasus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kecamatans`
--

DROP TABLE IF EXISTS `kecamatans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kecamatans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabko_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kecamatans_kode_kecamatan_unique` (`kode_kecamatan`),
  KEY `kecamatans_kabko_id_foreign` (`kabko_id`),
  CONSTRAINT `kecamatans_kabko_id_foreign` FOREIGN KEY (`kabko_id`) REFERENCES `kabkos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kecamatans`
--

LOCK TABLES `kecamatans` WRITE;
/*!40000 ALTER TABLE `kecamatans` DISABLE KEYS */;
INSERT INTO `kecamatans` VALUES (1,'Kota Barat','757101',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(2,'Kota Seletan','757102',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(3,'Kota Utara','757103',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(4,'Dungingi','757104',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(5,'Kota Timur','757105',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(6,'Kota Tengah','757106',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(7,'Sipatana','757107',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(8,'Dumbo Raya','757108',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(9,'Hulonthalangi','757109',6,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(10,'Kota Gorontalo','757199',6,'2024-05-08 20:29:38','2024-05-08 20:29:38');
/*!40000 ALTER TABLE `kecamatans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kunjungans`
--

DROP TABLE IF EXISTS `kunjungans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kunjungans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pasien_id` bigint unsigned NOT NULL,
  `kasus_id` bigint unsigned NOT NULL,
  `tanggal_berkunjung` date DEFAULT NULL,
  `puskesmas_kunjungan` bigint unsigned NOT NULL,
  `cuci_luka` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hasil_pemeriksaan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kunjungans_pasien_id_foreign` (`pasien_id`),
  KEY `kunjungans_puskesmas_kunjungan_foreign` (`puskesmas_kunjungan`),
  KEY `kunjungans_kasus_id_foreign` (`kasus_id`),
  CONSTRAINT `kunjungans_kasus_id_foreign` FOREIGN KEY (`kasus_id`) REFERENCES `kasus` (`id`),
  CONSTRAINT `kunjungans_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasiens` (`id`) ON DELETE CASCADE,
  CONSTRAINT `kunjungans_puskesmas_kunjungan_foreign` FOREIGN KEY (`puskesmas_kunjungan`) REFERENCES `instansis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kunjungans`
--

LOCK TABLES `kunjungans` WRITE;
/*!40000 ALTER TABLE `kunjungans` DISABLE KEYS */;
INSERT INTO `kunjungans` VALUES (1,3,4,'2024-05-25',2,'Ya','Kondisi pasien membaik','2024-05-24 19:49:10','2024-05-24 19:49:10');
/*!40000 ALTER TABLE `kunjungans` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_07_23_123938_create_roles_table',1),(6,'2023_07_23_124245_create_biodatas_table',1),(7,'2023_07_23_131210_create_provinsis_table',1),(8,'2023_07_23_131227_create_kabkos_table',1),(9,'2023_07_23_131319_create_kecamatans_table',1),(10,'2023_07_23_131331_create_instansis_table',1),(11,'2024_04_11_183100_create_pasiens_table',1),(12,'2024_04_11_183938_create_imunisasis_table',1),(13,'2024_04_11_190048_create_pengaduans_table',1),(14,'2024_04_13_040814_create_jadwal_pelayanans_table',1),(15,'2024_04_13_060343_create_tanggapans_table',1),(16,'2024_04_13_091327_create_petugas_table',1),(17,'2024_04_14_031809_create_kunjungans_table',1),(18,'2024_04_14_032214_create_kasus_table',1),(19,'2024_04_11_183940_create_imunisasis_table',2),(20,'2024_04_14_031811_create_kunjungans_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasiens`
--

DROP TABLE IF EXISTS `pasiens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pasiens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `biodata_id` bigint unsigned NOT NULL,
  `nomor_register` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pasiens_biodata_id_foreign` (`biodata_id`),
  CONSTRAINT `pasiens_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodatas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasiens`
--

LOCK TABLES `pasiens` WRITE;
/*!40000 ALTER TABLE `pasiens` DISABLE KEYS */;
INSERT INTO `pasiens` VALUES (3,5,'0001-22May2024-AQEN','2024-05-21 19:17:31','2024-05-21 19:17:31');
/*!40000 ALTER TABLE `pasiens` ENABLE KEYS */;
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
  PRIMARY KEY (`email`)
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
-- Table structure for table `pengaduans`
--

DROP TABLE IF EXISTS `pengaduans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengaduans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengadu_id` bigint unsigned NOT NULL,
  `judul_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_pengaduan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengaduans_pengadu_id_foreign` (`pengadu_id`),
  CONSTRAINT `pengaduans_pengadu_id_foreign` FOREIGN KEY (`pengadu_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaduans`
--

LOCK TABLES `pengaduans` WRITE;
/*!40000 ALTER TABLE `pengaduans` DISABLE KEYS */;
INSERT INTO `pengaduans` VALUES (1,5,'askdjaskd','kajsdkj','proses','2024-06-05 18:26:34','2024-06-05 19:19:37'),(2,5,'Data Vaksin Tidak Muncul','Bu, Maaf saya perwakilan dari si bal bla bla. ini data vaksin var rabiesnya nggak muncul. padahal sudah dilakukan imunisasi. dimana nomor register nya adalah #0001-22May2024-AQEN','proses','2024-06-05 19:25:49','2024-06-05 19:28:42'),(3,5,'Imunisasi Var','Bu kapan saya bisa imunisasi var lagi? dimana tanggal imunisasi saya 16 januari 2024','proses','2024-06-05 19:32:46','2024-06-05 19:33:24');
/*!40000 ALTER TABLE `pengaduans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `petugas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `instansi_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `petugas_instansi_id_foreign` (`instansi_id`),
  KEY `petugas_user_id_foreign` (`user_id`),
  CONSTRAINT `petugas_instansi_id_foreign` FOREIGN KEY (`instansi_id`) REFERENCES `instansis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `petugas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` VALUES (1,2,2,'2024-05-08 20:31:30','2024-05-08 20:31:30'),(2,11,6,'2024-05-24 15:06:45','2024-05-24 15:06:45');
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinsis`
--

DROP TABLE IF EXISTS `provinsis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provinsis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provinsis_kode_provinsi_unique` (`kode_provinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinsis`
--

LOCK TABLES `provinsis` WRITE;
/*!40000 ALTER TABLE `provinsis` DISABLE KEYS */;
INSERT INTO `provinsis` VALUES (1,'Gorontalo','75','2024-05-08 20:29:38','2024-05-08 20:29:38');
/*!40000 ALTER TABLE `provinsis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nama_role_unique` (`nama_role`),
  UNIQUE KEY `roles_level_role_unique` (`level_role`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','super_admin','2024-05-08 20:29:38','2024-05-08 20:29:38'),(2,'Penanggung Jawab Puskesmas','pj_puskes','2024-05-08 20:29:38','2024-05-08 20:29:38'),(3,'Penganggung Jawab Dinas Kesehatan Kota','pj_dinkes_kota','2024-05-08 20:29:38','2024-05-08 20:29:38'),(4,'Penganggung Jawab Dinas Kesehatan Provinsi','pj_dinkes_prov','2024-05-08 20:29:38','2024-05-08 20:29:38'),(5,'Pasien','pasien','2024-05-08 20:29:38','2024-05-08 20:29:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tanggapans`
--

DROP TABLE IF EXISTS `tanggapans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tanggapans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengaduan_id` bigint unsigned NOT NULL,
  `petugas_id` bigint unsigned NOT NULL,
  `tanggapan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tanggapans_pengaduan_id_foreign` (`pengaduan_id`),
  KEY `tanggapans_petugas_id_foreign` (`petugas_id`),
  CONSTRAINT `tanggapans_pengaduan_id_foreign` FOREIGN KEY (`pengaduan_id`) REFERENCES `pengaduans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tanggapans_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tanggapans`
--

LOCK TABLES `tanggapans` WRITE;
/*!40000 ALTER TABLE `tanggapans` DISABLE KEYS */;
INSERT INTO `tanggapans` VALUES (1,1,2,'askdajdkjajk','2024-06-05 19:19:37','2024-06-05 19:19:37'),(2,2,2,'Oh iyah, nnti akan di tindak lanjuti. mohon bersabar dengan terus melakukan pengecakan laporannya secara berkala untuk melihat respon dari petugas','2024-06-05 19:28:42','2024-06-05 19:28:42'),(3,3,2,'Oh iya, nnti suru datang aja ke puskesmas yang jadwal terbuka pada tanggal 20 januari 2024','2024-06-05 19:33:23','2024-06-05 19:33:23');
/*!40000 ALTER TABLE `tanggapans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `biodata_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  KEY `users_biodata_id_foreign` (`biodata_id`),
  CONSTRAINT `users_biodata_id_foreign` FOREIGN KEY (`biodata_id`) REFERENCES `biodatas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'super.admin',NULL,'$2y$10$pI1RuxvlNlB3rJE43.Sc0ejixcCCZ3HpxE4v5jVBmJiwiKvCg8Fu2',1,1,'2024-05-08 20:29:38','2024-05-08 20:29:38'),(2,'kotbar',NULL,'$2y$10$hnPCnwTbEyjgX1/EHTf9F.lhaOBJYwHJRsv1KHYkhx7cDW1yM1idS',2,2,'2024-05-08 20:31:30','2024-05-08 20:31:30'),(5,'0001-22May2024-AQEN',NULL,'$2y$10$beRGSnbuZ8d/N/0ETJd2SePPjWECvMPsNIr176.0BpFHdOTnDLFga',5,5,'2024-05-21 19:17:31','2024-05-21 19:17:31'),(6,'etyana',NULL,'$2y$10$ruah6Q78bR3F5vFZjynMROXysDQ02vHR7eWbHxQOd4YwHorf1u4O.',3,6,'2024-05-24 15:06:45','2024-05-24 15:06:45');
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

-- Dump completed on 2024-06-10 10:06:41
