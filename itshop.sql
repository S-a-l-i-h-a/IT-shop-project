/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 8.0.27 : Database - itshop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`itshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `itshop`;

/*Table structure for table `Customers` */

DROP TABLE IF EXISTS `Customers`;

CREATE TABLE `Customers` (
  `id` int NOT NULL,
  `customer_name` varchar(2048) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `customer_surname` varchar(2048) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `customer_email` varchar(2048) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `customer_origin` varchar(2048) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `customer_password` varchar(2048) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

/*Data for the table `Customers` */

insert  into `Customers`(`id`,`customer_name`,`customer_surname`,`customer_email`,`customer_origin`,`customer_password`) values 
(1,'Merjema ','Mujiccc','mujic@gmail.com','Sarajevoooooo',NULL);

/*Table structure for table `Products` */

DROP TABLE IF EXISTS `Products`;

CREATE TABLE `Products` (
  `id` int NOT NULL,
  `product_name` varchar(2048) DEFAULT NULL,
  `product_type` varchar(2048) DEFAULT NULL,
  `product_price` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `Products` */

insert  into `Products`(`id`,`product_name`,`product_type`,`product_price`) values 
(1,'Laptop','Dell',500),
(2,'Laptop','HP',300);

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `employee_name` varchar(2048) DEFAULT NULL,
  `employee_surname` varchar(2048) DEFAULT NULL,
  `employee_gender` varchar(2048) DEFAULT NULL,
  `employee_email` varchar(2048) DEFAULT NULL,
  `employee_address` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employees` */

insert  into `employees`(`id`,`employee_name`,`employee_surname`,`employee_gender`,`employee_email`,`employee_address`) values 
(1,'Ermina','Sinanovic','Z','ermina@gmail.com','Butmirska cesta bb'),
(2,'Kanita','Perenda','Z','kanita@gmail.com','Stupska 11b'),
(3,'Omer','Tokic','M','omer1@gmail.com','Alifakovac 122');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
