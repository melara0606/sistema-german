-- MySQL dump 10.13  Distrib 5.7.18, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sisverapaz
-- ------------------------------------------------------
-- Server version	5.7.18-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bitacora_proyectos`
--

DROP TABLE IF EXISTS `bitacora_proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora_proyectos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `accion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bitacora_proyectos_proyecto_id_foreign` (`proyecto_id`),
  CONSTRAINT `bitacora_proyectos_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_proyectos`
--

LOCK TABLES `bitacora_proyectos` WRITE;
/*!40000 ALTER TABLE `bitacora_proyectos` DISABLE KEYS */;
INSERT INTO `bitacora_proyectos` VALUES (1,'09:08:37','2018-05-28','Registro el presupuesto de MATERIALES ',1,'2018-05-28 15:08:37','2018-05-28 15:08:37'),(2,'09:10:31','2018-05-28','El proyecto pasó a esperar la realización de la solicitud de cotizacion',1,'2018-05-28 15:10:31','2018-05-28 15:10:31');
/*!40000 ALTER TABLE `bitacora_proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacoras`
--

DROP TABLE IF EXISTS `bitacoras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacoras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `registro` date NOT NULL,
  `hora` time NOT NULL,
  `accion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bitacoras_user_id_foreign` (`user_id`),
  CONSTRAINT `bitacoras_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacoras`
--

LOCK TABLES `bitacoras` WRITE;
/*!40000 ALTER TABLE `bitacoras` DISABLE KEYS */;
INSERT INTO `bitacoras` VALUES (1,'2018-05-28','08:33:48','inicio de sesion',1,'2018-05-28 14:33:48','2018-05-28 14:33:48'),(2,'2018-05-28','08:43:30','Registró un proyecto',1,'2018-05-28 14:43:30','2018-05-28 14:43:30'),(3,'2018-05-28','09:11:07','Creó un registro',1,'2018-05-28 15:11:07','2018-05-28 15:11:07'),(4,'2018-05-28','09:11:23','Creó un registro',1,'2018-05-28 15:11:23','2018-05-28 15:11:23'),(5,'2018-05-28','09:15:46','Registró una cotización',1,'2018-05-28 15:15:46','2018-05-28 15:15:46'),(6,'2018-05-28','14:05:19','Registró una cotización',1,'2018-05-28 20:05:19','2018-05-28 20:05:19'),(7,'2018-05-28','15:20:22','Cerró Sesión del sistema',1,'2018-05-28 21:20:22','2018-05-28 21:20:22'),(8,'2018-05-29','07:58:58','inicio de sesion',1,'2018-05-29 13:58:58','2018-05-29 13:58:58');
/*!40000 ALTER TABLE `bitacoras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calendarizacions`
--

DROP TABLE IF EXISTS `calendarizacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendarizacions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `evento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendarizacions`
--

LOCK TABLES `calendarizacions` WRITE;
/*!40000 ALTER TABLE `calendarizacions` DISABLE KEYS */;
/*!40000 ALTER TABLE `calendarizacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogos`
--

DROP TABLE IF EXISTS `catalogos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_medida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogos`
--

LOCK TABLES `catalogos` WRITE;
/*!40000 ALTER TABLE `catalogos` DISABLE KEYS */;
INSERT INTO `catalogos` VALUES (1,'CEMENTO','BOLSA','2018-05-28 14:45:43','2018-05-28 14:45:43',1),(2,'CLAVOS 3/4','LIBRA','2018-05-28 14:46:23','2018-05-28 14:46:23',1),(3,'CLAVO 3/8','LIBRA','2018-05-28 14:48:58','2018-05-28 14:48:58',1),(4,'GASOLINA','GALÓN','2018-05-28 15:03:52','2018-05-28 15:03:52',1);
/*!40000 ALTER TABLE `catalogos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'1.0','MATERIALES','2018-05-28 14:45:03','2018-05-28 14:45:03');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `construccions`
--

DROP TABLE IF EXISTS `construccions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `construccions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contribuyente_id` bigint(20) unsigned NOT NULL,
  `direccion_construccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presupuesto` double(8,2) NOT NULL,
  `impuesto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `construccions_contribuyente_id_foreign` (`contribuyente_id`),
  KEY `construccions_impuesto_id_foreign` (`impuesto_id`),
  CONSTRAINT `construccions_contribuyente_id_foreign` FOREIGN KEY (`contribuyente_id`) REFERENCES `contribuyentes` (`id`),
  CONSTRAINT `construccions_impuesto_id_foreign` FOREIGN KEY (`impuesto_id`) REFERENCES `impuestos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `construccions`
--

LOCK TABLES `construccions` WRITE;
/*!40000 ALTER TABLE `construccions` DISABLE KEYS */;
/*!40000 ALTER TABLE `construccions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratoproyectos`
--

DROP TABLE IF EXISTS `contratoproyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratoproyectos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` bigint(20) unsigned NOT NULL,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `cargo_id` bigint(20) unsigned NOT NULL,
  `salario` double(8,2) NOT NULL,
  `funciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo_contratacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo_baja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `inicio_contrato` date NOT NULL,
  `fin_contrato` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contratoproyectos_proyecto_id_foreign` (`proyecto_id`),
  KEY `contratoproyectos_empleado_id_foreign` (`empleado_id`),
  KEY `contratoproyectos_cargo_id_foreign` (`cargo_id`),
  CONSTRAINT `contratoproyectos_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  CONSTRAINT `contratoproyectos_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  CONSTRAINT `contratoproyectos_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratoproyectos`
--

LOCK TABLES `contratoproyectos` WRITE;
/*!40000 ALTER TABLE `contratoproyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratoproyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` bigint(20) unsigned NOT NULL,
  `tipocontrato_id` bigint(20) unsigned NOT NULL,
  `cargo_id` bigint(20) unsigned NOT NULL,
  `salario` double(8,2) NOT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inicio_contrato` date NOT NULL,
  `fin_contrato` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `fecha_aprobacion` date NOT NULL,
  `fecha_revision` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `contratos_tipocontrato_id_foreign` (`tipocontrato_id`),
  KEY `contratos_empleado_id_foreign` (`empleado_id`),
  KEY `contratos_cargo_id_foreign` (`cargo_id`),
  CONSTRAINT `contratos_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  CONSTRAINT `contratos_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  CONSTRAINT `contratos_tipocontrato_id_foreign` FOREIGN KEY (`tipocontrato_id`) REFERENCES `tipocontratos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contribuyentes`
--

DROP TABLE IF EXISTS `contribuyentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contribuyentes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dui` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacimiento` date NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechabaja` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contribuyentes`
--

LOCK TABLES `contribuyentes` WRITE;
/*!40000 ALTER TABLE `contribuyentes` DISABLE KEYS */;
INSERT INTO `contribuyentes` VALUES (1,'Carolanne Cormier','64730762-1','5754-62315-233-0','1986-04-05','96967 Francisca Circle\nLake Durward, FL 93627-1221','6644-3650','Másculino',1,NULL,NULL,'2018-05-28 14:38:57','2018-05-28 14:38:57'),(2,'Mitchel Orn','50474506-0','791-788693-384-0','1975-05-12','389 Crooks Ridge Suite 946\nNew Christy, AR 00448-5473','6726-7655','Másculino',1,NULL,NULL,'2018-05-28 14:38:57','2018-05-28 14:38:57'),(3,'Elza Denesik','68226552-1','5870-141143-350-1','1990-12-15','826 Fay Village Apt. 179\nNorth Olaburgh, MO 22919-9722','6629-8038','Másculino',1,NULL,NULL,'2018-05-28 14:38:57','2018-05-28 14:38:57'),(4,'Evie Lebsack','35214594-0','1581-733514-277-0','1996-03-22','749 Raquel Inlet Suite 750\nEast Goldaton, NY 16541','7609-487','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(5,'Carroll Pagac','74740080-0','9231-985928-660-0','1990-01-24','159 Dagmar Corners\nArlieburgh, SC 15581-8329','7989-6267','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(6,'Mr. Howard Roob Sr.','4206307-0','8420-823799-442-0','1990-09-02','82011 Connelly Centers\nZemlakborough, NY 18468-1190','6322-6974','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(7,'Miss Kristina Berge','27143657-1','3464-215229-17-0','1972-01-19','905 Cummerata Flat Suite 090\nLake Jude, WY 43511','6702-5436','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(8,'Dr. Torey Hilll III','80759268-0','8310-915705-680-1','1982-09-20','881 Jerald Ports Suite 820\nHeberside, CA 02259','6290-5668','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(9,'Ms. Alyson Lind','75676519-0','578-513789-111-1','1981-04-17','12262 Wyman Oval\nEast Florianmouth, LA 98291-9289','6086-1803','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(10,'Mrs. Amina Miller IV','11998925-0','7402-842693-385-1','1996-03-13','28985 Theresia Ford Apt. 616\nPort Jairo, GA 35873-4398','7216-1751','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(11,'Mr. Sean Gusikowski DDS','28556494-1','4352-632313-666-0','1997-06-17','683 Jessika Forge Suite 000\nMacejkovicbury, NJ 38648','7475-5165','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(12,'Mr. Noel Cummerata','29740204-1','142-432831-593-1','1981-02-25','1838 Roger Camp\nNorth Toyfurt, AR 88992','6973-3676','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(13,'Dr. Maci Ritchie PhD','45206603-1','6266-864102-437-0','1988-09-05','41811 Roxane Turnpike Apt. 664\nNorth Lola, UT 91028','6488-7199','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(14,'Reina Stanton Sr.','96523208-1','3667-644946-8-1','1979-03-22','85371 Swift Rue\nAbbotthaven, PA 11034','7349-8944','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(15,'Donald Bechtelar','73331582-0','6920-322205-557-1','1972-03-18','693 Makenzie Estates\nNew Tiffany, ID 68692','7151-5504','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(16,'Tyra Bauch','33238362-0','6062-965542-927-1','1980-09-05','10741 Hirthe Street\nWest Judge, FL 61678-9549','6737-5384','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(17,'Darrick Barton','29805203-1','9671-789649-659-0','1971-06-13','333 Lubowitz Keys Apt. 454\nEast Nadialand, DE 14228','6977-4484','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(18,'Mr. Domenic Denesik I','61972680-1','9752-886611-887-0','1981-02-02','239 Hassie Burgs Suite 484\nKathryneport, DC 93067','6826-4590','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(19,'Lilly Dare','45872889-0','5236-988302-842-0','1973-05-11','771 Ullrich Circles\nJedburgh, AK 43896','6897-6660','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(20,'Stuart VonRueden','80490814-0','1827-448638-224-1','1991-12-09','7197 Casper Forks Apt. 314\nPowlowskibury, OR 48902-2648','6646-1725','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(21,'Janet Kihn Sr.','88548576-1','1737-516556-792-0','1991-06-22','7057 Alexandre Cove Suite 298\nLisandrotown, KY 51819','6902-8531','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(22,'Violet Wolff','7516492-0','3921-360041-821-0','1986-09-08','92643 Eusebio Springs\nKeelingstad, AK 49124','7406-7944','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(23,'Collin Sipes','50361090-0','5788-528507-793-1','1973-02-02','16310 Vicenta Fort Apt. 409\nEveretteport, DE 47348','7205-6244','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(24,'Arnoldo Prohaska','90378271-0','667-384176-283-1','1977-05-19','787 Boehm Lane\nJordyport, TX 30772','7142-3915','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(25,'Herbert Schmidt','39845942-0','356-159703-23-1','1972-01-31','93171 Kattie Radial Apt. 323\nAnastasiaborough, NE 65415','6801-6284','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(26,'Jarret Pfannerstill V','93728232-0','710-405819-491-1','1978-08-11','96515 Abbigail Gardens\nNew Barbaraland, DE 81552-3365','7078-4681','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(27,'Lue Swaniawski','53095451-1','8141-291490-648-1','1999-07-12','1942 Joseph Knoll\nNorth Ericahaven, ME 83315-1418','6113-2679','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(28,'Kennedy Murray DVM','31967296-1','5781-463160-546-1','1992-08-09','1567 Fritz Centers Suite 531\nGreenholtland, WY 16149-0818','6488-844','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(29,'Jazmyne Nolan','21671680-0','1566-965517-846-0','1997-09-22','9800 Roberts Ridge\nEast Reymundo, NY 58799','7543-9425','Másculino',1,NULL,NULL,'2018-05-28 14:38:58','2018-05-28 14:38:58'),(30,'Randi Sipes','89986246-0','882-155648-907-1','1991-10-05','56758 Emmett Pines\nGaylordchester, SC 20022','7109-2234','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(31,'Morton Wolff','92061401-1','586-664372-369-1','1992-06-20','51263 Cecelia Dale Apt. 853\nEast Remingtonshire, KS 07160-4527','6488-2707','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(32,'Hillary Conroy','43319889-1','9005-481921-678-1','1971-02-10','108 White Freeway Suite 345\nBerniemouth, MO 46057-4771','7159-341','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(33,'Leonardo Ebert','97230283-0','5066-177112-636-0','1973-09-03','807 Labadie Pines\nMcLaughlinview, KS 38720','7207-3239','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(34,'Alverta Rowe','63693837-0','18-340126-740-1','1984-10-20','5756 Laurel Turnpike\nZechariahview, AK 08640','6053-9816','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(35,'Alexane Emmerich Jr.','27796429-0','715-555409-579-0','1983-09-08','59472 Kuhic Brooks\nKuhnville, OR 19660','6814-5988','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(36,'Mr. Kevin Bradtke III','82391720-0','4599-436992-462-0','1993-04-23','461 Boyer Flats Apt. 293\nEviefurt, AL 49161','7211-4106','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(37,'Edd Baumbach','68318529-1','4819-739192-136-0','1971-02-05','30622 Devon Land Suite 710\nNew Jabari, RI 28458-9593','6441-6318','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(38,'Rachael Jakubowski','39751019-1','4533-311568-105-1','1978-07-23','24257 Nienow Roads Apt. 250\nLake Eleonore, AR 70582-8040','6036-6273','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(39,'Jaclyn Rosenbaum','63554664-1','9177-141402-645-0','1973-08-27','9920 Tremblay Fields\nWunschton, PA 38303-0735','7689-23','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(40,'Eloise McDermott','5878635-1','793-519104-862-0','1995-08-23','9128 Mann Key\nNorth Zachariahshire, VT 75057','7185-2713','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(41,'Omer Kovacek','15653318-1','7303-251802-184-1','1977-05-12','55630 Enoch Island\nDouglasville, FL 67063-9778','6496-8205','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(42,'Ms. Gia Bogisich','83448276-0','6839-926758-881-0','1981-04-25','864 Hoyt Gateway\nSouth Loraview, TN 82306-2038','6065-6440','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(43,'Prof. Dorothy Johnson DDS','74261807-0','5037-552000-430-1','1988-01-26','81488 Coby Fort Apt. 328\nAnkundingville, NH 45613','6409-3897','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(44,'Name Gottlieb MD','90220517-1','1603-261203-710-0','1974-05-25','962 Stark Vista\nLeschport, TX 78046','6906-5505','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(45,'Mr. Andres Lakin','31336549-1','6311-580879-627-1','1997-05-29','39230 Homenick Mills\nNorth Dolly, KS 53936','6069-6729','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(46,'Percival Keeling','38063442-1','1334-970574-740-0','1993-03-10','816 Magdalen Common\nWest Nicola, PA 41486-1703','7003-1187','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(47,'Mr. Arnoldo Barrows','85902226-0','5847-830603-840-1','1984-07-20','710 Senger Burg Apt. 860\nMorissetteland, IL 69447','7690-9646','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(48,'Kobe Raynor','17294463-1','9980-510236-680-0','1993-11-26','60912 Spencer Highway Apt. 807\nEast Rodberg, TN 50498-7669','7454-6117','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(49,'Giuseppe Ortiz','1004839-0','9925-950076-633-1','1999-09-10','83708 Winston Plains Suite 944\nNorth Adahbury, WI 00629-9573','7210-3440','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(50,'Dr. Katlyn Johnston','79495225-1','1808-548348-896-0','1989-01-17','869 Jacobson Spur Apt. 068\nFredericport, ID 82652','7524-8330','Másculino',1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59');
/*!40000 ALTER TABLE `contribuyentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `correosolicituds`
--

DROP TABLE IF EXISTS `correosolicituds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `correosolicituds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `solicitudcotizacion_id` bigint(20) unsigned NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `correosolicituds_solicitudcotizacion_id_foreign` (`solicitudcotizacion_id`),
  CONSTRAINT `correosolicituds_solicitudcotizacion_id_foreign` FOREIGN KEY (`solicitudcotizacion_id`) REFERENCES `solicitudcotizacions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `correosolicituds`
--

LOCK TABLES `correosolicituds` WRITE;
/*!40000 ALTER TABLE `correosolicituds` DISABLE KEYS */;
/*!40000 ALTER TABLE `correosolicituds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cotizacions`
--

DROP TABLE IF EXISTS `cotizacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cotizacions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor_id` bigint(20) unsigned NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seleccionado` tinyint(1) NOT NULL DEFAULT '0',
  `presupuestosolicitud_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cotizacions_proveedor_id_foreign` (`proveedor_id`),
  KEY `cotizacions_presupuestosolicitud_id_foreign` (`presupuestosolicitud_id`),
  CONSTRAINT `cotizacions_presupuestosolicitud_id_foreign` FOREIGN KEY (`presupuestosolicitud_id`) REFERENCES `presupuesto_solicituds` (`id`),
  CONSTRAINT `cotizacions_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizacions`
--

LOCK TABLES `cotizacions` WRITE;
/*!40000 ALTER TABLE `cotizacions` DISABLE KEYS */;
INSERT INTO `cotizacions` VALUES (1,1,'plazo 120 dias',1,'2018-05-28 15:15:45','2018-05-28 15:15:45',0,1),(2,8,'plazo 60 dias',1,'2018-05-28 20:05:18','2018-05-28 20:05:18',0,1);
/*!40000 ALTER TABLE `cotizacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentaprincipals`
--

DROP TABLE IF EXISTS `cuentaprincipals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentaprincipals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `numero_de_cuenta` int(11) NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `monto_inicial` double(8,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentaprincipals`
--

LOCK TABLES `cuentaprincipals` WRITE;
/*!40000 ALTER TABLE `cuentaprincipals` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentaprincipals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentaproys`
--

DROP TABLE IF EXISTS `cuentaproys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentaproys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `numero_cuenta` bigint(20) DEFAULT NULL,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto_inicial` double(8,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `fecha_de_reasignacion` date DEFAULT NULL,
  `motivo_reasignacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuentaproys_proyecto_id_foreign` (`proyecto_id`),
  CONSTRAINT `cuentaproys_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentaproys`
--

LOCK TABLES `cuentaproys` WRITE;
/*!40000 ALTER TABLE `cuentaproys` DISABLE KEYS */;
INSERT INTO `cuentaproys` VALUES (1,NULL,1,NULL,5000.00,1,NULL,NULL,'2018-05-28 14:43:30','2018-05-28 14:43:30');
/*!40000 ALTER TABLE `cuentaproys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuentas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `numero_cuenta` bigint(20) NOT NULL,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_de_apertura` date NOT NULL,
  `monto_inicial` double(8,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `fecha_de_reasignacion` date DEFAULT NULL,
  `motivo_reasignacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuentas_proyecto_id_foreign` (`proyecto_id`),
  CONSTRAINT `cuentas_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallecotizacions`
--

DROP TABLE IF EXISTS `detallecotizacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallecotizacions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cotizacion_id` bigint(20) unsigned NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidad_medida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detallecotizacions_cotizacion_id_foreign` (`cotizacion_id`),
  CONSTRAINT `detallecotizacions_cotizacion_id_foreign` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizacions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallecotizacions`
--

LOCK TABLES `detallecotizacions` WRITE;
/*!40000 ALTER TABLE `detallecotizacions` DISABLE KEYS */;
INSERT INTO `detallecotizacions` VALUES (1,1,'CEMENTO','holcin','BOLSA',30,7.8,'2018-05-28 15:15:45','2018-05-28 15:15:45'),(2,1,'CLAVO 3/8',NULL,'LIBRA',2,2.1,'2018-05-28 15:15:45','2018-05-28 15:15:45'),(3,1,'CLAVOS 3/4',NULL,'LIBRA',3,1.9,'2018-05-28 15:15:45','2018-05-28 15:15:45'),(4,1,'GASOLINA',NULL,'GALÓN',2,4.7,'2018-05-28 15:15:46','2018-05-28 15:15:46'),(5,2,'CEMENTO','cemex','BOLSA',30,6.89,'2018-05-28 20:05:18','2018-05-28 20:05:18'),(6,2,'CLAVO 3/8',NULL,'LIBRA',2,2,'2018-05-28 20:05:18','2018-05-28 20:05:18'),(7,2,'CLAVOS 3/4',NULL,'LIBRA',3,1.8,'2018-05-28 20:05:19','2018-05-28 20:05:19'),(8,2,'GASOLINA',NULL,'GALÓN',2,4.67,'2018-05-28 20:05:19','2018-05-28 20:05:19');
/*!40000 ALTER TABLE `detallecotizacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dui` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_fijo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `num_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_contribuyente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_seguro_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_afp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(10) unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Mario René Cardoza','9097897','687678','Másculino','8798-9789','7879-8798','apastepeque','1990-12-03',NULL,NULL,NULL,NULL,1,'2018-05-24 21:06:57','2018-05-24 21:06:57');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fondocats`
--

DROP TABLE IF EXISTS `fondocats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fondocats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fondocats`
--

LOCK TABLES `fondocats` WRITE;
/*!40000 ALTER TABLE `fondocats` DISABLE KEYS */;
INSERT INTO `fondocats` VALUES (1,'FODES','2018-05-28 14:43:18','2018-05-28 14:43:18');
/*!40000 ALTER TABLE `fondocats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fondoorgs`
--

DROP TABLE IF EXISTS `fondoorgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fondoorgs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `organizacion_id` bigint(20) unsigned NOT NULL,
  `monto` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fondoorgs_proyecto_id_foreign` (`proyecto_id`),
  KEY `fondoorgs_organizacion_id_foreign` (`organizacion_id`),
  CONSTRAINT `fondoorgs_organizacion_id_foreign` FOREIGN KEY (`organizacion_id`) REFERENCES `organizacions` (`id`),
  CONSTRAINT `fondoorgs_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fondoorgs`
--

LOCK TABLES `fondoorgs` WRITE;
/*!40000 ALTER TABLE `fondoorgs` DISABLE KEYS */;
/*!40000 ALTER TABLE `fondoorgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fondos`
--

DROP TABLE IF EXISTS `fondos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fondos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `fondocat_id` bigint(20) unsigned NOT NULL,
  `monto` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fondos_proyecto_id_foreign` (`proyecto_id`),
  KEY `fondos_fondocat_id_foreign` (`fondocat_id`),
  CONSTRAINT `fondos_fondocat_id_foreign` FOREIGN KEY (`fondocat_id`) REFERENCES `fondocats` (`id`),
  CONSTRAINT `fondos_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fondos`
--

LOCK TABLES `fondos` WRITE;
/*!40000 ALTER TABLE `fondos` DISABLE KEYS */;
INSERT INTO `fondos` VALUES (1,1,1,5000.00,'2018-05-28 14:43:30','2018-05-28 14:43:30');
/*!40000 ALTER TABLE `fondos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formapagos`
--

DROP TABLE IF EXISTS `formapagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formapagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formapagos`
--

LOCK TABLES `formapagos` WRITE;
/*!40000 ALTER TABLE `formapagos` DISABLE KEYS */;
INSERT INTO `formapagos` VALUES (1,'Credito 30 días',1,'2018-05-28 15:11:07','2018-05-28 15:11:07'),(2,'Credito 90 días',1,'2018-05-28 15:11:23','2018-05-28 15:11:23');
/*!40000 ALTER TABLE `formapagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impuestos`
--

DROP TABLE IF EXISTS `impuestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impuestos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tiposervicio_id` bigint(20) unsigned NOT NULL,
  `impuesto` double(2,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechabaja` date DEFAULT NULL,
  `acuerdo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `impuestos_tiposervicio_id_foreign` (`tiposervicio_id`),
  CONSTRAINT `impuestos_tiposervicio_id_foreign` FOREIGN KEY (`tiposervicio_id`) REFERENCES `tiposervicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impuestos`
--

LOCK TABLES `impuestos` WRITE;
/*!40000 ALTER TABLE `impuestos` DISABLE KEYS */;
/*!40000 ALTER TABLE `impuestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inmuebles`
--

DROP TABLE IF EXISTS `inmuebles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inmuebles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `numero_catastral` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contribuyente_id` bigint(20) unsigned NOT NULL,
  `direccion_inmueble` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medida_inmueble` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_escritura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metros_acera` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inmuebles_contribuyente_id_foreign` (`contribuyente_id`),
  CONSTRAINT `inmuebles_contribuyente_id_foreign` FOREIGN KEY (`contribuyente_id`) REFERENCES `contribuyentes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inmuebles`
--

LOCK TABLES `inmuebles` WRITE;
/*!40000 ALTER TABLE `inmuebles` DISABLE KEYS */;
/*!40000 ALTER TABLE `inmuebles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licitacions`
--

DROP TABLE IF EXISTS `licitacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licitacions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licitacions`
--

LOCK TABLES `licitacions` WRITE;
/*!40000 ALTER TABLE `licitacions` DISABLE KEYS */;
/*!40000 ALTER TABLE `licitacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_09_11_104511_create_empleados_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2017_06_05_105604_create_cargos_table',1),(5,'2017_09_06_134122_create_proveedors_table',1),(6,'2017_09_11_093258_create_tipocontratos_table',1),(7,'2017_09_11_152905_create_contratos_table',1),(8,'2017_09_11_194559_create_bitacoras_table',1),(9,'2017_10_11_113504_create_contribuyentes_table',1),(10,'2017_10_18_101023_create_organizacions_table',1),(11,'2017_10_18_105504_create_proyectos_table',1),(12,'2017_11_01_084839_create_rubros_table',1),(13,'2017_11_01_084959_create_tiposervicios_table',1),(14,'2017_11_01_111613_create_impuestos_table',1),(15,'2017_11_08_092815_create_inmuebles_table',1),(16,'2017_11_09_115227_create_presupuestos_table',1),(17,'2017_11_10_124137_create_cotizacions_table',1),(18,'2017_11_10_143305_create_ordencompras_table',1),(19,'2017_11_10_144042_create_detallecotizacions_table',1),(20,'2017_11_13_115302_create_presupuestodetalles_table',1),(21,'2017_11_14_101809_create_licitacions_table',1),(22,'2017_11_14_141355_create_formapagos_table',1),(23,'2017_11_15_105253_create_solicitudcotizacions_table',1),(24,'2017_11_17_112256_create_paacs_table',1),(25,'2017_11_17_112537_create_paacdetalles_table',1),(26,'2017_11_17_140344_create_requisicions_table',1),(27,'2017_11_17_140448_create_requisiciondetalles_table',1),(28,'2017_11_23_101048_create_negocios_table',1),(29,'2017_11_27_143030_create_procedimiento_paac',1),(30,'2017_12_17_084158_create_cuentaproys_table',1),(31,'2017_12_18_090915_create_tipopagos_table',1),(32,'2017_12_18_102015_create_cuentas_table',1),(33,'2017_12_18_111430_create_pagos_table',1),(34,'2017_12_18_153515_create_cuentaprincipals_table',1),(35,'2017_12_22_135809_create_retencions_table',1),(36,'2017_12_22_151201_create_planillas_table',1),(37,'2018_01_04_110425_create_construccions_table',1),(38,'2018_01_05_111054_add_cuenta_id-to_cuentas',1),(39,'2018_01_05_140241_create_prestamos_table',1),(40,'2018_02_03_165427_add_columns_negocios',1),(41,'2018_02_05_191729_create_fondocats_table',1),(42,'2018_02_05_195655_create_fondos_table',1),(43,'2018_02_14_090742_create_fondoorgs_table',1),(44,'2018_02_15_131020_create_tipocobros_table',1),(45,'2018_02_16_114954_add-colums-detallepresu',1),(46,'2018_02_19_143311_create_unidads_table',1),(47,'2018_02_20_163033_create_presupuestounidads_table',1),(48,'2018_02_20_163259_create_presupuestounidaddetalles_table',1),(49,'2018_02_21_135327_add-column-bolean',1),(50,'2018_02_22_134451_create_calendarizacions_table',1),(51,'2018_02_27_100627_create_correosolicituds_table',1),(52,'2018_03_01_101115_add_arguments_to_cotizacions_table',1),(53,'2018_03_01_101258_add_arguments_to_detallecotizacions_table',1),(54,'2018_03_13_152230_add_campos_to_ordencompras',1),(55,'2018_03_17_130500_create_categorias_table',1),(56,'2018_03_17_140107_create_catalogos_table',1),(57,'2018_03_18_125126_add_catalogo_id_to_presupuestodetalles',1),(58,'2018_03_20_084050_update_cotizacions_table_foreign',1),(59,'2018_03_20_090518_update_solicitudcotizacions_table_foreign',1),(60,'2018_03_26_101005_add_campos_darbaja_to_proyectos',1),(61,'2018_03_26_141408_add_estado_to_ordencompras',1),(62,'2018_04_09_101517_add_estado_y_otros_to_solicitudcotizacions',1),(63,'2018_04_14_133406_add_campos_to__contratos',1),(64,'2018_04_16_110307_add_numero_solicitud_a_solicitudcotizaciones',1),(65,'2018_04_17_105052_create_contratoproyectos_table',1),(66,'2018_04_18_091404_create_presupuesto_solicituds_table',1),(67,'2018_04_18_112747_cambiar_presupuesto_id_por_presupuestosolicitud_id_a_cotizacion',1),(68,'2018_04_20_084256_agregar_estado_y_categoria_id_a_presupuestos',1),(69,'2018_04_23_082345_cambiar_presupuesto_por_presu_a_presupuestos',1),(70,'2018_04_23_083536_cambiar_presupuesto_por_presu_a_proyectos',1),(71,'2018_04_26_103455_create_proyecto_inventarios_table',1),(72,'2018_05_08_085107_create_unidad_medidas_table',1),(73,'2018_05_11_154313_create_bitacora_proyectos_table',1),(74,'2018_05_16_094329_agregar_categoria_id_a_catalogos_table',1),(75,'2018_05_22_083628_borrar_proyecto_id_requisiciones',1),(76,'2018_05_22_101931_borrar_codigo_de_requisiciondetalles',1),(77,'2018_05_28_095055_agregar_actividad_a_requisicion',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `negocios`
--

DROP TABLE IF EXISTS `negocios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `negocios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contribuyente_id` bigint(20) unsigned NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rubro_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double(8,2) NOT NULL DEFAULT '0.00',
  `lng` double(8,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `negocios_rubro_id_foreign` (`rubro_id`),
  KEY `negocios_contribuyente_id_foreign` (`contribuyente_id`),
  CONSTRAINT `negocios_contribuyente_id_foreign` FOREIGN KEY (`contribuyente_id`) REFERENCES `contribuyentes` (`id`),
  CONSTRAINT `negocios_rubro_id_foreign` FOREIGN KEY (`rubro_id`) REFERENCES `rubros` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `negocios`
--

LOCK TABLES `negocios` WRITE;
/*!40000 ALTER TABLE `negocios` DISABLE KEYS */;
/*!40000 ALTER TABLE `negocios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ordencompras`
--

DROP TABLE IF EXISTS `ordencompras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ordencompras` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cotizacion_id` bigint(20) unsigned NOT NULL,
  `numero_orden` int(11) DEFAULT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `direccion_entrega` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminorden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `ordencompras_cotizacion_id_foreign` (`cotizacion_id`),
  CONSTRAINT `ordencompras_cotizacion_id_foreign` FOREIGN KEY (`cotizacion_id`) REFERENCES `cotizacions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordencompras`
--

LOCK TABLES `ordencompras` WRITE;
/*!40000 ALTER TABLE `ordencompras` DISABLE KEYS */;
/*!40000 ALTER TABLE `ordencompras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizacions`
--

DROP TABLE IF EXISTS `organizacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizacions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_org` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_org` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_org` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representante_org` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_representante_org` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizacions`
--

LOCK TABLES `organizacions` WRITE;
/*!40000 ALTER TABLE `organizacions` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paacdetalles`
--

DROP TABLE IF EXISTS `paacdetalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paacdetalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `obra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paac_id` bigint(20) unsigned NOT NULL,
  `enero` double(8,2) NOT NULL,
  `febrero` double(8,2) NOT NULL,
  `marzo` double(8,2) NOT NULL,
  `abril` double(8,2) NOT NULL,
  `mayo` double(8,2) NOT NULL,
  `junio` double(8,2) NOT NULL,
  `julio` double(8,2) NOT NULL,
  `agosto` double(8,2) NOT NULL,
  `septiembre` double(8,2) NOT NULL,
  `octubre` double(8,2) NOT NULL,
  `noviembre` double(8,2) NOT NULL,
  `diciembre` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paacdetalles_paac_id_foreign` (`paac_id`),
  CONSTRAINT `paacdetalles_paac_id_foreign` FOREIGN KEY (`paac_id`) REFERENCES `paacs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paacdetalles`
--

LOCK TABLES `paacdetalles` WRITE;
/*!40000 ALTER TABLE `paacdetalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `paacdetalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paacs`
--

DROP TABLE IF EXISTS `paacs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paacs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `anio` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paacs`
--

LOCK TABLES `paacs` WRITE;
/*!40000 ALTER TABLE `paacs` DISABLE KEYS */;
/*!40000 ALTER TABLE `paacs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipopago_id` bigint(20) unsigned NOT NULL,
  `cuenta_id` bigint(20) unsigned NOT NULL,
  `monto` double(8,2) NOT NULL,
  `num_factura` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pagos_tipopago_id_foreign` (`tipopago_id`),
  KEY `pagos_cuenta_id_foreign` (`cuenta_id`),
  CONSTRAINT `pagos_cuenta_id_foreign` FOREIGN KEY (`cuenta_id`) REFERENCES `cuentaproys` (`id`),
  CONSTRAINT `pagos_tipopago_id_foreign` FOREIGN KEY (`tipopago_id`) REFERENCES `tipopagos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `planillas`
--

DROP TABLE IF EXISTS `planillas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planillas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` bigint(20) unsigned NOT NULL,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `isss` double(8,2) NOT NULL,
  `afp` double(8,2) NOT NULL,
  `insaforp` double(8,2) NOT NULL,
  `prestamos` double(8,2) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `planillas_empleado_id_foreign` (`empleado_id`),
  CONSTRAINT `planillas_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planillas`
--

LOCK TABLES `planillas` WRITE;
/*!40000 ALTER TABLE `planillas` DISABLE KEYS */;
/*!40000 ALTER TABLE `planillas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamos`
--

DROP TABLE IF EXISTS `prestamos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` bigint(20) unsigned NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_de_cuenta` int(11) NOT NULL,
  `monto` double(8,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `prestamos_empleado_id_foreign` (`empleado_id`),
  CONSTRAINT `prestamos_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamos`
--

LOCK TABLES `prestamos` WRITE;
/*!40000 ALTER TABLE `prestamos` DISABLE KEYS */;
/*!40000 ALTER TABLE `prestamos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuesto_solicituds`
--

DROP TABLE IF EXISTS `presupuesto_solicituds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuesto_solicituds` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `presupuesto_id` bigint(20) unsigned NOT NULL,
  `solicitudcotizacion_id` bigint(20) unsigned NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `seleccionado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `presupuesto_solicituds_presupuesto_id_foreign` (`presupuesto_id`),
  KEY `presupuesto_solicituds_solicitudcotizacion_id_foreign` (`solicitudcotizacion_id`),
  CONSTRAINT `presupuesto_solicituds_presupuesto_id_foreign` FOREIGN KEY (`presupuesto_id`) REFERENCES `presupuestos` (`id`),
  CONSTRAINT `presupuesto_solicituds_solicitudcotizacion_id_foreign` FOREIGN KEY (`solicitudcotizacion_id`) REFERENCES `solicitudcotizacions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuesto_solicituds`
--

LOCK TABLES `presupuesto_solicituds` WRITE;
/*!40000 ALTER TABLE `presupuesto_solicituds` DISABLE KEYS */;
INSERT INTO `presupuesto_solicituds` VALUES (1,1,1,1,1,0,'2018-05-28 15:14:46','2018-05-28 15:14:46');
/*!40000 ALTER TABLE `presupuesto_solicituds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuestodetalles`
--

DROP TABLE IF EXISTS `presupuestodetalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuestodetalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `presupuesto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciou` double(8,2) NOT NULL,
  `catalogo_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `presupuestodetalles_presupuesto_id_foreign` (`presupuesto_id`),
  KEY `presupuestodetalles_catalogo_id_foreign` (`catalogo_id`),
  CONSTRAINT `presupuestodetalles_catalogo_id_foreign` FOREIGN KEY (`catalogo_id`) REFERENCES `catalogos` (`id`),
  CONSTRAINT `presupuestodetalles_presupuesto_id_foreign` FOREIGN KEY (`presupuesto_id`) REFERENCES `presupuestos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuestodetalles`
--

LOCK TABLES `presupuestodetalles` WRITE;
/*!40000 ALTER TABLE `presupuestodetalles` DISABLE KEYS */;
INSERT INTO `presupuestodetalles` VALUES (1,1,30,7.60,1),(2,1,2,2.00,3),(3,1,3,1.00,2),(4,1,2,4.68,4);
/*!40000 ALTER TABLE `presupuestodetalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuestos`
--

DROP TABLE IF EXISTS `presupuestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuestos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_id` bigint(20) unsigned NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `presupuestos_proyecto_id_foreign` (`proyecto_id`),
  KEY `presupuestos_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `presupuestos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `presupuestos_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuestos`
--

LOCK TABLES `presupuestos` WRITE;
/*!40000 ALTER TABLE `presupuestos` DISABLE KEYS */;
INSERT INTO `presupuestos` VALUES (1,1,244.36,'2018-05-28 15:08:36','2018-05-28 15:14:46',1,2);
/*!40000 ALTER TABLE `presupuestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuestounidaddetalles`
--

DROP TABLE IF EXISTS `presupuestounidaddetalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuestounidaddetalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `presupuestounidad_id` bigint(20) unsigned NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_medida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(8,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `presupuestounidaddetalles_presupuestounidad_id_foreign` (`presupuestounidad_id`),
  CONSTRAINT `presupuestounidaddetalles_presupuestounidad_id_foreign` FOREIGN KEY (`presupuestounidad_id`) REFERENCES `presupuestounidads` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuestounidaddetalles`
--

LOCK TABLES `presupuestounidaddetalles` WRITE;
/*!40000 ALTER TABLE `presupuestounidaddetalles` DISABLE KEYS */;
/*!40000 ALTER TABLE `presupuestounidaddetalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presupuestounidads`
--

DROP TABLE IF EXISTS `presupuestounidads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presupuestounidads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `unidad_id` bigint(20) unsigned NOT NULL,
  `total` double(8,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `presupuestounidads_unidad_id_foreign` (`unidad_id`),
  CONSTRAINT `presupuestounidads_unidad_id_foreign` FOREIGN KEY (`unidad_id`) REFERENCES `unidads` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuestounidads`
--

LOCK TABLES `presupuestounidads` WRITE;
/*!40000 ALTER TABLE `presupuestounidads` DISABLE KEYS */;
/*!40000 ALTER TABLE `presupuestounidads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedors`
--

DROP TABLE IF EXISTS `proveedors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedors` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_registro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombrer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telfijor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular_r` char(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emailr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` int(10) unsigned NOT NULL DEFAULT '1',
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechabaja` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedors`
--

LOCK TABLES `proveedors` WRITE;
/*!40000 ALTER TABLE `proveedors` DISABLE KEYS */;
INSERT INTO `proveedors` VALUES (1,'Alejandrin Streich','101 Auer Islands\nDeionbury, VA 34638','7506-6465','xvonrueden@example.org','3932-330802-384-1','6838-5565',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(2,'Johnpaul Ratke','849 Rubye Wells Suite 991\nLeanneville, SC 08094','7296-677','lenna.johnson@example.com','5485-663646-435-0','7541-8052',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(3,'Noe Toy','2235 Edyth Glen Suite 587\nWest Osbaldo, CT 10538','7361-6882','heidenreich.uriah@example.org','8093-727191-389-0','7730-8503',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(4,'Ellie Ziemann DVM','68442 Mante Flats Suite 580\nNorth Rowland, WA 74779-4641','6525-873','casandra.kessler@example.net','7348-859825-251-1','6562-4522',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(5,'Dr. Cortney Feil DDS','50464 Devonte Port\nEast Hiram, PA 50534-2572','6228-3140','arturo.rath@example.net','135-682495-427-0','7480-9434',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:38:59','2018-05-28 14:38:59'),(6,'Robb Wunsch','90799 Denis Plain\nPort Hilton, OK 61955','7863-6428','herbert68@example.org','2991-764533-642-0','6767-1638',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(7,'Dr. Presley Stanton','32747 Cormier Junctions\nWest Oletahaven, RI 13758','7878-392','auer.carolyn@example.net','9888-420281-771-0','7816-1920',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(8,'Ida Schaden','27143 Leannon Brooks\nAdonisburgh, NJ 46574','7325-8327','mante.madelyn@example.org','9988-193304-858-0','7527-4214',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(9,'Eulah Kuhn','4273 Morar Inlet Apt. 776\nKerlukehaven, PA 55796-1305','7238-8190','cwilliamson@example.org','4928-655210-736-1','7623-2964',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(10,'Miss Adela Stamm DDS','228 Linnea Mountain Suite 585\nEast Tyreekmouth, ID 83214-9637','7823-1234','lmorar@example.org','3669-437968-85-1','7506-4316',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(11,'Lamont Stehr','54622 Upton Manors\nCarytown, CO 55400-7097','7838-9492','joana87@example.net','1250-683982-836-0','7230-3115',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(12,'Kylee Fay','23276 Guy Ways Apt. 921\nEast Elena, MD 01658-4238','7323-7787','dexter.zboncak@example.net','5085-5291-818-1','6351-358',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(13,'Prof. Merl Veum','8388 Guillermo Station Suite 077\nKoelpinmouth, FL 05180-6442','7558-2144','slarkin@example.com','9816-168502-95-1','6553-3165',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(14,'Effie Batz','2328 Demarco Curve\nEast Kaiaview, ID 93257-7374','7594-8161','magnus.maggio@example.net','1065-619162-886-1','6337-8542',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(15,'Dr. Korbin Dickinson II','8766 Maribel Islands\nNorth Garthstad, HI 49842','7237-2011','alexie.marvin@example.com','4966-740534-288-0','6452-2646',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(16,'Dovie Hyatt','9873 Stoltenberg Summit\nHarrisshire, WV 04073-8142','6757-1711','lkilback@example.net','4891-852539-20-0','6299-3271',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(17,'Anthony Jakubowski','159 Esteban Cape\nLydaview, IN 25779-9800','6189-5877','seamus.herzog@example.com','10-741545-911-0','7071-3055',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(18,'Prof. Margie Frami','401 Giovanna Mount\nPort Hayleymouth, WA 60251-1694','6840-630','kling.christ@example.com','7192-15361-696-0','7446-9729',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(19,'Courtney McClure','453 Schumm Turnpike\nNew Abrahamberg, NE 79399-0882','7509-6168','schultz.darrell@example.com','3193-242748-169-1','7351-6770',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(20,'Afton Wisoky','12978 Odie River Apt. 178\nWymanville, MD 81828','6514-5199','garfield11@example.net','837-795969-93-1','7817-578',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(21,'Ulises Wiza II','78813 Bosco Rue\nWest Brenna, TX 30837','7946-8632','lexie67@example.org','5347-169734-921-0','7431-6636',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(22,'Prof. Linwood Stoltenberg','64170 Lincoln Springs Apt. 032\nSchuppebury, OK 79144','6221-7215','leslie.hand@example.net','75-300919-271-0','7785-3922',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(23,'Dr. Bridgette Stracke II','250 Raegan Corners\nWest Lonie, NJ 79963-4550','6639-1478','hilpert.griffin@example.org','7-983260-289-0','6311-8527',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(24,'Felton Luettgen','799 Haylie River\nAbshirestad, NH 17200','6971-8699','alysson43@example.com','4708-731443-843-1','6484-8345',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(25,'Prof. Maryjane Waters I','99676 Darien Meadows\nPort Eldoraburgh, NV 80260-9800','6703-9853','lillian.mccullough@example.net','8228-171689-838-1','6471-454',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(26,'Mr. Landen O\'Reilly','424 Marta Row\nEast Katheryn, LA 49725-3825','7810-8186','romaguera.tania@example.org','7686-892799-581-1','7270-7407',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(27,'Zander Waelchi','48987 Okuneva Inlet\nMichaelaborough, NM 18314-8181','7069-2434','hzemlak@example.net','6714-53328-715-1','7861-7130',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(28,'Lowell West','6956 Everardo Turnpike Suite 426\nJastchester, MO 49062','6404-428','maximilian.morissette@example.com','5205-632077-522-0','6018-5422',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(29,'Hailey Kirlin','89774 Petra Ville Suite 811\nCarterbury, NH 20877','7472-988','stacy.rolfson@example.com','7126-831298-367-1','7088-6325',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(30,'Caleb Kertzmann','8042 Cecile Avenue\nLincolnstad, PA 59403','6979-7488','gerda50@example.com','1402-641370-68-0','7018-3586',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:00','2018-05-28 14:39:00'),(31,'Tia Waters','8681 Marquardt Junction Suite 768\nWest Amayamouth, IN 19748','6763-1003','kulas.zakary@example.org','1555-359225-297-1','6049-2732',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(32,'Prof. Juvenal Schaden','6388 Roberts Stream Apt. 412\nNorth Kierabury, ID 76534-5737','7869-86','kohler.obie@example.com','446-733310-683-0','7166-5627',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(33,'Maymie Fisher','26309 Torphy Throughway\nNew Alaina, CA 96113-0487','6830-8540','emarks@example.net','809-819220-155-0','6787-6796',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(34,'Alexa O\'Conner Jr.','58789 Bashirian Island\nTurnerberg, OR 08002-8605','6076-9144','raegan.bins@example.net','1557-499918-712-1','7948-9850',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(35,'Frederic Daniel','8206 Vincent Passage Apt. 777\nMrazfurt, HI 30820','6806-3320','davonte45@example.com','6231-170799-207-0','6898-8129',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(36,'Ryder Witting','7021 Madeline Shore\nLarsontown, WY 60823-6153','7516-317','fletcher.mante@example.net','546-470634-60-0','7528-6108',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(37,'Derrick Wiza','1933 Strosin Summit Apt. 138\nSouth Landenton, WI 69967','6061-3082','mikel.haley@example.net','5432-164057-482-0','6199-7800',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(38,'Meagan Halvorson','2197 Stacy Crossroad Apt. 631\nLeannechester, LA 18750-2622','7306-9387','lshields@example.org','3489-549024-650-0','7038-7325',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(39,'Drew Treutel V','20891 Alexandra Crescent Suite 752\nReichelmouth, OH 34520','7368-9397','mjacobs@example.org','3989-979689-190-0','7895-5786',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(40,'Mortimer Lynch Sr.','500 Dalton Row\nNitzscheberg, NV 23033-1902','7975-7186','charity.ebert@example.com','9557-854413-311-0','6267-2048',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(41,'Griffin Weissnat I','47584 Yasmine Station Suite 236\nNew Sydnee, NC 68225-3560','7052-9005','jaskolski.thalia@example.net','7941-7922-484-0','7465-5205',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(42,'Lucio Prosacco','52630 Koelpin Radial Apt. 377\nCarriechester, ID 83777-2142','7920-8108','ssteuber@example.org','3283-220711-325-0','6023-5748',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(43,'Juana Macejkovic','4415 Breanna Junction Apt. 895\nEast Alexandro, ID 33663','6418-7404','darby62@example.net','7290-107118-805-0','6651-9568',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(44,'Elsa Dach','4928 Rosalind Circle\nJaylenberg, DE 46574','6056-5917','reed.zulauf@example.org','1895-402198-740-0','6789-7638',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(45,'Prof. Emory Hegmann DDS','18113 Cortez Forks Apt. 755\nEast Abdul, CA 51124','7222-2998','wunsch.claudie@example.net','4732-72851-206-0','7267-5233',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(46,'Mrs. Eloise Nienow Sr.','448 Marcellus Glen\nBlockfurt, KS 03023','7534-1707','klocko.albertha@example.org','5607-298287-431-1','7774-5534',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(47,'Vada Jenkins','144 Lavonne Hill\nEast Aurore, MN 02280','7186-4977','earnest.breitenberg@example.org','9680-447884-721-1','6547-7324',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(48,'Hollis Durgan','2645 Vena Well\nEast Griffin, WA 31510','6472-7555','oschulist@example.com','8211-338854-60-1','7477-6460',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(49,'Mrs. Mylene Hartmann DDS','38657 Bernice Freeway\nEast Myrtiestad, KS 28572','7929-2219','zzemlak@example.org','544-244532-109-1','6844-1019',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01'),(50,'Mr. Jeffrey Schoen','6422 Major Orchard\nEast Desireemouth, MS 67332','7651-3704','dmcglynn@example.net','7202-808102-635-1','7965-6425',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-05-28 14:39:01','2018-05-28 14:39:01');
/*!40000 ALTER TABLE `proveedors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto_inventarios`
--

DROP TABLE IF EXISTS `proyecto_inventarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto_inventarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `proyecto_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proyecto_inventarios_proyecto_id_foreign` (`proyecto_id`),
  CONSTRAINT `proyecto_inventarios_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto_inventarios`
--

LOCK TABLES `proyecto_inventarios` WRITE;
/*!40000 ALTER TABLE `proyecto_inventarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto_inventarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos`
--

DROP TABLE IF EXISTS `proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `beneficiarios` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(10) unsigned NOT NULL DEFAULT '1',
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechabaja` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `motivobaja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estadoanterior` int(11) DEFAULT NULL,
  `pre` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos`
--

LOCK TABLES `proyectos` WRITE;
/*!40000 ALTER TABLE `proyectos` DISABLE KEYS */;
INSERT INTO `proyectos` VALUES (1,'Remodelacion canchita',5000.00,'por ahi','2018-05-31','2018-06-30','2000 personas',4,'para jugar',NULL,'2018-05-28 14:43:30','2018-05-28 15:14:46',NULL,NULL,1);
/*!40000 ALTER TABLE `proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisiciondetalles`
--

DROP TABLE IF EXISTS `requisiciondetalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisiciondetalles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `requisicion_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `requisiciondetalles_requisicion_id_foreign` (`requisicion_id`),
  CONSTRAINT `requisiciondetalles_requisicion_id_foreign` FOREIGN KEY (`requisicion_id`) REFERENCES `requisicions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisiciondetalles`
--

LOCK TABLES `requisiciondetalles` WRITE;
/*!40000 ALTER TABLE `requisiciondetalles` DISABLE KEYS */;
INSERT INTO `requisiciondetalles` VALUES (2,2,20,'UNIDAD','chequeras');
/*!40000 ALTER TABLE `requisiciondetalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `requisicions`
--

DROP TABLE IF EXISTS `requisicions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `requisicions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `linea_trabajo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuente_financiamiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `justificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `actividad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicions`
--

LOCK TABLES `requisicions` WRITE;
/*!40000 ALTER TABLE `requisicions` DISABLE KEYS */;
INSERT INTO `requisicions` VALUES (2,NULL,'fondos propios','para poder emitir cheques',1,'2018-05-28 20:19:25','2018-05-28 20:49:55','compra de chequeras',2);
/*!40000 ALTER TABLE `requisicions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retencions`
--

DROP TABLE IF EXISTS `retencions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retencions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `isss` double(8,2) NOT NULL,
  `afp` double(8,2) NOT NULL,
  `insaforp` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retencions`
--

LOCK TABLES `retencions` WRITE;
/*!40000 ALTER TABLE `retencions` DISABLE KEYS */;
/*!40000 ALTER TABLE `retencions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rubros`
--

DROP TABLE IF EXISTS `rubros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rubros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` double(2,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rubros`
--

LOCK TABLES `rubros` WRITE;
/*!40000 ALTER TABLE `rubros` DISABLE KEYS */;
/*!40000 ALTER TABLE `rubros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudcotizacions`
--

DROP TABLE IF EXISTS `solicitudcotizacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudcotizacions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `formapago_id` bigint(20) unsigned NOT NULL,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo_encargado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar_entrega` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `motivobaja` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechabaja` date DEFAULT NULL,
  `numero_solicitud` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_limite` date DEFAULT NULL,
  `tiempo_entrega` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitudcotizacions_formapago_id_foreign` (`formapago_id`),
  CONSTRAINT `solicitudcotizacions_formapago_id_foreign` FOREIGN KEY (`formapago_id`) REFERENCES `formapagos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudcotizacions`
--

LOCK TABLES `solicitudcotizacions` WRITE;
/*!40000 ALTER TABLE `solicitudcotizacions` DISABLE KEYS */;
INSERT INTO `solicitudcotizacions` VALUES (1,2,'Tesorería','Mario René Cardoza','Administrador','en la alcaldia municipal de verapaz','2018-05-28 15:14:46','2018-05-28 15:14:46',1,NULL,NULL,'001-2018','2018-05-28','1 dia hábil luego de recibir orden de compra');
/*!40000 ALTER TABLE `solicitudcotizacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocobros`
--

DROP TABLE IF EXISTS `tipocobros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocobros` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_cobro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocobros`
--

LOCK TABLES `tipocobros` WRITE;
/*!40000 ALTER TABLE `tipocobros` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipocobros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocontratos`
--

DROP TABLE IF EXISTS `tipocontratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocontratos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechabaja` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocontratos`
--

LOCK TABLES `tipocontratos` WRITE;
/*!40000 ALTER TABLE `tipocontratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipocontratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipopagos`
--

DROP TABLE IF EXISTS `tipopagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipopagos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipopagos`
--

LOCK TABLES `tipopagos` WRITE;
/*!40000 ALTER TABLE `tipopagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipopagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposervicios`
--

DROP TABLE IF EXISTS `tiposervicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposervicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposervicios`
--

LOCK TABLES `tiposervicios` WRITE;
/*!40000 ALTER TABLE `tiposervicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposervicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad_medidas`
--

DROP TABLE IF EXISTS `unidad_medidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad_medidas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_medida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unidad_medidas_nombre_medida_unique` (`nombre_medida`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_medidas`
--

LOCK TABLES `unidad_medidas` WRITE;
/*!40000 ALTER TABLE `unidad_medidas` DISABLE KEYS */;
INSERT INTO `unidad_medidas` VALUES (1,'BOLSA','2018-05-28 14:45:39','2018-05-28 14:45:39'),(2,'LIBRA','2018-05-28 14:46:20','2018-05-28 14:46:20'),(3,'UNIDAD','2018-05-28 14:50:11','2018-05-28 14:50:11'),(4,'GALÓN','2018-05-28 14:53:42','2018-05-28 14:53:42');
/*!40000 ALTER TABLE `unidad_medidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidads`
--

DROP TABLE IF EXISTS `unidads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_baja` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unidads_nombre_unidad_unique` (`nombre_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidads`
--

LOCK TABLES `unidads` WRITE;
/*!40000 ALTER TABLE `unidads` DISABLE KEYS */;
INSERT INTO `unidads` VALUES (1,'Tesorería',1,NULL,NULL,'2018-05-28 15:12:24','2018-05-28 15:12:24'),(2,'Unidad de Adquisiciones y Contrataciones Institucionales',1,NULL,NULL,'2018-05-28 20:37:43','2018-05-28 20:37:43');
/*!40000 ALTER TABLE `unidads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` bigint(20) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` int(10) unsigned NOT NULL,
  `estado` int(10) unsigned NOT NULL DEFAULT '1',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechabaja` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_empleado_id_foreign` (`empleado_id`),
  CONSTRAINT `users_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'mariocardoza','mario_boyle@hotmail.com','$2y$10$qW3olGesQHDkNfXT0e8oYuJ19mVU3z2iWAoq91CH7eG11aGjGt/Om',1,1,'avatar.jpg',NULL,NULL,'NqMDIdaPZrk0zrqzK5Mv5u2QKCBsQOT92EGMMyLiNMrqsBmucCvs1OAdmrFp','2018-05-24 21:06:57','2018-05-24 21:06:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sisverapaz'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-29 14:38:32
