-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: farmacia
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `Consumidor`
--

DROP TABLE IF EXISTS `Consumidor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Consumidor` (
  `idConsumidor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idConsumidor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Consumidor`
--

LOCK TABLES `Consumidor` WRITE;
/*!40000 ALTER TABLE `Consumidor` DISABLE KEYS */;
INSERT INTO `Consumidor` VALUES (1,'Adulto','Persona mayor de 15 anios'),(2,'Nino','Persona entre 3 y 15 anios'),(3,'Pediatrico','Persona menor a 3 anios'),(4,'Especializado','Dado por el medico'),(5,'Todo','Apto para cualquiera');
/*!40000 ALTER TABLE `Consumidor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Dosis`
--

DROP TABLE IF EXISTS `Dosis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Dosis` (
  `idDosis` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` varchar(80) NOT NULL,
  PRIMARY KEY (`idDosis`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dosis`
--

LOCK TABLES `Dosis` WRITE;
/*!40000 ALTER TABLE `Dosis` DISABLE KEYS */;
INSERT INTO `Dosis` VALUES (1,'Señalada','La que el medico señale'),(2,'8 horas','1 cada 8 horas'),(3,'12 horas','1 cada 12 horas');
/*!40000 ALTER TABLE `Dosis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `IngActivo`
--

DROP TABLE IF EXISTS `IngActivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `IngActivo` (
  `Nombre` varchar(30) NOT NULL,
  `idIngActivo` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) DEFAULT NULL,
  `Concentracion` int(11) NOT NULL,
  `Medida` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idIngActivo`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `IngActivo_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `Producto` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IngActivo`
--

LOCK TABLES `IngActivo` WRITE;
/*!40000 ALTER TABLE `IngActivo` DISABLE KEYS */;
INSERT INTO `IngActivo` VALUES ('Ibuprofeno',1,1,400,'mg'),('Amoxicilina',2,2,500,'mg'),('Acido Clavulanico',3,2,125,'mg'),('Etoricoxib',4,3,90,'mg');
/*!40000 ALTER TABLE `IngActivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Inventario`
--

DROP TABLE IF EXISTS `Inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Inventario` (
  `idInventario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idInventario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inventario`
--

LOCK TABLES `Inventario` WRITE;
/*!40000 ALTER TABLE `Inventario` DISABLE KEYS */;
INSERT INTO `Inventario` VALUES (1,'Farmacia Aeropuerto 1'),(2,'Farmacia Centro 1');
/*!40000 ALTER TABLE `Inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Presentacion`
--

DROP TABLE IF EXISTS `Presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Presentacion` (
  `idPresentacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idPresentacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Presentacion`
--

LOCK TABLES `Presentacion` WRITE;
/*!40000 ALTER TABLE `Presentacion` DISABLE KEYS */;
INSERT INTO `Presentacion` VALUES (1,'Tableta','Porcion cilindrica pequeña'),(2,'Comprimido','Forma farmaceutica solida'),(3,'Polvos','Sustancias pulverizadas'),(4,'Granulados','Mezcla en Granos'),(5,'Capsulas','Llena de medicamento');
/*!40000 ALTER TABLE `Presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `CodigoDeBarras` varchar(30) NOT NULL,
  `idPresentacion` int(11) DEFAULT NULL,
  `idViaDeAdmin` int(11) DEFAULT NULL,
  `idDosis` int(11) DEFAULT NULL,
  `PrecioProveedor` float NOT NULL,
  `PrecioPublico` float NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Concentracion` int(11) NOT NULL,
  `Medida` varchar(10) NOT NULL,
  `idConsumidor` int(11) NOT NULL,
  `Laboratorio` varchar(30) NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `idPresentacion` (`idPresentacion`),
  KEY `idViaDeAdmin` (`idViaDeAdmin`),
  KEY `idDosis` (`idDosis`),
  KEY `idConsumidor` (`idConsumidor`),
  CONSTRAINT `Producto_ibfk_1` FOREIGN KEY (`idPresentacion`) REFERENCES `Presentacion` (`idPresentacion`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Producto_ibfk_2` FOREIGN KEY (`idViaDeAdmin`) REFERENCES `ViaDeAdmin` (`idViaDeAdmin`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Producto_ibfk_3` FOREIGN KEY (`idDosis`) REFERENCES `Dosis` (`idDosis`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Producto_ibfk_4` FOREIGN KEY (`idConsumidor`) REFERENCES `Consumidor` (`idConsumidor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
INSERT INTO `Producto` VALUES (1,'Motrin','7501287627513',1,1,1,50,56.5,45,400,'mg',5,'Pfizer'),(2,'Valclan','7541237677593',1,1,1,37.3,75,12,625,'mg',5,'Farmaceutica Wandel'),(3,'Arcoxia','7501326000864',2,1,1,87.7,123,28,90,'mg',5,'MSD');
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto_IngActivo`
--

DROP TABLE IF EXISTS `Producto_IngActivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto_IngActivo` (
  `idProducto_IngActivo` int(11) NOT NULL AUTO_INCREMENT,
  `idIngActivo` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Cantidad` float NOT NULL,
  `Medida` varchar(10) NOT NULL,
  PRIMARY KEY (`idProducto_IngActivo`),
  KEY `idIngActivo` (`idIngActivo`),
  KEY `idProducto` (`idProducto`),
  CONSTRAINT `Producto_IngActivo_ibfk_1` FOREIGN KEY (`idIngActivo`) REFERENCES `IngActivo` (`idIngActivo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Producto_IngActivo_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `Producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto_IngActivo`
--

LOCK TABLES `Producto_IngActivo` WRITE;
/*!40000 ALTER TABLE `Producto_IngActivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Producto_IngActivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto_Inventario`
--

DROP TABLE IF EXISTS `Producto_Inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto_Inventario` (
  `idProducto_Inventario` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `idInventario` int(11) NOT NULL,
  `Caducidad` date DEFAULT NULL,
  `Lote` varchar(30) NOT NULL,
  `Existencia` int(11) NOT NULL,
  PRIMARY KEY (`idProducto_Inventario`),
  KEY `idProducto` (`idProducto`),
  KEY `idInventario` (`idInventario`),
  CONSTRAINT `Producto_Inventario_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `Producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Producto_Inventario_ibfk_2` FOREIGN KEY (`idInventario`) REFERENCES `Inventario` (`idInventario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto_Inventario`
--

LOCK TABLES `Producto_Inventario` WRITE;
/*!40000 ALTER TABLE `Producto_Inventario` DISABLE KEYS */;
INSERT INTO `Producto_Inventario` VALUES (1,1,1,'2018-06-01','1502652A',10),(2,2,1,'2018-06-01','T6370',5),(3,3,1,'2018-01-31','M016186',0),(4,1,2,'2018-11-01','1245313A',3),(5,2,2,'2018-04-01','T6210',0),(6,3,1,'2018-01-31','M016186',2);
/*!40000 ALTER TABLE `Producto_Inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'farmacia','farmacia','Administrador');
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ViaDeAdmin`
--

DROP TABLE IF EXISTS `ViaDeAdmin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ViaDeAdmin` (
  `idViaDeAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Descripcion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idViaDeAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ViaDeAdmin`
--

LOCK TABLES `ViaDeAdmin` WRITE;
/*!40000 ALTER TABLE `ViaDeAdmin` DISABLE KEYS */;
INSERT INTO `ViaDeAdmin` VALUES (1,'Oral','Tomada por la boca'),(2,'Sublinugal','Debajo de la lengua'),(3,'Topica','Directamente en la zona'),(4,'Parenteral','Administrar por medio de una inyeccion'),(5,'Transdermica','Parches en la piel'),(6,'Oftalmica','Aplicar directamente en los ojos'),(7,'Otica','Aplicar directamente en los oidos'),(8,'Inhalatoria','Administrar mediante nebulizador'),(9,'Rectal','Administrar a traves del ano'),(10,'Intranasal','Aplicar en forma de pomada o solucion por la mucosa nasal'),(11,'Vaginal','Introducir dentro del canal vaginal');
/*!40000 ALTER TABLE `ViaDeAdmin` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-01 22:49:45
