/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_check_kulit
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_check_kulit` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_check_kulit`;

/*Table structure for table `tb_gejala` */

DROP TABLE IF EXISTS `tb_gejala`;

CREATE TABLE `tb_gejala` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `gejala` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_gejala` */

insert  into `tb_gejala`(`id`,`kode`,`gejala`) values 
(1,'G01','Gatal'),
(2,'G02','Tidak gatal'),
(3,'G03','Kemerahan'),
(4,'G04','Kulit bersisik'),
(5,'G05','Kulit kering'),
(6,'G06','Kulit memerah'),
(7,'G07','Kulit berkerak'),
(8,'G08','Kulit melepuh'),
(9,'G09','Kulit mengelupas'),
(10,'G10','Sela - sela jari kaki'),
(11,'G11','Kerontokan rambut'),
(12,'G12','Benjolan kecil berisi nanah berkerak'),
(13,'G13','Bintik hitam kecil tanda kerontokan'),
(14,'G14','Kepala'),
(15,'G15','Gatal lebih dari 1 bulan'),
(16,'G16','Ruam berbentuk bulat'),
(17,'G17','Batas tegas, tepi lebih aktif'),
(18,'G18','Badan'),
(19,'G19','Leher'),
(20,'G20','Lengan'),
(21,'G21','Tangan'),
(22,'G22','Tungkai'),
(23,'G23','Ruam kemerahan seperti cincin'),
(24,'G24','Selangkangan'),
(25,'G25','Bercak di kulit lebih terang atau gelap'),
(26,'G26','Punggung'),
(27,'G27','Dada'),
(28,'G28','Wajah'),
(29,'G29','Kulit tampak gelap setelah sembuh'),
(30,'G30','Perih'),
(31,'G31','Sensitif terhadap cahaya matahari'),
(32,'G32','Kulit pecah - pecah'),
(33,'G33','Bengkak'),
(34,'G34','Kulit terasa kencang'),
(35,'G35','Pipi'),
(36,'G36','Ruam merah'),
(37,'G37','Lutut bagian dalam'),
(38,'G38','Siku bagian dalam'),
(39,'G39','Bercak kemerahan seperti koin'),
(40,'G40','Bintik merah di dalam bercak'),
(41,'G41','Kaki'),
(42,'G42','Sisik kuning'),
(43,'G43','Kulit terasa terbakar'),
(44,'G44','Kulit kering bersisik putih atau kuning'),
(45,'G45','Timbul ketombe akibat kulit terkelupas'),
(46,'G46','Daerah dengan rambut tebal'),
(47,'G47','Kumis'),
(48,'G48','Jenggot'),
(49,'G49','Alis'),
(50,'G50','Ketiak'),
(51,'G51','Kemaluan'),
(52,'G52','Kulit terasa tebal kering seperti mika'),
(53,'G53','Kulit terkelupas kemudian berdarah'),
(54,'G54','Lutut'),
(55,'G55','Siku'),
(56,'G56','Ruam merah berisi cairan'),
(57,'G57','Demam'),
(58,'G58','Sakit kepala'),
(59,'G59','Nyeri'),
(60,'G60','Kehilangan selera makan'),
(61,'G61','Kelelahan'),
(62,'G62','Bintil merah berisi cairan muncul 1 sisi'),
(63,'G63','Jaringan kulit di sekitar bintil bengkak'),
(64,'G64','Rasa seperti terbakar'),
(65,'G65','Luka lepuh bisa pecah jadi berkerak'),
(66,'G66','Bercak kemerahan'),
(67,'G67','Bercak bisa jadi luka jika di garuk'),
(68,'G68','Kulit sekitar luka mengalami iritasi'),
(69,'G69','Koreng kuning kecokelatan sekitar luka'),
(70,'G70','Sekitar mulut'),
(71,'G71','Sekitar hidung'),
(72,'G72','Lepuhan berisi cairan warna bening'),
(73,'G73','Lepuhan pecah picu koreng kekuningan'),
(74,'G74','Jejak terowongan pada kulit'),
(75,'G75','Gatal memburuk saat malam hari'),
(76,'G76','Sela - sela jari tangan'),
(77,'G77','Pergelangan tangan'),
(78,'G78','Telapak tangan'),
(79,'G79','Telapak kaki'),
(80,'G80','Bintil merah berisi cairan jernih'),
(81,'G81','Bintil mudah pecah'),
(82,'G82','Bagian tubuh yang tertutup pakaian'),
(83,'G83','Rasa tersengat'),
(84,'G84','Bintil merah'),
(85,'G85','Bintil merah berisi nanah'),
(86,'G86','Alergi'),
(87,'G87','Kelopak mata'),
(88,'G88','Bibir'),
(89,'G89','Lidah'),
(90,'G90','Berlangsung kurang dari 6 minggu'),
(91,'G91','Berlangsung lebih dari 6 minggu');

/*Table structure for table `tb_identifikasi` */

DROP TABLE IF EXISTS `tb_identifikasi`;

CREATE TABLE `tb_identifikasi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_identifikasi` */

insert  into `tb_identifikasi`(`id`,`id_user`,`nama`,`jenis_kelamin`,`tgl_lahir`) values 
(1,1,'Iman Nur Izza','Pria','2000-01-01'),
(2,1,'Iman Nur','Pria','2000-01-01'),
(3,1,'Iman','Pria','2000-02-02');

/*Table structure for table `tb_identifikasi_detail` */

DROP TABLE IF EXISTS `tb_identifikasi_detail`;

CREATE TABLE `tb_identifikasi_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_identifikasi` int(10) DEFAULT NULL,
  `id_pertanyaan` int(10) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_identifikasi_detail` */

insert  into `tb_identifikasi_detail`(`id`,`id_identifikasi`,`id_pertanyaan`,`kode_gejala`) values 
(1,1,1,'G02'),
(2,1,51,'G05'),
(3,1,52,'G25'),
(4,1,53,'G26'),
(5,2,1,'G02'),
(6,2,51,'G05'),
(7,2,52,'G25'),
(8,2,53,'G28'),
(9,3,1,'G02'),
(10,3,51,'G05'),
(11,3,52,'G25'),
(12,3,53,'G27');

/*Table structure for table `tb_penyakit` */

DROP TABLE IF EXISTS `tb_penyakit`;

CREATE TABLE `tb_penyakit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) NOT NULL,
  `penyakit` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode` (`kode`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_penyakit` */

insert  into `tb_penyakit`(`id`,`kode`,`penyakit`) values 
(1,'P01','Tinea Pedis'),
(2,'P02','Tinea Kapitis'),
(3,'P03','Tinea Korporis'),
(4,'P04','Tinea Kruris'),
(5,'P05','Pityriasis Versikolor'),
(6,'P06','Dermatitis Kontak Alergi'),
(7,'P07','Dermatitis Kontak Iritan'),
(8,'P08','Dermatitis Atopik'),
(9,'P09','Dermatitis Nummularis'),
(10,'P10','Dermatitis Seboroik'),
(11,'P11','Psoriasis'),
(12,'P12','Varicella'),
(13,'P13','Herpes Zoster'),
(14,'P14','Impetigo Krustosa'),
(15,'P15','Impetigo Bulosa'),
(16,'P16','Scabies'),
(17,'P17','Miliaria Kristalina'),
(18,'P18','Miliaria Rubra'),
(19,'P19','Miliaria Pustulosa'),
(20,'P20','Angiodema'),
(21,'P21','Urtikaria Akut'),
(22,'P22','Urtikaria Kronis');

/*Table structure for table `tb_pertanyaan` */

DROP TABLE IF EXISTS `tb_pertanyaan`;

CREATE TABLE `tb_pertanyaan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent` varchar(10) DEFAULT NULL,
  `pertanyaan` text DEFAULT NULL,
  `is_last` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pertanyaan` */

insert  into `tb_pertanyaan`(`id`,`parent`,`pertanyaan`,`is_last`) values 
(1,'','Apakah kulit anda mengalami rasa gatal atau tidak?',0),
(2,'G01','Selain itu, apakah anda mengalami gejala lain?',0),
(3,'G03','Selain itu, apakah anda mengalami gejala lain?',0),
(4,'G86','Selain itu, apakah anda mengalami gejala lain?',0),
(5,'G59','Sudah berapa lama anda mengalami gejala tersebut?',1),
(6,'G33','Selain itu, apakah anda mengalami gejala lain?',0),
(7,'G86','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(8,'G09','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(9,'G04','Selain itu, apakah anda mengalami gejala lain?',0),
(10,'G11','Selain itu, apakah anda mengalami gejala lain?',0),
(11,'G12','Selain itu, apakah anda mengalami gejala lain?',0),
(12,'G13','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(13,'G29','Selain itu, apakah anda mengalami gejala lain?',0),
(14,'G30','Selain itu, apakah anda mengalami gejala lain?',1),
(15,'G04','Selain itu, apakah anda mengalami gejala lain?',0),
(16,'G06','Selain itu, apakah anda mengalami gejala lain?',0),
(17,'G52','Selain itu, apakah anda mengalami gejala lain?',0),
(18,'G53','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(19,'G07','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(20,'G05','Selain itu, apakah anda mengalami gejala lain?',0),
(21,'G06','Selain itu, apakah anda mengalami gejala lain?',0),
(22,'G07','Selain itu, apakah anda mengalami gejala lain?',0),
(23,'G36','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(24,'G05','Selain itu, apakah anda mengalami gejala lain?',0),
(25,'G32','Selain itu, apakah anda mengalami gejala lain?',1),
(26,'G15','Selain itu, apakah anda mengalami gejala lain?',0),
(27,'G04','Selain itu, apakah anda mengalami gejala lain?',0),
(28,'G16','Selain itu, apakah anda mengalami gejala lain?',0),
(29,'G17','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(30,'G23','Selain itu, apakah anda mengalami gejala lain?',0),
(31,'G17','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(32,'G39','Selain itu, apakah anda mengalami gejala lain?',0),
(33,'G40','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(34,'G42','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(35,'G44','Selain itu, apakah anda mengalami gejala lain?',0),
(36,'G45','Selain itu, apakah anda mengalami gejala lain?',0),
(37,'G43','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(38,'G62','Selain itu, apakah anda mengalami gejala lain?',0),
(39,'G63','Selain itu, apakah anda mengalami gejala lain?',0),
(40,'G64','Selain itu, apakah anda mengalami gejala lain?',0),
(41,'G65','Selain itu, apakah anda mengalami gejala lain?',0),
(42,'G59','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(43,'G74','Selain itu, apakah anda mengalami gejala lain?',0),
(44,'G75','Selain itu, apakah anda mengalami gejala lain?',1),
(45,'G84','Selain itu, apakah anda mengalami gejala lain?',0),
(46,'G83','Selain itu, apakah anda mengalami gejala lain?',0),
(47,'G82','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(48,'G85','Selain itu, apakah anda mengalami gejala lain?',0),
(49,'G83','Selain itu, apakah anda mengalami gejala lain?',0),
(50,'G82','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(51,'G02','Selain itu, apakah anda mengalami gejala lain?',0),
(52,'G05','Selain itu, apakah anda mengalami gejala lain?',0),
(53,'G25','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(54,'G56','Selain itu, apakah anda mengalami gejala lain?',0),
(55,'G57','Selain itu, apakah anda mengalami gejala lain?',0),
(56,'G58','Selain itu, apakah anda mengalami gejala lain?',0),
(57,'G59','Selain itu, apakah anda mengalami gejala lain?',0),
(58,'G60','Selain itu, apakah anda mengalami gejala lain?',0),
(59,'G61','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(60,'G66','Selain itu, apakah anda mengalami gejala lain?',0),
(61,'G67','Selain itu, apakah anda mengalami gejala lain?',0),
(62,'G65','Selain itu, apakah anda mengalami gejala lain?',0),
(63,'G68','Selain itu, apakah anda mengalami gejala lain?',0),
(64,'G69','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(65,'G72','Selain itu, apakah anda mengalami gejala lain?',0),
(66,'G59','Selain itu, apakah anda mengalami gejala lain?',0),
(67,'G73','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1),
(68,'G80','Selain itu, apakah anda mengalami gejala lain?',0),
(69,'G81','Selain itu, apakah anda mengalami gejala lain?',0),
(70,'G82','Selain itu, di bagian tubuh mana anda mengalami gejala tersebut?',1);

/*Table structure for table `tb_pertanyaan_detail` */

DROP TABLE IF EXISTS `tb_pertanyaan_detail`;

CREATE TABLE `tb_pertanyaan_detail` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(10) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pertanyaan_detail` */

insert  into `tb_pertanyaan_detail`(`id`,`id_pertanyaan`,`kode_gejala`) values 
(1,1,'G01'),
(2,1,'G02'),
(3,2,'G03'),
(4,2,'G04'),
(5,2,'G05'),
(6,2,'G15'),
(7,2,'G23'),
(8,2,'G39'),
(9,2,'G42'),
(10,2,'G44'),
(11,2,'G62'),
(12,2,'G74'),
(13,2,'G84'),
(14,2,'G85'),
(15,3,'G86'),
(16,3,'G33'),
(17,3,'G09'),
(18,3,'G04'),
(19,3,'G29'),
(20,4,'G59'),
(21,5,'G91'),
(22,5,'G90'),
(23,6,'G86'),
(24,7,'G87'),
(25,7,'G88'),
(26,7,'G89'),
(27,8,'G10'),
(28,9,'G11'),
(29,10,'G12'),
(30,11,'G13'),
(31,12,'G14'),
(32,13,'G30'),
(33,14,'G31'),
(34,15,'G06'),
(35,15,'G05'),
(36,16,'G52'),
(37,16,'G07'),
(38,17,'G53'),
(39,18,'G14'),
(40,18,'G26'),
(41,18,'G54'),
(42,18,'G55'),
(43,19,'G35'),
(44,20,'G06'),
(45,21,'G07'),
(46,22,'G36'),
(47,23,'G19'),
(48,23,'G37'),
(49,23,'G38'),
(50,24,'G32'),
(51,25,'G34'),
(52,26,'G04'),
(53,27,'G16'),
(54,28,'G17'),
(55,29,'G19'),
(56,29,'G20'),
(57,29,'G21'),
(58,29,'G22'),
(59,30,'G17'),
(60,31,'G24'),
(61,32,'G40'),
(62,33,'G19'),
(63,33,'G20'),
(64,33,'G21'),
(65,33,'G22'),
(66,33,'G41'),
(67,34,'G14'),
(68,35,'G45'),
(69,36,'G43'),
(70,37,'G14'),
(71,37,'G47'),
(72,37,'G48'),
(73,37,'G49'),
(74,37,'G50'),
(75,37,'G51'),
(76,38,'G63'),
(77,39,'G64'),
(78,40,'G65'),
(79,41,'G59'),
(80,42,'G19'),
(81,42,'G20'),
(82,42,'G21'),
(83,42,'G22'),
(84,42,'G26'),
(85,42,'G27'),
(86,42,'G28'),
(87,43,'G75'),
(88,44,'G76'),
(89,44,'G77'),
(90,44,'G78'),
(91,44,'G79'),
(92,44,'G50'),
(93,45,'G83'),
(94,46,'G82'),
(95,47,'G18'),
(96,48,'G83'),
(97,49,'G82'),
(98,50,'G18'),
(99,51,'G05'),
(100,51,'G56'),
(101,51,'G66'),
(102,51,'G72'),
(103,51,'G80'),
(104,52,'G25'),
(105,53,'G26'),
(106,53,'G27'),
(107,53,'G28'),
(108,54,'G57'),
(109,55,'G58'),
(110,56,'G59'),
(111,57,'G60'),
(112,58,'G61'),
(113,59,'G18'),
(114,59,'G28'),
(115,60,'G67'),
(116,61,'G65'),
(117,62,'G68'),
(118,63,'G69'),
(119,64,'G70'),
(120,64,'G71'),
(121,65,'G59'),
(122,66,'G73'),
(123,67,'G19'),
(124,67,'G20'),
(125,67,'G21'),
(126,67,'G22'),
(127,68,'G81'),
(128,69,'G82'),
(129,70,'G18');

/*Table structure for table `tb_rule` */

DROP TABLE IF EXISTS `tb_rule`;

CREATE TABLE `tb_rule` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(10) DEFAULT NULL,
  `kode_gejala` varchar(10) DEFAULT NULL,
  `urutan` double DEFAULT 0,
  `rule_ke` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=323 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_rule` */

insert  into `tb_rule`(`id`,`id_pertanyaan`,`kode_gejala`,`urutan`,`rule_ke`) values 
(1,1,'G01',1,1),
(2,2,'G03',2,1),
(3,3,'G86',3,1),
(4,4,'G59',4,1),
(5,5,'G91',5,1),
(6,1,'G01',1,2),
(7,2,'G03',2,2),
(8,3,'G86',3,2),
(9,4,'G59',4,2),
(10,5,'G90',5,2),
(11,1,'G01',1,3),
(12,2,'G03',2,3),
(13,3,'G33',3,3),
(14,6,'G86',4,3),
(15,7,'G87',5,3),
(16,1,'G01',1,4),
(17,2,'G03',2,4),
(18,3,'G33',3,4),
(19,6,'G86',4,4),
(20,7,'G88',5,4),
(21,1,'G01',1,5),
(22,2,'G03',2,5),
(23,3,'G33',3,5),
(24,6,'G86',4,5),
(25,7,'G89',5,5),
(26,1,'G01',1,6),
(27,2,'G03',2,6),
(28,3,'G09',3,6),
(29,8,'G10',4,6),
(30,1,'G01',1,7),
(31,2,'G03',2,7),
(32,3,'G04',3,7),
(33,9,'G11',4,7),
(34,10,'G12',5,7),
(35,11,'G13',6,7),
(36,12,'G14',7,7),
(37,1,'G01',1,8),
(38,2,'G03',2,8),
(39,3,'G29',3,8),
(40,13,'G30',4,8),
(41,14,'G31',5,8),
(42,1,'G01',1,9),
(43,2,'G04',2,9),
(44,15,'G06',3,9),
(45,16,'G52',4,9),
(46,17,'G53',5,9),
(47,18,'G14',6,9),
(48,1,'G01',1,10),
(49,2,'G04',2,10),
(50,15,'G06',3,10),
(51,16,'G52',4,10),
(52,17,'G53',5,10),
(53,18,'G26',6,10),
(54,1,'G01',1,11),
(55,2,'G04',2,11),
(56,15,'G06',3,11),
(57,16,'G52',4,11),
(58,17,'G53',5,11),
(59,18,'G54',6,11),
(60,1,'G01',1,12),
(61,2,'G04',2,12),
(62,15,'G06',3,12),
(63,16,'G52',4,12),
(64,17,'G53',5,12),
(65,18,'G55',6,12),
(66,1,'G01',1,13),
(67,2,'G04',2,13),
(68,15,'G06',3,13),
(69,16,'G07',4,13),
(70,19,'G35',5,13),
(71,1,'G01',1,14),
(72,2,'G04',2,14),
(73,15,'G05',3,14),
(74,20,'G06',4,14),
(75,21,'G07',5,14),
(76,22,'G36',6,14),
(77,23,'G19',7,14),
(78,1,'G01',1,15),
(79,2,'G04',2,15),
(80,15,'G05',3,15),
(81,20,'G06',4,15),
(82,21,'G07',5,15),
(83,22,'G36',6,15),
(84,23,'G37',7,15),
(85,1,'G01',1,16),
(86,2,'G04',2,16),
(87,15,'G05',3,16),
(88,20,'G06',4,16),
(89,21,'G07',5,16),
(90,22,'G36',6,16),
(91,23,'G38',7,16),
(92,1,'G01',1,17),
(93,2,'G05',2,17),
(94,24,'G32',3,17),
(95,25,'G34',4,17),
(96,1,'G01',1,18),
(97,2,'G15',2,18),
(98,26,'G04',3,18),
(99,27,'G16',4,18),
(100,28,'G17',5,18),
(101,29,'G19',6,18),
(102,1,'G01',1,19),
(103,2,'G15',2,19),
(104,26,'G04',3,19),
(105,27,'G16',4,19),
(106,28,'G17',5,19),
(107,29,'G20',6,19),
(108,1,'G01',1,20),
(109,2,'G15',2,20),
(110,26,'G04',3,20),
(111,27,'G16',4,20),
(112,28,'G17',5,20),
(113,29,'G21',6,20),
(114,1,'G01',1,21),
(115,2,'G15',2,21),
(116,26,'G04',3,21),
(117,27,'G16',4,21),
(118,28,'G17',5,21),
(119,29,'G22',6,21),
(120,1,'G01',1,22),
(121,2,'G23',2,22),
(122,30,'G17',3,22),
(123,31,'G24',4,22),
(124,1,'G01',1,23),
(125,2,'G39',2,23),
(126,32,'G40',3,23),
(127,33,'G19',4,23),
(128,1,'G01',1,24),
(129,2,'G39',2,24),
(130,32,'G40',3,24),
(131,33,'G20',4,24),
(132,1,'G01',1,25),
(133,2,'G39',2,25),
(134,32,'G40',3,25),
(135,33,'G21',4,25),
(136,1,'G01',1,26),
(137,2,'G39',2,26),
(138,32,'G40',3,26),
(139,33,'G22',4,26),
(140,1,'G01',1,27),
(141,2,'G39',2,27),
(142,32,'G40',3,27),
(143,33,'G41',4,27),
(144,1,'G01',1,28),
(145,2,'G42',2,28),
(146,34,'G14',3,28),
(147,1,'G01',1,29),
(148,2,'G44',2,29),
(149,35,'G45',3,29),
(150,36,'G43',4,29),
(151,37,'G14',5,29),
(152,1,'G01',1,30),
(153,2,'G44',2,30),
(154,35,'G45',3,30),
(155,36,'G43',4,30),
(156,37,'G47',5,30),
(157,1,'G01',1,31),
(158,2,'G44',2,31),
(159,35,'G45',3,31),
(160,36,'G43',4,31),
(161,37,'G48',5,31),
(162,1,'G01',1,32),
(163,2,'G44',2,32),
(164,35,'G45',3,32),
(165,36,'G43',4,32),
(166,37,'G49',5,32),
(167,1,'G01',1,33),
(168,2,'G44',2,33),
(169,35,'G45',3,33),
(170,36,'G43',4,33),
(171,37,'G50',5,33),
(172,1,'G01',1,34),
(173,2,'G44',2,34),
(174,35,'G45',3,34),
(175,36,'G43',4,34),
(176,37,'G51',5,34),
(177,1,'G01',1,35),
(178,2,'G62',2,35),
(179,38,'G63',3,35),
(180,39,'G64',4,35),
(181,40,'G65',5,35),
(182,41,'G59',6,35),
(183,42,'G19',7,35),
(184,1,'G01',1,36),
(185,2,'G62',2,36),
(186,38,'G63',3,36),
(187,39,'G64',4,36),
(188,40,'G65',5,36),
(189,41,'G59',6,36),
(190,42,'G20',7,36),
(191,1,'G01',1,37),
(192,2,'G62',2,37),
(193,38,'G63',3,37),
(194,39,'G64',4,37),
(195,40,'G65',5,37),
(196,41,'G59',6,37),
(197,42,'G21',7,37),
(198,1,'G01',1,38),
(199,2,'G62',2,38),
(200,38,'G63',3,38),
(201,39,'G64',4,38),
(202,40,'G65',5,38),
(203,41,'G59',6,38),
(204,42,'G22',7,38),
(205,1,'G01',1,39),
(206,2,'G62',2,39),
(207,38,'G63',3,39),
(208,39,'G64',4,39),
(209,40,'G65',5,39),
(210,41,'G59',6,39),
(211,42,'G26',7,39),
(212,1,'G01',1,40),
(213,2,'G62',2,40),
(214,38,'G63',3,40),
(215,39,'G64',4,40),
(216,40,'G65',5,40),
(217,41,'G59',6,40),
(218,42,'G27',7,40),
(219,1,'G01',1,41),
(220,2,'G62',2,41),
(221,38,'G63',3,41),
(222,39,'G64',4,41),
(223,40,'G65',5,41),
(224,41,'G59',6,41),
(225,42,'G28',7,41),
(226,1,'G01',1,42),
(227,2,'G74',2,42),
(228,43,'G75',3,42),
(229,44,'G76',4,42),
(230,1,'G01',1,43),
(231,2,'G74',2,43),
(232,43,'G75',3,43),
(233,44,'G77',4,43),
(234,1,'G01',1,44),
(235,2,'G74',2,44),
(236,43,'G75',3,44),
(237,44,'G78',4,44),
(238,1,'G01',1,45),
(239,2,'G74',2,45),
(240,43,'G75',3,45),
(241,44,'G79',4,45),
(242,1,'G01',1,46),
(243,2,'G74',2,46),
(244,43,'G75',3,46),
(245,44,'G50',4,46),
(246,1,'G01',1,47),
(247,2,'G84',2,47),
(248,45,'G83',3,47),
(249,46,'G82',4,47),
(250,47,'G18',5,47),
(251,1,'G01',1,48),
(252,2,'G85',2,48),
(253,48,'G83',3,48),
(254,49,'G82',4,48),
(255,50,'G18',5,48),
(256,1,'G02',1,49),
(257,51,'G05',2,49),
(258,52,'G25',3,49),
(259,53,'G26',4,49),
(260,1,'G02',1,50),
(261,51,'G05',2,50),
(262,52,'G25',3,50),
(263,53,'G27',4,50),
(264,1,'G02',1,51),
(265,51,'G05',2,51),
(266,52,'G25',3,51),
(267,53,'G28',4,51),
(268,1,'G02',1,52),
(269,51,'G56',2,52),
(270,54,'G57',3,52),
(271,55,'G58',4,52),
(272,56,'G59',5,52),
(273,57,'G60',6,52),
(274,58,'G61',7,52),
(275,59,'G18',8,52),
(276,1,'G02',1,53),
(277,51,'G56',2,53),
(278,54,'G57',3,53),
(279,55,'G58',4,53),
(280,56,'G59',5,53),
(281,57,'G60',6,53),
(282,58,'G61',7,53),
(283,59,'G28',8,53),
(284,1,'G02',1,54),
(285,51,'G66',2,54),
(286,60,'G67',3,54),
(287,61,'G65',4,54),
(288,62,'G68',5,54),
(289,63,'G69',6,54),
(290,64,'G70',7,54),
(291,1,'G02',1,55),
(292,51,'G66',2,55),
(293,60,'G67',3,55),
(294,61,'G65',4,55),
(295,62,'G68',5,55),
(296,63,'G69',6,55),
(297,64,'G71',7,55),
(298,1,'G02',1,56),
(299,51,'G72',2,56),
(300,65,'G59',3,56),
(301,66,'G73',4,56),
(302,67,'G19',5,56),
(303,1,'G02',1,57),
(304,51,'G72',2,57),
(305,65,'G59',3,57),
(306,66,'G73',4,57),
(307,67,'G20',5,57),
(308,1,'G02',1,58),
(309,51,'G72',2,58),
(310,65,'G59',3,58),
(311,66,'G73',4,58),
(312,67,'G21',5,58),
(313,1,'G02',1,59),
(314,51,'G72',2,59),
(315,65,'G59',3,59),
(316,66,'G73',4,59),
(317,67,'G22',5,59),
(318,1,'G02',1,60),
(319,51,'G80',2,60),
(320,68,'G81',3,60),
(321,69,'G82',4,60),
(322,70,'G18',5,60);

/*Table structure for table `tb_rule_penyakit` */

DROP TABLE IF EXISTS `tb_rule_penyakit`;

CREATE TABLE `tb_rule_penyakit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(10) DEFAULT NULL,
  `penyakit` varchar(100) DEFAULT NULL,
  `rule_ke` int(10) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_rule_penyakit` */

insert  into `tb_rule_penyakit`(`id`,`kode_penyakit`,`penyakit`,`rule_ke`,`alias`,`gambar`) values 
(1,'P22','Urtikaria Kronis',1,'Biduran',NULL),
(2,'P21','Urtikaria Akut',2,'Biduran',NULL),
(3,'P20','Angiodema',3,'Angiodema',NULL),
(4,'P20','Angiodema',4,'Angiodema',NULL),
(5,'P20','Angiodema',5,'Angiodema',NULL),
(6,'P01','Tinea Pedis Interdigitalis',6,'Jamur kaki','fuji.jpg'),
(7,'P02','Tinea Kapitis',7,'Jamur kepala',NULL),
(8,'P06','Dermatitis Kontak Alergi',8,'Eksim alergi',NULL),
(9,'P11','Psoriasis',9,'Psoriasis',NULL),
(10,'P11','Psoriasis',10,'Psoriasis',NULL),
(11,'P11','Psoriasis',11,'Psoriasis',NULL),
(12,'P11','Psoriasis',12,'Psoriasis',NULL),
(13,'P08','Dermatitis Atopik',13,'Eksim atopik',NULL),
(14,'P08','Dermatitis Atopik',14,'Eksim atopik',NULL),
(15,'P08','Dermatitis Atopik',15,'Eksim atopik',NULL),
(16,'P08','Dermatitis Atopik',16,'Eksim atopik',NULL),
(17,'P07','Dermatitis Kontak Iritan',17,'Eksim iritan',NULL),
(18,'P03','Tinea Korporis',18,'Jamur badan',NULL),
(19,'P03','Tinea Korporis',19,'Jamur badan',NULL),
(20,'P03','Tinea Korporis',20,'Jamur badan',NULL),
(21,'P03','Tinea Korporis',21,'Jamur badan',NULL),
(22,'P04','Tinea Kruris',22,'Jamur selangkangan',NULL),
(23,'P09','Dermatitis Nummularis',23,'Eksim nummular',NULL),
(24,'P09','Dermatitis Nummularis',24,'Eksim nummular',NULL),
(25,'P09','Dermatitis Nummularis',25,'Eksim nummular',NULL),
(26,'P09','Dermatitis Nummularis',26,'Eksim nummular',NULL),
(27,'P09','Dermatitis Nummularis',27,'Eksim nummular',NULL),
(28,'P10','Dermatitis Seboroik',28,'Eksim seboroik',NULL),
(29,'P10','Dermatitis Seboroik',29,'Eksim seboroik',NULL),
(30,'P10','Dermatitis Seboroik',30,'Eksim seboroik',NULL),
(31,'P10','Dermatitis Seboroik',31,'Eksim seboroik',NULL),
(32,'P10','Dermatitis Seboroik',32,'Eksim seboroik',NULL),
(33,'P10','Dermatitis Seboroik',33,'Eksim seboroik',NULL),
(34,'P10','Dermatitis Seboroik',34,'Eksim seboroik',NULL),
(35,'P13','Herpes Zoster',35,'Cacar ular',NULL),
(36,'P13','Herpes Zoster',36,'Cacar ular',NULL),
(37,'P13','Herpes Zoster',37,'Cacar ular',NULL),
(38,'P13','Herpes Zoster',38,'Cacar ular',NULL),
(39,'P13','Herpes Zoster',39,'Cacar ular',NULL),
(40,'P13','Herpes Zoster',40,'Cacar ular',NULL),
(41,'P13','Herpes Zoster',41,'Cacar ular',NULL),
(42,'P16','Scabies',42,'Kudis',NULL),
(43,'P16','Scabies',43,'Kudis',NULL),
(44,'P16','Scabies',44,'Kudis',NULL),
(45,'P16','Scabies',45,'Kudis',NULL),
(46,'P16','Scabies',46,'Kudis',NULL),
(47,'P18','Miliaria Rubra',47,'Biang keringat merah',NULL),
(48,'P19','Miliaria Pustulosa',48,'Biang keringat nanah',NULL),
(49,'P05','Pityriasis Versikolor',49,'Panu',NULL),
(50,'P05','Pityriasis Versikolor',50,'Panu',NULL),
(51,'P05','Pityriasis Versikolor',51,'Panu',NULL),
(52,'P12','Varicella',52,'Cacar air',NULL),
(53,'P12','Varicella',53,'Cacar air',NULL),
(54,'P14','Impetigo Krustosa',54,'Impetigo',NULL),
(55,'P14','Impetigo Krustosa',55,'Impetigo',NULL),
(56,'P15','Impetigo Bulosa',56,'Impetigo',NULL),
(57,'P15','Impetigo Bulosa',57,'Impetigo',NULL),
(58,'P15','Impetigo Bulosa',58,'Impetigo',NULL),
(59,'P15','Impetigo Bulosa',59,'Impetigo',NULL),
(60,'P17','Miliaria Kristalina',60,'Biang keringat',NULL);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `is_verification` tinyint(1) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `token` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`username`,`password`,`email`,`foto`,`is_verification`,`is_admin`,`token`,`created_at`) values 
(1,'Iman Nur Izza','1234','muhimannurizza@gmail.com','default.png',1,1,NULL,'2022-06-21 09:15:01'),
(7,'Ali Sans','1234','teamsans71@gmail.com','default.png',1,0,'evbHf40K7SLjU40W9w6fsgDwraIW54F/MXckVhlYlHU=','2022-07-17 16:02:26');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
