-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 10:58 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_sphone`
--

-- --------------------------------------------------------

--
-- Table structure for table `back_camera`
--

CREATE TABLE `back_camera` (
  `back_camera_id` int(11) NOT NULL,
  `min_back_camera_quality_range` int(5) NOT NULL,
  `max_back_camera_quality_range` int(5) NOT NULL,
  `back_camera_bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `back_camera`
--

INSERT INTO `back_camera` (`back_camera_id`, `min_back_camera_quality_range`, `max_back_camera_quality_range`, `back_camera_bobot`) VALUES
(1, 0, 7, 1),
(2, 8, 15, 2),
(3, 16, 31, 3),
(4, 32, 63, 4),
(5, 64, 99999, 5);

-- --------------------------------------------------------

--
-- Table structure for table `battery`
--

CREATE TABLE `battery` (
  `battery_id` int(5) NOT NULL,
  `min_battery_capacity_range` int(5) NOT NULL,
  `max_battery_capacity_range` int(5) NOT NULL,
  `battery_bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `battery`
--

INSERT INTO `battery` (`battery_id`, `min_battery_capacity_range`, `max_battery_capacity_range`, `battery_bobot`) VALUES
(1, 0, 1999, 1),
(2, 2000, 2999, 2),
(3, 3000, 3999, 3),
(4, 4000, 4999, 4),
(5, 5000, 99999, 5);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Xiaomi'),
(4, 'Oppo'),
(5, 'Realme'),
(6, 'Vivo');

-- --------------------------------------------------------

--
-- Table structure for table `front_camera`
--

CREATE TABLE `front_camera` (
  `front_camera_id` int(5) NOT NULL,
  `min_front_camera_quality_range` int(5) NOT NULL,
  `max_front_camera_quality_range` int(5) NOT NULL,
  `front_camera_bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `front_camera`
--

INSERT INTO `front_camera` (`front_camera_id`, `min_front_camera_quality_range`, `max_front_camera_quality_range`, `front_camera_bobot`) VALUES
(1, 0, 7, 1),
(2, 8, 15, 2),
(3, 16, 31, 3),
(4, 32, 63, 4),
(5, 64, 99999, 5);

-- --------------------------------------------------------

--
-- Table structure for table `memory`
--

CREATE TABLE `memory` (
  `memory_id` int(5) NOT NULL,
  `memory_capacity` int(5) NOT NULL,
  `memory_bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memory`
--

INSERT INTO `memory` (`memory_id`, `memory_capacity`, `memory_bobot`) VALUES
(1, 32, 1),
(2, 64, 2),
(3, 128, 3),
(4, 256, 4),
(5, 512, 5);

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `phone_id` int(5) NOT NULL,
  `price_id` int(5) NOT NULL,
  `ram_id` int(5) NOT NULL,
  `memory_id` int(5) NOT NULL,
  `processor_id` int(5) NOT NULL,
  `battery_id` int(5) NOT NULL,
  `front_camera_id` int(5) NOT NULL,
  `back_camera_id` int(5) NOT NULL,
  `brand_id` int(5) NOT NULL,
  `phone_name` varchar(255) NOT NULL,
  `phone_release_year` int(4) NOT NULL,
  `phone_price` int(20) NOT NULL,
  `phone_battery` int(5) NOT NULL,
  `phone_front_camera` int(5) NOT NULL,
  `phone_back_camera` int(5) NOT NULL,
  `phone_img` varchar(50) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `edit_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`phone_id`, `price_id`, `ram_id`, `memory_id`, `processor_id`, `battery_id`, `front_camera_id`, `back_camera_id`, `brand_id`, `phone_name`, `phone_release_year`, `phone_price`, `phone_battery`, `phone_front_camera`, `phone_back_camera`, `phone_img`, `added_by`, `edit_by`) VALUES
(1, 3, 2, 2, 3, 3, 2, 2, 1, 'iPhone 11', 2019, 7249000, 3110, 12, 12, 'iphone11.png', NULL, '1'),
(2, 3, 2, 3, 3, 3, 2, 2, 1, 'iPhone 11', 2019, 8999000, 3110, 12, 12, 'iphone11.png', NULL, '1'),
(3, 4, 2, 2, 3, 2, 2, 2, 1, 'iPhone 12', 2020, 10999000, 2815, 12, 12, 'iphone12.png', NULL, '1'),
(4, 4, 2, 3, 3, 2, 2, 2, 1, 'iPhone 12', 2020, 11999000, 2815, 12, 12, 'iphone12.png', NULL, '1'),
(5, 4, 2, 4, 3, 2, 2, 2, 1, 'iPhone 12', 2020, 13999000, 2815, 12, 12, 'iphone12.png', NULL, '1'),
(6, 5, 3, 3, 3, 2, 2, 2, 1, 'iPhone 12 Pro', 2020, 18799000, 2815, 12, 12, 'iphone12pro.png', NULL, '1'),
(7, 5, 3, 4, 3, 2, 2, 2, 1, 'iPhone 12 Pro', 2020, 20999000, 2815, 12, 12, 'iphone12pro.png', NULL, '1'),
(8, 5, 3, 5, 3, 2, 2, 2, 1, 'iPhone 12 Pro', 2020, 24999000, 2815, 12, 12, 'iphone12pro.png', NULL, '1'),
(9, 4, 2, 3, 3, 3, 2, 2, 1, 'iPhone 13', 2021, 12999000, 3240, 13, 12, 'iphone13.png', NULL, '1'),
(10, 4, 2, 4, 3, 3, 2, 2, 1, 'iPhone 13', 2021, 14999000, 3240, 13, 12, 'iphone13.png', NULL, '1'),
(11, 5, 2, 5, 3, 3, 2, 2, 1, 'iPhone 13', 2021, 18499000, 3240, 13, 12, 'iphone13.png', NULL, '1'),
(12, 5, 3, 3, 3, 3, 2, 2, 1, 'iPhone 13 Pro', 2021, 17999000, 3094, 12, 12, 'iphone13pro.png', NULL, '1'),
(13, 5, 3, 4, 3, 3, 2, 2, 1, 'iPhone 13 Pro', 2021, 19999000, 3094, 12, 12, 'iphone13pro.png', NULL, '1'),
(14, 5, 3, 5, 3, 3, 2, 2, 1, 'iPhone 13 Pro', 2021, 23499000, 3094, 12, 12, 'iphone13pro.png', NULL, '1'),
(15, 4, 3, 3, 3, 3, 2, 2, 1, 'iPhone 14', 2022, 14999000, 3279, 12, 12, 'iphone14.png', NULL, '1'),
(16, 5, 3, 4, 3, 3, 2, 2, 1, 'iPhone 14', 2022, 17999000, 3279, 12, 12, 'iphone14.png', NULL, NULL),
(17, 5, 3, 5, 3, 3, 2, 2, 1, 'iPhone 14', 2022, 21999000, 3279, 12, 12, 'iphone14.png', NULL, '1'),
(18, 5, 3, 3, 3, 3, 2, 4, 1, 'iPhone 14 Pro', 2022, 18999000, 3200, 12, 48, 'iphone14pro.png', NULL, NULL),
(19, 5, 3, 4, 3, 3, 2, 4, 1, 'iPhone 14 Pro', 2022, 21999000, 3200, 12, 48, 'iphone14pro.png', NULL, NULL),
(20, 5, 3, 5, 3, 3, 2, 4, 1, 'iPhone 14 Pro', 2022, 25999000, 3200, 12, 48, 'iphone14pro.png', NULL, NULL),
(21, 3, 2, 2, 3, 2, 1, 2, 1, 'iPhone SE Gen 3', 2022, 7999000, 2018, 7, 12, 'iphonese.png', NULL, NULL),
(22, 3, 2, 3, 3, 2, 1, 2, 1, 'iPhone SE Gen 3', 2022, 9499000, 2018, 7, 12, 'iphonese.png', NULL, NULL),
(23, 4, 2, 4, 3, 2, 1, 2, 1, 'iPhone SE Gen 3', 2022, 10999000, 2018, 7, 12, 'iphonese.png', NULL, NULL),
(24, 4, 4, 3, 4, 3, 2, 4, 2, 'Samsung Galaxy S23', 2023, 12999000, 3900, 12, 50, 's23.png', NULL, NULL),
(25, 4, 4, 4, 4, 3, 2, 4, 2, 'Samsung Galaxy S23', 2023, 13999000, 3900, 12, 50, 's23.png', NULL, NULL),
(26, 5, 4, 4, 4, 4, 2, 4, 2, 'Samsung Galaxy S23+', 2023, 15999000, 4700, 12, 50, 's23plus.png', NULL, NULL),
(27, 5, 5, 4, 4, 5, 2, 5, 2, 'Samsung Galaxy S23 Ultra', 2023, 19999000, 5000, 12, 200, 's23ultra.png', NULL, NULL),
(28, 5, 5, 5, 4, 5, 2, 5, 2, 'Samsung Galaxy S23 Ultra', 2023, 21999000, 5000, 12, 50, 's23ultra.png', NULL, NULL),
(29, 4, 4, 3, 4, 3, 2, 4, 2, 'Samsung Galaxy S22', 2022, 10999000, 3700, 10, 50, 's22.png', NULL, NULL),
(30, 4, 4, 3, 4, 4, 2, 4, 2, 'Samsung Galaxy S22+', 2022, 13749000, 4500, 10, 50, 's22plus.png', NULL, NULL),
(31, 4, 4, 3, 4, 5, 4, 5, 2, 'Samsung Galaxy S22 Ultra', 2022, 14999000, 5000, 40, 108, 's22ultra.png', NULL, NULL),
(32, 5, 5, 4, 4, 5, 4, 5, 2, 'Samsung Galaxy S22 Ultra', 2022, 15999000, 5000, 49, 108, 's22ultra.png', NULL, NULL),
(33, 5, 5, 4, 4, 4, 2, 4, 2, 'Samsung Galaxy Z Fold4', 2022, 24999000, 4400, 10, 50, 'zfold4.png', NULL, NULL),
(34, 4, 4, 3, 4, 3, 2, 2, 2, 'Samsung Galaxy Z Flip4', 2022, 13999000, 3700, 10, 12, 'zflip4.png', NULL, NULL),
(35, 4, 4, 4, 4, 3, 2, 2, 2, 'Samsung Galaxy Z Flip4', 2022, 14999000, 3700, 10, 12, 'zflip4.png', NULL, NULL),
(36, 5, 5, 5, 4, 4, 2, 2, 2, 'Samsung Galaxy Z Fold3 5G', 2021, 26999000, 4400, 10, 12, 'zfold35g.png', NULL, NULL),
(37, 3, 4, 3, 4, 3, 2, 2, 2, 'Samsung Galaxy Z Flip3 5G', 2021, 9999000, 3300, 10, 12, 'zflip35g.png', NULL, NULL),
(38, 1, 2, 1, 4, 5, 1, 4, 2, 'Samsung Galaxy A04', 2022, 1699000, 5000, 5, 50, 'a04.png', NULL, NULL),
(39, 1, 2, 2, 4, 5, 1, 4, 2, 'Samsung Galaxy A04s', 2022, 1999000, 5000, 5, 50, 'a04s.png', NULL, NULL),
(40, 1, 2, 3, 4, 5, 2, 4, 2, 'Samsung Galaxy A14', 2023, 2399000, 5000, 13, 50, 'a14.png', NULL, NULL),
(41, 1, 3, 3, 4, 5, 2, 4, 2, 'Samsung Galaxy A14', 2023, 2699000, 5000, 13, 50, 'a14.png', NULL, NULL),
(42, 1, 3, 3, 4, 5, 2, 4, 2, 'Samsung Galaxy A14 5G', 2023, 2999000, 5000, 13, 50, 'a145g.png', NULL, NULL),
(43, 2, 3, 3, 4, 5, 2, 4, 2, 'Samsung Galaxy A23 5G', 2022, 3999000, 5000, 8, 50, 'a235g.png', NULL, NULL),
(44, 3, 4, 4, 4, 4, 4, 5, 2, 'Samsung Galaxy A52s 5G', 2021, 5999000, 4500, 32, 64, 'a52s5g.png', NULL, NULL),
(45, 2, 3, 3, 4, 5, 2, 5, 2, 'Samsung Galaxy M23 5G', 2022, 3699000, 5000, 8, 50, 'm235g.png', NULL, NULL),
(46, 3, 4, 4, 4, 5, 4, 5, 2, 'Samsung Galaxy M53 5G', 2022, 6299000, 5000, 32, 108, 'm535g.png', NULL, NULL),
(47, 3, 4, 4, 4, 4, 4, 5, 3, 'Xiaomi 12', 2022, 7799000, 4500, 32, 50, 'xiaomi12.png', NULL, NULL),
(48, 4, 5, 4, 4, 4, 4, 5, 3, 'Xiaomi 12 Pro', 2022, 12999000, 4600, 32, 50, 'xiaomi12pro.png', NULL, NULL),
(49, 2, 4, 4, 4, 4, 4, 5, 3, 'Xiaomi 12 Lite 5G', 2022, 4799000, 4300, 32, 108, 'xiaomi12lite5g.png', NULL, NULL),
(50, 3, 4, 4, 4, 5, 3, 5, 3, 'Xiaomi 12T 5G', 2022, 6399000, 5000, 20, 108, 'xiaomi12t5g.png', NULL, NULL),
(51, 1, 1, 1, 2, 5, 1, 2, 3, 'Redmi A1', 2022, 1199000, 5000, 5, 8, 'redmia1.png', NULL, NULL),
(52, 1, 2, 2, 4, 5, 1, 2, 3, 'Redmi 9C', 2020, 17999000, 5000, 5, 13, 'redmi9c.png', NULL, NULL),
(53, 1, 2, 2, 4, 5, 2, 5, 3, 'Redmi 10', 2021, 2199000, 5000, 8, 50, 'redmi10.png', NULL, NULL),
(54, 1, 3, 3, 4, 5, 2, 4, 3, 'Redmi 10', 2021, 2599000, 5000, 8, 50, 'redmi10.png', NULL, NULL),
(55, 1, 2, 3, 4, 5, 1, 4, 3, 'Redmi 10 5G', 2022, 2349000, 5000, 5, 50, 'redmi105g.png', NULL, NULL),
(56, 1, 3, 3, 4, 5, 1, 4, 3, 'Redmi 10 5G', 2022, 2549000, 5000, 5, 50, 'redmi105g.png', NULL, NULL),
(57, 1, 2, 2, 4, 5, 1, 2, 3, 'Redmi 10A', 2022, 1549000, 5000, 5, 13, 'redmi10a.png', NULL, NULL),
(58, 1, 2, 2, 4, 5, 1, 4, 3, 'Redmi 10C', 2022, 1799000, 5000, 5, 50, 'redmi10c.png', NULL, NULL),
(59, 1, 2, 3, 4, 5, 1, 4, 3, 'Redmi 10C', 2022, 1899000, 5000, 5, 50, 'redmi10c.png', NULL, NULL),
(60, 1, 2, 3, 4, 5, 2, 4, 3, 'Redmi Note 11', 2022, 2299000, 5000, 13, 50, 'redminote11.png', NULL, NULL),
(61, 1, 3, 3, 4, 5, 2, 4, 3, 'Redmi Note 11', 2022, 2599000, 5000, 13, 50, 'redminote11.png', NULL, NULL),
(62, 2, 3, 3, 4, 5, 3, 5, 3, 'Redmi Note 11 Pro', 2022, 3399000, 5000, 16, 108, 'redminote11pro.png', NULL, NULL),
(63, 2, 4, 3, 4, 5, 3, 5, 3, 'Redmi Note 11 Pro', 2022, 3699000, 5000, 16, 108, 'redminote11pro.png', NULL, NULL),
(64, 2, 4, 3, 4, 5, 3, 5, 3, 'Redmi Note 11 Pro 5G', 2022, 4099000, 5000, 16, 108, 'redminote11pro5g.png', NULL, NULL),
(65, 1, 2, 2, 4, 5, 1, 2, 3, 'POCO C40', 2022, 1699000, 6000, 5, 13, 'pococ40.png', NULL, NULL),
(66, 3, 3, 3, 4, 4, 3, 5, 3, 'POCO F4', 2022, 5199000, 4500, 20, 64, 'pocof4.png', NULL, NULL),
(67, 3, 4, 4, 4, 4, 3, 5, 3, 'POCO F4', 2022, 5699000, 4500, 20, 64, 'pocof4.png', NULL, NULL),
(68, 3, 5, 4, 4, 4, 3, 5, 3, 'POCO F4 GT', 2022, 7799000, 4700, 20, 64, 'pocof4gt.png', NULL, NULL),
(69, 1, 3, 3, 4, 5, 3, 5, 3, 'POCO M4 Pro', 2022, 2799000, 5000, 16, 64, 'pocom4pro.png', NULL, NULL),
(70, 2, 4, 4, 4, 5, 3, 5, 3, 'POCO M4 Pro', 2022, 3299000, 5000, 16, 64, 'pocom4pro.png', NULL, NULL),
(71, 1, 2, 2, 4, 5, 1, 4, 3, 'POCO M5', 2022, 2049000, 5000, 5, 50, 'pocom5.png', NULL, NULL),
(72, 1, 2, 3, 4, 5, 1, 4, 3, 'POCO M5', 2022, 2249000, 5000, 5, 50, 'pocom5.png', NULL, NULL),
(73, 1, 2, 2, 4, 5, 2, 5, 3, 'POCO M5s', 2022, 2299000, 5000, 13, 64, 'pocom5s.png', NULL, NULL),
(74, 1, 3, 3, 4, 5, 2, 5, 3, 'POCO M5s', 2022, 2599000, 5000, 13, 64, 'pocom5s.png', NULL, NULL),
(75, 2, 3, 3, 4, 5, 2, 4, 3, 'POCO X5 5G', 2023, 3399000, 5000, 13, 48, 'pocox55g.png', NULL, NULL),
(76, 2, 4, 4, 4, 5, 2, 4, 3, 'POCO X5 5G', 2023, 3899000, 5000, 13, 48, 'pocox55g.png', NULL, NULL),
(77, 4, 5, 4, 4, 4, 4, 4, 4, 'Oppo Find X2', 2020, 14999000, 4200, 32, 48, 'findx2.png', NULL, NULL),
(78, 5, 5, 5, 4, 4, 4, 4, 4, 'Oppo Find X2 Pro', 2020, 17999000, 4260, 32, 48, 'findx2pro.png', NULL, NULL),
(79, 5, 5, 4, 4, 2, 4, 4, 4, 'Oppo Find X3 Pro 5G', 2021, 15999000, 2200, 32, 50, 'findx3pro5g.png', NULL, NULL),
(80, 4, 5, 4, 4, 5, 4, 4, 4, 'Oppo Find X5 Pro 5G', 2022, 14999000, 5000, 32, 50, 'findx5pro5g.png', NULL, NULL),
(81, 3, 4, 3, 4, 4, 4, 5, 4, 'Oppo Reno5 5G', 2021, 6999000, 4300, 32, 64, 'reno55g.png', NULL, NULL),
(82, 3, 4, 3, 4, 4, 4, 5, 4, 'Oppo Reno6', 2021, 5199000, 4310, 44, 64, 'reno6.png', NULL, NULL),
(83, 3, 4, 3, 4, 4, 4, 5, 4, 'Oppo Reno6 5G', 2021, 7999000, 4300, 32, 64, 'reno65g.png', NULL, NULL),
(84, 4, 5, 4, 4, 4, 4, 4, 4, 'Oppo Reno6 Pro 5G', 2021, 10999000, 4500, 32, 50, 'reno6pro5g.png', NULL, NULL),
(85, 3, 4, 4, 4, 4, 4, 5, 4, 'Oppo Reno7', 2022, 5199000, 4500, 32, 64, 'reno7.png', NULL, NULL),
(86, 3, 4, 4, 4, 4, 4, 5, 4, 'Oppo Reno7 5G', 2022, 7499000, 4500, 32, 64, 'reno75g.png', NULL, NULL),
(87, 3, 4, 3, 4, 4, 3, 5, 4, 'Oppo Reno7 Z 5G', 2022, 5999000, 4500, 16, 64, 'reno7z5g.png', NULL, NULL),
(88, 2, 4, 4, 4, 4, 4, 5, 4, 'Oppo Reno8', 2022, 4999000, 4500, 32, 64, 'reno8.png', NULL, NULL),
(89, 3, 4, 4, 4, 4, 4, 4, 4, 'Oppo Reno8 5G', 2022, 7999000, 4500, 32, 50, 'reno85g.png', NULL, NULL),
(90, 3, 4, 4, 4, 4, 4, 4, 4, 'Oppo Reno8 Pro 5G', 2022, 9999000, 4500, 32, 50, 'reno8pro5g.png', NULL, NULL),
(91, 2, 4, 4, 4, 4, 4, 5, 4, 'Oppo Reno8 T', 2023, 4899000, 4880, 32, 100, 'reno8t.png', NULL, NULL),
(92, 3, 4, 3, 4, 4, 4, 5, 4, 'Oppo Reno8 T 5G', 2023, 5999000, 4690, 32, 108, 'reno8t5g.png', NULL, NULL),
(93, 3, 4, 4, 4, 4, 4, 5, 4, 'Oppo Reno8 T 5G', 2023, 6499000, 4690, 32, 108, 'reno8t5g.png', NULL, NULL),
(94, 3, 4, 4, 4, 4, 3, 5, 4, 'Oppo Reno8 Z 5G', 2022, 5999000, 4500, 16, 64, 'reno8z5g.png', NULL, NULL),
(95, 1, 2, 2, 4, 4, 1, 2, 4, 'Oppo A16k', 2021, 2199000, 4230, 5, 13, 'a16k.png', NULL, NULL),
(96, 1, 2, 2, 4, 5, 1, 4, 4, 'Oppo A17', 2022, 2099000, 5000, 5, 50, 'a17.png', NULL, NULL),
(97, 2, 3, 3, 4, 5, 3, 2, 4, 'Oppo A54', 2021, 3099000, 5000, 16, 13, 'a54.png', NULL, NULL),
(98, 1, 2, 2, 4, 5, 3, 4, 4, 'Oppo A55', 2021, 2699000, 5000, 16, 50, 'a55.png', NULL, NULL),
(99, 1, 2, 2, 4, 5, 2, 2, 4, 'Oppo A57', 2022, 2399000, 5000, 8, 13, 'a57.png', NULL, NULL),
(100, 1, 2, 3, 4, 5, 2, 2, 4, 'Oppo A57', 2022, 2699000, 5000, 8, 13, 'a57.png', NULL, NULL),
(101, 2, 3, 3, 4, 5, 2, 2, 4, 'Oppo A76', 2022, 3399000, 5000, 8, 13, 'a76.png', NULL, NULL),
(102, 2, 4, 3, 4, 5, 2, 4, 4, 'Oppo A77s', 2022, 3499000, 5000, 8, 50, 'a77s.png', NULL, NULL),
(103, 2, 4, 3, 4, 5, 3, 4, 4, 'Oppo A95', 2021, 3999000, 5000, 16, 48, 'a95.png', NULL, NULL),
(104, 2, 4, 4, 4, 5, 3, 4, 4, 'Oppo A96', 2022, 4299000, 5000, 16, 50, 'a96.png', NULL, NULL),
(105, 1, 1, 1, 4, 5, 1, 2, 5, 'Realme C11 2021', 2021, 1349000, 5000, 5, 8, 'c112021.png', NULL, NULL),
(106, 1, 2, 2, 4, 5, 1, 2, 5, 'Realme C11 2021', 2021, 1699000, 5000, 5, 8, 'c112021.png', NULL, NULL),
(107, 1, 2, 2, 4, 5, 1, 2, 5, 'Realme C21', 2021, 1999000, 5000, 5, 13, 'c21.png', NULL, NULL),
(108, 1, 2, 2, 4, 5, 1, 2, 5, 'Realme C21Y', 2021, 1799000, 5000, 5, 13, 'c21y.png', NULL, NULL),
(109, 1, 2, 2, 4, 5, 2, 4, 5, 'Realme C25', 2021, 2299000, 6000, 8, 48, 'c25.png', NULL, NULL),
(110, 1, 2, 3, 4, 5, 2, 4, 5, 'Realme C25', 2021, 2499000, 6000, 8, 48, 'c25.png', NULL, NULL),
(111, 1, 2, 3, 4, 5, 2, 4, 5, 'Realme C25s', 2021, 2399000, 6000, 8, 48, 'c25s.png', NULL, NULL),
(112, 1, 2, 2, 4, 5, 2, 4, 5, 'Realme C25Y', 2021, 1899000, 5000, 8, 50, 'c25y.png', NULL, NULL),
(113, 1, 1, 1, 4, 5, 1, 2, 5, 'Realme C30', 2022, 1199000, 5000, 5, 8, 'c30.png', NULL, NULL),
(114, 1, 1, 2, 4, 5, 1, 2, 5, 'Realme C30', 2022, 1599000, 5000, 5, 8, 'c30.png', NULL, NULL),
(115, 1, 2, 2, 4, 5, 1, 2, 5, 'Realme C31', 2022, 1749000, 5000, 5, 13, 'c31.png', NULL, NULL),
(116, 1, 2, 2, 4, 5, 1, 4, 5, 'Realme C33', 2022, 1799000, 5000, 5, 50, 'c33.png', NULL, NULL),
(117, 1, 2, 2, 4, 5, 2, 4, 5, 'Realme C35', 2022, 2299000, 5000, 8, 50, 'c35.png', NULL, NULL),
(118, 1, 2, 3, 4, 5, 2, 4, 5, 'Realme C35', 2022, 2499000, 5000, 8, 50, 'c35.png', NULL, NULL),
(119, 1, 3, 3, 4, 5, 2, 5, 5, 'Realme C55', 2023, 2499000, 5000, 8, 64, 'c55.png', NULL, NULL),
(120, 1, 4, 4, 4, 5, 2, 5, 5, 'Realme C55', 2023, 2999000, 5000, 8, 64, 'c55.png', NULL, NULL),
(121, 3, 5, 4, 4, 5, 4, 4, 5, 'Realme GT 2 Pro', 2022, 8999000, 5000, 32, 50, 'gt2pro.png', NULL, NULL),
(122, 3, 5, 4, 4, 5, 3, 5, 5, 'Realme GT NEO 2', 2021, 6499000, 5000, 16, 64, 'gtneo2.png', NULL, NULL),
(123, 3, 4, 4, 4, 4, 3, 4, 5, 'Realme GT NEO 3', 2022, 6999000, 4500, 16, 50, 'gtneo3.png', NULL, NULL),
(124, 3, 5, 4, 4, 4, 3, 4, 5, 'Realme GT NEO 3', 2022, 7999000, 4500, 16, 50, 'gtneo3.png', NULL, NULL),
(125, 3, 4, 3, 4, 5, 3, 5, 5, 'Realme GT NEO 3T', 2022, 5499000, 5000, 16, 64, 'gtneo3t.png', NULL, NULL),
(126, 1, 2, 3, 4, 5, 3, 4, 5, 'Realme 10', 2022, 2799000, 5000, 16, 50, 'realme10.png', NULL, NULL),
(127, 2, 4, 3, 4, 5, 3, 4, 5, 'Realme 10', 2022, 3199000, 5000, 16, 50, 'realme10.png', NULL, '1'),
(128, 2, 4, 4, 4, 5, 3, 4, 5, 'Realme 10', 2022, 3599000, 5000, 16, 50, 'realme10.png', NULL, NULL),
(129, 2, 4, 3, 4, 5, 3, 5, 5, 'Realme 10 Pro', 2023, 4599000, 5000, 16, 108, 'realme10pro.png', NULL, NULL),
(130, 2, 4, 4, 4, 5, 3, 5, 5, 'Realme 10 Pro', 2023, 4999000, 5000, 16, 108, 'realme10pro.png', NULL, NULL),
(131, 3, 4, 3, 4, 5, 3, 5, 5, 'Realme 10 Pro+', 2023, 5999000, 5000, 16, 108, 'realme10proplus.png', NULL, NULL),
(132, 3, 5, 4, 4, 5, 3, 5, 5, 'Realme 10 Pro+', 2023, 6999000, 5000, 16, 108, 'realme10proplus.png', NULL, NULL),
(133, 2, 3, 3, 4, 5, 3, 5, 5, 'Realme 9', 2022, 3199000, 5000, 16, 108, 'realme9.png', NULL, NULL),
(134, 2, 4, 3, 4, 5, 3, 5, 5, 'Realme 9', 2022, 3399000, 5000, 16, 108, 'realme9.png', NULL, NULL),
(135, 1, 2, 2, 4, 5, 2, 4, 5, 'Realme 9i', 2022, 2699000, 5000, 8, 50, 'realme9i.png', NULL, NULL),
(136, 1, 3, 3, 4, 5, 2, 4, 5, 'Realme 9i', 2022, 2999000, 5000, 8, 50, 'realme9i.png', NULL, NULL),
(137, 2, 3, 3, 4, 5, 3, 5, 5, 'Realme 9 Pro 5G', 2022, 3799000, 5000, 16, 64, 'realme9pro5g.png', NULL, NULL),
(138, 2, 4, 3, 4, 5, 3, 5, 5, 'Realme 9 Pro 5G', 2022, 3999000, 5000, 16, 64, 'realme9pro5g.png', NULL, NULL),
(139, 2, 4, 3, 4, 4, 3, 4, 5, 'Realme 9 Pro+ 5G', 2022, 4999000, 4500, 16, 50, 'realme9proplus5g.png', NULL, NULL),
(140, 3, 4, 4, 4, 4, 3, 4, 5, 'Realme 9 Pro+ 5G', 2022, 5499000, 4500, 16, 50, 'realme9proplus5g.png', NULL, NULL),
(141, 1, 2, 3, 4, 4, 4, 3, 6, 'Vivo S1', 2019, 2999000, 4500, 32, 16, 's1.png', NULL, NULL),
(142, 2, 4, 3, 4, 4, 4, 4, 6, 'Vivo S1 Pro', 2019, 3699000, 4500, 32, 48, 's1pro.png', NULL, NULL),
(143, 2, 4, 4, 4, 4, 4, 4, 6, 'Vivo S1 Pro', 2019, 3999000, 4500, 32, 48, 's1pro.png', NULL, NULL),
(144, 1, 2, 3, 4, 5, 3, 4, 6, 'Vivo T1 5G', 2022, 2999000, 5000, 16, 50, 't15g.png', NULL, NULL),
(145, 2, 4, 3, 4, 5, 3, 4, 6, 'Vivo T1 5G', 2022, 3399000, 5000, 16, 50, 't15g.png', NULL, NULL),
(146, 2, 4, 4, 4, 5, 3, 4, 6, 'Vivo T1 5G', 2022, 4099000, 5000, 16, 50, 't15g.png', NULL, NULL),
(147, 2, 4, 3, 4, 4, 3, 5, 6, 'Vivo T1 Pro 5G', 2022, 4499000, 4700, 16, 64, 't1pro5g.png', NULL, NULL),
(148, 2, 2, 2, 4, 3, 3, 2, 6, 'Vivo V5s', 2017, 3199000, 3000, 20, 13, 'v5s.png', NULL, NULL),
(149, 2, 2, 1, 4, 3, 3, 3, 6, 'Vivo V7', 2017, 3199000, 3000, 24, 16, 'v7.png', NULL, NULL),
(150, 2, 2, 2, 4, 3, 3, 3, 6, 'Vivo V7+', 2017, 4299000, 3225, 24, 16, 'v7plus.png', NULL, NULL),
(151, 2, 2, 2, 4, 3, 3, 2, 6, 'Vivo V9', 2018, 3599000, 3260, 24, 13, 'v9.png', NULL, NULL),
(152, 2, 3, 2, 4, 3, 2, 2, 6, 'Vivo V9', 2018, 4299000, 3260, 12, 13, 'v96gb.png', NULL, NULL),
(153, 2, 2, 2, 4, 3, 3, 3, 6, 'Vivo V11', 2018, 3499000, 3315, 25, 16, 'v11.png', NULL, NULL),
(154, 2, 2, 3, 4, 3, 3, 3, 6, 'Vivo V11', 2018, 3599000, 3315, 25, 16, 'v11.png', NULL, NULL),
(155, 2, 3, 2, 4, 3, 3, 3, 6, 'Vivo V11', 2018, 3999000, 3315, 25, 16, 'v11.png', NULL, NULL),
(156, 2, 3, 2, 4, 3, 3, 2, 6, 'Vivo V11 Pro', 2018, 4999000, 3400, 25, 12, 'v11pro.png', NULL, NULL),
(157, 2, 3, 2, 4, 4, 4, 2, 6, 'Vivo V15', 2019, 3499000, 4000, 32, 12, 'v15.png', NULL, NULL),
(158, 2, 3, 3, 4, 3, 4, 4, 6, 'Vivo V15 Pro', 2019, 4999000, 3700, 32, 48, 'v15pro.png', NULL, NULL),
(159, 2, 4, 3, 4, 4, 4, 4, 6, 'Vivo V17 Pro', 2019, 4999000, 4100, 32, 48, 'v17pro.png', NULL, NULL),
(160, 2, 4, 3, 4, 4, 4, 4, 6, 'Vivo V19', 2020, 3999000, 4500, 32, 48, 'v19.png', NULL, NULL),
(161, 2, 4, 4, 4, 4, 4, 4, 6, 'Vivo V19', 2020, 4999000, 4500, 32, 48, 'v19.png', NULL, NULL),
(162, 2, 4, 3, 4, 4, 4, 5, 6, 'Vivo V20', 2020, 4399000, 4000, 44, 64, 'v20.png', NULL, NULL),
(163, 2, 4, 3, 4, 4, 4, 5, 6, 'Vivo V21', 2021, 3999000, 4000, 44, 64, 'v21.png', NULL, NULL),
(164, 2, 4, 4, 4, 4, 4, 5, 6, 'Vivo V21', 2021, 4999000, 4000, 44, 64, 'v21.png', NULL, NULL),
(165, 2, 4, 3, 4, 4, 4, 5, 6, 'Vivo V21 5G', 2021, 4499000, 4000, 44, 64, 'v215g.png', NULL, NULL),
(166, 2, 4, 3, 4, 4, 4, 5, 6, 'Vivo V23e', 2021, 3799000, 4050, 50, 64, 'v23e.png', NULL, NULL),
(167, 3, 4, 3, 4, 4, 4, 5, 6, 'Vivo V23 5G', 2022, 5999000, 4200, 50, 64, 'v235g.png', NULL, NULL),
(168, 3, 4, 4, 4, 4, 4, 5, 6, 'Vivo V25', 2022, 5499000, 4500, 50, 64, 'v25.png', NULL, NULL),
(169, 3, 5, 4, 4, 4, 4, 5, 6, 'Vivo V25 Pro', 2022, 7999000, 4830, 32, 64, 'v25pro.png', NULL, NULL),
(170, 2, 4, 3, 4, 4, 4, 5, 6, 'Vivo V25e', 2022, 3999000, 4500, 32, 64, 'v25e.png', NULL, NULL),
(171, 2, 5, 4, 4, 4, 4, 5, 6, 'Vivo V25e', 2022, 4799000, 4500, 32, 64, 'v25e.png', NULL, NULL),
(172, 3, 4, 3, 4, 4, 4, 4, 6, 'Vivo X50', 2020, 6499000, 4200, 32, 48, 'x50.png', NULL, NULL),
(173, 3, 4, 4, 4, 4, 4, 4, 6, 'Vivo X50 Pro', 2020, 8999000, 4315, 32, 48, 'x50pro.png', NULL, NULL),
(174, 3, 4, 3, 4, 4, 4, 4, 6, 'Vivo X60', 2021, 7999000, 4300, 32, 64, 'x60.png', NULL, NULL),
(175, 3, 5, 4, 4, 4, 4, 4, 6, 'Vivo X60 Pro', 2021, 9999000, 4200, 32, 64, 'x60pro.png', NULL, NULL),
(176, 4, 5, 4, 4, 4, 4, 4, 6, 'Vivo X70 Pro', 2021, 10999000, 4450, 32, 50, 'x70pro.png', NULL, NULL),
(177, 4, 5, 4, 4, 4, 4, 4, 6, 'Vivo X80', 2022, 10999000, 4500, 32, 50, 'x80.png', NULL, NULL),
(178, 5, 5, 4, 4, 4, 4, 4, 6, 'Vivo X80 Pro', 2022, 15999000, 4700, 32, 50, 'x80pro.png', NULL, NULL),
(179, 1, 1, 1, 4, 5, 1, 2, 6, 'Vivo Y01', 2022, 13999000, 5000, 5, 8, 'y01.png', NULL, NULL),
(180, 1, 1, 1, 4, 4, 1, 2, 6, 'Vivo Y1s', 2020, 1499000, 4030, 5, 13, 'y1s.png', NULL, NULL),
(181, 1, 1, 1, 4, 5, 2, 2, 6, 'Vivo Y11', 2019, 1799000, 5000, 8, 13, 'y11.png', NULL, NULL),
(182, 1, 2, 2, 4, 5, 3, 2, 6, 'Vivo Y15', 2019, 2399000, 5000, 16, 13, 'y15.png', NULL, NULL),
(183, 1, 2, 1, 4, 5, 1, 2, 6, 'Vivo Y16', 2023, 1799000, 5000, 5, 13, 'y16.png', NULL, NULL),
(184, 1, 2, 2, 4, 5, 1, 2, 6, 'Vivo Y16', 2023, 1999000, 5000, 5, 13, 'y16.png', NULL, NULL),
(185, 1, 2, 3, 4, 5, 3, 2, 6, 'Vivo Y17', 2019, 2599000, 5000, 20, 13, 'y17.png', NULL, NULL),
(186, 2, 3, 3, 4, 5, 3, 3, 6, 'Vivo Y19', 2019, 3199000, 5000, 16, 16, 'y19.png', NULL, NULL),
(187, 1, 3, 3, 4, 5, 2, 2, 6, 'Vivo Y20s', 2020, 2799000, 5000, 8, 13, 'y20s.png', NULL, NULL),
(188, 1, 4, 3, 4, 5, 2, 2, 6, 'Vivo Y20s', 2020, 2999000, 5000, 8, 13, 'y20s.png', NULL, NULL),
(189, 1, 2, 2, 4, 5, 2, 2, 6, 'Vivo Y20 2021', 2021, 2199000, 5000, 8, 13, 'y202021.png', NULL, NULL),
(190, 1, 2, 2, 4, 5, 2, 2, 6, 'Vivo Y21', 2016, 2099000, 5000, 8, 13, 'y21.png', NULL, NULL),
(191, 1, 2, 3, 4, 5, 2, 4, 6, 'Vivo Y21s', 2021, 2699000, 5000, 8, 50, 'y21s.png', NULL, NULL),
(192, 2, 3, 3, 4, 5, 2, 4, 6, 'Vivo Y21T', 2022, 3099000, 5000, 8, 50, 'y21t.png', NULL, NULL),
(193, 1, 2, 2, 4, 5, 2, 4, 6, 'Vivo Y22', 2022, 2399000, 5000, 8, 50, 'y22.png', NULL, NULL),
(194, 1, 3, 3, 4, 5, 2, 4, 6, 'Vivo Y22', 2022, 2999000, 5000, 8, 50, 'y22.png', NULL, NULL),
(195, 1, 2, 3, 4, 5, 2, 2, 6, 'Vivo Y30', 2022, 2699000, 5000, 8, 13, 'y30.png', NULL, NULL),
(196, 2, 3, 3, 4, 5, 2, 2, 6, 'Vivo Y30', 2022, 3099000, 5000, 8, 13, 'y30.png', NULL, NULL),
(197, 1, 2, 2, 4, 5, 2, 2, 6, 'Vivo Y30i', 2020, 2399000, 5000, 8, 13, 'y30i.png', NULL, NULL),
(198, 1, 2, 3, 4, 5, 3, 4, 6, 'Vivo Y33s', 2021, 2399000, 5000, 16, 50, 'y33s.png', NULL, NULL),
(199, 2, 4, 3, 4, 5, 3, 4, 6, 'Vivo Y33s', 2021, 3399000, 5000, 16, 50, 'y33s.png', NULL, NULL),
(200, 2, 4, 3, 4, 5, 3, 4, 6, 'Vivo Y33T', 2022, 3399000, 5000, 15, 50, 'y33t.png', NULL, NULL),
(201, 2, 4, 3, 4, 5, 3, 4, 6, 'Vivo Y35', 2022, 3399000, 5000, 16, 50, 'y35.png', NULL, NULL),
(202, 2, 4, 3, 4, 5, 3, 2, 6, 'Vivo Y50', 2020, 3299000, 5000, 16, 13, 'y50.png', NULL, NULL),
(203, 2, 4, 3, 4, 5, 3, 4, 6, 'Vivo Y51A', 2021, 3399000, 5000, 16, 48, 'y51a.png', NULL, NULL),
(204, 2, 4, 3, 4, 5, 3, 5, 6, 'Vivo Y53s', 2021, 3699000, 5000, 16, 64, 'y53s.png', NULL, NULL),
(205, 2, 4, 3, 4, 5, 3, 4, 6, 'Vivo Y75 5G', 2022, 3999000, 5000, 16, 50, 'y755g.png', NULL, NULL),
(206, 1, 1, 1, 4, 4, 1, 2, 6, 'Vivo Y91C', 2019, 1599000, 4030, 5, 13, 'y91c.png', NULL, NULL),
(207, 1, 2, 2, 4, 5, 4, 3, 6, 'Vivo Z1 Pro', 2019, 2699000, 5000, 32, 16, 'z1pro.png', NULL, NULL),
(208, 2, 3, 3, 4, 5, 4, 3, 6, 'Vivo Z1 Pro', 2019, 3499000, 5000, 32, 16, 'z1pro.png', NULL, NULL),
(218, 1, 2, 2, 4, 5, 2, 2, 4, 'Oppo A16', 2021, 2499000, 5000, 8, 13, '642a4bc2e81f2.png', '1', ''),
(219, 1, 2, 3, 4, 5, 3, 2, 4, 'Oppo A53', 2020, 2699000, 5000, 16, 13, '642a4cc42e2b2.png', '1', ''),
(220, 1, 1, 1, 4, 5, 1, 2, 2, 'Samsung Galaxy A03 Core', 2021, 1249000, 5000, 5, 8, '642a510294ae9.png', '1', ''),
(221, 3, 4, 3, 4, 4, 4, 2, 2, 'Samsung Galaxy S21 FE 5G', 2022, 7999000, 4500, 32, 12, '642a518f6c6a0.png', '1', ''),
(222, 3, 4, 4, 4, 4, 4, 2, 2, 'Samsung Galaxy S21 FE 5G', 2022, 8499000, 4500, 32, 12, '642a51beecc06.png', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `price_id` int(5) NOT NULL,
  `min_price_range` int(20) NOT NULL,
  `max_price_range` int(20) NOT NULL,
  `price_bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`price_id`, `min_price_range`, `max_price_range`, `price_bobot`) VALUES
(1, 0, 2999999, 5),
(2, 3000000, 4999999, 4),
(3, 5000000, 9999999, 3),
(4, 10000000, 14999999, 2),
(5, 15000000, 999999999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `processor`
--

CREATE TABLE `processor` (
  `processor_id` int(5) NOT NULL,
  `processor_name` varchar(10) NOT NULL,
  `processor_bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processor`
--

INSERT INTO `processor` (`processor_id`, `processor_name`, `processor_bobot`) VALUES
(1, 'Dual', 1),
(2, 'Quad', 2),
(3, 'Hexa', 3),
(4, 'Octa', 4),
(5, 'Deca', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `ram_id` int(5) NOT NULL,
  `ram_capacity` int(5) NOT NULL,
  `ram_bobot` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`ram_id`, `ram_capacity`, `ram_bobot`) VALUES
(1, 2, 1),
(2, 4, 2),
(3, 6, 3),
(4, 8, 4),
(5, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `release_year`
--

CREATE TABLE `release_year` (
  `year_id` int(5) NOT NULL,
  `release_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `release_year`
--

INSERT INTO `release_year` (`year_id`, `release_year`) VALUES
(1, 2018),
(2, 2019),
(3, 2020),
(4, 2021),
(5, 2022),
(6, 2023);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `password`) VALUES
(1, 'Admin 1', 'admin1', '$2y$10$BG9MGxxW6sUJn4NEIrNpNu192Ia404rbwkohm1mol4MiQtGSQQrxm'),
(4, 'admin2', 'admin2', '$2y$10$4Vc.Z59xX0/wGNlYqU8CAekZBhsW4LpNtfbUg/D4ejhYTHSkOaQvC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `back_camera`
--
ALTER TABLE `back_camera`
  ADD PRIMARY KEY (`back_camera_id`);

--
-- Indexes for table `battery`
--
ALTER TABLE `battery`
  ADD PRIMARY KEY (`battery_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `front_camera`
--
ALTER TABLE `front_camera`
  ADD PRIMARY KEY (`front_camera_id`);

--
-- Indexes for table `memory`
--
ALTER TABLE `memory`
  ADD PRIMARY KEY (`memory_id`);

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phone_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`processor_id`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`ram_id`);

--
-- Indexes for table `release_year`
--
ALTER TABLE `release_year`
  ADD PRIMARY KEY (`year_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `back_camera`
--
ALTER TABLE `back_camera`
  MODIFY `back_camera_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `battery`
--
ALTER TABLE `battery`
  MODIFY `battery_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `front_camera`
--
ALTER TABLE `front_camera`
  MODIFY `front_camera_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `memory`
--
ALTER TABLE `memory`
  MODIFY `memory_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `phone_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `price_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `processor`
--
ALTER TABLE `processor`
  MODIFY `processor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ram`
--
ALTER TABLE `ram`
  MODIFY `ram_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `release_year`
--
ALTER TABLE `release_year`
  MODIFY `year_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
