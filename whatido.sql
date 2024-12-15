-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 12:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `whatido`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_plan`
--

CREATE TABLE `tb_plan` (
  `id` int(11) NOT NULL,
  `list` text NOT NULL,
  `level` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_plan`
--

INSERT INTO `tb_plan` (`id`, `list`, `level`, `date`) VALUES
(1, 'Big cleaning', 3, '2024-08-15'),
(2, 'Practice algorithm', 2, '2024-08-15'),
(3, 'Play games', 5, '2024-08-15'),
(4, 'Wash clothes', 4, '2024-08-15'),
(5, 'Travel', 1, '2024-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `create_at`) VALUES
(1, '', '', '', '', '2024-08-14 17:36:23'),
(2, 'Jirapong', 'Kaewsomboon', 'jirapongk.2003@gmail.com', '$2y$10$ZcfYpUh1k6i5xcVS3bw8Z.OADMmajgSz2dIvrbdXUs6NpSu0VocYO', '2024-08-14 14:11:30'),
(3, 'James', 'Conner', 'jamesc2@gmail.com', '$2y$10$kvLt4NDKzalkY33pXYk4UeCUmYEdyfrkl1utfOm/7FMt5melTKchm', '2024-08-14 18:31:42'),
(4, '่james', 'conner', 'james22@gmail.com', '$2y$10$OLDnsQF23SRtCC48aP9.geYTZlt7dTDVWReTRzxelTNyFAefAifA6', '2024-08-15 08:29:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_plan`
--
ALTER TABLE `tb_plan`
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
-- AUTO_INCREMENT for table `tb_plan`
--
ALTER TABLE `tb_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
