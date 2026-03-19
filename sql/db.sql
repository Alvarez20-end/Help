/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.14-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: helpdesk
-- ------------------------------------------------------
-- Server version	10.11.14-MariaDB-0ubuntu0.24.04.1

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
-- Table structure for table `t_cat_equipo`
--

DROP TABLE IF EXISTS `t_cat_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cat_equipo` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cat_equipo`
--

LOCK TABLES `t_cat_equipo` WRITE;
/*!40000 ALTER TABLE `t_cat_equipo` DISABLE KEYS */;
INSERT INTO `t_cat_equipo` VALUES
(1,'Proyector','<i class=\"fas fa-desktop</i>'),
(2,'Teclado','<i class=\"fas fa-keyboard\"></i>');
/*!40000 ALTER TABLE `t_cat_equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cat_roles`
--

DROP TABLE IF EXISTS `t_cat_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cat_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(245) NOT NULL,
  `descripcion` varchar(245) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cat_roles`
--

LOCK TABLES `t_cat_roles` WRITE;
/*!40000 ALTER TABLE `t_cat_roles` DISABLE KEYS */;
INSERT INTO `t_cat_roles` VALUES
(1,'cliente','Es un cliente'),
(2,'admin','Es Admin');
/*!40000 ALTER TABLE `t_cat_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_persona`
--

DROP TABLE IF EXISTS `t_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `paterno` varchar(245) NOT NULL,
  `materno` varchar(245) DEFAULT NULL,
  `nombre` varchar(245) NOT NULL,
  `fecha_nacimiento` varchar(245) NOT NULL,
  `sexo` varchar(2) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(245) DEFAULT NULL,
  `fechaInsert` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_persona`
--

LOCK TABLES `t_persona` WRITE;
/*!40000 ALTER TABLE `t_persona` DISABLE KEYS */;
INSERT INTO `t_persona` VALUES
(1,'ss','ss','sskk','1111-11-11','M','s','kevinkac123@gmail.com','2026-03-14 18:23:51'),
(2,'d','d','d','','M','5','','2026-03-15 16:02:03'),
(3,'f','f','f','','F','5','','2026-03-15 16:04:02'),
(4,'h','h','h','','F','5','','2026-03-15 16:05:57'),
(5,'f','f','f','','M','5','','2026-03-15 16:07:35'),
(6,'k','k','k','','F','3344556677','','2026-03-15 17:57:22'),
(7,'1','1','1','1111-11-11','F','1','1','2026-03-16 20:11:20'),
(8,'eEe','w','w','0003-03-31','M','8888888883','kevinkac123@gmail.com','2026-03-19 05:06:01'),
(9,'alvarez','cornelio','kevin','2005-01-31','M','5525325207|','kevinkac123@gmail.com','2026-03-19 05:36:00'),
(10,'Perez','Lopez','Kevin','2000-01-01','M','5551234567','kevin@test.com','2026-03-19 05:48:45'),
(11,'ttt','t','tt','0021-02-22','M','3344556677','kevinkac123@gmail.com','2026-03-19 06:20:07');
/*!40000 ALTER TABLE `t_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_reportes`
--

DROP TABLE IF EXISTS `t_reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_reportes` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `descripcion_problema` text DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT 1,
  `solucion_problema` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `id_usuario_tecnico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `fkUsuarioReporte_idx` (`id_usuario`),
  KEY `fkEquipoReporte_idx` (`id_equipo`),
  CONSTRAINT `fkEquipoReporte` FOREIGN KEY (`id_equipo`) REFERENCES `t_cat_equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fkUsuarioReporte` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_reportes`
--

LOCK TABLES `t_reportes` WRITE;
/*!40000 ALTER TABLE `t_reportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_usuarios`
--

DROP TABLE IF EXISTS `t_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL,
  `usuario` varchar(245) DEFAULT NULL,
  `password` varchar(245) DEFAULT NULL,
  `ubicacion` text DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_usuarios`
--

LOCK TABLES `t_usuarios` WRITE;
/*!40000 ALTER TABLE `t_usuarios` DISABLE KEYS */;
INSERT INTO `t_usuarios` VALUES
(1,2,1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997','oficina',0,'2026-03-15 12:17:18'),
(8,1,7,'1','1','111',1,'2026-03-16 20:11:20'),
(9,2,8,'admin','admin','as',1,'2026-03-19 05:06:01'),
(10,2,9,'admin','$2y$12$0VzLmcLiHSq/SCSjZ.ijquZ7/GNy4aajfiL5LSPupiZ3vYZm83KtG','admin',1,'2026-03-19 05:36:00'),
(11,2,11,'cliente','$2y$12$1UTlr19arXGMKkiKTWU/gO7U1aLzmZaH43DITBcm2dXfZDjGzGDhy','wws',1,'2026-03-19 06:20:07');
/*!40000 ALTER TABLE `t_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(1,'admin','admin','d033e22ae348aeb5660fc2140aec35850c4da997',1),
(2,'cliente','cliente','d94019fd760a71edf11844bb5c601a4de95aacaf',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-19  7:33:20
