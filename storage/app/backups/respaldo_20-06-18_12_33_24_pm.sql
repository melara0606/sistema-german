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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora_proyectos`
--

LOCK TABLES `bitacora_proyectos` WRITE;
/*!40000 ALTER TABLE `bitacora_proyectos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacoras`
--

LOCK TABLES `bitacoras` WRITE;
/*!40000 ALTER TABLE `bitacoras` DISABLE KEYS */;
INSERT INTO `bitacoras` VALUES (1,'2018-06-19','14:20:25','Registró un proyecto',1,'2018-06-19 20:20:25','2018-06-19 20:20:25'),(2,'2018-06-19','16:39:11','Cerró Sesión del sistema',1,'2018-06-19 22:39:11','2018-06-19 22:39:11'),(3,'2018-06-20','12:33:12','inicio de sesion',1,'2018-06-20 18:33:12','2018-06-20 18:33:12');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogos`
--

LOCK TABLES `catalogos` WRITE;
/*!40000 ALTER TABLE `catalogos` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracions`
--

DROP TABLE IF EXISTS `configuracions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuracions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_alcalde` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracions`
--

LOCK TABLES `configuracions` WRITE;
/*!40000 ALTER TABLE `configuracions` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracions` ENABLE KEYS */;
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
-- Table structure for table `contratacion_empleado_proyectos`
--

DROP TABLE IF EXISTS `contratacion_empleado_proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contratacion_empleado_proyectos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empleado_id` bigint(20) unsigned NOT NULL,
  `contratoproyecto_id` bigint(20) unsigned NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `fecha_revision` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contratacion_empleado_proyectos_empleado_id_foreign` (`empleado_id`),
  KEY `contratacion_empleado_proyectos_contratoproyecto_id_foreign` (`contratoproyecto_id`),
  CONSTRAINT `contratacion_empleado_proyectos_contratoproyecto_id_foreign` FOREIGN KEY (`contratoproyecto_id`) REFERENCES `contrato_proyectos` (`id`),
  CONSTRAINT `contratacion_empleado_proyectos_empleado_id_foreign` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratacion_empleado_proyectos`
--

LOCK TABLES `contratacion_empleado_proyectos` WRITE;
/*!40000 ALTER TABLE `contratacion_empleado_proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratacion_empleado_proyectos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato_proyectos`
--

DROP TABLE IF EXISTS `contrato_proyectos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato_proyectos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `proyecto_id` bigint(20) unsigned NOT NULL,
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
  KEY `contrato_proyectos_proyecto_id_foreign` (`proyecto_id`),
  CONSTRAINT `contrato_proyectos_proyecto_id_foreign` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato_proyectos`
--

LOCK TABLES `contrato_proyectos` WRITE;
/*!40000 ALTER TABLE `contrato_proyectos` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato_proyectos` ENABLE KEYS */;
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
  `funciones` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivo_contratacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `contribuyentes` VALUES (1,'Carrie Stanton','44170022-1','2868-432763-30-1','1994-03-11','5120 Runte Terrace\nMaggioburgh, WY 29999','7658-4172','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(2,'Jakob Lynch','66881774-1','7112-700327-606-1','1983-03-24','269 Casper Lodge Suite 735\nJohnstonmouth, WV 28966-7370','7599-8149','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(3,'Brandyn Jerde','39591042-0','9689-875021-904-1','1975-10-10','76883 Hamill Coves Apt. 190\nPort Hermina, MI 79486-3346','6766-9067','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(4,'Ms. Dahlia Towne','69871169-1','8397-469046-398-0','1992-03-31','90627 McKenzie Mission Suite 756\nEast Tressa, GA 07655','7978-6983','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(5,'Ms. Shyanne Goodwin Sr.','35027045-1','2783-458843-610-1','1975-11-24','21272 Nellie Trace Apt. 758\nSouth Jordyn, KY 92779-0899','7943-43','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(6,'Dejon Hodkiewicz','26075313-1','3021-915035-665-0','1992-04-12','237 Hoppe Tunnel\nStokesburgh, OR 10098-5022','7708-1313','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(7,'Mr. Mauricio Mertz PhD','76141781-1','5244-959109-892-0','1999-09-25','635 Greenholt Circle\nNew Loraine, SC 46636-1699','7562-3349','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(8,'Mrs. Peggie Kub V','88547488-0','3998-303832-286-1','1993-03-07','6781 White Manor\nEast Claudie, CA 01662','7881-8405','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(9,'Brando Mueller','90381216-0','4208-621199-453-1','1984-05-07','591 Lizzie Greens Suite 591\nJonasstad, MT 32103-6474','6500-2706','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(10,'Ms. Kariane Lueilwitz','92321015-1','8972-425469-120-1','1997-07-06','19404 Hilll Mission Suite 068\nKulasberg, ND 65141-1006','7018-2629','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(11,'Savion McDermott','97787945-0','7955-832486-452-1','1992-08-05','220 Norene Underpass\nBorerport, UT 77408','7231-1317','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(12,'Mr. Blair Bartell','2887991-1','5347-694893-582-0','1987-11-03','921 Heath Locks\nNew Damarisview, OH 96671-8231','7908-588','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(13,'Prof. Gust Herman Sr.','43177015-1','8651-283550-245-0','1975-01-03','1734 Viviane Fields Apt. 956\nIdaburgh, NC 41011','6325-5437','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(14,'Grayson Lang','35203082-0','4306-930426-262-0','1983-10-23','379 Carroll Loop\nLake Frances, AR 52596','6836-232','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(15,'Alan Koss Sr.','53316928-1','564-91772-380-0','1992-01-05','769 Kris Centers\nEstelstad, FL 07800-5288','7965-9535','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(16,'Lyda O\'Kon','18187959-0','7255-567564-10-0','1993-05-25','672 Ryder Mountain\nKadenburgh, AK 13160-4915','7059-2292','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(17,'Doyle Welch Sr.','83208199-1','4779-278113-933-1','1984-01-06','24729 Chanelle Camp Apt. 947\nDamarisborough, IN 75669-4479','7192-1002','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(18,'Andre Klein','21647092-0','9878-151524-65-1','1998-04-04','5200 Schiller Terrace\nEast Ninaland, KS 79549','6233-2127','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(19,'Ava Bergstrom PhD','19511450-0','5061-198435-285-1','1981-03-04','9211 Gerda Ridges Apt. 607\nEast Rebecca, AK 28841-5886','6187-2363','Másculino',1,NULL,NULL,'2018-06-19 20:19:16','2018-06-19 20:19:16'),(20,'Cecilia Breitenberg','89718931-1','9815-382146-391-0','1975-10-30','185 Rowe Ways\nFritschhaven, FL 81754-8276','7193-7377','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(21,'Prof. Aisha Leannon','88252865-1','2632-242075-258-0','1988-03-20','8232 Breana Parkways Suite 227\nEast Roy, LA 15373','7061-9755','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(22,'Misael Robel','82562433-0','8622-852819-447-0','1973-09-17','333 Schinner Trail\nNew Ariborough, NC 86793','6129-6378','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(23,'Kirk Mohr','70207410-0','6462-660718-645-0','1979-02-26','4074 Beier Trail\nEast Ole, CT 44740-3489','7684-2209','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(24,'Mrs. Freida Hoeger III','32406272-0','1958-37509-720-1','1982-01-20','251 Collins Curve\nWest Rubye, KY 15136-1387','6566-956','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(25,'Cleta Boehm','89559999-1','2294-989086-433-0','1976-05-13','6057 Miller Greens Suite 230\nLemkeshire, WY 65807-5006','7872-2583','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(26,'Tyra Kihn Jr.','88911680-1','1027-635198-689-0','1978-07-25','9149 Schowalter Brook\nAmberborough, DC 06568-8843','6277-6212','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(27,'Alexandria Wunsch','57438246-1','2639-141197-746-0','1996-04-18','41685 Carroll Falls\nYundtfurt, HI 58354-0578','7928-5034','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(28,'Prof. Haylee VonRueden IV','51667817-1','7902-717368-691-1','1976-02-13','9175 Jarod Light\nValentineshire, NY 14205-0610','7415-4310','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(29,'Newton Schroeder','45292520-1','4260-37116-837-1','1992-05-10','50446 Torphy Isle\nLake Kayliton, AR 13366-8385','7341-6072','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(30,'Bethel Koss','51982368-1','2214-779447-367-1','1981-08-01','291 Ward Field Suite 166\nMertiehaven, AL 59509','7326-2348','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(31,'Dr. Michel Mills III','45329245-0','1380-251008-816-1','1970-01-21','5052 Connor Lock Suite 837\nLake Sethport, WY 93326','7248-7566','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(32,'Jeramy Parisian','46692425-0','9731-106341-867-1','1999-10-24','92578 Alexandro Street\nEllieton, MT 08757','7291-8596','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(33,'Colton Strosin','39900622-1','9399-246087-395-1','1970-04-18','575 Alize Plaza Apt. 912\nNorth Rubychester, NE 05974-9812','7568-8631','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(34,'Kamron Boyle','33322896-0','9328-986415-816-1','1980-07-18','204 Kiley Isle\nKonopelskiport, GA 51516','7221-7122','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(35,'Joana Wisoky DDS','94352623-0','8844-695949-177-1','1974-12-19','724 Vicente Junctions\nMaximilianbury, CT 03371-0911','6050-1074','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(36,'Jarred Becker','18318377-0','1857-796656-8-0','1986-06-24','38879 Murazik Streets\nMillsshire, TN 60410-9098','7862-5138','Másculino',1,NULL,NULL,'2018-06-19 20:19:17','2018-06-19 20:19:17'),(37,'Giuseppe Hartmann','30515940-0','9695-942623-197-1','1998-02-24','1113 Lowe Ways\nBrisamouth, PA 66624','6458-4031','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(38,'Katlyn Dickens MD','46936752-1','8456-952555-158-1','1973-03-03','922 Funk Gateway Suite 018\nSchroederfort, ND 35534','7587-7747','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(39,'Alek Heaney II','73256282-1','5852-301819-897-1','1984-06-18','26602 Haleigh Inlet\nDavisfurt, HI 03258','6345-5529','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(40,'Prof. Godfrey Howell','52792305-1','348-739061-923-0','1985-02-03','759 Hollie Island Suite 220\nStoltenbergberg, AK 72817','6196-3553','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(41,'Hosea Conroy II','52376186-0','4815-688562-155-0','1981-11-25','692 Deontae Keys\nRickyview, UT 21843-6053','6419-4203','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(42,'Jensen Leannon Jr.','84925089-0','9638-285010-413-1','1989-05-11','8117 Elna Trafficway\nJakobtown, KY 58535-1119','6584-3437','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(43,'Karley Stracke','93892319-1','5349-810576-251-1','1974-01-12','36922 Crystel Crest Suite 863\nPort Reyland, WA 50668','6056-2256','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(44,'Jamie Renner DDS','38512153-0','4455-828696-620-0','1991-04-18','3558 Runolfsdottir Brooks Suite 402\nYundtport, SC 74574-7891','6929-9271','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(45,'Efren Schroeder Sr.','13428433-1','2535-843472-415-1','1977-10-17','2557 Schinner Island Suite 237\nPort Prince, NC 44694','7659-4143','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(46,'Alfonso Ondricka','74840524-1','8533-224695-483-0','1977-10-08','535 Bechtelar Corners\nOlgaberg, DC 66989','7644-5074','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(47,'Daryl Crooks','77166744-1','4063-114170-836-1','1983-06-04','92589 Sanford Points\nGriffinberg, NH 67913','6226-7955','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(48,'Prof. Kelsi Hamill PhD','43425360-0','9892-810857-981-1','1978-08-26','49032 Barrows Spurs\nWebstermouth, MD 81702','6569-8239','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(49,'Flavie Hermann','6504504-0','6581-258816-666-1','1972-01-12','582 Watson Oval Apt. 330\nSouth Carolinemouth, MD 19230','6123-1219','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(50,'Ramon Emmerich','33272486-0','8218-147557-225-1','1971-11-06','72007 Adams Tunnel\nNorth Gerhardmouth, ID 56209-4721','6963-8240','Másculino',1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizacions`
--

LOCK TABLES `cotizacions` WRITE;
/*!40000 ALTER TABLE `cotizacions` DISABLE KEYS */;
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
INSERT INTO `cuentaproys` VALUES (1,NULL,1,NULL,1000.00,1,NULL,NULL,'2018-06-19 20:20:25','2018-06-19 20:20:25');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallecotizacions`
--

LOCK TABLES `detallecotizacions` WRITE;
/*!40000 ALTER TABLE `detallecotizacions` DISABLE KEYS */;
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
INSERT INTO `empleados` VALUES (1,'Mario René Cardoza','04392135-2','1001-031290-101-7','Másculino','787987','6767868','apastepeque','1990-12-03',NULL,NULL,NULL,NULL,1,'2018-06-19 20:18:45','2018-06-19 20:18:45');
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
INSERT INTO `fondocats` VALUES (1,'FODES','2018-06-19 20:20:13','2018-06-19 20:20:13');
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
INSERT INTO `fondos` VALUES (1,1,1,1000.00,'2018-06-19 20:20:25','2018-06-19 20:20:25');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formapagos`
--

LOCK TABLES `formapagos` WRITE;
/*!40000 ALTER TABLE `formapagos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2013_09_11_104511_create_empleados_table',1),(2,'2014_10_12_000000_create_users_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2017_06_05_105604_create_cargos_table',1),(5,'2017_09_06_134122_create_proveedors_table',1),(6,'2017_09_11_093258_create_tipocontratos_table',1),(7,'2017_09_11_152905_create_contratos_table',1),(8,'2017_09_11_194559_create_bitacoras_table',1),(9,'2017_10_11_113504_create_contribuyentes_table',1),(10,'2017_10_18_101023_create_organizacions_table',1),(11,'2017_10_18_105504_create_proyectos_table',1),(12,'2017_11_01_084839_create_rubros_table',1),(13,'2017_11_01_084959_create_tiposervicios_table',1),(14,'2017_11_01_111613_create_impuestos_table',1),(15,'2017_11_08_092815_create_inmuebles_table',1),(16,'2017_11_09_115227_create_presupuestos_table',1),(17,'2017_11_10_124137_create_cotizacions_table',1),(18,'2017_11_10_143305_create_ordencompras_table',1),(19,'2017_11_10_144042_create_detallecotizacions_table',1),(20,'2017_11_13_115302_create_presupuestodetalles_table',1),(21,'2017_11_14_101809_create_licitacions_table',1),(22,'2017_11_14_141355_create_formapagos_table',1),(23,'2017_11_15_105253_create_solicitudcotizacions_table',1),(24,'2017_11_17_112256_create_paacs_table',1),(25,'2017_11_17_112537_create_paacdetalles_table',1),(26,'2017_11_17_140344_create_requisicions_table',1),(27,'2017_11_17_140448_create_requisiciondetalles_table',1),(28,'2017_11_23_101048_create_negocios_table',1),(29,'2017_11_27_143030_create_procedimiento_paac',1),(30,'2017_12_17_084158_create_cuentaproys_table',1),(31,'2017_12_18_090915_create_tipopagos_table',1),(32,'2017_12_18_102015_create_cuentas_table',1),(33,'2017_12_18_111430_create_pagos_table',1),(34,'2017_12_18_153515_create_cuentaprincipals_table',1),(35,'2017_12_22_135809_create_retencions_table',1),(36,'2017_12_22_151201_create_planillas_table',1),(37,'2018_01_04_110425_create_construccions_table',1),(38,'2018_01_05_111054_add_cuenta_id-to_cuentas',1),(39,'2018_01_05_140241_create_prestamos_table',1),(40,'2018_02_03_165427_add_columns_negocios',1),(41,'2018_02_05_191729_create_fondocats_table',1),(42,'2018_02_05_195655_create_fondos_table',1),(43,'2018_02_14_090742_create_fondoorgs_table',1),(44,'2018_02_15_131020_create_tipocobros_table',1),(45,'2018_02_16_114954_add-colums-detallepresu',1),(46,'2018_02_19_143311_create_unidads_table',1),(47,'2018_02_20_163033_create_presupuestounidads_table',1),(48,'2018_02_20_163259_create_presupuestounidaddetalles_table',1),(49,'2018_02_21_135327_add-column-bolean',1),(50,'2018_02_22_134451_create_calendarizacions_table',1),(51,'2018_02_27_100627_create_correosolicituds_table',1),(52,'2018_03_01_101115_add_arguments_to_cotizacions_table',1),(53,'2018_03_01_101258_add_arguments_to_detallecotizacions_table',1),(54,'2018_03_13_152230_add_campos_to_ordencompras',1),(55,'2018_03_17_130500_create_categorias_table',1),(56,'2018_03_17_140107_create_catalogos_table',1),(57,'2018_03_18_125126_add_catalogo_id_to_presupuestodetalles',1),(58,'2018_03_20_084050_update_cotizacions_table_foreign',1),(59,'2018_03_20_090518_update_solicitudcotizacions_table_foreign',1),(60,'2018_03_26_101005_add_campos_darbaja_to_proyectos',1),(61,'2018_03_26_141408_add_estado_to_ordencompras',1),(62,'2018_04_09_101517_add_estado_y_otros_to_solicitudcotizacions',1),(63,'2018_04_14_133406_add_campos_to__contratos',1),(64,'2018_04_16_110307_add_numero_solicitud_a_solicitudcotizaciones',1),(65,'2018_04_18_091404_create_presupuesto_solicituds_table',1),(66,'2018_04_18_112747_cambiar_presupuesto_id_por_presupuestosolicitud_id_a_cotizacion',1),(67,'2018_04_20_084256_agregar_estado_y_categoria_id_a_presupuestos',1),(68,'2018_04_23_082345_cambiar_presupuesto_por_presu_a_presupuestos',1),(69,'2018_04_23_083536_cambiar_presupuesto_por_presu_a_proyectos',1),(70,'2018_04_26_103455_create_proyecto_inventarios_table',1),(71,'2018_05_08_085107_create_unidad_medidas_table',1),(72,'2018_05_11_154313_create_bitacora_proyectos_table',1),(73,'2018_05_16_094329_agregar_categoria_id_a_catalogos_table',1),(74,'2018_05_22_083628_borrar_proyecto_id_requisiciones',1),(75,'2018_05_22_101931_borrar_codigo_de_requisiciondetalles',1),(79,'2018_05_28_095055_agregar_actividad_a_requisicion',2),(80,'2018_05_31_142842_create_configuracions_table',2),(81,'2018_06_19_140614_create_contrato_proyectos_table',2),(82,'2018_06_19_153446_create_contratacion_empleado_proyectos_table',3);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuesto_solicituds`
--

LOCK TABLES `presupuesto_solicituds` WRITE;
/*!40000 ALTER TABLE `presupuesto_solicituds` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuestodetalles`
--

LOCK TABLES `presupuestodetalles` WRITE;
/*!40000 ALTER TABLE `presupuestodetalles` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presupuestos`
--

LOCK TABLES `presupuestos` WRITE;
/*!40000 ALTER TABLE `presupuestos` DISABLE KEYS */;
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
INSERT INTO `proveedors` VALUES (1,'Ceasar Bartell','7109 Royce Landing Suite 708\nAnjaliton, MS 58209','7674-5849','mwalsh@example.net','9855-838954-517-1','7786-906',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(2,'Dr. Jeremie Huel','28884 Haley Stream\nHettingershire, NJ 75693','7999-2700','fadel.edwardo@example.com','6079-222028-970-1','7091-3209',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(3,'Sylvan Volkman','69273 Janessa Rue Suite 536\nNew Ayanaland, MT 07955-1700','7214-4543','janick.gulgowski@example.net','2763-508107-770-1','7383-3337',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(4,'Dr. Brant Bernhard','68572 Stroman Plains Suite 931\nKaileeville, CT 74929-3413','7575-198','adams.salvatore@example.com','3639-94290-967-0','6504-3740',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(5,'Dr. Jarrod Hansen PhD','1908 O\'Kon Mills\nPort Giovanni, KY 60000','6192-4249','hershel.denesik@example.org','1094-984252-560-0','7082-9033',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(6,'Josie Sporer','298 Erdman Junction\nWest Gussietown, TN 40219','6590-1164','will.huel@example.org','7556-641155-499-1','6909-8285',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(7,'Osbaldo Reynolds','8013 Walter Valleys Suite 589\nWest Jaydon, VT 54315','7024-6432','stanton.emilie@example.com','9250-673024-630-0','6436-3261',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(8,'Miss Katrine Dach','57602 Davon Track\nSouth Alejandra, MI 04292-0223','6168-599','luettgen.dana@example.com','6094-36260-876-0','7338-109',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(9,'Prof. Emmy Grimes PhD','574 Aiden Mountains Apt. 924\nPort Destiney, SC 79110-4634','7692-5544','eleffler@example.net','8756-766896-542-1','6871-7965',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(10,'Hellen Borer','545 Destiney Street Suite 735\nYvonneton, MS 58244','6649-4771','luther.hoeger@example.net','5379-61495-171-1','7919-8696',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(11,'Madge McDermott','607 Michale Brook Apt. 994\nRicemouth, NJ 44476','6650-61','haley.lyric@example.org','821-443648-449-0','6148-9116',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(12,'Juvenal Rice','21259 Iliana Crescent Suite 616\nWest Landenfort, CO 71659-7038','6502-9665','murphy07@example.net','3938-632407-142-1','6391-7606',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:18','2018-06-19 20:19:18'),(13,'Luz Heidenreich','3885 Tristian Avenue Apt. 217\nLake Jordane, NJ 62449','6649-1560','helena.kemmer@example.net','7272-670632-778-0','7580-8768',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(14,'Danyka Orn','604 Kiel Lane\nEdmondborough, PA 51096','6985-7795','ryan.gorczany@example.org','9875-95014-765-0','6206-4558',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(15,'Dina Quigley','243 Bechtelar Crossroad\nFelipastad, GA 71735','7635-5150','mellie38@example.org','3414-723647-556-0','6242-5885',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(16,'Mara Graham','76801 Klein Islands\nLueilwitzberg, GA 28314','7102-7250','lizeth65@example.net','5001-995981-873-1','7034-8461',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(17,'Eldridge Bogisich DDS','3931 Ismael Meadows Apt. 634\nNorth Nannie, NC 76388','7245-9001','runolfsson.zella@example.net','4564-641067-644-0','7890-6749',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(18,'Peggie Bins','806 Ortiz Underpass\nLake Ernie, VA 97327-6304','6267-5460','bwilderman@example.org','3628-823212-238-0','7878-8249',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(19,'Daniella Walter','824 Brisa Viaduct Suite 884\nTryciafurt, HI 32434-7970','6046-211','izaiah.pollich@example.com','4076-714893-458-0','6801-2965',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(20,'Quinn Adams','9169 Leannon Ramp Apt. 497\nHarveymouth, VT 53622-6588','6709-614','trantow.pearlie@example.net','3399-980471-701-0','6012-6247',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(21,'Edythe Tremblay III','12660 Monahan Points Apt. 073\nEast Kayley, KS 73220-2361','7403-1048','xstark@example.org','2655-599132-670-1','7789-7439',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(22,'Lowell McGlynn','501 Schiller Mission Suite 844\nClintonfort, WV 13858','7304-9554','ullrich.jordon@example.org','9835-779584-419-0','7275-7709',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(23,'Dr. Dennis White II','4890 Hortense Mill Apt. 165\nSchimmelhaven, MA 26614','6523-6576','lisandro.ferry@example.com','4134-888057-462-0','6557-1232',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(24,'Chris Schowalter','70113 Jacquelyn Roads Suite 532\nBernhardton, WY 46315','7189-9614','nblock@example.org','3934-391971-685-1','7194-7375',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(25,'Harmony Block','993 Crooks Lakes Apt. 633\nSouth Abelardomouth, VT 38688-7763','7155-6674','runte.liana@example.com','9516-403540-491-0','6869-9666',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(26,'Yasmine Halvorson I','51619 Padberg Cliffs Apt. 809\nLake Jessyca, HI 79973-4010','7038-7980','mbergnaum@example.org','982-267875-500-1','6848-4497',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(27,'Judy Greenholt','51495 Larissa Place Apt. 788\nEast Linwood, AL 25098-8895','6055-6008','sage47@example.com','2839-503071-769-0','6471-2494',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(28,'Mr. Clifford Turner Jr.','453 Stark Curve Suite 655\nElwynberg, KY 51336','6305-5424','lillian32@example.net','9432-85870-276-0','6786-5711',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(29,'Leora Lakin III','5953 Orrin Loop Apt. 094\nPort Sydneeside, ID 82446','7298-7513','oyost@example.org','3781-901009-99-1','7549-2503',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(30,'Francesco Schaefer','31354 Spencer Circles\nLake Rhettfurt, CA 19957','6222-6233','ross90@example.net','2311-83761-378-0','6079-8460',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(31,'Maximus Boyer Jr.','532 Ryder Squares Apt. 689\nConnorfurt, OH 04291-6164','7651-1689','brenna66@example.com','9183-353477-28-0','7653-6464',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(32,'Collin Osinski','991 Pacocha Lakes Suite 253\nEast Tadville, MN 51827','7081-5883','hamill.eliezer@example.org','7938-514060-476-0','7798-701',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(33,'Angela Grant','902 Louisa Canyon Apt. 388\nGleasonmouth, ND 82868','6467-5403','dale.hudson@example.org','7668-775862-396-0','7970-3114',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(34,'Abdul Buckridge','5547 Foster Way Apt. 118\nNew Eltontown, NE 99160','6133-967','shanny.lind@example.com','7497-248079-486-0','6988-9819',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(35,'Mr. John Ledner','9083 Aimee Cape Apt. 134\nSouth Kellie, IN 71471','7820-7164','mgislason@example.com','275-541592-985-1','6785-9484',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(36,'Cheyanne Stanton','588 Auer Dam\nNorth Kayleighchester, PA 93208','6458-421','chloe.jakubowski@example.org','4911-817215-835-0','6877-7478',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(37,'Bernard Altenwerth','515 Block Prairie\nEast Shawnaburgh, TX 21400','6455-5139','dawn.quitzon@example.net','8316-730110-614-1','7012-1346',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(38,'Dr. Pasquale Keeling I','82572 Anderson Expressway Apt. 009\nNew Wadeland, GA 08488','6323-307','lueilwitz.brant@example.net','3902-321255-974-1','6126-6079',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:19','2018-06-19 20:19:19'),(39,'Ernestine Leffler','792 Noe Bridge Apt. 202\nSouth Sydneymouth, PA 29142-8644','7815-1377','remington.kshlerin@example.com','9220-694501-116-1','6516-8953',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(40,'Amos King','8246 Wyman Mall\nNorth Carli, DC 68556','6845-478','vinnie.haag@example.com','3171-340936-359-1','6355-8150',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(41,'Sabryna Waelchi','590 Turner Path\nWest Lonniefurt, KY 83784-4445','6476-3055','quinten55@example.org','3038-816469-999-1','6692-2255',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(42,'Patricia Harris','48424 Klocko Loop Suite 511\nMaynardfurt, NY 27855-1644','7874-8063','allison23@example.net','2622-276909-972-1','7425-6198',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(43,'Keara Lind','8236 Hodkiewicz Springs Suite 185\nLuettgenshire, KS 68622','7798-5773','kemmer.alize@example.net','2018-751565-745-0','7982-3785',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(44,'Anjali Quigley','314 Jairo Mountains Apt. 148\nEast Beth, WA 04770-4198','7107-3741','joanny.frami@example.com','6893-781198-101-1','7705-9390',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(45,'Mr. Franco Bailey','8857 Santiago Walk\nGermanchester, PA 83178-1872','7831-9204','imelda.gislason@example.com','1003-535087-42-1','6976-5376',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(46,'Scotty Crona','7307 Molly Fork Suite 303\nFreedaborough, NJ 91036','6283-553','wschumm@example.net','2228-248268-484-1','6753-8581',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(47,'Shawna Kuhlman','4738 Kristian Lodge\nLake Patriciamouth, AL 47711-8843','6324-5774','renee72@example.com','8159-303935-125-0','6828-3639',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(48,'Elinore Robel','84174 Valerie Street Apt. 692\nWest Jayneshire, TX 65535-8165','6199-417','schmeler.caleigh@example.org','9257-555532-92-0','7606-7673',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(49,'Dr. Minerva Buckridge','48998 Rogers Mountain Apt. 550\nEast Bradly, AK 04593','6211-632','jeanette70@example.com','4174-522681-399-0','6681-6396',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20'),(50,'Gia Bednar','988 Treutel Orchard Apt. 162\nConnmouth, LA 40704-7664','7084-351','williamson.caesar@example.com','769-247914-892-1','6240-3829',NULL,NULL,NULL,NULL,1,NULL,NULL,'2018-06-19 20:19:20','2018-06-19 20:19:20');
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
INSERT INTO `proyectos` VALUES (1,'Proyecto de prueba',1000.00,'en la alcaldia','2018-06-19','2018-06-29','2000 personas',1,'para ir pobando todo',NULL,'2018-06-19 20:20:25','2018-06-19 20:20:25',NULL,NULL,0);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisiciondetalles`
--

LOCK TABLES `requisiciondetalles` WRITE;
/*!40000 ALTER TABLE `requisiciondetalles` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requisicions`
--

LOCK TABLES `requisicions` WRITE;
/*!40000 ALTER TABLE `requisicions` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudcotizacions`
--

LOCK TABLES `solicitudcotizacions` WRITE;
/*!40000 ALTER TABLE `solicitudcotizacions` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad_medidas`
--

LOCK TABLES `unidad_medidas` WRITE;
/*!40000 ALTER TABLE `unidad_medidas` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidads`
--

LOCK TABLES `unidads` WRITE;
/*!40000 ALTER TABLE `unidads` DISABLE KEYS */;
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
INSERT INTO `users` VALUES (1,1,'mariocardoza','mariokr.rocker@gmail.com','$2y$10$98.skGzfxtcbvABLYSDFZerZhjNv/eBDtQVft.Nt.2AcftK4Rg79G',1,1,'avatar.jpg',NULL,NULL,'8ONPMBDjQ37MhEWHqgpVUaFuBILyWdIVPvW5dScJUZzR2Inak1e0KvtRJ3n4','2018-06-19 20:18:45','2018-06-19 20:18:45');
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

-- Dump completed on 2018-06-20 12:33:32
