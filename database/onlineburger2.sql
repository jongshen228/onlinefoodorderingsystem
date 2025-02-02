-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 02:02 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineburger2`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `food_id` int(30) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `food_price` int(30) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  `options` varchar(10) NOT NULL DEFAULT 'Enable',
  `manager_id_fk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`food_id`, `food_name`, `food_price`, `images_path`, `options`, `manager_id_fk`) VALUES
(11, 'Chicken Burger', 20, 'picture/menuburger.jpg', 'Enable', 1),
(12, 'Beef Burger', 20, 'picture/menuburger2.jpg', 'Enable', 1),
(13, 'Fish Burger', 18, 'picture/menuburger3.jpg', 'Enable', 1),
(14, 'Veggie Cheese Burger', 25, 'picture/menuburger4.jpg', 'Enable', 1),
(15, 'French Fries', 10, 'picture/frenchfries.jpg', 'Enable', 1),
(16, 'Mashed Potato', 10, 'picture/mashedpotato.jpg', 'Enable', 1),
(17, 'Mediterranean Salad', 10, 'picture/salad.jpg', 'Enable', 1),
(18, 'Garlic Bread', 10, 'picture/bread.jpg', 'Enable', 1),
(19, 'Lemonade', 7, 'picture/lemonade.jpg', 'Enable', 1),
(20, 'Orange Juice', 7, 'picture/orange.jpg', 'Enable', 1),
(21, 'Canned Soda', 5, 'picture/cannedsoda.jpg', 'Enable', 1),
(22, 'Plain Water', 3, 'picture/water.jpg', 'Enable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(10) NOT NULL,
  `manager_name` varchar(50) NOT NULL,
  `manager_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_name`, `manager_password`) VALUES
(1, 'chia', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `food_id_fk` int(30) NOT NULL,
  `foodname` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `user_id_fk` int(11) NOT NULL,
  `username_fk` varchar(30) NOT NULL,
  `total_price` int(10) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Pending',
  `complete_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `food_id_fk`, `foodname`, `price`, `quantity`, `order_date`, `order_time`, `user_id_fk`, `username_fk`, `total_price`, `status`, `complete_time`) VALUES
(120, 11, 'Chicken Burger', 20, 1, '2020-11-27', '12:00:04', 15, 'test3', 20, 'Food Preparing(Pickup)', '2020-11-27 13:21:21'),
(136, 12, 'Beef Burger', 20, 1, '2020-11-27', '12:31:47', 15, 'test3', 20, 'Pickup Pending', NULL),
(142, 11, 'Chicken Burger', 20, 1, '2020-11-28', '17:12:46', 15, 'test3', 20, 'Delivery Pending', NULL),
(143, 21, 'Canned Soda', 5, 1, '2020-11-28', '17:12:46', 15, 'test3', 5, 'Delivery Pending', NULL),
(148, 15, 'French Fries', 10, 2, '2020-12-02', '21:01:20', 21, 'finaltest', 20, 'Food Preparing(Pickup)', '2020-12-02 21:02:00'),
(149, 11, 'Chicken Burger', 20, 1, '2020-12-02', '21:01:20', 21, 'finaltest', 20, 'Pick Up Now', '2020-12-02 21:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `address`, `address2`, `email`, `phone`, `password`) VALUES
(10, 'test1', 'No. 57, Lorong Batu Nilam 21C,', 'Bandar Bukit Tinggi, 41200 Klang, Selangor', 'test1@gmail.com', '012-3456788', '12345'),
(13, 'test2', 'No. 58, Lorong Batu Nilam 21B,', 'Bandar Bukit Tinggi, 41200 Klang, Selangor', 'test2@gmall.com', '012-3434567', '12345'),
(14, 'test', '1, Lorong Batu Nilam 4b', 'Bandar Botanik, 41200 Klang,  Selangor', 'test5@gmail.com', '012-3456788', '1234'),
(15, 'test3', 'No. 33, Lorong Batu Nilam 21B,', 'Bandar Bukit Tinggi, 41200 Klang, Selangor', 'test3@gmail.com', '012-3456788', '12345'),
(21, 'finaltest', '3, Jalan Batu Nilam 6,', 'Bandar Bukit Tinggi, 41200 Klang, Selangor', 'finaltest@gmail.com', '012-3456777', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `manager_id_fk` (`manager_id_fk`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `food_id_fk` (`food_id_fk`) USING BTREE,
  ADD KEY `username_fk` (`username_fk`) USING BTREE,
  ADD KEY `user_id_fk` (`user_id_fk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `food_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`manager_id_fk`) REFERENCES `manager` (`manager_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`food_id_fk`) REFERENCES `food` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id_fk`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
