-- MySQL dump 10.13  Distrib 8.0.28, for macos11 (x86_64)
--
-- Host: localhost    Database: f1_database
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `circuits`
--

DROP TABLE IF EXISTS `circuits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `circuits` (
  `circuit_id` varchar(50) NOT NULL,
  `circuit_ref` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `alt` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`circuit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `circuits`
--

LOCK TABLES `circuits` WRITE;
/*!40000 ALTER TABLE `circuits` DISABLE KEYS */;
INSERT INTO `circuits` VALUES ('1','\"albert_park\"','\"Albert Park Grand Prix Circuit\"','\"Melbourne\"','\"Australia\"',-37.8497,144.968,'10'),('10','\"hockenheimring\"','\"Hockenheimring\"','\"Hockenheim\"','\"Germany\"',49.3278,8.56583,'103'),('11','\"hungaroring\"','\"Hungaroring\"','\"Budapest\"','\"Hungary\"',47.5789,19.2486,'264'),('12','\"valencia\"','\"Valencia Street Circuit\"','\"Valencia\"','\"Spain\"',39.4589,-0.331667,'4'),('13','\"spa\"','\"Circuit de Spa-Francorchamps\"','\"Spa\"','\"Belgium\"',50.4372,5.97139,'401'),('14','\"monza\"','\"Autodromo Nazionale di Monza\"','\"Monza\"','\"Italy\"',45.6156,9.28111,'162'),('15','\"marina_bay\"','\"Marina Bay Street Circuit\"','\"Marina Bay\"','\"Singapore\"',1.2914,103.864,'18'),('16','\"fuji\"','\"Fuji Speedway\"','\"Oyama\"','\"Japan\"',35.3717,138.927,'583'),('17','\"shanghai\"','\"Shanghai International Circuit\"','\"Shanghai\"','\"China\"',31.3389,121.22,'5'),('18','\"interlagos\"','\"AutÃ³dromo JosÃ© Carlos Pace\"','\"SÃ£o Paulo\"','\"Brazil\"',-23.7036,-46.6997,'785'),('19','\"indianapolis\"','\"Indianapolis Motor Speedway\"','\"Indianapolis\"','\"USA\"',39.795,-86.2347,'223'),('2','\"sepang\"','\"Sepang International Circuit\"','\"Kuala Lumpur\"','\"Malaysia\"',2.76083,101.738,'18'),('20','\"nurburgring\"','\"NÃ¼rburgring\"','\"NÃ¼rburg\"','\"Germany\"',50.3356,6.9475,'578'),('21','\"imola\"','\"Autodromo Enzo e Dino Ferrari\"','\"Imola\"','\"Italy\"',44.3439,11.7167,'37'),('22','\"suzuka\"','\"Suzuka Circuit\"','\"Suzuka\"','\"Japan\"',34.8431,136.541,'45'),('23','\"osterreichring\"','\"A1-Ring\"','\"Spielberg\"','\"Austria\"',47.2197,14.7647,'678'),('24','\"yas_marina\"','\"Yas Marina Circuit\"','\"Abu Dhabi\"','\"UAE\"',24.4672,54.6031,'3'),('25','\"galvez\"','\"AutÃ³dromo Juan y Oscar GÃ¡lvez\"','\"Buenos Aires\"','\"Argentina\"',-34.6943,-58.4593,'8'),('26','\"jerez\"','\"Circuito de Jerez\"','\"Jerez de la Frontera\"','\"Spain\"',36.7083,-6.03417,'37'),('27','\"estoril\"','\"AutÃ³dromo do Estoril\"','\"Estoril\"','\"Portugal\"',38.7506,-9.39417,'130'),('28','\"okayama\"','\"Okayama International Circuit\"','\"Okayama\"','\"Japan\"',34.915,134.221,'266'),('29','\"adelaide\"','\"Adelaide Street Circuit\"','\"Adelaide\"','\"Australia\"',-34.9272,138.617,'58'),('3','\"bahrain\"','\"Bahrain International Circuit\"','\"Sakhir\"','\"Bahrain\"',26.0325,50.5106,'7'),('30','\"kyalami\"','\"Kyalami\"','\"Midrand\"','\"South Africa\"',-25.9894,28.0767,'1460'),('31','\"donington\"','\"Donington Park\"','\"Castle Donington\"','\"UK\"',52.8306,-1.37528,'88'),('32','\"rodriguez\"','\"AutÃ³dromo Hermanos RodrÃ­guez\"','\"Mexico City\"','\"Mexico\"',19.4042,-99.0907,'2227'),('33','\"phoenix\"','\"Phoenix street circuit\"','\"Phoenix\"','\"USA\"',33.4479,-112.075,'345'),('34','\"ricard\"','\"Circuit Paul Ricard\"','\"Le Castellet\"','\"France\"',43.2506,5.79167,'432'),('35','\"yeongam\"','\"Korean International Circuit\"','\"Yeongam County\"','\"Korea\"',34.7333,126.417,'0'),('36','\"jacarepagua\"','\"AutÃ³dromo Internacional Nelson Piquet\"','\"Rio de Janeiro\"','\"Brazil\"',-22.9756,-43.395,'1126'),('37','\"detroit\"','\"Detroit Street Circuit\"','\"Detroit\"','\"USA\"',42.3298,-83.0401,'177'),('38','\"brands_hatch\"','\"Brands Hatch\"','\"Kent\"','\"UK\"',51.3569,0.263056,'145'),('39','\"zandvoort\"','\"Circuit Park Zandvoort\"','\"Zandvoort\"','\"Netherlands\"',52.3888,4.54092,'6'),('4','\"catalunya\"','\"Circuit de Barcelona-Catalunya\"','\"MontmelÃ³\"','\"Spain\"',41.57,2.26111,'109'),('40','\"zolder\"','\"Zolder\"','\"Heusden-Zolder\"','\"Belgium\"',50.9894,5.25694,'36'),('41','\"dijon\"','\"Dijon-Prenois\"','\"Dijon\"','\"France\"',47.3625,4.89913,'484'),('42','\"dallas\"','\"Fair Park\"','\"Dallas\"','\"USA\"',32.7774,-96.7587,'139'),('43','\"long_beach\"','\"Long Beach\"','\"California\"','\"USA\"',33.7651,-118.189,'12'),('44','\"las_vegas\"','\"Las Vegas Street Circuit\"','\"Nevada\"','\"USA\"',36.1162,-115.174,'639'),('45','\"jarama\"','\"Jarama\"','\"Madrid\"','\"Spain\"',40.6171,-3.58558,'609'),('46','\"watkins_glen\"','\"Watkins Glen\"','\"New York State\"','\"USA\"',42.3369,-76.9272,'485'),('47','\"anderstorp\"','\"Scandinavian Raceway\"','\"Anderstorp\"','\"Sweden\"',57.2653,13.6042,'153'),('48','\"mosport\"','\"Mosport International Raceway\"','\"Ontario\"','\"Canada\"',44.0481,-78.6756,'332'),('49','\"montjuic\"','\"MontjuÃ¯c\"','\"Barcelona\"','\"Spain\"',41.3664,2.15167,'79'),('5','\"istanbul\"','\"Istanbul Park\"','\"Istanbul\"','\"Turkey\"',40.9517,29.405,'130'),('50','\"nivelles\"','\"Nivelles-Baulers\"','\"Brussels\"','\"Belgium\"',50.6211,4.32694,'139'),('51','\"charade\"','\"Charade Circuit\"','\"Clermont-Ferrand\"','\"France\"',45.7472,3.03889,'790'),('52','\"tremblant\"','\"Circuit Mont-Tremblant\"','\"Quebec\"','\"Canada\"',46.1877,-74.6099,'214'),('53','\"essarts\"','\"Rouen-Les-Essarts\"','\"Rouen\"','\"France\"',49.3306,1.00458,'81'),('54','\"lemans\"','\"Le Mans\"','\"Le Mans\"','\"France\"',47.95,0.224231,'67'),('55','\"reims\"','\"Reims-Gueux\"','\"Reims\"','\"France\"',49.2542,3.93083,'88'),('56','\"george\"','\"Prince George Circuit\"','\"Eastern Cape Province\"','\"South Africa\"',-33.0486,27.8736,'15'),('57','\"zeltweg\"','\"Zeltweg\"','\"Styria\"','\"Austria\"',47.2039,14.7478,'676'),('58','\"aintree\"','\"Aintree\"','\"Liverpool\"','\"UK\"',53.4769,-2.94056,'20'),('59','\"boavista\"','\"Circuito da Boavista\"','\"Oporto\"','\"Portugal\"',41.1705,-8.67325,'28'),('6','\"monaco\"','\"Circuit de Monaco\"','\"Monte-Carlo\"','\"Monaco\"',43.7347,7.42056,'7'),('60','\"riverside\"','\"Riverside International Raceway\"','\"California\"','\"USA\"',33.937,-117.273,'470'),('61','\"avus\"','\"AVUS\"','\"Berlin\"','\"Germany\"',52.4806,13.2514,'53'),('62','\"monsanto\"','\"Monsanto Park Circuit\"','\"Lisbon\"','\"Portugal\"',38.7197,-9.20306,'158'),('63','\"sebring\"','\"Sebring International Raceway\"','\"Florida\"','\"USA\"',27.4547,-81.3483,'18'),('64','\"ain-diab\"','\"Ain Diab\"','\"Casablanca\"','\"Morocco\"',33.5786,-7.6875,'19'),('65','\"pescara\"','\"Pescara Circuit\"','\"Pescara\"','\"Italy\"',42.475,14.1508,'129'),('66','\"bremgarten\"','\"Circuit Bremgarten\"','\"Bern\"','\"Switzerland\"',46.9589,7.40194,'551'),('67','\"pedralbes\"','\"Circuit de Pedralbes\"','\"Barcelona\"','\"Spain\"',41.3903,2.11667,'85'),('68','\"buddh\"','\"Buddh International Circuit\"','\"Uttar Pradesh\"','\"India\"',28.3487,77.5331,'194'),('69','\"americas\"','\"Circuit of the Americas\"','\"Austin\"','\"USA\"',30.1328,-97.6411,'161'),('7','\"villeneuve\"','\"Circuit Gilles Villeneuve\"','\"Montreal\"','\"Canada\"',45.5,-73.5228,'13'),('70','\"red_bull_ring\"','\"Red Bull Ring\"','\"Spielberg\"','\"Austria\"',47.2197,14.7647,'678'),('71','\"sochi\"','\"Sochi Autodrom\"','\"Sochi\"','\"Russia\"',43.4057,39.9578,'2'),('72','\"port_imperial\"','\"Port Imperial Street Circuit\"','\"New Jersey\"','\"USA\"',40.7769,-74.0111,'4'),('73','\"BAK\"','\"Baku City Circuit\"','\"Baku\"','\"Azerbaijan\"',40.3725,49.8533,'-7'),('74','\"hanoi\"','\"Hanoi Street Circuit\"','\"Hanoi\"','\"Vietnam\"',21.0166,105.766,'9'),('75','\"portimao\"','\"AutÃ³dromo Internacional do Algarve\"','\"PortimÃ£o\"','\"Portugal\"',37.227,-8.6267,'108'),('76','\"mugello\"','\"Autodromo Internazionale del Mugello\"','\"Mugello\"','\"Italy\"',43.9975,11.3719,'255'),('77','\"jeddah\"','\"Jeddah Corniche Circuit\"','\"Jeddah\"','\"Saudi Arabia\"',21.6319,39.1044,'15'),('78','\"losail\"','\"Losail International Circuit\"','\"Al Daayen\"','\"Qatar\"',25.49,51.4542,'\\N'),('79','\"miami\"','\"Miami International Autodrome\"','\"Miami\"','\"USA\"',25.9581,-80.2389,'\\N'),('8','\"magny_cours\"','\"Circuit de Nevers Magny-Cours\"','\"Magny Cours\"','\"France\"',46.8642,3.16361,'228'),('9','\"silverstone\"','\"Silverstone Circuit\"','\"Silverstone\"','\"UK\"',52.0786,-1.01694,'153');
/*!40000 ALTER TABLE `circuits` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-05 18:21:19
