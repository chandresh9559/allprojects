-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2023 at 07:06 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Assignment5`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_tags` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `product_title`, `product_description`, `product_image`, `product_tags`, `status`, `created_date`) VALUES
(11, 1, 0, 'blue shirt for mens', 'hi buy the two in one shirt and enjoy it', 'p8.png', 'deals of the day', '1', '2023-02-02 06:11:38'),
(12, 3, 0, 'black trousers', 'dear customer buy the best black trouser with best sellers', 'p7.png', 'deals of the day', '0', '2023-02-02 06:12:47'),
(13, 6, 0, 'Sport shoe', 'dear customer buy the best shoe and enjoy it', 'img4.png', 'best deal', '1', '2023-02-02 06:13:09'),
(14, 1, 0, 'red sport shoe', 'dear customer buy the best formal shirt with best seller', 'shoe5.jpg', 'deals of the day', '1', '2023-02-02 06:40:40'),
(15, 6, 0, 'Sport shoe', 'dear customer buy the best shoe and enjoy it', 'shoe1.jpg', 'deals of the day', '1', '2023-02-02 06:41:13'),
(16, 9, 0, 'women jeans', 'dear customer buy the best product form best seller', 'jeans2.jpg', 'best deal', '1', '2023-02-02 06:42:16'),
(17, 1, 0, 'best check shirt', 'dear customer buy the best check shirt with best seller', 'shirt1.jpg', 'deals of the day', '1', '2023-02-02 06:54:41'),
(19, 6, 0, 'women shoe', 'dear customer buy the best shoe and enjoy it', 'shoe4.jpg', 'deals of the day', '1', '2023-02-02 06:56:04'),
(20, 3, 0, 'black trouser', 'dear customer buy the best black trouser with best seller', 'pant1.jpg', 'best deal', '1', '2023-02-02 06:56:28'),
(21, 9, 0, 'men jeans', 'dear customer buy the best jeans with best seller', 'jeans4.jpg', 'best deal', '1', '2023-02-02 06:57:23'),
(22, 13, 0, 'men\'s kurta', 'hi dear customer buy best kurta here', 'kurta3.jpg', 'tranding', '1', '2023-02-02 06:58:54'),
(23, 14, NULL, 'Mens coat pant set', 'hi dear customer buy best coat pant here', 'ctp1.jpg', 'best deal', '1', '2023-02-02 13:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`category_id`, `category_name`, `status`, `created_date`) VALUES
(1, 'Shirt', 1, '2023-01-31 12:01:57'),
(3, 'Pants', 1, '2023-01-31 12:50:04'),
(5, 'Chairffewfew', 1, '2023-01-31 13:06:52'),
(6, 'Shoe', 1, '2023-02-01 05:00:57'),
(7, 'Jacket', 1, '2023-02-01 05:46:36'),
(8, 'T-Shirts', 1, '2023-02-01 05:47:41'),
(9, 'Jeans', 1, '2023-02-01 07:20:36'),
(11, 'Under-Garments', 1, '2023-02-02 05:28:56'),
(12, 'Chairs', 1, '2023-02-02 06:14:21'),
(13, 'Kurta\'s', 1, '2023-02-02 06:57:56'),
(14, 'Coat-Pants', 1, '2023-02-02 13:23:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_comment`
--

CREATE TABLE `product_comment` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_id` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_comment`
--

INSERT INTO `product_comment` (`id`, `product_id`, `name`, `user_id`, `comment`, `created_date`) VALUES
(11, 11, '', 20, 'nice product', '2023-02-02 06:19:10'),
(12, 11, '', 22, 'good product', '2023-02-02 06:20:17'),
(13, 12, '', 22, 'nice product', '2023-02-02 06:20:31'),
(14, 12, '', 22, 'nice product', '2023-02-02 06:20:33'),
(15, 13, '', 22, 'nice shoe', '2023-02-02 06:20:44'),
(16, 15, '', 22, 'nice product', '2023-02-02 08:57:30'),
(17, 15, '', 22, 'good product', '2023-02-02 08:58:00'),
(18, 11, NULL, 20, 'good', '2023-02-02 09:11:31'),
(19, 13, NULL, 20, 'nice shoe', '2023-02-02 10:20:17'),
(20, 14, NULL, 20, 'nice product', '2023-02-02 10:20:28'),
(21, 11, NULL, 22, 'great product', '2023-02-02 11:07:27'),
(22, 11, NULL, 20, 'nice!!!!!', '2023-02-02 13:13:12'),
(23, 19, NULL, 22, 'nice product', '2023-02-02 13:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_type`, `status`, `created_date`, `image`, `token`) VALUES
(17, 'chandreshyopmail.com', '$2y$10$Ig1JRVbBWlfcVNLPQYo1wuFJVaBeHArE9Hcfr19nWo.YoyoImLUdG', 0, 1, '2023-01-31 08:48:38', 'arrival-bg.jpg', NULL),
(20, 'chandreshck9559@gmail.com', '$2y$10$pVOlfqDnNibOG7I.c3fdB.oXQquQO/zQF0T2aMyd3eIjPhP2ChgTa', 1, 1, '2023-02-01 11:28:41', 'ckins7.jpg', NULL),
(22, 'rohan12@yopmail.com', '$2y$10$gfzW8IRBewGE8t.JpXSMPuA9lCEqy5UF9mgyiKElElVccDwaClnTC', 0, 1, '2023-02-01 08:45:55', 'web.jpg', NULL),
(23, 'mkajal123@yopmail.com', '$2y$10$UdjuXZPzPSCuqKolVM6Jae.aO7fsDxtSjA5dsnDNDZ2Z6zRkpfUcy', 0, 1, '2023-02-02 07:38:47', 'jeans3.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `first_name` varchar(55) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `first_name`, `last_name`, `contact`, `address`, `created_date`) VALUES
(11, 17, 'Himesh', 'yadav', '7897898998', 'zirakpur Punjab', '2023-01-31 08:48:38'),
(13, 19, 'Abc', 'Def', '7656778678', 'zirakpur Punjab', '2023-01-31 09:04:18'),
(14, 20, 'Chandresh', 'Yadav', '9569307277', 'Bhadohi Uttar Pradesh', '2023-02-01 11:29:58'),
(16, 22, 'rohany', 'kumar', '7897898998', 'zirakpur Punjab', '2023-02-01 08:45:55'),
(17, 23, 'Kajal', 'Maam', '7897898998', 'zirakpur Punjab', '2023-02-02 07:38:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product_comment`
--
ALTER TABLE `product_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_comment`
--
ALTER TABLE `product_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
