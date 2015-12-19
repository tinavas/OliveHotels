-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2015 at 10:42 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `olivehotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(20) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(500) NOT NULL,
  `album_image` varchar(500) NOT NULL,
  `album_display_order` int(20) NOT NULL,
  `hotel_master_id` int(20) NOT NULL,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_title`, `album_image`, `album_display_order`, `hotel_master_id`) VALUES
(11, 'Olive Eva', 'gallery-2.jpg', 1, 1),
(17, 'RESTAURANT', 'Olivia2.jpg', 2, 2),
(18, 'SPECIALITY RESTAURANT', 'Afghan.jpg', 2, 2),
(19, 'BANQUET', 'Athena.jpg', 3, 2),
(20, 'Rooms', 'Room.jpg', 4, 2),
(21, 'Swimming Pool ', 'Pool.jpg', 5, 2),
(22, 'GYM', 'IMG_7669.jpg', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_checkin` date NOT NULL,
  `date_checkout` date NOT NULL,
  `room_master_id` int(11) NOT NULL,
  `no_rooms` int(11) NOT NULL,
  `no_people` int(11) NOT NULL,
  `no_child` int(11) NOT NULL,
  `no_extra_bed` int(11) NOT NULL,
  `requirements` text NOT NULL,
  `total_rate` int(11) NOT NULL,
  `softbookid` varchar(500) NOT NULL,
  `transactionid` varchar(500) NOT NULL,
  `booking_status` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `hotel_master_id` int(20) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=216 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `date_checkin`, `date_checkout`, `room_master_id`, `no_rooms`, `no_people`, `no_child`, `no_extra_bed`, `requirements`, `total_rate`, `softbookid`, `transactionid`, `booking_status`, `payment_status`, `hotel_master_id`) VALUES
(38, '2015-04-20', '2015-04-21', 27, 1, 1, 0, 0, '', 2500, '', '', 0, 0, 1),
(39, '2015-04-20', '2015-04-29', 27, 1, 1, 1, 1, 'none', 31500, '', '', 0, 0, 1),
(40, '2015-07-29', '2015-07-30', 1, 1, 1, 1, 0, '', 4900, '', '', 0, 0, 2),
(41, '2015-07-29', '2015-07-30', 1, 1, 1, 1, 0, '', 9800, '', '', 0, 0, 2),
(42, '2015-07-29', '2015-07-30', 1, 1, 1, 1, 0, '', 4900, '', '', 0, 0, 2),
(46, '2015-08-12', '2015-08-14', 3, 1, 1, 1, 1, '', 15000, '', '', 0, 0, 2),
(47, '2015-08-12', '2015-08-14', 4, 2, 6, 2, 1, '', 60400, '', '', 0, 0, 2),
(48, '2015-08-23', '2015-08-29', 4, 3, 6, 3, 1, '', 282000, '', '', 0, 0, 2),
(49, '2015-07-29', '2015-07-30', 4, 1, 3, 1, 1, '', 21300, '', '', 0, 0, 2),
(50, '2015-08-06', '2015-08-07', 3, 1, 5, 2, 1, '', 15300, '', '', 0, 0, 2),
(51, '2015-08-08', '2015-08-09', 3, 1, 3, 1, 1, '', 15300, '', '', 0, 0, 2),
(52, '2015-07-29', '2015-07-31', 1, 2, 2, 2, 0, '', 18000, '', '', 1, 1, 2),
(53, '2015-08-01', '2015-08-03', 3, 1, 2, 1, 2, '', 30000, '', '', 0, 0, 2),
(54, '2015-08-01', '2015-08-03', 4, 1, 2, 1, 0, '', 37600, '', '', 0, 0, 2),
(57, '2015-07-30', '2015-07-31', 2, 1, 2, 1, 0, '', 11800, '154-1516', '', 1, 1, 2),
(58, '2015-07-30', '2015-07-31', 4, 1, 1, 1, 0, '', 7500, '155-1516', '', 1, 1, 2),
(59, '2015-07-30', '2015-07-31', 2, 1, 1, 1, 0, '', 5900, '156-1516', '', 1, 1, 2),
(60, '2015-08-07', '2015-08-21', 1, 3, 3, 3, 3, '', 310800, '157-1516', '', 0, 0, 2),
(61, '2015-08-07', '2015-08-21', 2, 4, 8, 8, 8, '', 940800, '158-1516', '', 0, 0, 2),
(62, '2015-08-07', '2015-08-21', 3, 2, 4, 4, 2, '', 338800, '159-1516', '', 0, 0, 2),
(63, '2015-07-30', '2015-07-31', 2, 2, 4, 2, 2, '', 18500, '160-1516', '', 1, 1, 2),
(64, '2015-08-01', '2015-08-03', 1, 1, 1, 1, 0, '', 9800, '162-1516', '', 1, 1, 2),
(65, '2015-08-01', '2015-08-03', 2, 1, 1, 1, 0, '', 11800, '163-1516', '', 0, 0, 2),
(66, '2015-08-01', '2015-08-08', 3, 1, 2, 1, 1, '', 107100, '164-1516', '', 0, 0, 2),
(67, '2015-08-01', '2015-08-08', 4, 1, 3, 2, 1, '', 149100, '165-1516', '', 0, 0, 2),
(68, '2015-08-01', '2015-08-08', 3, 2, 5, 2, 2, '', 214200, '166-1516', '', 0, 0, 2),
(69, '2015-08-01', '2015-08-08', 4, 1, 1, 1, 0, '', 62300, '167-1516', '', 0, 0, 2),
(70, '2015-08-01', '2015-08-03', 1, 2, 5, 3, 2, '', 49200, '168-1516', '', 0, 0, 2),
(71, '2015-08-01', '2015-08-03', 2, 1, 1, 1, 0, '', 11800, '169-1516', '', 0, 0, 2),
(72, '2015-08-01', '2015-08-02', 1, 2, 6, 2, 2, '', 24600, '170-1516', '', 1, 1, 2),
(73, '2015-07-30', '2015-07-31', 3, 2, 3, 2, 1, '', 17500, '174-1516', '', 0, 0, 2),
(74, '2015-07-30', '2015-08-01', 1, 1, 1, 1, 1, '', 14800, '175-1516', '', 0, 0, 2),
(75, '2015-07-30', '2015-07-31', 3, 3, 3, 4, 1, 'WiFi', 17500, '176-1516', '', 0, 0, 2),
(77, '2015-07-31', '2015-08-01', 1, 1, 1, 1, 0, '', 7500, '120-1516', '1234', 1, 1, 2),
(78, '2015-07-31', '2015-08-01', 2, 1, 1, 1, 0, '', 9500, '121-1516', '1234', 1, 1, 2),
(79, '2015-08-01', '2015-08-03', 4, 2, 2, 2, 0, 'rer', 62000, '122-1516', '', 0, 0, 2),
(80, '2015-08-10', '2015-08-11', 1, 8, 8, 8, 0, 'afaf', 60000, '123-1516', '', 0, 0, 2),
(81, '2015-08-10', '2015-08-11', 2, 10, 10, 10, 0, 'afaf', 95000, '124-1516', '', 0, 0, 2),
(82, '2015-08-11', '2015-08-13', 1, 7, 7, 7, 0, 'sfs', 105000, '125-1516', '', 0, 0, 2),
(83, '2015-08-11', '2015-08-13', 2, 10, 10, 10, 0, 'sfs', 190000, '126-1516', '', 0, 0, 2),
(84, '2015-08-11', '2015-08-13', 3, 8, 8, 8, 0, 'sfs', 168000, '127-1516', '', 0, 0, 2),
(85, '2015-08-11', '2015-08-13', 4, 4, 4, 4, 0, 'sfs', 132000, '128-1516', '', 0, 0, 2),
(97, '2015-09-03', '2015-09-04', 1, 2, 3, 2, 1, '', 20500, '151-1516', '304001485577', 1, 1, 2),
(108, '2015-09-05', '2015-09-06', 6, 1, 2, 1, 0, '', 7000, '1153-1516', '304002044392', 1, 1, 1),
(109, '2015-09-06', '2015-09-07', 1, 2, 2, 2, 0, 'sdfjsj', 15000, '163-1516', '304002044398', 1, 1, 2),
(110, '2015-09-07', '2015-09-09', 1, 2, 3, 3, 1, 'Non Smoking Rooms', 41000, '164-1516', '304002044404', 1, 1, 2),
(111, '2015-09-07', '2015-09-09', 2, 2, 3, 2, 1, 'Non Smoking Rooms', 49000, '165-1516', '304002044404', 1, 1, 2),
(112, '2015-09-16', '2015-09-17', 1, 1, 1, 1, 0, 'fgfdgdfg', 6500, '166-1516', '304002064474', 1, 1, 2),
(113, '2015-09-22', '2015-09-23', 2, 1, 2, 1, 1, '', 12000, '167-1516', '304002066014', 1, 1, 2),
(114, '2015-09-22', '2015-09-23', 2, 1, 1, 1, 1, 'df', 6335, '168-1516', '304002066246', 1, 1, 2),
(115, '2015-09-22', '2015-09-23', 2, 1, 1, 1, 1, 'kdjcfk', 6335, '169-1516', '304002066250', 1, 1, 2),
(116, '2015-09-22', '2015-09-23', 2, 1, 1, 1, 1, 'kdfkq', 6335, '170-1516', '304002066253', 1, 1, 2),
(117, '2015-09-22', '2015-09-23', 2, 1, 1, 1, 0, 'mnavjk', 4836, '171-1516', '304002066255', 1, 1, 2),
(118, '2015-09-22', '2015-09-23', 2, 1, 1, 1, 0, 'jnf', 4836, '172-1516', '304002066257', 1, 1, 2),
(119, '2015-09-23', '2015-09-24', 5, 1, 1, 1, 0, '', 5500, '1154-1516', '', 0, 0, 1),
(120, '2015-09-23', '2015-09-24', 6, 1, 1, 1, 0, '', 5500, '1155-1516', '', 0, 0, 1),
(121, '2015-09-23', '2015-09-24', 2, 1, 2, 1, 0, '', 6045, '173-1516', '', 0, 0, 2),
(122, '2015-09-25', '2015-09-26', 5, 1, 1, 1, 0, '', 5500, '1156-1516', '', 0, 0, 1),
(123, '2015-09-25', '2015-09-26', 2, 1, 1, 1, 0, '', 4000, '1158-1516', '304002067457', 1, 1, 1),
(124, '2015-09-25', '2015-09-26', 1, 2, 2, 2, 0, '', 8080, '175-1516', '304002067459', 1, 1, 2),
(125, '2015-09-25', '2015-09-26', 6, 1, 2, 1, 0, '', 7000, '1159-1516', '304002067460', 1, 1, 1),
(131, '2015-09-25', '2015-09-26', 5, 1, 2, 1, 0, '', 7000, '1164-1516', '304002067504', 1, 1, 1),
(132, '2015-09-25', '2015-09-26', 2, 1, 1, 1, 0, '', 4836, '177-1516', '304002067505', 1, 1, 2),
(133, '2015-10-14', '2015-10-15', 1, 1, 1, 1, 0, 'nc', 3000, '178-1516', '304002338612', 1, 1, 2),
(134, '2015-10-14', '2015-10-15', 1, 1, 1, 1, 0, 'hbh', 3000, '179-1516', '304002338616', 1, 1, 2),
(135, '2015-10-14', '2015-10-15', 1, 1, 1, 1, 0, 'djbfjs', 3000, '180-1516', '304002338620', 1, 1, 2),
(136, '2015-10-14', '2015-10-15', 1, 1, 3, 1, 1, '', 5500, '181-1516', '304002338622', 1, 1, 2),
(137, '2015-10-14', '2015-10-15', 1, 1, 2, 1, 1, 'hsgvfhsd', 5500, '182-1516', '304002338628', 1, 1, 2),
(138, '2015-10-14', '2015-10-15', 1, 1, 1, 1, 0, 'daf', 3000, '183-1516', '304002338630', 1, 1, 2),
(139, '2015-10-14', '2015-10-15', 1, 1, 2, 1, 0, '', 4000, '184-1516', '304002338633', 1, 1, 2),
(140, '2015-10-14', '2015-10-15', 2, 3, 5, 3, 1, 'WiFi should be free', 15500, '185-1516', '304002338659', 1, 1, 2),
(141, '2015-10-14', '2015-10-15', 2, 1, 1, 1, 0, 'afad', 4000, '186-1516', '304002338674', 1, 1, 2),
(142, '2015-10-14', '2015-10-15', 2, 1, 2, 1, 1, 'fs', 6500, '187-1516', '304002338676', 1, 1, 2),
(143, '2015-10-14', '2015-10-15', 3, 2, 3, 2, 1, 'sf', 13000, '188-1516', '304002338681', 1, 1, 2),
(144, '2015-10-14', '2015-10-15', 1, 1, 1, 1, 0, '', 3000, '189-1516', '', 0, 0, 2),
(145, '2015-10-14', '2015-10-15', 2, 1, 1, 1, 0, '', 4000, '190-1516', '', 0, 0, 2),
(146, '2015-10-14', '2015-10-15', 2, 1, 1, 0, 0, 'sdf', 4000, '191-1516', '', 0, 0, 2),
(147, '2015-10-14', '2015-10-15', 2, 1, 1, 0, 0, 'sdf', 4000, '192-1516', '', 0, 0, 2),
(148, '2015-10-14', '2015-10-15', 2, 1, 1, 0, 0, '', 4000, '198-1516', '', 0, 0, 2),
(149, '2015-10-15', '2015-10-16', 1, 1, 2, 0, 0, 'Special Requirements', 4000, '199-1516', '', 0, 0, 2),
(150, '2015-10-20', '2015-10-23', 1, 1, 3, 0, 1, 'Special ', 16500, '200-1516', '304002339081', 1, 1, 2),
(151, '2015-10-15', '2015-10-16', 1, 1, 1, 0, 0, '', 3000, '201-1516', '304002339212', 1, 1, 2),
(152, '2015-10-15', '2015-10-16', 1, 2, 2, 0, 0, '', 6000, '202-1516', '304002339220', 1, 1, 2),
(153, '2015-10-15', '2015-10-16', 1, 1, 2, 0, 0, '', 4000, '203-1516', '304002339224', 1, 1, 2),
(154, '2015-10-15', '2015-10-16', 1, 1, 2, 0, 1, '', 5500, '204-1516', '', 0, 0, 2),
(155, '2015-10-15', '2015-10-16', 1, 2, 3, 0, 1, '', 8500, '205-1516', '', 0, 0, 2),
(156, '2015-10-19', '2015-10-20', 1, 1, 1, 0, 0, '', 3000, '206-1516', '304002340030', 1, 1, 2),
(157, '2015-10-19', '2015-10-20', 1, 1, 2, 0, 0, '', 4000, '207-1516', '304002340033', 1, 1, 2),
(158, '2015-10-19', '2015-10-20', 1, 1, 1, 0, 0, '', 3000, '208-1516', '304002340040', 1, 1, 2),
(159, '2015-10-19', '2015-10-20', 1, 2, 3, 0, 1, '', 8500, '209-1516', '304002340047', 1, 1, 2),
(160, '2015-10-21', '2015-10-22', 1, 1, 1, 0, 0, 'test require', 3000, '211-1516', '', 0, 0, 2),
(161, '2015-10-22', '2015-10-23', 2, 2, 3, 0, 1, 'Special Requirements', 10500, '212-1516', '', 0, 0, 2),
(162, '2015-10-22', '2015-10-23', 2, 2, 3, 0, 1, 'Special Requirementsdfdfdsdfdfdsfdsfds''dehrgdhfgdhsfgdgdfdshgfhdasgfdhsfghdsgfhsdfgsdh', 10500, '213-1516', '', 0, 0, 2),
(163, '2015-10-22', '2015-10-23', 1, 1, 1, 0, 0, 'wifi comp', 3000, '214-1516', '304002341736', 1, 1, 2),
(164, '2015-10-26', '2015-10-28', 3, 1, 3, 0, 1, '123', 16000, '216-1516', '304002342477', 1, 1, 2),
(165, '2015-10-26', '2015-10-28', 2, 1, 3, 0, 1, 'vdsf', 10000, '217-1516', '304002342483', 1, 1, 2),
(166, '2015-10-26', '2015-10-27', 2, 1, 1, 0, 0, 'dg', 4000, '218-1516', '304002342489', 1, 1, 2),
(167, '2015-10-26', '2015-10-28', 2, 1, 2, 0, 0, 'qdf', 10000, '219-1516', '304002342491', 1, 1, 2),
(168, '2015-10-26', '2015-10-27', 2, 1, 2, 0, 1, 'fwf', 5000, '220-1516', '304002342498', 1, 1, 2),
(169, '2015-10-26', '2015-10-29', 2, 1, 1, 0, 0, 'vd', 12000, '221-1516', '304002342503', 1, 1, 2),
(170, '2015-10-26', '2015-10-27', 3, 1, 2, 0, 0, 'fdf', 6000, '222-1516', '304002342508', 1, 1, 2),
(171, '2015-10-26', '2015-10-27', 2, 1, 3, 0, 1, 'fdf', 6500, '223-1516', '304002342514', 1, 1, 2),
(172, '2015-10-26', '2015-10-27', 2, 1, 3, 0, 1, 'fcwf', 6500, '224-1516', '304002342589', 1, 1, 2),
(173, '2015-10-28', '2015-10-29', 1, 2, 2, 0, 0, 'test', 6000, '225-1516', '304002343252', 1, 1, 2),
(174, '2015-10-28', '2015-10-29', 2, 1, 1, 0, 0, 'asd', 4000, '226-1516', '304002343253', 1, 1, 2),
(175, '2015-10-28', '2015-10-29', 2, 1, 2, 0, 1, 'hghghghgbvbnvbvbvyg', 6500, '227-1516', '', 0, 0, 2),
(176, '2015-10-28', '2015-10-29', 2, 1, 2, 0, 1, 'sdsdsadsadsads', 6500, '228-1516', '', 0, 0, 2),
(177, '2015-10-28', '2015-10-30', 2, 2, 4, 0, 1, 'afa', 23000, '229-1516', '304002343687', 1, 1, 2),
(181, '2015-10-29', '2015-10-31', 1, 1, 1, 0, 0, 'TEst', 6046, '838-1516', '304002344096', 1, 1, 2),
(182, '2015-10-29', '2015-10-30', 1, 2, 4, 0, 0, '', 6846, '839-1516', '304002344099', 1, 1, 2),
(183, '2015-10-29', '2015-10-30', 2, 1, 1, 0, 0, 'Special Welcome', 4231, '841-1516', '304002344112', 1, 1, 2),
(184, '2015-10-29', '2015-10-30', 2, 1, 2, 0, 1, '2333', 6940, '842-1516', '304002344153', 1, 1, 2),
(185, '2015-10-29', '2015-10-30', 2, 2, 5, 0, 2, 'dad', 13880, '843-1516', '304002344157', 1, 1, 2),
(186, '2015-10-29', '2015-10-31', 1, 1, 2, 0, 1, 'adfa', 9846, '845-1516', '', 0, 0, 2),
(187, '2015-10-29', '2015-10-30', 4, 1, 3, 0, 1, 'gsg', 11172, '846-1516', '304002344180', 1, 1, 2),
(188, '2015-11-05', '2015-11-07', 3, 1, 1, 0, 0, 'g', 10882, '847-1516', '304002344190', 1, 1, 2),
(189, '2015-10-29', '2015-10-30', 2, 1, 1, 0, 0, 'dsfadf', 4231, '848-1516', '304002344195', 1, 1, 2),
(190, '2015-10-29', '2015-10-30', 2, 2, 5, 1, 1, 'King size bed', 12380, '850-1516', '304002344202', 1, 1, 2),
(191, '2015-10-30', '2015-10-31', 1, 1, 1, 0, 0, 'sdff', 3023, '856-1516', '304002344308', 1, 1, 2),
(192, '2015-10-30', '2015-10-31', 1, 1, 1, 0, 0, '', 3023, '857-1516', '304002344310', 1, 1, 2),
(193, '2015-10-30', '2015-10-31', 5, 2, 4, 0, 0, '', 12000, '1165-1516', '304002344337', 1, 1, 1),
(194, '2015-10-30', '2015-10-31', 5, 1, 1, 0, 0, 'sdg', 5000, '1166-1516', '304002344345', 1, 1, 1),
(195, '2015-10-30', '2015-10-31', 5, 1, 2, 0, 1, 'fdf', 7500, '1167-1516', '304002344347', 1, 1, 1),
(196, '2015-10-30', '2015-10-31', 5, 1, 2, 0, 1, 'cadfc', 7500, '1168-1516', '304002344349', 1, 1, 1),
(197, '2015-10-30', '2015-10-31', 5, 1, 2, 0, 1, 'sdasd', 7500, '1169-1516', '304002344377', 1, 1, 1),
(198, '2015-10-30', '2015-10-31', 2, 2, 4, 0, 1, 'csacd', 10500, '1170-1516', '304002344389', 1, 1, 1),
(199, '2015-10-30', '2015-10-31', 2, 1, 2, 0, 1, 'twin bed', 6000, '1171-1516', '304002344529', 1, 1, 1),
(200, '2015-10-30', '2015-10-31', 5, 1, 2, 0, 0, 'sss', 11000, '1172-1516', '304002344542', 1, 1, 1),
(201, '2015-10-30', '2015-10-31', 1, 1, 1, 0, 0, '123', 3023, '864-1516', '304002344688', 1, 1, 2),
(202, '2015-11-13', '2015-11-19', 1, 2, 2, 0, 0, 'Non Smoking , good view Rooms', 36276, '888-1516', '304002345322', 1, 1, 2),
(203, '2015-11-02', '2015-11-03', 5, 1, 1, 0, 0, 'test123', 4000, '1646-1516', '304002345432', 1, 1, 1),
(204, '2015-11-02', '2015-11-03', 6, 1, 2, 0, 1, 'test', 6500, '1647-1516', '304002345434', 1, 1, 1),
(205, '2015-11-02', '2015-11-03', 2, 1, 1, 0, 0, 'Test Booking', 4231, '895-1516', '', 0, 0, 2),
(206, '2015-11-02', '2015-11-03', 5, 1, 1, 0, 0, 'test', 4000, '1649-1516', '104017326259', 0, 2, 1),
(207, '2015-11-03', '2015-11-04', 2, 1, 1, 0, 0, '', 4231, '898-1516', '', 0, 0, 2),
(208, '2015-11-17', '2015-11-18', 2, 1, 2, 1, 0, '', 4250, '1705-1516', '', 0, 0, 1),
(209, '2015-11-21', '2015-11-22', 2, 1, 1, 0, 0, 'adsfasdf', 4231, '1247-1516', '', 0, 0, 2),
(210, '2015-11-28', '2015-12-02', 6, 1, 1, 0, 0, '', 20000, '1817-1516', '', 0, 0, 1),
(211, '2015-12-24', '2015-12-26', 2, 3, 5, 2, 0, 'Out if 3 rooms, We need two rooms with interconnect facility. Also Let me know the facilities provided for executive and deluxe room', 30222, '1363-1516', '', 0, 0, 2),
(212, '2015-12-06', '2015-12-06', 2, 1, 2, 0, 0, '', 0, '1875-1516', '', 0, 0, 1),
(213, '2015-12-04', '2015-12-05', 2, 1, 2, 0, 0, '', 5440, '1423-1516', '', 0, 0, 2),
(214, '2015-12-04', '2015-12-05', 2, 1, 2, 0, 0, '', 5440, '1424-1516', '104021311851', 1, 1, 2),
(215, '2015-12-04', '2015-12-05', 2, 1, 1, 0, 0, 'tg', 4231, '1427-1516', '', 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking_rooms`
--

CREATE TABLE IF NOT EXISTS `booking_rooms` (
  `booking_rooms_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_master_id` int(20) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_master_id` int(11) NOT NULL,
  `no_rooms` int(11) NOT NULL,
  PRIMARY KEY (`booking_rooms_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `career_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `career_title` varchar(200) NOT NULL,
  `career_no` varchar(20) NOT NULL,
  `career_location` varchar(500) NOT NULL,
  `career_education` varchar(150) NOT NULL,
  `career_experience` varchar(150) NOT NULL,
  `career_salary` varchar(150) NOT NULL,
  `career_candidature` varchar(150) NOT NULL,
  `career_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `career_display_order` int(5) NOT NULL,
  PRIMARY KEY (`career_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`career_id`, `career_title`, `career_no`, `career_location`, `career_education`, `career_experience`, `career_salary`, `career_candidature`, `career_active`, `career_display_order`) VALUES
(13, 'Front office associate', '2', 'Cochin', '', '', '', 'Male / Female', 'Y', 1),
(14, 'Guest Relation Manager', '1', 'Cochin', '', '', '', 'Female', 'Y', 2),
(15, 'G.R.E', '2', 'Cochin', '', '', '', 'Female', 'Y', 3),
(16, 'D''C.D.P', '1', 'Cochin', '', 'gadmager/conti/ Chinese', '', '', 'Y', 4),
(17, 'Commis level', '2', 'Cochin', '', 'Chinese /conti/gadmager/south Indian', '', '', 'Y', 5),
(18, 'Sr.Captain', '2', 'Cochin', '', '', '', '', 'Y', 6),
(19, 'Captain', '2', 'Cochin', '', '', '', '', 'Y', 7),
(20, 'Sr. Steward', '2', 'Cochin', '', '', '', '', 'Y', 8),
(21, 'Accountant', '1', 'Cochin', 'B.com', '2 to 3 years', '', '', 'Y', 9);

-- --------------------------------------------------------

--
-- Table structure for table `career_enquiry`
--

CREATE TABLE IF NOT EXISTS `career_enquiry` (
  `enquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(5) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `experience` text NOT NULL,
  `qualification` text NOT NULL,
  `date_added` varchar(100) NOT NULL,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=303 ;

--
-- Dumping data for table `career_enquiry`
--

INSERT INTO `career_enquiry` (`enquiry_id`, `career_id`, `first_name`, `email`, `address`, `phone`, `file`, `experience`, `qualification`, `date_added`) VALUES
(15, 14, 'Ambili Dileepkumar', 'ambilidileepkumar@gmail.com', '', '9446576402', 'Ambili_Resume_(1)_(1).doc', '4 years experience in Hotel Industry. \n2years & 6months experience in Cochin International Airport as ground handling with Air India Ltd\n1year experience in Kotak Securities Lts as a customer care executive . 6 months experience in a job consultancy .', 'IATA- UFTAA ( DIPLOMA IN AIRPORT MANAGEMENT)\nBSC cHEMISTRY ( MAHATMA GANDHI uNIVERSITY )', '1431147696'),
(16, 14, 'Ambili Dileepkumar', 'ambilidileepkumar@gmail.com', '', '9446576402', 'Ambili_Resume_(1)_(1)1.doc', '4 years experience in Hotel Industry. \n2years & 6months experience in Cochin International Airport as ground handling with Air India Ltd\n1year experience in Kotak Securities Lts as a customer care executive . 6 months experience in a job consultancy .', 'IATA- UFTAA ( DIPLOMA IN AIRPORT MANAGEMENT)\nBSC cHEMISTRY ( MAHATMA GANDHI uNIVERSITY )', '1431147704'),
(17, 14, 'Ambili Dileepkumar', 'ambilidileepkumar@gmail.com', '', '9446576402', 'Ambili_Resume_(1)_(1)2.doc', '4 years experience in Hotel Industry. \n2years & 6months experience in Cochin International Airport as ground handling with Air India Ltd\n1year experience in Kotak Securities Lts as a customer care executive . 6 months experience in a job consultancy .', 'IATA- UFTAA ( DIPLOMA IN AIRPORT MANAGEMENT)\nBSC cHEMISTRY ( MAHATMA GANDHI uNIVERSITY )', '1431147720'),
(18, 15, 'Ambili Dileepkumar', 'ambilidileepkumar@gmail.com', '', '9446576402', 'Ambili_Resume_(1)_(1)3.doc', '4yrs experience in hotel Industry .\n2 yrs & 6months experience in cochin International Airport as a ground handling with Air India Ltd.\n1year experience in Kotak Securities Ltd as a customer care executive .\n6months experience in a job consutancy as a customer care .', 'IATA -UFTAA ( DIPLOMA IN AVIATION)\nBSC CHEMISTRY (MAHATMA GANDHI UNIVERSITY)', '1431147984'),
(19, 13, 'Ambili Dileepkumar', 'ambilidileepkumar@gmail.com', '', '9446576402', 'Ambili_Resume_(1)_(1)4.doc', '4yrs experience in hotel Industry .\n2 yrs & 6months experience in cochin International Airport as a ground handling with Air India Ltd.\n1year experience in Kotak Securities Ltd as a customer care executive .\n6months experience in a job consutancy as a customer care .', 'IATA-UFTAA (DIPLOMA IN AVIATION)\nBSC CHEMISTRY (MAHATMA GANDHI UNIVERSITY)', '1431148075'),
(20, 13, 'Joji Mathew', 'jojimv2009@gmail.com', '', '+91-9562158140', 'Bio_Data.doc', '7 Years', 'BBA', '1431350487'),
(21, 13, 'Joji Mathew', 'jojimv2009@gmail.com', '', '+91-9562158140', 'Bio_Data1.doc', '7 Years', 'BBA', '1431350495'),
(22, 13, 'GOKUL', 'gokulsundar@hotmail.com', '', '8943111962', 'gokul(1).doc', '4 and half years', 'dip.hospitality & aviation from frankfinn', '1431492348'),
(23, 21, 'aju george', 'ajugeorge84@yahoo.com', '', '9633222605', '', 'no experience in accounts .i have experience in IT like data entry jobs and back office job also .', 'b.com .i have basic computer skills', '1431783470'),
(24, 21, 'aju george', 'ajugeorge84@yahoo.com', '', '9633222605', '', 'no experience in accounts .i have experience in IT like data entry jobs and back office job also .', 'b.com .i have basic computer skills', '1431783470'),
(25, 21, 'aju george', 'ajugeorge84@yahoo.com', '', '9633222605', '', 'no experience in accounts .i have experience in IT like data entry jobs and back office job also .', 'b.com .i have basic computer skills', '1431783471'),
(26, 21, 'aju george', 'ajugeorge84@yahoo.com', '', '9633222605', '', 'no experience in accounts .i have experience in IT like data entry jobs and back office job also .', 'b.com .i have basic computer skills', '1431783473'),
(27, 13, 'ANOOP SAMUEL', 'anoopsam07@gmail.com', '', '8943473781', 'CV_(2).docx', '3yrs', 'diploma in hotel management', '1431915690'),
(28, 21, 'cyriac', 'cyriacpj2000@yahoo.com', '', '+919287410100', '', '30years', 'M.com. PGD Mat.Mgt.', '1431935380'),
(29, 15, 'Ashly jose', 'ashlyjose514@gmail.com', '', '07034451343', 'ASHLY_JOSE_(2)c.doc', '1)1 year experiance in hosanna tours & travels pvt ltd salem as a Front office executive\n2)Presently working in Sterling Terrace green Munnar As a GRE', 'Bsc Tourism & Hospitality Mangement', '1432014821'),
(30, 15, 'Ashly jose', 'ashlyjose514@gmail.com', '', '07034451343', 'ASHLY_JOSE_(2)c1.doc', '1)1 year experiance in hosanna tours & travels pvt ltd salem as a Front office executive\n2)Presently working in Sterling Terrace green Munnar As a GRE', 'Bsc Tourism & Hospitality Mangement', '1432014842'),
(31, 13, 'Jitheesh NT', 'jjitheeshnt@gmail.com', '', '9656476142', 'biodata_-_Jitheesh.doc', 'worked as front office assistant in SM Regency cochin', 'batchler commerse', '1432030739'),
(32, 13, 'Midhun Das', 'midhunkdas1989@gmail.com', '', '00971561813037', 'Midhun_Das.docx', 'More than 3 years of experience in Hospitality industry.', 'Bsc Hospitality Management', '1432083909'),
(33, 19, 'SHAFEEK AHAMED', 'shafeek.ahamed@gmail.com', '', '8606900660', 'SHAFIK_AHAMED_PROFILE.doc', '15', 'MA', '1432115670'),
(34, 19, 'SHAFEEK AHAMED', 'shafeek.ahamed@gmail.com', '', '8606900660', 'SHAFIK_AHAMED_PROFILE1.doc', '15', 'MA', '1432115676'),
(35, 19, 'SHAFEEK AHAMED', 'shafeek.ahamed@gmail.com', '', '8606900660', 'SHAFIK_AHAMED_PROFILE2.doc', '15', 'MA', '1432115685'),
(36, 21, 'VISHNU M NAIR', 'mnair.vishnu11@gmail.com', '', '9747797196', 'VISHNU_M_NAIR_RESUME.doc', '3+ Years of experience as an Accountant in Gopu Nandilath G Mart and M Star Group of Hotels.', 'MFA', '1432373713'),
(37, 21, 'Vishnu Gopinath', 'vishnugopinath1@gmail.com', '', '9605588005', 'vishnu-1.doc', '2year experience in Manappuram Finance, and now working as an Accountant in Broad Bean Hotel', 'Mcom', '1432569077'),
(38, 21, 'Ashish C Aby', 'ashish.c.aby62@gmail.com', '', '9995445543', 'ASHISH.doc', '4 year Experience in TDS Section', 'B.Com Computer Application', '1432808927'),
(39, 13, 'VINOD a', 'vinodapillai@yahoo.com', '', '9496238097', 'vinod_a.doc', '10yers total working experince', 'Degree', '1432882434'),
(40, 13, 'VINOD a', 'vinodapillai@yahoo.co.in', '', '9496238097', 'vinod_a1.doc', '10yers total working experince', 'Degree', '1432882457'),
(41, 13, 'VINOD a', 'vinodapillai@yahoo.co.in', '', '9496238097', 'vinod_a2.doc', '10yers total working experince', 'Degree', '1432882463'),
(42, 21, 'Biji Mathew', 'bijimathew12@gmail.com', '', '9633989067', 'Biji_Cv.docx', '1.) Accountant \n   (White Metal traders, Kochi)    2011 to 2012\n2.) Accountant \n     (Sree Gokulam Exports & imports India p ltd)    2012 Jan to 2012 December\n3.) Senior Accountant \n     (Ashly Aluminum Cheranallor – 2013 Jan to Present)', 'BCom', '1433049287'),
(43, 13, 'VIJESH T K', 'vijeshkolichal@gmail.com', '', '09747669707', 'VIJESH_T_K.doc', 'Presently working as FOA in casino hotel willing don island, Cochin since January-2014', 'Completed Diploma In Airline Tourism and Hospitality Management.', '1433073349'),
(44, 13, 'VIJESH T K', 'vijeshkolichal@gmail.com', '', '09747669707', 'VIJESH_T_K1.doc', 'Presently working as FOA in casino hotel willing don island, Cochin since January-2014', 'Completed Diploma In Airline Tourism and Hospitality Management.', '1433073352'),
(45, 13, 'Sukesh Kumar', 'sukeshkumard@hotmail.com', '', '9447022097', 'CURRICULUM_VITAE_-_Sukesh.pdf', '14 yrs', 'BHM', '1433128022'),
(46, 21, 'Leethu Purushan', 'l.leethu@gmail.com', '', '9495004941', 'CV_with_photo.docx', '4 years', 'B.com. MBA result waiting', '1433141477'),
(47, 19, 'justin c paul', 'justincherady@yahoo.in', '', '+960 9828310', 'Justin_resume.doc', 'i have worked as f&b steward at Vivanta by taj Kumarakom for 13 months and now working as f&b supervisor Eriyadu Island Resort & Spa Maldives.\ni am looking for an opportunity to come back to India. I am ready to join once if I am selected prior to one month of notice period from the date i receive my offer letter.', 'Bsc Hotel Management Catering Technology and Tourism from IIMS Cochin under Punjab Technical University 2009-2012.', '1433163030'),
(48, 20, 'justin c paul', 'justincherady@yahoo.in', '', '+960 9828310', 'Justin_resume1.doc', '13 months as waiter\n6 months as bartender in Maldives\n6 months as acting bar supervisor', 'BSc Hotel Management', '1433163444'),
(49, 13, 'Suja T S', 'sujakarthika46@gmail.com', '', '8129178869', 'RESUME(1).docx', '1 year exp. In Front Office as Front office Assistant', 'SSC ( Maharashtra) ,  plus one & two , BBA ( Guruvayur), Diploma in Aviation (Ernakulam)', '1433227420'),
(50, 13, 'Suja T S', 'sujakarthika46@gmail.com', '', '8129178869', 'RESUME(1)1.docx', '1 year exp. In Front Office as Front office Assistant', 'SSC ( Maharashtra) ,  plus one & two , BBA ( Guruvayur), Diploma in Aviation (Ernakulam)', '1433227436'),
(51, 13, 'Suja T S', 'sujakarthika46@gmail.com', '', '8129178869', 'RESUME(1)2.docx', '1 year exp. In Front Office as Front office Assistant', 'SSC ( Maharashtra) ,  plus one & two , BBA ( Guruvayur), Diploma in Aviation (Ernakulam)', '1433227446'),
(52, 13, 'Suja T S', 'sujakarthika46@gmail.com', '', '8129178869', 'RESUME(1)3.docx', '1 year exp. In Front Office as Front office Assistant', 'SSC ( Maharashtra) ,  plus one & two , BBA ( Guruvayur), Diploma in Aviation (Ernakulam)', '1433227452'),
(53, 19, 'Sijo Thomas', 'sijot528@gmail.com', '', '9447487940', '', '5 years of working experience at Isola di Cocco,Resort Poovar,Trivandrum as Captain', 'Bsc.in Hotel Management', '1433404897'),
(54, 19, 'Sijo Thomas', 'sijot528@gmail.com', '', '9447487940', '', '5 years of working experience at Isola di Cocco,Resort Poovar,Trivandrum as Captain', 'Bsc.in Hotel Management', '1433404912'),
(55, 13, 'Dilshad.k', 'dilshadirshad50@gmail.com', '', '9544551119', 'Dilshad.pdf', 'Front office Manager at les 3 elephants\nGsa at Raxa Collective (Present)', 'Ba pursuing', '1433558750'),
(56, 13, 'vineetha.p.wills', 'vineetha.p.wills@gmail.com', '', '7561049179', 'VINEETHA_P_WILLS.doc_(1)_(1)_(1)_(1)_(1).docx', '2 Year Experience in Housekeeping Desk Attendant in Crowne Plaza Kochi\nCurtly working as in Front Office Associate at Crowne Plaza Kochi', 'Plus two', '1433579127'),
(57, 16, 'Gishnu T.S', 'gishnuts2468@gmail.com', '', '9961961646', '', '6years', 'B.sc Hmt', '1433595757'),
(58, 13, 'K. Sekar', 'sekarkochi123@gmail.com', '', '8089215300', 'K_SEKAR_RESUME_2.docx', 'Worked as Personal Secretary to the In-Charge of Office.\nWorked as Telex Operator, as additional duty, in addition to regular duties.\nConducted delivery of imported Superior Kerosene Oil from Bharat Petroleum Corporation to the nominated agencies and issuance of requisite transportation documents.\nConducted domestic sale and delivery of imported Non-Ferrous Medals from Kerala State Warehousing Corporation and timely issuance of requisite transportation documents and completion of central excise formalities.\nConducted counter sale of Duty Free Jewellery items in foreign currencies from Duty Free Jewellery Shop at Trivandrum Airport to outgoing foreign customers and completion of customs formalities.\nConducted retail counter sale of Jewellery, Gold and Silver Medallions.\nInvolved in dealing with Import of Gold/Fertilizers/Edible Oil/Wheat/Non-Ferrous Metals/ Superior Kerosene Oil/Cement, Duty Free Jewellery Operations, Domestic Trade, Retail Sale of Gold Medallions, and all other connected works of Personnel and General Administration including record maintenance.', 'Master of Arts in Public Administration\nHigher Secondary with Mathematics, Physics, Chemistry and Biology as major subjects.', '1433602684'),
(59, 14, 'lekshmy', 'lekshmybalachandren@gmail.com', '', '09947732030', 'RESUME_(2).doc', 'I have more than 6 years experience tourism industry.', 'B.Com Tourism & Travel management + IATA -UFTAA Foundation', '1433762312'),
(60, 21, 'Ashish.C.Aby', 'ashish.c.aby62@gmail.com', '', '9995445543', 'ASHISH1.doc', '4year experience in tax return filing', 'B.Com Computer Application', '1433841710'),
(61, 21, 'Leethu Purushan', 'l.leethu@gmail.com', '', '9809817135', 'CV_with_photo1.docx', '4 years as Accounts assistant', 'B.com. MBA result waiting', '1433848984'),
(62, 14, 'SINY JOSE', 'iamsiny@gmail.com', '', '9539552124', 'SINY-_updated_CV2015.docx', '8 YEARS .Currently working as the Brnch Manager of RR Careers. Am looking for an immediate job.', 'MBA', '1434091851'),
(63, 14, 'SINY JOSE', 'iamsiny@gmail.com', '', '9539552124', 'SINY-_updated_CV20151.docx', '8 YEARS .Currently working as the Branch Manager of RR Careers. Am looking for an immediate job.', 'MBA', '1434091863'),
(64, 13, 'Nithin john', 'nithinjohn.john5@gmail.com', '', '09663214965', 'NITHIN_JOHN_(1)_(1).doc', '2.5 years experience in Front Office Department. Presently working in K.B.C Green Park Hotel Payyannur, Kannur as Front Office Executive (Supervisor).', 'Graduated in Hotel Management from Mangalore University and Pursuing MBA in Operation Management from IGNOU.', '1434118702'),
(65, 13, 'susanth.n', 'nsusanth740@gmial.com', '', '9809914406', 'SUSANTH_K2.doc', 'fresher', 'b sc hotel management', '1434169029'),
(66, 21, 'Prince Antony', 'princeantony1990@gmail.com', '', '9633442343', 'PRINCE_ANTONY.doc', '1.5 year experience in auditing at Shetty & Thomas Accountants, Kochi & currently working as Claims & Receivables In-Charge in Focuz Motors Kochi.', 'B.Com Finished in 2010', '1434174991'),
(67, 14, 'RUKKU ULLAS', 'rukkumariaullas@gmail.com', '', '9633537975', 'rukkus_resume.docx', 'FRESHER', 'MBA FINANCE', '1434375243'),
(68, 13, 'RUKKU ULLAS', 'rukkumariaullas@gmail.com', '', '9633537975', 'rukkus_resume1.docx', 'FRESHER', 'MBA FINANCE', '1434375319'),
(69, 13, 'RUKKU ULLAS', 'rukkumariaullas@gmail.com', '', '9633537975', 'rukkus_resume2.docx', 'FRESHER', 'MBA FINANCE', '1434375328'),
(70, 21, 'Jackson Joseph', 'jjjosephjack@gmail.com', '', '9946248575', 'Curriculum_Vitae_Jackson_Joseph.doc', 'More than 8-year''s.. 7 years experience in Auditing and 1.6 year in Account''s.', 'B.com, Doing M.com', '1434389489'),
(71, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', 'ASOK_KUMAR_EDICHERRY_VEETIL.docx', '13 yrs', 'BA/diploma in hotel management', '1434550314'),
(72, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550324'),
(73, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550329'),
(74, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550331'),
(75, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550331'),
(76, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550336'),
(77, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', 'ASOK_KUMAR_EDICHERRY_VEETIL1.docx', '13 yrs', 'BA/diploma in hotel management', '1434550339'),
(78, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550349'),
(79, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550350'),
(80, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550351'),
(81, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550352'),
(82, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550352'),
(83, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550355'),
(84, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550355'),
(85, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550355'),
(86, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550355'),
(87, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550356'),
(88, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550357'),
(89, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550360'),
(90, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550360'),
(91, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '13 yrs', 'BA/diploma in hotel management', '1434550360'),
(92, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', 'ASOK_KUMAR_EDICHERRY_VEETIL2.docx', '14 YRS', 'BA', '1434550399'),
(93, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '14 YRS', 'BA', '1434550411'),
(94, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '14 YRS', 'BA', '1434550411'),
(95, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '14 YRS', 'BA', '1434550412'),
(96, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '14 YRS', 'BA', '1434550412'),
(97, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '14 YRS', 'BA', '1434550412'),
(98, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', '', '14 YRS', 'BA', '1434550413'),
(99, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', 'ASOK_KUMAR_EDICHERRY_VEETIL3.docx', '14 YRS', 'BA', '1434550417'),
(100, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', 'ASOK_KUMAR_EDICHERRY_VEETIL4.docx', '14 YRS', 'BA', '1434550463'),
(101, 18, 'ASOK KUMAR', 'ashokedicherry@gmail.com', '', '9746842337', 'ASOK_KUMAR_EDICHERRY_VEETIL5.docx', '14 YRS', 'BA', '1434550500'),
(102, 13, 'Sukesh Kumar', 'sukeshkumard@hotmail.com', '', '9447022097', 'CURRICULUM_VITAE_-_Sukesh1.pdf', '14 years in hospitality industry', 'diploma in Hotel management', '1434703368'),
(103, 21, 'prabhakaran', 'apputpr@gmail.com', '', '9946281336', 'Prabhakaran_-_2015-1.docx', '3 year exp hotel industry in Accounts Assistant', 'Bcom .. (course complete)', '1434972032'),
(104, 21, 'prabhakaran', 'apputpr@gmail.com', '', '9946281336', '', '3 year exp hotel industry in Accounts Assistant', 'Bcom .. (course complete)', '1434972056'),
(105, 21, 'prabhakaran', 'apputpr@gmail.com', '', '9946281336', '', '3 year exp hotel industry in Accounts Assistant', 'Bcom .. (course complete)', '1434972056'),
(106, 21, 'prabhakaran', 'apputpr@gmail.com', '', '9946281336', 'Prabhakaran_-_2015-11.docx', '3 year exp hotel industry in Accounts Assistant', 'Bcom .. (course complete)', '1434972072'),
(107, 21, 'prabhakaran', 'apputpr@gmail.com', '', '9946281336', '', '3 year exp hotel industry in Accounts Assistant', 'Bcom .. (course complete)', '1434972081'),
(108, 21, 'prabhakaran', 'apputpr@gmail.com', '', '9946281336', '', '3 year exp hotel industry in Accounts Assistant', 'Bcom .. (course complete)', '1434972103'),
(109, 13, 'Karan Chawla', 'karan.chawla2014@outlook.com', '', '+91 77679 23543', 'Resume_-_Karan_Chawla.doc', 'I have 9 years 8  months of experience from different faces of Hospitality Industry to Corporate and IT base. While much of my experience has been in IT base working on team building and showing productivity for the team under me. I understand the social value of a corporate sector and my previous experience will be an asset to your organization.\nMy responsibilities included the development of my team and work towards the core Goal of the Organization and giving at most client satisfaction to our customers.\nI worked closely with the team members to motivate them in achieving the daily targets and worked closely with development of team for issues related queries.\nExperience has taught me how to build strong relationships with all the departments at the organization and work towards 100% Client Satisfaction. I have the ability to work within a team as well as cross-team. I can be productive in an environment in a short order. I am a fast learner and can multi-task.', 'B.A. (Hons) in Hospitality Management from Oxford College of Management Studies, Essex, London', '1435150972'),
(110, 13, 'Karan Chawla', 'karan.chawla2014@outlook.com', '', '+91 77679 23543', '', 'I have 9 years 8  months of experience from different faces of Hospitality Industry to Corporate and IT base. While much of my experience has been in IT base working on team building and showing productivity for the team under me. I understand the social value of a corporate sector and my previous experience will be an asset to your organization.\nMy responsibilities included the development of my team and work towards the core Goal of the Organization and giving at most client satisfaction to our customers.\nI worked closely with the team members to motivate them in achieving the daily targets and worked closely with development of team for issues related queries.\nExperience has taught me how to build strong relationships with all the departments at the organization and work towards 100% Client Satisfaction. I have the ability to work within a team as well as cross-team. I can be productive in an environment in a short order. I am a fast learner and can multi-task.', 'B.A. (Hons) in Hospitality Management from Oxford College of Management Studies, Essex, London', '1435150979'),
(111, 13, 'Karan Chawla', 'karan.chawla2014@outlook.com', '', '+91 77679 23543', 'Resume_-_Karan_Chawla1.doc', 'I have 9 years 8  months of experience from different faces of Hospitality Industry to Corporate and IT base. While much of my experience has been in IT base working on team building and showing productivity for the team under me. I understand the social value of a corporate sector and my previous experience will be an asset to your organization.\nMy responsibilities included the development of my team and work towards the core Goal of the Organization and giving at most client satisfaction to our customers.\nI worked closely with the team members to motivate them in achieving the daily targets and worked closely with development of team for issues related queries.\nExperience has taught me how to build strong relationships with all the departments at the organization and work towards 100% Client Satisfaction. I have the ability to work within a team as well as cross-team. I can be productive in an environment in a short order. I am a fast learner and can multi-task.', 'B.A. (Hons) in Hospitality Management from Oxford College of Management Studies, Essex, London', '1435150982'),
(112, 14, 'Anju Devasia', 'anjudevasia05@gmail.com', '', '9656081188', 'Anju_Devasia.doc', 'Customer Relations Manager', 'Diploma, pursuing graduation as distant education', '1435223039'),
(113, 14, 'Anju Devasia', 'anjudevasia05@gmail.com', '', '9656081188', 'Anju_Devasia1.doc', 'Customer Relations Manager', 'Diploma, pursuing graduation as distant education', '1435223041'),
(114, 14, 'Anju Devasia', 'anjudevasia05@gmail.com', '', '9656081188', 'Anju_Devasia2.doc', 'Customer Relations Manager', 'Diploma in Aviation and Hospitality Management, pursuing graduation', '1435223167'),
(115, 13, 'Anju Devasia', 'anjudevasia05@gmail.com', '', '9656081188', 'Anju_Devasia3.doc', 'Customer Relations Manager', 'Diploma in Aviation and Hospitality Management, pursuing graduation', '1435223269'),
(116, 14, 'Jasim Sulaiman', 'jasim_333@live.com', '', '7560904558', '', 'BANANA ISLAND RESORT DOHA BY ANANTARA, Doha, Qatar as Supervisor in Front Office department from February 2014 – May 2015.\nBURJ AL ARAB, Dubai, UAE as Executive Butler,\nOctober 2011 – January 2014 (2years and 3months)\nONE & ONLY Royal Mirage, Dubai, UAE as Senior Front Office Associate(3 and half years)\nLE MERIDIAN Resort & Convention Centre, Cochin, India as GSA in Front Office\nOctober 2007 to February 2008', 'Bachelor Degree in Hotel Management and Tourism (2004-2008)', '1435295013'),
(117, 14, 'Jasim Sulaiman', 'jasim_333@live.com', '', '7560904558', '', 'BANANA ISLAND RESORT DOHA BY ANANTARA, Doha, Qatar as Supervisor in Front Office department from February 2014 – May 2015.\nBURJ AL ARAB, Dubai, UAE as Executive Butler,\nOctober 2011 – January 2014 (2years and 3months)\nONE & ONLY Royal Mirage, Dubai, UAE as Senior Front Office Associate(3 and half years)\nLE MERIDIAN Resort & Convention Centre, Cochin, India as GSA in Front Office\nOctober 2007 to February 2008', 'Bachelor Degree in Hotel Management and Tourism (2004-2008)', '1435295024'),
(118, 14, 'Jasim Sulaiman', 'jasim_333@live.com', '', '7560904558', '', 'BANANA ISLAND RESORT DOHA BY ANANTARA, Doha, Qatar as Supervisor in Front Office department from February 2014 – May 2015.\nBURJ AL ARAB, Dubai, UAE as Executive Butler,\nOctober 2011 – January 2014 (2years and 3months)\nONE & ONLY Royal Mirage, Dubai, UAE as Senior Front Office Associate(3 and half years)\nLE MERIDIAN Resort & Convention Centre, Cochin, India as GSA in Front Office\nOctober 2007 to February 2008', 'Bachelor Degree in Hotel Management and Tourism (2004-2008)', '1435295045'),
(119, 14, 'Jasim Sulaiman', 'jasim_333@live.com', '', '7560904558', '', 'BANANA ISLAND RESORT DOHA BY ANANTARA, Doha, Qatar as Supervisor in Front Office department from February 2014 – May 2015.\nBURJ AL ARAB, Dubai, UAE as Executive Butler,\nOctober 2011 – January 2014 (2years and 3months)\nONE & ONLY Royal Mirage, Dubai, UAE as Senior Front Office Associate(3 and half years)\nLE MERIDIAN Resort & Convention Centre, Cochin, India as GSA in Front Office\nOctober 2007 to February 2008', 'Bachelor Degree in Hotel Management and Tourism (2004-2008)', '1435295050'),
(120, 14, 'Jasim Sulaiman', 'jasim_333@live.com', '', '7560904558', '', 'BANANA ISLAND RESORT DOHA BY ANANTARA, Doha, Qatar as Supervisor in Front Office department from February 2014 – May 2015.\nBURJ AL ARAB, Dubai, UAE as Executive Butler,\nOctober 2011 – January 2014 (2years and 3months)\nONE & ONLY Royal Mirage, Dubai, UAE as Senior Front Office Associate(3 and half years)\nLE MERIDIAN Resort & Convention Centre, Cochin, India as GSA in Front Office\nOctober 2007 to February 2008', 'Bachelor Degree in Hotel Management and Tourism (2004-2008)', '1435295063'),
(121, 14, 'Jasim Sulaiman', 'jasim_333@live.com', '', '7560904558', '', 'BANANA ISLAND RESORT DOHA BY ANANTARA, Doha, Qatar as Supervisor in Front Office department from February 2014 – May 2015.\nBURJ AL ARAB, Dubai, UAE as Executive Butler,\nOctober 2011 – January 2014 (2years and 3months)\nONE & ONLY Royal Mirage, Dubai, UAE as Senior Front Office Associate(3 and half years)\nLE MERIDIAN Resort & Convention Centre, Cochin, India as GSA in Front Office\nOctober 2007 to February 2008', 'Bachelor Degree in Hotel Management and Tourism (2004-2008)', '1435295068'),
(122, 14, 'Jasim Sulaiman', 'jasim_333@live.com', '', '7560904558', '', 'BANANA ISLAND RESORT DOHA BY ANANTARA, Doha, Qatar as Supervisor in Front Office department from February 2014 – May 2015.\nBURJ AL ARAB, Dubai, UAE as Executive Butler,\nOctober 2011 – January 2014 (2years and 3months)\nONE & ONLY Royal Mirage, Dubai, UAE as Senior Front Office Associate(3 and half years)\nLE MERIDIAN Resort & Convention Centre, Cochin, India as GSA in Front Office\nOctober 2007 to February 2008', 'Bachelor Degree in Hotel Management and Tourism (2004-2008)', '1435295071'),
(123, 14, 'Jasim Sulaiman', 'jasim_333@live.com', '', '7560904558', '', 'BANANA ISLAND RESORT DOHA BY ANANTARA, Doha, Qatar as Supervisor in Front Office department from February 2014 – May 2015.\nBURJ AL ARAB, Dubai, UAE as Executive Butler,\nOctober 2011 – January 2014 (2years and 3months)\nONE & ONLY Royal Mirage, Dubai, UAE as Senior Front Office Associate(3 and half years)\nLE MERIDIAN Resort & Convention Centre, Cochin, India as GSA in Front Office\nOctober 2007 to February 2008', 'Bachelor Degree in Hotel Management and Tourism (2004-2008)', '1435295073'),
(124, 17, 'RISHAB KHANNA', 'rishabkhanna91@yahoo.com', '', '+91 9650708897', 'CV_Rishab_Khanna.docx', 'FRESHER', 'BSC IN HOTEL MANAGEMENT FROM CHANDIGARH INSTITUTE OF HOTEL MANAGEMENT & CATERING TECHNOLOGY, SECTOR-42D', '1435326824'),
(125, 13, 'Vishnu Ashok', 'vishnuashok701@gmail.com', '', '9633664939', 'Vishnu_Ashok.docx', 'Worked as Admin and Guest relation executive at Hotel Holiday Inn Cochin.', 'Graduate in B.Sc. Chemistry and currently pursuing MBA final year.', '1435559931'),
(126, 21, 'ANITHA FRANCIS', 'anithafranc07@gmaill.com', '', '9745468163', 'ANITHA_113700688_(1)_(1)_(1).doc', '3 years experience in finance company- branch manager and assistant manager level.', 'mba - finanace', '1435575111'),
(127, 21, 'ANITHA FRANCIS', 'anithafranc07@gmaill.com', '', '9745468163', 'ANITHA_113700688_(1)_(1)_(1)1.doc', '3 years experience in finance company- branch manager and assistant manager level.', 'mba - finanace', '1435575114'),
(128, 21, 'ANITHA FRANCIS', 'anithafranc07@gmaill.com', '', '9745468163', 'ANITHA_113700688_(1)_(1)_(1)2.doc', '3 years experience in finance company- branch manager and assistant manager level.', 'mba - finanace', '1435575123'),
(129, 13, 'SHERIN BIBIN', 'sherinb.pulickal@gmail.com', '', '9961814980', 'SHERIN_BIODATA.doc', '6 years experience in customer relation executive.', 'BA', '1435575479'),
(130, 14, 'SHERIN BIBIN', 'sherinb.pulickal@gmail.com', '', '9961814980', 'SHERIN_BIODATA1.doc', '6 years experience', 'BA', '1435575558'),
(131, 20, 'nidhin.c.m', 'cmnidhin@gmail.com', '', '9745468163', '', '8 years experience in three star hotel', 'hotel management', '1435652207'),
(132, 17, 'ABHIJITH PRAKASH', 'Abhijithp96@gmail.com', '', '8129611956', 'RESUME_abhijith(1)2(1).docx', 'worked as a commi 3 bakery at Emarald vytilla', 'B.Sc HOTEL MANAGEMENT AND CATERING SCIENCE', '1435667617'),
(133, 13, 'nidhin', 'cmnidhin@gmail.com', '', '9745468163', 'hh.docx', '9 years experience - application for the post of cashier OR bar in charge', 'hotel management', '1435814244'),
(134, 13, 'nidhin', 'cmnidhin@gmail.com', '', '9745468163', 'hh1.docx', '9 years experience - application for the post of cashier OR bar in charge', 'hotel management', '1435814244'),
(135, 13, 'Namitha Manilal', 'namivava64@gmail.com', '', '+919744434393', '', 'Fresher', 'Bachelor''s of Tourism Studies', '1435822833'),
(136, 13, 'Namitha Manilal', 'namivava64@gmail.com', '', '+919744434393', '', 'Fresher', 'Bachelor''s of Tourism Studies', '1435822834'),
(137, 13, 'Namitha Manilal', 'namivava64@gmail.com', '', '+919744434393', '', 'Fresher', 'Bachelor''s of Tourism Studies', '1435822853'),
(138, 13, 'Namitha Manilal', 'namivava64@gmail.com', '', '+919744434393', '', 'Fresher', 'Bachelor''s of Tourism Studies', '1435822853'),
(139, 14, 'Namitha Manilal', 'namivava64@gmail.com', '', '+919744434393', '', 'Fresher', 'Bachelor''s of Tourism Studies', '1435822965'),
(140, 14, 'Namitha Manilal', 'namivava64@gmail.com', '', '+919744434393', '', 'Fresher', 'Bachelor''s of Tourism Studies', '1435823023'),
(141, 13, 'sherin', 'sherinb.pulickal@gmail.com', '', '9961814980', 'SHERIN_BIODATA2.doc', '6 years experience', 'BA', '1435832656'),
(142, 19, 'DEEPAK D', 'deepakd890@gmail.com', '', '9656778587', 'Deepak_-_Resume[2].pdf', '1 year', 'MBA', '1435917795'),
(143, 17, 'Litto Jacob', 'littojacob382@gmail.com', '', '8086483029', '', 'just completed the course', 'BHM', '1435918960'),
(144, 13, 'Joji mathew', 'jojimv2009@gmail.com', '', '9562158140', '', '6years', 'BBA', '1436075147'),
(145, 13, 'Joji mathew', 'jojimv2009@gmail.com', '', '9562158140', '', '6years', 'BBA', '1436075148'),
(146, 13, 'Joji mathew', 'jojimv2009@gmail.com', '', '9562158140', '', '6years', 'BBA', '1436075149'),
(147, 14, 'Preethy Thomas Nazare', 'preethythomas22@gmail.com', '', '+8589012225', 'Preethy_T_RESUME.doc', 'More than 8 years of experience in Service and hospitality sector.', 'Post Graduation in Business Entrepreneurship and Management.', '1436282939'),
(148, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417054'),
(149, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417057'),
(150, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417058'),
(151, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417058'),
(152, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417059'),
(153, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417059'),
(154, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417059'),
(155, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417059'),
(156, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417059'),
(157, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417060'),
(158, 13, 'aravind k chandran', 'aravindchandran12@gmail.com', '', '9633203939', '', '1 year at crowne plaza kochi as bell desk assosiate', 'bhm course completed', '1436417060'),
(159, 13, 'sanju mohan', 'sanjusr1984@gmail.com', '', '9020301004', '', '8 years experience in hotel industry', 'Bcom + diploma in hotel mngt', '1436446838'),
(160, 13, 'sanju mohan', 'sanjusr1984@gmail.com', '', '9020301004', '', '8 years experience in hotel industry', 'Bcom + diploma in hotel mngt', '1436446846'),
(161, 17, 'syamlal', 'syamlalkb008@gmail.com', '', '8089186337', 'sy.doc', '8 year', 'hotel management diploma', '1436499371'),
(162, 18, 'SATHEESH', 'Satheesh198819@gmail.com', '', '919744281616', '', '7 years', 'DHM', '1436684014'),
(163, 18, 'SATHEESH', 'Satheesh198819@gmail.com', '', '919744281616', '', '7 years', 'DHM', '1436684019'),
(164, 21, 'subesh (test)', 'itm.dt@olivehotels.com', '', '7025266776', 'subeshks.doc', 'test', 'test', '1436768444'),
(165, 19, 'R.Bipinraj', 'rbipinraj@gmail.com', '', '+918086909442', 'bipinraj_hotel_management_resume.doc', 'Five years of experience in F&B Serivce Dept.', 'Bsc. Catering Science & Hotel Management', '1437104495'),
(166, 13, 'NISHANTH NANDAKUMAR', 'nishanth3000ac@gmail.com', '', '9745267566', '', 'I am Nishanth Nandakumar, I am aspiring to work in a company that transforms wealth management for the benefit of investors by offering learning and advancement in a friendly, people oriented atmosphere. I was completed my MBA in both finance and marketingI have one year experience in marketing', 'MBA', '1437413091'),
(167, 13, 'NISHANTH NANDAKUMAR', 'nishanth3000ac@gmail.com', '', '9745267566', 'Nishanth_Nandakumar_R_(1).pdf', 'I am Nishanth Nandakumar, I am aspiring to work in a company that transforms wealth management for the benefit of investors by offering learning and advancement in a friendly, people oriented atmosphere. I was completed my MBA in both finance and marketingI have one year experience in marketing', 'MBA', '1437413099'),
(168, 21, 'VISHNU M NAIR', 'mnair.vishnu11@gmail.com', '', '9747797196', 'VISHNU_M_NAIR_RESUME1.doc', 'Total 3+ Years experience as an Accountant\n1 Year experience in Hotel Field as an Accountant.', 'MFA', '1437471919'),
(169, 21, 'VIPIN THOMAS', 'vipin.thomas268@gmail.com', '', '+919447705114', 'VIPIN_THOMAS_RESUME_1.docx', 'MAY 2013 TO TILL DATED', 'M.Com Finance and Control', '1437542864'),
(170, 21, 'VIPIN THOMAS', 'vipin.thomas268@gmail.com', '', '+919447705114', 'VIPIN_THOMAS_RESUME_11.docx', 'MAY 2013 TO TILL DATED', 'M.Com Finance and Control', '1437542867'),
(171, 21, 'VIPIN THOMAS', 'vipin.thomas268@gmail.com', '', '+919447705114', 'VIPIN_THOMAS_RESUME_12.docx', 'MAY 2013 TO TILL DATED', 'M.Com Finance and Control', '1437542871'),
(172, 21, 'VIPIN THOMAS', 'vipin.thomas268@gmail.com', '', '+919447705114', 'VIPIN_THOMAS_RESUME_13.docx', 'MAY 2013 TO TILL DATED', 'M.Com Finance and Control', '1437542878'),
(173, 21, 'VIPIN THOMAS', 'vipin.thomas268@gmail.com', '', '+919447705114', 'VIPIN_THOMAS_RESUME_14.docx', 'MAY 2013 TO TILL DATED', 'M.Com Finance and Control', '1437542881'),
(174, 21, 'Shanavaz Rawther', 'shanavaz31@yahoo.com', '', '+918547819342', 'biodata.doc', '5 years experience', 'MCOM and MBA in HR', '1437717496'),
(175, 21, 'Shanavaz Rawther', 'shanavaz31@yahoo.com', '', '+918547819342', 'biodata1.doc', '5 years experience', 'MCOM and MBA in HR', '1437717501'),
(176, 21, 'Shanavaz Rawther', 'shanavaz31@yahoo.com', '', '+918547819342', 'biodata2.doc', '5 years experience', 'MCOM and MBA in HR', '1437717523'),
(177, 21, 'Shanavaz Rawther', 'shanavaz31@yahoo.com', '', '+918547819342', 'biodata3.doc', '5 years experience', 'MCOM and MBA in HR', '1437717523'),
(178, 21, 'Shanavaz Rawther', 'shanavaz31@yahoo.com', '', '+918547819342', 'biodata4.doc', '5 years experience', 'MCOM and MBA in HR', '1437717524'),
(179, 21, 'Manoj Pai P M', 'pai.man.manoj2@gmail.com', '', '08129360033', 'Manoj_(1)(1)_(1).doc', '4.5 Years', 'B.COM Computer Application', '1437993384'),
(180, 21, 'Manoj Pai P M', 'pai.man.manoj2@gmail.com', '', '08129360033', 'Manoj_(1)(1)_(1)1.doc', '4.5 Years', 'B.COM Computer Application', '1437993387'),
(181, 21, 'Manoj Pai P M', 'pai.man.manoj2@gmail.com', '', '08129360033', 'Manoj_(1)(1)_(1)2.doc', '4.5 Years', 'B.COM Computer Application', '1437993424'),
(182, 21, 'Dancia Deenston', 'danciadeenston22@gmail.com', '', '8593811101', 'Dancia_Deenston-_resume.docx', '1year 4months in Finance department at Club Mahindra', 'MBA Finance, Pursuing CS', '1438077113'),
(183, 21, 'Dancia Deenston', 'danciadeenston22@gmail.com', '', '8593811101', 'Dancia_Deenston-_resume1.docx', '1year 4months in Finance department at Club Mahindra', 'MBA Finance, Pursuing CS', '1438077144'),
(184, 20, 'vino varghese', 'vvvinovarghese38@gmail.com', '', '9495634364', 'Mr._Vino_Varghese_FNB_Service_Resume_(5)_(4)_(0).docx', 'i have 4years of work experience as a waiter in india and abroad.', 'B.H.M', '1438233242'),
(185, 18, 'Midhun Venu', 'venu.midhun@hotmail.com', '', '9656643904', 'Midhun_Resume.pdf', '7 years', '3 year diploma in Hotel Management and Catering technology', '1438263669'),
(186, 18, 'Midhun Venu', 'venu.midhun@hotmail.com', '', '9656643904', 'Midhun_Resume1.pdf', '7 years', '3 year diploma in Hotel Management and Catering technology', '1438263673'),
(187, 19, 'Midhun Venu', 'venu.midhun@hotmail.com', '', '9656643904', 'Midhun_Resume2.pdf', '7Years', '3year Diploma in Hotel Management', '1438263747'),
(188, 19, 'Midhun Venu', 'venu.midhun@hotmail.com', '', '9656643904', 'Midhun_Resume3.pdf', '7Years', '3year Diploma in Hotel Management', '1438263753'),
(189, 18, 'SURJITH', 'surjithvayalodi@gmail.com', '', '09744241416', 'CURICULAM_VITAE.docx', '4 YEAR EXPERIENCE IN FOOD AND BEVERAGE SERVICES', '•B.A i payyanur  college payyanur 2005-2008', '1438345873'),
(190, 20, 'HARESH MOHAN', 'haresh_hotcancer@rediffmail.com', '', '7558942871', 'haresh_mohan_dunes_29-Jul-15_14_15_28.docx', '3 year and 6 six months in food and beverage services', 'BA From IGNOU kaloor kerala', '1438430356'),
(191, 17, 'syamlal', 'syamlalkb008@gmail.com', '', '8089186337', 'sy1.doc', '7 year', 'hotel management diploma', '1438482699'),
(192, 14, 'chithra k c', 'chithrakc6@gmail.com', '', '9745235709', 'chithu_placement_cv_(1)_(1)-2_(2)_(1).pdf', '1 month', 'MBA- HR & Marketing', '1438595862'),
(193, 18, 'Jithinkumar T', 'jithinkumar36@gmail.com', '', '7034165195', 'JITHIN_KUMAR_T_C.V..doc', '3yeats in Kerala 4 years in Dubai One & Only royal mirage.', 'DHM in Hotel management and Tourism', '1438674928'),
(194, 18, 'Jithinkumar T', 'jithinkumar36@gmail.com', '', '7034165195', 'JITHIN_KUMAR_T_C.V.1.doc', '3yeats in Kerala 4 years in Dubai One & Only royal mirage.', 'DHM in Hotel management and Tourism', '1438674930'),
(195, 18, 'Jithinkumar T', 'jithinkumar36@gmail.com', '', '7034165195', 'JITHIN_KUMAR_T_C.V.2.doc', '3yeats in Kerala 4 years in Dubai One & Only royal mirage.', 'DHM in Hotel management and Tourism', '1438674933'),
(196, 18, 'Jithinkumar T', 'jithinkumar36@gmail.com', '', '7034165195', 'JITHIN_KUMAR_T_C.V.3.doc', '3yeats in Kerala 4 years in Dubai One & Only royal mirage.', 'DHM in Hotel management and Tourism', '1438674943'),
(197, 21, 'JINUJANARDHANAN', 'jinumavelikara@gmail.com', '', '09744748129', '', 'More than 4 Year Experience', 'B.Com  course Compleated', '1438848424'),
(198, 21, 'JOBIN JOHN', 'kallujohn@gmail.com', '', '9809852525', 'Resume_for_the_post_of_Accountant.docx', '2.5 years', 'M.com Finance', '1438857086'),
(199, 15, 'JINUMOL THOMAS', 'jinumolt@gmail.com', '', '8281613290', 'JINUMOL_THOMAS.docx.doc', 'Fresher', 'Msc clinical nutrition and Dietetics', '1438857570'),
(200, 13, 'Midhun K Das', 'midhunkdas1989@gmail.com', '', '00971-561813037', 'Midhun_Das1.docx', '1,Le Meridian Al-Aqah Beach Resort Starwood Co. UAE February 2014 till Date.\n2,NABRAS ADEN restaurant Sharjah October2011 to September 2013\n3,ROYAL RASOI Fine dining restaurant (Navi Mumbai) April2009 to september2009', 'Education and Qualification\n\n• BSc. Hospitality Management from Mumbai University 2008-2011 \n• Higher Secondary education in Commerce from  Kerala State Board 2005-2007\n• SSLC (10th) education from Kerala State Board 2004-2005 \n• “Associate of the Month" Nominee Le Meridien Al Aqah Beach Resort November 2014\n• Participated in two day camp for NSS volunteers in school level.\n• Participated in the NCC Annual training camp in the school level. \n• Volunteered the college food fest  Them Dinner', '1438941384'),
(201, 15, 'Aneeta Agnes', 'agnesherrick@gmail.com', '', '9497188236', 'Resume_-_Aneeta_Agnes_(1).docx', '4 years of work experience in Travel & Tourism Industry', 'B.Com Travel & Tourism', '1438953553'),
(202, 21, 'JINU JANARDHANAN', 'jinumavelikara@gmail.com', '', '09744748129', 'JJINU_RESUME_NEW_(1).docx', '5 years Experiance', 'B.Com Course Completed', '1439284726'),
(203, 21, 'JINU JANARDHANAN', 'jinumavelikara@gmail.com', '', '09744748129', 'JJINU_RESUME_NEW_(1)1.docx', '5 years Experiance', 'B.Com Course Completed', '1439284739'),
(204, 21, 'JINU JANARDHANAN', 'jinumavelikara@gmail.com', '', '09744748129', 'JJINU_RESUME_NEW_(1)2.docx', '5 years Experiance', 'B.Com Course Completed', '1439284742'),
(205, 21, 'JINU JANARDHANAN', 'jinumavelikara@gmail.com', '', '09744748129', 'JJINU_RESUME_NEW_(1)3.docx', '5 Year Experiance In Accounts', 'B.Com Course Compleated', '1439285003'),
(206, 21, 'JINU JANARDHANAN', 'jinumavelikara@gmail.com', '', '09744748129', 'JJINU_RESUME_NEW_(1)4.docx', '5 Year Experiance In Accounts', 'B.Com Course Compleated', '1439285007'),
(207, 21, 'Abdul Rasheed', 'rashicgd@gmail.com', '', '9847768580', 'RASHI_CV_NEW.docx', '5 Years GUlf experience', 'Pre Degree', '1439396174'),
(208, 13, 'Ahammed Ansal pk', 'Ahammedansal@gmail.com', '', '+919048620634', 'new_RESUME_(1).docx', 'Nill', 'B.tech', '1439399180'),
(209, 13, 'Ahammed Ansal pk', 'Ahammedansal@gmail.com', '', '+919048620634', 'new_RESUME_(1)1.docx', 'Nill', 'B.tech', '1439399189'),
(210, 20, 'Ahammed Ansal pk', 'Ahammedansal@gmail.com', '', '+919048620634', 'new_RESUME_(1)2.docx', 'Nill', 'B.tech/electronics and communication engineering', '1439399301'),
(211, 19, 'Ahammed Ansal pk', 'Ahammedansal@gmail.com', '', '+919048620634', 'new_RESUME_(1)3.docx', 'Nill', 'B.tech/electronics and communication engineering', '1439399442'),
(212, 14, 'Jaina Mary John', 'jainajohn11@gmail.com', '', '9995444892', 'Resume_Jaina_John.doc', '4 years as customer care', 'B.H.M and M.P.I.B', '1439515171'),
(213, 17, 'subin', 'migguuvugih@gmail.com', '', '8093324179', '', 'Hvv', 'Vegum if', '1439622432'),
(214, 17, 'subin', 'migguuvugih@gmail.com', '', '8093324179', '', 'Hvv', 'Vegum if', '1439622432'),
(215, 13, 'Vishnu Raghav S', 'vishnuraghavs@gmail.com', '', '9400345942', '', 'I have completed my 6 months internship at Vivanta By Taj, Thiruvananthapuram in the front office department', 'Completed 3 years B.Sc. Degree in Catering Science & Hotel Management at CMS College of Science & Commerce, Chinnavedampatti, Coimbatore, Affiliated to Bharatiyar University.\n\nCompleted 2 years MBA at Sree Narayana Guru Insitute of Science and Technology, N.Paravur, Kochi, Affiliated to M G University.', '1439737672'),
(216, 14, 'Annu Singh', 'annusingh55@yahoo.com', '', '+91-8089873122', 'annu_resume.docx', 'Asst Manager (Housekeeping)-Marriott International\nJul 2008 - Aug 2011\nProperty - Marriott Hyderabad, Courtyard Marriott Pune, Courtyard Marriott Mumbai.', 'B.Sc. in Hospitality and Hotel Administration from IHM, Chandigarh', '1439827327'),
(217, 14, 'Annu Singh', 'annusingh55@yahoo.com', '', '+91-8089873122', 'annu_resume1.docx', 'Asst Manager (Housekeeping)-Marriott International\nJul 2008 - Aug 2011\nProperty - Marriott Hyderabad, Courtyard Marriott Pune, Courtyard Marriott Mumbai.', 'B.Sc. in Hospitality and Hotel Administration from IHM, Chandigarh', '1439827330'),
(218, 18, 'jayesh', 'gopi.jayesh@yahoo.com', '', '8943502440', 'Gopi_Jayesh.doc', '10 Years Experience in Hospitality Industries.', 'Food and Beverage Service studied from Food Craft Institute Kalamasery', '1439927697'),
(219, 13, 'Anju kurian', 'anju.kurian91@gmail.com', '', '9567679088', 'anju_kurian_(4).docx', '2 Year & 6 months', 'Advanced Diploma in Airhostess & Hospitality Management', '1439967939'),
(220, 13, 'susanth', 'nsusanth740@gmail.com', '', '9809914406', 'SUSANTH_NEW_CV.docx', 'one year', 'bs c hotel management', '1439981521'),
(221, 18, 'sivaprasad', 'ksivaprasad.siva@gmail.com', '', '7034080617', '', '9years', 'D H M', '1440150285'),
(222, 18, 'sivaprasad', 'ksivaprasad.siva@gmail.com', '', '7034080617', 'siva007.docx', '9years', 'D H M', '1440150287'),
(223, 21, 'bineesh vijayan', 'bineeshvijayan6765@gmail.com', '', '9447726765', 'BINEESH_VIJAYAN_BIODATA(ACCOUNTS).docx', '1.5yr', 'mcom', '1440231115'),
(224, 13, 'Abishek Venugopal', 'abishekvenugopal@gmail.com', '', '8089027666', 'Abishek_Venu.docx', 'Hi,\nI am Abishek Venugopal from India. I am submitting my application under Sales Department. As a Sales professional with over 2 years experience in required field, I know my diverse skills and qualifications will be invaluable for the company. You can see from my profile that I have build my career from different sectors which made me a flexible and responsive individual. Certainly, I am passionate over the automotive industry and work for my passion. Being passionate, makes me mindful of the industry, its excellency and keeps up to date knowledge on new models of launched in market.\nIn short, I am thrilled at the possibility of being a part of the great team and would love the opportunity to work out with my passion. I appreciate your consideration and look forward to hearing from you.\n \nWarm Regards,\nAbishek Venugopal', 'MBA in International Business', '1440243185'),
(225, 21, 'vishnu vr', 'vishnuvr109@gmail.com', '', '8606783220', 'Vishnu_cv.doc', '0', 'B.COM', '1440564038'),
(226, 17, 'Muhammed Rafi', 'Rrafimuhammed1993@gmail.com', '', '8891488480', '', '3 Month', 'Bsc hotel management', '1440574469'),
(227, 17, 'Muhammed Rafi', 'Rrafimuhammed1993@gmail.com', '', '8891488480', '', '3 Month', 'Bsc hotel management', '1440574477'),
(228, 13, 'ARAVIND K CHANDRAN', 'aravindchandran12@gmail.com', '', '8089731505', 'edited_2.doc', '01 year experience as concierge assosiate at crowne plaza kochi.', 'BHM course complited', '1440755726'),
(229, 17, 'siddiqui shafiuddin', 'shafissiddiqui@gmail.com', '', '8652561786', 'Curriculum_Vitae.do.doc', 'fresher', 'Bsc in hotel management', '1441096451'),
(230, 13, 'Dilip Tomson', 'diliptomson@gmail.com', '', '09880198147', 'Dilip_Resume.doc', 'Fresher', 'Bsc Hospitality & Hotel Asministration', '1441105146'),
(231, 13, 'Joji Mathew', 'jojimv2009@gmail.com', '', '+91 - 9562158140', 'Bio_Data_(1).doc', '8 Years', 'CABM + BBA', '1441519630'),
(232, 13, 'Joji Mathew', 'jojimv2009@gmail.com', '', '+91 - 9562158140', 'Bio_Data_(1)1.doc', '8 Years', 'CABM + BBA', '1441519640'),
(233, 18, 'sanal Augustin', 'sanalaugastin@gmail.com', '', '8111935482', '', 'I have 3 years work experience in Gulf region and did trainng also in Gulf.', 'Previously worked with Hilton group as headwaiter( Res.sipervisor).Currently looking for an new challaenge.Cv will be on request.You can send me a mail if my experience matches the criteria for a senior captian.', '1441591751'),
(234, 21, 'POOJA SHAH', 'poojavshah1@gmail.com', '', '9020894376', 'POOJA_RESUME.doc', 'I am current working for Continental group of Companies. Previously i was working in an CA firm in Raipur. Please find attached resume for further details.', 'CA INTER WITH ARTICLESHIP, B.COM', '1441696546'),
(235, 13, 'sarath raj', 'sarathraj262@gmail.com', '', '919495778198', '', 'fresher', 'IATA CUSTOMER SERVICE\nBEC \nDIPLOMA IN AIRPORT,AIRLINE AND HOSPITALITY MANAGEMENT\nAND DOING DEGREE IN AIRPORT AND AIRLINE MANAGEMENT', '1441705446'),
(236, 14, 'Santhosh Kumar', 'pv.santhoshk@gmail.com', '', '09061510079', 'Mypower_2015.doc', '22 yrs', 'Graduation, Diploma in travel & tourism Management', '1441715460');
INSERT INTO `career_enquiry` (`enquiry_id`, `career_id`, `first_name`, `email`, `address`, `phone`, `file`, `experience`, `qualification`, `date_added`) VALUES
(237, 13, 'SREEDEVI', 'rahuladhi85@gmil.com', '', '8606359269', 'SREEDEVI_1.docx', 'Presently working as a Front Office Assistant at Hotel Pearl Royal International ,Thodupuzha Since 9 Months', 'Medical Transcription-Edss,Kadavanthra\nPlus two-KPMHSS,Poothotta\nSSLC-HSS Brahamamangalam', '1442041354'),
(238, 15, 'SREEDEVI', 'rahuladhi85@gmil.com', '', '8606359269', 'SREEDEVI_11.docx', 'Presently working as a Front Office Assistant at Hotel Pearl Royal International ,Thodupuzha Since 8 Months', 'Medical Transcription-Edss,Kadavanthra\nPlus two-KPMHSS,Poothotta\nSSLC-HSS Brahamamangalam', '1442041473'),
(239, 17, 'Abey Mathew', 'poikayilabey@gmail.com', '', '9496324542', 'AAA1.docx', '2year', 'Bsc hotel management and cratering tourism', '1442125507'),
(240, 17, 'makeshmuraleedharan', 'makeshmuraleedharan21@gmail.com', '', '+919746157346', '', '1year job training  complete', 'Bsc.hotel management &tourism;', '1442155491'),
(241, 17, 'makeshmuraleedharan', 'makeshmuraleedharan21@gmail.com', '', '+919746157346', '', '1year job training  complete', 'Bsc.hotel management &tourism;', '1442155495'),
(242, 13, 'Sanal Surendran', 'Sanalsurendran1992@gmail.com', '', '9562454711', 'n_sanal_(1)_(1)_(1)_(1)_(1).docx', 'Worked as Industrial Trainee in Front office department.(April-2012 to July-2012) at “Vivanta”, a concern of  TAJ Malabar, the 5 star Deluxe Hotel in Cochin, Kerala.\n? Worked as Team Member in Front office at Vivanta By Taj Begumpet, the 5 star hotel Begumpet, Hyderabad from 2012 august 20 to 2013 august 31.\n? Working as a front office Executive in, Hotel Niya Regency\nA Four Star luxury business hotel in Thrissur.', 'Diploma in front office operations from Govt. Food craft institute kalamassery.', '1442219557'),
(243, 13, 'Sanal Surendran', 'Sanalsurendran1992@gmail.com', '', '9562454711', 'n_sanal_(1)_(1)_(1)_(1)_(1)1.docx', '? Worked as Industrial Trainee in Front office department.(April-2012 to July-2012) at “Vivanta”, a concern of  TAJ Malabar, the 5 star Deluxe Hotel in Cochin, Kerala.\n? Worked as Team Member in Front office at Vivanta By Taj Begumpet, the 5 star hotel Begumpet, Hyderabad from 2012 august 20 to 2013 august 31.\n? Working as a front office Executive in, Hotel Niya Regency\nA Four Star luxury business hotel in Thrissur.', 'Diploma in Front office operation from Govt. Food craft institute Kalamassery', '1442219700'),
(244, 13, 'Dileep s', 'dileepdilz@yahoo.com', '', '7293649152', 'dileep_resume.docx', 'Fresher', 'Diploma in Aviation Hospitality Travel and tourism', '1442224743'),
(245, 19, 'Akhil Chacko', 'akhilchacko315@gmail.com', '', '8943137489', '', '4 Years', 'BAIHA(International Hospitality Administration)', '1442471947'),
(246, 19, 'Akhil Chacko', 'akhilchacko315@gmail.com', '', '8943137489', '', '4 Years', 'BA-IHA(International Hospitality Administration)', '1442472273'),
(247, 13, 'Ardra pavithran', 'ardratpavithran@gmail.com', '', '8281425224', '', 'Liaison Officer in National Games (31-1-2015 to 14-2-2015).', 'SSLC\nPLUSTWO\nGRADUATE IN BACHELOR OF TOURISM STUDIES.\nDIPLOMA IN HOSPITALITY,TRAVEL AND CUSTOMER SERVICE.', '1442498503'),
(248, 13, 'NEETHU KISHORE', 'neethukishore58@gmail.com', '', '7736613913', 'NEETHU_KISHORE.docx', '1 month experience with inflight aviation academy as course coordinator.', 'b.com travel and tourism from siena college of professional studies,1 year diploma in aviation,hospitality and travel management from frankfinn institute of airhostess training.', '1442581607'),
(249, 20, 'milan gam', 'milan.panging@yahoo.com', '', '8156983431', 'JAMES.docx', '4 years', 'graduate', '1442648211'),
(250, 21, 'JINU JANARDANAN', 'jinumavelikara@gmail.com', '', '9744748129', 'JINU_RESUME.docx', '4 YEARS EXP IN OFFICE STAFF\n4 YEAR EXP IN ACCOUNTS', 'BCOM COURSE COMPLEATED', '1442756872'),
(251, 21, 'JINU JANARDANAN', 'jinumavelikara@gmail.com', '', '9744748129', 'JINU_RESUME1.docx', '4 YEARS EXP IN OFFICE STAFF\n4 YEAR EXP IN ACCOUNTS', 'BCOM COURSE COMPLEATED', '1442756876'),
(252, 21, 'Sijo Sebastian', 'sijosebastian90@gmail.com', '', '8547816158', 'SIJO_RESUMA_001_(3).docx', 'Two years working experiance as an accountant in a four star hotel', 'B com', '1442994335'),
(253, 21, 'Sijo Sebastian', 'sijosebastian90@gmail.com', '', '8547816158', 'SIJO_RESUMA_001_(3)1.docx', 'Two years working experiance as an accountant in a four star hotel', 'B com', '1442994343'),
(254, 21, 'Sijo Sebastian', 'sijosebastian90@gmail.com', '', '8547816158', 'SIJO_RESUMA_001_(3)2.docx', 'Two years working experiance as an accountant in a four star hotel', 'B com', '1442994349'),
(255, 21, 'Sijo Sebastian', 'sijosebastian90@gmail.com', '', '8547816158', 'SIJO_RESUMA_001_(3)3.docx', 'Two years working experiance as an accountant in a four star hotel', 'B com', '1442994350'),
(256, 21, 'Sijo Sebastian', 'sijosebastian90@gmail.com', '', '8547816158', 'SIJO_RESUMA_001_(3)4.docx', 'Two years working experiance as an accountant in a four star hotel', 'B com', '1442994350'),
(257, 21, 'Sijo Sebastian', 'sijosebastian90@gmail.com', '', '8547816158', 'SIJO_RESUMA_001_(3)5.docx', 'Two years working experiance as an accountant in a four star hotel', 'B com', '1442994351'),
(258, 21, 'Sijo Sebastian', 'sijosebastian90@gmail.com', '', '8547816158', 'SIJO_RESUMA_001_(3)6.docx', 'Two years working experiance as an accountant in a four star hotel', 'B com', '1442994352'),
(259, 21, 'Ambu B', 'ambubkadakkal@gmail.com', '', '9447722887', 'AMBU_Resume.docx', '1)Front Office Accountant at Somatheeram Ayurveda Group, Kovalam,Trivandrum (From 05/08/2013 to 6/08/15).\n\n2)•Worked as Accountant in Krishna Rubber Tech ,Kadakkal, Kollam.\n(From  11/7/2011 - 10/06/2013)', '•B com from SN College ,Punalur, Kollam', '1443167389'),
(260, 13, 'anver pn', 'anverpn@yahoo.com', '', '9995218297', 'ANVER_P.N_resume(1).docx', '1 Year', 'bsc airline tourism and hospitality management', '1443261133'),
(261, 21, 'Sony Xaviour', 'sonyxaviour@gmail.com', '', '9747723755', 'sony_xaviour_1.docx', '3 year', 'B Com, M com', '1443275613'),
(262, 21, 'abdul rasheed', 'rasheedktnr@gmail.com', '', '9526702340', 'new_rasheed_pf.pdf', '6 month experience', 'B.com', '1443440832'),
(263, 21, 'abdul rasheed', 'rasheedktnr@gmail.com', '', '9526702340', 'new_rasheed_pf1.pdf', '6 month experience', 'B.com', '1443440851'),
(264, 15, 'P.varsha manoharan', 'varshamanoharan20@gmail.com', '', '8447079508', 'varsha_second-3.doc', 'Fresher', 'Bcom from delhi university \ndiploma in travel and tourism and airport handling from Y.M.C.A in delhi', '1443502370'),
(265, 15, 'P.varsha manoharan', 'varshamanoharan20@gmail.com', '', '8447079508', 'varsha_second-31.doc', 'Fresher', 'Bcom from delhi university \ndiploma in travel and tourism and airport handling from Y.M.C.A in delhi', '1443502370'),
(266, 14, 'soumia pushpahasan', 'soumiapnair@gmail.com', '', '08086120297', 'Soumia_resume_updated.docx', '1 year as immigration consultant', 'MA English literature', '1443686142'),
(267, 16, 'Remendran', 'remendran_r@yahoo.in', '', '9995009837', 'Remendran.1.doc', 'Experience in chinese', 'Diploma in Hotel Management', '1444037139'),
(268, 20, 'HARESH MOHAN', 'haresh_hotcancer@rediffmail.com', '', '7558942871', 'BIO_DATA_HARESH_MAHARASTRA_(1).docx', '4 year experience in food and beverage services', 'BA', '1444294051'),
(269, 20, 'HARESH MOHAN', 'haresh_hotcancer@rediffmail.com', '', '7558942871', 'BIO_DATA_HARESH_MAHARASTRA_(1)1.docx', '4 year experience in food and beverage services', 'BA', '1444294064'),
(270, 19, 'HARESH MOHAN', 'haresh_hotcancer@rediffmail.com', '', '7558942871', 'BIO_DATA_HARESH_MAHARASTRA_(1)2.docx', '4 YEARS EXPERIENCE IN FOOD AND BEVERAGE SERVICES', 'BA', '1444294136'),
(271, 19, 'HARESH MOHAN', 'haresh_hotcancer@rediffmail.com', '', '7558942871', 'BIO_DATA_HARESH_MAHARASTRA_(1)3.docx', '4 YEARS EXPERIENCE IN FOOD AND BEVERAGE SERVICES', 'BA', '1444294137'),
(272, 15, 'BHAGYALAKSHMI V', 'bhagyalakshgmiv92@gmail.com', '', '9539112167', 'Copy_of_CV_with_Photo.docx', 'WORKED IN KINGSPACES BUILDERS PVT.LTD FOR THE LAST 1 YEAR AS CUSTOMER RELATIONS OFFICER.', 'BA ENGLISH LITERATURE WITH JOURNALISM AND AUDIO VISUAL COMMUNICATION.\nDOING MA ENGLISH AS DISTANCE EDUCATION IN IGNOU.', '1444912386'),
(273, 15, 'BHAGYALAKSHMI V', 'bhagyalakshgmiv92@gmail.com', '', '9539112167', 'Copy_of_CV_with_Photo1.docx', 'WORKED IN KINGSPACES BUILDERS PVT.LTD FOR THE LAST 1 YEAR AS CUSTOMER RELATIONS OFFICER.', 'BA ENGLISH LITERATURE WITH JOURNALISM AND AUDIO VISUAL COMMUNICATION.\nDOING MA ENGLISH AS DISTANCE EDUCATION IN IGNOU.', '1444912397'),
(274, 13, 'Jayaraj T K', 'jayaraj260590@gmail.com', '', '9496608759', 'JAYARAJ-RESUME.docx', 'Working as part time room boy at shalimar metro.', 'BTech fresher.', '1445172652'),
(275, 13, 'Jayaraj T K', 'jayaraj260590@gmail.com', '', '9496608759', 'JAYARAJ-RESUME1.docx', 'Working as part time room boy at shalimar metro.', 'BTech fresher.', '1445172660'),
(276, 13, 'Jayaraj T K', 'jayaraj260590@gmail.com', '', '9496608759', '', 'Working as part time room boy at shalimar metro.', 'BTech fresher.', '1445172671'),
(277, 13, 'Jayaraj T K', 'jayaraj260590@gmail.com', '', '9496608759', 'JAYARAJ-RESUME2.docx', 'Working as part time room boy at shalimar metro.', 'BTech fresher.', '1445172671'),
(278, 13, 'Jayaraj T K', 'jayaraj260590@gmail.com', '', '9496608759', 'JAYARAJ-RESUME3.docx', 'Working as part time room boy at shalimar metro.', 'BTech fresher.', '1445172672'),
(279, 14, 'Harikrishnan', 'menon.harikrishnan24@gmail.com', '', '+917356636967', 'Hari_new_resume.docx', '5 years', 'MBA-Pursuing', '1446113194'),
(280, 13, 'SUDHA JACOB', 'sudhajacob115@gmail.com', '', '9746205268', 'Curriculam_Vitae-Sudha.doc', '3-4 years', 'MBA-Finance', '1446178169'),
(281, 21, 'SUDHA JACOB', 'sudhajacob115@gmail.com', '', '9746205268', 'Curriculam_Vitae-Sudha1.doc', '3 years', 'MBA-Finance', '1446178237'),
(282, 14, 'SUDHA JACOB', 'sudhajacob115@gmail.com', '', '9746205268', 'Curriculam_Vitae-Sudha2.doc', '3-4 years', 'MBA-Finance', '1446178281'),
(283, 18, 'Elias Laiju', 'laijuthottathil@yahoo.com', '', '00919747583658,918943355000', 'Copy_of_RESUME-_Laiju..doc', 'Overall 12 years experience as F& B professional in the management field and working with leading business Hotel groups. Looking for a carrier based position in an established organization, where I can impart my knowledge and experience to the optimum growth and mutual success of the endeavors.', '? Diploma in Hotel Management and Catering Technology from Indian Institute of Management studies in Cochin, 1994\n? Pre-Degree from Mahatma Gandhi University, India, 1990\n? Secondary School Certificate from, St.Thomas High School, Keezhillam, India, 1988', '1446277104'),
(284, 18, 'Elias Laiju', 'laijuthottathil@yahoo.com', '', '9747583658,918943355000', 'Copy_of_RESUME-_Laiju.1.doc', 'Overall 12 years experience as F& B professional in the management field and working with leading business Hotel groups. Looking for a carrier based position in an established organization, where I can impart my knowledge and experience to the optimum growth and mutual success of the endeavors.', '? Diploma in Hotel Management and Catering Technology from Indian Institute of Management studies in Cochin, 1994\n? Pre-Degree from Mahatma Gandhi University, India, 1990\n? Secondary School Certificate from, St.Thomas High School, Keezhillam, India, 1988', '1446277521'),
(285, 21, 'Anju Philip', 'anjuphilip021@gmail.com', '', '8714942595', 'new_resume.docx', 'Fresher', 'M.com(e-commerce)', '1446611897'),
(286, 13, 'Dinesh P.B', 'nishacpdinesh@gmail.com', '', '9914683880', 'Dinesh_P.B.doc', 'As a canteen vendor 10+', '10th', '1446722008'),
(287, 19, 'Dinesh P.B', 'nishacpdinesh@gmail.com', '', '99146 83880', 'Dinesh_P.B1.doc', 'As a canteen vendor 10+', '10th', '1446722620'),
(288, 19, 'Dinesh P.B', 'nishacpdinesh@gmail.com', '', '99146 83880', 'Dinesh_P.B2.doc', 'As a canteen vendor 10+', '10th', '1446722628'),
(289, 13, 'Teena', 'stg756@gmail.com', '', '9746771761', '', '8 years experience in reputed club  as front office assossiate', 'B Com', '1447247848'),
(290, 13, 'Teena', 'stg756@gmail.com', '', '9746771761', '', '8 years experience in reputed club  as front office assossiate', 'B Com', '1447247852'),
(291, 13, 'Palwinder Singh Sandhu', 'pawansandhu17@yahoo.com', '', '8437480490', 'PALWINDER_SINGH_SANDHU_RESUME.docx', 'fresher', 'B.com', '1447745497'),
(292, 13, 'ABDUL GAFFAR SAIT', 'agaffarsait@gmail.com', '', '9605255140', 'AG_SAIT.docx', 'Hi,\n\nI am having more than 20 years experience in Hospitality Industry and Corporate sector as Security supervisor & Safety supervisor,I have handled administration department also.I am looking for an opening in your firm which is suitable for my profile.\n\nRegards,\n\nA G Sait,\n9747703469', 'DEGREE', '1447757562'),
(293, 17, 'rajeesh', 'rajeesh9768@gmail.com', '', '+919072285299', 'Rajesh.K.R._Bio_Data_(3).docx', 'grand hotel cochin,travancore court cochin,mint and mustard united kingdom,cochin heritage ltd london', 'post graduation from cth London,bsc hotel management from bharathiyar university', '1448351328'),
(294, 19, 'rahul rajeev', 'rajeev00576@gmail.com', '', '+917025012257', 'rahul,_Biodata.docx', 'mint and mustard london,cochin heritage ltd London,malabar junction london ,kumarakom lake resort,kerala ,leela palace Bangalore', 'pgd in business administration from EBMA united kingdom ,bhm from banglore university', '1448351643'),
(295, 18, 'Elias Laiju', 'laijuthottathil@yahoo.com', '', '9747583658,918943355000', 'Copy_of_RESUME-_Laiju.2.doc', 'Overall 12 years experience as F& B professional in the management field and working with leading business Hotel groups. Looking for a carrier based position in an established organization, where I can impart my knowledge and experience to the optimum growth and mutual success of the endeavors', 'EDUCATIONAL QUALIFICATION\n\n? Diploma in Hotel Management and Catering Technology from Indian Institute of Management studies in Cochin, 1994\n? Pre-Degree from Mahatma Gandhi University, India, 1990\n? Secondary School Certificate from, St.Thomas High School, Keezhillam, India, 1988', '1448877372'),
(296, 14, 'Induja', 'indujamprabhakar@gmail.com', '', '9446869529', 'Induja_CV.doc', 'Fresher', 'Bsc foodtechnology and Qyality Assuarance', '1448906972'),
(297, 13, 'Basil Issac', 'bissac@aih.edu.in', '', '9930007482', 'CV_Basil_1.docx', 'worked as trainee manager at Mcdonald''s Restaurant Pvt Ltd. Mumbai', 'Bsc in Hospitality', '1449041882'),
(298, 13, 'SHYLESH KN', 'shyleshshanthinagar@gmail.com', '', '09946393800', 'SHYLESH_KN.docx', '1 and half year experienced as front office assistant', 'BA TRAVEL AND TOURISM MANAGEMENT, DAPM WITH IATA', '1449840154'),
(299, 13, 'PRASAD JOSEPH JOHN', 'prasadjosephjohn644@gmail.com', '', '9526837623', 'PRASAD_cv.doc', 'presently working in mermaid hotel vyttila from 08/06/2013', 'degree', '1450019103'),
(300, 13, 'muhammad shehin', 'muhammedshehin556@gmail.com', '', '9744217999', '', '6years', 'Bsc Hotel management and catering science.MBA Hr &Marketing;', '1450188551'),
(301, 13, 'muhammad shehin', 'muhammedshehin556@gmail.com', '', '9744217999', 'Shehin_Resume.docx', '6years', 'Bsc Hotel management and catering science.MBA Hr &Marketing;', '1450188554'),
(302, 13, 'muhammad shehin', 'muhammedshehin556@gmail.com', '', '9744217999', '', '6years', 'Bsc Hotel management and catering science.MBA Hr &Marketing;', '1450188563');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE IF NOT EXISTS `enquiry` (
  `enquiry_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hotel_master_id` int(20) NOT NULL,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `gallery_id` int(20) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(500) NOT NULL,
  `gallery_image` varchar(500) NOT NULL,
  `gallery_order` int(20) NOT NULL,
  `album_id` int(20) NOT NULL,
  `hotel_master_id` int(20) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_name`, `gallery_image`, `gallery_order`, `album_id`, `hotel_master_id`) VALUES
(22, 'Olive Eva 2', 'gallery-28.jpg', 2, 11, 1),
(23, 'Olive Eva 3', 'gallery-3.jpg', 3, 11, 1),
(24, 'Olive Eva 4', 'gallery-4.jpg', 4, 11, 1),
(25, 'Olive Eva 5', 'gallery-5.jpg', 5, 11, 1),
(26, 'Olive Eva 6', 'gallery-6.jpg', 6, 11, 1),
(27, 'Olive Eva 7', 'gallery-7.jpg', 7, 11, 1),
(28, 'Olive Eva 8', 'gallery-8.jpg', 8, 11, 1),
(29, 'Olive Eva 9', 'gallery-9.jpg', 9, 11, 1),
(30, 'Olive Eva 10', 'gallery-10.jpg', 10, 11, 1),
(36, 'Olivia', '6.jpg', 6, 17, 2),
(40, 'Suite Bathroom', '12.jpg', 1, 20, 2),
(43, 'Suite Living Room ', '42.jpg', 4, 20, 2),
(45, 'Suite Bed Room', '61.jpg', 6, 20, 2),
(46, 'Swimming Pool', '13.jpg', 1, 21, 2),
(47, 'Swimming Pool', '22.jpg', 2, 21, 2),
(48, 'Afghan', 'VTL_0129.JPG', 1, 18, 2),
(49, 'Afghan ', 'VTL_0141.JPG', 2, 18, 2),
(50, 'Afghan', 'VTL_0145.JPG', 3, 18, 2),
(51, 'Afghan', 'VTL_0149.JPG', 4, 18, 2),
(52, 'Olivia', 'VTL_0105.JPG', 3, 17, 2),
(53, 'Olivia', 'VTL_0109.JPG', 4, 17, 2),
(54, 'Swimming Pool', 'VTL_0181.JPG', 3, 21, 2),
(55, 'GYM', 'IMG_7662.jpg', 1, 22, 2),
(56, 'GYM', 'IMG_7669.jpg', 2, 22, 2),
(57, 'GYM', 'IMG_7671.jpg', 3, 22, 2),
(58, 'Executive Room', 'EXECUTIVE.JPG', 4, 20, 2),
(59, 'Deluxe Room', 'Deluxe.jpg', 5, 20, 2),
(60, 'ATHENA-1', 'IMG_3642.JPG', 1, 19, 2),
(61, 'ATHENA -2', 'IMG_3659.JPG', 2, 19, 2),
(62, 'ATHENA-3', 'IMG_3614.JPG', 3, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gm_enquiry`
--

CREATE TABLE IF NOT EXISTS `gm_enquiry` (
  `enquiry_id` int(20) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `hotel_master_id` int(20) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`enquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_master`
--

CREATE TABLE IF NOT EXISTS `hotel_master` (
  `hotel_master_id` int(20) NOT NULL AUTO_INCREMENT,
  `hotel_master_name` varchar(500) NOT NULL,
  PRIMARY KEY (`hotel_master_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hotel_master`
--

INSERT INTO `hotel_master` (`hotel_master_id`, `hotel_master_name`) VALUES
(1, 'Olive Eva'),
(2, 'Olive Down Town');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(20) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(500) NOT NULL,
  `date_added` date NOT NULL,
  `news_image` varchar(500) NOT NULL,
  `news_content` text NOT NULL,
  `news_order` int(20) NOT NULL,
  `category` int(20) NOT NULL,
  `day_name` varchar(500) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `date_added`, `news_image`, `news_content`, `news_order`, `category`, `day_name`) VALUES
(11, 'Honeymoon Package at Olive Downtown,Cochin', '2015-08-25', 'Room.jpg', '1.	Honey Moon Package  -Rs. 9999/-(02 nights/03 days)\n\n•	Welcome Drink on Arrival\n•	Breakfast in the Room.\n•	Romantic Candle Light Dinner by the Pool overlooking the Night Life of Cochin City.\n•	Floral Bed Décor\n•	Complimentary Cake\n•	Fruit Basket / Cookies\n', 4, 1, ''),
(12, 'Afghan Restaurant Inauguration', '2015-09-10', 'AFGHAN_10.jpg', 'The new offer from "Olive Downtown" for all the foodies--"Afghan" the fine dining Speciality Restaurant,now open from "7pm to 11pm".....Savour your taste buds, delight your eyes, and satisfy your hunger with the "Cuisine of the Middle East"....', 3, 1, ''),
(19, '<b>Discount Offer</b> @ Olive Downtown', '2015-11-02', 'Discount2.jpg', '', 5, 2, ''),
(20, '<b>Seafood</b> Friday', '2015-11-02', 'Seaday_Fridy.jpg', 'Seaday Fridays is more than just a dining experience--Fresh seafood, cooked to perfection at fantastic prices. Seaday Friday''s continue each week, offering up delectable culinary delights of the seafood variety while you dine in with live music.', 6, 2, ''),
(21, '<b>Sunday-Funday</b> -Brunch?', '2015-11-02', 'Sunday.jpg', 'Sunday is a day to feast and celebrate, a day to stuff yourself with all the goodies you looked away from through the week. “Sunday Funday Brunch at Olivia-The All Day Dining Restaurant” at Olive Downtown at an exclusive 20% discount for the last Sunday of the month...Live music, free usage of pool & gym, free board games for kids, complimentary room for wash and change for groups of 10 or more people, be there....Nothing beats a good weekend with good food and a lazy Sunday afternoon...', 7, 2, ''),
(22, '<b>ODC</b>', '2015-11-03', 'ODC.jpg', 'Home catering Units, the “Olive Downtown Speciality”---Baby showers, kitty parties, bridal showers, birthday parties, theme parties and pre-wedding functions, even corporate gatherings, you name it and we have menus tailored to your specification...', 7, 2, ''),
(23, '<b>Banquet</b>- Athena', '2015-11-03', 'Athena.jpg', 'Athena-The hotel''s spacious function rooms provide a variety of alternatives for everything from the grand event to the more intimate business meeting. The professional team is available round the clock to ensure that your events are planned and executed to perfection. We''re here to make things happen for you.', 8, 2, ''),
(28, '<b>Weekend Corporate package</b>', '2015-11-18', 'corporate_package.jpg', '', 8, 2, ''),
(30, '<b>Mappila Food Festival</b>', '2015-12-07', 'Mappila.jpg', 'Mappila Food Festival @ Olivia', 9, 2, '11th Dec to 13th Dec');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(6, 'gilsontomy@gmail.com'),
(7, 'rvkumar51@gmail.com'),
(8, 'sintojs@gmail.com'),
(9, 'Subing833@gmail.com'),
(10, 'sudheeshvypukaran1990@gmail.com'),
(11, 'geosusanvarghese@yahoo.com'),
(12, 'Sava_battaut@yahoo.com'),
(13, 'ranjitantony@gmail.com'),
(14, 'ar@sleepinnovations.in'),
(15, 'rahul1974@gmail.com'),
(16, 'achuavantikha@gmail.com'),
(17, 'hibinpanat@gmail.com'),
(18, 'jai241963@gmail.com'),
(19, 'nedumjn@gmail.com'),
(20, 'nedumjn@gmail.com'),
(21, 'nedumjn@gmail.com'),
(22, 'jomyk09@gmail.com'),
(23, 'acochin2011@gmail.com'),
(24, 'rinoyjoseph@gmail.com'),
(25, 'jjfeats@rediffmail.com'),
(26, 'ssadanandan2483@gamil.com'),
(27, 'manucm2000@gmail.com'),
(28, 'essamnasr1979@gmail.com'),
(29, 'susilg@yahoo.coom'),
(30, 'sarahkuruvila09@gmail.com'),
(31, 'rinorenny@yahoo.com'),
(32, 'ayappally@gmail.com'),
(33, 'aniledattele@yahoo.com'),
(34, 'Saeedyaqoot@yahoo.com'),
(35, 'ullaspu@live.in');

-- --------------------------------------------------------

--
-- Table structure for table `room_availability_season`
--

CREATE TABLE IF NOT EXISTS `room_availability_season` (
  `room_availability_season_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_master_id` int(11) NOT NULL,
  `hotel_master_id` int(20) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `rate` varchar(50) NOT NULL,
  `rate_double` varchar(50) NOT NULL,
  `rate_extra_bed` int(11) NOT NULL,
  `availability` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  PRIMARY KEY (`room_availability_season_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE IF NOT EXISTS `room_master` (
  `room_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` int(20) NOT NULL,
  `no_adults` int(11) NOT NULL,
  `no_child` int(11) NOT NULL,
  `no_extra_bed` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `hotel_master_id` int(20) NOT NULL,
  PRIMARY KEY (`room_master_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`room_master_id`, `room_type`, `no_adults`, `no_child`, `no_extra_bed`, `description`, `image`, `hotel_master_id`) VALUES
(34, 1, 0, 0, 0, 'test', 'standard.jpg', 2),
(35, 2, 0, 0, 0, 'Test room', 'Deluxe.jpg', 2),
(36, 3, 0, 0, 0, 'Executive', 'EXECUTIVE.JPG', 2),
(37, 4, 0, 0, 0, 'Suite', 'Suite.jpg', 2),
(38, 2, 0, 0, 0, 'Deluxe Room', 'gallery-14.jpg', 1),
(39, 5, 0, 0, 0, 'Luxury Rooms', 'room-pop-2.jpg', 1),
(40, 6, 0, 0, 0, 'Suite rooms', 'room-pop-11.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room_type_master`
--

CREATE TABLE IF NOT EXISTS `room_type_master` (
  `room_type_id` int(20) NOT NULL AUTO_INCREMENT,
  `room_type_name` varchar(500) NOT NULL,
  PRIMARY KEY (`room_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `room_type_master`
--

INSERT INTO `room_type_master` (`room_type_id`, `room_type_name`) VALUES
(1, 'Standard Rooms'),
(2, 'Deluxe Rooms'),
(3, 'Executive Rooms'),
(4, 'Suite Rooms'),
(5, 'Luxury Rooms'),
(6, 'Luxury Suite Rooms');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `testimonial_id` int(20) NOT NULL AUTO_INCREMENT,
  `testimonial_title` varchar(500) NOT NULL,
  `testimonial_image` varchar(500) NOT NULL,
  `testimonial_place` varchar(500) NOT NULL,
  `testimonial_content` text NOT NULL,
  `testimonial_order` int(20) NOT NULL,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `address` text NOT NULL,
  `state` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `booking_id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `address`, `state`, `city`, `country`, `phone`) VALUES
(1, 0, '7f000001', 'administrator', 'c94c10eb5c88c80274fcf03c361f14eba5afd417', '09ce4775e1', 'admin@admin.com', NULL, NULL, NULL, NULL, 0, 1450245379, 1, NULL, NULL, NULL, '', '', '', '', NULL),
(39, 38, '', '', '', NULL, 'manaftvr@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Abdul Manaf', '', NULL, 'Easysoft Technologies, First Floor,Suraj Building\nOpp.Mathrubhumi, Azad Road, Kaloor', 'Kerala', 'Cochin', 'India', '9895567924'),
(40, 39, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Avirappattu House', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(41, 40, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'sad', 'Kerala', 'Mannarkkad', 'India', '9400431136'),
(42, 41, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Yen', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '434324'),
(43, 42, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Yen', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3434324'),
(47, 46, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Vinod', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '34324324'),
(48, 47, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Vinod', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '34324324'),
(49, 48, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Umesh', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '32434'),
(50, 49, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gayathri Sharma', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '45454353'),
(51, 50, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Haritha', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '343434'),
(52, 51, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Ambily ', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '543454543'),
(53, 52, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Test', 'Kerala', 'Kochi', 'India', '9400431136'),
(54, 53, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Ebin', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3434324'),
(55, 54, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Ebin', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3434324'),
(58, 57, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'KOchi', 'Kerala', 'Kochi', 'India', '9400431136'),
(59, 58, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'KOchi', 'Kerala', 'Kochi', 'India', '9400431136'),
(60, 59, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Sujoy', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '43434'),
(61, 60, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Vicent', '', NULL, '34343ff\nsdsadsadsads\nadsadsadsad\nsdsadsdsa', 'kerala', 'dfdsfdsf', 'India', '34324324324'),
(62, 61, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Vicent', '', NULL, '34343ff\nsdsadsadsads\nadsadsadsad\nsdsadsdsa', 'kerala', 'dfdsfdsf', 'India', '34324324324'),
(63, 62, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Vicent', '', NULL, '34343ff\nsdsadsadsads\nadsadsadsad\nsdsadsdsa', 'kerala', 'dfdsfdsf', 'India', '34324324324'),
(64, 63, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Test', '', NULL, 'Easysoft', 'Kerala', 'Kochi', 'India', '9400431136'),
(65, 64, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Mary', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '343434'),
(66, 65, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Mary', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '343434'),
(67, 66, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Fiza', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3213213'),
(68, 67, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Fiza', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3213213'),
(69, 68, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Mahesh', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3434324'),
(70, 69, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Mahesh', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3434324'),
(71, 70, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Mohan', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '4334324'),
(72, 71, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Mohan', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '4334324'),
(73, 72, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Booking', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '434324324'),
(74, 73, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Test', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(75, 74, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'sad', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(76, 75, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'Chavakkad', 'kerala', 'thrissur', 'India', '7025266776'),
(78, 77, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Test', 'Kerala', 'Kochi', 'India', '9400431136'),
(79, 78, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Test', 'Kerala', 'Kochi', 'India', '9400431136'),
(80, 79, '', '', '', NULL, 'subeshks@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subeshks', '', NULL, 'df', 'kerala', 'cochin', 'India', '7025266776'),
(81, 80, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'sdasdf', 'kerala', 'thrisusur', 'India', '9947085450'),
(82, 81, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'sdasdf', 'kerala', 'thrisusur', 'India', '9947085450'),
(83, 82, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'sfsf', 'kerala', 'fvfdsf', 'India', '909876786875765'),
(84, 83, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'sfsf', 'kerala', 'fvfdsf', 'India', '909876786875765'),
(85, 84, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'sfsf', 'kerala', 'fvfdsf', 'India', '909876786875765'),
(86, 85, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'sfsf', 'kerala', 'fvfdsf', 'India', '909876786875765'),
(98, 97, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Annapurna', '', NULL, 'sad', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(109, 108, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Test', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(110, 109, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh KS', '', NULL, 'sgfshj', 'kerala', 'cochin', 'India', '7025266776'),
(111, 110, '', '', '', NULL, 'fom.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Ajay Makkan', '', NULL, 'Guruvayoor\nThrissur', 'kerala', 'cochin', 'India', '7025266774'),
(112, 111, '', '', '', NULL, 'fom.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Ajay Makkan', '', NULL, 'Guruvayoor\nThrissur', 'kerala', 'cochin', 'India', '7025266774'),
(113, 112, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, 'ftgfdgdfg', 'kerala', 'kochi', 'India', '2314994'),
(114, 113, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Easysoft', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(115, 114, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'test1', '', NULL, 'dfjd', 'kerala', 'thrissur', 'India', '7025266776'),
(116, 115, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Test2', '', NULL, 'dsflcnl', 'kerala', 'thrissur', 'India', '7025266776'),
(117, 116, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'test3', '', NULL, 'dknf', 'kerala', 'thrissur', 'India', '7025266776'),
(118, 117, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'test4', '', NULL, 'dmncn', 'kerala', 'thrissur', 'India', '7025266776'),
(119, 118, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'test5', '', NULL, 'dbf', 'kerala', 'thrissur', 'India', '7025266776'),
(120, 119, '', '', '', NULL, 'slfjsldk@aljals.as', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Reciept', '', NULL, 'asdasdas\nadsadas\ndasdsda.\n', 'kerala', 'kochi', 'India', '035234902340'),
(121, 120, '', '', '', NULL, 'slfjsldk@aljals.as', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Reciept', '', NULL, 'asdasdas\nadsadas\ndasdsda.\n', 'kerala', 'kochi', 'India', '035234902340'),
(122, 121, '', '', '', NULL, 'test@test.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'SREEHARI SANTHAN', '', NULL, 'test', 'test', 'test', 'India', '9234567999'),
(123, 122, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Testing', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(124, 123, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'test', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(125, 124, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Test', '', NULL, 'test', 'Kerala', 'Kothamangalam', 'India', '9349992090'),
(126, 125, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Test', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(132, 131, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'test', 'Kerala', 'Kothamangalam', 'India', '9349992090'),
(133, 132, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilsona', '', NULL, 'Avirappattu House', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(134, 133, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'kc', 'kerala', 'tcr', 'India', '7025266776'),
(135, 134, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Aiswarya', '', NULL, 'hbhj', 'kerala', 'Thrissur', 'India', '7025266776'),
(136, 135, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Sivadha', '', NULL, 'sfvhjb', 'Keala', 'tcr', 'India', '7025266776'),
(137, 136, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Sudha', '', NULL, 'ajckadsh', 'kersaa', 'gacu', 'India', '7025266776'),
(138, 137, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'sukumaran', '', NULL, 'kjdhfh', 'kerala', 'tcr', 'India', '7025266776'),
(139, 138, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subeeshks', '', NULL, 'sf', 'kerala', 'thrissur', 'India', '7025266776'),
(140, 139, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subbeshhhhh', '', NULL, 'nadnfk', 'kearala', 'thrisdbjd', 'India', '7025266776'),
(141, 140, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'GM', '', NULL, 'Kanjiraparambil House\nAyodhya Nagar', 'dd', 'sd', 'India', '7025266776'),
(142, 141, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'dlx test', '', NULL, 'daf', 'dfd', 'df', 'India', '7025266776'),
(143, 142, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'DLX EXTRA', '', NULL, 'df', 'df', 'adfa', 'India', '7025266776'),
(144, 143, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'exe test', '', NULL, 'sdf', 'sdfs', 'sf', 'India', '7025266776'),
(145, 144, '', '', '', NULL, 'g@g.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'sdfsdf', '', NULL, 'dfg', 'dfgfdg', 'dfg', 'Andorra', '46746874687'),
(146, 145, '', '', '', NULL, 'g@g.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'sdfsdf', '', NULL, 'dfg', 'dfgfdg', 'dfg', 'Andorra', '46746874687'),
(147, 146, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'sd', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(148, 147, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'sx', '', NULL, 'sdf', 'sdf', 'Kothamangalam', 'India', '9400431136'),
(149, 148, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'asd', 'Kerala', 'asd', 'India', '9400431136'),
(150, 149, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '2314994'),
(151, 150, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, 'KAVITHA\nYUVAJANA SAMAJAM ROAD\nKADAVANTHRA', 'kerala', 'kochi', 'India', '2314994'),
(152, 151, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '2314994'),
(153, 152, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '2142143'),
(154, 153, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3432434'),
(155, 154, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3434'),
(156, 155, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '34324345'),
(157, 156, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Single Occupany', '', NULL, '34343ff', 'kerala', 'dfdsfdsf', 'India', '3434324'),
(158, 157, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Double Occupany', '', NULL, '232133213213', 'kerala', '23213', 'India', '3443432'),
(159, 158, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Single Occupany 2', '', NULL, 'wewqewqewqe', 'kerala', 'kochi', 'India', '23434324'),
(160, 159, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, '1 Single,1 Double+1 Extrabed', '', NULL, 'w2321323213', 'kerala', 'kochi', 'India', '242141241'),
(161, 160, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'test', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(162, 161, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, 'address1', 'kerala', 'Kochi', 'India', '3434'),
(163, 162, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, 'Address1,Address2', 'kerala', 'kochi', 'India', '3432432'),
(164, 163, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'abc', 'kerala', 'thrissur', 'India', '7025266776'),
(165, 164, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'hbhdahf', 'kers;', 'tch', 'India', '7025266776'),
(166, 165, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'DLX', '', NULL, 'd', 'kerala', 'tcr', 'India', '7025266776'),
(167, 166, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'DLX Single', '', NULL, 'fgd', 'ggdhdg', 'dhggd', 'India', '7025266776'),
(168, 167, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'dlx Double', '', NULL, 'fdqf', 'sda', 'af', 'India', '7025266776'),
(169, 168, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Deluxe Double one day', '', NULL, 'dfw', 'kerala', 'thrissur', 'India', '7025266776'),
(170, 169, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'dlx single 3 days', '', NULL, 'cdcda', 'kerala', 'thrissur', 'India', '7025266776'),
(171, 170, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'EXE One day double', '', NULL, 'cfd', 'kerala', 'thrissur', 'India', '7025266776'),
(172, 171, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'delux extrabed', '', NULL, 'dsfds', 'kerala', 'thrissur', 'India', '7025266776'),
(173, 172, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'abc', '', NULL, 'dcdw', 'kerala', 'thrissur', 'India', '7025266776'),
(174, 173, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Avirappattu House', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(175, 174, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'asd', 'Kerala', 'Kothamangalam', 'India', '9400431136'),
(176, 175, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, 'dgdfdfdfdgfd', 'ker', 'koch', 'India', '4554'),
(177, 176, '', '', '', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Nisha', '', NULL, 'sdsadsdsad', 'Kerala', 'ssss', 'India', '24324324'),
(178, 177, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'adf', 'kerala', 'thrissur', 'India', '7025266776'),
(182, 181, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Test', 'Kerala', 'Kochi', 'India', '9400431136'),
(183, 182, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'test', 'Kerala', 'Kochi', 'India', '9400431136'),
(184, 183, '', '', '', NULL, 'subeshks@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh (Single DLX)', '', NULL, 'Kadavanthra', 'Kerala', 'Thrissur', 'India', '7025266776'),
(185, 184, '', '', '', NULL, 'subeshks@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh (Double + Extra bed DLX)', '', NULL, '123', 'Kerala', 'Thrissur', 'India', '7025266776'),
(186, 185, '', '', '', NULL, 'subeshks@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh Double + Extra Bed 2 Rooms', '', NULL, 'sadas', 'Kerala', 'Thrissur', 'India', '7025266776'),
(187, 186, '', '', '', NULL, 'subeshks@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh (Double Extra Bed STD)', '', NULL, 'sda', 'Kerala', 'Thrissur', 'India', '7025266776'),
(188, 187, '', '', '', NULL, 'subeshks@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh (Double Suite)', '', NULL, 'sdvs', 'Kerala', 'Thrissur', 'India', '7025266776'),
(189, 188, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh EXE Singkle', '', NULL, 'sdgfsf', 'Kerala', 'Thrissur', 'India', '7025266776'),
(190, 189, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Rajeev', '', NULL, 'adfadf', 'Kerala', 'Thrissur', 'India', '7025266776'),
(191, 190, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh dlx 123', '', NULL, 'sds', 'Kerala', 'Thrissur', 'India', '7025266776'),
(192, 191, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh STD Single', '', NULL, 'sfvs', 'Kerala', 'Thrissur', 'India', '7025266776'),
(193, 192, '', '', '', NULL, 'gilsontomy@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'test', 'Kerala', 'Kochi', 'India', '9400431136'),
(194, 193, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'test', 'Kerala', 'Kochi', 'India', '9400431136'),
(195, 194, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh ', '', NULL, 'dsf', 'k', 't', 'India', '7025266776'),
(196, 195, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh LUX Double + EB', '', NULL, 'dfd', 'Kerala', 'Thrissur', 'India', '7025266776'),
(197, 196, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh LUX Double + EB 2', '', NULL, 'sadcad', 'Kerala', 'Thrissur', 'India', '7025266776'),
(198, 197, '', '', '', NULL, 'kssubesh@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh (Single DLX)', '', NULL, 'qwd', 'Kerala', 'Thrissur', 'India', '7025266776'),
(199, 198, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh DLX Double 1 Extra Bed', '', NULL, 'sadcas', 'Kerala', 'Thrissur', 'India', '7025266776'),
(200, 199, '', '', '', NULL, 'sales.eva@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Sanand', '', NULL, 'sdfdaf', 'Kerala', 'Thrissur', 'India', '7025266776'),
(201, 200, '', '', '', NULL, 'sales.eva@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Sanand 1', '', NULL, 'ss', 'Kerala', 'Thrissur', 'India', '7025266776'),
(202, 201, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'Chavakkad', 'Kerala', 'Thrissur', 'India', '7025266776'),
(203, 202, '', '', '', NULL, 'humaid@mbpetroleum.co.om', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'HUMAID ', '', NULL, 'Azaiba North  PO Box 695 ,PC 111 Sultanate of Oman', 'Kerala', 'Cochin', 'India', '0096899060602'),
(204, 203, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh ITM ', '', NULL, 'test', 'KJerala', 'Thrissur', 'India', '7025266776'),
(205, 204, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Subesh ITM-EB', '', NULL, 'Test', 'Kerala', 'Thrissur', 'India', '7025266776'),
(206, 205, '', '', '', NULL, 'gilsontomy@easysoftindia.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Gilson', '', NULL, 'Easysoft Technoilogies', 'Kerala', 'Kochi', 'India', '9400431136'),
(207, 206, '', '', '', NULL, 'subeshks@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'test', 'Kerala', 'Thrissur', 'India', '7025266776'),
(208, 207, '', '', '', NULL, 'ullasvp75@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'ullas', '', NULL, 'kadavanthra junction', 'KERALA', 'KOCHI', 'India', '7025266777'),
(209, 208, '', '', '', NULL, 'edwardjmca@hotmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Edward Joseph Morris', '', NULL, 'VALIYA VEEDU, SAKTHIKULANGARA, KOLLAM 691581, KERALA.\n\nCURRENT ADDRESS: P O BOX 46816, SHARJAH\n\n00971507626425', 'Kerala', 'Kollam', 'India', '9645650510'),
(210, 209, '', '', '', NULL, 'erqwer@asdfa.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'asdas', '', NULL, 'adfasdfadf', 'adfa', 'adefad', 'India', '3452352345'),
(211, 210, '', '', '', NULL, 'sandra.pavlovski@vivacolombia.co', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'SANTIAGO ANDRES CARDONA HERNANDEZ', '', NULL, 'PARQUE EMPRESARIAL MULTICENTRO, BODEGA 15\n', 'ANTIOQUIA', 'RIONEGRO', 'Colombia', '5743204646'),
(212, 211, '', '', '', NULL, 'Dctvm1@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Dennies chacko ', '', NULL, 'Tc 27/2019 chirkulam road statue trivandrum ', 'Kerala', 'Trivandrum ', 'India', '9446478452'),
(213, 212, '', '', '', NULL, 'reeshan8700@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Fathimath Yazid', '', NULL, 'hatha male maldives', 'Male', 'Maldives', 'Maldives', '009607748700'),
(214, 213, '', '', '', NULL, 'dileesh.info@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Dileesh', '', NULL, 'Dil Nivas\nPO Chalad.\nKannur 670014', 'Kerala', 'Kannur', 'India', '09562115966'),
(215, 214, '', '', '', NULL, 'dileesh.info@gmail.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Dileesh', '', NULL, 'Dil Nivas\nPO Chalad\nKannur 670014', 'Kerala', 'Kannur', 'India', '09562115966'),
(216, 215, '', '', '', NULL, 'itm.dt@olivehotels.com', NULL, NULL, NULL, NULL, 0, NULL, NULL, 'subesh', '', NULL, 'ege', 'kerala', 'thrissur', 'India', '9947085450');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
