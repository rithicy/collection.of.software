/*
SQLyog Ultimate v8.8 
MySQL - 5.5.8-log : Database - attendance
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`attendance` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `attendance`;

/*Table structure for table `attendance` */

DROP TABLE IF EXISTS `attendance`;

CREATE TABLE `attendance` (
  `AttendanceID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassID` int(11) NOT NULL,
  `SessionID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Absent` tinyint(1) NOT NULL,
  `AttendanceDate` date NOT NULL,
  `AttendanceTime` time NOT NULL,
  `isLate` tinyint(1) NOT NULL,
  `Remark` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`AttendanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `attendance` */

/*Table structure for table `classes` */

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `ClassID` int(11) NOT NULL AUTO_INCREMENT,
  `Class` varchar(50) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  PRIMARY KEY (`ClassID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `classes` */

insert  into `classes`(`ClassID`,`Class`,`DepartmentID`) values (1,'C Programming Language',1),(2,'C++ Programming Language',1),(4,'Visual Basic for Application',1);

/*Table structure for table `classesdetail` */

DROP TABLE IF EXISTS `classesdetail`;

CREATE TABLE `classesdetail` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SessionID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `classesdetail` */

insert  into `classesdetail`(`ID`,`SessionID`,`ClassID`) values (1,1,2),(2,1,1);

/*Table structure for table `departments` */

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `DepartmentID` int(11) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(50) NOT NULL,
  PRIMARY KEY (`DepartmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `departments` */

insert  into `departments`(`DepartmentID`,`DepartmentName`) values (1,'Computer Science Engineering');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `SessionID` int(11) NOT NULL AUTO_INCREMENT,
  `TimeStart` time NOT NULL,
  `TimeEnd` time NOT NULL,
  PRIMARY KEY (`SessionID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `sessions` */

insert  into `sessions`(`SessionID`,`TimeStart`,`TimeEnd`) values (1,'07:30:00','09:00:00');

/*Table structure for table `students` */

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL AUTO_INCREMENT,
  `StudentName` varchar(50) NOT NULL,
  `Sex` varchar(1) NOT NULL,
  `BirthDate` date NOT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `DepartmentID` int(11) NOT NULL,
  PRIMARY KEY (`StudentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `students` */

insert  into `students`(`StudentID`,`StudentName`,`Sex`,`BirthDate`,`PhoneNumber`,`Address`,`DepartmentID`) values (1,'Rithea','M','1998-01-07','086336023','Kampong Thom',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
