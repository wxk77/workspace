/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.5.20 : Database - h5
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`h5` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `h5`;

/*Table structure for table `special` */

DROP TABLE IF EXISTS `special`;

CREATE TABLE `special` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `theme` int(11) DEFAULT NULL,
  `title` varchar(200) NOT NULL COMMENT '专题页面标题',
  `share_title` varchar(200) NOT NULL COMMENT '专题分享标题',
  `share_link` varchar(200) NOT NULL COMMENT '专题分享链接',
  `share_desc` varchar(200) NOT NULL COMMENT '专题分享描述',
  `share_image` varchar(200) NOT NULL COMMENT '专题分享图片地址',
  `username` varchar(200) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `special` */

insert  into `special`(`id`,`theme`,`title`,`share_title`,`share_link`,`share_desc`,`share_image`,`username`,`create_time`,`update_time`) values (2,1,'专题01','分享专题01','http://www.html5.local/special/preview/1','分享描述01','http://img.mc.cc/Img/mall/20160819/20160819-135820-682.jpg','admin','2016-08-19 13:58:12','2016-08-19 13:58:12');

/*Table structure for table `special_datas` */

DROP TABLE IF EXISTS `special_datas`;

CREATE TABLE `special_datas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `special_id` int(11) DEFAULT NULL COMMENT '专题ID',
  `type` tinyint(11) DEFAULT NULL COMMENT '1.header 2.content',
  `data` text COMMENT 'JSON数据',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `special_datas` */

insert  into `special_datas`(`id`,`special_id`,`type`,`data`,`create_time`,`update_time`) values (3,2,1,'{\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-135821-473.jpg\"}','2016-08-19 13:58:12','2016-08-19 13:58:12'),(4,2,2,'{\"series\":{\"name\":\"陶瓷系列\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-135821-714.jpg\"},\"brand\":{\"name\":\"TOTO卫浴\",\"describe\":\"荣获北京消费协会第一名荣获北京消费协会第一名荣获北京消费协会第一名荣获北京消费协会第一名\"},\"product\":[{\"number\":\"01\",\"version\":\"产品型号01\",\"describe\":\"世人皆知羊脂好，岂知黄玉更难找！\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-135822-632.jpg\"},{\"number\":\"02\",\"version\":\"产品型号02\",\"describe\":\"世人皆知羊脂好，岂知黄玉更难找！\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-135822-777.jpg\"}]}','2016-08-19 13:58:12','2016-08-19 13:58:12'),(5,2,2,'{\"series\":{\"name\":\"地板系列\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-135904-813.jpg\"},\"brand\":{\"name\":\"TOTO卫浴\",\"describe\":\"荣获北京消费协会第一名荣获北京消费协会第一名荣获北京消费协会第一名荣获北京消费协会第一名\"},\"product\":[{\"number\":\"01\",\"version\":\"产品型号01\",\"describe\":\"世人皆知羊脂好，岂知黄玉更难找！\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-135904-557.jpg\"},{\"number\":\"02\",\"version\":\"产品型号02\",\"describe\":\"世人皆知羊脂好，岂知黄玉更难找！\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-135904-651.jpg\"}]}','2016-08-19 13:58:54','2016-08-19 13:58:54'),(6,2,2,'{\"series\":{\"name\":\"灯饰照明系列\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-140821-949.jpg\"},\"brand\":{\"name\":\"TOTO卫浴\",\"describe\":\"荣获北京消费协会第一名荣获北京消费协会第一名荣获北京消费协会第一名荣获北京消费协会第一名\"},\"product\":[{\"number\":\"03\",\"version\":\"产品型号03\",\"describe\":\"世人皆知羊脂好，岂知黄玉更难找！\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-140821-163.jpg\"},{\"number\":\"04\",\"version\":\"产品型号04\",\"describe\":\"世人皆知羊脂好，岂知黄玉更难找！\",\"image\":\"http://img.mc.cc/Img/mall/20160819/20160819-140822-529.jpg\"}]}','2016-08-19 14:08:11','2016-08-19 14:08:11');

/*Table structure for table `theme` */

DROP TABLE IF EXISTS `theme`;

CREATE TABLE `theme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) DEFAULT NULL COMMENT '昵称',
  `desc` varchar(255) DEFAULT NULL COMMENT '主题概要',
  `demo_html` char(100) DEFAULT NULL COMMENT '静态样本名',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `theme` */

insert  into `theme`(`id`,`alias`,`desc`,`demo_html`) values (1,'001','simple','H5_01'),(2,'002','simple','H5_02'),(3,'003','simple','H5_03'),(4,'004','simple','H5_04'),(5,'005','simple','H5_05'),(6,'006','simple','H5_06'),(7,'007','simple','H5_07'),(8,'008','simple','H5_08'),(9,'009','simple','H5_09');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`) values (1,'amdmin','21232f297a57a5a743894a0e4a801fc3'),(2,'admin','21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
