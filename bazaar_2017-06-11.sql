# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.6.35)
# Database: bazaar
# Generation Time: 2017-06-11 16:36:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `logo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`id`, `company_name`, `email`, `password`, `address`, `city`, `logo`)
VALUES
	(4,'Frutsi','info@frutsi.be','$2y$12$.7VXQE2Km7ZARtdSmulRyOKa4Rch3CwsFAjFrVbY.tmgNtyimQAhO','Bruul 87','Mechelen','Frutsi-Mechelen.png'),
	(5,'Lierse Poort','info@liersepoort.be','$2y$12$uzlSJbVtgXFbu0uUQbA23e6ef6F0m45Adg0hvN42BNI1hnpKG9Kw.','Liersesteenweg 278','Mechelen','Lierse-Poort.png'),
	(6,'Bar Popular','info@barpopular.be','$2y$12$NA9CW40QtBm8LNG5oz6gvOO.r/zz/yOhFeKeU3VXLBx2JMiOYDPzy','Vismarkt 1','Mechelen','bar_popular.gif'),
	(7,'Kabas','hallo@dekabas.be','$2y$12$WrgeSEmwX1c8rTrja/kwk.Kt4FKspUYpsfDvSqJ1XmmHg.qkEFqkC','Keizerstraat 17','Mechelen','kabas.png'),
	(8,'Bakkerij Kristof','info@bakkerijkristof.be','$2y$12$CpsxpsMSunYX0aR.HSTHyeuMoPHgBw1jb3zeL2k0Xdwi/KT8aQIi2','Leuvensesteenweg 368','Muizen','kristof.png'),
	(9,'De Ridder Van Musena','info@deriddervanmusena.be','$2y$12$nVaQNKS6uH7hoYak2HT2beE33Q/pDu6Si06PNW6gw7WZPj0/QI/TS','Brugstraat 7','Muizen','riddervanmusena.png'),
	(10,'Garage Pascal','info@garagepascal.be','$2y$12$d4983yk1hA.T0j5sRBbtkOMq1vS2v6pCmg1nRKOnEYpHf4eI1shU6','Koning Albertstraat 36','Walem','garagepascal.png'),
	(11,'Marjet Boetiek','marjetboetiek@skynet.be','$2y$12$NNHdTSVrstQOpPkdKGy0GuC9W7XCAzNpV2ltGFTWEYDqMNYYSHtBq','Frans Reyniersstraat 42','Hombeek','marjet.png'),
	(12,'Pollet Hombeek','hombeek@pollet.be','$2y$12$ycExKRMcA6wEwL.c93G6FeMEMwiAdnYhF5PDtoB4EMXqd02rM.xXy','Pastoor De Heuckstraat 10','Hombeek','pollet.png'),
	(13,'Bakkerij Carl Battel','info@bakkerijcarl.be','$2y$12$jmVFms5pUS72ONs8bf3sBOTxrvBLVwPJPe4CJgjXS64JprUo6wtSe','Battelsesteenweg 422','Mechelen','carl.jpg');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table offers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `offers`;

CREATE TABLE `offers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `coins` int(11) NOT NULL,
  `promoted` tinyint(1) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;

INSERT INTO `offers` (`id`, `title`, `description`, `start_date`, `end_date`, `coins`, `promoted`, `company_id`)
VALUES
	(1,'Broodjes sparen','Lorem ipsum dolor sit amet, ne nec laudem audire feugiat, ferri interesset sed te. Porro meliore posidonium sed at, nihil suavitate et per. Cu vel minim clita omnes, vix et nostrud periculis. Ipsum noster cu vel, per nostrum posidonium ad.','2017-04-28','2017-05-28',5,1,4),
	(2,'Spaaractie Lierse Poort','Cum graeco moderatius id, ex ludus sententiae nam. Ne ius esse semper facilis, cum eros putent delicata an, adhuc etiam vitae ad duo. Eu alia vocibus his. Nominati hendrerit an sit. Et debitis nonumes vix, sea latine utroque cu. Quo no verear praesent vituperata.\n','2017-05-02','2017-07-02',7,1,5),
	(3,'Cocktail Wedstrijd','Sed no cibo natum consulatu, duo viris affert ea. Cu dolor dicant reprimique sed, usu errem scripta quaestio cu. Pri an amet habeo sapientem. Mea ex consul liberavisse interpretaris. Ius error gubergren ne, probo lucilius incorrupte usu an.','2017-05-05','2017-06-15',2,1,6),
	(4,'Bio actie','Te pri nonumes placerat consequat. Cu lobortis torquatos elaboraret quo, id mel deleniti scaevola. Clita detracto sapientem per at. An vix blandit prodesset, cum ad dissentiunt efficiantur. Labores recteque erroribus mei ne.','2017-05-05','2017-05-28',8,1,7),
	(5,'Broden actie','Spaar tot 6 KV Coins (twv. €8,7) bij aankoop van ons ovenvers brood. Per aankoopschijf van €1,45 ontvangt u 1 KV Coin. Aanbod geldig op het volledige broodassortiment.','2017-05-01','2017-07-01',6,1,13);

/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table offers_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `offers_users`;

CREATE TABLE `offers_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `earnings` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `offers_users` WRITE;
/*!40000 ALTER TABLE `offers_users` DISABLE KEYS */;

INSERT INTO `offers_users` (`id`, `offer_id`, `user_id`, `earnings`)
VALUES
	(4,5,3,2),
	(5,2,3,1),
	(6,3,3,1);

/*!40000 ALTER TABLE `offers_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`)
VALUES
	(3,'Kobe','Vervoort','kobevervoort@gmail.com','$2y$12$hfIKNtpInzk3H9.Dk.z3muSdnPZmEELHsMI45EgstPM6k8RRvxkiK',''),
	(18,'Test','Testers','test@test.com','$2y$12$4HxvbTB2zmkwCS5hCL0YseNVmgvJIaXOUdu4MFO2HKKubKO.nn.Gq','');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
