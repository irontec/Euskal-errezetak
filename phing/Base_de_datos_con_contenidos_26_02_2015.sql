-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: euskal_errezetak
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Categories` (
  `id` mediumint(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '[ml]',
  `name_es` varchar(20) NOT NULL,
  `name_eu` varchar(20) NOT NULL,
  `imgFileSize` int(11) unsigned DEFAULT NULL COMMENT '[FSO]',
  `imgMimeType` varchar(80) DEFAULT NULL,
  `imgBaseName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='[entity][rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categories`
--

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
INSERT INTO `Categories` VALUES (6,'','Comida tÃ­pica','Betiko errezetak',114849,'image/jpeg; charset=binary','Betiko_errezetak_web.jpg'),(9,'','Pintxos','Pintxoak',126082,'image/jpeg; charset=binary','Pintxoak_web.jpg'),(10,'','Bebidas','Edariak',166304,'image/jpeg; charset=binary','Edariak_web.jpg'),(11,'','Producto autÃ³ctono','Bertoko produktuak',447941,'image/png; charset=binary','Bertokoak_web.png');
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `KlearUsers`
--

DROP TABLE IF EXISTS `KlearUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `KlearUsers` (
  `userId` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(80) NOT NULL COMMENT '[password]',
  `active` tinyint(1) DEFAULT '1',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='[entity]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `KlearUsers`
--

LOCK TABLES `KlearUsers` WRITE;
/*!40000 ALTER TABLE `KlearUsers` DISABLE KEYS */;
INSERT INTO `KlearUsers` VALUES (1,'admin','','$2a$08$0hHHBX8So9JhU0a0SNnRCeAZcMEdAfn7T/pl/u/pESzBwztldhRnO',1,'2015-02-03 11:41:57');
/*!40000 ALTER TABLE `KlearUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RecipeCategory`
--

DROP TABLE IF EXISTS `RecipeCategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RecipeCategory` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `recipeId` mediumint(4) NOT NULL,
  `categoryId` mediumint(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipeId` (`recipeId`),
  KEY `categoryId` (`categoryId`),
  CONSTRAINT `RecipeCategory_ibfk_1` FOREIGN KEY (`recipeId`) REFERENCES `Recipes` (`id`),
  CONSTRAINT `RecipeCategory_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `Categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='[rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RecipeCategory`
--

LOCK TABLES `RecipeCategory` WRITE;
/*!40000 ALTER TABLE `RecipeCategory` DISABLE KEYS */;
INSERT INTO `RecipeCategory` VALUES (1,1,6),(2,1,11),(4,3,10),(8,6,6),(9,6,11),(10,5,6),(11,2,11),(12,7,10),(13,8,9),(14,9,9),(15,10,6),(16,11,6),(17,11,11),(18,12,11),(19,13,6),(20,14,6),(21,15,6),(22,16,6),(23,16,11),(24,17,6),(25,17,11),(26,18,6),(27,19,11),(28,20,6),(29,20,11),(30,21,6),(31,22,9);
/*!40000 ALTER TABLE `RecipeCategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RecipeTag`
--

DROP TABLE IF EXISTS `RecipeTag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RecipeTag` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `recipeId` mediumint(2) NOT NULL,
  `tagId` mediumint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagId` (`tagId`),
  KEY `recipeId` (`recipeId`,`tagId`),
  CONSTRAINT `RecipeTag_ibfk_1` FOREIGN KEY (`recipeId`) REFERENCES `Recipes` (`id`),
  CONSTRAINT `RecipeTag_ibfk_2` FOREIGN KEY (`tagId`) REFERENCES `Tags` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8 COMMENT='[rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RecipeTag`
--

LOCK TABLES `RecipeTag` WRITE;
/*!40000 ALTER TABLE `RecipeTag` DISABLE KEYS */;
INSERT INTO `RecipeTag` VALUES (1,1,3),(3,1,4),(8,1,7),(9,2,3),(12,2,14),(13,2,26),(14,3,9),(15,3,10),(16,3,11),(17,5,3),(18,5,20),(19,5,21),(20,5,22),(21,5,23),(22,6,24),(23,6,25),(24,6,26),(25,7,9),(26,7,12),(27,7,13),(10,8,3),(28,8,14),(29,8,15),(30,8,16),(11,9,3),(31,9,17),(32,9,18),(33,10,3),(34,10,4),(35,12,17),(36,13,4),(37,13,25),(38,13,26),(39,14,24),(40,14,26),(41,15,22),(42,15,25),(43,15,26),(44,16,22),(45,16,25),(46,16,26),(47,17,26),(48,18,3),(49,18,22),(50,18,26),(51,20,22),(52,21,3),(53,21,17),(54,21,25),(55,21,26),(56,22,17);
/*!40000 ALTER TABLE `RecipeTag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recipes`
--

DROP TABLE IF EXISTS `Recipes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Recipes` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL COMMENT '[ml]',
  `name_es` varchar(80) NOT NULL,
  `name_eu` varchar(80) NOT NULL,
  `ingredients` text NOT NULL COMMENT '[html][ml]',
  `ingredients_es` text NOT NULL COMMENT '[html]',
  `ingredients_eu` text NOT NULL COMMENT '[html]',
  `directions` text NOT NULL COMMENT '[html][ml]',
  `directions_es` text NOT NULL COMMENT '[html]',
  `directions_eu` text NOT NULL COMMENT '[html]',
  `time` varchar(80) NOT NULL COMMENT '[ml]',
  `time_es` varchar(80) NOT NULL,
  `time_eu` varchar(80) NOT NULL,
  `difficulty` varchar(10) NOT NULL COMMENT '[enum:easy|medium|hard]',
  `cost` int(4) NOT NULL,
  `people` int(2) NOT NULL,
  `pictureFileSize` int(11) unsigned NOT NULL COMMENT '[FSO]',
  `pictureMimeType` varchar(80) NOT NULL,
  `pictureBaseName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='[entity][rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recipes`
--

LOCK TABLES `Recipes` WRITE;
/*!40000 ALTER TABLE `Recipes` DISABLE KEYS */;
INSERT INTO `Recipes` VALUES (1,'','Pimientos verdes de Gernika fritos','Gernikako piper berde frijituak','','<ul>\r\n<li>1kg Gernikako piper berde</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','<ul>\r\n<li>1kg Gernikako piper berde</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','','<p>Piperrak ongi garbitu ostean, ondo lehortu eta albo batean utzi.</p>\r\n<p>Zartagin batean oliba olio askotxo su handian berotzen jarri; bi atzamar inguru.</p>\r\n<p>Olioa bero dagoela ikusten dugunean; kea botatzen hasi aurretik, piperrak multzoka egiten hasi. Denak batera ez direnez ongi sartuko, txanda ezberdinetan egin beharko dira.</p>\r\n<p>Txanda bakoitza ez da denbora askoz eduki behar sutan; 20-30 segundo nahikoak izango dira. Behin denbora hori pasata, gehiegizko olioa kentzeko paper xurgatzaile baten gainean utzi.</p>\r\n<p>Denak eginda daudenean, gatza norbere gustura bota eta hotzitu aurretik zerbitzatu behar dira.</p>\r\n<p><strong>Oharra:</strong>&nbsp;Gogoratu ez direla inoiz gorritu behar, koskada bakoitzean gorgotasun pixka bat antzeman behar da.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Restaurante Kaialde</em>&nbsp;https://flic.kr/p/8jEdD9</p>','<p>Piperrak ongi garbitu ostean, ondo lehortu eta albo batean utzi.</p>\r\n<p>Zartagin batean oliba olio askotxo su handian berotzen jarri; bi atzamar inguru.</p>\r\n<p>Olioa bero dagoela ikusten dugunean; kea botatzen hasi aurretik, piperrak multzoka egiten hasi. Denak batera ez direnez ongi sartuko, txanda ezberdinetan egin beharko dira.</p>\r\n<p>Txanda bakoitza ez da denbora askoz eduki behar sutan; 20-30 segundo nahikoak izango dira. Behin denbora hori pasata, gehiegizko olioa kentzeko paper xurgatzaile baten gainean utzi.</p>\r\n<p>Denak eginda daudenean, gatza norbere gustura bota eta hotzitu aurretik zerbitzatu behar dira.</p>\r\n<p><strong>Oharra:</strong>&nbsp;Gogoratu ez direla inoiz gorritu behar, koskada bakoitzean gorgotasun pixka bat antzeman behar da.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Restaurante Kaialde</em> https://flic.kr/p/8jEdD9</p>','10','10 minutu','10 minutu','easy',10,4,136100,'image/jpeg; charset=binary','Piperrak_web.jpg'),(2,'','Anchoas frescas rebozadas','Antxoa fresko arrautzaztatuak','','<ul>\r\n<li>500gr antxoa fresko</li>\r\n<li>1 baratxuri-atal</li>\r\n<li>2 arrautza</li>\r\n<li>1 koilaratxokada legamin</li>\r\n<li>1 koilaratxokada irin</li>\r\n<li>1 koilaratxokada arto-irin</li>\r\n<li>Oliba olioa</li>\r\n<li>Perrexila</li>\r\n<li>Gatza</li>\r\n<li>Aukeran pikillo piper poto bat</li>\r\n</ul>','<ul>\r\n<li>500gr antxoa fresko</li>\r\n<li>1 baratxuri-atal</li>\r\n<li>2 arrautza</li>\r\n<li>1 koilaratxokada legamin</li>\r\n<li>1 koilaratxokada irin</li>\r\n<li>1 koilaratxokada arto-irin</li>\r\n<li>Oliba olioa</li>\r\n<li>Perrexila</li>\r\n<li>Gatza</li>\r\n<li>Aukeran pikillo piper poto bat</li>\r\n</ul>','','Antxoak garbitu, bizkarrezurra kendu eta paper xurgatzaile gainean utzi ura kentzeko.\r\n<p>Plater batetan bi arrautzak irabiatu eta jarraian baratxuri txikitua, perrexila eta legami, irin eta arto-irin koilaratxokada gehitu eta berriz irabiatu pikor guztiak desagertu arte.</p>\r\n<p>Zartagin batean oliba olioa berotzen jarri. Antxoak arrautzatik pasatu eta gatza gustura bota ostean, zartaginean erre bi aldeetatik. Gorrituta daudela ikustean, sutatik kendu eta berriz paper xurgatzaile baten gainean utzi gehiegizko olioa kentzeko.</p>\r\n<p>Aukeran, beste zartagin batean olio berotu eta pikillo piperrak prestatu behar dira; 12 minutuz gutxi gorabehera.</p>\r\n<p>Zerbitzatzeko, plater batean jarri antxoa guztiak eta piperrekin lagundu.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Maite Elorza</em>&nbsp;https://flic.kr/p/7ZDu2m</p>','Antxoak garbitu, bizkarrezurra kendu eta paper xurgatzaile gainean utzi ura kentzeko.\r\n<p>Plater batetan bi arrautzak irabiatu eta jarraian baratxuri txikitua, perrexila eta legami, irin eta arto-irin koilaratxokada gehitu eta berriz irabiatu pikor guztiak desagertu arte.</p>\r\n<p>Zartagin batean oliba olioa berotzen jarri. Antxoak arrautzatik pasatu eta gatza gustura bota ostean, zartaginean erre bi aldeetatik. Gorrituta daudela ikustean, sutatik kendu eta berriz paper xurgatzaile baten gainean utzi gehiegizko olioa kentzeko.</p>\r\n<p>Aukeran, beste zartagin batean olio berotu eta pikillo piperrak prestatu behar dira; 12 minutuz gutxi gorabehera.</p>\r\n<p>Zerbitzatzeko, plater batean jarri antxoa guztiak eta piperrekin lagundu.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Maite Elorza</em>&nbsp;https://flic.kr/p/7ZDu2m</p>','25','25 minutu','25 minutu','medium',15,4,103447,'image/jpeg; charset=binary','Antxoak_web.jpg'),(3,'','PacharÃ¡n','Patxarana','','<ul>\r\n<li>250gr basaran</li>\r\n<li>1l pattar</li>\r\n<li>Aukeran kafe-ale batzuk</li>\r\n</ul>','<ul>\r\n<li>250gr basaran</li>\r\n<li>1l pattar</li>\r\n<li>Aukeran kafe-ale batzuk</li>\r\n</ul>','','Basaranak eta pattarra botila batean nahastu eta beratzen utzi 7 edo 8 hilabetez leku fresko eta ilunean. Denbora igarota, iragazi egin behar da, ziroparekin nahastu (ura eta azukrea batera irakinda) eta botilaratu.<br />Beratzean erramu hosto bat edo kafe-aleak ere gehitu daitezke, ikutu berezia emateko. Gutxi batzuetan beste osagai ugari ere gehitu dakioke, hala nola, kamamila loreak, mitxoletak edo kanela zotza.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Pablo Arroyo</em>&nbsp;https://flic.kr/p/GgyR1','Basaranak eta pattarra botila batean nahastu eta beratzen utzi 7 edo 8 hilabetez leku fresko eta ilunean. Denbora igarota, iragazi egin behar da, ziroparekin nahastu (ura eta azukrea batera irakinda) eta botilaratu.<br />Beratzean erramu hosto bat edo kafe-aleak ere gehitu daitezke, ikutu berezia emateko. Gutxi batzuetan beste osagai ugari ere gehitu dakioke, hala nola, kamamila loreak, mitxoletak edo kanela zotza.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Pablo Arroyo</em> https://flic.kr/p/GgyR1','10','7-8 hilabete','7-8 hilabete','easy',12,4,109325,'image/jpeg; charset=binary','Patxarana_web.jpg'),(5,'','Alubias de Tolosa','Tolosako babarrunak','','<ul>\r\n<li>500gr Tolosako babarrun</li>\r\n<li>2 baratxuri-atal</li>\r\n<li>1 kipula</li>\r\n<li>1 piper berde</li>\r\n<li>1 tomate</li>\r\n<li>1 txorizo</li>\r\n<li>1 hirugihar zati</li>\r\n<li>2 txerri saiheski zatitu</li>\r\n<li>1 odolostea</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n<li>Piperminak (aukeran)</li>\r\n</ul>','<ul>\r\n<li>500gr Tolosako babarrun</li>\r\n<li>2 baratxuri-atal</li>\r\n<li>1 kipula</li>\r\n<li>1 piper berde</li>\r\n<li>1 tomate</li>\r\n<li>1 txorizo</li>\r\n<li>1 hirugihar zati</li>\r\n<li>2 txerri saiheski zatitu</li>\r\n<li>1 odolostea</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n<li>Piperminak (aukeran)</li>\r\n</ul>','','<p>Zortzi ordu lehenago, babarrunak beratzen jarri. Platera prestatzen hasterakoan, ura kendu eta irakiten jarri.</p>\r\n<p>Irakiten hastean, ur hotz pixka batekin tenperatura aldaketatxo bat eman eta baratxuriak osorik eta kipula, piper berde eta tomatea txikituta gehitu.</p>\r\n<p>Jarraian, txorizo, sahieski eta hirugiharra gehitu eta bi ordu eta erdiz edo hiru orduz su baxuan utzi. Denbora hori pasa ostean, odolostea gehitu eta beste 20 minutuz sutan mantendu.</p>\r\n<p>Txorizo, hirugihar eta odolostea atera eta zati txikiagotan moztu ostean berriz gehitu lapikora.</p>\r\n<p>Azkenik, denbora batez geldirik utzi ostean, jateko moduan egongo da. Nahi izanez gero, piperminak gehitu daitezke.</p>\r\n<p><strong>Argazkiaren egilea:</strong>&nbsp;<em>Boca Dorada</em>&nbsp;https://flic.kr/p/u9XRK</p>','<p>Zortzi ordu lehenago, babarrunak beratzen jarri. Platera prestatzen hasterakoan, ura kendu eta irakiten jarri.</p>\r\n<p>Irakiten hastean, ur hotz pixka batekin tenperatura aldaketatxo bat eman eta baratxuriak osorik eta kipula, piper berde eta tomatea txikituta gehitu.</p>\r\n<p>Jarraian, txorizo, sahieski eta hirugiharra gehitu eta bi ordu eta erdiz edo hiru orduz su baxuan utzi. Denbora hori pasa ostean, odolostea gehitu eta beste 20 minutuz sutan mantendu.</p>\r\n<p>Txorizo, hirugihar eta odolostea atera eta zati txikiagotan moztu ostean berriz gehitu lapikora.</p>\r\nAzkenik, denbora batez geldirik utzi ostean, jateko moduan egongo da. Nahi izanez gero, piperminak gehitu daitezke.<br />\r\n<p><strong>Argazkiaren egilea:</strong> <em>Boca Dorada</em> https://flic.kr/p/u9XRK</p>','720','8 ordu beratzen, 2-3 prestatzen','8 ordu beratzen, 2-3 prestatzen','hard',20,4,306312,'image/png; charset=binary','Babarrunak_web.png'),(6,'','Bacalao al pil-pil','Bakailaoa pil-pilean','','<ul>\r\n<li>4 bakailaoa solomo gezatu</li>\r\n<li>8 baratxuri-atal</li>\r\n<li>1 pipermin</li>\r\n<li>500gr patata txiki</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n<li>Perrexila</li>\r\n</ul>','<ul>\r\n<li>4 bakailaoa solomo gezatu</li>\r\n<li>8 baratxuri-atal</li>\r\n<li>1 pipermin</li>\r\n<li>500gr patata txiki</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n<li>Perrexila</li>\r\n</ul>','','<p>Patatak ongi garbitu eta olio pixka bat bota ostean, labean sartu eta egin daitezela 25-30 minutuz 180 gradutan.</p>\r\n<p>Bakailaoa solomo urez beteriko lapiko batean jarri eta ura irakiten hastean (ez utzi minutu bat baino gehiago irakiten) sua itzali eta atera bakailaoa epeltzeko.</p>\r\n<p>Zuritu baratxuriak eta olio askorekin osorik frijitu kazola batean. Pipermina lau zatita moztu eta gehitu kazolara. Baratxuriak gorritzean, atera dena eta utzi olioa epeltzen.</p>\r\n<p>Beste kazola batean jarri bakailaoa solomoak azala goiko aldean utziz eta pixkanaka erabili den olio epel hori gehitzen hasi. Olioa gehitu hala, kazolarekin mugimendu zirkularrak egin behar dira olioa loditu arte (10-12 minutu beharko ditu). Bukatzeko, gehitu baratxuri erreak eta pipermina.</p>\r\n<p>Zerbitzatzerakoan patatekin lagundu eta perrexilarekin apaindu.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Mikel Agirregabiria</em>&nbsp;https://flic.kr/p/8FP3ct</p>','<p>Patatak ongi garbitu eta olio pixka bat bota ostean, labean sartu eta egin daitezela 25-30 minutuz 180 gradutan.</p>\r\n<p>Bakailaoa solomo urez beteriko lapiko batean jarri eta ura irakiten hastean (ez utzi minutu bat baino gehiago irakiten) sua itzali eta atera bakailaoa epeltzeko.</p>\r\n<p>Zuritu baratxuriak eta olio askorekin osorik frijitu kazola batean. Pipermina lau zatita moztu eta gehitu kazolara. Baratxuriak gorritzean, atera dena eta utzi olioa epeltzen.</p>\r\n<p>Beste kazola batean jarri bakailaoa solomoak azala goiko aldean utziz eta pixkanaka erabili den olio epel hori gehitzen hasi. Olioa gehitu hala, kazolarekin mugimendu zirkularrak egin behar dira olioa loditu arte (10-12 minutu beharko ditu). Bukatzeko, gehitu baratxuri erreak eta pipermina.</p>\r\nZerbitzatzerakoan patatekin lagundu eta perrexilarekin apaindu.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Mikel Agirregabiria</em> https://flic.kr/p/8FP3ct','50','50 minutu','50 minutu','hard',30,4,145299,'image/jpeg; charset=binary','Bakailaoa_web.jpg'),(7,'','Calimocho','Kalimotxoa','','<ul>\r\n<li>1l ardo beltza</li>\r\n<li>1l Coca-Cola</li>\r\n</ul>','<ul>\r\n<li>1l ardo beltza</li>\r\n<li>1l Coca-Cola</li>\r\n</ul>','','<p>Ardo beltza eta Coca-cola litro bana bi litroko botila batean nahastu.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Sarah H</em>&nbsp;https://flic.kr/p/bW2Tkp</p>','<p>Ardo beltza eta Coca-cola litro bana bi litroko botila batean nahastu.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Sarah H</em> https://flic.kr/p/bW2Tkp</p>','2','2 minutu','2 minutu','easy',3,2,86352,'image/jpeg; charset=binary','Kalimotxo_web.jpg'),(8,'','Antxoa gazituak jamoi eta piperrekin','Antxoa gazituak jamoi eta piperrekin','','(4 pintxo egiteko)\r\n<ul>\r\n<li>4 ogi txigortu (gomendagarria da intxaur eta mahaspasaduna izatea)</li>\r\n<li>2 piper berde</li>\r\n<li>Jamoi iberikoa</li>\r\n<li>12 antxoa gazitu</li>\r\n<li>1 kipula</li>\r\n<li>4 baratxuri-atal</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','(4 pintxo egiteko)\r\n<ul>\r\n<li>4 ogi txigortu (gomendagarria da intxaur eta mahaspasaduna izatea)</li>\r\n<li>2 piper berde</li>\r\n<li>Jamoi iberikoa</li>\r\n<li>12 antxoa gazitu</li>\r\n<li>1 kipula</li>\r\n<li>4 baratxuri-atal</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','','<p>Ontzi batean 4 baratxuri-atal jarri eta oliba olioarekin estali. Ondoren, su baxuan melatu samur eta krematsu egon arte.<br /><br />Kipula oso mehe moztu eta berdina egin; zartagin batean oliotan egin ondo bigundu arte.</p>\r\n<p>Bitartean, zartagin batean olio tanta batzuk bota eta piper berdeak gorritu. Eginda daudenean, kontu handiz zuritu.</p>\r\n<p>Behin osagai guztiak prest izanik, pintxoa osatzea bakarrik falta da. Horretarako, ogi bakoitzaren gainean piperrak jarri, eta horien gainean jamoi iberikoa eta antxoak gehitu. Bukatzeko, kipula eta baratxuriak gehitu.</p>\r\n<p><strong>Oharra:</strong>&nbsp;Pintxo honen sekretua, prestatzeko erabili diren produktuen kalitatean datza. Zenbat eta antxoa hobeagoa erabili, orduan eta pintxo hobea lortuko dugu!<br /><br /></p>\r\n<p><strong>Argazkiaren egilea:</strong>&nbsp;<em>Krista</em>&nbsp;https://flic.kr/p/9FGyJL</p>','<p>Ontzi batean 4 baratxuri-atal jarri eta oliba olioarekin estali. Ondoren, su baxuan melatu samur eta krematsu egon arte.<br /><br />Kipula oso mehe moztu eta berdina egin; zartagin batean oliotan egin ondo bigundu arte.</p>\r\n<p>Bitartean, zartagin batean olio tanta batzuk bota eta piper berdeak gorritu. Eginda daudenean, kontu handiz zuritu.</p>\r\n<p>Behin osagai guztiak prest izanik, pintxoa osatzea bakarrik falta da. Horretarako, ogi bakoitzaren gainean piperrak jarri, eta horien gainean jamoi iberikoa eta antxoak gehitu. Bukatzeko, kipula eta baratxuriak gehitu.</p>\r\n<strong>Oharra:</strong> Pintxo honen sekretua, prestatzeko erabili diren produktuen kalitatean datza. Zenbat eta antxoa hobeagoa erabili, orduan eta pintxo hobea lortuko dugu!<br /><br />\r\n<p><strong>Argazkiaren egilea:</strong> <em>Krista</em> https://flic.kr/p/9FGyJL</p>','15','15 minutos','15 minutu','easy',12,4,133045,'image/jpeg; charset=binary','Pintxo_antxoa_web.jpg'),(9,'','Barrengorriak galeper arrautzarekin','Barrengorriak galeper arrautzarekin','','(4 pintxo egiteko)\r\n<ul>\r\n<li>4 barrengorri handi</li>\r\n<li>Urdaiazpiko iberiko-zatiak</li>\r\n<li>1 tipulin</li>\r\n<li>1 arrautza birrindu</li>\r\n<li>1 piper berde</li>\r\n<li>4 galeper arrautza</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','(4 pintxo egiteko)\r\n<ul>\r\n<li>4 barrengorri handi</li>\r\n<li>Urdaiazpiko iberiko-zatiak</li>\r\n<li>1 tipulin</li>\r\n<li>1 arrautza birrindu</li>\r\n<li>1 piper berde</li>\r\n<li>4 galeper arrautza</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','','<p>Barrengorriak kontu handiz garbitu ahalik eta gutxien umeltzeko. Ondoren, txapela eta enborra banatu eta txapelak 10 minutuz 180 gradutan labean erre.</p>\r\n<p>Bitartean, tipulina txikitu ostean oliba oliotan sueztitu. Piperra eta barrengorrien enborra txiki-txiki egin eta zartagira gehitu.</p>\r\n<p>Dena ongi egina dagoenean, sutatetik kendu eta txapelak bete. Beste alde batetik, ur irakitan ozpin tanta batzuk bota eta arrautzak galdarraztatu.</p>\r\n<p>Bukatzeko, barrengorri betearen gainean arrautza jarri eta apaindu tipulin pixka batekin.</p>\r\n<p><strong>Argazkiaren egilea:</strong>&nbsp;<em>I&ntilde;aki Arrieta Baro</em>&nbsp;https://flic.kr/p/bVWxEe</p>','<p>Barrengorriak kontu handiz garbitu ahalik eta gutxien umeltzeko. Ondoren, txapela eta enborra banatu eta txapelak 10 minutuz 180 gradutan labean erre.</p>\r\n<p>Bitartean, tipulina txikitu ostean oliba oliotan sueztitu. Piperra eta barrengorrien enborra txiki-txiki egin eta zartagira gehitu.</p>\r\n<p>Dena ongi egina dagoenean, sutatetik kendu eta txapelak bete. Beste alde batetik, ur irakitan ozpin tanta batzuk bota eta arrautzak galdarraztatu.</p>\r\n<p>Bukatzeko, barrengorri betearen gainean arrautza jarri eta apaindu tipulin pixka batekin.</p>\r\n<p><strong>Argazkiaren egilea:</strong> <em>I&ntilde;aki Arrieta Baro</em> https://flic.kr/p/bVWxEe</p>','20','20 minutu','20 minutu','medium',12,4,130741,'image/jpeg; charset=binary','Barrengorriak_web.jpg'),(10,'','Menestra Bilboko erara','Menestra Bilboko erara','','<ul>\r\n<li>Oilo txiki bat&nbsp;</li>\r\n<li>Txerri solomo 250 g&nbsp;</li>\r\n<li>Txahal azpizuna 125 g&nbsp;</li>\r\n<li>Urdaiazpiko ondu 200 g&nbsp;</li>\r\n<li>500 g ilar, 6 esparrago, 6 porru, 6 tipula berri, azalore txiki bat, 12 alkatxofa txiki, 2 letxuga, tipula bat, azenario bat, tomate bat, 12 patata berri, 4 arrautza gogor, 4 perretxiko&nbsp;</li>\r\n<li>Perrexila, ardo zuria, salda, gurina, irina, oliba olio, gatza eta piperbeltza</li>\r\n</ul>','<ul>\r\n<li>Oilo txiki bat&nbsp;</li>\r\n<li>Txerri solomo 250 g&nbsp;</li>\r\n<li>Txahal azpizuna 125 g&nbsp;</li>\r\n<li>Urdaiazpiko ondu 200 g&nbsp;</li>\r\n<li>500 g ilar, 6 esparrago, 6 porru, 6 tipula berri, azalore txiki bat, 12 alkatxofa txiki, 2 letxuga, tipula bat, azenario bat, tomate bat, 12 patata berri, 4 arrautza gogor, 4 perretxiko&nbsp;</li>\r\n<li>Perrexila, ardo zuria, salda, gurina, irina, oliba olio, gatza eta piperbeltza</li>\r\n</ul>\r\n<p></p>','','<p>Urdaiazpikoa, oiloa, solomo eta azpizuna buztin ontzi batean frijitu. Egina dagoenean atera. Beste aldetik, barazkiak, patatak, ilarrak eta perretxikoak ezik, garbitu eta irakiten dira banan bana. Azenarioa, tipula (aurrez zatituta eta gurinean frijitua), tomatea, salda baso bat, ardo zarrapata, gurina, gatza, piperbeltza eta perrexila ordu erdiz egosi ondoren aterakoarekin saltsa egin pure-egiteko tresnatik.&nbsp;</p>\r\n<p>Saltsa hau buztin kazola batean bota aurrez frijitutako haragi mota ezberdinen gainean. Biguna egon arte egosi, ondoren perretxikoak, ilarrak eta patata berriak gehituz.&nbsp;</p>\r\n<p>Barazki eta arrautza gogorrak gurinean eta arrautza irabiatuan nahastu, esparragoak ezik. Zartaginetik pasa ondoren, buztin kazolara bota, arrautza egosiekin eta esparragoekin apainduz.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;Joselu Blanco&nbsp;https://flic.kr/p/8bzeXp</p>','<p>Urdaiazpikoa, oiloa, solomo eta azpizuna buztin ontzi batean frijitu. Egina dagoenean atera. Beste aldetik, barazkiak, patatak, ilarrak eta perretxikoak ezik, garbitu eta irakiten dira banan bana. Azenarioa, tipula (aurrez zatituta eta gurinean frijitua), tomatea, salda baso bat, ardo zarrapata, gurina, gatza, piperbeltza eta perrexila ordu erdiz egosi ondoren aterakoarekin saltsa egin pure-egiteko tresnatik.&nbsp;</p>\r\n<p>Saltsa hau buztin kazola batean bota aurrez frijitutako haragi mota ezberdinen gainean. Biguna egon arte egosi, ondoren perretxikoak, ilarrak eta patata berriak gehituz.&nbsp;</p>\r\n<p>Barazki eta arrautza gogorrak gurinean eta arrautza irabiatuan nahastu, esparragoak ezik. Zartaginetik pasa ondoren, buztin kazolara bota, arrautza egosiekin eta esparragoekin apainduz.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;Joselu Blanco&nbsp;https://flic.kr/p/8bzeXp</p>','50','50 minutu','50 minutu','medium',20,4,117517,'image/jpeg; charset=binary','Menestra_web.jpg'),(11,'','Patatak Errioxako erara','Patatak Errioxako erara','','<ul>\r\n<li>Patata kilo bat&nbsp;</li>\r\n<li>Txorixo 400 g&nbsp;</li>\r\n<li>4 Txorixo piperrak&nbsp;</li>\r\n<li>2 tipulak&nbsp;</li>\r\n<li>Tomate saltsa 50 ml.&nbsp;</li>\r\n<li>Salda</li>\r\n</ul>','<ul>\r\n<li>Patata kilo bat&nbsp;</li>\r\n<li>Txorixo 400 g&nbsp;</li>\r\n<li>4 Txorixo piperrak&nbsp;</li>\r\n<li>2 tipulak&nbsp;</li>\r\n<li>Tomate saltsa 50 ml.&nbsp;</li>\r\n<li>Salda</li>\r\n</ul>','','<p>Tipula arin xigortuta frijitu. Ontzi batean salda egosi dado eran zatitutako patata eta tomate saltsarekin. Egoserdian txorixoa gehitu, xerra loditan. Txorixo piperren haragia bota tipula duen zartaginera, tipula egina dagoenean. Saltsa hori pure-egiteko batez pasa eta ontzira bota, eta ondoren patatak egin arte itxaron.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Alberto S&aacute;nchez Fern&aacute;ndez</em>&nbsp;https://flic.kr/p/py7qzX</p>','<p>Tipula arin xigortuta frijitu. Ontzi batean salda egosi dado eran zatitutako patata eta tomate saltsarekin. Egoserdian txorixoa gehitu, xerra loditan. Txorixo piperren haragia bota tipula duen zartaginera, tipula egina dagoenean. Saltsa hori pure-egiteko batez pasa eta ontzira bota, eta ondoren patatak egin arte itxaron.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Alberto S&aacute;nchez Fern&aacute;ndez</em>&nbsp;https://flic.kr/p/py7qzX</p>','30','30 minutu','30 minutu','easy',12,4,149981,'image/jpeg; charset=binary','Patatak_errioxa_web.jpg'),(12,'','Perretxikoak nahasturan','Perretxikoak nahasturan','','<ul>\r\n<li>Perretxiko kilo bat&nbsp;</li>\r\n<li>10 arrautza&nbsp;</li>\r\n<li>Oliba olio&nbsp;</li>\r\n<li>Gatza</li>\r\n</ul>','<ul>\r\n<li>Perretxiko kilo bat&nbsp;</li>\r\n<li>10 arrautza&nbsp;</li>\r\n<li>Oliba olio&nbsp;</li>\r\n<li>Gatza</li>\r\n</ul>','','Perretxikoak garbitu eta zatitu ondoren, gatza pixka batekin sueztitu su moderatuan ondo eginak gera arte. Beste zartagin batera pasa olio pixka batekin eta su indartsuan arrautzak bota irabiatu gabe, nahi den gatzarekin batera. Nahasi eta gutxi egina utzi.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Pablo Monteagudo</em>&nbsp;https://flic.kr/p/92UqUU','<p>Perretxikoak garbitu eta zatitu ondoren, gatza pixka batekin sueztitu su moderatuan ondo eginak gera arte. Beste zartagin batera pasa olio pixka batekin eta su indartsuan arrautzak bota irabiatu gabe, nahi den gatzarekin batera. Nahasi eta gutxi egina utzi.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Pablo Monteagudo</em> https://flic.kr/p/92UqUU</p>','10','10 minutu','10 minutu','easy',8,2,151811,'image/jpeg; charset=binary','Perretxikoak_web.jpg'),(13,'','Porrusalda','Porrusalda','','<ul>\r\n<li>Bakailao izpitua 250 g&nbsp;</li>\r\n<li>2 patata&nbsp;</li>\r\n<li>4 porru&nbsp;</li>\r\n<li>2 azenarioa&nbsp;</li>\r\n<li>Baratxuri ale bat&nbsp;</li>\r\n<li>Oliba olioa&nbsp;</li>\r\n<li>Ereinotza&nbsp;</li>\r\n</ul>','<ul>\r\n<li>Bakailao izpitua 250 g&nbsp;</li>\r\n<li>2 patata&nbsp;</li>\r\n<li>4 porru&nbsp;</li>\r\n<li>2 azenarioa&nbsp;</li>\r\n<li>Baratxuri ale bat&nbsp;</li>\r\n<li>Oliba olioa&nbsp;</li>\r\n<li>Ereinotza&nbsp;</li>\r\n</ul>','','Lehengo egunetik bakailao beratzen utzi da, ura hiru aldiz aldatuz gatza kentzeko. Eltze batean osagai guztiak nahasi uraz estalita eta gatza pixka batekin. Bakailao izpitu eta barazkiak garbitu eta zati erdietan zatitu izan behar dira. Su moderatuan egosi patata eta porruak egitura goxo bat izan arte.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Lablascovegmenu&nbsp;</em>https://flic.kr/p/87Amim','<p>Lehengo egunetik bakailao beratzen utzi da, ura hiru aldiz aldatuz gatza kentzeko. Eltze batean osagai guztiak nahasi uraz estalita eta gatza pixka batekin. Bakailao izpitu eta barazkiak garbitu eta zati erdietan zatitu izan behar dira. Su moderatuan egosi patata eta porruak egitura goxo bat izan arte.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Lablascovegmenu&nbsp;</em>https://flic.kr/p/87Amim</p>','60','60 minutu','60 minutu','medium',16,2,140235,'image/jpeg; charset=binary','Porrusalda_web.jpg'),(14,'','Angulak betiko erara','Angulak betiko erara','','<ul>\r\n<li>Txitxardin 250 g&nbsp;</li>\r\n<li>Oliba olioa&nbsp;</li>\r\n<li>Baratxuri ale bat&nbsp;</li>\r\n<li>Pipermin zati bat</li>\r\n</ul>','<ul>\r\n<li>Txitxardin 250 g&nbsp;</li>\r\n<li>Oliba olioa&nbsp;</li>\r\n<li>Baratxuri ale bat&nbsp;</li>\r\n<li>Pipermin zati bat</li>\r\n</ul>','','Su bizian jarri buztin ontzi txiki bat, oliba olio, baratxuri ale bat xafletan eta pipermin zati batekin. Irakin ondoren txitxardin kilo laurden bat bota, eta zurezko sardexka batekin etengabe mugitu. Irakinaldi motz baten ondoren kazolan atera zuzenki. Mahaian aurkezteko era polit bat, mahaikide bakoitzari kazola bana ematea izango da.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Restaurante Kaialde</em>&nbsp;https://flic.kr/p/8Eu9Bm','<p>Su bizian jarri buztin ontzi txiki bat, oliba olio, baratxuri ale bat xafletan eta pipermin zati batekin. Irakin ondoren txitxardin kilo laurden bat bota, eta zurezko sardexka batekin etengabe mugitu. Irakinaldi motz baten ondoren kazolan atera zuzenki. Mahaian aurkezteko era polit bat, mahaikide bakoitzari kazola bana ematea izango da.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Restaurante Kaialde</em> https://flic.kr/p/8Eu9Bm</p>','10','10 minutu','10 minutu','easy',20,2,115078,'image/jpeg; charset=binary','Angulak_web.jpg'),(15,'','Bakailaoa Bizkaiko erara','Bakailaoa Bizkaiko erara','','<ul>\r\n<li>Arantzarik gabeko 6 bakailao salatu xerra&nbsp;</li>\r\n<li>12 txorixo piper&nbsp;</li>\r\n<li>2 tipula&nbsp;</li>\r\n<li>2 xigortutako ogi xerra&nbsp;</li>\r\n<li>6 tomate gorri&nbsp;</li>\r\n<li>Gatza eta azukrea</li>\r\n</ul>','<ul>\r\n<li>Arantzarik gabeko 6 bakailao salatu xerra&nbsp;</li>\r\n<li>12 txorixo piper&nbsp;</li>\r\n<li>2 tipula&nbsp;</li>\r\n<li>2 xigortutako ogi xerra&nbsp;</li>\r\n<li>6 tomate gorri&nbsp;</li>\r\n<li>Gatza eta azukrea</li>\r\n</ul>','','<p>Lehengo egunetik bakailao beratzen utzi da, ura hiru aldiz aldatuz. Txorixo piperrak beratzen egon behar izan dira ere gutxienez bost orduz haragia ateratzeko. Bakailaoa urez beteriko ontzi batean egiten utzi irakin arte. Ondoren, sutik kendu eta bakailaoa kontu handiarekin atera.&nbsp;</p>\r\n<p>Saltsa bizkaitarra baratxuri aleak olio ugarian xigortuz prestatzen da. Ondoren, tiraz zatitutako tipulak gehitu ondo egin arte. Ogi xigortuta bota saltsa loditu arte. Dado eran lumatu eta zatitutako tomate, gatza, azukrea eta txorixo piperren txanda da orain. Su moderatuan egosi eta prest dagoenean, pure-egiteko tresnatik pasa.&nbsp;</p>\r\n<p>Azkenik, buztin ontzi batean bakailao xerrak jarri, azala goialdetik, saltsa bizkaitar base baten gainean. Saltsa gehiagorekin estali. Irakinaldi bat emanez, prest dago.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Gloria Cabada-Leman</em>&nbsp;https://flic.kr/p/bBDMKo</p>','<p>Lehengo egunetik bakailao beratzen utzi da, ura hiru aldiz aldatuz. Txorixo piperrak beratzen egon behar izan dira ere gutxienez bost orduz haragia ateratzeko. Bakailaoa urez beteriko ontzi batean egiten utzi irakin arte. Ondoren, sutik kendu eta bakailaoa kontu handiarekin atera.&nbsp;</p>\r\n<p>Saltsa bizkaitarra baratxuri aleak olio ugarian xigortuz prestatzen da. Ondoren, tiraz zatitutako tipulak gehitu ondo egin arte. Ogi xigortuta bota saltsa loditu arte. Dado eran lumatu eta zatitutako tomate, gatza, azukrea eta txorixo piperren txanda da orain. Su moderatuan egosi eta prest dagoenean, pure-egiteko tresnatik pasa.&nbsp;</p>\r\n<p>Azkenik, buztin ontzi batean bakailao xerrak jarri, azala goialdetik, saltsa bizkaitar base baten gainean. Saltsa gehiagorekin estali. Irakinaldi bat emanez, prest dago.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Gloria Cabada-Leman</em>&nbsp;https://flic.kr/p/bBDMKo</p>','50','50 minutu','50 minutu','hard',25,4,155657,'image/jpeg; charset=binary','Bakailaoa_bizkaia_web.jpg'),(16,'','Hegaluzea tomatearekin','Hegaluzea tomatearekin','','<ul>\r\n<li>Hegaluzea: 750 g&nbsp;</li>\r\n<li>Tomateak: 1 kg&nbsp;</li>\r\n<li>Baratxuri-ale bat&nbsp;</li>\r\n<li>2 tipula&nbsp;</li>\r\n<li>Oliba olioa</li>\r\n</ul>','<ul>\r\n<li>Hegaluzea: 750 g&nbsp;</li>\r\n<li>Tomateak: 1 kg&nbsp;</li>\r\n<li>Baratxuri-ale bat&nbsp;</li>\r\n<li>2 tipula&nbsp;</li>\r\n<li>Oliba olioa</li>\r\n</ul>','','Buztin ontzi batean oliba olioan 2 tipula eta baratxuri ale bat frijitu. Prest dagoenean bi hegaluze xerrak erantsi (bi pertsona bakoitzeko bi). Hegaluzea atera ontzitik eta tomate lumatua erantsi, dado eran zatiturik. Gatza bota eta azukre pixka bat ere bai. Saltsa arin bat lortu arte iragazkitik pasa. Ontzira bota saltsa eta gainean hegaluzea. Irakinaldi bat eman.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;Antonio Domingo&nbsp;https://flic.kr/p/cWyTN9','<p>Buztin ontzi batean oliba olioan 2 tipula eta baratxuri ale bat frijitu. Prest dagoenean bi hegaluze xerrak erantsi (bi pertsona bakoitzeko bi). Hegaluzea atera ontzitik eta tomate lumatua erantsi, dado eran zatiturik. Gatza bota eta azukre pixka bat ere bai. Saltsa arin bat lortu arte iragazkitik pasa. Ontzira bota saltsa eta gainean hegaluzea. Irakinaldi bat eman.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;Antonio Domingo&nbsp;https://flic.kr/p/cWyTN9</p>','50','50 minutu','50 minutu','medium',20,4,149962,'image/jpeg; charset=binary','Hegaluzea_tomatearekin_web.jpg'),(17,'','Legatza koxkera erara','Legatza koxkera erara','','<ul>\r\n<li>4 legatz xerra&nbsp;</li>\r\n<li>Arrain salda&nbsp;</li>\r\n<li>Oliba olioa&nbsp;</li>\r\n<li>Tipula bat&nbsp;</li>\r\n<li>5 baratxuri-ale&nbsp;</li>\r\n<li>Ilarrak 150 g&nbsp;</li>\r\n<li>txirlak 150 g&nbsp;</li>\r\n<li>2 arrautza gogortuta&nbsp;</li>\r\n<li>4 esparrago&nbsp;</li>\r\n<li>Perrexila</li>\r\n</ul>','<ul>\r\n<li>4 legatz xerra&nbsp;</li>\r\n<li>Arrain salda&nbsp;</li>\r\n<li>Oliba olioa&nbsp;</li>\r\n<li>Tipula bat&nbsp;</li>\r\n<li>5 baratxuri-ale&nbsp;</li>\r\n<li>Ilarrak 150 g&nbsp;</li>\r\n<li>txirlak 150 g&nbsp;</li>\r\n<li>2 arrautza gogortuta&nbsp;</li>\r\n<li>4 esparrago&nbsp;</li>\r\n<li>Perrexila</li>\r\n</ul>','','Su moderatuan ontzi batean tipula eta baratxuria frijitu oliba olioan.Irin koilaratxo bat bota eta irabiatu pikorrik gelditu ez dadin. Legatza erantsi. Egiten den bitartean zirkuluan mugitu saltsa loditu arte. Legatz erraiekin egindako arrain salda gehitu legatza estali arte; txirlak, ilarak eta perrexil asko bota. Legatza egiten denean arrautza egosi zatituekin eta zainzuriekin aurkeztu.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Mercedes P</em>&nbsp;https://flic.kr/p/9nWveL','<p>Su moderatuan ontzi batean tipula eta baratxuria frijitu oliba olioan.Irin koilaratxo bat bota eta irabiatu pikorrik gelditu ez dadin. Legatza erantsi. Egiten den bitartean zirkuluan mugitu saltsa loditu arte. Legatz erraiekin egindako arrain salda gehitu legatza estali arte; txirlak, ilarak eta perrexil asko bota. Legatza egiten denean arrautza egosi zatituekin eta zainzuriekin aurkeztu.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Mercedes P</em> https://flic.kr/p/9nWveL</p>','40','40 minutu','40 minutu','medium',20,4,151458,'image/jpeg; charset=binary','Legatza_web.jpg'),(18,'','Marmitakoa','Marmitakoa','','<ul>\r\n<li>Hegaluze kg &frac12;&nbsp;</li>\r\n<li>Patata kilo bat&nbsp;</li>\r\n<li>2 tipula&nbsp;</li>\r\n<li>2 piper berde&nbsp;</li>\r\n<li>2 piper gorri&nbsp;</li>\r\n<li>2 txorixo piper&nbsp;</li>\r\n<li>2 tomate&nbsp;</li>\r\n<li>2 baratxuri aleak&nbsp;</li>\r\n<li>Oliba olioa eta gatza</li>\r\n</ul>','<ul>\r\n<li>Hegaluze kg &frac12;&nbsp;</li>\r\n<li>Patata kilo bat&nbsp;</li>\r\n<li>2 tipula&nbsp;</li>\r\n<li>2 piper berde&nbsp;</li>\r\n<li>2 piper gorri&nbsp;</li>\r\n<li>2 txorixo piper&nbsp;</li>\r\n<li>2 tomate&nbsp;</li>\r\n<li>2 baratxuri aleak&nbsp;</li>\r\n<li>Oliba olioa eta gatza</li>\r\n</ul>','','<p>Tipula zatituta eta baratxuria oliba pixka batekin sueztitu ontzi batean. Biguna dagoenean piper zatituak eta txorixo piperren haragia erantsi. Ondoren tomate zatituak eta lumatuak erantsi.</p>\r\n<p>Ondo frijitu ondoren, dado eran zatitutako patata bota eta uraz edo hegaluzearen erraiak egin ondoren lortutako uraz estali. Irakiten jarri eta gatza bota. Egina dagoenean hegaluzea erantsi, dado eran zatituta eta gatzarekin, ontzia estali eta pixka bat geroago sua itzali eta jalkitzen utzi hamar minutuz hegaluzea egiten bukatzeko.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Roger Ferrer Ib&aacute;&ntilde;ez</em>&nbsp;https://flic.kr/p/7VhUwg</p>','<p>Tipula zatituta eta baratxuria oliba pixka batekin sueztitu ontzi batean. Biguna dagoenean piper zatituak eta txorixo piperren haragia erantsi. Ondoren tomate zatituak eta lumatuak erantsi.</p>\r\n<p>Ondo frijitu ondoren, dado eran zatitutako patata bota eta uraz edo hegaluzearen erraiak egin ondoren lortutako uraz estali. Irakiten jarri eta gatza bota. Egina dagoenean hegaluzea erantsi, dado eran zatituta eta gatzarekin, ontzia estali eta pixka bat geroago sua itzali eta jalkitzen utzi hamar minutuz hegaluzea egiten bukatzeko.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Roger Ferrer Ib&aacute;&ntilde;ez</em> https://flic.kr/p/7VhUwg</p>','45','45 minutu','45 minutu','medium',24,4,86934,'image/jpeg; charset=binary','Marmitako_web.jpg'),(19,'','Txangurroa','Txangurroa','','<ul>\r\n<li>Txangurru bat&nbsp;</li>\r\n<li>Tipula koilarakada bat&nbsp;</li>\r\n<li>Tomate koilarakada bat&nbsp;</li>\r\n<li>Porru koilarakada erdia&nbsp;</li>\r\n<li>Oliba olio&nbsp;</li>\r\n<li>Brandy&nbsp;</li>\r\n<li>Ogi birrindua&nbsp;</li>\r\n<li>Gurina&nbsp;</li>\r\n<li>Gatza</li>\r\n</ul>','<ul>\r\n<li>Txangurru bat&nbsp;</li>\r\n<li>Tipula koilarakada bat&nbsp;</li>\r\n<li>Tomate koilarakada bat&nbsp;</li>\r\n<li>Porru koilarakada erdia&nbsp;</li>\r\n<li>Oliba olio&nbsp;</li>\r\n<li>Brandy&nbsp;</li>\r\n<li>Ogi birrindua&nbsp;</li>\r\n<li>Gurina&nbsp;</li>\r\n<li>Gatza</li>\r\n</ul>','','<p>Txangurrua uretan egosi gatzarekin ordu laurden batez, irakiten duenetik hasita.&nbsp;</p>\r\n<p>Beste aldetik, tipula eta porrua zatituta oliban frijitu. Prestatzen diren bitartean tomate lumatu eta zatitua erantsi eta desegiten utzi, ordu laurden batez gutxi gora behera.</p>\r\n<p>Txangurrua ireki eta bere ura saltsa ontzian bota. Brandy pixka bat bota eta dena ondo nahastu. Hanketatik eta gorputzetik haragi zati handiak atera (mazo batekin ireki). Saltsarekin nahastu eta irakinaldi motz bat eman. Oskolan bota, ogi birrindua eta gurin pixka batekin estalita, eta labean gainerre.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Joselu Blanco</em>&nbsp;https://flic.kr/p/eTJq4C</p>','<p>Txangurrua uretan egosi gatzarekin ordu laurden batez, irakiten duenetik hasita.&nbsp;</p>\r\n<p>Beste aldetik, tipula eta porrua zatituta oliban frijitu. Prestatzen diren bitartean tomate lumatu eta zatitua erantsi eta desegiten utzi, ordu laurden batez gutxi gora behera.</p>\r\n<p>Txangurrua ireki eta bere ura saltsa ontzian bota. Brandy pixka bat bota eta dena ondo nahastu. Hanketatik eta gorputzetik haragi zati handiak atera (mazo batekin ireki). Saltsarekin nahastu eta irakinaldi motz bat eman. Oskolan bota, ogi birrindua eta gurin pixka batekin estalita, eta labean gainerre.<br /><br /><strong>Argazkiaren egilea:</strong> <em>Joselu Blanco</em> https://flic.kr/p/eTJq4C</p>','30','30 minutu','30 minutu','hard',20,2,142490,'image/jpeg; charset=binary','Txangurroa_web.jpg'),(20,'','Txipiroiak bere tintan','Txipiroiak bere tintan','','<ul>\r\n<li>Txipiroi txiki kilo bat&nbsp;</li>\r\n<li>2 tinta poltsa&nbsp;</li>\r\n<li>Tipula bat&nbsp;</li>\r\n<li>2 tomate&nbsp;</li>\r\n<li>Ardo zuria&nbsp;</li>\r\n<li>Irina&nbsp;</li>\r\n<li>Ogi xigortuta&nbsp;</li>\r\n<li>Gatza&nbsp;</li>\r\n<li>Oliba olioa</li>\r\n</ul>','<ul>\r\n<li>Txipiroi txiki kilo bat&nbsp;</li>\r\n<li>2 tinta poltsa&nbsp;</li>\r\n<li>Tipula bat&nbsp;</li>\r\n<li>2 tomate&nbsp;</li>\r\n<li>Ardo zuria&nbsp;</li>\r\n<li>Irina&nbsp;</li>\r\n<li>Ogi xigortuta&nbsp;</li>\r\n<li>Gatza&nbsp;</li>\r\n<li>Oliba olioa</li>\r\n</ul>','','<p>Txipiroiak garbitu ondoren, tentakuluak gorputzean sartu, irinaz estali eta frijitu. Zartagin batean tipula eta tomate xehatuta jarri. Minutu batzuen ondoren irina eta ogi xigortu pixka bat bota xigortu arte. Ur pixka bat eta ardo zuri kopa bat erantsi. Argaltzen utzi eta saltsa pure-egiteko tresnatik pasa.</p>\r\n<p>Saltsa hau tintarekin nahastu, lehendik ura bota delarik. Buztin ontzi batean jarritako txipiroien gainean bota eta su moderatuan jarri saltsa loditu arte.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Joselu Blanco</em>&nbsp;https://flic.kr/p/6J64vT</p>','<p>Txipiroiak garbitu ondoren, tentakuluak gorputzean sartu, irinaz estali eta frijitu. Zartagin batean tipula eta tomate xehatuta jarri. Minutu batzuen ondoren irina eta ogi xigortu pixka bat bota xigortu arte. Ur pixka bat eta ardo zuri kopa bat erantsi. Argaltzen utzi eta saltsa pure-egiteko tresnatik pasa.</p>\r\n<p>Saltsa hau tintarekin nahastu, lehendik ura bota delarik. Buztin ontzi batean jarritako txipiroien gainean bota eta su moderatuan jarri saltsa loditu arte.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Joselu Blanco</em> https://flic.kr/p/6J64vT</p>','30','30 minutu','30 minutu','medium',16,4,156044,'image/jpeg; charset=binary','Txipiroiak_web.jpg'),(21,'','Zurrukutuna','Zurrukutuna','','<ul>\r\n<li>Bakailao 400 g&nbsp;</li>\r\n<li>Piper berdea 250 g&nbsp;</li>\r\n<li>8 txorixo piperrak&nbsp;</li>\r\n<li>4 baratxuri-aleak&nbsp;</li>\r\n<li>Ogi xigortuta 200 g&nbsp;</li>\r\n<li>4 arrautzak&nbsp;</li>\r\n<li>Salda&nbsp;</li>\r\n<li>Perrexila</li>\r\n</ul>','<ul>\r\n<li>Bakailao 400 g&nbsp;</li>\r\n<li>Piper berdea 250 g&nbsp;</li>\r\n<li>8 txorixo piperrak&nbsp;</li>\r\n<li>4 baratxuri-aleak&nbsp;</li>\r\n<li>Ogi xigortuta 200 g&nbsp;</li>\r\n<li>4 arrautzak&nbsp;</li>\r\n<li>Salda&nbsp;</li>\r\n<li>Perrexila</li>\r\n</ul>','','<p>Lehengo egunetik bakailao beratzen utzi da, ura hiru aldiz aldatuz gatza kentzeko. Txorixo piperrak beratzen egon behar izan dira ere bai gutxienez bost orduz haragia ateratzeko. Buztin ontzi batean baratxuri lurrinduta xigortzen utzi. Ondoren, prest badago piper berdea erantsi, arin lurrindurik. Biguna dagoenean bakailao izpitua bota, txorixo piperren haragia eta ogi xigortuarekin batera, salda pixka batekin estaliz. Egiten den bitartean nahasi eta sakatu masa bat lortu arte.&nbsp;</p>\r\n<p>Bukatu baino zerbait lehenago arrautzak irabiatu gabe bota gehitu masa gainean egin daitezen. Arrautzen gainean perrezil xehatuta bota eta sutan utzi arrautzak egin arte.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>I&ntilde;aki Mundi&ntilde;ano</em>&nbsp;https://flic.kr/p/eKe6Zk</p>','<p>Lehengo egunetik bakailao beratzen utzi da, ura hiru aldiz aldatuz gatza kentzeko. Txorixo piperrak beratzen egon behar izan dira ere bai gutxienez bost orduz haragia ateratzeko. Buztin ontzi batean baratxuri lurrinduta xigortzen utzi. Ondoren, prest badago piper berdea erantsi, arin lurrindurik. Biguna dagoenean bakailao izpitua bota, txorixo piperren haragia eta ogi xigortuarekin batera, salda pixka batekin estaliz. Egiten den bitartean nahasi eta sakatu masa bat lortu arte.&nbsp;</p>\r\n<p>Bukatu baino zerbait lehenago arrautzak irabiatu gabe bota gehitu masa gainean egin daitezen. Arrautzen gainean perrezil xehatuta bota eta sutan utzi arrautzak egin arte.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>I&ntilde;aki Mundi&ntilde;ano</em>&nbsp;https://flic.kr/p/eKe6Zk<br /><br /></p>','40','45 minutu','45 minutu','medium',30,4,95829,'image/jpeg; charset=binary','Zurrukutuna_web.jpg'),(22,'','Patata-tortilla betea','Patata-tortilla betea','','<ul>\r\n<li>Bost patata ertain&nbsp;</li>\r\n<li>Bost arrautza&nbsp;</li>\r\n<li>Hegaluzea (lata bat)&nbsp;</li>\r\n<li>Tipuleta&nbsp;</li>\r\n<li>Arrautza egosi bat&nbsp;</li>\r\n<li>Maionesa</li>\r\n</ul>','<ul>\r\n<li>Bost patata ertain&nbsp;</li>\r\n<li>Bost arrautza&nbsp;</li>\r\n<li>Hegaluzea (lata bat)&nbsp;</li>\r\n<li>Tipuleta&nbsp;</li>\r\n<li>Arrautza egosi bat&nbsp;</li>\r\n<li>Maionesa</li>\r\n</ul>','','<p>Lehenik eta behin, patata-tortilla arrunt bat egingo dugu. Bestalde, betetzeko orea egiteko, hegaluzea, tipuleta apur bat eta egositako arrautza txikitu eta guztia ontzi batean nahasiko dugu, maionesa pitin batekin.</p>\r\n<p>Betegarria prestatu ostean, tortilla erditik moztuko dugu kontu handiz. Betegarria tortillaren azpiko aldearen gainean jarriko dugu eta gero tortillaren beste erdiaz estali.</p>\r\n<p>Horrez gain, errezetari ukitu bizia eman nahi dionak tabasko pitin bat eta belar finak erabil ditzake.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Miguel &Aacute;ngel Garc&iacute;a</em>&nbsp;https://flic.kr/p/9WkkNr</p>','<p>Lehenik eta behin, patata-tortilla arrunt bat egingo dugu. Bestalde, betetzeko orea egiteko, hegaluzea, tipuleta apur bat eta egositako arrautza txikitu eta guztia ontzi batean nahasiko dugu, maionesa pitin batekin.</p>\r\n<p>Betegarria prestatu ostean, tortilla erditik moztuko dugu kontu handiz. Betegarria tortillaren azpiko aldearen gainean jarriko dugu eta gero tortillaren beste erdiaz estali.</p>\r\n<p>Horrez gain, errezetari ukitu bizia eman nahi dionak tabasko pitin bat eta belar finak erabil ditzake.<br /><br /><strong>Argazkiaren egilea:</strong>&nbsp;<em>Miguel &Aacute;ngel Garc&iacute;a</em>&nbsp;https://flic.kr/p/9WkkNr</p>','15','20 minutu','20 minutu','medium',8,4,112516,'image/jpeg; charset=binary','Tortilla_web.jpg');
/*!40000 ALTER TABLE `Recipes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SocialNetworks`
--

DROP TABLE IF EXISTS `SocialNetworks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SocialNetworks` (
  `id` mediumint(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '[ml]',
  `title_es` varchar(20) NOT NULL,
  `title_eu` varchar(20) NOT NULL,
  `url` text COMMENT '[ml]',
  `url_es` text,
  `url_eu` text,
  `status` varchar(50) DEFAULT NULL COMMENT '[enum:draft|published]',
  `icon` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='[entity][rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SocialNetworks`
--

LOCK TABLES `SocialNetworks` WRITE;
/*!40000 ALTER TABLE `SocialNetworks` DISABLE KEYS */;
INSERT INTO `SocialNetworks` VALUES (1,'','Facebook','Facebook',NULL,'https://www.facebook.com/irontecsl','https://www.facebook.com/irontecsl','published','ion-social-facebook-outline'),(2,'','Twitter','Twitter',NULL,'https://twitter.com/irontec','https://twitter.com/irontec','published','ion-social-twitter-outline'),(3,'','GitHub','GitHub',NULL,'https://github.com/irontec','https://github.com/irontec','draft','fa fa-github');
/*!40000 ALTER TABLE `SocialNetworks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `StaticPages`
--

DROP TABLE IF EXISTS `StaticPages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `StaticPages` (
  `id` mediumint(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL COMMENT '[ml]',
  `title_es` varchar(20) NOT NULL,
  `title_eu` varchar(20) NOT NULL,
  `description` text COMMENT '[ml]',
  `description_es` text,
  `description_eu` text,
  `status` varchar(50) DEFAULT NULL COMMENT '[enum:draft|published]',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='[entity][rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `StaticPages`
--

LOCK TABLES `StaticPages` WRITE;
/*!40000 ALTER TABLE `StaticPages` DISABLE KEYS */;
INSERT INTO `StaticPages` VALUES (1,'','Contacto','Harremanetarako',NULL,'<div class=\"pagina-estatica\">\r\n<div class=\"autor\">\r\nJoko hau&nbsp;<strong>Irontec</strong>ek garatu du<br /><br />\r\n<img src=\"http://ikastek.net/wp-content/uploads/2014/01/irontec_honi_buruz.png\"></img>\r\n</div>\r\n<div class=\"financiador\">\r\nEusko Jaurlaritzako Kultura Sailaren laguntzarekin<br /><br />\r\n<img src=\"http://ikastek.net/wp-content/uploads/2014/01/eusko-jaurlaritza-logo-300x88.png\"></img>\r\n</div></div>','<div class=\"pagina-estatica\">\r\n<div class=\"autor\">\r\nJoko hau&nbsp;<strong>Irontec</strong>ek garatu du<br /><br />\r\n<img src=\"http://ikastek.net/wp-content/uploads/2014/01/irontec_honi_buruz.png\"></img>\r\n</div>\r\n<div class=\"financiador\">\r\nEusko Jaurlaritzako Kultura Sailaren laguntzarekin<br /><br />\r\n<img src=\"http://ikastek.net/wp-content/uploads/2014/01/eusko-jaurlaritza-logo-300x88.png\"></img>\r\n</div></div>','published'),(2,'','Licencias','Lizentziak','','Errezeta bakoitzaren argazkiaren egilea, errezetaren oinean aurki dezakezu.&nbsp;Baita argazkira eramango zaituen esteka bat ere.<br /><br />Orri nagusiko lau kategorietako argazkien egileak ondorengo hauek dira:<br /><br />\r\n<ul>\r\n<li><strong>Pintxoak:</strong><em>&nbsp;Katina Rogers</em>&nbsp;https://flic.kr/p/fLVLWJ</li>\r\n<li><strong>Bertoko produktuak:</strong>&nbsp;<em>Arrano</em>&nbsp;https://flic.kr/p/7pyXEo</li>\r\n<li><strong>Edariak:</strong>&nbsp;<em>Ronald Hurtado</em>&nbsp;https://flic.kr/p/jV1hXD</li>\r\n<li><strong>Betiko errezetak:</strong>&nbsp;<em>Roger Ferrer Ib&aacute;&ntilde;ez</em>&nbsp;https://flic.kr/p/7VhUwg</li>\r\n</ul>','Errezeta bakoitzaren argazkiaren egilea, errezetaren oinean aurki dezakezu.&nbsp;Baita argazkira eramango zaituen esteka bat ere.<br /><br />Orri nagusiko lau kategorietako argazkien egileak ondorengo hauek dira:<br /><br />\r\n<ul>\r\n<li><strong>Pintxoak:</strong><em>&nbsp;Katina Rogers</em>&nbsp;https://flic.kr/p/fLVLWJ</li>\r\n<li><strong>Bertoko produktuak:</strong>&nbsp;<em>Arrano</em>&nbsp;https://flic.kr/p/7pyXEo</li>\r\n<li><strong>Edariak:</strong>&nbsp;<em>Ronald Hurtado</em>&nbsp;https://flic.kr/p/jV1hXD</li>\r\n<li><strong>Betiko errezetak:</strong>&nbsp;<em>Roger Ferrer Ib&aacute;&ntilde;ez</em>&nbsp;https://flic.kr/p/7VhUwg</li>\r\n</ul>','published');
/*!40000 ALTER TABLE `StaticPages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tags`
--

DROP TABLE IF EXISTS `Tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tags` (
  `id` mediumint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '[ml]',
  `name_es` varchar(20) NOT NULL,
  `name_eu` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='[entity]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tags`
--

LOCK TABLES `Tags` WRITE;
/*!40000 ALTER TABLE `Tags` DISABLE KEYS */;
INSERT INTO `Tags` VALUES (3,'','Pimiento','Piperra'),(4,'','Hortaliza','Barazkia'),(7,'','Gernika','Gernika'),(9,'','Alkohola','Alkohola'),(10,'','Basaran','Basaran'),(11,'','Pattar','Pattar'),(12,'','Ardoa','Ardoa'),(13,'','Coca-Cola','Coca-Cola'),(14,'','Antxoa','Antxoa'),(15,'','Gazta','Gazta'),(16,'','Ogi-txigortua','Ogi-txigortua'),(17,'','Arrautza','Arrautza'),(18,'','Barrengorriak','Barrengorriak'),(19,'','Tipulina','Tipulina'),(20,'','Babarrunak','Babarrunak'),(21,'','Odolostea','Odolostea'),(22,'','Tomatea','Tomatea'),(23,'','Tolosa','Tolosa'),(24,'','Pipermina','Pipermina'),(25,'','Bakailaoa','Bakailaoa'),(26,'','Arraina','Arraina'),(27,'','Patata','Patata');
/*!40000 ALTER TABLE `Tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `changelog`
--

DROP TABLE IF EXISTS `changelog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `changelog` (
  `change_number` bigint(20) NOT NULL,
  `delta_set` varchar(10) NOT NULL,
  `start_dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `complete_dt` timestamp NULL DEFAULT NULL,
  `applied_by` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`change_number`,`delta_set`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='[ignore]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `changelog`
--

LOCK TABLES `changelog` WRITE;
/*!40000 ALTER TABLE `changelog` DISABLE KEYS */;
INSERT INTO `changelog` VALUES (1,'Main','2015-02-03 11:41:57','2015-02-03 11:41:57','dbdeploy','001-createKlearUsers.sql'),(2,'Main','2015-02-17 16:50:47','2015-02-17 16:50:47','dbdeploy','002-dump-started.sql'),(3,'Main','2015-02-18 11:44:42','2015-02-18 11:44:42','dbdeploy','003-change-Categories.sql'),(4,'Main','2015-02-18 11:44:43','2015-02-18 11:44:43','dbdeploy','004-db-generator.sql'),(5,'Main','2015-02-24 10:04:13','2015-02-24 10:04:13','dbdeploy','005-static-pages.sql'),(6,'Main','2015-02-24 10:04:14','2015-02-24 10:04:14','dbdeploy','006-social-networks.sql'),(7,'Main','2015-02-24 10:04:15','2015-02-24 10:04:15','dbdeploy','007-db-generator.sql'),(8,'Main','2015-02-25 14:25:16','2015-02-25 14:25:16','dbdeploy','008-change-Recipes.sql'),(9,'Main','2015-02-25 14:25:18','2015-02-25 14:25:18','dbdeploy','009-db-generator.sql');
/*!40000 ALTER TABLE `changelog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-02-26 13:19:10
