-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 21, 2021 at 02:44 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `gender`, `status`) VALUES
(1, 'Erex', 'Cabalquinto', 0, 1),
(12, 'Juan', 'Dela Cruz', 0, 1),
(11, 'Mike', 'Enriquez', 0, 1),
(10, 'Shane', 'Ponce', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE IF NOT EXISTS `invoice_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `o_tax` varchar(100) NOT NULL,
  `grand_total` varchar(100) NOT NULL,
  `employee_id` tinyint(4) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `customer_name`, `date`, `name`, `rate`, `quantity`, `tax`, `amount`, `sub_total`, `o_tax`, `grand_total`, `employee_id`, `status`) VALUES
(1, 'General Customer', '2021-05-01', 'item,Item', '100,100', '1,10', '1,1', '101.00,1010.00', '1111.00', '111.10', '1222.10', 1, '0'),
(2, 'General Customer', '2020-01-02', 'Item', '100', '1', '1', '101.00', '101.00', '10.10', '111.10', 1, '1'),
(3, 'General Customer', '2021-06-01', 'Apple', '10', '10', '0', '100.00', '100.00', '10.00', '110.00', 1, '0'),
(4, 'General Customer', '2021-07-21', 'Apple,Apple', '10,10', '10,20', '0,0', '100.00,200.00', '300.00', '30.00', '330.00', 1, '1'),
(5, 'General Customer', '2021-07-21', 'Apple', '10', '100', '0', '1000.00', '1000.00', '100.00', '1100.00', 1, '1'),
(6, 'General Customer', '2021-07-21', 'Orange', '10', '10', '1', '101.00', '101.00', '10.10', '111.10', 1, '1'),
(7, 'General Customer', '2021-07-21', 'Banana Phone Y10,Apple Iphone XS', '3000,5000', '10,5', '10,10', '33000.00,27500.00', '60500.00', '6050.00', '66550.00', 1, '1'),
(8, 'General Customer', '2021-07-21', 'Apple Iphone XS,Samsung Galaxy ', '6000,4800', '5,2', '15,15', '34500.00,11040.00', '45540.00', '4554.00', '50094.00', 10, '1');

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

DROP TABLE IF EXISTS `item_details`;
CREATE TABLE IF NOT EXISTS `item_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`id`, `item_name`, `rate`, `tax`, `date`, `status`) VALUES
(1, 'Apple Iphone XS', '6000', '15', '21-07-2021', 1),
(2, 'Samsung Galaxy ', '4800', '15', '21-07-2021', 1),
(3, 'Banana Phone Y10', '3000', '10', '21-07-2021', 1),
(4, 'Cherry Mobile Phone CF1', '2000', '5', '21-07-2021', 1),
(5, 'Dell XYZ T112', '3500', '7', '21-07-2021', 1),
(6, 'Fone Phone M2', '1500', '2', '21-07-2021', 1),
(7, 'Erex Mobile Ex101', '1200', '1', '21-07-2021', 1),
(8, 'LG Mobile Phone', '4500', '5', '21-07-2021', 1),
(12, 'sss', '12', '12', '21-07-2021', 0),
(13, 'sssss', '10', '10', '21-07-2021', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

DROP TABLE IF EXISTS `user_accounts`;
CREATE TABLE IF NOT EXISTS `user_accounts` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `last_login_date` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `fk_employees` (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`uid`, `employee_id`, `user_name`, `password`, `salt`, `user_type`, `status`, `last_login_date`) VALUES
(1, 1, 'ecabalquinto', '76e4c570891846cc78c5a89ba523675947e25044', 'bdf6f', '0', 1, '2021-07-21 14:07:08'),
(8, 10, 'shane', '7d44309abd372a4928fc7ca23f4aed30409a1908', 'b1e39', '0', 1, '2021-07-21 14:08:46'),
(9, 11, 'juan', '2dd958605b257cd793e50766c296c6beebeb6f99', '58424', '0', 1, '2021-07-21 14:39:32'),
(10, 12, 'jdelacruz', '082d305c3e40e92f3fd575907c8c2c414989dec9', 'eb45b', '0', 1, '2021-07-21 14:41:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
