-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.10-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for garage
DROP DATABASE IF EXISTS `garage`;
CREATE DATABASE IF NOT EXISTS `garage` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `garage`;

-- Dumping structure for table garage.booking
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `id_mechanic` int(11) NOT NULL DEFAULT 1,
  `id_service` int(11) NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.booking: ~15 rows (approximately)
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` (`id`, `id_user`, `id_vehicle`, `id_status`, `id_mechanic`, `id_service`, `date_in`, `date_out`) VALUES
	(1, 1, 1, 3, 4, 2, '2020-02-01', '2020-02-02'),
	(2, 1, 1, 2, 2, 1, '2020-02-01', '2020-02-16'),
	(3, 9, 0, 1, 1, 0, '2020-02-04', NULL),
	(4, 9, 0, 1, 1, 0, '2020-02-04', NULL),
	(5, 9, 2, 5, 1, 2, '2020-02-04', NULL),
	(16, 0, 0, 1, 1, 3, '2020-02-06', NULL),
	(17, 0, 0, 1, 1, 1, '2020-02-07', NULL),
	(19, 2, 1, 1, 1, 3, '2020-02-05', NULL),
	(20, 0, 0, 1, 1, 0, '2020-02-07', NULL),
	(21, 0, 0, 1, 1, 0, '2020-02-08', NULL),
	(22, 0, 0, 1, 1, 0, '2020-02-06', NULL),
	(23, 0, 0, 1, 1, 0, '2020-02-07', NULL),
	(24, 3, 1, 1, 3, 1, '2020-02-05', NULL),
	(25, 3, 1, 1, 1, 1, '2020-02-05', NULL),
	(26, 0, 0, 1, 1, 0, '2020-02-08', NULL),
	(27, 0, 0, 1, 1, 1, '2020-02-08', NULL),
	(28, 0, 0, 1, 1, 2, '2020-02-08', NULL),
	(29, 0, 0, 1, 1, 2, '2020-02-07', NULL),
	(30, 0, 0, 1, 1, 2, '2020-02-06', NULL),
	(31, 7, 2, 1, 1, 2, '2020-02-05', NULL),
	(32, 0, 0, 1, 1, 3, '2020-02-08', NULL),
	(33, 0, 0, 1, 1, 3, '2020-02-06', NULL),
	(34, 0, 0, 1, 1, 3, '2020-02-06', NULL),
	(35, 0, 0, 1, 1, 2, '2020-02-06', NULL),
	(36, 0, 0, 1, 1, 1, '2020-02-05', NULL),
	(37, 0, 0, 1, 1, 3, '2020-02-07', NULL),
	(38, 5, 2, 1, 1, 4, '2020-02-06', NULL),
	(39, 8, 2, 1, 1, 2, '2020-02-08', NULL);
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;

-- Dumping structure for table garage.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.brand: ~7 rows (approximately)
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` (`id`, `brand`) VALUES
	(1, 'Skoda'),
	(2, 'Toyota'),
	(3, 'Hyundai'),
	(4, 'Opel'),
	(5, 'Nissan'),
	(6, 'testeBrand'),
	(7, 'Other'),
	(8, 'BMW');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;

-- Dumping structure for table garage.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_part` int(11) DEFAULT NULL,
  `id_booking` int(11) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.invoice: ~2 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `id_part`, `id_booking`, `price`) VALUES
	(1, 2, 1, 550),
	(3, 4, 2, 500);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table garage.mechanic
CREATE TABLE IF NOT EXISTS `mechanic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.mechanic: ~5 rows (approximately)
/*!40000 ALTER TABLE `mechanic` DISABLE KEYS */;
INSERT INTO `mechanic` (`id`, `name`) VALUES
	(1, 'none'),
	(2, 'Aoife '),
	(3, 'Caoimhe '),
	(4, 'Saoirse '),
	(5, 'Ciara ');
/*!40000 ALTER TABLE `mechanic` ENABLE KEYS */;

-- Dumping structure for table garage.model
CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_brand` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.model: ~33 rows (approximately)
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` (`id`, `id_brand`, `model`) VALUES
	(1, 1, 'Octavia'),
	(2, 1, 'Fabia'),
	(3, 1, 'Superb'),
	(4, 1, 'Roomster'),
	(5, 2, 'Century'),
	(6, 2, 'Crown'),
	(7, 2, 'Camry'),
	(8, 2, 'MIRAI'),
	(9, 3, 'Accent'),
	(10, 3, 'Elantra'),
	(11, 3, 'Sonata'),
	(12, 3, 'Ioniq'),
	(13, 4, 'Karl'),
	(14, 4, 'Chevette'),
	(15, 4, 'Corsa'),
	(16, 4, 'Tigra'),
	(17, 5, 'Patrol'),
	(18, 5, 'Skyline '),
	(19, 5, ' Caravan'),
	(20, 5, ' Pulsar'),
	(21, 2, 'testeToyota'),
	(22, 7, 'Other'),
	(23, 2, 'Aygo'),
	(24, 2, 'Yaris'),
	(25, 2, 'Corolla'),
	(26, 2, 'Prius'),
	(27, 2, 'Prius+'),
	(28, 2, 'camry'),
	(29, 2, 'C-HR'),
	(30, 2, 'RAV4'),
	(31, 2, 'Hilux'),
	(32, 2, 'Land Cruiser'),
	(33, 2, 'GT86'),
	(34, 2, 'Supra'),
	(35, 2, 'Proace');
/*!40000 ALTER TABLE `model` ENABLE KEYS */;

-- Dumping structure for table garage.review
CREATE TABLE IF NOT EXISTS `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.review: ~3 rows (approximately)
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` (`id`, `id_user`, `stars`, `title`, `review`) VALUES
	(1, 1, 5, 'Test Review', 'That\'s a test of review! thx!'),
	(2, 4, 3, 'ee', 'ok'),
	(3, 9, 5, 'Good service', 'thank u ger!'),
	(4, 11, 5, 'Very good!!', 'Thank you so much for the service with my car, they delivered it to me before the deadline. I recommend your work to everyone!');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;

-- Dumping structure for table garage.service
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.service: ~4 rows (approximately)
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` (`id`, `name`, `price`, `time`) VALUES
	(1, 'anual_service', 350, 2),
	(2, 'major_service', 500, 4),
	(3, 'repair_service', 150, 2),
	(4, 'major_repair_service', 300, 4);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;

-- Dumping structure for table garage.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.status: ~5 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `status`) VALUES
	(1, 'Booked'),
	(2, 'In Service'),
	(3, 'Fixed / Completed'),
	(4, 'Collected'),
	(5, 'Unrepairable');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table garage.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`) VALUES
	(1, 'Admin', '00000', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
	(2, 'teste1', '121212112', 'teste@teste.com.br', '698dc19d489c4e4db73e28a713eab07b'),
	(3, 'oi', '123', 'oi@oi.com', 'a01610228fe998f515a72dd730294d87'),
	(4, 'vic', '123', 'vic@vic.com', '202cb962ac59075b964b07152d234b70'),
	(5, 'abc', '1234', 'abc@abc', '900150983cd24fb0d6963f7d28e17f72'),
	(6, 'anna', '123', 'anna@anna.com', '202cb962ac59075b964b07152d234b70'),
	(7, 'anna', '22222222222', 'anna@aa.com', 'a70f9e38ff015afaa9ab0aacabee2e13'),
	(8, 'Test10', '101010', 'test10@hotmail.com', '6d071901727aec1ba6d8e2497ef5b709'),
	(9, 'felix', '11111', 'felix@felix.com', '202cb962ac59075b964b07152d234b70'),
	(10, 'maria', '121212', 'maria@maria.com', '202cb962ac59075b964b07152d234b70'),
	(11, 'dan', '4545', 'dan@dan.com', '81dc9bdb52d04dc20036dbd8313ed055');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table garage.user_vehicles
CREATE TABLE IF NOT EXISTS `user_vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_model` int(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'Car',
  `plate` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.user_vehicles: ~6 rows (approximately)
/*!40000 ALTER TABLE `user_vehicles` DISABLE KEYS */;
INSERT INTO `user_vehicles` (`id`, `id_user`, `id_brand`, `id_model`, `type`, `plate`) VALUES
	(1, 1, 3, 9, 'Car', 'TEST-PLATE'),
	(2, 1, 1, 2, 'Car', 'teste-2'),
	(3, 1, 1, 3, 'Car', 'teste3'),
	(4, 1, 2, 6, 'Car', 'test4'),
	(5, 4, 2, 6, 'Van', '1233'),
	(6, 5, 2, 6, 'Car', '12344'),
	(7, 9, 2, 27, 'Van', '1111'),
	(8, 10, 5, 17, 'Car', '1018'),
	(9, 11, 3, 11, 'Truck', '123'),
	(10, 9, 1, 1, 'Van', '4324324'),
	(11, 11, 5, 18, 'Van', '5678'),
	(12, 11, 7, 22, 'Car', '3456');
/*!40000 ALTER TABLE `user_vehicles` ENABLE KEYS */;

-- Dumping structure for table garage.vehicle_parts
CREATE TABLE IF NOT EXISTS `vehicle_parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table garage.vehicle_parts: ~38 rows (approximately)
/*!40000 ALTER TABLE `vehicle_parts` DISABLE KEYS */;
INSERT INTO `vehicle_parts` (`id`, `name`, `price`) VALUES
	(1, 'none', 0),
	(2, 'part1', 50),
	(3, 'part2', 100),
	(4, 'part3', 150),
	(5, 'part4', 200),
	(6, 'bumpers', 99),
	(7, 'mirrors', 17),
	(8, 'roof racks', 89),
	(9, 'seat belts', 22),
	(10, 'tow bars', 150),
	(11, 'brake pads', 19),
	(12, 'brake discs', 27),
	(13, 'brake shoes', 26),
	(14, 'brake drums', 46),
	(15, 'cables', 20),
	(16, 'clutch sensors / Switches', 38),
	(17, 'Air conditioning parts', 119),
	(18, 'heater blower', 26),
	(19, 'radiators caps / thermostats', 5),
	(20, 'radiator / heater / coolers', 39),
	(21, 'sensors / switches', 22),
	(22, 'water hoses', 19),
	(23, 'drive motors', 104),
	(24, 'regulators / relays / solenoids', 35),
	(25, 'starter motors', 46),
	(26, 'body and panel sensor / switches ', 49),
	(27, 'window regulators', 60),
	(28, 'belts / chains ', 23),
	(29, 'breather caps / hoses / valves', 68),
	(30, 'dampers / Idlers / Pulleys / Tensioners', 46),
	(31, 'engine gaskets / seals', 25),
	(32, 'timing belt kits', 15),
	(33, 'catalytic converters', 63),
	(34, 'exhausts parts', 55),
	(35, 'air ', 25),
	(36, 'cabin', 13),
	(37, 'fuel', 20),
	(38, 'oil', 40),
	(39, 'others', 42),
	(40, 'air flow meter', 55),
	(41, 'batteries', 38),
	(42, 'tyres', 33);
/*!40000 ALTER TABLE `vehicle_parts` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
