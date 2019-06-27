/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.7.21-log : Database - victorych
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`victorych` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `victorych`;

/*Table structure for table `about` */

DROP TABLE IF EXISTS `about`;

CREATE TABLE `about` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `mission_statement` longtext,
  `mission` longtext,
  `vision` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `branches` */

DROP TABLE IF EXISTS `branches`;

CREATE TABLE `branches` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `branchname` varchar(250) DEFAULT NULL,
  `description` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `donate` */

DROP TABLE IF EXISTS `donate`;

CREATE TABLE `donate` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `eventgallery` */

DROP TABLE IF EXISTS `eventgallery`;

CREATE TABLE `eventgallery` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `galleryid` varchar(256) DEFAULT NULL,
  `eventname` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `eventname` varchar(250) DEFAULT NULL,
  `eventdate` date DEFAULT NULL,
  `eventdateto` date DEFAULT NULL,
  `eventtime` time DEFAULT NULL,
  `eventvenue` varchar(256) DEFAULT NULL,
  `eventdescription` varchar(256) DEFAULT NULL,
  `eventid` varchar(256) DEFAULT NULL,
  `imagename` varchar(256) DEFAULT NULL,
  `imagelocation` varchar(256) DEFAULT NULL,
  `imagesize` varchar(250) DEFAULT NULL,
  `imagetype` varchar(256) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `galleryid` varchar(256) DEFAULT NULL,
  `imagename` varchar(256) DEFAULT NULL,
  `imagelocation` varchar(256) DEFAULT NULL,
  `imagesize` varchar(250) DEFAULT NULL,
  `imagetype` varchar(256) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Table structure for table `homeslider` */

DROP TABLE IF EXISTS `homeslider`;

CREATE TABLE `homeslider` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `text1` varchar(250) DEFAULT NULL,
  `text2` varchar(250) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `sliderid` varchar(256) DEFAULT NULL,
  `imagename` varchar(256) DEFAULT NULL,
  `imagelocation` varchar(256) DEFAULT NULL,
  `imagesize` varchar(250) DEFAULT NULL,
  `imagetype` varchar(256) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `overseer` */

DROP TABLE IF EXISTS `overseer`;

CREATE TABLE `overseer` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `message` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `pastors` */

DROP TABLE IF EXISTS `pastors`;

CREATE TABLE `pastors` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `pastorsname` varchar(250) DEFAULT NULL,
  `pastorsdescription` longtext,
  `pastorsid` varchar(256) DEFAULT NULL,
  `imagename` varchar(256) DEFAULT NULL,
  `imagelocation` varchar(256) DEFAULT NULL,
  `imagesize` varchar(250) DEFAULT NULL,
  `imagetype` varchar(256) DEFAULT NULL,
  `period` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `scriptures` */

DROP TABLE IF EXISTS `scriptures`;

CREATE TABLE `scriptures` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `bibleverse` varchar(250) DEFAULT NULL,
  `biblequote` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(256) DEFAULT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `usertype` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
