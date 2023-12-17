-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 03:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `processor` varchar(255) NOT NULL,
  `graphics` varchar(255) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `storage` varchar(50) NOT NULL,
  `display` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `name`, `brand`, `processor`, `graphics`, `ram`, `storage`, `display`, `image_url`, `route`) VALUES
(1, 'Acer Aspire 5', 'Acer', 'Intel Core i5 11th Gen Processor', 'Integrated 4GB Graphics Card', '8GB', '1TB', 'Full HD Display', 'uploads/acer aspire 5.jpg', 'acer-aspire-5'),
(2, 'HP Pavilion', 'HP', 'AMD Ryzen 5 4600H Processor', 'NVIDIA GTX 1650ti 4GB Graphics Card', '8GB', '512GB', 'Full HD Display', 'uploads/hp pavilion.jpg', 'hp-pavilion'),
(3, 'Acer Aspire 7', 'Acer', 'AMD Ryzen 5 5600H Processor', 'NVIDIA GTX 1650 4GB Graphics Card', '8GB', '1TB', 'Full HD Display', 'uploads/acer aspire 7.jpg', 'acer-aspire-7'),
(4, 'Lenovo Ideapad', 'Lenovo', 'Intel Core i5 11th Gen Processor', 'Integrated 4GB Graphics Card', '8GB', '1TB', 'Full HD Display', 'uploads/lenovo ideapad.jpg', 'lenovo-ideapad'),
(5, 'Asus TUF A15', 'Asus', 'AMD Ryzen 7 4600H Processor', 'NVIDIA RTX 3050 4GB Graphics Card', '8GB', '512GB', 'Full HD Display', 'uploads/asus tuf.jpg', 'asus-tuf'),
(6, 'Dell Vostro', 'Dell', 'Intel Core i3 11 Gen Processor', 'Integrated 2GB Graphics Card', '8GB', '512GB', 'Full HD Display', 'uploads/dell vostro.jpg', 'dell-vostro'),
(7, 'Macbook Air', 'Apple', 'Apple M2 chip 8-core CPU', 'Apple 10-core GPU', '8GB', '256GB', 'Quad HD Display', 'uploads/macbook air.jpg', 'macbook'),
(8, 'ASUS Vivobook 15', 'Asus', 'Intel Dual Core', 'Integrated Graphics', '4GB', '256GB', 'HD Display', 'uploads/asus vivobook.jpg', 'asus-vivobook'),
(9, 'HP Victus', 'HP', 'AMD Ryzen 5 5600H Processor', 'NVIDIA GTX 1650 4GB Graphics Card', '8GB', '512GB', 'Full HD Display', 'uploads/hp victus.jpg', 'hp-victus');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `memory` varchar(10) NOT NULL,
  `storage` varchar(15) NOT NULL,
  `graphics` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `os` varchar(20) NOT NULL,
  `display` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `name`, `mobile`, `email`, `address`, `password`) VALUES
(11, 'luay', '12345678', 'luay@mail.com', 'hello', '123456'),
(12, 'luuuay', '12344555', 'sample@mail.com', '1212hello', 'hello'),
(13, 'luay merei', '12367778', 'luay.merei@gml.com', 'byebye', 'hellohello'),
(14, 'lu', '12345', 'sample3@mail.com', 'byeeee', 'hey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
