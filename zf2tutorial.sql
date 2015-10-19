-- MySQL dump 10.13  Distrib 5.6.26, for Win32 (x86)
--
-- Host: localhost    Database: zf2tutorial
-- ------------------------------------------------------
-- Server version	5.6.26

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
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `album`
--

LOCK TABLES `album` WRITE;
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
INSERT INTO `album` VALUES (1,'The  Military  Wives','In  My  Dreams'),(2,'Adele','21'),(3,'Bruce  Springsteen','Wrecking Ball (Deluxe)'),(4,'Lana  Del  Rey','Born  To  Die'),(5,'Gotye','Making  Mirrors');
/*!40000 ALTER TABLE `album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `deptCode` varchar(5) NOT NULL,
  `deptName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `deptOffice` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `deptPhone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`deptCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES ('D01','Software Engineer','201','111-222'),('D02','Financial','202','111-333'),('D03','Human Resource','203','222-333'),('D04','Admin','204','111-111');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructor` (
  `insSSN` varchar(9) NOT NULL,
  `insName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `insBirthdate` varchar(20) DEFAULT NULL,
  `insSex` varchar(10) DEFAULT NULL,
  `deptCode` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`insSSN`),
  KEY `fk_instructor_department_idx` (`deptCode`),
  CONSTRAINT `fk_instructor_department` FOREIGN KEY (`deptCode`) REFERENCES `department` (`deptCode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructor`
--

LOCK TABLES `instructor` WRITE;
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
INSERT INTO `instructor` VALUES ('I001','Lam Huu Khanh Phuong','01/02/1980','Male','D01'),('I002','Kieu Trong Khanh','22/06/1970','Male','D01'),('I003','Nguyen Thi Trang','06/04/1977','Female','D02'),('I004','Tran Anh Tuan','15/10/1963','Male','D02'),('I005','Nguyen Thi Hong Phuong','04/05/1963','Female','D03'),('I006','Nguyen Dang Khoa','16/07/1966','Male','D03'),('I007','Pham Phu Phi','01/09/1970','Male','D04'),('I008','Tran Tien Dat','07/04/1960','Male','D04');
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `stuCode` varchar(7) NOT NULL,
  `stuSSN` varchar(10) DEFAULT NULL,
  `stuName` varchar(50) DEFAULT NULL,
  `stuBirthdate` varchar(20) DEFAULT NULL,
  `stuSex` varchar(10) DEFAULT NULL,
  `stuAddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`stuCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('SE001','001','Vo Hoang Thong','03/06/1993','Male','Ly Thuong Kiet, Go Vap, '),('SE0010','0010','Banh Chi Hong','05/09/1993','Male','Quan 6'),('SE002','002','Nguyen Thanh Phong','19/03/1993','Male','Go Vap'),('SE003','003','Huynh Tran Minh Nhut','08/09/1993','Male','Tay Ninh'),('SE004','004','Chau Chieu Nguyen','11/02/1993','Male','Quan 12'),('SE005','005','Ta Vinh Loc','15/11/1993','Male','Hoc Mon'),('SE006','006','Nguyen Kieu Hanh Ha','07/12/1993','Female','Quan 5'),('SE007','007','Nguyen Ngoc Tuong Vy','25/10/1993','Female','Binh Thanh'),('SE008','008','Duong Man Tiep','11/04/1993','Male','Tay Ninh'),('SE009','009','Vo Duy Thuc','17/08/1993','Male','Ben Tre');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `subCode` varchar(10) NOT NULL,
  `subName` varchar(50) DEFAULT NULL,
  `subCredit` int(11) DEFAULT NULL,
  `deptCode` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`subCode`),
  KEY `fk_subject_department_idx` (`deptCode`),
  CONSTRAINT `fk_subject_department` FOREIGN KEY (`deptCode`) REFERENCES `department` (`deptCode`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES ('S001','Core Java',3,'D01'),('S002','Advance Java',3,'D01'),('S003','Computer Networking',3,'D01'),('S004','Advance Database',3,'D01'),('S005','Data Structure & Algorithm',3,'D01'),('S006','Macroeconomics',3,'D02'),('S007','Microeconomics',3,'D02'),('S008','Principles of Accounting',3,'D02');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `pass_word` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'thong','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-19 16:55:05
