-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 04:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id_menu` int(11) NOT NULL,
  `id_menu_category` int(11) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(32) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id_menu`, `id_menu_category`, `name`, `description`, `image`, `date_time`) VALUES
(1, 1, 'vts2', 'asdasdasdwdsdadwdasda', '1667569314-1-32.jpg', '2022-11-04 14:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `menu_categories`
--

CREATE TABLE `menu_categories` (
  `id_menu_category` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_categories`
--

INSERT INTO `menu_categories` (`id_menu_category`, `name`, `date_time`) VALUES
(1, 'Grill', '2022-11-04 12:41:43'),
(2, 'rrr', '2022-11-04 12:50:36'),
(3, 'ewerwerwer', '2022-11-04 12:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_qr_code` int(11) DEFAULT NULL,
  `id_waiter` int(11) DEFAULT NULL,
  `code` varchar(3) NOT NULL,
  `status` enum('in progress','paid','cancelled','fraud') NOT NULL,
  `price_paid` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id_order_item` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_price` int(11) NOT NULL,
  `amount` tinyint(4) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id_price` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `size` varchar(32) NOT NULL,
  `price` smallint(6) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qr_codes`
--

CREATE TABLE `qr_codes` (
  `id_qr_code` int(11) NOT NULL,
  `id_restaurant_table` int(11) DEFAULT NULL,
  `url` varchar(128) NOT NULL,
  `file_name` varchar(48) NOT NULL,
  `token` varchar(40) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qr_codes`
--

INSERT INTO `qr_codes` (`id_qr_code`, `id_restaurant_table`, `url`, `file_name`, `token`, `date_time`) VALUES
(1, 1, 'http://localhost/iws/task3/scan.php?t=b32536939f30030fb838abf74cdb59118f4c481d', 'code_28ca16b9345ff3f0eba7857f0fcc8aec.png', 'b32536939f30030fb838abf74cdb59118f4c481d', '2022-11-04 11:48:25'),
(2, 2, 'http://localhost/iws/task3/scan.php?t=35e68f11bd798add91b1c26c803542d704fccd0b', 'code_c5d2758cfc441a0cf38fc3c919815f7a.png', '35e68f11bd798add91b1c26c803542d704fccd0b', '2022-11-04 11:49:32'),
(3, 3, 'http://localhost/INTEGRISANI_WEB_SISTEMI/predavanje_5(qr_restaurant_opet)scan.php?t=a8f0978421aabee4ce4ff5c68021e0d3666647cc', 'code_700d3be2af32ebcfe2ba408a3b8077d4.png', 'a8f0978421aabee4ce4ff5c68021e0d3666647cc', '2022-11-04 11:50:23'),
(4, 4, 'http://localhost/INTEGRISANI_WEB_SISTEMI/predavanje_5(qr_restaurant_opet)scan.php?t=2d832c4955f2249ee06112a0614c9a38717182f2', 'code_4a61b568d360e5766a8ab95091421e65.png', '2d832c4955f2249ee06112a0614c9a38717182f2', '2022-11-04 12:34:34'),
(5, 5, 'http://localhost/INTEGRISANI_WEB_SISTEMI/predavanje_5(qr_restaurant_opet)scan.php?t=826750fc9da1f916c11a4525441d155a413d4752', 'code_f269ed4cdf689ab4158a128cbd38c772.png', '826750fc9da1f916c11a4525441d155a413d4752', '2022-11-04 12:34:42'),
(6, 6, 'http://localhost/INTEGRISANI_WEB_SISTEMI/predavanje_5(qr_restaurant_opet)scan.php?t=9bc48f76dc03f284d4e9be59c3e269db4756c060', 'code_ffd88ab1e17f3312208016a1fef1e300.png', '9bc48f76dc03f284d4e9be59c3e269db4756c060', '2022-11-04 12:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tables`
--

CREATE TABLE `restaurant_tables` (
  `id_restaurant_table` int(11) NOT NULL,
  `number` smallint(6) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_tables`
--

INSERT INTO `restaurant_tables` (`id_restaurant_table`, `number`, `date_time`) VALUES
(1, 123, '2022-11-04 11:48:25'),
(2, 111, '2022-11-04 11:49:32'),
(3, 444, '2022-11-04 11:50:23'),
(4, 22, '2022-11-04 12:34:34'),
(5, 1, '2022-11-04 12:34:42'),
(6, 33, '2022-11-04 12:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tables_waiters`
--

CREATE TABLE `restaurant_tables_waiters` (
  `id_restaurant_table` int(11) NOT NULL,
  `id_waiter` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id_statistic` int(11) NOT NULL,
  `id_qr_code` int(11) DEFAULT NULL,
  `user_agent` text NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `device` enum('phone','tablet','computer') NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `waiters`
--

CREATE TABLE `waiters` (
  `id_waiter` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','banned','inactive') NOT NULL DEFAULT 'active',
  `logged` tinyint(1) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `waiter_notifications`
--

CREATE TABLE `waiter_notifications` (
  `id_waiter_notification` int(11) NOT NULL,
  `id_waiter` int(11) NOT NULL,
  `id_restaurant_table` int(11) NOT NULL,
  `status` enum('call','pay') NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_menu_category` (`id_menu_category`);

--
-- Indexes for table `menu_categories`
--
ALTER TABLE `menu_categories`
  ADD PRIMARY KEY (`id_menu_category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_qr_code` (`id_qr_code`),
  ADD KEY `id_waiter` (`id_waiter`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id_order_item`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_price` (`id_price`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id_price`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `qr_codes`
--
ALTER TABLE `qr_codes`
  ADD PRIMARY KEY (`id_qr_code`),
  ADD KEY `id_restaurant_table` (`id_restaurant_table`);

--
-- Indexes for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  ADD PRIMARY KEY (`id_restaurant_table`);

--
-- Indexes for table `restaurant_tables_waiters`
--
ALTER TABLE `restaurant_tables_waiters`
  ADD KEY `id_waiter` (`id_waiter`,`id_restaurant_table`),
  ADD KEY `id_restaurant_table` (`id_restaurant_table`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id_statistic`),
  ADD KEY `id_qr_code` (`id_qr_code`);

--
-- Indexes for table `waiters`
--
ALTER TABLE `waiters`
  ADD PRIMARY KEY (`id_waiter`);

--
-- Indexes for table `waiter_notifications`
--
ALTER TABLE `waiter_notifications`
  ADD PRIMARY KEY (`id_waiter_notification`),
  ADD KEY `id_waiter` (`id_waiter`),
  ADD KEY `id_restaurant_table` (`id_restaurant_table`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_categories`
--
ALTER TABLE `menu_categories`
  MODIFY `id_menu_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id_order_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id_price` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_codes`
--
ALTER TABLE `qr_codes`
  MODIFY `id_qr_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant_tables`
--
ALTER TABLE `restaurant_tables`
  MODIFY `id_restaurant_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id_statistic` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `waiters`
--
ALTER TABLE `waiters`
  MODIFY `id_waiter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `waiter_notifications`
--
ALTER TABLE `waiter_notifications`
  MODIFY `id_waiter_notification` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`id_menu_category`) REFERENCES `menu_categories` (`id_menu_category`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_qr_code`) REFERENCES `qr_codes` (`id_qr_code`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_waiter`) REFERENCES `waiters` (`id_waiter`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `menus` (`id_menu`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `qr_codes`
--
ALTER TABLE `qr_codes`
  ADD CONSTRAINT `qr_codes_ibfk_1` FOREIGN KEY (`id_restaurant_table`) REFERENCES `restaurant_tables` (`id_restaurant_table`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_tables_waiters`
--
ALTER TABLE `restaurant_tables_waiters`
  ADD CONSTRAINT `restaurant_tables_waiters_ibfk_1` FOREIGN KEY (`id_restaurant_table`) REFERENCES `restaurant_tables` (`id_restaurant_table`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_tables_waiters_ibfk_2` FOREIGN KEY (`id_waiter`) REFERENCES `waiters` (`id_waiter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
