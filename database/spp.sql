-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 07:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(20) NOT NULL,
  `name` varchar(225) NOT NULL,
  `category` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `category`, `created_at`) VALUES
(1, 'X', 'Rekayasa Perangkat Lunak', '2023-02-24 01:42:57'),
(2, 'XI', 'Rekayasa Perangkat Lunak', '2023-02-24 01:43:38'),
(3, 'XII', 'Rekayasa Perangkat Lunak', '2023-02-24 01:43:51'),
(7, 'XII', 'Tata Boga', '2023-03-05 05:56:51'),
(8, 'X', 'Perhotelan', '2023-03-05 05:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `name`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(11) NOT NULL,
  `name` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `name`) VALUES
(1, 'Januari'),
(2, 'Febuari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `name`, `username`, `password`, `user_id`, `created_at`) VALUES
(2, 'Ragil Anugraha', 'ragil.anugeraha', '$2y$10$SYUbSOdMXgqOB0DlL2x6ZeVbLDaPp33T3/PnC4kb4x6191TXx6E.K', 6, '2023-03-01 04:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `date_payment` date NOT NULL,
  `month_paid` varchar(225) NOT NULL,
  `year_paid` varchar(225) NOT NULL,
  `payment_amount` varchar(255) NOT NULL,
  `student_id` int(20) NOT NULL,
  `officer_id` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `date_payment`, `month_paid`, `year_paid`, `payment_amount`, `student_id`, `officer_id`, `created_at`) VALUES
(3, '2023-03-01', 'Agustus', '2023', '50000', 6, 2, '2023-03-01 04:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `spps`
--

CREATE TABLE `spps` (
  `id` int(20) NOT NULL,
  `year` int(11) NOT NULL,
  `nominal` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spps`
--

INSERT INTO `spps` (`id`, `year`, `nominal`) VALUES
(2, 2023, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `nisn` varchar(225) NOT NULL,
  `nis` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `class_id` int(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nisn`, `nis`, `name`, `address`, `phone`, `class_id`, `user_id`, `created_at`) VALUES
(3, '0059893492', '51356', 'Reyhan Maulana', 'pagarsih', '+62 813-3226-8489', 1, 3, '2023-02-28 04:57:39'),
(4, '96796', '679679', 'Ragil Anugraha', 'Braga', '+62 813-3226-8488', 3, 4, '2023-02-28 08:10:29'),
(5, '41256', '5125', 'Algamar Riyadi', 'Cihampelas', '+6281332268489', 2, 5, '2023-02-28 08:12:49'),
(6, '20200717070608', '060812', 'Fauzan Achmad', 'cibiru', '+62 813-3226-8489', 3, 7, '2023-03-01 04:28:35'),
(7, '00598934923', '679679567', 'Aldi Abdul', 'braga', '+62 813-3226-8488', 2, 9, '2023-03-03 02:56:47'),
(8, '00598934928458', '5135684584', 'Ilham Arop', 'dago', '+6281332268489', 3, 10, '2023-03-03 02:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` enum('admin','officer','student','') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$prAL3ijG6HyzXD2WBkCG.uvoDkSbU0a/LNLkZigpyBJLB0.ck8JsC', 'admin', '2023-02-25 11:10:03'),
(3, 'Reyhan Maulana', '0059893492', '51356', 'student', '2023-02-28 04:57:39'),
(4, 'Ragil Anugraha', '96796', '679679', 'student', '2023-02-28 08:10:29'),
(5, 'Algamar Riyadi', '41256', '5125', 'student', '2023-02-28 08:12:49'),
(6, 'Ragil Anugraha', 'ragil.anugeraha', '$2y$10$SYUbSOdMXgqOB0DlL2x6ZeVbLDaPp33T3/PnC4kb4x6191TXx6E.K', 'officer', '2023-03-01 04:14:03'),
(7, 'Fauzan Achmad', '20200717070608', '$2y$10$jjz2zt1wQuvm614NQBDdTOcF1JW1L8IrbPVD7/gW5KZrQ2SbrKIkm', 'student', '2023-03-01 04:28:35'),
(8, '3', '', '$2y$10$jwJcnt7cYYCL3cArkk82meE5CTnbL8jsHRAedE8lNDrCDsVI2bzmy', 'student', '2023-03-03 01:28:53'),
(9, 'Aldi Abdul', '00598934923', '$2y$10$FevRgh6sXt.ZUkeEBO7q.eMzoMDSA3JCY1PHxqrA9TGA9TqjWYoPS', 'student', '2023-03-03 02:56:47'),
(10, 'Ilham Arop', '00598934928458', '$2y$10$qz8pp3uFTG7M88i.7I1CHekn9aXS43Qs3zdSLk65lNIR1ni7Byk.2', 'student', '2023-03-03 02:59:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officer_id` (`officer_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `spps`
--
ALTER TABLE `spps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `students_ibfk_2` (`user_id`),
  ADD KEY `students_ibfk_3` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spps`
--
ALTER TABLE `spps`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `officers`
--
ALTER TABLE `officers`
  ADD CONSTRAINT `officers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`officer_id`) REFERENCES `officers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
