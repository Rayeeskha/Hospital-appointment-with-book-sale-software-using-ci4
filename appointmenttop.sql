-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 09:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointmenttop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role` enum('1','2') NOT NULL COMMENT '''1''=> ''Admin'',''2''=> ''Appointment''',
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `email`, `photo`, `role`, `password`, `status`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', '0', '1', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-05 17:40:39'),
(3, 'Khan Rayees', 'user@gmail.com', '1621420158_9198d7ac5e67448f497b.jpg', '2', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-19 05:29:18'),
(4, 'test admin', 'testadmin@gmail.com', 'NotUploded', '2', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-23 03:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `apmnt_day_vise_sch`
--

CREATE TABLE `apmnt_day_vise_sch` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `start_time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_date` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `break_time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `breakendtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `schedule_time` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `schedule_list_id` int(11) DEFAULT NULL,
  `book_strtime` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Available','UnAvailable') COLLATE utf8_unicode_ci NOT NULL,
  `apmt_status` enum('Active','InActive') COLLATE utf8_unicode_ci NOT NULL,
  `booking_status` enum('Pending','Booked','Reject') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apmnt_day_vise_sch`
--

INSERT INTO `apmnt_day_vise_sch` (`id`, `doctor_id`, `start_time`, `booking_date`, `break_time`, `breakendtime`, `schedule_time`, `schedule_id`, `schedule_list_id`, `book_strtime`, `status`, `apmt_status`, `booking_status`) VALUES
(12, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '10:30', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(13, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '11:00', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(14, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '11:30', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(15, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '12:00', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(16, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '13:00', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(17, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '14:00', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(18, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '14:30', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(19, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '15:00', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(20, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '15:30', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(21, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '16:00', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(22, 10, '10:30:00', '2021-06-25', '12:30', '13:30', '16:30', 1, 1, '10:30:00', 'Available', 'Active', 'Pending'),
(23, 10, '10:30', '2021-06-26', '12:30', '13:30', '10:30', 1, 2, '10:30', 'Available', 'Active', 'Pending'),
(24, 10, '10:30', '2021-06-26', '12:30', '13:30', '11:00', 1, 2, '10:30', 'Available', 'Active', 'Pending'),
(25, 10, '10:30', '2021-06-26', '12:30', '13:30', '11:30', 1, 2, '10:30', 'Available', 'Active', 'Pending'),
(26, 10, '10:30', '2021-06-26', '12:30', '13:30', '12:00', 1, 2, '10:30', 'Available', 'Active', 'Pending'),
(27, 10, '10:30', '2021-06-29', '12:30', '13:30', '10:30', 1, 3, '10:30', 'Available', 'Active', 'Pending'),
(28, 10, '10:30', '2021-06-29', '12:30', '13:30', '11:00', 1, 3, '10:30', 'Available', 'Active', 'Pending'),
(29, 10, '10:30', '2021-06-29', '12:30', '13:30', '11:30', 1, 3, '10:30', 'Available', 'Active', 'Pending'),
(30, 10, '10:30', '2021-06-29', '12:30', '13:30', '12:00', 1, 3, '10:30', 'Available', 'Active', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `appoint_uid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N/A',
  `phone` bigint(20) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_date` date DEFAULT NULL,
  `cashamount` bigint(20) NOT NULL,
  `reference_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Payment_status` enum('Pending','SUCCESS','FAILED') COLLATE utf8_unicode_ci NOT NULL,
  `transiction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apmnt_created` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `booking_date` datetime NOT NULL,
  `Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `pro_price` bigint(20) DEFAULT NULL,
  `mrp_price` bigint(20) DEFAULT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `session_id`, `user_id`, `product_id`, `qty`, `pro_price`, `mrp_price`, `added_on`) VALUES
(3, '8087541', 1, 9, 2, 115, 125, '2021-06-05'),
(4, '8087541', 1, 8, 1, 135, 122, '2021-06-05'),
(7, '8268516', 1, 9, 2, 115, 125, '2021-06-05'),
(9, '6282641', NULL, 8, 1, 135, 122, '2021-06-06'),
(10, '3675967', 1, 9, 2, 115, 125, '2021-06-06'),
(11, '5189350', 1, 9, 2, 130, 130, '2021-06-06'),
(13, '6834608', NULL, 9, 2, 130, 130, '2021-06-08'),
(14, '8259926', NULL, 1, 1, 1000, 1200, '2021-06-08'),
(15, '8259926', NULL, 8, 1, 135, 122, '2021-06-08'),
(18, '8117376', NULL, 9, 1, 130, 130, '2021-06-08'),
(19, '8409682', NULL, 10, 1, 121, 121, '2021-06-08'),
(22, '5465145', NULL, 10, 4, 121, 121, '2021-06-09'),
(23, '5465145', 1, 9, 1, 130, 130, '2021-06-09'),
(24, '5465145', 1, 8, 1, 135, 122, '2021-06-09'),
(25, '1479226', NULL, 10, 1, 121, 121, '2021-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `desctiption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','DeActive') COLLATE utf8_unicode_ci NOT NULL,
  `added_date` date NOT NULL,
  `Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryname`, `desctiption`, `photo`, `status`, `added_date`, `Year`) VALUES
(4, 'Managing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', NULL, 'Active', '2021-05-23', 2021),
(5, 'teeth', 'teeth expert', NULL, 'Active', '2021-06-05', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `name`, `username`, `mobile`, `email`, `gender`, `country`, `address`, `password`, `status`, `created_at`) VALUES
(1, '8080704', 'Customer', 'customer', 9867543298, 'customer@gmail.com', 'Male', NULL, 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Deactive', '2021-05-09 04:02:47'),
(2, '2384191', 'deepak', 'deepak', 9919911802, 'divyrai222@gmail.com', 'Male', NULL, 'lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-09 12:32:07'),
(3, '7784868', 'test', 'testing', 9867543298, 'test@gmail.com', 'Male', NULL, 'jhjhkjhkhkjhkjhkjhkjh', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-15 02:43:31'),
(4, '5675313', 'demo', 'demo', 9696969696, 'demo@gmail.com', 'Male', NULL, 'fhdshdghd', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-15 02:48:00'),
(5, '7541262', 'Divy Rai', 'divyrai', 9696969696, 'divyrai@gmail.com', 'Male', NULL, 'tedipuliya lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-23 03:14:09'),
(6, '6643458', 'demo123456', 'demo123456', 1234567890, 'shaik@gmail.com', 'Male', NULL, 'kuwait city wewvscdv', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-24 07:45:33'),
(7, '4303991', 'Khan', 'Testing Team', 87659078, 'khan@gmail.com', 'Male', NULL, 'Hyderabad', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-24 08:31:10'),
(8, '7782215', 'divydeepak', 'divyrai', 12345678, 'divy@gmail.com', 'Male', NULL, 'lucknow tedipuliya vikashnag', '25d55ad283aa400af464c76d713c07ad', 'Active', '2021-05-24 05:14:04'),
(9, '8924236', 'Sheeba', 'Sheeba', 89765489, 'sheeba@gmail.com', 'Male', NULL, 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-26 08:23:15'),
(10, '3201576', 'Sheeba', 'Sheeba', 89765489, 'sheeba@gmail.com', 'Male', NULL, 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-26 08:23:32'),
(11, '5243361', 'Khan', 'Khan Rayees', 98769876, 'khan2@gmail.com', 'Male', NULL, 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Deactive', '2021-05-26 08:30:23'),
(12, '9594036', 'Shaikh', 'Shaik', 98765409, 'shaik2@gmail.com', 'Male', NULL, 'Kuwait', 'e10adc3949ba59abbe56e057f20f883e', 'Deactive', '2021-05-26 08:32:41'),
(13, '6183491', 'Rayees khan', 'Khan Rayees', 89765432, 'rayees@gmail.com', 'Male', NULL, 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-26 11:54:59'),
(14, '2249394', 'deepak', 'deepak', 89764598, 'deepak@gmail.com', 'Male', NULL, 'lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-27 12:45:51'),
(15, '4048853', 'Rayees khan', 'Khan Rayees', 98675432, 'khan34@gmail.com', 'Male', NULL, 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-27 12:51:02'),
(16, '9907597', 'Abdul', 'Khan', 9876543, 'abdul@gmail.com', 'Male', NULL, 'Kuwait', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-27 01:43:56'),
(17, '8513337', 'Rayees khan', 'Khan Rayees', 78659087, 'test4@gmail.com', 'Male', NULL, 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-27 02:02:28'),
(18, '8830368', 'alok', 'alok', 96965323, 'alok@gmail.com', 'Male', NULL, 'fdgjkhdfsgljsdbgjklsedhgil', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-27 03:11:49'),
(19, '2955405', 'Software', 'Software', 98765409, 'software@gmail.com', 'Male', NULL, 'Lucknow', 'eeafb716f93fa090d7716749a6eefa72', 'Active', '2021-05-27 03:30:20'),
(20, '5244485', 'Ddd', 'Tset', 95454580, 'rayeest@gmail.com', 'Male', NULL, 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-27 05:44:13'),
(21, '2037308', 'shaik', 'inaithulla', 94141089, 'shaikinaithulla@gmail.com', 'Male', NULL, 'kuwait city', '25f9e794323b453885f5181f1b624d0b', 'Active', '2021-05-27 01:33:19'),
(22, '7964764', 'test', 'Test123', 12345678, 'shamil.parikal@gmail.com', 'Male', NULL, 'asdfghjk', '68eacb97d86f0c4621fa2b0e17cabd8c', 'Active', '2021-05-29 04:46:34'),
(23, '6809771', 'test', 'Test1234', 12345678, 'ahmadbil48@gmail.com', 'Male', NULL, 'qwertyuio', 'f49eb853c6ef9f8a3d1b2a0572b44b2b', 'Active', '2021-05-29 04:47:57'),
(24, '8584858', 'demo123', 'inaithulla123', 94141089, 'shaikinaithulla123@gmail.com', 'Male', NULL, 'kuwaitcity', '827ccb0eea8a706c4c34a16891f84e7b', 'Active', '2021-05-31 04:53:07'),
(25, '7426357', 'admin', 'admin', 94141089, 'admin@hotmail.com', 'Male', NULL, 'kuwait admin', '0e7517141fb53f21ee439b355b5a1d0a', 'Active', '2021-05-31 05:04:53'),
(26, '2457244', 'gdemo', 'fdemo', 23569874, 'gdemo@gmail.com', 'Male', NULL, 'ddsgsdgsdfg', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-05-31 07:53:01'),
(27, '9344267', 'Rayees', 'khan', 90786543, 'rayees3@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-01 05:46:07'),
(28, '2726147', 'deepak', 'kumar', 89765498, 'deepak8@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-01 05:49:55'),
(29, '2892783', 'shaik', 'inaithulla', 94141089, 'shaik1@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-01 12:19:30'),
(30, '1628934', 'divy', 'rai', 89898989, 'divy222@gmail.com', NULL, NULL, NULL, '96e79218965eb72c92a549dd5a330112', 'Active', '2021-06-05 05:00:50'),
(31, '8071273', 'divytest', 'dfgdg', 23232323, 'testdemo@gmail.com', NULL, NULL, NULL, '96e79218965eb72c92a549dd5a330112', 'Active', '2021-06-06 12:58:16'),
(32, '5979536', 'Rayeess', 'Rayeess', 43433490, 'rayees678@gmail.com', NULL, NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-06 02:38:34'),
(33, '3597986', 'Testing', 'test', 9876543, 'test2@gmail.com', NULL, 'kuwait', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-08 01:56:06'),
(34, '3616302', 'khan', 'Rayees', 89675498, 'khanrayees@gmail.com', NULL, 'kuwait', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-08 01:59:38'),
(35, '9487443', 'Tes', 'test2', 98674598, 'testingsoft@gmail.com', NULL, 'kuwait', 'Lucknoow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-08 02:01:01'),
(36, '8094782', 'deep', 'rai', 23322323, 'deeprai@gmail.com', NULL, 'kuwait', 'sdsgskhdfshdfksjk', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-08 08:11:19'),
(37, '6214206', 'test', 'test', 87896754, 'tsss@gmail.com', NULL, 'kuwait', 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-08 10:53:06'),
(38, '3617731', 'Khan Rayees', 'khan', 87896754, 'rayeesinfotech@gmail.com', NULL, 'kuwait', 'Lucknow', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-08 12:58:52'),
(39, '4197784', 'shaik', 'inayath', 94141089, 'support@gulfnetwork.net', NULL, 'kuwait', 'kuwait city', 'a183a55f5e81b430f6d70165f047d3a6', 'Active', '2021-06-09 12:45:23'),
(40, '4715196', 'front', 'test', 23252526, 'fronttest@gmail.com', NULL, 'kuwait', 'lkldfhgldfhgdkfj', 'e10adc3949ba59abbe56e057f20f883e', 'Active', '2021-06-11 04:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `departmentname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desctiption` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','Deactive') COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentname`, `desctiption`, `photo`, `status`, `added_date`, `Year`) VALUES
(4, 'psychology', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text.', 'NotUploded', 'Active', '2021-05-23 03:55:31', 2021),
(5, 'heart', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 'NotUploded', 'Active', '2021-05-23 03:41:43', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `doc_schedule`
--

CREATE TABLE `doc_schedule` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `givenperiod` bigint(20) NOT NULL,
  `break_time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `breakendtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','InActive') COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_schedule`
--

INSERT INTO `doc_schedule` (`id`, `doctor_id`, `givenperiod`, `break_time`, `breakendtime`, `status`, `added_date`) VALUES
(1, 10, 30, '12:30', '13:30', 'Active', '2021-06-19 06:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `doc_schedule_list`
--

CREATE TABLE `doc_schedule_list` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `givendate` date NOT NULL,
  `giventime` time NOT NULL,
  `givenperiod` bigint(20) NOT NULL,
  `endtime` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Active','InActive') COLLATE utf8_unicode_ci NOT NULL,
  `booking_status` enum('Available','UnAvailable') COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `Year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doc_schedule_list`
--

INSERT INTO `doc_schedule_list` (`id`, `doctor_id`, `schedule_id`, `givendate`, `giventime`, `givenperiod`, `endtime`, `status`, `booking_status`, `added_date`, `Year`) VALUES
(1, 10, 1, '2021-06-25', '10:30:00', 30, '16:30', 'Active', 'Available', '2021-06-19 05:12:51', NULL),
(2, 10, 1, '2021-06-26', '10:30:00', 30, '12:30', 'Active', 'Available', '2021-06-19 06:53:38', NULL),
(3, 10, 1, '2021-06-29', '10:30:00', 30, '12:30', 'Active', 'Available', '2021-06-19 06:53:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` date NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(6, 'holiday', '2021-06-22', '2021-05-04 00:00:00'),
(7, 'leave', '2021-06-28', '2021-06-05 00:00:00'),
(8, 'dfdgdfhdf', '2021-06-30', '2021-06-03 00:00:00'),
(9, 'holiday', '2021-06-25', '2021-06-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `alternative_mobile` bigint(20) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `total_quantity` bigint(20) NOT NULL,
  `total_amount` bigint(20) NOT NULL,
  `optionaladdress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_status` enum('Pending','Accept','Ontheway','Delivered','Cancel') COLLATE utf8_unicode_ci NOT NULL,
  `Payment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payment_status` enum('Pending','SUCCESS','FAILED') COLLATE utf8_unicode_ci DEFAULT NULL,
  `Transiction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_id`, `firstname`, `lastname`, `companyname`, `email`, `mobile`, `alternative_mobile`, `address`, `total_quantity`, `total_amount`, `optionaladdress`, `city`, `zipcode`, `order_status`, `Payment_type`, `Payment_status`, `Transiction_id`, `created_at`) VALUES
(1, 38, '5642127', 'Khan Rayees', NULL, NULL, 'rayeesinfotech@gmail.com', 87896754, 87654378, 'Kuwait', 3, 1256, NULL, 'Kuwait', NULL, 'Pending', 'Gatway', 'SUCCESS', '100202116183764458', '2021-06-10 08:40:29'),
(2, 38, '7153582', 'Khan Rayees', NULL, NULL, 'rayeesinfotech@gmail.com', 87896754, 87654378, 'Kuwait', 1, 121, NULL, 'Kuwait', NULL, 'Pending', 'COD', 'Pending', NULL, '2021-06-10 08:49:38'),
(3, 5, '8688327', 'deepak', NULL, NULL, 'deepak@gmail.com', 96964366, 9696436661, 'tdutdudfiyfiguogou', 1, 121, NULL, 'lucknow3256236', NULL, 'Pending', 'COD', 'Pending', NULL, '2021-06-11 03:57:53'),
(4, 5, '5292592', 'deepak', NULL, NULL, 'deepak@gmail.com', 96964366, 9696436661, 'tdutdudfiyfiguogou', 1, 1000, NULL, 'lucknow3256236', NULL, 'Accept', 'Gatway', 'SUCCESS', '100202116200963684', '2021-06-11 03:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `pro_price` bigint(20) NOT NULL,
  `session_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `order_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_order` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ord_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `product_id`, `pro_price`, `session_id`, `qty`, `order_id`, `total_order`, `ord_status`, `order_on`) VALUES
(1, 38, 8, 135, '3649781', 1, '5642127', '3', '', '2021-06-10 08:41:27'),
(2, 38, 1, 1000, '3649781', 1, '5642127', '3', '', '2021-06-10 08:41:27'),
(3, 38, 10, 121, '3649781', 1, '5642127', '3', '', '2021-06-10 08:41:27'),
(4, 38, 10, 121, '5574831', 1, '7153582', '1', '', '2021-06-10 08:49:38'),
(5, 5, 10, 121, '8294602', 1, '8688327', '1', '', '2021-06-11 03:57:53'),
(6, 5, 1, 1000, '5706037', 1, '5292592', '1', 'Accept', '2021-06-11 03:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `productname` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mrpprice` bigint(20) DEFAULT NULL,
  `price` bigint(20) NOT NULL DEFAULT 0,
  `stock` bigint(20) DEFAULT NULL,
  `desctiption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longdesc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SKU` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` date NOT NULL,
  `Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `productname`, `mrpprice`, `price`, `stock`, `desctiption`, `longdesc`, `photo`, `SKU`, `status`, `added_date`, `Year`) VALUES
(1, 2, 'Managine Dr Book', 1200, 1000, -3, 'Managing Dr Book Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '1620483794_a311e629a6f157cd550d.jpg', NULL, 'Active', '2021-05-27', 2021),
(8, 4, 'test book', 122, 135, 5, '12Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '1621758890_8782a7f4f0ed80d05955.jpg', 'test23', 'Active', '2021-05-24', 2021),
(9, 5, 'What Come', 130, 0, 10, '12Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor', '12Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor', '1622118471_6f2ffcfd5025417081a3.jpg', 'wc223', 'Active', '2021-06-06', 2021),
(10, 5, 'what new', 121, 0, 23, '12Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor', '12Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor', '1622118532_5961450e6aba924f6bc2.jpg', 'wn56', 'Active', '2021-06-08', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `products_image`
--

CREATE TABLE `products_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productimage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products_image`
--

INSERT INTO `products_image` (`id`, `product_id`, `productimage`, `type`) VALUES
(1, 6, '5a7212ea5d494067328b45a0.w800.jpg', 'image/jpeg'),
(2, 6, '58f5dd69354940e0118b4567.w800.jpg', 'image/jpeg'),
(3, 6, '94209731-table-of-a-medical-student-with-stethoscope-and-books.jpg', 'image/jpeg'),
(4, 6, '96127272-medical-student-textbooks-with-pencil-and-multicolor-bookmarks-and-stethoscope-isolated-on-white.jpg', 'image/jpeg'),
(5, 7, '5a7212ea5d494067328b45a0.w800.jpg', 'image/jpeg'),
(6, 7, '58f5dd69354940e0118b4567.w800.jpg', 'image/jpeg'),
(7, 7, '94209731-table-of-a-medical-student-with-stethoscope-and-books.jpg', 'image/jpeg'),
(8, 7, '96127272-medical-student-textbooks-with-pencil-and-multicolor-bookmarks-and-stethoscope-isolated-on-white.jpg', 'image/jpeg'),
(9, 7, 'depositphotos_11944345-stock-photo-old-medical-books.jpg', 'image/jpeg'),
(10, 8, 'top-10-fiction-2019.jpg', 'image/jpeg'),
(11, 9, 'Inline image_Trending Books_150.jpg', 'image/jpeg'),
(12, 10, 'books-to-read-april-whatcomesafter.jpg', 'image/jpeg'),
(13, 11, '12092019_photo_123801-1020x680.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `companyname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` bigint(20) NOT NULL,
  `alternative_mobile` bigint(20) DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `ctratedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`id`, `user_id`, `username`, `email`, `companyname`, `mobile`, `alternative_mobile`, `city`, `zipcode`, `address`, `ctratedAt`) VALUES
(1, 1, 'divy rai', 'divyrai222@gmail.com', 'demo123', 90909087, 89675423, 'lucknow', '226022', 'vikash nagar lko', '2021-05-11 12:56:28'),
(2, 1, 'Rayees Khan', 'rayeeskhan@gmail.com', 'Software Testing', 87659078, 2387459022, 'Lucknow', '44505', 'Balrampur UP India', '2021-05-12 12:28:11'),
(3, 7, 'Al Ahmed', 'ahmed@gmail.com', 'Software', 87659078, 89675423, 'Kuwait', '226026', 'Kuwait ', '2021-05-24 08:35:15'),
(4, 8, 'deepkarai', 'deepakrai@gmail.com', 'demo123', 12345678, 1234567890, 'lucknow', '226022', 'lucknow tedipuliya vikash nagar', '2021-05-24 05:16:56'),
(5, 5, 'deepak', 'deepak@gmail.com', 'gdfdg', 96964366, 9696436661, 'lucknow3256236', '226022', 'tdutdudfiyfiguogou', '2021-05-25 03:23:24'),
(6, 13, 'Khan Rayees', 'rayees@gmail.com', 'testing', 90786534, 90876534, 'Lucknow', '226026', 'Lucknow', '2021-05-26 11:57:01'),
(7, 29, 'shaik', 'shaik@gmail.com', 'gulfnetwork', 94141089, 0, 'kuwait', '15000', 'hello', '2021-06-01 12:26:09'),
(8, 13, 'Testing', 'testingsoft@gmail.com', NULL, 98765498, 0, 'Kuwait', NULL, 'Lucknow', '2021-06-03 07:30:34'),
(10, 13, 'Khan Rayees', 'khanrayees@gmail.com', NULL, 87896754, 87654378, 'Tulsipur', NULL, 'Uttar pradesh2', '2021-06-08 02:38:17'),
(11, 36, 'deep rai', 'deep@gmail.com', NULL, 63636363, 23232323, 'kuwait', NULL, 'lucknow uttar pradesh', '2021-06-08 08:12:26'),
(12, 36, 'deepak rai', 'deepak@gmail.com', NULL, 56565656, 45454545, 'lucknow', NULL, 'second address from test', '2021-06-08 08:16:07'),
(13, 38, 'Khan Rayees', 'rayeesinfotech@gmail.com', NULL, 87896754, 87654378, 'Kuwait', NULL, 'Kuwait', '2021-06-08 12:59:42'),
(14, 39, 'shaik', 'support@gulfnetwork.net', NULL, 94141089, 94141089, 'kuwait', NULL, 'kuwait', '2021-06-09 12:46:35'),
(15, 13, 'Khan', 'rayeesinfotech@gmail.com', NULL, 98675423, 87563498, 'Tulsipur', NULL, 'Balrampur2', '2021-06-09 09:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `staff_member`
--

CREATE TABLE `staff_member` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Speciality` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fee` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `identity` int(11) NOT NULL DEFAULT 0,
  `staff_status` enum('Active','InActive') COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `Year` year(4) NOT NULL,
  `leaveid` int(11) DEFAULT 1,
  `top_doc` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_member`
--

INSERT INTO `staff_member` (`id`, `user_id`, `department_id`, `name`, `mobile`, `email`, `Speciality`, `photo`, `fee`, `identity`, `staff_status`, `added_date`, `Year`, `leaveid`, `top_doc`) VALUES
(5, '7401887', 4, 'Dr. Mona Al Hamdan', 99900212, 'abdullah@gmail.com', '						    						    						    																											', 'NotUploded', '30', 0, 'Active', '2021-06-05 05:17:48', 2021, 1, 'admin'),
(8, '5867796', 5, 'Testing', 89675432, 'testing12@gmail.com', '						    testing						', '1622547338_5f67709d467b9da37ef6.pdf', '100', 0, 'Active', '2021-06-08 08:22:18', 2021, 1, NULL),
(9, '3716028', 5, 'deepak', 23232323, 'deepak@gmail.com', '						    						    fdfdfghsdfdhdhshfd												', '1622960892_67764f41ac4fadca92df.png', '60', 1, 'Active', '2021-06-08 02:44:52', 2021, 1, NULL),
(10, '7852263', 5, 'Rayees khan', 98765499, 'rayees@gmail.com', '', '1624094683_4d0ee7d8a246947654bb.jpg', '40', 0, 'Active', '2021-06-19 04:24:43', 2021, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `dummypass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` datetime NOT NULL,
  `Year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `dummypass`, `address`, `photo`, `status`, `added_date`, `Year`) VALUES
(1, 'Rayees khan', 'rayees@gmail.com', 9078654309, '123456', 'test', 'NotUploded', 'Active', '2021-05-19 01:58:55', 2021),
(4, 'Khan Rayees', 'user@gmail.com', 9888994344, '123456', NULL, '1621420158_9198d7ac5e67448f497b.jpg', 'Active', '2021-05-19 05:29:18', 2021),
(5, 'test admin', 'testadmin@gmail.com', 96969696, '123456', NULL, 'NotUploded', 'Active', '2021-05-23 03:53:34', 2021);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apmnt_day_vise_sch`
--
ALTER TABLE `apmnt_day_vise_sch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appoint_uid` (`appoint_uid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_schedule`
--
ALTER TABLE `doc_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_schedule_list`
--
ALTER TABLE `doc_schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_member`
--
ALTER TABLE `staff_member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `apmnt_day_vise_sch`
--
ALTER TABLE `apmnt_day_vise_sch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doc_schedule`
--
ALTER TABLE `doc_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doc_schedule_list`
--
ALTER TABLE `doc_schedule_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_image`
--
ALTER TABLE `products_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff_member`
--
ALTER TABLE `staff_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
