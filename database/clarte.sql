-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2025 at 05:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clarte`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `file_path`, `category`, `created_at`) VALUES
(3, 'Behind The Scene', 'images/gallery/BTS-Studio.jpg', 'Studio', '2025-08-21 00:21:43'),
(4, 'Creative Expo Booth Design', 'images/gallery/event.jpg', 'Events', '2025-08-21 00:49:41'),
(6, 'Design Thinking Workshop', 'images/gallery/workshop-1.jpg', 'Workshop', '2025-08-21 00:53:33'),
(7, 'Drink Product Launch', 'images/gallery/product-photoshoot.jpg', 'Production', '2025-08-21 00:53:58'),
(8, 'Social Media Campaign', 'images/gallery/SMC.jpg', 'Campaign & Collaboration', '2025-08-21 00:55:49'),
(10, 'Motion Graphic', 'images/gallery/motion-graphics.jpg', 'Campaign & Collaboration', '2025-08-21 04:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'Dewa', 'fendyra@gmail.com', '$2y$10$joXGUEBcEMzyEs.8gqVh8.QzvTtGnnZauuYfZ1VHvzCdO.gMClJ7y', '2025-08-20 17:44:54', 'user'),
(2, 'fendy', 'fendyrarestu@gmail.com', '$2y$10$Xr1fg27NWw/PPRAsK5NNbuVnDzCyIbzvH7v9F13guupxiWi1ix07e', '2025-08-20 17:54:31', 'user'),
(7, 'admin', 'admin@gmail.com', '$2y$10$soUZhxY7WfP14yDlcCtjD.oM3T..ln.ONckLLDBDvQ0M0XVh64Z.i', '2025-08-21 02:42:18', 'admin'),
(8, 'fendy', 'fendy@gmail.com', '$2y$10$qrJaiifMX2DeLcT7pVSuieLwdOqyX9mBfvqE3DAJEMmDM8yOQSjAW', '2025-08-21 04:10:33', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
