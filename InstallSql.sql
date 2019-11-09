-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 10:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 2 COMMENT '1 active, 2 pending, 3 deleted '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `text`, `user_id`, `image`, `status`) VALUES
(11, NULL, 1, '157316299383.jpg', 1),
(12, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 2, NULL, 3),
(13, NULL, 1, '157314629624.jpg', 3),
(14, NULL, 2, NULL, 3),
(15, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 3, NULL, 3),
(16, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 4, NULL, 3),
(17, NULL, 4, '157314634352.jpg', 1),
(18, 'asdasd', 3, NULL, 3),
(19, NULL, 3, NULL, 2),
(20, NULL, 5, '157314877491.jpg', 2),
(21, NULL, 5, NULL, 2),
(22, 'asdasd', 5, NULL, 3),
(23, 'asdasd', 5, NULL, 3),
(24, NULL, 5, '157316095240.jpg', 3),
(25, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages anasdasdd web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 5, NULL, 1),
(26, NULL, 5, '157316348667.jpg', 1),
(27, 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making itasdasdasdlook like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 5, NULL, 3),
(28, 'asdasdasd', 1, NULL, 1),
(29, NULL, 1, '157316335878.jpg', 1),
(30, 'asdasdasdasd as dasd ', 1, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1 COMMENT 'type-1 normal, type-2 admin',
  `status` int(11) NOT NULL COMMENT '1-active, 2-deleted',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `status`, `username`, `password`) VALUES
(1, 1, 1, 'user1', '$2y$10$r9nsHWeISxb/2CIr/euRzuUqf4o7H6aEW2c3GVGisiKI99Dmj8W12'),
(2, 1, 1, 'user2', '$2y$10$r9nsHWeISxb/2CIr/euRzuUqf4o7H6aEW2c3GVGisiKI99Dmj8W12'),
(3, 1, 1, 'user3', '$2y$10$r9nsHWeISxb/2CIr/euRzuUqf4o7H6aEW2c3GVGisiKI99Dmj8W12'),
(4, 1, 1, 'user4', '$2y$10$r9nsHWeISxb/2CIr/euRzuUqf4o7H6aEW2c3GVGisiKI99Dmj8W12'),
(5, 2, 1, 'admin', '$2y$10$r9nsHWeISxb/2CIr/euRzuUqf4o7H6aEW2c3GVGisiKI99Dmj8W12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
