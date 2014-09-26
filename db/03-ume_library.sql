# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-09-26 11:56:01
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for ume_library
CREATE DATABASE IF NOT EXISTS `ume_library` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ume_library`;


# Dumping structure for table ume_library.tbl_author
DROP TABLE IF EXISTS `tbl_author`;
CREATE TABLE IF NOT EXISTS `tbl_author` (
  `aut_id` int(11) NOT NULL,
  `aut_name` varchar(100) DEFAULT NULL,
  `aut_status` bit(1) DEFAULT NULL,
  `aut_nationality` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`aut_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_author: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_author` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_author` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_books
DROP TABLE IF EXISTS `tbl_books`;
CREATE TABLE IF NOT EXISTS `tbl_books` (
  `boo_id` int(11) NOT NULL AUTO_INCREMENT,
  `boo_isbn` int(11) DEFAULT NULL,
  `boo_title` varchar(45) DEFAULT NULL,
  `boo_major` varchar(50) DEFAULT NULL,
  `boo_classification` varchar(20) DEFAULT NULL,
  `boo_publisher` varchar(11) DEFAULT NULL,
  `boo_author` varchar(50) DEFAULT NULL,
  `boo_amount` int(11) DEFAULT NULL,
  `boo_num_of_bookcase` int(11) DEFAULT NULL,
  `boo_remark` varchar(100) DEFAULT NULL,
  `boo_reg_date` date DEFAULT NULL,
  `boo_mod_date` date DEFAULT NULL,
  `boo_status` bit(1) DEFAULT b'1',
  `boo_comment` varchar(100) DEFAULT NULL,
  `boo_shelve` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`boo_id`),
  KEY `fk_tbl_books_tbl_major` (`boo_major`),
  KEY `fk_tbl_books_tbl_shelve1` (`boo_shelve`),
  KEY `fk_tbl_books_tbl_auther1` (`boo_author`),
  KEY `fk_tbl_books_tbl_publisher1` (`boo_publisher`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_books: ~14 rows (approximately)
/*!40000 ALTER TABLE `tbl_books` DISABLE KEYS */;
INSERT INTO `tbl_books` (`boo_id`, `boo_isbn`, `boo_title`, `boo_major`, `boo_classification`, `boo_publisher`, `boo_author`, `boo_amount`, `boo_num_of_bookcase`, `boo_remark`, `boo_reg_date`, `boo_mod_date`, `boo_status`, `boo_comment`, `boo_shelve`) VALUES
	(2, 9808, 'HTML', 'lkl', 'jlkj', 'ljl', 'kjl', 1, 0, 'jlkj', '2014-09-06', NULL, '', 'jlkjl', NULL),
	(3, 4234, 'CSS', 'lkj', 'lkjl', 'lkjl', 'jlkj', 3, 0, 'ljkl', '2014-09-06', NULL, '', 'jlk', NULL),
	(4, 8908, '6', 'ljlk', 'jlkj', 'kjl', 'kjlk', 1, 0, 'jl', '2014-09-06', '2014-09-06', '', 'jk', NULL),
	(5, 98, 'PHP', 'jlj', 'lkj', 'klj', 'lkj', 2, 0, 'lkj', '2014-09-06', NULL, '', 'lj', NULL),
	(6, 4234, '777', 'JLKJ', 'KLJLKJ', 'KJ', 'LKE', 1, 3, 'JLK', '2014-09-06', '2014-09-07', '', 'JL', NULL),
	(7, 3333, '777', 'LJ', 'LKJLKJ', 'LJL', 'KJL', 3, 0, 'KJL', '2014-09-06', NULL, '', 'jlj', NULL),
	(8, 9987, '8', 'jlkjkjljflajlf', 'jk flkaj flajslf alk', 'lfjlfkja lf', 'jflajklf al', 1, 0, 'jlkk kljlsjlfk', '2014-09-06', '2014-09-06', '', 'jjl', NULL),
	(9, 323232, 'ffsdfs', '', '', '', 'fdfd', 1, 0, '', '2014-09-08', NULL, '', '', NULL),
	(10, 34343, '3434', '', '', '', '433', 1, 0, '', '2014-09-08', NULL, '', '', NULL),
	(11, 34343, '34343', '', '', '', '343', 1, 0, '', '2014-09-08', NULL, '', '', NULL),
	(12, 3434, '434', '', '', '', '334', 1, 0, '', '2014-09-08', NULL, '', '', NULL),
	(13, 43434, '434', '', '', '', '433', 1, 0, '', '2014-09-08', NULL, '', '', NULL),
	(14, 434, '334', '', '', '', '344', 1, 0, '', '2014-09-08', NULL, '', '', NULL),
	(15, 3434, 'ffd', '', '', '', 'f234', 1, 0, '', '2014-09-08', NULL, '', '', NULL);
/*!40000 ALTER TABLE `tbl_books` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_bookuse
DROP TABLE IF EXISTS `tbl_bookuse`;
CREATE TABLE IF NOT EXISTS `tbl_bookuse` (
  `uboo_id` int(11) NOT NULL AUTO_INCREMENT,
  `uboo_number` int(11) DEFAULT NULL,
  `uboo_cdate` date DEFAULT NULL,
  `uboo_mdate` date DEFAULT NULL,
  `uboo_status` bit(1) DEFAULT NULL,
  `uboo_cuse_id` int(11) DEFAULT NULL,
  `uboo_tboo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`uboo_id`),
  KEY `fk_tbl_bookuse_tbl_user1` (`uboo_cuse_id`),
  KEY `fk_tbl_bookuse_tbl_type_of_book1` (`uboo_tboo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_bookuse: ~14 rows (approximately)
/*!40000 ALTER TABLE `tbl_bookuse` DISABLE KEYS */;
INSERT INTO `tbl_bookuse` (`uboo_id`, `uboo_number`, `uboo_cdate`, `uboo_mdate`, `uboo_status`, `uboo_cuse_id`, `uboo_tboo_id`) VALUES
	(1, 222, '2014-09-10', NULL, '', 1, 1),
	(2, 200, '2014-09-10', NULL, '', 1, 1),
	(3, 200, '2014-09-10', NULL, '', 1, 2),
	(4, 40, '2014-09-10', '2014-09-10', '', 1, 1),
	(5, 200, '2014-09-11', NULL, '', 1, 1),
	(6, 100, '2014-09-11', NULL, '', 1, 1),
	(7, 100, '2014-09-12', NULL, '', 1, 1),
	(8, 100, '2014-09-12', NULL, '', 1, 2),
	(9, 100, '2014-09-13', NULL, '', 1, 1),
	(10, 200, '2014-09-10', NULL, '', 1, 1),
	(11, 100, '2014-09-10', NULL, '', 1, 1),
	(12, 100, '2014-09-10', NULL, '', 1, 1),
	(13, 40, '2014-09-10', NULL, '', 1, 1),
	(14, 40, '2014-09-10', NULL, '', 1, 1);
/*!40000 ALTER TABLE `tbl_bookuse` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_borrower
DROP TABLE IF EXISTS `tbl_borrower`;
CREATE TABLE IF NOT EXISTS `tbl_borrower` (
  `bor_id` int(11) NOT NULL,
  `bor_name` varchar(45) DEFAULT NULL,
  `bor_tel` varchar(45) DEFAULT NULL,
  `bor_address` varchar(100) DEFAULT NULL,
  `bor_email` varchar(45) DEFAULT NULL,
  `bor_status` varchar(45) DEFAULT NULL,
  `bor_card_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`bor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_borrower: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_borrower` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_borrower` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_borrowing
DROP TABLE IF EXISTS `tbl_borrowing`;
CREATE TABLE IF NOT EXISTS `tbl_borrowing` (
  `bor_id` int(11) NOT NULL AUTO_INCREMENT,
  `bor_use_id` int(11) DEFAULT NULL,
  `bor_boo_id` varchar(45) DEFAULT NULL,
  `bor_date` date DEFAULT NULL,
  `bor_return_date` date DEFAULT NULL,
  `bor_extend_date` date DEFAULT NULL,
  `bor_modified` date DEFAULT NULL,
  `bor_status` varchar(11) DEFAULT NULL,
  `bor_comment` varchar(100) DEFAULT NULL,
  `bor_bor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bor_id`),
  KEY `fk_tbl_borrowing_tbl_user1` (`bor_use_id`),
  KEY `fk_tbl_borrowing_tbl_borrower1` (`bor_bor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_borrowing: ~31 rows (approximately)
/*!40000 ALTER TABLE `tbl_borrowing` DISABLE KEYS */;
INSERT INTO `tbl_borrowing` (`bor_id`, `bor_use_id`, `bor_boo_id`, `bor_date`, `bor_return_date`, `bor_extend_date`, `bor_modified`, `bor_status`, `bor_comment`, `bor_bor_id`) VALUES
	(1, 1, '1', '2014-09-07', '2014-09-10', NULL, NULL, '0', '', 1),
	(2, 11, '1', '2014-09-07', '2014-09-25', NULL, '2014-09-07', '0', '', 16),
	(3, 11, '2', '2014-09-07', '2014-09-18', NULL, '2014-09-18', '1', '', 1),
	(4, 11, '2', '2014-09-07', '2014-09-07', NULL, '2014-09-18', '1', '', 1),
	(5, 11, '2', '2014-09-07', '2014-09-07', NULL, '2014-09-18', '1', '', 11),
	(6, 11, '2', '2014-09-07', '2014-09-07', NULL, '2014-09-18', '1', '', 11),
	(7, 11, '2', '2014-09-07', '0000-00-00', NULL, '2014-09-18', '1', '', 11),
	(8, 15, '1', '2014-09-07', '2014-09-03', NULL, '2014-09-18', '1', '', 1),
	(9, 1, '2', '2014-09-18', '2014-09-25', NULL, NULL, '1', '', 11),
	(10, 1, '2', '2014-09-18', '2014-09-26', NULL, NULL, '1', '', 11),
	(11, 11, '3', '2014-09-18', '2014-09-10', '2014-10-03', '2014-09-18', '1', '', 11),
	(12, 1, '3', '2014-09-18', '2014-09-25', NULL, NULL, '1', '', 11),
	(13, 1, '3', '2014-09-18', '2014-09-18', NULL, '2014-09-18', '1', '', 11),
	(14, 1, '3', '2014-09-18', '2014-09-18', NULL, '2014-09-18', '0', '', 11),
	(15, 11, '5', '2014-09-18', '2014-10-03', NULL, '2014-09-18', '1', '', 11),
	(16, 1, '3', '2014-09-18', '2014-09-18', NULL, '2014-09-18', '0', '', 11),
	(17, 11, '5', '2014-09-18', '2014-09-24', NULL, '2014-09-18', '2', 'fd', 11),
	(18, 1, '5', '2014-09-18', '2014-09-19', NULL, NULL, '2', '', 11),
	(19, 1, '5', '2014-09-18', '2014-09-19', NULL, NULL, '1', '', 15),
	(20, 1, '10', '2014-09-18', '2014-09-26', NULL, NULL, '1', '', 4),
	(21, 1, '7', '2014-09-18', '2014-09-25', NULL, NULL, '1', '', 15),
	(22, 1, '7', '2014-09-18', '2014-09-24', NULL, NULL, '1', '', 4),
	(23, 1, '7', '2014-09-18', '2014-09-26', NULL, NULL, '1', '', 4),
	(24, 1, '8', '2014-09-18', '2014-09-25', NULL, NULL, '1', '', 20),
	(25, 1, '11', '2014-09-18', '2014-09-26', NULL, '2014-09-18', '1', '', 21),
	(26, 1, '12', '2014-09-18', '2014-09-19', NULL, '2014-09-19', '0', '', 21),
	(27, 1, '13', '2014-09-18', '2014-09-19', NULL, '2014-09-19', '0', '', 22),
	(28, 1, '15', '2014-09-18', '2014-09-19', NULL, '2014-09-19', '0', '', 20),
	(29, 18, '14', '2014-09-18', '2014-09-19', NULL, '2014-09-19', '0', '', 22),
	(30, 1, NULL, '2014-09-18', '2014-09-10', NULL, NULL, '1', '', NULL),
	(31, 18, '13', '2014-09-19', '2014-09-25', NULL, NULL, '1', '', 20);
/*!40000 ALTER TABLE `tbl_borrowing` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_groups
DROP TABLE IF EXISTS `tbl_groups`;
CREATE TABLE IF NOT EXISTS `tbl_groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_status` bit(1) DEFAULT NULL,
  `gro_created` timestamp NULL DEFAULT NULL,
  `gro_modified` timestamp NULL DEFAULT NULL,
  `gro_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`gro_id`),
  KEY `index2` (`gro_id`,`gro_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_library.tbl_groups: 3 rows
/*!40000 ALTER TABLE `tbl_groups` DISABLE KEYS */;
INSERT INTO `tbl_groups` (`gro_id`, `gro_name`, `gro_status`, `gro_created`, `gro_modified`, `gro_description`) VALUES
	(1, 'Admin', '', '2014-08-27 14:27:37', NULL, ''),
	(2, 'Librarain', '', '2014-08-27 14:27:46', NULL, ''),
	(4, 'Member', '', '2014-09-07 01:37:01', NULL, NULL);
/*!40000 ALTER TABLE `tbl_groups` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_major
DROP TABLE IF EXISTS `tbl_major`;
CREATE TABLE IF NOT EXISTS `tbl_major` (
  `maj_id` int(11) NOT NULL,
  `maj_title` varchar(100) DEFAULT NULL,
  `maj_description` varchar(100) DEFAULT NULL,
  `maj_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`maj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_major: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_major` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_major` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_publisher
DROP TABLE IF EXISTS `tbl_publisher`;
CREATE TABLE IF NOT EXISTS `tbl_publisher` (
  `pub_id` int(11) NOT NULL,
  `pub_name` varchar(100) DEFAULT NULL,
  `pub_address` varchar(100) DEFAULT NULL,
  `pub_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_publisher: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_publisher` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_publisher` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_report
DROP TABLE IF EXISTS `tbl_report`;
CREATE TABLE IF NOT EXISTS `tbl_report` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_cdate` varchar(45) DEFAULT NULL,
  `rep_edate` date DEFAULT NULL,
  `rep_sdate` date DEFAULT NULL,
  `rep_status` bit(1) DEFAULT b'1',
  `rep_programs` longtext NOT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_report: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_report` DISABLE KEYS */;
INSERT INTO `tbl_report` (`rep_id`, `rep_cdate`, `rep_edate`, `rep_sdate`, `rep_status`, `rep_programs`) VALUES
	(2, NULL, '2014-09-16', '2014-09-04', '', '<p>fsdfd</p>'),
	(4, '2014-09-16 23:02:08', '2014-09-10', '2014-09-01', '', '<p><strong>Date</strong></p>\r\n<p><strong>Topics</strong></p>\r\n<p><strong>Participants</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>April 22<sup>nd</sup> 2014</p>\r\n<p>Earth Day</p>\r\n<p>36</p>\r\n<p>&nbsp;</p>\r\n<p>April 27<sup>th</sup> 2014</p>\r\n<p>Barrack Obama&rsquo;s speech</p>\r\n<p>23</p>\r\n<p>&nbsp;</p>\r\n<p>May 1<sup>st</sup> 2014</p>\r\n<p>Monthly Quiz</p>\r\n<p>24</p>\r\n<p>&nbsp;</p>\r\n<p>May 19<sup>th</sup> 2014</p>\r\n<p>Toefl preparation training</p>\r\n<p>42</p>\r\n<p>&nbsp;</p>\r\n<p>May 20<sup>th</sup> 2014</p>\r\n<p>Mock Toefl Test</p>\r\n<p>88</p>\r\n<p>&nbsp;</p>\r\n<p>May 25<sup>th</sup> 2014</p>\r\n<p>Soft Skills</p>\r\n<p>40</p>\r\n<p>&nbsp;</p>\r\n<p>June 05<sup>th</sup> 2014</p>\r\n<p>Wildlife Trafficking and Planting Trees</p>\r\n<p>96</p>\r\n<p>&nbsp;</p>\r\n<p>June 08<sup>th</sup> 2014</p>\r\n<p>TOEFL Club</p>\r\n<p>22</p>\r\n<p>&nbsp;</p>\r\n<p>June 16<sup>th</sup>-21<sup>st </sup>2014</p>\r\n<p>American Corner presentation</p>\r\n<p>1021</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Total</strong></p>\r\n<p><strong>1392</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>*** Monthly Quiz: Totally, There were 50 participants for two months and 14 of them did quizzes correctly.</p>\r\n<p>*** There are 22 students in the English Club every Sunday morning at 9-11am</p>\r\n<p>" &gt;</p>'),
	(5, '2014-09-16 23:37:16', '2014-09-24', '2014-09-01', '', '<p><strong>1-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>April:</strong></p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>April 22<sup>nd</sup> 2014</strong>: <strong>Earth Day</strong> celebration was presented by Shorn Ron, Deputy director of UME. There were 36 UME students to attend this event.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>May:</strong></p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>April 27<sup>th</sup> 2014</strong>: <strong>Barrack Obama&rsquo;s speech</strong> conducted by Nou Pheareak, UME English lecturer. There were 23 participants including 3 Sihanouk high school and 20 UME students.</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>May 1<sup>st</sup> 2014</strong>: <strong>Monthly Quiz</strong> led by Sath Boramy, AC Coordinator. This program will be done every month. There were 24 participants and 9 of them were doing correctly.</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>May 19<sup>th</sup> 2014</strong>: <strong>Toefl preparation training</strong> presented by Andrew Tweed, English Language Fellows. There were<strong>​​​​</strong> 42 participants, including 27 UME,4 Sihanouk high school, 2 Western students , 8 RTTC and 1 PVA students.</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>May 20<sup>th</sup> 2014: Mock Toefl Test</strong> conducted by English Language Fellows. There were 88 participants including 4 CSUK, 1 Deydos hight school, 1 PVA, 9 RTTC, 8 Sihanouk, 3 WU, 57 UME students.</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>May 25<sup>th</sup> 2014: Soft Skills</strong> brought by Fussac team<strong>. </strong>There were 40 participants including 13 high school and 27 UME students.</p>\r\n<p><strong>3-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong><strong>June:</strong></p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>June 05<sup>th</sup> 2014</strong>: Wildlife Trafficking and Planting Trees were conducted by Sam H. Casella, Civil Affairs Planner. There were 96 participants including 2 Preh Sihanuk high school and 94 UME students.</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>June 08<sup>th</sup> 2014</strong>: TOEFL Club taught by Michael Haak and Vicki Chan, Peace Corps. There were<strong>​​​​</strong> 22 students, including 12 UME, 2 Sihanouk high school, 2 Western , 1 RTTC, 3 PTTC, 2 KNOA students.</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>June 16<sup>th</sup>-21<sup>st </sup>2014: </strong>American Corner Presentation presented by American Corner Coordinator, at 10 high schools around Kampong Cham and Tboung Khmum province with UME teams. There were 1021 students.</p>\r\n<p>-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Monthly Quiz: </strong>There were 26 participants and 5 of them were doing correctly.</p>\r\n<p><strong>Program Statistics</strong></p>');
/*!40000 ALTER TABLE `tbl_report` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_shelve
DROP TABLE IF EXISTS `tbl_shelve`;
CREATE TABLE IF NOT EXISTS `tbl_shelve` (
  `she_id` int(11) NOT NULL,
  `she_description` varchar(100) DEFAULT NULL,
  `she_status` bit(1) DEFAULT NULL,
  `she_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`she_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_shelve: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_shelve` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_shelve` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_type_of_book
DROP TABLE IF EXISTS `tbl_type_of_book`;
CREATE TABLE IF NOT EXISTS `tbl_type_of_book` (
  `tboo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tboo_title` varchar(45) DEFAULT NULL,
  `tboo_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`tboo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_type_of_book: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_type_of_book` DISABLE KEYS */;
INSERT INTO `tbl_type_of_book` (`tboo_id`, `tboo_title`, `tboo_status`) VALUES
	(1, 'Book', ''),
	(2, 'Mazagin', ''),
	(3, 'Other..', '');
/*!40000 ALTER TABLE `tbl_type_of_book` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_type_visitor
DROP TABLE IF EXISTS `tbl_type_visitor`;
CREATE TABLE IF NOT EXISTS `tbl_type_visitor` (
  `tvis_id` int(11) NOT NULL AUTO_INCREMENT,
  `tvis_title` varchar(45) DEFAULT NULL,
  `tvis_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`tvis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_type_visitor: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_type_visitor` DISABLE KEYS */;
INSERT INTO `tbl_type_visitor` (`tvis_id`, `tvis_title`, `tvis_status`) VALUES
	(1, 'UME', ''),
	(2, 'Public', '');
/*!40000 ALTER TABLE `tbl_type_visitor` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_users
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(45) DEFAULT NULL,
  `use_gro_id` int(11) DEFAULT NULL,
  `use_status` bit(1) DEFAULT NULL,
  `use_created` timestamp NULL DEFAULT NULL,
  `use_modified` timestamp NULL DEFAULT NULL,
  `use_pass` varchar(200) DEFAULT NULL,
  `use_photo` varchar(100) DEFAULT NULL,
  `use_tel` varchar(15) DEFAULT NULL,
  `use_email` varchar(45) DEFAULT NULL,
  `use_address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`use_id`),
  KEY `fk_tbl_user_tbl_user_rule1` (`use_gro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_users: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`use_id`, `use_name`, `use_gro_id`, `use_status`, `use_created`, `use_modified`, `use_pass`, `use_photo`, `use_tel`, `use_email`, `use_address`) VALUES
	(1, 'admin', 1, '', '2014-09-06 23:03:32', '2014-09-17 16:55:31', '27d07fdfd3b16c6aae9de6502546279080596cde', NULL, '085943344', 'admin@gmail.com', 'Phnom Penh'),
	(4, 'Chatha', 4, '', '2014-09-07 00:27:34', '2014-09-17 22:03:30', '1234567', NULL, '0123949495', 'chantha@gmail.com', 'Phnom Penh'),
	(11, 'administrator', 1, '', '2014-09-07 00:51:33', NULL, '27d07fdfd3b16c6aae9de6502546279080596cde', NULL, '085943344', 'adminw@gmail.com', ''),
	(23, 'sath.boramy', 1, '', '2014-09-26 11:07:45', '2014-09-26 11:34:21', '1234567', NULL, '', 'sath.boramy@ume-kpc.edu.kh', 'KPC'),
	(24, 'sath.boramy', 1, '', NULL, NULL, 'aa36005b6031b9ea4b812b4244da4c2ba5e29011', NULL, '', 'sath.boramy@ume-kpc.edu.kh', 'KPC');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_user_group
DROP TABLE IF EXISTS `tbl_user_group`;
CREATE TABLE IF NOT EXISTS `tbl_user_group` (
  `use_gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_users_use_id` int(11) NOT NULL,
  `tbl_groups_gro_id` int(11) NOT NULL,
  PRIMARY KEY (`use_gro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_library.tbl_user_group: 4 rows
/*!40000 ALTER TABLE `tbl_user_group` DISABLE KEYS */;
INSERT INTO `tbl_user_group` (`use_gro_id`, `tbl_users_use_id`, `tbl_groups_gro_id`) VALUES
	(1, 3, 2),
	(2, 4, 1),
	(3, 0, 1),
	(4, 0, 2);
/*!40000 ALTER TABLE `tbl_user_group` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_user_rule
DROP TABLE IF EXISTS `tbl_user_rule`;
CREATE TABLE IF NOT EXISTS `tbl_user_rule` (
  `rul_id` int(11) NOT NULL,
  `rul_titile` varchar(45) DEFAULT NULL,
  `rul_description` varchar(45) DEFAULT NULL,
  `rul_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`rul_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_user_rule: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_user_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_rule` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_visitor
DROP TABLE IF EXISTS `tbl_visitor`;
CREATE TABLE IF NOT EXISTS `tbl_visitor` (
  `vis_id` int(11) NOT NULL AUTO_INCREMENT,
  `vis_name` varchar(45) DEFAULT NULL,
  `vis_sex` char(1) DEFAULT NULL,
  `vis_from` varchar(45) DEFAULT NULL,
  `vis_status` bit(1) DEFAULT b'1',
  `vis_position` varchar(45) DEFAULT NULL,
  `vis_year_of_study` int(11) DEFAULT NULL,
  `vis_pvis_id` int(11) DEFAULT NULL,
  `vis_use_id` int(11) DEFAULT NULL,
  `vis_cdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `vis_tvis_id` int(11) DEFAULT NULL,
  `vis_mdate` timestamp NULL DEFAULT NULL,
  `vis_email` varchar(50) DEFAULT NULL,
  `vis_tel` varchar(15) DEFAULT NULL,
  `vis_comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vis_id`),
  KEY `fk_tbl_visitor_tbl_visit_purpose1` (`vis_pvis_id`),
  KEY `fk_tbl_visitor_tbl_type_visitor1` (`vis_tvis_id`),
  KEY `fk_tbl_visitor_tbl_user1` (`vis_use_id`),
  CONSTRAINT `fk_tbl_visitor_tbl_type_visitor1` FOREIGN KEY (`vis_tvis_id`) REFERENCES `tbl_type_visitor` (`tvis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_visitor_tbl_user1` FOREIGN KEY (`vis_use_id`) REFERENCES `tbl_users` (`use_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_visitor_tbl_visit_purpose1` FOREIGN KEY (`vis_pvis_id`) REFERENCES `tbl_visit_purpose` (`pvis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_visitor: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_visitor` DISABLE KEYS */;
INSERT INTO `tbl_visitor` (`vis_id`, `vis_name`, `vis_sex`, `vis_from`, `vis_status`, `vis_position`, `vis_year_of_study`, `vis_pvis_id`, `vis_use_id`, `vis_cdate`, `vis_tvis_id`, `vis_mdate`, `vis_email`, `vis_tel`, `vis_comment`) VALUES
	(2, 'Borin', 'm', '', '', '', 1, 1, 1, '2014-09-11 00:00:00', 1, '2014-09-15 01:19:21', '', '', ''),
	(3, 'Chantha', 'm', 'Phnom Penh', '', 'Student', 1, 3, 1, '2014-09-11 00:00:00', 1, '2014-09-12 02:40:46', NULL, NULL, NULL),
	(4, 'Bora', 'm', NULL, '', NULL, NULL, 3, 1, '2014-09-11 00:00:00', 1, NULL, NULL, NULL, NULL),
	(5, 'Vicheka', 'm', NULL, '', NULL, NULL, 2, 1, '2014-09-11 00:00:00', 2, NULL, NULL, NULL, NULL),
	(6, 'Ratha', 'f', NULL, '', NULL, NULL, 2, 1, '2014-09-11 00:00:00', 1, NULL, NULL, NULL, NULL),
	(7, 'Vannac', 'm', '', '', '', 1, 1, 1, '2014-09-11 00:00:00', 1, '2014-09-12 02:40:19', NULL, NULL, NULL),
	(8, 'eeeeeeeeeee', 'm', '', '', '', 1, 1, 1, '2014-09-11 00:00:00', 1, '2014-09-12 03:08:32', '', '', 'sdsd'),
	(41, 'fsdf', 'f', '', '', '', 1, 2, 1, '2014-09-12 03:35:48', 1, '2014-09-12 03:37:01', '', '', '');
/*!40000 ALTER TABLE `tbl_visitor` ENABLE KEYS */;


# Dumping structure for table ume_library.tbl_visit_purpose
DROP TABLE IF EXISTS `tbl_visit_purpose`;
CREATE TABLE IF NOT EXISTS `tbl_visit_purpose` (
  `pvis_id` int(11) NOT NULL AUTO_INCREMENT,
  `pvis_name` varchar(45) DEFAULT NULL,
  `pvis_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`pvis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

# Dumping data for table ume_library.tbl_visit_purpose: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_visit_purpose` DISABLE KEYS */;
INSERT INTO `tbl_visit_purpose` (`pvis_id`, `pvis_name`, `pvis_status`) VALUES
	(1, 'read book', ''),
	(2, 'warch TV', ''),
	(3, 'use internet', ''),
	(4, 'other', '');
/*!40000 ALTER TABLE `tbl_visit_purpose` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
