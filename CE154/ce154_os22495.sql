-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 30, 2023 at 11:45 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ce154_os22495`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `quantity` int DEFAULT NULL,
  `price` float NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `dimensions` varchar(12) NOT NULL,
  `date` year NOT NULL DEFAULT '2023'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `quantity`, `price`, `type`, `description`, `dimensions`, `date`) VALUES
(1, 'Fragments of Glass', 'cd1.png', 2, 10.99, 'CD', 'The official CD release for the band\'s newest album \"Fragments of Glass\". Featuring a stylish red and black design and high-quality insert with lyrics and behind the scenes interview with the band members!', '150*150*150', 2023),
(2, 'White Band Mug', 'mug1.png', 4, 11.99, 'mug', 'A high-quality white mug featuring artwork for the band \"Glass Castle\".', '150*220*150', 2023),
(3, 'White Band T-Shirt', 'tshirt2.png', 0, 18.99, 't-shirt', 'A high-quality white T-Shirt for the band \"Glass Castle\".', '100*100*100', 2021),
(6, 'Watercolour Poster', 'watercolour.png', 12, 4.99, 'Poster', 'A beautiful print of an abstract watercolour poster of the band playing ontop of a castle', '500*500*500', 2023),
(7, 'Sea Through Glass Limited Edition', 'record1.png', 5, 49.99, 'Clear Vinyl', 'Limited edition clear vinyl release of the album Sea Through Glass', '120*120*120', 2020),
(8, 'Next', 'album1.png', 50, 9.99, 'CD', 'Standard CD release of the album \"Next\"', '180*180*20', 2020),
(9, 'Translucent', 'album3.png', 70, 9.99, 'CD', 'Standard CD release of the album \"Translucent\"', '180*180*20', 2022),
(10, 'The Last', 'album2.png', 31, 9.99, 'CD', 'Standard CD release of the album \"The Last\"', '180*180*20', 2018),
(11, 'Fortress', 'album1.png', 19, 7.99, 'CD', 'Standard CD release of the album \"Fortress\"', '180*180*20', 2016);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `item_id`, `quantity`) VALUES
('862c7d6ec22d66c74a8fac9a3b3e445d', 1, 2),
('862c7d6ec22d66c74a8fac9a3b3e445d', 2, 6),
('862c7d6ec22d66c74a8fac9a3b3e445d', 6, 3),
('862c7d6ec22d66c74a8fac9a3b3e445d', 7, 3),
('96e8f2cc6959671d2ae57d579f76bcbc', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `id` (`id`,`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
