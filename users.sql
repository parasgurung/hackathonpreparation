-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2021 at 03:49 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login_sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `donor_id` varchar(50) NOT NULL,
  `blood_group` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `donor_id` (`donor_id`),
  KEY `user_id` (`user_id`,`name`,`blood_group`,`age`,`gender`,`user_name`,`phone_number`,`address`,`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `name`, `donor_id`, `blood_group`, `age`, `gender`, `user_name`, `password`, `phone_number`, `address`, `date`) VALUES
(1, 914300294515822, 'Rahul Kharel', '666A', 'AB+', 20, 'Male', 'rahulkharel30', 'rahul123', 2147483647, 'Bhandara', '2021-06-27 09:16:26'),
(2, 4299615482909, 'Rajkumar Thapaliya', '6789AE', 'O+', 45, 'Male', 'raj123', 'raj123', 982712323, 'Bhandara', '2021-07-08 02:21:24'),
(5, 9223372036854775807, 'Kushal Pathak', 'cp9', 'AB+', 20, 'Male', 'kushal1', 'kushal1', 987654321, 'Bharatpur', '2021-06-27 12:07:57'),
(6, 7891549976607, 'paras', 'paras1', 'A-', 20, 'Male', 'root', 'usbw', 2147483647, 'mam', '2021-06-28 12:41:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
