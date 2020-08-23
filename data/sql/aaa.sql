/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.53 : Database - aaa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aaa` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `aaa`;

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '小说名称',
  `url` varchar(100) NOT NULL COMMENT '小说章节列表目录页面',
  `type` int(11) DEFAULT '0' COMMENT '方式',
  `domain` varchar(100) DEFAULT NULL COMMENT '域名前缀',
  `desc` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` int(1) DEFAULT '0' COMMENT '0 需要处理 1 正在爬取 2还是需要爬取 3爬取结束',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `book_content` */

DROP TABLE IF EXISTS `book_content`;

CREATE TABLE `book_content` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `book_list_id` bigint(20) DEFAULT NULL COMMENT '所属的小说id',
  `name` varchar(50) DEFAULT NULL COMMENT '章节名称',
  `url` varchar(255) DEFAULT NULL COMMENT '爬取路径',
  `data` mediumtext COMMENT '小说章节详情内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1140 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `book_list` */

DROP TABLE IF EXISTS `book_list`;

CREATE TABLE `book_list` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `book_id` bigint(20) DEFAULT NULL COMMENT '所属的小说id',
  `name` varchar(50) DEFAULT NULL COMMENT '章节名称',
  `url` varchar(100) DEFAULT NULL COMMENT '小说章节链接页面',
  `sort` int(11) DEFAULT '0' COMMENT '默认排序 | 爬虫按顺序排序 可人工调整',
  `read` int(1) DEFAULT '1' COMMENT '是否已经爬取 1 未爬取 2已经爬取',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1140 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `class` */

DROP TABLE IF EXISTS `class`;

CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `sex` char(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
