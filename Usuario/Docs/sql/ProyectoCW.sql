-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: Proyecte
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
  `PFP` varchar(255) DEFAULT NULL,
  `Portada` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Club`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `club_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `club`
--

LOCK TABLES `club` WRITE;
/*!40000 ALTER TABLE `club` DISABLE KEYS */;
INSERT INTO `club` VALUES (38,2,'ONU Coyote','Equipo de Debate Prepa 6. ¡Únete a este proyecto!','Aquí podrás encontrar nuestras reglas y protocolos: https://drive.google.com/drive/folders/1863HTEEXqE19zb8ZKzUsicfRFgQu2X2-','Diversion','Desarrollar las habilidades de la argumentación, oratoria, resolución de conflictos y las técnicas de investigación participando en modelos ONU.','../../Statics/media/clubesIMG/pfps/onu.jpg','../../Statics/media/clubesIMG/portadas/banner.jpg');
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
  `NombreUsuario` varchar(255) DEFAULT NULL,
  `Foto_Perfil` varchar(255) DEFAULT NULL,
  `Comentario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_Comentario`),
  KEY `ID_Club` (`ID_Club`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`ID_Club`) REFERENCES `club` (`ID_Club`),
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
-- Table structure for table `miembros_club`
--

DROP TABLE IF EXISTS `miembros_club`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `miembros_club` (
  `ID_Miembro` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Usuario` int(11) DEFAULT NULL,
  `ID_Club` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Miembro`),
  KEY `ID_Usuario` (`ID_Usuario`),
  KEY `ID_Club` (`ID_Club`),
  CONSTRAINT `miembros_club_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  CONSTRAINT `miembros_club_ibfk_2` FOREIGN KEY (`ID_Club`) REFERENCES `club` (`ID_Club`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `miembros_club`
--

LOCK TABLES `miembros_club` WRITE;
/*!40000 ALTER TABLE `miembros_club` DISABLE KEYS */;
INSERT INTO `miembros_club` VALUES (36,2,38);
/*!40000 ALTER TABLE `miembros_club` ENABLE KEYS */;
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
  `CelularUsuario` bigint(10) DEFAULT NULL,
  `InstagramUsuario` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_Objeto`),
  KEY `ID_Usuario` (`ID_Usuario`),
  KEY `ID_PuntosPrepa` (`ID_PuntosPrepa`),
  CONSTRAINT `objeto_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  CONSTRAINT `objeto_ibfk_2` FOREIGN KEY (`ID_PuntosPrepa`) REFERENCES `puntosprepa` (`ID_PuntosPrepa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objeto`
--

LOCK TABLES `objeto` WRITE;
/*!40000 ALTER TABLE `objeto` DISABLE KEYS */;
INSERT INTO `objeto` VALUES (1,10,4,'Airpod perdido:(','../../Statics/imgobj/airpod.jpg','Coyoamistades, perdí mi AirPod hoy a las 12:00 aprox, estaba en patio de quintos y fui a mesas, porfa si lo tienen regrésenlo, ofrezco recompensa, cooperen porque me linchan ','Una sopa de viejitos','2023-04-04','',5511389042,'@ana_pauchiis'),(2,8,1,'Gorra negra','../../Statics/imgobj/gorra.jpg','Pumacompañeros, perdí mi gorra ayer en la prepita. Si alguien la vió o la tiene pls avísenme, me la dió mi mamá y está bien cool. Les compro unas papas pero pls devuelvanmela','Lo que quieran:(','2023-07-27','',5566778899,'@mikee_04');
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
  `CelularUsuario` bigint(10) DEFAULT NULL,
  `InstagramUsuario` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_Producto`),
  KEY `ID_Usuario` (`ID_Usuario`),
  KEY `ID_PuntosPrepa` (`ID_PuntosPrepa`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`),
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`ID_PuntosPrepa`) REFERENCES `puntosprepa` (`ID_PuntosPrepa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,7,2,'Flores tejidas','../../Statics/img/flores.jpg','Holi, vendo flores tejidas de todo tipo desde $65 cada una (incluye ramo y mensaje personalizado)',65.00,0,'2023-08-07',0,'10:50:00',5502340000,'@meli_dmz'),(2,8,6,'Pay de limón','../../Statics/img/pay.jpg','amistadees, mañana voy a estar vendiendo pay de limón a 20 pesitos, pueden mandarme dm para apartárselos:)\r\nvoy a estar en mesas desde las 12:15 hasta las 14:30',20.00,0,'2023-08-01',0,'12:15:00',5566778899,'@mikee_04'),(3,9,2,'Crepas!!','../../Statics/img/crepas.jpg','Holaa, a partir del siguiente lunes, todos los lunes voy a vender crepitas pequeñas de nutella y nutella con fresa en $25, voy a estar en la prepa desde las 8:30 hasta las 3, soy del D-110, si quieren una mándenme mensaje para apartarles:)',25.00,0,'2023-08-07',0,'08:30:00',5544879000,'@alejandra.jrz');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,322157000,'Luana','b92ab7ea80e99ee043251a3186d1d3d87a0474a44c1ec50aeb98f2f908380ce7','../../Statics/media/fotosPerfil/[object File]','@tilin',5529391270,'6492554b654ae',NULL),(3,111111111,'José Eduardo','139f1163f7d0900c77bdbd9bfb3220a9e828ef5885db476f3201f7ce9c6110b1','../../Statics/media/fotosPerfil/perfilVacio.png','@nose',5511493563,'64962a9b141d4',NULL),(7,322158340,'Melissa Dmz','93e8753a437b8200644fb407cf31d2e796afd5c5f82bde741c87631d34a35e6b','../../Statics/media/fotosPerfil/[object File]','@meli_dmz',5502340000,'64c8520324afd',NULL),(8,321321123,'Mike Mv','744c72e70e254adac75eeafe54691f13790d86f12a22aacbda038db80bd097b6','../../Statics/media/fotosPerfil/perfilVacio.png','@mikee_04',5566778899,'64c85b40c7aed',NULL),(9,345678901,'Alee:)','7c073d90c6a3c99f9bcabf545735e1a7152ba2a1c2de12615bcd190e72186336','../../Statics/media/fotosPerfil/[object File]','@alejandra.jrz',5544879000,'64c85d50d0532',NULL),(10,456789012,'Ana Pauchiiis','a308ac9dd06074f52a9565f167fe632fcb89c638ffeedc1d4cf28ee7b1a70421','../../Statics/media/fotosPerfil/[object File]','@ana_pauchiis',5511389042,'64c8612f8f8b9',NULL);
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

-- Dump completed on 2023-08-01  1:52:06
