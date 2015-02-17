-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: EuskalErrezetak
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='[entity]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Categories`
--

LOCK TABLES `Categories` WRITE;
/*!40000 ALTER TABLE `Categories` DISABLE KEYS */;
INSERT INTO `Categories` VALUES (6,'','Comida tÃ­pica','Betiko errezetak'),(9,'','Pintxos','Pintxoak'),(10,'','Bebidas','Edariak'),(11,'','Producto autÃ³ctono','Bertoko produktuekin');
/*!40000 ALTER TABLE `Categories` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='[rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RecipeCategory`
--

LOCK TABLES `RecipeCategory` WRITE;
/*!40000 ALTER TABLE `RecipeCategory` DISABLE KEYS */;
INSERT INTO `RecipeCategory` VALUES (1,1,6),(2,1,11),(3,2,6),(4,3,10),(8,6,6),(9,6,11),(10,5,6);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='[rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RecipeTag`
--

LOCK TABLES `RecipeTag` WRITE;
/*!40000 ALTER TABLE `RecipeTag` DISABLE KEYS */;
INSERT INTO `RecipeTag` VALUES (1,1,3),(3,1,4),(2,2,5),(4,2,6),(5,5,5),(7,6,5);
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
  `name` varchar(40) NOT NULL COMMENT '[ml]',
  `name_es` varchar(40) NOT NULL,
  `name_eu` varchar(40) NOT NULL,
  `ingredients` text NOT NULL COMMENT '[html][ml]',
  `ingredients_es` text NOT NULL COMMENT '[html]',
  `ingredients_eu` text NOT NULL COMMENT '[html]',
  `directions` text NOT NULL COMMENT '[html][ml]',
  `directions_es` text NOT NULL COMMENT '[html]',
  `directions_eu` text NOT NULL COMMENT '[html]',
  `time` mediumint(4) NOT NULL,
  `difficulty` varchar(10) NOT NULL COMMENT '[enum:easy|medium|hard]',
  `cost` int(4) NOT NULL,
  `people` int(2) NOT NULL,
  `pictureFileSize` int(11) unsigned NOT NULL COMMENT '[FSO]',
  `pictureMimeType` varchar(80) NOT NULL,
  `pictureBaseName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='[entity][rest]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recipes`
--

LOCK TABLES `Recipes` WRITE;
/*!40000 ALTER TABLE `Recipes` DISABLE KEYS */;
INSERT INTO `Recipes` VALUES (1,'Gernikako piperrak frijituta','Pimientos de Gernika fritos','Gernikako piperrak frijituta','<ul>\r\n<li>Gernikako piper frijituak, kilo bat</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','<ul>\r\n<li>Gernikako piper frijituak, kilo bat</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','<ul>\r\n<li>Gernikako piper frijituak, kilo bat</li>\r\n<li>Oliba olioa</li>\r\n<li>Gatza</li>\r\n</ul>','<p>Piperrak garbitu uretan eta xukatu zapi batekin. Oliba olioa suelto duen zartagin bat jarri su bizian, gutxienez bi hazbeteraino irits dadila zartaginean. Olioa oso bero dagoela ikusten dugunean, baina kea dariola jarri gabe inola ere, bota piperminak, oliotan ondroso egoteko moduan, eta behar izanez gero bi edo hiru txandatan frijitu. Kontu handiz jiratu bitsadera batekin, eta 20 segundo baino gehiago ez utzi egiten. Sartzea hutsa aski da, eta airoso atera behar dira xukapaper batera. Kontuz zipriztin eta erredurekin.</p>\r\n<p>Denak frijitutakoan, gatza eman, eta mahaira, hoztu baino lehen. Ez daitezela sekula gorritu, tonu berde polit bat izan behar dute, eta hozka egiterakoan tente samar egon, baratza gustua galdu gabe.</p>','<p>Piperrak garbitu uretan eta xukatu zapi batekin. Oliba olioa suelto duen zartagin bat jarri su bizian, gutxienez bi hazbeteraino irits dadila zartaginean. Olioa oso bero dagoela ikusten dugunean, baina kea dariola jarri gabe inola ere, bota piperminak, oliotan ondroso egoteko moduan, eta behar izanez gero bi edo hiru txandatan frijitu. Kontu handiz jiratu bitsadera batekin, eta 20 segundo baino gehiago ez utzi egiten. Sartzea hutsa aski da, eta airoso atera behar dira xukapaper batera. Kontuz zipriztin eta erredurekin.</p>\r\n<br />\r\n<p>Denak frijitutakoan, gatza eman, eta mahaira, hoztu baino lehen. Ez daitezela sekula gorritu, tonu berde polit bat izan behar dute, eta hozka egiterakoan tente samar egon, baratza gustua galdu gabe.</p>','<p>Piperrak garbitu uretan eta xukatu zapi batekin. Oliba olioa suelto duen zartagin bat jarri su bizian, gutxienez bi hazbeteraino irits dadila zartaginean. Olioa oso bero dagoela ikusten dugunean, baina kea dariola jarri gabe inola ere, bota piperminak, oliotan ondroso egoteko moduan, eta behar izanez gero bi edo hiru txandatan frijitu. Kontu handiz jiratu bitsadera batekin, eta 20 segundo baino gehiago ez utzi egiten. Sartzea hutsa aski da, eta airoso atera behar dira xukapaper batera. Kontuz zipriztin eta erredurekin.</p>\r\n<br />\r\n<p>Denak frijitutakoan, gatza eman, eta mahaira, hoztu baino lehen. Ez daitezela sekula gorritu, tonu berde polit bat izan behar dute, eta hozka egiterakoan tente samar egon, baratza gustua galdu gabe.</p>',15,'easy',12,2,107366,'image/jpeg; charset=binary','Gernikako piperrak frijituak.jpg'),(2,'Barraskiloak Bizkaiko eran','Caracoles a la vizcaina','Barraskiloak bizkaiko eran','<ul>\r\n<li>120 barraskilo, egosiak</li>\r\n<li>10 koilarakada oliba olio</li>\r\n<li>Tipulin bat</li>\r\n<li>4 tipula handi, txiki-txiki eginak</li>\r\n<li>8 piper txorizeroren mamia, uretan beratzen eduki ondoren aterea</li>\r\n<li>Tomate saltsa, litro erdia</li>\r\n<li>Txorizo mina, puska eder bat</li>\r\n<li>Urdaiazpiko puska eder bat, alde gihartsua</li>\r\n<li>Pipermin baten muturra</li>\r\n</ul>','<ul>\r\n<li>120 barraskilo, egosiak</li>\r\n<li>10 koilarakada oliba olio</li>\r\n<li>Tipulin bat</li>\r\n<li>4 tipula handi, txiki-txiki eginak</li>\r\n<li>8 piper txorizeroren mamia, uretan beratzen eduki ondoren aterea</li>\r\n<li>Tomate saltsa, litro erdia</li>\r\n<li>Txorizo mina, puska eder bat</li>\r\n<li>Urdaiazpiko puska eder bat, alde gihartsua</li>\r\n<li>Pipermin baten muturra</li>\r\n</ul>','<ul>\r\n<li>120 barraskilo, egosiak</li>\r\n<li>10 koilarakada oliba olio</li>\r\n<li>Tipulin bat</li>\r\n<li>4 tipula handi, txiki-txiki eginak</li>\r\n<li>8 piper txorizeroren mamia, uretan beratzen eduki ondoren aterea</li>\r\n<li>Tomate saltsa, litro erdia</li>\r\n<li>Txorizo mina, puska eder bat</li>\r\n<li>Urdaiazpiko puska eder bat, alde gihartsua</li>\r\n<li>Pipermin baten muturra</li>\r\n</ul>','<p>Kazola batean tipula eta tipulina oliotan frijituko ditugu, su motelean. Horri txorizo eta urdaiazpiko dadoak gehituko dizkiogu. Ondoren, erregos dadila dena, txorizoak guztiari bere zaporea itsasteko. Kontu handiz ibili gatzarekin. Piper txorizeroen mamia gehitu eta tomatea ere bai. Dena batera egos dadila 20 bat minutuz.</p>\r\n<p>Saltsari barraskilo egosiak eta piperminaren muturra erantsi eta beste 20 bat minutuz egos dadila dena. Beharrezkoa balitz, barraskiloak egosi diren uretik pixka bat gehitu. Gatzik behar ote duen begiratu. Saltsan geldituko dira barraskiloak, baina aski lehor. Itsuski ematen du saltsa azpian barraskilo bila ibili beharrak. Behar baldin bada, sutan izan saltsa, pixka bat loditzen dela ikusi arte.</p>\r\n<p>Txerri hanka egosi batzuk baldin baditugu, puskatan gehitu barraskiloei. Sekulakoa izango da, zoragarri. Paradisuan ez da jaki hoberik izango.</p>','<p>Kazola batean tipula eta tipulina oliotan frijituko ditugu, su motelean. Horri txorizo eta urdaiazpiko dadoak gehituko dizkiogu. Ondoren, erregos dadila dena, txorizoak guztiari bere zaporea itsasteko. Kontu handiz ibili gatzarekin. Piper txorizeroen mamia gehitu eta tomatea ere bai. Dena batera egos dadila 20 bat minutuz.</p>\r\n<p>Saltsari barraskilo egosiak eta piperminaren muturra erantsi eta beste 20 bat minutuz egos dadila dena. Beharrezkoa balitz, barraskiloak egosi diren uretik pixka bat gehitu. Gatzik behar ote duen begiratu. Saltsan geldituko dira barraskiloak, baina aski lehor. Itsuski ematen du saltsa azpian barraskilo bila ibili beharrak. Behar baldin bada, sutan izan saltsa, pixka bat loditzen dela ikusi arte.</p>\r\n<p>Txerri hanka egosi batzuk baldin baditugu, puskatan gehitu barraskiloei. Sekulakoa izango da, zoragarri. Paradisuan ez da jaki hoberik izango.</p>','<p>Kazola batean tipula eta tipulina oliotan frijituko ditugu, su motelean. Horri txorizo eta urdaiazpiko dadoak gehituko dizkiogu. Ondoren, erregos dadila dena, txorizoak guztiari bere zaporea itsasteko. Kontu handiz ibili gatzarekin. Piper txorizeroen mamia gehitu eta tomatea ere bai. Dena batera egos dadila 20 bat minutuz.</p>\r\n<p>Saltsari barraskilo egosiak eta piperminaren muturra erantsi eta beste 20 bat minutuz egos dadila dena. Beharrezkoa balitz, barraskiloak egosi diren uretik pixka bat gehitu. Gatzik behar ote duen begiratu. Saltsan geldituko dira barraskiloak, baina aski lehor. Itsuski ematen du saltsa azpian barraskilo bila ibili beharrak. Behar baldin bada, sutan izan saltsa, pixka bat loditzen dela ikusi arte.</p>\r\n<p>Txerri hanka egosi batzuk baldin baditugu, puskatan gehitu barraskiloei. Sekulakoa izango da, zoragarri. Paradisuan ez da jaki hoberik izango.</p>',90,'hard',30,4,128906,'image/jpeg; charset=binary','Barraskiloak saltsan.JPG'),(3,'','PacharÃ¡n','Patxarana','','<ul>\r\n<li>Basaran freskoak, onduak, kilo bat</li>\r\n<li>Patxarana egiteko anis berezia, 3 litro</li>\r\n<li>Kafe ale batzuk</li>\r\n</ul>','<ul>\r\n<li>Basaran freskoak, onduak, kilo bat</li>\r\n<li>Patxarana egiteko anis berezia, 3 litro</li>\r\n<li>Kafe ale batzuk</li>\r\n</ul>','','<p>Ongi garbitu basaranak, uretan, gero lehortu eta hurrena bidoi edo bonbila handi batean sartu. Ondoren anisa isuriko dugu bidoira eta kafe aleak sartu. Ongi estalita egon dadila hiru hilabetean, baina noizean behin astindu bat eman lurrinak eta kolorea ongi banatu eta zabaldu daitezen, denean berdin.</p>\r\n<p>Norberaren gustua zein den eta bakoitzak nolako pazientzia duen, horren arabera denbora gutxiago edo gehiago edukiko dugu beratzen. Denborarekin asmatzea, horixe da kontua. Batzuek kanela txotxa gehitzen diote, pixar bat, edo limoi edo laranja azala.</p>\r\n<p>Ez da komeni denbora sobera ere uztea basaranak beratzen, patxarana sobera ez iluntzeko, eta botilatzen badugu ona izaten da botilan basaran ale batzuk sartzea, ez gehiegi betiere. Sobran ditugun basaranekin marmelada goxo-goxoa egin dezakegu. Patxarana sobera zahartzea ere ez da ona, kolorea eta, are garrantzitsuagoa, fruta-zaporea galtzen baitu.</p>\r\n<p>Hobe da patxarana fresko samar egotea edo izotz puska batzuekin edatea. Ez dezagun ahaztu, dena dela, gozoa izan arren eta aise sartzen bada ere, sekulako atxurra uzten duela gehiegi edanez gero. Patxaranaren mozkorraren biharamunean, bestondoan, nahiago du edozeinek tximu-pixa edan patxaran xorta bat baino, traidorea baita maiz. Nik bezain ongi dakizue denok.</p>','<p>Ongi garbitu basaranak, uretan, gero lehortu eta hurrena bidoi edo bonbila handi batean sartu. Ondoren anisa isuriko dugu bidoira eta kafe aleak sartu. Ongi estalita egon dadila hiru hilabetean, baina noizean behin astindu bat eman lurrinak eta kolorea ongi banatu eta zabaldu daitezen, denean berdin.</p>\r\n<p>Norberaren gustua zein den eta bakoitzak nolako pazientzia duen, horren arabera denbora gutxiago edo gehiago edukiko dugu beratzen. Denborarekin asmatzea, horixe da kontua. Batzuek kanela txotxa gehitzen diote, pixar bat, edo limoi edo laranja azala.</p>\r\n<p>Ez da komeni denbora sobera ere uztea basaranak beratzen, patxarana sobera ez iluntzeko, eta botilatzen badugu ona izaten da botilan basaran ale batzuk sartzea, ez gehiegi betiere. Sobran ditugun basaranekin marmelada goxo-goxoa egin dezakegu. Patxarana sobera zahartzea ere ez da ona, kolorea eta, are garrantzitsuagoa, fruta-zaporea galtzen baitu.</p>\r\n<p>Hobe da patxarana fresko samar egotea edo izotz puska batzuekin edatea. Ez dezagun ahaztu, dena dela, gozoa izan arren eta aise sartzen bada ere, sekulako atxurra uzten duela gehiegi edanez gero. Patxaranaren mozkorraren biharamunean, bestondoan, nahiago du edozeinek tximu-pixa edan patxaran xorta bat baino, traidorea baita maiz. Nik bezain ongi dakizue denok.</p>',30,'easy',25,1,5557,'image/jpeg; charset=binary','descarga.jpg'),(5,'','Alubias rojas','Babarrun gorri garbiak','','<ul>\r\n<li>Kg erdia babarrun gorri</li>\r\n<li>2 litro ur</li>\r\n<li>Tipula bat</li>\r\n<li>2 koilarakada handi oliba olio</li>\r\n<li>Gatza</li>\r\n<li>3 baratxuri ale</li>\r\n<li>Oliba olioa</li>\r\n<li>Lagungarrirako: Ibarrako piperrak, ozpinetan onduak</li>\r\n</ul>','<ul>\r\n<li>Kg erdia babarrun gorri</li>\r\n<li>2 litro ur</li>\r\n<li>Tipula bat</li>\r\n<li>2 koilarakada handi oliba olio</li>\r\n<li>Gatza</li>\r\n<li>3 baratxuri ale</li>\r\n<li>Oliba olioa</li>\r\n<li>Lagungarrirako: Ibarrako piperrak, ozpinetan onduak</li>\r\n</ul>','','<p>Eltze batean ipiniko ditugu babarrunak, ur hotzarekin. Olioa eta tipula erdi bat zuritua erantsiko ditugu ondoren. Irakinaldia ur hotz pixka batez eten eta su ezti-eztian jarriko dugu eltzea, babarrunak su eztian egosten utzirik. Erdi egin direnean, tipula erdia atera eta olio errearen olioa berotuko dugu padera batean. Baratxuri aleak erantsiko ditugu ondoren eta atera egingo ditugu ondoren, gorritutakoan. Tipularen beste erdia erantsiko dugu ondoren, baina xehaturik. Gorritzen hasi orduko erantsiko dugu olio errea babarrunen eltzean. Egosaldia bukatu bezain laster &ldquo;lau ordu inguru&ldquo;, gatza erantsi eta pausatzen utziko dugu eltzekaria ordu erdi batean.</p>\r\n<br />\r\n<p><strong>Nola zerbitzatu:</strong> Piperrak ongi xukatu eta oliba olio birjina estra eta gatzarekin maneatuko ditugu, eltzekariaren ondoan jateko.</p>','<p>Eltze batean ipiniko ditugu babarrunak, ur hotzarekin. Olioa eta tipula erdi bat zuritua erantsiko ditugu ondoren. Irakinaldia ur hotz pixka batez eten eta su ezti-eztian jarriko dugu eltzea, babarrunak su eztian egosten utzirik. Erdi egin direnean, tipula erdia atera eta olio errearen olioa berotuko dugu padera batean. Baratxuri aleak erantsiko ditugu ondoren eta atera egingo ditugu ondoren, gorritutakoan. Tipularen beste erdia erantsiko dugu ondoren, baina xehaturik. Gorritzen hasi orduko erantsiko dugu olio errea babarrunen eltzean. Egosaldia bukatu bezain laster &ldquo;lau ordu inguru&ldquo;, gatza erantsi eta pausatzen utziko dugu eltzekaria ordu erdi batean.</p>\r\n<br />\r\n<p><strong>Nola zerbitzatu:</strong> Piperrak ongi xukatu eta oliba olio birjina estra eta gatzarekin maneatuko ditugu, eltzekariaren ondoan jateko.</p>',180,'medium',15,4,44750,'image/jpeg; charset=binary','alubias.jpg'),(6,'','Tortilla de bacalao','Bakailao tortilla','','<ul>\r\n<li>600 g bakailao beratu</li>\r\n<li>8 arrautza</li>\r\n<li>Porru txiki bat, pikatua</li>\r\n<li>Tipulin txiki bat, pikatua</li>\r\n<li>Piper berde txiki bat, pikatua</li>\r\n<li>5 koilarakada oliba olio</li>\r\n<li>Perrexil pikatua</li>\r\n<li>Pipermin lehorra, pixar bat pikatua</li>\r\n</ul>','<ul>\r\n<li>600 g bakailao beratu</li>\r\n<li>8 arrautza</li>\r\n<li>Porru txiki bat, pikatua</li>\r\n<li>Tipulin txiki bat, pikatua</li>\r\n<li>Piper berde txiki bat, pikatua</li>\r\n<li>5 koilarakada oliba olio</li>\r\n<li>Perrexil pikatua</li>\r\n<li>Pipermin lehorra, pixar bat pikatua</li>\r\n</ul>','','<p>Kazola edo padera batean olioa isuri eta hartan gozatuko ditugu, su ezti-eztian, barazkiak piperminarekin batean. Bakailaoa papurtua edo solomotan edukiko dugu, baina ongi beratua betiere. Erretilu batean paratuko dugu bakailaoa; olio tanta batzuk gainetik bota eta labean edo mikrouhinetan edukiko dugu 5 bat minutuan (120&ordm;-tan edo 650 w-tan). Atera eta azala eta hezurrak kenduko dizkiogu. Papurtu eta geroko gorde.</p>\r\n<p>Eztituriko barazkien gainean erantsiko dugu bakailao papurtua. Biraka erabiliko dugu guztia, berotzen den bitartean, eta zukua isuriko du epe horretan bakailaoak. Arrautzak jo, barazki eta bakailaoarekin nahasi eta perrexil erantsiko dugu ondoren. Gatz pittin bat eman eta tortilla egingo dugu, lehortzen utzi gabe, barrua mamitsu egon dadin.</p>\r\n<p>Garrantzitsua da bakailaoa arrautzarekin nahasi aurretik ongi egina egotea. Bestela, tortilla egin eta gero, ura edo zukua isuriko du eta, tortilla zaporetsua egongo den arren, ez da horren ikusgarri egongo. Kontuz ibili beharra dago bada, haurrekin batez ere, ongi baitakigu zein bereziak diren jaki \"nazkagarrien\" aurrean.</p>','<p>Kazola edo padera batean olioa isuri eta hartan gozatuko ditugu, su ezti-eztian, barazkiak piperminarekin batean. Bakailaoa papurtua edo solomotan edukiko dugu, baina ongi beratua betiere. Erretilu batean paratuko dugu bakailaoa; olio tanta batzuk gainetik bota eta labean edo mikrouhinetan edukiko dugu 5 bat minutuan (120&ordm;-tan edo 650 w-tan). Atera eta azala eta hezurrak kenduko dizkiogu. Papurtu eta geroko gorde.</p>\r\n<p>Eztituriko barazkien gainean erantsiko dugu bakailao papurtua. Biraka erabiliko dugu guztia, berotzen den bitartean, eta zukua isuriko du epe horretan bakailaoak. Arrautzak jo, barazki eta bakailaoarekin nahasi eta perrexil erantsiko dugu ondoren. Gatz pittin bat eman eta tortilla egingo dugu, lehortzen utzi gabe, barrua mamitsu egon dadin.</p>\r\n<p>Garrantzitsua da bakailaoa arrautzarekin nahasi aurretik ongi egina egotea. Bestela, tortilla egin eta gero, ura edo zukua isuriko du eta, tortilla zaporetsua egongo den arren, ez da horren ikusgarri egongo. Kontuz ibili beharra dago bada, haurrekin batez ere, ongi baitakigu zein bereziak diren jaki \"nazkagarrien\" aurrean.</p>',25,'medium',22,2,109829,'image/jpeg; charset=binary','Bakailao tortilla.jpg');
/*!40000 ALTER TABLE `Recipes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='[entity]';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tags`
--

LOCK TABLES `Tags` WRITE;
/*!40000 ALTER TABLE `Tags` DISABLE KEYS */;
INSERT INTO `Tags` VALUES (3,'','Pimientos','Piperrak'),(4,'','Hortaliza','Barazkia'),(5,'','Receta tradicional','Betiko errezeta'),(6,'','Verde','Berdea');
/*!40000 ALTER TABLE `Tags` ENABLE KEYS */;
UNLOCK TABLES;
