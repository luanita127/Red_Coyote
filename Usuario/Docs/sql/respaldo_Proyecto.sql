-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: Proyecto
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `club` (
  `ID_Club` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Reglas` varchar(500) NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `Proposito` varchar(500) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Club`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `club_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
/*!40000 ALTER TABLE `club` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `ID_Comentario` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Club` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Comentario`),
  KEY `ID_Club` (`ID_Club`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`ID_Club`) REFERENCES `club` (`ID_Club`),
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `festividades`
--

DROP TABLE IF EXISTS `festividades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `festividades` (
  `ID_Festividades` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Mes` int(11) NOT NULL,
  `Dia` int(11) NOT NULL,
  `Año` int(11) NOT NULL,
  `Festividades` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID_Festividades`),
  KEY `ID_Mes` (`ID_Mes`),
  CONSTRAINT `festividades_ibfk_1` FOREIGN KEY (`ID_Mes`) REFERENCES `mes` (`ID_Mes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `festividades`
--

LOCK TABLES `festividades` WRITE;
/*!40000 ALTER TABLE `festividades` DISABLE KEYS */;
/*!40000 ALTER TABLE `festividades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mes`
--

DROP TABLE IF EXISTS `mes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mes` (
  `ID_Mes` int(11) NOT NULL AUTO_INCREMENT,
  `Mes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Mes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mes`
--

LOCK TABLES `mes` WRITE;
/*!40000 ALTER TABLE `mes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `moderadores`
--

DROP TABLE IF EXISTS `moderadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `moderadores` (
  `ID_Moderadores` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int(11) DEFAULT NULL,
  `ID_Club` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Moderadores`),
  KEY `ID_Usuario` (`ID_Usuario`),
  KEY `ID_Club` (`ID_Club`),
  CONSTRAINT `moderadores_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  CONSTRAINT `moderadores_ibfk_2` FOREIGN KEY (`ID_Club`) REFERENCES `club` (`ID_Club`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `moderadores`
--

LOCK TABLES `moderadores` WRITE;
/*!40000 ALTER TABLE `moderadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `moderadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objeto`
--

DROP TABLE IF EXISTS `objeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objeto` (
  `ID_Objeto` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int(11) NOT NULL,
  `ID_PuntosPrepa` int(11) NOT NULL,
  `NombreObjeto` varchar(255) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Recompensa` varchar(50) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Estado` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Objeto`),
  KEY `ID_Usuario` (`ID_Usuario`),
  KEY `ID_PuntosPrepa` (`ID_PuntosPrepa`),
  CONSTRAINT `objeto_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  CONSTRAINT `objeto_ibfk_2` FOREIGN KEY (`ID_PuntosPrepa`) REFERENCES `puntosprepa` (`ID_PuntosPrepa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto`
--

LOCK TABLES `objeto` WRITE;
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` VALUES (3,1,1,'Dignidad','../../Statics/imgobj/momazo.jpg','Si la ven por ahí díganle que vuelva','Una relación bonita y estable.','2023-02-03',''),(4,1,4,'Lapicera','../../Statics/imgobj/lapicera.jpg','Encontramos tu pumamada, caéle al 552 con unas papas y te la regreso','Unas papas','2023-06-21','');
/*!40000 ALTER TABLE `objeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `ID_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int(11) NOT NULL,
  `ID_PuntosPrepa` int(11) NOT NULL,
  `NombreProducto` varchar(255) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Costo` decimal(10,2) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `FechaVenta` date NOT NULL,
  `Calificacion` int(11) NOT NULL,
  `Horario` time DEFAULT NULL,
  PRIMARY KEY (`ID_Producto`),
  KEY `ID_Usuario` (`ID_Usuario`),
  KEY `ID_PuntosPrepa` (`ID_PuntosPrepa`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_PuntosPrepa`) REFERENCES `puntosprepa` (`ID_PuntosPrepa`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (16,1,7,'Palomitas','../../Statics/img/palomitas.jpg','Palomitas buenísimas para la salud.',20.00,0,'2023-06-30',0,'21:50:00'),(17,1,4,'Enjambre','../../Statics/img/enjambre.jpg','Deliciosos enjambres de cereal con chocolate.',25.00,0,'2023-06-23',0,'14:40:00'),(18,1,4,'Pay de Limón','../../Statics/img/pay.jpg','100% casero, sabe joya',25.00,0,'2023-07-24',0,'17:50:00'),(19,1,10,'Galletas del Costco','../../Statics/img/galletas.jpg','Mañana estaré llevando galletitas del Costco, $10c/u:)',10.00,0,'2023-06-22',0,'09:00:00');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntosprepa`
--

DROP TABLE IF EXISTS `puntosprepa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puntosprepa` (
  `ID_PuntosPrepa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Foto_Lugar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PuntosPrepa`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntosprepa`
--

LOCK TABLES `puntosprepa` WRITE;
/*!40000 ALTER TABLE `puntosprepa` DISABLE KEYS */;
INSERT INTO `puntosprepa` VALUES (1,'Entrada','../../Statics/media/puntosPrepa/entrada.jpg'),(2,'Patio de Sextos','../../Statics/media/puntosPrepa/sextos.jpg'),(3,'Patio de Cuartos','../../Statics/media/puntosPrepa/cuartos.jpg'),(4,'Patio de Quintos','../../Statics/media/puntosPrepa/quintos.jpg'),(5,'Pulpo','../../Statics/media/puntosPrepa/pulpo.jpg'),(6,'Mesas','../../Statics/media/puntosPrepa/mesas.jpg'),(7,'Canchas','../../Statics/media/puntosPrepa/canchas.jpg'),(8,'Pimponeras','../../Statics/media/puntosPrepa/pimpos.jpg'),(9,'Los H','../../Statics/media/puntosPrepa/h.jpg'),(10,'Biblioteca','../../Statics/media/puntosPrepa/biblio.jpg'),(11,'Vestidores','../../Statics/media/puntosPrepa/vestidores.jpg'),(13,'MAPA','../../Statics/media/puntosPrepa/mapa.jpg');
/*!40000 ALTER TABLE `puntosprepa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas` (
  `ID_Respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Comentario` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Respuesta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Respuesta`),
  KEY `ID_Comentario` (`ID_Comentario`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`ID_Comentario`) REFERENCES `comentario` (`ID_Comentario`),
  CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `ID_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Cuenta` int(11) DEFAULT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `Foto_Perfil` varchar(255) DEFAULT NULL,
  `Instagram` varchar(255) NOT NULL,
  `Celular` bigint(10) NOT NULL,
  `Sal` varchar(255) DEFAULT NULL,
  `Pim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Usuario`),
  UNIQUE KEY `Cuenta` (`Cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,322100000,'Prueba','prueba123',NULL,'',0,NULL,NULL),(2,322157000,'Luana','b92ab7ea80e99ee043251a3186d1d3d87a0474a44c1ec50aeb98f2f908380ce7',NULL,'@tilin',5529391270,'6492554b654ae',NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-21 21:39:20
